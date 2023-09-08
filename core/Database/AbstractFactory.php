<?php

namespace Lilo\Core\Database;

abstract class AbstractFactory
{
    public static mixed $model;
    public static string $table;
    public static array $attributes = [];
    public static array $storage;

    public static function get_one(): mixed
    {
        return static::$model::create_model(static::$table, static::$attributes);
    }

    public static function get_random_one(): mixed
    {
        static::set_random_attributes();
        $model = static::$model::create_model(static::$table, static::$attributes);
        return $model;
    }

    public static function get_random_many(int $count): array
    {
        for ($i = 0; $i < $count; $i++) {
            static::$storage[] = static::get_random_one();
        }

        return static::$storage;
    }


    abstract static protected function set_random_attributes(): void;
}