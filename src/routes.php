<?php

$router->get('/', 'HomeController@index');
$router->get('/fahrzeuge', 'CarController@index');
$router->get('/fahrzeug', 'CarController@show');
$router->get('/neues-inserat', 'CarController@create');
$router->post('/fahrzeuge', 'CarController@store');
//$router->get('/registrieren', 'registerController.php');
//$router->get('/anmelden', 'loginController.php');