<?php

namespace Lilo\Core\Database\ORM;

use Lilo\Core\App;
use Lilo\Core\Database\DB;
use Lilo\Core\Exceptions\Database\InvalidParameterException;
use Lilo\Core\Exceptions\Database\NotFoundException;

abstract class Model implements ModelInterface
{
    private DB $db;
    protected string $table = '';
    protected array $fillable = [];
    private string $only = '*';
    private string $where = '';
    private array $attributes = [];

    public function __construct()
    {
        $this->db = App::resolve(DB::class);
    }

    //STATEMENTS
    private function select_statement(): \PDOStatement
    {
        $query_string = "SELECT {$this->only} FROM {$this->table} {$this->where}";
        return $this->db
            ->raw_query($query_string, $this->attributes);
    }

    private function insert_statement(): void
    {
        $keys = implode(', ', $this->fillable);
        $keys_exec = ":" . implode(', :', $this->fillable);

        $query_string = "INSERT INTO {$this->table} ($keys) VALUES ($keys_exec)";

        $this->db
            ->raw_query($query_string, $this->attributes);
    }

    private function delete_statement(): void
    {
        $query_string = "DELETE FROM {$this->table} {$this->where}";

        $this->db
            ->raw_query($query_string, $this->attributes);
    }

    //SELECTION
    public function all(): array
    {
        return $this->select_statement()
            ->fetchAll();
    }

    public function get(int $id = null): array
    {
        if ($id) {
            $this->attributes['id'] = $id;
            $this->where = " WHERE id = :id";
        }

        return $this->select_statement()->fetch();
    }

    public function only(array $only): ModelInterface
    {
        $this->only = implode(', ', $only);
        return $this;
    }

    public function where(string $key, mixed $value, bool $OR = false): ModelInterface
    {
        $this->attributes[$key] = $value;

        if (!$this->where) {
            $this->where = "WHERE $key = :$key";
        } else {
            $sign = $OR ? "OR" : "AND";
            $this->where .= " $sign $key = :$key";
        }

        return $this;
    }


    //INSERTION
    public function store(array $attributes): void
    {
        foreach ($attributes as $key => $attribute) {
            if (!in_array($key, $this->fillable)) {
                throw new \PDOException(
                    "No such fillable attribute '$key'"
                );
            }
        }
        $this->attributes = $attributes;
        $this->fillable = array_keys($this->attributes);
        $this->insert_statement();
    }

    //DELETE
    public function delete(int $id = null): void
    {
        if ($id) {
            $this->where = " WHERE id = :id";
            $this->attributes['id'] = $id;
        }

        $this->delete_statement();
    }
}