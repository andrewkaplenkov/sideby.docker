<?php

namespace Lilo\Core\Routing\Router;

use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Routing\Route\RouteInterface;

interface RouterInterface
{
    public function manage_routes(): void;

    public function dispatch(RequestInterface $request): ?RouteInterface;

    public function handle(RequestInterface $request): mixed;
}