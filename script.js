document.addEventListener('DOMContentLoaded', function() {
    let animeData = [];

    // Функция для отображения аниме
    function displayAnime(animeList) {
        const animeListContainer = document.getElementById('anime-list');
        animeListContainer.innerHTML = '';
        animeList.forEach(anime => {
            const animeItem = document.createElement('div');
            animeItem.className = 'anime-item';
            animeItem.innerHTML = `
                <h3>${anime.title}</h3>
                <button onclick="viewAnime('${anime.title}')">Посмотреть</button>
            `;
            animeListContainer.appendChild(animeItem);
        });
    }

    // Загрузка данных аниме
    fetch('anime_data.json')
        .then(response => response.json())
        .then(data => {
            animeData = data;
            displayAnime(animeData);
        });

    // Обработка поиска
    document.getElementById('search-bar').addEventListener('input', function(event) {
        const searchTerm = event.target.value.toLowerCase();
        const filteredAnime = animeData.filter(anime => anime.title.toLowerCase().includes(searchTerm));
        
        displayAnime(filteredAnime);

        // Показать или скрыть сообщение о том, что аниме не найдено
        const noResults = document.getElementById('no-results');
        noResults.style.display = filteredAnime.length === 0 ? 'block' : 'none';
    });

    // Обработка нажатия кнопки поиска
    document.getElementById('search-button').addEventListener('click', function() {
        const searchTerm = document.getElementById('search-bar').value.toLowerCase();
        const filteredAnime = animeData.filter(anime => anime.title.toLowerCase().includes(searchTerm));
        displayAnime(filteredAnime);
        
        // Показать или скрыть сообщение о том, что аниме не найдено
        const noResults = document.getElementById('no-results');
        noResults.style.display = filteredAnime.length === 0 ? 'block' : 'none';
    });
});

function viewAnime(title) {
    window.location.href = `anime.html?title=${encodeURIComponent(title)}`;
}

