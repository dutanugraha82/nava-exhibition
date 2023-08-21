<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminCT extends Controller
{
    public function index(){
        return view('admin.contents.dashboard');
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
}
