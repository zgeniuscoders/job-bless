<?php

namespace Legacy\Legacy\Database;

use PDO;

class Database
{

    private PDO $pdo;

    public function __construct(private string $host, private string $dbname, private string $username, private string $password)
    {
    }

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO(
            "mysql:host={$this->host};dbname={$this->dbname}",
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
            ]
        );
    }
}
