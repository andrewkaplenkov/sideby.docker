<?php

namespace Lilo\Core\Database;

use Lilo\Core\App;

abstract class Model
{
    public static ?DB $db = null;
    public string $table;
    public array $fillable;

    public array $attributes;

    public string $only = '*';
    public string $where = '';


    public function __construct(array $attributes = [])
    {
        static::$db = App::resolve(DB::class);
        $this->attributes = $attributes;
    }

    //SELECTION
    private function select_statement(): \PDOStatement
    {
        return static::$db
            ->raw_query(
                "SELECT {$this->only} FROM {$this->table} {$this->where}"
                , $this->attributes);
    }

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

        return $this->select_statement()
            ->fetch();
    }

    public function only(array $only): self
    {
        $this->only = implode(', ', $only);
        return $this;
    }

    public function where(string $key, string|int $value, bool $or = false): self
    {
        $this->attributes[$key] = $value;

        if (!$this->where) {
            $this->where = "WHERE $key = :$key";
        } else {
            $sign = $or ? "OR" : "AND";
            $this->where .= " $sign $key = :$key";
        }

        return $this;
    }


    //INSERTION
    private function insert_statement(): void
    {

        $keys = implode(', ', array_keys($this->attributes));
        $keys_exec = ":" . implode(', :', array_keys($this->attributes));

        static::$db
            ->raw_query(
                "INSERT INTO $this->table ($keys) VALUES ($keys_exec)"
                , $this->attributes);
    }

    public function create(array $attributes): void
    {
        $this->attributes = $attributes;
        $this->insert_statement();
    }


    //DELETE
    private function delete_statement(): void
    {
        static::$db
            ->raw_query(
                "DELETE FROM $this->table $this->where"
                , $this->attributes);
    }

    public function delete(int $id = null): void
    {
        if ($id) {
            $this->where = " WHERE id = :id";
            $this->attributes['id'] = $id;
        }
        $this->delete_statement();
    }

}