<?php

use Lilo\Core\App;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request;


define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

App::create();
$user = new \App\Models\User();
$user->get(4);


(new Kernel())
    ->handle(App::resolve(Request::class))
    ->send();

