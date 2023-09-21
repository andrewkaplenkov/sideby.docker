<?php

namespace Lilo\Core\Database\ORM\Model;


interface ModelInterface
{
    //SELECTION
    public function all(): array;

    public function get(int $id = null): array;

    public function only(array $only): self;

    public function where(string $key, mixed $value, bool $OR = false): self;

    //INSERTION
    public function store(array $attributes): void;

    //DELETE
    public function delete(int $id = null): void;
}