<?php

namespace Lilo\Core\Storage;

class Storage implements StorageInterface
{

    public function url(string $path): string
    {
        $host = env('APP_HOST');
        return "http://$host/storage/$path";
    }

    public function get(string $path): string
    {
        return file_get_contents($this->storage_path($path));
    }

    private function storage_path(string $path): string
    {
        return BASE_PATH . "/storage/$path";
    }
}