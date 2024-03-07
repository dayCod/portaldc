<?php

declare(strict_types=1);

use App\Http\Controllers\Adm\DashboardController;
use App\Http\Controllers\Adm\GuestActivities\VisitorLogController;
use App\Http\Controllers\Adm\Portal\ArticleController;
use App\Http\Controllers\Adm\Portal\SubscriberController;
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

    // Visitor Log
    Route::group(['prefix' => 'visitor', 'as' => 'visitor.'], function () {
        Route::get('/', [VisitorLogController::class, 'index'])
            ->name('index');
    });

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

    // Article
    Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
        Route::get('/', [ArticleController::class, 'index'])
            ->name('index');
        Route::get('/create', [ArticleController::class, 'create'])
            ->name('create');
        Route::post('/store', [ArticleController::class, 'store'])
            ->name('store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])
            ->name('edit');
        Route::put('/{article}/update', [ArticleController::class, 'update'])
            ->name('update');
        Route::delete('/{article}/delete', [ArticleController::class, 'delete'])
            ->name('delete');
    });

    // Subscribers
    Route::group(['prefix' => 'subs', 'as' => 'subs.'], function () {
        Route::get('/', [SubscriberController::class, 'index'])
            ->name('index');
        Route::delete('/{subs}/delete', [SubscriberController::class, 'delete'])
            ->name('delete');
    });

});
