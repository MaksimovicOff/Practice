<?php
session_start();
include_once '../db/db.php';
// error_reporting(0);
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
                $edit = $_GET['edit_flights'];
                $str_out = "SELECT * FROM `flights` WHERE `id` = $edit";
                $run_out = mysqli_query($connect, $str_out);
                $users = mysqli_fetch_array($run_out);
                $whence = $_POST['whence'];
                $wheres = $_POST['wheres'];
                $ddate = $_POST['ddate'];
                $adate = $_POST['adate'];
                $etime = $_POST['etime'];
                $atime = $_POST['atime'];
                $price = $_POST['price'];
                $update = $_POST['update'];
                $status = $_POST['status'];
                $str_update_user = "UPDATE `flights` SET
                `whence` = '$whence',
                `wheres` = '$wheres',
                `ddate` = '$ddate',
                `adate` = '$adate',
                `etime` = '$etime',
                `atime` = '$atime',
                `price` = '$price',
                `status` = '$status'
                WHERE `id` = $edit";

                if ($update) {
                        $run_update_user = mysqli_query($connect, $str_update_user);
                }
                ?>
                <input type="text" placeholder="First name" name="whence" required value="<?php echo $users['whence']; ?>">
                <input type="text" placeholder="Last name" name="wheres" required value="<?php echo $users['wheres']; ?>">
                <input type="date" placeholder="Patronymic" name="ddate" required value="<?php echo $users['ddate']; ?>">
                <input type="date" name="adate" id="" placeholder="adate" required value="<?php echo $users['adate']; ?>">
                <input type="time" placeholder="Phone" name="etime" required value="<?php echo $users['etime']; ?>">
                <input type="time" placeholder="Phone" name="atime" required value="<?php echo $users['atime']; ?>">
                <input type="text" placeholder="Phone" name="price" required value="<?php echo $users['price']; ?>">
                <select name="status" id="">
                    <option value="1">В ожидании</option>
                    <option value="2">Регистрация открыта</option>
                    <option value="3">Регистрация закрыта</option>
                    <option value="4">Отложен</option>
                    <option value="5">Отменен</option>
                    <option value="6">В полёте</option>
                    <option value="7">Завершен</option>
                </select>
                <input type="submit" value="Обновить" name="update">
            </form>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>