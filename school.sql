-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 04:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `api_token` varchar(250) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `status`, `api_token`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'akvr', '$2y$10$cQgA/xBSRG3QLlo5KcuW9.HIUT2j3FZcrahQerMLScmSgwigyS0oe', '12345678912', 1, 'ghhdfghdsfgdfgdfgdfgdfgfd', NULL, '2020-08-24 20:28:33', '2020-08-13 23:07:08'),
(3, 'Arun', '$2y$10$8MNizQjVvmtkjWxth01HcO0O9MI2gG5LZ6Ork5yocqZ07bpwduFQG', '1234467890', 0, 'IuV8Je4tgmaCaVlQ9wPKh4F9VuJ3Q1BtpNz3sObC5Yyj3JQ8FpmIMaUcPQ1f', NULL, '2020-08-20 20:38:23', '2020-08-20 20:38:23'),
(4, 'Shilpa', '$2y$10$RlwgyWqKVWEKY5gYJJCZM.BfpwZkvyozKV6eKI1gAhn0tiLuyWtia', '1234467810', 1, 'MCn0lUTL6frmMDOroQKQW3R08bz4DLbqlKwY7MJKS6NgFY0NT9XpQSUr7HJR', NULL, '2020-08-23 15:00:02', '2020-08-23 15:00:02'),
(15, 'Sharoon', '$2y$10$R/fRR6tM1Enu99pxWnerf.4laCMV5wF4hXUGxM0wwepmZMQk/wJ66', '1234567891', 1, 'YIcAFgjJRh1AaCkb2bF0sKpixw9j2Sw54xX9ytsV3hY3VDxBLHIjexxV7Pfi', NULL, '2020-08-24 19:53:04', '2020-08-24 19:53:04'),
(16, 'Nimmya', '$2y$10$WPyaJWCwc.7paefoFKDnKO3q8wvf3COkENQxnCYDcki7S2XxLRJ6O', '1545645852', 1, '09FFjkfuRc3bNgIXKqssuyE7SlSOmxLC5yiTfcAeGrBUEpQdNLRvWV3YfSfk', NULL, '2020-08-25 14:12:38', '2020-08-25 14:12:38'),
(17, 'Nimmya', '$2y$10$6ASHZneJXIea08wg9nR7p.ah7w5eqFUzMqU/7fm66d7RLu3WcKzoe', '1545645854', 1, '734OaC75VzrdqRFiUanEHQ3Ivdbi6X6EtoHwyUugAqtcZADTd4dnGtycsqeI', NULL, '2020-08-25 14:12:54', '2020-08-25 14:12:54'),
(18, 'Nimmya', '$2y$10$J.1NgWbOAatLOtHSD2oxVe2DCZ9o3ppUBanTAAPWEYW0mQXRHN07m', '1545645825', 1, 'bG5EjVh9sEIvHIl5kH8zql5zDJBnwRyy4YdIjunjyUgajG5TDWHAN37yRUlL', NULL, '2020-08-25 14:58:11', '2020-08-25 14:58:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_token` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
