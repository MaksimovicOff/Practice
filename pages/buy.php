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
            <h1>Покупка билета</h1>
        </div>
        <div class="form-buy">
            <form method="POST">
                <input type="text" placeholder="First name" name="first_name">
                <input type="text" placeholder="Last name" name="last_name">
                <input type="text" placeholder="Patronymic" name="patronymic">
                <input type="email" name="email" id="" placeholder="Email" required>
                <input type="text" placeholder="Phone" name="phone">
                <input type="number" placeholder="Adult" id="Adult" min="1" value="1" name="adult">
                <input type="number" placeholder="Children" id="Children" name="children">
                <p>Багаж</p>
                <input type="checkbox" id="checkbox" class="checkbox">
                <label for="checkbox" class="checkbox-label"></label>
                <select name="class" id="class">
                    <option value="" disabled selected>Выберите класс самолёта</option>
                    <option value="1">Эконом</option>
                    <option value="2">Бизнес</option>
                </select>
                <input type="text" placeholder="ID рейса" name="id_flights">
                <input type="number" placeholder="Роль пользователя" id="role" value="1" name="role_sales"> 
                <input type="text" readonly value="6500" id="Price" name="price">
                <input type="text" readonly value="6500" id="Price2">
                <input type="button" value="Посчитать стоимость" id="set_price">
                <input type="submit" value="Купить" name="buy">
            </form>
            <?php
            session_start();
            include_once "../db/db.php";
            error_reporting(0);
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
            $str_add_sales = "INSERT INTO `sales` (`first_name`, `last_name`, `patronymic`, `email`, `phone`, `adult`, `children`, `class`, `id_flights`, `role_sales_id`, `price`) VALUES ('$first_name', '$last_name', '$patronymic', '$email', '$phone', '$adult', '$children', '$class', '$id_flights', '$role_sales', '$price');";
            if ($buy) {
                $run_add_sales = mysqli_query($connect, $str_add_sales);
                if ($run_add_sales) {
                    echo "<p class='success'>Вы успешно купили билет!</p>";
                }
                else
                {
                    echo "<p class='error'>Произошла ошибка!</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>