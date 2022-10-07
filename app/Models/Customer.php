<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        "email"
    ];

    public function cakes_i_like()
    {
        return $this->belongsToMany(
            Customer::class,
            "interested_in_cakes",
            "customer_id",
            "cake_id",
        )->withPivot(["id", "customer_id","cake_id",]);
    }
}
