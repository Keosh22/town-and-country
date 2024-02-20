-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:51 AM
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
(412, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-13 13:49:35'),
(413, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-14 20:11:37'),
(414, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-14 22:14:13'),
(415, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-15 17:00:27'),
(416, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-02-15 19:31:55'),
(417, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-15 19:48:49'),
(418, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-15 20:10:17'),
(419, 'ADM004', 'KEN JOSHUA', 'Logged out', '2024-02-15 20:10:23'),
(420, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-15 20:13:11'),
(421, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-16 01:45:26'),
(422, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-16 12:52:34'),
(423, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-17 08:04:17'),
(424, 'ADM004', 'KEN JOSHUA', 'Register property: BLK-16 LOT-30 Phase 1 Jackfruit to TCH0002: Ken Joshua Buenavdies', '2024-02-17 12:56:34'),
(425, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-17 14:00:07'),
(426, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-20 12:24:10'),
(427, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2024-02-20 16:39:51');

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
(82, 'Valentines Day', 'Valentines Day Event', '2024-02-23 12:29:00', '2024-01-13 00:52:41', 'ACTIVE'),
(83, 'Valentines Day King and Queen', 'Valentines Day King and Queen', '2024-02-23 12:29:00', '2024-02-15 19:49:30', 'ACTIVE');

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
(6, 'C003', 'Construction clearance', '', '3000', '2023-12-23 01:43:00', 'ACTIVE'),
(12, 'C004', 'Material delivery', '6 wheeler', '300', '2023-12-23 10:57:00', 'ACTIVE'),
(13, 'C005', 'Material delivery', '10 wheeler', '600', '2023-12-23 10:57:00', 'ACTIVE'),
(14, 'C006', 'Material delivery', '12+ wheeler', '2000', '2023-12-23 10:57:00', 'ACTIVE'),
(18, 'C007', 'Monthly Dues', '', '250', '2024-01-10 08:30:00', 'ACTIVE');

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
(663, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(664, 83, 10, 18, '2024-02-04 19:05:02', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
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
(675, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(676, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(677, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(678, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(679, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(680, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(681, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(682, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(683, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(684, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
(685, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(686, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
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
(699, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(700, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
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
(731, 82, 0, 18, '2024-02-17 08:22:42', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2026', 'NOT SENT', 'ACTIVE'),
(732, 82, 0, 18, '2024-02-17 08:22:42', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2026', 'NOT SENT', 'ACTIVE'),
(733, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'January', '01', '2024', 'NOT SENT', 'ACTIVE'),
(734, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'DUE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
(735, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'March', '03', '2024', 'NOT SENT', 'ACTIVE'),
(736, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'April', '04', '2024', 'NOT SENT', 'ACTIVE'),
(737, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'May', '05', '2024', 'NOT SENT', 'ACTIVE'),
(738, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'June', '06', '2024', 'NOT SENT', 'ACTIVE'),
(739, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'July', '07', '2024', 'NOT SENT', 'ACTIVE'),
(740, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'August', '08', '2024', 'NOT SENT', 'ACTIVE'),
(741, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(742, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(743, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(744, 87, 9, 18, '2024-02-17 12:56:34', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE');

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
(20, 'TN-0000013', 83, 12, 300, '2024-02-17 08:17:30', '2024-02-17 00:00:00', 'Ken Joshua', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(21, 'TN-0000014', 83, 5, 24000, '2024-02-17 08:50:30', '0000-00-00 00:00:00', 'Lesther Martinez', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(22, 'TN-0000015', 83, 6, 3000, '2024-02-17 08:06:31', '0000-00-00 00:00:00', 'Ken Joshua Buenavides', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(23, 'TN-0000016', 83, 6, 3000, '2024-02-17 08:24:31', '0000-00-00 00:00:00', 'asd', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(24, 'TN-0000017', 83, 6, 3000, '2024-02-17 08:00:32', '0000-00-00 00:00:00', '1231', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(25, 'TN-0000018', 83, 6, 3000, '2024-02-17 08:00:33', '0000-00-00 00:00:00', '1231', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE');

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
  `date_created` datetime NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowners_users`
--

INSERT INTO `homeowners_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `email`, `phone_number`, `blk`, `lot`, `street`, `phase`, `status`, `date_created`, `archive`, `token`) VALUES
(1, 'TCH0001', 'TCH0001', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', '', '', '', '', '2024-02-03 11:09:25', 'ACTIVE', ''),
(9, 'TCH0002', 'TCH0002', '$2y$10$pUiSF4.a5EVXn5WJJRLwEO.I22uqkvldzNU/ISMG2WEx7g3uWlzfm', 'Ken Joshua', 'Buenavdies', 'R.', 'kenjoshuabuenavides@gmail.com', '09876543211', '16', '28', 'Jackfruit', 'Phase 1', 'Non-member', '2024-02-04 18:31:57', 'ACTIVE', '9c666409338838b0caf4635de2c50859'),
(10, 'TCH0003', 'TCH0003', '$2y$10$zL0EmsKaNyLsaBdCgjIeOO8Jj.gb.IDrYhplISvGWSnSDgQKBqCM2', 'Kirby', 'Rivera', 'R.', 'kirby@gmail.com', '09876543211', '16', '28', 'Jackfruit', 'Phase 1', 'Non-member', '2024-02-04 19:05:02', 'ACTIVE', ''),
(11, 'TCH0004', 'TCH0004', '$2y$10$4LdB62ilxSSco0h0HLK9C.IltSZy1L84SGnz/MNIgXlR4Vq32eDFm', 'Lesther', 'Martinez', 'C.', 'lesther@gmail.com', '09876543211', '6', '23', 'Narra', 'Phase 2', 'Member', '2024-02-12 22:05:13', 'ACTIVE', ''),
(12, 'TCH0005', 'TCH0005', '$2y$10$PLdM9llAhV7lzIScVKP6geGTwKKeiOOv4jr5pPQoFcwtXZfQzXWgW', 'Charline', 'Apiado', 'M.', 'charline@gmail.com', '09812341231', '9', '2', 'Pearl', 'Phase 3', 'Member', '2024-02-04 23:55:28', 'ACTIVE', ''),
(13, 'TCH0006', 'TCH0006', '$2y$10$D.e8XS6peeM1viLhpTQrKOsMIJeigrxu0UN4BUQZLoMP6GbnDjZO2', 'Terrence', 'Alaban', 'M.', 'terrence@gmail.com', '09876543211', '5', '5', 'Golden shower', 'Phase 1', 'EXPIRED', '2024-02-17 08:32:25', 'ACTIVE', '');

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
(3, 'Tree Pruning', '2024-02-16 13:26:41');

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
(3, 87, 'Grass Cutting', '2024-02-20 13:53:24', '0000-00-00 00:00:00', 'PENDING', 'ACTIVE');

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
  `admin` varchar(255) NOT NULL,
  `archive` varchar(255) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_list`
--

INSERT INTO `payments_list` (`id`, `transaction_number`, `homeowners_id`, `property_id`, `collection_id`, `collection_fee_id`, `date_created`, `paid`, `balance`, `remarks`, `admin`, `archive`) VALUES
(81, 'TN-0000019', 9, 82, 729, 18, '2024-02-20 17:38:24', '250', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(82, 'TN-0000019', 9, 82, 730, 18, '2024-02-20 17:38:24', '250', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE');

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
(14, '1000_F_251682139_JSihMaG8QmLh7JcSAPZ6mzh6PZjfqjf0.jpg', 'Thrift Collections', 'Year End Sale!!!', 'ACTIVE', '2024-02-20 12:23:52', '2024-02-23 12:00:00'),
(17, '407771942_120202532022330760_6460213004535456788_n.jpg', 'Vans', 'Vans Checkered SALE \r\n60% OFF\r\nBUY NOW!', 'INACTIVE', '2024-02-15 20:07:38', '2024-02-17 12:00:00');

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
(87, 9, '16', '30', 'Phase 1', 'Jackfruit', NULL, 'ACTIVE');

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
(1, 'TN-0000001', 'DO NOT DELETE THIS'),
(2, 'TN-0000002', 'ACTIVE'),
(3, 'TN-0000003', 'ACTIVE'),
(4, 'TN-0000004', 'ACTIVE'),
(5, 'TN-0000005', 'ACTIVE'),
(6, 'TN-0000006', 'ACTIVE'),
(7, 'TN-0000007', 'ACTIVE'),
(8, 'TN-0000008', 'ACTIVE'),
(9, 'TN-0000009', 'ACTIVE'),
(10, 'TN-0000010', 'ACTIVE'),
(11, 'TN-0000011', 'ACTIVE'),
(12, 'TN-0000012', 'ACTIVE'),
(13, 'TN-0000013', 'ACTIVE'),
(14, 'TN-0000014', 'ACTIVE'),
(15, 'TN-0000015', 'ACTIVE'),
(16, 'TN-0000016', 'ACTIVE'),
(17, 'TN-0000017', 'ACTIVE'),
(18, 'TN-0000018', 'ACTIVE'),
(19, 'TN-0000019', 'ACTIVE');

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `archive_property_list`
--
ALTER TABLE `archive_property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collection_fee`
--
ALTER TABLE `collection_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `collection_list`
--
ALTER TABLE `collection_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT for table `construction_payment`
--
ALTER TABLE `construction_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments_list`
--
ALTER TABLE `payments_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `street_list`
--
ALTER TABLE `street_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `transaction_number_list`
--
ALTER TABLE `transaction_number_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
