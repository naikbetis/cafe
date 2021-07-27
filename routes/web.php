<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Voucher\VoucherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Store\StoreController;

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
    return view('login');
});

Route::group(['middleware' => 'guest'], function() { 
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'authentication'])->name('auth');
});

Route::group(['middleware' => 'auth'], function() { 
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});

// ALL PROCESS BELOW

// Home
Route::group(['prefix' => 'home','middleware' => 'auth'], function() {  
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    Route::get('/', [HomeController::class,'index'])->name('home');
    // Route::post('/create','App\Http\Controllers\Vouchers\VouchersController@store')->name('upload.new.voucher');
}); 

// Store
Route::group(['prefix' => 'store','middleware' => 'auth'], function() {  
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    Route::get('/', [StoreController::class,'index'])->name('store');
    // Route::post('/create','App\Http\Controllers\Vouchers\VouchersController@store')->name('upload.new.voucher');
}); 


// Voucher
Route::group(['prefix' => 'voucher','middleware' => 'auth'], function() {  

    Route::get('/form', [VoucherController::class,'index'])->name('voucher');
    
    Route::post('/checking', [VoucherController::class,'checkingVoucher'])->name('voucher.checking');
    Route::post('/scanner/checking', [VoucherController::class,'checkingScannerVoucher'])->name('voucher.scanner.checking');
    Route::post('/redeem', [VoucherController::class,'redeemVoucher'])->name('voucher.redeem');

    // for Home list
    Route::post('/active', [VoucherController::class,'voucherActive'])->name('voucher.active');
    Route::get('/info/{id}', [VoucherController::class,'infoVoucher']);
    Route::get('/detail/{id}', [VoucherController::class,'detailVoucher']);
    // Route::post('/create','App\Http\Controllers\Vouchers\VouchersController@store')->name('upload.new.voucher');
}); 
