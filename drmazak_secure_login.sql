-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2013 at 11:00 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drmazak_secure_login`
--
CREATE DATABASE IF NOT EXISTS `drmazak_secure_login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `drmazak_secure_login`;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `organizer` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `assignTo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(24) COLLATE utf8_unicode_ci DEFAULT 'new',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `organizer`, `dateStart`, `dateEnd`, `assignTo`, `comments`, `status`) VALUES
(1, 'test', '', '2013-10-10 06:18:18', '2013-10-16 00:00:00', 'me', 'hi', 'new'),
(126, 'fer', '', '2013-10-15 12:00:00', '2013-10-15 12:00:00', 'ef', 'ewfew', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, '', '', 'drm55@zips.uakron.edu', '03c7c0ace395d80182db07ae2c30f034'),
(2, '', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, '', '', 'd', '8277e0910d750195b448797616e091ad'),
(4, '', '', 'simeon', '03c7c0ace395d80182db07ae2c30f034'),
(5, '', '', 'JGroot', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, '', '', 'root', '6057f13c496ecf7fd777ceb9e79ae285'),
(7, '', '', 'rootsadf', '912ec803b2ce49e4a541068d495ab570'),
(8, '', '', 'rootdfgsadf', 'c1ebb4933e06ce5617483f665e26627c'),
(9, 'drew', 'drew', 'drew', 'b2dd08a69dcdac5a20a7b90b5c4b759f'),
(10, 'yes', 'yes', 'yes', 'a6105c0a611b41b08f1209506350279e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
