<?php

namespace App\Http\Controllers;

use Lilo\Core\Http\Response;

class UserController
{
    public function index(): Response
    {
        return new Response('users list');
    }

    public function show(int $id): Response
    {
        return new Response("user with id = $id");
    }
}