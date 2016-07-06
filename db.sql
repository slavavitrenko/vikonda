-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 06 2016 г., 11:56
-- Версия сервера: 5.5.44-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c1vikonda`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calculate_door`
--

CREATE TABLE IF NOT EXISTS `calculate_door` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `width` int(13) NOT NULL,
  `height` int(13) NOT NULL,
  `box` int(1) NOT NULL,
  `jamb` int(1) NOT NULL,
  `locker` int(1) NOT NULL,
  `furniture_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `calculate_type` varchar(25) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calculate_door`
--

INSERT INTO `calculate_door` (`id`, `partner_id`, `type_id`, `width`, `height`, `box`, `jamb`, `locker`, `furniture_id`, `region_id`, `calculate_type`, `sum`, `phone`, `email`, `fio`, `created_at`) VALUES
(138, 0, 8, 80, 200, 1, 0, 1, 2, 4, 'calculate', 9589185.70, '+380663564463', 'slavavitrenko@gmail.com', 'Витренко Вячеслав Дмитриевич', 1467447746),
(139, 0, 5, 80, 200, 1, 0, 1, 2, 4, 'calculate', 1075204.90, '+380663564463', 'slavavitrenko@gmail.com', 'Витренко Вячеслав Дмитриевич', 1467447758),
(142, 0, 6, 60, 200, 1, 1, 1, 1, 3, 'calculate', 4200273.40, '+380663564463', '', 'Витренко Вясчеслав Дмитриевич', 1467530550);

-- --------------------------------------------------------

--
-- Структура таблицы `calculate_window`
--

CREATE TABLE IF NOT EXISTS `calculate_window` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `width` int(13) NOT NULL,
  `height` int(13) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `glaze_id` int(11) NOT NULL,
  `furniture_id` int(11) NOT NULL,
  `region_id` int(13) NOT NULL,
  `calculate_type` varchar(25) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calculate_window`
--

INSERT INTO `calculate_window` (`id`, `partner_id`, `type_id`, `width`, `height`, `profile_id`, `glaze_id`, `furniture_id`, `region_id`, `calculate_type`, `sum`, `fio`, `phone`, `email`, `created_at`) VALUES
(250, 0, 21, 500, 200, 4, 3, 2, 4, 'calculate', 168.00, '4нено6', '+380663564463', '', 1467739192),
(251, 0, 21, 5000, 200, 4, 3, 2, 5, 'calculate', 1069.00, 'Витренко Вячеслав Дмитриевич', '+380663564463', '', 1467739266),
(252, 0, 27, 5645, 54654, 4, 3, 2, 6, 'calculate', 209214.00, 'Витренко Вячеслав Дмитриевич', '+380663564463', '', 1467739683);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `visible` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `visible`) VALUES
(18, 'Витрина', 0, 1),
(19, 'Окна', 18, 1),
(20, 'Двери', 18, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `door_furniture`
--

CREATE TABLE IF NOT EXISTS `door_furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `door_furniture`
--

INSERT INTO `door_furniture` (`id`, `name`, `price`) VALUES
(1, 'erteb54', 345.00),
(2, 'u,o', 567.00);

-- --------------------------------------------------------

--
-- Структура таблицы `door_types`
--

CREATE TABLE IF NOT EXISTS `door_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `door_types`
--

INSERT INTO `door_types` (`id`, `name`, `description`, `picture`, `price`) VALUES
(2, 'Тип 1', 'Описание', 'uploads/door_types/122026_Papel-de-Pare2_2016-07-01_11:13:53.jpg', 45.00),
(3, 'Тип 2', 'Описание', 'uploads/door_types/ubuntu_linux_debian_3_2016-07-01_11:14:01.jpg', 65.00),
(4, 'Тип 3', 'Описание', 'uploads/door_types/WallpapersxlKubuntuU_2016-07-01_11:14:13.jpg', 678.00),
(5, 'Тип 4', 'Описание', 'uploads/door_types/122026_Papel-de-Pare_2016-07-01_11:14:26.jpg', 6587.00),
(6, 'Тип 5', 'Описание', 'uploads/door_types/ubuntu_linux_debian__2016-07-01_11:14:39.jpg', 34654.00),
(7, 'Тип 6', 'Описание', 'uploads/door_types/WallpapersxlKubuntuU_2016-07-01_11:14:52.jpg', 78908.00),
(8, 'ТИп 7', 'Описание', 'uploads/door_types/ubuntu_linux_debian__2016-07-01_11:15:05.jpg', 58756.00),
(9, 'Тип 8', 'Описание', 'uploads/door_types/ubuntu_linux_debian__2016-07-01_11:15:58.jpg', 67867.00),
(10, 'Тип 9', 'Описание', 'uploads/door_types/WallpapersxlKubuntuU_2016-07-01_11:16:13.jpg', 4578.00);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1465997177),
('m140209_132017_init', 1465997178),
('m140403_174025_create_account_table', 1465997178),
('m140504_113157_update_tables', 1465997178),
('m140504_130429_create_token_table', 1465997178),
('m140830_171933_fix_ip_field', 1465997178),
('m140830_172703_change_account_table_name', 1465997178),
('m141222_110026_update_ip_field', 1465997179),
('m141222_135246_alter_username_length', 1465997179),
('m150614_103145_update_social_account_table', 1465997179),
('m150623_212711_fix_username_notnull', 1465997179);

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fio` varchar(255) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `partner_id` int(11) NOT NULL,
  `updated_at` int(13) NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `phone`, `email`, `fio`, `region_id`, `partner_id`, `updated_at`, `created_at`) VALUES
