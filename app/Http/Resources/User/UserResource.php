<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "created_at" => $this->created_at ? $this->created_at->diffForHumans() : null,
            "update_at" => $this->update_at ? $this->update_at->diffForHumans() : null,
        ];
    }
}
