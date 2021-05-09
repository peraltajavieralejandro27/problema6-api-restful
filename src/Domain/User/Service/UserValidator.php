<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserValidatorRepository;

class UserValidator
{

    /**
     * @var UserValidatorRepository
     */
    private $repository;

    /**
     * The constructor.
     * @param UserValidatorRepository $repository
     */
    public function __construct(UserValidatorRepository $repository)
    {
        $this->repository = $repository;
    }
}