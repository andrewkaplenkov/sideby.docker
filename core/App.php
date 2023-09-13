<?php

namespace Lilo\Core;

use Lilo\Core\Container\Container;

class App
{
    private static ?self $instance = null;
    private string $name;
    public static ?Container $container = null;

    private function __construct()
    {
        $this->name = env('APP_NAME');
        static::$container = new Container();
    }

    public static function create(): static
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function bind(string $key, callable $resolver): void
    {
        static::$container->bind($key, $resolver);
    }


    public static function resolve(string $key): mixed
    {
        return static::$container->resolve($key);
    }

}