<?php

namespace Lilo\Core;

use App\Providers\AppServiceProvider;
use Lilo\Core\Container\Container;
use Lilo\Core\Container\ContainerInterface;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Session\Session;

class App
{
    public static ?App $instance = null;
    public static ?string $name = null;

    private static ?ContainerInterface $container = null;

    private function __construct()
    {
        static::$name = env('APP_NAME', 'DEFINE_YOUR_APP_NAME');
        static::$container = new Container();
    }

    public static function create(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function boot(): array
    {
        return [
            'USER_SERVICE_PROVIDER' => static::resolve(AppServiceProvider::class),
            'HTTP_KERNEL' => static::resolve(Kernel::class),
            'SESSION' => static::resolve(Session::class),
        ];
    }

    public function run()
    {
        [
            'HTTP_KERNEL' => $http_kernel
        ] = $this->boot();

        $http_kernel->handle();
    }

    //Container
    public static function container(): ContainerInterface
    {
        return static::$container;
    }

    public static function set_container(ContainerInterface $container): void
    {
        static::$container = $container;
    }

    public static function bind(string $key, \Closure $resolver): void
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key): mixed
    {
        try {
            return static::$container->resolve($key);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}