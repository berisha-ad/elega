<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use App\Models\UserModel;

class UserController extends Controller {

    public function create() : void {
        $this->loadView('register');
    }

    public function login() : void {
        $this->loadView('login');
    }

    public function profile(): void {
        $this->loadView('profile');
    }

    public function store() : void {


        $username = sanitize($_POST['username']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $confirm = sanitize($_POST['confirm']); //Namesänderrung
        $city = sanitize($_POST['city']);
        if (isset($_POST['rights'])) {
            $rights = $_POST['rights'];   //Namesänderrung
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
            $this->loadView('register', [
                'errors' => $errors,
                'user' => [
                    'username' => $username,
                    'email' => $email
                    ]
                ]);
                exit;
        }

        $userExists = Usermodel::userExists($username, $email);
    
        if($userExists) {
            $errors['user'] = 'Nutzername oder Email existiert bereits!';
            $this->loadView('register', [
                'errors' => $errors,
                'user' => [
                    'username' => $username,
                    'email' => $email
                ]
            ]);
            exit;
        }


        UserModel::create( $username, $email, $password, $city );

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
            $this->loadView('login', [
                'errors' => $errors
            ]);
            exit;
        }

        $user = UserModel::getUser($username);

        if(!$user) {
            $errors['username'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            $this->loadView('login', [
                'errors' => $errors
            ]);
            exit;
        }

        if (!Validation::match(hash('sha256', $password), $user['password'])) {
            $errors['password'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            $this->loadView('login', [
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
