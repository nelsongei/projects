<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AssetMoveController;
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
Route::get('/cards/{id}',[CardController::class,'index']);
Route::prefix('/card')->group(function(){
    Route::post('/store',[CardController::class,'store']);
});
Route::get('/tasks/{id}',[TaskController::class,'index']);
Route::prefix('/task')->group(function(){
    Route::post('/store',[TaskController::class,'store']);
    Route::put('/{id}',[TaskController::class,'update']);
    Route::put('/complete/{id}',[TaskController::class,'completeTask']);
//    Route::put('/move/{id}',[TaskController::class,'moveTask']);
});
Route::get('/checklists',[ChecklistController::class,'index']);
Route::prefix('/checklist')->group(function(){
    Route::post('/store',[ChecklistController::class,'store']);
    Route::put('/{id}',[ChecklistController::class,'update']);
    Route::delete('/{id}',[ChecklistController::class,'destroy']);
});
Route::get('/feedbacks',[FeedbackController::class,'index']);
Route::prefix('/feedback')->group(function (){
    Route::post('/store',[FeedbackController::class,'store']);
});
Route::get('/categories',[CategoryController::class,'index']);
Route::prefix('/category',)->group(function (){
    Route::post('/store',[CategoryController::class,'store']);
    Route::put('/{id}',[CategoryController::class,'update']);
    Route::delete('/{id}',[CategoryController::class,'destroy']);
});
Route::get('/assets',[AssetController::class,'index']);
Route::prefix('asset')->group(function(){
    Route::post('/store',[AssetController::class,'store']);
    Route::put('/{id}',[AssetController::class,'update']);
    Route::delete('/{id}',[AssetController::class,'destroy']);
    Route::get('/search',[AssetController::class,'search']);
});
Route::get('/suppliers',[SupplierController::class,'index']);
Route::prefix('/supplier')->group(function(){
    Route::post('/store',[SupplierController::class,'store']);
    Route::put('/{id}',[SupplierController::class,'update']);
    Route::delete('/{id}',[SupplierController::class,'destroy']);
});
Route::get('/moves',[AssetMoveController::class,'index']);
Route::prefix('/move')->group(function(){
    Route::post('/store',[AssetMoveController::class,'store']);
    Route::delete('/{id}',[AssetMoveController::class,'destroy']);
});
