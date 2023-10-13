<?php

namespace Lilo\Core\Http\Session;

class Session implements SessionInterface
{
    public static ?SessionInterface $instance = null;

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

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->has($key)
            ? $_SESSION[$key]
            : $default;
    }

    public function get_flash(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key);
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