<?php

use App\Http\Controllers\Api\Customer\CartController;
use Illuminate\Support\Facades\Route;

Route::get('cart', [CartController::class, 'index']);
Route::post('cart/items', [CartController::class, 'addItem']);
Route::put('cart/items/{item}', [CartController::class, 'updateItem']);
Route::delete('cart/items/{item}', [CartController::class, 'removeItem']);
Route::delete('cart', [CartController::class, 'clear']);