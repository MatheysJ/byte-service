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

Route::apiResource("product", "App\Http\Controllers\ProductController");
Route::apiResource("product-category", "App\Http\Controllers\ProductCategoryController");
Route::apiResource("payment-method", "App\Http\Controllers\PaymentMethodController");
Route::apiResource("client", "App\Http\Controllers\ClientController");
Route::apiResource("order", "App\Http\Controllers\OrderController");