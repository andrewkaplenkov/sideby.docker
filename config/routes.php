<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use Lilo\Core\Http\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index'])->name('home.index'),
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login'),
    Route::get('/signup', [SignupController::class, 'index'])->name('auth.signup'),
    Route::get('/posts', [PostController::class, 'index']),
    Route::get('/posts/new', [PostController::class, 'create']),
    Route::post('/posts', [PostController::class, 'store'])
];