(138, '+380663564463', '', 'Витренко Вячеслав Дмитриевич', 4, 17, 1467794015, 1467794015),
(139, NULL, NULL, '', NULL, 0, 1467794043, 1467794043),
(140, NULL, NULL, '', NULL, 0, 1467794773, 1467794773);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(5) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `count`, `price`) VALUES
(136, 138, 20, 35, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `partners_regions`
--

CREATE TABLE IF NOT EXISTS `partners_regions` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `partners_regions`
--

INSERT INTO `partners_regions` (`id`, `partner_id`, `region_id`) VALUES
(71, 17, 3),
(72, 17, 4),
(73, 17, 5),
(74, 17, 6),
(75, 17, 8),
(76, 17, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `product_id`, `created_at`) VALUES
(195, 'window212_2016-07-06_10:01:51.png', 12, 0),
(196, 'window312_2016-07-06_10:01:51.png', 12, 0),
(197, 'window412_2016-07-06_10:01:51.png', 12, 0),
(198, 'window512_2016-07-06_10:01:51.png', 12, 0),
(199, 'window612_2016-07-06_10:01:52.png', 12, 0),
(200, 'window113_2016-07-06_10:01:55.png', 13, 0),
(201, 'window213_2016-07-06_10:01:56.png', 13, 0),
(202, 'window313_2016-07-06_10:01:56.png', 13, 0),
(203, 'window413_2016-07-06_10:01:56.png', 13, 0),
(204, 'window513_2016-07-06_10:01:56.png', 13, 0),
(205, 'window613_2016-07-06_10:01:57.png', 13, 0),
(207, 'window214_2016-07-06_10:02:00.png', 14, 0),
(208, 'window314_2016-07-06_10:02:01.png', 14, 0),
(209, 'window414_2016-07-06_10:02:01.png', 14, 0),
(210, 'window514_2016-07-06_10:02:01.png', 14, 0),
(211, 'window614_2016-07-06_10:02:01.png', 14, 0),
(212, 'window115_2016-07-06_10:02:05.png', 15, 0),
(213, 'window215_2016-07-06_10:02:05.png', 15, 0),
(214, 'window315_2016-07-06_10:02:05.png', 15, 0),
(215, 'window415_2016-07-06_10:02:06.png', 15, 0),
(216, 'window515_2016-07-06_10:02:06.png', 15, 0),
(217, 'window615_2016-07-06_10:02:06.png', 15, 0),
(219, 'window220_2016-07-06_10:02:10.png', 20, 0),
(220, 'window320_2016-07-06_10:02:10.png', 20, 0),
(221, 'window420_2016-07-06_10:02:10.png', 20, 0),
(222, 'window520_2016-07-06_10:02:11.png', 20, 0),
(223, 'window620_2016-07-06_10:02:11.png', 20, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `created_at`) VALUES
(12, 19, 'Окно 1', 123.00, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099153),
(13, 19, 'Окно 2', 236.79, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099192),
(14, 20, 'Дверь 1', 325.74, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099210),
(15, 20, 'Дверь 2', 231.34, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099233),
(20, 19, 'апапапап', 1000.00, '<p>выаываывавыавыавыа</p>', 1467365154);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` decimal(4,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`, `percent`) VALUES
(3, 'Переяслав', 1.00),
(4, 'Хмельницкий', 2.00),
(5, 'Киев', 3.00),
(6, 'Пруссия', 4.00),
(8, 'Киевская Русь', 3.50),
(11, 'Винницкая область', 5.00);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `box_price` decimal(7,2) NOT NULL,
  `locker_price` decimal(7,2) NOT NULL,
  `jamb_price` decimal(7,2) NOT NULL,
  `round` int(1) NOT NULL,
  `admin_email` text NOT NULL,
  `bot_email` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `admin_phone` varchar(13) NOT NULL,
  `about_page` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `box_price`, `locker_price`, `jamb_price`, `round`, `admin_email`, `bot_email`, `site_url`, `admin_phone`, `about_page`) VALUES
