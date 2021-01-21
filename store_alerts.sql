-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 01:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_alerts`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_conditions`
--

CREATE TABLE `action_conditions` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `condition_block_no` int(11) NOT NULL,
  `condition_1` varchar(256) DEFAULT NULL,
  `condition_2` varchar(256) DEFAULT NULL,
  `condition_3` varchar(256) DEFAULT NULL,
  `condition_4` varchar(256) DEFAULT NULL,
  `condition_5` varchar(256) DEFAULT NULL,
  `condition_6` varchar(256) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_conditions`
--

INSERT INTO `action_conditions` (`id`, `parent_id`, `condition_block_no`, `condition_1`, `condition_2`, `condition_3`, `condition_4`, `condition_5`, `condition_6`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'summary', 'Day', '4', 'minuate_10', 'pm', NULL, '4-10 pm', '2021-01-21 11:13:43', '2021-01-21 11:13:43'),
(2, 1, 1, 'summary', 'Month', 'month_10', '10', 'minuate_10', 'am', '10-10 am', '2021-01-21 11:13:43', '2021-01-21 11:13:43'),
(3, 1, 2, 'normal', 'zip', 'is', '560060', NULL, NULL, NULL, '2021-01-21 11:13:43', '2021-01-21 11:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `alert_condition`
--

CREATE TABLE `alert_condition` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `is_trigered` int(11) NOT NULL DEFAULT 0,
  `condition_block_count` int(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert_condition`
--

INSERT INTO `alert_condition` (`id`, `title`, `description`, `is_trigered`, `condition_block_count`, `created_at`, `updated_at`) VALUES
(1, 'Alert Title Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, 2, '2021-01-21 05:43:43.000000', '2021-01-21 11:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `block_conditions`
--

CREATE TABLE `block_conditions` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `condition_block_no` int(11) NOT NULL,
  `choice_made` varchar(20) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_conditions`
--

INSERT INTO `block_conditions` (`id`, `parent_id`, `condition_block_no`, `choice_made`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'any', '2021-01-21 11:13:43', '2021-01-21 11:13:43'),
(2, 1, 2, 'all', '2021-01-21 11:13:43', '2021-01-21 11:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `filter_conditions`
--

CREATE TABLE `filter_conditions` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `condition_block_no` int(11) NOT NULL,
  `condition_1` varchar(256) DEFAULT NULL,
  `condition_2` varchar(256) DEFAULT NULL,
  `condition_3` varchar(256) DEFAULT NULL,
  `condition_4` varchar(256) DEFAULT NULL,
  `condition_5` varchar(256) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filter_conditions`
--

INSERT INTO `filter_conditions` (`id`, `parent_id`, `condition_block_no`, `condition_1`, `condition_2`, `condition_3`, `condition_4`, `condition_5`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'customer', 'first_name', 'is_not', '5', NULL, '2021-01-21 05:43:43.000000', '2021-01-21 11:13:43', NULL),
(2, 1, 2, 'order', 'order_id', 'less_than', '10', NULL, '2021-01-21 05:43:43.000000', '2021-01-21 11:13:43', NULL);

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
(3, '2016_11_01_152432_create_users_activation_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_conditions`
--
ALTER TABLE `action_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert_condition`
--
ALTER TABLE `alert_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_conditions`
--
ALTER TABLE `block_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter_conditions`
--
ALTER TABLE `filter_conditions`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `action_conditions`
--
ALTER TABLE `action_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alert_condition`
--
ALTER TABLE `alert_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `block_conditions`
--
ALTER TABLE `block_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filter_conditions`
--
ALTER TABLE `filter_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
