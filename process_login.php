<?php
// process_login.php

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
    $password = trim($_POST['password']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:uname");
        $stmt->execute(['uname' => $username]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data && password_verify($password, $user_data['password'])) {
            session_regenerate_id(true); // Повышение уровня безопасности сессии
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user_data['username'];
            
            header("Location: articles.php"); // После успешного входа показываем список статей
            exit();
        } else {
            header("Location: login.php?msg=Неверный логин или пароль.");
            exit();
        }
    } catch (PDOException $e) {
        echo '<p>Ошибка аутентификации: ' . $e->getMessage() . '</p>';
    }
}
?>