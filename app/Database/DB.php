<?php

namespace App\Database;

class DB
{
    protected $connection;
    public static $DB;
    protected $table;
    protected $columns;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->getConnection();
    }

    public function all()
    {
        $query = $this->connection->prepare("SELECT * FROM $this->table");
        $query->execute();
        return $query->fetchAll();
    }

    public function find($id)
    {
        $query = $this->connection->prepare("SELECT * FROM $this->table WHERE id = :id");

        $query->execute(['id' => $id]);

        $object = $query->fetchObject();

        foreach ($object as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    public function create(array $array)
    {
        $count = count($this->columns);
        $quMark = str_repeat('?,', $count);
        $quMark[-1] = " ";
        $quMark = trim($quMark);
        $columns = implode(',', $this->columns);
        $query = $this->connection->prepare("INSERT INTO $this->table ($columns) VALUES ($quMark)");
        $query->execute(array_values($array));
    }

    public function findByColumn($column,$data){
        $query = $this->connection->prepare("SELECT * FROM $this->table WHERE $column = :$column");

        $query->execute([$column => $data]);
        $object = $query->fetchObject();

        foreach ($object as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    public function toArray() : array
    {
        return (array) $this;
    }

    public function save() : void
    {
        $array = [];
        foreach ($this->columns as $value){
            $array[$value] = $this->{$value};
        }

        $this->create($array);
    }
}
