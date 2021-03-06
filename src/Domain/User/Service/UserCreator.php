<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserCreatorRepository;
use Cassandra\Exception\ValidationException;
use Exception;

class UserCreator
{
    /**
     * @var UserCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserCreatorRepository $repository The repository
     */
    public function __construct(UserCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     *
     * @return int The new user ID
     */
    public function createUser(array $data)
    {
        // Input validation
        $this->validateNewUser($data);

        // Insert user
        $user = $this->repository->insertUser($data);
        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $user;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @return void
     * @throws Exception
     *
     * @throws ValidationException
     */
    private function validateNewUser(array $data): void
    {
        $errors = [];

        if (empty($data['login'])) {
            $errors['login'] = 'Login Input required';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Email Input required';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }

        if ($errors) {
            throw new Exception('Please check your input. ' . implode('. ', $errors), 500);
        }
    }
}