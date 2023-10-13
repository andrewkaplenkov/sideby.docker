<?php

namespace Lilo\Core\Http\Redirect;

class Redirect implements RedirectInterface
{

    public static function to(string $path): void
    {
        header("Location: $path");
        exit;
    }
}