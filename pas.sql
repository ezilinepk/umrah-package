-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 02:16 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uid`, `name`, `created_at`, `updated_at`) VALUES
(2, '92d3dcb44c9267236740355a7a0eedfb', 'English', '2022-04-13 02:04:15', '2022-04-13 02:04:15');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `changed_by` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `paper_id`, `changed_by`, `type`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 17, 2, 'created', 'pending', 'Paper Created', '2022-05-29 06:20:55', '2022-05-29 06:20:55'),
(2, 17, 2, 'updated', 'pending', 'Paper Updated', '2022-05-29 06:21:36', '2022-05-29 06:21:36'),
(3, 17, 2, 'updated', 'pending', 'Paper Updated', '2022-05-29 06:22:22', '2022-05-29 06:22:22'),
(4, 17, 2, 'Trg Verfication', 'approaved', 'Approved From My site', '2022-05-29 06:22:44', '2022-05-29 06:22:44'),
(5, 17, 2, 'Senior Verfication', 'approaved', 'Approved From My Side', '2022-05-29 06:23:09', '2022-05-29 06:23:09'),
(6, 17, 2, 'CI Verfication', 'approaved', 'Also Approved From My Side', '2022-05-29 06:23:28', '2022-05-29 06:23:28'),
(7, 17, 2, 'Send to Exam', 'send', 'Paper Send to Exam Department', '2022-05-29 06:24:14', '2022-05-29 06:24:14'),
(8, 16, 2, 'Trg Verfication', 'approaved', 'asd', '2022-05-29 08:58:00', '2022-05-29 08:58:00'),
(9, 16, 2, 'Senior Verfication', 'reject', 'csdf', '2022-05-29 08:59:20', '2022-05-29 08:59:20'),
(10, 16, 2, 'Again Submission', 'pending', 'Paper Again Submit for Approval', '2022-05-29 08:59:49', '2022-05-29 08:59:49'),
(11, 16, 2, 'Trg Verfication', 'approaved', 'sdf', '2022-05-29 09:00:01', '2022-05-29 09:00:01'),
(12, 16, 2, 'Senior Verfication', 'approaved', 'asd', '2022-05-29 09:02:25', '2022-05-29 09:02:25'),
(13, 16, 2, 'CI Verfication', 'reject', 'rejected', '2022-05-29 09:03:47', '2022-05-29 09:03:47'),
(14, 16, 2, 'Again Submission', 'pending', 'Paper Again Submit for Approval', '2022-05-29 09:12:33', '2022-05-29 09:12:33'),
(15, 16, 2, 'CI Verfication', 'reject', 'test', '2022-05-29 09:13:47', '2022-05-29 09:13:47'),
(16, 16, 2, 'Again Submission', 'pending', 'Paper Again Submit for Approval', '2022-05-29 09:14:34', '2022-05-29 09:14:34'),
(17, 16, 2, 'Senior Verfication', 'approaved', 'asd', '2022-05-29 09:14:47', '2022-05-29 09:14:47'),
(18, 16, 2, 'CI Verfication', 'approaved', 'asd', '2022-05-29 09:15:18', '2022-05-29 09:15:18');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_12_192736_create_permission_tables', 2),
(6, '2022_01_18_054930_create_modules_table', 3),
(7, '2022_01_20_054915_add_module_id_column_in_permissions', 4),
(8, '2022_04_13_064349_create_categories_table', 5),
(15, '2022_04_13_070511_create_papers_table', 6),
(16, '2022_04_13_071139_create_paper_files_table', 6),
(18, '2022_04_18_172729_change_column_in_papers', 7),
(21, '2022_04_18_174437_add_description_column_in_paper_files', 8),
(25, '2022_04_18_202138_add_send_to_exam_column_in_papers', 9),
(26, '2022_05_01_212516_add_mos_column_in_papers', 10),
(29, '2022_05_06_203101_add_publish_column_in_papers', 11),
(31, '2022_05_29_110207_create_logs_table', 12),
(33, '2022_05_29_134649_add_rejection_column_in_papers', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `uid`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '65e31f97f4d477a9ada8adf66a08831b', 'Module', NULL, '2022-04-12 14:40:55', '2022-04-12 14:40:55'),
(2, '6586eb06eeee8d7300a23453f33d6252', 'Permission', NULL, '2022-04-12 14:41:03', '2022-04-12 14:41:03'),
(3, 'd86fcf565863232123a00408c85d6bf4', 'Role', NULL, '2022-04-12 14:41:17', '2022-04-12 14:41:17'),
(4, 'f5ca8f156b610e3ca565774b4fe0075a', 'User', NULL, '2022-04-12 14:41:21', '2022-04-12 14:41:21'),
(6, 'debf204cacde30261e93840f63d083c4', 'Category', NULL, '2022-04-12 15:51:49', '2022-04-12 15:51:49'),
(7, '296a3a8950cd1530bc98727e458dd2de', 'Paper', NULL, '2022-04-12 15:51:52', '2022-04-12 15:51:52'),
(8, 'cf0c338dd2b580e2e7e81f2e23ff2f2f', 'Lists', NULL, '2022-04-15 07:48:41', '2022-04-15 07:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_id_2` bigint(20) UNSIGNED DEFAULT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','reject','approaved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by_trg` bigint(20) UNSIGNED DEFAULT NULL,
  `trg_comment` text COLLATE utf8mb4_unicode_ci,
  `trg_status` enum('pending','reject','approaved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by_senior_intructor` bigint(20) UNSIGNED DEFAULT NULL,
  `senior_instructor_comment` text COLLATE utf8mb4_unicode_ci,
  `senior_instructor_status` enum('pending','reject','approaved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by_chief_instructor` bigint(20) UNSIGNED DEFAULT NULL,
  `chief_instructor_comment` text COLLATE utf8mb4_unicode_ci,
  `chief_instructor_status` enum('pending','reject','approaved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `send_to_exam` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `publish` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `rejection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `uid`, `category_id`, `category_id_2`, `module_name`, `course_name`, `mos`, `name`, `status`, `date`, `uploaded_by`, `approved_by_trg`, `trg_comment`, `trg_status`, `approved_by_senior_intructor`, `senior_instructor_comment`, `senior_instructor_status`, `approved_by_chief_instructor`, `chief_instructor_comment`, `chief_instructor_status`, `send_to_exam`, `publish`, `rejection`, `created_at`, `updated_at`) VALUES
(3, '4f12307f19a16f8393ed935376b00677', 2, NULL, NULL, NULL, NULL, 'Test', 'approaved', '2022-04-13', 2, 3, 'test', 'approaved', 7, 'Done', 'approaved', 11, 'Done', 'approaved', 'yes', 'no', '', '2022-04-13 03:44:18', '2022-04-18 15:48:36'),
(4, 'fefcf211e4d4f667c4e609a8b45e1c7d', 2, NULL, NULL, NULL, NULL, 'test', 'approaved', '2022-04-15', 2, 5, 'Done', 'approaved', 7, 'Done', 'approaved', 11, 'Done', 'approaved', 'no', 'no', '', '2022-04-15 07:53:41', '2022-04-15 08:03:11'),
(5, '1d91e3d6215a87a43e0974ca452f8a68', 2, NULL, NULL, NULL, NULL, 'Test 5', 'approaved', '2022-04-16', 2, 6, 'Test', 'approaved', 8, 'Test', 'approaved', 11, 'TEst', 'approaved', 'no', 'no', '', '2022-04-16 04:37:13', '2022-04-16 04:54:26'),
(10, 'a2b7a1a8f25e82a35072f757ef7b4b3e', 2, 2, 'Testing', 'Testing 2', NULL, 'Testing 3', 'approaved', '2022-04-18', 3, 3, 'test', 'approaved', 7, 'test', 'approaved', 11, NULL, 'approaved', 'no', 'no', '', '2022-04-18 14:00:47', '2022-04-18 15:05:59'),
(11, '47306bdb4b9c1a178e2817e903d9b9c2', 2, 2, 'Test', 'Test', NULL, 'Test', 'approaved', '2022-04-19', 2, 3, 'test', 'approaved', 7, 'test', 'approaved', 11, NULL, 'approaved', 'no', 'no', '', '2022-04-18 15:06:40', '2022-04-18 15:09:53'),
(12, 'b89ee8525b153e1a43c223f0cc03d8b9', 2, 2, 'test', 'test', 'twst', 'test', 'approaved', '2022-04-20', 2, 3, 'Test', 'approaved', 7, 'TEst', 'approaved', 11, NULL, 'approaved', 'yes', 'yes', '', '2022-04-20 02:49:38', '2022-05-07 11:03:14'),
(13, '997a8eb58efeea514895f0163b4a08c8', 2, 2, 'test', 'test', NULL, 'test', 'pending', '2022-04-20', 13, 6, 'test', 'pending', 10, 'test', 'pending', 11, NULL, 'pending', 'no', 'no', '', '2022-04-20 02:51:07', '2022-04-20 03:02:37'),
(14, '92271dcb933ff039220677ad1280ac6c', 2, 2, 'test', 'test', NULL, 'test', 'approaved', '2022-04-21', 13, 4, 'test', 'approaved', 9, 'test', 'approaved', 11, NULL, 'approaved', 'no', 'no', '', '2022-04-21 05:40:47', '2022-04-21 05:47:51'),
(15, '71eb809281000316711400c550ab99e2', 2, NULL, 'Test 2', 'Test 1', 'Test 3', 'Terst 4', 'approaved', '2022-05-02', 2, 5, 'Test', 'approaved', 9, 'Test', 'approaved', 11, NULL, 'approaved', 'yes', 'yes', '', '2022-05-02 07:13:21', '2022-05-08 11:46:26'),
(16, '43b49f14cb33a572dcb93e9bf33833ef', 2, NULL, 'test', 'test', 'test', 'sdf', 'approaved', '2022-05-29', 2, 3, 'sdf', 'approaved', 7, 'asd', 'approaved', 11, 'asd', 'approaved', 'no', 'yes', 'trg', '2022-05-29 04:51:23', '2022-05-29 09:15:18'),
(17, '30ce31c98fa3433312f16c5d6a2b2b1f', 2, NULL, 'First English', 'English', 'English MOS', 'English Time', 'approaved', '2022-05-29', 2, 3, 'Approved From My site', 'approaved', 7, 'Approved From My Side', 'approaved', 11, 'Also Approved From My Side', 'approaved', 'yes', 'yes', '', '2022-05-29 06:20:55', '2022-05-29 06:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `paper_files`
--

CREATE TABLE `paper_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('trg','uploader','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paper_files`
--

INSERT INTO `paper_files` (`id`, `paper_id`, `file`, `description`, `type`, `created_at`, `updated_at`) VALUES
(2, 4, 'c4316d7938247a41fb44e7932486e227_1650027221.jpg', NULL, NULL, '2022-04-15 07:53:41', '2022-04-15 07:53:41'),
(7, 3, 'kimchi,,,,_1650054932.pdf', NULL, NULL, '2022-04-15 16:40:01', '2022-04-15 16:40:01'),
(8, 3, 'c4316d7938247a41fb44e7932486e227_1650055027.jpg', NULL, NULL, '2022-04-15 16:40:01', '2022-04-15 16:40:01'),
(9, 3, 'FJWU Admission Form_1650058801.pdf', NULL, NULL, '2022-04-15 16:40:01', '2022-04-15 16:40:01'),
(10, 5, 'kimchi,,,,_1650101833.pdf', NULL, NULL, '2022-04-16 04:37:13', '2022-04-16 04:37:13'),
(22, 10, 'screencapture-ssss-test-client-invoice-create-2022-04-12-23_51_41 (1)_1650308447.png', 'Testing Purpose', 'uploader', '2022-04-18 14:02:32', '2022-04-18 14:02:32'),
(23, 10, 'screencapture-gfjwu-test-profile-basic-information-2022-04-18-00_55_49_1650308447.png', 'Testing Purpose 2', 'uploader', '2022-04-18 14:02:32', '2022-04-18 14:02:32'),
(24, 10, 'kimchi,,,,_1650308493.pdf', 'Testing Guide', 'trg', '2022-04-18 14:02:32', '2022-04-18 14:02:32'),
(25, 11, 'screencapture-ezierp-propery-booking-7c7d9c1bae7058fea7b6dbe69460af9c-payment-schedule-2022-04-13-16_28_30_1650312400.png', 'Test', 'uploader', '2022-04-18 15:06:40', '2022-04-18 15:06:40'),
(26, 11, 'screencapture-ezierp-propery-booking-7c7d9c1bae7058fea7b6dbe69460af9c-payment-schedule-2022-04-13-16_28_30_1650312400.png', 'Test', 'uploader', '2022-04-18 15:06:40', '2022-04-18 15:06:40'),
(29, 13, 'c4316d7938247a41fb44e7932486e227_1650441067.jpg', 'test', 'uploader', '2022-04-20 02:51:57', '2022-04-20 02:51:57'),
(30, 13, 'jpg_1650441117.jpg', 'test', 'trg', '2022-04-20 02:51:57', '2022-04-20 02:51:57'),
(31, 14, 'screencapture-ezierp-propery-booking-7c7d9c1bae7058fea7b6dbe69460af9c-payment-schedule-2022-04-13-16_28_30_1650537647.png', 'test test 78', 'uploader', '2022-04-21 05:40:47', '2022-04-21 05:40:47'),
(33, 12, 'screencapture-ssss-test-client-invoice-create-2022-04-12-23_51_41 (1)_1650440978.png', 'test', 'uploader', '2022-05-06 15:57:16', '2022-05-06 15:57:16'),
(34, 15, 'WhatsApp Image 2022-05-02 at 12.02.50 AM_1651493601.jpeg', 'test description', 'uploader', '2022-05-06 16:21:02', '2022-05-06 16:21:02'),
(36, 16, 'first_1653817883.png', 'sdfsd fs dfs', 'uploader', '2022-05-29 04:51:36', '2022-05-29 04:51:36'),
(40, 17, 'first_1653823255.png', 'Test Description', 'uploader', '2022-05-29 06:22:22', '2022-05-29 06:22:22'),
(41, 17, 'first_1653823296.png', 'Test Description', 'uploader', '2022-05-29 06:22:22', '2022-05-29 06:22:22');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'show module', 'web', '2022-04-12 14:44:15', '2022-04-12 14:44:15'),
(2, 1, 'create module', 'web', '2022-04-12 14:44:20', '2022-04-12 14:44:20'),
(3, 1, 'edit module', 'web', '2022-04-12 14:44:25', '2022-04-12 14:44:25'),
(4, 1, 'view module', 'web', '2022-04-12 14:44:31', '2022-04-12 14:44:31'),
(5, 1, 'delete module', 'web', '2022-04-12 14:44:38', '2022-04-12 14:44:38'),
(6, 2, 'show permission', 'web', '2022-04-12 14:44:46', '2022-04-12 14:44:46'),
(7, 2, 'create permission', 'web', '2022-04-12 14:44:52', '2022-04-12 14:44:52'),
(8, 2, 'edit permission', 'web', '2022-04-12 14:44:57', '2022-04-12 14:44:57'),
(9, 2, 'view permission', 'web', '2022-04-12 14:45:03', '2022-04-12 14:45:03'),
(10, 2, 'delete permission', 'web', '2022-04-12 14:45:10', '2022-04-12 14:45:10'),
(11, 3, 'show role', 'web', '2022-04-12 14:45:18', '2022-04-12 14:45:18'),
(12, 3, 'create role', 'web', '2022-04-12 14:45:22', '2022-04-12 14:45:22'),
(13, 3, 'edit role', 'web', '2022-04-12 14:45:27', '2022-04-12 14:45:27'),
(14, 3, 'view role', 'web', '2022-04-12 14:45:32', '2022-04-12 14:45:32'),
(15, 3, 'delete role', 'web', '2022-04-12 14:45:42', '2022-04-12 14:45:42'),
(16, 4, 'show user', 'web', '2022-04-12 14:45:48', '2022-04-12 14:45:48'),
(17, 4, 'create user', 'web', '2022-04-12 14:45:53', '2022-04-12 14:45:53'),
(18, 4, 'edit user', 'web', '2022-04-12 14:45:58', '2022-04-12 14:45:58'),
(19, 4, 'view user', 'web', '2022-04-12 14:46:08', '2022-04-12 14:46:08'),
(20, 4, 'delete user', 'web', '2022-04-12 14:46:14', '2022-04-12 14:46:14'),
(21, 6, 'show category', 'web', '2022-04-12 15:52:28', '2022-04-12 15:52:28'),
(22, 6, 'create category', 'web', '2022-04-12 15:52:34', '2022-04-12 15:52:34'),
(23, 6, 'edit category', 'web', '2022-04-12 15:52:41', '2022-04-12 15:52:41'),
(24, 6, 'view category', 'web', '2022-04-12 15:52:46', '2022-04-12 15:52:46'),
(25, 6, 'delete category', 'web', '2022-04-12 15:52:54', '2022-04-12 15:52:54'),
(26, 7, 'show paper', 'web', '2022-04-12 15:53:01', '2022-04-12 15:53:01'),
(27, 7, 'create paper', 'web', '2022-04-12 15:53:06', '2022-04-12 15:53:06'),
(28, 7, 'edit paper', 'web', '2022-04-12 15:53:13', '2022-04-12 15:53:13'),
(29, 7, 'view paper', 'web', '2022-04-12 15:53:17', '2022-04-12 15:53:17'),
(30, 7, 'delete paper', 'web', '2022-04-12 15:53:23', '2022-04-12 15:53:23'),
(31, 8, 'trg paper list', 'web', '2022-04-15 07:48:54', '2022-04-15 07:48:54'),
(32, 8, 'senior paper list', 'web', '2022-04-15 07:49:01', '2022-04-15 07:49:01'),
(33, 8, 'chief paper list', 'web', '2022-04-15 07:49:11', '2022-04-15 07:49:11'),
(34, 8, 'exam paper list', 'web', '2022-04-15 07:49:19', '2022-04-15 07:49:19'),
(35, 7, 'view log', 'web', '2022-05-29 06:28:40', '2022-05-29 06:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-04-12 14:48:18', '2022-04-12 14:48:18'),
(2, 'Chief Instructor', 'web', '2022-04-13 02:27:28', '2022-04-13 02:27:28'),
(3, 'Senior Instructor', 'web', '2022-04-13 02:27:35', '2022-04-13 02:27:35'),
(4, 'Trg Officer', 'web', '2022-04-13 02:27:47', '2022-04-13 02:27:47'),
(5, 'Ds Officer', 'web', '2022-04-13 02:28:36', '2022-04-13 02:28:36'),
(6, 'Exam Staff', 'web', '2022-04-13 02:28:43', '2022-04-13 02:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(29, 2),
(33, 2),
(29, 3),
(32, 3),
(28, 4),
(29, 4),
(31, 4),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(29, 6),
(34, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@pas.com', NULL, '$2y$10$zUdTjZGWJSXz2/a01e.IQe45FMvLL2mrRXWlqBCFRGLDoOzvJFHmC', NULL, '2022-04-12 15:38:40', '2022-04-15 13:52:50'),
(3, 'EED', 'eed@pas.com', NULL, '$2y$10$A1o3C/sNDBU5ef8f98XygOPZvdmyjVyHMGEVBnOuvcBl.E5YX1rxe', NULL, '2022-04-13 02:29:56', '2022-04-13 02:29:56'),
(4, 'MED', 'med@pas.com', NULL, '$2y$10$w4kZ/hTSUY0/auZgjfvAXOSI67XBetK2bMVx2DYurhfvMmDQBU3xu', NULL, '2022-04-13 02:30:24', '2022-04-13 02:30:24'),
(5, 'LMD', 'lmd@pas.com', NULL, '$2y$10$yQbKqLIGWexeeIlpUkqmXOV6aOCKu3AcpgjGw7fus1qk/UbxK/Siq', NULL, '2022-04-13 02:30:46', '2022-04-13 02:30:46'),
(6, 'WTD', 'wtd@pas.com', NULL, '$2y$10$6dXvmwHBIGzE6QHPuZqmTOeVI5Qlp8hBZrap1agAbO9.pyeyIxgCS', NULL, '2022-04-13 02:31:11', '2022-04-13 02:31:11'),
(7, 'EED', 'senior_eed@pas.com', NULL, '$2y$10$CBUj6DugWL2mFVt9xrlTPer1ronW/.CP3paVhyDjwjO/V1MyCKpbu', NULL, '2022-04-13 02:31:53', '2022-04-13 02:31:53'),
(8, 'MED', 'senior_med@pas.com', NULL, '$2y$10$2nzADQgdbz/1W./Xnodh3eTXQDvErxkRbXOarQVstAJ6XfRiiE3xO', NULL, '2022-04-13 02:32:16', '2022-04-13 02:32:16'),
(9, 'LMD', 'senior_lmd@pas.com', NULL, '$2y$10$51ZD8VuMvjixSUWTFOaBqOFk4QD/b/5EQMPlPbomBsaNnTj7441wO', NULL, '2022-04-13 02:32:59', '2022-04-13 02:32:59'),
(10, 'WTD', 'senior_etd@pas.com', NULL, '$2y$10$LVOWOFBlIJvaccTqaS9djuOflZiyhjEQJQPBf9mpLssmLfCoQRXo.', NULL, '2022-04-13 02:33:35', '2022-04-13 02:33:35'),
(11, 'MSG', 'msg@pas.com', NULL, '$2y$10$EaaBAs/T.9bgf9a/kOpheeFO1XuZeCZpRDrK/0zvw/V78VbX4B/3O', NULL, '2022-04-13 02:33:59', '2022-04-13 02:33:59'),
(12, 'Exam Staff', 'exam_staff@pas.com', NULL, '$2y$10$qduptLRy4/OeW3yrF46bQOxQYDRWfBBe6GP7yO61GXBkkx.NSueHe', NULL, '2022-04-15 08:04:02', '2022-04-15 08:04:02'),
(13, 'Ds Officer', 'ds_officer@pas.com', NULL, '$2y$10$atHVaNgJPApwOmMVDZdxYeYdDgB.YSGkJQlTr3LD5VREfrdIbbBAK', NULL, '2022-04-16 04:39:22', '2022-04-16 04:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_paper_id_foreign` (`paper_id`),
  ADD KEY `logs_changed_by_foreign` (`changed_by`);

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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `papers_uploaded_by_foreign` (`uploaded_by`),
  ADD KEY `papers_approved_by_trg_foreign` (`approved_by_trg`),
  ADD KEY `papers_approved_by_senior_intructor_foreign` (`approved_by_senior_intructor`),
  ADD KEY `papers_approved_by_chief_instructor_foreign` (`approved_by_chief_instructor`),
  ADD KEY `papers_category_id_2_foreign` (`category_id_2`);

--
-- Indexes for table `paper_files`
--
ALTER TABLE `paper_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_files_paper_id_foreign` (`paper_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paper_files`
--
ALTER TABLE `paper_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_changed_by_foreign` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logs_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_approved_by_chief_instructor_foreign` FOREIGN KEY (`approved_by_chief_instructor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_approved_by_senior_intructor_foreign` FOREIGN KEY (`approved_by_senior_intructor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_approved_by_trg_foreign` FOREIGN KEY (`approved_by_trg`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_category_id_2_foreign` FOREIGN KEY (`category_id_2`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paper_files`
--
ALTER TABLE `paper_files`
  ADD CONSTRAINT `paper_files_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

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
