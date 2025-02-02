<?php

namespace App\Models;

class CarModel extends Model {

    public static function index() {
        $model = new self();

        $cars = $model->db->query("SELECT * FROM cars ORDER BY created_at DESC LIMIT 3")->fetchAll();

        return $cars;
    }

    public static function getAllCars() {
        $model = new self();
        $cars = $model->db->query("SELECT * FROM cars")->fetchAll();
        
        return $cars;
    }

    public static function createCar($media_link, $user_id, $brand, $modell, $description, $mileage, $year, $horsepower, $price) {

        $model = new self();

        $data = [
            'medialink' => $media_link,
            'user_id' => $user_id,
            'brand' => $brand,
            'model' => $modell,
            'description' => $description,
            'mileage' => $mileage,
            'year' => $year,
            'horsepower' => $horsepower,
            'price' => $price
        ];

        $query = "INSERT INTO cars (medialink, user_id, brand, model, description, mileage, year, horsepower, price) VALUES (:medialink, :user_id, :brand, :model, :description, :mileage, :year, :horsepower, :price)";

        $model->db->query($query, $data);
    }

    public static function getCar($id) {

        $model = new self();

        $car = $model->db->query('SELECT * FROM cars WHERE id = :id', [
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
            'medialink' => $media_link,
            'brand' => $brand,
            'model' => $modell,
            'description' => $description,
            'mileage' => $mileage,
            'year' => $year,
            'horsepower' => $horsepower,
            'price' => $price,
            'id' => $id
        ];

        $query = "UPDATE cars SET medialink = :medialink, brand = :brand, model = :model, description = :description,
        mileage = :mileage, year = :year, horsepower = :horsepower, price = :price WHERE id = :id";

        $model->db->query($query, $data);
    }
}