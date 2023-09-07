<?php


use Lilo\Core\Database\DB;

define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

DB::connect(include BASE_PATH . '/config/database.php');
$users = DB::execute(
    'SELECT * FROM users WHERE name = :name AND id = :id',
    ['name' => 'Admin', 'id' => 1]
)
    ->fetch();
dd($users);


