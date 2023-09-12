<?php

namespace Lilo\Core\Database;

class Table
{
    public string $name;
    public array $rows;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function add_row(string $name): Row
    {
        return new Row($name);
    }


}