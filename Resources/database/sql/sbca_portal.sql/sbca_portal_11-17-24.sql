-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2024 at 09:47 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `b_id` int(11) NOT NULL,
  `student` varchar(255) NOT NULL,
  `assessment` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `num_units` int(11) NOT NULL,
  `schoolyear` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`b_id`, `student`, `assessment`, `balance`, `num_units`, `schoolyear`) VALUES
(2, 'elim', 16000, 16000, 25, '2024-2025_1'),
(3, 'jsultan', 16000, 16000, 25, '2024-2025_1');

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
('sbcaeduph', 'st. bernadette college of alabang', 'sbca@edu.ph', '$2y$10$i1DQrTTnpMP8QgGUMXvPGO/y.MHt7UgD6KcYbk8svaBzzwe/lgBra', 'sbcaaddress');

-- --------------------------------------------------------

--
-- Table structure for table `Announcement`
--

CREATE TABLE `Announcement` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `addressLink` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `imagefile` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Announcement`
--

INSERT INTO `Announcement` (`post_id`, `title`, `content`, `addressLink`, `author`, `imagefile`) VALUES
(14, 'test post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim rem atque asperiores dolor corporis magnam voluptas, distinctio et inventore eos exercitationem pariatur voluptates laudantium fuga cum, consequatur ratione totam reprehenderit!', '20241108174454', 'sbcaeduph', NULL),
(15, 'Walang Pasok', 'Walang pasok bukas simula November 9 Hanggang November 10 kasi birthday ko blee. ', '20241108175836', 'sbcaeduph', NULL),
(16, 'Test Announcement', 'Test Announcement body', '20241109064642', 'sbcaeduph', NULL),
(17, '', '', '20241114123739', 'sbcaeduph', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL,
  `std_username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `std_username`, `post_id`, `comment_content`, `comment_datetime`) VALUES
