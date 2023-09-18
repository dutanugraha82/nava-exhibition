<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        
        $time = DB::table('time')->where('schedule_id',$id)->where('slot','>',0)->get();
        $date = Schedule::find($id);
        return view('users.booking', compact('time','date'));
    }

    public function storeBooking(Request $request, $id){

        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sex' => 'required',
            'size' => 'required',
            'ticket' => 'required',
            'time' => 'required',
            'invoice' => 'image|required',
        ]);

        if ($request->email !== $request->validateEmail) {
            Alert::error('Email not match!','Email tidak sesuai');
           return back();
        }

        $date = Schedule::find($id);
        // Check Date is weekend? 0 = weekday, 1 = weekend.
        if ($date->status == 0) {
            $total_price = $request->ticket * 105000;
        } elseif ($date->status == 1) {
            $total_price = $request->ticket * 125000;
        }
        // dd($request);

        // get time
        $time = Time::find($request->time);
        // dd($time->slot);
        // Check available ticket
        if ($time->slot < $request->ticket) {
            Alert::error('Out of Slot');
            return back();
        }
            $newSlot = $time->slot - $request->ticket;

        return DB::transaction(function() use($request, $id, $total_price, $newSlot){
               
            try {
                 DB::beginTransaction();
                    $slot = Time::lockForUpdate()->find($request->time);
                    $slot->slot = $newSlot;
                    $slot->save();

                DB::table('customer')->insert([
                'schedule_id' => $id,
                'time_id' => $request->time,
                'name' => $request->name,
                'email' => $request->email,
                'sex' => $request->sex,
                'shoes' => $request->size,
                'amount' => $request->ticket,
                'total_price' => $total_price,
                'invoice' => $request->file('invoice')->store('payment-proof'),
                'status' => 0,
                'created_at' => Carbon::now(),
            ]);


                DB::commit();

                $rupiah = $this->moneyFormat($total_price);
                $details = [
                    'title' => 'Your booking has been received!',
                    'name' => $request->name,
                    'amount' => $request->ticket,
                    'total' => $rupiah,
                ];
                Mail::to($request->email)->send(new NotificationMail($details));
                Alert::success('Success!','Your Payment Under Validation, Please check your email periodically.');
                return redirect('/');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                Alert::error('Failed Transaction!');
                return back();
            }
            }, 10);

            // Customer::insert([
            //     'schedule_id' => $id,
            //     'time_id' => $request->time,
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'sex' => $request->sex,
            //     'shoes' => $request->size,
            //     'amount' => $request->ticket,
            //     'total_price' => $total_price,
            //     'invoice' => $request->file('invoice')->store('payment-proof'),
            //     'status' => 0,
            //     'created_at' => Carbon::now(),
            // ]);
    
            // Time::find($request->time)->update([
            //     'slot' => $newSlot,
            // ]);
            // $rupiah = $this->moneyFormat($total_price);
            // $details = [
            //     'title' => 'Your booking has been received!',
            //     'name' => $request->name,
            //     'amount' => $request->ticket,
            //     'total' => $rupiah,
            // ];
            // Mail::to($request->email)->send(new NotificationMail($details));
            // Alert::success('Success!','Your Payment Under Validation, Please check your email periodically.');
            // return redirect('/');
    }

    public function moneyFormat($total_price){
        return 'Rp ' . number_format($total_price, 2);
    }
}
