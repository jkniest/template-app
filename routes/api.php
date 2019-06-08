<?php

use App\Domain\Users\ApiControllers\BrowseUsersController;
use App\Domain\Users\ApiControllers\CreateUsersController;
use App\Domain\Users\ApiControllers\DeleteUsersController;
use App\Domain\Users\ApiControllers\ReadUsersController;
use App\Domain\Users\ApiControllers\UpdateUsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/users', 'as' => 'api.users.'], static function () {
    Route::get('/', BrowseUsersController::class)->name('browse');
    Route::post('/', CreateUsersController::class)->name('store');
    Route::get('/{user}', ReadUsersController::class)->name('read');
    Route::patch('/{user}', UpdateUsersController::class)->name('update');
    Route::delete('/{user}', DeleteUsersController::class)->name('destroy');
});
