<?php

namespace Lilo\Core\Database\ORM\Factory;

use Lilo\Core\Database\ORM\Model\ModelInterface;

abstract class ModelFactory implements ModelFactoryInterface
{
    protected string $modelName = '';
    protected ModelInterface $model;

    public function create_model(): ModelInterface
    {
        $this->model = new $this->model();
        return $this->model;
    }
}