-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 30 2016 г., 18:03
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
  `region_id` int(11) NOT NULL,
  `calculate_type` varchar(25) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calculate_door`
--

INSERT INTO `calculate_door` (`id`, `partner_id`, `type_id`, `width`, `height`, `box`, `jamb`, `locker`, `region_id`, `calculate_type`, `sum`, `created_at`) VALUES
(118, 0, 2, 60, 200, 1, 1, 1, 3, 'order', 5663.00, 1467298934),
(119, 0, 3, 2341, 2314, 1, 0, 1, 5, 'calculate', 3629325.00, 1467294884),
(120, 0, 3, 234, 243, 1, 1, 1, 4, 'order', 38167.00, 1467295103),
(121, 0, 3, 2234, 234, 1, 0, 0, 4, 'order', 348921.00, 1467295900),
(122, 0, 3, 2, 2, 1, 0, 0, 5, 'calculate', 5.00, 1467298566),
(123, 0, 3, 2, 2, 1, 0, 0, 5, 'order', 5.00, 1467298570),
(124, 0, 2, 60, 200, 1, 1, 1, 3, 'calculate', 5663.00, 1467298931);

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
  `camers` int(11) NOT NULL,
  `furniture_id` int(11) NOT NULL,
  `region_id` int(13) NOT NULL,
  `calculate_type` varchar(25) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calculate_window`
--

