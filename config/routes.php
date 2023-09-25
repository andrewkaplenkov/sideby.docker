<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use Lilo\Core\Http\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::get('/signup', [SignupController::class, 'index']),
    Route::post('/signup', [SignupController::class, 'store']),
    Route::get('/posts', [PostController::class, 'index']),
    Route::get('/posts/new', [PostController::class, 'create']),
    Route::post('/posts', [PostController::class, 'store'])
];