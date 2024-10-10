<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root"; // Стандартное имя пользователя для XAMPP/WAMP
$password = "";     // Пароль, по умолчанию пустой в XAMPP
$dbname = "anime_db";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// SQL-запрос для получения данных из таблицы anime_list
$sql = "SELECT id, title, genre, release_date, description FROM anime_list";
$result = $conn->query($sql);

// Проверка и вывод данных
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Название: " . $row["title"] . "<br>";
        echo "Жанр: " . $row["genre"] . "<br>";
        echo "Дата выхода: " . $row["release_date"] . "<br>";
        echo "Описание: " . $row["description"] . "<br><br>";
    }
} else {
    echo "Нет данных";
}

$conn->close();
?>
