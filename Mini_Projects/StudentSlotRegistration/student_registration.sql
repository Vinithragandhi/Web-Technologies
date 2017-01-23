-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 05:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `slottable`
--

CREATE TABLE `slottable` (
  `slotid` int(11) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `slotsLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slottable`
--

INSERT INTO `slottable` (`slotid`, `timing`, `slotsLeft`) VALUES
(1, '12/20/2016 - 6:00 to 7:00 PM', 3),
(2, '12/20/2016 - 7:00 to 8:00 PM', 1),
(3, '12/20/2016 - 8:00 to 9:00 PM', 3),
(4, '12/21/2016 - 6:00 to 7:00 PM', 3),
(5, '12/21/2016 - 7:00 to 8:00 PM', 4),
(6, '12/21/2016 - 8:00 to 9:00 PM', 4);

-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE `studenttable` (
  `umid` int(8) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `projectTitle` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `slotId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttable`
--

INSERT INTO `studenttable` (`umid`, `firstName`, `lastName`, `projectTitle`, `email`, `phone`, `slotId`) VALUES
(12345222, 'jbkuyfj', 'kjjbfy', 'bkugjyfy', 'ikughku@umich.edu', '122-098-12', 2),
(12345655, 'Raj', 'Kuymar', 'Laptop renewal analysis', 'kum@umich.edu', '123-981-34', 1),
(12345670, 'dsbgfsh', 'ghjghj', 'hggjjhghj', 'hjhg@hgj.gjhg', '123-098-34', 3),
(12345679, 'Jack', 'Custo', 'Prediction of restaurant ratings', 'bhjhkjhk@ghk.com', '123-123-12', 5),
(27541011, 'Peter', 'Noronha', 'Physical analysis of Networks', 'peter@umich.edu', '765-123-09', 5),
(27541012, 'Pat', 'Mccourt', 'Software services website', 'Pat@umich.edu', '123-987-45', 2),
(27541022, 'Jobgjuh', 'nkhlk', 'kugjuyf', 'khjyh@kugj.com', '009-845-69', 4),
(27541044, 'jhvbjhgch', 'jhgvjhfj', 'jhgcjg', 'kugujy@umich.edu', '123-123-09', 4),
(27541049, 'Sam', 'Anderson', 'Website for Baseball scores', 'samandy@gmail.com', '123-123-12', 1),
(27541050, 'Gangarjun', 'Veer', 'Restaurants reviews', 'veer@umich.edu', '123-098-34', 6),
(27541051, 'Vinuthira', 'Gangarjun', 'Financial inclusion website', 'vinny@umich.edu', '864-784-25', 3),
(27541053, 'Raj', 'Nair', 'Cake decorations website', 'raj@umich.edu', '123-267-12', 1),
(27541055, 'aahsd', 'afstbh', 'ajskhnwkj', 'asgs@umich.edu', '123-098-34', 2),
(27541056, 'Mike', 'Wineman', 'Online Hardware store', 'mike@umich.edu', '122-122-36', 4),
(27541059, 'Ajay', 'Rathnam', 'Application on TV channels', 'aj@umich.edu', '865-125-34', 2),
(27541066, 'John', 'Murphy', 'HTML color Picker', 'murphy@umich.com', '897-456-12', 6),
(27541067, 'Shravan', 'Pott', 'Matlab Tool development', 'pott@umich.edu', '234-098-45', 2),
(27541666, 'Gang', 'Mike', 'Apartments website', 'gang@umich.edu', '123-123-12', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slottable`
--
ALTER TABLE `slottable`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `studenttable`
--
ALTER TABLE `studenttable`
  ADD PRIMARY KEY (`umid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
