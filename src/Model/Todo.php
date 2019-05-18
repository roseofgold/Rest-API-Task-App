<?php

class ToDo
{
    protected $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getAllToDos()
    {
        $statement = $this->database->prepare(
            'SELECT * FROM tasks ORDER BY id'
        );
        $statement->execute();
        return $statement->fetchAll();
    }
}