<?php

namespace App\Middlewares;

use Lilo\Core\App;
use Lilo\Core\Auth\Auth;
use Lilo\Core\Auth\AuthInterface;
use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Middleware\AbstractMiddleware;

class GuestMiddleware extends AbstractMiddleware
{

    protected AuthInterface $auth;

    public function __construct(RequestInterface $request)
    {
        parent::__construct($request);
        $this->auth = App::resolve(Auth::class);
    }

    public function handle(): void
    {
        if (!$this->auth->check()) {
            redirect('/login');
        }
    }
}