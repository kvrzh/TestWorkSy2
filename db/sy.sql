-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 25 2016 г., 10:52
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contacts` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `district` int(11) NOT NULL,
  `street` int(11) NOT NULL,
  PRIMARY KEY (`id_contacts`),
  UNIQUE KEY `id_contacts_UNIQUE` (`id_contacts`),
  KEY `id_districts_idx` (`district`),
  KEY `street_idx` (`street`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id_contacts`, `name`, `district`, `street`) VALUES
(1, 'Anton', 5, 4),
(2, 'Lol', 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id_districts` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_districts`),
  UNIQUE KEY `id_districts_UNIQUE` (`id_districts`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `districts`
--

INSERT INTO `districts` (`id_districts`, `name`) VALUES
(5, 'sv'),
(6, 'shv');

-- --------------------------------------------------------

--
-- Структура таблицы `streets`
--

CREATE TABLE IF NOT EXISTS `streets` (
  `id_streets` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `district` int(11) NOT NULL,
  PRIMARY KEY (`id_streets`),
  UNIQUE KEY `idstreets_UNIQUE` (`id_streets`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `streets`
--

INSERT INTO `streets` (`id_streets`, `name`, `district`) VALUES
(3, 'shaver', 5),
(4, 'ma', 5);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `id_districts` FOREIGN KEY (`district`) REFERENCES `districts` (`id_districts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `street` FOREIGN KEY (`street`) REFERENCES `streets` (`id_streets`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
