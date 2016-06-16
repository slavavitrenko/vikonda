-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 16 2016 г., 21:43
-- Версия сервера: 10.0.25-MariaDB-0ubuntu0.16.04.1
-- Версия PHP: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `win`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`) VALUES
(18, 'Витрина', 0),
(19, 'Окна', 18),
(20, 'Двери', 18),
(21, 'Слайдеры', 0),
(22, 'Верхний слайдер', 21),
(23, 'Нижний слайдер', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
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
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `name`) VALUES
(5, 'Владимир Переяславский'),
(6, 'Князь Киевский'),
(7, 'Святополк'),
(8, 'Фридрих II'),
(9, 'Петр I');

-- --------------------------------------------------------

--
-- Структура таблицы `partners_regions`
--

CREATE TABLE `partners_regions` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `partners_regions`
--

INSERT INTO `partners_regions` (`id`, `partner_id`, `region_id`) VALUES
(22, 7, 4),
(23, 6, 3),
(24, 6, 4),
(25, 6, 5),
(26, 6, 6),
(27, 8, 6),
(28, 9, 8),
(30, 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `product_id`, `created_at`) VALUES
(4, '122026_Papel-de-Pare2_2016-06-16_05:26:54.jpg', 2, 0),
(5, 'ubuntu_linux_debian_2_2016-06-16_05:26:54.jpg', 2, 0),
(6, 'WallpapersxlKubuntuU2_2016-06-16_05:26:54.jpg', 2, 0),
(7, '122026_Papel-de-Pare3_2016-06-16_05:27:21.jpg', 3, 0),
(8, 'ubuntu_linux_debian_3_2016-06-16_05:27:21.jpg', 3, 0),
(9, 'WallpapersxlKubuntuU3_2016-06-16_05:27:22.jpg', 3, 0),
(10, '122026_Papel-de-Pare4_2016-06-16_05:27:55.jpg', 4, 0),
(11, 'ubuntu_linux_debian_4_2016-06-16_05:27:55.jpg', 4, 0),
(12, 'WallpapersxlKubuntuU4_2016-06-16_05:27:55.jpg', 4, 0),
(13, '122026_Papel-de-Pare5_2016-06-16_05:28:21.jpg', 5, 0),
(14, 'ubuntu_linux_debian_5_2016-06-16_05:28:21.jpg', 5, 0),
(15, 'WallpapersxlKubuntuU5_2016-06-16_05:28:21.jpg', 5, 0),
(16, '122026_Papel-de-Pare6_2016-06-16_05:31:02.jpg', 6, 0),
(17, 'ubuntu_linux_debian_6_2016-06-16_05:31:02.jpg', 6, 0),
(18, 'WallpapersxlKubuntuU6_2016-06-16_05:31:02.jpg', 6, 0),
(19, '122026_Papel-de-Pare7_2016-06-16_05:31:36.jpg', 7, 0),
(20, 'ubuntu_linux_debian_7_2016-06-16_05:31:36.jpg', 7, 0),
(21, 'WallpapersxlKubuntuU7_2016-06-16_05:31:37.jpg', 7, 0),
(22, '122026_Papel-de-Pare8_2016-06-16_05:32:46.jpg', 8, 0),
(23, 'ubuntu_linux_debian_8_2016-06-16_05:32:46.jpg', 8, 0),
(24, 'WallpapersxlKubuntuU8_2016-06-16_05:32:46.jpg', 8, 0),
(25, '122026_Papel-de-Pare9_2016-06-16_05:33:11.jpg', 9, 0),
(26, 'ubuntu_linux_debian_9_2016-06-16_05:33:11.jpg', 9, 0),
(27, 'WallpapersxlKubuntuU9_2016-06-16_05:33:11.jpg', 9, 0),
(28, '122026_Papel-de-Pare10_2016-06-16_05:33:40.jpg', 10, 0),
(29, 'ubuntu_linux_debian_10_2016-06-16_05:33:40.jpg', 10, 0),
(30, 'WallpapersxlKubuntuU10_2016-06-16_05:33:41.jpg', 10, 0),
(31, '122026_Papel-de-Pare11_2016-06-16_05:34:27.jpg', 11, 0),
(32, 'ubuntu_linux_debian_11_2016-06-16_05:34:27.jpg', 11, 0),
(33, 'WallpapersxlKubuntuU11_2016-06-16_05:34:28.jpg', 11, 0),
(34, '122026_Papel-de-Pare12_2016-06-16_05:45:53.jpg', 12, 0),
(35, 'ubuntu_linux_debian_12_2016-06-16_05:45:53.jpg', 12, 0),
(36, 'WallpapersxlKubuntuU12_2016-06-16_05:45:54.jpg', 12, 0),
(37, '122026_Papel-de-Pare13_2016-06-16_05:46:32.jpg', 13, 0),
(38, 'ubuntu_linux_debian_13_2016-06-16_05:46:32.jpg', 13, 0),
(39, 'WallpapersxlKubuntuU13_2016-06-16_05:46:32.jpg', 13, 0),
(40, '122026_Papel-de-Pare14_2016-06-16_05:46:50.jpg', 14, 0),
(41, 'ubuntu_linux_debian_14_2016-06-16_05:46:51.jpg', 14, 0),
(42, 'WallpapersxlKubuntuU14_2016-06-16_05:46:51.jpg', 14, 0),
(43, '122026_Papel-de-Pare15_2016-06-16_05:47:13.jpg', 15, 0),
(44, 'ubuntu_linux_debian_15_2016-06-16_05:47:13.jpg', 15, 0),
(45, 'WallpapersxlKubuntuU15_2016-06-16_05:47:13.jpg', 15, 0),
(46, '122026_Papel-de-Pare16_2016-06-16_05:48:12.jpg', 16, 0),
(47, 'ubuntu_linux_debian_16_2016-06-16_05:48:12.jpg', 16, 0),
(48, 'WallpapersxlKubuntuU16_2016-06-16_05:48:12.jpg', 16, 0),
(49, '122026_Papel-de-Pare17_2016-06-16_05:49:02.jpg', 17, 0),
(50, 'ubuntu_linux_debian_17_2016-06-16_05:49:02.jpg', 17, 0),
(51, 'WallpapersxlKubuntuU17_2016-06-16_05:49:02.jpg', 17, 0),
(52, '122026_Papel-de-Pare18_2016-06-16_05:49:23.jpg', 18, 0),
(53, 'ubuntu_linux_debian_18_2016-06-16_05:49:23.jpg', 18, 0),
(54, 'WallpapersxlKubuntuU18_2016-06-16_05:49:23.jpg', 18, 0),
(55, '122026_Papel-de-Pare19_2016-06-16_05:50:14.jpg', 19, 0),
(56, 'ubuntu_linux_debian_19_2016-06-16_05:50:14.jpg', 19, 0),
(57, 'WallpapersxlKubuntuU19_2016-06-16_05:50:15.jpg', 19, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `created_at`) VALUES
(12, 19, 'Окно 1', '<h2>Окно 1</h2>', 1466099153),
(13, 19, 'Окно 2', '<h2>Окно 2</h2>', 1466099192),
(14, 20, 'Дверь 1', '<h2>Дверь 1</h2>', 1466099210),
(15, 20, 'Дверь 2', '<h2>Дверь 2</h2>', 1466099233),
(16, 23, 'Элемент нижнего слайдера 1', '<h2>Элемент нижнего слайдера 1</h2>', 1466099292),
(17, 23, 'Элемент нижнего слайдера 2', '<h2>Элемент нижнего слайдера 2</h2>', 1466099342),
(18, 22, 'Элемент верхнего слайдера 1', '<h2>Элемент верхнего слайдера 1</h2>', 1466099363),
(19, 22, 'Элемент верхнего слайдера 2', '<h2>Элемент верхнего слайдера 2</h2>', 1466099414);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
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
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(3, 'Переяслав'),
(4, 'Хмельницкий'),
(5, 'Киев'),
(6, 'Пруссия'),
(8, 'Киевская Русь');

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
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

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `type`) VALUES
(1, 'admin', 'slavavitrenko@gmail.com', '$2y$10$QC1BrGH0msJ6ZXKNdQjZPOSlyVgOGcDROa7ZvthAheIbDuvEKzS5q', '9OKghb3P67QjnuknO2INTJ5uD-zPLz8E', 1465997720, NULL, NULL, '127.0.0.1', 1465997720, 1466001094, 0, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `partners_regions`
--
ALTER TABLE `partners_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
