<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductPdfController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');

Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/products/brochure', [ProductPdfController::class, 'generate'])
    ->name('products.brochure');
