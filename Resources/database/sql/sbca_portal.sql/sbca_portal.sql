-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 04:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbca_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `_password` longtext NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `email`, `_password`, `address`) VALUES
('sbcaeduph', 'st. bernadette college of alabang', 'sbca@edu.ph', 'sbca12345', 'sbcaaddress');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` int(1) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `semID` varchar(255) NOT NULL,
  `current` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`, `schoolyear`, `semID`, `current`) VALUES
(2, '2023-2024', '2sem2023-2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `_password` longtext NOT NULL,
  `bdate` datetime NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profilePicture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `fname`, `lname`, `mname`, `email`, `userid`, `course`, `_password`, `bdate`, `address`, `gender`, `profilePicture`) VALUES
('atsegobia', 'aeron', 'segobia', 't', 'asegobia@sbca.edu.ph', 'WE834', 'BS Information Technology', '$2y$10$wszm7/ab7wD2vqKEDSapXux6ryRdC1AVdeBmOImk2AI1WyzCxq.Pq', '2024-03-22 00:00:00', 'taga sa kanila', 'male', NULL),
('cvaydal', 'christian', 'vaydal', 'n/a', 'cvaydal@sbca.edu.ph', 'sdfds', 'BS Information Technology', '$2y$10$24kTyn0iAY9nlCdRhoFbLu47nByJ/rJoBit841oYDo4nSb3UyBl/2', '2024-03-22 00:00:00', 'safsdgffcxghh', 'male', NULL),
('edlim', 'ethan diego', 'lim', 'd', 'ethanlim@sbca.edu.ph', 'DU67', 'BS Information Technology', '$2y$10$Kd/6t3HK551vWOpswb2HqOGey3NG23u6iEqTv9eW1H3EVr13Gq4uO', '2024-03-22 00:00:00', 'dyan lang', 'male', NULL),
('gmatteo', 'genie', 'matteo', 'n/a', 'jmatteo@sbca.edu.ph', 'du45', 'BS Business Ad', '$2y$10$eraC16dBWxazU3xK/k6GjusUf3EZvIk20RXzptB00s1lBiW4w0Wl2', '2024-03-22 00:00:00', 'taga dito', 'male', NULL),
('jasamalca', 'judith', 'samalca', 'a', 'jsamalca@sbca.edu.ph', 'RT6734', 'BS Information Technology', '$2y$10$k6cAW85aX0.7sq2U9jxD6.UV49Uvhr2wUlsz2s49vIHRPFgcukZEy', '2001-03-14 00:00:00', 'alabang', 'male', NULL),
('jpquiqui', 'johny', 'quiqui', 'p', 'jquiqui@sbca.edu.ph', 'DU84', 'BS Information Technology', '$2y$10$k6/Rhk9Q.8acMwDTbzcICOwpktq8D46ANVHujULJg940kiI5Uwck2', '2024-03-22 00:00:00', 'haha ewan', 'male', NULL),
('jpquito', 'jayson', 'quito', 'p', 'jquito@sbca.edu.ph', 'QW794', 'BS Information Technology', '$2y$10$U.vDV1vY5MHz7wqNUV4kbuP8G8V5Ife39jOpkBnM0zz5ADl4tIeGW', '2024-03-22 00:00:00', 'uiui', 'male', NULL),
('jptangan', 'judy an', 'tangan', 'puta', 'jtangan@sbca.edu.ph', 'opas1', 'BS Information Technology', '$2y$10$IEqYzqO78b23aZt0yhWvPuM278HJla0yDRsOzRss9g3GoB/wa5xSu', '2024-03-22 00:00:00', 'dito lang', 'male', NULL),
('jputrera', 'john paul', 'utrera', 'p', 'jputrera@sbca.edu.ph', 'YU904', 'BS Information Technology', '$2y$10$eC6jCPTEMmACTekCK9FgFe95kApFPp6bMiYs1XBZnESJ.sfG6vQD.', '2024-03-22 00:00:00', 'hmnghgh', 'male', NULL),
('jvnarido', 'john neo', 'narido', 'vaydal', 'neomarido@gmail.com', '1365990190100', 'BS Information Technology', '$2y$10$jHMfI6jbC/oyxGBlk3.m6.2u4VtSIVju1aaPsgzuesdazbr.KsK8K', '2013-08-12 00:00:00', 'mancuno st. mulawin maricaban pasay city', 'male', NULL),
('lgaga', 'lady', 'gaga', 'n/a', 'lgaga@sbca.edu.ph', 'yesh', 'BS Business Ad', '$2y$10$mZPzkraTwogyL6/ZnycfGusrl4.DRoGUoHUZPOr8NgZZFVFMrEXn2', '2024-03-23 00:00:00', 'dyan lang', 'female', NULL),
('mgbaldesoto', 'mary france', 'baldesoto', 'g', 'mfbaldesoto@.sbca.edu.ph', 'YU7834', 'BS Information Technology', '$2y$10$NBi8AO3iZllKU/4l9mg3Q.qdMm3TgHT1iDQzIkcrK4VG7rActZlW2', '2024-03-22 00:00:00', 'ewan', 'male', NULL),
('rrborbon', 'ricky', 'borbon', 'r', 'rborbon@sbca.edu.ph', 'qw38', 'BS Information Technology', '$2y$10$EIoxs49ZrdYy7biu686cPudKcgL0/8mtfyWqDafnovbKnvnqhbwzW', '2024-03-22 00:00:00', 'taga dito lang', 'female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_year` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `Major` int(1) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `_password` longtext NOT NULL,
  `bdate` datetime NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `profilePicture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`username`, `fname`, `lname`, `mname`, `email`, `userid`, `_password`, `bdate`, `address`, `gender`, `profession`, `profilePicture`) VALUES
('tstark', 'tony', 'stark', 's', 'tstark@sbca.edu.ph', 'userid01', '12345678', '2000-11-10 16:38:34', 'home address', 'male', 'IT Professor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todo_admin`
--

CREATE TABLE `todo_admin` (
  `todoid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo_admin`
--

INSERT INTO `todo_admin` (`todoid`, `username`, `name`, `checked`) VALUES
(23, 'sbcaeduph', 'search bar for teacher', 0),
(30, 'sbcaeduph', 'todo list options', 0),
(33, 'sbcaeduph', 'options in every pages', 0),
(34, 'sbcaeduph', 'functionality for new semester', 0),
(35, 'sbcaeduph', 'add teacher', 0),
(36, 'sbcaeduph', 'year in student option', 0),
(37, 'sbcaeduph', 'remove the action buttons in student list', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`code`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `todo_admin`
--
ALTER TABLE `todo_admin`
  ADD PRIMARY KEY (`todoid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_admin`
--
ALTER TABLE `todo_admin`
  MODIFY `todoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`username`) REFERENCES `teachers` (`username`);

--
-- Constraints for table `todo_admin`
--
ALTER TABLE `todo_admin`
  ADD CONSTRAINT `todo_admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
