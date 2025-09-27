-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2025 at 11:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adcc_epay`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_prog_mapping`
--

CREATE TABLE `class_prog_mapping` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `program_id` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_prog_mapping`
--

INSERT INTO `class_prog_mapping` (`id`, `class`, `program_id`, `created`, `modified`) VALUES
(1, '1', '1,2,3', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(2, '2', '1,2,3', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(3, '3', '1,2,3', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(4, '4', '1,2,3', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(5, '5', '1,2,3', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(6, '6', '2,3,4', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(7, '7', '2,3,4', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(8, '8', '2,3,4', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(9, '9', '2,3,4', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(10, '10', '2,3,4', '2025-01-27 10:01:00', '2025-01-27 10:01:00'),
(11, '11', '5', '2025-01-29 15:02:09', '2025-01-29 15:02:09'),
(12, '12', '5', '2025-01-29 15:02:09', '2025-01-29 15:02:09'),
(13, 'OTHERS', '6', '2025-02-11 18:17:52', '2025-02-11 18:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `mst_schools`
--

CREATE TABLE `mst_schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_schools`
--

INSERT INTO `mst_schools` (`id`, `school_name`, `status`, `created`, `modified`) VALUES
(1, 'SOS Atrey layout', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(2, 'SOS Wanadongri', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(3, 'SOS Beltarodi', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(4, 'SOS Hudkeshar', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(5, 'SOS Amravati', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(6, 'SOS Wardha', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(7, 'SOS Akola', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(8, 'SOS Akola Kaulkhed', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(9, 'SOS Yavatmal', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(10, 'SOS Dhamangao', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(11, 'SOS Warud', 'A', '2024-05-15 08:25:11', '2024-05-15 08:25:11'),
(12, 'DMIHER-CONFERENCE', 'A', '2025-02-11 18:27:49', '2025-02-11 18:27:49'),
(13, 'MAHATMA GANDHI JUNIOR COLLEGE', 'A', '2025-06-13 16:32:07', '2025-06-13 16:32:07'),
(14, 'MAHATMA GANDHI ENGLISH MEDIUM HIGH SCHOOL & JUNIOR COLLEGE', 'A', '2025-06-13 16:32:07', '2025-06-13 16:32:07'),
(15, 'SOS PRATAP NAGAR', 'A', '2025-06-13 16:32:07', '2025-06-13 16:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_details`
--

CREATE TABLE `student_fee_details` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `fee_amt` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `transation_id` varchar(100) NOT NULL,
  `bank_trans_id` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `bank_remark` varchar(100) NOT NULL,
  `pclass` varchar(100) NOT NULL,
  `psession` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

CREATE TABLE `student_program` (
  `id` int(11) NOT NULL,
  `program_name` varchar(150) NOT NULL,
  `program_fee` varchar(100) NOT NULL,
  `program_fee_type` enum('S','I','N') NOT NULL DEFAULT 'S',
  `install1` varchar(100) NOT NULL,
  `install2` varchar(100) NOT NULL,
  `scholarship` varchar(100) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_program`
--

INSERT INTO `student_program` (`id`, `program_name`, `program_fee`, `program_fee_type`, `install1`, `install2`, `scholarship`, `status`, `created`, `modified`) VALUES
(1, 'LEAP', '7500', 'S', '0', '0', '0', 'A', '2025-01-27 07:55:33', '2025-01-27 07:55:33'),
(2, 'AEROBAY', '4500', 'S', '0', '0', '0', 'A', '2025-01-27 07:55:33', '2025-01-27 07:55:33'),
(3, 'AFTERSCHOOL', '0', 'N', '0', '0', '0', 'A', '2025-01-27 07:55:33', '2025-01-27 07:55:33'),
(4, 'FFP', '22500', 'I', '12500', '10000', '0', 'A', '2025-01-27 07:55:33', '2025-01-27 07:55:33'),
(5, 'JUNIOR-COLLEGE', '0', 'N', '0', '0', '0', 'A', '2025-01-29 15:03:31', '2025-01-29 15:03:31'),
(6, 'OTHERS', '0', 'N', '0', '0', '0', 'A', '2025-02-11 18:18:36', '2025-02-11 18:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `school` varchar(150) NOT NULL,
  `class` varchar(50) NOT NULL,
  `program` varchar(155) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `session` varchar(50) NOT NULL DEFAULT '2025.2026',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `type`, `status`, `created`) VALUES
(1, 'PM', 'Admin', 'admin@adccacademy.com', '1e6e0a04d20f50967c64dac2d639a577', 'Admin', 'Active', '2023-05-31 11:53:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_prog_mapping`
--
ALTER TABLE `class_prog_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_schools`
--
ALTER TABLE `mst_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee_details`
--
ALTER TABLE `student_fee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_program`
--
ALTER TABLE `student_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_prog_mapping`
--
ALTER TABLE `class_prog_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mst_schools`
--
ALTER TABLE `mst_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_fee_details`
--
ALTER TABLE `student_fee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_program`
--
ALTER TABLE `student_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
