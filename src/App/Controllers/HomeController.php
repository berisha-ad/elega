<?php

namespace App\Controllers;

use Framework\Database;
use App\Models\UserModel;
use App\Models\CarModel;

class HomeController extends Controller {

    public function index() {
        $cars = CarModel::index();
        $users = UserModel::getAllUsers();
        $this->view->includePage("home", [
            'cars' => $cars,
            'users' => $users
        ]);
    }
}