-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 05:19 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(30) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `SecurityQuestion1` varchar(100) NOT NULL,
  `SecurityQuestion2` varchar(100) NOT NULL,
  `Answer1` varchar(100) NOT NULL,
  `Answer2` varchar(100) NOT NULL,
  `Address1` varchar(100) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zip` varchar(7) NOT NULL,
  `Availability` varchar(20) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `FirstName`, `LastName`, `Age`, `Phone`, `Email`, `Gender`, `Password`, `SecurityQuestion1`, `SecurityQuestion2`, `Answer1`, `Answer2`, `Address1`, `Address2`, `City`, `State`, `Zip`, `Availability`, `TimeStamp`) VALUES
('ajit', 'Ajit', 'Veer', '25', '456-654-0987', 'ajitv@gmail.com', 'male', 'pr5f6z07URoeU', 'Your mothers maiden name', 'Your favourite TV series', 'jammy', 'sherlock', '1234', 'fairlane meadows', 'Troy', 'Michigan', '48567', 'Evening', '2016-12-18 04:03:09'),
('alex', 'Alex', 'Parrish', '25', '978-789-4532', 'alex@gmail.com', 'female', 'prEvYERnJTzlA', 'Your favourite TV series', 'Your mothers maiden name', 'quantico', 'rashmi', '5467', 'Larry street', 'Dearborn', 'Michigan', '48126', 'Afternoon', '2016-12-18 03:59:16'),
('chandler', 'Chandler', 'Bing', '45', '789-987-1236', 'chan@gmail.com', 'female', 'prqu1n81DaWng', 'Your favourite TV series', 'Your mothers maiden name', 'himym', 'sandra', '1234', 'Michigan ave', 'Troy', 'Michigan', '48126', 'Afternoon', '2016-12-18 03:57:07'),
('monica', 'Monica', 'Geller', '23', '678-876-0987', 'monica@gmail.com', 'female', 'pr95r1yuyyHRs', 'Your favourite TV series', 'Your mothers maiden name', 'friends', 'julie', '34567', 'Hammoth DR', 'Farmington hills', 'Michigan', '48336', 'Morning', '2016-12-18 03:53:04'),
('rachel', 'Rachel', 'Greene', '24', '890-657-1234', 'rachelgreene@gmail.com', 'female', 'pr238LgtDRByQ', 'Your mothers maiden name', 'Your favourite TV series', 'maggie', 'friends', '678', 'Richard DR', 'Farmington hills', 'Michigan', '48336', 'Morning', '2016-12-18 03:42:13'),
('rachit', 'Rachit', 'Chirania', '25', '567-765-7890', 'rachit@gmail.com', 'male', 'prWnGKgzjvRP6', 'Your favourite TV series', 'Your favourite cartoon character', 'bigboss', 'jerry', '456', 'Apt street', 'Troy', 'Michigan', '48567', 'Evening', '2016-12-18 04:05:09'),
('sweta', 'Sweta', 'Agrawal', '25', '890-098-1567', 'swe@gmail.com', 'female', 'prYp/Ff/LVFP6', 'Your favourite TV series', 'Your favourite cartoon character', 'fosters', 'bunny', '1234', 'Sherwood place', 'Troy', 'Michigan', '48567', 'Evening', '2016-12-18 04:01:13'),
('tedm', 'Ted', 'Mosby', '23', '566-789-0987', 'ted@gmail.com', 'male', 'pr9/rbvpGUpQM', 'Name of your High School', 'Your mothers maiden name', 'rochester', 'linda', '890', 'Richard DR', 'Dearborn', 'Michigan', '48126', 'Afternoon', '2016-12-18 03:55:13'),
('vinny', 'Vinithra', 'Gandhi', '25', '789-987-0987', 'vinithrag@gmail.com', 'male', 'prdDUYgnfKSzk', 'Your mothers maiden name', 'Your favourite TV series', 'latha', 'friends', '2612', 'Countryside CT', 'Auburn Hills', 'Michigan', '48326', 'Morning', '2016-12-18 03:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`),
  ADD KEY `LastName` (`LastName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
