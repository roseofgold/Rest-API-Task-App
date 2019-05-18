<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        $endpoints = [
            'all tasks' => $this->api['api_url'] . '/tasks',
            'single task' => $this->api['api_url'] . '/tasks/{task_id}',
        ];
        $result = [
            'endpoints' => $endpoints,
            'version' => $this->api['version'],
            'timestamp' => time(),
        ];
        return $response->withJson($result, 200, JSON_PRETTY_PRINT);
    });
    $app->group('/api/v1/tasks', function() use($app) {
        $app->get('', function (Request $request, Response $response, array $args) use ($container) {
            // return all todos
            $result = $this->todo->getAllToDos();
            return $response->withJson($result, 200, JSON_PRETTY_PRINT);
        });    
    });
};
