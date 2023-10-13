<?php

namespace Lilo\Core\View;

class View implements ViewInterface
{
    private array $vars = [];

    public function render(string $file, array $vars = []): void
    {
        $view_path = BASE_PATH . "/resources/views/$file.php";
        if (!file_exists($view_path)) {
            throw new \Exception("View $file not found");
        }

        $this->vars = $vars;
        extract([
            'view' => $this
        ]);
        require_once $view_path;
    }

    public function var(string $var): mixed
    {
        return $this->vars[$var] ?? null;
    }

    public function component(string $component): void
    {
        $component_path = BASE_PATH . "/resources/components/$component.php";
        if (!file_exists($component_path)) {
            echo "View $component not found";
            return;
        }

        extract([
            'view' => $this
        ]);
        require_once $component_path;
    }
}