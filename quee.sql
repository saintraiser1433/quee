-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2024 at 04:48 PM
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
(2, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `ticket_no` varchar(100) NOT NULL,
  `type_client_id` int NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`user_id`, `first_name`, `last_name`, `username`, `password`, `counter`) VALUES
(2, 'vcxvcx', 'vxcv', 'vxcvxc', 'cvxcv', 1);

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_no`, `service_id`, `status`, `date`) VALUES
(5, 'A001', 2, 1, '2024-03-22 00:47:55'),
(4, 'A001', 2, 1, '2024-03-22 00:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_counter`
--

DROP TABLE IF EXISTS `ticket_counter`;
CREATE TABLE IF NOT EXISTS `ticket_counter` (
  `counter_ticket_id` int NOT NULL AUTO_INCREMENT,
  `ticket_number` varchar(10) NOT NULL,
  `counter_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`counter_ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket_counter`
--

INSERT INTO `ticket_counter` (`counter_ticket_id`, `ticket_number`, `counter_date`) VALUES
(2, 'A000', '2024-03-22 00:47:42'),
(3, 'A000', '2024-03-22 00:47:55');

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
