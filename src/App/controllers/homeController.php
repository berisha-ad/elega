<?php

namespace App\Controllers;

use Framework\Database;

class HomeController {

    protected $db;

    public function __construct() {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }

    public function index() {
        $cars = $this->db->query("SELECT * FROM cars LIMIT 3")->fetchAll();
        $users = $this->db->query("SELECT * FROM users")->fetchAll();
        loadView("home", [
            'cars' => $cars,
            'users' => $users
        ]);
    }
}