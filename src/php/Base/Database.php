<?php

namespace Base;

class Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=localhost;port=3306;dbname=boutique;charset=utf8', 'root', '');
    }

    public function query($request, array $arg = [])
    {
        if (!empty($arg)) {
            $statement = $this->db->prepare($request);
            $statement->execute($arg);
        } else {
            $statement = $this->db->query($request);
        }
        return $statement;
    }
}


