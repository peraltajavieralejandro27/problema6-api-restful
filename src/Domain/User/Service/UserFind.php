<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserFindRepository;

class UserFind
{
    /**
     * @var UserFindRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserFindRepository $repository The repository
     */
    public function __construct(UserFindRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}