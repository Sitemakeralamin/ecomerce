-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 12:44 PM
-- Server version: 10.11.10-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketle_pizeon`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about_us_text` longtext DEFAULT NULL,
  `mission` longtext DEFAULT NULL,
  `vission` longtext DEFAULT NULL,
  `custom_block_title` varchar(255) DEFAULT NULL,
  `custom_block_details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `about_us_text`, `mission`, `vission`, `custom_block_title`, `custom_block_details`, `created_at`, `updated_at`) VALUES
(1, '17363230581665188157.png', NULL, NULL, NULL, NULL, NULL, '2024-11-30 05:14:39', '2025-01-08 07:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bn_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `bn_title`, `image`, `description`, `author`, `date`, `created_at`, `updated_at`) VALUES
(2, 'Wider Reach and Accessibility', NULL, '1737541837.png', '<p>E-commerce allows your business to break geographical barriers and reach customers anywhere in the world. By selling online, you make your products and services available 24/7, which is not possible in traditional brick-and-mortar models.</p>', NULL, NULL, '2025-01-22 10:30:37', '2025-01-22 10:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bn_title` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `bn_title`, `position`, `image`, `description`, `meta_title`, `meta_image`, `meta_description`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Test', NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-01-20 09:18:21', '2025-01-20 09:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variations` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bn_title` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `is_menu_active` int(11) NOT NULL DEFAULT 0,
  `menu_position` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `is_menu_item` int(11) NOT NULL DEFAULT 0,
  `publish_product_in_home_page` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `bn_title`, `parent_id`, `is_menu_active`, `menu_position`, `position`, `image`, `banner`, `description`, `meta_title`, `meta_image`, `meta_description`, `is_featured`, `is_menu_item`, `publish_product_in_home_page`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 'Bedding Set', NULL, 0, 1, NULL, 1, '1737437745.jpg', 'banner_1737462333.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 11:34:35', '2025-01-21 12:25:33'),
