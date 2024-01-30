-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 07:53 PM
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
(272, 'ADM008', 'TCH', 'Logged out', '2023-12-06 00:08:26'),
(273, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-06 00:08:30'),
(274, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-22 21:31:29'),
(275, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-23 21:02:33'),
(276, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-12-26 22:27:23'),
(277, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-04 13:26:28'),
(278, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-07 21:50:40'),
(279, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-07 22:50:43'),
(280, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-09 22:01:13'),
(281, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 21:22:06'),
(282, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 21:22:13'),
(283, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 21:24:28'),
(284, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 21:24:35'),
(285, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 21:24:41'),
(286, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 21:24:47'),
(287, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 22:18:30'),
(288, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 22:18:34'),
(289, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 22:19:06'),
(290, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 22:19:10'),
(291, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 22:19:47'),
(292, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 22:19:54'),
(293, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 22:21:22'),
(294, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 22:21:26'),
(295, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:02:30'),
(296, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:02:37'),
(297, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:02:42'),
(298, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:03:15'),
(299, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:04:43'),
(300, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:04:54'),
(301, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:38:45'),
(302, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:39:08'),
(303, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:39:50'),
(304, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:41:04'),
(305, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:43:26'),
(306, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:43:31'),
(307, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:46:17'),
(308, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:46:28'),
(309, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-10 23:50:37'),
(310, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-10 23:50:41'),
(311, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-11 22:11:42'),
(312, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-22 LOT-23 Phase 1 Apple Mango to TCH0004: Ken Joshua Buenavides', '2024-01-11 22:42:39'),
(313, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-11 22:43:54'),
(314, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-11 22:44:00'),
(315, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-2 LOT-6 Phase 1 Macopa to TCH0005: Charline Apiado', '2024-01-11 23:56:47'),
(316, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-22 LOT-25 Phase 2 Kamagong to TCH0005: Charline Apiado', '2024-01-12 00:06:48'),
(317, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-12 21:38:12'),
(318, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-13 17:09:11'),
(319, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-1 LOT-2 Phase 3 Garnett to TCH0004: Ken Joshua Buenavides', '2024-01-13 18:06:07'),
(320, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-14 LOT-8 Phase 2 Balete to TCH0004: Ken Joshua Buenavides', '2024-01-13 18:08:12'),
(321, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-14 19:38:04'),
(322, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-14 22:40:12'),
(323, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-14 22:40:16'),
(324, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-3 LOT-9 Phase 1 Guava to TCH0007: Lesther Martinez', '2024-01-14 23:37:02'),
(325, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-15 21:38:10'),
(326, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 12:01:25'),
(327, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 15:59:02'),
(328, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 15:59:07'),
(329, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 16:21:17'),
(330, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 16:21:38'),
(331, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 16:22:27'),
(332, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 16:23:12'),
(333, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 16:23:23'),
(334, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 16:27:13'),
(335, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 16:30:00'),
(336, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 16:30:07'),
(337, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-18 16:30:38'),
(338, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-18 16:30:45'),
(339, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-19 01:52:21'),
(340, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-19 06:19:56'),
(341, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-19 06:20:03'),
(342, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-20 17:36:32'),
(343, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-21 01:36:24'),
(344, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-21 01:36:30'),
(345, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-21 01:36:43'),
(346, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-21 01:36:56'),
(347, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-21 01:36:58'),
(348, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-21 01:37:13'),
(349, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-21 14:14:01'),
(350, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-23 13:25:34'),
(351, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-43 LOT-23 Phase 2 Acacia to TCH0004: Ken Joshua Buenavides', '2024-01-23 15:05:40'),
(352, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0008: Beverly', '2024-01-23 20:38:06'),
(353, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-25 Phase 1 Golden Coconut to TCH0008: Beverly Baasis', '2024-01-23 20:39:00'),
(354, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-01-24 01:46:08'),
(355, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-24 01:46:12'),
(356, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-24 02:36:02'),
(357, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-24 21:41:56'),
(358, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0009: Sharon', '2024-01-24 21:46:39'),
(359, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-12 LOT-3 Phase 3 Diamond to TCH0009: Sharon Rivera', '2024-01-24 21:46:59'),
(360, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-25 16:58:02'),
(361, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-01-27 17:43:48'),
(362, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-23 LOT-21 Phase 3 Turquoise to TCH0008: Beverly Baasis', '2024-01-27 19:56:20'),
(363, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0010: Kirby', '2024-01-28 01:49:37'),
(364, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0010: Kirby', '2024-01-28 01:58:48');

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
(81, 'Capstone Defense BSIT 3', 'asdasd', '2024-01-07 09:57:00', '2024-01-07 21:57:14', 'INACTIVE'),
(82, 'Valentines Day', 'Valentines Day Event', '2024-02-14 12:00:00', '2024-01-13 00:52:41', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `archive_payments_list`
--

CREATE TABLE `archive_payments_list` (
  `id` int(250) NOT NULL,
  `payment_list_id` int(250) NOT NULL,
  `transaction_number` varchar(250) NOT NULL,
  `homeowners_id` int(250) NOT NULL,
  `property_id` int(250) NOT NULL,
  `collection_id` int(250) NOT NULL,
  `collection_fee_id` int(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `paid` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_property_list`
--

CREATE TABLE `archive_property_list` (
  `id` int(100) NOT NULL,
  `property_id` int(100) NOT NULL,
  `homeowners_id` int(100) NOT NULL,
  `blk` varchar(100) NOT NULL,
  `lot` varchar(100) NOT NULL,
  `phase` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `tenant` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_property_list`
--

INSERT INTO `archive_property_list` (`id`, `property_id`, `homeowners_id`, `blk`, `lot`, `phase`, `street`, `tenant`) VALUES
(1, 56, 60, '15', '17', 'Phase 2', 'Molave', 0),
(2, 54, 58, '10', '23', 'Phase 3', 'Garnett', 0),
(3, 53, 58, '10', '22', 'Phase 3', 'Garnett', 0);

-- --------------------------------------------------------

--
-- Table structure for table `collection_fee`
--

CREATE TABLE `collection_fee` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_fee`
--

INSERT INTO `collection_fee` (`id`, `category`, `description`, `fee`, `date_created`, `status`) VALUES
(4, 'Membership fee', '', '1,000', '2023-12-23 01:42:00', 'ACTIVE'),
(5, 'Construction Bond', '', '200', '2023-12-23 01:42:00', 'ACTIVE'),
(6, 'Construction clearance', '', '3,000', '2023-12-23 01:43:00', 'ACTIVE'),
(12, 'Material delivery', '6 wheeler', '300', '2023-12-23 10:57:00', 'ACTIVE'),
(13, 'Material delivery', '10 wheeler', '600', '2023-12-23 10:57:00', 'ACTIVE'),
(14, 'Material delivery', '12+ wheeler', '2,000', '2023-12-23 10:57:00', 'ACTIVE'),
(18, 'Monthly Dues', '', '300', '2024-01-10 08:30:00', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `collection_list`
--

CREATE TABLE `collection_list` (
  `id` int(255) NOT NULL,
  `property_id` int(200) NOT NULL,
  `owners_id` int(255) NOT NULL,
  `collection_fee_id` int(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `balance` varchar(200) NOT NULL,
  `date_paid` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `month_int` varchar(100) NOT NULL,
  `year` varchar(200) NOT NULL,
  `email_status` varchar(100) NOT NULL DEFAULT 'NOT SENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_list`
--

INSERT INTO `collection_list` (`id`, `property_id`, `owners_id`, `collection_fee_id`, `date_created`, `balance`, `date_paid`, `status`, `month`, `month_int`, `year`, `email_status`) VALUES
(229, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(230, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(231, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(232, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(233, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(234, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(235, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(236, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(237, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(238, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(239, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(240, 55, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(241, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(242, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(243, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(244, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(245, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(246, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(247, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(248, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(249, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(250, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(251, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(252, 56, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(253, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(254, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(255, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(256, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(257, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(258, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(259, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(260, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(261, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(262, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(263, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(264, 58, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(265, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(266, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(267, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(268, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(269, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(270, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(271, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(272, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(273, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(274, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(275, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(276, 59, 58, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(277, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(278, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(279, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(280, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(281, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(282, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(283, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(284, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(285, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(286, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(287, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(288, 62, 60, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(289, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(290, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(291, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(292, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(293, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(294, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(295, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(296, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(297, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(298, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(299, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(300, 63, 57, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(301, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(302, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(303, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(304, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(305, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(306, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(307, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(308, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(309, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(310, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(311, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(312, 64, 62, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(313, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'SENT'),
(314, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(315, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(316, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(317, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(318, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(319, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(320, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(321, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(322, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(323, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(324, 65, 63, 18, '2024-01-25 02:01:24', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(325, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'SENT'),
(326, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(327, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(328, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(329, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(330, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(331, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(332, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(333, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(334, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(335, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(336, 66, 62, 18, '2024-01-27 19:56:20', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(337, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(338, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(339, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(340, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(341, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(342, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(343, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(344, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(345, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(346, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(347, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(348, 67, 69, 18, '2024-01-28 01:54:21', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT'),
(349, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024', 'NOT SENT'),
(350, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT'),
(351, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT'),
(352, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT'),
(353, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT'),
(354, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT'),
(355, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT'),
(356, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT'),
(357, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT'),
(358, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT'),
(359, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT'),
(360, 68, 70, 18, '2024-01-28 02:08:18', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT');

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
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowners_users`
--

INSERT INTO `homeowners_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `email`, `phone_number`, `blk`, `lot`, `street`, `phase`, `status`, `date_created`) VALUES
(55, 'TCH0002', 'TCH0002', '$2y$10$WXXgqrI5MXxSIEQHAcycH.uRnnZw4vRCmGNnYXFAVPRkwIRnpstpy', 'Chelsea', 'Modesto', 'L', 'chelseamodesto@gmail.com', '09837263546', '16', '28', 'Jackfruit', 'Phase 1', 'Tenant', '2024-01-28 01:58:48'),
(57, 'TCH0004', 'TCH0004', '$2y$10$BuR3aMnWb3JGUe5CYAfod.15fC0qvAr9qzbUQ0RuIXh1CV8IH2rJC', 'Ken Joshua', 'Buenavides', 'R.', 'kenjoshuabuenavides@gmail.com', '09123456789', '16', '22', 'Jackfruit', 'Phase 1', 'EXPIRED', '2024-01-28 01:58:48'),
(58, 'TCH0005', 'TCH0005', '$2y$10$CVNzN7C89kzn5/SyMSsMUOkbLFE0iN0p3lMIZh9F8/rbf1GGQGXj2', 'Charline', 'Apiado', 'W.', 'charline@gmail.com', '09372645362', '2', '6', 'Pearl', 'Phase 3', 'Non-member', '2024-01-28 01:58:48'),
(60, 'TCH0007', 'TCH0007', '$2y$10$feI4ZXLIum.cFRpHeKYlvejX4U0e95lYzC1a3D4bxmEIS3CNsl1Ca', 'Lesther', 'Martinez', 'M.', 'buenavideskeosh@gmail.com', '09876543211', '8', '23', 'Narra', 'Phase 2', 'Member', '2024-01-28 01:58:48'),
(62, 'TCH0008', 'TCH0008', '$2y$10$JDmn0gYZMvvQaK5RWNc1XudD0r7tlcDZV4E3ozA10n5sdwmCDiWDC', 'Beverly', 'Baasis', 'C.', 'buenavideskeosh@gmail.com', '09876543211', '16', '25', 'Golden Coconut', 'Phase 1', 'EXPIRED', '2024-01-28 01:58:48'),
(63, 'TCH0009', 'TCH0009', '$2y$10$eM4myKF1JhCro2XfW.3K6eKJ1rtK.ISQIRsRt9QlZAzEXEsg4/Wsa', 'Sharon', 'Rivera', 'R.', 'kenjoshuabuenavides@gmail.com', '09876543212', '12', '3', 'Diamond', 'Phase 3', 'Member', '2024-01-28 01:58:48'),
(70, 'TCH0010', 'TCH0010', '$2y$10$yQUL/8C8.6JeTWcTi69PWePaRAle7.j7OAkhBt5puGTihLkLI0qKO', 'Kirby', 'Rivera', 'W.', 'kirby@gmail.com', '09372645362', '12', '22', 'Jade', 'Phase 3', 'Member', '2024-01-28 01:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments_list`
--

CREATE TABLE `payments_list` (
  `id` int(100) NOT NULL,
  `transaction_number` varchar(250) NOT NULL,
  `homeowners_id` int(100) NOT NULL,
  `property_id` int(100) NOT NULL,
  `collection_id` int(255) NOT NULL,
  `collection_fee_id` int(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `paid` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_list`
--

INSERT INTO `payments_list` (`id`, `transaction_number`, `homeowners_id`, `property_id`, `collection_id`, `collection_fee_id`, `date_created`, `paid`, `balance`) VALUES
(12, 'TN00000001', 0, 0, 0, 0, '2024-01-16 00:54:33', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(100) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `date_created` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `photo`, `business_name`, `content`, `status`, `date_created`, `date_expired`) VALUES
(14, '1000_F_251682139_JSihMaG8QmLh7JcSAPZ6mzh6PZjfqjf0.jpg', 'Thrift Collections', 'Year End Sale!!!', 'INACTIVE', '2024-01-07 03:36:54', '2024-01-13 03:36:00'),
(17, '407771942_120202532022330760_6460213004535456788_n.jpg', 'Vans', 'Vans Checkered SALE \r\n60% OFF\r\nBUY NOW!', 'INACTIVE', '2024-01-13 00:59:42', '2024-01-20 12:00:00');

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
  `street` varchar(100) NOT NULL,
  `tenant` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `homeowners_id`, `blk`, `lot`, `phase`, `street`, `tenant`) VALUES
(55, 57, '16', '28', 'Phase 1', 'Jackfruit', 55),
(56, 60, '15', '17', 'Phase 2', 'Molave', NULL),
(58, 58, '2', '6', 'Phase 1', 'Macopa', NULL),
(59, 58, '22', '25', 'Phase 2', 'Kamagong', NULL),
(62, 60, '3', '9', 'Phase 1', 'Guava', NULL),
(63, 57, '43', '23', 'Phase 2', 'Acacia', NULL),
(64, 62, '16', '25', 'Phase 1', 'Golden Coconut', NULL),
(65, 63, '12', '3', 'Phase 3', 'Diamond', NULL),
(66, 62, '23', '21', 'Phase 3', 'Turquoise', NULL),
(68, 70, '12', '22', 'Phase 3', 'Jade', NULL);

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
(85, 'Phase 3', 'Pearl'),
(86, 'Phase 3', 'Sapphire'),
(87, 'Phase 3', 'Turquoise'),
(88, 'Phase 3', 'Golden Berryl'),
(89, 'Phase 3', 'Ruby'),
(90, 'Phase 3', 'Jade'),
(91, 'Phase 3', 'Agathe'),
(92, 'Phase 2', 'Acacia'),
(93, 'Phase 2', 'Tanguile'),
(94, 'Phase 2', 'Molave'),
(95, 'Phase 2', 'Narra'),
(96, 'Phase 2', 'Balete'),
(97, 'Phase 2', 'Kamagong');

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
-- Indexes for table `archive_payments_list`
--
ALTER TABLE `archive_payments_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_property_list`
--
ALTER TABLE `archive_property_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_fee`
--
ALTER TABLE `collection_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_list`
--
ALTER TABLE `collection_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_list`
--
ALTER TABLE `payments_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `archive_payments_list`
--
ALTER TABLE `archive_payments_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archive_property_list`
--
ALTER TABLE `archive_property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collection_fee`
--
ALTER TABLE `collection_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `collection_list`
--
ALTER TABLE `collection_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `payments_list`
--
ALTER TABLE `payments_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `street_list`
--
ALTER TABLE `street_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
