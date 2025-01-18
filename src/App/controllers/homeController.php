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
        $cars = $this->db->query("SELECT * FROM cars")->fetchAll();
        loadView("home", [
            'cars' => $cars
        ]);
    }
}