<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'value',
        'amount',
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
}
