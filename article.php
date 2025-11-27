<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статья | АгроФерма</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Название статьи</h1>
<p>Основной текст статьи...</p>

<h2>Комментарии к статье</h2>

<?php
// Здесь идет вывод комментариев из базы данных
$id_article = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$id_article) {
    die('ID статьи не указан.');
}

// Предполагается наличие PDO-подключения
$stmt = $pdo->prepare("SELECT author, comment_text FROM comments WHERE article_id=:aid ORDER BY created_at DESC");
$stmt->execute(['aid' => $id_article]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($comments as $comment) {
    echo "<strong>{$comment['author']} сказал:</strong><br>";
    echo "<p>{$comment['comment_text']}</p>";
}
?>

<a href="comments.php?article_id=<?= $id_article ?>">Написать комментарий</a>

</body>
</html>