<?php

$config = require basePath('config.php');

$db = new Database($config);

$user = $db->query("SELECT * FROM users")->fetchAll();

require basePath('src/views/register.php');