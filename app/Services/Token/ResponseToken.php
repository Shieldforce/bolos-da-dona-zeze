<?php

declare(strict_types=1);

namespace App\Services\Token;

class ResponseToken
{
    public int $code;
    public string $message;
    public string $access_token;
    public string $type_token;
    public int $expires_in;

    public function __construct(int $code, string $message, string $access_token=null, string $type_token="Bearer", int $expires_in=0)
    {
        $this->code = $code;
        $this->message = $message;
        $this->access_token = $access_token;
        $this->type_token = $type_token;
        $this->expires_in = $expires_in;
    }
}