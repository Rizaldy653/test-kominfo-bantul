<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('contents.products');
});

Route::get('/products', function () {
    return view('contents.products');
})->name('dashboard');

Route::get('/data', [ProductController::class, 'index'])->name('products.index');