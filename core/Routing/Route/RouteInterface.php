<?php

namespace Lilo\Core\Routing\Route;

interface RouteInterface
{
    public static function get(string $uri, array|\Closure $handler): RouteInterface;

    public static function post(string $uri, array|\Closure $handler): RouteInterface;

    public function execute(): mixed;

    public function middleware(array $middlewares): RouteInterface;

    public function has_middlewares(): bool;

    public function get_middleware(string $middleware = null): mixed;

    public function info(): array;
}