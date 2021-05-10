<?php


namespace App\Domain\User\Repository;


use App\Domain\Repository;
use PDO;

class UserDeleteRepository extends Repository
{
    public function deleteById(int $id)
    {
        $sql = "SELECT id,email,name,login FROM Usuarios WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);

        $user = $statement->fetch(PDO::FETCH_OBJ);

        $sql = "DELETE FROM Usuarios WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);

        return $user;
    }
}