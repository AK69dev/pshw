<?php
use Acme\App\HelloWorld;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = new App([
    'helloWorld' => function() {
        return new HelloWorld();
    },
    'view' => function () {
        return new PhpRenderer(__DIR__ . '/../template/');
    }
]);

$app->get('/hello/{text}', function (Request $request, Response $response, array $args) {
    /** @var HelloWorld $helloWorld */
    $helloWorld = $this->helloWorld;  // $this = $app->getContainer() になるらしい

    /** @var PhpRenderer $view */
    $view = $this->view;

    $text = $args['text'];
    if ($request->getParam('capitalize', false) !== false) {
        $text = ucfirst($text);
    }

    return $view->render($response, 'hello.php', [
        'message' => $helloWorld->hello($text),
    ]);
});

$app->run();