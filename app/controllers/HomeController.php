<?php

class HomeController
{
    public function index()
    {
        $title = 'Home - My Store';

        ob_start();
        require __DIR__ . '/../../views/home.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../views/layouts/main.php';
    }
}