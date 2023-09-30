<?php

namespace Lilo\Core\Config;

interface ConfigInterface
{
    public static function get_data(string $key, string $option = null): mixed;
}