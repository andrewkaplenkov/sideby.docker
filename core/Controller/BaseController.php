<?php

namespace Lilo\Core\Controller;

use Lilo\Core\App;
use Lilo\Core\Auth\Auth;
use Lilo\Core\Auth\AuthInterface;
use Lilo\Core\Database\Models\ModelInterface;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Http\Session\Session;
use Lilo\Core\Http\Session\SessionInterface;
use Lilo\Core\Storage\Storage;
use Lilo\Core\Storage\StorageInterface;
use Lilo\Core\View\View;
use Lilo\Core\View\ViewInterface;

abstract class BaseController implements BaseControllerInterface
{
    protected RequestInterface|string $request = Request::class;
    protected ViewInterface $view;
    protected ModelInterface|string $model = '';
    protected SessionInterface $session;
    protected AuthInterface $auth;
    protected StorageInterface $storage;

    public function __construct()
    {
        $this->request = $this->request::create_from_globals();
        $this->view = App::resolve(View::class);
        $this->model = empty($this->model) ? '' : new $this->model();
        $this->session = App::resolve(Session::class);
        $this->auth = App::resolve(Auth::class);
        $this->storage = App::resolve(Storage::class);
    }

    public function view(string $file, array $vars = []): void
    {
        $this->view->render($file, $vars);
    }
}
