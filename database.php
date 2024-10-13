<?php
// Данные для подключения к базе данных
$host = 'localhost';  // Это адрес сервера MySQL (обычно localhost)
$dbname = 'anime_db';  // Имя вашей базы данных
$username = 'root';    // Имя пользователя для MySQL (по умолчанию root)
$password = '';        // Пароль для MySQL (по умолчанию пусто, если вы не устанавливали пароль)

// Подключение через PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Устанавливаем режим обработки ошибок
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Успешное подключение к базе данных!";
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
?>
