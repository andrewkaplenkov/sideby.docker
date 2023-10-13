<?php

namespace Lilo\Core\Routing\Route;

class Route implements RouteInterface
{
    public function __construct(
        private readonly string         $method,
        private readonly string         $uri,
        private readonly array|\Closure $handler,
        private array                   $middlewares = []
    )
    {
    }

    public static function get(string $uri, array|\Closure $handler): RouteInterface
    {
        return new static(
            'GET', $uri, $handler
        );
    }

    public static function post(string $uri, array|\Closure $handler): RouteInterface
    {
        return new static(
            'POST', $uri, $handler
        );
    }

    public function execute(): mixed
    {
        if (is_array($this->handler)) {
            [$controller, $method] = $this->handler;
            $controller = new $controller();
            return call_user_func([$controller, $method]);
        }

        return call_user_func($this->handler);
    }

    public function middleware(array $middlewares): RouteInterface
    {
        $this->middlewares = [...$middlewares];
        return $this;
    }

    public function has_middlewares(): bool
    {
        return !empty($this->middlewares);
    }

    public function get_middleware(string $middleware = null): mixed
    {
        if (!$middleware) {
            return $this->middlewares;
        } else {
            return $this->middlewares[$middleware] ?? null;
        }
    }

    public function info(): array
    {
        return get_object_vars($this);
    }
}