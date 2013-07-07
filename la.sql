-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2013 at 09:21 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `la`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `aID` int(11) NOT NULL AUTO_INCREMENT,
  `aUserName` varchar(30) NOT NULL,
  `aPassword` varchar(30) NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`aID`, `aUserName`, `aPassword`) VALUES
(1, 'admin', 'pa55w0rd');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `qID` int(11) NOT NULL AUTO_INCREMENT,
  `qText` varchar(240) NOT NULL,
  `uID` int(11) NOT NULL DEFAULT '0',
  `qVotes` int(11) NOT NULL,
  `qAuth` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'isAuthorised boolean',
  `qLocale` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`qID`, `qText`, `uID`, `qVotes`, `qAuth`, `qLocale`) VALUES
(1, 'Don''t piss into the wind', 0, 0, 1, 0),
(4, 'Failing is not a waste of time but not trying is. ', 0, 0, 1, 0),
(5, 'If you have to yell, you have lost the argument', 0, 0, 1, 0),
(6, 'Never treat people badly as you may need them later. ', 0, 0, 1, 0),
(7, 'Place a dry towel in the drier and the load will dry faster. ', 0, 0, 1, 0),
(8, 'Trying to give up a chemical addiction? Goto a steam room regularly to help purge residual chemicals in your system. ', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uID` int(11) NOT NULL AUTO_INCREMENT,
  `uDisplayName` varchar(50) NOT NULL,
  `uFirstName` varchar(60) NOT NULL,
  `uLastName` varchar(60) NOT NULL,
  `uDOB` date NOT NULL,
  `uEmail` varchar(60) NOT NULL,
  `uPhotoURL` varchar(150) NOT NULL,
  `uGender` varchar(15) NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `uDisplayName`, `uFirstName`, `uLastName`, `uDOB`, `uEmail`, `uPhotoURL`, `uGender`) VALUES
(1, 'Ral Little', 'Ral', 'Little', '1988-02-24', 'dark.lil.munki@gmail.com', 'https://graph.facebook.com/640022305/picture?width=150&height=150', 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
