<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function bookDate(){
        $date = DB::table('schedule')->get();
        return view('users.booking-date', compact('date'));
    }

    public function bookDatePost(Request $request){
        $request->validate([
            'date' => 'required',
        ]);

        return redirect('/booking'.'/'.$request->date);
    }

    public function booking($id){
        
        $time = DB::table('time')->where('schedule_id',$id)->get();
        $date = Schedule::find($id);
        return view('users.booking', compact('time','date'));
    }
}
