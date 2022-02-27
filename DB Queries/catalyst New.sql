-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 10:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalyst`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessmentCode` int(11) NOT NULL,
  `sectionCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `assessmentType` varchar(20) NOT NULL,
  `assessmentSubType` varchar(30) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `totalMarks` int(11) NOT NULL,
  `weightage` int(11) NOT NULL,
  `numberOfQuestions` int(11) NOT NULL,
  `topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessmentCode`, `sectionCode`, `courseCode`, `assessmentType`, `assessmentSubType`, `title`, `totalMarks`, `weightage`, `numberOfQuestions`, `topic`) VALUES
(3, 7, 'SEN-32', 'Sessional', 'Assignment', 'Cocomo Model', 10, 2, 3, 'Modelling'),
(4, 7, 'SEN-32', 'Sessional', 'Assignment', 'Message ', 10, 1, 2, 'Sending Data'),
(5, 7, 'SEN-32', 'Sessional', 'Assignment', 'Decryption', 15, 2, 2, 'PHP'),
(6, 7, 'SEN-32', 'Sessional', 'Project', 'Hospital Management System', 10, 5, 3, 'Hospital'),
(45, 7, 'SEN-32', 'Sessional', 'Project', 'Welcome', 10, 5, 1, 'Hello'),
(46, 7, 'SEN-32', 'Sessional', 'Quiz', 'Welcome', 10, 1, 1, 'Hello'),
(51, 8, 'SEN-33', 'Sessional', 'Assignment', 'Hello', 10, 2, 1, 'World'),
(53, 7, 'SEN-33', 'Sessional', 'Assignment', 'Welcome', 5, 5, 2, 'Hello'),
(54, 8, 'SEN-33', 'Sessional', 'Assignment', 'Welcome', 12, 8, 1, 'Hello'),
(55, 8, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 2, 'Hello'),
(56, 7, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 1, 'Hello'),
(57, 7, 'SEN-32', 'Sessional', 'Quiz', 'Welcome', 10, 4, 3, 'Hello'),
(58, 7, 'SEN-32', 'Sessional', 'Assignment', 'Welcome', 12, 2, 1, 'Hello'),
(59, 7, 'SEN-32', 'FinalExam', '', 'Welcome', 50, 50, 1, 'Hello'),
(60, 7, 'SEN-32', 'Midterm', '', 'Welcome', 25, 25, 1, 'Hello'),
(61, 7, 'SEN-32', 'Sessional', 'Assignment', 'Welcome', 10, 2, 1, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `assessmentquestion`
--

CREATE TABLE `assessmentquestion` (
  `questionCode` int(11) NOT NULL,
  `assessmentCode` int(11) NOT NULL,
  `cloCode` int(11) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `totalQuestionMarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessmentquestion`
--

INSERT INTO `assessmentquestion` (`questionCode`, `assessmentCode`, `cloCode`, `detail`, `totalQuestionMarks`) VALUES
(6, 3, 1, 'ABC  ', 3),
(7, 3, 2, 'DEF  ', 3),
(8, 3, 2, 'GHI  ', 4),
(9, 4, 1, 'Answer All Questions  ', 5),
(10, 4, 2, 'Fill in the blanks    ', 5),
(11, 5, 1, 'ABC ', 10),
(12, 6, 1, 'ABC ', 3),
(13, 6, 2, 'DEF ', 3),
(14, 6, 2, 'XYZ ', 4),
(80, 45, 1, 'Fill in the blanks', 10),
(81, 46, 2, 'Fill in the blanks', 10),
(87, 51, 5, 'Fill in the blanks ', 10),
(89, 53, 5, 'Fill in the blanks  ', 3),
(90, 53, 5, 'Fill in the blanks ', 2),
(91, 54, 5, 'Fill in the blanks', 12),
(92, 55, 5, 'Fill in the blanks', 12),
(93, 55, 5, 'Fill in the blanks', 13),
(94, 56, 5, 'Fill in the blanks', 25),
(95, 5, 2, 'Fill in the blanks', 5),
(96, 57, 1, 'Fill in the blanks', 3),
(97, 57, 1, 'Fill in the blanks', 3),
(98, 57, 2, 'Fill in the blanks', 4),
(99, 58, 4, 'Fill in the blanks', 12),
(100, 59, 1, 'Fill in the blanks', 50),
(101, 60, 4, 'Fill in the blanks', 25),
(102, 61, 4, 'Fill in the blanks', 10);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentquestionstudentmarks`
--

