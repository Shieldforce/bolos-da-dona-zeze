<?php

use App\Http\Controllers\Api\CakeController;
use Illuminate\Support\Facades\Route;

Route::prefix("/cake")->name("cake.")->group(function () {

    Route::get('/index', [ CakeController::class, "index" ])
        ->name("index");

    Route::post('/store', [ CakeController::class, "store" ])
        ->name("store");

    Route::get('/show/{cake}', [ CakeController::class, "show" ])
        ->name("show");

    Route::put('/update/{cake}', [ CakeController::class, "update" ])
        ->name("update");

    Route::delete('/destroy/{id}', [ CakeController::class, "destroy" ])
        ->name("destroy");

    Route::post('/addStock/{cake}', [ CakeController::class, "addStock" ])
        ->name("addStock");

    Route::post('/removeStock/{cake}', [ CakeController::class, "removeStock" ])
        ->name("removeStock");


});


