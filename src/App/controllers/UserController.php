<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController {
    protected $db;

    public function __construct () {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }

    public function create() : void {
        loadView('register');
    }

    public function login() : void {
        loadView('login');
    }

    public function profile(): void {
        loadView('profile');
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

    public function authenticate() : void {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $errors = [];

        if (!Validation::string($username)) {
            $errors['username'] = 'Bitte gebe deinen Nutzernamen ein!';
        }

        if (!Validation::string($password)) {
            $errors['password'] = 'Bitte gebe dein Passwort ein!';
        }

        if(!empty($errors)) {
            loadView('login', [
                'errors' => $errors
            ]);
            exit;
        }

        $params = [
            "username" => $username
        ];

        $user = $this->db->query('SELECT * FROM users WHERE username = :username', $params)->fetch();

        if(!$user) {
            $errors['username'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            loadView('login', [
                'errors' => $errors
            ]);
            exit;
        }

        if (!Validation::match(hash('sha256', $password), $user['password'])) {
            $errors['password'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            loadView('login', [
                'errors' => $errors
            ]);
            exit;
        }

        Session::set('user', [
            'id' => $user['id'],
            'username' => $user['username'],
            'city' => $user['city']
        ]);

        header('Location: /');
    }

    public function logout() : void {
        Session::clearAll();
        header('Location: /');
    }

}
