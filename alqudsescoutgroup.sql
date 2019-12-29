-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 06:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alqudsescoutgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `loginid` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disc` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `name`, `disc`) VALUES
(64, '63.jpg', NULL),
(63, '62.jpg', NULL),
(65, '64.jpg', NULL),
(66, '65.jpg', NULL),
(67, '66.jpg', NULL),
(68, '67.jpg', NULL),
(69, '68.jpg', NULL),
(70, '69.jpg', NULL),
(71, '70.jpg', NULL),
(72, '71.jpg', NULL),
(73, '72.jpg', NULL),
(74, '73.jpg', NULL),
(75, '74.jpg', NULL),
(76, '75.jpg', NULL),
(77, '76.jpg', NULL),
(78, '77.jpg', NULL),
(79, '78.jpg', NULL),
(80, '79.jpg', NULL),
(81, '80.jpg', NULL),
(82, '81.jpg', NULL),
(83, '82.jpg', NULL),
(84, '83.jpg', NULL),
(85, '84.jpg', NULL),
(86, '85.jpg', NULL),
(87, '86.jpg', NULL),
(88, '87.jpg', NULL),
(89, '88.jpg', NULL),
(90, '89.jpg', NULL),
(91, '90.jpg', NULL),
(92, '91.jpg', NULL),
(93, '92.jpg', NULL),
(94, '93.jpg', NULL),
(95, '94.jpg', NULL),
(96, '95.jpg', NULL),
(97, '96.jpg', NULL),
(98, '97.jpg', NULL),
(99, '98.jpg', NULL),
(100, '99.jpg', NULL),
(101, '100.jpg', NULL),
(102, '101.jpg', NULL),
(103, '102.jpg', NULL),
(104, '103.jpg', NULL),
(105, '104.jpg', NULL),
(106, '105.jpg', NULL),
(107, '106.jpg', NULL),
(108, '107.jpg', NULL),
(109, '108.jpg', NULL),
(110, '109.jpg', NULL),
(111, '110.jpg', NULL),
(112, '111.jpg', NULL),
(113, '112.jpg', NULL),
(114, '113.jpg', NULL),
(115, '114.jpg', NULL),
(116, '115.jpg', NULL),
(117, '116.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `barthdate` date NOT NULL,
  `date` date NOT NULL,
  `address` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `super` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reletev` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Sphone` varchar(10) NOT NULL,
  `Saddress` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Sjob` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `openion` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nationalID` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steprequst`
--

CREATE TABLE `steprequst` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `jobinunit` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numberofdays` int(5) NOT NULL,
  `startday` date NOT NULL,
  `endday` date NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `loginid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superior`
--

CREATE TABLE `superior` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `job` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superior`
--

INSERT INTO `superior` (`id`, `name`, `phone`, `job`, `address`) VALUES
(18, 'محمد أحمد فارس سليما', '0799901990', 'معلم', 'جرش');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(1) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'الأشبال'),
(4, 'الجوالة'),
(5, 'القادة'),
(2, 'الكشاف'),
(3, 'المتقدم');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `LogINID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '"الأشبال"',
  `Super` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Relatev` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `JoinDate` date NOT NULL,
  `BarthDate` date NOT NULL,
  `Picture` varchar(255) DEFAULT NULL,
  `Document` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Type` varchar(1) NOT NULL DEFAULT 'D',
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Attendance` int(2) NOT NULL DEFAULT 0,
  `nationalID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `LogINID`, `Name`, `Address`, `Unit`, `Super`, `Relatev`, `JoinDate`, `BarthDate`, `Picture`, `Document`, `Type`, `Password`, `Phone`, `Email`, `Attendance`, `nationalID`) VALUES
(33, 15003, 'عمار رافع محمد سمرين', 'الزرقاء', 'القادة', NULL, NULL, '2018-10-15', '1997-12-02', '33.jpg', '', 'C', '7841fb1f92b99194ca818d410cb09430731b6285', '0785826634', 'ammarsumreen17@gmail.com', 0, '9971066400'),
(68, 11000, 'بكر محمد أحمد عمار', 'عمان', 'الأشبال', 'محمد أحمد فارس سليما', 'أب', '2019-11-27', '1997-12-22', NULL, NULL, 'A', 'a1597110caaf851168499e561eea9b1ab7acccf2', '0786287168', 'karamnaje@outlook.com', 0, '9971066401'),
(69, 11001, 'احمد محمد احمد سليمان', 'الزرقاء', 'الأشبال', NULL, NULL, '2018-03-02', '2000-11-03', NULL, NULL, 'B', '32b43a51026859dffd46acbe51c30b0e0ea7b1d7', '0788550532', 'ammarsumreen17@gmail.com', 0, '9971066407');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `loginid` (`loginid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `national ID` (`nationalID`);

--
-- Indexes for table `steprequst`
--
ALTER TABLE `steprequst`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `loginid` (`loginid`),
  ADD KEY `loginid_2` (`loginid`);

--
-- Indexes for table `superior`
--
ALTER TABLE `superior`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Log INID` (`LogINID`),
  ADD UNIQUE KEY `NID Index` (`nationalID`),
  ADD KEY `fk_uni` (`Unit`),
  ADD KEY `fk_sup` (`Super`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `steprequst`
--
ALTER TABLE `steprequst`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `superior`
--
ALTER TABLE `superior`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `user` (`LogINID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `steprequst`
--
ALTER TABLE `steprequst`
  ADD CONSTRAINT `steprequst_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `user` (`LogINID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Super`) REFERENCES `superior` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Unit`) REFERENCES `unit` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
