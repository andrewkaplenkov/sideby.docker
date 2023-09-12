<?php

use Lilo\Core\Database\DB;
use Lilo\Core\Http\Request;

$app_dependencies = include BASE_PATH . '/src/Container/dependencies.php';

return [
    DB::class => function () {
        $db_config = include BASE_PATH . '/config/database.php';
        return DB::connect($db_config);
    },
    Request::class => function () {
        return Request::create_from_globals();
    },


    // Additional bindings
    ...$app_dependencies
];