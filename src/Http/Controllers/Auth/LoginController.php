<?php

namespace App\Http\Controllers\Auth;

use Lilo\Core\Controller\BaseController;

class LoginController extends BaseController
{

    public function index()
    {
        return view('auth/login');
    }

}