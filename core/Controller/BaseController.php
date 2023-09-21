<?php

namespace Lilo\Core\Controller;

use Lilo\Core\Database\ORM\Model\ModelInterface;
use Lilo\Core\Http\Request\Request;

class BaseController
{
    protected Request $request;
    protected static ?string $model_name = null;
    protected ModelInterface $model;

    public function __construct()
    {
        $this->request = Request::create_from_globals();
        if (static::$model_name) {
            $this->model = new static::$model_name();
        }
    }
}