<?php

namespace Lilo\Core\Middleware;

use Lilo\Core\Http\Request\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request
    )
    {
    }

    abstract public function handle(): void;
}