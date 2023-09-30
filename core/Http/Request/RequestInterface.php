<?php

namespace Lilo\Core\Http\Request;

use Lilo\Core\Http\Validator\ValidtorInterface;

interface RequestInterface
{

    public function get_method(): string;

    public function get_path(): string;

    public function input(string $key = null): mixed;

    public function query_params(string $key = null): mixed;

    public function validator(ValidtorInterface $validator = null): ValidtorInterface;

    public function validated(array $rules = null): array|false;

    public function errors(): array;
}