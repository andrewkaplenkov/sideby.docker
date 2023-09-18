<?php

namespace App\Providers;

class AppServiceProvider
{
    public function __construct()
    {
        $this->register();
    }

    private function register(): void
    {
        // App::bind();
    }

}