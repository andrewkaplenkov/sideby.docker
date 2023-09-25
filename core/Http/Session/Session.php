<?php

namespace Lilo\Core\Http\Session;

class Session
{
    private static ?Session $instance = null;

    private function __construct()
    {
        session_start();
    }

    public static function start(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function all(): array
    {
        return $_SESSION;
    }

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function get(string $key, string $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public function get_flash(string $key, string $default = null): mixed
    {
        $value = $this->get($key, $default);
        $this->unset($key);
        return $value;
    }

    public function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }
}