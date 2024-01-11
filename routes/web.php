<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function() {
    return redirect('/login');
})->name('login');

Route::get('/login', function() {
    return view('user.userLoginForm');
});

Route::get('/register', function() {
    return view('user.userRegistrationForm');
});

Route::get('/cars', function () {
    return view('car.carListUser');
})->name('cars');

Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/login', function() {
        return view('admins.adminLoginForm');
    });
    Route::get('/profile', function () {
        return view('admins.adminProfile');
    })->name('profile');

    Route::get('/cars', function () {
        return view('car.carListAdmin');
    })->name('cars');
});

