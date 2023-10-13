<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Lilo\Core\Routing\Route\Route;

return [
    Route::get('/', function () {
        redirect('home');
    }),
    Route::get('/home', [HomeController::class, 'index'])->middleware([GuestMiddleware::class]),
    Route::get('/posts', [PostController::class, 'index'])->middleware([GuestMiddleware::class]),
    Route::get('/posts/new', [PostController::class, 'create']),
    Route::post('/posts', [PostController::class, 'store']),
    Route::get('/login', [LoginController::class, 'index'])->middleware([AuthMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login']),
    Route::get('/logout', [LoginController::class, 'logout']),
    Route::get('/signup', [RegisterController::class, 'index'])->middleware([AuthMiddleware::class]),
    Route::post('/signup', [RegisterController::class, 'store']),
];