<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/booking', [CustomerController::class,'bookDate']);
Route::post('/booking', [CustomerController::class,'bookDatePost']);
Route::get('/booking/{id}', [CustomerController::class,'booking']);
