<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

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
        $allowedFields = [
            "brand", "model", "description", "mileage", "year", "horsepower", "price"
        ];
        $data = array_intersect_key($_POST, array_flip($allowedFields));

        $data['user_id'] = 4;

        $data = array_map('sanitize', $data);

        $requiredFields = ['brand', 'model', 'description', 'mileage', 'year', 'horsepower', 'price'];

        $errors = [];

        foreach($requiredFields as $field){
            if(empty($data[$field]) || !Validation::string($data[$field], 2, 255)) {
                $errors[$field] = ucfirst($field) . " muss ausgefüllt werden!";
            }
        }
        if(!empty($errors)) {
            loadView('createCar', [
                'errors' => $errors,
                'data' => $data,
            ]);
        } else {

            $fields = [];
            
            foreach($data as $field => $value) {
                $fields[] = $field;
            }

            $fields = implode(', ', $fields);

            $values = [];

            foreach($data as $field => $value) {
                $values[] = ':' . $field;
            }

            $values = implode(', ', $values);

            $query = "INSERT INTO cars ({$fields}) VALUES ({$values})";

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