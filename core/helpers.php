<?php

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


function faker(): \Faker\Generator
{
    return Faker\Factory::create();
}