<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
</head>
<body>
<div class="auth">
            <a href="#modal" class="auth_link">Вход</a>
        <div class="modal" id="modal">
            <div class="modal_body">
                <div class="modal_content">
                <a href="#" class="modal_close">X</a>
                <div class="auth-form">
            <form method="POST">
                <input type="email" name="email" id="" placeholder="Email" required class="modal_auth_input">
                <div class="v_pass">
                    <input type="password" placeholder="Password" id="password" required name="password" class="modal_auth_input">
                    <span class="icon"></span>
                </div>
                <a href="">Забыли пароль?</a>
                <input type="submit" value="Войти" name="auth">
                <input type="submit" value="Зарегистрироваться" onclick="window.location.href='#modal_reg'">
                <?php
                session_start();
                include_once '../db/db.php';
                error_reporting(0);
                $email = $_POST['email'];
                $password = $_POST['password'];
                $auth = $_POST['auth'];
                $str_out = "SELECT * FROM `users` WHERE email = '$email' && password = '$password'";
                $run_out = mysqli_query($connect, $str_out);
                $num_out = mysqli_num_rows($run_out);
                if ($_SESSION['user']['role'] == '1') {
                    header("Location:lk_user.php");
                }elseif ($_SESSION['user']['role'] == '2') {
                    header("Location:lk_admin.php");
                }else
                {
                    session_unset();
                    if ($auth) {
                        if ($num_out == 1) {
                            $user = mysqli_fetch_array($run_out);
                            $_SESSION['user'] = [
                                "id" => $user['id'],
                                "first_name" => $user['first_name'],
                                "last_name" => $user['last_name'],
                                "patronymic" => $user['patronymic'],
                                "email" => $user['email'],
                                "password" => $user['password'],
                                "phone" => $user['phone'],
                                "role" => $user['role'],
                                "role_sales" => $user['role_sales']
                            ];
                            if ($_SESSION['user']['role'] == '1') {
                                header("Location:lk_user.php");
                            }elseif ($_SESSION['user']['role'] == '2') {
                                header("Location:lk_admin.php");
                            }
                        }
                        else {
                            echo "<p class='error error_auth'>Неверный логин или пароль</p>";
                        }
                    }
                }
                ?>
            </form>
        </div>
                </div>
            </div>
        </div>
             <div class="modal" id="modal_reg">
        <div class="modal_body">
            <div class="modal_content modal_content_reg">
            <a href="#" class="modal_close">X</a>
            <div class="auth-form">
            <form method="POST">
                <input type="text" placeholder="First name" name="FirstName" required class="modal_auth_input">
                <input type="text" placeholder="Last name" name="LastName" required class="modal_auth_input">
                <input type="text" placeholder="Patronymic" name="Patronymic" required class="modal_auth_input">
                <input type="email" name="Email" id="" placeholder="Email" required class="modal_auth_input">
                <div class="v_pass">
                    <input type="password" placeholder="Password" id="password" required name="Password" class="modal_auth_input">
                    <span class="icon"></span>
                </div>
                <div class="v_pass_reply">
                    <input type="password" placeholder="Password reply" id="password_reply" required name="ReplyPassword" class="modal_auth_input">
                    <span class="icon_reply"></span>
                </div>
                <input type="text" placeholder="Phone" name="Phone" required class="modal_auth_input">
                <input type="submit" value="Зарегистрироваться" name="Reg">
                <input type="submit" value="Войти" onclick="window.location.href='#modal'">
                <?php
                    session_start();
                    include_once '../db/db.php';
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
                                            "role" => $user['role'],
                                            "role_sales" => $user['role_sales']
                                        ];
                                        if ($_SESSION['user']['role'] == '1') {
                                            header("Location:lk_user.php");
                                        }elseif ($_SESSION['user']['role'] == '2') {
                                            header("Location:lk_admin.php");
                                        }
                                        
                                    }
                                    else {
                                        echo "<p class='error error_auth'>Возникла ошибка!</p>";
                                    }
                                }
                                else {
                                    echo "<p class='error error_auth'>Пароли не совпадают!</p>";
                                }
                            }
                            else {
                                echo "<p class='error error_auth'>Пользователь с таким email уже существует!</p>";
                            }
                        }
                    }
                ?>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../scripts/js.js"></script>
</html>