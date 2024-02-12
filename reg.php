<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Авторизация</title>
</head>
<body>
    <div class="main">
        <div class="title">
            <h1>Регистрация</h1>
        </div>
        <div class="auth-form">
            <form method="POST">
                <input type="text" placeholder="First name" name="FirstName" required>
                <input type="text" placeholder="Last name" name="LastName" required>
                <input type="text" placeholder="Patronymic" name="Patronymic" required>
                <input type="email" name="Email" id="" placeholder="Email" required>
                <div class="v_pass">
                    <input type="password" placeholder="Password" id="password" required name="Password">
                    <span class="icon"></span>
                </div>
                <div class="v_pass_reply">
                    <input type="password" placeholder="Password reply" id="password_reply" required name="ReplyPassword">
                    <span class="icon_reply"></span>
                </div>
                <input type="text" placeholder="Phone" name="Phone" required>
                <input type="submit" value="Зарегистрироваться" name="Reg">
                <input type="submit" value="Войти" onclick="window.location.href='auth.html'">
            </form>
        </div>
    </div>
</body>
<script src="js.js"></script>
</html>
<?php
session_start();
include_once 'db.php';
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$patronymic = $_POST['Patronymic'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$replypassword = $_POST['ReplyPassword'];
$phone = $_POST['Phone'];
$reg = $_POST['Reg'];

$str_out_users = "SELECT * FROM `users` WHERE email = '$email'";
$run_out = mysqli_query($connect, $str_out_users);
$num_out = mysqli_num_rows($run_out);
$str_add_users = "INSERT INTO `users` (`first_name`, `last_name`, `patronymic`, `email`, `password`, `phone`) VALUES ('$firstname', '$lastname', '$patronymic', '$email', '$password', '$phone')";

if ($_SESSION['user']['role'] == '1') {
    header("Location:lk_user.php");
}elseif ($_SESSION['user']['role'] == '2') {
    header("Location:lk_admin.php");
}else {
    session_unset();
    if ($reg) {
        if ($num_out == 0) {
            if ($password == $replypassword) {
                $run_add_users = mysqli_query($connect, $str_add_users);
                if ($run_add_users) {
                    $str_out_user = "SELECT * FROM `users` WHERE email = '$email'";
                    $run_out_user = mysqli_query($connect, $str_out_user);
                    $user = mysqli_fetch_array($run_out_user);
                    $_SESSION['user'] = [
                        "id" => $user['id'],
                        "first_name" => $user['first_name'],
                        "last_name" => $user['last_name'],
                        "patronymic" => $user['patronymic'],
                        "email" => $user['email'],
                        "password" => $user['password'],
                        "phone" => $user['phone'],
                        "role" => $user['role']
                    ];
                    if ($_SESSION['user']['role'] == '1') {
                        header("Location:lk_user.php");
                    }elseif ($_SESSION['user']['role'] == '2') {
                        header("Location:lk_admin.php");
                    }
                    
                }
                else {
                    echo "<p class='error'>Возникла ошибка!</p>";
                }
            }
            else {
                echo "<p class='error'>Пароли не совпадают!</p>";
            }
        }
        else {
            echo "<p class='error'>Пользователь с таким email уже существует!</p>";
        }
    }
}
?>