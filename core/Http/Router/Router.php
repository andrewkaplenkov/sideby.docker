<?php

namespace Lilo\Core\Http\Router;

use Lilo\Core\Http\Request\Request;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->configure_routes();
    }

    /**
     * @return Route[]
     */
    private function get_routes(): array
    {
        return include BASE_PATH . '/config/routes.php';
    }

    private function configure_routes(): void
    {
        foreach ($this->get_routes() as $route) {
            [
                'method' => $method,
                'uri' => $uri,
            ] = $route->info();
            $this->routes[$method][$uri] = $route;
        }
    }

    private function dispatch(Request $request): ?Route
    {
        $req_method = $request->get_method();
        $req_uri = $request->get_path();
        return $this->routes[$req_method][$req_uri] ?? null;
    }

    public function handle(Request $request): mixed
    {

        $route = $this->dispatch($request);

        return $route
            ? $route->execute()
            : view('errors/404');
    }
}