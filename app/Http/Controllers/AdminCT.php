<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\TiketFisikExcel;
use App\Mail\AlertMail;
use App\Mail\SendTicket;
use App\Models\Customer;
use App\Models\OTS;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminCT extends Controller
{
    public function index(Request $request){

        $ticket = DB::table('customer')->where('status_validasi','=',"1")->sum('jumlah_tiket');
        $grandTotal = DB::table('customer')->where('status_validasi','=',"1")->sum('total_harga');
        $earning = $this->moneyFormat($grandTotal);
        $approvedCustomers = DB::table('customer')->where('status_validasi','=',"1")->count();
        $pendingCustomers = DB::table('customer')->where('status_validasi','=',"0")->where('deleted_at','=', NULL)->count();

            if ($request->ajax()) {
                $customer = Customer::where('status_validasi','=',"0")->where('invoice', '=', NULL)->orderBy('created_at')->get();
            return datatables()->of($customer)
            ->addIndexColumn()
            ->addColumn('action', function($customer){
                return '<div class="d-flex justify-content-around">
                        
                        <form action="/admin/customer/'.$customer->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                            <button class="btn" type="submit" onclick="javascript: return confirm(\'Hapus '.$customer->name.' ?\')"><i class="text-danger fa fa-trash"></i></button>
                        </form>
                        </div>';
            })
            
            // ->addColumn('file', function($customer){
            //     return "<a href=".asset('/storage'.'/'.$customer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
            // })
            ->addColumn('expired', function($customer){
                $expired = Carbon::parse($customer->created_at)->addHours(24);
                return $expired->format('d M Y, H:i:s');
            })
            ->addColumn('total_harga', function($customer){
                return $this->moneyFormat($customer->total_harga);
            })
            ->addColumn('jenis', function($customer){
                return $customer->ticket->nama;
            })
            ->rawColumns(['action','expired', 'total_harga', 'jenis'])
            ->make(true);
        }

        return view('admin.contents.dashboard', compact('ticket','approvedCustomers','pendingCustomers','earning'));
    }

    public function validationCustomers(Request $request){
        if ($request->ajax()) {
            $customer = Customer::where('status_validasi','=',"0")->where('invoice', '!=', NULL)->orderBy('created_at')->get();
        return datatables()->of($customer)
        ->addIndexColumn()
        ->addColumn('action', function($customer){
            return '<div class="d-flex justify-content-around">
                    <form action="/admin/customer/'.$customer->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field('PUT').'
                        <button class="btn" type="submit"><i class=" text-success fa fa-check-square"></i></button>
                    </form>
                    <form action="/admin/customer/'.$customer->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                        <button class="btn" type="submit" onclick="javascript: return confirm(\'Hapus '.$customer->name.' ?\')"><i class="text-danger fa fa-trash"></i></button>
                    </form>
                    </div>';
        })
        
        ->addColumn('file', function($customer){
            return "<a href=".asset('/storage'.'/'.$customer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
        })
        ->addColumn('total_harga', function($customer){
            return $this->moneyFormat($customer->total_harga);
        })
        ->addColumn('jenis', function($customer){
            return $customer->ticket->nama;
        })
        ->rawColumns(['action','file', 'total_harga', 'jenis'])
        ->make(true);
        }
        return view('admin.contents.validasiCustomer');
    }



    public function validateCustomer($id){
        $code = Str::random(6);
        $data =  Customer::find($id);

        $total_price = $this->moneyFormat($data->total_harga);
        $data->update([
            'kode_tiket' => $code,
            'status_validasi' => "1",
            'status_tiket' => "0",
            'users_id' => auth()->user()->id,
        ]);

        $qrcode = QrCode::size(200)->generate(
            url('/').'/admin/customers/detail/ticket/'.$data->kode_registrasi,
        );

        $details = [
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
            'link' => $data->kode_registrasi,
            'kode_tiket' => $code,
        ];

        Mail::to($data->email)->send(new SendTicket($details));
        Alert::success('Customer Validated!');
        return redirect('/admin');
    }

    public function approvedCustomers(Request $request){
        
        if($request->ajax()){
            $approvedCustomers = Customer::where('status_validasi','=',"1")->orderBy('id', 'desc')->get();
            return datatables()->of($approvedCustomers)
            ->addIndexColumn()
            ->addColumn('total', function($approvedCustomers){
                return $this->moneyFormat($approvedCustomers->total_harga);
            })
            ->addColumn('purchase_date', function($approvedCustomers){
                return Carbon::parse($approvedCustomers->created_at)->format('d M Y');
            })
            ->addColumn('jenis_tiket', function($approvedCustomers){
                return $approvedCustomers->ticket->nama;
            })
            ->addColumn('admin', function($approvedCustomers){
                return $approvedCustomers->admin->name;
            })
            ->rawColumns(['total','purchase_date','jenis_tiket', 'admin'])
            ->make(true);
        }

        return view('admin.contents.approvedCustomers');
    }

    public function approvedCustomersExportExcel(){
        return Excel::download(new CustomerExport, 'ApprovedCustomer.xlsx');
    }

    public function deleteCustomer($id){
       $customer = Customer::find($id);
       $tiket = Tickets::find($customer->tickets_id);
       $newSlot = $customer->jumlah_tiket + $tiket->slot;
    //    dd($newSlot);
       $customer->delete();
       $tiket->update([
        'slot' => $newSlot,
       ]);
       
       $total_price = $this->moneyFormat($customer->total_harga);
       $details = [
        'title' => 'Data Kamu ditolak, mohon check kembali, atau hubungi kami.',
        'nama' => $customer->name,
        'tiket' => $tiket->nama,
        'jumlah' => $customer->jumlah_tiket,
        'total' => $total_price,
       ];

       Mail::to($customer->email)->send(new AlertMail($details));

        Alert::success('Data Deleted!');
        return redirect('/admin'); 
    }

    public function editProfile(){
       $profile = User::find(auth()->user()->id);
        return view('admin.contents.profile.index', compact('profile'));
    }

    public function updateProfile(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->password) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        Alert::success('Profile Updated!');
        if (auth()->user()->role == 'superadmin') {
            return redirect('/superadmin');
        }elseif(auth()->user()->role == 'admin'){
            return redirect('/admin');
        }
    }

    public function rejectedCustomer(Request $request){
        if($request->ajax()){
            $rejectedCustomers = Customer::withTrashed()->whereNotNull('deleted_at')->get();
            return datatables()->of($rejectedCustomers)
            ->addIndexColumn()
            ->addColumn('total', function($rejectedCustomers){
                return $this->moneyFormat($rejectedCustomers->total_price);
            })
            ->addColumn('file', function($rejectedCustomers){
                if ($rejectedCustomers->invoice) {
                    return "<a href=".asset('/storage'.'/'.$rejectedCustomers->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
                }else{
                    return 'NULL';
                }
            })
            ->addColumn('ticket', function($rejectedCustomers){
                return $rejectedCustomers->ticket->nama;
            })
            ->rawColumns(['total','file'])
            ->make(true);
        }

        return view('admin.contents.rejectedCustomers');
    }


    public function moneyFormat($total_price){
        return 'Rp ' . number_format($total_price, 2);
    }

    public function login(){
        return view('admin.contents.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
                        'email' => 'required|email',
                        'password' => 'required',
                        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'superadmin') {
                Alert::success('Login Success!');
                return redirect('/superadmin');
            }elseif (auth()->user()->role == 'admin') {
                Alert::success('Login Success!');
                return redirect()->intended('/admin');
            }else{
                Alert::error('Invalid','Invalid Role!');
                return back();
            }
        }
        Alert::error('Login Failed!');
        return back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('See You!');
        return redirect('/');
    }

    public function detailTicket($registryCode){

        $data = Customer::with('ticket')->where('kode_registrasi',$registryCode)->first();

        $qrcode = QrCode::size(200)->generate(
            url('/').'/admin/customers/detail/ticket/'.$data->kode_registrasi,
        );
        $status_tiket = $data->status_tiket;

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
            'link' => 'https://delunamusicfest.com/tickets/customer/detail/'.$data->kode_registrasi
        ];

       return view('admin.contents.detailTicketCustomer', compact('details','status_tiket'));
    }

    public function statusTicketUpdate($registryCode){
        $customer = Customer::where("kode_registrasi", $registryCode)->first();

        $customer->update([
            'status_tiket' => "1",
        ]);

        return back();
    }

    public function ots(){
        $tiket = OTS::where('users_id', auth()->user()->id)->sum('jumlah_tiket');
        $jumlah_qris = OTS::where('users_id', auth()->user()->id)->where('via', '=', 'qris')->sum('jumlah_harga');
        $jumlah_cash = OTS::where('users_id', auth()->user()->id)->where('via', '=', 'tunai')->sum('jumlah_harga');

        $qris = $this->moneyFormat($jumlah_qris);
        $cash = $this->moneyFormat($jumlah_cash);
        return view('admin.contents.ots.input', compact('tiket', 'qris', 'cash'));
    }

    public function storeOTS(Request $request){
        $request->validate([
            'nama' => 'required',
            'sex' => 'required',
            'jumlah_tiket' => 'required',
            'via' => 'required',
        ]);

        $jumlahHarga = $request->jumlah_tiket * 170000;

        // dd($request);

        OTS::create([
            'name' => $request->nama,
            'sex' => $request->sex,
            'jumlah_tiket' => $request->jumlah_tiket,
            'jumlah_harga' => $jumlahHarga,
            'via' => $request->via,
            'users_id' => auth()->user()->id,
        ]);

        Alert::success('Berhasil!', 'Semangat Kerjanya (:');
        return redirect('/admin/ots');
    }

    public function tiketFisik(Request $request){
        if($request->ajax()){
           $data = DB::table('kode_tiket_fisik')->get();

           return datatables()->of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                   if ($data->status_tiket == '0') {
                    return '<form action="/admin/tiket-fisik/'.$data->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <button type="submit" class="btn btn-success">Validasi Tiket</button>
                    </form>';
                   }else{
                    return 'NO ACTION';
                   }
                  })
                  ->addColumn('status_tiket', function($data){
                    if ($data->status_tiket == '0') {
                        return 'Belum Terpakai';
                    }elseif($data->status_tiket == '1'){
                        return 'Sudah Terpakai';
                    }
                  })
                  ->rawColumns(['action', 'status_tiket'])
                  ->make(true);
        }

        $sisaTiket = DB::table('kode_tiket_fisik')->where('status_tiket', '0')->count();
        return view('admin.contents.kode-tiket-fisik', compact('sisaTiket'));
    }

    public function tiketFisikValidasi($id){
        DB::table('kode_tiket_fisik')->where('id', $id)->update([
            'status_tiket' => '1',
        ]);
        Alert::success('Validasi Tiket Berhasil!');
        return redirect('/admin/tiket-fisik');
    }

    public function export(){
        return Excel::download(new TiketFisikExcel, 'kode_tiket.xlsx');
    }
}