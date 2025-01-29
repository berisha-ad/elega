<?php

namespace App\Models;

class UserModel extends Model {

    public static function userExists( string $username , string $email ) {
        $model = new self();
    
        $model->db->query('SELECT * FROM users WHERE username = :username OR email = :email', [
            'username' => $username,
            'email' => $email
        ])->fetch();

        return $model->db->rowCount() === 1;
    }

    public static function create( string $username, string $email, string $password, string $city ) : bool {
        $model = new self();

        $model->db->query('INSERT INTO users (username, email, password, city) VALUES (:username, :email, :password, :city)', [
            'username' => $username,
            'email' => $email,
            'password' => hash('sha256', $password),
            'city' => $city
        ]);

        return $model->db->rowCount() === 1;
    }

    public static function getUser( string $username ) {
        $model = new self();

        $user =  $model->db->query('SELECT * FROM users WHERE username = :username', [
            "username" => $username
        ])->fetch();
        
        return $user;
    }

    public static function getAllUsers() {
        $model = new self();

        $users = $model->db->query("SELECT * FROM users")->fetchAll();
        return $users;
    }
}