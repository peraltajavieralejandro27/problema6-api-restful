<?php


namespace App\Application\Actions\User;


use App\Domain\User\Service\UserDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DeleteAction
{
    private $userDelete;

    /**
     * ListAction constructor.
     * @param UserDelete $userDelete
     */
    public function __construct(UserDelete $userDelete)
    {
        $this->userDelete = $userDelete;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $params
    ): ResponseInterface
    {

        // Invoke the Domain with inputs and retain the result
        $user = $this->userDelete->deleteById($params['id']);

        // Transform the result into the JSON representation
        $result = [
            'user' => $user,
            'ok'   => $user ? true : false,
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}