(1, 'cvaydal', 16, 'hello', '2024-11-10 06:17:12'),
(2, 'cvaydal', 16, 'new comment', '2024-11-10 06:31:37'),
(3, 'cvaydal', 16, 'test comment', '2024-11-10 06:32:22'),
(4, 'cvaydal', 15, 'test comment', '2024-11-10 06:32:37'),
(5, 'cvaydal', 16, 'test comment 2', '2024-11-10 06:33:08'),
(6, 'cvaydal', 16, 'test comment 3', '2024-11-10 06:33:44'),
(7, 'cvaydal', 17, 'no yan?', '2024-11-16 17:38:41'),
(8, 'cvaydal', 15, 'eh di wow', '2024-11-17 06:09:58'),
(9, 'cvaydal', 17, 'na hack account nyo', '2024-11-17 06:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`course`, `name`, `level`) VALUES
('bsba1', 'BSBA', 1),
('bshm1', 'BSHM', 1),
('bsit1', 'BSIT', 1),
('bsit2', 'BSIT', 2),
('bsit3', 'BSIT', 3),
('bsit4', 'BSIT', 4),
('bspsych1', 'BSPSYCH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Enrolled_Students`
--

CREATE TABLE `Enrolled_Students` (
  `SSY_ID` varchar(225) NOT NULL,
  `S_ID` varchar(225) NOT NULL,
  `SY_ID` varchar(255) NOT NULL,
  `TOTAL_GPA` int(1) NOT NULL,
  `LEVEL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Enrolled_Students`
--

INSERT INTO `Enrolled_Students` (`SSY_ID`, `S_ID`, `SY_ID`, `TOTAL_GPA`, `LEVEL`) VALUES
('2024-2025_1_accurry', 'accurry', '2024-2025_1', 0, 1),
('2024-2025_1_asegobia', 'asegobia', '2024-2025_1', 0, 1),
('2024-2025_1_baallen', 'baallen', '2024-2025_1', 0, 1),
('2024-2025_1_badam', 'badam', '2024-2025_1', 0, 1),
('2024-2025_1_bjgrimm', 'bjgrimm', '2024-2025_1', 0, 1),
('2024-2025_1_brbanner', 'brbanner', '2024-2025_1', 0, 1),
('2024-2025_1_btwayne', 'btwayne', '2024-2025_1', 0, 1),
('2024-2025_1_cbminerva', 'cbminerva', '2024-2025_1', 0, 1),
('2024-2025_1_cjkent', 'cjkent', '2024-2025_1', 0, 1),
('2024-2025_1_cvaydal', 'cvaydal', '2024-2025_1', 0, 1),
('2024-2025_1_elim', 'elim', '2024-2025_1', 0, 1),
('2024-2025_1_ggsamalca', 'ggsamalca', '2024-2025_1', 0, 1),
('2024-2025_1_hbaldesotto', 'hbaldesotto', '2024-2025_1', 0, 1),
('2024-2025_1_hjjordan', 'hjjordan', '2024-2025_1', 0, 1),
('2024-2025_1_hqueen', 'hqueen', '2024-2025_1', 0, 1),
('2024-2025_1_jhlogan', 'jhlogan', '2024-2025_1', 0, 1),
('2024-2025_1_jsultan', 'jsultan', '2024-2025_1', 0, 1),
('2024-2025_1_mmeisenhardt', 'mmeisenhardt', '2024-2025_1', 0, 1),
('2024-2025_1_ttmad titan', 'ttmad titan', '2024-2025_1', 0, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `id` int(11) NOT NULL,
  `std_username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`id`, `std_username`, `post_id`) VALUES
(5, 'cvaydal', 15),
(6, 'cvaydal', 14),
(7, 'cvaydal', 16);

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `payment_id` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SchoolYear`
--

CREATE TABLE `SchoolYear` (
  `SY_ID` varchar(255) NOT NULL,
  `START_DATE` datetime NOT NULL,
  `END_DATE` datetime NOT NULL,
  `EXTEND_DATE` datetime NOT NULL,
  `NUM_ENROLLED` int(11) DEFAULT NULL,
  `OPEN` int(1) DEFAULT NULL,
  `CURRENT` int(1) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SchoolYear`
--

INSERT INTO `SchoolYear` (`SY_ID`, `START_DATE`, `END_DATE`, `EXTEND_DATE`, `NUM_ENROLLED`, `OPEN`, `CURRENT`, `semester`) VALUES
('2024-2025_1', '1986-01-29 00:00:00', '1986-01-29 00:00:00', '1986-01-29 00:00:00', 1, 1, 1, '1');

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
  `profilePicture` longblob DEFAULT NULL,
  `imageLink` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `fname`, `lname`, `mname`, `email`, `userid`, `course`, `_password`, `bdate`, `address`, `gender`, `profilePicture`, `imageLink`) VALUES
('accurry', 'arthur', 'curry', 'curry', 'acurry@sbca.edu.ph', 'A2022-55987', 'bspsych1', '$2y$10$YM9cyUW.xP4hgrp1OcfgdOxoyh0SjQU6lsHA4R7lpY8mgOM9d9Eb.', '1986-01-29 00:00:00', 'Atlantis', 'Male', NULL, NULL),
('asegobia', 'aeron mhae', 'segobia', 'n/a', 'asegobia@sbca.edu.ph', '5436546', 'bsit1', '$2y$10$P4Lb9jyMo7s4VukcKn/oqO5NHGFhcFdmYv9QCtqVqK9kEpqmSZfKa', '2024-11-02 00:00:00', 'safadfrgr', 'female', NULL, NULL),
('baallen', 'barry', 'allen', 'allen', 'ballen@sbca.edu.ph', 'B2023-44567', 'bsit1', '$2y$10$1.7tyuOcIHfMZ7D0Ne38V.hSt.TxYUx95Q8yLZx6UEGqYj.YbKT0q', '1989-03-14 00:00:00', 'Central City', 'Male', NULL, NULL),
('badam', 'black', 'adam', 'n/a', 'badam@sbca.edu.ph', 'B2023-81923', 'bsba1', '$2y$10$H7P4tK3BiD.p.r3KNBACH.h0wSXMFHIlL2ieNAUUsZ14cbuX/vcH6', '1995-12-01 00:00:00', 'Kahndaq', 'Male', NULL, NULL),
('bjgrimm', 'benjamin', 'grimm', 'jacob', 'bgrimm@sbca.edu.ph', 'B2023-76234', 'bsit1', '$2y$10$MoDmhGEyUeg9JmLsALkMVeKaf9Sqk.FxwCHwc5STCVdbrlEKg6Xva', '1969-09-20 00:00:00', 'Yancy Street, Lower East Side, New York', 'Male', NULL, NULL),
('bmborbon', 'black', 'borbon', 'manta', 'bborbon@sbca.edu.ph', 'B2024-63175', 'bsit1', '$2y$10$CnWNpZmJ003vekKDIH0TzOuIWu54nTvBf0bPpyJ.gvXBC1XmcSFfW', '1990-09-12 00:00:00', 'Atlantis', 'Male', NULL, NULL),
('brbanner', 'bruce', 'banner', 'robert', 'bbanner@sbca.edu.ph', 'B2022-32189', 'bsit1', '$2y$10$hLBC16m6gW7/cvM2WkwmQ.awEaz2vzuEWNd2t8dmvrGNNm3I5GPCa', '1969-12-18 00:00:00', 'Dayton, Ohio', 'Male', NULL, NULL),
('btwayne', 'bruce', 'wayne', 'thomas', 'bwayne@sbca.edu.ph', 'B2024-45678', 'bsba1', '$2y$10$jo2y3Hxrw5YKg668esPS.O6.iGOb4tlCMJBfkb1wVAjFy3IBfGyNW', '1972-02-19 00:00:00', '1007 Mountain Drive, Gotham City', 'Male', NULL, NULL),
('cbminerva', 'cheetah', 'minerva', 'barbara', 'cminerva@sbca.edu.ph', 'C2022-97513', 'bspsych1', '$2y$10$bK6yMwnMw4yBsMfdN.y69edEHl5vbMxNAP3SxXNLE6DYMC5DrVQzu', '1985-11-30 00:00:00', 'Washington D.C.', 'Female', NULL, NULL),
('cfxavier', 'charles', 'xavier', 'francis', 'cxavier@sbca.edu.ph', 'C2023-78546', 'bspsych1', '$2y$10$KUnchvW2yoJ3V/ylovLj.OrVA0NMt1HVWQPxXYVshQ33xOAxbWArS', '1932-03-16 00:00:00', 'Westchester County, New York', 'Male', NULL, NULL),
('cjkent', 'clark', 'kent', 'joseph', 'ckent@sbca.edu.ph', 'C2022-98765', 'bspsych1', '$2y$10$HfmXa9SSBY0gtVho5HraeeixU47H/XP94tlo5FMRLtXIAjzdCqYuC', '1978-06-18 00:00:00', 'Smallville, Kansas', 'Male', NULL, NULL),
('cvaydal', 'christian', 'vaydal', 'n/a', 'cvaydal@sbca.edu.ph', '74892765', 'bsit1', '$2y$10$jxjdfihpvo4DU8i9CiUakO0YHHoJ2S46vLvBiaH0SUG5RRmy4vWde', '2024-11-02 00:00:00', 'Pasay City', 'male', NULL, NULL),
('dpthemyscira', 'diana', 'themyscira', 'princess of', 'dthemyscira@sbca.edu.ph', 'D2024-89123', 'bspsych1', '$2y$10$KvsKtedI99v/cW.qoRRxaeCNLUE.9IRzpNpRRb3aoZzEMyviMlhYq', '2001-03-25 00:00:00', 'Themyscira', 'Female', NULL, NULL),
('dquiqui', 'darkseid', 'quiqui', 'n/a', 'dquiqui@sbca.edu.ph', 'D2023-45389', 'bspsych1', '$2y$10$NQzPrXcflr4jB5V7NUd94uqwAlTNCYhXJGDUEGdC9w0JVQCbmKY6C', '2001-04-10 00:00:00', 'Apokolips', 'Male', NULL, NULL),
('dswilson', 'deathstroke', 'wilson', 'slade', 'dwilson@sbca.edu.ph', 'D2022-49653', 'bsba1', '$2y$10$xUfXurLWLhtMYkkfTY3DBORGqlt0GHIszXYNni2s/OGrgrv.VDg6O', '1991-07-20 00:00:00', 'Washington D.C.', 'Male', NULL, NULL),
('elim', 'ethan diego', 'lim', 'n/a', 'elim@sbca.edu.ph', '12368734', 'bsit1', '$2y$10$MFLvnIUV5g.mLtkceUK5q.Q51ljUS9OUeuc1m7B1GKW6WRVwZtLzq', '2024-11-14 00:00:00', 'quezon city', 'male', NULL, NULL),
('ggsamalca', 'green', 'samalca', 'goblin', 'gsamalca@sbca.edu.ph', 'G2023-74832', 'bsba1', '$2y$10$O1Hw3H6c4Mre02Fxl9DjLO21znjRc2Yzk.YJeFD7rjkdt1h5jwNV6', '1965-03-14 00:00:00', 'New York City', 'Male', NULL, NULL),
('hbaldesotto', 'hela', 'baldesotto', 'n/a', 'hbaldesotto@sbca.edu.ph', 'H2022-54219', 'bspsych1', '$2y$10$6cwdz/zS.tjoVG.wxsTil.nTqQwb.QdSz57HTTGNOE0B3QjEok2fm', '2003-01-17 00:00:00', 'Helheim', 'Female', NULL, NULL),
('hjjordan', 'hal', 'jordan', 'jordan', 'hjordan@sbca.edu.ph', 'H2023-87965', 'bsit1', '$2y$10$mxCHeHZYZY6iyjhOk.xhkuOneGB8j.SSH.8CrZEAQAtHb0UQDu06a', '1973-02-20 00:00:00', 'Coast City', 'Male', NULL, NULL),
('hqueen', 'harley', 'queen', 'n/a', 'hqueen@sbca.edu.ph', 'H2024-16582', 'bspsych1', '$2y$10$.a9tclv16ERGSX3DP2evPu5GHS81Y2g2EPThVb.I1jeHyc16UyZAu', '2001-06-17 00:00:00', 'Gotham City', 'Female', NULL, NULL),
('jhlogan', 'james', 'logan', 'howlett', 'jlogan@sbca.edu.ph', 'J2024-22157', 'bsit1', '$2y$10$1HUvxzu5SbuSFxHDvmPxSuxBTXAdprPKtM2rSpsCFNxnR9imTZk3S', '2005-07-14 00:00:00', 'Canada', 'Male', NULL, NULL),
('jsultan', 'jalal', 'sultan', 'n/a', 'jsultan@sbca.edu.ph', '87125367521', 'bsit1', '$2y$10$bN1Jgq6AYourkfmrFSDkRuVrW.A6FF/NwhcN/OEYyVWFz7DKd3M.G', '2024-11-14 00:00:00', 'ormoc city', 'male', NULL, NULL),
('jvaydal', 'joker', 'vaydal', 'n/a', 'jvaydal@sbca.edu.ph', 'J2024-55348', 'bspsych1', '$2y$10$vzTYqf0JOUGQZtNsiItWHuBnzPAJvvdLkLCsJThovAvEtuImFJ3Vu', '2000-12-04 00:00:00', 'Gotham City', 'Male', NULL, NULL),
('llodinson', 'loki', 'odinson', 'laufeyson', 'lodinson@sbca.edu.ph', 'L2023-45632', 'bsba1', '$2y$10$JDfY9tc4Hs2PM2sYjmMScuJtHtJRe4ZxdVUJ8FcmM/sEKsrKhWl6S', '2000-07-09 00:00:00', 'Asgard', 'Male', NULL, NULL),
('lxluther', 'lex', 'luther', 'x', 'lluther@sbca.edu.ph', 'L2022-38562', 'bsba1', '$2y$10$l06aYsTIHYSzdAB955dPuuo9NauflLG1GDznBCZHURNfl74BYoPuy', '1973-09-28 00:00:00', 'Metropolis', 'Male', NULL, NULL),
('mmeisenhardt', 'magneto', 'eisenhardt', 'max', 'meisenhardt@sbca.edu.ph', 'M2024-63215', 'bsba1', '$2y$10$Ag33NI2Uq1tmvH.lB4Ob.eh5D0mWjOXPAOvqO23vnlVOtZkK.Snsi', '1930-10-18 00:00:00', 'Genosha', 'Male', NULL, NULL),
('naromanoff', 'natasha', 'romanoff', 'alianovna', 'nromanoff@sbca.edu.ph', 'N2023-99873', 'bspsych1', '$2y$10$O/r.uRQsMVQbPD5/UPE/IuNYlphzqRR2CLJBlCHdLYAsYpm6apKbC', '1984-11-22 00:00:00', 'Moscow, Russia', 'Female', NULL, NULL),
('ojqueen', 'oliver', 'queen', 'jonas', 'oqueen@sbca.edu.ph', 'O2024-11243', 'bsba1', '$2y$10$fZ55SpOPGs5UFEvwV2Zy8uq2ly8zNzASUT4.803eKmvWyhvmrS5RG', '1985-05-16 00:00:00', 'Star City', 'Male', NULL, NULL),
('pbparker', 'peter', 'parker', 'benjamin', 'pparker@sbca.edu.ph', 'P2023-12345', 'bsit1', '$2y$10$KF7hC6pxErrTW9F1sIpl2e1jAkcK7hZzO.c1WiRVX/69I9gpkfnru', '1995-08-10 00:00:00', '20 Ingram Street, Queens, New York', 'Male', NULL, NULL),
('pitangan', 'poison', 'tangan', 'ivy', 'ptangan@sbca.edu.ph', 'P2024-85316', 'bspsych1', '$2y$10$5K/RRgaLeKwOzlZKBL3SH.QJ1GuquDWqTafweDf2l1VM8niwM5eT.', '1994-03-21 00:00:00', 'Gotham City', 'Female', NULL, NULL),
('rnrichards', 'reed', 'richards', 'nathaniel', 'rrichards@sbca.edu.ph', 'R2022-99876', 'bsit1', '$2y$10$aVwDmcO.YMGSq9A3E09vK.o9Op0pT2wpXhil4lrSEqCaogbwzGoRS', '1969-11-14 00:00:00', 'Baxter Building, Manhattan, New York', 'Male', NULL, NULL),
('rsarbiso', 'red', 'arbiso', 'skull', 'rarbiso@sbca.edu.ph', 'R2023-69843', 'bsba1', '$2y$10$xwhw/DgXbsLQ.CvaN9a6ceZslufHqalgMsakuNt/m5CkqkOrMmjQW', '1935-05-19 00:00:00', 'Germany', 'Male', NULL, NULL),
('sgrogers', 'steve', 'rogers', 'grant', 'srogers@sbca.edu.ph', 'S2024-76543', 'bsba1', '$2y$10$hFjhALHZO7cv1IKX08JR8.058xP2HL/7yJy7q4mFPLfTnbnUEhLdC', '1918-07-04 00:00:00', 'Brooklyn, New York', 'Male', NULL, NULL),
('ssrichards', 'susan', 'richards', 'storm', 'srichards@sbca.edu.ph', 'S2024-45321', 'bspsych1', '$2y$10$7gdbiuDqv1h9fAoJWGZwKu.zsOA6Vk7pLDAQzixZn7WwTe3tuYSy.', '1970-12-04 00:00:00', 'Baxter Building, Manhattan, New York', 'Female', NULL, NULL),
('sssummers', 'scott', 'summers', 'summers', 'ssummers@sbca.edu.ph', 'S2024-55632', 'bspsych1', '$2y$10$4YvejPN6lHLYpOsD4CIwweW5Vp7nU7PhHkNrfOLNAYh4BAOk26NvG', '1963-08-29 00:00:00', 'Anchorage, Alaska', 'Male', NULL, NULL),
('sutrera', 'sinestro', 'utrera', 'n/a', 'sutrera@sbca.edu.ph', 'S2023-19486', 'bsba1', '$2y$10$h7Ffsv8wSprfQGaILuGQMuOgrD/4KxIE6fGOHeTdNhJhkXOsG4WRu', '1983-10-08 00:00:00', 'Korugar', 'Male', NULL, NULL),
('svstrange', 'stephen', 'strange', 'vincent', 'sstrange@sbca.edu.ph', 'S2022-34521', 'bsit1', '$2y$10$ZK5jRFEPbhf.y5ZkWD8ce.WoDTEo9rwDejEPc5zZQ8v0f8UnavN3y', '1930-11-18 00:00:00', '177A Bleecker Street, Greenwich Village, New York', 'Male', NULL, NULL),
('testark', 'tony', 'stark', 'edward', 'tstark@sbca.edu.ph', 'T2023-12367', 'bsit1', '$2y$10$CLxvCFMedeoYBh3fLgJZnulIn3FdSUHAfcnu0e7tYN8raxUZf2MFK', '1970-05-29 00:00:00', '10880 Malibu Point, Malibu, California', 'Male', NULL, NULL),
('ttmad titan', 'thanos', 'mad titan', 'the', 'tmad titan@sbca.edu.ph', 'T2022-97651', 'bspsych1', '$2y$10$EtV0uCiDTdMDVfKCKlQESeNDQ/AfyBgJ21k31eGO6YpYoXaaT9DyS', '1975-02-18 00:00:00', 'Titan', 'Male', NULL, NULL),
('usegobia', 'ultron', 'segobia', 'n/a', 'usegobia@sbca.edu.ph', 'U2023-87234', 'bsit1', '$2y$10$c2rYxwg4GstbY0psrfsFHes4PK9rysKJ3Xho/yGCQv0U.yiu2vpcO', '2005-02-02 00:00:00', 'Unknown', 'Male', NULL, NULL),
('vlim', 'venom', 'lim', 'n/a', 'vlim@sbca.edu.ph', 'V2024-72135', 'bspsych1', '$2y$10$DUfUYnoNcDvMB7LNPPmxE..dr3P/oO0tPVAe/3Rkl7ogwmlwapwvG', '1988-08-09 00:00:00', 'New York City', 'Male', NULL, NULL),
('vvdoom', 'victor', 'doom', 'von', 'vdoom@sbca.edu.ph', 'V2023-75462', 'bsit1', '$2y$10$W93ZK2LxKW5SbWndiKO2Fu2sAAxhQ6atiChAqhzKLrGDSezsxscTm', '2002-05-16 00:00:00', 'Latveria', 'Male', NULL, NULL),
('wdmaximoff', 'wanda', 'maximoff', 'django', 'wmaximoff@sbca.edu.ph', 'W2024-66789', 'bspsych1', '$2y$10$Dup9sHRBfQrIIe2ceMpoI.9gXyKIx8Lnbx0Gl0yyFsFWFiDhJhcY2', '1989-02-10 00:00:00', 'Sokovia', 'Female', NULL, NULL);

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
('srogers', 'steve', 'rogers', 'n/a', 'srogers@sbca.edu.ph', '8764578', '$2y$10$ppNDnHVSyIBkFYFuNKvvVeq.w1BSN8iwl1uXpVubyyGu.xTdjb8mS', '2024-09-23 00:00:00', 'USA', 'male', NULL, NULL),
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
(36, 'sbcaeduph', 'year in student option', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `student` (`student`),
  ADD KEY `fk_schoolyear` (`schoolyear`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `std_username` (`std_username`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`course`);

--
-- Indexes for table `Enrolled_Students`
--
ALTER TABLE `Enrolled_Students`
  ADD PRIMARY KEY (`SSY_ID`),
  ADD KEY `S_ID` (`S_ID`),
  ADD KEY `SY_ID` (`SY_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `username` (`username`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_username` (`std_username`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `SchoolYear`
--
ALTER TABLE `SchoolYear`
  ADD PRIMARY KEY (`SY_ID`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course` (`course`);

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
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Announcement`
--
ALTER TABLE `Announcement`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`student`) REFERENCES `Enrolled_Students` (`S_ID`),
  ADD CONSTRAINT `fk_schoolyear` FOREIGN KEY (`schoolyear`) REFERENCES `SchoolYear` (`SY_ID`);

--
-- Constraints for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD CONSTRAINT `Announcement_ibfk_1` FOREIGN KEY (`author`) REFERENCES `admin` (`username`);

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`std_username`) REFERENCES `students` (`username`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Announcement` (`post_id`);

--
-- Constraints for table `Enrolled_Students`
--
ALTER TABLE `Enrolled_Students`
  ADD CONSTRAINT `Enrolled_Students_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `students` (`username`),
  ADD CONSTRAINT `Enrolled_Students_ibfk_2` FOREIGN KEY (`SY_ID`) REFERENCES `SchoolYear` (`SY_ID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`username`) REFERENCES `students` (`username`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `Subjects` (`subId`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`std_username`) REFERENCES `students` (`username`),
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Announcement` (`post_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course`) REFERENCES `Course` (`course`);

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
