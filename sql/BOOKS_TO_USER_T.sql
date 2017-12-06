-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 01:10 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entertainment_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOKS_TO_USER_T`
--

CREATE TABLE IF NOT EXISTS `BOOKS_TO_USER_T` (
  `Id` varchar(10) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Rating` decimal(3,2) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  KEY `Id` (`Id`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BOOKS_TO_USER_T`
--
ALTER TABLE `BOOKS_TO_USER_T`
  ADD CONSTRAINT `BOOKS_TO_USER_T_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `BOOKS_T` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `BOOKS_TO_USER_T_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `USER_T` (`UserId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
