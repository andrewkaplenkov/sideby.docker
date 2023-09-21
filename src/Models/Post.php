<?php

namespace App\Models;

use Lilo\Core\Database\ORM\Model\Model;

class Post extends Model
{
    protected string $table = 'posts';
    protected array $fillable = [
        'title', 'body'
    ];
}