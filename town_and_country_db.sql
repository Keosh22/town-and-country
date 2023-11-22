-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 05:09 PM
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
(70, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-16 03:35:27'),
(71, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-16 04:10:53'),
(72, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-16 08:06:31'),
(73, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-16 17:43:12'),
(74, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-16 17:43:16'),
(75, 'ADM004', 'KEN JOSHUA', 'Delete account of ADM005: sharon', '2023-11-16 17:43:54'),
(76, 'ADM004', 'KEN JOSHUA', 'Delete account of ADM006: KEN JOSHUA', '2023-11-16 17:44:08'),
(77, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 18:40:02'),
(78, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 19:40:07'),
(79, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 19:40:15'),
(80, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:04:42'),
(81, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:04:49'),
(82, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:09:23'),
(83, 'ADM008', 'Sharon', 'Logged in the system', '2023-11-21 20:09:39'),
(84, 'ADM008', 'Sharon', 'Logged out', '2023-11-21 20:10:11'),
(85, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:10:58'),
(86, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:11:28'),
(87, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:11:33'),
(88, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:17:03'),
(89, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:17:11'),
(90, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:17:28'),
(91, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:17:47'),
(92, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:31:04'),
(93, 'ADM007', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:31:21'),
(94, 'ADM007', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:31:24'),
(95, 'ADM007', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:31:30'),
(96, 'ADM007', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:32:28'),
(97, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:32:35'),
(98, 'ADM008', 'TCH', 'Delete account of ADM007: KEN JOSHUA', '2023-11-21 20:33:34'),
(99, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:36:46'),
(100, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:36:50'),
(101, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:45:06'),
(102, 'ADM009', 'Kirby', 'Logged in the system', '2023-11-21 20:45:23'),
(103, 'ADM009', 'Kirby', 'Logged out', '2023-11-21 20:45:44'),
(104, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:45:51'),
(105, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:46:24'),
(106, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:46:32'),
(107, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:47:02'),
(108, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:47:13'),
(109, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:48:43'),
(110, 'ADM010', 'Lesther', 'Logged in the system', '2023-11-21 20:48:50'),
(111, 'ADM010', 'Lesther', 'Logged out', '2023-11-21 20:49:01'),
(112, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-21 20:49:10'),
(113, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-21 20:52:16'),
(114, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:52:25'),
(115, 'ADM008', 'TCH', 'Logged out', '2023-11-21 20:52:30'),
(116, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 20:52:43'),
(117, 'ADM008', 'TCH', 'Logged out', '2023-11-21 21:01:56'),
(118, 'ADM008', 'TCH', 'Logged in the system', '2023-11-21 21:02:53'),
(119, 'ADM004', 'KEN JOSHUA', 'Logged in the system', '2023-11-22 21:37:42'),
(120, 'ADM004', 'KEN JOSHUA', 'Logged out', '2023-11-23 00:04:06');

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `about`, `content`, `date`, `date_created`) VALUES
(1, 'Meeting', 'We have a general meeting this coming day. We are expecting the attendance of all the homeowners. Thank you!', '2023-11-21 13:03:52', '2023-11-25 15:00:00'),
(2, 'Libreng Tuli', 'We are pleased to inform you that we will be having a free tuli.', '2023-11-21 13:04:44', '2023-11-30 12:00:00'),
(3, 'Sports', 'Sports fest', '2023-11-21 18:38:47', '2023-11-21 19:38:37'),
(4, 'Webinar', 'Hacking', '2023-11-21 18:39:09', '2023-11-21 19:38:54'),
(5, 'Coding', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-11-21 19:24:20', '2023-11-21 20:23:56');

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
(41, 'TCH0002', 'TCH0002', '$2y$10$VUswOzm8l8RZcIOv1xGMJuf3.YGkvlclgpPEXfeycVFWuesQJrCHS', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Member', ''),
(42, 'TCH0003', 'TCH0003', '$2y$10$jKylJ5S6VlBv6Io7fpv3qefUz82zkhOvBhRncOLBqB7PZ8Z6Uo4aK', 'Sharon ', 'Burch', 'R.', 'sharonburch@gmail.com', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Member', '');

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
(5, '33', '16', '22', 'PH1', 'Jackfruit'),
(6, '35', '16', '15', 'PH3', 'Golden Shower'),
(7, '37', '16', '15', 'PH3', 'Golden Shower'),
(8, '37', '16', '15', 'PH3', 'Golden Shower'),
(9, '34', '4', '22', 'PH3', 'Golden Shower'),
(10, '34', '16', '15', 'PH3', 'Jackfruit'),
(11, '42', '10', '14', 'PH3', 'Golden Shower'),
(12, '41', '10', '22', 'PH3', 'Golden Shower'),
(13, '41', '16', '22', 'PH1', 'Jackfruit');

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
(24, 'Phase 1', 'Golden Shower'),
(25, 'Phase 1', 'Chico'),
(26, 'Phase 1', 'Guyabano'),
(27, 'Phase 1', 'Townhouse'),
(28, 'Phase 3', 'Garnett'),
(29, 'Phase 3', 'Diamon'),
(30, 'Phase 3', 'Emerald');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `street_list`
--
ALTER TABLE `street_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
