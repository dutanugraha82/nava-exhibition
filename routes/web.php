<?php

use App\Models\Customer;
use App\Http\Controllers\AdminCT;
use Illuminate\Support\Facades\DB;
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

// Route::get('/admin', function(){
//     return view('admin.contents.dashboard');
// });

// Route::get('/login', [AdminCT::class,'login'])->name('login');
// Route::post('/login',[AdminCT::class,'authenticate']);
// Route::post('/logout',[AdminCT::class,'logout'])->middleware('auth');
// Superadmin Route
// Route::middleware(['auth','superadmin','preventBack'])->prefix('/superadmin')->group(function(){
//     Route::get('/', [SuperAdminCT::class,'index'])->name('superadmin.dashboard');
//     Route::get('/admin-users', [SuperAdminCT::class,'adminUsers']);
//     Route::post('/admin-users/create', [SuperAdminCT::class,'storeAdminUsers']);
//     Route::get('/customers/rejected',[AdminCT::class,'rejectedCustomer'])->name('superadmin.rejectedCustomers');
// });
// Route End

// Admin Route
// Route::middleware(['auth','admin','preventBack'])->prefix('/admin')->group(function(){
//     Route::get('/',[AdminCT::class,'index'])->name('admin.dashboard');
//     Route::put('/customer/{id}',[AdminCT::class,'validateCustomer']);
//     Route::get('/customers/validated',[AdminCT::class,'approvedCustomers'])->name('admin.approvedCustomers');
//     Route::delete('/customer/{id}',[AdminCT::class,'deleteCustomer']);
//     Route::get('/customers/rejected',[AdminCT::class,'rejectedCustomer'])->name('admin.rejectedCustomers');
// });
// Route End

// Route::middleware(['auth','preventBack'])->group(function(){
//     Route::get('/profiles/edit',[AdminCT::class,'editProfile']);
//     Route::put('/profiles/{id}',[AdminCT::class,'updateProfile']);
// });
// Route::get('/booking', [CustomerController::class,'bookDate']);
// Route::post('/booking', [CustomerController::class,'bookDatePost']);
// Route::get('/booking/{id}', [CustomerController::class,'booking']);
// Route::post('/booking-store/{id}', [CustomerController::class,'storeBooking']);
