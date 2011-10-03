-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2011 at 11:12 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunnyrest`
--

-- CREATE DATABASE IF NOT EXISTS sunnyrest;
-- USE sunnyrest;


-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--
-- Creation: Sep 25, 2011 at 10:06 AM
-- Last update: Oct 02, 2011 at 08:53 AM
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) DEFAULT 'pending',
  `email_newsletter_status` varchar(3) DEFAULT 'out',
  `email_type` varchar(4) DEFAULT 'text',
  `email_favorite_restaurants_status` varchar(3) DEFAULT 'out',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `status`, `email_newsletter_status`, `email_type`, `email_favorite_restaurants_status`, `created_date`) VALUES
(1, 'test_4', 'test4@loudbite.com', 'password', 'active', 'out', 'text', 'out', '0000-00-00 00:00:00'),
(2, 'test_5', 'test5@loudbite.com', 'password', 'active', 'out', 'text', 'out', '0000-00-00 00:00:00'),
(3, 'test_6', 'test6@loudbite.com', 'password', 'active', 'out', 'text', 'out', '0000-00-00 00:00:00'),
(4, 'test_7', 'test7@loudbite.com', 'password', 'active', 'out', 'text', 'out', '0000-00-00 00:00:00'),
(5, 'test_3', 'test3@loudbite.com', 'password', 'active', 'out', 'text', 'out', '2011-09-29 14:17:15'),
(17, 'xiaodaselang', 'SinoSolomon@gmail.com', '666', 'pending', 'out', 'text', 'out', '2011-09-29 16:18:47'),
(18, 'bisu10', 'bisu10@student.bth.se', 'bisu10', 'admin', 'out', 'text', 'out', '2011-10-01 14:17:28'),
(22, 'sunnybingome', 'SunnyBingoMe@gmail.com', 'bisu10', 'admin', 'out', 'text', 'out', '2011-10-02 11:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_restaurants`
--
-- Creation: Sep 25, 2011 at 10:06 AM
-- Last update: Sep 25, 2011 at 10:06 AM
--

DROP TABLE IF EXISTS `accounts_restaurants`;
CREATE TABLE IF NOT EXISTS `accounts_restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `is_fav` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accounts_restaurants`
--


-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--
-- Creation: Oct 02, 2011 at 08:57 AM
-- Last update: Oct 02, 2011 at 12:50 PM
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(200) NOT NULL,
  `savour` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `savour`, `created_date`, `email`) VALUES
(1, 'New Peking', 'Crisp', '2011-10-02 18:30:10', 'SunnyBingoMe@gmail.com'),
(2, 'Thai', 'Spicy', '2011-10-02 18:30:39', 'SinoSolomon@gmail.com'),
(3, 'Mountain View', 'Grilled', '2011-10-02 18:34:23', 'bisu10@student.bth.se'),
(5, 'McDonald''s', 'Greasy', '2011-10-02 10:15:31', 'OceanRhymes@gmail.com');
COMMIT;
