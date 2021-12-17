-- This is a backup code for database in case if something wrong occured in database

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 08 2021 г., 05:47
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `teacher_comment` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'waitlist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `student_id`, `teacher_id`, `date`, `teacher_comment`, `status`) VALUES
(4, 18, 22, '7.23.2021 15:00-15:40', NULL, 'rejected'),
(8, 18, 22, '7.23.2021 15:00-15:40', NULL, 'rejected'),
(11, 18, 22, '6.12.2021 8:00-8:40', NULL, 'waitlist'),
(12, 21, 22, '6.12.2021 8:00-8:40', NULL, 'waitlist'),
(13, 21, 22, '7.12.2021 8:00-8:40', NULL, 'waitlist'),
(14, 18, 22, '6.12.2021 8:00-8:40', NULL, 'waitlist');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(18, 'Bexultan', 'Tokkozha', 'bexultan@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'student'),
(20, 'Era', 'Dusheeb', 'eratop124@gmail.com', 'c708855acd670395afb188a2fc3336b2', 'student'),
(21, 'alibi', 'Tolebay', 'tolebayalibi24@gmail.com', '5dfc3c82eac2e1ede7fbb4312bb6cfdf', 'student'),
(22, 'Talgat', 'Zainullanovich', 'talgat@zainullanovich.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'teacher'),
(24, 'Admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(25, 'Leonard', 'Euler', 'leonard@euler.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'teacher'),
(28, 'Daryn', 'Meirambek', 'daryn@meirambek.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'student'),
(29, 'John', 'doe', 'john@doe.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'student');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
