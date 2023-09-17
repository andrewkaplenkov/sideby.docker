<?php

namespace Lilo\Core\Database\ORM\Factory;

use Lilo\Core\Database\ORM\Model\ModelInterface;

interface ModelFactoryInterface
{
    public function create_model(): ModelInterface;
}