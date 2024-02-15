<?php
session_start();
include_once '../db/db.php';
error_reporting(0);
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
    <title>Авторизация</title>
</head>
<body>
    <div class="main">
        <div class="title">
            <h1>Обновить данные</h1>
        </div>
        <div class="auth-form">
            <form method="POST">
                <?php
                $edit = $_GET['edit'];
                $str_out = "SELECT * FROM `users` WHERE `id` = $edit";
                $run_out = mysqli_query($connect, $str_out);
                $users = mysqli_fetch_array($run_out);
                $first_name = $_POST['FirstName'];
                $last_name = $_POST['LastName'];
                $patronymic = $_POST['Patronymic'];
                $email = $_POST['Email'];
                $password = $_POST['Password'];
                $password_reply = $_POST['ReplyPassword'];
                $phone = $_POST['Phone'];
                $update = $_POST['update'];
                $role = $_POST['role'];
                $role_sales = $_POST['role_sales'];
                $str_update_user = "UPDATE `users` SET
                `first_name` = '$first_name',
                `last_name` = '$last_name',
                `patronymic` = '$patronymic',
                `email` = '$email',
                `password` = '$password',
                `phone` = '$phone',
                `role` = '$role',
                `role_sales` = '$role_sales'
                WHERE `id` = $edit";

                
                ?>
                <input type="text" placeholder="First name" name="FirstName" required value="<?php echo $users['first_name']; ?>">
                <input type="text" placeholder="Last name" name="LastName" required value="<?php echo $users['last_name']; ?>">
                <input type="text" placeholder="Patronymic" name="Patronymic" required value="<?php echo $users['patronymic']; ?>">
                <input type="email" name="Email" id="" placeholder="Email" required value="<?php echo $users['email']; ?>">
                <div class="v_pass">
                    <input type="password" placeholder="Password" id="password" required name="Password" value="<?php echo $users['password']; ?>">
                    <span class="icon icon_update"></span>
                </div>
                <div class="v_pass_reply">
                    <input type="password" placeholder="Password reply" id="password_reply" required name="ReplyPassword">
                    <span class="icon_reply icon_update"></span>
                </div>
                <input type="text" placeholder="Phone" name="Phone" required value="<?php echo $users['phone']; ?>">
                <input type="text" placeholder="Phone" name="role" required value="<?php echo $users['role']; ?>">
                <input type="text" placeholder="Phone" name="role_sales" required value="<?php echo $users['role_sales']; ?>">
                <input type="submit" value="Обновить" name="update">
                <?php
                if ($update) {
                    if ($password == $password_reply) {
                        $run_update_user = mysqli_query($connect, $str_update_user);
                        if ($run_update_user) {
                            echo "<p class='success success_update'>Вы успешно обновили данные!</p>";
                        }else {
                            echo "<p class='error error_update'>Что-то пошло не так..</p>";
                        }
                    }else {
                        echo "<p class='error error_update'>Пароли не совпадают!</p>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>