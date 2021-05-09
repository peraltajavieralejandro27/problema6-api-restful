<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserListRepository;

class UserList
{
    /**
     * @var UserListRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserListRepository $repository The repository
     */
    public function __construct(UserListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}