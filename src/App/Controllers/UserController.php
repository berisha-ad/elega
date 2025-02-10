<?php 

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use App\Models\UserModel;
use App\Models\CarModel;

class UserController extends Controller {

    public function create() : void {
        $this->view->includePage('register');
    }

    public function login() : void {
        $this->view->includePage('login');
    }

    public function profile(): void {
        $user_id = Session::get('user')['id'];
        $users = UserModel::getAllUsers();
        $cars = CarModel::getUserCars($user_id);
        $this->view->includePage('profile', [
            'cars' => $cars,
            'users' => $users
        ]);
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
            $this->view->includePage('register', [
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
            $this->view->includePage('register', [
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
            $this->view->includePage('login', [
                'errors' => $errors
            ]);
            exit;
        }

        $user = UserModel::getUser($username);

        if(!$user) {
            $errors['username'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            $this->view->includePage('login', [
                'errors' => $errors
            ]);
            exit;
        }

        if (!Validation::match(hash('sha256', $password), $user['password'])) {
            $errors['password'] = "Falsche Anmeldedaten!";
        }

        if(!empty($errors)) {
            $this->view->includePage('login', [
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

    public function delete() {
        $id = Session::get('user')['id'];
        UserModel::delete($id);
        Session::clearAll();
        header('Location: /');
    }

}
