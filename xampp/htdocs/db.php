<?php
try {
    // Подключаемся к базе данных SQLite
    $db = new PDO('sqlite:anime.db');
    // Устанавливаем режим ошибок
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
?>
