<?php
require 'vendor/autoload.php';

try {
    $product = new App\Models\Product();
    echo "Database connection successful\n";
    $all = $product->all();
    echo "Products fetched: " . count($all) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
