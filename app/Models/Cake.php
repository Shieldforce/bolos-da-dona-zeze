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
    ];

    public function interested()
    {
        return $this->belongsToMany(
            Lead::class,
            "interested_in_cakes",
            "cake_id",
            "lead_id",
        )->withPivot(["id", "cake_id","lead_id",]);
    }

    public function stock()
    {
        return $this->hasMany(CakeStock::class, "cake_id", "id");
    }
}
