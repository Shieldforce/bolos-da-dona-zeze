<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix("/auth")->name("auth.")->group(function () {

    Route::post('/me', [ AuthController::class, "me" ])
        ->name("me");

    Route::post('/refresh', [ AuthController::class, "refresh" ])
    ->name("refresh");


    Route::post('/logout', [ AuthController::class, "logout" ])
    ->name("logout");

});


