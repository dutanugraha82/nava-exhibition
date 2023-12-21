<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\Customer;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Tickets;
use App\Models\Time;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    

    public function ticket($id){
        $ticket = Tickets::find($id);
        if ($ticket->slot < 1 || $ticket->status == "0") {
            Alert::error("Tiket tidak tersedia");
            return back();
        } else {
            return view('users.order', compact('ticket'));
        }
        
    }

    public function ticketKeep(Request $request, $id){
        $ticket = Tickets::find($id);
        if ($ticket->slot < $request->jumlah_tiket || $ticket->status == "0") {
            Alert::error("Tiket tidak tersedia");
            return back();
        } else {
            if ($request->email != $request->validateEmail) {
                Alert::error('Email Tidak Sama');
                return back();

            }elseif($ticket->slot > $request->jumlah_tiket){
                $newSlot = $ticket->slot - $request->jumlah_tiket;
                $total_harga = (int)$ticket->harga * $request->jumlah_tiket;
                $kode_registrasi = Str::orderedUuid();
                $link = "https://delunamusicfest.com/tickets/".$kode_registrasi."/payment";
                // dd($kode_registrasi);
                return DB::transaction(function() use($request, $id, $total_harga, $newSlot, $kode_registrasi, $link, $ticket){
                
                    try {
                        
                            DB::beginTransaction();
                            $slot = Tickets::lockForUpdate()->find($id);
                            $slot->slot = $newSlot;
                            $slot->save();

                            
                                DB::table('customer')->insert([
                                    'kode_registrasi' => $kode_registrasi,
                                    'name' => $request->nama,
                                    'nohp' => $request->nohp,
                                    'email' => $request->email,
                                    'sex' => $request->sex,
                                    'jumlah_tiket' => $request->jumlah_tiket,
                                    'total_harga' => $total_harga,
                                    'status_validasi' => "0",
                                    'status_tiket' => "0",
                                    'tickets_id' => $id,
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now(),
                                ]);
                                  
                        DB::commit();
        
                        $rupiah = $this->moneyFormat($total_harga);
                        $details = [
                            'title' => 'Pengajuan Tiket Diterima!',
                            'name' => $request->nama,
                            'amount' => $request->jumlah_tiket . " (".$ticket->nama.")",
                            'total' => $rupiah,
                            'link' => $link,
                        ];
                        Mail::to($request->email)->send(new NotificationMail($details));
                        Alert::success('Berhasil!','Silahkan cek email untuk verifikasi selanjutnya');
                        return redirect('/');
        
                    } catch (\Exception $e) {
                        DB::rollBack();
                        throw $e;
                        Alert::error('Transaksi Gagal!');
                        return back();
                    }
                    }, 10);
            }
            else{
                Alert::error('Tiket Habis ):');
                return back();
            }
        }
    }

    public function payment($uuid){
        $data = Customer::where('kode_registrasi', $uuid)->first();
        $total_harga = $this->moneyFormat($data->total_harga);
        // dd($total_harga);
        return view('users.order-request', compact('data', 'total_harga'));
    }

    public function paymentStore(Request $request, $uuid){
        $data = Customer::where('kode_registrasi', $uuid)->first();

        $request->validate([
            'invoice' => 'required|image',
        ]);

        Customer::find($data->id)->update([
            'invoice' => $request->file('invoice')->store('payment-proof'),
        ]);

        Alert::info('Pembayaran kamu sedang divalidasi, silahkan cek email secara berkala.');
        return redirect('/');

        

    }

    public function moneyFormat($total_harga){
        return 'Rp ' . number_format($total_harga, 2);
    }

    public function detailTicket($registryCode){
        $data = Customer::with('ticket')->where('kode_registrasi',$registryCode)->first();

        $qrcode = QrCode::size(200)->generate(
            url('/').'/admin/customers/detail/ticket/'.$data->kode_registrasi,
        );

        $details = [
            'kode_registrasi' => $data->kode_registrasi,
            'title' => "Welcome to De Luna Music Festival 2024!",
            'name' => $data->name,
            'status_badge' => $data->status_tiket == '1' ? 'badge-ticket-success' : 'badge-ticket-warning',
            'status' => $data->status_tiket == "1" ? 'Sudah digunakan' : 'Belum digunakan',
            'email' => $data->email,
            'nohp' => $data->nohp,
            'presale' => $data->ticket->nama,
            'jumlah_tiket' => $data->jumlah_tiket,
            'harga_tiket' => $data->ticket->harga,
            'total_harga' => $data->total_harga,
            'qr' => $qrcode,
        ];

       return view('users.detail-ticket-customer', compact('details'));
    }
}
