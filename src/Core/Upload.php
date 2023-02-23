<?php

namespace Legacy\Legacy\Core;

use Psr\Container\ContainerInterface;

class Upload
{
    public function __construct(private ContainerInterface $container)
    {
        
    }

    static public function upload(string $from, array $file): string
    {
        $tmp = $file["tmp_name"];

        $ext = explode("/", $file["type"])[1];

        $fileName = time() . "." . $ext;
        $to = public_path() . DIRECTORY_SEPARATOR . $from . DIRECTORY_SEPARATOR . $fileName;
        move_uploaded_file($tmp, $to);

        return $fileName;
    }
}
