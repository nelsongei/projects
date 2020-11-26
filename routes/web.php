<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/user/{user}',[App\Http\Controllers\UserController::class,'viewUser'])->name('viewUser');
Route::get('/profile',[App\Http\Controllers\UserController::class,'profile'])->name('profile');
Route::post('/user/add',[App\Http\Controllers\UserController::class,'addUser'])->name('/user/add');
Route::post('/user/update',[App\Http\Controllers\UserController::class,'editUser'])->name('/user/update');
Route::get('/user/delete/{user}',[App\Http\Controllers\UserController::class,'deleteUser'])->name('/user/delete/{user}');

//
Route::get('/mails',[App\Http\Controllers\EmailController::class,'index'])->name('mails');
Route::get('/mail/send',[App\Http\Controllers\EmailController::class,'send'])->name('/mail/send');
//
Route::get('/flight',[App\Http\Controllers\FlightController::class,'index'])->name('flight');
Route::get('/prices',[App\Http\Controllers\FlightController::class,'getPrices'])->name('prices');
//Whatsapp
Route::get('/whatsapp',[App\Http\Controllers\WhatsappController::class,'send'])->name('whatsapp');
//Logout
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
