<?php

namespace Lilo\Core\Database;

class Row
{
    public string $name;
    public string $datatype;
    public string $nullable;
    public string $unique;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function set_datatype(string $datatype): self
    {
        $this->datatype = strtoupper($datatype);
        return $this;
    }


}