-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 17 2019 г., 16:48
-- Версия сервера: 5.7.25-0ubuntu0.16.04.2
-- Версия PHP: 7.1.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `protest14`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reg_users`
--

CREATE TABLE `reg_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reg_users`
--

INSERT INTO `reg_users` (`id`, `name`, `email`, `territory`) VALUES
(1, 'Иван Федоренко', 'ivan@fedorenko.ua', 'с.Лучисте, м.Алушта, Автономна Республіка Крим'),
(2, 'Тамара Ткач', 'tamara@tkach.ua', 'с.Братолюбівка, Долинський район, Кіровоградська область'),
(3, 'Степан Бойко', 'stepan@boiko.ua', 'с.Городське, Коростишівський район, Житомирська область');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reg_users`
--
ALTER TABLE `reg_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
