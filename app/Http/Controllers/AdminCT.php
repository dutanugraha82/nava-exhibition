<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\AlertMail;
use App\Models\Tickets;
use App\Mail\SendTicket;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        return view('admin.contents.dashboard', compact('ticket','approvedCustomers','pendingCustomers','earning'));
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
        'invoice' => $customer->invoice,

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
            ->addColumn('date', function($rejectedCustomers){
                return $rejectedCustomers->date->date;
            })
            ->addColumn('time', function($rejectedCustomers){
                return $rejectedCustomers->time->time;
            })
            ->addColumn('total', function($rejectedCustomers){
                return $this->moneyFormat($rejectedCustomers->total_price);
            })
            ->addColumn('file', function($rejectedCustomer){
                return "<a href=".asset('/storage'.'/'.$rejectedCustomer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
            })
            ->rawColumns(['date','time','total','file'])
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
                return redirect()->intended('admin.dashboard');
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

       return view('admin.contents.detailTicketCustomer', compact('details'));
    }

    public function statusTicketUpdate($registryCode){
        $customer = Customer::where("kode_registrasi", $registryCode)->first();

        $customer->update([
            'status_tiket' => "1",
        ]);

        return back();
    }
}