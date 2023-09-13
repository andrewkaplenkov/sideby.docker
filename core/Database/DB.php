<?php

namespace Lilo\Core\Database;

class DB
{
    private static ?self $instance = null;
    private \PDO $connection;

    private function __construct(array $config)
    {
        $dsn = "{$config['driver']}:" . http_build_query($config['dsn'], '', ';');
        $this->connection = new \PDO(
            $dsn,
            $config['user'],
            $config['password'],
            $config['attributes']
        );
    }

    public static function connect(array $config): static
    {
        if (static::$instance === null) {
            static::$instance = new static($config);
        }

        return static::$instance;
    }

    public function raw_query(string $query, array $vars = []): \PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($vars);
        return $statement;
    }
}