<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'product-list';
$controller = new ProductController();

switch ($page) {
    case 'product-list':
        $controller->index();
        break;

    case 'product-detail':
        $controller->detail();
        break;

    case 'product-delete':
        $controller->delete();
        break;

    case 'product-add':
        $controller->create();
        break;

    case 'product-store':
        $controller->store();
        break;

    case 'product-edit':
        $controller->edit();
        break;

    case 'product-update':
        $controller->update();
        break;


    default:
        echo "404 - Page Not Found";
        break;
}
