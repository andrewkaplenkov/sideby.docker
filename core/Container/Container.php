<?php

namespace Lilo\Core\Container;

class Container
{
    private array $bindings = [];

    public function __construct()
    {
        $this->bindings = include BASE_PATH . '/core/Container/dependencies.php';
    }

    public function bind(string $key, mixed $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key): mixed
    {
        return call_user_func($this->bindings[$key]);
    }
}