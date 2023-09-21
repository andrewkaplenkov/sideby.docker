<?php

namespace App\Http\Controllers\Auth;

use Lilo\Core\Controller\BaseController;

class SignupController extends BaseController
{

    public function index()
    {
        return view('auth/signup');
    }

}