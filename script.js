document.addEventListener('DOMContentLoaded', function() {
    fetch('anime_data.json')
        .then(response => response.json())
        .then(data => {
            const animeList = document.getElementById('anime-list');
            data.forEach(anime => {
                const animeItem = document.createElement('div');
                animeItem.className = 'anime-item';
                animeItem.innerHTML = `
                    <h3>${anime.title}</h3>
                    <button onclick="viewAnime('${anime.title}')">Посмотреть</button>
                `;
                animeList.appendChild(animeItem);
            });
        });
});

function viewAnime(title) {
    window.location.href = `anime.html?title=${encodeURIComponent(title)}`;
}
