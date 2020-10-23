<?php 
namespace Base;

class User extends Database
{
    public function getUsers()
    {
        return $this->query('SELECT * FROM utilisateurs')->fetchAll(\PDO::FETCH_ASSOC);
    }
}