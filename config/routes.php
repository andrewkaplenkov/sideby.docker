<?php

use App\Http\Controllers\HomeController;
use Lilo\Core\Http\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/test', function () {
        return new \Lilo\Core\Http\Response\Response("TEST ROUTE");
    })
];