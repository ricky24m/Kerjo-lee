<?php

use App\http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['guest::karyawan'])->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin',[AuthController::class, 'proseslogin']);
});
Route::middleware(['auth:karyawan'])->group(function(){
    Route::get ('/dashboard',[DashboardController::class,'index'] );
    Route::get('/proseslogout', [AuthController::class,'proseslogout']);
    Route::get('/presensi/create', [PresensiController::class, 'create']);
});