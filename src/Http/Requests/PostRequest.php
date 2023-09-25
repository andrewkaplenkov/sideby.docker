<?php

namespace App\Http\Requests;

use Lilo\Core\Http\Request\Request;

class PostRequest extends Request
{
    protected static ?array $validation_rules = [
        'title' => ['required', 'min:3', 'max:20'],
        'body' => ['required', 'max:200'],
    ];
}