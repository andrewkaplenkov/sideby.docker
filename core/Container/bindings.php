<?php

use App\Providers\AppServiceProvider;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Router\Router;

return [
    Request::class =>
        fn() => Request::create_from_globals(),
    Router::class =>
        fn() => new Router(),
    Kernel::class =>
        fn() => Kernel::create(),
    AppServiceProvider::class =>
        fn() => new AppServiceProvider(),
];
