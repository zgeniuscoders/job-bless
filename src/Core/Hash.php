<?php

namespace Src\Core;


class Hash
{

    static public function make(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
