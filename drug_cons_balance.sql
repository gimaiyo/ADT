-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2013 at 10:23 AM
-- Server version: 5.1.36-community-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testadt`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug_cons_balance`
--

CREATE TABLE IF NOT EXISTS `drug_cons_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `stock_type` int(11) NOT NULL,
  `period` varchar(15) NOT NULL COMMENT 'conside only month and year, day is only for formating purposes',
  `amount` int(11) NOT NULL,
  `facility` varchar(30) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `drug_id` (`drug_id`,`stock_type`,`period`),
  KEY `period` (`period`),
  KEY `drug_id_2` (`drug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `drug_cons_balance`
--

INSERT INTO `drug_cons_balance` (`id`, `drug_id`, `stock_type`, `period`, `amount`, `facility`, `last_update`) VALUES
(1, 13, 2, '2013-08-01', 2, '13050', '2013-09-01 17:57:05'),
(2, 16, 2, '2013-08-01', 1, '13050', '2013-09-01 17:57:05'),
(3, 66, 2, '2013-08-01', 120, '13050', '2013-09-01 17:57:05'),
(4, 7, 2, '2013-07-01', 30, '13050', '2013-09-01 17:57:05'),
(5, 7, 2, '2013-08-01', 160, '13050', '2013-09-01 17:57:05'),
(17, 34, 2, '2013-09-01', 6, '13050', '2013-09-01 18:07:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
