<?php
namespace App\Controllers;

use App\Models\Student;

class HomeController {
    public function index() {
        $message = "Chào mừng đến với MVC!";
        $studentInfo = (new Student())->getInfo();

        include __DIR__ . '/../../views/home.php';
    }
}
