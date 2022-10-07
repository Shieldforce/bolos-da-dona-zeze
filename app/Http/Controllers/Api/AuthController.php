<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Error;
use App\Response\Success;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth("api")->attempt($credentials))
        {
            return Error::generic(
                null,
                messageErrors(5004),
                "api"
            );
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return Success::generic(
            auth("api")->user(),
            messageSuccess(20003, "Usuário"),
            "api"
        );
    }

    public function logout()
    {
        auth("api")->logout();
        return Success::generic(
            auth("api")->user(),
            messageSuccess(10001),
            "api"
        );
    }

    public function refresh()
    {
        return $this->respondWithToken(auth("api")->refresh());
    }

    protected function respondWithToken($token)
    {
        $return = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ];
        return Success::generic(
            $return,
            messageSuccess(50000, "Logado com sucesso!"),
            "api"
        );
    }
}