CREATE TABLE `assessmentquestionstudentmarks` (
  `studentRegCode` varchar(30) NOT NULL,
  `questionCode` int(11) NOT NULL,
  `obtainedMarks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessmentquestionstudentmarks`
--

INSERT INTO `assessmentquestionstudentmarks` (`studentRegCode`, `questionCode`, `obtainedMarks`) VALUES
('FUI/FURC-SP-18-BCSE-011', 9, 5),
('FUI/FURC-SP-18-BCSE-018', 10, 2),
('FUI/FURC-SP-18-BCSE-018', 9, 2),
('FUI/FURC-SP-18-BCSE-011', 10, 5),
('FUI/FURC-SP-18-BCSE-041', 92, 10),
('FUI/FURC-SP-18-BCSE-041', 93, 10),
('FUI/FURC-SP-18-BCSE-042', 92, 12),
('FUI/FURC-SP-18-BCSE-042', 93, 12),
('FUI/FURC-SP-18-BCSE-043', 92, 10),
('FUI/FURC-SP-18-BCSE-043', 93, 10),
('FUI/FURC-SP-18-BCSE-044', 92, 10),
('FUI/FURC-SP-18-BCSE-044', 93, 10),
('FUI/FURC-SP-18-BCSE-045', 92, 10),
('FUI/FURC-SP-18-BCSE-045', 93, 10),
('FUI/FURC-SP-18-BCSE-046', 92, 10),
('FUI/FURC-SP-18-BCSE-046', 93, 1),
('FUI/FURC-SP-18-BCSE-047', 92, 9),
('FUI/FURC-SP-18-BCSE-047', 93, 9),
('FUI/FURC-SP-18-BCSE-048', 92, 9),
('FUI/FURC-SP-18-BCSE-048', 93, 9),
('FUI/FURC-SP-18-BCSE-001', 94, 25),
('FUI/FURC-SP-18-BCSE-002', 94, 10),
('FUI/FURC-SP-18-BCSE-011', 94, 25),
('FUI/FURC-SP-18-BCSE-012', 94, 10),
('FUI/FURC-SP-18-BCSE-018', 94, 25),
('FUI/FURC-SP-18-BCSE-037', 94, 10),
('FUI/FURC-SP-18-BCSE-039', 94, 25),
('FUI/FURC-SP-18-BCSE-040', 94, 10),
('FUI/FURC-SP-18-BCSE-041', 91, 12),
('FUI/FURC-SP-18-BCSE-042', 91, 12),
('FUI/FURC-SP-18-BCSE-043', 91, 12),
('FUI/FURC-SP-18-BCSE-044', 91, 12),
('FUI/FURC-SP-18-BCSE-045', 91, 12),
('FUI/FURC-SP-18-BCSE-046', 91, 12),
('FUI/FURC-SP-18-BCSE-047', 91, 12),
('FUI/FURC-SP-18-BCSE-048', 91, 12),
('FUI/FURC-SP-18-BCSE-001', 6, 0),
('FUI/FURC-SP-18-BCSE-001', 7, 0),
('FUI/FURC-SP-18-BCSE-001', 8, 0),
('FUI/FURC-SP-18-BCSE-002', 6, 0),
('FUI/FURC-SP-18-BCSE-002', 7, 0),
('FUI/FURC-SP-18-BCSE-002', 8, 0),
('FUI/FURC-SP-18-BCSE-011', 6, 0),
('FUI/FURC-SP-18-BCSE-011', 7, 0),
('FUI/FURC-SP-18-BCSE-011', 8, 0),
('FUI/FURC-SP-18-BCSE-012', 6, 0),
('FUI/FURC-SP-18-BCSE-012', 7, 0),
('FUI/FURC-SP-18-BCSE-012', 8, 0),
('FUI/FURC-SP-18-BCSE-018', 6, 3),
('FUI/FURC-SP-18-BCSE-018', 7, 3),
('FUI/FURC-SP-18-BCSE-018', 8, 4),
('FUI/FURC-SP-18-BCSE-037', 6, 0),
('FUI/FURC-SP-18-BCSE-037', 7, 0),
('FUI/FURC-SP-18-BCSE-037', 8, 0),
('FUI/FURC-SP-18-BCSE-039', 6, 0),
('FUI/FURC-SP-18-BCSE-039', 7, 0),
('FUI/FURC-SP-18-BCSE-039', 8, 0),
('FUI/FURC-SP-18-BCSE-040', 6, 0),
('FUI/FURC-SP-18-BCSE-040', 7, 0),
('FUI/FURC-SP-18-BCSE-040', 8, 0),
('FUI/FURC-SP-18-BCSE-001', 81, 0),
('FUI/FURC-SP-18-BCSE-002', 81, 0),
('FUI/FURC-SP-18-BCSE-011', 81, 0),
('FUI/FURC-SP-18-BCSE-012', 81, 0),
('FUI/FURC-SP-18-BCSE-018', 81, 10),
('FUI/FURC-SP-18-BCSE-037', 81, 0),
('FUI/FURC-SP-18-BCSE-039', 81, 0),
('FUI/FURC-SP-18-BCSE-040', 81, 0),
('FUI/FURC-SP-18-BCSE-001', 96, 3),
('FUI/FURC-SP-18-BCSE-001', 97, 3),
('FUI/FURC-SP-18-BCSE-001', 98, 3),
('FUI/FURC-SP-18-BCSE-002', 96, 0),
('FUI/FURC-SP-18-BCSE-002', 97, 0),
('FUI/FURC-SP-18-BCSE-002', 98, 0),
('FUI/FURC-SP-18-BCSE-011', 96, 0),
('FUI/FURC-SP-18-BCSE-011', 97, 0),
('FUI/FURC-SP-18-BCSE-011', 98, 0),
('FUI/FURC-SP-18-BCSE-012', 96, 0),
('FUI/FURC-SP-18-BCSE-012', 97, 0),
('FUI/FURC-SP-18-BCSE-012', 98, 0),
('FUI/FURC-SP-18-BCSE-018', 96, 3),
('FUI/FURC-SP-18-BCSE-018', 97, 3),
('FUI/FURC-SP-18-BCSE-018', 98, 4),
('FUI/FURC-SP-18-BCSE-037', 96, 0),
('FUI/FURC-SP-18-BCSE-037', 97, 0),
('FUI/FURC-SP-18-BCSE-037', 98, 0),
('FUI/FURC-SP-18-BCSE-039', 96, 0),
('FUI/FURC-SP-18-BCSE-039', 97, 0),
('FUI/FURC-SP-18-BCSE-039', 98, 0),
('FUI/FURC-SP-18-BCSE-040', 96, 0),
('FUI/FURC-SP-18-BCSE-040', 97, 0),
('FUI/FURC-SP-18-BCSE-040', 98, 0),
('FUI/FURC-SP-18-BCSE-001', 9, 0),
('FUI/FURC-SP-18-BCSE-001', 10, 0),
('FUI/FURC-SP-18-BCSE-002', 9, 0),
('FUI/FURC-SP-18-BCSE-002', 10, 0),
('FUI/FURC-SP-18-BCSE-012', 9, 0),
('FUI/FURC-SP-18-BCSE-012', 10, 0),
('FUI/FURC-SP-18-BCSE-037', 9, 0),
('FUI/FURC-SP-18-BCSE-037', 10, 0),
('FUI/FURC-SP-18-BCSE-039', 9, 0),
('FUI/FURC-SP-18-BCSE-039', 10, 0),
('FUI/FURC-SP-18-BCSE-040', 9, 0),
('FUI/FURC-SP-18-BCSE-040', 10, 0),
('FUI/FURC-SP-18-BCSE-001', 11, 0),
('FUI/FURC-SP-18-BCSE-001', 95, 0),
('FUI/FURC-SP-18-BCSE-002', 11, 0),
('FUI/FURC-SP-18-BCSE-002', 95, 0),
('FUI/FURC-SP-18-BCSE-011', 11, 0),
('FUI/FURC-SP-18-BCSE-011', 95, 0),
('FUI/FURC-SP-18-BCSE-012', 11, 0),
('FUI/FURC-SP-18-BCSE-012', 95, 0),
('FUI/FURC-SP-18-BCSE-018', 11, 10),
('FUI/FURC-SP-18-BCSE-018', 95, 5),
('FUI/FURC-SP-18-BCSE-037', 11, 0),
('FUI/FURC-SP-18-BCSE-037', 95, 0),
('FUI/FURC-SP-18-BCSE-039', 11, 0),
('FUI/FURC-SP-18-BCSE-039', 95, 0),
('FUI/FURC-SP-18-BCSE-040', 11, 0),
('FUI/FURC-SP-18-BCSE-040', 95, 0),
('FUI/FURC-SP-18-BCSE-001', 12, 0),
('FUI/FURC-SP-18-BCSE-001', 13, 0),
('FUI/FURC-SP-18-BCSE-001', 14, 0),
('FUI/FURC-SP-18-BCSE-002', 12, 0),
('FUI/FURC-SP-18-BCSE-002', 13, 0),
('FUI/FURC-SP-18-BCSE-002', 14, 0),
('FUI/FURC-SP-18-BCSE-011', 12, 0),
('FUI/FURC-SP-18-BCSE-011', 13, 0),
('FUI/FURC-SP-18-BCSE-011', 14, 0),
('FUI/FURC-SP-18-BCSE-012', 12, 0),
('FUI/FURC-SP-18-BCSE-012', 13, 0),
('FUI/FURC-SP-18-BCSE-012', 14, 0),
('FUI/FURC-SP-18-BCSE-018', 12, 3),
('FUI/FURC-SP-18-BCSE-018', 13, 3),
('FUI/FURC-SP-18-BCSE-018', 14, 4),
('FUI/FURC-SP-18-BCSE-037', 12, 0),
('FUI/FURC-SP-18-BCSE-037', 13, 0),
('FUI/FURC-SP-18-BCSE-037', 14, 0),
('FUI/FURC-SP-18-BCSE-039', 12, 0),
('FUI/FURC-SP-18-BCSE-039', 13, 0),
('FUI/FURC-SP-18-BCSE-039', 14, 0),
('FUI/FURC-SP-18-BCSE-040', 12, 0),
('FUI/FURC-SP-18-BCSE-040', 13, 0),
('FUI/FURC-SP-18-BCSE-040', 14, 0),
('FUI/FURC-SP-18-BCSE-001', 80, 0),
('FUI/FURC-SP-18-BCSE-002', 80, 0),
('FUI/FURC-SP-18-BCSE-011', 80, 0),
('FUI/FURC-SP-18-BCSE-012', 80, 0),
('FUI/FURC-SP-18-BCSE-018', 80, 10),
('FUI/FURC-SP-18-BCSE-037', 80, 0),
('FUI/FURC-SP-18-BCSE-039', 80, 0),
('FUI/FURC-SP-18-BCSE-040', 80, 0),
('FUI/FURC-SP-18-BCSE-001', 99, 10),
('FUI/FURC-SP-18-BCSE-002', 99, 12),
('FUI/FURC-SP-18-BCSE-011', 99, 4),
('FUI/FURC-SP-18-BCSE-012', 99, 5),
('FUI/FURC-SP-18-BCSE-018', 99, 12),
('FUI/FURC-SP-18-BCSE-037', 99, 8),
('FUI/FURC-SP-18-BCSE-039', 99, 9),
('FUI/FURC-SP-18-BCSE-040', 99, 12),
('FUI/FURC-SP-18-BCSE-001', 100, 50),
('FUI/FURC-SP-18-BCSE-002', 100, 50),
('FUI/FURC-SP-18-BCSE-011', 100, 50),
('FUI/FURC-SP-18-BCSE-012', 100, 50),
('FUI/FURC-SP-18-BCSE-018', 100, 50),
('FUI/FURC-SP-18-BCSE-037', 100, 50),
('FUI/FURC-SP-18-BCSE-039', 100, 50),
('FUI/FURC-SP-18-BCSE-040', 100, 50),
('FUI/FURC-SP-18-BCSE-001', 101, 25),
('FUI/FURC-SP-18-BCSE-002', 101, 25),
('FUI/FURC-SP-18-BCSE-011', 101, 25),
('FUI/FURC-SP-18-BCSE-012', 101, 25),
('FUI/FURC-SP-18-BCSE-018', 101, 25),
('FUI/FURC-SP-18-BCSE-037', 101, 20),
('FUI/FURC-SP-18-BCSE-039', 101, 20),
('FUI/FURC-SP-18-BCSE-040', 101, 20);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentstudentmarks`
--

CREATE TABLE `assessmentstudentmarks` (
  `studentRegCode` varchar(30) NOT NULL,
  `assessmentCode` int(11) NOT NULL,
  `totalObtainedMarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessmentstudentmarks`
--

INSERT INTO `assessmentstudentmarks` (`studentRegCode`, `assessmentCode`, `totalObtainedMarks`) VALUES
('FUI/FURC-SP-18-BCSE-018', 1, 3),
('FUI/FURC-SP-18-BCSE-018', 4, 4),
('FUI/FURC-SP-18-BCSE-011', 4, 10),
('FUI/FURC-SP-18-BCSE-011', 38, 49),
('FUI/FURC-SP-18-BCSE-018', 38, 50),
('FUI/FURC-SP-18-BCSE-011', 40, 20),
('FUI/FURC-SP-18-BCSE-018', 40, 20),
('FUI/FURC-SP-18-BCSE-011', 41, 10),
('FUI/FURC-SP-18-BCSE-018', 41, 10),
('FUI/FURC-SP-18-BCSE-011', 48, 10),
('FUI/FURC-SP-18-BCSE-018', 48, 10),
('FUI/FURC-SP-18-BCSE-011', 47, 10),
('FUI/FURC-SP-18-BCSE-018', 47, 10),
('FUI/FURC-SP-18-BCSE-011', 49, 12),
('FUI/FURC-SP-18-BCSE-018', 49, 10),
('FUI/FURC-SP-18-BCSE-011', 44, 15),
('FUI/FURC-SP-18-BCSE-018', 44, 15),
('FUI/FURC-SP-18-BCSE-011', 50, 10),
('FUI/FURC-SP-18-BCSE-018', 50, 10),
('FUI/FURC-SP-18-BCSE-012', 50, 10),
('FUI/FURC-SP-18-BCSE-037', 50, 10),
('FUI/FURC-SP-18-BCSE-039', 50, 10),
('FUI/FURC-SP-18-BCSE-040', 50, 10),
('FUI/FURC-SP-18-BCSE-041', 55, 20),
('FUI/FURC-SP-18-BCSE-042', 55, 24),
('FUI/FURC-SP-18-BCSE-043', 55, 20),
('FUI/FURC-SP-18-BCSE-044', 55, 20),
('FUI/FURC-SP-18-BCSE-045', 55, 20),
('FUI/FURC-SP-18-BCSE-046', 55, 11),
('FUI/FURC-SP-18-BCSE-047', 55, 18),
('FUI/FURC-SP-18-BCSE-048', 55, 18),
('FUI/FURC-SP-18-BCSE-001', 56, 25),
('FUI/FURC-SP-18-BCSE-002', 56, 10),
('FUI/FURC-SP-18-BCSE-011', 56, 25),
('FUI/FURC-SP-18-BCSE-012', 56, 10),
('FUI/FURC-SP-18-BCSE-018', 56, 25),
('FUI/FURC-SP-18-BCSE-037', 56, 10),
('FUI/FURC-SP-18-BCSE-039', 56, 25),
('FUI/FURC-SP-18-BCSE-040', 56, 10),
('FUI/FURC-SP-18-BCSE-041', 54, 12),
('FUI/FURC-SP-18-BCSE-042', 54, 12),
('FUI/FURC-SP-18-BCSE-043', 54, 12),
('FUI/FURC-SP-18-BCSE-044', 54, 12),
('FUI/FURC-SP-18-BCSE-045', 54, 12),
('FUI/FURC-SP-18-BCSE-046', 54, 12),
('FUI/FURC-SP-18-BCSE-047', 54, 12),
('FUI/FURC-SP-18-BCSE-048', 54, 12),
('FUI/FURC-SP-18-BCSE-001', 3, 0),
('FUI/FURC-SP-18-BCSE-002', 3, 0),
('FUI/FURC-SP-18-BCSE-011', 3, 0),
('FUI/FURC-SP-18-BCSE-012', 3, 0),
('FUI/FURC-SP-18-BCSE-018', 3, 10),
('FUI/FURC-SP-18-BCSE-037', 3, 0),
('FUI/FURC-SP-18-BCSE-039', 3, 0),
('FUI/FURC-SP-18-BCSE-040', 3, 0),
('FUI/FURC-SP-18-BCSE-001', 1, 0),
('FUI/FURC-SP-18-BCSE-002', 1, 0),
('FUI/FURC-SP-18-BCSE-011', 1, 0),
('FUI/FURC-SP-18-BCSE-012', 1, 0),
('FUI/FURC-SP-18-BCSE-037', 1, 0),
('FUI/FURC-SP-18-BCSE-039', 1, 0),
('FUI/FURC-SP-18-BCSE-040', 1, 0),
('FUI/FURC-SP-18-BCSE-001', 46, 0),
('FUI/FURC-SP-18-BCSE-002', 46, 0),
('FUI/FURC-SP-18-BCSE-011', 46, 0),
('FUI/FURC-SP-18-BCSE-012', 46, 0),
('FUI/FURC-SP-18-BCSE-018', 46, 10),
('FUI/FURC-SP-18-BCSE-037', 46, 0),
('FUI/FURC-SP-18-BCSE-039', 46, 0),
('FUI/FURC-SP-18-BCSE-040', 46, 0),
('FUI/FURC-SP-18-BCSE-001', 57, 9),
('FUI/FURC-SP-18-BCSE-002', 57, 0),
('FUI/FURC-SP-18-BCSE-011', 57, 0),
('FUI/FURC-SP-18-BCSE-012', 57, 0),
('FUI/FURC-SP-18-BCSE-018', 57, 10),
('FUI/FURC-SP-18-BCSE-037', 57, 0),
('FUI/FURC-SP-18-BCSE-039', 57, 0),
('FUI/FURC-SP-18-BCSE-040', 57, 0),
('FUI/FURC-SP-18-BCSE-001', 4, 0),
('FUI/FURC-SP-18-BCSE-002', 4, 0),
('FUI/FURC-SP-18-BCSE-012', 4, 0),
('FUI/FURC-SP-18-BCSE-037', 4, 0),
('FUI/FURC-SP-18-BCSE-039', 4, 0),
('FUI/FURC-SP-18-BCSE-040', 4, 0),
('FUI/FURC-SP-18-BCSE-001', 5, 0),
('FUI/FURC-SP-18-BCSE-002', 5, 0),
('FUI/FURC-SP-18-BCSE-011', 5, 0),
('FUI/FURC-SP-18-BCSE-012', 5, 0),
('FUI/FURC-SP-18-BCSE-018', 5, 15),
('FUI/FURC-SP-18-BCSE-037', 5, 0),
('FUI/FURC-SP-18-BCSE-039', 5, 0),
('FUI/FURC-SP-18-BCSE-040', 5, 0),
('FUI/FURC-SP-18-BCSE-001', 6, 0),
('FUI/FURC-SP-18-BCSE-002', 6, 0),
('FUI/FURC-SP-18-BCSE-011', 6, 0),
('FUI/FURC-SP-18-BCSE-012', 6, 0),
('FUI/FURC-SP-18-BCSE-018', 6, 10),
('FUI/FURC-SP-18-BCSE-037', 6, 0),
('FUI/FURC-SP-18-BCSE-039', 6, 0),
('FUI/FURC-SP-18-BCSE-040', 6, 0),
('FUI/FURC-SP-18-BCSE-001', 45, 0),
('FUI/FURC-SP-18-BCSE-002', 45, 0),
('FUI/FURC-SP-18-BCSE-011', 45, 0),
('FUI/FURC-SP-18-BCSE-012', 45, 0),
('FUI/FURC-SP-18-BCSE-018', 45, 10),
('FUI/FURC-SP-18-BCSE-037', 45, 0),
('FUI/FURC-SP-18-BCSE-039', 45, 0),
('FUI/FURC-SP-18-BCSE-040', 45, 0),
('FUI/FURC-SP-18-BCSE-001', 58, 10),
('FUI/FURC-SP-18-BCSE-002', 58, 12),
('FUI/FURC-SP-18-BCSE-011', 58, 4),
('FUI/FURC-SP-18-BCSE-012', 58, 5),
('FUI/FURC-SP-18-BCSE-018', 58, 12),
('FUI/FURC-SP-18-BCSE-037', 58, 8),
('FUI/FURC-SP-18-BCSE-039', 58, 9),
('FUI/FURC-SP-18-BCSE-040', 58, 12),
('FUI/FURC-SP-18-BCSE-001', 59, 50),
('FUI/FURC-SP-18-BCSE-002', 59, 50),
('FUI/FURC-SP-18-BCSE-011', 59, 50),
('FUI/FURC-SP-18-BCSE-012', 59, 50),
('FUI/FURC-SP-18-BCSE-018', 59, 50),
('FUI/FURC-SP-18-BCSE-037', 59, 50),
('FUI/FURC-SP-18-BCSE-039', 59, 50),
('FUI/FURC-SP-18-BCSE-040', 59, 50),
('FUI/FURC-SP-18-BCSE-001', 60, 25),
('FUI/FURC-SP-18-BCSE-002', 60, 25),
('FUI/FURC-SP-18-BCSE-011', 60, 25),
('FUI/FURC-SP-18-BCSE-012', 60, 25),
('FUI/FURC-SP-18-BCSE-018', 60, 25),
('FUI/FURC-SP-18-BCSE-037', 60, 20),
('FUI/FURC-SP-18-BCSE-039', 60, 20),
('FUI/FURC-SP-18-BCSE-040', 60, 20);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `programCode` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `seasonCode` int(11) DEFAULT NULL,
  `batchName` varchar(30) DEFAULT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchCode`, `curriculumCode`, `programCode`, `year`, `seasonCode`, `batchName`, `dateCreated`) VALUES
