<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admins')->name('admins.')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index');
    Route::put('{id}/update-password', 'updatePassword');
    Route::put('{id}/update-profile', 'updateProfile');
});
