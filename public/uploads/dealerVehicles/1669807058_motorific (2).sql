-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorific`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hear_about_us` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy` tinyint(1) NOT NULL DEFAULT 0,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_makes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specific_makes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lowest_purchase_price` int(11) NOT NULL,
  `highest_purchase_price` int(11) NOT NULL,
  `age_range_from` int(11) NOT NULL,
  `age_range_to` int(11) NOT NULL,
  `mileage_from` int(11) NOT NULL,
  `mileage_to` int(11) NOT NULL,
  `how_far_distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_each_month_vehicles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_thing_else` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1 = Approve Dealers , 2 = Block Dealers',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `full_name`, `company_name`, `position`, `mobile_number`, `email`, `hear_about_us`, `privacy_policy`, `address_line_1`, `address_line_2`, `city`, `postcode`, `company_type`, `website`, `company_phone`, `all_makes`, `specific_makes`, `lowest_purchase_price`, `highest_purchase_price`, `age_range_from`, `age_range_to`, `mileage_from`, `mileage_to`, `how_far_distance`, `purchase_each_month_vehicles`, `any_thing_else`, `dealer_status`, `created_at`, `updated_at`) VALUES
(1, 'asddfs', 'dssdfdfs', 'sdfsdf', '342234', 'nasar.ullah@oip.com.pk', 'sdfdfs', 0, 'fsdsdf', 'sdfsdf', 'sdfsdf', 'PO16 7GZ', 'sdfsdf', 'https://motorway.co.uk/account', 'sdfsdf', 'sdfsdf', 'sdfsdf', 33, 234, 234, 32, 222, 32, '325', '2', 'dfssdfsdf', '0', '2022-10-19 00:13:31', '2022-10-19 00:15:48'),
(2, 'asddfs', 'dssdfdfs', 'sdfsdf', '342234', 'superadmin@gmail.com', 'sdfdfs', 0, 'fsdsdf', 'sdfsdf', 'sdfsdf', 'PO16 7GZ', 'sdfsdf', 'https://motorway.co.uk/account', '545454', 'sdfsdf', 'sdfsdf', 234, 234, 234, 234, 234, 234, '34', '2', 'dfssdfsdf', '1', '2022-10-19 01:02:47', '2022-10-19 01:04:01'),
(3, 'asddfs', 'dssdfdfs', 'sdfsdf', '342234', 'nasar.ullah@oip.com.pk', 'sdfdfs', 0, 'fsdsdf', 'sdfsdf', 'sdfsdf', 'PO16 7GZ', 'sdfsdf', 'https://motorway.co.uk/account', '4243243', 'sdfsdf', 'sdfsdf', 234, 234, 234, 234, 234, 234, '34', '2', 'dfssdfsdf', '2', '2022-10-21 07:56:22', '2022-10-21 07:56:22'),
(4, 'asddfs', 'dssdfdfs', 'sdfsdf', '342234', 'info@drycleanersnearme.co.uk', 'sdfdfs', 0, 'fsdsdf', 'sdfsdf', 'sdfsdf', 'PO16 7GZ', 'sdfsdf', 'https://motorway.co.uk/account', '53455443', 'sdfsdf', 'sdfsdf', 788785, 234, 234, 234, 234, 234, '34', '2', 'dfssdfsdf', '2', '2022-10-24 07:25:58', '2022-10-24 07:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_details`
--

CREATE TABLE `dealer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dealer_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_perchasing_requirements`
--

CREATE TABLE `dealer_perchasing_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dealer_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `all_makes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specific_makes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lowest_purchase_price` int(11) NOT NULL,
  `highest_purchase_price` int(11) NOT NULL,
  `age_range_from` int(11) NOT NULL,
  `age_range_to` int(11) NOT NULL,
  `mileage_from` int(11) NOT NULL,
  `mileage_to` int(11) NOT NULL,
  `how_far_distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_each_month_vehicles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_thing_else` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'On finance', 'If your vehicle currently has any finance remaining, whether PCP or HP, or any other type of loan or finance, please select\r\n“On finance”.', '1', NULL, NULL, NULL),
(2, 'Not on finance', 'If your vehicle currently has any finance remaining, whether PCP or HP, or any other type of loan or finance, please select\r\n“On finance”.', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locking_wheel_nuts`
--

CREATE TABLE `locking_wheel_nuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locking_wheel_nuts`
--

INSERT INTO `locking_wheel_nuts` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Locking wheel nut included', NULL, NULL, '1', '2022-10-25 04:30:24', '2022-10-25 04:30:24', NULL),
(2, 'Locking wheel nut missing', NULL, NULL, '1', '2022-10-25 04:30:24', '2022-10-25 04:30:24', NULL),
(3, 'Wheels do not have locking nuts', NULL, NULL, '1', '2022-10-25 04:30:24', '2022-10-25 04:30:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_09_22_044133_create_roles_table', 1),
(5, '2022_09_30_072755_create_dealers_table', 1),
(6, '2022_09_30_075415_create_dealer_details_table', 1),
(7, '2022_09_30_080036_create_dealer_perchasing_requirements_table', 1),
(8, '2022_10_19_095912_create_vehicle_features_table', 2),
(9, '2022_10_19_100512_create_seat_materials_table', 2),
(10, '2022_10_19_100703_create_number_of_keys_table', 2),
(11, '2022_10_19_100949_create_tool_packs_table', 2),
(12, '2022_10_19_101122_create_locking_wheel_nuts_table', 2),
(13, '2022_10_19_101239_create_smokings_table', 2),
(14, '2022_10_19_101747_create_v_c_log_books_table', 2),
(15, '2022_10_19_101902_create_vehicle_locations_table', 2),
(16, '2022_10_19_101957_create_vehicle_owners_table', 2),
(17, '2022_10_19_102045_create_private_plates_table', 2),
(18, '2022_10_19_103002_create_finances_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `number_of_keys`
--

CREATE TABLE `number_of_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_of_key` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `number_of_keys`
--

INSERT INTO `number_of_keys` (`id`, `number_of_key`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, '1', '2022-10-24 01:27:45', '2022-10-24 01:28:42', NULL),
(2, 2, '1', '2022-10-24 01:27:45', '2022-10-24 01:27:45', NULL),
(3, 3, '1', '2022-10-24 01:27:45', '2022-10-24 01:27:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private_plates`
--

CREATE TABLE `private_plates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `private_plates`
--

INSERT INTO `private_plates` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Normal registration plate', '1666690760_hasPrivatePlateFalse.ff072b142ba39e329b3f.jpg', '1', '2022-10-25 04:39:20', '2022-10-25 04:39:20', NULL),
(2, 'Private plate', '1666690760_hasPrivatePlateTrue.da9d72c2a010d13b77bd.jpg', '1', '2022-10-25 04:39:20', '2022-10-25 04:39:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_permission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_materials`
--

CREATE TABLE `seat_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_materials`
--

INSERT INTO `seat_materials` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cloth', '1666259185_cloth.6eb509e7b3c99de4ab77.jpg', '1', '2022-10-20 04:46:25', '2022-10-20 04:46:25', NULL),
(2, 'Faux leather', '1666259185_fauxLeather.2859bbf657ac30f67080.jpg', '1', '2022-10-20 04:46:25', '2022-10-20 04:46:25', NULL),
(3, 'Half leather', '1666259393_fauxLeather.2859bbf657ac30f67080.jpg', '1', '2022-10-20 04:49:53', '2022-10-20 04:49:53', NULL),
(4, 'Half suede', '1666259393_halfSuede.a6409ef516f46f5d4abe.jpg', '1', '2022-10-20 04:49:53', '2022-10-20 04:49:53', NULL),
(5, 'Leather', '1666259393_leather.3682390b47b9698e01d8.jpg', '1', '2022-10-20 04:49:53', '2022-10-20 04:49:53', NULL),
(6, 'Suede', '1666259393_suede.0f161bdd08316f25c29e.jpg', '1', '2022-10-20 04:49:53', '2022-10-20 04:49:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smokings`
--

CREATE TABLE `smokings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smokings`
--

INSERT INTO `smokings` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vehicle has not been smoked in', NULL, '1', '2022-10-25 04:34:31', '2022-10-25 04:34:31', NULL),
(2, 'Vehicle has been smoked in', NULL, '1', '2022-10-25 04:34:31', '2022-10-25 04:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tool_packs`
--

CREATE TABLE `tool_packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_packs`
--

INSERT INTO `tool_packs` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tool pack included', NULL, NULL, '1', '2022-10-25 04:28:45', '2022-10-25 04:28:45', NULL),
(2, 'Tool pack missing', NULL, NULL, '1', '2022-10-25 04:28:45', '2022-10-25 04:28:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Admin , 2 = User',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mile_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `post_code`, `phone_number`, `mile_age`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$3QJnJMO/e8518CySlDij5udJ7nVpuXZE3MYMJsCHRxWwvmopen3a.', '32', '324342', '3', '1', NULL, '2022-10-17 08:01:21', '2022-10-17 08:01:21'),
(2, 2, 'nasr', 'nasar.ullah@oip.com.pk', NULL, '$2y$10$89icdbMZnxh2U/1fBYpbuOolHdmwv9ytZJof816M8GoMxJV1GZYr.', '2433', '324324', '32', '1', NULL, '2022-10-18 00:01:09', '2022-10-18 00:01:09'),
(3, 2, 'nasr', 'muhammad.mairaj@oip.com.pk', NULL, '$2y$10$RVUahB8CPC/xxuqXsNUXVu4Y3eepFWExS2omGOQwStAO2ct9p.UG6', '234234', '2343', '2433', '1', NULL, '2022-10-18 00:13:25', '2022-10-18 00:13:25'),
(4, 2, 'afsds', 'info@drycleanersnearme.co.uk', NULL, '$2y$10$bkimei3seBybn7WV0TBB6.Egv.6MNKzWQm9QMvY3SYHq1LH7vfuNa', '22454', '12225', '444', '1', NULL, '2022-10-18 00:19:52', '2022-10-18 00:19:52'),
(5, 2, 'fsss', 'phpbasic20193@gmail.com', NULL, '$2y$10$fOsWZwjNdROhzP6SMsz8ne33b11ge5dcLYAPWwqaDzq7s.aet.zDi', '234234', '43432', '324342', '1', NULL, '2022-10-18 00:31:11', '2022-10-18 00:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_features`
--

CREATE TABLE `vehicle_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_features`
--

INSERT INTO `vehicle_features` (`id`, `title`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Sat nav', '1', '2022-10-19 07:38:39', '2022-10-20 05:25:40', '2022-10-20 05:25:40'),
(5, 'Panoramic roof', '1', '2022-10-19 07:38:39', '2022-10-20 05:25:37', '2022-10-20 05:25:37'),
(6, 'Sat nav', '1', '2022-10-20 05:26:20', '2022-10-20 05:26:20', NULL),
(7, 'Panoramic roof', '1', '2022-10-20 05:26:20', '2022-10-20 05:26:20', NULL),
(8, 'Heated seats', '1', '2022-10-20 05:26:20', '2022-10-20 05:26:20', NULL),
(9, 'Rear parking camera', '1', '2022-10-20 05:26:58', '2022-10-20 05:26:58', NULL),
(10, 'Upgraded sound system', '1', '2022-10-20 05:26:58', '2022-10-20 05:26:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_locations`
--

CREATE TABLE `vehicle_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_owners`
--

CREATE TABLE `vehicle_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_owners`
--

INSERT INTO `vehicle_owners` (`id`, `title`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Me', '1', '2022-10-25 04:36:17', '2022-10-25 04:36:17', NULL),
(2, 'Someone else', '1', '2022-10-25 04:36:17', '2022-10-25 04:36:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v_c_log_books`
--

CREATE TABLE `v_c_log_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_c_log_books`
--

INSERT INTO `v_c_log_books` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'I can provide the V5C logbook once sold', NULL, NULL, '1', '2022-10-25 04:35:30', '2022-10-25 04:35:30', NULL),
(2, 'I’ve lost the V5C logbook', NULL, NULL, '1', '2022-10-25 04:35:30', '2022-10-25 04:35:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer_details`
--
ALTER TABLE `dealer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer_perchasing_requirements`
--
ALTER TABLE `dealer_perchasing_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locking_wheel_nuts`
--
ALTER TABLE `locking_wheel_nuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `number_of_keys`
--
ALTER TABLE `number_of_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `private_plates`
--
ALTER TABLE `private_plates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `seat_materials`
--
ALTER TABLE `seat_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smokings`
--
ALTER TABLE `smokings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool_packs`
--
ALTER TABLE `tool_packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_features`
--
ALTER TABLE `vehicle_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_locations`
--
ALTER TABLE `vehicle_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_c_log_books`
--
ALTER TABLE `v_c_log_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dealer_details`
--
ALTER TABLE `dealer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_perchasing_requirements`
--
ALTER TABLE `dealer_perchasing_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locking_wheel_nuts`
--
ALTER TABLE `locking_wheel_nuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `number_of_keys`
--
ALTER TABLE `number_of_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `private_plates`
--
ALTER TABLE `private_plates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_materials`
--
ALTER TABLE `seat_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `smokings`
--
ALTER TABLE `smokings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tool_packs`
--
ALTER TABLE `tool_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_features`
--
ALTER TABLE `vehicle_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_locations`
--
ALTER TABLE `vehicle_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_c_log_books`
--
ALTER TABLE `v_c_log_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
