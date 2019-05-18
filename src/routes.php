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
        $app->get('/{task_id}', function (Request $request, Response $response, array $args) use ($container) {
            // return a single todo
            $result = $this->todo->getToDo($args['task_id']);
            return $response->withJson($result, 200, JSON_PRETTY_PRINT);
        });
        $app->post('', function (Request $request, Response $response, array $args) use ($container) {
            // create a todo
            $result = $this->todo->createToDo($request->getParsedBody());
            return $response->withJson($result, 201, JSON_PRETTY_PRINT);
        });
        $app->put('/{task_id}', function (Request $request, Response $response, array $args) use ($container) {
            // update a todo
            $data = $request->getParsedBody();
            $data['task_id'] = $args['task_id'];
            $result = $this->todo->updateToDo($data);
            return $response->withJson($result, 201, JSON_PRETTY_PRINT);
        });
        $app->delete('/{task_id}', function (Request $request, Response $response, array $args) use ($container) {
            // return a single todo
            $result = $this->todo->deleteToDo($args['task_id']);
            return $response->withJson($result, 200, JSON_PRETTY_PRINT);
        });
    });
};
