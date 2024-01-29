<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\OTS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminCT extends Controller
{
    public function index(Request $request){
        $ticket = DB::table('customer')->where('status_validasi','=',"1")->sum('jumlah_tiket');
        $grandTotal = DB::table('customer')->where('status_validasi','=',"1")->sum('total_harga');
        $earning = $this->moneyFormat($grandTotal);
        $approvedCustomers = DB::table('customer')->where('status_validasi','=',"1")->count();
        $pendingCustomers = DB::table('customer')->where('status_validasi','=',"0")->where('deleted_at','=', NULL)->count();
        if ($request->ajax()) {
            $customer = Customer::where('status_validasi','=',"0")->where('invoice','!=', NULL)->get();
            return datatables()->of($customer)
            ->addIndexColumn()
            ->addColumn('action', function(){
                return 'only Admin';
            })
            ->addColumn('file', function($customer){
                return "<a href=".asset('storage'.'/'.$customer->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
            })
            ->addColumn('total_harga', function($customer){
                return $this->moneyFormat($customer->total_harga);
            })
            ->addColumn('jenis', function($customer){
                return $customer->ticket->nama;
            })
            ->rawColumns(['action','file','total_harga','jenis'])
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
            'password' => Hash::make('deluna2024'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Alert::success('Data Added!');
        return redirect('/superadmin/admin-users');
    }

    public function otsReport(Request $request){
        $tiket = OTS::sum('jumlah_tiket');
        $jumlah_qris = OTS::where('via', '=', 'qris')->sum('jumlah_harga');
        $jumlah_cash = OTS::where('via', '=', 'tunai')->sum('jumlah_harga');

        $qris = $this->moneyFormat($jumlah_qris);
        $cash = $this->moneyFormat($jumlah_cash);

        if ($request->ajax()) {
            $ots = OTS::all();
            return datatables()->of($ots)
            ->addIndexColumn()
            ->addColumn('total_harga', function($ots){
                return $this->moneyFormat($ots->jumlah_harga);
            })
            ->addColumn('admin', function($ots){
                return $ots->admin->name;
            })
            ->rawColumns(['total_harga','admin'])
            ->make(true);
        }

        return view('admin.contents.ots.index', compact('tiket','qris','cash'));
    }
    
    public function moneyFormat($total_price){
        return 'Rp ' . number_format($total_price, 2);
    }
}
