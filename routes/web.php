<?php

use App\Models\Customer;
use App\Http\Controllers\AdminCT;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminCT;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/faq', function(){
    return view('faq');
});

Route::get('/admin', function(){
    return view('admin.contents.dashboard');
});

Route::get('/login', [AdminCT::class,'login'])->name('login');
Route::post('/login',[AdminCT::class,'authenticate']);
Route::post('/logout',[AdminCT::class,'logout'])->middleware('auth');
// Superadmin Route
Route::middleware(['auth','superadmin','preventBack'])->prefix('/superadmin')->group(function(){
    Route::get('/', [SuperAdminCT::class,'index'])->name('superadmin.dashboard');
    Route::get('/admin-users', [SuperAdminCT::class,'adminUsers']);
    Route::post('/admin-users/create', [SuperAdminCT::class,'storeAdminUsers']);
});
// Route End

// Admin Route
Route::middleware(['auth','admin','preventBack'])->prefix('/admin')->group(function(){
    Route::get('/',[AdminCT::class,'index'])->name('admin.dashboard');
    Route::put('/customer/{id}',[AdminCT::class,'validateCustomer']);
});
// Route End

Route::get('/email/{id}',function($id){
    $data =  Customer::find($id)->first();
        // dd($data);
        $details = [
            'title' => "This is Your Ticket for Nava Exhibition, Enjoy!",
            'body' => $data->name,
            'amount' => $data->amount,
            'code' => $data->code,
            'date' => $data->date->date,
            'time' => $data->time->time,
            'shoes' => $data->shoes,
            'total' => $data->total_price,
            'footer' => "Please keep it secret! Your ticket can not be refund."
        ];
    return view('email.validateMail',compact('details'));
});
Route::get('/booking', [CustomerController::class,'bookDate']);
Route::post('/booking', [CustomerController::class,'bookDatePost']);
Route::get('/booking/{id}', [CustomerController::class,'booking']);
Route::post('/booking-store/{id}', [CustomerController::class,'storeBooking']);
