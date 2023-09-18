<?php

namespace Lilo\Core\Http\Router;

use Exception;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Response\Response;

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

    private function dispatch(Request $request): Route
    {
        $req_method = $request->get_method();
        $req_uri = $request->get_path();
        $route = $this->routes[$req_method][$req_uri] ?? null;

        return $route
            ?: throw new Exception("404 | NOT FOUND");
    }

    public function handle(Request $request): Response
    {
        try {
            return $this->dispatch($request)
                ->execute();
        } catch (Exception $e) {
            return view('errors/404');
        }
    }
}