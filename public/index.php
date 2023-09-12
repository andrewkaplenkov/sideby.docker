<?php

use App\Models\User;
use DB\Factories\UserFactory;
use Lilo\Core\App;
use Lilo\Core\Http\Kernel;
use Lilo\Core\Http\Request;

define('BASE_PATH', dirname(__DIR__));
include BASE_PATH . '/core/helpers.php';

require_once BASE_PATH . '/vendor/autoload.php';

App::create();

$user = User::create_model('users', [
    'name' => 'Lilo',
    'password' => '1234'
]);
$user2 = UserFactory::get_one([
    'name' => 'AYAZ',
    'password' => '678'
]);

dd($user2, $user);

(new Kernel())
    ->handle(App::resolve(Request::class))
    ->send();

