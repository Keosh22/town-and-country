-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 12:17 PM
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
(41, 'ADM005', 'Lesther', '$2y$10$LH3yHMD2xKbASUmahFfoDerp/WERizalKkUqQUA85zXE4bj6Ey6Xy', 'Lesther', 'Martinez', 'Lesther@gmail.com', '09771778411', '387519748_192870633834999_3008499567823451055_n.jpg', '');

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
(38, 'TCH0007', 'TCH0007', '$2y$10$7g2MFyFcMc.25aSMgHULRuXWEW0UpZCv7SSMQYHAcqM0xJvmP7aIK', 'KEN JOSHUA', 'BUENAVIDES', 'RIVERA', 'KENJOSHUABUENAVIDES@GMAIL.COM', '09771778411', '16', '22', 'Jackfruit', 'PH1', 'Tenant - Member', 'Jesusa Buenavides');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `homeowners_users`
--
ALTER TABLE `homeowners_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
