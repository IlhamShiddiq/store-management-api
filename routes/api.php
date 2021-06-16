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
    Route::resource('category', CategoryController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('store', StoreController::class);
    // Route::post('/store/add-admin', [StoreController::class, 'add_admin']);
    Route::resource('product', ProductController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});