<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("auth/login", [ AuthController::class, "login" ])->name("auth.login");

Route::middleware(["ApiProtectedRouteJWT"])->name("api.")->group(function(){

    foreach (File::allFiles(__DIR__ . '/api') as $route_file) {
        require $route_file->getPathname();
    }

});
