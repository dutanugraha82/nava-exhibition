<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCT extends Controller
{
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
