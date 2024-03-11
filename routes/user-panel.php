<?php

declare(strict_types=1);

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

});
