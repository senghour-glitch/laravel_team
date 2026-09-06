<?php

use App\Http\Controllers\Api\Customer\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [ProductController::class, 'categories']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products/{product}/reviews', [ProductController::class, 'reviews']);