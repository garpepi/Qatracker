-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 01:14 PM
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
-- Database: `cleandbqatracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu_priviledge`
--

CREATE TABLE `access_menu_priviledge` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `class_menu_id` int(11) NOT NULL,
  `status` enum('persistence','active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_menu_priviledge`
--

INSERT INTO `access_menu_priviledge` (`id`, `users_id`, `class_menu_id`, `status`) VALUES
(1, 1, 1, 'persistence'),
(2, 1, 13, 'persistence'),
(3, 2, 12, 'active'),
(4, 2, 1, 'persistence'),
(5, 2, 13, 'persistence'),
(6, 1, 2, 'active'),
(7, 1, 3, 'active'),
(8, 1, 4, 'active'),
(9, 1, 5, 'active'),
(10, 1, 6, 'active'),
(11, 1, 7, 'active'),
(12, 1, 8, 'active'),
(13, 1, 9, 'active'),
(14, 1, 10, 'active'),
(15, 1, 11, 'active'),
(16, 1, 16, 'active'),
(17, 1, 12, 'active'),
(18, 1, 14, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_impact`
--

CREATE TABLE `application_impact` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `status` enum('active','changed','drop','finish') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `autoreport_email`
--

CREATE TABLE `autoreport_email` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions_data`
--

CREATE TABLE `ci_sessions_data` (
  `id` varchar(40) COLLATE utf32_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf32_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_menu`
--

CREATE TABLE `class_menu` (
  `id` bigint(20) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_menu`
--

INSERT INTO `class_menu` (`id`, `class_name`, `menu_name`) VALUES
(1, 'home', 'Home'),
(2, 'manageuser', 'Manage User'),
(3, 'manageapplications', 'Manage Applications'),
(4, 'manageenvironment', 'Manage Environment'),
(5, 'managetypeofchanges', 'Type of Changes'),
(6, 'manageprogres', 'Manage Progress'),
(7, 'managephases', 'Manage Phase'),
(8, 'manageteamleads', 'Manage Team Leads'),
(9, 'manageprojects', 'Manage Projects'),
(10, 'reports', 'Reports'),
(11, 'resetpassword', 'Reset Password'),
(12, 'dailyreports', 'Daily Report'),
(13, 'manageself', ''),
(14, 'accesspriv', 'Access Priviledge'),
(15, 'holyday', 'Holiday'),
(16, 'emailreport', 'Email Report');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE `daily_reports` (
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
  `remarks` mediumtext CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  `actual_end_date` date DEFAULT NULL,
  `actual_end_doc_date` date DEFAULT NULL,
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE `environment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`id`, `name`, `status`) VALUES
(1, 'SIT', 'active'),
(2, 'UAT', 'active'),
(3, 'VIT', 'active'),
(4, 'RELEASE', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `keys_api`
--

CREATE TABLE `keys_api` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys_api`
--

INSERT INTO `keys_api` (`id`, `key`, `level`, `ignore_limits`, `date_created`) VALUES
(1, '12345', 1, 0, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `master_progres`
--

CREATE TABLE `master_progres` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
(7, 'UAT Can Not Started', 'active'),
(8, 'UAT Not Started', 'active'),
(9, 'UAT in Progress', 'active'),
(10, 'UAT Blocked', 'active'),
(11, 'UAT Done, Documentation in Progress', 'active'),
(12, 'UAT Done', 'active'),
(13, 'Migrated - Regular', 'active'),
(14, 'Migrated - Exception', 'active'),
(15, 'RAF', 'active'),
(16, 'ALM Maintenance ', 'active'),
(17, 'RCB ', 'active'),
(18, 'Remys', 'active'),
(19, 'VIT', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `name`, `status`) VALUES
(1, 'Test Preparation ', 'active'),
(2, 'Test Planning', 'active'),
(3, 'Test Design ', 'active'),
(4, 'Test Execution', 'active'),
(5, 'Test Documentation', 'active'),
(6, 'Waiting for fixes or else', 'active'),
(7, 'RELEASE', 'active'),
(8, 'Perbaikan PTR', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `desc` text COLLATE utf32_unicode_ci NOT NULL,
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
  `status` enum('active','drop','finish') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `drop_reason` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `user_c` int(11) NOT NULL,
  `user_m` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_leads`
--

CREATE TABLE `team_leads` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `environment` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tester_on_projects`
--

CREATE TABLE `tester_on_projects` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `tester_id` bigint(20) NOT NULL,
  `status` enum('active','changed','drop','finish') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `user_c` bigint(20) NOT NULL,
  `user_m` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeofchanges`
--

CREATE TABLE `typeofchanges` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `typeofchanges`
--

INSERT INTO `typeofchanges` (`id`, `name`, `status`) VALUES
(1, 'PR # Project ', 'active'),
(2, 'PI # Production Issue  ', 'active'),
(3, 'CR # Change Request ', 'active'),
(4, 'AM # Application Maitenance', 'active'),
(5, 'EC # Emergency Change', 'active'),
(6, 'SR # Service Request', 'active'),
(7, 'RELEASE', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `emp_id`, `type`, `status`, `created_date`, `modified_date`) VALUES
(1, 'admin@adidata.co.id', 'b50b174c5f1bc92f6025f43acd6bdb69537f8df30c98b0ece91cbad9fb805947', 'Admin QA Tracker', NULL, 1, 'active', '2016-08-25 05:51:09', NULL),
(2, 'tester@adidata.co.id', '29458dc139ca239d01ecb9acb0bbc9049cfa836f07ad128e95e7e664c08cb9e6', 'Tester QA Tracker', NULL, 0, 'active', '2016-08-25 06:27:32', NULL);

--
-- Indexes for dumped tables
--

-- --------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_hirearki`
--

CREATE TABLE `user_hirearki` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Indexes for table `user_hirearki`
--
ALTER TABLE `user_hirearki`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `bucket_overtime`
--
ALTER TABLE `bucket_overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_menu_priviledge`
--
ALTER TABLE `access_menu_priviledge`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `autoreport_email`
--
ALTER TABLE `autoreport_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions_data`
--
ALTER TABLE `ci_sessions_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `class_menu`
--
ALTER TABLE `class_menu`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `keys_api`
--
ALTER TABLE `keys_api`
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
-- AUTO_INCREMENT for table `access_menu_priviledge`
--
ALTER TABLE `access_menu_priviledge`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `application_impact`
--
ALTER TABLE `application_impact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `autoreport_email`
--
ALTER TABLE `autoreport_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `class_menu`
--
ALTER TABLE `class_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keys_api`
--
ALTER TABLE `keys_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_progres`
--
ALTER TABLE `master_progres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `team_leads`
--
ALTER TABLE `team_leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tester_on_projects`
--
ALTER TABLE `tester_on_projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `typeofchanges`
--
ALTER TABLE `typeofchanges`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bucket_overtime`
--
ALTER TABLE `bucket_overtime`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `user_hirearki`
--
ALTER TABLE `user_hirearki`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE ci_sessions_data CHANGE id id varchar(128) NOT NULL