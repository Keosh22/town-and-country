-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 10:47 AM
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
(160, 'ADM008', 'TCH', 'Logged out', '2023-11-27 01:11:19'),
(161, 'ADM008', 'TCH', 'Logged in the system', '2023-11-27 01:11:40'),
(162, 'ADM008', 'TCH', 'Logged out', '2023-11-27 01:12:33'),
(163, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-27 01:12:46'),
(164, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-41 Phase 3 Emerald to TCH0013: Jude Erron Buenavides', '2023-11-27 12:25:40'),
(165, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-15 LOT-123 Phase 1 Apple Mango to TCH0013: Jude Erron Buenavides', '2023-11-27 12:26:43'),
(166, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-27 12:26:47'),
(167, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-27 12:26:53'),
(168, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-15 LOT-33 Phase 1 Guyabano to TCH0012: Jude Erron', '2023-11-27 12:27:20'),
(169, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated: ', '2023-11-27 12:55:57'),
(170, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated: STREET', '2023-11-27 12:57:01'),
(171, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated: STREET', '2023-11-27 12:57:20'),
(172, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated: ', '2023-11-27 12:59:45'),
(173, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated:  BLKLOTPHASESTREET', '2023-11-27 13:29:16'),
(174, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-29 21:13:16'),
(175, 'ADM004', 'KEN JOSHUA', 'Update property information of :  = The following information has been updated:  BLKLOTPHASESTREET', '2023-11-29 21:15:16'),
(176, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0014: Lesther ', '2023-11-29 21:16:06'),
(177, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-41 Phase 3 Diamon to TCH0014: Lesther  Martinez', '2023-11-29 21:16:26'),
(178, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-123 LOT-123 Phase 1 Santol to TCH0014: Lesther  Martinez', '2023-11-29 21:17:07'),
(179, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-15 LOT-14 Phase 1 Macopa to TCH0014: Lesther  Martinez', '2023-11-29 21:17:24'),
(180, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0015: KEN JOSHUA', '2023-11-29 21:17:41'),
(181, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-asd LOT-asd Phase 1 Macopa to TCH0015: KEN JOSHUA BUENAVIDES', '2023-11-29 21:17:47'),
(182, 'ADM004', 'KEN JOSHUA', 'Update street: Diamon to Diamond', '2023-11-29 21:18:09'),
(183, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0002: KEN JOSHUA', '2023-11-29 21:20:53'),
(184, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-22 Phase 1 Jackfruit to TCH0002: KEN JOSHUA BUENAVIDES', '2023-11-29 21:21:07'),
(185, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0003: Jude Erron', '2023-11-29 21:21:36'),
(186, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-10 LOT-11 Phase 3 Diamond to TCH0003: Jude Erron Buenavides', '2023-11-29 21:21:48'),
(187, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-11 LOT-15 Phase 3 Diamond to TCH0003: Jude Erron Buenavides', '2023-11-29 21:22:03'),
(188, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0004: Jesusa', '2023-11-29 21:23:02'),
(189, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-22 Phase 1 Jackfruit to TCH0002: KEN JOSHUA BUENAVIDES', '2023-11-29 22:06:46'),
(190, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-10 LOT-11 Phase 3 Diamond to TCH0004: Jesusa Buenavides', '2023-11-29 22:07:03'),
(191, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-12 LOT-2 Phase 3 Garnett to TCH0004: Jesusa Buenavides', '2023-11-29 22:07:13'),
(192, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-11 Phase 1 Avocado to TCH0003: Jude Erron Buenavides', '2023-11-29 22:07:35'),
(193, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-11 LOT-15 Phase 1 Golden Coconut to TCH0003: Jude Erron Buenavides', '2023-11-29 22:07:56'),
(194, 'ADM004', 'KEN JOSHUA', 'Update homeowners information of TCH0003: Jude Erron = The following information has been updated:  BLK, PHASE, STREET,', '2023-11-29 22:08:53'),
(195, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-15 LOT-12 Phase 3 Emerald to TCH0002: KEN JOSHUA BUENAVIDES', '2023-11-29 22:56:28'),
(196, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-29 22:58:46'),
(197, 'ADM008', 'TCH', 'Logged in the system', '2023-11-29 22:58:56'),
(198, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-30 13:11:46'),
(199, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-30 13:48:43'),
(200, 'ADM008', 'TCH', 'Logged in the system', '2023-11-30 13:48:54'),
(201, 'ADM008', 'TCH', 'Delete account of ADM011: KEN JOSHUA', '2023-11-30 13:49:09'),
(202, 'ADM008', 'TCH', 'Delete account of ADM011: KEN JOSHUA', '2023-11-30 13:49:54'),
(203, 'ADM008', 'TCH', 'Logged out', '2023-11-30 14:03:16'),
(204, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-30 14:03:22'),
(205, 'ADM004', 'KEN JOSHUA', 'Transfer property:  FROM:   TO: ', '2023-11-30 14:12:49'),
(206, 'ADM004', 'KEN JOSHUA', 'Transfer property: BLK-16 LOT-22 Jackfruit FROM:  Jesusa R. Buenavides TO: KEN JOSHUA RIVERA BUENAVIDES', '2023-11-30 14:14:31'),
(207, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-24 19:43:46'),
(208, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-24 19:43:53'),
(209, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-30 19:45:24'),
(210, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-30 19:45:29'),
(211, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-30 20:24:47'),
(212, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-30 21:00:19'),
(213, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-12-01 15:40:37'),
(214, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-01 15:40:45'),
(215, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-01 16:10:50'),
(216, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-12-01 16:13:36'),
(217, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-01 16:35:01');

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
  `type` varchar(100) NOT NULL DEFAULT 'ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `email`, `phone_number`, `photo`, `type`) VALUES
(33, 'ADM004', 'admin', '$2y$10$pDwjmZXKUx6MbuwhO6T5LOU2BD/nGyqKyOUvyDqKcrC5Ou1UA6VtC', 'KEN JOSHUA', 'BUENAVIDES', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', 'IMG_20231004_205532_(2_x_2_inch).jpg', 'ADMIN'),
(48, 'ADM008', 'Super_admin', '$2y$10$XIWISYaxs2YEx7hxQGcUSOKdc9tp9h4siyN81Q9PCOmjr9NVxYvDC', 'TCH', 'TCH', 'tch@gmail.com', '09123456789', 'TCH logo.png', 'SUPER_ADMIN\r\n'),
(49, 'ADM009', 'Kirby', '$2y$10$6R.ANIwWSihSd4RrdxW6LuC2Ji0z7I9qjB5JWcYzB4iRtg69WZvo6', 'Kirby', 'Rivera', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '387467491_1032635598167678_2495845338663066655_n (1).jpg', 'ADMIN'),
(50, 'ADM010', 'Lesther', '$2y$10$of676iHgQNdbjxYq6DmtJu6.LQXj.RObPRoKp2bsa/WSMy7D2jjYS', 'Lesther', 'Martinez', 'Lesthermartinez@gmail.com', '09771778411', '387519748_192870633834999_3008499567823451055_n.jpg', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `about`, `content`, `date`, `date_created`, `status`) VALUES
(1, 'Meeting', 'We have a general meeting this coming day. We are expecting the attendance of all the homeowners. Thank you!', '2023-11-21 21:03:52', '2023-11-25 15:00:00', 'ACTIVE'),
(2, 'Libreng Tuli', 'We are pleased to inform you that we will be having a free tuli.', '2023-11-30 20:21:38', '2023-11-30 12:00:00', 'INACTIVE'),
(3, 'Sports', 'Sports fest', '2023-11-30 20:23:38', '2023-11-21 19:38:37', 'INACTIVE'),
(4, 'Webinar', 'Hacking', '2023-11-30 20:23:04', '2023-11-21 19:38:54', 'INACTIVE'),
(11, 'Christmas Party', 'Our Christmas Party will be held on HOA Clubhouse by 1:00PM to 5:00PM', '2023-12-08 01:00:00', '2023-12-01 15:42:31', 'ACTIVE'),
(12, 'New Year Party TCH HOA', 'New year eves party', '2023-12-31 08:00:00', '2023-12-01 16:56:03', 'ACTIVE'),
(13, 'Bday Cody', 'asdasdasd', '2023-12-01 05:14:00', '2023-12-01 17:14:34', 'ACTIVE'),
(14, 'Bday Yana', 'Bday ni yana', '2024-01-01 12:01:00', '2023-12-01 17:15:10', 'ACTIVE'),
(15, 'Bday ko', 'Bday ni Ken', '2024-08-22 05:18:00', '2023-12-01 17:20:16', 'ACTIVE');

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
(55, 'TCH0002', 'TCH0002', '$2y$10$WXXgqrI5MXxSIEQHAcycH.uRnnZw4vRCmGNnYXFAVPRkwIRnpstpy', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'Phase 1', 'Member', ''),
(56, 'TCH0003', 'TCH0003', '$2y$10$2LXpINH9W8J5CU4sfe/dSezxW2WXYq0hePMWHcblgLRzkJZAwtQXq', 'Jude Erron', 'Buenavides', 'R.', 'Judeerron@gmail.com', '+639164290245', '16', '11', 'Avocado', 'Phase 1', 'Non-member', ''),
(57, 'TCH0004', 'TCH0004', '$2y$10$BuR3aMnWb3JGUe5CYAfod.15fC0qvAr9qzbUQ0RuIXh1CV8IH2rJC', 'Jesusa', 'Buenavides', 'R.', 'jesusa@gmail.com', '09123456789', '10', '11', 'Diamond', 'Phase 3', 'Member', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_list`
--

CREATE TABLE `property_list` (
  `id` int(100) NOT NULL,
  `homeowners_id` int(100) NOT NULL,
  `blk` varchar(100) NOT NULL,
  `lot` varchar(100) NOT NULL,
  `phase` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `homeowners_id`, `blk`, `lot`, `phase`, `street`) VALUES
(37, 55, '16', '22', 'Phase 1', 'Jackfruit'),
(38, 57, '10', '11', 'Phase 3', 'Diamond'),
(39, 57, '12', '2', 'Phase 3', 'Garnett'),
(40, 56, '16', '11', 'Phase 1', 'Avocado'),
(41, 56, '11', '15', 'Phase 1', 'Golden Coconut'),
(42, 55, '15', '12', 'Phase 3', 'Emerald');

-- --------------------------------------------------------

--
-- Table structure for table `street_list`
--

CREATE TABLE `street_list` (
  `id` int(100) NOT NULL,
  `phase` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `street_list`
--

INSERT INTO `street_list` (`id`, `phase`, `street`) VALUES
(1, 'Phase 1', 'Macopa'),
(17, 'Phase 1', 'Apple Mango'),
(18, 'Phase 1', 'Atis'),
(19, 'Phase 1', 'Avocado'),
(20, 'Phase 1', 'Santol'),
(21, 'Phase 1', 'Guava'),
(22, 'Phase 1', 'Golden Coconut'),
(23, 'Phase 1', 'Jackfruit'),
(24, 'Phase 1', 'Golden shower'),
(25, 'Phase 1', 'Chico'),
(26, 'Phase 1', 'Guyabano'),
(27, 'Phase 1', 'Townhouse'),
(28, 'Phase 3', 'Garnett'),
(29, 'Phase 3', 'Diamond'),
(30, 'Phase 3', 'Emerald'),
(84, 'Phase 1', 'Geto');

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
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeowners_id` (`homeowners_id`);

--
-- Indexes for table `street_list`
--
ALTER TABLE `street_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `street_list`
--
ALTER TABLE `street_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_list`
--
ALTER TABLE `property_list`
  ADD CONSTRAINT `property_list_ibfk_1` FOREIGN KEY (`homeowners_id`) REFERENCES `homeowners_users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
