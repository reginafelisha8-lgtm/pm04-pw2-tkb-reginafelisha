<?php

class ProductController
{
    public function index()
    {
        require_once __DIR__ . '/../models/Product.php';
        require_once __DIR__ . '/../../config/database.php';

        $product = new Product($pdo);
        $products = $product->all();

        $view = __DIR__ . '/../../views/pages/products/index.php';

        if (!file_exists($view)) {
            die("File tidak ditemukan: " . $view);
        }

        require $view;
    }
}