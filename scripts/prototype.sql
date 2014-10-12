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
  `password` varchar(200) NOT NULL,
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
(1, 'admin', 'admin@SunnyBoy.Me', '$5$Sunny_Cr$QcdGV8hZFl5CQMTKBLGrNLfN7irQI8T.OD7w4ejIU06', 'admin', 'out', 'text', 'out', '2011-09-29 16:18:47'),
(2, 'guest', 'test@example.com', '$5$Sunny_Cr$NcFbups54EgCe6CLQWDzgMz6H9c3HM6jlkMhHKvyazC', 'active', 'out', 'text', 'out', '2011-09-29 20:18:47');

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
  `map` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `savour`, `created_date`, `email`, `map` ) VALUES
(1, 'New Peking', 'Crisp', '2011-10-02 18:30:10', 'SunnyPeking@SunnyBoy.me', '56.164952,15.588477'),
(2, 'Thai', 'Spicy', '2011-10-02 18:30:39', 'SunnyThai@SunnyBoy.me', '56.16177,15.584571'),
(3, 'Mountain View', 'Grilled', '2011-10-02 18:34:23', 'SunnyView@SunnyBoy.me', '56.173989,15.601491'),
(5, 'McDonald''s', 'Greasy', '2011-10-02 10:15:31', 'SunnyMc@SunnyBoy.me', '56.162627,15.585071');
COMMIT;
