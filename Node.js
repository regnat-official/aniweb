const express = require('express');
const mongoose = require('mongoose');

const app = express();
const PORT = process.env.PORT || 3000;

// Подключение к базе данных
mongoose.connect('mongodb://localhost/animeDB', { useNewUrlParser: true, useUnifiedTopology: true });

// Схема аниме
const animeSchema = new mongoose.Schema({
    title: String,
    genre: String,
    popularity: Number,
    description: String,
});

const Anime = mongoose.model('Anime', animeSchema);

// Маршрут для получения популярных аниме
app.get('/api/popular', async (req, res) => {
    const popularAnime = await Anime.find().sort({ popularity: -1 }).limit(10);
    res.json(popularAnime);
});

app.listen(PORT, () => {
    console.log(`Сервер запущен на порту ${PORT}`);
});
