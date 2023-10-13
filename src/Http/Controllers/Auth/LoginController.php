<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Lilo\Core\App;
use Lilo\Core\Auth\Auth;
use Lilo\Core\Http\Request\RequestInterface;

class LoginController extends Controller
{
    protected RequestInterface|string $request = AuthRequest::class;

    public function __construct()
    {
        parent::__construct();
        $this->auth = App::resolve(Auth::class);
    }

    public function index()
    {
        $this->view('auth/login', [
            'login_error' => "Not valid creds"
        ]);
    }

    public function login()
    {
        $data = $this->request->validated();

        if (!$this->auth->attempt(...$data)) {
            redirect('/login');
        }

        redirect('/');
    }

    public function logout()
    {
        $this->auth->logout();

        redirect('/');
    }
}