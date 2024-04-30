<?php

declare(strict_types=1);

use App\Http\Controllers\Fs\Panel\ProfileController;
use App\Http\Controllers\Fs\Panel\StatsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'panel', 'as' => 'panel.'], function () {

    // My Stats
    Route::group(['prefix' => 'stats', 'as' => 'stats.'], function () {
        Route::get('/', [StatsController::class, 'index'])
            ->name('index');
    });

    // My Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])
            ->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])
            ->name('edit');
        Route::post('/update', [ProfileController::class, 'update'])
            ->name('update');
    });

});
