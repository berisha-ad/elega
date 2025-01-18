<?php

namespace App\Controllers;

use Framework\Database;

class CarController {

    protected $db;

    public function __construct() {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }

    public function index() {
        $cars = $this->db->query("SELECT * FROM cars")->fetchAll();
        loadView("cars", [
            'cars' => $cars
        ]);
    }

    public function create() {
        $cars = $this->db->query("SELECT * FROM cars")->fetchAll();
        loadView("createCar", []);
    }
}