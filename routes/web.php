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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Home
Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');
//Users
Route::get('/users',[App\Http\Controllers\UserController::class,'index'])->name('users');
//
Route::get('/flight',[\App\Http\Controllers\FlightController::class,'index'])->name('flight');
Route::get('/prices',[\App\Http\Controllers\FlightController::class,'getPrices'])->name('prices');
