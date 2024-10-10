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

// Получение поискового запроса
$search_query = $conn->real_escape_string($_GET['query']);

// SQL-запрос для поиска аниме по названию
$sql = "SELECT * FROM anime_list WHERE title LIKE '%$search_query%'";
$result = $conn->query($sql);

// Вывод результатов
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
    echo "Аниме не найдено.";
}

$conn->close();
?>
