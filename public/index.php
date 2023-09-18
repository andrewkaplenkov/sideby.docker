<?php

use Lilo\Core\App;

define('BASE_PATH', dirname(__DIR__));
require_once BASE_PATH . '/vendor/autoload.php';

include BASE_PATH . '/core/helpers.php';

$app = App::create();
$app->run();



