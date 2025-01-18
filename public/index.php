<?php 
require __DIR__ . '/../vendor/autoload.php';
require '../src/helpers.php';

errorReporting();

use Framework\Router;

$router = new Router();

require basePath('src/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);





