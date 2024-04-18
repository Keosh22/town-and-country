-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 09:24 AM
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
(1, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-16 22:16:58'),
(2, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-16 22:17:03'),
(3, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0008: Jovielyn', '2024-03-16 22:18:06'),
(4, 'ADM004', 'KEN JOSHUA', 'Update homeowners information of TCH0008: Jovielynn = The following information has been updated:  FIRSTNAME,', '2024-03-16 22:18:41'),
(5, 'ADM004', 'KEN JOSHUA', 'Account No#: TCH0008', '2024-03-16 22:34:51'),
(6, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0009: Jovielyn', '2024-03-16 22:36:59'),
(7, 'ADM004', 'KEN JOSHUA', 'Account No#: TCH0009has been archive', '2024-03-16 22:47:59'),
(8, 'ADM004', 'KEN JOSHUA', 'Register homeowners account of TCH0010: Jovielyn', '2024-03-16 22:48:55'),
(9, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000069 Membership Fee', '2024-03-16 22:52:48'),
(10, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000070 Monthly Dues', '2024-03-16 23:00:14'),
(11, 'ADM004', 'KEN JOSHUA', 'Archive property of Account No. TCH0010', '2024-03-16 23:05:40'),
(12, 'ADM004', 'KEN JOSHUA', 'Archive the Transaction No#: TN-0000034 Monthly Dues', '2024-03-16 23:16:45'),
(13, 'ADM004', 'KEN JOSHUA', 'Archive the Transaction No#: TN-0000034 Monthly Dues', '2024-03-16 23:19:20'),
(14, 'ADM004', 'KEN JOSHUA', 'Restore the Transaction No#: TN-0000034 Payment', '2024-03-16 23:19:26'),
(15, 'ADM004', 'KEN JOSHUA', 'Archive the Transaction No#:  Construction Payment', '2024-03-16 23:20:28'),
(16, 'ADM004', 'KEN JOSHUA', 'Restore the Transaction No#: TN0000064 Construction Payment', '2024-03-16 23:20:32'),
(17, 'ADM004', 'KEN JOSHUA', 'Archive the Transaction No#: TN0000065 Additional Payment', '2024-03-16 23:22:21'),
(18, 'ADM004', 'KEN JOSHUA', 'Restore the Transaction No#: ', '2024-03-16 23:22:26'),
(19, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000071 Additional payment', '2024-03-16 23:32:43'),
(20, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000072 Material delivery payment', '2024-03-16 23:36:59'),
(21, 'ADM004', 'KEN JOSHUA', 'Maintenance Request: Property BLK-16 LOT-29 Jackfruit St. Phase 1 Update to Pending', '2024-03-17 00:39:30'),
(22, 'ADM004', 'KEN JOSHUA', 'Maintenance Request: Property BLK-16 LOT-29 Jackfruit St. Phase 1 update to Ongoing', '2024-03-17 00:41:35'),
(23, 'ADM004', 'KEN JOSHUA', 'Maintenance Request: Property BLK-16 LOT-30 Jackfruit St. Phase 1 update to Ongoing', '2024-03-17 00:41:40'),
(24, 'ADM004', 'KEN JOSHUA', 'Maintenance Request: Property BLK-16 LOT-29 Jackfruit St. Phase 1 update to Finish', '2024-03-17 00:42:32'),
(25, 'ADM004', 'KEN JOSHUA', 'Promotion: for blablaa posted', '2024-03-17 00:49:27'),
(26, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 00:56:21'),
(27, 'ADM004', 'KEN JOSHUA', 'Update homeowners information of TCH0002: Ken Joshua = The following information has been updated:  PHONE NUMBER,', '2024-03-20 01:23:38'),
(28, 'ADM004', 'KEN JOSHUA', 'Update homeowners information of TCH0003: Kirby = The following information has been updated:  EMAIL, PHONE NUMBER, POSITION,', '2024-03-20 01:24:16'),
(29, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-03-20 01:35:48'),
(30, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-03-20 01:37:00'),
(31, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-03-20 01:37:22'),
(32, 'ADM004', 'KEN JOSHUA', 'Meeting: for a posted', '2024-03-20 01:40:00'),
(33, 'ADM004', 'KEN JOSHUA', 'Meeting: for a posted', '2024-03-20 01:40:15'),
(34, 'ADM004', 'KEN JOSHUA', 'Meeting: for a posted', '2024-03-20 01:40:35'),
(35, 'ADM004', 'KEN JOSHUA', 'Meeting: for aad1231 posted', '2024-03-20 01:42:05'),
(36, 'ADM004', 'KEN JOSHUA', 'Meeting: for 132123123 posted', '2024-03-20 01:42:37'),
(37, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-03-20 01:56:04'),
(38, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-03-20 02:07:28'),
(39, 'ADM004', 'KEN JOSHUA', 'Meeting: for Officers Meeting posted', '2024-03-20 02:09:48'),
(40, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-20 02:17:36'),
(41, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 03:27:30'),
(42, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-20 03:27:32'),
(43, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 03:56:32'),
(44, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-20 03:56:35'),
(45, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 04:07:29'),
(46, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 21:27:06'),
(47, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-20 22:51:58'),
(48, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 22:55:57'),
(49, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-03-20 22:56:01'),
(50, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 23:04:45'),
(51, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 23:06:55'),
(52, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 23:11:16'),
(53, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000073 Material delivery payment', '2024-03-20 23:11:43'),
(54, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-03-20 23:13:27'),
(55, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000074 Construction bond payment', '2024-03-20 23:13:47'),
(56, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-12 19:47:24'),
(57, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-04-12 19:47:37'),
(58, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-12 19:47:52'),
(59, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-04-12 19:50:46'),
(60, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-12 19:50:50'),
(61, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-04-12 19:50:53'),
(62, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-12 20:25:47'),
(63, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-12 20:51:17'),
(64, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-04-13 00:08:10'),
(65, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-13 00:51:46'),
(66, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-13 01:04:23'),
(67, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-04-13 01:17:36'),
(68, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-13 01:17:40'),
(69, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-13 01:35:56'),
(70, 'ADM004', 'KEN JOSHUA', 'Meeting: for qweqwe posted', '2024-04-13 01:36:09'),
(71, 'ADM004', 'KEN JOSHUA', 'Meeting: for mjh posted', '2024-04-13 01:41:12'),
(72, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-13 21:15:13'),
(73, 'ADM004', 'KEN JOSHUA', 'Meeting: for 1 posted', '2024-04-13 21:19:54'),
(74, 'ADM004', 'KEN JOSHUA', 'Meeting: for 11 posted', '2024-04-13 21:33:26'),
(75, 'ADM004', 'KEN JOSHUA', 'Meeting: for a posted', '2024-04-13 22:34:13'),
(76, 'ADM004', 'KEN JOSHUA', 'Meeting: for General Meeting posted', '2024-04-13 22:38:26'),
(77, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-18 14:18:24'),
(78, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-04-18 14:24:36'),
(79, 'ADM004', 'KEN JOSHUA', 'Payment: Transaction No# TN0000075 Material delivery payment', '2024-04-18 14:25:07');

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
  `type` varchar(100) NOT NULL DEFAULT 'ADMIN',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `email`, `phone_number`, `photo`, `type`, `token`) VALUES
(33, 'ADM004', 'admin', '$2y$10$g7c9xfM5/HIAzbRwOaXWIewMjYxEW5kEJdxjg3VnsspG1dpKdJb6i', 'KEN JOSHUA', 'BUENAVIDES', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', 'IMG_20231004_205532_(2_x_2_inch).jpg', 'ADMIN', 'b7de61fdda3660711535a16152be5fab'),
(48, 'ADM008', 'Super_admin', '$2y$10$XIWISYaxs2YEx7hxQGcUSOKdc9tp9h4siyN81Q9PCOmjr9NVxYvDC', 'TCH', 'TCH', 'tch@gmail.com', '09123456789', 'TCH logo.png', 'SUPER_ADMIN\r\n', ''),
(49, 'ADM009', 'Kirby', '$2y$10$6R.ANIwWSihSd4RrdxW6LuC2Ji0z7I9qjB5JWcYzB4iRtg69WZvo6', 'Kirby', 'Rivera', 'asasd', '09771778411', '387467491_1032635598167678_2495845338663066655_n (1).jpg', 'ADMIN', ''),
(50, 'ADM010', 'Lesther', '$2y$10$of676iHgQNdbjxYq6DmtJu6.LQXj.RObPRoKp2bsa/WSMy7D2jjYS', 'Lesther', 'Martinez', 'Lesthermartinez@gmail.com', '09771778411', '387519748_192870633834999_3008499567823451055_n.jpg', 'ADMIN', '');

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
(94, 'General Meeting', 'HOA officers, don\'t miss our Jan 20, 2024 7:00 PM meet at the TCH clubhouse  to plan community improvements and streamline operations.aaaaa', '2024-03-23 15:00:00', '2024-03-20 02:07:28', 'INACTIVE'),
(99, '11', '1', '2024-04-13 21:33:00', '2024-04-13 21:33:26', 'INACTIVE'),
(100, 'a', 'aaa', '2024-04-13 22:33:00', '2024-04-13 22:34:13', 'INACTIVE'),
(101, 'General Meeting', 'u', '2024-04-14 07:00:00', '2024-04-13 22:38:26', 'INACTIVE');

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
  `collection_fee_number` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_fee`
--

INSERT INTO `collection_fee` (`id`, `collection_fee_number`, `category`, `description`, `fee`, `date_created`, `status`) VALUES
(4, 'C001', 'Membership Fee', '', '1000', '2023-12-23 01:42:00', 'ACTIVE'),
(5, 'C002', 'Construction Bond', 'per sqm.', '200', '2023-12-23 01:42:00', 'ACTIVE'),
(6, 'C003', 'Construction Clearance', '', '3000', '2023-12-23 01:43:00', 'ACTIVE'),
(12, 'C004', 'Material delivery', '6 wheeler', '300', '2023-12-23 10:57:00', 'ACTIVE'),
(13, 'C005', 'Material delivery', '10 wheeler', '600', '2023-12-23 10:57:00', 'ACTIVE'),
(14, 'C006', 'Material delivery', '12+ wheeler', '2000', '2023-12-23 10:57:00', 'ACTIVE'),
(18, 'C007', 'Monthly Dues', '', '250', '2024-01-10 08:30:00', 'ACTIVE'),
(20, 'C008', 'Workers ID', '', '500', '2024-03-01 12:25:00', 'ACTIVE'),
(21, 'C009', 'Sticker', '', '200', '2024-03-09 10:43:00', 'ACTIVE');

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
  `email_status` varchar(100) NOT NULL DEFAULT 'NOT SENT',
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_list`
--

INSERT INTO `collection_list` (`id`, `property_id`, `owners_id`, `collection_fee_id`, `date_created`, `balance`, `date_paid`, `status`, `month`, `month_int`, `year`, `email_status`, `archive`) VALUES
(637, 81, 9, 18, '2024-02-04 18:55:48', '300', '2024-02-04 18:56:08', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'INACTIVE'),
(638, 81, 9, 18, '2024-02-04 18:55:48', '300', '2024-02-04 18:58:32', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'INACTIVE'),
(639, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'INACTIVE'),
(640, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'INACTIVE'),
(641, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'INACTIVE'),
(642, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'INACTIVE'),
(643, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'INACTIVE'),
(644, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'INACTIVE'),
(645, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'INACTIVE'),
(646, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'INACTIVE'),
(647, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'INACTIVE'),
(648, 81, 9, 18, '2024-02-04 18:55:48', '300', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'INACTIVE'),
(649, 82, 9, 18, '2024-02-04 18:59:45', '300', '2024-02-05 00:50:41', 'PAID', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(650, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-05 00:50:41', 'PAID', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(651, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-06 21:46:34', 'PAID', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(652, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-06 21:46:34', 'PAID', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(653, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-06 21:49:45', 'PAID', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(654, 82, 9, 18, '2024-02-04 18:59:45', '300', '2024-02-06 21:49:45', 'PAID', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(655, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-12 22:03:09', 'PAID', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(656, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-12 22:10:18', 'PAID', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(657, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-13 14:02:57', 'PAID', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(658, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-13 14:02:57', 'PAID', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(659, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-13 14:02:57', 'PAID', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(660, 82, 9, 18, '2024-02-04 18:59:45', '250', '2024-02-13 14:02:57', 'PAID', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(661, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(662, 83, 10, 18, '2024-02-04 19:05:02', '300', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'SENT', 'ACTIVE'),
(663, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'DUE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(664, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'DUE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(665, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(666, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(667, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(668, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(669, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(670, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(671, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(672, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(673, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(674, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(675, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'DUE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(676, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'DUE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(677, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(678, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(679, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(680, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(681, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(682, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(683, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(684, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(685, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(686, 85, 12, 18, '2024-02-04 23:55:28', '250', '2024-02-28 00:34:37', 'PAID', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(687, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(688, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(689, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(690, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(691, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(692, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(693, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(694, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(695, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(696, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(697, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(698, 86, 13, 18, '2024-02-04 23:56:03', '300', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'SENT', 'ACTIVE'),
(699, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'DUE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(700, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'DUE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(701, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(702, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(703, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(704, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(705, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(706, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(707, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(708, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(709, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:05:08', 'PAID', 'January', '01', '2025', 'NOT SENT', 'ACTIVE'),
(710, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:06:17', 'PAID', 'February', '02', '2025', 'NOT SENT', 'ACTIVE'),
(711, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:09:15', 'PAID', 'March', '03', '2025', 'NOT SENT', 'ACTIVE'),
(712, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:10:18', 'PAID', 'April', '04', '2025', 'NOT SENT', 'ACTIVE'),
(713, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:10:29', 'PAID', 'May', '05', '2025', 'NOT SENT', 'ACTIVE'),
(714, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:15:21', 'PAID', 'June', '06', '2025', 'NOT SENT', 'ACTIVE'),
(715, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:15:31', 'PAID', 'July', '07', '2025', 'NOT SENT', 'ACTIVE'),
(716, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:18:17', 'PAID', 'August', '08', '2025', 'NOT SENT', 'ACTIVE'),
(717, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:19:11', 'PAID', 'September', '09', '2025', 'NOT SENT', 'ACTIVE'),
(718, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:21:21', 'PAID', 'October', '10', '2025', 'NOT SENT', 'ACTIVE'),
(719, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:21:32', 'PAID', 'November', '11', '2025', 'NOT SENT', 'ACTIVE'),
(720, 82, 0, 18, '2024-02-13 14:02:41', '250', '2024-02-17 08:21:32', 'PAID', 'December', '12', '2025', 'NOT SENT', 'ACTIVE'),
(721, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:48', 'PAID', 'January', '01', '2026', 'NOT SENT', 'ACTIVE'),
(722, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:48', 'PAID', 'February', '02', '2026', 'NOT SENT', 'ACTIVE'),
(723, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:48', 'PAID', 'March', '03', '2026', 'NOT SENT', 'ACTIVE'),
(724, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:56', 'PAID', 'April', '04', '2026', 'NOT SENT', 'ACTIVE'),
(725, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:56', 'PAID', 'May', '05', '2026', 'NOT SENT', 'ACTIVE'),
(726, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:22:56', 'PAID', 'June', '06', '2026', 'NOT SENT', 'ACTIVE'),
(727, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:23:30', 'PAID', 'July', '07', '2026', 'NOT SENT', 'ACTIVE'),
(728, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-17 08:23:30', 'PAID', 'August', '08', '2026', 'NOT SENT', 'ACTIVE'),
(729, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-20 17:38:24', 'PAID', 'September', '09', '2026', 'NOT SENT', 'ACTIVE'),
(730, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-20 17:38:24', 'PAID', 'October', '10', '2026', 'NOT SENT', 'ACTIVE'),
(731, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-22 19:32:48', 'PAID', 'November', '11', '2026', 'NOT SENT', 'ACTIVE'),
(732, 82, 0, 18, '2024-02-17 08:22:42', '250', '2024-02-23 15:32:46', 'PAID', 'December', '12', '2026', 'NOT SENT', 'ACTIVE'),
(733, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-22 19:08:36', 'PAID', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(734, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-22 19:09:02', 'PAID', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(735, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-22 19:47:46', 'PAID', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(736, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-22 19:47:46', 'PAID', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(737, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-22 19:47:46', 'PAID', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(738, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-02-23 14:51:11', 'PAID', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(739, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-03-09 17:35:57', 'PAID', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(740, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-03-09 17:46:24', 'PAID', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(741, 87, 9, 18, '2024-02-17 12:56:34', '250', '2024-03-09 22:31:14', 'PAID', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(742, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(743, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(744, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(745, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(746, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(747, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(748, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(749, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(750, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(751, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(752, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(753, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(754, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(755, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(756, 88, 14, 18, '2024-02-21 01:31:51', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(757, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'INACTIVE'),
(758, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'INACTIVE'),
(759, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'INACTIVE'),
(760, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'INACTIVE'),
(761, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'INACTIVE'),
(762, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'INACTIVE'),
(763, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'INACTIVE'),
(764, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'INACTIVE'),
(765, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'INACTIVE'),
(766, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'INACTIVE'),
(767, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'INACTIVE'),
(768, 89, 15, 18, '2024-03-16 22:18:06', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'INACTIVE'),
(769, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'INACTIVE'),
(770, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'INACTIVE'),
(771, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'INACTIVE'),
(772, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'INACTIVE'),
(773, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'INACTIVE'),
(774, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'INACTIVE'),
(775, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'INACTIVE'),
(776, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'INACTIVE'),
(777, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'INACTIVE'),
(778, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'INACTIVE'),
(779, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'INACTIVE'),
(780, 90, 16, 18, '2024-03-16 22:36:59', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'INACTIVE'),
(781, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'INACTIVE'),
(782, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'INACTIVE'),
(783, 91, 17, 18, '2024-03-16 22:48:56', '250', '2024-03-16 23:00:14', 'PAID', 'March', '03', '2024', 'NOT SENT', 'INACTIVE'),
(784, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'INACTIVE'),
(785, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'INACTIVE'),
(786, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'INACTIVE'),
(787, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'INACTIVE'),
(788, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'INACTIVE'),
(789, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'INACTIVE'),
(790, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'INACTIVE'),
(791, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'INACTIVE'),
(792, 91, 17, 18, '2024-03-16 22:48:56', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `construction_payment`
--

CREATE TABLE `construction_payment` (
  `id` int(255) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `property_id` int(255) NOT NULL,
  `collection_fee_id` int(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `refund` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `construction_payment`
--

INSERT INTO `construction_payment` (`id`, `transaction_number`, `property_id`, `collection_fee_id`, `paid`, `date_created`, `delivery_date`, `paid_by`, `refund`, `admin`, `archive`) VALUES
(19, 'TN-0000012', 83, 14, 2000, '2024-02-17 08:54:28', '2024-02-17 00:00:00', 'Ken Joshua Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(20, 'TN-0000013', 83, 12, 300, '2024-02-17 08:17:30', '2024-02-17 00:00:00', 'Ken Joshua', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(21, 'TN-0000014', 83, 5, 24000, '2024-02-17 08:50:30', '0000-00-00 00:00:00', 'Lesther Martinez', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(22, 'TN-0000015', 83, 6, 3000, '2024-02-17 08:06:31', '0000-00-00 00:00:00', 'Ken Joshua Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(23, 'TN-0000016', 83, 6, 3000, '2024-02-17 08:24:31', '0000-00-00 00:00:00', 'asd', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(24, 'TN-0000017', 83, 6, 3000, '2024-02-17 08:00:32', '0000-00-00 00:00:00', '1231', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(25, 'TN-0000018', 83, 6, 3000, '2024-02-17 08:00:33', '0000-00-00 00:00:00', '1231', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(27, 'TN-0000028', 83, 5, 24600, '2024-02-23 15:19:13', '0000-00-00 00:00:00', '', 'REFUNDED', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(28, 'TN-0000032', 83, 6, 3000, '2024-02-25 02:40:31', '0000-00-00 00:00:00', 'Kirby R. Rivera', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(29, 'TN-0000033', 82, 12, 300, '2024-02-27 23:56:19', '2024-02-27 00:00:00', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(30, 'TN-0000035', 83, 5, 12000, '2024-02-29 05:32:40', '0000-00-00 00:00:00', 'Ken', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(31, 'TN0000064', 83, 5, 600, '2024-03-09 22:26:50', '0000-00-00 00:00:00', 'Ken', 'REFUNDED', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(32, 'TN0000072', 82, 12, 300, '2024-03-16 23:59:36', '2024-03-16 00:00:00', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(33, 'TN0000073', 88, 14, 2000, '2024-03-20 23:43:11', '2024-03-30 00:00:00', 'Chelsea W. Modesto', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(34, 'TN0000074', 88, 5, 800, '2024-03-20 23:47:13', '0000-00-00 00:00:00', 'Ken', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(35, 'TN0000075', 85, 12, 300, '2024-04-18 14:07:25', '2024-04-18 00:00:00', 'Charline M. Apiado', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE');

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
  `position` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowners_users`
--

INSERT INTO `homeowners_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `email`, `phone_number`, `blk`, `lot`, `street`, `phase`, `status`, `position`, `date_created`, `archive`, `token`) VALUES
(1, 'TCH0001', 'TCH0001', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', '', '', '', '', '', '2024-02-03 11:09:25', 'ACTIVE', ''),
(9, 'TCH0002', 'TCH0002', '$2y$10$DQ1ZL8TpMkyInPDHaQp6UuteCwyS.zsvyLvpnKZkl/hR.TVKu89nW', 'Ken Joshua', 'Buenavides', 'R.', 'kenjoshuabuenavides@gmail.com', '09771778411', '16', '28', 'Jackfruit', 'Phase 1', 'EXPIRED', 'President', '2024-02-23 16:24:08', 'ACTIVE', '999bab9bdd9acb79511a5b03096cd025'),
(10, 'TCH0003', 'TCH0003', '$2y$10$zL0EmsKaNyLsaBdCgjIeOO8Jj.gb.IDrYhplISvGWSnSDgQKBqCM2', 'Kirby', 'Rivera', 'R.', 'kirby@gmail.com11', '09918186627', '16', '28', 'Jackfruit', 'Phase 1', 'EXPIRED', 'Vice-President', '2024-03-16 22:18:45', 'ACTIVE', ''),
(11, 'TCH0004', 'TCH0004', '$2y$10$4LdB62ilxSSco0h0HLK9C.IltSZy1L84SGnz/MNIgXlR4Vq32eDFm', 'Lesther', 'Martinez', 'C.', 'lesther@gmail.com', '09876543211', '6', '23', 'Narra', 'Phase 2', 'Member', '', '2024-02-12 22:05:13', 'ACTIVE', ''),
(12, 'TCH0005', 'TCH0005', '$2y$10$PLdM9llAhV7lzIScVKP6geGTwKKeiOOv4jr5pPQoFcwtXZfQzXWgW', 'Charline', 'Apiado', 'M.', 'charline@gmail.com', '09812341231', '9', '2', 'Pearl', 'Phase 3', 'Member', '', '2024-02-04 23:55:28', 'ACTIVE', ''),
(13, 'TCH0006', 'TCH0006', '$2y$10$D.e8XS6peeM1viLhpTQrKOsMIJeigrxu0UN4BUQZLoMP6GbnDjZO2', 'Terrence', 'Alaban', 'M.', 'terrence@gmail.com', '09876543211', '5', '5', 'Golden shower', 'Phase 1', 'EXPIRED', '', '2024-02-23 16:04:08', 'ACTIVE', ''),
(14, 'TCH0007', 'TCH0007', '$2y$10$ZrEkH0ANGF4z9RvJhBWj6e.OlhvKvHnSZwYQL7rIplxZZF6wkxjIO', 'Chelsea', 'Modesto', 'W.', 'chealsea@gmail.com', '09876543212', '15', '6', 'Sapphire', 'Phase 3', 'Member', '', '2024-03-09 22:41:32', 'ACTIVE', ''),
(15, 'TCH0008', 'TCH0008', '$2y$10$BjfyNz6CRAgSBbLCqjvcKuYu/XUM6zgeYcg8ZfI3UUH05wq3vZ0xO', 'Jovielynn', 'Oleza', 'M.', 'jovie@gmail.com', '09771778411', '1', '3', 'Golden Berryl', 'Phase 3', 'Member', '', '2024-03-16 22:18:06', 'INACTIVE', ''),
(16, 'TCH0009', 'TCH0009', '$2y$10$m30Z4mnETE4swVX3euVnXOgjd4VIxMl/2KV6AvYw/mrLOsYsbbuc.', 'Jovielyn', 'Oleza', 'M.', 'jovie@gmail.com', '09123123123', '1', '2', 'Ruby', 'Phase 3', 'Member', '', '2024-03-16 22:36:59', 'INACTIVE', ''),
(17, 'TCH0010', 'TCH0010', '$2y$10$Cf.6x3PjxcP3rigygHrbROxG3UpqGY6jv8Cb/YIvIzIBHPUYphKKS', 'Jovielyn', 'Oleza', 'M.', '09771778411', '12312312313', '1', '2', 'Tanguile', 'Phase 2', 'Member', '', '2024-03-16 22:48:52', 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `category`, `date_created`) VALUES
(1, 'Fogging', '2024-02-16 13:31:29'),
(2, 'Grass Cutting', '2024-02-16 13:16:41'),
(3, 'Tree Pruning', '2024-02-16 13:26:41'),
(4, 'Street Sweeping', '2024-02-21 00:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_request`
--

CREATE TABLE `maintenance_request` (
  `id` int(255) NOT NULL,
  `property_id` int(255) NOT NULL,
  `maintenance` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_approved` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_request`
--

INSERT INTO `maintenance_request` (`id`, `property_id`, `maintenance`, `date_created`, `date_approved`, `status`, `archive`) VALUES
(1, 82, 'Grass Cutting', '2024-02-17 02:50:11', '2024-02-17 02:50:11', 'PENDING', 'ACTIVE'),
(3, 87, 'Grass Cutting', '2024-02-20 13:53:24', '0000-00-00 00:00:00', 'PENDING', 'ACTIVE'),
(4, 82, 'Street Sweeping', '2024-02-20 23:37:26', '0000-00-00 00:00:00', 'PENDING', 'ACTIVE'),
(5, 87, 'Street Sweeping', '2024-02-20 23:37:34', '0000-00-00 00:00:00', 'ONGOING', 'ACTIVE'),
(6, 82, 'Tree Pruning', '2024-02-21 00:50:29', '0000-00-00 00:00:00', 'FINISHED', 'ACTIVE');

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
  `balance` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `archive` varchar(255) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_list`
--

INSERT INTO `payments_list` (`id`, `transaction_number`, `homeowners_id`, `property_id`, `collection_id`, `collection_fee_id`, `date_created`, `paid`, `balance`, `remarks`, `paid_by`, `quantity`, `admin`, `archive`) VALUES
(81, 'TN-0000019', 9, 82, 729, 18, '2024-02-20 17:38:24', '250', '', '', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(82, 'TN-0000019', 9, 82, 730, 18, '2024-02-20 17:38:24', '250', '', '', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(83, 'TN-0000020', 9, 87, 733, 18, '2024-02-22 19:08:36', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(84, 'TN-0000021', 9, 87, 734, 18, '2024-02-22 19:09:02', '250', '', '', 'Ken Joshua Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(85, 'TN-0000022', 9, 82, 731, 18, '2024-02-22 19:32:48', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(86, 'TN-0000023', 9, 87, 735, 18, '2024-02-22 19:47:46', '250', '', '', 'Chelsea Modesto', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(87, 'TN-0000023', 9, 87, 736, 18, '2024-02-22 19:47:46', '250', '', '', 'Chelsea Modesto', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(88, 'TN-0000023', 9, 87, 737, 18, '2024-02-22 19:47:46', '250', '', '', 'Chelsea Modesto', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(89, 'TN-0000024', 9, 87, 738, 18, '2024-02-23 14:51:11', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(90, 'TN-0000025', 13, 0, 0, 4, '2024-02-23 14:44:59', '1000', '', 'Renew Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(91, 'TN-0000026', 13, 0, 0, 4, '2024-02-23 15:58:04', '1000', '', 'Renew Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(92, 'TN-0000029', 9, 82, 732, 18, '2024-02-23 15:32:46', '250', '', '', 'Chelsea Modesto', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(93, 'TN-0000030', 13, 0, 0, 4, '2024-02-23 16:04:08', '1000', '', 'Renew Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(94, 'TN-0000031', 9, 0, 0, 4, '2024-02-23 16:24:08', '1000', '', 'New Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(95, 'TN-0000034', 12, 85, 686, 18, '2024-02-28 00:34:37', '250', '', '', 'Charline M. Apiado', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(119, 'TN-0000056', 0, 0, 0, 20, '2024-03-06 01:07:29', '500', '', '', 'Ken', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(120, 'TN-0000057', 0, 0, 0, 20, '2024-03-06 01:08:02', '1000', '', '', 'Ken', '2', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(121, 'TN-0000057', 0, 0, 0, 20, '2024-03-06 01:08:02', '500', '', '', 'Ken', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(122, 'TN-0000058', 0, 0, 0, 20, '2024-03-09 16:54:21', '500', '', '', 'Beverly Baasis', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(123, 'TN-0000058', 0, 0, 0, 20, '2024-03-09 16:54:21', '1500', '', '', 'Beverly Baasis', '3', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(124, 'TN0000-57', 0, 0, 0, 20, '2024-03-09 17:30:54', '1000', '', '', 'Beverly Baasis', '2', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(125, 'TN0000058', 0, 0, 0, 20, '2024-03-09 17:33:41', '1000', '', '', 'Beverly Baasis', '2', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(126, 'TN0000058', 0, 0, 0, 20, '2024-03-09 17:33:41', '500', '', '', 'Beverly Baasis', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(127, 'TN0000058', 9, 87, 739, 18, '2024-03-09 17:35:57', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(128, 'TN0000058', 0, 0, 0, 20, '2024-03-09 17:42:22', '1000', '', '', 'Lesther', '2', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(129, 'TN0000059', 0, 0, 0, 20, '2024-03-09 17:44:22', '500', '', '', 'Lesther', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(130, 'TN0000060', 9, 87, 740, 18, '2024-03-09 17:46:24', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(131, 'TN0000061', 9, 87, 741, 18, '2024-03-09 22:31:14', '250', '', '', 'Ken Joshua R. Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(132, 'TN0000062', 14, 0, 0, 4, '2024-03-09 22:41:32', '1000', '', 'New Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(133, 'TN0000063', 0, 0, 0, 21, '2024-03-09 22:43:58', '200', '', '', 'Lesther', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(134, 'TN0000065', 0, 0, 0, 21, '2024-03-09 23:08:31', '400', '', '', 'Beverly Baasis', '2', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(135, 'TN0000066', 0, 0, 0, 21, '2024-03-09 23:09:23', '400', '', '', 'Ken', '2', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(136, 'TN0000067', 10, 0, 0, 4, '2024-03-16 22:18:45', '1000', '', 'New Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(137, 'TN0000068', 17, 0, 0, 4, '2024-03-16 22:30:50', '1000', '', 'New Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(138, 'TN0000069', 17, 0, 0, 4, '2024-03-16 22:48:52', '1000', '', 'New Membership', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(139, 'TN0000070', 17, 91, 783, 18, '2024-03-16 23:00:14', '250', '', '', 'Jovielyn M. Oleza', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(140, 'TN0000071', 0, 0, 0, 20, '2024-03-16 23:32:43', '500', '', '', 'Beverly Baasis', '1', 'KEN JOSHUA BUENAVIDES', 'ACTIVE');

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
(14, '1000_F_251682139_JSihMaG8QmLh7JcSAPZ6mzh6PZjfqjf0.jpg', 'Thrift Collections', 'Year End Sale!!!', 'INACTIVE', '2024-02-27 01:42:16', '2024-02-27 12:00:00'),
(17, '407771942_120202532022330760_6460213004535456788_n.jpg', 'Vans', 'Vans Checkered SALE \r\n60% OFF\r\nBUY NOW!', 'INACTIVE', '2024-03-15 22:51:57', '2024-03-16 12:00:00'),
(18, 'desktop-wallpaper-backgrounds-for-jujutsu-kaisen-anime-on-windows-pc-jujutsu-kaisen-laptop.jpg', 'Sample', 'Sample', 'INACTIVE', '2024-04-13 00:53:43', '2024-04-16 12:00:00'),
(20, 'gojo_by_jetstreamstiker_dfzicij.png', 'blabla', 'avava', 'INACTIVE', '2024-03-16 01:16:45', '2024-03-22 12:00:00'),
(21, 'gojo_by_jetstreamstiker_dfzicij.png', 'blabla', ',', 'INACTIVE', '2024-03-16 00:00:00', '2024-03-16 00:00:00'),
(22, 'HD-wallpaper-call-of-duty-warzone-2021-pc-game-poster.jpg', 'blabla', 'i', 'INACTIVE', '2024-03-16 00:00:00', '2024-03-16 00:00:00'),
(23, 'desktop-wallpaper-backgrounds-for-jujutsu-kaisen-anime-on-windows-pc-jujutsu-kaisen-laptop.jpg', 'blablaa', 'a', 'INACTIVE', '2024-03-17 00:49:27', '2024-03-17 12:49:00'),
(24, 'desktop-wallpaper-backgrounds-for-jujutsu-kaisen-anime-on-windows-pc-jujutsu-kaisen-laptop.jpg', 'blabla', 'z', 'INACTIVE', '2024-04-13 00:53:30', '2024-04-13 12:00:00');

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
  `tenant` int(100) DEFAULT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `homeowners_id`, `blk`, `lot`, `phase`, `street`, `tenant`, `archive`) VALUES
(81, 9, '16', '28', 'Phase 1', 'Jackfruit', NULL, 'INACTIVE'),
(82, 9, '16', '29', 'Phase 1', 'Jackfruit', NULL, 'ACTIVE'),
(83, 10, '16', '28', 'Phase 1', 'Jackfruit', NULL, 'ACTIVE'),
(84, 11, '6', '23', 'Phase 2', 'Narra', NULL, 'ACTIVE'),
(85, 12, '9', '2', 'Phase 3', 'Pearl', NULL, 'ACTIVE'),
(86, 13, '5', '5', 'Phase 1', 'Golden shower', NULL, 'ACTIVE'),
(87, 9, '16', '30', 'Phase 1', 'Jackfruit', NULL, 'ACTIVE'),
(88, 14, '15', '6', 'Phase 3', 'Sapphire', NULL, 'ACTIVE'),
(89, 15, '1', '3', 'Phase 3', 'Golden Berryl', NULL, 'INACTIVE'),
(90, 16, '1', '2', 'Phase 3', 'Ruby', NULL, 'INACTIVE'),
(91, 17, '1', '2', 'Phase 2', 'Tanguile', NULL, 'INACTIVE');

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

-- --------------------------------------------------------

--
-- Table structure for table `transaction_number_list`
--

CREATE TABLE `transaction_number_list` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_number_list`
--

INSERT INTO `transaction_number_list` (`id`, `transaction_number`, `archive`) VALUES
(62, 'TN0000058', 'ACTIVE'),
(63, 'TN0000059', 'ACTIVE'),
(64, 'TN0000060', 'ACTIVE'),
(65, 'TN0000061', 'ACTIVE'),
(66, 'TN0000062', 'ACTIVE'),
(67, 'TN0000063', 'ACTIVE'),
(68, 'TN0000064', 'ACTIVE'),
(69, 'TN0000065', 'ACTIVE'),
(70, 'TN0000066', 'ACTIVE'),
(71, 'TN0000067', 'ACTIVE'),
(72, 'TN0000068', 'ACTIVE'),
(73, 'TN0000069', 'ACTIVE'),
(74, 'TN0000070', 'ACTIVE'),
(75, 'TN0000071', 'ACTIVE'),
(76, 'TN0000072', 'ACTIVE'),
(77, 'TN0000073', 'ACTIVE'),
(78, 'TN0000074', 'ACTIVE'),
(79, 'TN0000075', 'ACTIVE');

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
-- Indexes for table `construction_payment`
--
ALTER TABLE `construction_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
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
-- Indexes for table `transaction_number_list`
--
ALTER TABLE `transaction_number_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `archive_property_list`
--
ALTER TABLE `archive_property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collection_fee`
--
ALTER TABLE `collection_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `collection_list`
--
ALTER TABLE `collection_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793;

--
-- AUTO_INCREMENT for table `construction_payment`
--
ALTER TABLE `construction_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments_list`
--
ALTER TABLE `payments_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `street_list`
--
ALTER TABLE `street_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `transaction_number_list`
--
ALTER TABLE `transaction_number_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
