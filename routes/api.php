<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public + logged-in-but-role-agnostic routes: register, verify, login, logout, me
foreach (glob(__DIR__.'/api/auth/*.php') as $file) {
    require $file;
}
 
// Customer-only routes 
Route::middleware(['auth:sanctum', 'role:customer'])
    ->prefix('customer')
    ->group(function () {
        foreach (glob(__DIR__.'/api/customer/*.php') as $file) {
            require $file;
        }
    });
 
// Farmer-only routes 
Route::middleware(['auth:sanctum', 'role:farmer'])
    ->prefix('farmer')
    ->group(function () {
        foreach (glob(__DIR__.'/api/farmer/*.php') as $file) {
            require $file;
        }
    });
 