<?php

namespace Lilo\Core\Database;

class Seeder
{
    private mixed $factory;

    public function __construct(mixed $factory)
    {
        $this->factory = $factory;
    }

    public function seed(int $count): void
    {
        $models = $this->factory::get_random_many($count);
        foreach ($models as $model) {
            $keys = implode(',', array_keys($model->attributes));
            $values = ":" . implode(',:', array_keys($model->attributes));
            $model->db->raw_query("
            INSERT INTO {$model->table} ($keys) VALUES ($values)
            ",
                $model->attributes);
        }
    }

}