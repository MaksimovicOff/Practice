-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2024 г., 13:25
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE `flights` (
  `id` int NOT NULL,
  `whence` varchar(100) NOT NULL,
  `wheres` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `etime` text NOT NULL,
  `atime` text NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `whence`, `wheres`, `ddate`, `adate`, `etime`, `atime`, `price`, `status`) VALUES
(1, 'Ижевск', 'Москва', '2024-02-15', '2024-02-17', '03:00', '08:00', 8500, 3),
(2, 'Ижевск', 'Москва', '2024-02-14', '2024-02-15', '10:00', '20:00', 7000, 1),
(4, 'Мурманск', 'Казань', '2024-02-23', '2024-02-27', '13:00', '04:00', 5800, 2),
(5, 'Нижний Новгород', 'Нижний Тагил', '2024-03-07', '2024-03-10', '16:00', '18:35', 4500, 7),
(6, 'Ижевск', 'Москва', '2024-02-14', '2024-02-29', '13:49', '14:51', 3000, 1),
(7, 'Томск', 'Владивосток', '2024-02-29', '2024-03-10', '12:00', '16:10', 20500, 1),
(10, 'Мурманск', 'Ижевск', '2024-03-09', '2024-03-24', '14:20', '14:25', 7000, 1),
(11, 'Ижевск', 'Казань', '2024-02-07', '2024-02-26', '22:59', '22:59', 30000, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `content`, `status`) VALUES
(1, 1, '2321321', 3),
(2, 3, 'asdasdsadd', 2),
(3, 1, 'фыфыфыфыфыфыфыфыфыфыфы', 2),
(4, 1, 'Все круто и отлично', 2),
(5, 3, 'Все круто и отлично', 2),
(7, 3, '123', 2),
(8, 1, 'А', 2),
(9, 1, 'Все агонь', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adult` int NOT NULL,
  `children` int NOT NULL,
  `class` int NOT NULL,
  `id_flights` int NOT NULL,
  `role_sales_id` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `first_name`, `last_name`, `patronymic`, `email`, `phone`, `adult`, `children`, `class`, `id_flights`, `role_sales_id`, `price`) VALUES
(1, 'Egor', 'Khozyashev', 'Dimovich', 'egor@gmail.com', '89999999999', 1, 0, 1, 4, 1, 9600),
(5, 'Алексей1', 'Алексеев1', 'Алексеевич1', 'al2eksei@gmail.com', '89408887766', 1, 1, 1, 2, 2, 10920),
(7, 'admin', 'admin', 'admin', 'admin@admin.ru', '89509999999', 2, 1, 2, 6, 3, 8640),
(8, 'admin', 'admin', 'admin', 'admin@admin.ru', '89509999999', 1, 0, 1, 2, 3, 5600),
(9, 'Егор', 'Хозяшев', 'Димович', 'gv7361299@gmail.com', '89999999988', 1, 0, 1, 2, 1, 9100),
(12, 'admin1', 'admin1', 'admin1', 'admin@admin.ru', '89509999999', 1, 1, 1, 5, 3, 9360),
(13, 'admin12', 'admin12', 'admin12', 'admin@admin.ru', '89509999999', 1, 0, 1, 10, 3, 7280),
(16, 'admin123', 'admin123', 'admin123', 'admin@admin.ru', '89509999999', 1, 0, 1, 4, 3, 6032),
(17, 'admin123', 'admin123', 'admin123', 'admin@admin.ru', '89509999999', 1, 0, 1, 4, 3, 6032),
(18, 'admin123', 'admin123', 'admin123', 'admin@admin.ru', '89509999999', 1, 1, 1, 4, 3, 9744);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `patronymic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `role_sales` int NOT NULL DEFAULT '1',
  `photo` varchar(100) NOT NULL DEFAULT 'ava.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `patronymic`, `email`, `password`, `phone`, `role`, `role_sales`, `photo`) VALUES
(1, 'admin123', 'admin123', 'admin123', 'admin@admin.ru', '321', '89509999999', 2, 3, 'photo_2023-12-25_21-26-42.jpg'),
(3, 'Егор1', 'Хозяшев1', 'Димович1', 'gv7361299@gmail.com', 'qiawox1', '89999999988', 1, 1, 'ZjSq6eb3Jug.jpg'),
(46, 'buh', 'buh', 'buh', 'buh@buh.ru', 'buh', '79999999999', 3, 1, 'ava.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
