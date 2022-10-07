<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Http\Resources\Token\TokenResource;
use App\Services\Token\ResponseToken;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiProtectedRouteJWT
{
    public function handle(Request $request, Closure $next)
    {
        try
        {
            JWTAuth::parseToken()->authenticate();
        }
        catch(\Exception $exception)
        {
            if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return new TokenResource(new ResponseToken(
                    500,
                    "Token inválido!",
                    "",
                    "Bearer",
                    0,
                ));
            }
            elseif($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return new TokenResource(new ResponseToken(
                    500,
                    "Token expirado!",
                    "",
                    "Bearer",
                    0,
                ));
            }
            elseif($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException)
            {
                return new TokenResource(new ResponseToken(
                    500,
                    "Token na lista negra!",
                    "",
                    "Bearer",
                    0,
                ));
            }
            else
            {
                return new TokenResource(new ResponseToken(
                    500,
                    "Erro ao gerar token!!",
                    "",
                    "Bearer",
                    0,
                ));
            }
        }
        return $next($request);
    }
}
