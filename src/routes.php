<?php

$router->get('/', 'HomeController@index');


$router->get('/fahrzeuge', 'CarController@index');
$router->get('/fahrzeug', 'CarController@show');
$router->get('/neues-inserat', 'CarController@create');
$router->post('/fahrzeuge', 'CarController@store');


$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@authenticate');
$router->post('/auth/register', 'UserController@store');
