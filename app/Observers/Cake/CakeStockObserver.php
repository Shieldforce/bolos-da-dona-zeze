<?php

namespace App\Observers\Cake;

use App\Models\CakeStock;
use Illuminate\Database\Eloquent\Model;

class CakeStockObserver
{
    public function created(Model $model)
    {
        CakeStock::create([

        ]);
    }
}
