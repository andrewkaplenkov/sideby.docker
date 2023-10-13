<?php

namespace Lilo\Core\Database;

use Lilo\Core\Config\Config;

class DB
{
    public static ?DB $instance = null;
    private \PDO $pdo;

    private function __construct()
    {
        $this->pdo = new \PDO(...$this->conf());
    }

    public static function connect(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function conf(): array
    {
        [
            'driver' => $driver,
            'dsn' => $dsn,
            'user' => $user,
            'password' => $password,
            'attributes' => $attributes
        ] = Config::get_data('database.mysql');

        return [
            "$driver:" . http_build_query($dsn, '', ';'),
            $user,
            $password,
            $attributes
        ];
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }

    public function raw_query(string $query, array $vars = []): false|\PDOStatement
    {
        $statement = $this->pdo->prepare($query);

        if (!$statement->execute($vars)) {
            return false;
        }

        return $statement;
    }

}