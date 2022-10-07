<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\Cake\CakeStockObserver;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'value',
    ];

    public function interested()
    {
        return $this->belongsToMany(
            Customer::class,
            "interested_in_cakes",
            "cake_id",
            "customer_id",
        )->withPivot(["id", "cake_id","customer_id",]);
    }

    public function stock()
    {
        return $this->hasMany(CakeStock::class, "cake_id", "id");
    }
}
