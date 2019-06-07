<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.welcome')->name('index');
Route::get('/flash', static function () {
    flash('Hello world!', 'success');
    return redirect()->route('index');
});
