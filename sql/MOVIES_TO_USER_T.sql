-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 08:16 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SemesterProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `MOVIES_TO_USER_T`
--

CREATE TABLE IF NOT EXISTS `MOVIES_TO_USER_T` (
  `Title` varchar(100) NOT NULL,
  `ReleaseDate` varchar(10) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` decimal(3,2) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`Title`,`ReleaseDate`,`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MOVIES_TO_USER_T`
--

INSERT INTO `MOVIES_TO_USER_T` (`Title`, `ReleaseDate`, `UserID`, `Rating`, `Status`) VALUES
('Eragon', '12/14/2006', 10000, '0.50', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