(1, 25.60, 120.45, 10.45, 1, 'test@test.test', 'mxuser@ya.ru', 'vikonda.unicweb.com.ua', '+380999999999', '<h1 style="text-align: center;">Это страница "О нас"</h1>');

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'partner'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `type`) VALUES
(1, 'admin', 'email@email.ru', '$2y$10$tv4cRT23luXR6ZZIveDN4uDO.D4XS250QfQK3wDMgG6U2mALYRfhy', '9OKghb3P67QjnuknO2INTJ5uD-zPLz8E', 1465997720, NULL, NULL, '127.0.0.1', 1465997720, 1466233255, 0, 'admin'),
(17, 'partner', 'slavavitrenko@gmail.com', '$2y$10$TZX13gZp6YAb7RbwnOYyRuMeEFLuSWUJ5P05e//muS83Mv8XT72RS', '1nnKK1QMrYwo1GYNLsfNTehWQH48bBQq', 1466584192, NULL, NULL, '127.0.0.1', 1466584193, 1467794103, 0, 'partner'),
(18, 'manager', 'manager@mail.ru', '$2y$10$59YaSCdFrzKNzjPI/ttICuMk07DEDaao8mGW/4FFmvlapADPlrmEi', '_udQ-MRSa3lHJ_nor6OQAE7iTffjp4pd', 1467181276, NULL, NULL, '93.78.238.18', 1467181276, 1467181276, 0, 'manager');

-- --------------------------------------------------------

--
-- Структура таблицы `window_furniture`
--

CREATE TABLE IF NOT EXISTS `window_furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `window_furniture`
--

INSERT INTO `window_furniture` (`id`, `name`, `price`) VALUES
(1, 'rftyn', 76.00),
(2, 'ertnaet', 45.00);

-- --------------------------------------------------------

--
-- Структура таблицы `window_glazes`
--

CREATE TABLE IF NOT EXISTS `window_glazes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `window_glazes`
--

INSERT INTO `window_glazes` (`id`, `name`, `price`) VALUES
(1, 'r5tj54', 76.00),
(3, 'rtnhw43', 65.00);

-- --------------------------------------------------------

--
-- Структура таблицы `window_profiles`
--

CREATE TABLE IF NOT EXISTS `window_profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `window_profiles`
--

INSERT INTO `window_profiles` (`id`, `name`, `picture`, `price`) VALUES
(1, 'енгь', 'uploads/window_profiles/WallpapersxlKubuntuU_2016-06-27_09:22:08.jpg', 56.00),
(4, 'rtymrty', 'uploads/window_profiles/ubuntu_linux_debian__2016-06-28_03:17:33.jpg', 56.00);

-- --------------------------------------------------------

--
-- Структура таблицы `window_types`
--

CREATE TABLE IF NOT EXISTS `window_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `window_types`
--

INSERT INTO `window_types` (`id`, `name`, `description`, `picture`, `price`) VALUES
(21, 'Тип 1', 'Описание', 'uploads/window_types/122026_Papel-de-Pare_2016-07-01_11:11:31.jpg', 345.00),
(22, 'Тип 2', 'Описание', 'uploads/window_types/ubuntu_linux_debian__2016-07-01_11:11:45.jpg', 345.00),
(23, 'Тип 3', 'Описание', 'uploads/window_types/WallpapersxlKubuntuU_2016-07-01_11:12:03.jpg', 456.00),
(24, 'Тип 4', 'Описание', 'uploads/window_types/ubuntu_linux_debian__2016-07-01_11:12:17.jpg', 348.00),
(25, 'Тип 5', 'Описание', 'uploads/window_types/WallpapersxlKubuntuU_2016-07-01_11:12:32.jpg', 657.00),
(26, 'Тип 6', 'Описание', 'uploads/window_types/122026_Papel-de-Pare_2016-07-01_11:12:43.jpg', 6587.00),
(27, 'Тип 7', 'Описание', 'uploads/window_types/ubuntu_linux_debian__2016-07-01_11:13:18.jpg', 565.00),
(28, 'Тип 8', 'Описание', 'uploads/window_types/WallpapersxlKubuntuU_2016-07-01_11:13:32.jpg', 679.00),
(29, 'Тип 9', 'Описание', 'uploads/window_types/ubuntu_linux_debian__2016-07-01_11:13:44.jpg', 8798.00);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `calculate_door`
--
ALTER TABLE `calculate_door`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Индексы таблицы `calculate_window`
--
ALTER TABLE `calculate_window`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calculate_type` (`calculate_type`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `door_furniture`
--
ALTER TABLE `door_furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `door_types`
--
ALTER TABLE `door_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone` (`phone`),
  ADD KEY `email` (`email`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `partners_regions`
--
ALTER TABLE `partners_regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_at` (`created_at`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191)),
  ADD KEY `name_2` (`name`(191)),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `window_furniture`
--
ALTER TABLE `window_furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `window_glazes`
--
ALTER TABLE `window_glazes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `window_profiles`
--
ALTER TABLE `window_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `window_types`
--
ALTER TABLE `window_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `calculate_door`
--
ALTER TABLE `calculate_door`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT для таблицы `calculate_window`
--
ALTER TABLE `calculate_window`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `door_furniture`
--
ALTER TABLE `door_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `door_types`
--
ALTER TABLE `door_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT для таблицы `partners_regions`
--
ALTER TABLE `partners_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `window_furniture`
--
ALTER TABLE `window_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `window_glazes`
--
ALTER TABLE `window_glazes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `window_profiles`
--
ALTER TABLE `window_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `window_types`
--
ALTER TABLE `window_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
