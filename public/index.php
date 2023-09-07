<?php

define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

dd(env('APP_NAME', 'aaa'));