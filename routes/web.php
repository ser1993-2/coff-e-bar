<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BarController;
use \App\Http\Controllers\DrinkController;
use \App\Http\Controllers\StorageController;
use \App\Http\Controllers\ConsumableController;
use \App\Http\Controllers\StorageConsumableController;
use \App\Http\Controllers\DrinkRecipeController;
use \App\Http\Controllers\AuditController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/bars')->group(function () {
    Route::get('/', [BarController::class, 'getAllBars']);
    Route::get('/{id}', [BarController::class, 'getBar']);
});

Route::prefix('/drinks')->group(function () {
    Route::get('/', [DrinkController::class, 'getAllDrinks']);
    Route::get('/{id}', [DrinkController::class, 'getDrink']);
    Route::get('/recipe/{id}', [DrinkRecipeController::class, 'getRecipeForDrink']);
});

Route::prefix('/storages')->group(function () {
    Route::get('/', [StorageController::class, 'getAllStorages']);
    Route::get('/{id}', [StorageController::class, 'getStorage']);
    Route::get('/bar/{id}', [StorageController::class, 'getStorageByBarId']);
});

Route::prefix('/consumables')->group(function () {
    Route::get('/', [ConsumableController::class, 'getAllConsumables']);
    Route::get('/{id}', [ConsumableController::class, 'getConsumable']);
    Route::get('/storage/{id}', [StorageConsumableController::class, 'getConsumableForStorage']);
});

Route::prefix('/audit')->group(function () {
    Route::get('/', [AuditController::class, 'getAllAudits']);
    Route::post('/', [AuditController::class, 'storeAudit']);
});
