-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 10:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grabit`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryId` int(11) NOT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `IsoCode` varchar(6) DEFAULT NULL,
  `DialingCode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `CountryName`, `IsoCode`, `DialingCode`) VALUES
(1, 'Andorra', 'AD', '376'),
(3, 'Afghanistan', 'AF', '93'),
(5, 'Albania', 'AL', '355'),
(6, 'Australia', 'AU', '61'),
(7, 'Austria', 'AT', '43'),
(8, 'Bulgaria', 'BG', '359'),
(9, 'Croatia', 'HR', '385'),
(10, 'Italy', 'IT', '39'),
(11, 'Macedonia', 'MK', '389'),
(12, 'Poland', 'PL', '48'),
(13, 'Sweden', 'SE', '46'),
(14, 'Spain', 'ES', '34'),
(15, 'Turkey', 'TR', '90'),
(16, 'Serbia', 'RS', '381');

-- --------------------------------------------------------

--
-- Table structure for table `mobilenetworkoperator`
--

CREATE TABLE `mobilenetworkoperator` (
  `MnoId` int(11) NOT NULL,
  `MnoName` varchar(250) DEFAULT NULL,
  `MnoCode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobilenetworkoperator`
--

INSERT INTO `mobilenetworkoperator` (`MnoId`, `MnoName`, `MnoCode`) VALUES
(1, 'T-Mobile', '71'),
(2, 'T-Mobile', '70'),
(3, 'T-Mobile', '72'),
(4, 'VipOne', '77'),
(5, 'VipOne', '78'),
(6, 'VipOne', '75'),
(7, 'VipOne', '76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `mobilenetworkoperator`
--
ALTER TABLE `mobilenetworkoperator`
  ADD PRIMARY KEY (`MnoId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mobilenetworkoperator`
--
ALTER TABLE `mobilenetworkoperator`
  MODIFY `MnoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
