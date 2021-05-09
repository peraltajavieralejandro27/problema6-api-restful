<?php


namespace App\Domain;


use PDO;

class Repository
{
    /**
     * @var PDO The database connection
     */
    protected $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
}