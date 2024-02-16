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
    <a href="exit.php" class="exit_lk"><span><img src="../img/exit.png" alt="">Выйти</span></a>
    <div class="main">
        <div class="title">
            <h1>Личный кабинет</h1>
        </div>
        <div class="photo_lk">
            <?php
            $id_photo = $_SESSION['user']['id'];
            $str_out_photo = "SELECT * FROM `users` WHERE `id` = $id_photo";
            $run_out_photo = mysqli_query($connect, $str_out_photo);
            $photoes = mysqli_fetch_array($run_out_photo);
            ?>
            <div class="private_data"><p>Фото профиля</p></div>
            <?php echo "<div class='photo_change'><img src='../img/$photoes[photo]'></div>";?>
            <form action="" method="POST">
                <?php
                echo "<a href='update_photo.php?edit_photo=$photoes[id]' target='_blank'>Изменить</a>";
                ?>
            </form>
        </div>
        <div class="data">
            <div class="private_data"><p>Личные данные</p></div>
            <div class="private_form">
                <form method="POST" class="lk_form">
                    <div class="first_input">
                        <input type="text" placeholder="Имя" value="<?php echo $_SESSION['user']['first_name']; ?>" name="name_upd" required>
                        <input type="text" placeholder="Фамилия" class="center_input" value="<?php echo $_SESSION['user']['last_name']; ?>" name="lastname_upd" required>
                        <input type="text" placeholder="Отчество" value="<?php echo $_SESSION['user']['patronymic']; ?>" name="patronymic_upd" required>
                    </div>
                    <div class="second_input">
                        <input type="email" placeholder="Email" class="first_in" value="<?php echo $_SESSION['user']['email']; ?>" name="email_upd" required>
                        <input type="tel" placeholder="Phone" class="last_in" value="<?php echo $_SESSION['user']['phone']; ?>" name="phone_upd" required>
                    </div>
                    <input type="submit" value="Сохранить" name="update" class="update_user">
                    <?php
                    $name_upd = $_POST['name_upd'];
                    $lastname_upd = $_POST['lastname_upd'];
                    $patronymic_upd = $_POST['patronymic_upd'];
                    $email_upd = $_POST['email_upd'];
                    $phone_upd = $_POST['phone_upd'];
                    $update = $_POST['update'];
                    $id_upd = $_SESSION['user']['id'];
                    $str_update_user = "UPDATE `users` SET
                    `first_name` = '$name_upd',
                    `last_name` = '$lastname_upd',
                    `patronymic` = '$patronymic_upd',
                    `email` = '$email_upd',
                    `phone` = '$phone_upd'
                    WHERE `id` = $id_upd";
                    if ($update) {
                        $run_update_user = mysqli_query($connect, $str_update_user);
                        if ($run_update_user) {
                            echo "<p class='success'>Вы успешно изменили данные!</p>";
                        }
                        else {
                            echo "<p class='error'>Что-то пошло не так..</p>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="auth_block">
            <div class="private_data"><p>Вход в учетную запись</p></div>
            <div class="auth-form auth_data">
                <form method="POST">
                    <div class="v_pass_now">
                        <input type="password" placeholder="Password" id="password_now" required name="password_now">
                        <span class="icon_now"></span>
                    </div>
                    <div class="v_pass">
                        <input type="password" placeholder="Password" id="password" required name="password_new">
                        <span class="icon"></span>
                    </div>
                    <div class="v_pass_reply">
                        <input type="password" placeholder="Password reply" id="password_reply" required name="password_new_reply">
                        <span class="icon_reply"></span>
                    </div>
                    <input type="submit" value="Сохранить" class="save" name="save">
                    <?php
                    $password_now = $_POST['password_now'];
                    $password_new = $_POST['password_new'];
                    $password_new_reply = $_POST['password_new_reply'];
                    $save = $_POST['save'];
                    $id_password = $_SESSION['user']['id'];
                    $password_now_s = $_SESSION['user']['password'];
                    $str_update_password = "UPDATE `users` SET
                    `password` = '$password_new'
                    WHERE `id` = $id_password";
                    if ($save) {
                        if ($password_now == $password_now_s) {
                            if ($password_new == $password_new_reply) {
                                $run_update_password = mysqli_query($connect, $str_update_password);
                                echo "<p class='success success_user'>Вы успешно изменили пароль!</p>'";
                            }
                            else
                            {
                                echo "<p class='error error_user'>Пароли не совпадают!</p>";
                            }
                        }
                        else
                        {
                            echo "<p class='error error_user'>Неверный старый пароль!</p>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="buy_bil">
            <div class="private_data"><p>Ваши купленные билеты</p></div>
            <?php
            $now_email = $_SESSION['user']['email'];
            $str_out_sales = "SELECT * FROM `sales` WHERE `email` = '$now_email'";
            $run_out_sales = mysqli_query($connect, $str_out_sales);
            ?>
            <table>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Количество взрослых</th>
                    <th>Количество детей</th>
                    <th>Класс самолёта</th>
                    <th>Цена</th>
                </tr>
                <?php
                while ($sales = mysqli_fetch_array($run_out_sales)) {
                    switch ($sales['class']) {
                        case '1':
                            $class = "Эконом";
                            break;
                        case '2':
                            $class = "Бизнес";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    echo "<tr class='e-ever2'>
                            <td>$sales[first_name]</td>
                            <td>$sales[last_name]</td>
                            <td>$sales[patronymic]</td>
                            <td>$sales[email]</td>
                            <td>$sales[phone]</td>
                            <td>$sales[adult]</td>
                            <td>$sales[children]</td>
                            <td>$class</td>
                            <td>$sales[price]</td>
                        </tr>";
                }
                ?>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>