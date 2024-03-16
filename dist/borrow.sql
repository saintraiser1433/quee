-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2023 at 12:03 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

DROP TABLE IF EXISTS `asset`;
CREATE TABLE IF NOT EXISTS `asset` (
  `asset_code` varchar(200) NOT NULL,
  `asset_name` varchar(200) NOT NULL,
  `asset_description` varchar(230) NOT NULL,
  `category_id` int NOT NULL,
  `asset_condition` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_code`, `asset_name`, `asset_description`, `category_id`, `asset_condition`, `photo`, `status`, `date_created`) VALUES
('cvgtzm', 'fdsfds', 'fdsfds', 2, 'Good', 'static/images/fdsfds1685093217.png', 0, '2023-05-26 09:26:57'),
('21vuxq', 'dffd', 'ffdfs', 2, 'Good', 'static/images/dffd1685104030.png', 0, '2023-05-26 12:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `borrow_id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL,
  `date_borrow` date NOT NULL,
  `expected_return` date NOT NULL,
  `reason` varchar(240) NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `student_id`, `asset_code`, `date_borrow`, `expected_return`, `reason`) VALUES
(8, '23-232', '21vuxq', '2023-05-27', '2023-05-28', 'dsadsad'),
(9, '23-232', '21vuxq', '2023-05-26', '2023-05-26', 'fdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `description`) VALUES
(2, 'cat 1'),
(3, 'cat 2x');

-- --------------------------------------------------------

--
-- Table structure for table `return_asset`
--

DROP TABLE IF EXISTS `return_asset`;
CREATE TABLE IF NOT EXISTS `return_asset` (
  `return_id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL,
  `date_borrow` date NOT NULL,
  `expected_return` date NOT NULL,
  `return_date` datetime NOT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `return_asset`
--

INSERT INTO `return_asset` (`return_id`, `student_id`, `asset_code`, `date_borrow`, `expected_return`, `return_date`) VALUES
(7, '23-232', '21vuxq', '2023-05-27', '2023-05-27', '2023-05-27 10:40:48'),
(6, '23-232', '21vuxq', '2023-05-26', '2023-05-26', '2023-05-27 10:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `mi`, `gender`, `address`, `dob`, `phone`, `date_created`) VALUES
('23-232', 'Anjelly', 'Fusingan', 'D', 'Male', 'fdsfsdfds', '2023-05-27', '09954863306', '2023-05-27 05:22:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
