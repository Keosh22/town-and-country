-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 06:46 AM
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
(657, 82, 9, 18, '2024-02-04 18:59:45', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'September', '09', '2024', 'NOT SENT', 'ACTIVE'),
(658, 82, 9, 18, '2024-02-04 18:59:45', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'October', '10', '2024', 'NOT SENT', 'ACTIVE'),
(659, 82, 9, 18, '2024-02-04 18:59:45', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'November', '11', '2024', 'NOT SENT', 'ACTIVE'),
(660, 82, 9, 18, '2024-02-04 18:59:45', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE'),
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
(674, 84, 11, 18, '2024-02-04 23:55:05', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
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
(686, 85, 12, 18, '2024-02-04 23:55:28', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'February', '02', '2024', 'NOT SENT', 'ACTIVE'),
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
(708, 86, 13, 18, '2024-02-04 23:56:03', '250', '0000-00-00 00:00:00', 'AVAILABLE', 'December', '12', '2024', 'NOT SENT', 'ACTIVE');

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
  `remarks` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `construction_payment`
--

INSERT INTO `construction_payment` (`id`, `transaction_number`, `property_id`, `collection_fee_id`, `paid`, `date_created`, `delivery_date`, `paid_by`, `remarks`, `admin`, `archive`) VALUES
(4, 'C00000001', 0, 0, 0, '2024-02-10 13:59:21', '2024-02-10 13:59:21', 'DO NOT DELETE THIS', '', '', 'DO NOT DELETE THIS'),
(10, 'C00000003', 82, 5, 24000, '2024-02-11 18:30:29', '0000-00-00 00:00:00', 'Beverly Baasis', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(12, 'C00000005', 83, 5, 20000, '2024-02-11 18:36:31', '0000-00-00 00:00:00', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(13, 'C00000006', 83, 14, 2000, '2024-02-11 19:21:01', '2024-02-10 00:00:00', 'Kirby R. Rivera', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(14, 'C00000007', 83, 5, 2400, '2024-02-11 20:19:30', '0000-00-00 00:00:00', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE');

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
  `archive` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowners_users`
--

INSERT INTO `homeowners_users` (`id`, `account_number`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `email`, `phone_number`, `blk`, `lot`, `street`, `phase`, `status`, `date_created`, `archive`) VALUES
(1, 'TCH0001', 'TCH0001', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', '', '', '', '', '2024-02-03 11:09:25', 'ACTIVE'),
(9, 'TCH0002', 'TCH0002', '$2y$10$b7zwbFkpdn6ALlRPjCKUm.fKC5GWJOqfN8Tpt8wRY.vMtRuYKpa3O', 'Ken Joshua', 'Buenavdies', 'R.', 'kenjoshuabuenavides@gmail.com', '09876543211', '16', '28', 'Jackfruit', 'Phase 1', 'Non-member', '2024-02-04 18:31:57', 'ACTIVE'),
(10, 'TCH0003', 'TCH0003', '$2y$10$zL0EmsKaNyLsaBdCgjIeOO8Jj.gb.IDrYhplISvGWSnSDgQKBqCM2', 'Kirby', 'Rivera', 'R.', 'kenjoshuabuenavides@gmail.com', '09876543211', '16', '28', 'Jackfruit', 'Phase 1', 'Non-member', '2024-02-04 19:05:02', 'ACTIVE'),
(11, 'TCH0004', 'TCH0004', '$2y$10$4LdB62ilxSSco0h0HLK9C.IltSZy1L84SGnz/MNIgXlR4Vq32eDFm', 'Lesther', 'Martinez', 'C.', 'kenjoshuabuenavides@gmail.com', '09876543211', '6', '23', 'Narra', 'Phase 2', 'Member', '2024-02-12 22:05:13', 'ACTIVE'),
(12, 'TCH0005', 'TCH0005', '$2y$10$PLdM9llAhV7lzIScVKP6geGTwKKeiOOv4jr5pPQoFcwtXZfQzXWgW', 'Charline', 'Apiado', 'M.', 'kenjoshuabuenavides@gmail.com', '09812341231', '9', '2', 'Pearl', 'Phase 3', 'Member', '2024-02-04 23:55:28', 'ACTIVE'),
(13, 'TCH0006', 'TCH0006', '$2y$10$D.e8XS6peeM1viLhpTQrKOsMIJeigrxu0UN4BUQZLoMP6GbnDjZO2', 'Terrence', 'Alaban', 'M.', 'kenjoshuabuenavides@gmail.com', '09876543211', '5', '5', 'Golden shower', 'Phase 1', 'EXPIRED', '2024-02-12 22:04:21', 'ACTIVE');

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
(1, 'TN00000001', 0, 0, 0, 0, '2024-02-03 11:08:11', 'DO NOT DELETE THIS', 'DO NOT DELETE THIS', '', '', 'ACTIVE'),
(37, 'TN00000003', 9, 0, 0, 4, '2024-02-04 18:26:56', '1,000', '', 'New Membership', '', 'INACTIVE'),
(38, 'TN00000004', 9, 0, 0, 4, '2024-02-04 18:31:57', '1,000', '', 'New Membership', '', 'INACTIVE'),
(47, 'TN00000005', 9, 82, 649, 18, '2024-02-05 00:50:41', '300', '', '', '', 'ACTIVE'),
(48, 'TN00000005', 9, 82, 650, 18, '2024-02-05 00:50:41', '250', '', '', '', 'ACTIVE'),
(49, 'TN00000006', 9, 82, 651, 18, '2024-02-06 21:46:34', '250', '', '', '', 'ACTIVE'),
(50, 'TN00000006', 9, 82, 652, 18, '2024-02-06 21:46:34', '250', '', '', '', 'INACTIVE'),
(51, 'TN00000007', 9, 82, 653, 18, '2024-02-06 21:49:45', '250', '', '', '', 'INACTIVE'),
(52, 'TN00000007', 9, 82, 654, 18, '2024-02-06 21:49:45', '300', '', '', '', 'INACTIVE'),
(53, 'TN00000008', 9, 82, 655, 18, '2024-02-12 22:03:09', '250', '', '', 'KEN JOSHUA BUENAVIDES', 'ACTIVE'),
(54, 'TN00000009', 9, 82, 656, 18, '2024-02-12 22:10:18', '250', '', '', 'KEN JOSHUA BUENAVIDES', 'INACTIVE'),
(55, 'TN00000010', 11, 0, 0, 4, '2024-02-12 22:05:13', '1000', '', 'New Membership', '', 'ACTIVE'),
(56, 'TN00000011', 13, 0, 0, 4, '2024-02-12 22:04:21', '1000', '', 'Renew Membership', 'KEN JOSHUA BUENAVIDES', 'INACTIVE');

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
(86, 13, '5', '5', 'Phase 1', 'Golden shower', NULL, 'ACTIVE');

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT for table `construction_payment`
--
ALTER TABLE `construction_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments_list`
--
ALTER TABLE `payments_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
