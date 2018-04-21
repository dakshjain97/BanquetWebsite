-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 08:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banquethall`
--
CREATE DATABASE IF NOT EXISTS `banquethall` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banquethall`;

-- --------------------------------------------------------

--
-- Table structure for table `avalibitydetails`
--

DROP TABLE IF EXISTS `avalibitydetails`;
CREATE TABLE `avalibitydetails` (
  `HallId` varchar(10) NOT NULL,
  `DATE` date NOT NULL,
  `BOOKED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

DROP TABLE IF EXISTS `bookingdetails`;
CREATE TABLE `bookingdetails` (
  `ID` varchar(11) NOT NULL,
  `HallId` varchar(11) NOT NULL,
  `ClientId` varchar(11) NOT NULL,
  `DATE` datetime NOT NULL,
  `NoOfGuests` int(11) NOT NULL DEFAULT '500',
  `Purpose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientdetails`
--

DROP TABLE IF EXISTS `clientdetails`;
CREATE TABLE `clientdetails` (
  `ID` varchar(10) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `LoginId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientdetails`
--

INSERT INTO `clientdetails` (`ID`, `NAME`, `ADDRESS`, `DOB`, `Occupation`, `LoginId`) VALUES
('1', 'harshit Sidhwa', '110/198', '1997-12-18', 'student', 'harhit.sidhwa'),
('2', 'Harshit Sidhwa', '110/199', '0000-00-00', 'Student', 'harshitsidhwa'),
('3', 'Harshit Sidhwa', '12-A Hazipur', '0000-00-00', 'Student', '9915103253');

-- --------------------------------------------------------

--
-- Table structure for table `halldetails`
--

DROP TABLE IF EXISTS `halldetails`;
CREATE TABLE `halldetails` (
  `ID` varchar(10) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `RATE` decimal(10,0) NOT NULL,
  `CAPACITY` int(11) NOT NULL DEFAULT '500',
  `FACILITIES` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halldetails`
--

INSERT INTO `halldetails` (`ID`, `NAME`, `ADDRESS`, `RATE`, `CAPACITY`, `FACILITIES`) VALUES
('1', 'Ganges House', '129-B, Sector 81, Noida', '100000', 1000, 'LCD''s, DJ, Lawn, Bar'),
('2', 'The Divine Ini', '45A, Sector 15, Rohini, New Delhi', '125000', 500, 'LCD''s, CAMERA''s, Lawn with Pool, Bar, Parking');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

DROP TABLE IF EXISTS `transactiondetails`;
CREATE TABLE `transactiondetails` (
  `ID` int(10) NOT NULL,
  `BookingID` int(10) NOT NULL,
  `CLientID` int(10) NOT NULL,
  `DATE` datetime NOT NULL,
  `PaymentMode` varchar(50) NOT NULL DEFAULT 'CASH',
  `Amount` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`USERNAME`, `PASSWORD`) VALUES
('9915103253', '7565'),
('harhit.sidhwa', '7565'),
('harshitsidhwa', '8090');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avalibitydetails`
--
ALTER TABLE `avalibitydetails`
  ADD UNIQUE KEY `HallId` (`HallId`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `HallId` (`HallId`),
  ADD UNIQUE KEY `ClientId` (`ClientId`);

--
-- Indexes for table `clientdetails`
--
ALTER TABLE `clientdetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ADDRESS` (`ADDRESS`),
  ADD UNIQUE KEY `LoginId` (`LoginId`);

--
-- Indexes for table `halldetails`
--
ALTER TABLE `halldetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD UNIQUE KEY `ADDRESS` (`ADDRESS`);

--
-- Indexes for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BookingID` (`BookingID`),
  ADD UNIQUE KEY `CLientID` (`CLientID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
