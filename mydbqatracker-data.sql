-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 11:17 AM
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

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `status`) VALUES
(1, 'SCM', 'active'),
(2, 'SMS Ketik', 'active'),
(3, 'Internet Banking', 'active'),
(4, 'Mobile Banking', 'active');

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`id`, `name`, `status`) VALUES
(1, 'SIT', 'active'),
(2, 'UAT', 'active'),
(3, 'VIT', 'active');

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

--
-- Dumping data for table `team_leads`
--

INSERT INTO `team_leads` (`id`, `name`, `email`, `phone`, `status`) VALUES
(1, 'Ika', 'ika@bankmandiri.co.id', '', 'active'),
(2, 'Gunawan', 'gunawan@bankmandiri.co.id', '', 'active');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `emp_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 'garpepi@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Garpepi H Aotearoa', NULL, 1, '2016-08-25 05:51:09', NULL),
(2, 'nadia@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Nadia', 11, 0, '2016-08-25 06:27:32', NULL),
(3, 'budi@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Budi', 12, 0, '2016-08-25 06:28:13', NULL),
(4, 'basuki@adidata.co.id', '0f8ad0a7d148ba522e1ba4bfe7a4c709294c9bd889df3544e4d8183ccc33d6eb', 'Basuki', 13, 0, '2016-08-25 06:28:13', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
