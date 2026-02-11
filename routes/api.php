<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/top-spender', [App\Http\Controllers\CustomerController::class, 'getTopSpender']);

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

Route::get('/get-by-category', [App\Http\Controllers\ProductController::class, 'getByCategory']);

Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show']);

Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store']);
