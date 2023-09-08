<?php

namespace Lilo\Core\Database;

use Lilo\Core\App;

abstract class Model
{
    public DB $db;
    public ?string $table = null;
    public array $attributes = [];

    private function __construct(string $table, $attributes = [])
    {
        $this->db = App::resolve(DB::class);
        $this->table = $table;
        $this->attributes = $attributes;
    }

    public function attributes(): array
    {
        return $this->attributes;
    }

    public static function create_model(string $table, array $attributes = []): static
    {
        return new static($table, $attributes);
    }

    public function set_attributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function all(): array
    {
        return $this->db->raw_query("SELECT * FROM {$this->table}")->fetchAll();
    }

    public function get_by_id(int $id): array
    {
        return $this->db
            ->raw_query("SELECT * FROM {$this->table} WHERE id = :id", ['id' => $id])
            ->fetch();
    }

    public function create(): void
    {
        $keys = implode(',', array_keys($this->attributes));
        $values = ":" . implode(',:', array_keys($this->attributes));

        $this->db
            ->raw_query(
                "INSERT INTO {$this->table} ({$keys}) VALUES ({$values})",
                $this->attributes()
            );
    }

    public function destroy(int $id): void
    {
        $this->db
            ->raw_query("DELETE FROM {$this->table} WHERE id = :id",
                ['id' => $id]);
    }


}