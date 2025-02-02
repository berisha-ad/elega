<?php

namespace App\Models;

use Framework\Database;

abstract class Model {
    public ?Database $db;

    public function __construct() {
        $config = require basePath('config.php');
        $this->db = new Database($config);
    }
}