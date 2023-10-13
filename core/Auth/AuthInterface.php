<?php

namespace Lilo\Core\Auth;

interface AuthInterface
{

    public function attempt(string $email, string $password): bool;

    public function logout(): void;

    public function check(): bool;

    public function user(string $param = null): mixed;
}