<?php 

require '../src/helpers.php';

errorReporting();

require basePath('src/Framework/Router.php');

require basePath('src/Framework/Database.php');

$router = new Router();

require basePath('src/routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);





