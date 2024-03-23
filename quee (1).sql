-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2024 at 10:31 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quee`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_service`
--

DROP TABLE IF EXISTS `assign_service`;
CREATE TABLE IF NOT EXISTS `assign_service` (
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  KEY `fk_asgn_user_id` (`user_id`),
  KEY `fk_asgn_service` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assign_service`
--

INSERT INTO `assign_service` (`user_id`, `service_id`) VALUES
(2, 2),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `auth_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`auth_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `address` varchar(300) NOT NULL,
  `ticket_id` int NOT NULL,
  `type_client_id` int NOT NULL,
  `date_application` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `sex`, `age`, `address`, `ticket_id`, `type_client_id`, `date_application`) VALUES
(7, 'fsdfds', 'vcxv', 'Male', 13, 'polomolok south cotabato', 20, 2, '2024-03-23 14:25:06'),
(6, 'fsdfds', 'vcvc', 'Male', 13, 'polomolok south cotabato', 20, 2, '2024-03-23 14:24:36'),
(8, 'xvbcb', 'bcvbcv', 'Male', 13, 'polomolok south cotabato', 20, 2, '2024-03-23 14:27:17'),
(9, 'vcvxc', 'vcxv', 'Male', 13, 'fsdfdsf', 15, 2, '2024-03-23 14:28:09'),
(10, 'xxx', 'cxzz', 'Male', 13, 'polomolok south cotabato', 18, 2, '2024-03-23 14:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

DROP TABLE IF EXISTS `personnels`;
CREATE TABLE IF NOT EXISTS `personnels` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `counter` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`user_id`, `first_name`, `last_name`, `username`, `password`, `counter`) VALUES
(2, 'vcxvcx', 'vxcv', 'user', 'user', 1),
(3, 'gfdgfd', 'vxcv', 'user2', 'user2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `services_id` int NOT NULL AUTO_INCREMENT,
  `service_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `service_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `service_title`, `service_description`, `image`, `status`) VALUES
(2, 'Prev Demp Agriculture', 'fdsfdsf', 'Master Data - Check Document Series1710926667.png', 1),
(3, 'Follow up Checkup', '                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt, molestiae. Dolor voluptas repellendus debitis quam quibusdam harum quisquam deleniti, minus vitae aut molestias is', 'Follow up Checkup1710930395.png', 1),
(4, 'test', 'sfddfd', 'test1711036196.png', 1),
(5, 'spotify', 'dasdasdas', 'spotify1711036214.png', 1),
(6, 'powerpoint', 'gfdgdfgdf', 'powerpoint1711036229.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(100) NOT NULL,
  `service_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `counter` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_no`, `service_id`, `status`, `counter`, `date`) VALUES
(1, 'A001', 2, 1, 1, '2024-03-22 13:39:25'),
(2, 'A002', 2, 1, 1, '2024-03-22 13:39:32'),
(3, 'B001', 6, 1, 2, '2024-03-22 13:39:35'),
(4, 'A003', 2, 1, 1, '2024-03-22 13:40:04'),
(5, 'A004', 2, 1, 1, '2024-03-22 13:40:32'),
(6, 'A005', 2, 1, 1, '2024-03-22 13:41:03'),
(7, 'A006', 2, 1, 1, '2024-03-22 13:41:53'),
(8, 'A007', 2, 1, 1, '2024-03-22 13:42:21'),
(9, 'A008', 2, 1, 1, '2024-03-22 13:42:38'),
(10, 'A009', 2, 1, 1, '2024-03-22 13:42:55'),
(11, 'A010', 2, 1, 1, '2024-03-22 13:43:03'),
(12, 'A011', 2, 1, 1, '2024-03-22 13:43:42'),
(13, 'A012', 2, 1, 1, '2024-03-22 13:43:51'),
(14, 'B002', 6, 1, 2, '2024-03-22 13:44:14'),
(15, 'A001', 2, 0, 1, '2024-03-23 13:52:27'),
(16, 'B001', 6, 0, 2, '2024-03-23 13:52:30'),
(17, 'A002', 2, 0, 1, '2024-03-23 13:52:32'),
(18, 'A003', 2, 0, 1, '2024-03-23 13:52:35'),
(19, 'A004', 2, 0, 1, '2024-03-23 13:52:38'),
(20, 'A005', 2, 1, 1, '2024-03-23 13:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_counter`
--

DROP TABLE IF EXISTS `ticket_counter`;
CREATE TABLE IF NOT EXISTS `ticket_counter` (
  `ticket_number` varchar(100) NOT NULL,
  `counter` int NOT NULL,
  `counter_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket_counter`
--

INSERT INTO `ticket_counter` (`ticket_number`, `counter`, `counter_date`) VALUES
('A012', 1, '2024-03-22 13:39:25'),
('B002', 2, '2024-03-22 13:39:35'),
('A005', 1, '2024-03-23 13:52:27'),
('B001', 2, '2024-03-23 13:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `type_clients`
--

DROP TABLE IF EXISTS `type_clients`;
CREATE TABLE IF NOT EXISTS `type_clients` (
  `type_client_id` int NOT NULL AUTO_INCREMENT,
  `client_description` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`type_client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_clients`
--

INSERT INTO `type_clients` (`type_client_id`, `client_description`, `status`) VALUES
(2, 'xxxx1', 1),
(3, 'x', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_service`
--
ALTER TABLE `assign_service`
  ADD CONSTRAINT `fk_asgn_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`services_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asgn_user_id` FOREIGN KEY (`user_id`) REFERENCES `personnels` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
