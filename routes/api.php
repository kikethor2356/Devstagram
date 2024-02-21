<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register',[AuthContoller::class,'register']);
Route::post('login',[AuthContoller::class,'login']);


Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::get('logout',[AuthContoller::class,'logout']);
    Route::get('products',[ProductController::class,'index']);
    Route::post('profile',[UserController::class,'profile']);

});