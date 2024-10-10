<?php
    // Получаем данные из POST-запроса
    $newsData = file_get_contents('php://input');

    // Сохраняем обновленный JSON в файл
    file_put_contents('news_data.json', $newsData);

    // Отправляем ответ
    echo json_encode(['status' => 'success']);
?>
