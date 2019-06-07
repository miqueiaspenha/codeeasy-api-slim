<?php
use Slim\App;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

require '../../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$configuration = new Container($config);

$app = new App($configuration);

$app->get('/produto[/{nome}]', function (Request $request, Response $response, array $args): Response {
    $limit = $request->getQueryParams()['limit'] ?? 10;
    $nome = $args['nome'] ?? 'feijao';
    $response->getBody()->write('Produto ' . $nome . ' do banco de dados tem ' . $limit . ' unidades.');
    return $response;
});

$app->post('/produto', function (Request $request, Response $response, array $args): Response {
    $data = $request->getParsedBody();
    $nome = $data['nome'] ?? '';
    $response->getBody()->write("Produto {$nome} (POST)");
    return $response;
});

$app->put('/produto/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    echo $id . " - ";
    print_r($data);
});

$app->delete('/produto/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    echo $id;
});

$app->run();
