<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductPdfController;
use App\Http\Controllers\InquiryController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');

Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/products/brochure', [ProductPdfController::class, 'generate'])
    ->name('products.brochure');


Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
