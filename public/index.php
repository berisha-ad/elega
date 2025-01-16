<?php 

require '../src/helpers.php';

require basePath('src/Router.php');

$router = new Router();

require basePath('src/routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);



