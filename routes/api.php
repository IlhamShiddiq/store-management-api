<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\StoreController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']],function () {
    Route::resource('category', CategoryController::class)->middleware(['permission:category crud']);
    Route::resource('admin', AdminController::class)->middleware(['permission:admin crud']);
    Route::resource('store', StoreController::class)->middleware(['permission:store crud']);
    Route::resource('product', ProductController::class)->middleware(['permission:product crud']);
    Route::post('/logout', [AuthController::class, 'logout']);
});