<?php

use App\Http\Controllers\Api\Farmer\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{order}', [OrderController::class, 'show']);
Route::put('orders/{order}/status', [OrderController::class, 'updateStatus']);
Route::put('orders/{order}/mark-paid', [OrderController::class, 'markPaymentPaid']);
Route::post(
    '/orders/{order}/confirm',
    [OrderController::class, 'confirm']
);
