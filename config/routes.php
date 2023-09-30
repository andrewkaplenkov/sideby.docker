<?php

use App\Http\Controllers\Home\HomeController;
use Lilo\Core\Routing\Route\Route;

return [
    Route::get('/posts', function () {
        echo "posts list";
    }),
    Route::get('/home', [HomeController::class, 'index'])
];