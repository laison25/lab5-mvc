<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {

    public function index() {
        $products = (new Product())->getAllProducts();
        include __DIR__ . '/../../views/product_list.php';
    }
}
