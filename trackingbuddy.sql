-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2018 at 06:09 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackingbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `datecreated` date NOT NULL,
  `datemodified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `owner`, `datecreated`, `datemodified`) VALUES
(1, 'test', 'mdoK79ytvyYYskUjf07uE6svYzH3', '2018-08-04', '2018-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `memberof`
--

DROP TABLE IF EXISTS `memberof`;
CREATE TABLE IF NOT EXISTS `memberof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(200) NOT NULL,
  `memberuid` varchar(200) NOT NULL,
  `dateadded` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberof`
--

INSERT INTO `memberof` (`id`, `owner`, `memberuid`, `dateadded`) VALUES
(9, 'mdoK79ytvyYYskUjf07uE6svYzH3', 'H3VVVe8sQtc1y9HbZGEOBQirYe53', '2018-08-04'),
(10, 'H3VVVe8sQtc1y9HbZGEOBQirYe53', 'mdoK79ytvyYYskUjf07uE6svYzH3', '2018-08-04'),
(7, 'mdoK79ytvyYYskUjf07uE6svYzH3', 'VIBe47iF2OgnuhfdqLJkBgQ9mNk1', '2018-08-04'),
(8, 'VIBe47iF2OgnuhfdqLJkBgQ9mNk1', 'mdoK79ytvyYYskUjf07uE6svYzH3', '2018-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `datecreated` date NOT NULL,
  `datemodified` date NOT NULL,
  `active` varchar(10) NOT NULL,
  `invitationcode` varchar(10) NOT NULL,
  `invitationcodeexpiration` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `uid`, `firstname`, `middlename`, `lastname`, `email`, `mobileno`, `avatar`, `datecreated`, `datemodified`, `active`, `invitationcode`, `invitationcodeexpiration`) VALUES
(5, 'mdoK79ytvyYYskUjf07uE6svYzH3', 'Francel', 'Dizon', 'Aquino', 'francel_aquino@yahoo.com', '0538191138', NULL, '2018-08-04', '2018-08-04', 'Active', '1', '2018-08-09'),
(6, 'H3VVVe8sQtc1y9HbZGEOBQirYe53', 'Kathleen', 'Dizon', 'Aquino', 'aquinof@rchsp.med.sa', '0538191138', NULL, '2018-08-04', '2018-08-04', 'Active', '2', '2018-09-03'),
(7, 'VIBe47iF2OgnuhfdqLJkBgQ9mNk1', 'Yasmine', 'Dizon', 'Aquino', 'francel@rchsp.med.sa', '0538191138', NULL, '2018-08-04', '2018-08-04', 'Active', '3', '2018-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(50) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `datecreated` date NOT NULL,
  `datemodified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
