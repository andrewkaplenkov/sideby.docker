<?php

namespace Lilo\Core\Http\Router;

use Closure;
use Lilo\Core\Http\Response\Response;

class Route
{
    private ?string $name = null;
    private array $middlewares = [];

    private function __construct(
        private readonly string        $method,
        private readonly string        $uri,
        private readonly Closure|array $handler,
    )
    {
    }

    public static function get(string $uri, Closure|array $handler): static
    {
        return new static('GET', $uri, $handler);
    }

    public static function post(string $uri, Closure|array $handler): static
    {
        return new static('POST', $uri, $handler);
    }

    public function middleware(string $middleware): static
    {
        $this->middlewares[] = $middleware;
        return $this;
    }

    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function execute(): Response
    {
        if (is_array($this->handler)) {
            return $this->execute_controller_action($this->handler);
        }

        return call_user_func($this->handler);
    }

    private function execute_controller_action(array $handler): Response
    {
        [$controller, $action] = $handler;
        $controller = new $controller();
        return call_user_func([$controller, $action]);
    }

    public function info(): array
    {
        return get_object_vars($this);
    }
}