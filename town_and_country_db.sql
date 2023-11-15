-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 08:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `town_and_country_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `action` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `account_number`, `firstname`, `action`, `date`) VALUES
(38, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-13 23:36:47'),
(39, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-13 23:48:41'),
(40, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-13 23:48:52'),
(41, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-13 23:49:00'),
(42, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-13 23:49:54'),
(43, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-13 23:51:13'),
(44, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-14 00:01:41'),
(45, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-14 00:01:46'),
(46, 'ADM004', 'KEN JOSHUA', '', '2023-11-14 00:12:43'),
(47, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-14 00:12:47'),
(48, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-14 00:13:15'),
(49, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-14 00:13:19'),
(50, 'ADM004', 'KEN JOSHUA', 'Delete account of', '2023-11-14 00:40:23'),
(51, 'ADM004', 'KEN JOSHUA', 'Delete account of', '2023-11-14 00:43:14'),
(52, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-14 00:53:05'),
(53, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-14 00:53:10'),
(54, 'ADM004', 'KEN JOSHUA', 'Delete account of ADM005: KEN JOSHUA', '2023-11-14 00:57:36'),
(55, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-14 01:35:31'),
(56, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-14 01:35:43'),
(57, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 01:01:49'),
(58, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 19:03:08'),
(59, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-15 19:12:22'),
(60, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 19:21:37'),
(61, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-15 19:23:29'),
(62, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 19:30:09'),
(63, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-15 19:31:47'),
(64, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 19:32:29'),
(65, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-15 19:33:04'),
(66, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 19:38:30'),
(67, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-15 21:37:06'),
(68, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-16 03:28:18'),
(69, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-16 03:28:30'),
(70, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-16 03:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `email`, `phone_number`, `photo`, `type`) VALUES
(33, 'ADM004', 'admin', '$2y$10$pDwjmZXKUx6MbuwhO6T5LOU2BD/nGyqKyOUvyDqKcrC5Ou1UA6VtC', 'KEN JOSHUA', 'BUENAVIDES', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', 'IMG_20231004_205532_(2_x_2_inch).jpg', ''),
(45, 'ADM005', 'staff', '$2y$10$lW2fBORYvW5b4HOadt6sJuzK8TwwENn8qqb.iLCab8ZRZKE/BIwC.', 'sharon', 'rivera', 'KENJOSHUABUENAVIDES@GMAIL.COM', '+639164290245', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `homeowners_users`
--

CREATE TABLE `homeowners_users` (
  `id` int(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middle_initial` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `blk` varchar(100) NOT NULL,
  `lot` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phase` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tenant_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowners_users`
--

INSERT INTO `homeowners_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `email`, `phone_number`, `blk`, `lot`, `street`, `phase`, `status`, `tenant_name`) VALUES
(1, 'TCH00001', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'TCH0002', 'TCH0002', '$2y$10$X21YBFeZd48MvrgW4Gd7ZeaKYJaeFjQr86DMt8ZM6vwzs9meWXfVq', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Member', ''),
(34, 'TCH0003', 'TCH0003', '$2y$10$Xc0rqD8JsFcjLZaQC3ZvHutfTt9VPnKl8SHwULOtnbD.qypXneVTS', 'sharon', 'rivera', 'D', 'KENJOSHUABUENAVIDES@GMAIL.COM', '+639164290245', '16', '22', 'Golden Shower', 'PH1', 'Non-member', ''),
(35, 'TCH0004', 'TCH0004', '$2y$10$XZUm1BRCOJ.9yiNvLdH6t.urlabQlZGp9w1A4RqaqL2Z3lpcSvbS2', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Tenant - Member', 'Bever Jean C Baasis'),
(36, 'TCH0005', 'TCH0005', '$2y$10$bM6uE5VhpNgsUDJ.GVoITe7gw.8sYxHFCYKAB75Sw0GaQB71BJKXe', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Golden Shower', 'PH1', 'Tenant - Non-member', 'KEN JOSHUA RIVERA BUENAVIDES'),
(37, 'TCH0006', 'TCH0006', '$2y$10$z6DC9/TXVtaW4AIRpP.8buEcERbfAm5RS6iw7QGtZ0Lyt/QSuww7a', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Non-member', ''),
(38, 'TCH0007', 'TCH0007', '$2y$10$7g2MFyFcMc.25aSMgHULRuXWEW0UpZCv7SSMQYHAcqM0xJvmP7aIK', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Tenant - Member', 'Jesusa Buenavides'),
(39, 'TCH0008', 'TCH0008', '$2y$10$XT.ya3QgPBKWDmwx5pCUhuIbhLKCEa0YRlSGNWSUpoI.wsMhmTG3O', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Golden Shower', 'PH3', 'Non-member', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_list`
--

CREATE TABLE `property_list` (
  `id` int(100) NOT NULL,
  `homeowners_id` varchar(100) NOT NULL,
  `blk` varchar(100) NOT NULL,
  `lot` varchar(100) NOT NULL,
  `phase` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `homeowners_id`, `blk`, `lot`, `phase`, `street`) VALUES
(1, '', '16', '22', 'PH1', 'Jackfruit'),
(2, '', '16', '22', 'PH1', 'Golden Shower'),
(3, '', '16', '22', 'PH1', 'Jackfruit'),
(4, '', '16', '22', 'PH2', 'Jackfruit'),
(5, '33', '16', '22', 'PH1', 'Jackfruit'),
(6, '35', '16', '15', 'PH3', 'Golden Shower'),
(7, '37', '16', '15', 'PH3', 'Golden Shower'),
(8, '37', '16', '15', 'PH3', 'Golden Shower'),
(9, '34', '4', '22', 'PH3', 'Golden Shower'),
(10, '34', '16', '15', 'PH3', 'Jackfruit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_list`
--
ALTER TABLE `property_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
