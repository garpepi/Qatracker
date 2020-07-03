-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 06:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydbqatracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_hirearki`
--

CREATE TABLE `user_hirearki` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_hirearki`
--
ALTER TABLE `user_hirearki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_hirearki`
--
ALTER TABLE `user_hirearki`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Dumping data for table `class_menu`
--

INSERT INTO `class_menu` (`id`, `class_name`, `menu_name`) VALUES
(17, 'employeegateleader', 'As leader'),
(18, 'assignsubordinate', 'Subordinate Assignment');

--
-- Table structure for table `bucket_overtime`
--

CREATE TABLE `bucket_overtime` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `start_in` datetime NOT NULL,
  `end_out` datetime NOT NULL,
  `reason` varchar(500) NOT NULL,
  `acc_stat` enum('queue','accept','reject','delete') NOT NULL DEFAULT 'queue',
  `acc_id` bigint(20) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bucket_overtime`
--
ALTER TABLE `bucket_overtime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bucket_overtime`
--
ALTER TABLE `bucket_overtime`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