(1, 1, 1, 2015, 14, 'SP15', '2015-02-21'),
(2, 1, 1, 2015, 13, 'FA15', '2015-09-01'),
(3, 1, 1, 2016, 4, 'SP16', '2016-02-21'),
(4, 1, 1, 2016, 3, 'FA16', '2016-09-01'),
(5, 1, 1, 2017, 6, 'SP17', '2017-02-21'),
(6, 1, 1, 2017, 5, 'FA17', '2017-09-01'),
(7, 1, 1, 2018, 1, 'SP18', '2018-02-21'),
(8, 1, 1, 2018, 7, 'FA18', '2018-09-01'),
(9, 1, 1, 2019, 9, 'SP19', '2019-02-21'),
(10, 1, 1, 2019, 8, 'FA19', '2019-09-01'),
(11, 1, 1, 2020, 10, 'SP20', '2020-02-21'),
(12, 2, 2, 2020, 2, 'FA20', '2020-09-01'),
(13, 2, 1, 2020, 2, 'FA20', '2020-09-01'),
(14, 2, 1, 2021, 12, 'SP21', '2021-02-21'),
(15, 1, 3, 2021, 11, 'FA21', '2021-09-01'),
(16, 2, 1, 2021, 11, 'FA21', '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `clo`
--

CREATE TABLE `clo` (
  `CLOCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `programCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `cloName` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `domain` varchar(30) NOT NULL,
  `btLevel` varchar(20) NOT NULL,
  `batchCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo`
--

INSERT INTO `clo` (`CLOCode`, `curriculumCode`, `programCode`, `courseCode`, `cloName`, `description`, `domain`, `btLevel`, `batchCode`) VALUES
(1, 1, 1, 'SEN-32', 'CLO-1', 'Handwriting', 'ABC', '4', 7),
(2, 1, 1, 'SEN-32', 'CLO-2', 'Speaking', 'DEF', '2', 7),
(3, 1, 1, 'SEN-32', 'CLO-3', 'Blah', 'ABC', '1', 7),
(4, 1, 1, 'SEN-32', 'CLO-4', 'Blah', 'DEF', '3', 7),
(5, 1, 1, 'SEN-33', 'CLO-1', 'Listening', 'ABC', '2', 7),
(6, 1, 1, 'SEN-33', 'CLO-2', 'Speaking', 'ABC', '2', 7),
(7, 1, 1, 'SEN-33', 'CLO-3', 'Blah', 'ABC', '1', 7),
(8, 1, 1, 'SEN-33', 'CLO-4', 'Blah', 'ABC', '1', 7),
(9, 1, 1, 'SEN-33', 'CLO-1', 'Blah', 'ABC', '1', 6),
(10, 1, 1, 'SEN-33', 'CLO-2', 'Blah', 'ABC', '1', 6),
(11, 1, 1, 'SEN-28', 'CLO-1', 'Blah', 'ABC', '1', 7),
(12, 1, 1, 'SEN-28', 'CLO-2', 'Blah', 'ABC', '1', 7),
(13, 1, 1, 'SEN-29', 'CLO-1', 'Blah', 'ABC', '1', 7),
(14, 1, 1, 'SEN-29', 'CLO-2', 'Blah', 'ABC', '1', 7),
(15, 1, 1, 'SEN-29', 'CLO-3', 'Blah', 'ABC', '1', 7),
(16, 1, 1, 'SEN-30', 'CLO-1', 'Blah', 'ABC', '1', 7),
(17, 1, 1, 'SEN-30', 'CLO-2', 'Blah', 'ABC', '1', 7),
(18, 1, 1, 'SEN-31', 'CLO-1', 'Blah', 'ABC', '1', 7),
(19, 1, 1, 'SEN-31', 'CLO-2', 'Blah', 'ABC', '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `clotoplomapping`
--

CREATE TABLE `clotoplomapping` (
  `PLOCode` int(11) NOT NULL,
  `CLOCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clotoplomapping`
--

INSERT INTO `clotoplomapping` (`PLOCode`, `CLOCode`) VALUES
(1, 1),
(2, 2),
(4, 3),
(10, 4),
(10, 5),
(10, 8),
(10, 10),
(8, 11),
(10, 12),
(10, 13),
(7, 14),
(10, 15),
(10, 14),
(12, 14),
(1, 16),
(2, 17),
(3, 18),
(4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `programCode` int(11) NOT NULL,
  `courseTitle` varchar(40) NOT NULL,
  `creditHours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `programCode`, `courseTitle`, `creditHours`) VALUES
('SEN-28', 1, 'Kotlin', 3),
('SEN-29', 1, 'Android', 3),
('SEN-30', 1, 'Artificial Intelligence', 3),
('SEN-31', 1, 'Programming Fundamentals', 3),
('SEN-32', 1, 'Data Structures', 3),
('SEN-33', 1, 'Discrete Mathematics', 3),
('SEN-34', 1, 'Algorithm Analysis', 3);

-- --------------------------------------------------------

--
-- Table structure for table `courseallocation`
--

CREATE TABLE `courseallocation` (
  `allocationCode` int(11) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `courseCode` varchar(30) DEFAULT NULL,
  `seasonCode` int(11) NOT NULL,
  `offeringCode` int(11) NOT NULL,
  `monthModified` date NOT NULL,
  `programCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseallocation`
--

INSERT INTO `courseallocation` (`allocationCode`, `batchCode`, `courseCode`, `seasonCode`, `offeringCode`, `monthModified`, `programCode`) VALUES
(1, 7, 'SEN-30', 1, 1, '2021-01-20', 1),
(2, 7, 'SEN-31', 1, 1, '2021-01-20', 1),
(4, 7, 'SEN-32', 14, 3, '2021-09-20', 1),
(5, 7, 'SEN-33', 14, 3, '2021-09-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseoffered`
--

CREATE TABLE `courseoffered` (
  `offeringCode` int(11) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseoffered`
--

INSERT INTO `courseoffered` (`offeringCode`, `courseCode`) VALUES
(1, 'SEN-30'),
(1, 'SEN-31'),
(3, 'SEN-32'),
(3, 'SEN-33'),
(2, 'SEN-28'),
(2, 'SEN-29');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffering`
--

CREATE TABLE `courseoffering` (
  `offeringCode` int(11) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `seasonCode` int(11) NOT NULL,
  `monthModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseoffering`
--

INSERT INTO `courseoffering` (`offeringCode`, `semesterCode`, `curriculumCode`, `batchCode`, `seasonCode`, `monthModified`) VALUES
(1, 28, 1, 7, 12, '2020-09-20'),
(2, 35, 1, 7, 13, '2021-03-20'),
(3, 42, 1, 7, 14, '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `courseprofile`
--

CREATE TABLE `courseprofile` (
  `courseProfileCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `programCode` int(11) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `courseTitle` varchar(40) NOT NULL,
  `creditHours` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `programName` varchar(50) NOT NULL,
  `programLevel` varchar(20) NOT NULL,
  `coordinatingUnit` varchar(30) NOT NULL,
  `teachingMethodology` varchar(100) NOT NULL,
  `courseModel` varchar(50) NOT NULL,
  `recommendedBooks` varchar(200) DEFAULT NULL,
  `referenceBooks` varchar(200) DEFAULT NULL,
  `courseDescription` varchar(500) NOT NULL,
  `otherReferences` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofile`
--

INSERT INTO `courseprofile` (`courseProfileCode`, `courseCode`, `programCode`, `batchCode`, `courseTitle`, `creditHours`, `semester`, `programName`, `programLevel`, `coordinatingUnit`, `teachingMethodology`, `courseModel`, `recommendedBooks`, `referenceBooks`, `courseDescription`, `otherReferences`) VALUES
(1, 'SEN-32', 1, 7, 'Programming Fundamentals', 3, 2, 'BCSE', 'Undergraduate', 'ABC', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2'),
(2, 'SEN-33', 1, 7, 'Discrete Mathematics', 3, 1, 'BCE', 'Undergraduate', 'ABC', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2');

-- --------------------------------------------------------

--
-- Table structure for table `courseprofileassessmentinstruments`
--

CREATE TABLE `courseprofileassessmentinstruments` (
  `courseProfileCode` int(11) NOT NULL,
  `quizWeightage` int(11) NOT NULL,
  `assignmentWeightage` int(11) NOT NULL,
  `projectWeightage` int(11) NOT NULL,
  `midtermWeightage` int(11) NOT NULL,
  `finalExamWeightage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofileassessmentinstruments`
--

INSERT INTO `courseprofileassessmentinstruments` (`courseProfileCode`, `quizWeightage`, `assignmentWeightage`, `projectWeightage`, `midtermWeightage`, `finalExamWeightage`) VALUES
(1, 5, 10, 10, 25, 50),
(2, 5, 10, 10, 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `courseprofileinstructordetail`
--

CREATE TABLE `courseprofileinstructordetail` (
  `courseProfileCode` int(11) NOT NULL,
  `instructorName` varchar(40) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `qualification` varchar(150) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `personalEmail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofileinstructordetail`
--

INSERT INTO `courseprofileinstructordetail` (`courseProfileCode`, `instructorName`, `designation`, `qualification`, `specialization`, `contactNumber`, `personalEmail`) VALUES
(1, 'M.Asif', 'Professor', 'Phd', 'Android Application Development', '0312-2547861', 'masif@gmail.com'),
(2, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration` (
  `courseRegistrationCode` int(11) NOT NULL,
  `studentRegCode` varchar(30) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `offeringCode` int(11) NOT NULL,
  `totalCredits` int(11) NOT NULL,
  `freshCredits` int(11) NOT NULL,
  `remarks` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`courseRegistrationCode`, `studentRegCode`, `semesterCode`, `offeringCode`, `totalCredits`, `freshCredits`, `remarks`) VALUES
(1, 'FUI/FURC-SP-18-BCSE-011', 35, 2, 10, 6, 'Excellent'),
(2, 'FUI/FURC-SP-18-BCSE-018', 42, 3, 12, 6, 'Excellent'),
(3, 'FUI/FURC-SP-18-BCSE-011', 42, 3, 8, 8, 'Excellent'),
(6, 'FUI/FURC-SP-18-BCSE-012', 42, 3, 12, 12, 'Excellent'),
(8, 'FUI/FURC-SP-18-BCSE-037', 42, 3, 12, 12, 'Excellent'),
(9, 'FUI/FURC-SP-18-BCSE-039', 42, 3, 12, 12, 'Excellent'),
(10, 'FUI/FURC-SP-18-BCSE-040', 42, 3, 12, 12, 'Excellent'),
(11, 'FUI/FURC-SP-18-BCSE-002', 42, 3, 12, 12, 'Excellent'),
(12, 'FUI/FURC-SP-18-BCSE-001', 42, 3, 12, 12, 'Excellent'),
(14, 'FUI/FURC-SP-18-BCSE-041', 42, 3, 12, 12, 'Excellent'),
(15, 'FUI/FURC-SP-18-BCSE-042', 42, 3, 12, 12, 'Excellent'),
(16, 'FUI/FURC-SP-18-BCSE-043', 42, 3, 12, 12, 'Excellent'),
(17, 'FUI/FURC-SP-18-BCSE-044', 42, 3, 12, 12, 'Excellent'),
(18, 'FUI/FURC-SP-18-BCSE-045', 42, 3, 12, 12, 'Excellent'),
(19, 'FUI/FURC-SP-18-BCSE-046', 42, 3, 12, 12, 'Excellent'),
(20, 'FUI/FURC-SP-18-BCSE-047', 42, 3, 12, 12, 'Excellent'),
(22, 'FUI/FURC-SP-18-BCSE-047', 28, 1, 12, 12, 'Excellent'),
(23, 'FUI/FURC-SP-18-BCSE-046', 28, 1, 12, 12, 'Excellent'),
(24, 'FUI/FURC-SP-18-BCSE-045', 28, 1, 12, 12, 'Excellent'),
(25, 'FUI/FURC-SP-18-BCSE-044', 28, 1, 12, 12, 'Excellent'),
(26, 'FUI/FURC-SP-18-BCSE-043', 28, 1, 12, 12, 'Excellent'),
(27, 'FUI/FURC-SP-18-BCSE-042', 28, 1, 12, 12, 'Excellent'),
(28, 'FUI/FURC-SP-18-BCSE-041', 28, 1, 12, 12, 'Excellent'),
(29, 'FUI/FURC-SP-18-BCSE-001', 28, 1, 12, 12, 'Excellent'),
(30, 'FUI/FURC-SP-18-BCSE-002', 28, 1, 12, 12, 'Excellent'),
(31, 'FUI/FURC-SP-18-BCSE-040', 28, 1, 12, 12, 'Excellent'),
(32, 'FUI/FURC-SP-18-BCSE-039', 28, 1, 12, 12, 'Excellent'),
(33, 'FUI/FURC-SP-18-BCSE-037', 28, 1, 12, 12, 'Excellent'),
(34, 'FUI/FURC-SP-18-BCSE-012', 28, 1, 12, 12, 'Excellent'),
(35, 'FUI/FURC-SP-18-BCSE-018', 28, 1, 12, 6, 'Excellent'),
(36, 'FUI/FURC-SP-18-BCSE-048', 28, 1, 12, 12, 'Excellent'),
(37, 'FUI/FURC-SP-18-BCSE-048', 35, 2, 12, 12, 'Excellent'),
(38, 'FUI/FURC-SP-18-BCSE-047', 35, 2, 12, 12, 'Excellent'),
(39, 'FUI/FURC-SP-18-BCSE-046', 35, 2, 12, 12, 'Excellent'),
(40, 'FUI/FURC-SP-18-BCSE-045', 35, 2, 12, 12, 'Excellent'),
(41, 'FUI/FURC-SP-18-BCSE-044', 35, 2, 12, 12, 'Excellent'),
(42, 'FUI/FURC-SP-18-BCSE-043', 35, 2, 12, 12, 'Excellent'),
(43, 'FUI/FURC-SP-18-BCSE-042', 35, 2, 12, 12, 'Excellent'),
(44, 'FUI/FURC-SP-18-BCSE-041', 35, 2, 12, 12, 'Excellent'),
(45, 'FUI/FURC-SP-18-BCSE-001', 35, 2, 12, 12, 'Excellent'),
(46, 'FUI/FURC-SP-18-BCSE-002', 35, 2, 12, 12, 'Excellent'),
(47, 'FUI/FURC-SP-18-BCSE-040', 35, 2, 12, 12, 'Excellent'),
(48, 'FUI/FURC-SP-18-BCSE-039', 35, 2, 12, 12, 'Excellent'),
(49, 'FUI/FURC-SP-18-BCSE-037', 35, 2, 12, 12, 'Excellent'),
(50, 'FUI/FURC-SP-18-BCSE-012', 35, 2, 12, 12, 'Excellent'),
(51, 'FUI/FURC-SP-18-BCSE-018', 35, 2, 12, 6, 'Excellent'),
(52, 'FUI/FURC-SP-18-BCSE-048', 35, 2, 12, 12, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculumCode` int(11) NOT NULL,
  `curriculumYear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculumCode`, `curriculumYear`) VALUES
(1, 2018),
(2, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentCode` int(11) NOT NULL,
  `departmentName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentCode`, `departmentName`) VALUES
(1, 'Engineering and IT'),
(2, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyCode` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `CNIC` varchar(20) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `personalEmail` varchar(30) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `picture` blob NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `additionalResponsibility` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `departmentCode` int(11) DEFAULT NULL,
  `showEmail` tinyint(1) DEFAULT NULL,
  `additionalPassword` varchar(30) DEFAULT NULL,
  `additionalEmail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyCode`, `name`, `CNIC`, `officialEmail`, `personalEmail`, `address`, `contactNumber`, `picture`, `designation`, `additionalResponsibility`, `password`, `departmentCode`, `showEmail`, `additionalPassword`, `additionalEmail`) VALUES
('FUI-FURC-056', 'Dr. M. Aqeel Iqbal', '37401-5859968-5', 'maqeelIqbal@fui.edu.pk', 'maqeelIqbal@hotmail.com', 'Somewhere on earth', '0312-4589635', 0xefbbbf, 'Assistant Professor', NULL, '123456789', 1, 1, NULL, NULL),
('FUI-FURC-057', 'Dr. Shariq', '37401-5859968-6', 'shariq@fui.edu.pk', 'shariq@fui.edu.pk', 'Somewhere on earth', '0312-4653456', 0xefbbbf, 'Assistant Professor', 'Head of Department', '123456789', 1, 1, '123456789', 'hodse@fui.edu.pk');

-- --------------------------------------------------------

--
-- Table structure for table `facultyallocations`
--

CREATE TABLE `facultyallocations` (
  `facultyCode` varchar(30) NOT NULL,
  `allocationCode` int(11) NOT NULL,
  `monthModified` date NOT NULL,
  `seasonCode` int(11) DEFAULT NULL,
  `sectionCode` int(11) NOT NULL,
  `facultyAllocationsCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultyallocations`
--

INSERT INTO `facultyallocations` (`facultyCode`, `allocationCode`, `monthModified`, `seasonCode`, `sectionCode`, `facultyAllocationsCode`) VALUES
('FUI-FURC-056', 1, '2021-01-20', 1, 2, 1),
('FUI-FURC-056', 2, '2021-01-20', 1, 2, 2),
('FUI-FURC-056', 4, '2021-09-20', 14, 7, 3),
('FUI-FURC-056', 5, '2021-09-19', 14, 8, 4),
('FUI-FURC-056', 5, '2021-09-19', 14, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `plo`
--

CREATE TABLE `plo` (
  `PLOCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `programCode` int(11) NOT NULL,
  `ploName` varchar(10) NOT NULL,
  `ploDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plo`
--

INSERT INTO `plo` (`PLOCode`, `curriculumCode`, `programCode`, `ploName`, `ploDescription`) VALUES
(1, 1, 1, 'PLO-1', 'ABCDEFGHIJKL'),
(2, 1, 1, 'PLO-2', 'ABCDEFGHIJKL'),
(3, 1, 1, 'PLO-3', 'ABCDEFGHIJKL'),
(4, 1, 1, 'PLO-4', 'ABCDEFGHIJKL'),
(5, 1, 1, 'PLO-5', 'ABCDEFGHIJKL'),
(6, 1, 1, 'PLO-6', 'ABCDEFGHIJKL'),
(7, 1, 1, 'PLO-7', 'ABCDEFGHIJKL'),
(8, 1, 1, 'PLO-8', 'ABCDEFGHIJKL'),
(9, 1, 1, 'PLO-9', 'ABCDEFGHIJKL'),
(10, 1, 1, 'PLO-10', 'ABCDEFGHIJKL'),
(11, 1, 1, 'PLO-11', 'ABCDEFGHIJKL'),
(12, 1, 1, 'PLO-12', 'ABCDEFGHIJKL'),
(13, 1, 2, 'PLO-1', 'ABCDEFGHIJKL'),
(14, 1, 2, 'PLO-2', 'ABCDEFGHIJKL'),
(15, 1, 2, 'PLO-3', 'ABCDEFGHIJKL'),
(16, 1, 2, 'PLO-4', 'ABCDEFGHIJKL'),
(17, 1, 2, 'PLO-5', 'ABCDEFGHIJKL'),
(18, 1, 2, 'PLO-6', 'ABCDEFGHIJKL');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE `prerequisites` (
  `courseCode` varchar(10) NOT NULL,
  `preRequisiteName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`courseCode`, `preRequisiteName`) VALUES
('SEN-30', 'Object Oriented');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `departmentCode` int(11) NOT NULL,
  `programName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programCode`, `curriculumCode`, `departmentCode`, `programName`) VALUES
(1, 1, 1, 'Bachelors of Computer in Software Engineering'),
(2, 1, 1, 'Bachelors of Computer in Computer Science'),
(3, 1, 2, 'Bachelors in Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `programtranscript`
--

CREATE TABLE `programtranscript` (
  `transcriptCode` int(11) NOT NULL,
  `studentRegCode` varchar(30) NOT NULL,
  `approvalStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programtranscript`
--

INSERT INTO `programtranscript` (`transcriptCode`, `studentRegCode`, `approvalStatus`) VALUES
(1, 'FUI/FURC-SP-18-BCSE-001', 1),
(2, 'FUI/FURC-SP-18-BCSE-002', 1),
(3, 'FUI/FURC-SP-18-BCSE-011', 1),
(4, 'FUI/FURC-SP-18-BCSE-012', 1),
(5, 'FUI/FURC-SP-18-BCSE-018', 1),
(6, 'FUI/FURC-SP-18-BCSE-037', 1),
(7, 'FUI/FURC-SP-18-BCSE-039', 1),
(8, 'FUI/FURC-SP-18-BCSE-040', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registeredcourses`
--

CREATE TABLE `registeredcourses` (
  `courseRegistrationCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeredcourses`
--

INSERT INTO `registeredcourses` (`courseRegistrationCode`, `courseCode`) VALUES
(3, 'SEN-32'),
(3, 'SEN-31'),
(2, 'SEN-32'),
(6, 'SEN-32'),
(8, 'SEN-32'),
(9, 'SEN-32'),
(10, 'SEN-32'),
(11, 'SEN-32'),
(12, 'SEN-32'),
(6, 'SEN-33'),
(8, 'SEN-33'),
(9, 'SEN-33'),
(10, 'SEN-33'),
(11, 'SEN-33'),
(12, 'SEN-33'),
(2, 'SEN-33'),
(14, 'SEN-33'),
(15, 'SEN-33'),
(16, 'SEN-33'),
(17, 'SEN-33'),
(18, 'SEN-33'),
(19, 'SEN-33'),
(20, 'SEN-33'),
(29, 'SEN-30'),
(29, 'SEN-31'),
(30, 'SEN-30'),
(30, 'SEN-31'),
(31, 'SEN-30'),
(31, 'SEN-31'),
(32, 'SEN-30'),
(32, 'SEN-30'),
(33, 'SEN-30'),
(33, 'SEN-31'),
(34, 'SEN-30'),
(34, 'SEN-30'),
(35, 'SEN-30'),
(35, 'SEN-30'),
(45, 'SEN-28'),
(45, 'SEN-29'),
(46, 'SEN-28'),
(46, 'SEN-29'),
(47, 'SEN-28'),
(47, 'SEN-29'),
(48, 'SEN-28'),
(48, 'SEN-29'),
(49, 'SEN-28'),
(49, 'SEN-29'),
(50, 'SEN-28'),
(50, 'SEN-29'),
(51, 'SEN-28'),
(51, 'SEN-29'),
(1, 'SEN-28'),
(1, 'SEN-29');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `seasonCode` int(11) NOT NULL,
  `seasonName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`seasonCode`, `seasonName`) VALUES
(2, 'Fall 15'),
(4, 'Fall 16'),
(6, 'Fall 17'),
(8, 'Fall 180'),
(10, 'Fall 19'),
(12, 'Fall 20'),
(14, 'Fall 21'),
(1, 'Spring 15'),
(3, 'Spring 16'),
(5, 'Spring 17'),
(7, 'Spring 180'),
(9, 'Spring 19'),
(11, 'Spring 20'),
(13, 'Spring 21');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionCode` int(11) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `sectionName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionCode`, `semesterCode`, `sectionName`) VALUES
(1, 28, 'A'),
(2, 28, 'B'),
(3, 28, 'C'),
(4, 35, 'A'),
(5, 35, 'B'),
(6, 35, 'C'),
(7, 42, 'A'),
(8, 42, 'B'),
(9, 42, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterCode` int(11) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `semesterName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterCode`, `batchCode`, `semesterName`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 2, '1'),
(4, 1, '3'),
(5, 2, '2'),
(6, 3, '1'),
(7, 1, '4'),
(8, 2, '3'),
(9, 3, '2'),
(10, 4, '1'),
(11, 1, '5'),
(12, 2, '4'),
(13, 3, '3'),
(14, 4, '2'),
(15, 5, '1'),
(16, 1, '6'),
(17, 2, '5'),
(18, 3, '4'),
(19, 4, '3'),
(20, 5, '2'),
(21, 6, '1'),
(22, 1, '7'),
(23, 2, '6'),
(24, 3, '5'),
(25, 4, '4'),
(26, 5, '3'),
(27, 6, '2'),
(28, 7, '1'),
(29, 1, '8'),
(30, 2, '7'),
(31, 3, '6'),
(32, 4, '5'),
(33, 5, '4'),
(34, 6, '3'),
(35, 7, '2'),
(36, 8, '1'),
(37, 2, '8'),
(38, 3, '7'),
(39, 4, '6'),
(40, 5, '5'),
(41, 6, '4'),
(42, 7, '3'),
(43, 8, '2'),
(44, 9, '1');

-- --------------------------------------------------------

--
-- Table structure for table `semestergpatranscript`
--

CREATE TABLE `semestergpatranscript` (
  `transcriptCode` int(11) NOT NULL,
  `studentRegCode` varchar(30) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `approvalStatus` tinyint(1) NOT NULL,
  `sgpa` float NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestergpatranscript`
--

INSERT INTO `semestergpatranscript` (`transcriptCode`, `studentRegCode`, `semesterCode`, `approvalStatus`, `sgpa`, `cgpa`) VALUES
(1, 'FUI/FURC-SP-18-BCSE-001', 28, 1, 4, 4),
(2, 'FUI/FURC-SP-18-BCSE-002', 28, 1, 4, 4),
(3, 'FUI/FURC-SP-18-BCSE-011', 28, 1, 4, 4),
(4, 'FUI/FURC-SP-18-BCSE-012', 28, 1, 4, 4),
(5, 'FUI/FURC-SP-18-BCSE-018', 28, 1, 4, 4),
(6, 'FUI/FURC-SP-18-BCSE-037', 28, 1, 4, 4),
(7, 'FUI/FURC-SP-18-BCSE-039', 28, 1, 4, 4),
(8, 'FUI/FURC-SP-18-BCSE-040', 28, 1, 4, 4),
(9, 'FUI/FURC-SP-18-BCSE-001', 35, 1, 4, 4),
(10, 'FUI/FURC-SP-18-BCSE-002', 35, 1, 4, 4),
(11, 'FUI/FURC-SP-18-BCSE-011', 35, 1, 4, 4),
(12, 'FUI/FURC-SP-18-BCSE-012', 35, 1, 4, 4),
(13, 'FUI/FURC-SP-18-BCSE-018', 35, 1, 4, 4),
(14, 'FUI/FURC-SP-18-BCSE-037', 35, 1, 4, 4),
(15, 'FUI/FURC-SP-18-BCSE-039', 35, 1, 4, 4),
(16, 'FUI/FURC-SP-18-BCSE-040', 35, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `semestergpatranscriptcourses`
--

CREATE TABLE `semestergpatranscriptcourses` (
  `transcriptCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `marksObtained` float DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `gradePoints` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestergpatranscriptcourses`
--

INSERT INTO `semestergpatranscriptcourses` (`transcriptCode`, `courseCode`, `marksObtained`, `grade`, `gradePoints`) VALUES
(1, 'SEN-30', 90, 'A+', 4),
(1, 'SEN-31', 90, 'A+', 4),
(2, 'SEN-30', 90, 'A+', 4),
(2, 'SEN-31', 90, 'A+', 4),
(3, 'SEN-30', 90, 'A+', 4),
(3, 'SEN-31', 90, 'A+', 4),
(4, 'SEN-30', 90, 'A+', 4),
(4, 'SEN-31', 90, 'A+', 4),
(5, 'SEN-30', 90, 'A+', 4),
(5, 'SEN-31', 90, 'A+', 4),
(6, 'SEN-30', 90, 'A+', 4),
(6, 'SEN-30', 90, 'A+', 4),
(7, 'SEN-30', 90, 'A+', 4),
(7, 'SEN-31', 90, 'A+', 4),
(8, 'SEN-30', 90, 'A+', 4),
(8, 'SEN-31', 90, 'A+', 4),
(9, 'SEN-28', 90, 'A+', 4),
(9, 'SEN-29', 90, 'A+', 4),
(10, 'SEN-28', 90, 'A+', 4),
(10, 'SEN-29', 90, 'A+', 4),
(11, 'SEN-28', 90, 'A+', 4),
(11, 'SEN-29', 90, 'A+', 4),
(12, 'SEN-28', 90, 'A+', 4),
(12, 'SEN-29', 90, 'A+', 4),
(13, 'SEN-28', 90, 'A+', 4),
(13, 'SEN-29', 90, 'A+', 4),
(14, 'SEN-28', 90, 'A+', 4),
(14, 'SEN-29', 90, 'A+', 4),
(15, 'SEN-28', 90, 'A+', 4),
(15, 'SEN-28', 90, 'A+', 4),
(16, 'SEN-28', 90, 'A+', 4),
(16, 'SEN-29', 90, 'A+', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentRegCode` varchar(30) NOT NULL,
  `sectionCode` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `fatherName` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `officialEmail` varchar(30) DEFAULT NULL,
  `personalEmail` varchar(30) DEFAULT NULL,
  `bloodGroup` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `authenticationCode` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentRegCode`, `sectionCode`, `name`, `fatherName`, `contactNumber`, `officialEmail`, `personalEmail`, `bloodGroup`, `address`, `dateOfBirth`, `password`, `authenticationCode`) VALUES
('FUI/FURC-SP-18-BCSE-001', 7, 'Abdul Hannan', 'Tauqeer Ahmed', '0312-1234567', 'iamahannan1@gmail.com', 'iamahannan1@gmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-001'),
('FUI/FURC-SP-18-BCSE-002', 7, 'Abdul Wahab', 'Fazal Ellahi', '0312-7894157', 'iabdulwahab@gmail.com', 'iabdulwahab@hotmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-002'),
('FUI/FURC-SP-18-BCSE-011', 7, 'Fatima', 'Rahim', '0315-2376814', 'fatima2@gmail.com', 'fatima2@gmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-011'),
('FUI/FURC-SP-18-BCSE-012', 7, 'Hafsa Mustafvi', 'Akbar Mustafvi', '0333-7841239', 'hafsaakbar@gmail.com', 'hafsaakbar@gmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-012'),
('FUI/FURC-SP-18-BCSE-018', 7, 'Maleeha Rahim', 'Abdul Rahim', '0315-2376813', 'maliharahim123@gmail.com', 'maliharahim123@gmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-018'),
('FUI/FURC-SP-18-BCSE-037', 7, 'Summan Aziz', 'Anjum Shakeel', '0333-4588666', 'summanaziz@gmail.com', 'summanaziz@gmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-037'),
('FUI/FURC-SP-18-BCSE-039', 7, 'Syed Taqveem Ali Mohsin', 'Syed Mohsin', '0347-4551464', 'syedtaqveem@hotmail.com', 'syedtaqveem@hotmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-039'),
('FUI/FURC-SP-18-BCSE-040', 7, 'Syed Usama Hussain Shah Bukhari', 'Syed Mehboob Hussain Shah Bukhari', '0321-7894589', 'syedusama@hotmail.com', 'syedusama@hotmail.com', 'A+', 'Tench bhatta Rwp', '2022-01-19', '123456789', 'SP18-BCSE-040'),
('FUI/FURC-SP-18-BCSE-041', 8, 'Bilal', 'Fawad', '0321-7894578', 'bilal@hotmail.com', 'bilal@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-041'),
('FUI/FURC-SP-18-BCSE-042', 8, 'Hassan', 'Tahir', '0321-7894545', 'hassan@hotmail.com', 'hassan@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-042'),
('FUI/FURC-SP-18-BCSE-043', 8, 'Ali', 'Tahir Khan', '0321-7894556', 'ali@hotmail.com', 'ali@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-043'),
('FUI/FURC-SP-18-BCSE-044', 8, 'Shafiq', 'Ali Gulpir', '0321-0123158', 'shafiq@hotmail.com', 'shafiq@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-044'),
('FUI/FURC-SP-18-BCSE-045', 8, 'Ayesha', 'Ishtiaq', '0321-7894785', 'ayesha@hotmail.com', 'ayesha@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-045'),
('FUI/FURC-SP-18-BCSE-046', 8, 'Zaib', 'Akbar Ali', '0321-1548645', 'zaib@hotmail.com', 'zaib@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-046'),
('FUI/FURC-SP-18-BCSE-047', 8, 'Saadullah', 'Ahmed', '0321-4849797', 'saadullah@hotmail.com', 'saadullah@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-047'),
('FUI/FURC-SP-18-BCSE-048', 8, 'Suleman', 'Yahya', '0321-1234878', 'suleman@hotmail.com', 'suleman@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP18-BCSE-048');

-- --------------------------------------------------------

--
-- Table structure for table `studentsectionhistory`
--

CREATE TABLE `studentsectionhistory` (
  `studentRegCode` varchar(30) NOT NULL,
  `sectionCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsectionhistory`
--

INSERT INTO `studentsectionhistory` (`studentRegCode`, `sectionCode`) VALUES
('FUI/FURC-SP-18-BCSE-001', 1),
('FUI/FURC-SP-18-BCSE-002', 1),
('FUI/FURC-SP-18-BCSE-011', 1),
('FUI/FURC-SP-18-BCSE-012', 1),
('FUI/FURC-SP-18-BCSE-018', 1),
('FUI/FURC-SP-18-BCSE-037', 1),
('FUI/FURC-SP-18-BCSE-039', 1),
('FUI/FURC-SP-18-BCSE-040', 1),
('FUI/FURC-SP-18-BCSE-001', 4),
('FUI/FURC-SP-18-BCSE-002', 4),
('FUI/FURC-SP-18-BCSE-011', 4),
('FUI/FURC-SP-18-BCSE-012', 4),
('FUI/FURC-SP-18-BCSE-018', 4),
('FUI/FURC-SP-18-BCSE-037', 4),
('FUI/FURC-SP-18-BCSE-039', 4),
('FUI/FURC-SP-18-BCSE-040', 4),
('FUI/FURC-SP-18-BCSE-041', 2),
('FUI/FURC-SP-18-BCSE-042', 2),
('FUI/FURC-SP-18-BCSE-043', 2),
('FUI/FURC-SP-18-BCSE-044', 2),
('FUI/FURC-SP-18-BCSE-045', 2),
('FUI/FURC-SP-18-BCSE-046', 2),
('FUI/FURC-SP-18-BCSE-047', 2),
('FUI/FURC-SP-18-BCSE-048', 2),
('FUI/FURC-SP-18-BCSE-041', 5),
('FUI/FURC-SP-18-BCSE-042', 5),
('FUI/FURC-SP-18-BCSE-043', 5),
('FUI/FURC-SP-18-BCSE-044', 5),
('FUI/FURC-SP-18-BCSE-045', 5),
('FUI/FURC-SP-18-BCSE-046', 5),
('FUI/FURC-SP-18-BCSE-047', 5),
('FUI/FURC-SP-18-BCSE-048', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transcriptplos`
--

CREATE TABLE `transcriptplos` (
  `transcriptCode` int(11) NOT NULL,
  `ploCode` int(11) NOT NULL,
  `passingStatus` varchar(10) NOT NULL,
  `ploScore` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcriptplos`
--

INSERT INTO `transcriptplos` (`transcriptCode`, `ploCode`, `passingStatus`, `ploScore`) VALUES
(1, 1, 'randMarks', 10),
(1, 2, 'randMarks', 10),
(1, 3, 'randMarks', 10),
(1, 4, 'randMarks', 10),
(2, 1, 'randMarks', 10),
(2, 2, 'randMarks', 10),
(2, 3, 'randMarks', 10),
(2, 4, 'randMarks', 10),
(3, 1, 'randMarks', 10),
(3, 2, 'randMarks', 10),
(3, 3, 'randMarks', 10),
(3, 4, 'randMarks', 10),
(4, 1, 'randMarks', 10),
(4, 2, 'randMarks', 10),
(4, 3, 'randMarks', 10),
(4, 4, 'randMarks', 10),
(5, 1, 'randMarks', 10),
(5, 2, 'randMarks', 10),
(5, 3, 'randMarks', 10),
(5, 4, 'randMarks', 10),
(6, 1, 'randMarks', 10),
(6, 2, 'randMarks', 10),
(6, 3, 'randMarks', 10),
(6, 4, 'randMarks', 10),
(7, 1, 'randMarks', 10),
(7, 2, 'randMarks', 10),
(7, 3, 'randMarks', 10),
(7, 4, 'randMarks', 10),
(8, 1, 'randMarks', 10),
(8, 2, 'randMarks', 10),
(8, 3, 'randMarks', 10),
(8, 4, 'randMarks', 10),
(1, 7, 'randMarks', 10),
(1, 8, 'randMarks', 10),
(1, 10, 'randMarks', 10),
(1, 12, 'randMarks', 10),
(2, 7, 'randMarks', 10),
(2, 8, 'randMarks', 10),
(2, 10, 'randMarks', 10),
(2, 12, 'randMarks', 10),
(3, 7, 'randMarks', 10),
(3, 8, 'randMarks', 10),
(3, 10, 'randMarks', 10),
(3, 12, 'randMarks', 10),
(4, 7, 'randMarks', 10),
(4, 8, 'randMarks', 10),
(4, 10, 'randMarks', 10),
(4, 12, 'randMarks', 10),
(5, 7, 'randMarks', 10),
(5, 8, 'randMarks', 10),
(5, 10, 'randMarks', 10),
(5, 12, 'randMarks', 10),
(6, 7, 'randMarks', 10),
(6, 8, 'randMarks', 10),
(6, 10, 'randMarks', 10),
(6, 12, 'randMarks', 10),
(7, 7, 'randMarks', 10),
(7, 8, 'randMarks', 10),
(7, 10, 'randMarks', 10),
(7, 12, 'randMarks', 10),
(8, 7, 'randMarks', 10),
(8, 8, 'randMarks', 10),
(8, 10, 'randMarks', 10),
(8, 12, 'randMarks', 10);

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopicclo`
--

CREATE TABLE `weeklytopicclo` (
  `weeklyTopicCode` int(11) NOT NULL,
  `CLOCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weeklytopicclo`
--

INSERT INTO `weeklytopicclo` (`weeklyTopicCode`, `CLOCode`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopics`
--

CREATE TABLE `weeklytopics` (
  `weeklyTopicCode` int(11) NOT NULL,
  `courseProfileCode` int(11) NOT NULL,
  `topicDetail` varchar(500) NOT NULL,
  `assessmentCriteria` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weeklytopics`
--

INSERT INTO `weeklytopics` (`weeklyTopicCode`, `courseProfileCode`, `topicDetail`, `assessmentCriteria`) VALUES
(1, 1, 'Hash Maps in Detail', 'ABC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessmentCode`),
  ADD KEY `assessment_course_courseCode_fk` (`courseCode`),
  ADD KEY `assessment_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
  ADD PRIMARY KEY (`questionCode`),
  ADD KEY `AssessmentQuestion_assessment_assessmentCode_fk` (`assessmentCode`),
  ADD KEY `AssessmentQuestion_clo_CLOCode_fk` (`cloCode`);

--
-- Indexes for table `assessmentquestionstudentmarks`
--
ALTER TABLE `assessmentquestionstudentmarks`
  ADD KEY `AssessmentQuesStudentMarks_assessmentquestion_questionCode_fk` (`questionCode`),
  ADD KEY `AssessmentQuestionStudentMarks_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `assessmentstudentmarks`
--
ALTER TABLE `assessmentstudentmarks`
  ADD KEY `AssessmentStudentMarks_assessment_assessmentCode_fk` (`assessmentCode`),
  ADD KEY `AssessmentStudentMarks_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchCode`),
  ADD KEY `batch_program_programCode_fk` (`programCode`),
  ADD KEY `batch_curriculum_curriculumCode_fk` (`curriculumCode`),
  ADD KEY `batch_season_seasonCode_fk` (`seasonCode`);

--
-- Indexes for table `clo`
--
ALTER TABLE `clo`
  ADD PRIMARY KEY (`CLOCode`),
  ADD KEY `CLO_course_courseCode_fk` (`courseCode`),
  ADD KEY `CLO_curriculum_curriculumCode_fk` (`curriculumCode`),
  ADD KEY `CLO_program_programCode_fk` (`programCode`),
  ADD KEY `clo_batch_batchCode_fk` (`batchCode`);

--
-- Indexes for table `clotoplomapping`
--
ALTER TABLE `clotoplomapping`
  ADD KEY `CLOtoPLOMapping_clo_CLOCode_fk` (`CLOCode`),
  ADD KEY `CLOtoPLOMapping_plo_PLOCode_fk` (`PLOCode`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `Course_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseallocation`
--
ALTER TABLE `courseallocation`
  ADD PRIMARY KEY (`allocationCode`),
  ADD KEY `CourseAllocation_batch_batchCode_fk` (`batchCode`),
  ADD KEY `CourseAllocation_course_courseCode_fk` (`courseCode`),
  ADD KEY `CourseAllocation_courseoffering_offeringCode_fk` (`offeringCode`),
  ADD KEY `CourseAllocation_season_seasonCode_fk` (`seasonCode`),
  ADD KEY `courseallocation_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseoffered`
--
ALTER TABLE `courseoffered`
  ADD KEY `courseOffered_course_courseCode_fk` (`courseCode`),
  ADD KEY `courseOffered_courseoffering_offeringCode_fk` (`offeringCode`);

--
-- Indexes for table `courseoffering`
--
ALTER TABLE `courseoffering`
  ADD PRIMARY KEY (`offeringCode`),
  ADD KEY `CourseOffering_batch_batchCode_fk` (`batchCode`),
  ADD KEY `CourseOffering_curriculum_curriculumCode_fk` (`curriculumCode`),
  ADD KEY `CourseOffering_season__fk` (`seasonCode`),
  ADD KEY `CourseOffering_semester_semesterCode_fk` (`semesterCode`);

--
-- Indexes for table `courseprofile`
--
ALTER TABLE `courseprofile`
  ADD PRIMARY KEY (`courseProfileCode`),
  ADD KEY `courseProfile_batch_batchCode_fk` (`batchCode`),
  ADD KEY `courseProfile_course_courseCode_fk` (`courseCode`),
  ADD KEY `courseProfile_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseprofileassessmentinstruments`
--
ALTER TABLE `courseprofileassessmentinstruments`
  ADD KEY `CPAssessmentInstruments_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- Indexes for table `courseprofileinstructordetail`
--
ALTER TABLE `courseprofileinstructordetail`
  ADD KEY `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`courseRegistrationCode`),
  ADD KEY `courseRegistration_courseoffering_offeringCode_fk` (`offeringCode`),
  ADD KEY `courseRegistration_semester_semesterCode_fk` (`semesterCode`),
  ADD KEY `courseRegistration_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`curriculumCode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentCode`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyCode`),
  ADD UNIQUE KEY `Faculty_CNIC_uindex` (`CNIC`),
  ADD UNIQUE KEY `Faculty_contactNumber_uindex` (`contactNumber`),
  ADD UNIQUE KEY `Faculty_officialEmail_uindex` (`officialEmail`),
  ADD UNIQUE KEY `Faculty_personalEmail_uindex` (`personalEmail`),
  ADD KEY `faculty_department_departmentCode_fk` (`departmentCode`);

--
-- Indexes for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
  ADD PRIMARY KEY (`facultyAllocationsCode`),
  ADD KEY `FacultyAllocations_courseallocation_allocationCode_fk` (`allocationCode`),
  ADD KEY `FacultyAllocations_faculty_facultyCode_fk` (`facultyCode`),
  ADD KEY `facultyallocations_season_seasonCode_fk` (`seasonCode`),
  ADD KEY `facultyallocations_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
  ADD PRIMARY KEY (`PLOCode`),
  ADD KEY `PLO_curriculum_curriculumCode_fk` (`curriculumCode`),
  ADD KEY `PLO_program_programCode_fk` (`programCode`);

--
-- Indexes for table `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD KEY `preRequisites_course_courseCode_fk` (`courseCode`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programCode`),
  ADD KEY `Program_curriculum_curriculumCode_fk` (`curriculumCode`),
  ADD KEY `Program_department_departmentCode_fk` (`departmentCode`);

--
-- Indexes for table `programtranscript`
--
ALTER TABLE `programtranscript`
  ADD PRIMARY KEY (`transcriptCode`),
  ADD KEY `programTranscript_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `registeredcourses`
--
ALTER TABLE `registeredcourses`
  ADD KEY `RegisteredCourses_course_courseCode_fk` (`courseCode`),
  ADD KEY `RegisteredCourses_courseregistration_courseRegistrationCode_fk` (`courseRegistrationCode`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`seasonCode`),
  ADD UNIQUE KEY `season_seasonName_uindex` (`seasonName`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionCode`),
  ADD KEY `Section_semester__fk` (`semesterCode`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterCode`),
  ADD KEY `semester_batch_batchCode_fk` (`batchCode`);

--
-- Indexes for table `semestergpatranscript`
--
ALTER TABLE `semestergpatranscript`
  ADD PRIMARY KEY (`transcriptCode`),
  ADD KEY `semesterTranscript_semester_semesterCode_fk` (`semesterCode`),
  ADD KEY `semesterTranscript_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `semestergpatranscriptcourses`
--
ALTER TABLE `semestergpatranscriptcourses`
  ADD KEY `transcriptCourses_course_courseCode_fk` (`courseCode`),
  ADD KEY `transcriptCourses_semestertranscript_transcriptCode_fk` (`transcriptCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentRegCode`),
  ADD UNIQUE KEY `Student_contactNumber_uindex` (`contactNumber`),
  ADD UNIQUE KEY `Student_officialEmail_uindex` (`officialEmail`),
  ADD UNIQUE KEY `Student_personalEmail_uindex` (`personalEmail`),
  ADD KEY `student_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `studentsectionhistory`
--
ALTER TABLE `studentsectionhistory`
  ADD KEY `studentSectionHistory_section_sectionCode_fk` (`sectionCode`),
  ADD KEY `studentSectionHistory_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `transcriptplos`
--
ALTER TABLE `transcriptplos`
  ADD KEY `transcriptPLOs_plo_PLOCode_fk` (`ploCode`),
  ADD KEY `transcriptPLOs_programtranscript_transcriptCode_fk` (`transcriptCode`);

--
-- Indexes for table `weeklytopicclo`
--
ALTER TABLE `weeklytopicclo`
  ADD KEY `WeeklyTopicCLO_clo_CLOCode_fk` (`CLOCode`),
  ADD KEY `WeeklyTopicCLO_weeklytopics_weeklyTopicCode_fk` (`weeklyTopicCode`);

--
-- Indexes for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
  ADD PRIMARY KEY (`weeklyTopicCode`),
  ADD KEY `WeeklyTopics_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessmentCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
  MODIFY `questionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `clo`
--
ALTER TABLE `clo`
  MODIFY `CLOCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courseallocation`
--
ALTER TABLE `courseallocation`
  MODIFY `allocationCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courseoffering`
--
ALTER TABLE `courseoffering`
  MODIFY `offeringCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courseprofile`
--
ALTER TABLE `courseprofile`
  MODIFY `courseProfileCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `courseRegistrationCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `curriculumCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
  MODIFY `facultyAllocationsCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `PLOCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programtranscript`
--
ALTER TABLE `programtranscript`
  MODIFY `transcriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `seasonCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=902;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `semestergpatranscript`
--
ALTER TABLE `semestergpatranscript`
  MODIFY `transcriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
  MODIFY `weeklyTopicCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assessment_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
  ADD CONSTRAINT `AssessmentQuestion_assessment_assessmentCode_fk` FOREIGN KEY (`assessmentCode`) REFERENCES `assessment` (`assessmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AssessmentQuestion_clo_CLOCode_fk` FOREIGN KEY (`cloCode`) REFERENCES `clo` (`CLOCode`) ON UPDATE CASCADE;

--
-- Constraints for table `assessmentquestionstudentmarks`
--
ALTER TABLE `assessmentquestionstudentmarks`
  ADD CONSTRAINT `AssessmentQuesStudentMarks_assessmentquestion_questionCode_fk` FOREIGN KEY (`questionCode`) REFERENCES `assessmentquestion` (`questionCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AssessmentQuestionStudentMarks_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `assessmentstudentmarks`
--
ALTER TABLE `assessmentstudentmarks`
  ADD CONSTRAINT `AssessmentStudentMarks_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `batch_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `batch_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clo`
--
ALTER TABLE `clo`
  ADD CONSTRAINT `CLO_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CLO_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `CLO_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clo_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clotoplomapping`
--
ALTER TABLE `clotoplomapping`
  ADD CONSTRAINT `CLOtoPLOMapping_clo_CLOCode_fk` FOREIGN KEY (`CLOCode`) REFERENCES `clo` (`CLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CLOtoPLOMapping_plo_PLOCode_fk` FOREIGN KEY (`PLOCode`) REFERENCES `plo` (`PLOCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `Course_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `courseallocation`
--
ALTER TABLE `courseallocation`
  ADD CONSTRAINT `CourseAllocation_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseAllocation_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseAllocation_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseAllocation_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseallocation_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseoffered`
--
ALTER TABLE `courseoffered`
  ADD CONSTRAINT `courseOffered_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseOffered_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseoffering`
--
ALTER TABLE `courseoffering`
  ADD CONSTRAINT `CourseOffering_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseOffering_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseOffering_season__fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseOffering_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofile`
--
ALTER TABLE `courseprofile`
  ADD CONSTRAINT `courseProfile_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `courseProfile_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseProfile_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofileassessmentinstruments`
--
ALTER TABLE `courseprofileassessmentinstruments`
  ADD CONSTRAINT `CPAssessmentInstruments_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofileinstructordetail`
--
ALTER TABLE `courseprofileinstructordetail`
  ADD CONSTRAINT `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD CONSTRAINT `courseRegistration_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseRegistration_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseRegistration_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
  ADD CONSTRAINT `FacultyAllocations_courseallocation_allocationCode_fk` FOREIGN KEY (`allocationCode`) REFERENCES `courseallocation` (`allocationCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FacultyAllocations_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultyallocations_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultyallocations_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plo`
--
ALTER TABLE `plo`
  ADD CONSTRAINT `PLO_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PLO_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD CONSTRAINT `preRequisites_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `Program_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Program_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programtranscript`
--
ALTER TABLE `programtranscript`
  ADD CONSTRAINT `programTranscript_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registeredcourses`
--
ALTER TABLE `registeredcourses`
  ADD CONSTRAINT `RegisteredCourses_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RegisteredCourses_courseregistration_courseRegistrationCode_fk` FOREIGN KEY (`courseRegistrationCode`) REFERENCES `courseregistration` (`courseRegistrationCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `Section_semester__fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON UPDATE CASCADE;

--
-- Constraints for table `semestergpatranscript`
--
ALTER TABLE `semestergpatranscript`
  ADD CONSTRAINT `semesterTranscript_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semesterTranscript_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semestergpatranscriptcourses`
--
ALTER TABLE `semestergpatranscriptcourses`
  ADD CONSTRAINT `transcriptCourses_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transcriptCourses_semestertranscript_transcriptCode_fk` FOREIGN KEY (`transcriptCode`) REFERENCES `semestergpatranscript` (`transcriptCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON UPDATE CASCADE;

--
-- Constraints for table `studentsectionhistory`
--
ALTER TABLE `studentsectionhistory`
  ADD CONSTRAINT `studentSectionHistory_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentSectionHistory_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transcriptplos`
--
ALTER TABLE `transcriptplos`
  ADD CONSTRAINT `transcriptPLOs_plo_PLOCode_fk` FOREIGN KEY (`ploCode`) REFERENCES `plo` (`PLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transcriptPLOs_programtranscript_transcriptCode_fk` FOREIGN KEY (`transcriptCode`) REFERENCES `programtranscript` (`transcriptCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weeklytopicclo`
--
ALTER TABLE `weeklytopicclo`
  ADD CONSTRAINT `WeeklyTopicCLO_clo_CLOCode_fk` FOREIGN KEY (`CLOCode`) REFERENCES `clo` (`CLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `WeeklyTopicCLO_weeklytopics_weeklyTopicCode_fk` FOREIGN KEY (`weeklyTopicCode`) REFERENCES `weeklytopics` (`weeklyTopicCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
  ADD CONSTRAINT `WeeklyTopics_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
