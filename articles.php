<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статьи | АгроФерма</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Статьи АгроФермы</h1>
</header>

<div class="container">
    <?php
    // Примеры статей (реальные статьи нужно извлекать из базы данных)
    $articles = [
        ['id' => 1, 'title' => 'Выращивание картофеля', 'content' => 'Картофель – основной продукт питания многих семей'],
        ['id' => 2, 'title' => 'Уход за курами', 'content' => 'Простые правила ухода за домашней птицей']
    ];

    foreach ($articles as $article) {
        echo "<h2><a href='article.php?id={$article['id']}'>{$article['title']}</a></h2>";
        echo "<p>{$article['content']}</p>";
    }
    ?>
</div>

</body>
</html>