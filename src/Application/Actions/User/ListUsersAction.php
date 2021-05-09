<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\Service\UserList;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as Response;

class ListUsersAction
{

    private $userList;

    /**
     * ListUsersAction constructor.
     * @param UserList $userList
     */
    public function __construct(UserList $userList)
    {
        $this->userList = $userList;
    }

    public function __invoke(
        ServerRequestInterface $request,
        Response $response
    ): ResponseInterface {

        // Invoke the Domain with inputs and retain the result
        $userId = $this->userList->findAll();

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userId
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
