-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2020 at 05:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `aUser` varchar(40) NOT NULL,
  `aPass` varchar(30) NOT NULL,
  `aEmail` varchar(50) NOT NULL,
  `Department` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `aUser`, `aPass`, `aEmail`, `Department`) VALUES
(1, 'Harshal', 'Chougule', 'admin', '1234', 'harshalschougule@gmail.com', 'CO');

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

DROP TABLE IF EXISTS `allocation`;
CREATE TABLE IF NOT EXISTS `allocation` (
  `sub_id` int(11) NOT NULL DEFAULT 0,
  `teacher_id` int(11) DEFAULT NULL,
  `sub_abb` varchar(3) DEFAULT NULL,
  `teach_abb` varchar(3) DEFAULT NULL,
  `semister` int(11) NOT NULL,
  `noLect` int(11) NOT NULL,
  `noPract` int(11) NOT NULL,
  `dept` varchar(6) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`sub_id`, `teacher_id`, `sub_abb`, `teach_abb`, `semister`, `noLect`, `noPract`, `dept`) VALUES
(1, 1, 'DMS', 'SSS', 3, 3, 2, 'CO'),
(3, 6, 'CGR', 'MBP', 3, 3, 2, 'CO'),
(4, 4, 'SEN', 'SPC', 4, 3, 2, 'CO'),
(5, 4, 'STE', 'SPC', 5, 4, 1, 'CO'),
(6, 6, 'MGT', 'MBP', 6, 2, 1, 'CO'),
(7, 3, 'PWP', 'DBH', 6, 4, 2, 'CO'),
(8, 5, 'MAD', 'AAK', 6, 4, 2, 'CO'),
(9, 4, 'ETI', 'SPC', 6, 4, 1, 'CO'),
(10, 2, 'WBP', 'RMM', 6, 4, 2, 'CO'),
(11, 4, 'EDE', 'SPC', 6, 0, 1, 'CO'),
(12, 5, 'CPE', 'AAK', 6, 2, 1, 'CO'),
(13, 2, 'JPR', 'RMM', 4, 2, 2, 'CO'),
(14, 5, 'DTE', 'AAK', 3, 4, 2, 'CO'),
(15, 2, 'OOP', 'RMM', 3, 4, 1, 'CO'),
(16, 2, 'DSU', 'RMM', 3, 2, 2, 'CO'),
(17, 6, 'DCC', 'MBP', 4, 4, 2, 'CO'),
(18, 1, 'MIC', 'SSS', 4, 4, 2, 'CO'),
(19, 1, 'GAD', 'SSS', 4, 2, 4, 'CO'),
(21, 4, 'EEC', 'SPC', 2, 2, 1, 'CO'),
(22, 4, 'AMI', 'SPC', 2, 6, 0, 'CO'),
(23, 5, 'BEC', 'AAK', 2, 3, 2, 'CO'),
(24, 2, 'PCI', 'RMM', 2, 5, 2, 'CO'),
(25, 6, 'BCC', 'MBP', 2, 0, 2, 'CO'),
(26, 3, 'CPH', 'DBH', 2, 2, 2, 'CO'),
(27, 3, 'WPD', 'DBH', 2, 2, 2, 'CO');

-- --------------------------------------------------------

--
-- Table structure for table `co2i`
--

