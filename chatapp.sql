-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 16 2023 г., 19:50
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chatapp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `from_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `from_id`, `name`, `email`, `msg`) VALUES
(9, 1527932594, 'тестовое имя', 'test_mail@mail.ru', 'здравствуйте вы делаете благое дело. свяжитесь со мной! обсудим моменты'),
(10, 1527932594, 'test', 'test@mail.ru', 'Msg2'),
(13, 1527932594, 'admin', 'eugeniu.casian@iis.utm.md', 'testik'),
(14, 1527932594, 'evgeniy', 'eugeniu.casian@iis.utm.md', 'zdravstvuite perezvonite пожалуйста'),
(15, 1527932594, 'Tester', 'zozo@yahoo.com', 'qqqqqq');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 993879515, 1233085864, 'Приветствую тебя!!'),
(2, 1233085864, 993879515, 'мяу?'),
(3, 1233085864, 993879515, 'кхмм'),
(4, 1233085864, 993879515, 'раз'),
(5, 1233085864, 993879515, 'два'),
(6, 1233085864, 993879515, 'три'),
(7, 1233085864, 993879515, 'проверка'),
(8, 1233085864, 993879515, 'связи'),
(9, 1233085864, 993879515, 'меня'),
(10, 1233085864, 993879515, 'слышно?'),
(11, 1233085864, 993879515, 'надеюсь'),
(12, 1233085864, 993879515, 'что'),
(13, 1233085864, 993879515, 'да'),
(14, 1233085864, 993879515, 'тест длины'),
(15, 1233085864, 993879515, 'проверка звука'),
(16, 328251286, 882167199, 'слушай, Анатолио, как ты готовишь эту свою пасту?'),
(17, 496895890, 882167199, 'Слушай, а пицца без ананасов не подойдет случайно?'),
(18, 882167199, 328251286, 'Паста — блюдо итальянской кухни, состоящее из двух основных компонентов: любого макаронного изделия и соуса. '),
(19, 496895890, 148469212, 'твоя паста'),
(20, 496895890, 148469212, 'не о чем'),
(21, 1527932594, 148469212, 'приветствую'),
(22, 148469212, 1527932594, 'да что ты говоришь такое....'),
(23, 148469212, 1527932594, 'сразимся в кулинарной битве! принимаешь?'),
(24, 1527932594, 148469212, 'ПРИНИМАЮ'),
(26, 148469212, 1527932594, 'privet'),
(27, 882167199, 993879515, 'ввв'),
(28, 496895890, 1527932594, 'test crud add'),
(30, 1527932594, 496895890, 'test crud answer+++'),
(33, 855284828, 855284828, 'khyk'),
(34, 148469212, 855284828, 'vff'),
(35, 496895890, 855284828, '{eq'),
(36, 307478949, 1527932594, 'testirovanie'),
(37, 307478949, 1527932594, 'veka'),
(38, 307478949, 1527932594, 'privet'),
(39, 328251286, 1527932594, 'ky'),
(40, 328251286, 1527932594, 'ti online'),
(41, 328251286, 1527932594, 'kak sdelat\' gaspacho?'),
(42, 855284828, 1527932594, 'nu shto ti tam'),
(43, 855284828, 1527932594, 'dotestilsya?'),
(44, 397111543, 1527932594, 'privet tester t'),
(45, 399259119, 1527932594, 'privet last name'),
(46, 882167199, 1527932594, 'ky hank'),
(47, 993879515, 1527932594, 'ky jenek'),
(48, 855284828, 1527932594, 'ei ti'),
(49, 855284828, 1527932594, 'Маркетплейс (англ. online marketplace, online e-commerce marketplace) — платформа электронной коммерции, интернет-магазин электронной торговли, предоставляющий информацию о продукте или услуге третьих лиц.  В целом маркетплейс представляет собой оптимизированную онлайн-платформу по предоставлению продуктов и услуг. Один и тот же товар зачастую можно купить у нескольких продавцов, при этом цена на товар может различаться.  Поскольку маркетплейсы объединяют продукты от широкого круга поставщиков, выбор этих продуктов более широк, а доступность - выше, чем в специализированных розничных онлайн-магазинах[1]. Начиная с 2014 года число маркетплейсов в глобальной сети Интернет быстро растёт вслед за ростом их востребованности[2]. В 1995 году была основана компания Amazon, которая начинала свою деятельность как онлайновый ритейлер книг; на сегодня она выступает крупнейшим маркетплейсом с восемью филиалами в разных странах мира!!.'),
(50, 1525781292, 767869359, 'привет '),
(51, 767869359, 1527932594, 'привет алекс как там дела с заказом?'),
(52, 1527932594, 767869359, 'работаем грамотно');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `from_id` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `count` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,  
  `accepted` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `time_date`, `name`, `from_id`, `product`, `description`, `count`, `email`, `address`, `accepted`) VALUES
(3, '2022-11-30 15:03:00', 'Tester', 1527932594, 'пирожочки', 'с мясом', 6, 'zozo@yahoo.com', 'Decebal 6-3', 1525781292),
(4, '0000-00-00 00:00:00', 'Vladislav', 1527932594, 'яблоки', ' ( в кг )', 6, 'Vladik@mail.ru', 'sarmizegetusa street', 0),
(5, '0000-00-00 00:00:00', 'evgen', 1527932594, 'пирожочки', 'с мясом', 4, 'eugeniu.casian@iis.utm.md', 'decebal street', 0),
(6, '2022-11-26 12:44:00', 'Artur', 1527932594, 'пирожочки', 'с мясом', 45, 'eugeniu.casian@iis.utm.md', 'decebal street', 0),
(7, '2023-01-06 08:15:00', 'алекс', 767869359, 'лазанья', 'классическая лазания', 1, 'alex@mail.ru', 'chisinau bd. moscova 21', 1527932594),
(9, '2023-01-11 08:00:00', 'alex', 767869359, 'котлетки', 'из свиноговяжего фарша', 2, 'alex@mail.ru', 'burebista 12', 0),
(10, '2023-01-13 15:00:00', 'alex', 767869359, 'пирожки', 'с кортошкой', 5, 'alex@mail.ru', 'burebista 12', 1525781292),
(11, '2023-01-19 15:32:00', 'admin', 1527932594, 'пирожочки', 'с мясом', 6, 'jenea983@mail.ru', 'decebal street', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `role`) VALUES
(148469212, 'Vlad', 'Vladick', 'vlad@mail.ru', 'd701fde59d74f76803087b6632186caf', '1664951991Screenshot_1.png', 'Offline now', 'Consumer'),
(307478949, 'Tester', 'Testik', 'roottest@mail.ru', '9d734a505cb2f6ff0b4823bc76a0d52e', '1667835290AgWyCZmybdE.jpg', 'Offline now', 'Consumer'),
(328251286, 'Shef Povar', 'ANATOLIO BELUCCI', 'shef@utm.md', '838990b2e11478c42babe6dd355473da', '1664800819subwoolfer-wearing-masks-mgp-768x449.jpg.jpeg', 'Offline now', 'Culinary Specialist'),
(397111543, 'Tester', 'test_Last_Name', 'roottt@mail.ru', '13e104c74cc272977b822f73888da6a1', '1667838221Thic3t6agjA.jpg', 'Offline now', 'Consumer'),
(399259119, 'last', 'Name', 'rootlast@mail.ru', '63a9f0ea7bb98050796b649e85481845', '1667835817AgWyCZmybdE.jpg', 'Offline now', 'Consumer'),
(496895890, 'Artur', 'Constantinov', 'artur@utm.md', '38f869097037702b56e05f2a6e8c1b7c', '1664800724artur.jpg', 'Offline now', 'Consumer'),
(742943464, 'dfdf', 'dfdf', 'rodot@mail.ru', '322f25e55eef7948407fa5a30fdbaa99', '1668849157Thic3t6agjA.jpg', 'Offline now', 'Consumer'),
(767869359, 'alex', 'smith', 'alex@mail.ru', '534b44a19bf18d20b71ecc4eb77c572f', '1673283924Screenshot_3.png', 'Offline now', 'Consumer'),
(855284828, 'qq', 'qwqqqqqqqqq', 'rooqt@mail.ru', '63a9f0ea7bb98050796b649e85481845', '1667837095Расписанка.jpg', 'Offline now', 'Consumer'),
(882167199, 'Shef Povar', 'ХЕНК АНДЕРСОН', 'ARAM@mail.ru', 'cf8a270cd13c0d805ac64df6b220df7c', '1664801297Konnor (4).jpg', 'Offline now', 'Culinary Specialist'),
(993879515, 'evgen', 'casian', 'jenea983@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', '1663691723AgWyCZmybdE.jpg', 'Offline now', 'Consumer'),
(1233085864, 'pop', 'zvezda', 'jenea9833@gmail.com', 'd6d269952320c4fb5e50f278c94a098c', '16636918946LAFE-wo9Po.jpg', 'Offline now', 'Admin'),
(1525781292, 'root', 'admin', 'test@mail.ru', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1673282594imgonline-com-ua-Resize-CCE32xRJB6583U.jpg', 'Active now', 'Admin'),
(1527932594, 'root', 'root', 'root@mail.ru', '63a9f0ea7bb98050796b649e85481845', '1664863729wPvAvnMAmsk.jpg', 'Active now', 'Admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `from_id` (`from_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `incoming_msg_id` (`incoming_msg_id`),
  ADD KEY `outgoing_msg_id` (`outgoing_msg_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `from_id` (`from_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users` (`unique_id`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`incoming_msg_id`) REFERENCES `users` (`unique_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`outgoing_msg_id`) REFERENCES `users` (`unique_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
