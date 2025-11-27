<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация | АгроФерма</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Авторизация на сайте АгроФерма</h1>

<?php if(isset($_GET['msg'])) { echo "<p>" . $_GET['msg'] . "</p>"; } ?>

<form action="process_login.php" method="POST">
    <label for="username">Логин:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br>
    <button type="submit">Войти</button>
</form>

<p>Нет аккаунта? <a href="register.php">Регистрация</a></p>

</body>
</html>