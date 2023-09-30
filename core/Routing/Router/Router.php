<?php

namespace Lilo\Core\Routing\Router;

use Lilo\Core\Config\Config;
use Lilo\Core\Http\Request\RequestInterface;
use Lilo\Core\Routing\Route\Route;
use Lilo\Core\Routing\Route\RouteInterface;

class Router implements RouterInterface
{
    private array $routes = [];

    public function __construct()
    {
        $this->manage_routes();
    }

    /**
     * @return Route[]
     */
    private function get_routes(): array
    {
        return Config::get_data('routes');
    }

    public function manage_routes(): void
    {
        foreach ($this->get_routes() as $route) {
            [
                'method' => $method,
                'uri' => $uri
            ] = $route->info();

            $this->routes[$method][$uri] = $route;
        }
    }

    public function dispatch(RequestInterface $request): ?RouteInterface
    {
        $requested_method = $request->get_method();
        $requested_uri = $request->get_path();

        return $this->routes[$requested_method][$requested_uri] ?? null;
    }


    public function handle(RequestInterface $request): mixed
    {
        $route = $this->dispatch($request);

        if (!$route) {
            echo "404|NOT FOUND";
            exit;
        }

        return $route->execute();
    }
}