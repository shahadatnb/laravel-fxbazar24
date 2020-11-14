-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 06:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_fxbazar24`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets`
--

CREATE TABLE `admin_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(10) UNSIGNED NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` double(10,2) DEFAULT NULL,
  `payment` double(10,2) DEFAULT NULL,
  `confirm` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_wallets`
--

INSERT INTO `admin_wallets` (`id`, `user_id`, `remark`, `receipt`, `payment`, `confirm`, `confirm_by`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 5000, 'Sent By: apogee24', 500.00, NULL, 0, NULL, 5000, '2020-10-29 17:46:46', '2020-10-29 17:46:46'),
(2, 5046, 'Sent By: apogee24', 500.00, NULL, 0, NULL, 5000, '2020-10-30 15:43:29', '2020-10-30 15:43:29'),
(3, 5046, 'registerWallet Sent By: apogee24', 500.00, NULL, 0, NULL, 5000, '2020-10-30 15:45:25', '2020-10-30 15:45:25'),
(4, 5046, 'test', NULL, 10.00, 0, NULL, NULL, '2020-10-30 16:13:05', '2020-10-30 16:13:05'),
(5, 5046, 'test', NULL, 10.00, 0, NULL, NULL, '2020-10-30 16:13:24', '2020-10-30 16:13:24'),
(6, 5000, '0 : 01912624881 - test', NULL, 10.00, 0, NULL, NULL, '2020-10-31 17:46:46', '2020-10-31 17:46:46'),
(7, 5000, '1 : 01912624881 - test', NULL, 10.00, 0, NULL, NULL, '2020-10-31 17:48:21', '2020-10-31 17:48:21'),
(8, 5000, 'withdrawWallet Sent By: apogee24', 10.00, NULL, 0, NULL, 5000, '2020-11-06 16:51:14', '2020-11-06 16:51:14'),
(9, 5000, 'registerWallet Sent By: apogee24', 10.00, NULL, 0, NULL, 5000, '2020-11-06 16:54:02', '2020-11-06 16:54:02'),
(10, 5000, 'bKash : 01912624881 - test', NULL, 9.00, 1, 5000, NULL, '2020-11-07 16:53:37', '2020-11-07 16:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `bett_balances`
--

CREATE TABLE `bett_balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `bal_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bett_games`
--

CREATE TABLE `bett_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` smallint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastTime` datetime DEFAULT NULL,
  `teamA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teamB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `draw` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus` double DEFAULT NULL,
  `parson` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bett_game_ans`
--

CREATE TABLE `bett_game_ans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `game_id` int(5) DEFAULT NULL,
  `ans` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earn_wallets`
--

