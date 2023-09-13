<?php

use App\Http\Controllers\UserController;
use Lilo\Core\Router\Route;

return [
    Route::get('/users', [UserController::class, 'index']),
    Route::get('/users/{id:\d+}', [UserController::class, 'show'])
];