<?php

namespace App\Http\Resources\Cake;

use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "weight" => number_format($this->weight, 3, "", ""),
            "value" => "R$" . number_format($this->value, 2, ".", ","),
            "amount" => $this->amount,
            "stock" => $this->stock->first()->amount ?? 0,
            "interested" => $this->interested->pluck("email"),
            "created_at" => $this->created_at ? $this->created_at->diffForHumans() : null,
            "update_at" => $this->update_at ? $this->update_at->diffForHumans() : null,
        ];
    }
}
