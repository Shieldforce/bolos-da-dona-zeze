<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestedInCakes extends Model
{
    protected $table = "interested_in_cakes";

    protected $fillable = [
        'cake_id',
        'lead_id',
    ];

    public function lead()
    {
        return $this->hasOne(Lead::class, "id", "lead_id");
    }

    public function cake()
    {
        return $this->hasOne(Cake::class, "id", "cake_id");
    }
}
