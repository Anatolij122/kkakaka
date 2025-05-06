<?php
session_start();

// Проверка, вошёл ли пользователь
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$username = htmlspecialchars($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="ukr">
<head>
    <meta charset="UTF-8">
    <title>Панель користувача</title>
    <style>
        body {
            background-color: #fffde3;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
        .welcome {
            font-size: 28px;
            color: #6e4b00;
        }
        .logout {
            margin-top: 30px;
        }
        a {
            font-size: 20px;
            color: brown;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="welcome">👋 Вітаємо, <?php echo $username; ?>!</div>
    <div class="logout">
        <a href="logout.php">Вийти</a>
    </div>
</body>
</html>
