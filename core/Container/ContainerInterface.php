<?php

namespace Lilo\Core\Container;

interface ContainerInterface
{
    public function bindings(): array;

    public function bind(string $key, \Closure $resolver): void;

    public function has(string $key): bool;

    public function resolve(string $key): mixed;
}