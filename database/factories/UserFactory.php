<?php

namespace DB\Factories;

use App\Models\User;
use Lilo\Core\Database\AbstractFactory;

class UserFactory extends AbstractFactory
{
    public static mixed $model = User::class;
    public static string $table = 'users';

    protected static function set_random_attributes(): void
    {
        static::$attributes = [
            'name' => faker()->name(),
            'email' => faker()->email(),
            'password' => faker()->password(),
            'is_admin' => 0
        ];
    }
}