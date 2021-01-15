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
    return view('auth.login');
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
Route::get('/userRead',[App\Http\Controllers\UserController::class,'userActivity'])->name('userRead');
Route::get('/user/clearLogs/{user}',[App\Http\Controllers\UserController::class,'clearAdminLog'])->name('/user/clearLogs');
Route::get('/notifications',[App\Http\Controllers\UserController::class,'allNotifications'])->name('/notification');
Route::post('user/updatePassword',[App\Http\Controllers\UserController::class,'updatePassword'])->name('/user/updatePassword');
Route::post('/user/updateProfile',[App\Http\Controllers\UserController::class,'updateProfilePicture'])->name('user/updateProfile');
//
Route::get('/mails',[App\Http\Controllers\EmailController::class,'index'])->name('mails');
Route::post('/mail/send',[App\Http\Controllers\EmailController::class,'sendEmail'])->name('/mail/send');
//
Route::get('/flight',[App\Http\Controllers\FlightController::class,'index'])->name('flight');
Route::get('/prices',[App\Http\Controllers\FlightController::class,'getPrices'])->name('prices');
//Whatsapp
Route::get('/whatsapp',[App\Http\Controllers\WhatsappController::class,'index'])->name('whatsapp');
Route::get('/whatsapp/send',[App\Http\Controllers\WhatsappController::class,'send'])->name('whatsapp/send');
//Projects
Route::get('/projects',[App\Http\Controllers\HomeController::class,'project'])->name('projects');
Route::get('/management',[App\Http\Controllers\ProjectController::class,'create']);
Route::get('project/{project}',[App\Http\Controllers\ProjectController::class,'show']);
Route::post('/tasks',[App\Http\Controllers\TaskController::class,'store']);
//Cards
Route::get('/cards',[App\Http\Controllers\CardController::class,'index'])->name('cards');
Route::post('/cards',[App\Http\Controllers\CardController::class,'store'])->name('cards');
Route::put('/move/{id}',[App\Http\Controllers\TaskController::class,'moveTask'])->name('moveTask');
Route::put('/complete/{id}/',[App\Http\Controllers\TaskController::class,'completeTask']);

//Assets
Route::get('/categories',[App\Http\Controllers\CategoryController::class,'assetIndex'])->name('assets');
Route::get('/assets_dashboard',[App\Http\Controllers\CategoryController::class,'dashboard']);
Route::get('/create_assets',[App\Http\Controllers\CategoryController::class,'assets']);
Route::get('/create_category',[App\Http\Controllers\CategoryController::class,'category']);
Route::get('/assetForm',[App\Http\Controllers\AssetController::class,'addAssetForm'] );
//Asset
Route::get('/asset/{asset}',[App\Http\Controllers\AssetController::class,'show']);
//Logout
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
