<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Token\TokenResource;
use App\Http\Resources\User\UserResource;
use App\Services\Token\ResponseToken;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth("api")->attempt($credentials))
        {
            return new TokenResource(new ResponseToken(
                500,
                "Erro ao logar!",
                "",
                "Bearer",
                0,
            ));
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return new UserResource(auth("api")->user());
    }

    public function logout()
    {
        auth("api")->logout();
        return true;
    }

    public function refresh()
    {
        return $this->respondWithToken(auth("api")->refresh());
    }

    protected function respondWithToken($token)
    {
        return new TokenResource(new ResponseToken(
            500,
            "Logado com sucesso!",
            (string) $token,
            "Bearer",
            auth("api")->factory()->getTTL() * 60,
        ));
    }
}
