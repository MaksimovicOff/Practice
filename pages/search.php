<?php
session_start();
include_once '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Поиск</title>
</head>
<body>
    <div class="main">
        <div class="title">
            <h1>Регистрация</h1>
        </div>
        <div class="auth-form">
            <form method="POST" action="out.php">
                <input type="text" placeholder="Откуда" name="Whence" required>
                <input type="text" placeholder="Куда" name="Wheres" required>
                <input type="date" name="data">
                <input type="submit" value="Зарегистрироваться" name="Search">
            </form>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>

