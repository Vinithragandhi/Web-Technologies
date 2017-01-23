-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 05:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillstrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `messagedetails`
--

CREATE TABLE `messagedetails` (
  `MessageID` int(10) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `ToUser` varchar(50) NOT NULL,
  `FromUser` varchar(50) NOT NULL,
  `TimeStamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  `Deleted` varchar(100),
  primary key (`MessageID`)
) ;

--
-- Dumping data for table `messagedetails`
--

INSERT INTO `messagedetails` (`MessageID`, `Message`, `ToUser`, `FromUser`, `TimeStamp`, `Status`, `Deleted`) VALUES
(1, '"Hi , I would like to exchange my skills with you."', 'ajit', 'vinny', '2016-12-18 04:17:03.706355', 1, ',vinny'),
(2, 'okay, glad you''re interested', 'vinny', 'ajit', '2016-12-18 04:17:56.726263', 1, '');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messagedetails`
--
ALTER TABLE `messagedetails`
  MODIFY `MessageID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
