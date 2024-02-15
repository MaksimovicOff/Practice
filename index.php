<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<title>Авиабилеты</title>
</head>
<body>
	<div class="heads">
		<div class="header">
			<div class="logo"></div>
			<div class="menu">
				<a href="">Главная</a>
				<a href="">Отмененнные рейсы</a>
				<a href="">Расписание</a>
				<a href="">Отзывы</a>
				<a href="">О нас</a>
				<a href="#modal">Войти</a>
			</div>
		</div>
		
		<h1>Найти актуальные билеты</h1>
		<div class="bilet">
			<input type="text" name="otkuda" placeholder="Откуда">
			<input type="text" name="kuda" placeholder="Куда">
			<input type="date" name="data" placeholder="Дата вылета">
			<select>
				<option>Бизнес</option>
				<option>Эконом</option>
			</select>
			<input type="submit" name="otkuda" value="Найти билет">
		</div>
	</div>
	<div class="modal" id="modal">
            <div class="modal_body">
                <div class="modal_content">
                <a href="#" class="modal_close"><img src="img/free-icon-crossed-4219073.png" alt=""></a>
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
                include_once 'db/db.php';
                error_reporting(0);
                $email = $_POST['email'];
                $password = $_POST['password'];
                $auth = $_POST['auth'];
                $str_out = "SELECT * FROM `users` WHERE email = '$email' && password = '$password'";
                $run_out = mysqli_query($connect, $str_out);
                $num_out = mysqli_num_rows($run_out);
                if ($_SESSION['user']['role'] == '1') {
                    header("Location:pages/lk_user.php");
                }elseif ($_SESSION['user']['role'] == '2') {
                    header("Location:pages/lk_admin.php");
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
                                header("Location:pages/lk_user.php");
                            }elseif ($_SESSION['user']['role'] == '2') {
                                header("Location:pages/lk_admin.php");
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
            <a href="#" class="modal_close"><img src="img/free-icon-crossed-4219073.png" alt=""></a>
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
                        header("Location:pages/lk_user.php");
                    }elseif ($_SESSION['user']['role'] == '2') {
                        header("Location:pages/lk_admin.php");
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
                                            header("Location:pages/lk_user.php");
                                        }elseif ($_SESSION['user']['role'] == '2') {
                                            header("Location:pages/lk_admin.php");
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
	<div class="content">
		<h2>Наши преимущества</h2>
		<div class="preim">
			<div class="block1">
				<img src="img/security.png">
				<p>Мы соблюдаем высокие стандарты безопасности, наш экипаж является высококвалифицированным</p>
			</div>
			<div class="block2">
				<img src="img/like.png">
				<p>У нас комфортабельные салоны, отличное обслуживание, которое найдет подход к каждому, есть бесплатный WI-FI</p>
			</div>
			<div class="block3">
				<img src="img/three-way.png">
				<p>Вы можете настроить свой перелет так, как вам хочется, есть гибкая настройка перелета</p>
			</div>
		</div>
		<h2 class="e-content_">Отзывы</h2>
		<div class="otzivi">
		<?php
                $str_out_reviews = "SELECT * FROM `reviews`WHERE `status` = 2 ORDER BY `id` DESC LIMIT 0, 4 ";
                $run_out_reviews = mysqli_query($connect, $str_out_reviews);
                while ($reviews = mysqli_fetch_array($run_out_reviews)) {
                    $str_out_reviews_user = "SELECT * FROM `users` WHERE `id` = $reviews[id_user]";
                    $run_out_rewiews_user = mysqli_query($connect, $str_out_reviews_user);
                    $users_reviews = mysqli_fetch_array($run_out_rewiews_user);
                    echo "<div class='e-reviews index_reviews'>
                        <div class='e-name'><p>$users_reviews[first_name]</p></div>
                        <div class='e-content'><p>$reviews[content]</p></div>
                        </div>";
                }
        ?>
		</div>
	</div>
	<div class="footer">
		<div class="line">
			<div class="logo_f"></div>
			<div class="soc">
				<div class="vk"><a href="#"></a></div>
				<div class="tg"><a href="#"></a></div>
			</div>
		</div>
		<div class="menu_f">
			<a href="">Главная</a>
			<a href="">Отмененнные рейсы</a>
			<a href="">Расписание</a>
			<a href="">Отзывы</a>
			<a href="">О нас</a>
			<a href="">Войти</a>
		</div>
	</div>
</body>
</html>