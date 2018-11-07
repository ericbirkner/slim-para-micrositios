<?php
use Slim\Views\PhpRenderer;

include "vendor/autoload.php";
include "config.php";
include "db.php";

$app = new Slim\App();
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");

$app->get('/', function ($request, $response, $args) {
    $sql="SELECT * FROM usuarios";
    $res = query($sql);
    while($row_tmp = $res->fetch_assoc()){
      $usuarios[] = $row_tmp;
    }
    $res->free();

    $data = array('usuarios'=>$usuarios);

    return $this->renderer->render($response, "/home.php", $data);
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $this->renderer->render($response, "/hello.php", $args);
});

$app->run();
