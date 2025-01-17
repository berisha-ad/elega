<?php 

require '../src/helpers.php';

errorReporting();

require basePath('src/Router.php');

require basePath('src/Database.php');

$router = new Router();

require basePath('src/routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);





