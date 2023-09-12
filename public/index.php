<?php

use Lilo\Core\App;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request;

define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

App::create();

$db = App::resolve(\Lilo\Core\Database\DB::class);
$table = $db->create_table('users');
$row = $table->add_row('id');
$row->set_datatype('serial');
dd($row);

(new Kernel())
    ->handle(App::resolve(Request::class))
    ->send();

