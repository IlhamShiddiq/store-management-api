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
    Route::get('/store', [StoreController::class, 'index'])->middleware(['permission:store crud']);
    Route::post('/store', [StoreController::class, 'store'])->middleware(['permission:store crud']);
    Route::get('/store/{store}', [StoreController::class, 'show'])->middleware(['permission:store crud']);
    Route::delete('/store/{store}', [StoreController::class, 'destroy'])->middleware(['permission:store crud']);
    Route::put('/store/{store}', [StoreController::class, 'update'])->middleware(['permission:store detail']);
    Route::resource('product', ProductController::class)->middleware(['permission:product crud']);
    Route::get('/product/bystore/{store}', [ProductController::class, 'productByStore'])->middleware(['permission:product crud']);
    Route::put('/product/stock/{product}', [ProductController::class, 'updateStock'])->middleware(['permission:product crud']);
    Route::post('/logout', [AuthController::class, 'logout']);
});