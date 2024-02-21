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
            <h1>Авторизация</h1>
        </div>
        <div class="auth-form">
            <form method="POST">
                <input type="email" name="email" id="" placeholder="Email" required>
                <div class="v_pass">
                    <input type="password" placeholder="Password" id="password" required name="password">
                    <span class="icon"></span>
                </div>
                <a href="">Забыли пароль?</a>
                <input type="submit" value="Войти" name="auth">
                <input type="submit" value="Зарегистрироваться" onclick="window.location.href='reg.php'">
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
                            header("Location:otzivi.php");
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
</body>
<script src="../scripts/js.js"></script>
</html>