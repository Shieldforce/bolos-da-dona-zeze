<?php

declare(strict_types=1);

namespace App\Http\Middleware;

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
                return response()->json([
                    "status" => "error",
                    "message" => "Token inválido!",
                    "data" => null
                ], 401);
            }
            elseif($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return response()->json([
                    "status" => "error",
                    "message" => "Token expirado!",
                    "data" => null
                ], 401);
            }
            elseif($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException)
            {
                return response()->json([
                    "status" => "error",
                    "message" => "Token na lista negra!",
                    "data" => null
                ], 401);
            }
            else
            {
                return response()->json([
                    "status" => "error",
                    "message" => "Error ao gerar token!",
                    "data" => null
                ], 401);
            }
        }
        return $next($request);
    }
}
