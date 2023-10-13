<?php

namespace Lilo\Core\View;

interface ViewInterface
{
    public function render(string $file, array $vars = []): void;

    public function var(string $var): mixed;

    public function component(string $component): void;

}