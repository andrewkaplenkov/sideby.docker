<?php

namespace Lilo\Core\Controller;

use Lilo\Core\App;
use Lilo\Core\Database\ORM\Model\ModelInterface;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Http\Session\Session;

abstract class BaseController implements ControllerInterface
{
    protected RequestInterface|string|null $request = null;
    protected ModelInterface|string|null $model = null;

    protected Session $session;


    public function __construct()
    {
        $this->request = !$this->request
            ? App::resolve(Request::class)
            : $this->request::create_from_globals();

        $this->model = new $this->model() ?? null;
        $this->session = App::resolve(Session::class);
    }
}