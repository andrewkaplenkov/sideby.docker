<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lilo\Core\App;
use Lilo\Core\Http\Request;
use Lilo\Core\Http\Response;

class UserController
{
    private User $model;
    private Request $request;

    public function __construct()
    {
        $this->model = App::resolve(User::class);
        $this->request = App::resolve(Request::class);
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

    public function store(): Response
    {
        $attributes = $this->request->form_data();
        $this->model->create($attributes);
        return new Response('User created');
    }

    public function delete(int $id): Response
    {
        $this->model->delete($id);
        return new Response("user $id deleted");
    }
}