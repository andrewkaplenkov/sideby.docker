<?php

namespace Lilo\Core\Http\Request;

use Lilo\Core\Validator\Validator;

interface RequestInterface
{
    public static function create_from_globals(): static;

    public function get_method(): string;

    public function get_path(): string;

    public function query_params(): array;

    public function form_data(): array;

    public function input(string $key, string $default = null): ?string;

    public function validator(): ?Validator;

    public function validated(): array|false;

    public function errors(): array;
}