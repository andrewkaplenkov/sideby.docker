<?php

namespace Lilo\Core\Controller;

use Lilo\Core\App;
use Lilo\Core\Http\Request\Request;
use Lilo\Core\Http\Request\RequestInterface;

class BaseController implements BaseControllerInterface
{
    protected RequestInterface|string $request = Request::class;

    public function __construct()
    {
        $this->request = App::resolve($this->request);
    }
}
