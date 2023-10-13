<?php

namespace Lilo\Core\Http\Request;

use Lilo\Core\Upload\UploadedFile;
use Lilo\Core\Upload\UploadedFileInterface;
use Lilo\Core\Validator\Validator;
use Lilo\Core\Validator\ValidtorInterface;

class Request implements RequestInterface
{
    protected ?ValidtorInterface $validator = null;
    protected array $validation_rules = [];

    private function __construct(
        protected readonly array $get,
        protected readonly array $post,
        protected readonly array $cookies,
        protected readonly array $files,
        protected readonly array $server,
    )
    {
    }

    public static function create_from_globals(): RequestInterface
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

    public function input(string $key = null): mixed
    {
        return !$key
            ? $this->post
            : $this->post[$key] ?? null;
    }

    public function file(string $filename = null): ?UploadedFileInterface
    {
        if (!isset($this->files[$filename])) {
            return null;
        }

        return new UploadedFile(...$this->files[$filename]);
    }

    public function query_params(string $key = null): mixed
    {
        return !$key
            ? $this->get
            : $this->get[$key] ?? null;
    }

    public function validator(ValidtorInterface $validator = null): ValidtorInterface
    {
        if (!$this->validator) {
            $this->validator = $validator
                ? new $validator()
                : new Validator();
        }

        return $this->validator;
    }

    public function validated(array $rules = null): array|false
    {
        $validator = $this->validator();
        $data = $this->input();
        $rules = $rules ?: $this->validation_rules;
        return $validator->validate($data, $rules);
    }

    public function errors(): array
    {
        return $this->validator()->errors();
    }

}