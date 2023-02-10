<?php

function asset(string $path): string
{
    return $_SERVER["SERVER_NAME"] . DIRECTORY_SEPARATOR . $path;
}

function views(string $path = "index.php", array $data = [])
{
    extract($data);
    require DOCUMENT_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path;
}


function css(string $path)
{
    $path = "css" . DIRECTORY_SEPARATOR . $path;
    echo "<link rel='stylesheet' href=" . $path . "></link>";
}

function public_path(): string
{
    return $_SERVER["DOCUMENT_ROOT"];
}

function js(string $path)
{
    $path = "js" . DIRECTORY_SEPARATOR . $path;
    echo "<script src=" . $path . " defer></script>";
}
