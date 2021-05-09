<?php


namespace App\Domain\User\Repository;

use App\Domain\Repository;
use PDO;

class UserCreatorRepository extends Repository
{

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return int The new ID
     */
    public function insertUser(array $user): int
    {
        $row = [
            'email'    => $user['email'],
            'name'     => $user['name'],
            'login'    => $user['login'],
            'password' => $user['password'],
        ];

        $sql = "INSERT INTO `Usuarios`(email,name,login,password) VALUES (:email,:name,:login,:password);";

        $statement =$this->connection->prepare($sql);

        $statement->execute($row);

        return (int)$this->connection->lastInsertId();
    }

}