INSERT INTO `calculate_window` (`id`, `partner_id`, `type_id`, `width`, `height`, `profile_id`, `glaze_id`, `camers`, `furniture_id`, `region_id`, `calculate_type`, `sum`, `created_at`) VALUES
(190, 0, 20, 24, 24, 4, 1, 234, 1, 5, 'calculate', 84.00, 1467293886),
(192, 0, 1, 2000, 1500, 1, 1, 2, 1, 3, 'order', 2976.00, 1467298935),
(194, 0, 19, 555, 333, 4, 1, 522, 2, 4, 'calculate', 200.00, 1467294622),
(195, 0, 20, 32, 234, 1, 3, 234, 2, 5, 'order', 79.00, 1467294726),
(196, 0, 19, 2234, 2341, 1, 3, 2341, 1, 5, 'calculate', 2034.00, 1467294869),
(197, 0, 19, 412, 234, 4, 1, 1243, 1, 4, 'calculate', 179.00, 1467294937),
(198, 0, 19, 32, 23, 4, 3, 243, 1, 5, 'calculate', 85.00, 1467295062),
(199, 0, 19, 32, 23, 4, 3, 243, 1, 5, 'calculate', 85.00, 1467295065),
(200, 0, 19, 32, 23, 4, 3, 243, 1, 5, 'calculate', 85.00, 1467295082),
(201, 0, 19, 3, 4, 1, 1, 4, 1, 4, 'order', 79.00, 1467295376),
(202, 0, 1, 22, 200, 1, 3, 22, 2, 5, 'calculate', 76.00, 1467295500),
(203, 0, 19, 212, 23, 4, 3, 2344, 2, 4, 'calculate', 75.00, 1467295857),
(204, 0, 20, 21, 234, 4, 3, 234, 2, 4, 'calculate', 76.00, 1467296226),
(205, 0, 19, 21, 234, 4, 3, 234, 2, 4, 'calculate', 77.00, 1467296414),
(206, 0, 19, 21, 234, 4, 3, 234, 2, 6, 'calculate', 78.00, 1467296469),
(207, 0, 19, 123, 123, 1, 3, 123, 1, 5, 'order', 111.00, 1467297474),
(208, 0, 19, 23, 234, 4, 1, 234, 2, 5, 'calculate', 78.00, 1467297785),
(209, 0, 19, 234, 2134, 4, 3, 1234, 1, 5, 'order', 488.00, 1467298473),
(210, 0, 1, 2000, 1500, 1, 1, 2, 1, 3, 'calculate', 2976.00, 1467298932);

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
(20, 'Двери', 18, 1),
(21, 'Слайдеры', 0, 0),
(22, 'Верхний слайдер', 21, 0),
(23, 'Нижний слайдер', 21, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `door_types`
--

INSERT INTO `door_types` (`id`, `name`, `description`, `picture`, `price`) VALUES
(2, 'drtnbr', 'trebrt', 'uploads/door_types/122026_Papel-de-Pare2_2016-06-28_04:12:01.jpg', 45.00),
(3, 'mrkuyr5', '54eym5aey', 'uploads/door_types/122026_Papel-de-Pare_2016-06-28_04:29:35.jpg', 65.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`id`, `email`, `text`) VALUES
(55, 'slavavitrenko@gmail.com', 'New order in your region - http://vikonda.unicweb.com.ua/door-orders/view?id=118'),
(56, 'slavavitrenko@gmail.com', 'New order in your region - http://vikonda.unicweb.com.ua/window-orders/view?id=192');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `partner_id` int(11) NOT NULL,
  `updated_at` int(13) NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partners_regions`
--

CREATE TABLE IF NOT EXISTS `partners_regions` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `partners_regions`
--

INSERT INTO `partners_regions` (`id`, `partner_id`, `region_id`) VALUES
(45, 17, 3),
(46, 17, 4),
(47, 17, 5),
(48, 17, 6),
(49, 17, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `product_id`, `created_at`) VALUES
(58, '122026_Papel-de-Pare12_2016-06-16_07:22:15.jpg', 12, 0),
(59, 'ubuntu_linux_debian_12_2016-06-16_07:22:15.jpg', 12, 0),
(60, 'WallpapersxlKubuntuU12_2016-06-16_07:22:15.jpg', 12, 0),
(61, '122026_Papel-de-Pare13_2016-06-16_07:22:21.jpg', 13, 0),
(62, 'ubuntu_linux_debian_13_2016-06-16_07:22:21.jpg', 13, 0),
(63, 'WallpapersxlKubuntuU13_2016-06-16_07:22:21.jpg', 13, 0),
(64, '122026_Papel-de-Pare14_2016-06-16_07:22:57.jpg', 14, 0),
(65, 'ubuntu_linux_debian_14_2016-06-16_07:22:57.jpg', 14, 0),
(66, 'WallpapersxlKubuntuU14_2016-06-16_07:22:58.jpg', 14, 0),
(67, '122026_Papel-de-Pare15_2016-06-16_07:23:03.jpg', 15, 0),
(68, 'ubuntu_linux_debian_15_2016-06-16_07:23:04.jpg', 15, 0),
(69, 'WallpapersxlKubuntuU15_2016-06-16_07:23:04.jpg', 15, 0),
(70, '122026_Papel-de-Pare16_2016-06-16_07:23:17.jpg', 16, 0),
(71, 'ubuntu_linux_debian_16_2016-06-16_07:23:18.jpg', 16, 0),
(72, 'WallpapersxlKubuntuU16_2016-06-16_07:23:18.jpg', 16, 0),
(73, '122026_Papel-de-Pare17_2016-06-16_07:23:24.jpg', 17, 0),
(74, 'ubuntu_linux_debian_17_2016-06-16_07:23:24.jpg', 17, 0),
(75, 'WallpapersxlKubuntuU17_2016-06-16_07:23:24.jpg', 17, 0),
(76, '122026_Papel-de-Pare18_2016-06-16_07:23:29.jpg', 18, 0),
(77, 'ubuntu_linux_debian_18_2016-06-16_07:23:30.jpg', 18, 0),
(78, 'WallpapersxlKubuntuU18_2016-06-16_07:23:30.jpg', 18, 0),
(79, '122026_Papel-de-Pare19_2016-06-16_07:23:35.jpg', 19, 0),
(80, 'ubuntu_linux_debian_19_2016-06-16_07:23:36.jpg', 19, 0),
(81, 'WallpapersxlKubuntuU19_2016-06-16_07:23:36.jpg', 19, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `created_at`) VALUES
(12, 19, 'Окно 1', 123.00, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099153),
(13, 19, 'Окно 2', 236.79, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099192),
(14, 20, 'Дверь 1', 325.74, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099210),
(15, 20, 'Дверь 2', 231.34, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099233),
(16, 23, 'Элемент нижнего слайдера 1', 343.20, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099292),
(17, 23, 'Элемент нижнего слайдера 2', 1000.00, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099342),
(18, 22, 'Элемент верхнего слайдера 1', 122.98, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099363),
(19, 22, 'Элемент верхнего слайдера 2', 213.54, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1466099414);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`, `percent`) VALUES
(3, 'Переяслав', 1.00),
(4, 'Хмельницкий', 2.00),
(5, 'Киев', 3.00),
(6, 'Пруссия', 4.00),
(8, 'Киевская Русь', 3.50);

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
  `site_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `box_price`, `locker_price`, `jamb_price`, `round`, `admin_email`, `bot_email`, `site_url`) VALUES
(1, 25.60, 120.45, 10.45, 1, 'slavavitrenko@gmail.com', 'mxuser@ya.ru', 'vikonda.unicweb.com.ua');

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
(17, 'partner', 'slavavitrenko@gmail.com', '$2y$10$p/sK9SvUeJrgYB97e4DEaurGy6a35artB4cx3Cv3ErR8vjmGEQ1hK', '1nnKK1QMrYwo1GYNLsfNTehWQH48bBQq', 1466584192, NULL, NULL, '127.0.0.1', 1466584193, 1467293279, 0, 'partner'),
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `window_types`
--

INSERT INTO `window_types` (`id`, `name`, `description`, `picture`, `price`) VALUES
(1, 'tyuyt', 'ytumyt', 'uploads/window_types/ubuntu_linux_debian_1_2016-06-28_04:12:33.jpg', 750.00),
(19, 'rty5e', 'renter', 'uploads/window_types/122026_Papel-de-Pare19_2016-06-28_04:12:40.jpg', 200.00),
(20, 't67', '6576', 'uploads/window_types/Screenshot_2016-06-29_09:01:03.png', 67.00);

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
  ADD KEY `name` (`name`(191));

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT для таблицы `calculate_window`
--
ALTER TABLE `calculate_window`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `door_types`
--
ALTER TABLE `door_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT для таблицы `partners_regions`
--
ALTER TABLE `partners_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
