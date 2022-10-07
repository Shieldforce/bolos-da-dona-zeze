<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Success;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $model;

    protected $request;

    protected $user;

    public function __construct
    (
        Request $request,
        User $model
    )
    {
        $this->request = $request;
        $this->model = $model;
        $this->request["model"] = $this->model;
    }

    public function index()
    {
        $list = $this->model->paginate(20);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Usuários mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

}
