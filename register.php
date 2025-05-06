<?php
// Подключение к базе данных SQLite
$db = new PDO('sqlite:' . __DIR__ . '/users.db');

// Получаем данные из формы
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Хешируем пароль (безопасно)
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Время регистрации
$created_at = date('Y-m-d H:i:s');

// Подготовка и выполнение запроса
$stmt = $db->prepare("INSERT INTO users (username, email, password_hash, created_at) VALUES (?, ?, ?, ?)");
$success = $stmt->execute([$username, $email, $password_hash, $created_at]);

// Ответ пользователю
if ($success) {
    echo "✅ Регистрация прошла успешно!";
} else {
    echo "❌ Ошибка при регистрации: возможно, пользователь с таким именем уже существует.";
}
?>
