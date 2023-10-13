<?php

namespace Lilo\Core\Controller;

interface BaseControllerInterface
{
    public function view(string $file, array $vars = []): void;
}