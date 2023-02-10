<?php

namespace Src\Core;


class Hash
{

    static public function make(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    static public function verify(string $password,string $hash = null): bool
    {
        return password_verify($password, $hash);
    }
}
