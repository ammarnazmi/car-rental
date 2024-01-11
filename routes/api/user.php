<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\RentCarController;

Route::post('login', UserLoginController::class);
// Route::post('logout', LogoutController::class);
Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('cars')->name('cars')->controller(CarController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/overview', 'overview');
    });

    Route::prefix('rent')->name('rent')->controller(RentCarController::class)->group(function () {
        Route::post('/', 'store');
    });
});

