<?php

use App\Http\Controllers\Api\Farmer\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [ProductController::class, 'categories']);
Route::post('categories', [ProductController::class, 'storeCategory']);

Route::prefix('farms/{farm}/products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('{product}', [ProductController::class, 'show']);
    Route::put('{product}', [ProductController::class, 'update']);
    Route::delete('{product}', [ProductController::class, 'destroy']);

    Route::post('{product}/images', [ProductController::class, 'storeImage']);
    Route::delete('{product}/images/{image}', [ProductController::class, 'destroyImage']);
});