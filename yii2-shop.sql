-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2017 г., 19:43
-- Версия сервера: 5.7.16
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `keywords` text,
  `desciption` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `slug`, `keywords`, `desciption`) VALUES
(1, NULL, 'MEN', 'men', 'hello', NULL),
(2, NULL, 'WOMEN', 'women', NULL, NULL),
(3, NULL, 'KIDS', 'kids', NULL, NULL),
(4, 1, 'Trousers', 'trousers', NULL, NULL),
(5, 1, 'Jeans', 'jeans', NULL, NULL),
(6, 2, 'Skirt', 'skirt', '', ''),
(7, 2, 'Casual shirt', 'casual-shirt', NULL, NULL),
(8, 3, 'Formal shirt', 'formal-shirt', NULL, NULL),
(9, 3, 'Formal jeans', 'formal-jeans', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `text`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Nice!', 3, 1, '2017-04-21 17:23:33', '2017-04-21 17:23:33'),
(2, 'Very good!', 3, 4, '2017-04-21 17:23:44', '2017-04-21 17:23:44'),
(3, 'Good quality', 2, 1, '2017-04-21 17:24:10', '2017-04-21 17:24:10');

-- --------------------------------------------------------

--
-- Структура таблицы `icons`
--

CREATE TABLE `icons` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `icons`
--

INSERT INTO `icons` (`id`, `name`, `link`) VALUES
(4, 'twitter', 'http://twitter.com'),
(5, 'facebook', 'http://facebook.com');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Products/Product1/8f106d.jpg', 1, 1, 'Product', 'b4e2c8c4cf-1', ''),
(2, 'Products/Product2/655a77.jpg', 2, 1, 'Product', '220aa6edc3-1', ''),
(3, 'Products/Product2/493aaf.jpg', 2, NULL, 'Product', '015368fe9a-2', ''),
(4, 'Products/Product2/1741fd.jpg', 2, NULL, 'Product', '07ba825095-3', ''),
(5, 'Products/Product3/132272.jpg', 3, 1, 'Product', '0bbe5ce45c-1', ''),
(6, 'Products/Product3/5cafc0.jpg', 3, NULL, 'Product', '7472e4bb07-2', ''),
(7, 'Products/Product3/6cd2b5.jpg', 3, NULL, 'Product', 'c8389479d5-3', ''),
(8, 'Products/Product4/4334a7.jpg', 4, 1, 'Product', 'a438407d8f-1', ''),
(9, 'Products/Product5/262b08.jpg', 5, 1, 'Product', '006f631398-1', ''),
(11, 'Products/Product6/2ac2c8.jpg', 6, 1, 'Product', '7a8ddf2cea-1', ''),
(12, 'Products/Product6/509794.jpg', 6, NULL, 'Product', '1a19ae72b4-2', ''),
(13, 'Products/Product6/cfa626.jpg', 6, NULL, 'Product', 'ba5a254d45-3', ''),
(14, 'Products/Product7/ff24a1.jpg', 7, 1, 'Product', 'ca05fe4cba-1', ''),
(15, 'Products/Product8/9ad686.jpg', 8, 1, 'Product', '04ace11475-1', ''),
(16, 'Products/Product8/97b4ae.jpg', 8, NULL, 'Product', '43608ecdda-2', ''),
(17, 'Products/Product8/5b677d.jpg', 8, NULL, 'Product', '77886faa26-3', ''),
(18, 'Products/Product9/af8800.jpg', 9, 0, 'Product', '7e94545940-2', ''),
(19, 'Products/Product9/662fb4.jpg', 9, 1, 'Product', 'b1d3cb39ec-1', ''),
(20, 'Products/Product10/fd34ee.jpg', 10, 1, 'Product', 'c68357eec9-1', ''),
(21, 'Products/Product11/81fd0c.jpg', 11, 1, 'Product', '231edbc12e-1', ''),
(22, 'Products/Product11/689696.jpg', 11, NULL, 'Product', 'a58900297d-2', ''),
(23, 'Products/Product11/c216c3.jpg', 11, NULL, 'Product', '84c1a57e9b-3', ''),
(24, 'Products/Product12/ab6010.jpg', 12, 1, 'Product', '794330de71-1', ''),
(25, 'Products/Product13/7f0835.jpg', 13, 1, 'Product', 'cefc04cd19-1', ''),
(26, 'Products/Product13/de2c8c.jpg', 13, NULL, 'Product', '6bca62615b-2', ''),
(27, 'Products/Product13/8d4ba5.jpg', 13, NULL, 'Product', '245e3d20f2-3', ''),
(28, 'Products/Product14/647384.jpg', 14, 1, 'Product', '0223091bac-1', ''),
(29, 'Products/Product14/555c5d.jpg', 14, NULL, 'Product', 'a491ba5809-2', ''),
(30, 'Products/Product15/4837a6.jpg', 15, 1, 'Product', 'd3d2b32d04-1', ''),
(31, 'Products/Product15/77af36.jpg', 15, NULL, 'Product', '6c5063a444-2', ''),
(32, 'Icons/Icons4/7f7083.jpg', 4, 1, 'Icons', '83ceae6efa-1', ''),
(33, 'Icons/Icons5/3b7497.jpg', 5, 1, 'Icons', '9d19764058-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1476793339),
('m130524_201442_init', 1476793344),
('m140209_132017_init', 1480793765),
('m140403_174025_create_account_table', 1480793765),
('m140504_113157_update_tables', 1480793765),
('m140504_130429_create_token_table', 1480793765),
('m140506_102106_rbac_init', 1480866356),
('m140602_111327_create_menu_table', 1485705357),
('m140622_111540_create_image_table', 1485267725),
('m140622_111545_add_name_to_image_table', 1485267725),
('m140830_171933_fix_ip_field', 1480793765),
('m140830_172703_change_account_table_name', 1480793765),
('m141222_110026_update_ip_field', 1480793766),
('m141222_135246_alter_username_length', 1480793766),
('m150614_103145_update_social_account_table', 1480793766),
('m150623_212711_fix_username_notnull', 1480793766),
('m151218_234654_add_timezone_to_profile', 1480793766),
('m160312_050000_create_user', 1485705357),
('m160929_103127_add_last_login_at_to_user_table', 1486465940);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(1, '2017-04-21 19:05:07', '2017-04-21 19:05:07', 1, 244, '0', 'Dmitriy', 'dd@n.r', '123123', 'asdasd'),
(2, '2017-04-21 19:11:29', '2017-04-21 19:11:29', 1, 200, '0', 'asda', 'asd@sd', '143', '124'),
(3, '2017-04-21 19:12:04', '2017-04-21 19:12:04', 1, 200, '0', 'asda', 'asd@sd', '143', '124'),
(4, '2017-04-21 19:13:25', '2017-04-21 19:13:25', 1, 200, '0', 'asda', 'asd@sd', '143', '124'),
(5, '2017-04-21 19:14:42', '2017-04-21 19:14:42', 1, 200, '0', 'asda', 'asd@sd', '143', '124'),
(6, '2017-04-21 19:16:56', '2017-04-21 19:16:56', 3, 833, '0', 'asdasd', 'asd', '124', '123'),
(7, '2017-04-21 19:18:20', '2017-04-21 19:18:20', 3, 833, '0', 'asd', 'asdsd@s.d', '123', 'asd');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `slug`, `price`, `qty_item`, `sum_item`) VALUES
(1, 5, 1, 'Trousers product', NULL, 200, 1, 200),
(2, 6, 1, 'Trousers product', NULL, 200, 1, 200),
(3, 6, 4, 'Jeans product 2', NULL, 300, 1, 300),
(4, 6, 3, 'Jeans product', NULL, 333, 1, 333),
(5, 7, 1, 'Trousers product', NULL, 200, 1, 200),
(6, 7, 4, 'Jeans product 2', NULL, 300, 1, 300),
(7, 7, 3, 'Jeans product', NULL, 333, 1, 333);

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id` int(10) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id`, `number`) VALUES
(1, '999 4567 89022');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price` float NOT NULL DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `made_in` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no-image.png',
  `hit` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `new` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sale` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `slug`, `description`, `made_in`, `color`, `img`, `hit`, `new`, `sale`) VALUES
