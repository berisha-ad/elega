<?php

use Framework\Database;

$config = require basePath('config.php');

$db = new Database($config);

$user = $db->query("SELECT * FROM users")->fetchAll();

loadView("register");