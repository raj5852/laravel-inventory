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
Route::post('productinput',[ProductinputController::class,'index']);
Route::post('productname',[ProductinputController::class,'producctsnames']);




Route::post('customername',[ProductoutputController::class,'customername']);
Route::post('search',[ProductoutputController::class,'ajax']);
Route::post('save-print',[ProductoutputController::class,'sals']);
