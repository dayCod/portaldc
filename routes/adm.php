<?php

declare(strict_types=1);

use App\Http\Controllers\Adm\DashboardController;
use App\Http\Controllers\Adm\UsersGroup\PermissionController;
use App\Http\Controllers\Adm\UsersGroup\RoleController;
use App\Http\Controllers\Adm\UsersGroup\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Adm Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'adm', 'as' => 'adm.', 'middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('index');

    // Role
    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('/', [RoleController::class, 'index'])
            ->name('index');
        Route::get('/create', [RoleController::class, 'create'])
            ->name('create');
        Route::post('/store', [RoleController::class, 'store'])
            ->name('store');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])
            ->name('edit');
        Route::put('/{role}/update', [RoleController::class, 'update'])
            ->name('update');
        Route::delete('/{role}/delete', [RoleController::class, 'delete'])
            ->name('delete');
    });

    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('index');
        Route::get('/create', [UserController::class, 'create'])
            ->name('create');
        Route::post('/store', [UserController::class, 'store'])
            ->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])
            ->name('edit');
        Route::put('/{user}/update', [UserController::class, 'update'])
            ->name('update');
        Route::delete('/{user}/delete', [UserController::class, 'delete'])
            ->name('delete');
    });

});
