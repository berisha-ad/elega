<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController {
    protected $db;

    public function __construct () {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }

    public function create() : void {
        loadView('register');
    }

    public function authenticate() : void {
        loadView('login');
    }

    public function store():void {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $city = $_POST['city'];
        if (isset($_POST['rights'])) {
            $rights = $_POST['rights'];
        } else {
            $rights = "notconfirmed";
        }
        

        $errors = [];

        if (!Validation::email($email)) {
            $errors['email'] = 'Gib eine gültige Email-Adresse an!'; 
        }

        if (!Validation::string($username, 2, 10)) {
            $errors['username'] = 'Der Nutzername muss mind. 2 und darf max. 20 Zeichen enthalten!'; 
        }

        if (!Validation::match($password, $confirm)) {
            $errors['passwordMatch'] = 'Passwörter stimmen nicht überein!'; 
        }

        if (!Validation::password($password)) {
            $errors['password'] = 'Password ist zu schwach!'; 
        }

        if (!Validation::match($rights, 'confirmed')) {
            $errors['rights'] = 'Bitte akzeptiere die Datenschutzbestimmungen'; 
        }
        
        if (!empty($errors)) {
            loadView('register', [
                'errors' => $errors,
                'user' => [
                    'username' => $username,
                    'email' => $email
                    ]
                ]);
                exit;
        }

        $params = [
            'username' => $username,
            'email' => $email
        ];
    
        $userExists = $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email', $params)->fetch();
    
        if($userExists) {
            $errors['user'] = 'Nutzername oder Email existiert bereits!';
            loadView('register', [
                'errors' => $errors,
                'user' => [
                    'username' => $username,
                    'email' => $email
                ]
            ]);
            exit;
        }


        $params = [
            'username' => $username,
            'email' => $email,
            'password' => hash('sha256', $password),
            'city' => $city
        ];

        $this->db->query('INSERT INTO users (username, email, password, city) VALUES (:username, :email, :password, :city)', $params);
        header('Location: /auth/login');
    }

}
