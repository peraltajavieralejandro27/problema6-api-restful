<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserDeleteRepository;

class UserDelete
{
    /**
     * @var UserDeleteRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserDeleteRepository $repository The repository
     */
    public function __construct(UserDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function deleteById(int $id)
    {
        return $this->repository->deleteById($id);
    }
}