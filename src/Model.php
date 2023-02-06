<?php

namespace Src;

use PDO;
use Src\Database\Database;

/**
 * present a table in the database
 */
abstract class Model
{
    /**
     * table names
     * @var string
     */
    protected string $table;

    /**
     * @var Database
     */
    private Database $database;


    public function __construct()
    {
        $this->database = new Database("localhost", "job-finder", "root", "");
    }

    /**
     * retrieve all data
     * @return void
     */
    public function all()
    {
        return $this->query(sqlRequest: "SELECT * FROM $this->table", fetchAll: true);
    }

    /**
     * retrieve data by id
     * @return void
     */
    public function find(string $id)
    {
        return $this->query(sqlRequest: "SELECT * FROM $this->table WHERE id = :id", data: ["id" => $id]);
    }

    public function where(string $field, string $value)
    {
    }

    public function create(array $data)
    {
        $fields = "";
        $values = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $fields .= "{$key}{$comma}";
            $values .= ":{$key}{$comma}";
            $i++;
        }

        return $this->query(sqlRequest: "INSERT INTO $this->table($fields) VALUES($values)", data: $data);
    }

    /**
     * delete data
     * @return void
     */
    public function delete(string $id)
    {
        return $this->query(sqlRequest: "DELETE * FROM $this->table WHERE id = :id", data: ["id" => $id]);
    }

    public function update(string $id, array $data)
    {
        $fields = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ', ';
            $fields .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query(sqlRequest: "UPDATE {$this->table} SET {$fields} WHERE id = :id", data: $data);
    }

    private function query(string $sqlRequest, array $data = [], bool $fetchAll = false)
    {
        if ($data) {
            $stmt = $this->database->getPDO()->prepare($sqlRequest);
            $stmt->execute($data);
        } else {
            $stmt = $this->database->getPDO()->query($sqlRequest);
        }

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        if ($fetchAll) {
            return $stmt->fetch();
        } else {
            return $stmt->fetchAll();
        }
    }
}
