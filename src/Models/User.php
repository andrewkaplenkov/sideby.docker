<?php

namespace App\Models;

use Lilo\Core\Database\Model;

class User extends Model
{
    public string $table = 'users';

    public array $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

}