(8, 'Bedding Set (3 pieces)', NULL, 7, 0, NULL, 1, '1736338005.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 11:35:53', '2025-01-08 12:06:45'),
(9, 'Bedding Set (4 pieces)', NULL, 7, 0, NULL, 2, '1737437689.jpg', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:07:49', '2025-01-21 05:34:49'),
(10, 'Bed Spread Set (3 pieces)', NULL, 7, 0, NULL, 2, '1736338084.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:08:05', '2025-01-08 12:08:05'),
(11, 'Child Bedding Set (4 pieces)', NULL, 7, 0, NULL, 2, '1736338103.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:08:23', '2025-01-08 12:08:23'),
(12, 'Baby Bedding Set (3 pieces)', NULL, 7, 0, NULL, 2, '1736338114.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:08:34', '2025-01-08 12:08:34'),
(13, 'Quilt Cover', NULL, 0, 1, NULL, 2, '1737437784.jpg', 'banner_1737462365.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:09:05', '2025-01-21 12:26:06'),
(14, 'Summer Quilt', NULL, 0, 1, NULL, 3, '1737437803.jpg', 'banner_1737462379.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:09:34', '2025-01-21 12:26:19'),
(15, 'Comforter', NULL, 0, 1, NULL, 4, '1737437818.jpg', 'banner_1737462453.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:09:45', '2025-01-21 12:27:33'),
(16, 'Pillow', NULL, 0, 1, NULL, 5, '1737437833.jpg', 'banner_1737462471.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:10:29', '2025-01-21 12:27:52'),
(17, 'Regular Head Pillow', NULL, 16, 0, NULL, 1, '1736338274.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:11:14', '2025-01-08 12:11:14'),
(18, 'Child Head Pillow', NULL, 16, 0, NULL, 2, '1736338297.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:11:37', '2025-01-08 12:11:37'),
(19, 'Baby Head Pillow', NULL, 16, 0, NULL, 2, '1736338309.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:11:49', '2025-01-08 12:11:49'),
(20, 'Newborn Baby Head Pillow (Medicated)', NULL, 16, 0, NULL, 2, '1736338325.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:12:05', '2025-01-08 12:12:05'),
(21, 'Latex Head Pillow', NULL, 16, 0, NULL, 2, '1736338339.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:12:19', '2025-01-08 12:12:19'),
(22, 'Pregnancy Pillow', NULL, 16, 0, NULL, 2, '1736338351.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:12:31', '2025-01-08 12:12:31'),
(23, 'Side Pillow', NULL, 16, 0, NULL, 2, '1736338363.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:12:43', '2025-01-08 12:12:43'),
(24, 'Quilt Katha', NULL, 0, 0, NULL, 6, '1737437852.jpg', 'banner_1737462491.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:13:14', '2025-01-21 12:28:11'),
(25, 'Cushions', NULL, 0, 1, NULL, 7, '1737437870.jpg', 'banner_1737462504.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:13:31', '2025-01-21 12:28:24'),
(26, '40 cm x 40 cm', NULL, 25, 0, NULL, 1, '1736338438.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:13:58', '2025-01-08 12:13:58'),
(27, '45 cm x 45 cm', NULL, 25, 0, NULL, 1, '1736338446.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:14:06', '2025-01-08 12:14:06'),
(28, '50 cm x 50 cm', NULL, 25, 0, NULL, 1, '1736338455.png', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2025-01-08 12:14:15', '2025-01-08 12:14:15'),
(29, 'Plush Toy', NULL, 0, 0, NULL, 8, '1737437895.jpg', 'banner_1737462518.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:14:36', '2025-01-21 12:28:38'),
(30, 'Mattress Topper', NULL, 0, 0, NULL, 9, '1737437915.jpg', 'banner_1737462529.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:14:54', '2025-01-21 12:28:49'),
(31, 'Mattress', NULL, 0, 0, NULL, 10, '1737437933.jpg', 'banner_1737462552.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:15:08', '2025-01-21 12:29:12'),
(32, 'Mattress Protector', NULL, 0, 0, NULL, 11, '1737437954.jpg', 'banner_1737462560.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:15:13', '2025-01-21 12:29:20'),
(33, 'Fitted Sheet', NULL, 0, 0, NULL, 12, '1737437970.jpg', 'banner_1737462568.jpg', NULL, NULL, NULL, NULL, 1, 0, 0, 1, '2025-01-08 12:15:27', '2025-01-21 12:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `discount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `single_use` int(11) NOT NULL DEFAULT 0,
  `affiliate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_courier_infos`
--

CREATE TABLE `delivery_courier_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_type` varchar(255) DEFAULT NULL COMMENT 'pathao, redx, ecourier',
  `order_code` varchar(255) NOT NULL,
  `consignment_id` varchar(255) DEFAULT NULL,
  `delivery_fee` varchar(255) DEFAULT NULL,
  `merchant_order_id` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_phone` varchar(255) DEFAULT NULL,
  `recipient_address` mediumtext DEFAULT NULL,
  `city_text` varchar(255) DEFAULT NULL,
  `zone_text` varchar(255) DEFAULT NULL,
  `area_text` varchar(255) DEFAULT NULL,
  `recipient_zone` varchar(255) DEFAULT NULL,
  `recipient_area` varchar(255) DEFAULT NULL,
  `delivery_type` varchar(255) DEFAULT NULL COMMENT '48 for normal delivery or 12 for on demand delivery',
  `item_type` varchar(255) DEFAULT NULL COMMENT '1 for document, 2 for parcel',
  `special_instruction` longtext DEFAULT NULL,
  `item_quantity` varchar(255) DEFAULT NULL,
  `item_weight` varchar(255) DEFAULT NULL,
  `amount_to_collect` varchar(255) DEFAULT NULL,
  `item_description` longtext DEFAULT NULL,
  `admin_note` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'active, canceled',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `shipping_charge` varchar(255) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`, `shipping_charge`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Inside Dhaka', 'ঢাকা সিটির ভিতরে', '70', 1, '2024-12-01 05:58:39', '2024-12-01 07:39:00'),
(2, 'Outside Dhaka', 'ঢাকা সিটির বাহিরে', '150', 1, '2024-12-01 05:58:49', '2024-12-01 07:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_offers`
--

CREATE TABLE `flash_sale_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_date_time` varchar(255) NOT NULL,
  `end_date_time` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `background_color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_offer_products`
--

CREATE TABLE `flash_sale_offer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_sale_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_four_banners`
--

CREATE TABLE `home_page_four_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_four_banners`
--

INSERT INTO `home_page_four_banners` (`id`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1736685034872123812.jpg', NULL, '2024-11-30 05:34:23', '2025-01-12 12:30:34'),
(2, NULL, NULL, '1736685041602252648.jpg', NULL, '2024-11-30 05:34:39', '2025-01-12 12:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `hash_title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `hash_title`, `file_path`, `file_size`, `created_by`, `updated_by`, `deleted_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'peakpx (2)', '1737364950_0.jpg', 'images/upload/1737364950_0.jpg', '1.20MB', 1, NULL, NULL, 0, '2025-01-20 09:22:30', '2025-01-20 09:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_02_044447_create_categories_table', 1),
(6, '2021_09_02_044656_create_brands_table', 1),
(7, '2021_09_02_044732_create_variations_table', 1),
(8, '2021_09_02_044817_create_products_table', 1),
(9, '2021_09_02_044851_create_order_statuses_table', 1),
(10, '2021_09_02_044914_create_orders_table', 1),
(11, '2021_09_02_044940_create_order_products_table', 2),
(12, '2021_09_02_051208_create_wishlists_table', 2),
(13, '2021_09_02_051557_create_wallets_table', 2),
(14, '2021_09_02_051617_create_wallet_entries_table', 2),
(15, '2021_09_02_051658_create_pages_table', 2),
(16, '2021_09_02_051950_create_settings_table', 2),
(17, '2021_09_06_100447_create_product_images_table', 2),
(18, '2021_09_13_064102_create_coupons_table', 2),
(19, '2021_09_15_090230_create_sliders_table', 2),
(20, '2021_09_20_101516_create_subscribers_table', 2),
(21, '2021_09_26_064736_create_galleries_table', 2),
(22, '2021_10_25_121017_create_districts_table', 2),
(23, '2021_10_25_121041_create_areas_table', 2),
(24, '2021_10_26_092554_create_registration_points_table', 2),
(25, '2022_11_18_063812_create_permission_tables', 2),
(26, '2022_11_18_073751_create_flash_sale_offers_table', 2),
(27, '2022_11_18_074225_create_flash_sale_offer_products_table', 2),
(28, '2022_11_18_074637_create_carts_table', 2),
(29, '2022_11_18_074858_create_blogs_table', 2),
(30, '2022_11_24_182330_create_product_stocks_table', 2),
(31, '2022_11_24_182820_create_attributes_table', 2),
(32, '2022_11_24_183022_create_colors_table', 2),
(33, '2022_11_24_183836_create_uploads_table', 2),
(34, '2022_12_11_094944_create_home_page_four_banners_table', 2),
(35, '2023_01_03_105352_create_transactions_table', 2),
(36, '2023_01_06_080608_create_about_us_table', 2),
(37, '2023_02_17_143506_create_products_reviews_table', 2),
(38, '2023_02_25_192708_create_product_with_categories_table', 2),
(39, '2023_03_04_185436_create_wallet_transactions_table', 2),
(40, '2023_03_17_183946_add_default_mfs_system_into_orders_table', 2),
(41, '2024_01_24_125003_create_wholesales_table', 2),
(42, '2024_02_25_171020_create_slider_side_banners_table', 2),
(43, '2024_03_25_134725_create_images_table', 2),
(44, '2024_03_28_120033_create_delivery_courier_infos_table', 2),
(45, '2024_06_24_110828_add_google_tage_manager_columns_to_settings', 2),
(46, '2024_06_25_133630_add_tiny_column_to_settings', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `ship_to_another_address_status` int(11) NOT NULL DEFAULT 0,
  `ship_to_another_address` text DEFAULT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_discount_amount` varchar(255) DEFAULT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `delivery_charge` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Order Created',
  `payment_status` varchar(255) NOT NULL DEFAULT '0',
  `payment_method` varchar(255) DEFAULT NULL,
  `manual_mfs_account_name` varchar(255) DEFAULT NULL,
  `manual_mfs_payment_number` varchar(255) DEFAULT NULL,
  `manual_mfs_transaction_id` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `total_payable` varchar(255) NOT NULL DEFAULT '0',
  `paid` varchar(255) NOT NULL DEFAULT '0',
  `sender_amount` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `price`, `name`, `email`, `phone`, `city`, `district_id`, `area_id`, `shipping_address`, `ship_to_another_address_status`, `ship_to_another_address`, `coupon_status`, `coupon_code`, `coupon_discount_amount`, `delivery_boy_id`, `delivery_charge`, `vat`, `order_status`, `payment_status`, `payment_method`, `manual_mfs_account_name`, `manual_mfs_payment_number`, `manual_mfs_transaction_id`, `transaction_id`, `total_payable`, `paid`, `sender_amount`, `note`, `created_at`, `updated_at`) VALUES
(1, '011224364000001', 1, 1000, 'Admin', 'polluxmart@gamil.com', '01623 771241', NULL, 2, 0, 'Dhaka', 0, NULL, 0, NULL, NULL, NULL, 150, NULL, 'pending', 'unpaid', 'cash on delivery', NULL, NULL, NULL, NULL, '1150', '0', NULL, NULL, '2024-12-01 05:59:14', '2024-12-01 05:59:14'),
(2, '011224952000002', NULL, 1000, 'akil akhtab', NULL, '01780504501', NULL, 1, 0, 'Muktarpur,Munsigong', 0, NULL, 0, NULL, NULL, NULL, 70, NULL, 'pending', 'unpaid', 'cash on delivery', NULL, NULL, NULL, NULL, '1070', '0', NULL, NULL, '2024-12-01 06:18:41', '2024-12-01 06:18:41'),
(3, '190125455000003', NULL, 2000, 'Masud', NULL, '01300063922', NULL, 1, 0, 'Uttara 10,  Dhaka', 0, NULL, 0, NULL, NULL, NULL, 70, NULL, 'pending', 'unpaid', 'cash on delivery', NULL, NULL, NULL, NULL, '2070', '0', NULL, NULL, '2025-01-19 16:03:25', '2025-01-19 16:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_code` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `variations` text DEFAULT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `customer_id`, `order_code`, `product_id`, `variations`, `price`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, NULL, '011224364000001', 31, '0', 500, 2, 1000, '2024-12-01 05:59:14', '2024-12-01 05:59:14'),
(2, NULL, '011224952000002', 1, '0', 1000, 1, 1000, '2024-12-01 06:18:41', '2024-12-01 06:18:41'),
(3, NULL, '190125455000003', 97, '0', 1000, 1, 1000, '2025-01-19 16:03:25', '2025-01-19 16:03:25'),
(4, NULL, '190125455000003', 80, '0', 1000, 1, 1000, '2025-01-19 16:03:25', '2025-01-19 16:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_changed_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description1` text DEFAULT NULL,
  `description2` text DEFAULT NULL,
  `description3` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bn_title` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `purchase_price` varchar(255) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `current_stock` int(11) NOT NULL DEFAULT 0,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `is_tranding` int(11) NOT NULL DEFAULT 0,
  `todays_deal` int(11) NOT NULL DEFAULT 0,
  `sold_qty` varchar(255) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `unit_type` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `minimum_qty` int(11) DEFAULT NULL,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `thumbnail_image2` varchar(255) DEFAULT NULL,
  `gallery_images` varchar(255) DEFAULT NULL,
  `video_provider` varchar(255) DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `variant_product` text DEFAULT NULL,
  `attributes` text DEFAULT NULL,
  `choice_options` text DEFAULT NULL,
  `colors` text DEFAULT NULL,
  `variations` text DEFAULT NULL,
  `feature` longtext DEFAULT NULL,
  `bn_feature` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `bn_description` longtext DEFAULT NULL,
  `pdf_specification` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `tags` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `bn_title`, `brand_id`, `category_id`, `sub_category_id`, `purchase_price`, `price`, `discount_type`, `discount_amount`, `current_stock`, `is_featured`, `is_tranding`, `todays_deal`, `sold_qty`, `code`, `weight`, `unit_type`, `type`, `minimum_qty`, `thumbnail_image`, `thumbnail_image2`, `gallery_images`, `video_provider`, `video_link`, `variant_product`, `attributes`, `choice_options`, `colors`, `variations`, `feature`, `bn_feature`, `description`, `bn_description`, `pdf_specification`, `is_active`, `tags`, `meta_title`, `meta_description`, `meta_keywords`, `meta_image`, `created_at`, `updated_at`) VALUES
(44, 'Quilt Cover', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '313568', NULL, 'Piece', 'single', NULL, '17367463261666032259.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:32:06', '2025-01-13 05:32:06'),
(45, 'Summer Quilt', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '389343', NULL, 'Piece', 'single', NULL, '17367463511849566623.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:32:31', '2025-01-13 05:32:31'),
(46, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '466435', NULL, 'Piece', 'single', NULL, '1737292057.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:33:20', '2025-01-19 13:07:37'),
(48, 'Quilt Katha', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '861968', NULL, 'Piece', 'single', NULL, '17367464451757735879.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:34:05', '2025-01-13 05:34:05'),
(49, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '394997', NULL, 'Piece', 'single', NULL, '1737291455.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:34:24', '2025-01-19 12:57:35'),
(50, 'Plush Toy', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '624643', NULL, 'Piece', 'single', NULL, '17367464991828410258.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:34:59', '2025-01-13 05:34:59'),
(51, 'Mattress Topper', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '283532', NULL, 'Piece', 'single', NULL, '17367465212103069054.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:35:21', '2025-01-13 05:35:21'),
(52, 'Mattress', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '136147', NULL, 'Piece', 'single', NULL, '1736746541241378897.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:35:41', '2025-01-13 05:35:41'),
(53, 'Mattress Protector', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '831121', NULL, 'Piece', 'single', NULL, '17367466011260156213.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:36:41', '2025-01-13 05:36:41'),
(54, 'Fitted Sheet', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '455436', NULL, 'Piece', 'single', NULL, '1736746619950196935.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-13 05:36:59', '2025-01-13 05:36:59'),
(55, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '639275', NULL, 'Piece', 'single', NULL, '17372900331174322438.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:33:53', '2025-01-19 12:33:53'),
(56, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '325715', NULL, 'Piece', 'single', NULL, '17372900441895739096.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:34:04', '2025-01-19 12:34:04'),
(57, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '628573', NULL, 'Piece', 'single', NULL, '1737290056622193269.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:34:16', '2025-01-19 12:34:16'),
(58, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '922236', NULL, 'Piece', 'single', NULL, '1737290066911459551.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:34:26', '2025-01-19 12:34:26'),
(59, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '142994', NULL, 'Piece', 'single', NULL, '17372900761344995322.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:34:36', '2025-01-19 12:34:36'),
(60, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '971851', NULL, 'Piece', 'single', NULL, '1737290089423772226.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:34:49', '2025-01-19 12:34:49'),
(61, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '176587', NULL, 'Piece', 'single', NULL, '17372901011412332481.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:35:01', '2025-01-19 12:35:01'),
(62, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '216393', NULL, 'Piece', 'single', NULL, '17372901112049566585.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:35:11', '2025-01-19 12:35:11'),
(63, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '491312', NULL, 'Piece', 'single', NULL, '17372901291912339336.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:35:29', '2025-01-19 12:35:29'),
(64, 'Bedding Set (3 pieces)', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '892232', NULL, 'Piece', 'single', NULL, '1737290146711118997.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:35:46', '2025-01-19 12:35:46'),
(65, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '894666', NULL, 'Piece', 'single', NULL, '17372909861225514740.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:49:46', '2025-01-19 12:49:46'),
(66, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '549114', NULL, 'Piece', 'single', NULL, '17372910701861805135.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:51:10', '2025-01-19 12:51:10'),
(67, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '454253', NULL, 'Piece', 'single', NULL, '1737291375676595391.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:56:15', '2025-01-19 12:56:15'),
(68, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '732883', NULL, 'Piece', 'single', NULL, '1737291443846295091.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:57:23', '2025-01-19 12:57:23'),
(69, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '847225', NULL, 'Piece', 'single', NULL, '1737291472319085730.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:57:52', '2025-01-19 12:57:52'),
(70, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '648831', NULL, 'Piece', 'single', NULL, '1737291483815510386.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:58:03', '2025-01-19 12:58:03'),
(71, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '833843', NULL, 'Piece', 'single', NULL, '17372914921284602446.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:58:12', '2025-01-19 12:58:12'),
(72, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '995469', NULL, 'Piece', 'single', NULL, '17372915121656457984.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:58:32', '2025-01-19 12:58:32'),
(73, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '492739', NULL, 'Piece', 'single', NULL, '1737291519766507975.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:58:39', '2025-01-19 12:58:39'),
(74, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '967493', NULL, 'Piece', 'single', NULL, '1737291526207133046.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:58:46', '2025-01-19 12:58:46'),
(75, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '173873', NULL, 'Piece', 'single', NULL, '1737291545155968967.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:05', '2025-01-19 12:59:05'),
(76, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '124182', NULL, 'Piece', 'single', NULL, '1737291546866032010.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:06', '2025-01-19 12:59:06'),
(77, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '552798', NULL, 'Piece', 'single', NULL, '1737291556503610842.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:16', '2025-01-19 12:59:16'),
(78, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '378474', NULL, 'Piece', 'single', NULL, '17372915661962217362.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:26', '2025-01-19 12:59:26'),
(79, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '728681', NULL, 'Piece', 'single', NULL, '17372915721843545177.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:32', '2025-01-19 12:59:32'),
(80, 'Cushions', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '236111', NULL, 'Piece', 'single', NULL, '1737291577969489562.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:37', '2025-01-19 12:59:37'),
(81, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '139866', NULL, 'Piece', 'single', NULL, '1737291597116277246.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 12:59:57', '2025-01-19 12:59:57'),
(82, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '331256', NULL, 'Piece', 'single', NULL, '17372916301806417141.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:00:30', '2025-01-19 13:00:30'),
(83, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '453353', NULL, 'Piece', 'single', NULL, '17372916592097789348.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:00:59', '2025-01-19 13:00:59'),
(84, 'Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '115387', NULL, 'Piece', 'single', NULL, '17372916871181905719.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:01:27', '2025-01-19 13:01:27'),
(85, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '135898', NULL, 'Piece', 'single', NULL, '1737291783740054185.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:03:03', '2025-01-19 13:03:03'),
(86, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '466858', NULL, 'Piece', 'single', NULL, '1737291886304777904.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:04:46', '2025-01-19 13:04:46'),
(87, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '348217', NULL, 'Piece', 'single', NULL, '17372919001531528395.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:00', '2025-01-19 13:05:00'),
(88, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '843593', NULL, 'Piece', 'single', NULL, '1737291912700340939.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:12', '2025-01-19 13:05:12'),
(89, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '195134', NULL, 'Piece', 'single', NULL, '17372919211810723990.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:21', '2025-01-19 13:05:21'),
(90, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '782544', NULL, 'Piece', 'single', NULL, '1737291931941522035.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:31', '2025-01-19 13:05:31'),
(91, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '379676', NULL, 'Piece', 'single', NULL, '17372919401723406537.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:40', '2025-01-19 13:05:40'),
(92, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '113831', NULL, 'Piece', 'single', NULL, '1737291952158742423.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:05:52', '2025-01-19 13:05:52'),
(93, 'Comforter', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '161637', NULL, 'Piece', 'single', NULL, '1737292077.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:06:16', '2025-01-19 13:07:57'),
(94, 'Baby Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '222219', NULL, 'Piece', 'single', NULL, '17372921451514922349.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:09:05', '2025-01-19 13:09:05'),
(95, 'Baby Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '552631', NULL, 'Piece', 'single', NULL, '17372921981460078586.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:09:58', '2025-01-19 13:09:58'),
(96, 'Baby Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '412323', NULL, 'Piece', 'single', NULL, '17372922321860074889.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:10:32', '2025-01-19 13:10:32'),
(97, 'Baby Pillow', NULL, NULL, 0, 0, NULL, 0, 'no', 0, 0, 1, 1, 0, '0', '276937', NULL, 'Piece', 'single', NULL, '17372923101906503618.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2025-01-19 13:11:50', '2025-01-19 13:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `products_reviews`
--

CREATE TABLE `products_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_star` int(11) NOT NULL DEFAULT 5,
  `review_text` longtext DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0 COMMENT '1 means active, 0 means pending, 2 means rejected.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(50, 44, '17367463260.jpg', '2025-01-13 05:32:06', '2025-01-13 05:32:06'),
(51, 45, '17367463510.jpg', '2025-01-13 05:32:31', '2025-01-13 05:32:31'),
(54, 48, '17367464450.jpg', '2025-01-13 05:34:05', '2025-01-13 05:34:05'),
(56, 50, '17367464990.jpg', '2025-01-13 05:34:59', '2025-01-13 05:34:59'),
(57, 51, '17367465210.jpg', '2025-01-13 05:35:21', '2025-01-13 05:35:21'),
(58, 52, '17367465410.jpg', '2025-01-13 05:35:41', '2025-01-13 05:35:41'),
(59, 53, '17367466010.jpg', '2025-01-13 05:36:41', '2025-01-13 05:36:41'),
(60, 54, '17367466190.jpg', '2025-01-13 05:36:59', '2025-01-13 05:36:59'),
(61, 55, '17372900330.jpg', '2025-01-19 12:33:53', '2025-01-19 12:33:53'),
(62, 56, '17372900440.jpg', '2025-01-19 12:34:04', '2025-01-19 12:34:04'),
(63, 57, '17372900560.jpg', '2025-01-19 12:34:16', '2025-01-19 12:34:16'),
(64, 58, '17372900660.jpg', '2025-01-19 12:34:26', '2025-01-19 12:34:26'),
(65, 59, '17372900760.jpg', '2025-01-19 12:34:36', '2025-01-19 12:34:36'),
(66, 60, '17372900890.jpg', '2025-01-19 12:34:49', '2025-01-19 12:34:49'),
(67, 61, '17372901010.jpg', '2025-01-19 12:35:01', '2025-01-19 12:35:01'),
(68, 62, '17372901110.jpg', '2025-01-19 12:35:11', '2025-01-19 12:35:11'),
(69, 63, '17372901290.jpg', '2025-01-19 12:35:29', '2025-01-19 12:35:29'),
(70, 64, '17372901460.jpg', '2025-01-19 12:35:46', '2025-01-19 12:35:46'),
(71, 65, '17372909860.jpg', '2025-01-19 12:49:46', '2025-01-19 12:49:46'),
(72, 66, '17372910700.jpg', '2025-01-19 12:51:10', '2025-01-19 12:51:10'),
(73, 67, '17372913750.jpg', '2025-01-19 12:56:15', '2025-01-19 12:56:15'),
(74, 68, '17372914430.jpg', '2025-01-19 12:57:23', '2025-01-19 12:57:23'),
(75, 49, '17372914550.jpg', '2025-01-19 12:57:35', '2025-01-19 12:57:35'),
(76, 69, '17372914720.jpg', '2025-01-19 12:57:52', '2025-01-19 12:57:52'),
(77, 70, '17372914830.jpg', '2025-01-19 12:58:03', '2025-01-19 12:58:03'),
(78, 71, '17372914920.jpg', '2025-01-19 12:58:12', '2025-01-19 12:58:12'),
(79, 72, '17372915120.jpg', '2025-01-19 12:58:32', '2025-01-19 12:58:32'),
(80, 73, '17372915190.jpg', '2025-01-19 12:58:39', '2025-01-19 12:58:39'),
(81, 74, '17372915260.jpg', '2025-01-19 12:58:46', '2025-01-19 12:58:46'),
(82, 75, '17372915450.jpg', '2025-01-19 12:59:05', '2025-01-19 12:59:05'),
(83, 76, '17372915460.jpg', '2025-01-19 12:59:06', '2025-01-19 12:59:06'),
(84, 77, '17372915560.jpg', '2025-01-19 12:59:16', '2025-01-19 12:59:16'),
(85, 78, '17372915660.jpg', '2025-01-19 12:59:26', '2025-01-19 12:59:26'),
(86, 79, '17372915720.jpg', '2025-01-19 12:59:32', '2025-01-19 12:59:32'),
(87, 80, '17372915770.jpg', '2025-01-19 12:59:37', '2025-01-19 12:59:37'),
(88, 81, '17372915970.jpg', '2025-01-19 12:59:57', '2025-01-19 12:59:57'),
(89, 82, '17372916300.jpg', '2025-01-19 13:00:30', '2025-01-19 13:00:30'),
(90, 83, '17372916590.jpg', '2025-01-19 13:00:59', '2025-01-19 13:00:59'),
(91, 84, '17372916870.jpg', '2025-01-19 13:01:27', '2025-01-19 13:01:27'),
(92, 85, '17372917830.jpg', '2025-01-19 13:03:03', '2025-01-19 13:03:03'),
(93, 86, '17372918860.jpg', '2025-01-19 13:04:46', '2025-01-19 13:04:46'),
(94, 87, '17372919000.jpg', '2025-01-19 13:05:00', '2025-01-19 13:05:00'),
(95, 88, '17372919120.jpg', '2025-01-19 13:05:12', '2025-01-19 13:05:12'),
(96, 89, '17372919210.jpg', '2025-01-19 13:05:21', '2025-01-19 13:05:21'),
(97, 90, '17372919310.jpg', '2025-01-19 13:05:31', '2025-01-19 13:05:31'),
(98, 91, '17372919400.jpg', '2025-01-19 13:05:40', '2025-01-19 13:05:40'),
(99, 92, '17372919520.jpg', '2025-01-19 13:05:52', '2025-01-19 13:05:52'),
(101, 46, '17372920570.jpg', '2025-01-19 13:07:37', '2025-01-19 13:07:37'),
(102, 93, '17372920770.jpg', '2025-01-19 13:07:57', '2025-01-19 13:07:57'),
(103, 94, '17372921450.jpg', '2025-01-19 13:09:05', '2025-01-19 13:09:05'),
(104, 95, '17372921980.jpg', '2025-01-19 13:09:58', '2025-01-19 13:09:58'),
(105, 96, '17372922320.jpg', '2025-01-19 13:10:32', '2025-01-19 13:10:32'),
(106, 97, '17372923100.jpg', '2025-01-19 13:11:50', '2025-01-19 13:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `variant_output` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `color`, `variant`, `variant_output`, `sku`, `price`, `image`, `qty`, `is_active`, `created_at`, `updated_at`) VALUES
(66, 44, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:32:06', '2025-01-13 05:32:06'),
(67, 45, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:32:31', '2025-01-13 05:32:31'),
(70, 48, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:34:05', '2025-01-13 05:34:05'),
(72, 50, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:34:59', '2025-01-13 05:34:59'),
(73, 51, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:35:21', '2025-01-13 05:35:21'),
(74, 52, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:35:41', '2025-01-13 05:35:41'),
(75, 53, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:36:41', '2025-01-13 05:36:41'),
(76, 54, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-13 05:36:59', '2025-01-13 05:36:59'),
(77, 55, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:33:53', '2025-01-19 12:33:53'),
(78, 56, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:34:04', '2025-01-19 12:34:04'),
(79, 57, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:34:16', '2025-01-19 12:34:16'),
(80, 58, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:34:26', '2025-01-19 12:34:26'),
(81, 59, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:34:36', '2025-01-19 12:34:36'),
(82, 60, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:34:49', '2025-01-19 12:34:49'),
(83, 61, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:35:01', '2025-01-19 12:35:01'),
(84, 62, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:35:11', '2025-01-19 12:35:11'),
(85, 63, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:35:29', '2025-01-19 12:35:29'),
(86, 64, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:35:46', '2025-01-19 12:35:46'),
(87, 65, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:49:46', '2025-01-19 12:49:46'),
(88, 66, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:51:10', '2025-01-19 12:51:10'),
(89, 67, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:56:15', '2025-01-19 12:56:15'),
(91, 68, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:57:32', '2025-01-19 12:57:32'),
(92, 49, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-19 12:57:35', '2025-01-19 12:57:35'),
(93, 69, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:57:52', '2025-01-19 12:57:52'),
(94, 70, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:58:03', '2025-01-19 12:58:03'),
(95, 71, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:58:12', '2025-01-19 12:58:12'),
(96, 72, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:58:32', '2025-01-19 12:58:32'),
(97, 73, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:58:39', '2025-01-19 12:58:39'),
(98, 74, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:58:46', '2025-01-19 12:58:46'),
(99, 75, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:59:05', '2025-01-19 12:59:05'),
(100, 76, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:59:06', '2025-01-19 12:59:06'),
(101, 77, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:59:16', '2025-01-19 12:59:16'),
(102, 78, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 12:59:26', '2025-01-19 12:59:26'),
(103, 79, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:59:32', '2025-01-19 12:59:32'),
(104, 80, NULL, NULL, NULL, NULL, '1000', NULL, '99', 1, '2025-01-19 12:59:37', '2025-01-19 16:03:25'),
(105, 81, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 12:59:57', '2025-01-19 12:59:57'),
(106, 82, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:00:30', '2025-01-19 13:00:30'),
(107, 83, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:00:59', '2025-01-19 13:00:59'),
(108, 84, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:01:27', '2025-01-19 13:01:27'),
(109, 85, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:03:03', '2025-01-19 13:03:03'),
(110, 86, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:04:46', '2025-01-19 13:04:46'),
(111, 87, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:00', '2025-01-19 13:05:00'),
(112, 88, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:12', '2025-01-19 13:05:12'),
(113, 89, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:21', '2025-01-19 13:05:21'),
(114, 90, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:31', '2025-01-19 13:05:31'),
(115, 91, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:40', '2025-01-19 13:05:40'),
(116, 92, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:05:52', '2025-01-19 13:05:52'),
(118, 46, NULL, NULL, NULL, NULL, '100', NULL, '100', 1, '2025-01-19 13:07:37', '2025-01-19 13:07:37'),
(119, 93, NULL, NULL, NULL, NULL, '1000', NULL, '100', 1, '2025-01-19 13:07:57', '2025-01-19 13:07:57'),
(120, 94, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:09:05', '2025-01-19 13:09:05'),
(121, 95, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:09:58', '2025-01-19 13:09:58'),
(122, 96, NULL, NULL, NULL, NULL, '1000', NULL, '1000', 1, '2025-01-19 13:10:32', '2025-01-19 13:10:32'),
(123, 97, NULL, NULL, NULL, NULL, '1000', NULL, '999', 1, '2025-01-19 13:11:50', '2025-01-19 16:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_with_categories`
--

CREATE TABLE `product_with_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_with_categories`
--

INSERT INTO `product_with_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 2, 4, '2024-11-30 08:27:53', '2024-11-30 08:27:53'),
(8, 2, 2, '2024-11-30 08:29:25', '2024-11-30 08:29:25'),
(9, 2, 3, '2024-11-30 08:29:40', '2024-11-30 08:29:40'),
(10, 2, 1, '2024-11-30 08:30:44', '2024-11-30 08:30:44'),
(11, 3, 5, '2024-11-30 08:33:27', '2024-11-30 08:33:27'),
(15, 3, 9, '2024-11-30 08:35:03', '2024-11-30 08:35:03'),
(16, 3, 7, '2024-11-30 08:35:44', '2024-11-30 08:35:44'),
(17, 3, 6, '2024-11-30 08:36:27', '2024-11-30 08:36:27'),
(18, 5, 10, '2024-11-30 10:44:49', '2024-11-30 10:44:49'),
(22, 5, 13, '2024-11-30 10:50:24', '2024-11-30 10:50:24'),
(23, 5, 12, '2024-11-30 10:50:34', '2024-11-30 10:50:34'),
(24, 5, 11, '2024-11-30 10:50:41', '2024-11-30 10:50:41'),
(25, 1, 14, '2024-11-30 10:55:52', '2024-11-30 10:55:52'),
(26, 1, 15, '2024-11-30 10:57:08', '2024-11-30 10:57:08'),
(27, 1, 16, '2024-11-30 10:58:38', '2024-11-30 10:58:38'),
(28, 1, 17, '2024-11-30 10:59:52', '2024-11-30 10:59:52'),
(29, 6, 18, '2024-11-30 11:01:44', '2024-11-30 11:01:44'),
(30, 6, 19, '2024-11-30 11:02:17', '2024-11-30 11:02:17'),
(31, 6, 20, '2024-11-30 11:03:23', '2024-11-30 11:03:23'),
(32, 6, 21, '2024-11-30 11:03:56', '2024-11-30 11:03:56'),
(33, 6, 22, '2024-11-30 11:07:13', '2024-11-30 11:07:13'),
(34, 6, 23, '2024-11-30 11:09:55', '2024-11-30 11:09:55'),
(35, 1, 24, '2024-11-30 11:10:21', '2024-11-30 11:10:21'),
(36, 5, 25, '2024-11-30 11:14:12', '2024-11-30 11:14:12'),
(37, 4, 26, '2024-11-30 11:18:26', '2024-11-30 11:18:26'),
(38, 4, 27, '2024-11-30 11:20:55', '2024-11-30 11:20:55'),
(39, 4, 28, '2024-11-30 11:40:30', '2024-11-30 11:40:30'),
(40, 4, 29, '2024-11-30 11:42:03', '2024-11-30 11:42:03'),
(41, 4, 30, '2024-11-30 11:45:14', '2024-11-30 11:45:14'),
(50, 3, 38, '2024-12-01 06:04:20', '2024-12-01 06:04:20'),
(51, 3, 37, '2024-12-01 06:04:32', '2024-12-01 06:04:32'),
(52, 3, 36, '2024-12-01 06:04:42', '2024-12-01 06:04:42'),
(53, 3, 35, '2024-12-01 06:04:52', '2024-12-01 06:04:52'),
(54, 2, 34, '2024-12-01 06:11:56', '2024-12-01 06:11:56'),
(55, 2, 33, '2024-12-01 06:12:14', '2024-12-01 06:12:14'),
(56, 2, 32, '2024-12-01 06:12:25', '2024-12-01 06:12:25'),
(57, 2, 31, '2024-12-01 06:12:35', '2024-12-01 06:12:35'),
(58, 3, 8, '2024-12-01 06:13:40', '2024-12-01 06:13:40'),
(59, 5, 39, '2024-12-05 08:09:50', '2024-12-05 08:09:50'),
(60, 5, 40, '2024-12-05 08:22:21', '2024-12-05 08:22:21'),
(61, 5, 41, '2024-12-05 08:50:24', '2024-12-05 08:50:24'),
(62, 5, 42, '2024-12-05 08:52:27', '2024-12-05 08:52:27'),
(63, 7, 43, '2025-01-13 05:31:30', '2025-01-13 05:31:30'),
(64, 13, 44, '2025-01-13 05:32:06', '2025-01-13 05:32:06'),
(65, 14, 45, '2025-01-13 05:32:31', '2025-01-13 05:32:31'),
(67, 16, 47, '2025-01-13 05:33:37', '2025-01-13 05:33:37'),
(68, 24, 48, '2025-01-13 05:34:05', '2025-01-13 05:34:05'),
(70, 29, 50, '2025-01-13 05:34:59', '2025-01-13 05:34:59'),
(71, 30, 51, '2025-01-13 05:35:21', '2025-01-13 05:35:21'),
(72, 31, 52, '2025-01-13 05:35:41', '2025-01-13 05:35:41'),
(73, 32, 53, '2025-01-13 05:36:41', '2025-01-13 05:36:41'),
(74, 33, 54, '2025-01-13 05:36:59', '2025-01-13 05:36:59'),
(75, 7, 55, '2025-01-19 12:33:53', '2025-01-19 12:33:53'),
(76, 7, 56, '2025-01-19 12:34:04', '2025-01-19 12:34:04'),
(77, 7, 57, '2025-01-19 12:34:16', '2025-01-19 12:34:16'),
(78, 7, 58, '2025-01-19 12:34:26', '2025-01-19 12:34:26'),
(79, 7, 59, '2025-01-19 12:34:36', '2025-01-19 12:34:36'),
(80, 7, 60, '2025-01-19 12:34:49', '2025-01-19 12:34:49'),
(81, 7, 61, '2025-01-19 12:35:01', '2025-01-19 12:35:01'),
(82, 7, 62, '2025-01-19 12:35:11', '2025-01-19 12:35:11'),
(83, 7, 63, '2025-01-19 12:35:29', '2025-01-19 12:35:29'),
(84, 7, 64, '2025-01-19 12:35:46', '2025-01-19 12:35:46'),
(85, 25, 65, '2025-01-19 12:49:46', '2025-01-19 12:49:46'),
(86, 25, 66, '2025-01-19 12:51:10', '2025-01-19 12:51:10'),
(87, 16, 67, '2025-01-19 12:56:15', '2025-01-19 12:56:15'),
(88, 16, 68, '2025-01-19 12:57:32', '2025-01-19 12:57:32'),
(89, 25, 49, '2025-01-19 12:57:35', '2025-01-19 12:57:35'),
(90, 25, 69, '2025-01-19 12:57:52', '2025-01-19 12:57:52'),
(91, 16, 70, '2025-01-19 12:58:03', '2025-01-19 12:58:03'),
(92, 25, 71, '2025-01-19 12:58:12', '2025-01-19 12:58:12'),
(93, 25, 72, '2025-01-19 12:58:32', '2025-01-19 12:58:32'),
(94, 16, 73, '2025-01-19 12:58:39', '2025-01-19 12:58:39'),
(95, 25, 74, '2025-01-19 12:58:46', '2025-01-19 12:58:46'),
(96, 25, 75, '2025-01-19 12:59:05', '2025-01-19 12:59:05'),
(97, 16, 76, '2025-01-19 12:59:06', '2025-01-19 12:59:06'),
(98, 25, 77, '2025-01-19 12:59:16', '2025-01-19 12:59:16'),
(99, 25, 78, '2025-01-19 12:59:26', '2025-01-19 12:59:26'),
(100, 16, 79, '2025-01-19 12:59:32', '2025-01-19 12:59:32'),
(101, 25, 80, '2025-01-19 12:59:37', '2025-01-19 12:59:37'),
(102, 16, 81, '2025-01-19 12:59:57', '2025-01-19 12:59:57'),
(103, 16, 82, '2025-01-19 13:00:30', '2025-01-19 13:00:30'),
(104, 16, 83, '2025-01-19 13:00:59', '2025-01-19 13:00:59'),
(105, 16, 84, '2025-01-19 13:01:27', '2025-01-19 13:01:27'),
(106, 15, 85, '2025-01-19 13:03:03', '2025-01-19 13:03:03'),
(107, 15, 86, '2025-01-19 13:04:46', '2025-01-19 13:04:46'),
(108, 15, 87, '2025-01-19 13:05:00', '2025-01-19 13:05:00'),
(109, 15, 88, '2025-01-19 13:05:12', '2025-01-19 13:05:12'),
(110, 15, 89, '2025-01-19 13:05:21', '2025-01-19 13:05:21'),
(111, 15, 90, '2025-01-19 13:05:31', '2025-01-19 13:05:31'),
(112, 15, 91, '2025-01-19 13:05:40', '2025-01-19 13:05:40'),
(113, 15, 92, '2025-01-19 13:05:52', '2025-01-19 13:05:52'),
(115, 15, 46, '2025-01-19 13:07:37', '2025-01-19 13:07:37'),
(116, 15, 93, '2025-01-19 13:07:57', '2025-01-19 13:07:57'),
(117, 19, 94, '2025-01-19 13:09:05', '2025-01-19 13:09:05'),
(118, 19, 95, '2025-01-19 13:09:58', '2025-01-19 13:09:58'),
(119, 19, 96, '2025-01-19 13:10:32', '2025-01-19 13:10:32'),
(120, 19, 97, '2025-01-19 13:11:50', '2025-01-19 13:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `registration_points`
--

CREATE TABLE `registration_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` double DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tiny` longtext DEFAULT NULL,
  `google_map_link` longtext DEFAULT NULL,
  `google_map_embed` longtext DEFAULT NULL,
  `google_tag_manager_head` longtext DEFAULT NULL,
  `google_tag_manager_body` longtext DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `custom_css` longtext DEFAULT NULL,
  `custom_js` longtext DEFAULT NULL,
  `minimum_point` varchar(255) DEFAULT '0',
  `equivalent_point` varchar(255) DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `header_logo`, `footer_logo`, `favicon`, `email`, `phone`, `address`, `tiny`, `google_map_link`, `google_map_embed`, `google_tag_manager_head`, `google_tag_manager_body`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `custom_css`, `custom_js`, `minimum_point`, `equivalent_point`, `meta_title`, `meta_description`, `meta_tag`, `meta_keywords`, `meta_image`, `created_at`, `updated_at`) VALUES
(1, 'Pizeon', '1736325689228003217.png', '1736322645723382095.png', 'favicon_17363226451158741880.png', 'info.pizeon@gmail.com', '+8801841978901', 'Uttara Square Shopping Mall, Shop No. 317, 3rd Floor, Sonargaon Janapath Road, Uttara Sector 13, Dhaka-1230, Bangladesh.', '01623 771241', NULL, NULL, NULL, NULL, 'https://www.facebook.com/pizeonluxurylinens', 'https://www.instagram.com/pizeonluxurylinens', 'https://www.pinterest.com/pizeonl/', 'https://m.youtube.com/@pizeonluxurylinens', 'https://www.pinterest.com/pizeonl/', NULL, NULL, '0', '0', 'Pizeon', 'Welcome to Pizeon Luxury Linens! Discover our collection of imported luxurious and cozy bedding, featuring plush sheets, elegant linens, and soft throws. Our carefully crafted pieces will transform your home into a stylish and comfortable haven.', 'Pizeon', 'Pizeon', NULL, NULL, '2025-01-23 06:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `serial_number`, `title`, `description`, `image`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Slider 1', NULL, '1736324988.jpg', NULL, 1, '2024-11-30 05:15:18', '2025-01-08 08:29:48'),
(2, 2, 'Slider 2', NULL, '1736325001.jpg', NULL, 1, '2024-11-30 05:15:35', '2025-01-08 08:30:01'),
(3, 3, 'Slider 3', NULL, '1736325012.jpg', NULL, 1, '2024-11-30 05:15:49', '2025-01-08 08:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `slider_side_banners`
--

CREATE TABLE `slider_side_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_side_banners`
--

INSERT INTO `slider_side_banners` (`id`, `serial_number`, `title`, `description`, `image`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Right side banner 1', NULL, '1736325726.jpg', NULL, 1, '2024-11-30 05:24:36', '2025-01-08 08:42:06'),
(2, 2, 'Right side banner 2', NULL, '1736327810.jpg', NULL, 1, '2024-11-30 05:24:53', '2025-01-08 09:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `tran_id` varchar(255) DEFAULT NULL,
  `which_payment` varchar(255) DEFAULT NULL COMMENT 'order payment, wallet',
  `payment_method` varchar(255) DEFAULT NULL COMMENT 'online payment, wallet money, cash on delivery payment',
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `store_amount` varchar(255) NOT NULL DEFAULT '0',
  `minus_amount` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `file_original_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '2' COMMENT '1 = admin, 2 = customer, 3 = crm',
  `districts` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `referral_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_phone_verified` int(11) NOT NULL DEFAULT 0,
  `wallet_amount` varchar(255) NOT NULL DEFAULT '0',
  `used_wallet_amount` varchar(255) NOT NULL DEFAULT '0',
  `wallet_point` varchar(255) NOT NULL DEFAULT '0',
  `used_wallet_point` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `phone`, `type`, `districts`, `city`, `address`, `image`, `is_active`, `referral_id`, `email_verified_at`, `verification_code`, `is_phone_verified`, `wallet_amount`, `used_wallet_amount`, `wallet_point`, `used_wallet_point`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'pizeon@gmail.com', '01766996853', '1', NULL, NULL, NULL, NULL, 1, NULL, '2025-01-21 05:30:35', '165819', 1, '0', '0', '0', '0', '$2y$10$m9DM9TBF1qqSE3pPCd0qT.ARSa.pkb/4uebMrVGqbUjhoYbZYXNV6', NULL, '2025-01-21 05:30:35', '2025-01-21 05:30:35'),
(11, 'A Hoque', NULL, 'akram@gmail.com', '01590090375', '1', NULL, 'Chittagong', NULL, NULL, 1, NULL, NULL, NULL, 0, '0', '0', '0', '0', '$2y$10$cIWqgJAZsDLJajYaqC2WfuD1thMIrCA/4Bq0y2RXKP/3xdBt4bpxG', NULL, '2025-01-24 19:11:10', '2025-01-24 19:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bn_title` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `amount` double UNSIGNED NOT NULL DEFAULT 0,
  `used_amount` double UNSIGNED NOT NULL DEFAULT 0,
  `point` double UNSIGNED NOT NULL DEFAULT 0,
  `used_point` double UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_entries`
--

CREATE TABLE `wallet_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` int(10) UNSIGNED NOT NULL,
  `cash_in` double DEFAULT NULL,
  `cash_out` double DEFAULT NULL,
  `point_in` double DEFAULT NULL,
  `point_out` double DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `in_or_out` varchar(255) DEFAULT NULL,
  `point_or_wallet_tk` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `for_which` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wholesales`
--

CREATE TABLE `wholesales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variations` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_id_index` (`id`),
  ADD KEY `areas_district_id_index` (`district_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_bn_name_index` (`bn_name`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_id_index` (`id`),
  ADD KEY `blogs_title_index` (`title`),
  ADD KEY `blogs_bn_title_index` (`bn_title`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_id_index` (`id`),
  ADD KEY `brands_title_index` (`title`),
  ADD KEY `brands_bn_title_index` (`bn_title`),
  ADD KEY `brands_is_active_index` (`is_active`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_index` (`customer_id`),
  ADD KEY `carts_product_id_index` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id_index` (`id`),
  ADD KEY `categories_title_index` (`title`),
  ADD KEY `categories_bn_title_index` (`bn_title`),
  ADD KEY `categories_is_featured_index` (`is_featured`),
  ADD KEY `categories_is_menu_item_index` (`is_menu_item`),
  ADD KEY `categories_publish_product_in_home_page_index` (`publish_product_in_home_page`),
  ADD KEY `categories_is_active_index` (`is_active`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_bn_name_index` (`bn_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_id_index` (`id`);

--
-- Indexes for table `delivery_courier_infos`
--
ALTER TABLE `delivery_courier_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_courier_infos_order_code_index` (`order_code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_id_index` (`id`),
  ADD KEY `districts_bn_name_index` (`bn_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flash_sale_offers`
--
ALTER TABLE `flash_sale_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_offers_id_index` (`id`);

--
-- Indexes for table `flash_sale_offer_products`
--
ALTER TABLE `flash_sale_offer_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_offer_products_id_index` (`id`),
  ADD KEY `flash_sale_offer_products_flash_sale_id_index` (`flash_sale_id`),
  ADD KEY `flash_sale_offer_products_product_id_index` (`product_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_id_index` (`id`);

--
-- Indexes for table `home_page_four_banners`
--
ALTER TABLE `home_page_four_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_id_index` (`id`),
  ADD KEY `orders_code_index` (`code`),
  ADD KEY `orders_customer_id_index` (`customer_id`),
  ADD KEY `orders_phone_index` (`phone`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_customer_id_index` (`customer_id`),
  ADD KEY `order_products_order_code_index` (`order_code`),
  ADD KEY `order_products_product_id_index` (`product_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_id_index` (`id`),
  ADD KEY `pages_page_slug_index` (`page_slug`),
  ADD KEY `pages_name_index` (`name`),
  ADD KEY `pages_bn_name_index` (`bn_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_index` (`id`),
  ADD KEY `products_title_index` (`title`),
  ADD KEY `products_bn_title_index` (`bn_title`),
  ADD KEY `products_brand_id_index` (`brand_id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_sub_category_id_index` (`sub_category_id`),
  ADD KEY `products_discount_type_index` (`discount_type`),
  ADD KEY `products_is_featured_index` (`is_featured`),
  ADD KEY `products_is_tranding_index` (`is_tranding`),
  ADD KEY `products_code_index` (`code`),
  ADD KEY `products_weight_index` (`weight`),
  ADD KEY `products_type_index` (`type`),
  ADD KEY `products_feature_index` (`feature`(768)),
  ADD KEY `products_bn_feature_index` (`bn_feature`(768)),
  ADD KEY `products_description_index` (`description`(768)),
  ADD KEY `products_bn_description_index` (`bn_description`(768)),
  ADD KEY `products_is_active_index` (`is_active`);

--
-- Indexes for table `products_reviews`
--
ALTER TABLE `products_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_reviews_customer_id_index` (`customer_id`),
  ADD KEY `products_reviews_order_code_index` (`order_code`),
  ADD KEY `products_reviews_order_product_id_index` (`order_product_id`),
  ADD KEY `products_reviews_product_id_index` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_id_index` (`id`),
  ADD KEY `product_images_product_id_index` (`product_id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stocks_product_id_index` (`product_id`),
  ADD KEY `product_stocks_variant_index` (`variant`);

--
-- Indexes for table `product_with_categories`
--
ALTER TABLE `product_with_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_with_categories_category_id_index` (`category_id`),
  ADD KEY `product_with_categories_product_id_index` (`product_id`);

--
-- Indexes for table `registration_points`
--
ALTER TABLE `registration_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_points_id_index` (`id`),
  ADD KEY `registration_points_valid_from_index` (`valid_from`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_id_index` (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_id_index` (`id`),
  ADD KEY `sliders_serial_number_index` (`serial_number`);

--
-- Indexes for table `slider_side_banners`
--
ALTER TABLE `slider_side_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_side_banners_serial_number_index` (`serial_number`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_id_index` (`id`),
  ADD KEY `variations_bn_title_index` (`bn_title`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_entries`
--
ALTER TABLE `wallet_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesales`
--
ALTER TABLE `wholesales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_id_index` (`id`),
  ADD KEY `wishlists_customer_id_index` (`customer_id`),
  ADD KEY `wishlists_product_id_index` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_courier_infos`
--
ALTER TABLE `delivery_courier_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale_offers`
--
ALTER TABLE `flash_sale_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale_offer_products`
--
ALTER TABLE `flash_sale_offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page_four_banners`
--
ALTER TABLE `home_page_four_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `products_reviews`
--
ALTER TABLE `products_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `product_with_categories`
--
ALTER TABLE `product_with_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `registration_points`
--
ALTER TABLE `registration_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider_side_banners`
--
ALTER TABLE `slider_side_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_entries`
--
ALTER TABLE `wallet_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wholesales`
--
ALTER TABLE `wholesales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
