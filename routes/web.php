<?php

declare(strict_types=1);

use App\Http\Controllers\Fs\AboutController;
use App\Http\Controllers\Fs\NewsletterController;
use App\Http\Controllers\Fs\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/', 'as' => 'fs.'], function () {

    Route::controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('post.index');
    });

    Route::controller(AboutController::class)->group(function () {
        Route::get('/about', 'index')->name('about.index');
    });

    Route::controller(NewsletterController::class)->group(function () {
        Route::get('/newsletter', 'index')->name('newsletter.index');
    });

});