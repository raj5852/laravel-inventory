<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ProductinputController;
use App\Http\Controllers\API\ProductoutputController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('login',[LoginController::class,'index']);

Route::post('productinput',[ProductinputController::class,'index'])->middleware('auth:sanctum');
Route::post('productname',[ProductinputController::class,'producctsnames'])->middleware('auth:sanctum');




Route::post('customername',[ProductoutputController::class,'customername'])->middleware('auth:sanctum');
Route::post('search',[ProductoutputController::class,'ajax'])->middleware('auth:sanctum');
Route::post('save-print',[ProductoutputController::class,'sals'])->middleware('auth:sanctum');
