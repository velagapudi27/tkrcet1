-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2016 at 10:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `2016-2017`
--

CREATE TABLE `2016-2017` (
  `class_name` varchar(108) NOT NULL,
  `class_id` int(12) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` tinyint(4) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `Section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2016-2017`
--

INSERT INTO `2016-2017` (`class_name`, `class_id`, `department`, `year`, `sem`, `Section`) VALUES
('1-1_CSE-A', 10003, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `2017-2018`
--

CREATE TABLE `2017-2018` (
  `class_name` varchar(108) NOT NULL,
  `class_id` int(12) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` tinyint(4) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `Section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `2018-2019`
--

CREATE TABLE `2018-2019` (
  `class_name` varchar(108) NOT NULL,
  `class_id` int(12) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` tinyint(4) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `Section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `2019-2020`
--

CREATE TABLE `2019-2020` (
  `class_name` varchar(108) NOT NULL,
  `class_id` int(12) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` tinyint(4) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `Section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_10003`
--

CREATE TABLE `a_10003` (
  `Student_ID` varchar(12) DEFAULT NULL,
  `Period` smallint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_10003`
--

INSERT INTO `a_10003` (`Student_ID`, `Period`) VALUES
('11gfasdjha', 1),
('11gfasdjha', 2),
('11gfasdjha', 3),
('11gfasdjha', 4),
('11gfasdjha', 5),
('11gfasdjha', 6),
('11gfasdjha', 7);

-- --------------------------------------------------------

--
-- Table structure for table `d_10003`
--

CREATE TABLE `d_10003` (
  `Student_ID` varchar(12) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_10003`
--

INSERT INTO `d_10003` (`Student_ID`, `Name`) VALUES
('11gfasdjha', 'Vamsinath Gadwal');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `email`) VALUES
('hello', 'hello@hello.com');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `pass`, `access`) VALUES
('hello@hello.com', '1234', 'faculty'),
('principal', 'principal', 'principal'),
('vamsinath', 'hafeez', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2016-2017`
--
ALTER TABLE `2016-2017`
  ADD PRIMARY KEY (`class_name`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `2017-2018`
--
ALTER TABLE `2017-2018`
  ADD PRIMARY KEY (`class_name`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `2018-2019`
--
ALTER TABLE `2018-2019`
  ADD PRIMARY KEY (`class_name`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `2019-2020`
--
ALTER TABLE `2019-2020`
  ADD PRIMARY KEY (`class_name`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `d_10003`
--
ALTER TABLE `d_10003`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2016-2017`
--
ALTER TABLE `2016-2017`
  MODIFY `class_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `2017-2018`
--
ALTER TABLE `2017-2018`
  MODIFY `class_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20001;
--
-- AUTO_INCREMENT for table `2018-2019`
--
ALTER TABLE `2018-2019`
  MODIFY `class_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30001;
--
-- AUTO_INCREMENT for table `2019-2020`
--
ALTER TABLE `2019-2020`
  MODIFY `class_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40001;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
