<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Requests\UserRequest;
use DB\Factories\UserFactory;
use Lilo\Core\App;
use Lilo\Core\Http\Request;
use Lilo\Core\Http\Response;

class UserController
{
    private User $model;
    private Request $request;

    public function __construct()
    {
        $this->model = UserFactory::get_one();
        $this->request = App::resolve(Request::class);
    }

    public function index(): Response
    {
        $users = $this->model->all();
        return new Response(json_encode($users));
    }

    public function show(int $id): Response
    {
        $user = $this->model->get_by_id($id);
        return new Response(json_encode($user));
    }

    public function store(): Response
    {
        $attributes = $this->request->form_data();
        $this->model->set_attributes($attributes);
        $this->model->create();

        return new Response('user created');
    }

    public function destroy(int $id): Response
    {
        $this->model->destroy($id);
        return new Response("User {$id} deleted");
    }
}