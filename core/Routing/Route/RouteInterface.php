<?php

namespace Lilo\Core\Routing\Route;

interface RouteInterface
{
    public static function get(string $uri, array|\Closure $handler): RouteInterface;

    public static function post(string $uri, array|\Closure $handler): RouteInterface;

    public function execute(): mixed;

    public function info(): array;
}