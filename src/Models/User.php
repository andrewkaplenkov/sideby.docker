<?php

namespace App\Models;

use Lilo\Core\Database\ORM\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];
}