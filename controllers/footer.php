<div class="footer">
	<div class="line">
		<div class="logo_f"></div>
		<div class="soc">
			<div class="circle"><div class="vk"><a href="#"></a></div></div>
			<div class="circle"><div class="tg"><a href="#"></a></div></div>
		</div>
	</div>
	<div class="menu_f">
		<a href="../index.php">Главная</a>
		<a href="">Отмененнные рейсы</a>
		<a href="">Расписание</a>
		<a href="">Отзывы</a>
		<a href="../pages/about.php">О нас</a>
		<?php
        if ($_SESSION['user']) {
        ?><a href="../pages/lk_admin.php"><?php echo $_SESSION['user']['first_name']; ?> <i class="fa-solid fa-user"></i></a><?php
        }else {
        ?><a href="#modal">Войти <i class="fa-solid fa-user"></i></a><?php
        }
        ?>	
	</div>
</div>
<script src="https://kit.fontawesome.com/d1cb775d62.js" crossorigin="anonymous"></script>