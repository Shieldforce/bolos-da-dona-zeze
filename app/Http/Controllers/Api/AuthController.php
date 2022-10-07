<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth("api")->attempt($credentials))
        {
            return response()->json([
                "status" => "error",
                "message" => "Erro ao se logar na api!",
                "data" => null
            ], 500);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json([
            "status" => "success",
            "message" => "Usuário retornado com sucesso!",
            "data" => new UserResource(auth("api")->user())
        ], 202);
    }

    public function logout()
    {
        auth("api")->logout();
        return response()->json([
            "status" => "success",
            "message" => "Deslogado com sucesso!",
            "data" => null
        ], 202);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth("api")->refresh());
    }

    protected function respondWithToken($token)
    {
        $return = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ];
        return response()->json([
            "status" => "success",
            "message" => "Logado com sucesso!",
            "data" => $return
        ], 202);
    }
}
