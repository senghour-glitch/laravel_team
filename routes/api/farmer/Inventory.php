
Inventory · PHP
<?php
 
use App\Http\Controllers\Api\Farmer\InventoryController;
use Illuminate\Support\Facades\Route;
 
Route::get('inventory-categories', [InventoryController::class, 'categories']);
Route::post('inventory-categories', [InventoryController::class, 'storeCategory']);
 
Route::prefix('farms/{farm}/inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'index']);
    Route::post('/', [InventoryController::class, 'store']);
    Route::put('{item}', [InventoryController::class, 'update']);
    Route::delete('{item}', [InventoryController::class, 'destroy']);
});
 
