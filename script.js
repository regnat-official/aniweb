document.addEventListener('DOMContentLoaded', function () {
    const animeList = document.getElementById('anime-list');
    const searchBar = document.getElementById('search-bar');
    let animeData = [];

    // Fetch anime data from JSON file
    fetch('anime_data.json')
        .then(response => response.json())
        .then(data => {
            animeData = data;
            displayAnime(animeData); // Display all anime initially
        });

    // Function to display anime
    function displayAnime(animeArray) {
        animeList.innerHTML = ''; // Clear the list before displaying
        animeArray.forEach(anime => {
            const animeItem = document.createElement('div');
            animeItem.classList.add('anime-item');
            animeItem.innerHTML = `
                <h3>${anime.title}</h3>
                <p>${anime.genre}</p>
                <p>${anime.description}</p>
            `;
            animeList.appendChild(animeItem);
        });
    }

    // Event listener for search bar
    searchBar.addEventListener('input', function (e) {
        const searchString = e.target.value.toLowerCase();
        const filteredAnime = animeData.filter(anime => {
            return anime.title.toLowerCase().includes(searchString);
        });
        displayAnime(filteredAnime); // Display filtered anime
    });
});