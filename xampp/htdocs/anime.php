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

// Получение ID аниме из URL
$anime_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// SQL-запрос для получения данных об аниме
$sql = "SELECT * FROM anime_list WHERE id = $anime_id";
$result = $conn->query($sql);

// Проверка наличия данных
if ($result->num_rows > 0) {
    $anime = $result->fetch_assoc();
} else {
    die("Аниме не найдено.");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $anime['title']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo $anime['title']; ?></h1>
    </header>

    <main>
        <div class="anime-details">
            <img src="<?php echo $anime['image_url']; ?>" alt="<?php echo $anime['title']; ?>">
            <div class="anime-info">
                <p><strong>Жанр:</strong> <?php echo $anime['genre']; ?></p>
                <p><strong>Дата выхода:</strong> <?php echo $anime['release_date']; ?></p>
                <p><strong>Описание:</strong> <?php echo $anime['description']; ?></p>
            </div>
        </div>

        <h2>Выберите озвучку:</h2>
        <form id="voice-select">
            <select id="voice-dropdown">
                <option value="anidub">AniDub</option>
                <option value="anistar">AniStar</option>
                <!-- Добавьте другие варианты озвучки, если нужно -->
            </select>
            <button type="button" id="play-button">Смотреть</button>
        </form>

        <div id="video-player" style="display: none;">
            <h2>Воспроизведение</h2>
            <video id="anime-video" width="640" height="360" controls>
                <source id="video-source" src="" type="video/mp4">
                Ваш браузер не поддерживает видео.
            </video>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Aniweb. Все права защищены.</p>
    </footer>

    <script>
        document.getElementById('play-button').addEventListener('click', function() {
            var selectedVoice = document.getElementById('voice-dropdown').value;
            var videoSource = '';

            // Установите путь к видео в зависимости от выбранной озвучки
            if (selectedVoice === 'anidub') {
                videoSource = 'https://path_to_anidub_video/' + '<?php echo $anime["title"]; ?>.mp4';
            } else if (selectedVoice === 'anistar') {
                videoSource = 'https://path_to_anistar_video/' + '<?php echo $anime["title"]; ?>.mp4';
            }

            // Установите источник видео и покажите плеер
            document.getElementById('video-source').src = videoSource;
            document.getElementById('anime-video').load();
            document.getElementById('video-player').style.display = 'block';
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