DROP TABLE IF EXISTS `co2i`;
CREATE TABLE IF NOT EXISTS `co2i` (
  `slot` int(11) NOT NULL,
  `MON` varchar(10) DEFAULT 'none',
  `THU` varchar(10) DEFAULT 'none',
  `WED` varchar(10) DEFAULT 'none',
  `THE` varchar(10) DEFAULT 'none',
  `FRI` varchar(10) DEFAULT 'none',
  `SAT` varchar(10) DEFAULT 'none',
  PRIMARY KEY (`slot`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co2i`
--

INSERT INTO `co2i` (`slot`, `MON`, `THU`, `WED`, `THE`, `FRI`, `SAT`) VALUES
(1, 'CPH(DBH)-P', 'WPD(DBH)-P', 'BCC(MBP)-P', 'BCC(MBP)-P', 'none', 'none'),
(2, 'CPH(DBH)', 'WPD(DBH)', 'PCI(RMM)', 'PCI(RMM)', 'AMI(SPC)', 'BEC(AAK)'),
(3, 'CPH(DBH)-P', 'WPD(DBH)-P', 'PCI(RMM)-P', 'PCI(RMM)-P', 'AMI(SPC)-P', 'EEC(SPC)-P'),
(4, 'AMI(SPC)', 'EEC(SPC)', 'AMI(SPC)', 'EEC(SPC)', '   (   )', '   (   )'),
(5, 'AMI(SPC)-P', 'EEC(SPC)-P', 'AMI(SPC)-P', 'EEC(SPC)-P', 'PCI(RMM)-P', '   (   )-P'),
(6, 'CPH(DBH)', '   (   )', 'WPD(DBH)', 'BEC(AAK)', '   (   )', '   (   )');

-- --------------------------------------------------------

--
-- Table structure for table `documentsdata`
--

DROP TABLE IF EXISTS `documentsdata`;
CREATE TABLE IF NOT EXISTS `documentsdata` (
  `studid` int(11) NOT NULL,
  `docid` int(11) NOT NULL AUTO_INCREMENT,
  `doctitle` text NOT NULL,
  `docDate` datetime NOT NULL,
  `size` varchar(64) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `date`, `file`, `size`) VALUES
(57, 'Today is holiday', 'There is holiday due to some reason', '2020-05-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `randtimetable`
--

DROP TABLE IF EXISTS `randtimetable`;
CREATE TABLE IF NOT EXISTS `randtimetable` (
  `id` int(11) DEFAULT NULL,
  `sub` varchar(3) DEFAULT NULL,
  `teach` varchar(3) DEFAULT NULL,
  `noLect` int(11) DEFAULT NULL,
  `noPract` int(11) DEFAULT NULL,
  `count_lect` int(11) DEFAULT NULL,
  `count_pract` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `randtimetable`
--

INSERT INTO `randtimetable` (`id`, `sub`, `teach`, `noLect`, `noPract`, `count_lect`, `count_pract`) VALUES
(2, 'AMI', 'SPC', 6, 0, 3, 0),
(3, 'BEC', 'AAK', 3, 2, 2, 0),
(4, 'PCI', 'RMM', 5, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `sUser` varchar(30) NOT NULL,
  `sPass` varchar(30) NOT NULL,
  `Enrollno` bigint(20) NOT NULL,
  `mbno` bigint(20) NOT NULL,
  `dept` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `First_name`, `Last_name`, `gender`, `emailid`, `sUser`, `sPass`, `Enrollno`, `mbno`, `dept`) VALUES
(4, 'Harshal', 'Chougule', 'Male', 'harshalschougule@gmail.com', 'h', 'h1234', 1321323333, 9442424242, 'CO'),
(5, 'Atharv', 'Chougule', 'Male', 'harvschouule@gmail.com', 'atharv', 'a1234', 2133123123, 9403842422, 'CO'),
(7, 'Omkar', 'Kamble', 'Male', 'omka@gmail.com', 'om', '1234', 1815120134, 2232323232, 'CO');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `abbrivation` text NOT NULL,
  `subcode` int(10) NOT NULL,
  `dept` text NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `abbrivation`, `subcode`, `dept`, `sem`) VALUES
(1, 'Database Management', 'DMS', 22000, 'CO', 3),
(3, 'Computer Graphics', 'CGR', 22000, 'CO', 3),
(4, 'Software Engg', 'SEN', 22000, 'CO', 4),
(5, 'Software Testing', 'STE', 22000, 'CO', 5),
(6, 'Management', 'MGT', 22000, 'CO', 6),
(7, 'Programming with Python', 'PWP', 22000, 'CO', 6),
(8, 'Mobile Application Development', 'MAD', 22000, 'CO', 6),
(9, 'Emerging Trends in Computer and Information Technology', 'ETI', 22000, 'CO', 6),
(10, 'Web Based Application Development Using PHP', 'WBP', 22000, 'CO', 6),
(11, 'Enterpreneurship Development', 'EDE', 22000, 'CO', 6),
(12, 'Capstone Project - Execution & Report Writing', 'CPE', 22000, 'CO', 6),
(14, 'Digital Techniques', 'DTE', 22000, 'CO', 3),
(15, 'Object Oriented programming', 'OOP', 22000, 'CO', 3),
(16, 'Data Structure Using C', 'DSU', 22000, 'CO', 3),
(17, 'Data Communication And Computer Network', 'DCC', 22000, 'CO', 4),
(18, 'Microprocessor', 'MIC', 22000, 'CO', 4),
(19, 'GUI Application Development Using VB>NET', 'GAD', 22000, 'CO', 4),
(20, 'Advanced Java Programming', 'AJP', 22000, 'CO', 5),
(21, 'Elements of electrical engineering', 'EEC', 22000, 'CO', 2),
(22, 'Applied Mathematics', 'AMI', 22000, 'CO', 2),
(23, 'Basic Electronics', 'BEC', 22000, 'CO', 2),
(24, 'Programming in C', 'PCI', 22000, 'CO', 2),
(25, 'Business communication using computer', 'BCC', 22000, 'CO', 2),
(26, 'Computer Peripheral & hardware maintenance', 'CPH', 22000, 'CO', 2),
(27, 'Web page designing with HTML', 'WPD', 22000, 'CO', 2),
(28, 'Java Programming', 'JPR', 22333, 'CO', 4),
(29, 'Applied Mathematics', 'AMS', 22201, 'CE', 2),
(30, 'Applied Physics', 'APH', 22202, 'CE', 2),
(31, 'Applied Chemistry', 'ACH', 22202, 'CE', 2),
(32, 'Applied Mechanics', 'AME', 22203, 'CE', 2),
(33, 'Construction Materials', 'CMA', 22204, 'CE', 2),
(34, 'Basic Surveying', 'BSU', 22205, 'CE', 2),
(35, 'Business Communication using Computers', 'BCC', 22209, 'CE', 2),
(36, 'Civil.Engg. Workshop', 'CWS', 22208, 'CE', 2),
(37, 'APPLIED SCIENCE', 'AME', 22202, 'ME', 2),
(38, 'APPLIED MECHANICS', 'AME', 22203, 'ME', 2),
(39, 'APPLIED MATHEMATICS', 'AMP', 22206, 'ME', 2),
(40, 'ENGINEERING DRAWING', 'EDR', 22207, 'ME', 2),
(41, 'BUSISNESS COMMUNICATION USING COMPUTERS', 'BCC', 22209, 'ME', 2),
(42, 'MECHANICAL ENGINEERING WORKSHOP', 'MEW', 22210, 'ME', 2),
(43, 'THEORY OF MACHINE', 'TOM', 22438, 'ME', 4),
(44, 'MECHANICAL ENGINEERING NEASUREMENTS', 'MEM', 22443, 'ME', 4),
(45, 'FLUID MECHANICS AND MACHINERY', 'FMM', 22445, 'ME', 4),
(46, 'MANUFACTURING PROCESS', 'MPR', 22446, 'ME', 4),
(47, 'ENVIROMENTAL STUDIES', 'EST', 22447, 'ME', 4),
(48, 'COMPUTER AIDED DRAFTING', 'CAD', 22042, 'ME', 4),
(49, 'FUNDAMENTAL OF MECHATRONICS', 'FOM', 22048, 'ME', 4),
(50, 'EMERGING TRENDS IN MECHANICAL ENGINEERING', 'ETM', 22652, 'ME', 6),
(51, 'INDUSTRIAL HYDRAULICS AND PNEUMATICS', 'IHP', 22655, 'ME', 6),
(52, 'AUTOMOBILE ENGINEERING', 'AEN', 22656, 'ME', 6),
(53, 'INDUSTRIAL ENGINEERING & QUALITY CONTROL', 'IEQ', 22657, 'ME', 6),
(54, 'RENEWABLE ENERGY TECHNOLOGY', 'RET', 22661, 'ME', 6),
(55, 'ENTERPRENURESHIP DEVELOPMENT', 'EDE', 22032, 'ME', 6),
(56, 'CAPSTONE PROJECT EXECUTION AND REPORT WRITING', 'CPE', 22060, 'ME', 6);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `abbrivation` text NOT NULL,
  `tUser` varchar(30) NOT NULL,
  `tPass` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `noLect` int(11) NOT NULL,
  `noPract` int(11) NOT NULL,
  `dept` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `abbrivation`, `tUser`, `tPass`, `email`, `mobile`, `noLect`, `noPract`, `dept`) VALUES
(1, 'S.S.', 'Shinde', 'SSS', 'ssshinde', '1234', 'ssshinde@gmail.com', 2147483647, 15, 13, 'CO'),
(2, 'R.M.', 'More', 'RMM', 'rmmore', '1234', 'rmmore@rediff.com', 987654321, 3, 5, 'CO'),
(3, 'D.B.', 'Honmore', 'DBH', 'db', '1234', 'dbhonmore@yahoo,com', 805890503, 6, 5, 'CO'),
(4, 'S.P.', 'Chavan', 'SPC', '', '', 'spchavan@gmail.com', 987654320, 4, 3, 'CO'),
(5, 'A.A.', 'Kore', 'AAK', '', '1234', 'aakore@rediff.com', 987654320, 3, 2, 'CO'),
(6, 'M.B.', 'Patil', 'MBP', '', '', 'mbpatil@yahoo.com', 987654320, 3, 2, 'CO'),
(7, 'A.L.', 'Kamble', 'ALK', '', '', 'alkamble@gmail.com', 987654320, 1, 0, 'CO'),
(8, 'D.S.', 'Patil', 'DSP', '', '', 'dspatil@redif.com', 987654320, 1, 3, 'CO\r\n'),
(10, 'RV', 'Patil', 'RVP', 'rvp', 'r1234', 'rvpatil@gmail.com', 2147483647, 0, 0, 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `slot` int(11) NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`slot`, `starttime`, `endtime`) VALUES
(1, '10:00 AM', '11:00 AM'),
(2, '11:00 AM', '12:00 PM'),
(3, '12:25 PM', '1:25 PM'),
(4, '1:25 PM', '2:55 PM'),
(5, '2:35 PM', '3:35 PM'),
(6, '3:35 PM', '4:35 PM');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
CREATE TABLE IF NOT EXISTS `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) NOT NULL,
  `semister` int(11) NOT NULL,
  `dept` varchar(2) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `name`, `semister`, `dept`, `date_created`) VALUES
(357, 'CO2i', 2, 'CO', '2020-05-21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
