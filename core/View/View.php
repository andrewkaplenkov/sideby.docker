<?php

namespace Lilo\Core\View;

class View
{
    private string $content;
    private array $vars;

    public function __construct(string $name, array $vars = [])
    {
        $this->content = BASE_PATH . '/resources/views/' . $name . '.php';
        $this->vars = $vars;
    }

    public function render(): string
    {
        extract(['view' => $this]);
        include_once $this->content;
        return '';
    }

    public function var(string $key): mixed
    {
        return $this->vars[$key] ?? "{{undefined variable '$key'}}";
    }
}