<?php

use App\Models\Customer;
use App\Http\Controllers\AdminCT;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminCT;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeCT;
use App\Http\Controllers\TicketCT;

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

Route::get('/', [HomeCT::class,'index']);

Route::get('/faq', function(){
    return view('faq');
});

// Route::get('/admin', function(){
//     return view('admin.contents.dashboard');
// });

Route::get('/login', [AdminCT::class,'login'])->name('login');
Route::post('/login',[AdminCT::class,'authenticate']);
Route::post('/logout',[AdminCT::class,'logout'])->middleware('auth');
// Superadmin Route
Route::middleware(['auth','superadmin','preventBack'])->prefix('/superadmin')->group(function(){
    Route::get('/', [SuperAdminCT::class,'index'])->name('superadmin.dashboard');
    Route::get('/admin-users', [SuperAdminCT::class,'adminUsers']);
    Route::post('/admin-users/create', [SuperAdminCT::class,'storeAdminUsers']);
    Route::get('/customers/rejected',[AdminCT::class,'rejectedCustomer'])->name('superadmin.rejectedCustomers');

    Route::get('/tickets', [TicketCT::class,'index']);
    Route::post('/tickets/create', [TicketCT::class,'store']);
    Route::get('/tickets/edit/{id}', [TicketCT::class,'edit']);
    Route::put('/tickets/{id}/update', [TicketCT::class,'update']);
    Route::delete('/tickets/{id}/delete', [TicketCT::class,'destroy']);

    Route::put('/tickets/{id}/activate', [TicketCT::class,'activate']);
    Route::put('/tickets/{id}/unactivate', [TicketCT::class,'unactivate']); 

    Route::get('/tickets/customers/{id}', [TicketCT::class, 'customers'])->name('superadmin.customers');
});
// Route End

// Admin Route
Route::middleware(['auth','admin','preventBack'])->prefix('/admin')->group(function(){
    Route::get('/',[AdminCT::class,'index'])->name('admin.dashboard');
    Route::put('/customer/{id}',[AdminCT::class,'validateCustomer']);
    Route::get('/customers/validated',[AdminCT::class,'approvedCustomers'])->name('admin.approvedCustomers');
    Route::get('/customers/validation',[AdminCT::class,'validationCustomers'])->name('admin.validationCustomers');
    Route::delete('/customer/{id}',[AdminCT::class,'deleteCustomer']);
    Route::get('/customers/rejected',[AdminCT::class,'rejectedCustomer'])->name('admin.rejectedCustomers');

    Route::get('customers/detail/ticket/{id}', [AdminCT::class, 'detailTicket'])->name('admin.detailTicket');
    Route::put('customers/update/status/tiket/{id}', [AdminCT::class, 'statusTicketUpdate'])->name('admin.statusTicketUpdate');
});
// Route End

Route::middleware(['auth','preventBack'])->group(function(){
    Route::get('/profiles/edit',[AdminCT::class,'editProfile']);
    Route::put('/profiles/{id}',[AdminCT::class,'updateProfile']);
});

Route::get('/tickets/{id}', [CustomerController::class, 'ticket']);
Route::post('/tickets/{id}/order', [CustomerController::class, 'ticketKeep']);
Route::get('/tickets/{uuid}/payment',[CustomerController::class, 'payment']);
Route::post('/tickets/{uuid}/payment/store',[CustomerController::class, 'paymentStore']);
Route::get('/tickets/customer/detail/{id}', [CustomerController::class, 'detailTicket']);