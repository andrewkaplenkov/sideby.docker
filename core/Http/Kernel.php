<?php

namespace Lilo\Core\Http;

use Lilo\Core\App;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Router\Router;

class Kernel
{
    public static ?Kernel $instance = null;
    public Request $request;
    public Router $router;

    private function __construct()
    {
        $this->request = App::resolve(Request::class);
        $this->router = App::resolve(Router::class);
    }

    public static function create(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function handle(): void
    {
        $this->router
            ->handle($this->request)
            ->send();
    }
}