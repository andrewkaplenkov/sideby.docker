<?php

namespace Lilo\Core\Container;

class Container
{
    private array $bindings;

    public function __construct()
    {
        $this->bindings = include BASE_PATH . '/core/Container/bindings.php';
    }

    public function bindings(): array
    {
        return $this->bindings;
    }

    public function bind(string $classname, callable $resolver): void
    {
        $this->bindings[$classname] = $resolver;
    }

    public function resolve(string $classname): mixed
    {
        return call_user_func($this->bindings[$classname]);
    }
}