<?php

namespace Lilo\Core\Database;

class DB
{
    private static ?self $instance = null;
    private static ?\PDO $connection = null;

    public function __construct(mixed $config)
    {
        $dsn = "{$config['driver']}:" . http_build_query($config['dsn'], '', ';');
        static::$connection = new \PDO(
            $dsn,
            $config['user'],
            $config['password'],
            $config['attributes']
        );
    }

    public static function connect(mixed $config): static
    {
        if (static::$instance === null) {
            static::$instance = new static($config);
        }

        return static::$instance;
    }

    public static function pdo(): \PDO
    {
        return static::$connection;
    }

    public static function execute(string $query, array $vars = []): \PDOStatement
    {
        $statement = static::$connection->prepare($query);
        $statement->execute($vars);
        return $statement;
    }
}