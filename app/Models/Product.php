<?php
namespace App\Models;

use PDO;

class Product extends BaseModel {
    
    public function __construct() {
        parent::__construct();
    }

    public function all(): array {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function insert(array $data): bool {
        $sql = "INSERT INTO products(name, price, image, description)
                VALUES (:name, :price, :image, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'image' => $data['image'],
            'description' => $data['description'],
        ]);
    }

    public function update(int $id, array $data): bool {
        $sql = "UPDATE products
                SET name=:name, price=:price, image=:image, description=:description
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'price' => $data['price'],
            'image' => $data['image'],
            'description' => $data['description'],
        ]);
    }
}
