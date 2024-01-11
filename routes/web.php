<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/profile', function () {
        return view('admins.adminProfile');
    })->name('profile');

    Route::get('/cars', function () {
        return view('car.carListAdmin');
    })->name('cars');
});

Route::get('/cars', function () {
    return view('car.carListUser');
})->name('cars');

