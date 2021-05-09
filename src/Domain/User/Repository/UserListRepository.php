<?php


namespace App\Domain\User\Repository;


use App\Domain\Repository;
use PDO;

class UserListRepository extends Repository
{

    public function findAll()
    {
        $sql = "SELECT id,email,name,login FROM Usuarios ORDER BY name";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}