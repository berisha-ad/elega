<?php 

require '../src/helpers.php';

require '../src/Router.php';

$router = new Router();

require '../src/routes.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);



