-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2024 at 03:32 PM
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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `totalGrade` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeID`, `subjectId`, `username`, `totalGrade`) VALUES
(1, 1, 'asegobia', 0.00),
(2, 1, 'cvaydal', 0.00);

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
('asegobia', 'aeron mhae', 'segobia', 'n/a', 'aeronmhae@gmail.com', '867364', 'bsit', '$2y$10$uRNbm/8AReIhyjHrEnVsReXcaYycRQzhEiaxWUF1JLGsOK2Noi7PW', '2024-07-28 00:00:00', 'ewan ko', 'female', NULL),
('cvaydal', 'christian', 'vaydal', 'n/a', 'christianvaydal112@gmail.com', '78632876', 'bsit', '$2y$10$eotzhfXQPsN8p0YekWpKOOEWknoc1cQHqARsR.UN9goqpVz0YniOe', '2000-11-10 00:00:00', 'Pasay City', 'male', NULL),
('rrborbon', 'ricky', 'borbon', 'r', 'ricky@gmail.com', '7863586', 'bsit', '$2y$10$Ld.VuytO/CrEvJupSiL1t.WKn6ZQBd4LyPPtdnYhuo2h0mU733uqG', '2024-07-28 00:00:00', 'taga alabang', 'male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `subId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_year` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `Major` int(1) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`subId`, `name`, `_year`, `semester`, `Major`, `username`) VALUES
(1, 'Intro to Programming', 1, 1, 1, 'tstark');

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
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `username` (`username`),
  ADD KEY `subjectId` (`subjectId`);

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
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`subId`),
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
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Subjects`
--
ALTER TABLE `Subjects`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todo_admin`
--
ALTER TABLE `todo_admin`
  MODIFY `todoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`username`) REFERENCES `students` (`username`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `Subjects` (`subId`);

--
-- Constraints for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD CONSTRAINT `Subjects_ibfk_1` FOREIGN KEY (`username`) REFERENCES `teachers` (`username`);

--
-- Constraints for table `todo_admin`
--
ALTER TABLE `todo_admin`
  ADD CONSTRAINT `todo_admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
