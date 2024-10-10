<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aniweb - Главная</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div style="display: flex; align-items: center;">
            <img id="logo" src="images/logo.png" alt="Логотип Aniweb">
            <h1>Aniweb</h1>
        </div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="anime.php">Аниме</a>
            <a href="news.php">Новости</a>
        </nav>
    </header>

    <main>
        <h2>Популярные аниме</h2>
        <div class="anime-list">
            <?php include 'fetch_anime.php'; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Aniweb. Все права защищены.</p>
    </footer>
</body>
</html>
