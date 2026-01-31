<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {

    public function index() {
        $products = (new Product())->all();
        include __DIR__ . "/../../views/product_list.php";
    }

    public function detail() {
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) { echo "ID không hợp lệ"; return; }

        $product = (new Product())->find($id);
        if (!$product) { echo "Không tìm thấy sản phẩm"; return; }

        include __DIR__ . "/../../views/product_detail.php";
    }

    public function delete() {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            (new Product())->delete($id);
        }
        header("Location: index.php?page=product-list");
        exit;
    }

    public function create() {
        $errors = [];
        $old = ['name'=>'','price'=>'','image'=>'','description'=>''];
        include __DIR__ . "/../../views/product_add.php";
    }

    public function store() {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'price' => trim($_POST['price'] ?? ''),
            'image' => trim($_POST['image'] ?? ''),
            'description' => trim($_POST['description'] ?? '')
        ];

        $errors = [];
        if ($data['name'] === '') $errors[] = "Tên không được trống";
        if ($data['price'] === '' || !is_numeric($data['price'])) $errors[] = "Giá phải là số";

        if (!empty($errors)) {
            $old = $data;
            include __DIR__ . "/../../views/product_add.php";
            return;
        }

        (new Product())->insert($data);
        header("Location: index.php?page=product-list");
        exit;
    }

    public function edit() {
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) { echo "ID không hợp lệ"; return; }

        $product = (new Product())->find($id);
        if (!$product) { echo "Không tìm thấy sản phẩm"; return; }

        $errors = [];
        include __DIR__ . "/../../views/product_edit.php";
    }

    public function update() {
        $id = (int)($_POST['id'] ?? 0);
        if ($id <= 0) { echo "ID không hợp lệ"; return; }

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'price' => trim($_POST['price'] ?? ''),
            'image' => trim($_POST['image'] ?? ''),
            'description' => trim($_POST['description'] ?? '')
        ];

        $errors = [];
        if ($data['name'] === '') $errors[] = "Tên không được trống";
        if ($data['price'] === '' || !is_numeric($data['price'])) $errors[] = "Giá phải là số";

        if (!empty($errors)) {
            $product = array_merge(['id'=>$id], $data);
            include __DIR__ . "/../../views/product_edit.php";
            return;
        }

        (new Product())->update($id, $data);
        header("Location: index.php?page=product-list");
        exit;
    }
}
