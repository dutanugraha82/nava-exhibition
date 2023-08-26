<?php

namespace App\Http\Controllers;

use App\Mail\AlertMail;
use App\Models\Time;
use App\Models\User;
use App\Mail\SendTicket;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCT extends Controller
{
    public function index(Request $request){

        $ticket = DB::table('customer')->where('status','=',1)->sum('amount');
        $grandTotal = DB::table('customer')->where('status','=',1)->sum('total_price');
        $earning = $this->moneyFormat($grandTotal);
        $approvedCustomers = DB::table('customer')->where('status','=',1)->count();
        $pendingCustomers = DB::table('customer')->where('status','=',0)->where('deleted_at','=', NULL)->count();

            if ($request->ajax()) {
                $customer = Customer::where('status','=',0)->orderBy('created_at')->get();
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
            ->addColumn('date', function($customer){
                return $customer->date->date;
            })
            ->addColumn('time', function($customer){
                return $customer->time->time;
            })
            ->addColumn('file', function($customer){
                return "<a href=".asset('/storage'.'/'.$customer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
            })
            ->rawColumns(['action','file','date','time'])
            ->make(true);
        }

        return view('admin.contents.dashboard', compact('ticket','approvedCustomers','pendingCustomers','earning'));
    }

    public function validateCustomer($id){
        $code = Str::random(6);
        $data =  Customer::find($id);
        $total_price = $this->moneyFormat($data->total_price);
        $data->update([
            'code' => $code,
            'status' => 1,
        ]);
        
        $details = [
            'title' => "Welcome to Nava Exhibition!",
            'body' => $data->name,
            'amount' => $data->amount,
            'code' => $code,
            'date' => $data->date->date,
            'time' => $data->time->time,
            'shoes' => $data->shoes,
            'total' => $total_price,
            'footer' => "Please keep it secret! Your ticket can not be refund."
        ];

        Mail::to($data->email)->send(new SendTicket($details));
        Alert::success('Customer Validated!');
        return redirect('/admin');
    }

    public function approvedCustomers(Request $request){
        
        if($request->ajax()){
            $approvedCustomers = Customer::where('status','=',1)->get();
            return datatables()->of($approvedCustomers)
            ->addIndexColumn()
            ->addColumn('date', function($approvedCustomers){
                return $approvedCustomers->date->date;
            })
            ->addColumn('time', function($approvedCustomers){
                return $approvedCustomers->time->time;
            })
            ->addColumn('total', function($approvedCustomers){
                return $this->moneyFormat($approvedCustomers->total_price);
            })
            ->rawColumns(['date','time','total'])
            ->make(true);
        }

        return view('admin.contents.approvedCustomers');
    }

    public function deleteCustomer($id){
       $customer = Customer::find($id);
       $time = Time::find($customer->time_id);
       $newSlot = $customer->amount + $time->slot;
       $customer->delete();
       $time->update([
        'slot' => $newSlot,
       ]);
       $total_price = $this->moneyFormat($customer->total_price);
       $details = [
        'title' => 'Your data has rejected ):',
        'name' => $customer->name,
        'amount' => $customer->amount,
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
                return redirect('/admin');
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
}
