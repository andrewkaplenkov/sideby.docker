<?php

namespace Lilo\Core;

use App\Providers\AppServiceProvider;
use Lilo\Core\Container\Container;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Session\Session;

class App
{
    private static ?App $instance = null;
    private static string $app_name;

    public static Container $container;

    private function __construct()
    {
        static::$app_name = env('APP_NAME');
        static::$container = new Container();
    }

    public static function create(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function bind(string $classname, callable $resolver): void
    {
        static::$container->bind($classname, $resolver);
    }

    public static function resolve(string $classname): mixed
    {
        return static::$container->resolve($classname);
    }

    private function boot(): array
    {
        return [
            'SERVICE_PROVIDER' => static::resolve(AppServiceProvider::class),
            'HTTP_KERNEL' => static::resolve(Kernel::class),
            'SESSION' => static::resolve(Session::class),
        ];
    }

    public function run()
    {
        [
            'HTTP_KERNEL' => $http_kernel
        ] = $this->boot();

        $http_kernel
            ->handle();
    }

    public function info(): array
    {
        return [
            static::$app_name,
            static::$container
        ];
    }
}