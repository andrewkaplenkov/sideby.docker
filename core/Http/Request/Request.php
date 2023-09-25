<?php

namespace Lilo\Core\Http\Request;

use Lilo\Core\Validator\Validator;

class Request implements RequestInterface
{
    protected static ?array $validation_rules = null;
    private ?Validator $validator = null;

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

    public function get_method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function get_path(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function query_params(): array
    {
        return $this->get;
    }

    public function form_data(): array
    {
        return $this->post;
    }

    public function input(string $key, string $default = null): ?string
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function validator(): ?Validator
    {
        if (!$this->validator) {
            $this->validator = new Validator();
        }

        return $this->validator;
    }

    public function validated(array $rules = null): array|false
    {
        $data = [];
        $rules = $rules ?: static::$validation_rules;
        foreach ($rules as $field => $rule) {
            $data[$field] = $this->input($field);
        }
        return $this->validator()
            ->validate($data, $rules)
            ?? false;
    }

    public function errors(): array
    {
        return $this->validator()->errors();
    }
}