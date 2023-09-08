<?php

use DB\Factories\UserFactory;
use Lilo\Core\App;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request;

define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

(new App());

$seeder = new \Lilo\Core\Database\Seeder(UserFactory::class, 'users');
dd($seeder->seed(7));

(new Kernel())
    ->handle(App::resolve(Request::class))
    ->send();

