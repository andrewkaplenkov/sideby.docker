<?php

namespace Lilo\Core;

use Lilo\Core\Container\Container;

class App
{
    public static ?Container $container = null;

    public function __construct()
    {
        static::$container = new Container();
    }

    public static function bind(string $key, mixed $resolver): void
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key): mixed
    {
        return static::$container->resolve($key);
    }

}