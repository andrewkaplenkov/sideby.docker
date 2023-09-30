<?php

namespace Lilo\Core\Config;

class Config implements ConfigInterface
{

    private static function file_exists(string $file): string|false
    {
        $path = BASE_PATH . '/config/' . $file . '.php';
        return file_exists($path)
            ? $path
            : false;
    }

    public static function get_data(string $key, string $option = null): mixed
    {
        $conf = explode('.', $key);

        if (!static::file_exists($conf[0])) {
            echo "File does not exist";
            return null;
        }

        $file = require_once static::file_exists($conf[0]);
        $key = $conf[1] ?? null;

        if (!$key) {
            return $file;
        }

        return $option
            ? $file[$key][$option] ?? null
            : $file[$key];
    }
}