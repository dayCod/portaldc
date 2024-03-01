<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('fs.index');
});

Route::get('/detail', function () {
    return view('fs.detail');
});

Route::get('/about', function () {
    return view('fs.about');
});

Route::get('/subs', function () {
    return view('fs.subs');
});
