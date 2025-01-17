<?php

$config = require basePath('config.php');

$db = new Database($config);

$cars = $db->query("SELECT * FROM cars")->fetchAll();

loadView("home", [
    'cars' => $cars
]);