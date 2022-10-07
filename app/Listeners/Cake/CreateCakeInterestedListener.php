<?php

declare(strict_types=1);

namespace App\Listeners\Cake;

use App\Models\Lead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCakeInterestedListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $cake = $event->cake;
        $leadsIds = Lead::pluck("id");
        $cake->interested()->sync($leadsIds, true);
    }
}
