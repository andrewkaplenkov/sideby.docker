<?php

define('BASE_PATH', dirname(__DIR__));
require_once BASE_PATH . '/vendor/autoload.php';

include BASE_PATH . '/core/helpers.php';

$app = \Lilo\Core\App::create();
$app->run();
