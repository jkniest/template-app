<?php

use App\Domain\Users\Controllers\ReadUsersController;
use App\Domain\Users\Controllers\BrowseUsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', BrowseUsersController::class)->name('index');
Route::get('/users/{user}', ReadUsersController::class)->name('read');
