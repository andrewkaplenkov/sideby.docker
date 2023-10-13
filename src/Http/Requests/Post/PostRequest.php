<?php

namespace App\Http\Requests\Post;

use Lilo\Core\Http\Request\Request;

class PostRequest extends Request
{
    protected array $validation_rules = [
        'title' => ['required', 'min:3', 'max:30'],
        'body' => ['required', 'min:3', 'max:2000']
    ];
}