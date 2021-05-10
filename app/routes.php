<?php
declare(strict_types=1);

use App\Application\Actions\User\DeleteAction;
use App\Application\Actions\User\FindAction;
use App\Application\Actions\User\ListAction;
use App\Application\Actions\User\CreateAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->post('',CreateAction::class);
        $group->get('', ListAction::class);
        $group->get('/{id}', FindAction::class);
        $group->delete('/{id}', DeleteAction::class);
    });
};
