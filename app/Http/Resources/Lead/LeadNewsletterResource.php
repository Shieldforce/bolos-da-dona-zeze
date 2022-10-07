<?php

namespace App\Http\Resources\Lead;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadNewsletterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "cakes_i_like" => $this->cakesILike->pluck("name")
        ];
    }
}
