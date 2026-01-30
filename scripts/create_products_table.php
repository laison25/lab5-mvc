<?php
// Simple migration: create `products` table and seed sample data.
// Uses the same DB connection settings as app/Models/BaseModel.php
$host = 'localhost';
$db   = 'buoi2_php';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    // Use database
    $pdo->exec("USE `$db`");

    // Create table
    $create = <<<SQL
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;
    $pdo->exec($create);

    // Seed sample rows if table empty
    $count = $pdo->query("SELECT COUNT(*) FROM `products`")->fetchColumn();
    if ($count == 0) {
        $stmt = $pdo->prepare("INSERT INTO `products` (`name`, `price`) VALUES (?, ?)");
        $stmt->execute(['Áo thun', '199000']);
        $stmt->execute(['Quần jeans', '349000']);
        $stmt->execute(['Giày thể thao', '799000']);
        echo "Inserted sample products.\n";
    } else {
        echo "Products table already has $count rows.\n";
    }

    echo "Migration completed.\n";
} catch (PDOException $e) {
    echo "Migration failed: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
