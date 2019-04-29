-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2019 at 09:11 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`),
  KEY `brands_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(8, 'Apple Iphone', 'apple-iphone', 11, '2019-04-28 04:09:37', '2019-04-28 04:09:37'),
(9, 'OPPO', 'oppo', 11, '2019-04-28 04:10:13', '2019-04-28 04:10:13'),
(10, 'Apple Macbook', 'apple-macbook', 12, '2019-04-28 04:10:43', '2019-04-28 04:10:43'),
(11, 'Dell', 'dell', 12, '2019-04-28 04:10:52', '2019-04-28 04:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(11, 'Điện thoại', 'dien-thoai', '2019-04-28 04:09:00', '2019-04-28 04:09:00'),
(12, 'Laptop', 'laptop', '2019-04-28 04:09:06', '2019-04-28 04:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_25_060030_create_categories_table', 1),
(4, '2019_04_25_060139_create_brands_table', 1),
(5, '2019_04_25_060217_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `sale` double(8,2) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `brand_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_brand_id_foreign` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `sale`, `desc`, `avatar`, `active`, `brand_id`, `created_at`, `updated_at`) VALUES
(9, 'iPhone Xs Max 512GB', 'iphone-xs-max-512gb', 39990000, 0.05, 'Là chiếc smartphone cao cấp nhất của Apple với mức giá khủng chưa từng có, bộ nhớ trong lên tới 512GB, iPhone XS Max 512GB - sở hữu cái tên khác biệt so với các thế hệ trước, trang bị tới 6.5 inch đầu tiên của hãng cùng các thiết kế cao cấp hiện đại từ chip A12 cho tới camera AI.', 'uploads/products/1556457978iphone-xs-max-512gb-gold-600x600.jpg', 1, 8, '2019-04-28 06:26:18', '2019-04-28 06:26:18'),
(10, 'iPhone Xs Gold 64GB', 'iphone-xs-gold-64gb', 26990000, 0.00, 'Đến hẹn lại lên, năm nay Apple giới thiệu tới người dùng thế hệ tiếp theo với 3 phiên bản, trong đó có cái tên iPhone Xs với những nâng cấp mạnh mẽ về phần cứng đến hiệu năng, màn hình cùng hàng loạt các trang bị cao cấp khác.', 'uploads/products/1556466554iphone-xs-gold-600x600.jpg', 1, 8, '2019-04-28 08:49:14', '2019-04-28 08:49:14'),
(11, 'OPPO A3s 16GB', 'oppo-a3s-16gb', 2990000, 0.00, 'OPPO A3s (1853) là phiên bản được thay đổi một chút trong thiết kế nhưng vẫn sở hữu các tính năng hấp dẫn với một mức giá rẻ dễ chịu.', 'uploads/products/1556466666oppo-a3s-16gb-1853-600x600.jpg', 1, 9, '2019-04-28 08:51:06', '2019-04-28 08:51:06'),
(12, 'OPPO F7', 'oppo-f7', 4990000, 0.10, 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục tung ra OPPO F7 với điểm nhấn vẫn là camera selfie và thiết kế \"tai thỏ độc đáo\".', 'uploads/products/1556466772oppo-f7-red-mtp-600x600.jpg', 1, 9, '2019-04-28 08:52:52', '2019-04-28 08:52:52'),
(13, 'Apple Macbook Air 2017 i5 1.8GHz/8GB/128GB', 'apple-macbook-air-2017-i5-18ghz8gb128gb', 22490000, 0.05, 'Macbook Air MQD32SA/A i5 5350U với thiết kế vỏ nhôm nguyên khối Unibody rất đẹp, chắc chắn và sang trọng. Macbook Air là một chiếc máy tính xách tay siêu mỏng nhẹ, hiệu năng ổn định mượt mà, thời lượng pin cực lâu, phục vụ tốt cho nhu cầu làm việc lẫn giải trí.', 'uploads/products/1556466886apple-macbook-air-mqd32sa-a-i5-5350u-400-1-450x300-600x600.jpg', 1, 10, '2019-04-28 08:54:46', '2019-04-28 08:54:46'),
(14, 'Apple Macbook Air 2018 i5/8GB/128GB', 'apple-macbook-air-2018-i58gb128gb', 31990000, 0.00, 'Sở hữu thiết kế đơn giản và sang trọng bậc nhất thế giới, Laptop Apple Macbook Air 128 GB hoàn toàn phù hợp với những ai yêu thích sự vẻ đẹp tinh tế, hiện đại. Bên cạnh đó, máy trang bị ổ cứng SSD có thể khởi chạy các ứng dụng cực nhanh, RAM 8 GB xử lý đa nhiệm hiệu quả cùng thời lượng pin siêu ấn tượng lên đến 12 giờ.', 'uploads/products/1556466973apple-macbook-air-mre82sa-a-i5-8gb-128gb-2018-2-600x600.jpg', 1, 10, '2019-04-28 08:56:13', '2019-04-28 08:56:13'),
(15, 'Dell Inspiron 7373 i5 8250U/8GB/256GB', 'dell-inspiron-7373-i5-8250u8gb256gb', 26990000, 0.00, 'Dell Inspiron 7373 i5 8250U là mẫu laptop có thiết kế mỏng nhẹ và sang trọng với chất liệu nhôm nguyên khối thuộc phân khúc laptop phù hợp với doanh nhân, máy được trang bị cấu hình khá mạnh cho các nhu cầu làm việc, giải trí.', 'uploads/products/1556467073dell-inspiron-7373-i5-8250u-8gb-256gb-win10-office-450-600x600.jpg', 1, 11, '2019-04-28 08:57:53', '2019-04-28 08:57:53'),
(16, 'Dell 410', 'dell-410', 11690000, 0.00, 'Dell Vostro 3468 i3 7020U là chiếc laptop được trang bị chip Intel Core i3 cùng hệ điều hành Windows 10 cho hiệu năng ổn định. Máy phù hợp với học sinh, sinh viên, các nhân viên văn phòng với nhu cầu cơ bản như học tập hay làm việc.', 'uploads/products/1556467210dell-vostro-3468-i3-7020u-70161069-ava-600x600.jpg', 0, 11, '2019-04-28 09:00:10', '2019-04-28 09:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Gia Hào', 'nguyente9899@gmail.com', '2019-04-26 20:57:10', '$2y$10$sLBQefEBd8oxWIS9rMISveEzjI7Scx4B9shqhElf1OqJ2RNzBW2o6', 'QdQGwWUGHq', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
