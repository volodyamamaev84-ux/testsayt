<?php
// process_register.php

session_start();

$server = 'localhost';
$user = 'root'; // Ваше подключение к базе данных
$passwd = '';
$db_name = 'agrofarm_db';

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db_name", $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $email = trim($_POST['email']);

    try {
        $stmt = $pdo->prepare("INSERT INTO users(username, email, password) VALUES (:uname, :email, :pwd)");
        $stmt->execute(['uname' => $username, 'email' => $email, 'pwd' => $password]);
        
        header("Location: login.php?msg=Регистрация успешна!");
        exit(); // Завершаем выполнение скрипта после перенаправления
    } catch (PDOException $e) {
        echo '<p>Ошибка регистрации: ' . $e->getMessage() . '</p>';
    }
}
?>