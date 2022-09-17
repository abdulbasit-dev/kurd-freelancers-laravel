-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 03:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kurd-freelancers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Erbil', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(2, 'Duhok', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(3, 'Selemnay', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(4, 'Kerkuk', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(5, 'halbja', '2021-05-20 06:53:06', '2021-05-20 06:53:06'),
(6, 'zaxo', '2021-05-23 09:42:24', '2021-05-23 09:42:24');

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Male', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL),
(2, 'Female', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL),
(3, 'Other', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kurdish', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL),
(2, 'Arabic', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL),
(3, 'English', '2021-05-20 05:04:53', '2021-05-20 05:04:53', NULL);

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
(111, '2014_10_12_000000_create_users_table', 1),
(112, '2014_10_12_100000_create_password_resets_table', 1),
(113, '2019_08_19_000000_create_failed_jobs_table', 1),
(114, '2021_02_23_055006_create_cities_table', 1),
(115, '2021_02_23_181341_create_posts_table', 1),
(116, '2021_03_03_115925_create_tags_table', 1),
(117, '2021_04_17_051433_create_roles_table', 1),
(118, '2021_05_15_132210_create_profiles_table', 1),
(119, '2021_05_15_173641_create_languages_table', 1),
(120, '2021_05_15_174221_create_genders_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `currency_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fix_price` int(11) DEFAULT NULL,
  `start_range_price` int(11) DEFAULT NULL,
  `end_range_price` int(11) DEFAULT NULL,
  `time_delivary_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'false stant for pending',
  `reject` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'false stant for not reject, true mean reject',
  `reject_resone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `tag_id`, `city_id`, `currency_type`, `file`, `fix_price`, `start_range_price`, `end_range_price`, `time_delivary_type`, `time_amount`, `status`, `reject`, `reject_resone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '14', 'movie bubbles', 'best website to find best movies', 1, 1, 'USA', NULL, 0, 100, 300, 'week', 31, 1, 0, NULL, '2021-05-20 05:25:06', '2021-05-20 05:35:37', NULL),
(2, '13', 'GYM', 'website for budy building and improving you helth', 2, 3, 'IQD', NULL, 500, 0, 0, 'week', 2, 1, 0, NULL, '2021-05-20 05:29:32', '2021-05-20 05:35:30', NULL),
(3, '9', 'restaurant', 'mobile app for resturans to show menu for food and price', 2, 2, 'IQD', NULL, 700, 0, 0, 'week', 10, 1, 0, NULL, '2021-05-20 05:32:26', '2021-05-20 05:35:22', NULL),
(4, '10', 'Architecto omnis rer', 'Omnis aute cumque qu', 3, 2, 'USA', NULL, 0, 0, 0, 'month', 81, 1, 0, NULL, '2021-05-20 06:35:41', '2021-05-20 06:48:57', '2021-05-20 06:48:57'),
(5, '11', 'Saepe possimus maio', 'Qui sit qui in optio', 3, 2, 'USA', NULL, 0, 0, 0, 'day', 11, 0, 1, 'not right content', '2021-05-20 06:49:53', '2021-05-20 06:51:33', NULL),
(6, '20', 'Omnis qui fugiat qu', 'Laboris aut exercita', 3, 1, 'USA', 'uploads/cv/1621773583.pdf', 400, 0, 0, 'week', 4, 1, 0, NULL, '2021-05-23 09:39:43', '2021-05-23 09:40:41', NULL),
(7, '22', 'Sit ratione voluptas', 'Adipisci consequuntu', 4, 1, 'IQD', NULL, 36, 0, 0, 'week', 93, 1, 0, NULL, '2021-06-14 10:13:09', '2021-06-14 10:13:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`skills`)),
  `about_me` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `city_id`, `phone_number`, `gender_id`, `age`, `skills`, `about_me`, `language_id`, `cv`, `certificate`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'Revan Serbast', 2, '+1 (554) 654-2146', 1, 1, '\"laravel,react.js,node.js,adobe xd,bootsrap,tailwind\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 3, NULL, NULL, 'uploads/profile_picture/1621498336.jpg', '2021-05-20 05:12:16', '2021-05-20 05:12:16', NULL),
(2, 8, 'Facere rerum aut sit', 3, '+1 (309) 258-8399', 1, 18, '\"laravel,node.js,figma,tailwind\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 1, NULL, NULL, 'uploads/profile_picture/1621498409.jpg', '2021-05-20 05:13:29', '2021-05-20 05:13:29', NULL),
(3, 9, 'Ibrahim Omer', 1, '+1 (116) 212-2207', 2, 57, '\"adobe xd\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 1, NULL, NULL, 'uploads/profile_picture/1621498468.jpg', '2021-05-20 05:14:28', '2021-05-20 05:14:28', NULL),
(4, 10, 'mohammad xalil', 4, '+1 (797) 838-7676', 3, 91, '\"laravel,react.js,node.js,vue.js,figma,adobe xd,bootsrap,tailwind\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 2, NULL, NULL, 'uploads/profile_picture/1621498527.jpg', '2021-05-20 05:15:27', '2021-05-20 05:15:27', NULL),
(5, 11, 'ahmad saman', 3, '+1 (163) 121-4061', 3, 52, '\"back-end,laravel,node.js,vue.js,adobe xd,bootsrap,tailwind\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 1, NULL, NULL, 'uploads/profile_picture/1621498568.png', '2021-05-20 05:16:08', '2021-05-20 05:16:08', NULL),
(6, 12, 'Amin Ismail', 2, '+1 (823) 872-1736', 2, 18, '\"back-end,laravel,vue.js,adobe xd\"', 'Hi! I am Aryan Twanju, a web designer/developer focused on crafting great web experiences. Designing and Coding have been my passion since the days I started working with computers but I found myself into web design/development since 2007. I enjoy creating beautifully designed, intuitive and functio', 1, NULL, NULL, 'uploads/profile_picture/1621498617.jpg', '2021-05-20 05:16:58', '2021-05-20 05:16:58', NULL),
(7, 13, 'Karwan', 1, '+1 (861) 772-3897', 1, 17, '\"node.js,vue.js,adobe xd,tailwind\"', 'Qui velit proident ullamco obcaecati sequi quis dolor', 3, NULL, NULL, NULL, '2021-05-20 05:18:17', '2021-05-20 05:18:17', NULL),
(8, 14, 'Sara Ahmed', 4, '+1 (488) 835-7135', 2, 20, '\"back-end,laravel,node.js,vue.js,figma,adobe xd,bootsrap\"', 'Do aspernatur cumque consequat Eos sit', 3, NULL, NULL, NULL, '2021-05-20 05:18:56', '2021-05-20 05:18:56', NULL),
(9, 15, 'Temporibus reprehend', 2, '+1 (922) 597-7067', 2, 81, '\"back-end,react.js,node.js,bootsrap,tailwind\"', 'Cillum possimus in quia velit', 3, NULL, NULL, NULL, '2021-05-20 05:40:26', '2021-05-20 05:40:26', NULL),
(10, 19, 'Ut dolore doloremque', 1, '+1 (393) 317-3481', 1, 98, '\"react.js,vue.js,adobe xd\"', 'Illo et voluptas quia fugit dolores aperiam praesentium consequuntur consectetur eum dolore', 2, NULL, NULL, NULL, '2021-05-23 09:32:34', '2021-05-23 09:32:34', NULL),
(11, 20, 'Dolorem incididunt v', 2, '+1 (796) 903-9639', 1, 20, '\"back-end,figma,tailwind\"', 'Consequatur ullam alias quo dolor facilis lorem natus consequatur in omnis quo tempora sunt sit sint delectus qui molestiae consequat', 1, NULL, NULL, 'uploads/profile_picture/1621773536.jpg', '2021-05-23 09:38:56', '2021-05-23 09:38:56', NULL),
(12, 22, 'Laborum Asperiores', 2, '+1 (735) 174-3932', 1, 68, '\"back-end,figma,adobe xd,bootsrap\"', 'Architecto tenetur maiores eos alias omnis magna aliquid maiores quis quis asperiores et quasi tempor tempora', 3, NULL, NULL, 'uploads/profile_picture/1623676352.webp', '2021-06-14 10:12:32', '2021-06-14 10:12:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(2, 'Publisher', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(3, 'Supper Admin', '2021-05-20 05:04:53', '2021-05-20 05:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'front-endsssss', '2021-05-20 05:04:53', '2021-05-23 09:42:11'),
(2, 'back-end', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(3, 'laravel', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(4, 'react.js', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(5, 'node.js', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(6, 'vue.js', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(7, 'figma', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(8, 'adobe xd', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(9, 'bootsrap', '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(10, 'tailwind', '2021-05-20 05:04:53', '2021-05-20 05:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_profile` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `has_profile`, `email`, `email_verified_at`, `password`, `is_admin`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abdulbasit', 0, 'basit@test.com', NULL, '$2y$10$N6bDdB92kw19l18hE9EgR.seURccU4UZLkpaNF.aNKob81kUpgA5y', 1, 3, 'I7IG9qdvX8pv2prNhvkbkhKJpyLCNejXNNlOopE59iRN8sZFn9i3uNxHKFB7', '2021-05-20 05:04:52', '2021-05-20 05:04:52'),
(2, 'omid', 0, 'omid@test.com', NULL, '$2y$10$o4t3zydkYHMZ89vJR3Ek8u.F0DV.LpwwddRICdE91aZt4G0ZMY56m', 1, 2, NULL, '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(3, 'revan', 0, 'revan@test.com', NULL, '$2y$10$dS/MvGrvW.aR5lB/yRAB3e.imI1gpn42Gq5Od9m/xppJ3mx7oywCu', 1, 3, NULL, '2021-05-20 05:04:53', '2021-05-23 09:42:41'),
(4, 'mardy', 0, 'mardy@test.com', NULL, '$2y$10$bvtAkJ1NURzLOXCzqMd8F.Zauc90eRbrPTuAxbxcaM94QKFoYURry', 1, 1, NULL, '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(5, 'ibrahim', 0, 'ibrahim@test.com', NULL, '$2y$10$rHDQHlSgXUehmtWi/Bk9t.cBkNqChNKD9r8PYdcHrAIanuLy.LfT.', 1, 1, NULL, '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(6, 'ahmed', 0, 'ahmed@test.com', NULL, '$2y$10$VGWIdWkwUlyH2qivSt/mQeMvjIzJp1bVYA.c48bp33hA3p0rktnmK', 1, 1, NULL, '2021-05-20 05:04:53', '2021-05-20 05:04:53'),
(7, 'Revan', 1, 'hoqiro@mailinator.com', NULL, '$2y$10$PpOHUZjpNEXvl50FworYeufdcZYjFiXeDyuYSfOesWg5rmKTa1SGW', NULL, NULL, NULL, '2021-05-20 05:10:44', '2021-05-20 05:12:16'),
(8, 'muhamad', 1, 'zema@mailinator.com', NULL, '$2y$10$uhpfFnCAwqNU7J4pNtwb9eWkXvjGONlxRWonhI2C3PJXi.ajkFGXa', NULL, NULL, NULL, '2021-05-20 05:12:56', '2021-05-20 05:13:29'),
(9, 'ibrahim', 1, 'gudegicu@mailinator.com', NULL, '$2y$10$lk7Fap3KuJz4dlsx1GLOv.iU5JrK1q4/kS/KwqCwUjetMpegqorlW', NULL, NULL, NULL, '2021-05-20 05:13:48', '2021-05-20 05:14:28'),
(10, 'mohamad', 1, 'vinol@mailinator.com', NULL, '$2y$10$3.zimq8qa6Oxm9t4i2hdVODlbKkXNqqRdfsjCE0ZkLt7hEEPP8Iwy', NULL, NULL, NULL, '2021-05-20 05:14:50', '2021-05-20 05:15:27'),
(11, 'ahmad', 1, 'xulamit@mailinator.com', NULL, '$2y$10$br00mYsYOuCpO4bg9ZiKkOodDBhrvjbb2KKrqAJerQFaFp.m2AMlq', NULL, NULL, NULL, '2021-05-20 05:15:46', '2021-05-20 05:16:08'),
(12, 'amin', 1, 'symotuxo@mailinator.com', NULL, '$2y$10$/.2wuzSY4auHLW9RZfWBt.q4H2OMAyL0dYwXljmgnuZTTi7M1rX/.', NULL, NULL, NULL, '2021-05-20 05:16:23', '2021-05-20 05:16:58'),
(13, 'nahyrob', 1, 'buhod@mailinator.com', NULL, '$2y$10$x6IGVWbdODEeXqTRJcXZRu6j6wqxZv0IupNimY7YyNI2oVixY/ZIq', NULL, NULL, NULL, '2021-05-20 05:17:40', '2021-05-20 05:18:17'),
(14, 'sara', 1, 'gewuje@mailinator.com', NULL, '$2y$10$ME35HC5c1DvNV3jqdw1mO.a9lX5olVtW.EuwbnmHqa.ghDMEDs2j6', NULL, NULL, NULL, '2021-05-20 05:18:37', '2021-05-20 05:18:56'),
(15, 'qabijux', 1, 'mebexini@mailinator.com', NULL, '$2y$10$hxhBQhWmMPtmr3XKOiCZ2unANeBqfUkXU6/zO0JXxQd7Jepxqgthy', NULL, NULL, NULL, '2021-05-20 05:40:00', '2021-05-20 05:40:26'),
(16, 'dycyx', 0, 'mafofy@mailinator.com', NULL, '$2y$10$LQdBIQzUchhobpHycKtYd.c.9EPZ2PDx3zoM5xQJoYxsVLmLuux9G', NULL, NULL, NULL, '2021-05-20 06:32:22', '2021-05-20 06:32:22'),
(17, 'macybiseh', 0, 'hulavu@mailinator.com', NULL, '$2y$10$ItOLzgDa6epcmZsX8D3CqeLqPmNh9KVI10hkGwIIc4tfeUUXIcJbe', NULL, NULL, NULL, '2021-05-20 06:43:14', '2021-05-20 06:43:14'),
(18, 'mihoqu', 0, 'mugava@mailinator.com', NULL, '$2y$10$k934d1IEMS9Rc/BDq9YFd.Db90/OODldKhljF5KL4FqE3OcTKraLq', NULL, NULL, NULL, '2021-05-23 09:31:30', '2021-05-23 09:31:30'),
(19, 'qubujogek', 1, 'vyqavon@mailinator.com', NULL, '$2y$10$y84PFBLEUVjF2S6yx3Q8n.FMmUiBrZTrzXKO4IDwRY2QtU73pcdmK', NULL, NULL, NULL, '2021-05-23 09:32:27', '2021-05-23 09:32:34'),
(20, 'karwan', 1, 'pahimih@mailinator.com', NULL, '$2y$10$1gMtQ5aAlPnkMdIIpvXRNu98bNSUnx7lrVD2sOmrzVDllk2YS2loS', NULL, NULL, NULL, '2021-05-23 09:38:36', '2021-05-23 09:38:56'),
(22, 'tereja', 1, 'gegadixuj@mailinator.com', NULL, '$2y$10$VKs.WohmtoJEZ35T/6qNxuaDaUXoNpzllo2Sk5xiQkMGbRyEFqn/G', NULL, NULL, NULL, '2021-06-14 10:10:49', '2021-06-14 10:12:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`),
  ADD KEY `profiles_city_id_foreign` (`city_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
