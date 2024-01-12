<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\RentCarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserRegistrationController;

Route::post('login', UserLoginController::class);

Route::post('register', UserRegistrationController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', LogoutController::class);

    Route::prefix('cars')->name('cars')->controller(CarController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('overview', 'overview');
    });

    Route::prefix('rent')->name('rent')->controller(RentCarController::class)->group(function () {
        Route::post('/', 'store');
        Route::get('history', 'history');
    });

    Route::prefix('user')->name('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::put('{id}/update-profile', 'updateProfile');
        Route::put('{id}/update-password', 'updatePassword');
    });
});

