-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 09:00 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `status`) VALUES
(1, 'SCM', 'active'),
(2, 'SMS Ketik', 'active'),
(3, 'Internet Banking', 'active'),
(4, 'Mobile Banking', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `application_impact`
--

CREATE TABLE IF NOT EXISTS `application_impact` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `application_impact`
--

INSERT INTO `application_impact` (`id`, `project_id`, `application_id`, `status`, `user_c`, `user_m`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'inactive', 1, 1, '2016-08-30 18:20:37', '2016-09-01 17:45:23'),
(2, 1, 2, 'inactive', 1, 1, '2016-08-30 18:20:37', '2016-09-01 17:45:23'),
(3, 1, 1, 'inactive', 1, 1, '2016-09-01 17:45:23', '2016-09-01 17:45:50'),
(4, 1, 2, 'inactive', 1, 1, '2016-09-01 17:45:23', '2016-09-01 17:45:50'),
(5, 1, 3, 'inactive', 1, 1, '2016-09-01 17:45:23', '2016-09-01 17:45:50'),
(6, 1, 1, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(7, 1, 2, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(8, 1, 3, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(9, 1, 1, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:18'),
(10, 1, 2, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:18'),
(11, 1, 3, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:18'),
(12, 1, 4, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:18'),
(13, 1, 1, 'active', 1, NULL, '2016-09-04 15:04:18', NULL),
(14, 1, 2, 'active', 1, NULL, '2016-09-04 15:04:18', NULL),
(15, 2, 4, 'active', 1, NULL, '2016-09-04 17:49:04', NULL),
(16, 3, 2, 'active', 1, NULL, '2016-09-04 17:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions_data`
--

CREATE TABLE IF NOT EXISTS `ci_sessions_data` (
  `id` varchar(40) COLLATE utf32_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf32_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `ci_sessions_data`
--

INSERT INTO `ci_sessions_data` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0405a7f3e8196b88fbd7e3877e7fd7fe73eaf136', '127.0.0.1', 1473014353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031343236393b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('1415bd8fdcb067b218f5dc4cfcf0eee75d48806a', '127.0.0.1', 1473012880, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031323636303b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('392e1369e22ec8893f4479e4f165c6a148d04178', '127.0.0.1', 1473014256, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031333936343b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('40433f9bc0de82bb04d945f7da411cda210941e6', '127.0.0.1', 1473014821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031343637363b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('58bdb05c564e49fab645b584d9beab230ba64de1', '127.0.0.1', 1473008887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333030383830333b6c6f676765645f696e5f646174617c613a313a7b733a323a226964223b733a313a2232223b7d),
('5ee6fbbf64761d64eacba25cb53d40d392c9169a', '127.0.0.1', 1473015479, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031353436353b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('6829482fa927b2c9c3eb90ef01cddfb2ff642079', '127.0.0.1', 1473009932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333030393835353b6c6f676765645f696e5f646174617c613a313a7b733a323a226964223b733a313a2231223b7d),
('70cc037b3dbf5126e3f877afabf428eecd3d598d', '127.0.0.1', 1473010398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031303131313b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('8609daadc9f8b3a0b211c23a10cacfd4d21f86d3', '127.0.0.1', 1473011274, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031313033373b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('99bbe09ba9bae5e6014c8d9a6d33c4982856cd0b', '127.0.0.1', 1473010591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031303537393b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('d08c961f4051b5244ce845fb7fb722389b312967', '127.0.0.1', 1473009672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333030393337393b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('d697be4593b2827a7f9190dadd048eeb249422f5', '127.0.0.1', 1473015243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031353035343b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('dfaf2d84d9bf431c0cd61f350ec5d0ef267deed0', '127.0.0.1', 1473011630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031313334363b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('e03cf2d27f953cacf29e23a65127ff1200af92d8', '127.0.0.1', 1473011928, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031313833353b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('e054aaa05edd9a2aa56c8870820334e158997212', '127.0.0.1', 1473010040, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333030393738343b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('eb5bb8f5b542ec4fcd3441e76298774c0d118dbb', '127.0.0.1', 1473013353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031333136323b6c6f676765645f696e5f646174617c613a323a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a353a224e61646961223b7d),
('f28e8f1251970596677e929e86d428c454403f59', '127.0.0.1', 1473011572, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333031313332353b6c6f676765645f696e5f646174617c613a313a7b733a323a226964223b733a313a2231223b7d666f726d5f6d73677c733a33323a225375636365737320416464204e6577204170706c69636174696f6e204e616d65223b5f5f63695f766172737c613a313a7b733a383a22666f726d5f6d7367223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE IF NOT EXISTS `daily_reports` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `environment_id` int(11) NOT NULL,
  `team_lead_id` int(11) NOT NULL,
  `progress_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `total_test_case` int(11) NOT NULL,
  `test_case_per_user` int(11) NOT NULL,
  `test_case_executed` int(11) NOT NULL,
  `test_case_outstanding` int(11) NOT NULL,
  `downtimes` int(11) NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE IF NOT EXISTS `environment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`id`, `name`, `status`) VALUES
(1, 'SIT', 'active'),
(2, 'UAT', 'active'),
(3, 'VIT', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `master_progres`
--

CREATE TABLE IF NOT EXISTS `master_progres` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `master_progres`
--

INSERT INTO `master_progres` (`id`, `name`, `status`) VALUES
(1, 'SIT Can Not Started', 'active'),
(2, 'SIT Not Started', 'active'),
(3, 'SIT In Progress', 'active'),
(4, 'SIT Blocked', 'active'),
(5, 'SIT Done, Documentation in Progress', 'active'),
(6, 'SIT Done', 'active'),
(7, 'UAT Can Not Started', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE IF NOT EXISTS `phases` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `name`, `status`) VALUES
(1, 'Test Preparation ', 'active'),
(2, 'Test Planning', 'active'),
(3, 'Test Design ', 'active'),
(4, 'Test Execution', 'active'),
(5, 'Test Documentation', 'active'),
(6, 'Waiting for fixes or else', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) NOT NULL,
  `desc` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `TRF` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `sum_TRF` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `type_of_change` int(11) NOT NULL,
  `plan_start_date` datetime NOT NULL,
  `plan_end_date` datetime NOT NULL,
  `plan_start_doc_date` datetime DEFAULT NULL,
  `plan_end_doc_date` datetime DEFAULT NULL,
  `actual_start_date` datetime DEFAULT NULL,
  `actual_end_date` datetime DEFAULT NULL,
  `actual_start_doc_date` datetime DEFAULT NULL,
  `actual_end_doc_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `user_c` int(11) NOT NULL,
  `user_m` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `desc`, `TRF`, `sum_TRF`, `type_of_change`, `plan_start_date`, `plan_end_date`, `plan_start_doc_date`, `plan_end_doc_date`, `actual_start_date`, `actual_end_date`, `actual_start_doc_date`, `actual_end_doc_date`, `status`, `user_c`, `user_m`, `created_date`, `modified_date`) VALUES
(1, 'TEST11111', 'TEST111', 'TEST111', 2, '2016-09-01 00:00:00', '2016-09-02 00:00:00', '2016-09-03 00:00:00', '2016-09-04 00:00:00', NULL, NULL, NULL, NULL, 'active', 1, 1, '2016-08-30 18:20:37', '2016-09-04 15:04:17'),
(2, 'TRF 2', 'TRF 2', 'TRF 2', 6, '2016-09-05 00:00:00', '2016-09-06 00:00:00', '2016-09-07 00:00:00', '2016-09-08 00:00:00', NULL, NULL, NULL, NULL, 'active', 1, NULL, '2016-09-04 17:49:04', NULL),
(3, 'TRF3', '', 'TRF3', 4, '2016-09-10 00:00:00', '2016-09-11 00:00:00', '2016-09-12 00:00:00', '2016-09-13 00:00:00', NULL, NULL, NULL, NULL, 'active', 1, NULL, '2016-09-04 17:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_leads`
--

CREATE TABLE IF NOT EXISTS `team_leads` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `team_leads`
--

INSERT INTO `team_leads` (`id`, `name`, `email`, `phone`, `status`) VALUES
(1, 'Ika', 'ika@bankmandiri.co.id', '', 'active'),
(2, 'Gunawan', 'gunawan@bankmandiri.co.id', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tester_on_projects`
--

CREATE TABLE IF NOT EXISTS `tester_on_projects` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `tester_id` bigint(20) NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tester_on_projects`
--

INSERT INTO `tester_on_projects` (`id`, `project_id`, `tester_id`, `status`, `user_c`, `user_m`, `created_date`, `modified_date`) VALUES
(1, 1, 2, 'inactive', 1, 1, '2016-08-30 18:20:37', '2016-09-01 17:45:23'),
(2, 1, 3, 'inactive', 1, 1, '2016-08-30 18:20:37', '2016-09-01 17:45:23'),
(3, 1, 4, 'inactive', 1, 1, '2016-08-30 18:20:37', '2016-09-01 17:45:23'),
(4, 1, 2, 'inactive', 1, 1, '2016-09-01 17:45:23', '2016-09-01 17:45:51'),
(5, 1, 3, 'inactive', 1, 1, '2016-09-01 17:45:23', '2016-09-01 17:45:51'),
(6, 1, 2, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(7, 1, 3, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(8, 1, 4, 'inactive', 1, 1, '2016-09-01 17:45:51', '2016-09-04 15:03:55'),
(9, 1, 2, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:28'),
(10, 1, 3, 'inactive', 1, 1, '2016-09-04 15:03:55', '2016-09-04 15:04:28'),
(11, 1, 2, 'active', 1, NULL, '2016-09-04 15:04:28', NULL),
(12, 1, 3, 'active', 1, NULL, '2016-09-04 15:04:28', NULL),
(13, 1, 4, 'active', 1, NULL, '2016-09-04 15:04:28', NULL),
(14, 2, 2, 'active', 1, NULL, '2016-09-04 17:49:04', NULL),
(15, 3, 2, 'active', 1, NULL, '2016-09-04 17:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typeofchanges`
--

CREATE TABLE IF NOT EXISTS `typeofchanges` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `typeofchanges`
--

INSERT INTO `typeofchanges` (`id`, `name`, `status`) VALUES
(1, 'PR # Project ', 'active'),
(2, 'PI # Production Issue  ', 'active'),
(3, 'CR # Change Request ', 'active'),
(4, 'AM # Application Maitenance', 'active'),
(5, 'EC # Emergency Case', 'active'),
(6, 'SR # Service Request', 'active'),
(7, 'RELEASE', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `emp_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 'garpepi@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Garpepi H Aotearoa', NULL, 1, '2016-08-25 05:51:09', NULL),
(2, 'nadia@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Nadia', 11, 0, '2016-08-25 06:27:32', NULL),
(3, 'budi@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Budi', 12, 0, '2016-08-25 06:28:13', NULL),
(4, 'basuki@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Basuki', 13, 0, '2016-08-25 06:28:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_impact`
--
ALTER TABLE `application_impact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions_data`
--
ALTER TABLE `ci_sessions_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_progres`
--
ALTER TABLE `master_progres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_leads`
--
ALTER TABLE `team_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester_on_projects`
--
ALTER TABLE `tester_on_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofchanges`
--
ALTER TABLE `typeofchanges`
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
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `application_impact`
--
ALTER TABLE `application_impact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_progres`
--
ALTER TABLE `master_progres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `team_leads`
--
ALTER TABLE `team_leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tester_on_projects`
--
ALTER TABLE `tester_on_projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `typeofchanges`
--
ALTER TABLE `typeofchanges`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
