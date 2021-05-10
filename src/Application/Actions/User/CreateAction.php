<?php


namespace App\Application\Actions\User;


use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateAction
{
    private $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface
    {

        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();
        // Invoke the Domain with inputs and retain the result
        $user = $this->userCreator->createUser($data);

        // Transform the result into the JSON representation
        $result = [
            'ok'   => true,
            'user' => $user
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}