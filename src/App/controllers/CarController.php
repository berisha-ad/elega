<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use App\Models\CarModel;
use App\Models\UserModel;

class CarController extends Controller {

    public function index() : void {
        $cars = CarModel::getAllCars();
        $users = UserModel::getAllUsers();
        $this->loadView("cars", [
            'cars' => $cars,
            'users' => $users
        ]);
    }

    public function create() : void {
        $cars = CarModel::getAllCars();
        $this->loadView("createCar", []);
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
        $method = $_POST['_method'];
        $id = $_POST['id'];

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
            $this->loadView('createCar', [
                'errors' => $errors,
                'data' => $data,
            ]);
            exit;
        }

        if(!empty($_FILES['image']['name']) ) {
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $target_dir = basePath("public/uploads/{$file_name}");
            move_uploaded_file($file_tmp, $target_dir);

            $data['medialink'] = "./uploads/{$file_name}";
        } else if (isset($_POST['existing_file'])) {
            $data['medialink'] = $_POST['existing_file'];
        } else {
            $errors['file'] = 'Lade ein Bild hoch!';
        }


        if(!empty($errors)) {
            $this->loadView('createCar', [
                'errors' => $errors,
                'data' => $data,
            ]);
        } else {
            if(isset($method) && $method === 'PUT') {
                Carmodel::updateCar($id, $data['medialink'], $brand, $model, $description, $mileage, $year, $horsepower, $price);
            } else {
                CarModel::createCar($data['medialink'], $user_id, $brand, $model, $description, $mileage, $year, $horsepower, $price);
            }
            header('Location: /fahrzeuge');
        }
    }

    public function show() : void {
        $id = $_GET['id'] ?? '';

        $users = UserModel::getAllUsers();
        $car = CarModel::getCar($id);
        $this->loadView('show', [
            'car' => $car,
            'users' => $users
        ]);
    }

    public function delete() {
        $method = $_POST['_method'];
        $id = $_POST['id'];
        if($method === 'DELETE') {
            CarModel::deleteCar($id);
            header('Location: /fahrzeuge');
        }
    }

    public function edit() {
        $method = $_POST['_method'];
        $id = $_POST['id'];
        if($method === 'PUT') {
            $car = CarModel::getCar($id);
            $this->loadView('createCar', [
                'id' => $car['id'],
                'user_id' => $car['user_id'],
                'medialink' => $car['medialink'],
                'brand' => $car['brand'],
                'model' => $car['model'],
                'description' => $car['description'],
                'mileage' => $car['mileage'],
                'year' => $car['year'],
                'horsepower' => $car['horsepower'],
                'price' => $car['price'],
                'method' => $method
            ]);
        }
    }
}