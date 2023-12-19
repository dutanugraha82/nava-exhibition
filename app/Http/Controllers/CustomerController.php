<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\Customer;
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
        if ($ticket->slot < 1 || $ticket->status == "0") {
            Alert::error("Tiket tidak tersedia");
            return back();
        } else {
            if ($request->email != $request->validateEmail) {
                Alert::error('Email Tidak Sama');
                return back();
            }else{
                $newSlot = $ticket->slot - $request->jumlah_tiket;
                $total_harga = (int)$ticket->harga * $request->jumlah_tiket;
                $kode_registrasi = Str::orderedUuid();
                $link = "https://delunamusicfest.com/tickets/".$kode_registrasi."/payment";
                // dd($kode_registrasi);
                return DB::transaction(function() use($request, $id, $total_harga, $newSlot, $kode_registrasi, $link){
                
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
                        'ticket_id' => $id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
        
        
                        DB::commit();
        
                        $rupiah = $this->moneyFormat($total_harga);
                        $details = [
                            'title' => 'Your booking has been received!',
                            'name' => $request->nama,
                            'amount' => $request->jumlah_tiket,
                            'total' => $rupiah,
                            'link' => $link,
                        ];
                        Mail::to($request->email)->send(new NotificationMail($details));
                        Alert::success('Berhasil!','Silahkan cek email untuk verifikasi selanjutnya');
                        return redirect('/');
        
                    } catch (\Exception $e) {
                        DB::rollBack();
                        throw $e;
                        Alert::error('Failed Transaction!');
                        return back();
                    }
                    }, 10);
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

        Alert::success('Berhasil!', 'Tunggu email selanjutnya untuk mendapatkan E-Ticket');
        return redirect('/');

        

    }

    public function storeBooking(Request $request, $id){

        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sex' => 'required',
            'size' => 'required',
            'ticket' => 'required',
            'time' => 'required',
            'invoice' => 'image|required',
        ]);

        if ($request->email !== $request->validateEmail) {
            Alert::error('Email not match!','Email tidak sesuai');
           return back();
        }

        $date = Schedule::find($id);
        // Check Date is weekend? 0 = weekday, 1 = weekend.
        if ($date->status == 0) {
            $total_price = $request->ticket * 105000;
        } elseif ($date->status == 1) {
            $total_price = $request->ticket * 125000;
        }
        // dd($request);

        // get time
        $time = Time::find($request->time);
        // dd($time->slot);
        // Check available ticket
        if ($time->slot < $request->ticket) {
            Alert::error('Out of Slot');
            return back();
        }
            $newSlot = $time->slot - $request->ticket;

        return DB::transaction(function() use($request, $id, $total_price, $newSlot){
               
            try {
                 DB::beginTransaction();
                    $slot = Time::lockForUpdate()->find($request->time);
                    $slot->slot = $newSlot;
                    $slot->save();

                DB::table('customer')->insert([
                'schedule_id' => $id,
                'time_id' => $request->time,
                'name' => $request->name,
                'email' => $request->email,
                'sex' => $request->sex,
                'shoes' => $request->size,
                'amount' => $request->ticket,
                'total_price' => $total_price,
                'invoice' => $request->file('invoice')->store('payment-proof'),
                'status' => 0,
                'created_at' => Carbon::now(),
            ]);


                DB::commit();

                $rupiah = $this->moneyFormat($total_price);
                $details = [
                    'title' => 'Your booking has been received!',
                    'name' => $request->name,
                    'amount' => $request->ticket,
                    'total' => $rupiah,
                ];
                Mail::to($request->email)->send(new NotificationMail($details));
                Alert::success('Success!','Your Payment Under Validation, Please check your email periodically.');
                return redirect('/');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                Alert::error('Failed Transaction!');
                return back();
            }
            }, 10);

            // Customer::insert([
            //     'schedule_id' => $id,
            //     'time_id' => $request->time,
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'sex' => $request->sex,
            //     'shoes' => $request->size,
            //     'amount' => $request->ticket,
            //     'total_price' => $total_price,
            //     'invoice' => $request->file('invoice')->store('payment-proof'),
            //     'status' => 0,
            //     'created_at' => Carbon::now(),
            // ]);
    
            // Time::find($request->time)->update([
            //     'slot' => $newSlot,
            // ]);
            // $rupiah = $this->moneyFormat($total_price);
            // $details = [
            //     'title' => 'Your booking has been received!',
            //     'name' => $request->name,
            //     'amount' => $request->ticket,
            //     'total' => $rupiah,
            // ];
            // Mail::to($request->email)->send(new NotificationMail($details));
            // Alert::success('Success!','Your Payment Under Validation, Please check your email periodically.');
            // return redirect('/');
    }

    public function moneyFormat($total_harga){
        return 'Rp ' . number_format($total_harga, 2);
    }
}
