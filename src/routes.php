<?php

$router->get('/', 'HomeController@index');
$router->get('/fahrzeuge', 'CarController@index');
$router->get('/inserieren', 'CarController@create');
//$router->get('/register', 'registerController.php');
//$router->get('/login', 'loginController.php');