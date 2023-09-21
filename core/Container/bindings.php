<?php

use App\Providers\AppServiceProvider;
use Lilo\Core\Database\DB;
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
    DB::class =>
        fn() => DB::connect(BASE_PATH . '/config/database.php'),
    AppServiceProvider::class =>
        fn() => new AppServiceProvider(),
];
