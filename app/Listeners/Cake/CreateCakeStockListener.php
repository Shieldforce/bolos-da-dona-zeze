<?php

declare(strict_types=1);

namespace App\Listeners\Cake;

use App\Models\CakeStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCakeStockListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $request = $event->request;
        $cake = $event->cake;
        CakeStock::updateOrCreate([
            "cake_id" => $cake->id
        ],[
            "cake_id" => $cake->id,
            "amount" => $request->stock["amount"] ?? $cake->stock->first()->amount ?? 0,
        ]);
    }
}
