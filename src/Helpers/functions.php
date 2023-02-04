<?php


function asset(string $path)
{
    echo $_SERVER["SERVER_NAME"] . DIRECTORY_SEPARATOR . $path;
}

function views(string $path = "index.php",array $data = [])
{
    extract($data);
    require DOCUMENT_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path;
}


function css(string $path)
{
    $path = "css". DIRECTORY_SEPARATOR . $path;
    echo "<link rel='stylesheet' href=" . $path . "></link>";
}


function js(string $path)
{
    $path = "js". DIRECTORY_SEPARATOR . $path;
    echo "<script src=". $path ."></script>";
}