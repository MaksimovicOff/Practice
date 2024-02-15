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
            <h1>Обновление данных</h1>
        </div>
        <div class="form-buy">
            <form method="POST">
            <?php
            session_start();
            include_once "../db/db.php";
            error_reporting(0);
            $edit = $_GET['edit_sales'];
            $str_out = "SELECT * FROM `sales` WHERE `id` = $edit";
            $run_out = mysqli_query($connect, $str_out);
            $sales = mysqli_fetch_array($run_out);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $patronymic = $_POST['patronymic'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $adult = $_POST['adult'];
            $children = $_POST['children'];
            $class = $_POST['class'];
            $id_flights = $_POST['id_flights'];
            $role_sales = $_POST['role_sales'];
            $price = $_POST['price'];
            $buy = $_POST['buy'];
            $str_update_sales = "UPDATE `sales` SET
            `first_name` = '$first_name',
            `last_name` = '$last_name',
            `patronymic` = '$patronymic',
            `email` = '$email',
            `phone` = '$phone',
            `adult` = '$adult',
            `children` = '$children',
            `class` = '$class',
            `id_flights` = '$id_flights',
            `role_sales_id` = '$role_sales',
            `price` = '$price'
            WHERE `id` = $edit";
            
            ?>
                <input type="text" placeholder="First name" name="first_name" value="<?php echo $sales['first_name']; ?>">
                <input type="text" placeholder="Last name" name="last_name" value="<?php echo $sales['last_name']; ?>">
                <input type="text" placeholder="Patronymic" name="patronymic" value="<?php echo $sales['patronymic']; ?>">
                <input type="email" name="email" id="" placeholder="Email" required value="<?php echo $sales['email']; ?>">
                <input type="text" placeholder="Phone" name="phone" value="<?php echo $sales['phone']; ?>">
                <input type="number" placeholder="Adult" id="Adult" min="1" value="<?php echo $sales['adult']; ?>" name="adult">
                <input type="number" placeholder="Children" id="Children" name="children" value="<?php echo $sales['children']; ?>">
                <p>Багаж</p>
                <input type="checkbox" id="checkbox" class="checkbox">
                <label for="checkbox" class="checkbox-label"></label>
                <select name="class" id="class" value="<?php echo $sales['class']; ?>">
                    <option value="" disabled selected>Выберите класс самолёта</option>
                    <option value="1">Эконом</option>
                    <option value="2">Бизнес</option>
                </select>
                <input type="text" placeholder="ID рейса" name="id_flights" value="<?php echo $sales['id_flights']; ?>">
                <input type="number" placeholder="Роль пользователя" id="role" value="<?php echo $sales['role_sales_id']; ?>" name="role_sales"> 
                <input type="text" value="<?php echo $sales['price']; ?>" id="Price" name="price">
                <input type="text" readonly value="6500" id="Price2">
                <input type="button" value="Посчитать стоимость" id="set_price">
                <input type="submit" value="Обновить" name="buy">
                <?php
                if ($buy) {
                    $run_update_sales = mysqli_query($connect, $str_update_sales);
                    if ($run_update_sales) {
                        echo "<p class='success success_update'>Вы успешно обновили данные!</p>";
                    }else {
                        echo "<p class='error error_update'>Что-то пошло не так..</p>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>