<?php

use App\Http\Controllers\Api\Farmer\FarmerController;
use App\Http\Controllers\Api\Farmer\farmerController as FarmerFarmerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('farms', FarmerFarmerController::class);

Route::prefix('farms/{farm}')->group(function() {
    Route::get('fields', [FarmerController::class, 'fields']);
    Route::post('fields', [FarmerController::class, 'storeField']);
    Route::put('fields/{field}', [FarmerController::class, 'updateField']);
    Route::delete('fields/{field}', [FarmerController::class, 'destroyField']);
});