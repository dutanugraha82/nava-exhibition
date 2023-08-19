<?php

use App\Http\Controllers\AdminCT;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SuperAdminCT;

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

Route::middleware(['auth','superadmin','preventBack'])->prefix('/superadmin')->group(function(){
    Route::get('/', [SuperAdminCT::class,'index']);
});

Route::get('/booking', [CustomerController::class,'bookDate']);
Route::post('/booking', [CustomerController::class,'bookDatePost']);
Route::get('/booking/{id}', [CustomerController::class,'booking']);
Route::post('/booking-store/{id}', [CustomerController::class,'storeBooking']);
