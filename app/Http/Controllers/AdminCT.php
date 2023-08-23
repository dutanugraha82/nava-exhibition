<?php

namespace App\Http\Controllers;

use App\Mail\SendTicket;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCT extends Controller
{
    public function index(Request $request){
            if ($request->ajax()) {
                $customer = Customer::where('status','=',0)->get();
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
                            <button class="btn" type="submit"><i class="text-danger fa fa-trash"></i></button>
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
        return view('admin.contents.dashboard');
    }

    public function validateCustomer(Request $request, $id){
       $data =  Customer::find($id);
        // dd($data);
        $details = [
            'title' => "This is Your Ticket for Nava Exhibition Enjoy!",
            'body' => $data->name,
            'amount' => $data->amount,
            'code' => $data->code,
            'date' => $data->date->date,
            'time' => $data->time->time,
            'shoes' => $data->shoes,
            'total' => $data->total_price,
            'footer' => "Please keep it secret! Your ticket can not be refund."
        ];

        Mail::to($data->email)->send(new SendTicket($details));
        Alert::success('Customer Validated!');
        return redirect('/admin');
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
