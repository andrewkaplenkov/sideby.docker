<?php

namespace Lilo\Core\Router;

use FastRoute\RouteCollector;
use Lilo\Core\Http\Request;
use Lilo\Core\Http\Response;
use function FastRoute\simpleDispatcher;

class Router
{
    public static function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include BASE_PATH . '/routes/web.php';

            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }

        });

        $routeInfo = $dispatcher->dispatch(
            $request->get_method(),
            $request->get_path()
        );

        [$status, [$class, $method], $vars] = $routeInfo;

        return (new $class())->$method(...$vars);
    }
}