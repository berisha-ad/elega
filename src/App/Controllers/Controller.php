<?php

namespace App\Controllers;

use Framework\Database;
use App\View;

abstract class Controller {
    protected View $view;

    public function __construct() {
        $this->view = new View();
    }
}