<?php

$router->get('/', 'HomeController@index');


$router->get('/fahrzeuge', 'CarController@index');
$router->get('/fahrzeug', 'CarController@show');
$router->get('/neues-inserat', 'CarController@create');
$router->post('/fahrzeug/erstellen', 'CarController@store');
$router->post('/fahrzeug/bearbeiten', 'CarController@edit');
$router->post('/fahrzeug/entfernen', 'CarController@delete');
$router->get('/search', 'CarController@search');

$router->get('/profile', 'UserController@profile');
$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@login');

$router->post('/auth/register', 'UserController@store');
$router->post('/auth/login', 'UserController@authenticate');
$router->post('/auth/logout', 'UserController@logout');
$router->post('/auth/delete', 'UserController@delete');
