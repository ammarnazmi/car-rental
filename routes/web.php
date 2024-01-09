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

Route::get('/', function () {
    return view('admins.adminProfile');
});

Route::prefix('admins')->name('admins.')->controller(AdminController::class)->group(function () {
    Route::get('{id}', 'show')->name('show');
    Route::put('{id}', 'update')->name('update');
});
