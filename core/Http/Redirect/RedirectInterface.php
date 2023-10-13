<?php

namespace Lilo\Core\Http\Redirect;

interface RedirectInterface
{
    public static function to(string $path): void;
}