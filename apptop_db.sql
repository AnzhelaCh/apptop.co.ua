-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 15 2021 г., 22:37
-- Версия сервера: 5.5.68-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `libid936_appfirst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bankName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `interestRate` int(11) NOT NULL,
  `maxLoan` int(11) NOT NULL,
  `minLoan` int(11) NOT NULL,
  `loanTerm` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `bankName`, `interestRate`, `maxLoan`, `minLoan`, `loanTerm`) VALUES
(39, 54, 'Delta-Bank', 7, 45000, 9000, 24),
(41, 54, 'Mida', 15, 61000, 12200, 12),
(42, 53, 'Bogus', 15, 87000, 17400, 60),
(43, 57, 'Aval', 15, 65000, 13000, 36),
(44, 53, 'Delta-Bank', 15, 58000, 11600, 36),
(45, 54, 'Kasper', 10, 58000, 11600, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`) VALUES
(54, 'libida', 'anzhela', '21ce79263d05caac81af307c18a24f86'),
(53, 'admin', 'admin', '25d55ad283aa400af464c76d713c07ad'),
(55, 'melisa', 'Gray', '867e1a36d190000d2f266d80889683fc'),
(56, 'cattty', 'Gray', 'd54d1702ad0f8326224b817c796763c9'),
(57, 'mobile', 'Gray', 'd54d1702ad0f8326224b817c796763c9'),
(58, 'qwert', 'qwert', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(59, 'ritaBos', 'ritaBos', '21ce79263d05caac81af307c18a24f86'),
(60, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(61, 'prank', 'anzhela', '21ce79263d05caac81af307c18a24f86');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banks`
--
ALTER TABLE `banks`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
