-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2017 at 08:00 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expenses`
--

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MoneyAmount` float NOT NULL,
  `Date` datetime NOT NULL,
  `Description` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE IF NOT EXISTS `income_categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Id`, `Name`) VALUES
(1, 'Engineer'),
(2, 'Teacher'),
(3, 'Programmer'),
(4, 'accountant'),
(5, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `outcome`
--

CREATE TABLE IF NOT EXISTS `outcome` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MoneyAmount` float NOT NULL,
  `Date` datetime NOT NULL,
  `Description` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outcome_categories`
--

CREATE TABLE IF NOT EXISTS `outcome_categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `BirthDate` date NOT NULL,
  `JobId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UserName` (`UserName`,`Email`),
  KEY `JobId` (`JobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Gender`, `Picture`, `BirthDate`, `JobId`) VALUES
(2, 'aya', 'gamal', 'ayagamal', 'ayagamal@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'F', '', '0000-00-00', 1),
(3, 'esraa', 'gamal', 'esraa-gamal', 'esraagamal@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'F', '', '0000-00-00', 1),
(4, 'mohamed', 'ahmed', 'mohamedahmed', 'mohamed@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'M', '', '0000-00-00', 4),
(5, 'ibrahim', 'ahmed', 'ibrahimahmed', 'ahmed@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'M', '', '0000-00-00', 4),
(7, 'basant', 'nor', 'basantnor', 'noor@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'F', '', '2017-03-06', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `income_categories` (`Id`);

--
-- Constraints for table `outcome`
--
ALTER TABLE `outcome`
  ADD CONSTRAINT `outcome_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `outcome_categories` (`Id`),
  ADD CONSTRAINT `outcome_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `jobs` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
