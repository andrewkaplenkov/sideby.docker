<?php

namespace Lilo\Core\Upload;

class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        private readonly string $name,
        private readonly string $full_path,
        private readonly string $type,
        private readonly string $tmp_name,
        private readonly int    $error,
        private readonly int    $size
    )
    {
    }

    public function upload(string $path, string $filename = null): false|string
    {
        $storage_path = BASE_PATH . '/storage/' . $path;

        if (!is_dir($storage_path)) {
            mkdir($storage_path, 0777, true);
        }

        $filename = $filename
            ? $filename . ".{$this->get_ext()}"
            : $this->random_filename();

        $file_path = "$storage_path/$filename";

        if (move_uploaded_file($this->tmp_name, $file_path)) {
            return "$path/$filename";
        }

        return false;
    }

    private function random_filename(): string
    {
        return md5(uniqid(rand(), true)) . ".{$this->get_ext()}";
    }

    public function get_ext(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }
}