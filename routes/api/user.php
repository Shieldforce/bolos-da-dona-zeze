<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix("/user")->name("user.")->group(function () {

    Route::get("index", [ UsersController::class, "index" ])
    ->name("index");

});
