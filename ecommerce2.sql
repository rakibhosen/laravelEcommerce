-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 06:07 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(4, 'rakib', 'rakib@gmail.com', '96e79218965eb72c92a549dd5a330112', '0109993333', NULL, NULL, 'Super Admin', '2019-09-08 12:25:05', '2019-09-08 12:25:05'),
(5, 'rakib hosen', 'rakibhosen832@gmail.com', '$2y$10$p8XDt17vi5QXQUPWDdS1PenouyJxjvspXh6IKwGxlxXPageOoAAqO', '9389848', NULL, NULL, 'Super Admin', '2019-09-08 12:27:59', '2019-09-08 12:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'nova', 'fghfy', '1563307300.jpg', '2019-07-16 14:01:40', '2019-07-16 14:01:40'),
(4, 'samsung', 'test', '1563363314.jpg', '2019-07-17 05:35:14', '2019-07-17 05:35:14'),
(5, 'west end', 'test', '1563363340.jpg', '2019-07-17 05:35:40', '2019-07-17 05:35:40'),
(6, 'Gucci', 'test', '1563363409.jpg', '2019-07-17 05:36:49', '2019-07-17 05:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(10, NULL, 15, 4, '127.0.0.1', 3, '2019-09-10 09:53:30', '2019-09-14 10:42:04'),
(11, NULL, 14, 4, '127.0.0.1', 1, '2019-09-14 10:41:39', '2019-09-14 10:42:04'),
(12, NULL, 13, 4, '127.0.0.1', 1, '2019-09-14 10:41:41', '2019-09-14 10:42:04'),
(13, NULL, 15, 5, '127.0.0.1', 2, '2019-09-14 12:04:39', '2019-09-14 12:05:19'),
(14, NULL, 14, 5, '127.0.0.1', 1, '2019-09-14 12:04:41', '2019-09-14 12:05:19'),
(15, NULL, 13, 5, '127.0.0.1', 1, '2019-09-14 12:04:43', '2019-09-14 12:05:19'),
(20, 9, 15, 12, '127.0.0.1', 1, '2019-09-14 12:21:08', '2019-09-21 10:30:28'),
(21, 9, 14, 12, '127.0.0.1', 1, '2019-09-14 12:21:12', '2019-09-21 10:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'test', NULL, '1563255368.jpg', '2019-07-15 07:52:14', '2019-07-17 05:32:48'),
(2, 'camera', 'testwatch', NULL, '1563302530.png', '2019-07-16 01:04:51', '2019-07-17 05:32:34'),
(3, 'Watch', 'test', NULL, '1563363200.jpg', '2019-07-17 05:33:20', '2019-07-17 05:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Patuakhali', 1, '2019-08-09 04:53:33', '2019-08-09 04:53:33'),
(2, 'Patuakhali', 1, '2019-08-09 04:53:36', '2019-08-09 04:53:36'),
(3, 'jhalokhati', 4, '2019-08-10 21:34:38', '2019-08-10 21:34:38'),
(4, 'mirzagangj', 4, '2019-08-10 21:51:10', '2019-08-10 21:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', 2, '2019-08-09 04:52:31', '2019-08-09 04:52:31'),
(3, 'sylhet', 4, '2019-08-10 20:19:35', '2019-08-10 20:19:46'),
(4, 'Barisal', 4, '2019-08-10 21:34:09', '2019-08-10 21:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_12_114427_create_products_table', 1),
(5, '2019_07_12_115014_create_brands_table', 1),
(6, '2019_07_12_115650_create_product_imgs_table', 1),
(8, '2019_07_12_114858_create_categories_table', 2),
(11, '2019_08_09_035114_create_divisions_table', 4),
(12, '2019_08_09_035235_create_districts_table', 4),
(15, '2019_09_01_103926_create_sliders_table', 5),
(17, '2019_07_12_115818_create_admins_table', 7),
(18, '2014_10_12_000000_create_users_table', 8),
(20, '2019_09_10_061651_create_orders_table', 9),
(21, '2019_09_10_065942_create_payments_table', 9),
(22, '2019_09_10_061241_create_carts_table', 10),
(23, '2019_09_11_173958_create_settings_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_seen_by_admin`, `is_completed`, `transaction_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, '127.0.0.1', 'rakib', '01761518709', 'sfsfs', 'rakibhosen832@gmail.com', 'fssfsfsd', 0, 1, 0, NULL, 1, '2019-09-12 22:23:35', '2019-09-14 10:23:47'),
(2, NULL, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'sadfsafsadf', 'rakibhosen8@gmail.com', 'sadfsadfsa', 0, 1, 0, NULL, 1, '2019-09-13 11:43:55', '2019-09-14 11:06:00'),
(3, NULL, 3, '127.0.0.1', 'rakib', '01761518709', 'fsfsadfsfsfs', 'rakibhosen832@gmail.com', 'sdfsadfasfs', 0, 0, 0, NULL, 1, '2019-09-14 10:16:20', '2019-09-14 10:16:20'),
(4, NULL, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'sdfsdfs', 'rakib@gmail.com', 'sdfsfsdf', 0, 0, 0, NULL, 1, '2019-09-14 10:42:04', '2019-09-14 10:42:04'),
(7, 9, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'sdfsaf', 'rakibhosen@gmail.com', 'ssdfsdf', 0, 0, 0, NULL, 1, '2019-09-14 12:13:20', '2019-09-14 12:13:20'),
(8, 9, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'fsdfsdf', 'rakibhosen@gmail.com', 'ssdfsad', 0, 0, 0, NULL, 1, '2019-09-14 12:16:01', '2019-09-14 12:16:01'),
(9, 9, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'fsdfsdafsa', 'rakibhosen@gmail.com', 'sdfsdfsfs', 0, 0, 0, NULL, 1, '2019-09-14 12:16:45', '2019-09-14 12:16:45'),
(10, 9, 3, '127.0.0.1', 'Rakib Hosen', '01761518709', 'sdfsadfsad', 'rakibhosen@gmail.com', 'sdfsdf', 0, 0, 0, NULL, 1, '2019-09-14 12:19:13', '2019-09-14 12:19:13'),
(11, NULL, 2, '127.0.0.1', 'rakib', '01761518709', 'sadfsfsda', 'rakibhosen832@gmail.com', 'sadfsdafsadfsa', 0, 0, 0, '323253535353', 1, '2019-09-21 10:26:15', '2019-09-21 10:26:15'),
(12, 9, 2, '127.0.0.1', 'Rakib Hosen', '01761518709', 'dhaka', 'rakibhosen@gmail.com', 'some message', 0, 0, 0, '3535353', 1, '2019-09-21 10:30:28', '2019-09-21 10:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rakibhosen832@gmail.com', '$2y$10$/rrvb3SP/fu.VrQTwfUheOntI4xPGNMOjvM.7xVYtPK9hcmtfkWTq', '2019-09-11 20:38:45'),
('testinfo832@gmail.com', '$2y$10$G9ppbvdxDW9zn5k06fTMNelJ//6VIvaRe7qLzpiTQQKCeUfosPwFa', '2019-09-11 21:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'bkash', NULL, 3, 'bkash', '017616944', 'agent', '2019-09-11 18:06:11', '2019-09-11 18:06:11'),
(2, 'datch bangla', NULL, 2, 'rocket', '01761518709', 'agent', '2019-09-11 18:21:27', '2019-09-11 18:21:27'),
(3, 'cash in', NULL, 1, 'cash_in', NULL, NULL, '2019-09-11 18:22:04', '2019-09-11 18:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `brand_id`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(12, 'nova 3', 2, 1, 'ssfsdf', 'nova-3', '2', 2222, 0, NULL, 1, '2019-07-16 13:08:18', '2019-07-16 13:26:56'),
(13, 'redmi', 1, 4, 'twe', 'redmi', '1', 2000, 0, NULL, 1, '2019-07-17 05:08:24', '2019-07-17 05:40:21'),
(14, 'automated watch', 1, 6, 'some', 'automated-watch', '7', 6666, 0, NULL, 1, '2019-07-17 05:11:05', '2019-08-01 00:39:23'),
(15, 'new product', 1, 4, 'some text will be here', 'new-product', '4', 23455, 0, NULL, 1, '2019-08-01 00:24:48', '2019-08-01 00:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(21, 12, '1563304098.jpg', '2019-07-16 13:08:18', '2019-07-16 13:08:18'),
(22, 13, '1563361704.jpg', '2019-07-17 05:08:24', '2019-07-17 05:08:24'),
(23, 14, '1563361865.jpg', '2019-07-17 05:11:05', '2019-07-17 05:11:05'),
(24, 15, '1564640688.jpg', '2019-08-01 00:24:48', '2019-08-01 00:24:48'),
(25, 14, '1564641563.jpg', '2019-08-01 00:39:23', '2019-08-01 00:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'Rakibhosen@gmail.com', '35335322', 'sdfsfsfs', 100, '2019-09-11 18:19:37', '2019-09-11 18:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `priority`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(4, 'test', '1567363817.jpg', 2, 'test button', 'sadfsafsa', '2019-09-01 12:50:17', '2019-09-01 12:50:17'),
(5, 'test purpose', '1567366367.jpg', 1, 'test button', 'some informantion', '2019-09-01 13:32:47', '2019-09-01 13:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `division_id`, `district_id`, `password`, `address`, `ip_address`, `phone_no`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Rakib Hosen', 'rakibhosen@gmail.com', 4, 3, '$2y$10$Pm3MiszZSkWd36zTnYodR.U0ekkKxt8x6gAE9RdI5e42vQduUPVTG', 'mohakhali', NULL, '01761518709', 'iyx5WwMQcHVCTc37uPRjc4lm2exBjAWasBFBYvXIXFhh0osPK1p0pkCHsLbB', '2019-09-12 22:26:33', '2019-09-12 22:26:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
