-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2021 at 08:04 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaatepfive`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2007, 550000, 800000, 250000),
(2, 2008, 678000, 1065000, 387000),
(3, 2009, 787000, 1278500, 491500),
(4, 2010, 895600, 1456000, 560400),
(5, 2011, 967150, 1675600, 708450),
(6, 2012, 1065850, 1701542, 635692),
(7, 2013, 1105600, 1895000, 789400),
(8, 2014, 1465000, 2256500, 791500),
(9, 2015, 1674500, 2530000, 855500),
(10, 2016, 2050000, 3160000, 1110000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(10) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `adminname` (`adminname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`, `usertype`) VALUES
(1, 'Joseph Spector', 'Joseph123', 'Password@123', 'Active', ''),
(2, 'chisanga Innocent', 'admin12', '123456789', 'Active', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `childrecords`
--

DROP TABLE IF EXISTS `childrecords`;
CREATE TABLE IF NOT EXISTS `childrecords` (
  `childs_number` varchar(11) NOT NULL,
  `health_facility` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `M_names` varchar(255) NOT NULL,
  `M_nrc` varchar(20) NOT NULL,
  `F_names` varchar(255) NOT NULL,
  `F_nrc` varchar(20) NOT NULL,
  `date_first_seen` varchar(30) NOT NULL,
  `date_of_birth` varchar(30) NOT NULL,
  `weight_kg` int(11) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'offline',
  PRIMARY KEY (`childs_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `childrecords`
--

INSERT INTO `childrecords` (`childs_number`, `health_facility`, `child_name`, `gender`, `M_names`, `M_nrc`, `F_names`, `F_nrc`, `date_first_seen`, `date_of_birth`, `weight_kg`, `place_of_birth`, `residence`, `status`) VALUES
('bb', 'Mount Mukulu', 'Kangwa', 'FEMALE', 'kunda kabwe', '11112', 'Chisanga', '11111', '2021-11-27', '2021-11-26', 2, 'Mindolo', 'Chambeshi market', 'Active'),
('246813', 'Mount Mukulu', 'Kabwe Mulenga', 'MALE', 'Josephine Mulenga', '908974/02/1', 'Malama Mulenga', '374398/03/1', '2021-12-18', '2021-12-17', 4, 'Chilanga', 'Chambeshi market', 'Active'),
('246814', 'kalewa G H', 'Joseph Chisanga', 'MALE', 'Josephine Mulenga', '908974/02/1', 'Chisanga Delta', '374398/03/1', '2021-11-27', '2021-11-28', 4, 'Chilanga', 'Chambeshi market', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `child_account`
--

DROP TABLE IF EXISTS `child_account`;
CREATE TABLE IF NOT EXISTS `child_account` (
  `child_id` int(11) NOT NULL AUTO_INCREMENT,
  `child_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`child_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_account`
--

INSERT INTO `child_account` (`child_id`, `child_number`, `password`, `email`, `phone`, `status`) VALUES
(2, '246813', '123', 'lnnocentchisanga3@gmail.com', '0908989785', 'Active'),
(6, 'bb', '123', 'chisangainnocent@outlook.com', '0979023093', 'Active'),
(7, '246813', '123', 'josephchisanga94@gmail.com', '0908989785', 'Active'),
(5, '246814', '123', 'chisangainnocent@outlook.com', '0966367116', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `immunization`
--

DROP TABLE IF EXISTS `immunization`;
CREATE TABLE IF NOT EXISTS `immunization` (
  `immun_id` int(11) NOT NULL AUTO_INCREMENT,
  `child_number` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`immun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `immunization`
--

INSERT INTO `immunization` (`immun_id`, `child_number`, `name`, `date`, `status`) VALUES
(1, '246810', 'GCB At Birth', 'Oct 23, 2018', 'Given');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

DROP TABLE IF EXISTS `massage`;
CREATE TABLE IF NOT EXISTS `massage` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `massage` longtext NOT NULL,
  `Date` varchar(20) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`m_id`, `s_id`, `massage`, `Date`) VALUES
(1, 1, 'hello people', '14/10/2021');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

DROP TABLE IF EXISTS `recommendations`;
CREATE TABLE IF NOT EXISTS `recommendations` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `admin` varchar(255) NOT NULL,
  `to_child` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `under_five_days`
--

DROP TABLE IF EXISTS `under_five_days`;
CREATE TABLE IF NOT EXISTS `under_five_days` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(20) NOT NULL,
  `from_time` varchar(20) NOT NULL,
  `to_time` varchar(20) NOT NULL,
  `added_by` varchar(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `under_five_days`
--

INSERT INTO `under_five_days` (`d_id`, `day`, `from_time`, `to_time`, `added_by`) VALUES
(17, '2021-12-18', '22:37', '01:37', '1'),
(16, '2021-12-11', '09:40', '15:36', '1'),
(15, '2021-12-04', '09:00', '12:00', '2'),
(14, '2021-12-31', '09:00', '12:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vitamins`
--

DROP TABLE IF EXISTS `vitamins`;
CREATE TABLE IF NOT EXISTS `vitamins` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `childs_number` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_given` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitamins`
--

INSERT INTO `vitamins` (`v_id`, `childs_number`, `name`, `date_given`, `status`) VALUES
(1, 'bb', 'vitamins A', '23 - 11 - 2021', 'Given');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

DROP TABLE IF EXISTS `weight`;
CREATE TABLE IF NOT EXISTS `weight` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `childs_number` varchar(20) NOT NULL,
  `month` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`w_id`, `childs_number`, `month`, `weight`, `day`) VALUES
(7, '246810', 'August', 4, '01-11-2021'),
(6, '246813', 'Feb', 4, '01-11-2021'),
(5, '246810', 'Jan', 4, '01-11-2021'),
(8, 'bb', 'December', 5.3, '01-11-2021'),
(23, 'bb', 'August', 5.3, '02-11-2021'),
(28, '246814', 'Nov', 5, '27-11-2021'),
(27, 'bb', 'Nov', 5.3, '27-11-2021'),
(29, 'bb', 'Nov', 5.3, '28-11-2021'),
(30, '246814', 'Nov', 5, '28-11-2021'),
(31, '246814', 'Dec', 4, '02-12-2021'),
(32, '246813', 'Dec', 5.3, '09-12-2021'),
(33, '246813', 'Dec', 3.5, '20-12-2021');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
