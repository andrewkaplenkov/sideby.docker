<?php

namespace DB\Factories;

use App\Models\User;
use Lilo\Core\Database\ORM\Factory\ModelFactory;

class UserFactory extends ModelFactory
{
    protected string $modelName = User::class;
}