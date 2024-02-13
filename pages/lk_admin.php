<?php
session_start();
error_reporting(0);
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
    <title>Авторизация</title>
</head>
<body>
    <a href="exit.php" class="exit_lk"><span><img src="../img/exit.png" alt="">Выйти</span></a>
    <div class="main">
        <div class="title">
            <h1>Личный кабинет</h1>
        </div>
        <div class="data">
            <div class="private_data"><p>Личные данные</p></div>
            <div class="private_form">
                <form method="POST" class="lk_form">
                    <div class="first_input">
                        <input type="text" placeholder="Имя" value="<?php echo $_SESSION['user']['first_name']; ?>" name="name_upd">
                        <input type="text" placeholder="Фамилия" class="center_input" value="<?php echo $_SESSION['user']['last_name']; ?>" name="last_name_upd">
                        <input type="text" placeholder="Отчество" value="<?php echo $_SESSION['user']['patronymic']; ?>" name="patronymic_upd">
                    </div>
                    <div class="second_input">
                        <input type="email" placeholder="Email" class="first_in" value="<?php echo $_SESSION['user']['email']; ?>" name="email_upd">
                        <input type="text" placeholder="Phone" class="last_in" value="<?php echo $_SESSION['user']['phone']; ?>" name="phone_upd">
                    </div>
                    <input type="submit" value="Сохранить" name="update">
                    <?php
                    $name_upd = $_POST['name_upd'];
                    $lastname_upd = $_POST['last_name_upd'];
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
                        mysqli_query($connect, $str_update_user);
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
                    $id_password = $_SESSION['user']['id'];
                    $password_now_s = $_SESSION['user']['password'];
                    $save = $_POST['save'];
                    $str_update_password = "UPDATE `users` SET
                    `password` = '$password_new'
                    WHERE `id` = $id_password";
                    if ($save) {
                        if ($password_now == $password_now_s) {
                            if ($password_new == $password_new_reply) {
                                $run_update_password = mysqli_query($connect, $str_update_password);
                            }
                            else
                            {
                                echo "<p class='error'>Пароли не совпадают!</p>";
                            }
                        }
                        else
                        {
                            echo "<p class='error'>Неверный старый пароль!</p>";
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
            $delete_sales = $_GET['del_sales'];
            $str_delete_sales = "DELETE FROM `sales` WHERE `id` = $delete_sales";
            $run_delete_sales = mysqli_query($connect, $str_delete_sales);
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Количество взрослых</th>
                    <th>Количество детей</th>
                    <th>Класс самолёта</th>
                    <th>ID рейса</th>
                    <th>Роль клиента</th>
                    <th>Цена</th>
                    <th colspan="2">Действия</th>
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
                    switch ($sales['role_sales_id']) {
                        case '1':
                            $role_sales = "Клиент";
                            break;
                        case '2':
                            $role_sales = "Постоянный клиент";
                            break;
                        case '3':
                            $role_sales = "Сотрудник компании";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    echo "<tr class='e-ever2'>
                            <td>$sales[id]</td>
                            <td>$sales[first_name]</td>
                            <td>$sales[last_name]</td>
                            <td>$sales[patronymic]</td>
                            <td>$sales[email]</td>
                            <td>$sales[phone]</td>
                            <td>$sales[adult]</td>
                            <td>$sales[children]</td>
                            <td>$class</td>
                            <td>$sales[id_flights]</td>
                            <td>$role_sales</td>
                            <td>$sales[price]</td>
                            <td><a href='update_sales.php?edit_sales=$sales[id]' target='_blank' class='e-update'>Обновить</a></td>
                            <td><a href='?del_sales=$sales[id]' class='e-delete'>Удалить</a></td>
                        </tr>";
                }
                ?>
            </table>
        </div>
        <div class="users">
            <div class="private_data"><p>Пользователи</p></div>
            <?php
            $str_out_users = "SELECT * FROM `users`";
            $run_out_users = mysqli_query($connect, $str_out_users);
            $delete = $_GET['del'];
            $str_delete_users = "DELETE FROM `users` WHERE `id` = $delete";
            $run_delete_users = mysqli_query($connect, $str_delete_users);
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Пароль</th>
                    <th>Роль</th>
                    <th>Роль покупки</th>
                    <th colspan="2">Действия</th>
                </tr>
                <?php
                while ($users = mysqli_fetch_array($run_out_users)) {
                    switch ($users['role']) {
                        case '1':
                            $role = "Пользователь";
                            break;
                        case '2':
                            $role = "Администратор";
                            break;
                        default:
                            # code...
                            break;
                    }
                    switch ($users['role_sales']) {
                        case '1':
                            $role_sales = "Клиент";
                            break;
                        case '2':
                            $role_sales = "Постоянный клиент";
                            break;
                        case '3':
                            $role_sales = "Сотрудник компании";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    echo "<tr align='center' class='e-ever2'>
                            <td>$users[id]</td>
                            <td>$users[first_name]</td>
                            <td>$users[last_name]</td>
                            <td>$users[patronymic]</td>
                            <td>$users[email]</td>
                            <td>$users[phone]</td>
                            <td>$users[password]</td>
                            <td>$role</td>
                            <td>$role_sales</td>
                            <td><a href='update_users.php?edit=$users[id]' target='_blank' class='e-update'>Обновить</a></td>
                            <td><a href='?del=$users[id]' class='e-delete'>Удалить</a></td>
                        </tr>";
                }
                ?>
            </table>
        </div>
        <div class="flights">
            <div class="private_data"><p>Рейсы</p></div>
            <?php
            $str_out_flights = "SELECT * FROM `flights`";
            $run_out_flights = mysqli_query($connect, $str_out_flights);
            $del_flights = $_GET['del_flights'];
            $str_delete_flights = "DELETE FROM `flights` WHERE `id` = $del_flights";
            $run_delete_flights = mysqli_query($connect, $str_delete_flights);
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Откуда</th>
                    <th>Куда</th>
                    <th>Дата вылета</th>
                    <th>Дата прилета</th>
                    <th>Время вылета</th>
                    <th>Время прилета</th>
                    <th>Цена</th>
                    <th colspan="2">Действия</th>
                </tr>
                <?php
                while($flights = mysqli_fetch_array($run_out_flights)){
                    echo "<tr align='center' class='e-ever2'>
                            <td>$flights[id]</td>
                            <td>$flights[whence]</td>
                            <td>$flights[wheres]</td>
                            <td>$flights[ddate]</td>
                            <td>$flights[adate]</td>
                            <td>$flights[etime]</td>
                            <td>$flights[atime]</td>
                            <td>$flights[price]</td>
                            <td><a href='update_flights.php?edit_flights=$flights[id]' target='_blank' class='e-update'>Обновить</a></td>
                            <td><a href='?del_flights=$flights[id]' class='e-delete'>Удалить</a></td>
                        </tr>";
                }
                ?>
            </table>
            <div class="auth-form">
                <h3 class="add_flights">Добавить рейс</h3>
                <form method="POST" class="add_flights_form">
                    <input type="text" placeholder="Откуда" name="whence">
                    <input type="text" placeholder="Куда" name="wheres">
                    <p>Дата вылета</p>
                    <input type="date" name="e-date">
                    <p>Дата прилета</p>
                    <input type="date" name="a-date">
                    <p>Время вылета</p>
                    <input type="time" name="e-time">
                    <p>Время прилета</p>
                    <input type="time" name="a-time">
                    <input type="text" placeholder="Цена" name="price">
                    <input type="submit" value="Добавить" name="add_flights">
                    <?php
                    $whence = $_POST['whence'];
                    $wheres = $_POST['wheres'];
                    $edate = $_POST['e-date'];
                    $adate = $_POST['a-date'];
                    $etime = $_POST['e-time'];
                    $atime = $_POST['a-time'];
                    $price = $_POST['price'];
                    $add_flights = $_POST['add_flights'];
                    $str_add_flights = "INSERT INTO `flights` (`whence`, `wheres`, `ddate`, `adate`, `etime`, `atime`, `price`) VALUES ('$whence', '$wheres', '$edate', '$adate', '$etime', '$atime', '$price');";
                    if ($add_flights) {
                        $run_add_flights = mysqli_query($connect, $str_add_flights);
                        if ($run_add_flights) {
                            echo "<p class='success'>Вы успешно добавили рейс!</p>";
                        }
                        else
                        {
                            echo "<p class='error'>Что-то пошло не так!</p>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="sales">
            <div class="private_data"><p>Покупки</p></div>
            <?php
            $str_out_sales = "SELECT * FROM `sales`";
            $run_out_sales = mysqli_query($connect, $str_out_sales);
            $delete_sales = $_GET['del_sales'];
            $str_delete_sales = "DELETE FROM `sales` WHERE `id` = $delete_sales";
            $run_delete_sales = mysqli_query($connect, $str_delete_sales);
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Количество взрослых</th>
                    <th>Количество детей</th>
                    <th>Класс самолёта</th>
                    <th>ID рейса</th>
                    <th>Роль клиента</th>
                    <th>Цена</th>
                    <th colspan="2">Действия</th>
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
                    switch ($sales['role_sales_id']) {
                        case '1':
                            $role_sales = "Клиент";
                            break;
                        case '2':
                            $role_sales = "Постоянный клиент";
                            break;
                        case '3':
                            $role_sales = "Сотрудник компании";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    echo "<tr class='e-ever2'>
                            <td>$sales[id]</td>
                            <td>$sales[first_name]</td>
                            <td>$sales[last_name]</td>
                            <td>$sales[patronymic]</td>
                            <td>$sales[email]</td>
                            <td>$sales[phone]</td>
                            <td>$sales[adult]</td>
                            <td>$sales[children]</td>
                            <td>$class</td>
                            <td>$sales[id_flights]</td>
                            <td>$role_sales</td>
                            <td>$sales[price]</td>
                            <td><a href='update_sales.php?edit_sales=$sales[id]' target='_blank' class='e-update'>Обновить</a></td>
                            <td><a href='?del_sales=$sales[id]' class='e-delete'>Удалить</a></td>
                        </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>