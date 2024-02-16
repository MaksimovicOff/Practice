<div class="header">
	<div class="logo"></div>
	<div class="menu">
		<a href="../index.php">Главная</a>
		<a href="">Отмененнные рейсы</a>
		<a href="">Расписание</a>
		<a href="">Отзывы</a>
		<a href="../pages/about.php">О нас</a>
        <?php
        session_start();
        error_reporting(0);
        include_once '../db/db.php';
        if ($_SESSION['user']) {
        ?><a href="../pages/lk_admin.php" class="lk_logo"><?php echo $_SESSION['user']['first_name']; ?></a><?php
        }else {
        ?><a href="#modal" class="lk_logo">Войти</a><?php
        }
        ?>	
	</div>
</div>
<div class="modal" id="modal">
    <div class="modal_body">
        <div class="modal_content">
            <a href="#" class="modal_close"><img src="../img/free-icon-crossed-4219073.png" alt=""></a>
            <div class="auth-form">
                <form method="POST" action="auth.php">
                    <input type="email" name="email" id="" placeholder="Email" required class="modal_auth_input">
                    <div class="v_pass">
                        <input type="password" placeholder="Password" id="password" required name="password" class="modal_auth_input">
                        <span class="icon"></span>
                    </div>
                    <a href="">Забыли пароль?</a>
                    <input type="submit" value="Войти" name="auth">
                    <input type="submit" value="Зарегистрироваться" onclick="window.location.href='#modal_reg'">
                    <?php
                    if ($_SESSION['msg']) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
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
            <a href="#" class="modal_close"><img src="../img/free-icon-crossed-4219073.png" alt=""></a>
            <div class="auth-form">
                <form method="POST" action="reg.php">
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
                    if ($_SESSION['msg_reg']) {
                        echo $_SESSION['msg_reg'];
                        unset($_SESSION['msg_reg']);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>