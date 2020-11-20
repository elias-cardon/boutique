<?php 
namespace Base;

class User extends Database
{
    public function getUsers()
    {
        return $this->query('SELECT * FROM utilisateurs')->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function DeleteTable()
    {
        $req = $this->query('DELETE FROM utilisateurs WHERE id = :id', ['id' => $_GET['id']]);
    }
}