<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("https://documenter.getpostman.com/view/3645910/2s83zgu57V");
});

Route::middleware(["ApiProtectedRouteJWT"])->name("panel.")->group(function(){

    foreach (File::allFiles(__DIR__ . '/web') as $route_file) {
        require $route_file->getPathname();
    }

});
