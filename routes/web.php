<?php

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
    return view('frontend.hotel.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('/hotels', App\Http\Controllers\backend\HotelController::class);

Route::resource('/rooms', App\Http\Controllers\backend\RoomController::class);

Route::get('/frontend/hotel', function () {
    return view('frontend.hotel.index'); 
});

Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

Route::get('/room', [App\Http\Controllers\frontend\RoomsController::class, 'rooms'])->name('room');