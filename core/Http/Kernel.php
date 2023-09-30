<?php

namespace Lilo\Core\Http;

use Lilo\Core\App;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Routing\Router\Router;
use Lilo\Core\Routing\Router\RouterInterface;

class Kernel
{
    private RequestInterface $request;
    private RouterInterface $router;

    public function __construct()
    {
        $this->request = App::resolve(Request::class);
        $this->router = App::resolve(Router::class);
    }

    public function handle(): mixed
    {
        return $this->router
            ->handle($this->request);
    }
}