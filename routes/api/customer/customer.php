<?php

use App\Http\Controllers\Api\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('favorites', [CustomerController::class, 'favorites']);
Route::post('favorites', [CustomerController::class, 'storeFavorite']);
Route::delete('favorites/{product}', [CustomerController::class, 'destroyFavorite']);

Route::get('farm-favorites', [CustomerController::class, 'farmFavorites']);
Route::post('farm-favorites', [CustomerController::class, 'storeFarmFavorite']);
Route::delete('farm-favorites/{farm}', [CustomerController::class, 'destroyFarmFavorite']);

Route::post('reviews', [CustomerController::class, 'storeReview']);
Route::put('reviews/{review}', [CustomerController::class, 'updateReview']);
Route::delete('reviews/{review}', [CustomerController::class, 'destroyReview']);

Route::get('subscriptions', [CustomerController::class, 'subscriptions']);
Route::post('subscriptions', [CustomerController::class, 'storeSubscription']);
Route::put('subscriptions/{subscription}', [CustomerController::class, 'updateSubscription']);