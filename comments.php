<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Комментарии | АгроФерма</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Оставьте комментарий</h1>

<?php if(isset($_GET['msg'])) { echo "<p>" . $_GET['msg'] . "</p>"; } ?>

<form action="process_comment.php" method="POST">
    <label for="author">Имя автора:</label><br>
    <input type="text" id="author" name="author" required><br>
    <label for="comment">Ваш комментарий:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
    <button type="submit">Отправить комментарий</button>
</form>

</body>
</html>