<?php

use Lilo\Core\Http\Response\Response;
use Lilo\Core\View\View;

function env(string $key, string $default = ''): string
{
    $lines = file(BASE_PATH . '/.env');

    foreach ($lines as $idx => $line) {

        if (strlen($line) < 3 || str_contains($line, '#')) {
            unset($lines[$idx]);
            continue;
        }

        [$root_key, $root_value] = explode('=', $line, 2);
        $root_key = trim($root_key);
        $root_value = trim($root_value);

        putenv(sprintf('%s=%s', $root_key, $root_value));
        $_ENV[$root_key] = $root_value;
        $_SERVER[$root_key] = $root_value;
    }

    return getenv($key) ?: $default;
}

function view(string $view_name, array $vars = []): Response
{
    return new Response(
        (new View($view_name, $vars))->render()
    );
}

function component(string $name, mixed $view = []): string
{
    extract(['view' => $view]);
    include_once BASE_PATH . '/resources/components/' . $name . '.php';
    return '';
}


