<?php
require_once 'config.php'; // Подключение к базе данных

$clients_sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    phone VARCHAR(256) NOT NULL,
    date DATE NOT NULL
)";

if ($conn->query($clients_sql) === TRUE) {
    echo "Таблица clients успешно создана";
} else {
    echo "Ошибка при создании таблицы: " . $conn->error;
}

$users_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(256) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL
)";

if ($conn->query($users_sql) === TRUE) {
    echo "Таблица users успешно создана";
} else {
    echo "Ошибка при создании таблицы: " . $conn->error;
}

$conn->close();
