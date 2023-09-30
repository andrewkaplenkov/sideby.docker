<?php

namespace Lilo\Core\Container;

use Lilo\Core\Config\Config;

class Container implements ContainerInterface
{
    public array $bindings;

    public function __construct()
    {
        $this->bindings = Config::get_data('bindings');
    }

    public function bindings(): array
    {
        return $this->bindings;
    }

    public function bind(string $key, \Closure $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function has(string $key): bool
    {
        return isset($this->bindings[$key]);
    }

    public function resolve(string $key): mixed
    {
        return $this->has($key)
            ? call_user_func($this->bindings[$key])
            : throw new \Exception("No resolver for $key");
    }
}