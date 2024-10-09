document.getElementById('search').addEventListener('input', async function() {
    const query = this.value;
    const response = await fetch(`/api/search?query=${query}`);
    const results = await response.json();
    // Обновите отображение результатов на странице
});
