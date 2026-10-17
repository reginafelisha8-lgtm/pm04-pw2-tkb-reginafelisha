<?php

class AuthController 
{
    public function login() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            require_once __DIR__ . '/../models/User.php';
            
            // UBAH 'mvc_toko' di bawah ini dengan nama database Anda yang ada di phpMyAdmin jika masih error
            $pdo = new PDO('mysql:host=localhost;dbname=mvc_toko', 'root', '');
            
            $userModel = new User($pdo); 
            $user = $userModel->findByUsername($_POST['username']);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];

                header('Location: /mvc-toko/public/index.php');
                exit;
            }

            echo "Username atau password salah!";
            return;
        }

        // KODE TAMPILAN FORM LOGIN
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Login - MVC Toko</title>
        </head>
        <body style="font-family: Arial, sans-serif; margin: 50px;">
            <h2>Login Form</h2>
            <form action="" method="POST" style="display: flex; flex-direction: column; width: 300px; gap: 10px;">
                <input type="text" name="username" placeholder="Masukkan Username" required style="padding: 8px;">
                <input type="password" name="password" placeholder="Masukkan Password" required style="padding: 8px;">
                <button type="submit" style="padding: 8px; background-color: blue; color: white; border: none; cursor: pointer;">Login</button>
            </form>
        </body>
        </html>
        <?php
    }
}