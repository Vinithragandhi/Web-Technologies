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
-- Table structure for table `skilldetails`
--

CREATE TABLE `skilldetails` (
  `UserName` varchar(30) NOT NULL,
  `SkillName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `SkillCategory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `SkillDescription` varchar(200) NOT NULL,
  `Skill2Name` varchar(50) NOT NULL,
  `Skill3Name` varchar(50) NOT NULL,
  `Skill2Category` varchar(50) NOT NULL,
  `Skill3Category` varchar(50) NOT NULL,
  `Skill2Description` varchar(50) NOT NULL,
  `Skill3Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilldetails`
--

INSERT INTO `skilldetails` (`UserName`, `SkillName`, `SkillCategory`, `SkillDescription`, `Skill2Name`, `Skill3Name`, `Skill2Category`, `Skill3Category`, `Skill2Description`, `Skill3Description`) VALUES
('vinny', 'guitar', 'Music', 'Professional Player', '', '', '', '', '', ''),
('rachel', 'Mexican chef', 'Cooking', 'can cook mexican dishes', '', '', '', '', '', ''),
('monica', 'Football', 'Sports', 'Can teach american football', '', '', '', '', '', ''),
('tedm', 'Candid Photographer', 'Photography', 'Can tech candid photography', '', '', '', '', '', ''),
('chandler', 'Ballet', 'Dance', 'Professionally trained ballet dancer', '', '', '', '', '', ''),
('alex', 'Knitting', 'Craft', 'Knitting sweaters and scarves', '', '', '', '', '', ''),
('sweta', 'PHP', 'Coding', 'PHP and other web technologies', '', '', '', '', '', ''),
('ajit', 'singer', 'Music', 'Can rap good', 'basketball', '', 'Sports', '', 'Can teach basketball', ''),
('rachit', 'Racquetball', 'Sports', 'Looking for a partner to play racquetball', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
