<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function storeBooking(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sex' => 'required',
            'size' => 'required',
            'ticket' => 'required',
            'time' => 'required',
        ]);

        $date = Schedule::find($id)->first();
        // Check Date is weekend? 0 = weekday, 1 = weekend.
        if ($date->status == 0) {
            $total_price = $request->ticket * 85000;
        } elseif ($date->status == 1) {
            $total_price = $request->ticket * 100000;
        }
        // generate unique code
        $code = Str::random(5);
        // get time
        $time = Time::find($request->time)->first();
        $newSlot = $time->slot - $request->ticket;

        Customer::insert([
            'schedule_id' => $id,
            'time' => $request->time,
            'code' => $code,
            'name' => $request->name,
            'email' => $request->email,
            'sex' => $request->sex,
            'shoes' => $request->size,
            'amount' => $request->ticket,
            'total_price' => $total_price,
            'invoice' => $request->file('invoice')->store('payment-proof'),
            'status' => 0,
        ]);

        Time::find($request->time)->update([
            'slot' => $newSlot,
        ]);
        Alert::success('Success!','Your Payment Under Validation, Please check your email periodically.');
        return redirect('/');
        
        
    }
}
