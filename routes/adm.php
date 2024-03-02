<?php

declare(strict_types=1);

use App\Http\Controllers\Adm\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Adm Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'adm', 'as' => 'adm.'], function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('index');

});
