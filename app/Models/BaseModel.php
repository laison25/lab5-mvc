<?php
namespace App\Models;

use PDO;

class BaseModel {
    protected PDO $conn;

    public function __construct() {
        $host = "localhost";
        $db   = "buoi2_php";   
        $user = "root";
        $pass = "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
        $this->conn = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
