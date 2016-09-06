-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 11:16 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
  `user_m` bigint(20) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_progres`
--

CREATE TABLE IF NOT EXISTS `master_progres` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE IF NOT EXISTS `phases` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeofchanges`
--

CREATE TABLE IF NOT EXISTS `typeofchanges` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
  `type` int(11) NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf32_unicode_ci NOT NULL DEFAULT 'active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

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
  ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `application_impact`
--
ALTER TABLE `application_impact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_progres`
--
ALTER TABLE `master_progres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_leads`
--
ALTER TABLE `team_leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tester_on_projects`
--
ALTER TABLE `tester_on_projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeofchanges`
--
ALTER TABLE `typeofchanges`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
