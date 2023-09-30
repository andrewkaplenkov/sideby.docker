<?php

namespace Lilo\Core\Http\Session;

interface SessionInterface
{
    public function set(string $key, mixed $value): void;

    public function has(string $key): bool;

    public function get(string $key, mixed $default = null): mixed;

    public function get_flash(string $key, mixed $default = null): mixed;

    public function unset(string $key): void;
}