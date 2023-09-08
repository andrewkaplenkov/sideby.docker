<?php

namespace Lilo\Core\Http;

class Request
{
    protected function __construct(
        protected readonly array $get,
        protected readonly array $post,
        protected readonly array $cookies,
        protected readonly array $files,
        protected readonly array $server
    )
    {
    }

    public static function create_from_globals(): static
    {
        return new static(
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $_SERVER
        );
    }

    public function get_method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function get_path(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function form_data(): array
    {
        return $this->post;
    }
}