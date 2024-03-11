<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fs\Auth\LoginController;
use App\Http\Controllers\Fs\Auth\LogoutController;
use App\Http\Controllers\Fs\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Auth User Routes
|--------------------------------------------------------------------------
*/
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});

Route::get('/logout', [LogoutController::class, 'userLogout'])
    ->name('logout');
