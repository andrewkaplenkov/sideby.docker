<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Lilo\Core\Database\Models\ModelInterface;
use Lilo\Core\Http\Request\RequestInterface;

class RegisterController extends Controller
{
    protected RequestInterface|string $request = AuthRequest::class;
    protected ModelInterface|string $model = User::class;

    public function index()
    {
        $this->view('auth/signup', [
            'errors' => $this->session->get_flash('errors')
        ]);
    }

    public function store()
    {
        $data = $this->request->validated();

        if (!$data) {
            $this->session->set('errors', $this->request->errors());
            redirect('/signup');
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->model->store($data);
        redirect('/');
    }
}