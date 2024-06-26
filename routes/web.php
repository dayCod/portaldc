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
Route::group(['prefix' => '/', 'as' => 'fs.', 'middleware' => ['visitor']], function () {

    // Post Controller
    Route::controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('post.index');
        Route::get('/{slug}/post', 'detail')->name('post.detail');
        Route::get('/{slug}/likes', 'increaseLikes')->name('post.likes');
    });

    // About Controller
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about', 'index')->name('about.index');
    });

    // Newsletter Controller
    Route::controller(NewsletterController::class)->group(function () {
        Route::get('/newsletter', 'index')->name('newsletter.index');
        Route::post('/newsletter/submit', 'submit')->name('newsletter.submit');
    });

    // User Panel
    require __DIR__ . '/user-panel.php';

    // Auth User
    require __DIR__ . '/auth-user.php';
});

require __DIR__ . '/adm.php';
require __DIR__ . '/auth-admin.php';
