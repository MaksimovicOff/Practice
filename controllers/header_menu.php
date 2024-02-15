<div class="header">
	<div class="logo"></div>
	<div class="menu">
		<a href="">Главная</a>
		<a href="">Отмененнные рейсы</a>
		<a href="">Расписание</a>
		<a href="">Отзывы</a>
		<a href="../pages/about.php">О нас</a>
        <?php
        session_start();
        include_once 'db/db.php';
        error_reporting(0);
        if ($_SESSION['user']) {
        ?><a href="pages/lk_admin.php" class="lk_logo"><?php echo $_SESSION['user']['first_name']; ?></a><?php
        }else {
        ?><a href="#modal" class="lk_logo">Войти</a><?php
        }
        ?>	
	</div>
</div>