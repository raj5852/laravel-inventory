<?php

use App\Http\Controllers\CreatecustomerName;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductcreateController;
use App\Http\Controllers\ProductinputController;
use App\Http\Controllers\ProductsaleController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');

Route::post('/', [LoginController::class, 'postLogin'])->name('loginpost');
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('productinput', [ProductinputController::class, 'index'])->name('productinput');
    Route::post('store', [ProductinputController::class, 'store'])->name('store');
    Route::get('product-sale', [ProductsaleController::class, 'index'])->name('productsale');
    Route::post('ajax', [ProductsaleController::class, 'ajax'])->name('ajax');
    Route::post('sale', [ProductsaleController::class, 'sals']);
    Route::get('stock', [StockController::class, 'index'])->name('stock');
    Route::get('product-create', [ProductcreateController::class, 'index'])->name('productcreate');
    Route::post('creatporuct', [ProductcreateController::class, 'post'])->name('creatporuct');
    Route::get('pds/{id}', [ProductcreateController::class, 'pds']);
    Route::get('create-customer', [CreatecustomerName::class, 'index'])->name('createcustomer');
    Route::post('create-customer-post', [CreatecustomerName::class, 'post'])->name('createcustomerpost');
    Route::get('cus/{id}', [CreatecustomerName::class, 'delete']);
});

//product-output
