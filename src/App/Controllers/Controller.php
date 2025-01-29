<?php

namespace App\Controllers;

use Framework\Database;

abstract class Controller {
    protected ?Database $db;

    public function __construct() {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }


    protected function loadView($view, $data = []) {

        $viewPath = basePath("src/App/views/{$view}.php");
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            echo "{$view} not Found!";
        }
        
    }
}