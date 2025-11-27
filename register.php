<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация | АгроФерма</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Регистрация на сайте АгроФерма</h1>

<?php if(isset($_GET['msg'])) { echo "<p>" . $_GET['msg'] . "</p>"; } ?>

<form action="process_register.php" method="POST">
    <label for="username">Логин:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>
    <button type="submit">Зарегистрироваться</button>
</form>

<p>Уже зарегистрированы? <a href="login.php">Авторизация</a></p>

</body>
</html>