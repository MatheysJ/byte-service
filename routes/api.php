<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

Route::get("product", [ProductController::class, 'index']);
Route::get("product/{id}", [ProductController::class, 'show']);
    
Route::get("product-category", [ProductCategoryController::class, 'index']);
Route::get("product-category/{id}", [ProductCategoryController::class, 'show']);

Route::get("payment-method", [PaymentMethodController::class, 'index']);
Route::get("payment-method/{id}", [PaymentMethodController::class, 'show']);

Route::get("client", [ClientController::class, 'index']);
Route::get("client/{id}", [ClientController::class, 'show']);

Route::get("order", [OrderController::class, 'index']);
Route::get("order/{id}", [OrderController::class, 'show']);


Route::group([ "middleware" => "auth:sanctum" ], function () {

    Route::post("product", [ProductController::class, 'store']);
    Route::put("product/{id}", [ProductController::class, 'update']);
    Route::delete("product/{id}", [ProductController::class, 'destroy']);
    
    Route::post("product-category", [ProductCategoryController::class, 'store']);
    Route::put("product-category/{id}", [ProductCategoryController::class, 'update']);
    Route::delete("product-category/{id}", [ProductCategoryController::class, 'destroy']);
    
    Route::post("payment-method", [PaymentMethodController::class, 'store']);
    Route::put("payment-method/{id}", [PaymentMethodController::class, 'update']);
    Route::delete("payment-method/{id}", [PaymentMethodController::class, 'destroy']);
    
    Route::post("client", [ClientController::class, 'store']);
    Route::put("client/{id}", [ClientController::class, 'update']);
    Route::delete("client/{id}", [ClientController::class, 'destroy']);

    Route::post("order", [OrderController::class, 'store']);
    Route::put("order/{id}", [OrderController::class, 'update']);
    Route::delete("order/{id}", [OrderController::class, 'destroy']);
    
});

Route::post("register", [UserController::class, 'createUser']);
Route::post("login", [UserController::class, 'loginUser']);