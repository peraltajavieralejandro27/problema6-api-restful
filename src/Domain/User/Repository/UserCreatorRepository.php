<?php


namespace App\Domain\User\Repository;

use App\Domain\Repository;
use Exception;
use PDO;

class UserCreatorRepository extends Repository
{

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return int The new ID
     * @throws Exception
     */
    public function insertUser(array $user)
    {
        $row = [
            'email'    => $user['email'],
            'name'     => $user['name'],
            'login'    => $user['login'],
            'password' => $user['password'],
        ];

        if ($this->validateUser($user)) {
            throw new Exception('User exists. ', 500);
        }

        $sql = "INSERT INTO `Usuarios`(email,name,login,password) VALUES (:email,:name,:login,:password);";

        $statement = $this->connection->prepare($sql);

        $statement->execute($row);

        $sql = "SELECT id,email,name,login FROM `Usuarios` WHERE id = :id";
        $statement = $this->connection->prepare($sql);

        $statement->execute(['id' => $this->connection->lastInsertId()]);

        $user = $statement->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function validateUser(array $user): int
    {
        $sql = "SELECT COUNT(id) FROM `Usuarios` WHERE email=:email OR login=:login";

        $statement = $this->connection->prepare($sql);

        $statement->execute(['email' => $user['email'], 'login' => $user['email']]);

        return $statement->fetchColumn();
    }

}