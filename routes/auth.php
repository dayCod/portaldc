<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\ConfigurationSetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect()
            ->route('auth.login');
    });

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/logout', [LogoutController::class, 'logout'])
        ->withoutMiddleware(['guest'])
        ->middleware(['auth'])
        ->name('logout');

    Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
        Route::get('/', [ConfigurationSetupController::class, 'index'])
            ->name('index');
        Route::post('/send-token', [ConfigurationSetupController::class, 'sendToken'])
            ->name('send_token');
        Route::get('/token-confirmation-form', [ConfigurationSetupController::class, 'tokenConfirmationForm'])
            ->name('token_confirmation_form');
        Route::post('/token-confirmation', [ConfigurationSetupController::class, 'tokenConfirmation'])
            ->name('token_confirmation');
    });

});
