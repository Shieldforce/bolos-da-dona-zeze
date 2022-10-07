<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CakeStock extends Model
{
    protected $table = "cake_stock";

    protected $fillable = [
        'cake_id',
        'amount',
    ];

    public function cake()
    {
        return $this->hasOne(Cake::class, "id", "cake_id");
    }
}
