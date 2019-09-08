-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2018 at 03:05 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `uniqueID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passcode` varchar(50) NOT NULL,
  `accountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`uniqueID`, `username`, `passcode`, `accountType`) VALUES
(1, 'cox', 'php', '2');

-- --------------------------------------------------------

--
-- Table structure for table `CategoryTable`
--

CREATE TABLE `CategoryTable` (
  `uniqueID` int(50) NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `catName` varchar(50) NOT NULL,
  `catDes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CategoryTable`
--

INSERT INTO `CategoryTable` (`uniqueID`, `accountType`, `catName`, `catDes`) VALUES
(1, 'Paris', 'Paris', 'Paris Pictures'),
(2, 'Colorado', 'Colorado', 'Colorado Pictures'),
(3, 'Chiangmai', 'Chiang Mai', 'Chiang Mai Images'),
(4, 'Hongkong', 'Hong Kong', 'Hong Kong Images'),
(5, 'Greece', 'Greece', 'Greece Images');

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `uniqueID` int(50) NOT NULL,
  `uniqueIDPhoto` varchar(50) NOT NULL,
  `ImgNum` int(50) NOT NULL,
  `ImgDes` varchar(100) NOT NULL,
  `accountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`uniqueID`, `uniqueIDPhoto`, `ImgNum`, `ImgDes`, `accountType`) VALUES
(1, 'Paris1.jpg', 1, 'Paris Image 1', 'Paris'),
(2, 'Paris2.jpg', 2, 'Paris Image 2', 'Paris'),
(3, 'Colorado1.jpg', 1, 'Colorado Image 1', 'Colorado'),
(4, 'Colorado2.jpg', 2, 'Colorado Image 2', 'Colorado'),
(5, 'Colorado3.jpg', 3, 'Colorado Image 3', 'Colorado'),
(6, 'Chiangmai1.jpg', 1, 'Chiang Mai Image 1', 'Chiangmai'),
(7, 'Chiangmai2.jpg', 2, 'Chiang Mai Image 2', 'Chiangmai'),
(8, 'Hongkong1.jpg', 1, 'Hong Kong Image 1', 'Hongkong'),
(9, 'Greece1.jpg', 1, 'Greece Image 1', 'Greece'),
(10, 'Greece2.jpg', 2, 'Greece Image 2', 'Greece'),
(11, 'Hongkong2.jpg', 2, 'Hong Kong Image 2 ', 'Hongkong');

-- --------------------------------------------------------

--
-- Table structure for table `Logging`
--

CREATE TABLE `Logging` (
  `addrs` varchar(100) NOT NULL,
  `host` varchar(100) NOT NULL,
  `attemptDate` date NOT NULL,
  `attemptTime` time NOT NULL,
  `userID` varchar(100) NOT NULL,
  `userAgent` varchar(100) NOT NULL,
  `success` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `CategoryTable`
--
ALTER TABLE `CategoryTable`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`uniqueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Accounts`
--
ALTER TABLE `Accounts`
  MODIFY `uniqueID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `CategoryTable`
--
ALTER TABLE `CategoryTable`
  MODIFY `uniqueID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `uniqueID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
