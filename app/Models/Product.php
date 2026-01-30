<?php
namespace App\Models;

use PDO;

class Product extends BaseModel {
    public function getAllProducts(): array {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
