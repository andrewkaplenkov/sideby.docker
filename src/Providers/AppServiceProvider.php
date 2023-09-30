<?php

namespace App\Providers;

use Lilo\Core\App;
use Lilo\Core\Http\Session\Session;

class AppServiceProvider
{
    public function __construct()
    {
        $this->register();
    }

    public function register(): void
    {
        App::bind(Session::class, fn() => Session::start());
    }
}