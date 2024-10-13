// Импорт необходимых библиотек
const express = require("express");
const mongoose = require("mongoose");
const bcrypt = require("bcrypt");
const session = require("express-session");
const bodyParser = require("body-parser");
const path = require("path");

const app = express();

// Настройка использования body-parser для работы с POST запросами
app.use(bodyParser.urlencoded({ extended: true }));

// Настройка сессий
app.use(session({
  secret: "your_secret_key",
  resave: false,
  saveUninitialized: false
}));

// Подключение к MongoDB (замените URL на ваш собственный)
mongoose.connect("mongodb+srv://<username>:<password>@cluster.mongodb.net/animeDB", { useNewUrlParser: tr
