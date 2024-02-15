<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
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
			<input type="text" name="otkuda" class="polev" placeholder="Откуда">
			<input type="text" name="kuda" class="polev" placeholder="Куда">
			<input type="date" name="data" class="polev" placeholder="Дата вылета">
			<select class="polev">
				<option>Бизнес</option>
				<option>Эконом</option>
			</select>
			<input type="submit" name="otkuda" class="sub" value="Найти билет">
		</div>
	</div>
	<div class="content" style="display: flex;">
		<div style="display: flex;flex-wrap: wrap;flex-direction: column;height: 100%;width: 55%;align-items: center;margin-left: 2%;">
			<br>
			<h3>О нас</h3>
			<br>
			<p>Добро пожаловать в мир CloudTrail Aviation – вашего надежного партнера в воздушных перевозках!</p>
			<br>
			<h3>Кто мы?</h3>
			<br>
			<p>CloudTrail Aviation – это современная авиакомпания, основанная на принципах безопасности, надежности и качественного обслуживания. Мы гордимся тем, что предлагаем нашим пассажирам не только удобные и своевременные перелеты, но и непревзойденный уровень комфорта.</p>
			<br>
			<h3>Наши ценности</h3>
			<br>
			<p>Наша компания стремится к достижению высших стандартов в авиационной отрасли, уделяя особое внимание следующим ценностям:</p>
			<p>1. Безопасность: Мы придаем высочайшее значение безопасности наших пассажиров и экипажа. Все наши полеты выполняются с соблюдением строгих международных стандартов безопасности и проверяются на соответствие перед каждым вылетом.</p>
			<p>2. Качество обслуживания: Мы стремимся к превосходству в обслуживании наших клиентов, предлагая персонализированные услуги и внимательное отношение к каждому пассажиру.</p>
			<p>3. Инновации: Мы постоянно внедряем новые технологии и инновации, чтобы улучшить качество наших услуг и обеспечить более эффективное управление нашей авиационной деятельностью.</p>
			<br>
			<h3>Наши услуги</h3>
			<br>
			<p>CloudTrail Aviation предлагает широкий спектр услуг, включая:<br>

			- Пассажирские перевозки: Мы предоставляем регулярные и чартерные рейсы на различных маршрутах, обеспечивая комфортные и безопасные путешествия для наших пассажиров.<br>

			- Грузовые перевозки: Наша компания осуществляет грузовые перевозки по всему миру, обеспечивая своевременную доставку грузов в любую точку назначения.<br>

			- Чартерные рейсы: Мы предлагаем чартерные рейсы для корпоративных клиентов, групповых поездок, специальных мероприятий и частных пассажиров, гарантируя высокий уровень комфорта и сервиса.</p>
			<br>
			<h3>Наши сотрудники</h3>
			<br>
			<p>Наша команда состоит из высококвалифицированных профессионалов с многолетним опытом работы в авиационной отрасли. Мы гордимся нашим экипажем, который обладает высокими навыками и профессионализмом, а также нашими сотрудниками на земле, которые обеспечивают бесперебойную работу нашей авиакомпании.</p>
			<br>
			<h3>Свяжитесь с нами</h3>
			<br>
			<p>Мы всегда рады помочь нашим клиентам и ответить на любые вопросы. Свяжитесь с нами сегодня, чтобы узнать больше о наших услугах и забронировать ваш следующий полет с CloudTrail Aviation.</p>
			<br>
		</div>
		<div style="display: flex; flex-direction: column; width: 40%; margin-left: 5%; margin-right: 5%;">
  			<div style="display: flex;">
    			<div style="width: 100%;height: 100%;border: 5px solid white;flex: 2;"><img src="../img/bashni.jpg" style="width: 100%; height: 100%; object-fit: cover;"></div>
    			<div style="width: 100%;display: flex;flex-direction: column;align-items: flex-end;flex: 2;">
      				<div style="width: 100%;/* height: 20%; */border: 5px solid white;"><img src="../img/pilot.jpg" style="width: 100%; height: 100%; object-fit: cover;"></div>
      				<div style="width: 100%;/* height: 20%; */border: 5px solid white;padding-top: 0px;"><img src="../img/stuart.jpg" style="width: 100%; height: 100%; object-fit: cover;"></div>
    			</div>
  			</div>
  			<div style="width: 100%;height:30%;border: 5px solid white;"><img src="../img/obeda.jpg" style="width: 100%; height: 100%; object-fit: cover;"></div>
			</div>
		</div>
	<?php
		include_once '../controllers/footer.php'
	?>
</body>