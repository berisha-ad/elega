<?php

$router->get('/', 'homeController.php');
$router->get('/registrieren', 'registerController.php');
$router->get('/login', 'loginController.php');
$router->get('/uber-uns', 'uberunsController.php');
$router->get('/fahrzeuge', 'fahrzeugeController.php');
$router->get('/kontakt', 'kontaktController.php');