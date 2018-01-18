-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 18 2018 г., 20:34
-- Версия сервера: 5.7.14
-- Версия PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mytest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vernih` int(11) NOT NULL,
  `nevernih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `vernih`, `nevernih`) VALUES
(1, 'qweqwe', 2, 2),
(2, 'qweqwe', 2, 2),
(3, 'qweqwe', 2, 2),
(4, 'qweqwe', 2, 2),
(5, 'qweqwe', 2, 2),
(6, 'qweqwe', 2, 2),
(7, 'qweqwe', 2, 2),
(8, 'qweqwe', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `vopros`
--

CREATE TABLE `vopros` (
  `id` int(11) NOT NULL,
  `vopros` varchar(255) NOT NULL,
  `otvet` varchar(11) NOT NULL,
  `otv1` varchar(255) NOT NULL,
  `otv2` varchar(255) NOT NULL,
  `otv3` varchar(255) NOT NULL,
  `otv4` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `vopros`
--

INSERT INTO `vopros` (`id`, `vopros`, `otvet`, `otv1`, `otv2`, `otv3`, `otv4`, `type`) VALUES
(1, 'Riba', '1', 'Riba', 'Riba1', 'Riba2', 'Riba3', 1),
(2, 'Riba2', '2', 'Riba1', 'Riba2', 'Riba3', 'Riba4', 2),
(3, 'Riba3', '3', 'Riba1', 'Riba2', 'Riba3', 'Riba4', 1),
(4, 'Riba3', '1,2', 'Riba3', 'Riba3', 'Riba1', 'Riba2', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vopros`
--
ALTER TABLE `vopros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `vopros`
--
ALTER TABLE `vopros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
