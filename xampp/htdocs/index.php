<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anime_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// SQL-запрос для получения данных об аниме
$sql = "SELECT * FROM anime_list";
$result = $conn->query($sql);
?>
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
        <h1>Добро пожаловать на Aniweb!</h1>
    </header>
    
    <main>
        <h2>Популярные аниме</h2>
        <div class="anime-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='anime-item'>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<img src='" . $row["image_url"] . "' alt='" . $row["title"] . "'>";
                    echo "<p>Жанр: " . $row["genre"] . "</p>";
                    echo "<p>Дата выхода: " . $row["release_date"] . "</p>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Нет данных об аниме.";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Aniweb. Все права защищены.</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>

