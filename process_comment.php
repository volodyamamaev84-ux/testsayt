<?php
// process_comment.php

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
    $author = trim($_POST['author']);
    $comment_text = trim($_POST['comment']);
    $article_id = intval($_GET['article_id']); // ID статьи, к которой добавляется комментарий

    try {
        $stmt = $pdo->prepare("INSERT INTO comments(article_id, author, comment_text) VALUES (:aid, :author, :comment)");
        $stmt->execute(['aid' => $article_id, 'author' => $author, 'comment' => $comment_text]);
        
        header("Location: article.php?id={$article_id}&msg=Комментарий отправлен!");
        exit(); // Завершаем выполнение скрипта после перенаправления
    } catch (PDOException $e) {
        echo '<p>Ошибка добавления комментария: ' . $e->getMessage() . '</p>';
    }
}
?>