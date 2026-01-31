<?php
namespace App\Models;

use PDO;

class BaseModel {
    protected $pdo;

    public function __construct() {
        try {
            $host = "localhost";
            $db   = "buoi2_php";   
            $user = "root";
            $pass = "";
            $charset = "utf8mb4";

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
