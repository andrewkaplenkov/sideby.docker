<?php

namespace Lilo\Core\Upload;

interface UploadedFileInterface
{
    public function upload(string $path, string $filename = null): string|false;

    public function get_ext(): string;
}