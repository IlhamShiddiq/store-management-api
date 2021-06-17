<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;

Route::get('/', [DocsController::class, 'index']);
Route::get('/docs', [DocsController::class, 'index']);
Route::get('/docs/login-logout', [DocsController::class, 'login_logout']);
Route::get('/docs/store-data', [DocsController::class, 'store']);
Route::get('/docs/admin-data', [DocsController::class, 'admin']);
Route::get('/docs/category-data', [DocsController::class, 'category']);
Route::get('/docs/product-data', [DocsController::class, 'product']);
