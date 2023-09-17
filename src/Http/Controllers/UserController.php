<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lilo\Core\App;
use Lilo\Core\Database\ORM\Model\ModelInterface;
use Lilo\Core\Http\Response;

class UserController
{
    private ModelInterface $model;

    public function __construct()
    {
        $this->model = App::resolve(User::class);
    }

    public function index(): Response
    {
        $users = $this->model->all();
        return new Response(json_encode($users));
    }

    public function show(int $id): Response
    {
        $user = $this->model->get($id);
        return new Response(json_encode($user));
    }
}