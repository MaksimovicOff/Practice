<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>Авиабилеты</title>
</head>
<body>
	<div class="heads">
    <?php
    include_once "controllers/header_menu.php";
    ?>
		<h1>Найти актуальные билеты</h1>
		<div class="bilet">
            <form action="pages/out.php" method="post" class="bilet">
                <input type="text" name="Whence" class="polev" placeholder="Откуда">
                <input type="text" name="Wheres" class="polev" placeholder="Куда">
                <input type="date" name="data" class="polev" placeholder="Дата вылета">
                <select class="polev">
                    <option>Бизнес</option>
                    <option>Эконом</option>
                </select>
                <input type="submit" name="Search" class="sub" value="Найти билет">
            </form>
		</div>
	</div>
	<div class="modal" id="modal">
        <div class="modal_body">
            <div class="modal_content">
                <a href="#" class="modal_close"><img src="img/free-icon-crossed-4219073.png" alt=""></a>
                <div class="auth-form">
                    <form method="POST" action="pages/auth.php">
                        <input type="email" name="email" id="" placeholder="Email" required class="modal_auth_input">
                        <div class="v_pass">
                            <input type="password" placeholder="Password" id="password" required name="password" class="modal_auth_input">
                            <span class="icon"></span>
                        </div>
                        <a href="">Забыли пароль?</a>
                        <input type="submit" value="Войти" name="auth">
                        <input type="submit" value="Зарегистрироваться" onclick="window.location.href='#modal_reg'">
                        
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
                    <form method="POST" action="pages/reg.php">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div class="content">
		<h2>Наши преимущества</h2>
		<div class="preim">
			<div class="block1">
                <div style="display: flex;flex-direction: column; width: 100%; align-items: center; justify-content: space-evenly;"><img src="img/security.png" style="margin-bottom: 10px;">
                <h3>Безопасность</h3></div>
				<p>Мы соблюдаем высокие стандарты безопасности, наш экипаж является высококвалифицированным</p>
			</div>
			<div class="block1">
                <div style="display: flex;flex-direction: column; width: 100%; align-items: center; justify-content: space-evenly;"><img src="img/like.png" style="margin-bottom: 10px;">
                <h3>Комфорт</h3></div>
                <p>У нас комфортабельные салоны, отличное обслуживание, которое найдет подход к каждому, есть бесплатный WI-FI</p>
            </div>
			<div class="block1">
                <div style="display: flex;flex-direction: column; width: 100%; align-items: center; justify-content: space-evenly;"><img src="img/three-way.png" style="margin-bottom: 10px;">
                <h3>Гибкость</h3></div>
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
                    echo "
                    <div class='e-reviews index_reviews'>
                        <img src='img/ava.png'>
                        <div class='e-name'><p>$users_reviews[first_name]</p></div>
                        <div class='e-content'><p>$reviews[content]</p></div>
                        </div>";
                }
        ?>
		</div>
	</div>
    <?php
        include_once 'controllers/footer.php';
    ?>
</body>
<script src="scripts/js.js"></script>
</html>
