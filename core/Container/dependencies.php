<?php

use Lilo\Core\Database\DB;
use Lilo\Core\Http\Request;


return [
    DB::class => function () {
        $db_config = include BASE_PATH . '/config/database.php';
        return DB::connect($db_config);
    },
    Request::class => function () {
        return Request::create_from_globals();
    },


    // Additional bindings
    ...(include BASE_PATH . '/src/Container/dependencies.php')
];