(1, 4, 'Trousers product', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.</span></p>\r\n', 200, 'trous-prod', '', 'Japan', 'Red', 'p1.jpg', '1', '0', '0'),
(2, 4, 'Trouser Product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона.</span></p>\r\n', 244, 'trous-prod2', '', 'Turkey', 'Orange', 'l3.jpg', '1', '0', '1'),
(3, 5, 'Jeans product', '<h1><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></h1>\r\n', 333, 'jeans-prod', '', 'China', 'Blue', 'l4.jpg', '1', '1', '0'),
(4, 5, 'Jeans product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Morbi dignissim euismod faucibus. Mauris viverra, enim vitae ultricies vulputate, justo mauris lacinia ante, sit amet vulputate tortor velit in turpis.</span></p>\r\n', 300, 'jeans-prod2', '', 'China', 'Green', 'no-image.png', '1', '0', '1'),
(5, 6, 'Skirt product 1', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Maecenas quam lacus, egestas non dui id, dignissim ornare massa. In blandit varius imperdiet.</span></p>\r\n', 555, 'skirt-prod', '', 'China', 'Purple', 'no-image.png', '1', '1', '0'),
(6, 6, 'Skirt product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Praesent in nisi bibendum, gravida urna ut, ultrices sapien. Curabitur egestas lobortis tincidunt.</span></p>\r\n', 400, 'skirt-prod2', '', 'Turkey', 'White', 'l5.jpg', '0', '1', '0'),
(7, 7, 'Casual product shirt 1', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Maecenas venenatis lacinia nisi vitae ultrices. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>\r\n', 600, 'cas-prod-shirt', '', 'China', 'White', 'no-image.png', '0', '0', '0'),
(8, 7, 'Casual shirt product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Nulla scelerisque aliquam enim at varius. Curabitur a nunc in nisl dignissim suscipit sed at massa.</span></p>\r\n', 606, 'cas-prod-shirt2', '', 'China', 'Green', 'no-image.png', '0', '1', '0'),
(9, 8, 'Formal shirt product 1', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Aenean lobortis varius cursus. Quisque sed suscipit diam. Donec ullamcorper bibendum neque ac venenatis.</span></p>\r\n', 240, 'form-shirt-prod1', '', 'China', 'White', 'p6.jpg', '0', '0', '1'),
(10, 8, 'Formal shirt product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Nunc sollicitudin rhoncus nisi, ut porta orci porttitor quis. Nulla pharetra rhoncus eros ut finibus.</span></p>\r\n', 100, 'form-shirt-prod2', '', 'China', 'Yellow', 'p5.jpg', '0', '0', '1'),
(11, 9, 'Formal jeans product 1', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Sed vitae mi sit amet sem blandit interdum non vel magna. Mauris dui ex, pellentesque id finibus nec, blandit quis dui.</span></p>\r\n', 550, 'form-jeans-prod1', '', 'China', 'Black', 'p4.jpg', '0', '1', '0'),
(12, 9, 'Formal jeans product 2', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Aliquam erat volutpat. Vestibulum nulla mauris, tempus in interdum id, sollicitudin sit amet risus.</span></p>\r\n', 220, 'form-jeans-prod2', '', 'China', 'Blue', 'p3.jpg', '0', '0', '0'),
(13, 4, 'Trousers product 3', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Maecenas accumsan egestas ligula consectetur feugiat. Pellentesque accumsan et massa vel feugiat.</span></p>\r\n', 330, 'trous-prod3', '', 'China', 'White', 'p2.jpg', '0', '0', '0'),
(14, 4, 'Trousers product 4', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Suspendisse ac elit cursus, venenatis elit in, iaculis tellus. Proin auctor, velit nec rhoncus vulputate, nulla lectus fringilla nibh, a iaculis turpis enim eu tellus.</span></p>\r\n', 500, 'trous-prod4', '', 'Turkey', 'White', 'p1.jpg', '0', '1', '0'),
(15, 4, 'Trouser product 5', '<p><span style=\"background-color:rgba(245, 243, 243, 0.270588); color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Suspendisse ac elit cursus, venenatis elit in, iaculis tellus. Proin auctor, velit nec rhoncus vulputate, nulla lectus fringilla nibh, a iaculis turpis enim eu tellus.</span></p>\r\n', 500, 'trous-prod5', '', 'China', 'White', 'no-image.png', '0', '0', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` int(11) DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `location`, `website`, `bio`, `timezone`, `gravatar_id`, `gravatar_email`) VALUES
(1, 'Dima', 'dimaplotnikovv@gmail.com', 'Odessa, Одесская область, Украина', 'http://www.final.com', 'About me.', 'Europe/Kiev', NULL, NULL),
(2, 'Igor', 'igor@gmail.com', 'Kiev, Kyiv city, Ukraine', '', 'About myself user 2.', 'Pacific/Kiritimati', NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$EdwI0rFOSAYDn1N3ewUwd.iOdrJzh/6ey.wnMDt.gO2gVFiMuZOPq', 'zbHigaNyaABbjEgEIT5U0H7XoYjxSuTR', 1492782985, NULL, NULL, '127.0.0.1', 1492782779, 1492782779, 0, 1492783482),
(2, 'user1', 'user1@gmail.com', '$2y$10$gDVGgna3mlG1ZqHAr9nzD.3mXME/Af.jQHfKBS4tnnM6N1hIxXBSe', 'PFuVYMSO_2E8v6wRfSNrYbtI8DbrF9Mf', 1492783440, NULL, NULL, '127.0.0.1', 1492783423, 1492783423, 0, 1492784634),
(3, 'user2', 'user2@gmail.com', '$2y$10$dm7BrX0ll2Q9njTNQmMjleX3eMMrJytzIWsv54eSQPES7dC1WT9Sy', 'wJ9psWHzisUWMHyAb7LxB9ylA_FoWBf4', 1492784572, NULL, NULL, '127.0.0.1', 1492784541, 1492784541, 0, 1492790161);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `1` (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

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
  ADD UNIQUE KEY `user_unique_username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
