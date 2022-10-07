<?php

use App\Http\Controllers\Api\LeadController;
use Illuminate\Support\Facades\Route;

Route::prefix("/lead")->name("lead.")->group(function () {

    Route::post('/newsletter', [ LeadController::class, "newsletter" ])
        ->name("newsletter");

});


