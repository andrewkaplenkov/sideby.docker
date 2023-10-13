<?php

namespace App\Http\Requests\Auth;

use Lilo\Core\Http\Request\Request;

class AuthRequest extends Request
{
    protected array $validation_rules = [
        'name' => ['max:200'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8']
    ];
}