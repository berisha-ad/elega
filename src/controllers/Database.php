<?php 

require basePath('config.php');

class Database {

    private $host;
    private $database;
    private $username;
    private $password;

    public function getDbConnection($MYSQL_HOST, $MYSQL_DATABASE, $MYSQL_USER, $MYSQL_PASSWORD) {

        $this->$host = $MYSQL_HOST;
        $this->$database = $MYSQL_DATABASE;
        $this->$username = $MYSQL_USER;
        $this->$password = $MYSQL_PASSWORD;

        try {
            $pdo = new PDO("mysql:host=$this->$host;dbname=$this->$database", $this->$username, $this->$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $pdo;
    }    
}
