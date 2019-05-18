<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        $result = $this->todo->getAllToDos();
        return $response->withJson($result, 200, JSON_PRETTY_PRINT);
    });
};
