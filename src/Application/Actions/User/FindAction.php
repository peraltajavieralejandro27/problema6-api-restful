<?php


namespace App\Application\Actions\User;


use App\Domain\User\Service\UserFind;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FindAction
{
    private $userFind;

    /**
     * ListAction constructor.
     * @param UserFind $userFind
     */
    public function __construct(UserFind $userFind)
    {
        $this->userFind = $userFind;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $params
    ): ResponseInterface {

        // Invoke the Domain with inputs and retain the result
        $user = $this->userFind->findById($params['id']);

        // Transform the result into the JSON representation
        $result = [
            'user' => $user
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}