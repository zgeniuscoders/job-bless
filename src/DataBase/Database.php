<?php

namespace Src\Database;

use PDO;

class Database
{

    private PDO $pdo;

    public function __construct(private string $host, private string $dbname, private string $username, private string $password)
    {
    }

    public function getPDO(): PDO
    {
        return new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
