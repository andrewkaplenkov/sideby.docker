<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Lilo\Core\Controller\BaseController;

class SignupController extends BaseController
{
    protected static ?string $model_name = User::class;

    public function index()
    {
        return view('auth/signup');
    }

    public function store()
    {
        $data = $this->request->form_data();
        $this->model->store($data);
        header('Location: /');
    }

}