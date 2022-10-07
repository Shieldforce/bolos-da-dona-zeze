<?php

namespace App\Providers;

use App\Events\Cake\CakeStockEvent;
use App\Listeners\Cake\CreateCakeInterestedListener;
use App\Listeners\Cake\CreateCakeStockListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CakeStockEvent::class => [
            CreateCakeStockListener::class,
            CreateCakeInterestedListener::class,
        ]
    ];

    public function boot()
    {
        //
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
