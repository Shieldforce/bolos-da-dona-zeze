<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        "email"
    ];

    public function cakesILike()
    {
        return $this->belongsToMany(
            Cake::class,
            "interested_in_cakes",
            "lead_id",
            "cake_id",
        )->withPivot(["id", "lead_id","cake_id",]);
    }
}
