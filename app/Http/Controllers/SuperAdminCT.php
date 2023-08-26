<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminCT extends Controller
{
    public function index(Request $request){
        $ticket = DB::table('customer')->where('status','=',1)->sum('amount');
        $grandTotal = DB::table('customer')->where('status','=',1)->sum('total_price');
        $earning = $this->moneyFormat($grandTotal);
        $approvedCustomers = DB::table('customer')->where('status','=',1)->count();
        $pendingCustomers = DB::table('customer')->where('status','=',0)->where('deleted_at','=', NULL)->count();
        if ($request->ajax()) {
            $customer = Customer::where('status','=',0)->get();
            return datatables()->of($customer)
            ->addIndexColumn()
            ->addColumn('action', function(){
                return 'only Admin';
            })
            ->addColumn('file', function($customer){
                return "<a href=".asset('/storage'.'/'.$customer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
            })
            ->addColumn('date', function($customer){
                return $customer->date->date;
            })
            ->addColumn('time', function($customer){
                return $customer->time->time;
            })
            ->rawColumns(['action','file','date','time'])
            ->make(true);
        }
        return view('admin.contents.dashboard', compact('ticket','approvedCustomers','pendingCustomers','earning'));
    }

    public function adminUsers(){
        $admin = DB::table('users')->where('role','admin')->get();
        return view('admin.contents.admin-users.index', compact('admin'));
    }

    public function storeAdminUsers(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make('navaexhibition2023'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Alert::success('Data Added!');
        return redirect('/superadmin/admin-users');
    }
    
    public function moneyFormat($total_price){
        return 'Rp ' . number_format($total_price, 2);
    }
}
