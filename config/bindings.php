<?php


use App\Providers\AppServiceProvider;
use Lilo\Core\Auth\Auth;
use Lilo\Core\Database\DB;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Routing\Router\Router;
use Lilo\Core\Storage\Storage;
use Lilo\Core\View\View;

return [
    AppServiceProvider::class =>
        fn() => new AppServiceProvider(),
    Request::class =>
        fn() => Request::create_from_globals(),
    Kernel::class =>
        fn() => new Kernel(),
    Router::class =>
        fn() => new Router(),
    DB::class =>
        fn() => DB::connect(),
    View::class =>
        fn() => new View(),
    Auth::class =>
        fn() => new Auth(),
    Storage::class =>
        fn() => new Storage(),
];
