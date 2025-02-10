<?php

namespace App\Models;

class CarModel extends Model {

    public static function index() {
        $model = new self();

        $cars = $model->db->query("SELECT c.*, u.path AS medialink FROM cars AS c LEFT JOIN uploads AS u ON c.upload_id = u.id ORDER BY created_at DESC LIMIT 3")->fetchAll();

        return $cars;
    }

    public static function getAllCars() {
        $model = new self();
        $cars = $model->db->query("SELECT c.*, u.path AS medialink FROM cars AS c LEFT JOIN uploads AS u ON c.upload_id = u.id")->fetchAll();
        
        return $cars;
    }

    public static function getUserCars($id) {
        $model = new self();
        $params = [
            'id' => $id
        ];
        $cars = $model->db->query("SELECT c.*, u.path AS medialink FROM cars AS c LEFT JOIN uploads AS u ON c.upload_id = u.id WHERE user_id = :id ORDER BY created_at DESC", $params)->fetchAll();
        
        return $cars;
    }

    public static function createCar($media_link, $user_id, $brand, $modell, $description, $mileage, $year, $horsepower, $price) {

        $model = new self();

        $data = [
            'upload_id' => $media_link,
            'user_id' => $user_id,
            'brand' => $brand,
            'model' => $modell,
            'description' => $description,
            'mileage' => $mileage,
            'year' => $year,
            'horsepower' => $horsepower,
            'price' => $price
        ];

        $query = "INSERT INTO cars (upload_id, user_id, brand, model, description, mileage, year, horsepower, price) VALUES (:upload_id, :user_id, :brand, :model, :description, :mileage, :year, :horsepower, :price)";

        $model->db->query($query, $data);
    }

    public static function getCar($id) {

        $model = new self();

        $car = $model->db->query('SELECT c.*, u.path AS medialink FROM cars AS c LEFT JOIN uploads AS u ON c.upload_id = u.id WHERE c.id = :id;', [
            'id' => $id
        ])->fetch();

        return $car;
    }

    public static function deleteCar($id) {
        $model = new self();

        $delete = $model->db->query('DELETE FROM cars WHERE id = :id', [
            'id' => $id
        ]);
    }

    public static function updateCar($id, $media_link, $brand, $modell, $description, $mileage, $year, $horsepower, $price) {
        $model = new self();

        $data = [
            'upload_id' => $media_link,
            'brand' => $brand,
            'model' => $modell,
            'description' => $description,
            'mileage' => $mileage,
            'year' => $year,
            'horsepower' => $horsepower,
            'price' => $price,
            'id' => $id
        ];

        $query = "UPDATE cars SET upload_id = :upload_id, brand = :brand, model = :model, description = :description,
        mileage = :mileage, year = :year, horsepower = :horsepower, price = :price WHERE id = :id";

        $model->db->query($query, $data);
    }

    public static function searchCars($search_term) {
        $model = new self();

        $data = [
            'search_term' => '%' . $search_term . '%'
        ];

        $query = 'SELECT * From cars WHERE brand LIKE :search_term OR model LIKE :search_term OR year LIKE :search_term';

        $cars = $model->db->query($query, $data)->fetchAll();
        return $cars;
    }
}