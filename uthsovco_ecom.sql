-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2019 at 09:36 PM
-- Server version: 10.3.16-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uthsovco_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(2, 'সৃষ্টির লক্ষ্য', '<p><span style=\"font-family: sans-serif; font-size: large;\">ভবিষ্যৎ প্রজন্মের জন্য নিরাপদ খাদ্যের ব্যবস্থা করার উদ্দেশ্যে, দীর্ঘদিনের উদ্বিগ্নতার&nbsp; ফলস্বরূপ- উৎসব ডট কমের উদ্যোগ। আমরা সেই লক্ষ্যে দেশের বিভিন্ন অঞ্চলের মূল উৎপাদকের কাছ থেকে নিজ তত্ত্বাবধানে&nbsp; নিরাপদ খাদ্যদ্রব্য সংগ্রহ করে আপনাদের কাছে পৌঁছে দেয়ার উদ্দেশ্যে কাজ করে যাচ্ছি। অনিরাপদ খাদ্য ঝুঁকির পাশাপাশি আমাদের দেশ বিভিন্ন দেশী-বিদেশী কোম্পানির&nbsp; নকল পণ্যে সয়লাব। যেসব&nbsp; নকল পন্য ব্যবহারে মানুষ কেবল প্রতারিতই হচ্ছে না, নানারকম দীর্ঘস্থায়ী স্বাস্থ্য ঝুঁকিরও সম্মুখীন হচ্ছে। তাই আমরা এই মর্মে বদ্ধপরিকর হয়েছি যে, আমাদের উৎসব ডট কম মানুষের হাতে সবসময় কোম্পানির সঠিক পণ্যটি পৌঁছে দিবে। পণ্যের মানের ব্যাপারে আমরা শতভাগ নিশ্চয়তা দিয়ে থাকি। সেজন্য আমাদের কাছ থেকে পণ্য ক্রয় করলে প্রতারিত হবার কোন ঝুঁকি নেই। দিনে দিনে মানুষ নগরের কর্মব্যস্ততার জালে এমনভাবে জড়িয়ে যাচ্ছে যে, সঠিক পণ্যটি যাচাই-বাছাই করে কেনা সম্ভব হয়ে ওঠে না। তাই নিত্যদিনের প্রয়োজনীয় সঠিক দ্রব্যাদি যদি তারা দোরগোড়ায় পায়, সেটি তাদের জন্য অনেক প্রশান্তির।আর সেই সেবা প্রদানের লক্ষ্যে&nbsp; আমরা আমাদের পণ্য পৌঁছে দেই আপনাদের দরজায়। আপনাদের কষ্টের টাকায় নিরাপদ, প্রাকৃতিক ও সঠিক খাদ্য এবং অনান্য পণ্যসামগ্রী পৌঁছে দিয়ে জীবনকে আরও সুস্থ্য, সুন্দর ও সহজ করে দিতে আমরা সবসময় আপনাদের সাথেই আছি। থাকব ইনশাআল্লাহ্।।</span></p>', 'uploads/blog/-1563343899--1558444246-Ratargul_Swamp_Forest,_Sylhet..jpg', '2019-05-21 12:26:04', '2019-07-17 11:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `origin`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Italy', '2019-04-27 16:27:46', '2019-04-27 16:27:46'),
(2, 'N/A', 'Chapai', '2019-05-28 20:06:44', '2019-05-28 20:06:44'),
(3, 'gsk', 'India', '2019-07-17 11:49:55', '2019-07-17 11:49:55'),
(4, 'Summer Naturale', 'Malaysia', '2019-07-17 12:52:49', '2019-07-17 12:52:49'),
(5, 'Follow Me', 'Malaysia', '2019-07-17 12:54:07', '2019-07-17 12:54:07'),
(6, 'Fruiser', 'Malaysia', '2019-07-17 12:55:13', '2019-07-17 12:55:13'),
(7, 'Man Engage On', 'India', '2019-07-17 14:39:29', '2019-07-17 14:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `child_status` int(10) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `child_status`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Fruits', 'uploads/category/-1562925354-Fruits3.jpg', 15, 1, 1, '2019-05-28 19:20:57', '2019-05-28 19:21:19'),
(6, 'Fish', 'uploads/category/-1563552526-Rui+Fish.jpg', 15, 1, 1, '2019-05-28 19:21:04', '2019-07-19 21:08:46'),
(7, 'Beauty Products', 'uploads/category/-1562925289-c_cosmetics_lg.jpg', 15, 1, 1, '2019-05-28 19:21:41', '2019-07-20 12:43:15'),
(8, 'Office Accessories', 'uploads/category/-1562925298-office-accessories-o.jpg', 15, 1, 1, '2019-05-28 19:21:56', '2019-07-17 22:20:21'),
(9, 'Electronic Devices', 'uploads/category/-1562925306-electronics.jpg', 15, 1, 0, '2019-05-28 19:22:47', '2019-07-17 22:19:44'),
(10, 'Meat', 'uploads/category/-1562925312-Meats.jpg', 15, 1, 1, '2019-05-28 19:22:55', '2019-07-17 22:19:04'),
(11, 'Fashion & Home Appliances', 'uploads/category/-1562925319-fashon.jpg', 15, 1, 0, '2019-05-28 19:23:25', '2019-07-17 22:15:58'),
(12, 'Sweets', 'uploads/category/-1562925327-sweets.jpg', 15, 1, 1, '2019-05-28 19:23:33', '2019-05-28 19:23:33'),
(13, 'Grocery', 'uploads/category/-1562925340-grocery-items.png', 15, 1, 1, '2019-05-28 19:23:51', '2019-05-28 19:23:51'),
(14, 'Health Care', 'uploads/category/-1562925348-medicine.jpg', 15, 1, 1, '2019-05-28 19:24:02', '2019-07-17 12:28:58'),
(15, 'Category List', NULL, 0, 0, 1, '2019-05-28 20:12:35', '2019-05-28 20:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000;', '2019-04-27 16:51:02', '2019-04-27 16:51:02'),
(2, 'White', '#ffffff', '2019-05-18 08:57:50', '2019-05-18 08:57:50'),
(3, 'Red', '#ff003d', '2019-05-18 08:58:12', '2019-05-18 08:58:12'),
(4, 'Orange', '#ffa800', '2019-05-18 08:58:50', '2019-05-18 08:58:50'),
(5, 'Blue', '#1051f5', '2019-05-18 08:59:08', '2019-05-18 08:59:08'),
(6, 'N/A', '#ffffff', '2019-05-28 20:07:03', '2019-05-28 20:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `message`, `created_at`, `updated_at`) VALUES
(3, 'romiul', '01762862815', 'romimitu@gmail.com', 'Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.', '2019-05-31 19:25:02', '2019-05-31 19:25:02'),
(4, 'Eric', 'V Ophk', 'eric@talkwithcustomer.com', 'Hello uthsov.com,\r\n\r\nPeople ask, “why does TalkWithCustomer work so well?”\r\n\r\nIt’s simple.\r\n\r\nTalkWithCustomer enables you to connect with a prospective customer at EXACTLY the Perfect Time.\r\n\r\n- NOT one week, two weeks, three weeks after they’ve checked out your website uthsov.com.\r\n- NOT with a form letter style email that looks like it was written by a bot.\r\n- NOT with a robocall that could come at any time out of the blue.\r\n\r\nTalkWithCustomer connects you to that person within seconds of THEM asking to hear from YOU.\r\n\r\nThey kick off the conversation.\r\n\r\nThey take that first step.\r\n\r\nThey ask to hear from you regarding what you have to offer and how it can make their life better. \r\n\r\nAnd it happens almost immediately. In real time. While they’re still looking over your website uthsov.com, trying to make up their mind whether you are right for them.\r\n\r\nWhen you connect with them at that very moment it’s the ultimate in Perfect Timing – as one famous marketer put it, “you’re entering the conversation already going on in their mind.”\r\n\r\nYou can’t find a better opportunity than that.\r\n\r\nAnd you can’t find an easier way to seize that chance than TalkWithCustomer. \r\n\r\nCLICK HERE http://www.talkwithcustomer.com now to take a free, 14-day test drive and see what a difference “Perfect Timing” can make to your business.\r\n\r\nSincerely,\r\nEric\r\n\r\nPS:  If you’re wondering whether NOW is the perfect time to try TalkWithCustomer, ask yourself this:\r\n“Will doing what I’m already doing now produce up to 100X more leads?”\r\nBecause those are the kinds of results we know TalkWithCustomer can deliver.  \r\nIt shouldn’t even be a question, especially since it will cost you ZERO to give it a try. \r\nCLICK HERE http://www.talkwithcustomer.com to start your free 14-day test drive today.\r\n\r\nIf you\'d like to unsubscribe click here http://liveserveronline.com/talkwithcustomer.aspx?d=uthsov.com', '2019-07-25 21:52:14', '2019-07-25 21:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `starts_date` date NOT NULL,
  `expires_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `subtitle`, `image`, `page_link`, `created_at`, `updated_at`) VALUES
(2, 'Dry Fish', 'Get chemical free dry fish from Saint Martin', 'uploads/feature/-1561221371-dry_fish.jpeg', 'category-product/6/Fish', '2019-05-18 18:57:18', '2019-06-22 21:36:11'),
(3, 'Betnovate - C', 'Original skin cream of Indian gsk', 'uploads/feature/-1563565181-09.jpg', 'product/79/betnovate-c', '2019-05-18 18:57:41', '2019-07-21 18:29:21'),
(4, 'Goat Milk Extract Body Shampoo', 'Best for normal and dry skin', 'uploads/feature/-1563566323-08.jpg', 'product/64/body-shampoo', '2019-05-18 18:58:41', '2019-07-21 18:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(23, 45, 'Mango_Himsagar_Asit_ftg.jpg', '2019-05-28 19:42:56', '2019-05-28 19:42:56'),
(29, 45, 'himsagar-and-purwaaii-by-bengal-online.jpg', '2019-05-28 20:06:10', '2019-05-28 20:06:10'),
(30, 46, 'khirsapati-two.jpg', '2019-05-29 20:23:52', '2019-05-29 20:23:52'),
(31, 47, 'langra-mango-plant-500x500.jpg', '2019-05-29 20:26:37', '2019-05-29 20:26:37'),
(32, 48, 'gopalbhog.jpg', '2019-05-29 20:29:53', '2019-05-29 20:29:53'),
(36, 51, 'Hot-sale-carbonless-copy-paper-in-reams.png_350x350.png', '2019-07-17 14:17:48', '2019-07-17 14:17:48'),
(37, 52, 'Blank-barcode-labels.jpg', '2019-07-17 14:23:13', '2019-07-17 14:23:13'),
(38, 54, 'MGKW2wzI_tillrolls3.jpg', '2019-07-17 14:28:18', '2019-07-17 14:28:18'),
(40, 56, '10.jpg', '2019-07-17 14:46:42', '2019-07-17 14:46:42'),
(41, 57, '10.jpg', '2019-07-17 14:49:16', '2019-07-17 14:49:16'),
(42, 58, '10.jpg', '2019-07-17 14:52:26', '2019-07-17 14:52:26'),
(43, 55, 'images.jpeg', '2019-07-17 14:54:21', '2019-07-17 14:54:21'),
(44, 59, '02.jpg', '2019-07-19 21:10:18', '2019-07-19 21:10:18'),
(46, 64, '08.jpg', '2019-07-19 22:09:46', '2019-07-19 22:09:46'),
(47, 76, '07.jpg', '2019-07-19 22:43:35', '2019-07-19 22:43:35'),
(48, 77, '01.jpg', '2019-07-19 23:23:27', '2019-07-19 23:23:27'),
(49, 78, '04.jpg', '2019-07-19 23:36:25', '2019-07-19 23:36:25'),
(50, 79, '09.jpg', '2019-07-19 23:41:37', '2019-07-19 23:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_14_095204_create_categories_table', 1),
(4, '2019_01_26_172400_create_sliders_table', 1),
(5, '2019_02_01_175103_create_permission_tables', 1),
(6, '2019_03_20_110247_create_user_details_table', 1),
(7, '2019_03_21_140422_create_coupons_table', 1),
(8, '2019_04_26_133925_create_colors_table', 1),
(9, '2019_04_26_133943_create_brands_table', 1),
(10, '2019_04_26_134838_create_sizes_table', 1),
(11, '2019_04_26_134950_create_products_table', 1),
(12, '2019_04_26_135005_create_product_details_table', 1),
(15, '2019_04_26_135603_create_images_table', 1),
(16, '2019_05_17_022349_create_shipments_table', 2),
(17, '2019_05_19_004634_create_features_table', 3),
(18, '2019_04_26_135014_create_orders_table', 4),
(19, '2019_04_26_135155_create_order_products_table', 4),
(20, '2019_05_21_173655_create_blogs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 17),
(1, 'App\\User', 18),
(1, 'App\\User', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `customer_mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `payment_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `operational_status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `processed_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `invoice_no`, `customer_name`, `customer_mobile`, `customer_email`, `address`, `city`, `total_amount`, `shipping_fee`, `paid_amount`, `payment_status`, `payment_details`, `operational_status`, `processed_by`, `created_at`, `updated_at`) VALUES
(26, 0, '0001906192', 'Iqbal Khan', '01612737312', 'bdcomputer48@gmail.com', 'House-95/3, South Mugda, Dhaka', 'Dhaka', '1300.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-19 16:15:37', '2019-07-18 02:31:11'),
(32, 0, '0019062033', 'Tapna rani dash', '01552602569', 'tapna2009@gmail.com', '99 shantinagar,F-2 sky view heritage.3rd floor.dhaka-1217.', 'Dhaka', '1500.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-20 21:18:14', '2019-07-18 02:30:54'),
(33, 0, '0019062234', 'Md. Shahinur Alam', '01981482110', 'shahinl94@yahoo.com', 'Medale Paikpara, Ansar Camp, Mirpur1, Dhaka', 'Dhaka', '1200.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-22 14:10:23', '2019-07-18 02:30:38'),
(34, 0, '0019062335', 'Rumon', '01718969669', NULL, '23, avenue-3, block-E, mirpur-1, dhaka.', 'Dhaka', '1300.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-23 19:56:21', '2019-07-18 02:30:17'),
(35, 0, '0019062436', 'Mr. Juwel Mia', '01711284725', NULL, '319, North Shahjahanpur, Samatot Builders, Lifter 7', 'Dhaka', '2700.00', '0.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-24 19:30:25', '2019-07-18 02:29:59'),
(36, 0, '0019062437', 'Nahid', '01672627348', 'nkhan7619@gmail.com', 'Jatrabari', 'Dhaka', '1500.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-24 19:50:03', '2019-07-18 02:29:40'),
(37, 0, '0019062438', 'Nahid', '01672627348', 'nkhan7619@gmail.com', 'Jatrabari', 'Dhaka', '1500.00', '60.00', '0.00', 'Paid', 'cash on delivery', 'Complete', 19, '2019-06-24 20:17:18', '2019-07-18 02:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `discount_amount`, `created_at`, `updated_at`) VALUES
(30, 26, 47, 1, '1300.00', '0.00', '2019-06-19 16:15:37', '2019-06-19 16:15:37'),
(37, 32, 45, 1, '1500.00', '0.00', '2019-06-20 21:18:14', '2019-06-20 21:18:14'),
(38, 33, 48, 1, '1200.00', '0.00', '2019-06-22 14:10:23', '2019-06-22 14:10:23'),
(39, 34, 47, 1, '1300.00', '0.00', '2019-06-23 19:56:21', '2019-06-23 19:56:21'),
(40, 35, 48, 1, '1200.00', '0.00', '2019-06-24 19:30:25', '2019-06-24 19:30:25'),
(41, 35, 45, 1, '1500.00', '0.00', '2019-06-24 19:30:25', '2019-06-24 19:30:25'),
(42, 36, 45, 1, '1500.00', '0.00', '2019-06-24 19:50:03', '2019-06-24 19:50:03'),
(43, 37, 46, 1, '1500.00', '0.00', '2019-06-24 20:17:18', '2019-06-24 20:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifies`
--

CREATE TABLE `otp_verifies` (
  `id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('unverified','verified') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unverified',
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `otp_verifies`
--

INSERT INTO `otp_verifies` (`id`, `mobile`, `code`, `status`, `verified_at`, `created_at`, `updated_at`) VALUES
(23, '01612737312', '874703', 'verified', '2019-06-19 16:13:23', '2019-06-19 16:11:26', '2019-06-19 16:13:23'),
(24, '01981482110', '493621', 'unverified', NULL, '2019-06-20 01:57:01', '2019-06-20 01:57:01'),
(25, '01722182387', '578099', 'verified', '2019-06-20 13:15:33', '2019-06-20 13:15:05', '2019-06-20 13:15:33'),
(26, '01719273363', '132780', 'verified', '2019-06-20 15:09:13', '2019-06-20 15:08:23', '2019-06-20 15:09:13'),
(27, '01719273363', '404652', 'verified', '2019-06-20 15:11:40', '2019-06-20 15:11:20', '2019-06-20 15:11:40'),
(28, '01552415495', '822246', 'verified', '2019-06-20 18:06:03', '2019-06-20 18:05:36', '2019-06-20 18:06:03'),
(29, '01552602569', '790637', 'verified', '2019-06-20 21:15:50', '2019-06-20 21:15:29', '2019-06-20 21:15:50'),
(30, '01981482110', '336122', 'verified', '2019-06-22 14:05:18', '2019-06-22 14:04:55', '2019-06-22 14:05:18'),
(31, '01670072505', '420787', 'unverified', NULL, '2019-06-22 20:30:01', '2019-06-22 20:30:01'),
(32, '01718969669', '480397', 'verified', '2019-06-23 19:50:33', '2019-06-23 19:49:38', '2019-06-23 19:50:33'),
(33, '01672627348', '519434', 'verified', '2019-06-24 13:41:32', '2019-06-24 13:40:58', '2019-06-24 13:41:32'),
(34, '01711284725', '121813', 'verified', '2019-06-24 19:27:14', '2019-06-24 19:24:08', '2019-06-24 19:27:14'),
(35, '01672627348', '987886', 'verified', '2019-06-24 19:47:52', '2019-06-24 19:47:17', '2019-06-24 19:47:52'),
(36, '01672627348', '887651', 'verified', '2019-06-24 20:16:32', '2019-06-24 20:15:53', '2019-06-24 20:16:32'),
(37, '01715520756', '677768', 'verified', '2019-07-13 16:22:37', '2019-07-13 16:22:15', '2019-07-13 16:22:37'),
(38, '01719273363', '935376', 'unverified', NULL, '2019-07-19 23:44:22', '2019-07-19 23:44:22'),
(39, '01710796455', '857411', 'unverified', NULL, '2019-07-20 11:14:06', '2019-07-20 11:14:06'),
(40, '01762862815', '106506', 'unverified', NULL, '2019-07-21 15:00:13', '2019-07-21 15:00:13'),
(41, '01552415495', '234140', 'verified', '2019-07-24 13:06:13', '2019-07-24 13:05:52', '2019-07-24 13:06:13'),
(42, '01917012600', '981021', 'verified', '2019-07-24 18:08:17', '2019-07-24 18:07:53', '2019-07-24 18:08:17'),
(43, '01839209615', '350751', 'verified', '2019-07-24 18:18:07', '2019-07-24 18:17:40', '2019-07-24 18:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('romimitu@gmail.com', '$2y$10$uh1gIr0b3aC0rTeDbBPKcupKsM93gvYx4oxF4DBekt.W8KHryWaF2', '2019-06-01 07:50:13'),
('mdiqbalhasan1707@gmail.com', '$2y$10$eiKIseTKG6cAPemSA/mumeRp9IWVe/1Cotv.gCLVytjA3cQL/PBUC', '2019-06-01 16:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(2, 'role-create', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(3, 'role-edit', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(4, 'role-delete', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(5, 'product-list', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(6, 'product-create', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(7, 'product-edit', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(8, 'product-delete', 'web', '2019-04-26 10:30:08', '2019-04-26 10:30:08'),
(9, 'category-list', 'web', '2019-04-26 20:11:50', '2019-04-26 20:11:50'),
(10, 'category-create', 'web', '2019-04-26 20:11:50', '2019-04-26 20:11:50'),
(11, 'category-edit', 'web', '2019-04-26 20:11:50', '2019-04-26 20:11:50'),
(12, 'category-delete', 'web', '2019-04-26 20:11:50', '2019-04-26 20:11:50'),
(13, 'order-list', 'web', '2019-05-14 18:51:50', '2019-05-14 18:51:50'),
(14, 'order-edit', 'web', '2019-05-14 18:51:50', '2019-05-14 18:51:50'),
(15, 'order-delete', 'web', '2019-05-14 18:51:50', '2019-05-14 18:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `in_stock` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `title`, `description`, `sku`, `brand_id`, `color_id`, `in_stock`, `status`, `created_at`, `updated_at`) VALUES
(45, 5, 'Himsagar Mango 10kg', '<p>The \'<b>Himsagar</b>\' mango is a popular mango cultivar, originating in the modern-day state of Rajshahi and Chapainawabganj District in Bangladesh.The inside is yellow to orange in colour and does not have any fibre. The fruit is medium-sized and weighs between 250 and 350 grams, out of which the pulp content is around 77%. It has a good keeping quality. It is also known as Khirsapati.<br></p>', 'Mango001', 2, 6, 0, 0, '2019-05-28 19:42:56', '2019-07-17 15:43:34'),
(46, 5, 'GI Khirsapati From Chapai 10kg', '<p>Khirsapati mango from chapai kansat local garden<br></p>', 'Mango002', 2, 6, 0, 0, '2019-05-29 20:23:51', '2019-07-17 15:41:07'),
(47, 5, 'Langra Mango 10kg', '<p>Langra mango is a king of mango</p>', 'Mango003', 2, 6, 0, 0, '2019-05-29 20:26:36', '2019-07-17 15:40:44'),
(48, 5, 'Amrupali Mango 10Kg', 'Get our gopal bhog mango from local garden chapai kansat', 'Mango004', 2, 6, 0, 0, '2019-05-29 20:29:52', '2019-07-17 22:13:14'),
(51, 8, 'Computer Continuous Paper', '<p>Various categories and sizes of computer continuous paper which is used for Dot Printer are available to us. It\'s price depends on category, size, quantity and others.</p>', 'Office001', 2, 6, 1, 1, '2019-07-17 14:12:07', '2019-07-17 14:33:59'),
(52, 8, 'Barcode Sticker', '<p>We have both of DT & TT Barcode Sticker Roll. It\'s price depend on size, quantity & others.</p>', 'Office002', 2, 6, 1, 1, '2019-07-17 14:22:32', '2019-07-17 14:23:13'),
(54, 8, 'POSS Roll', 'Various sizes of POSS Roll which are used for POSS Printers available to us. It\'s price depends on size, quantity and others.', 'Office003', 2, 6, 1, 1, '2019-07-17 14:27:45', '2019-07-17 14:28:18'),
(55, 8, 'NCR Paper Roll', '<p>Different categories and size NCR Paper Roll are available. Price depends on category, size, quantity and others.</p>', 'Office004', 2, 6, 1, 1, '2019-07-17 14:32:31', '2019-07-17 14:54:21'),
(56, 7, 'Pocket Perfume Cool Marine', '<p>Perfume has been used from beginning of civilization. Steal now it\'s a demanding product for giving sweet smell and freshness. We are providing&nbsp;<b>Pocket Perfume&nbsp;(Cool Marine)</b>&nbsp;which is portable. You can keep it in your pocket and use any where, any time.&nbsp;</p><p><span style=\"font-weight: 700;\">Product of India</span></p>', 'Cosmetics003', 7, 6, 1, 1, '2019-07-17 14:45:21', '2019-07-19 23:12:44'),
(57, 7, 'Pocket Perfume Classic Woody', '<p>Perfume has been used from beginning of civilization. Steal now it\'s a demanding product for giving sweet smell and freshness. We are providing&nbsp;<b>Pocket Perfume&nbsp;(Classic Woody)</b>&nbsp;which is portable. You can keep it in your pocket and use any where, any time.&nbsp;</p><p><span style=\"font-weight: 700;\">Product of India</span></p>', 'Cosmetics004', 7, 6, 1, 1, '2019-07-17 14:49:16', '2019-07-19 23:11:23'),
(58, 7, 'Pocket Perfume  Citrus Fresh', '<p>Perfume has been used from beginning of civilization. Steal now it\'s a demanding product for giving sweet smell and freshness. We are providing&nbsp;<b>Pocket Perfume&nbsp;(Citrus Fresh)</b> which is portable. You can keep it in your pocket and use any where, any time.&nbsp;</p><p><b>Product of India</b></p>', 'Cosmetics005', 7, 6, 1, 1, '2019-07-17 14:52:25', '2019-07-19 23:10:34'),
(59, 7, 'Body Wash', '<p><b>FOLLOW ME</b></p><p><b>Body Wash</b></p><p><b>Whitening </b></p><p>Developed with goat\'s milk, licorice extract and cherry blossom, this unique formulated body wash leaves your skin feeling moisturised and firm with whitening effect after every wash. Skin feels pampered and rejuvenated for the day.</p><p><b>Product of Malaysia</b></p>', 'Cosmetics006', 5, 6, 1, 1, '2019-07-19 21:06:38', '2019-07-19 23:23:53'),
(64, 7, 'Body Shampoo', '<p>Summer Goat Milk Body Shampoo is made from goat milk extract which is rich in natural vitamins & minerals. It can effectively nourish, moisturize & softens your skin. Ideal for normal & dry skin.</p><p><span style=\"font-weight: 700;\">Product of Malaysia</span></p>', 'Cosmetics002', 4, 6, 1, 1, '2019-07-19 22:08:49', '2019-07-19 23:24:44'),
(76, 7, 'Body Shampoo', '<p><span style=\"font-weight: 700;\">DEEP MOISTURISING BODY SHAMPOO WITH ROYAL JELLY EXTRACT</span></p><p>Summer Royal Jelly Body Shampoo is made from royal jelly extract which is rich in natural vitamins and minerals. It can effectively nourish, moisturize and softens your skin. Ideal for normal and dry skin.</p><p><span style=\"font-weight: 700;\">Product of Malaysia</span></p>', 'Cosmetics007', 4, 6, 1, 1, '2019-07-19 22:43:35', '2019-07-19 23:24:14'),
(77, 7, 'Body Wash', '<p><b>FOLLOW ME</b></p><p><b>BODY WASH</b></p><p><b>Anti-Bacterial</b></p><p>Formulated<b>&nbsp;</b>with triclosan, menthol and cucumber extract. Thoroughly cleanses your body and protecting it from harsh environment elements. It\'s anti-bacterial properties inhibit the growth of bacterial to make your skin protected, refreshed and cool for the day.</p><p><b>Product of Malaysia</b></p>', 'Cosmetics008', 6, 6, 1, 1, '2019-07-19 23:23:27', '2019-07-19 23:23:27'),
(78, 7, 'Shower Cream', '<p>Fruiser Shower Cream with Pomelo rejuvenates your skin living it soft and supple, pamelo has been used for centuries as a natural skin cleanser. Traditionally used in ceremonial baths, Pomelo contains treasure chest of vitamins and minarals that aid in the re-revitalization  of skin. So, learn from those before you, incorporate Pomelo into your daily bathing routine to keep your skin soft and glowing!</p>', 'Cosmetics009', 6, 6, 1, 1, '2019-07-19 23:36:24', '2019-07-19 23:46:38'),
(79, 7, 'Betnovate - C', '<p>ব্রণ ও দাগ দূর করতে বেটনোভেট - সি অত্যন্ত কার্যকরী এবং জনপ্রিয়। কিন্তু অনেকেই নকল ক্রিম ব্যবহার করে প্রতারিত। তবে আমাদের কাছে নিজস্ব তত্ত্বাবধানে সংগ্রহকৃত ওরিজিনাল ইন্ডিয়ান gsk কোম্পানির বেটনোভেট - সি। তাই প্রতারিত হওয়ার বিন্দুমাত্র শঙ্কা নেই।<br></p>', 'Cosmetics001', 3, 6, 1, 1, '2019-07-19 23:40:41', '2019-07-19 23:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `sales_price` decimal(8,2) NOT NULL,
  `less_amt` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `size_id`, `product_id`, `purchase_price`, `sales_price`, `less_amt`, `created_at`, `updated_at`) VALUES
(101, 5, 47, '800.00', '1300.00', '0.00', '2019-07-17 15:40:44', '2019-07-17 15:40:44'),
(102, 6, 46, '1000.00', '1500.00', '0.00', '2019-07-17 15:41:07', '2019-07-17 15:41:07'),
(104, 7, 45, '800.00', '1500.00', '0.00', '2019-07-17 15:43:34', '2019-07-17 15:43:34'),
(110, 5, 48, '800.00', '1200.00', '0.00', '2019-07-17 22:13:15', '2019-07-17 22:13:15'),
(131, 10, 58, '130.00', '160.00', '0.00', '2019-07-19 23:10:34', '2019-07-19 23:10:34'),
(132, 10, 57, '130.00', '160.00', '0.00', '2019-07-19 23:11:23', '2019-07-19 23:11:23'),
(133, 10, 56, '130.00', '160.00', '0.00', '2019-07-19 23:12:44', '2019-07-19 23:12:44'),
(136, 9, 77, '1000.00', '1100.00', '0.00', '2019-07-19 23:23:27', '2019-07-19 23:23:27'),
(137, 9, 59, '1000.00', '1200.00', '0.00', '2019-07-19 23:23:53', '2019-07-19 23:23:53'),
(138, 9, 76, '1000.00', '1200.00', '0.00', '2019-07-19 23:24:14', '2019-07-19 23:24:14'),
(139, 9, 64, '1000.00', '1200.00', '0.00', '2019-07-19 23:24:44', '2019-07-19 23:24:44'),
(141, 8, 79, '200.00', '250.00', '0.00', '2019-07-19 23:41:37', '2019-07-19 23:41:37'),
(142, 9, 78, '1000.00', '1200.00', '0.00', '2019-07-19 23:46:38', '2019-07-19 23:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-04-26 10:30:52', '2019-04-26 10:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `city`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '60.00', '2019-05-20 19:29:07', '2019-06-18 05:30:32'),
(5, 'Outside Dhaka', '0', '2019-06-18 05:30:44', '2019-06-19 16:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `unit`, `created_at`, `updated_at`) VALUES
(5, '10Kg', '10kg', '2019-05-28 19:27:49', '2019-05-28 19:27:49'),
(6, '20Kg', '20Kg', '2019-05-28 19:27:59', '2019-05-28 19:27:59'),
(7, '15Kg', '15Kg', '2019-05-28 19:28:20', '2019-05-28 19:28:20'),
(8, '30g', '30g', '2019-07-17 11:52:45', '2019-07-17 12:36:10'),
(9, '1000ml', '1000ml', '2019-07-17 13:02:50', '2019-07-17 13:02:50'),
(10, '8.4ml', '8.4ml', '2019-07-17 14:40:01', '2019-07-17 14:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `page_link`, `created_at`, `updated_at`) VALUES
(3, 'Buy Mango at Home', 'Natural, formalin and others chemical free mango from capital of mango chapainawaganj kansat.', 'uploads/slider/-1559160412-slider-one.jpg', 'shop', '2019-05-18 18:45:35', '2019-05-29 20:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'NONE', 'NONE', 'NONE', NULL, '', NULL, NULL, NULL),
(17, 'Goutam Shing', 'goutomshing@gmail.com', '01552415495', NULL, '$2y$10$3i3tAePLm2z5ddqrzpvag.WmhFiBmLf/ynrasK2yFqtZi86HG5Jna', 'xu2YPio2XWvITIITTs911941SXCiEf7dXwVRTHHLAQib8NEiZYdxj00WJ26D', '2019-05-29 21:16:00', '2019-05-30 19:06:29'),
(18, 'Romi', 'romimitu@gmail.com', '01762862815', NULL, '$2y$10$/Ge7mmknpcEwRw9Kd/5bz.EZDdgxNvvimzRjglOEQB1MT8.XNZ6r6', '2q6Y0EuTflRfOqw9L8TlGccM3Lzu5orK4BCggF0knc3V2o3WfyPLu5pQf0JS', '2019-05-29 21:38:30', '2019-05-29 21:38:30'),
(19, 'Iqbal Hasan', 'mdiqbalhasan1707@gmail.com', '01719273363', NULL, '$2y$10$7Q/aHYq91JUlKfR/NrdowuTe5.38KKyz6hfxzRm0UHxYeStSi.tqi', 'CM35onpDMwot878NCT97psC1UE2v8UEYbfZssfKHy0Amjw426VApOxdD0KD7', '2019-05-31 19:00:16', '2019-07-18 22:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `thana` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_processed_by_foreign` (`processed_by`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `otp_verifies`
--
ALTER TABLE `otp_verifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_size_id_foreign` (`size_id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `otp_verifies`
--
ALTER TABLE `otp_verifies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_processed_by_foreign` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_details_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
