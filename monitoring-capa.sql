-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220927.cce6a2381a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 12:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring-capa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'buah', '2022-09-29 04:09:33', '2022-09-29 06:09:06'),
(2, 'sayur', '2022-09-29 04:09:33', '2022-09-29 06:09:06'),
(3, 'minuman', '2022-09-29 04:09:33', '2022-09-29 06:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Major', 'major', NULL, NULL),
(2, 'Minor', 'minor', NULL, NULL),
(3, 'Critical', 'critical', NULL, NULL),
(4, 'Observasi', 'observasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Production', 'production', NULL, NULL),
(2, 'Quality Control', 'quality_control', NULL, NULL),
(3, 'Quality Assurance', 'quality_assurance', NULL, NULL),
(4, 'Supply Chain', 'supply_chain', NULL, NULL),
(5, 'Engineering', 'engineering', NULL, NULL),
(6, 'Product Development', 'product_development', NULL, NULL),
(7, 'Regulatory', 'regulatori', NULL, NULL),
(8, 'HRD', 'hrd', NULL, NULL),
(9, 'Finance', 'finance', NULL, NULL),
(10, 'Marketing', 'marketing', NULL, NULL),
(11, 'Eksternal', 'eksternal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
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
(5, '2022_07_09_123448_create_posts_table', 1),
(6, '2022_07_11_135528_create_categories_table', 1),
(7, '2022_07_17_082749_add_is_admin_to_users_table', 1),
(8, '2022_09_11_012907_create_departements_table', 1),
(9, '2022_09_11_020201_create_classifications_table', 1),
(10, '2022_09_11_020327_create_rootcauses_table', 1),
(11, '2022_09_11_020502_create_statuses_table', 1),
(12, '2022_09_18_134247_create_events_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source_capa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finding` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `requirement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gap_analysis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rootcause_id` bigint(20) UNSIGNED NOT NULL,
  `corrective_action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preventive_action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `timeline` timestamp NULL DEFAULT NULL,
  `prove` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `timeline1` timestamp NULL DEFAULT NULL,
  `timeline2` timestamp NULL DEFAULT NULL,
  `justifikasi1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justifikasi2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifikasi1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifikasi2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justifikasi1approved` tinyint(1) NOT NULL DEFAULT 0,
  `justifikasi2approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `source_capa`, `title`, `slug`, `finding`, `classification_id`, `requirement`, `gap_analysis`, `rootcause_id`, `corrective_action`, `preventive_action`, `user_id`, `departement_id`, `timeline`, `prove`, `approved`, `image`, `status_id`, `published_at`, `created_at`, `updated_at`, `timeline1`, `timeline2`, `justifikasi1`, `justifikasi2`, `modifikasi1`, `modifikasi2`, `justifikasi1approved`, `justifikasi2approved`) VALUES
(1, 'Audit Eksternal ', 'Temuan Audit Eksternal ke 1', 'audit-eksternal-2', 'Ditemukan bahwa A mesin rusak', 2, 'N/A', 'N/A', 2, 'Melakukan perbaikan mesin', 'dilakukan PM Bulanan', 2, 2, '2022-09-14 15:50:21', NULL, 0, NULL, 2, NULL, '2022-09-12 08:23:09', '2022-09-12 08:23:09', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(2, 'Audit Interna;', 'Temuan Audit Interna ke 1', 'audit-Interna-1', 'Ditemukan bahwa user A merusak mesin', 3, 'N/A', 'N/A', 1, 'Melakukan Perbaikan', 'dilakukan Training', 1, 5, '2022-11-29 17:00:00', 'asasaasasa', 1, 'post-images/X3Fph3gCcuKlrMONWzh6AmJrV9EzoCMn2NXW9aEY.jpg', 2, NULL, '2022-09-12 08:24:30', '2022-11-19 19:47:59', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 'Audit Internaaaaaaaal', 'Temuan 223123123', 'audit-Interna-2', 'Ditemukan', 2, 'N/A', 'N/A', 1, 'Melakukan Perbaikan', 'dilakukan Training', 10, 2, '2022-09-27 17:00:00', 'asasasasasasasa', 1, 'post-images/aPkhvK1GtLSZRfEs6T0JJDRizpYZaMnJ8VqITtCF.jpg', 2, NULL, '2022-09-13 09:14:34', '2022-11-19 19:49:01', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(13, 'audit internal', 'kerusakan mesin tianfu', 'kerusakan-mesin-tianfu', 'mesin tianfu rusak motornya', 2, 'N/A', 'N/A', 2, 'Perbaikan Mesin', 'PM Bulanan', 1, 5, '2022-09-19 17:00:00', 'a', 1, 'post-images/UMoAK6cWHStgmYHVdo7JmcVY1gZMtuzkroM1wO70.png', 1, NULL, '2022-09-15 04:21:55', '2022-11-19 19:49:25', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(16, 'Audit internal', 'Capa Sanofi', 'capa-sanofi', 'Ditemukan mesin tidak ada penandan', 4, 'Perbaikan', 'Man', 1, 'Menambahkan label', 'Revisi SOP', 1, 5, '2022-11-23 17:00:00', 'closed ya', 0, 'post-images/iYF2A6mXnjNvPgs2CSBk08TCrBs9c76M8S5bEsT1.jpg', 1, NULL, '2022-09-19 07:23:52', '2022-11-20 14:51:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(29, 'aa', 'aa', 'aa', 'aa', 2, 'aa', 'aa', 2, 'aa', 'aa', 2, 3, '2022-10-28 17:00:00', 'keterangan', 0, 'post-images/S6pNrinHUPXYWiAagTjTn935dF6m5eBJzdr3aEMs.png', 1, NULL, '2022-10-01 07:42:37', '2022-10-01 08:08:49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(52, '123', '32123123', '32123123', '12312', 1, '123', '123123', 5, '123123', '123123', 1, 5, '2022-11-23 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 05:15:05', '2022-11-06 05:15:05', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(53, 'qweqwe', 'qw eqwe qwe', 'qw-eqwe-qwe', 'qweqwe', 1, 'qweqw', 'qweqw', 2, 'a', 'qweqw', 11, 1, '2022-11-29 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:12:22', '2022-11-06 06:12:22', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(54, 'qweqwe', 'aku anak sehat', 'aku-anak-sehat', 'qweqwe', 1, 'qweqw', 'qweqw', 2, 'a', 'qweqw', 11, 1, '2022-11-29 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:13:51', '2022-11-06 06:13:51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(55, 'qweqwe', 'aku anak sehat 1', 'aku-anak-sehat-1', 'qweqwe', 1, 'qweqw', 'qweqw', 2, 'a', 'qweqw', 11, 1, '2022-11-29 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:21:09', '2022-11-06 06:21:09', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(56, 'qweqwe', 'aku anak sehat 12', 'aku-anak-sehat-12', 'qweqwe', 1, 'qweqw', 'qweqw', 2, 'a', 'qweqw', 13, 9, '2022-11-22 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:23:04', '2022-11-21 16:59:31', '2022-11-24 17:00:00', '2022-11-26 17:00:00', NULL, NULL, 'post-files/4uUTE8Q20jCFJIK5L3g02i0Q4UVoJucSZd7ICpFS.pdf', 'post-files/ma410WdxHurUS0ZhPk2uqmR2yTef4jwQOuMbnprm.pdf', 1, 1),
(57, 'adasd', 'asdasdasd  asd131', 'asdasdasd-asd131', 'aasdasd', 1, 'aysu', 'asdasd', 2, 'asd', 'asd', 3, 1, '2022-11-25 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:41:49', '2022-11-06 06:41:49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(58, 'adasd', 'asdasdasd  asd131asd', 'asdasdasd-asd131asd', 'aasdasd', 1, 'aysu', 'asdasd', 2, 'asd', 'asd', 10, 2, '2022-11-25 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:49:00', '2022-11-20 16:18:42', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(59, '123123', '13216549', '13216549', '123123', 2, '123123', '123123', 1, 'asyu', '123123', 2, 3, '2022-12-08 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 06:50:44', '2022-11-06 06:50:44', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(60, '123123', '13216549asd', '13216549asd', '123123', 2, '123123', '123123', 1, 'asyu', '123123', 13, 9, '2022-09-08 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-06 07:07:06', '2022-11-06 07:07:06', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(61, 'aku', 'aku sayang kamu', 'aku-sayang-kamu', 'a', 1, 'a', 'ayu', 1, 'asyu', 'asyu', 10, 2, '2022-09-21 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-10 08:13:49', '2022-11-10 08:13:49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(62, 'lklk', 'klkl', 'klkl', 'klkl', 4, 'a', 'klkl', 5, 'lklk', 'klk', 10, 1, '2022-11-29 17:00:00', NULL, 0, NULL, 1, NULL, '2022-11-14 05:28:41', '2022-11-14 05:28:41', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_cats`
--

CREATE TABLE `product_cats` (
  `id` int(11) NOT NULL,
  `product_cat_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cats`
--

INSERT INTO `product_cats` (`id`, `product_cat_name`, `created_at`, `updated_at`) VALUES
(1, 'pakaian', NULL, NULL),
(2, 'bawaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user', NULL, NULL),
(2, 'Manager', 'manager', NULL, NULL),
(3, 'Admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rootcauses`
--

CREATE TABLE `rootcauses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rootcauses`
--

INSERT INTO `rootcauses` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'man', NULL, NULL),
(2, 'Machine', 'machine', NULL, NULL),
(3, 'Methode', 'methode', NULL, NULL),
(4, 'Material', 'material', NULL, NULL),
(5, 'Milieu', 'milieu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Open', 'open', NULL, NULL),
(2, 'Close', 'close', NULL, NULL),
(3, 'Done', 'done', NULL, NULL),
(4, 'Cancel', 'cancel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`) VALUES
(1, 'apel', 1, '2022-09-29 06:10:36'),
(2, 'mangga', 1, '2022-09-29 06:10:36'),
(3, 'jambu', 1, '2022-09-29 06:10:36'),
(4, 'bayem', 2, '2022-09-29 06:10:36'),
(5, 'brokoli', 2, '2022-09-29 06:10:36'),
(6, 'susu', 3, '2022-09-29 06:10:36'),
(7, 'teh', 3, '2022-09-29 06:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `departement_id`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `role_id`) VALUES
(1, 'Galang Dwi Juniar', 'galangdwi', 'galang@gmail.com', NULL, 5, '$2y$10$twjryIAjSq9aozbIbLcq9uEJ/z0mwHXkje4OR5rH41RbuHRzaRGgq', NULL, '2022-07-16 22:12:14', '2022-09-25 01:28:09', 1, 3),
(2, 'Prabawa Halim S.I.Kom', 'suwarno.uda', 'kambali06@example.net', '2022-07-16 22:12:14', 3, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u5u27gqTFP', '2022-07-16 22:12:14', '2022-07-16 22:12:14', 0, 1),
(3, 'Purwa Nasim Kurniawan S.Psi', 'mulyani.anastasia', 'puti@google.com', NULL, 1, '12345', NULL, '2022-07-16 22:12:14', '2022-07-16 22:12:14', 0, 1),
(4, 'Rahmi Wahyuni M.Farm', 'darmaji97', 'an@gmail.com', '2022-07-16 22:12:14', 4, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pOOolE9X2m', '2022-07-16 22:12:14', '2022-07-16 22:12:14', 0, 1),
(10, 'ardi', 'ardiwibowo', 'lima@gmail.com', NULL, 2, '$2y$10$bWRIdMGooNXVPEr72OETQ.414BNeK8ZYIhZKAvLXK/e//NsCvqJWq', NULL, '2022-09-30 23:21:44', '2022-09-30 23:21:44', 0, 2),
(11, 'bambang', 'bambang', 'bambang@gmail.com', NULL, 1, '12345', NULL, NULL, NULL, 0, 1),
(12, 'Erka Adiana', 'erkaadiana', 'erka@gmail.com', NULL, 5, '12345', NULL, NULL, NULL, 0, 1),
(13, 'naki', 'nakinaki', 'naki@gmail.com', NULL, 9, '$2y$10$U0iL6RCMQ.BQdc78FZ16duBTdXhVTIPQUyXKRpsXJpPSKYYgHUQra', NULL, '2022-11-19 18:06:42', '2022-11-19 18:06:42', 0, 1),
(14, 'lambe', 'lambeturah', 'lambe@gmail.com', NULL, 7, '$2y$10$8NGTXTZvEE507AhKe2GqiOui.fFtZeCA.GugMA8fAvgR/SESD1X9i', NULL, '2022-11-20 05:33:57', '2022-11-20 05:37:05', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classifications_name_unique` (`name`),
  ADD UNIQUE KEY `classifications_slug_unique` (`slug`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departements_name_unique` (`name`),
  ADD UNIQUE KEY `departements_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departements_name_unique` (`name`),
  ADD UNIQUE KEY `departements_slug_unique` (`slug`);

--
-- Indexes for table `rootcauses`
--
ALTER TABLE `rootcauses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rootcauses_name_unique` (`name`),
  ADD UNIQUE KEY `rootcauses_slug_unique` (`slug`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_name_unique` (`name`),
  ADD UNIQUE KEY `statuses_slug_unique` (`slug`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rootcauses`
--
ALTER TABLE `rootcauses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
