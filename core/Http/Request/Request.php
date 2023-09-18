<?php

namespace Lilo\Core\Http\Request;

class Request
{
    private function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $cookies,
        private readonly array $files,
        private readonly array $server
    )
    {
    }

    public static function create_from_globals(): static
    {
        return new static(
            $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER
        );
    }

    public function query_params(): array
    {
        return $this->get;
    }

    public function form_data(): array
    {
        return $this->post;
    }

    public function get_method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function get_path(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }
}