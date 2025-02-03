<?php

namespace App\Models;

class UserModel extends Model {

    public static function userExists( string $username , string $email ) {
        $model = new self();
    
        $user = $model->db->query('SELECT * FROM users WHERE username = :username OR email = :email', [
            'username' => $username,
            'email' => $email
        ])->fetch();

        return $user;
    }

    public static function create( string $username, string $email, string $password, string $city ) : bool {
        $model = new self();

        $user = $model->db->query('INSERT INTO users (username, email, password, city) VALUES (:username, :email, :password, :city)', [
            'username' => $username,
            'email' => $email,
            'password' => hash('sha256', $password),
            'city' => $city
        ]);

        if ($user) {
            return true;
        }
        return false;
    }

    
    public static function getUser( string $username ) {
        $model = new self();

        $user = $model->db->query('SELECT * FROM users WHERE username = :username', [
            "username" => $username
        ])->fetch();
        
        return $user;
    }

    public static function getAllUsers() : array {
        $model = new self();

        $users = $model->db->query("SELECT * FROM users")->fetchAll();

        return $users;
    }

    public static function delete($user_id) {
        $model = new self();

        $model->db->query('DELETE FROM users WHERE id = :id', [
            'id' => $user_id
        ]);
    }
}