CREATE TABLE `earn_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` double(6,4) DEFAULT NULL,
  `payment` double(6,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `earn_wallets`
--

INSERT INTO `earn_wallets` (`id`, `user_id`, `remark`, `receipt`, `payment`, `created_at`, `updated_at`) VALUES
(1, 5000, NULL, 0.1000, NULL, '2020-11-06 11:14:04', '2020-11-06 11:14:04'),
(2, 5000, NULL, 0.1000, NULL, '2020-11-06 11:20:48', '2020-11-06 11:20:48'),
(3, 5066, NULL, 0.1000, NULL, '2020-11-07 18:50:55', '2020-11-07 18:50:55'),
(4, 5066, NULL, 0.1000, NULL, '2020-11-07 18:51:42', '2020-11-07 18:51:42'),
(5, 5066, NULL, 0.1000, NULL, '2020-11-07 18:57:35', '2020-11-07 18:57:35'),
(6, 5066, NULL, 0.1000, NULL, '2020-11-07 18:59:26', '2020-11-07 18:59:26'),
(7, 5066, NULL, 0.1000, NULL, '2020-11-07 19:01:17', '2020-11-07 19:01:17'),
(8, 5066, NULL, 0.1000, NULL, '2020-11-07 19:01:53', '2020-11-07 19:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_12_172031_create_current_wallets_table', 2),
(4, '2018_02_12_172153_create_my_wallets_table', 2),
(5, '2018_02_12_172215_create_earn_wallets_table', 2),
(6, '2018_02_13_173524_create_admin_wallets_table', 3),
(7, '2018_02_24_062702_create_bett_balances_table', 4),
(8, '2018_02_24_064217_create_bett_games_table', 4),
(9, '2018_02_24_191917_create_bett_game_ans_table', 4),
(10, '2018_02_26_220616_create_settings_table', 5),
(11, '2018_03_22_080710_create_rewards_table', 6),
(12, '2018_03_23_115633_create_user_pins_table', 7),
(13, '2018_05_13_191458_create_ptcs_table', 8),
(14, '2018_05_13_192747_create_ptc_click_table', 8),
(15, '2018_08_27_201421_create_products_table', 9),
(16, '2018_08_27_201841_create_orders_table', 9),
(17, '2018_08_27_215201_create_point_values_table', 10),
(18, '2020_10_29_072302_create_wallets_table', 11),
(19, '2020_10_29_073653_create_pro_cats_table', 12),
(22, '2020_11_13_234705_create_packegs_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kuriar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirm` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `mobile`, `kuriar`, `address`, `confirm`, `created_at`, `updated_at`) VALUES
(1, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 04:08:38', '2020-10-30 04:08:38'),
(2, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 04:39:48', '2020-10-30 04:39:48'),
(3, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 04:44:47', '2020-10-30 04:44:47'),
(4, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 10:59:21', '2020-10-30 10:59:21'),
(5, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 11:02:36', '2020-10-30 11:02:36'),
(6, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 11:48:27', '2020-10-30 11:48:27'),
(7, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-10-30 11:51:10', '2020-10-30 11:51:10'),
(8, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-11-02 02:16:23', '2020-11-02 02:16:23'),
(9, 1, 5000, '01757839516', 'Sundarban', 'Rajshahi', 0, '2020-11-02 02:17:24', '2020-11-02 02:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `packegs`
--

CREATE TABLE `packegs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) UNSIGNED DEFAULT NULL,
  `payment` decimal(6,3) UNSIGNED DEFAULT NULL,
  `exp` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packegs`
--

INSERT INTO `packegs` (`id`, `title`, `amount`, `payment`, `exp`, `created_at`, `updated_at`) VALUES
(1, 'Active', '12.50', '0.125', 6, NULL, NULL),
(2, 'Easy', '25.00', '0.250', 6, NULL, NULL),
(3, 'Super', '62.50', '0.312', 12, NULL, NULL),
(4, 'Business', '125.00', '0.562', 18, NULL, NULL),
(5, 'Silver', '250.00', '1.125', 18, NULL, NULL),
(6, 'Gold', '625.00', '2.812', 18, NULL, NULL),
(7, 'Diamond', '1250.00', '6.250', 18, NULL, NULL),
(8, 'Crown', '5000.00', '25.000', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shahadat@asiancoder.com', '$2y$10$EnVo.9z3NOt5My8dRArPme1BWmhg7YkPLeuXtvSiwUuepzFvXl7Xu', '2018-02-17 14:22:01'),
('ma01746867018@gmail.com', '$2y$10$LA6i4BymLl7pNRD5C2Igiuz7NkZc6tIXnK9MVPApjB5ua5xrX6/.m', '2020-06-25 15:32:35'),
('ijafor580@gmail.com', '$2y$10$VOlGpz1Q5v0YgK.xom84TOTLq1cklWTdVVpj0OQ7HNWhlrox.glAa', '2020-07-02 21:43:21'),
('fgh45@gmail.com', '$2y$10$SiXVDrPvqX2TdwyXTbaEauun1t6rRFsns32BwM.c3.Cv6rODfCbIm', '2020-07-16 18:15:43'),
('ikhtekharubaid@gmail.com', '$2y$10$6mR4zZsSGjv12dhu9VdFlOaBDtXqY5u26p36tl832odUlePK1qF2i', '2020-07-06 09:26:36'),
('foysalrf711@gmail.com', '$2y$10$2DDDUPWPkYAJHnl8zmvChOXFi7CbpCGOLjUoqKKZorbgCRjcImHFm', '2020-08-01 22:31:06'),
('alamin3980@gmail.com', '$2y$10$gYGcDf5VUClcOETlG/JZuO46A1j9ugHUIsCGFtwsJ21gopt7sO7TW', '2020-08-06 22:06:57'),
('hamjaa763@gmail.com', '$2y$10$GNIf2xhUy8lArl4HEmyXNO.lBfXZpj2tUnKMWmzzpFt7/rOKDN1Sm', '2020-08-07 05:28:15'),
('samimmm247@gmail.com', '$2y$10$WZ0TQQ9wGJqrhedwiohblu0KOOD4f9J48t54QzJRL336crulegxU2', '2020-08-11 08:05:47'),
('shakib40348222@gmail.com', '$2y$10$nCxVbxUAUEM7dATIDL352exEkk71xhA9epHGXOs1.MWOs1ByNgPXS', '2020-08-11 09:47:36'),
('sk8076562@gmail.com', '$2y$10$/VXwcI8PTDj2K1OOBb/stu7ycizGZN/VgN7Kl90X8xxDFlhjR3AUu', '2020-08-11 19:27:32'),
('asifnadimarafat@gmail.com', '$2y$10$K4ilVLz6dsHtf0DuZIiyjuKTkWyLYFlJlLAeASjrPzR3vVHrBFNZ2', '2020-08-16 08:13:43'),
('hasibulhasanporan@gmail.com', '$2y$10$dbygiqYzDy5kmG0LNT1sPOgGhw05.0377XWEjE4NELEOBXR575LLa', '2020-09-18 19:24:02'),
('alomgirhossain76217@gmail.com', '$2y$10$ZhFdmgn5mUMoG9bpv7B6lOAyUi7d2mKgAHW3haBf.4DEV0nD486AS', '2020-09-19 05:33:05'),
('shakilmorol9@gmail.com', '$2y$10$YtZwNgCfkLocWNyHP0s8uuotcXwaU6N2SvTiwWuWLj09aZ2PZIrVy', '2020-09-20 20:31:49'),
('emon405030@gami.com', '$2y$10$oIkkBg8Avm8N86VPs2I8ue5QDfCyauxjgMoPxrT3XhL8n2BSAiV4u', '2020-09-23 19:55:30'),
('biswasnishan96@gmail.com', '$2y$10$mONZkD5g.wC2Oif8KUlaZuTGQvtw4zNzZ6jiWeGaWwjCb6aWz1pT.', '2020-09-29 05:47:48'),
('sa50038582@g-mail.com', '$2y$10$ilmS3eHLntj88ZSqJe.3e.vnoBH/lVZtlu5a//6rFU.s6oA6nslRm', '2020-09-29 05:48:19'),
('mdhasiruddinhasir@gmail.com', '$2y$10$8.4sOdX58RSpFjPNtf3lEuuN09cwsd2X6W5DYX65l/00pEL05jD2W', '2020-09-29 14:53:18'),
('mdruhulazam2002@gmail.com', '$2y$10$Ng6zl045DY1GDp0vfct4u.2tRscljsqZt1.Dv4ZZCTSy61xNMirgS', '2020-10-03 12:52:33'),
('mdhasan114676@gmail.com', '$2y$10$sXSttm6qBKjYVp5PoL8wOu0RSdjgHzNMKcvqy5ppTVQAFZR9V1AKa', '2020-10-07 19:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `pv` decimal(10,2) DEFAULT NULL,
  `reduced_price` decimal(10,2) UNSIGNED DEFAULT NULL,
  `cat_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `brand_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `pv`, `reduced_price`, `cat_id`, `brand_id`, `featured`, `description`, `status`, `user_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Chair', '200.00', NULL, NULL, 1, NULL, 0, '<p>“Pictures, abstract symbols, materials, and colors are among the ingredients with which a designer or engineer works. To design is to discover relationships and to make arrangements and rearrangements among these ingredients.”<br></p>', 1, 5000, '1603986560_Aqua.png', '2020-10-29 15:15:02', '2020-11-01 17:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `pro_cats`
--

CREATE TABLE `pro_cats` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pro_cats`
--

INSERT INTO `pro_cats` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ptcs`
--

CREATE TABLE `ptcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `publish_date` date NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ptcs`
--

INSERT INTO `ptcs` (`id`, `publish_date`, `link`, `created_at`, `updated_at`) VALUES
(1, '2020-11-06', 'https://www.youtube.com/watch?v=a9ZL5pPBlEY', '2020-11-06 07:57:13', '2020-11-06 07:57:13'),
(2, '2020-11-08', 'https://www.youtube.com/watch?v=a9ZL5pPBlEY', '2020-11-06 07:57:47', '2020-11-06 07:57:47'),
(3, '2020-11-08', 'https://www.youtube.com/watch?v=yNCZJzf9iMc', '2020-11-06 08:53:55', '2020-11-06 08:53:55'),
(4, '2020-11-14', 'https://www.youtube.com/watch?v=yNCZJzf9iMc', '2020-11-14 14:21:13', '2020-11-14 14:21:13'),
(5, '2020-11-14', 'https://www.youtube.com/watch?v=yNCZJzf9iMc', '2020-11-14 14:21:19', '2020-11-14 14:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `ptc_click`
--

CREATE TABLE `ptc_click` (
  `id` int(10) UNSIGNED NOT NULL,
  `ptc_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ptc_click`
--

INSERT INTO `ptc_click` (`id`, `ptc_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 1, 5000, NULL, NULL),
(2, 2, 5001, NULL, NULL),
(3, 1, 5001, NULL, NULL),
(9, 2, 5000, NULL, NULL),
(16, 2, 5066, NULL, NULL),
(15, 3, 5066, NULL, NULL),
(17, 4, 5000, NULL, NULL),
(21, 5, 5000, NULL, NULL),
(22, 4, 5069, NULL, NULL),
(24, 5, 5069, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sl` smallint(2) DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sl`, `name`, `description`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'live_bett_msg', 'Bett Meggage', 'Welcome to Bett Zone hh', 0, NULL, '2018-02-26 17:37:07'),
(2, 1, 'live_bett_amt', 'Live Betting amount', '10', 0, NULL, NULL),
(3, 1, 'live_bett_msg', 'Live2 bett msg', '', 0, NULL, NULL),
(4, 1, 'live2_bett_amt', 'Live2 bett Amount', '15', 0, NULL, '2018-03-09 09:41:06'),
(5, 3, 'live_bett_du', 'Live Bett Duration', '60', 0, NULL, NULL),
(6, 5, 'affiliate', 'Affiliate', 'http://localhost/cmb2-metabox-generator-master/', 0, NULL, '2018-05-13 15:43:38'),
(7, 1, 'data-entry', 'Data Entry', 'http://localhost/cmb2-metabox-generator-master/', 0, NULL, '2018-05-13 15:43:42'),
(8, 5, 'out-others', 'Out Other', 'http://localhost/cmb2-metabox-generator-master/', 0, NULL, '2018-05-13 15:43:46'),
(9, 1, 'fontend_msg', 'Fontend Message', 'Together we share & together we achieve more.', 1, NULL, '2020-07-31 01:39:47'),
(10, 1, 'backend_msg', 'Panel Message', 'YTLPI', 1, NULL, '2020-08-06 21:29:10'),
(11, 1, 'youtube_earn', 'YouTube Earn', '.10', 1, NULL, '2020-08-06 21:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referralId` smallint(6) DEFAULT NULL,
  `placementId` smallint(6) DEFAULT NULL,
  `placementUsername` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hand` tinyint(1) UNSIGNED DEFAULT NULL,
  `rank` tinyint(2) UNSIGNED DEFAULT 0,
  `slot` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `payment_method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_details` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packeg_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `mobile`, `referralId`, `placementId`, `placementUsername`, `hand`, `rank`, `slot`, `payment_method`, `account_details`, `pin`, `packeg_id`, `premium`, `admin`, `password`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5000, 'apogee24', 'shahadat', 'apogee24@apogee24.com', '01700000000', 0, NULL, NULL, 0, 1, 0, NULL, NULL, '1111', 1, 2, b'1', '$2y$10$.ZuvdXjDhCb41OwA7shYNuf4g5DDo9HuhHk8Jb/DfLD1TnSyFhuIu', NULL, 1, 'jdxvCjA4fMHTFsvKmZkOxXTwpNls5XJhA19jQ055KsoQdCzG6sVx8Zq5Feev', '2018-02-11 19:35:05', '2020-11-14 02:25:16'),
(5001, 'apoogee24', 'apoogee1', 'tatusar1993@gmail.com', '01700000000', 5000, 5000, 'shahadat', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$eQI9T3F5BRTgxD/iPSSCQuuwTmttagG7k.UbDULxWD5T.9WjrJ51C', NULL, 1, '8UhOiZtT3DT9RKa6eAY3im6KjmKLYgQ91CsD2vKqGsjRPa73Ukx7On35caN4', '2020-10-10 14:06:00', '2020-10-10 14:06:00'),
(5002, 'apoogee24', 'apoogee2', 'tatusar1993@gmail.com', '01700000000', 5001, 5000, 'shahadat', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$1wY8M.4ITAtVRGO0u4JCFeRZUQ4VfNLOLV8HgwEfrmHBYuNWzWBXy', NULL, 1, 'ING0OXFXPILogc4H8a2HT2CVJ1U5zHoguz9dACVAzQ6ji9WIUdckoGveLlAn', '2020-10-10 14:09:10', '2020-10-10 14:09:10'),
(5003, 'apoogee24', 'apoogee3', 'tatusar1993@gmail.com', '01700000000', 5001, 5002, 'apoogee2', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$vjLjdoJju3kd7QloxKJXyeUR112rp.aJDO0W62QWiLxBw5I35hDQm', NULL, 1, 'HJYMUmnbElrEJ6MCRUHVNaQ31S1vBgC0k9mUwBD0cSgJnpDZkgB60jGVDchj', '2020-10-10 14:11:14', '2020-10-10 14:11:14'),
(5004, 'apoogee24', 'apoogee4', 'tatusar1993@gmail.com', '01700000000', 5002, 5002, 'apoogee2', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$FKkKcMFphEE89ZKaw5rImeqEfivgGjhtZ5vQSwGstuyg53ywCbWlK', NULL, 1, 'xGcRrqJ9ZvruTDorFG0PgQsjOBxdYkTJorVaEi7UNm3ePKqaKAse2KI2M8T7', '2020-10-10 14:24:36', '2020-10-10 14:24:37'),
(5005, 'apoogee24', 'apoogee5', 'tatusar1993@gmail.com', '01700000000', 5002, 5003, 'apoogee3', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$zDUAMNjjTPTBJtJk55qltuYFV5IqW.yMu3xOtsxqWJPFTNo7Xs/2W', NULL, 1, 'FOWO59MqX4DeNAM6FKauiFYR8iXDdCNJMGrI0CzsE2EYanPyZcs3zUuaRJla', '2020-10-10 14:27:25', '2020-10-10 14:27:25'),
(5006, 'apoogee24', 'apoogee6', 'tatusar1993@gmail.com', '01700000000', 5003, 5003, 'apoogee3', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$NAfOwhl3edWBZ.ennz8jc.V4V3Mt1pi2Zj0T0DjUkIS12tO5/0Gy.', NULL, 1, 'oEKvTZvgk8a8Y0r6K7R3Ia0KINkY7scKBtMnwjK8cJ5fvivjcUxyHRrhGt4h', '2020-10-10 14:29:27', '2020-10-10 14:29:27'),
(5007, 'apoogee24', 'apoogee7', 'tatusar1993@gmail.com', '01700000000', 5003, 5004, 'apoogee4', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$c6eqOF29vwjQFZqGzrxYyu8epUq55OnPBgYhISe3/d/mNHBVEkuIO', NULL, 1, 'gcfFqGe2NMBVTBIcUvACg1lolRsMzHoziM3jqAz2da92v1dbo5XGYge0J7R5', '2020-10-10 14:30:56', '2020-10-10 14:30:56'),
(5008, 'apoogee24', 'aoogee8', 'tatusar1993@gmail.com', '123456', 5004, 5004, 'apoogee4', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$/ihBVfHyLBWkQT3ld7p33./84vXHykgNAgUEotB/Yn9fdcynSdyO2', NULL, 1, 'b9lEAq2cBzwmG07WykHmoPzcQv8JcFxgyNL5GX3YDA2siX2peJLde9Gturmu', '2020-10-10 14:40:20', '2020-10-10 14:40:20'),
(5009, 'apoogee24', 'apoogee9', 'tatusar1993@gmail.com', '01700000000', 5004, 5005, 'apoogee5', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$ZlE/W0qnycRVgOo7sWli5e2PTFDHhjdXxhYM3mLHzQJw39f4OvW..', NULL, 1, 'nnrltHJ2Axef2DHkODpjGdZDLtCQsZolbLcmm9QQNMCeM3tqDNvysf54zfqd', '2020-10-10 14:41:51', '2020-10-10 14:41:51'),
(5010, 'apoogee24', 'apoogee10', 'tatusar1993@gmail.com', '01700000000', 5005, 5005, 'apoogee5', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$v.zQAzIsvv3qwTcq0G2Yh.cx3j/r0MFrX5SpQBykTQBMGZT9oYgBq', NULL, 1, '9GK90XhrGGEVW2tqbkxGcMc6elcdDQ2CgrKI7luUoW5YJcrnO77hJ9xIgoIA', '2020-10-10 14:43:32', '2020-10-10 14:43:33'),
(5011, 'apoogee24', 'apoogee11', 'tatusar1993@gmail.com', '01700000000', 5005, 5006, 'apoogee6', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$NIbfsQbDnJE6oW0ZA4esRepQK0DHts08Pt/UPWuIPDkEaxQ/OFJMi', NULL, 1, 'XEH7YCyO1NAU19kAgvF2ZctOtVkt5P36D4g5jbtDo7mHAuvfoaqMs8chlgu8', '2020-10-10 14:45:05', '2020-10-10 14:45:05'),
(5012, 'apoogee24', 'apoogee12', 'tatusar1993@gmail.com', '01700000000', 5006, 5006, 'apoogee6', 1, 0, 0, NULL, NULL, NULL, 1, 2, b'0', '$2y$10$TcJli.XEi6of3.hxF7oSlOu2mzlB7zPttZ.QTYSbkoo/GT1/5RAsi', NULL, 1, 'fMMw0LZET9MCoFSzkxkwukEHmRQtDi2jxFuGn2P5k4T8m1UaKbxzUciD0SLF', '2020-10-10 14:47:42', '2020-10-10 19:26:03'),
(5013, 'RASHIDUL', 'ISLAM', 'a.b.rashidul@gmail.com', '01773174197', 5009, 5007, 'apoogee7', 1, 0, 0, NULL, NULL, NULL, 1, 2, b'0', '$2y$10$YuhK61NHdcgmciY7Uctx4.hRN78Yut/NEP6s44swhzyDBoZdD3Tym', NULL, 1, NULL, '2020-10-10 17:30:33', '2020-10-10 17:51:41'),
(5014, 'Md Moyez Uddin', 'Moyez123', 'mdmoyez93@gmail.com', '01609136331', 5009, 5007, 'apoogee7', 2, 0, 0, NULL, NULL, NULL, 1, 2, b'0', '$2y$10$7exUSmcX2kCuhHXwkx5XfOpyf5RBW23/vFgUI/JyBB5CkDxX.zCs2', '1602334904_inbound3603512968673552168.jpg', 1, NULL, '2020-10-10 17:38:42', '2020-10-10 18:01:45'),
(5015, 'Sujon123', 'Sujon123', 'sujonpramanik2002@gmail.com', '01744867583', 5010, 5008, 'aoogee8', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$vR3v96zpUipIbgOKMcxTHeuwa/6EK1enPK..TmYBz8JXf/6uOnTkm', NULL, 1, NULL, '2020-10-10 18:02:32', '2020-10-10 18:02:32'),
(5016, 'appogee24', 'appogee13', 'tatusar1993@gmail.com', '01700000000', 5012, 5008, 'aoogee8', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$ncrT71K949GxEWY1cVoxK.HVf3jyE.j2/.0629Y8h9k.4Tf32KGGq', NULL, 1, 'ppH8WIRqyi3scSpkkhoGAPah4ojTOi55n8LcChWSy3SKzeHn13jsygUISagm', '2020-10-10 18:46:17', '2020-10-10 18:46:18'),
(5017, 'apoogee24', 'apoogee14', 'tatusar1993@gmail.com', '01700000000', 5012, 5009, 'apoogee9', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$./8/laFEn88p1P2.9X/DVeozuXp4Awo4QAQWA9aPHuKJsRxoTz.jS', NULL, 1, 'WAaZZc9fOADA5qieQHIdZhrOgkOBUHCM5pHbXdfj8gqRP6iIrtYYBkHuwsXs', '2020-10-10 18:48:36', '2020-10-10 18:48:37'),
(5018, 'appogee24', 'apoogee15', 'tatusar1993@gmail.com', '01700000000', 5016, 5009, 'apoogee9', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$7tTm2lXyjwXmhMh5Zb8k3uHtMZm503LyjRxuMyy4aULi.gzYKprWW', NULL, 1, 'cqTaKHnLLkxFKwSBSodbR7jpIDSh9WUFijFSyDnWBLCpjVn7xnB6WyZU2DAC', '2020-10-10 18:51:37', '2020-10-10 18:51:38'),
(5019, 'appogee24', 'apoogee16', 'tatusar1993@gmail.com', '01700000000', 5016, 5010, 'apoogee10', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$qHSwY980X4fOaWcIBfZVPux8aCoGY5ueIX6ikZqUFLw/mRrPrRzS2', NULL, 1, '3onLmYvEdQNU7jtYididqAsoqeQ4XVGaq0wv0MswubbWRPRDakpkCD6NebZF', '2020-10-10 18:53:26', '2020-10-10 18:53:27'),
(5020, 'apoogee24', 'apoogee17', 'tatusar1993@gmail.com', '01700000000', 5017, 5010, 'apoogee10', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$.pDQj./im919pFtLDQ4Dt.u6J2VwcsiwOm9baYk6k4DzPwWKQP4Tu', NULL, 1, 'hycj4uALQHPQ8BGOKVPXkXxSoh5p6LK6Qx5su9Ct3q2yADz1elgvX9VeByfY', '2020-10-10 18:56:51', '2020-10-10 18:56:52'),
(5021, 'apoogee24', 'apoogee18', 'tatusar1993@gmail.com', '01700000000', 5017, 5011, 'apoogee11', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$OA/3iFipQ9TYyckDHRS8M.mYSqkPKbfiGrf93B3oos6imVU3NA3R.', NULL, 1, 'huZKHTj70jOc18xuz9PvuTaG3HlTE4l80vlzDwFrsaJAuUVpR7AHoVVBeOfT', '2020-10-10 18:58:31', '2020-10-10 18:58:32'),
(5022, 'appogee24', 'apoogee19', 'tatusar1993@gmail.com', '01700000000', 5018, 5011, 'apoogee11', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$vjZi4iwQaNEsqs4Od1xUluJqB40ZaQZYTKxNLnMdGmb4jWmiB2pfi', NULL, 1, 'AeEp2CKDyZ5YfRqTaAtq1HMgMT3wCd7OcXenHcxirsc7yZGfRbhi2QkbbhLx', '2020-10-10 19:02:02', '2020-10-10 19:02:03'),
(5023, 'apoogee24', 'apoogee20', 'tatusar1993@gmail.com', '01700000000', 5018, 5012, 'apoogee12', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$p6wsSXZKhoEeIPVIF05iP.3IWD82.DDYPRiizy9nfzU8C09jv8r42', NULL, 1, 'QH7aSefQz3kn0rlQSjfhQakFafzZTsXDbC3jiuQZVQPwbyCfLtLSAJ5ElR5j', '2020-10-10 19:03:24', '2020-10-10 19:03:25'),
(5024, 'apoogee24', 'apoogee21', 'tatusar1993@gmail.com', '01700000000', 5019, 5012, 'apoogee12', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$qiMr4q2jtE47UI2BvON7zeuEdk7.jSHfD2C68/Zf8dhX.8QbH6ngu', NULL, 1, 'luUUL7KJRAMz63DF3TdglBTPa4w2lQFAXmLHU08NjHDnbSbdyNNG5DqksA4J', '2020-10-10 19:05:33', '2020-10-10 19:05:33'),
(5025, 'appogee24', 'apoogee22', 'tatusar1993@gmail.com', '01700000000', 5019, 5013, 'ISLAM', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$uIw.AEkwBCwRtDPd3UXuY.yJO2rYIpcRnJ2GhFPRdUaeBjwaT5dUO', NULL, 1, 'jf4MlA3CFjFC8QZkImJv7vWV4BjuFSAVlnzRghe4od3ZpCTVafY0kbosTfbd', '2020-10-10 19:09:10', '2020-10-10 19:09:11'),
(5026, 'appogee24', 'apoogee23', 'tatusar1993@gmail.com', '01700000000', 5020, 5013, 'ISLAM', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$LZ0KCOrTXPUTS6M3Rg4H/u1TYMrny2YJav5ulfXxBbQ2Ar3r1DxL2', NULL, 1, '2yREuCa17GtaEd1WipDW6L5SPcJXLzjuxao0XEG9vYQsc2TMViMjkHooRYNf', '2020-10-10 19:13:20', '2020-10-10 19:13:20'),
(5027, 'apoogee24', 'apoogee25', 'tatusar1993@gmail.com', '01700000000', 5020, 5014, 'Moyez123', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$2YvMhhoOhFnipt6DJm/ZxevVoDnDjHNAkcynnNQFPAJgj98o53/hi', NULL, 1, '3l6wwvRIcfPHhrfdGfE5LE57LcG3gAxs6bcRzCBm5YcB6GBQjZTvFpZ9A75n', '2020-10-10 19:15:18', '2020-10-10 19:15:19'),
(5028, 'appogee24', 'apoogee26', 'tatusar1993@gmail.com', '01700000000', 5021, 5014, 'Moyez123', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$O/N8mzSjMlbfngYTWXxUP.8Dl3cqbdxHYAQmJBZBKSImUbaMvp4EK', NULL, 1, 'L8ZBCGbeyqlw8rjQHUKng8XLfyzYl8UZ3Apffn1zBIeV2koO1Fx1BZ2ebbIk', '2020-10-10 19:16:56', '2020-10-10 19:16:57'),
(5029, 'appogee24', 'apoogee27', 'tatusar1993@gmail.com', '01700000000', 5021, 5015, 'Sujon123', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$g0KSkDfhFEcghhSSqQFXweF9/2Zpan8XyZDBAuPntUgqBdctuWchO', NULL, 1, 'lHN1Y5PSINLWukNd5rnYPmJxGgqlLaCWTF7TNVQVdfZO191Hhe3aq2ZRxzZk', '2020-10-10 19:18:46', '2020-10-10 19:18:47'),
(5030, 'appogee24', 'apoogee28', 'tatusar1993@gmail.com', '01700000000', 5022, 5015, 'Sujon123', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$qbR2AtV45DJkLvB2Hr2TSuJBPg.pPkhP0BcGjfvuDoxgKxFE/2RjW', NULL, 1, 'YQkIZJZkUFZQwBs1kddOg1SRBwdViwyfsAipGhkWKWqmIeFTBzZjLpwfQVoe', '2020-10-10 19:21:59', '2020-10-10 19:21:59'),
(5031, 'appogee24', 'apoogee29', 'tatusar1993@gmail.com', '01700000000', 5022, 5016, 'appogee13', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$KAAwNsjqabrZ4Y8PylXxd.Y36YATaWa1JNiAlGrdsP0aJwZgCZH/2', NULL, 1, 'u6XtStUc2vFdj3w5TIv4YWEi3GjTV2ioX7OAREB5xwnu6oNkSqmAt6r2MQxs', '2020-10-10 19:23:28', '2020-10-10 19:23:28'),
(5032, 'appogee24', 'apoogee30', 'tatusar1993@gmail.com', '01700000000', 5023, 5016, 'appogee13', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$/5AviYr821TEno7v5H85TuqLbRYJ//b7hnKvvoxmGzyGyIhAun2Fu', NULL, 1, 'z8ITnRHenurLjLs2D9avmDQKgWvIG5Ly7gSdNNdok2IeuSt7iTFd5QinlRxC', '2020-10-10 19:24:56', '2020-10-10 19:24:57'),
(5033, 'appogee24', 'apoogee31', 'tatusar1993@gmail.com', '01700000000', 5023, 5017, 'apoogee14', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$h4g40QDY01/Q.umM7xIZRum7uHJ6wIP9vXzJaLem7wgwFrRHv.4Gy', NULL, 1, 'CpOYK4bNiTiuZ6ocJUGpaxKmYgMQWVKXP8GPtFmjIbXLKBIO4IOvGloITseu', '2020-10-10 19:26:09', '2020-10-10 19:26:09'),
(5034, 'appogee24', 'apoogee32', 'tatusar1993@gmail.com', '01700000000', 5024, 5017, 'apoogee14', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$uhyR4oSlmH5bUcyYNjwVMev.J2w.o.NVF4ImbizLa9MPj/dC8IXx.', NULL, 1, 'RbgH7AcaHkgjaLK0v2aN6w08ZF4F50u7zmx0MofzQBHuVznMNJrqeP6N1MAe', '2020-10-10 19:28:09', '2020-10-10 19:28:10'),
(5035, 'appogee24', 'apoogee33', 'tatusar1993@gmail.com', '01700000000', 5024, 5018, 'apoogee15', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$uBh7J1D3YM79DJ/CkGiCuOzF07KEctsAHdeFBpp4uxpeVODbVVvOS', NULL, 1, 'US3WxE5pzohXzUPlq8kOOeYEHTOnwMtrHxmp13h3fToARGP1huZldqLtoiWk', '2020-10-10 19:29:24', '2020-10-10 19:29:24'),
(5036, 'apoogee24', 'apoogee34', 'tatusar1993@gmail.com', '01700000000', 5025, 5018, 'apoogee15', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$8VaEnedtUXTs9eUJiRS0juSVqpE7FJ0tZYAgjBOSSfkw3VjA.SkSm', NULL, 1, 'HWLotPQ0hr6ow4EngRTbvZo4ELxxksVT17HRn6dRmrByLHdNQPu34XFSb7mh', '2020-10-10 19:30:56', '2020-10-10 19:30:57'),
(5037, 'appogee24', 'apoogee35', 'tatusar1993@gmail.com', '01700000000', 5025, 5019, 'apoogee16', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$iY.os7oUkvRw7geR7ecY/.y8TPGn.DJqBC5XEBDjiidaMUsvfZidi', NULL, 1, '9H2ghRvNPSlzODAjnT6x79VBsBUFn9XivVVadQ6mucs8Tr9tnwuB3oZJn86B', '2020-10-10 19:34:00', '2020-10-10 19:34:01'),
(5038, 'appogee24', 'apoogee36', 'tatusar1993@gmail.com', '01700000000', 5026, 5019, 'apoogee16', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$gIwyWrVLnjezkCc4rcfErObCx4AaLD/LDHRNccuQWGRi7C2LO9rOG', NULL, 1, 'YuiJiUvMMvHDtuzMXGMIQCWWPEvaB6K1Rm0sU17t2rIcE6HCHFZqj8WXfn5r', '2020-10-10 19:42:56', '2020-10-10 19:42:56'),
(5039, 'appogee24', 'apoogee37', 'tatusar1993@gmail.com', '01700000000', 5026, 5020, 'apoogee17', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$xAlPt6QFyvAhQrbHUqouHuQZrgrZ5n9xOi7FELoHrB8RmEQFh8UrO', NULL, 1, 'Qc4zRQ3bduBsvV3jDfoOlbS78kV4r34Md7mfVkDwkYKEGGIoonXDRLE3tF0O', '2020-10-10 19:44:17', '2020-10-10 19:44:18'),
(5040, 'appogee24', 'apoogee38', 'tatusar1993@gmail.com', '01700000000', 5027, 5020, 'apoogee17', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$LjHbiMbwM2LQ8r1GxpxSu.ryuXbfnvj9UAVP/RG2RkbyHyDYpc7cu', NULL, 1, 'aOqFL61RWHLGxpL6vl3HeXfb6v4VZBXwF0UwKfPCSdogrfrmkGAdCCaULiki', '2020-10-10 19:46:07', '2020-10-10 19:46:07'),
(5041, 'appogee24', 'apoogee40', 'tatusar1993@gmail.com', '01700000000', 5027, 2021, 'apoogee18', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$isxVS6cwuDlY5oDYAsJmeOhuzq7CY0nxRbLE8nqpLc70vP148hjpW', NULL, 1, 'yeV08cJzAp3R1DkE3ICr7yKd72mUwY2b0q9WvwanlhCDziEcCRSpoUQM4ftQ', '2020-10-10 19:47:28', '2020-10-10 19:47:29'),
(5042, 'appogee24', 'apoogee41', 'tatusar1993@gmail.com', '01700000000', 5028, 5021, 'apoogee18', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$8uzXlfb.rIN/0NXdn3YK3umuKbL42rPZF2TQoAtGGbjrr4ni0d..K', NULL, 1, 'f0Wm2iQ09i4R7lzYriaQkMp7SYLJkuacSwj6acMdgPZTOeNMVfEJsxFisMSp', '2020-10-10 19:48:54', '2020-10-10 19:48:54'),
(5043, 'appogee24', 'apoogee42', 'tatusar1993@gmail.com', '01700000000', 5028, 5022, 'apoogee19', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$qHS6cwKp1.Q5ocqr3gtMR.pAueuUXugjYhToLELnM3p9p7P4dGoZy', NULL, 1, 'bPUBNtAG6QQig4Dx0idcogT6FqxycXUIJvJ2Pt87hCBt0vWge8XYdjw0hp1S', '2020-10-10 19:50:22', '2020-10-10 19:50:23'),
(5044, 'appogee24', 'apoogee43', 'tatusar1993@gmail.com', '01700000000', 5029, 5022, 'apoogee19', 1, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$ay864CO/0JK57J7a0i4kNuCDTnj8QOkeOptg.rZOMi.4gR0C4xDvG', NULL, 1, 'Nr3d4x8S5a09unNqTSPlsoKHHsIQb86xx5Zd11vH5xLihheVinMzzItV0Cz6', '2020-10-10 19:51:41', '2020-10-10 19:51:41'),
(5045, 'appogee24', 'apoogee44', 'tatusar1993@gmail.com', '01700000000', 5029, 5023, 'apoogee20', 2, 0, 0, NULL, NULL, NULL, 1, 1, b'0', '$2y$10$5x2ehTlCN6gKB6TSlTDGK.fWRoRwzMqh8J3Nh3yJqEAX5WKMMpXU2', NULL, 1, '93pXcBNiqlqCv5DzsggWJT07VKR5RFyaFpGFZgzPUU5DLtjAd1aWWXDaedvr', '2020-10-10 19:52:49', '2020-10-10 16:19:03'),
(5046, 'Test', 'test', 'shahadat@asiancoder.com', '01757839516', 5000, 5023, 'apoogee20', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$ULDqeUjKeWsd3rRlpGo9hODpufFbvwlPi9PqF4bQn7o1fxi0um2He', NULL, 1, '93AHwjw26zGZu1uBbH0IDKSY3kGIeLtjAG3R2cb8vndT2s518WaMA5aDxeNo', '2020-10-30 04:08:40', '2020-10-30 04:08:40'),
(5047, 'Test2', 'test2', 'shahadat@asiancoder.com', '01757839516', 5000, 5024, 'apoogee21', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$e/wzqjuKgsL4QBWAsrwdyOJfDsVTGe8EQF3x/scCk0DU8NyGl1rLm', NULL, 1, NULL, '2020-10-30 04:39:49', '2020-10-30 04:39:49'),
(5048, 'Test', 'test3', 'shahadat@asiancoder.com', '01757839516', 5000, 5024, 'apoogee21', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$acGkhbQdjlfCFTkBN48NCOyq6kgofZWpYGS2Q3ta5E8owBaUBxKwG', NULL, 1, NULL, '2020-10-30 04:44:47', '2020-10-30 04:44:47'),
(5049, 'Test', 'test8', 'shahadat@asiancoder.com', '01757839516', 5000, 5025, 'apoogee22', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$ar/N1rTBybAGb.aJp5wlT.DHDPSthv1RgKVbOBwar5Nt2Mz3jCzxi', NULL, 1, NULL, '2020-10-30 10:59:21', '2020-10-30 10:59:21'),
(5050, 'Test', 'test9', 'shahadat@asiancoder.com', '01757839516', 5000, 5001, 'apoogee1', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$pqMzNlWHwoIRudgqZ5IqyuNaBTjPK4HwdbG29iLMT0GWvQUz/O/VS', NULL, 1, NULL, '2020-10-30 11:02:37', '2020-10-30 11:02:37'),
(5051, 'Test', 'test11', 'shahadat@asiancoder.com', '01757839516', 5000, 5004, NULL, 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$IsMgpXGh80aXw0bCfSwrT.Hj1pLmg9poCHjHqsL3HVtqUEiFqAI8y', NULL, 1, NULL, '2020-10-30 11:48:27', '2020-10-30 11:48:27'),
(5052, 'Test', 'test12', 'shahadat@asiancoder.com', '01757839516', 5000, 5001, 'apoogee1', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$WgrHrS5cqxrj8EnAPUMxeeZULpyEnRnggPCZx5RgubDUmLYCepLPW', NULL, 1, NULL, '2020-10-30 11:51:10', '2020-10-30 11:51:10'),
(5053, 'Azmira', 'test66', 'shahadat@asiancoder.com', '01757839516', 5000, 5051, 'test11', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$6.iOVbcx7QdK2ZlPbHZ3bewfI1Ze6VCMrq99x1VJlzqhAMxbDIZ5e', NULL, 1, NULL, '2020-11-02 02:16:23', '2020-11-02 02:16:23'),
(5054, 'Azmira', 'test78', 'shahadat@asiancoder.com', '01757839516', 5000, 5051, 'test11', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5055, 'Azmira', 'test788', 'shahadat@asiancoder.com', '01757839516', 5000, 5050, 'test9', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5056, 'Azmira', 'test788e', 'shahadat@asiancoder.com', '01757839516', 5000, 5050, 'test9', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5057, 'Azmira', 'test788w', 'shahadat@asiancoder.com', '01757839516', 5000, 5052, 'test12', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5058, 'Azmira', 'test788ew', 'shahadat@asiancoder.com', '01757839516', 5000, 5052, 'test12', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5059, 'Azmira', 'test788wq', 'shahadat@asiancoder.com', '01757839516', 5000, 5057, 'test788w', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5060, 'Azmira', 'test788ewq', 'shahadat@asiancoder.com', '01757839516', 5000, 5057, 'test788w', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5061, 'Azmira', 'test788wqa', 'shahadat@asiancoder.com', '01757839516', 5000, 5058, 'test788ew', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5062, 'Azmira', 'test788ewqa', 'shahadat@asiancoder.com', '01757839516', 5000, 5058, 'test788ew', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5063, 'Azmira', 'test788wqaq', 'shahadat@asiancoder.com', '01757839516', 5000, 5055, 'test788', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5064, 'Azmira', 'test788ewqad', 'shahadat@asiancoder.com', '01757839516', 5000, 5055, 'test788', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5065, 'Azmira', 'test788wqaqn', 'shahadat@asiancoder.com', '01757839516', 5000, 5056, 'test788e', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, NULL, '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5066, 'Azmira', 'test788ewqadm', 'shahadat@asiancoder.com', '01757839516', 5000, 5056, 'test788e', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$JUo7F8MMz2sfSWYRD9Q1Qu3D9R04Yy4Z2l0tMhT3oXwHjSYTDzEU2', NULL, 1, 'p9qBARiUuutSZZWiVsuyg88QieLDZ51ayJ7F3YklpU0DfSaqjJwGpzOT0SlH', '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(5067, 'Shahadat Hosain', 'test112', 'azmiranu@gmail.com', '01757839516', 5000, 5066, 'test788ewqadm', 1, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$7tXAloTLjOQ3ZWfmRifNzujMeZHqiaHv4f9zC5JG26RrFRIRnq9mu', NULL, 1, NULL, '2020-11-06 09:37:22', '2020-11-06 09:37:22'),
(5068, 'Shahadat Hosain', 'test7852', 'shahadat@asiancoder.com', '01757839516', 5000, 5066, 'test788ewqadm', 2, 0, 0, NULL, NULL, NULL, 1, 0, b'0', '$2y$10$6EMF/G/IJfirtcOkQIlMJOjgQY0ytD4OTJtOkBlwPwy6Xz3U112pG', NULL, 1, NULL, '2020-11-14 13:55:23', '2020-11-14 13:55:23'),
(5069, 'Azmira', 'test87', 'shahadat@asiancoder.com', '01757839516', 5000, 5067, 'test112', 1, 0, 0, NULL, NULL, NULL, 2, 0, b'0', '$2y$10$XXdimbclaL.mGFo1hz1JqOOQoK9YtN6B8VPCUTPiTays4z3t02SDm', NULL, 1, NULL, '2020-11-14 14:10:12', '2020-11-14 14:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_pins`
--

CREATE TABLE `user_pins` (
  `id` int(10) UNSIGNED NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` smallint(5) UNSIGNED DEFAULT NULL,
  `user_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `receipt` decimal(8,3) DEFAULT NULL,
  `payment` decimal(8,2) DEFAULT NULL,
  `wType` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adminWid` smallint(5) UNSIGNED DEFAULT NULL,
  `transfar` tinyint(1) UNSIGNED DEFAULT NULL,
  `receive` tinyint(1) UNSIGNED DEFAULT NULL,
  `remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `receipt`, `payment`, `wType`, `adminWid`, `transfar`, `receive`, `remark`, `created_at`, `updated_at`) VALUES
(1, 5000, '5000.000', NULL, 'registerWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-10-29 17:46:46', '2020-10-29 17:46:46'),
(2, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #1', '2020-10-30 04:08:40', '2020-10-30 04:08:40'),
(3, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 04:08:40', '2020-10-30 04:08:40'),
(4, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #2', '2020-10-30 04:39:48', '2020-10-30 04:39:48'),
(5, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 04:39:48', '2020-10-30 04:39:48'),
(6, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #3', '2020-10-30 04:44:47', '2020-10-30 04:44:47'),
(7, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 04:44:47', '2020-10-30 04:44:47'),
(8, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #4', '2020-10-30 10:59:21', '2020-10-30 10:59:21'),
(9, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 10:59:21', '2020-10-30 10:59:21'),
(10, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #5', '2020-10-30 11:02:36', '2020-10-30 11:02:36'),
(11, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 11:02:37', '2020-10-30 11:02:37'),
(12, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #6', '2020-10-30 11:48:27', '2020-10-30 11:48:27'),
(13, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 11:48:27', '2020-10-30 11:48:27'),
(14, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #7', '2020-10-30 11:51:10', '2020-10-30 11:51:10'),
(15, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-10-30 11:51:10', '2020-10-30 11:51:10'),
(16, 5046, '500.000', NULL, 'shoppingWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-10-30 15:43:29', '2020-10-30 15:43:29'),
(17, 5046, '500.000', NULL, 'registerWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-10-30 15:45:25', '2020-10-30 15:45:25'),
(18, 5046, NULL, '10.00', 'shoppingWallet', NULL, NULL, NULL, 'Sent to ID# 5001', '2020-10-30 15:48:25', '2020-10-30 15:48:25'),
(19, 5001, '10.000', NULL, 'shoppingWallet', NULL, NULL, NULL, 'Receipt Form ID# 5046(Test)', '2020-10-30 15:48:25', '2020-10-30 15:48:25'),
(20, 5046, NULL, '10.00', 'registerWallet', NULL, NULL, NULL, 'Sent to ID# 5001', '2020-10-30 15:50:02', '2020-10-30 15:50:02'),
(21, 5001, '10.000', NULL, 'registerWallet', NULL, NULL, NULL, 'Receipt Form ID# 5046(Test)', '2020-10-30 15:50:02', '2020-10-30 15:50:02'),
(22, 5046, '500.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-10-30 15:45:25', '2020-10-30 15:45:25'),
(23, 5046, NULL, '10.00', 'refferWallet', NULL, NULL, NULL, NULL, '2020-10-30 16:11:23', '2020-10-30 16:11:23'),
(24, 5046, NULL, '10.00', 'refferWallet', NULL, NULL, NULL, NULL, '2020-10-30 16:12:11', '2020-10-30 16:12:11'),
(25, 5046, NULL, '10.00', 'refferWallet', NULL, NULL, NULL, NULL, '2020-10-30 16:12:35', '2020-10-30 16:12:35'),
(26, 5046, '10.000', NULL, 'withdrawWallet', NULL, NULL, NULL, 'Withdraw - ', '2020-10-30 16:12:35', '2020-10-30 16:12:35'),
(27, 5046, NULL, '10.00', 'withdrawWallet', NULL, NULL, NULL, 'Withdraw - test', '2020-10-30 16:13:24', '2020-10-30 16:13:24'),
(28, 5000, NULL, '10.00', 'refferWallet', NULL, NULL, NULL, 'test', '2020-10-31 17:43:08', '2020-10-31 17:43:08'),
(29, 5000, '10.000', NULL, 'withdrawWallet', NULL, NULL, NULL, 'Withdraw - test', '2020-10-31 17:43:08', '2020-10-31 17:43:08'),
(30, 5000, NULL, '10.00', 'withdrawWallet', NULL, NULL, NULL, 'Withdraw - test', '2020-10-31 17:46:46', '2020-10-31 17:46:46'),
(31, 5000, NULL, '10.00', 'refferWallet', NULL, NULL, NULL, 'test', '2020-10-31 17:48:07', '2020-10-31 17:48:07'),
(32, 5000, '10.000', NULL, 'withdrawWallet', NULL, NULL, NULL, 'Withdraw - test', '2020-10-31 17:48:07', '2020-10-31 17:48:07'),
(33, 5000, NULL, '10.00', 'withdrawWallet', NULL, NULL, NULL, 'Withdraw-1 : 01912624881 - test', '2020-10-31 17:48:21', '2020-10-31 17:48:21'),
(34, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #8', '2020-11-02 02:16:23', '2020-11-02 02:16:23'),
(35, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-11-02 02:16:23', '2020-11-02 02:16:23'),
(36, 5000, NULL, '200.00', 'registerWallet', NULL, NULL, NULL, 'Buy Product #9', '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(37, 5000, '20.000', NULL, 'refferWallet', NULL, NULL, NULL, 'Buy Product', '2020-11-02 02:17:24', '2020-11-02 02:17:24'),
(38, 5000, '500.000', NULL, 'rankWallet', NULL, NULL, NULL, 'Rank Bonus #1', '2020-11-04 15:13:30', '2020-11-04 15:13:30'),
(39, 5000, '1500.000', NULL, 'rankWallet', NULL, NULL, NULL, 'Rank Bonus #2', '2020-11-04 15:15:29', '2020-11-04 15:15:29'),
(40, 5000, '500.000', NULL, 'rankWallet', NULL, NULL, NULL, 'Rank Bonus #1', '2020-11-04 17:02:48', '2020-11-04 17:02:48'),
(41, 5000, NULL, '20.00', 'registerWallet', NULL, NULL, NULL, 'New Member #5067', '2020-11-06 09:37:22', '2020-11-06 09:37:22'),
(42, 5000, '2.000', NULL, 'refferWallet', NULL, NULL, NULL, 'New Member #5067', '2020-11-06 09:37:22', '2020-11-06 09:37:22'),
(43, 5000, '10.000', NULL, 'withdrawWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-11-06 16:51:14', '2020-11-06 16:51:14'),
(44, 5000, '10.000', NULL, 'registerWallet', NULL, NULL, NULL, 'Receipt Form Admin', '2020-11-06 16:54:02', '2020-11-06 16:54:02'),
(45, 5000, NULL, '9.00', 'withdrawWallet', 10, NULL, NULL, 'Withdraw-bKash : 01912624881 - test', '2020-11-07 16:53:37', '2020-11-07 16:53:37'),
(48, 5056, '0.100', NULL, 'selfWallet', NULL, NULL, NULL, NULL, '2020-11-07 19:01:17', '2020-11-07 19:01:17'),
(49, 5050, '0.100', NULL, 'selfWallet', NULL, NULL, NULL, NULL, '2020-11-07 19:01:17', '2020-11-07 19:01:17'),
(50, 5001, '0.080', NULL, 'selfWallet', NULL, NULL, NULL, NULL, '2020-11-07 19:01:17', '2020-11-07 19:01:17'),
(51, 5000, '0.060', NULL, 'selfWallet', NULL, NULL, NULL, NULL, '2020-11-07 19:01:17', '2020-11-07 19:01:17'),
(52, 5000, NULL, '12.50', 'registerWallet', NULL, NULL, NULL, 'New Member #5068', '2020-11-14 13:55:23', '2020-11-14 13:55:23'),
(53, 5000, '1.250', NULL, 'sponsorWallet', NULL, NULL, NULL, 'New Member #5068', '2020-11-14 13:55:23', '2020-11-14 13:55:23'),
(54, 5000, NULL, '25.00', 'registerWallet', NULL, NULL, NULL, 'New Member #test87', '2020-11-14 14:10:12', '2020-11-14 14:10:12'),
(55, 5000, '2.500', NULL, 'sponsorWallet', NULL, NULL, NULL, 'New Member #test87', '2020-11-14 14:10:12', '2020-11-14 14:10:12'),
(56, 5069, '25.000', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36'),
(57, 5067, '7.500', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36'),
(58, 5066, '5.000', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36'),
(59, 5056, '2.500', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36'),
(60, 5050, '2.500', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36'),
(61, 5067, '2.500', NULL, 'worksWallet', NULL, NULL, NULL, 'Youtube Bonus #5069', '2020-11-14 16:12:36', '2020-11-14 16:12:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bett_balances`
--
ALTER TABLE `bett_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bett_games`
--
ALTER TABLE `bett_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bett_game_ans`
--
ALTER TABLE `bett_game_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earn_wallets`
--
ALTER TABLE `earn_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packegs`
--
ALTER TABLE `packegs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_cats`
--
ALTER TABLE `pro_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptcs`
--
ALTER TABLE `ptcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptc_click`
--
ALTER TABLE `ptc_click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_pins`
--
ALTER TABLE `user_pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bett_balances`
--
ALTER TABLE `bett_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bett_games`
--
ALTER TABLE `bett_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bett_game_ans`
--
ALTER TABLE `bett_game_ans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earn_wallets`
--
ALTER TABLE `earn_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packegs`
--
ALTER TABLE `packegs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pro_cats`
--
ALTER TABLE `pro_cats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ptcs`
--
ALTER TABLE `ptcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ptc_click`
--
ALTER TABLE `ptc_click`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5070;

--
-- AUTO_INCREMENT for table `user_pins`
--
ALTER TABLE `user_pins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
