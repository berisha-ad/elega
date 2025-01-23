<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class CarController {

    protected $db;

    public function __construct() {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }

    public function index() : void {
        $cars = $this->db->query("SELECT * FROM cars")->fetchAll();
        $users = $this->db->query("SELECT * FROM users")->fetchAll();
        loadView("cars", [
            'cars' => $cars,
            'users' => $users
        ]);
    }

    public function create() : void {
        $cars = $this->db->query("SELECT * FROM cars")->fetchAll();
        loadView("createCar", []);
    }

    public function store() : void {

        $brand = sanitize($_POST['brand']);
        $model = sanitize($_POST['model']);
        $description = sanitize($_POST['description']);
        $mileage = sanitize($_POST['mileage']);
        $year = sanitize($_POST['year']);
        $horsepower = sanitize($_POST['horsepower']);
        $price = sanitize($_POST['price']);
        $user_id = Session::get('user')['id'];

        $errors = [];

        if(!Validation::string($brand)) {
            $errors['brand'] = 'Wähle eine Automarke aus!';
        }
        if(!Validation::string($model, 2)) {
            $errors['model'] = 'Gib ein Fahrzeugmodell an!';
        }
        if(!Validation::string($description, 5)) {
            $errors['description'] = 'Gib eine Beschreibung an!';
        }
        if(!Validation::string($mileage, 1, 9)) {
            $errors['mileage'] = 'Gib einen gültigen Kilometerstand an! (z.B. "19000")';
        }
        if(!Validation::string($year, 4,4)) {
            $errors['year'] = 'Gib eine gültige Erstzulassung an! (z.B. "2015")';
        }
        if(!Validation::string($horsepower, 2, 4)) {
            $errors['horsepower'] = 'Gib eine gültige Pferdestärke an! (z.B. "204")';
        }
        if(!Validation::string($price, 2, 8)) {
            $errors['price'] = 'Gib einen gültigen Preis an! (z.B. "25000")';
        }

        $data = [
            'user_id' => $user_id,
            'brand' => $brand,
            'model' => $model,
            'description' => $description,
            'mileage' => $mileage,
            'year' => $year,
            'horsepower' => $horsepower,
            'price' => $price
        ];


        if(!empty($errors)) {
            loadView('createCar', [
                'errors' => $errors,
                'data' => $data,
            ]);
        } else {

            $query = "INSERT INTO cars (user_id, brand, model, description, mileage, year, horsepower, price) VALUES (:user_id, :brand, :model, :description, :mileage, :year, :horsepower, :price)";

            $this->db->query($query, $data);

            header('Location: /fahrzeuge');
        }
    }

    public function show() : void {
        $id = $_GET['id'] ?? '';
        $params = [
            'id' => $id
        ];
        $users = $this->db->query("SELECT * FROM users")->fetchAll();
        $car = $this->db->query('SELECT * FROM cars WHERE id = :id', $params)->fetch();
        loadView('show', [
            'car' => $car,
            'users' => $users
        ]);
    }
}