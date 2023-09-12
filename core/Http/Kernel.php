<?php

namespace Lilo\Core\Http;

use Lilo\Core\Router\Router;

class Kernel
{
    public function handle(Request $request): Response
    {
        return Router::handle($request);
    }
}