<?php


namespace App\Domain\User\Repository;


use App\Domain\Repository;
use PDO;

class UserFindRepository extends Repository
{
    public function findById(int $id)
    {
        $sql = "SELECT id,email,name,login FROM Usuarios WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_OBJ);
    }
}