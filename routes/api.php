<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChecklistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/projects',[ProjectController::class,'index']);
Route::prefix('/project')->group( function (){
    Route::post('/store',[ProjectController::class,'store']);
    Route::put('/{id}',[ProjectController::class,'update']);
    Route::delete('/{id}',[ProjectController::class,'destroy']);
});
Route::get('/cards',[CardController::class,'index']);
Route::prefix('/card')->group(function(){
    Route::post('/store',[CardController::class,'store']);
});
Route::get('/tasks',[TaskController::class,'index']);
Route::prefix('/task')->group(function(){
    Route::post('/store',[TaskController::class,'store']);
});
Route::get('/checklists',[ChecklistController::class,'index']);
Route::prefix('/checklist')->group(function(){
    Route::post('/store',[ChecklistController::class,'store']);
    Route::put('/{id}',[ChecklistController::class,'update']);
    Route::delete('/{id}',[ChecklistController::class,'destroy']);
});
