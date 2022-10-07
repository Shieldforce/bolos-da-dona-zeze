<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        ini_set('memory_limit', '-1');

        ini_set('max_execution_time', '-1');

        date_default_timezone_set("America/Sao_Paulo");

        if(env("APP_ENV")=="local")
        {
            setlocale(LC_TIME, 'ptb.UTF-8');
        }

        if(env("APP_ENV")=="production")
        {
            setlocale(LC_TIME, 'pt_BR.utf8');
        }

        \Carbon\Carbon::setLocale('pt_BR');

        Schema::defaultStringLength(191);

        if(env('APP_ACTIVE_HTTPS')==true)
        {
            URL::forceScheme('https');
        }
    }
}
