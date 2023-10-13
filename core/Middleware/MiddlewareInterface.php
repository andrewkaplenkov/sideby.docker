<?php

namespace Lilo\Core\Middleware;

interface MiddlewareInterface
{

    public function check(array $middlewares = []): void;
}