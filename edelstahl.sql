-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 12 2023 г., 06:44
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `edelstahl`
--

-- --------------------------------------------------------

--
-- Структура таблицы `completedworks`
--

CREATE TABLE IF NOT EXISTS `completedworks` (
  `ID_WORK` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ID_SERVICE` smallint(6) NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  PRIMARY KEY (`ID_WORK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `completedworks`
--

INSERT INTO `completedworks` (`ID_WORK`, `TITLE`, `ID_SERVICE`, `DESCRIPTION`) VALUES
(1, 'МЭРИЯ г. Новосибирска', 4, 'Перила из нержавеющей стали серия "Стандарт"'),
(2, 'Автосалон МЕРСЕДЕС г. Новосибирск', 13, 'Перила из нержавеющей стали и стекла'),
(3, 'Центр вирусологии «ВЕКТОР». р.п. Кольцово', 1, 'Перила из нержавеющей стали серия "Стандарт"'),
(4, 'Сеть магазинов «Пятерочка». Сибирский Федеральный Округ', 1, 'Перила из нержавеющей стали серия "Стандарт"'),
(5, 'Спортивно-оздоровительный комплекс «АРМАДА». р.п. Краснообск', 7, 'Перила из нержавеющей стали серия "Стандарт"'),
(6, 'Автосалон МАЗДА г. Новосибирск', 3, 'Перила из нержавеющей стали серия "Стандарт"');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID_IMAGE` tinyint(4) NOT NULL AUTO_INCREMENT,
  `PATH` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ID_WORK` int(11) DEFAULT NULL,
  `ID_SITEELEMENT` tinyint(4) DEFAULT NULL,
  `ELEMENT_NUMBER` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID_IMAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`ID_IMAGE`, `PATH`, `ID_WORK`, `ID_SITEELEMENT`, `ELEMENT_NUMBER`) VALUES
(1, 'images/banner1.jpg', NULL, 1, 1),
(2, 'images/banner2.jpg', NULL, 1, 2),
(3, 'images/banner3.jpg', 4, 1, 3),
(4, 'images/banner4.jpg', NULL, 1, 4),
(5, 'images/team-banner1.jpg', NULL, 2, 1),
(6, 'images/team-banner2.png', NULL, 2, 2),
(7, 'images/team-banner3.png', NULL, 2, 3),
(8, 'images/work1.jpg', 1, NULL, 0),
(9, 'images/work2.jpg', 2, NULL, NULL),
(10, 'images/work3.jpg', 3, NULL, NULL),
(11, 'images/work5.jpg', 5, NULL, NULL),
(12, 'images/work6.jpg', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ID_ORDER` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PHONE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ID_SERVICE` smallint(6) NOT NULL,
  `ORDERDATE` date NOT NULL,
  `ID_ORDERSTATUS` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_ORDER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID_ORDER`, `NAME`, `PHONE`, `EMAIL`, `ID_SERVICE`, `ORDERDATE`, `ID_ORDERSTATUS`) VALUES
(1, 'Левел Ап', '+7 (952) 923-23-34', 'email1@mail.ru', 6, '2023-10-25', 1),
(2, 'Монголов Олег', '+7 (952) 933-28-93', 'example@mail.ru', 4, '2023-11-04', 1),
(5, 'Иванов Иван Иванович', '+7 (952) 934-67-43', 'example12@mail.ru', 25, '2023-11-03', 1),
(6, 'Петроводский завод', '+7 (932) 954-67-44', 'example5@mail.ru', 19, '2023-11-03', 1),
(8, 'Овчаров Данил Вячеславович', '+7 (999) 881-23-23', 'example@mail.ru', 11, '2023-11-03', 1),
(9, 'КотакБася', '+7 (981) 345-43-21', 'example@mail.ru', 5, '2023-10-27', 3),
(11, 'Гладунов Сергей Юрьевич', '+7 (999) 881-23-23', 'example@mail.ru', 2, '2023-11-02', 4),
(16, 'Головатюк Дмитрий Сергеевич', '+7 (999) 981-23-23', 'example@mail.ru', 11, '2023-11-02', 2),
(18, 'Уфимцев Кирилл Дмитриевич', '+7 (228) 696-96-96', 'duck69@mail.ru', 25, '2023-10-13', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `ID_ORDERSTATUS` tinyint(4) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_ORDERSTATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `orderstatus`
--

INSERT INTO `orderstatus` (`ID_ORDERSTATUS`, `NAME`) VALUES
(1, 'Новый'),
(2, 'Принят'),
(3, 'Подготовка материалов'),
(4, 'Установка изделия'),
(5, 'Готовый');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ID_SERVICE` smallint(6) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ID_SERVICETYPE` tinyint(4) NOT NULL,
  `DESCRIPTION` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID_SERVICE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`ID_SERVICE`, `TITLE`, `ID_SERVICETYPE`, `DESCRIPTION`) VALUES
(1, 'Лестничные ограждения', 1, NULL),
(2, 'Поручни для лестниц', 1, NULL),
(3, 'Ограждения крыльца', 1, NULL),
(4, 'Радиусные ограждения', 1, NULL),
(5, 'Ограждения для балконов', 1, NULL),
(6, 'Ограждения пандусов для маломобильных групп', 1, NULL),
(7, 'Пристенные поручни', 1, NULL),
(8, 'Ограждения со стеклом на стойках', 1, NULL),
(9, 'Поручни для инвалидов в санузлах', 1, NULL),
(10, 'Отбойники для перегородок и витражей', 1, NULL),
(11, 'Дизайнерские ограждения', 1, NULL),
(12, 'Ограждения с вертикальным заполнением', 1, NULL),
(13, 'Цельностеклянные ограждения на самонесущем стекле', 1, NULL),
(14, 'Ограждения для детских садов и школ', 1, NULL),
(15, 'Ограждение окон и витражей', 1, NULL),
(16, 'Ограждения и нержавеющие лестницы для бассейнов', 1, NULL),
(17, 'Поручни для лифтов', 1, NULL),
(18, 'Ограждения для террас и кровель', 1, NULL),
(19, 'Лестничные ограждения', 2, NULL),
(20, 'Ограждения для магазинов, трц и прочих общественных зданий', 2, NULL),
(21, 'Ограждения для частного интерьера', 2, NULL),
(22, 'Пристенные поручни', 2, NULL),
(23, 'Стеклянные ограждения', 2, NULL),
(24, 'Интерьерные лестницы', 2, NULL),
(25, 'Лестницы', 3, NULL),
(26, 'Ограждения', 3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `servicetype`
--

CREATE TABLE IF NOT EXISTS `servicetype` (
  `ID_SERVICETYPE` tinyint(4) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_SERVICETYPE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `servicetype`
--

INSERT INTO `servicetype` (`ID_SERVICETYPE`, `TITLE`) VALUES
(1, 'Изготовление и монтаж изделий из нержавеющей стали'),
(2, 'Изготовление и монтаж изделий из комбинированной стали'),
(3, 'Лестницы и ограждения для частного интерьера');

-- --------------------------------------------------------

--
-- Структура таблицы `siteelements`
--

CREATE TABLE IF NOT EXISTS `siteelements` (
  `ID_SITEELEMENT` tinyint(4) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_SITEELEMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `siteelements`
--

INSERT INTO `siteelements` (`ID_SITEELEMENT`, `NAME`) VALUES
(1, 'header_slider'),
(2, 'team_slider');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
