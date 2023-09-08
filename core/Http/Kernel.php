<?php

namespace Lilo\Core\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
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

//        dd($request->get_path());

        [$status, [$class, $method], $vars] = $routeInfo;

        return (new $class())->$method(...$vars);
    }
}