<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'home';

if ($page === 'home') {
    (new HomeController())->index();
} elseif ($page === 'product') {
    (new ProductController())->index();
} else {
    echo "404 - Page Not Found";
}
