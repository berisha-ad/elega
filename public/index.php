<?php 
require __DIR__ . '/../vendor/autoload.php';
require '../src/helpers.php';

errorReporting();

use Framework\Router;

$router = new Router();

require basePath('src/routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);





