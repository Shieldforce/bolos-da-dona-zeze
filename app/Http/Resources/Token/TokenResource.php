<?php

namespace App\Http\Resources\Token;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          "code"            => $this->code,
          "message"         => $this->message,
          "access_token"    => $this->access_token,
          "type_token"      => $this->type_token,
          "expires_in"      => $this->expires_in,
        ];
    }
}
