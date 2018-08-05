-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2018 at 12:38 PM
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
  `emptyphoto` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(1000) NOT NULL,
  `avatarfilename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `owner`, `datecreated`, `datemodified`, `emptyphoto`, `avatar`, `avatarfilename`) VALUES
(10, 'test', 'xtglGuqjBSgelajUUFg2ePhUymC3', '2018-08-05', '2018-08-05', 0, 'https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/group_photos%2FxtglGuqjBSgelajUUFg2ePhUymC3_8GRP1.jpg?alt=media&token=0962dc70-1cfa-4df3-ad90-3dee12cab88b', 'xtglGuqjBSgelajUUFg2ePhUymC3_8GRP1.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberof`
--

INSERT INTO `memberof` (`id`, `owner`, `memberuid`, `dateadded`) VALUES
(9, 'mdoK79ytvyYYskUjf07uE6svYzH3', 'H3VVVe8sQtc1y9HbZGEOBQirYe53', '2018-08-04'),
(10, 'H3VVVe8sQtc1y9HbZGEOBQirYe53', 'mdoK79ytvyYYskUjf07uE6svYzH3', '2018-08-04'),
(7, 'mdoK79ytvyYYskUjf07uE6svYzH3', 'VIBe47iF2OgnuhfdqLJkBgQ9mNk1', '2018-08-04'),
(8, 'VIBe47iF2OgnuhfdqLJkBgQ9mNk1', 'mdoK79ytvyYYskUjf07uE6svYzH3', '2018-08-04'),
(11, 'xtglGuqjBSgelajUUFg2ePhUymC3', 'rshUUHIUdZbmDHQeYkUdBkLEKQ03', '2018-08-05'),
(12, 'rshUUHIUdZbmDHQeYkUdBkLEKQ03', 'xtglGuqjBSgelajUUFg2ePhUymC3', '2018-08-05'),
(13, 'xtglGuqjBSgelajUUFg2ePhUymC3', 'owCKPuXXTXekgexnwzyGIqcLjMT2', '2018-08-05'),
(14, 'owCKPuXXTXekgexnwzyGIqcLjMT2', 'xtglGuqjBSgelajUUFg2ePhUymC3', '2018-08-05');

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
  `avatar` varchar(1000) DEFAULT NULL,
  `datecreated` date NOT NULL,
  `datemodified` date NOT NULL,
  `active` varchar(10) NOT NULL,
  `invitationcode` varchar(10) NOT NULL,
  `invitationcodeexpiration` date NOT NULL,
  `emptyphoto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `uid`, `firstname`, `middlename`, `lastname`, `email`, `mobileno`, `avatar`, `datecreated`, `datemodified`, `active`, `invitationcode`, `invitationcodeexpiration`, `emptyphoto`) VALUES
(9, 'rshUUHIUdZbmDHQeYkUdBkLEKQ03', 'Yasmine', 'Dizon', 'Aquino', 'francel_aquino@yahoo.com', '0538191138', 'https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/member_photos%2Ffrancel_aquino%40yahoo.com.jpg?alt=media&token=2bd69f42-14fe-40bf-ba35-4390fa703bd5', '2018-08-05', '2018-08-05', 'Active', '1', '2018-08-10', 0),
(10, 'xtglGuqjBSgelajUUFg2ePhUymC3', 'Francel', 'Dizon', 'Aquino', 'aquinof@rchsp.med.sa', '0538191138', 'https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/member_photos%2Fempty_photo.png?alt=media&token=f686d82b-9677-45a6-9dc5-bfd56b1a1f6b', '2018-08-05', '2018-08-05', 'Active', '2', '2018-08-10', 1),
(11, 'owCKPuXXTXekgexnwzyGIqcLjMT2', 'Kathleen', 'Dizon', 'Aquino', 'lazarak@rchsp.med.sa', '0538191138', 'https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/member_photos%2Flazarak%40rchsp.med.sa.jpg?alt=media&token=63c9dc13-a92b-4622-85e1-3e8b9c0a0e52', '2018-08-05', '2018-08-05', 'Active', '3', '2018-08-10', 0);

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
