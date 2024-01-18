-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 05:38 PM
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
(324, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-3 LOT-9 Phase 1 Guava to TCH0007: Lesther Martinez', '2024-01-14 23:37:02');

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
(2, 54, 58, '10', '23', 'Phase 3', 'Garnett', 0);

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
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `collection_fee_id` int(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `balance` varchar(200) NOT NULL,
  `date_expired` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `month_int` varchar(100) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_list`
--

INSERT INTO `collection_list` (`id`, `property_id`, `collection_fee_id`, `date_created`, `balance`, `date_expired`, `status`, `month`, `month_int`, `year`) VALUES
(339, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024'),
(340, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(341, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'PAID', 'March', '03', '2024'),
(342, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(343, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(344, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(345, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(346, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(347, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(348, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(349, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(350, 53, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(351, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(352, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(353, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(354, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(355, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(356, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(357, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(358, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(359, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(360, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(361, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(362, 55, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(363, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'PAID', 'January', '01', '2024'),
(364, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(365, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(366, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(367, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(368, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(369, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(370, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(371, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(372, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(373, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(374, 56, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(375, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(376, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(377, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(378, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(379, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(380, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(381, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(382, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(383, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(384, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(385, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(386, 57, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(387, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(388, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(389, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(390, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(391, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(392, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(393, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(394, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(395, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(396, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(397, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(398, 58, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(399, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(400, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(401, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(402, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(403, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(404, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(405, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(406, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(407, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(408, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(409, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(410, 59, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(411, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024'),
(412, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(413, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(414, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(415, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(416, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(417, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(418, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(419, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(420, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(421, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(422, 60, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(423, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(424, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(425, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(426, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(427, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(428, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(429, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(430, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(431, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(432, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(433, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(434, 61, 18, '2024-01-14 22:40:16', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024'),
(435, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'DUE', 'January', '01', '2024'),
(436, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024'),
(437, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024'),
(438, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024'),
(439, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024'),
(440, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024'),
(441, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024'),
(442, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024'),
(443, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024'),
(444, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024'),
(445, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024'),
(446, 62, 18, '2024-01-14 23:37:02', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024');

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
(55, 'TCH0002', 'TCH0002', '$2y$10$WXXgqrI5MXxSIEQHAcycH.uRnnZw4vRCmGNnYXFAVPRkwIRnpstpy', 'Chelsea', 'Modesto', 'L', 'chelseamodesto@gmail.com', '09837263546', '16', '28', 'Jackfruit', 'Phase 1', 'Tenant', ''),
(57, 'TCH0004', 'TCH0004', '$2y$10$BuR3aMnWb3JGUe5CYAfod.15fC0qvAr9qzbUQ0RuIXh1CV8IH2rJC', 'Ken Joshua', 'Buenavides', 'R.', 'kenjoshuabuenavides@gmail.com', '09123456789', '16', '22', 'Jackfruit', 'Phase 1', 'Member', ''),
(58, 'TCH0005', 'TCH0005', '$2y$10$CVNzN7C89kzn5/SyMSsMUOkbLFE0iN0p3lMIZh9F8/rbf1GGQGXj2', 'Charline', 'Apiado', 'W.', 'charline@gmail.com', '09372645362', '2', '6', 'Pearl', 'Phase 3', 'Non-member', ''),
(60, 'TCH0007', 'TCH0007', '$2y$10$feI4ZXLIum.cFRpHeKYlvejX4U0e95lYzC1a3D4bxmEIS3CNsl1Ca', 'Lesther', 'Martinez', 'M.', 'lesther@gmail.com', '09876543211', '8', '23', 'Narra', 'Phase 2', 'Member', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments_list`
--

CREATE TABLE `payments_list` (
  `id` int(100) NOT NULL,
  `transaction_number` int(250) NOT NULL,
  `homeowners_id` int(100) NOT NULL,
  `collection_id` int(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `paid` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, '407771942_120202532022330760_6460213004535456788_n.jpg', 'Vans', 'Vans Checkered SALE \r\n60% OFF\r\nBUY NOW!', 'ACTIVE', '2024-01-13 00:59:42', '2024-01-20 12:00:00');

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
(53, 58, '10', '22', 'Phase 3', 'Garnett', NULL),
(55, 57, '16', '28', 'Phase 1', 'Jackfruit', 55),
(56, 60, '15', '17', 'Phase 2', 'Molave', NULL),
(57, 57, '22', '23', 'Phase 1', 'Apple Mango', NULL),
(58, 58, '2', '6', 'Phase 1', 'Macopa', NULL),
(59, 58, '22', '25', 'Phase 2', 'Kamagong', NULL),
(60, 57, '1', '2', 'Phase 3', 'Garnett', NULL),
(61, 57, '14', '8', 'Phase 2', 'Balete', NULL),
(62, 60, '3', '9', 'Phase 1', 'Guava', NULL);

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

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
-- AUTO_INCREMENT for table `archive_property_list`
--
ALTER TABLE `archive_property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collection_fee`
--
ALTER TABLE `collection_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `collection_list`
--
ALTER TABLE `collection_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payments_list`
--
ALTER TABLE `payments_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
