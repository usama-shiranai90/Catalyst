-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 06:18 PM
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
-- Database: `catalystnew`
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
  `weightage` int(11) DEFAULT NULL,
  `numberOfQuestions` int(11) NOT NULL,
  `topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessmentCode`, `sectionCode`, `courseCode`, `assessmentType`, `assessmentSubType`, `title`, `totalMarks`, `weightage`, `numberOfQuestions`, `topic`) VALUES
(63, 88, 'SEN-28', 'Sessional', 'Assignment', 'Hello', 10, 10, 2, 'Firebase'),
(64, 88, 'SEN-29', 'Sessional', 'Quiz', 'Hello', 2, 5, 2, 'Firebase'),
(65, 89, 'SEN-28', 'Sessional', 'Assignment', 'Hello', 20, 10, 2, 'Firebase'),
(66, 89, 'SEN-28', 'Midterm', '', 'Mid', 25, 25, 2, 'Hello'),
(67, 89, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(68, 88, 'SEN-28', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Firebase'),
(69, 88, 'SEN-28', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(70, 88, 'SEN-28', 'Midterm', '', 'Java', 25, 25, 2, 'Mid Term'),
(71, 88, 'SEN-28', 'FinalExam', '', 'OOP', 50, 50, 2, 'Final Exam'),
(72, 88, 'SEN-29', 'Sessional', 'Assignment', 'Hello', 10, 10, 2, 'Firebase'),
(73, 88, 'SEN-29', 'Sessional', 'Project', 'Hello', 10, 10, 2, 'Firebase'),
(74, 88, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(75, 88, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(76, 89, 'SEN-28', 'Sessional', 'Quiz', 'Exercise 1', 5, 5, 2, 'Modelling'),
(77, 89, 'SEN-28', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(78, 89, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(79, 89, 'SEN-29', 'Sessional', 'Assignment', 'semester project', 10, 10, 2, 'Pointers'),
(80, 89, 'SEN-29', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Firebase'),
(81, 89, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(82, 89, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(83, 86, 'SEN-30', 'Sessional', 'Assignment', 'Hello', 10, 10, 2, 'Firebase'),
(84, 86, 'SEN-30', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Pointers'),
(85, 86, 'SEN-30', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(86, 86, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(87, 86, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(88, 86, 'SEN-31', 'Sessional', 'Assignment', 'semester project', 10, 10, 2, 'Firebase'),
(89, 86, 'SEN-31', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Firebase'),
(90, 86, 'SEN-31', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(91, 86, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(92, 86, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(93, 87, 'SEN-31', 'Sessional', 'Assignment', 'semester project', 2, 10, 2, 'Firebase'),
(94, 87, 'SEN-31', 'Sessional', 'Quiz', 'Hello', 4, 5, 2, 'Firebase'),
(95, 87, 'SEN-31', 'Sessional', 'Project', 'Assignment 1', 6, 10, 2, 'Modelling'),
(96, 87, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(97, 87, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(98, 87, 'SEN-30', 'Sessional', 'Assignment', 'Assignment 1', 5, 10, 2, 'Firebase'),
(99, 87, 'SEN-30', 'Sessional', 'Quiz', 'Hello', 2, 5, 2, 'Pointers'),
(100, 87, 'SEN-30', 'Sessional', 'Project', 'semester project', 4, 10, 2, 'Firebase'),
(101, 87, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(102, 87, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(103, 72, 'SEN-28', 'Sessional', 'Assignment', 'Hello', 2, 10, 2, 'Pointers'),
(104, 72, 'SEN-28', 'Sessional', 'Quiz', 'semester project', 2, 5, 2, 'Firebase'),
(105, 72, 'SEN-28', 'Sessional', 'Project', 'Assignment 1', 2, 10, 2, 'Firebase'),
(106, 72, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(107, 72, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(108, 73, 'SEN-28', 'Sessional', 'Assignment', 'Exercise 1', 3, 10, 2, 'Firebase'),
(109, 73, 'SEN-28', 'Sessional', 'Quiz', 'Exercise 1', 4, 5, 2, 'Modelling'),
(110, 73, 'SEN-28', 'Sessional', 'Project', 'Firbase', 2, 10, 2, 'Firebase'),
(111, 73, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(112, 73, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(113, 72, 'SEN-29', 'Sessional', 'Assignment', 'Hello', 2, 10, 2, 'Firebase'),
(114, 72, 'SEN-29', 'Sessional', 'Quiz', 'semester project', 4, 5, 2, 'Firebase'),
(115, 72, 'SEN-29', 'Sessional', 'Project', 'Hello', 2, 10, 2, 'Pointers'),
(116, 72, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(117, 72, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(118, 73, 'SEN-29', 'Sessional', 'Assignment', 'semester project', 2, 10, 2, 'Firebase'),
(119, 73, 'SEN-29', 'Sessional', 'Quiz', 'Exercise 1', 4, 5, 2, 'Pointers'),
(120, 73, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(121, 73, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(122, 73, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(123, 84, 'SEN-33', 'Sessional', 'Assignment', 'Welcome', 10, 10, 2, 'Hello'),
(124, 56, 'SEN-29', 'Sessional', 'Assignment', 'Welcome', 10, 10, 2, 'Hello'),
(125, 84, 'SEN-32', 'Sessional', 'Assignment', 'semester project', 2, 10, 2, 'Firebase'),
(126, 84, 'SEN-32', 'Sessional', 'Quiz', 'Assignment 1', 8, 5, 2, 'Pointers'),
(127, 84, 'SEN-32', 'Sessional', 'Project', 'Hello', 5, 10, 2, 'Modelling'),
(128, 84, 'SEN-32', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(129, 84, 'SEN-32', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(130, 85, 'SEN-32', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(131, 85, 'SEN-32', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(132, 85, 'SEN-32', 'Sessional', 'Assignment', 'semester project', 10, 10, 2, 'Firebase'),
(133, 85, 'SEN-32', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Firebase'),
(134, 85, 'SEN-32', 'Sessional', 'Project', 'Assignment 1', 10, 10, 2, 'Pointers'),
(135, 84, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(136, 84, 'SEN-33', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(137, 84, 'SEN-33', 'Sessional', 'Quiz', 'Welcome', 10, 5, 2, 'Firebase'),
(138, 84, 'SEN-33', 'Sessional', 'Project', 'Assignment 1', 10, 10, 2, 'Pointers'),
(139, 85, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(140, 85, 'SEN-33', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(141, 85, 'SEN-33', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(142, 85, 'SEN-33', 'Sessional', 'Quiz', 'Firbase', 10, 5, 2, 'Modelling'),
(143, 85, 'SEN-33', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(144, 70, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(145, 70, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(146, 70, 'SEN-30', 'Sessional', 'Assignment', 'Exercise 1', 10, 10, 2, 'Pointers'),
(147, 70, 'SEN-30', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Modelling'),
(148, 70, 'SEN-30', 'Sessional', 'Project', 'Hello', 10, 10, 2, 'Firebase'),
(149, 71, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(150, 71, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(151, 71, 'SEN-30', 'Sessional', 'Assignment', 'semester project', 10, 10, 2, 'Modelling'),
(152, 71, 'SEN-30', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Modelling'),
(153, 71, 'SEN-30', 'Sessional', 'Project', 'Hello', 10, 10, 2, 'Firebase'),
(154, 70, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(155, 70, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(156, 70, 'SEN-31', 'Sessional', 'Project', 'Exercise 1', 10, 10, 2, 'Firebase'),
(157, 70, 'SEN-31', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Firebase'),
(158, 70, 'SEN-31', 'Sessional', 'Assignment', 'semester project', 10, 10, 2, 'Firebase'),
(159, 71, 'SEN-31', 'Sessional', 'Project', 'Assignment 1', 10, 10, 2, 'Firebase'),
(160, 71, 'SEN-31', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Modelling'),
(161, 71, 'SEN-31', 'Sessional', 'Assignment', 'Welcome', 10, 10, 2, 'Pointers'),
(162, 71, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Hello'),
(163, 71, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(164, 56, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(165, 56, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(166, 56, 'SEN-28', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(167, 56, 'SEN-28', 'Sessional', 'Quiz', 'Exercise 1', 10, 5, 2, 'Pointers'),
(168, 56, 'SEN-28', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(169, 57, 'SEN-28', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(170, 57, 'SEN-28', 'Sessional', 'Quiz', 'Exercise 1', 10, 5, 2, 'Pointers'),
(171, 57, 'SEN-28', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(172, 57, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(173, 57, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(174, 56, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(175, 56, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(176, 56, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(177, 56, 'SEN-29', 'Sessional', 'Quiz', 'Firbase', 10, 5, 2, 'Pointers'),
(178, 57, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(179, 57, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(180, 57, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(181, 57, 'SEN-29', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Modelling'),
(182, 57, 'SEN-29', 'Sessional', 'Assignment', 'Hello', 10, 10, 2, 'Firebase'),
(190, 83, 'SEN-34', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(193, 82, 'SEN-35', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(194, 82, 'SEN-35', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(195, 82, 'SEN-35', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(196, 82, 'SEN-35', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Pointers'),
(198, 83, 'SEN-35', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(199, 83, 'SEN-35', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(200, 83, 'SEN-35', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(201, 83, 'SEN-35', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Firebase'),
(202, 83, 'SEN-35', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Modelling'),
(203, 68, 'SEN-32', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(204, 68, 'SEN-32', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(205, 68, 'SEN-32', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Modelling'),
(206, 68, 'SEN-32', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Pointers'),
(207, 68, 'SEN-32', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(208, 69, 'SEN-32', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(209, 69, 'SEN-32', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(210, 69, 'SEN-32', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(211, 69, 'SEN-32', 'Sessional', 'Quiz', 'Exercise 1', 10, 5, 2, 'Pointers'),
(212, 69, 'SEN-32', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(213, 68, 'SEN-33', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(214, 68, 'SEN-33', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Pointers'),
(215, 68, 'SEN-33', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(216, 68, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(217, 68, 'SEN-33', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(218, 69, 'SEN-33', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(219, 69, 'SEN-33', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(220, 69, 'SEN-33', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(221, 69, 'SEN-33', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Modelling'),
(222, 69, 'SEN-33', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(223, 54, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(224, 54, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(225, 54, 'SEN-30', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Modelling'),
(226, 54, 'SEN-30', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Pointers'),
(227, 54, 'SEN-30', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(228, 55, 'SEN-30', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(229, 55, 'SEN-30', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(230, 55, 'SEN-30', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(231, 55, 'SEN-30', 'Sessional', 'Quiz', 'Hello', 10, 5, 2, 'Pointers'),
(232, 55, 'SEN-30', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Modelling'),
(233, 54, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(234, 54, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(235, 54, 'SEN-31', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Modelling'),
(236, 54, 'SEN-31', 'Sessional', 'Quiz', 'Welcome', 10, 5, 2, 'Modelling'),
(237, 54, 'SEN-31', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(238, 55, 'SEN-31', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(239, 55, 'SEN-31', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(240, 55, 'SEN-31', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Modelling'),
(241, 55, 'SEN-31', 'Sessional', 'Quiz', 'Exercise 1', 10, 5, 2, 'Pointers'),
(242, 55, 'SEN-31', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(243, 42, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(244, 42, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(245, 42, 'SEN-28', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Modelling'),
(246, 42, 'SEN-28', 'Sessional', 'Quiz', 'Welcome', 10, 5, 2, 'Pointers'),
(247, 42, 'SEN-28', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(248, 43, 'SEN-28', 'Sessional', 'Project', 'Hello', 10, 10, 2, 'Firebase'),
(249, 43, 'SEN-28', 'Sessional', 'Quiz', 'semester project', 10, 5, 2, 'Pointers'),
(250, 43, 'SEN-28', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Firebase'),
(251, 43, 'SEN-28', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(252, 43, 'SEN-28', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(253, 42, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(254, 42, 'SEN-29', 'Sessional', 'Quiz', 'Exercise 1', 10, 5, 2, 'Pointers'),
(255, 42, 'SEN-29', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Pointers'),
(256, 42, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(257, 42, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(258, 43, 'SEN-29', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Pointers'),
(259, 43, 'SEN-29', 'Sessional', 'Quiz', 'Welcome', 10, 5, 2, 'Firebase'),
(260, 43, 'SEN-29', 'Sessional', 'Assignment', 'Assignment 1', 10, 10, 2, 'Modelling'),
(261, 43, 'SEN-29', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(262, 43, 'SEN-29', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(274, 82, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 15, NULL, 2, 'Hello'),
(275, 82, 'SEN-34', 'Sessional', 'Assignment', '10', 10, NULL, 1, 'Hello'),
(276, 82, 'SEN-35', 'Sessional', 'Assignment', 'Welcome', 15, 5, 2, 'Hello'),
(277, 82, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 10, NULL, 1, 'Hello'),
(278, 82, 'SEN-34', 'Midterm', '', 'Midterm', 25, 25, 1, 'Hello'),
(279, 82, 'SEN-34', 'FinalExam', '', 'Final Exam', 50, 50, 1, 'Final Exam'),
(280, 82, 'SEN-34', 'Sessional', 'Project', 'Welcome', 10, NULL, 1, 'Hello'),
(283, 83, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 10, NULL, 1, 'Hello'),
(285, 83, 'SEN-34', 'Sessional', 'Project', 'Welcome', 10, NULL, 1, 'Hello');

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
(109, 63, 1, 'fill in the blanks', 5),
(110, 63, 2, 'fill in the blanks', 5),
(111, 64, 3, 'fill in the blanks', 1),
(112, 64, 4, 'fill in the blanks', 1),
(113, 65, 1, 'fill in the blanks', 10),
(114, 65, 2, 'fill in the blanks', 10),
(115, 66, 1, 'Fill in the blanks ', 10),
(116, 66, 2, 'Answer these', 15),
(117, 67, 3, 'fill in the blanks', 5),
(118, 67, 4, 'fill in the blanks', 5),
(119, 68, 1, 'fill in the blanks', 5),
(120, 68, 2, 'fill in the blanks', 5),
(121, 69, 1, 'fill in the blanks', 5),
(122, 69, 2, 'fill in the blanks', 5),
(123, 70, 2, 'Fill in the blanks ', 12),
(124, 70, 1, 'Answer these', 13),
(125, 71, 1, 'Fill in the blanks', 25),
(126, 71, 2, 'Choose the correct answer', 25),
(127, 72, 3, 'fill in the blanks', 5),
(128, 72, 4, 'fill in the blanks', 5),
(129, 73, 3, 'fill in the blanks', 5),
(130, 73, 4, 'fill in the blanks', 5),
(131, 74, 4, 'Fill in the blanks ', 10),
(132, 74, 3, 'Choose the correct answer', 15),
(133, 75, 4, 'Fill in the blanks', 20),
(134, 75, 3, 'Choose the correct answer', 30),
(135, 76, 1, 'fill in the blanks', 3),
(136, 76, 2, 'fill in the blanks', 2),
(137, 77, 1, 'fill in the blanks', 5),
(138, 77, 2, 'fill in the blanks', 5),
(139, 78, 1, 'Fill in the blanks', 25),
(140, 78, 2, 'Choose the correct answer', 25),
(141, 79, 4, 'fill in the blanks', 5),
(142, 79, 3, 'fill in the blanks', 5),
(143, 80, 3, 'fill in the blanks', 5),
(144, 80, 4, 'fill in the blanks', 5),
(145, 81, 3, 'Fill in the blanks ', 20),
(146, 81, 4, 'Answer these', 5),
(147, 82, 3, 'Fill in the blanks', 10),
(148, 82, 4, 'Choose the correct answer', 40),
(149, 83, 5, 'fill in the blanks', 5),
(150, 83, 6, 'fill in the blanks', 5),
(151, 84, 5, 'fill in the blanks', 5),
(152, 84, 6, 'fill in the blanks', 5),
(153, 85, 5, 'fill in the blanks', 4),
(154, 85, 6, 'fill in the blanks', 6),
(155, 86, 5, 'Fill in the blanks ', 15),
(156, 86, 6, 'Answer these', 10),
(157, 87, 5, 'Fill in the blanks', 20),
(158, 87, 6, 'Choose the correct answer', 30),
(159, 88, 8, 'fill in the blanks', 5),
(160, 88, 7, 'fill in the blanks', 5),
(161, 89, 7, 'fill in the blanks', 5),
(162, 89, 8, 'fill in the blanks', 5),
(163, 90, 7, 'fill in the blanks', 5),
(164, 90, 8, 'fill in the blanks', 5),
(165, 91, 7, 'Fill in the blanks ', 10),
(166, 91, 8, 'Choose the correct answer', 15),
(167, 92, 8, 'Fill in the blanks', 15),
(168, 92, 7, 'Choose the correct answer', 35),
(169, 93, 7, 'fill in the blanks', 1),
(170, 93, 8, 'fill in the blanks', 1),
(171, 94, 8, 'fill in the blanks', 2),
(172, 94, 7, 'fill in the blanks', 2),
(173, 95, 8, 'fill in the blanks', 4),
(174, 95, 7, 'fill in the blanks', 2),
(175, 96, 8, 'Fill in the blanks ', 5),
(176, 96, 7, 'Choose the correct answer', 20),
(177, 97, 7, 'Fill in the blanks', 10),
(178, 97, 8, 'Choose the correct answer', 40),
(179, 98, 5, 'fill in the blanks', 2),
(180, 98, 6, 'fill in the blanks', 3),
(181, 99, 6, 'fill in the blanks', 1),
(182, 99, 5, 'fill in the blanks', 1),
(183, 100, 6, 'fill in the blanks', 2),
(184, 100, 5, 'fill in the blanks', 2),
(185, 101, 5, 'Fill in the blanks ', 10),
(186, 101, 6, 'Answer these', 15),
(187, 102, 6, 'Fill in the blanks', 40),
(188, 102, 5, 'Choose the correct answer', 10),
(189, 103, 17, 'fill in the blanks', 1),
(190, 103, 18, 'fill in the blanks', 1),
(191, 104, 17, 'fill in the blanks', 1),
(192, 104, 18, 'fill in the blanks', 1),
(193, 105, 18, 'fill in the blanks', 1),
(194, 105, 17, 'fill in the blanks', 1),
(195, 106, 18, 'Fill in the blanks ', 10),
(196, 106, 17, 'Answer these', 15),
(197, 107, 17, 'Fill in the blanks', 10),
(198, 107, 18, 'Choose the correct answer', 40),
(199, 108, 17, 'fill in the blanks', 2),
(200, 108, 18, 'fill in the blanks', 1),
(201, 109, 18, 'fill in the blanks', 2),
(202, 109, 17, 'fill in the blanks', 2),
(203, 110, 17, 'fill in the blanks', 1),
(204, 110, 18, 'fill in the blanks', 1),
(205, 111, 17, 'Fill in the blanks ', 15),
(206, 111, 18, 'Answer these', 10),
(207, 112, 18, 'Fill in the blanks', 30),
(208, 112, 17, 'Choose the correct answer', 20),
(209, 113, 15, 'fill in the blanks', 1),
(210, 113, 16, 'fill in the blanks', 1),
(211, 114, 16, 'fill in the blanks', 2),
(212, 114, 15, 'fill in the blanks', 2),
(213, 115, 16, 'fill in the blanks', 1),
(214, 115, 16, 'fill in the blanks', 1),
(215, 116, 16, 'Fill in the blanks ', 10),
(216, 116, 15, 'Choose the correct answer', 15),
(217, 117, 15, 'Fill in the blanks', 30),
(218, 117, 16, 'Choose the correct answer', 20),
(219, 118, 15, 'fill in the blanks', 1),
(220, 118, 16, 'fill in the blanks', 1),
(221, 119, 16, 'fill in the blanks', 2),
(222, 119, 15, 'fill in the blanks', 2),
(223, 120, 15, 'fill in the blanks', 5),
(224, 120, 16, 'fill in the blanks', 5),
(225, 121, 15, 'Fill in the blanks ', 20),
(226, 121, 16, 'Answer these', 5),
(227, 122, 15, 'Fill in the blanks', 40),
(228, 122, 16, 'Choose the correct answer', 10),
(229, 123, 11, 'Fill in the blanks', 5),
(230, 123, 12, 'Fill in the blanks', 5),
(231, 124, 21, 'Fill in the blanks', 5),
(232, 124, 22, 'Fill in the blanks', 5),
(233, 125, 9, 'fill in the blanks', 1),
(234, 125, 10, 'fill in the blanks', 1),
(235, 126, 9, 'fill in the blanks', 4),
(236, 126, 10, 'fill in the blanks', 4),
(237, 127, 9, 'fill in the blanks', 2),
(238, 127, 10, 'fill in the blanks', 3),
(239, 128, 9, 'Fill in the blanks ', 10),
(240, 128, 10, 'Choose the correct answer', 15),
(241, 129, 9, 'Fill in the blanks', 25),
(242, 129, 10, 'Choose the correct answer', 25),
(243, 130, 9, 'Fill in the blanks ', 15),
(244, 130, 10, 'Answer these', 10),
(245, 131, 9, 'Fill in the blanks', 40),
(246, 131, 10, 'Choose the correct answer', 10),
(247, 132, 9, 'fill in the blanks', 5),
(248, 132, 10, 'fill in the blanks', 5),
(249, 133, 10, 'fill in the blanks', 5),
(250, 133, 9, 'fill in the blanks', 5),
(251, 134, 10, 'fill in the blanks', 5),
(252, 134, 9, 'fill in the blanks', 5),
(253, 135, 11, 'Fill in the blanks ', 15),
(254, 135, 12, 'Answer these', 10),
(255, 136, 11, 'Fill in the blanks', 30),
(256, 136, 12, 'Choose the correct answer', 20),
(257, 137, 12, 'fill in the blanks', 5),
(258, 137, 11, 'fill in the blanks', 5),
(259, 138, 11, 'fill in the blanks', 5),
(260, 138, 12, 'fill in the blanks', 5),
(261, 139, 12, 'Fill in the blanks ', 20),
(262, 139, 11, 'Choose the correct answer', 5),
(263, 140, 12, 'Fill in the blanks', 35),
(264, 140, 12, 'Choose the correct answer', 15),
(265, 141, 11, 'Create Firebase Authentication Android App', 5),
(266, 141, 12, 'fill in the blanks', 5),
(267, 142, 12, 'Write code for firebase authentication?', 5),
(268, 142, 11, 'fill in the blanks', 5),
(269, 143, 11, 'Write a java code for Audio Media Player?', 5),
(270, 143, 12, 'fill in the blanks', 5),
(271, 144, 23, 'Fill in the blanks ', 20),
(272, 144, 24, 'Choose the correct answer', 5),
(273, 145, 23, 'Fill in the blanks', 30),
(274, 145, 24, 'Choose the correct answer', 20),
(275, 146, 23, 'Create Firebase Authentication Android App', 5),
(276, 146, 24, 'fill in the blanks', 5),
(277, 147, 23, 'Write a java code for Audio Media Player?', 5),
(278, 147, 24, 'fill in the blanks', 5),
(279, 148, 23, 'fill in the blanks', 5),
(280, 148, 24, 'fill in the blanks', 5),
(281, 149, 24, 'Fill in the blanks ', 10),
(282, 149, 23, 'Answer these', 15),
(283, 150, 23, 'Fill in the blanks', 20),
(284, 150, 24, 'Choose the correct answer', 30),
(285, 151, 24, 'fill in the blanks', 5),
(286, 151, 23, 'fill in the blanks', 5),
(287, 152, 23, 'Write a java code for Audio Media Player?', 5),
(288, 152, 24, 'fill in the blanks', 5),
(289, 153, 23, 'Write a java code for Audio Media Player?', 5),
(290, 153, 24, 'fill in the blanks', 5),
(291, 154, 26, 'Fill in the blanks ', 10),
(292, 154, 25, 'Choose the correct answer', 15),
(293, 155, 25, 'Fill in the blanks', 10),
(294, 155, 26, 'Choose the correct answer', 40),
(295, 156, 26, 'Write a java code for Audio Media Player?', 5),
(296, 156, 25, 'fill in the blanks', 5),
(297, 157, 26, 'Write a java code for Audio Media Player?', 5),
(298, 157, 25, 'fill in the blanks', 5),
(299, 158, 25, 'Create Firebase Authentication Android App', 5),
(300, 158, 26, 'fill in the blanks', 5),
(301, 159, 25, 'Create Firebase Authentication Android App', 5),
(302, 159, 26, 'fill in the blanks', 5),
(303, 160, 26, 'Write code for firebase authentication?', 5),
(304, 160, 25, 'fill in the blanks', 5),
(305, 161, 25, 'Write code for firebase authentication?', 5),
(306, 161, 26, 'fill in the blanks', 5),
(307, 162, 25, 'Fill in the blanks ', 10),
(308, 162, 26, 'Answer these', 15),
(309, 163, 25, 'Fill in the blanks', 10),
(310, 163, 26, 'Choose the correct answer', 40),
(311, 164, 19, 'Fill in the blanks ', 15),
(312, 164, 20, 'Answer these', 10),
(313, 165, 19, 'Fill in the blanks', 20),
(314, 165, 20, 'Choose the correct answer', 30),
(315, 166, 19, 'Write a java code for Audio Media Player?', 5),
(316, 166, 20, 'fill in the blanks', 5),
(317, 167, 19, 'Create Firebase Authentication Android App', 5),
(318, 167, 20, 'fill in the blanks', 5),
(319, 168, 20, 'Create Firebase Authentication Android App', 5),
(320, 168, 19, 'fill in the blanks', 5),
(321, 169, 19, 'Write a java code for Audio Media Player?', 5),
(322, 169, 20, 'fill in the blanks', 5),
(323, 170, 20, 'fill in the blanks', 5),
(324, 170, 19, 'fill in the blanks', 5),
(325, 171, 19, 'Create Firebase Authentication Android App', 5),
(326, 171, 20, 'fill in the blanks', 5),
(327, 172, 19, 'Fill in the blanks ', 10),
(328, 172, 20, 'Answer these', 15),
(329, 173, 19, 'Fill in the blanks', 25),
(330, 173, 20, 'Choose the correct answer', 25),
(331, 174, 21, 'Fill in the blanks', 20),
(332, 174, 22, 'Choose the correct answer', 30),
(333, 175, 21, 'Fill in the blanks ', 15),
(334, 175, 22, 'Answer these', 10),
(335, 176, 21, 'Write a java code for Audio Media Player?', 5),
(336, 176, 22, 'fill in the blanks', 5),
(337, 177, 21, 'fill in the blanks', 5),
(338, 177, 22, 'fill in the blanks', 5),
(339, 178, 21, 'Fill in the blanks', 10),
(340, 178, 22, 'Choose the correct answer', 40),
(341, 179, 21, 'Fill in the blanks ', 20),
(342, 179, 22, 'Answer these', 5),
(343, 180, 21, 'fill in the blanks', 5),
(344, 180, 22, 'fill in the blanks', 5),
(345, 181, 21, 'Write a java code for Audio Media Player?', 5),
(346, 181, 22, 'fill in the blanks', 5),
(347, 182, 22, 'Write a java code for Audio Media Player?', 5),
(348, 182, 21, 'fill in the blanks', 5),
(363, 190, 13, 'Fill in the blanks ', 10),
(364, 190, 14, 'Answer these', 15),
(369, 193, 27, 'Fill in the blanks', 10),
(370, 193, 28, 'Choose the correct answer', 40),
(371, 194, 27, 'Fill in the blanks ', 15),
(372, 194, 28, 'Answer these', 10),
(373, 195, 27, 'Write a java code for Audio Media Player?', 5),
(374, 195, 28, 'fill in the blanks', 5),
(375, 196, 27, 'Write code for firebase authentication?', 5),
(376, 196, 28, 'fill in the blanks', 5),
(379, 198, 27, 'Fill in the blanks', 30),
(380, 198, 28, 'Choose the correct answer', 20),
(381, 199, 27, 'Fill in the blanks ', 10),
(382, 199, 28, 'Answer these', 15),
(383, 200, 27, 'fill in the blanks', 5),
(384, 200, 28, 'fill in the blanks', 5),
(385, 201, 27, 'Write code for firebase authentication?', 5),
(386, 201, 28, 'fill in the blanks', 5),
(387, 202, 27, 'Write a java code for Audio Media Player?', 5),
(388, 202, 28, 'fill in the blanks', 5),
(389, 203, 30, 'Fill in the blanks', 40),
(390, 203, 29, 'Choose the correct answer', 10),
(391, 204, 29, 'Fill in the blanks ', 15),
(392, 204, 30, 'Answer these', 10),
(393, 205, 30, 'Write a java code for Audio Media Player?', 5),
(394, 205, 29, 'fill in the blanks', 5),
(395, 206, 29, 'Write a java code for Audio Media Player?', 5),
(396, 206, 30, 'fill in the blanks', 5),
(397, 207, 29, 'Write code for firebase authentication?', 5),
(398, 207, 30, 'fill in the blanks', 5),
(399, 208, 30, 'Fill in the blanks', 30),
(400, 208, 29, 'Choose the correct answer', 20),
(401, 209, 30, 'Fill in the blanks ', 10),
(402, 209, 29, 'Choose the correct answer', 15),
(403, 210, 29, 'Write a java code for Audio Media Player?', 5),
(404, 210, 30, 'fill in the blanks', 5),
(405, 211, 29, 'Write a java code for Audio Media Player?', 5),
(406, 211, 30, 'fill in the blanks', 5),
(407, 212, 29, 'Write a java code for Audio Media Player?', 5),
(408, 212, 30, 'fill in the blanks', 5),
(409, 213, 31, 'Write a java code for Audio Media Player?', 5),
(410, 213, 32, 'fill in the blanks', 5),
(411, 214, 32, 'Write code for firebase authentication?', 5),
(412, 214, 31, 'fill in the blanks', 5),
(413, 215, 31, 'Write a java code for Audio Media Player?', 5),
(414, 215, 32, 'fill in the blanks', 5),
(415, 216, 31, 'Fill in the blanks ', 10),
(416, 216, 32, 'Choose the correct answer', 15),
(417, 217, 32, 'Fill in the blanks', 30),
(418, 217, 31, 'Choose the correct answer', 20),
(419, 218, 31, 'Fill in the blanks', 20),
(420, 218, 32, 'Choose the correct answer', 30),
(421, 219, 31, 'Fill in the blanks ', 15),
(422, 219, 32, 'Answer these', 10),
(423, 220, 31, 'Write a java code for Audio Media Player?', 5),
(424, 220, 32, 'fill in the blanks', 5),
(425, 221, 32, 'Write a java code for Audio Media Player?', 5),
(426, 221, 31, 'fill in the blanks', 5),
(427, 222, 31, 'Write code for firebase authentication?', 5),
(428, 222, 32, 'fill in the blanks', 5),
(429, 223, 33, 'Fill in the blanks', 20),
(430, 223, 34, 'Choose the correct answer', 30),
(431, 224, 33, 'Fill in the blanks ', 10),
(432, 224, 34, 'Answer these', 15),
(433, 225, 33, 'Write a java code for Audio Media Player?', 5),
(434, 225, 34, 'fill in the blanks', 5),
(435, 226, 33, 'Write a java code for Audio Media Player?', 5),
(436, 226, 34, 'fill in the blanks', 5),
(437, 227, 33, 'Write a java code for Audio Media Player?', 5),
(438, 227, 34, 'fill in the blanks', 5),
(439, 228, 34, 'Fill in the blanks', 40),
(440, 228, 33, 'Choose the correct answer', 10),
(441, 229, 33, 'Fill in the blanks ', 20),
(442, 229, 34, 'Answer these', 5),
(443, 230, 33, 'Write code for firebase authentication?', 5),
(444, 230, 34, 'fill in the blanks', 5),
(445, 231, 33, 'Write a java code for Audio Media Player?', 5),
(446, 231, 34, 'fill in the blanks', 5),
(447, 232, 33, 'Write a java code for Audio Media Player?', 5),
(448, 232, 34, 'fill in the blanks', 5),
(449, 233, 35, 'Fill in the blanks', 20),
(450, 233, 36, 'Choose the correct answer', 30),
(451, 234, 35, 'Fill in the blanks ', 20),
(452, 234, 36, 'Answer these', 5),
(453, 235, 35, 'Write a java code for Audio Media Player?', 5),
(454, 235, 36, 'fill in the blanks', 5),
(455, 236, 35, 'Write a java code for Audio Media Player?', 5),
(456, 236, 36, 'fill in the blanks', 5),
(457, 237, 35, 'Write a java code for Audio Media Player?', 5),
(458, 237, 36, 'fill in the blanks', 5),
(459, 238, 35, 'Fill in the blanks', 30),
(460, 238, 36, 'Choose the correct answer', 20),
(461, 239, 35, 'Fill in the blanks ', 20),
(462, 239, 36, 'Choose the correct answer', 5),
(463, 240, 35, 'Write code for firebase authentication?', 5),
(464, 240, 36, 'fill in the blanks', 5),
(465, 241, 35, 'Write a java code for Audio Media Player?', 5),
(466, 241, 36, 'fill in the blanks', 5),
(467, 242, 35, 'Write a java code for Audio Media Player?', 5),
(468, 242, 36, 'fill in the blanks', 5),
(469, 243, 39, 'Fill in the blanks', 30),
(470, 243, 40, 'Choose the correct answer', 20),
(471, 244, 39, 'Fill in the blanks ', 15),
(472, 244, 40, 'Answer these', 10),
(473, 245, 39, 'Write a java code for Audio Media Player?', 5),
(474, 245, 40, 'fill in the blanks', 5),
(475, 246, 40, 'Write code for firebase authentication?', 5),
(476, 246, 39, 'fill in the blanks', 5),
(477, 247, 39, 'Write a java code for Audio Media Player?', 5),
(478, 247, 40, 'fill in the blanks', 5),
(479, 248, 39, 'Write code for firebase authentication?', 5),
(480, 248, 40, 'fill in the blanks', 5),
(481, 249, 39, 'Write a java code for Audio Media Player?', 5),
(482, 249, 40, 'fill in the blanks', 5),
(483, 250, 39, 'Write a java code for Audio Media Player?', 5),
(484, 250, 40, 'fill in the blanks', 5),
(485, 251, 39, 'Fill in the blanks ', 15),
(486, 251, 40, 'Answer these', 10),
(487, 252, 39, 'Fill in the blanks', 40),
(488, 252, 40, 'Choose the correct answer', 10),
(489, 253, 37, 'Write code for firebase authentication?', 5),
(490, 253, 38, 'fill in the blanks', 5),
(491, 254, 37, 'Write a java code for Audio Media Player?', 5),
(492, 254, 38, 'fill in the blanks', 5),
(493, 255, 37, 'Write a java code for Audio Media Player?', 5),
(494, 255, 38, 'fill in the blanks', 5),
(495, 256, 37, 'Fill in the blanks ', 10),
(496, 256, 38, 'Answer these', 15),
(497, 257, 37, 'Fill in the blanks', 20),
(498, 257, 38, 'Choose the correct answer', 30),
(499, 258, 37, 'Write a java code for Audio Media Player?', 5),
(500, 258, 38, 'fill in the blanks', 5),
(501, 259, 37, 'Write a java code for Audio Media Player?', 5),
(502, 259, 38, 'fill in the blanks', 5),
(503, 260, 37, 'Write a java code for Audio Media Player?', 5),
(504, 260, 38, 'fill in the blanks', 5),
(505, 261, 37, 'Fill in the blanks ', 10),
(506, 261, 38, 'Answer these', 15),
(507, 262, 37, 'Fill in the blanks', 40),
(508, 262, 38, 'Choose the correct answer', 10),
(524, 274, 13, 'Fill in the blanks  ', 10),
(525, 274, 14, 'Fill in the ', 5),
(526, 275, 13, 'Fill in the blanks', 10),
(527, 276, 27, 'Fill in the blanks  ', 10),
(528, 276, 28, 'Fill in the blanks ', 5),
(529, 277, 13, 'Fill in the blanks', 10),
(530, 278, 13, 'Fill in the blanks', 25),
(531, 279, 13, 'Fill in the blanks', 50),
(532, 280, 13, 'Fill in the blanks', 10),
(535, 283, 13, 'Fill in the blanks ', 10),
(538, 285, 13, 'Fill in the blanks', 10);

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
('FUI/FURC-SP-15-BCSE-001', 109, 5),
('FUI/FURC-SP-15-BCSE-001', 110, 5),
('FUI/FURC-SP-15-BCSE-002', 109, 5),
('FUI/FURC-SP-15-BCSE-002', 110, 5),
('FUI/FURC-SP-15-BCSE-003', 109, 5),
('FUI/FURC-SP-15-BCSE-003', 110, 5),
('FUI/FURC-SP-15-BCSE-001', 111, 1),
('FUI/FURC-SP-15-BCSE-001', 112, 1),
('FUI/FURC-SP-15-BCSE-002', 111, 1),
('FUI/FURC-SP-15-BCSE-002', 112, 1),
('FUI/FURC-SP-15-BCSE-003', 111, 1),
('FUI/FURC-SP-15-BCSE-003', 112, 1),
('FUI/FURC-SP-15-BCSE-004', 113, 10),
('FUI/FURC-SP-15-BCSE-004', 114, 0),
('FUI/FURC-SP-15-BCSE-005', 113, 10),
('FUI/FURC-SP-15-BCSE-005', 114, 5),
('FUI/FURC-SP-15-BCSE-006', 113, 10),
('FUI/FURC-SP-15-BCSE-006', 114, 0),
('FUI/FURC-SP-15-BCSE-004', 115, 10),
('FUI/FURC-SP-15-BCSE-004', 116, 5),
('FUI/FURC-SP-15-BCSE-005', 115, 10),
('FUI/FURC-SP-15-BCSE-005', 116, 7),
('FUI/FURC-SP-15-BCSE-006', 115, 10),
('FUI/FURC-SP-15-BCSE-006', 116, 2),
('FUI/FURC-SP-15-BCSE-004', 117, 5),
('FUI/FURC-SP-15-BCSE-004', 118, 5),
('FUI/FURC-SP-15-BCSE-005', 117, 1),
('FUI/FURC-SP-15-BCSE-005', 118, 5),
('FUI/FURC-SP-15-BCSE-006', 117, 0),
('FUI/FURC-SP-15-BCSE-006', 118, 5),
('FUI/FURC-SP-15-BCSE-001', 119, 4),
('FUI/FURC-SP-15-BCSE-001', 120, 3),
('FUI/FURC-SP-15-BCSE-002', 119, 4),
('FUI/FURC-SP-15-BCSE-002', 120, 2),
('FUI/FURC-SP-15-BCSE-003', 119, 5),
('FUI/FURC-SP-15-BCSE-003', 120, 1),
('FUI/FURC-SP-15-BCSE-001', 121, 0),
('FUI/FURC-SP-15-BCSE-001', 122, 4),
('FUI/FURC-SP-15-BCSE-002', 121, 5),
('FUI/FURC-SP-15-BCSE-002', 122, 2),
('FUI/FURC-SP-15-BCSE-003', 121, 0),
('FUI/FURC-SP-15-BCSE-003', 122, 4),
('FUI/FURC-SP-15-BCSE-001', 123, 10),
('FUI/FURC-SP-15-BCSE-001', 124, 13),
('FUI/FURC-SP-15-BCSE-002', 123, 9),
('FUI/FURC-SP-15-BCSE-002', 124, 0),
('FUI/FURC-SP-15-BCSE-003', 123, 3),
('FUI/FURC-SP-15-BCSE-003', 124, 10),
('FUI/FURC-SP-15-BCSE-001', 125, 20),
('FUI/FURC-SP-15-BCSE-001', 126, 15),
('FUI/FURC-SP-15-BCSE-002', 125, 18),
('FUI/FURC-SP-15-BCSE-002', 126, 0),
('FUI/FURC-SP-15-BCSE-003', 125, 0),
('FUI/FURC-SP-15-BCSE-003', 126, 14),
('FUI/FURC-SP-15-BCSE-001', 127, 5),
('FUI/FURC-SP-15-BCSE-001', 128, 5),
('FUI/FURC-SP-15-BCSE-002', 127, 5),
('FUI/FURC-SP-15-BCSE-002', 128, 0),
('FUI/FURC-SP-15-BCSE-003', 127, 0),
('FUI/FURC-SP-15-BCSE-003', 128, 0),
('FUI/FURC-SP-15-BCSE-001', 129, 5),
('FUI/FURC-SP-15-BCSE-001', 130, 5),
('FUI/FURC-SP-15-BCSE-002', 129, 5),
('FUI/FURC-SP-15-BCSE-002', 130, 5),
('FUI/FURC-SP-15-BCSE-003', 129, 5),
('FUI/FURC-SP-15-BCSE-003', 130, 5),
('FUI/FURC-SP-15-BCSE-001', 131, 0),
('FUI/FURC-SP-15-BCSE-001', 132, 10),
('FUI/FURC-SP-15-BCSE-002', 131, 9),
('FUI/FURC-SP-15-BCSE-002', 132, 12),
('FUI/FURC-SP-15-BCSE-003', 131, 0),
('FUI/FURC-SP-15-BCSE-003', 132, 8),
('FUI/FURC-SP-15-BCSE-001', 133, 20),
('FUI/FURC-SP-15-BCSE-001', 134, 15),
('FUI/FURC-SP-15-BCSE-002', 133, 18),
('FUI/FURC-SP-15-BCSE-002', 134, 10),
('FUI/FURC-SP-15-BCSE-003', 133, 5),
('FUI/FURC-SP-15-BCSE-003', 134, 18),
('FUI/FURC-SP-15-BCSE-004', 135, 0),
('FUI/FURC-SP-15-BCSE-004', 136, 2),
('FUI/FURC-SP-15-BCSE-005', 135, 3),
('FUI/FURC-SP-15-BCSE-005', 136, 1),
('FUI/FURC-SP-15-BCSE-006', 135, 0),
('FUI/FURC-SP-15-BCSE-006', 136, 2),
('FUI/FURC-SP-15-BCSE-004', 137, 5),
('FUI/FURC-SP-15-BCSE-004', 138, 2),
('FUI/FURC-SP-15-BCSE-005', 137, 0),
('FUI/FURC-SP-15-BCSE-005', 138, 3),
('FUI/FURC-SP-15-BCSE-006', 137, 1),
('FUI/FURC-SP-15-BCSE-006', 138, 5),
('FUI/FURC-SP-15-BCSE-004', 139, 25),
('FUI/FURC-SP-15-BCSE-004', 140, 5),
('FUI/FURC-SP-15-BCSE-005', 139, 19),
('FUI/FURC-SP-15-BCSE-005', 140, 20),
('FUI/FURC-SP-15-BCSE-006', 139, 9),
('FUI/FURC-SP-15-BCSE-006', 140, 12),
('FUI/FURC-SP-15-BCSE-004', 141, 3),
('FUI/FURC-SP-15-BCSE-004', 142, 4),
('FUI/FURC-SP-15-BCSE-005', 141, 1),
('FUI/FURC-SP-15-BCSE-005', 142, 0),
('FUI/FURC-SP-15-BCSE-006', 141, 4),
('FUI/FURC-SP-15-BCSE-006', 142, 5),
('FUI/FURC-SP-15-BCSE-004', 143, 5),
('FUI/FURC-SP-15-BCSE-004', 144, 4),
('FUI/FURC-SP-15-BCSE-005', 143, 2),
('FUI/FURC-SP-15-BCSE-005', 144, 0),
('FUI/FURC-SP-15-BCSE-006', 143, 3),
('FUI/FURC-SP-15-BCSE-006', 144, 4),
('FUI/FURC-SP-15-BCSE-004', 145, 19),
('FUI/FURC-SP-15-BCSE-004', 146, 0),
('FUI/FURC-SP-15-BCSE-005', 145, 14),
('FUI/FURC-SP-15-BCSE-005', 146, 4),
('FUI/FURC-SP-15-BCSE-006', 145, 17),
('FUI/FURC-SP-15-BCSE-006', 146, 1),
('FUI/FURC-SP-15-BCSE-004', 147, 5),
('FUI/FURC-SP-15-BCSE-004', 148, 30),
('FUI/FURC-SP-15-BCSE-005', 147, 9),
('FUI/FURC-SP-15-BCSE-005', 148, 20),
('FUI/FURC-SP-15-BCSE-006', 147, 4),
('FUI/FURC-SP-15-BCSE-006', 148, 40),
('FUI/FURC-SP-15-BCSE-001', 149, 5),
('FUI/FURC-SP-15-BCSE-001', 150, 5),
('FUI/FURC-SP-15-BCSE-002', 149, 5),
('FUI/FURC-SP-15-BCSE-002', 150, 5),
('FUI/FURC-SP-15-BCSE-003', 149, 5),
('FUI/FURC-SP-15-BCSE-003', 150, 5),
('FUI/FURC-SP-15-BCSE-001', 151, 0),
('FUI/FURC-SP-15-BCSE-001', 152, 4),
('FUI/FURC-SP-15-BCSE-002', 151, 2),
('FUI/FURC-SP-15-BCSE-002', 152, 0),
('FUI/FURC-SP-15-BCSE-003', 151, 5),
('FUI/FURC-SP-15-BCSE-003', 152, 1),
('FUI/FURC-SP-15-BCSE-001', 153, 3),
('FUI/FURC-SP-15-BCSE-001', 154, 5),
('FUI/FURC-SP-15-BCSE-002', 153, 0),
('FUI/FURC-SP-15-BCSE-002', 154, 2),
('FUI/FURC-SP-15-BCSE-003', 153, 4),
('FUI/FURC-SP-15-BCSE-003', 154, 5),
('FUI/FURC-SP-15-BCSE-001', 155, 14),
('FUI/FURC-SP-15-BCSE-001', 156, 10),
('FUI/FURC-SP-15-BCSE-002', 155, 0),
('FUI/FURC-SP-15-BCSE-002', 156, 8),
('FUI/FURC-SP-15-BCSE-003', 155, 6),
('FUI/FURC-SP-15-BCSE-003', 156, 8),
('FUI/FURC-SP-15-BCSE-001', 157, 15),
('FUI/FURC-SP-15-BCSE-001', 158, 25),
('FUI/FURC-SP-15-BCSE-002', 157, 10),
('FUI/FURC-SP-15-BCSE-002', 158, 10),
('FUI/FURC-SP-15-BCSE-003', 157, 15),
('FUI/FURC-SP-15-BCSE-003', 158, 15),
('FUI/FURC-SP-15-BCSE-001', 159, 3),
('FUI/FURC-SP-15-BCSE-001', 160, 5),
('FUI/FURC-SP-15-BCSE-002', 159, 1),
('FUI/FURC-SP-15-BCSE-002', 160, 5),
('FUI/FURC-SP-15-BCSE-003', 159, 0),
('FUI/FURC-SP-15-BCSE-003', 160, 3),
('FUI/FURC-SP-15-BCSE-001', 161, 5),
('FUI/FURC-SP-15-BCSE-001', 162, 0),
('FUI/FURC-SP-15-BCSE-002', 161, 3),
('FUI/FURC-SP-15-BCSE-002', 162, 5),
('FUI/FURC-SP-15-BCSE-003', 161, 2),
('FUI/FURC-SP-15-BCSE-003', 162, 0),
('FUI/FURC-SP-15-BCSE-001', 163, 4),
('FUI/FURC-SP-15-BCSE-001', 164, 0),
('FUI/FURC-SP-15-BCSE-002', 163, 3),
('FUI/FURC-SP-15-BCSE-002', 164, 2),
('FUI/FURC-SP-15-BCSE-003', 163, 0),
('FUI/FURC-SP-15-BCSE-003', 164, 5),
('FUI/FURC-SP-15-BCSE-001', 165, 10),
('FUI/FURC-SP-15-BCSE-001', 166, 7),
('FUI/FURC-SP-15-BCSE-002', 165, 4),
('FUI/FURC-SP-15-BCSE-002', 166, 11),
('FUI/FURC-SP-15-BCSE-003', 165, 6),
('FUI/FURC-SP-15-BCSE-003', 166, 3),
('FUI/FURC-SP-15-BCSE-001', 167, 10),
('FUI/FURC-SP-15-BCSE-001', 168, 10),
('FUI/FURC-SP-15-BCSE-002', 167, 9),
('FUI/FURC-SP-15-BCSE-002', 168, 30),
('FUI/FURC-SP-15-BCSE-003', 167, 15),
('FUI/FURC-SP-15-BCSE-003', 168, 25),
('FUI/FURC-SP-15-BCSE-004', 169, 1),
('FUI/FURC-SP-15-BCSE-004', 170, 1),
('FUI/FURC-SP-15-BCSE-005', 169, 0),
('FUI/FURC-SP-15-BCSE-005', 170, 1),
('FUI/FURC-SP-15-BCSE-006', 169, 0),
('FUI/FURC-SP-15-BCSE-006', 170, 0),
('FUI/FURC-SP-15-BCSE-004', 171, 2),
('FUI/FURC-SP-15-BCSE-004', 172, 0),
('FUI/FURC-SP-15-BCSE-005', 171, 0),
('FUI/FURC-SP-15-BCSE-005', 172, 2),
('FUI/FURC-SP-15-BCSE-006', 171, 2),
('FUI/FURC-SP-15-BCSE-006', 172, 2),
('FUI/FURC-SP-15-BCSE-004', 173, 2),
('FUI/FURC-SP-15-BCSE-004', 174, 2),
('FUI/FURC-SP-15-BCSE-005', 173, 3),
('FUI/FURC-SP-15-BCSE-005', 174, 0),
('FUI/FURC-SP-15-BCSE-006', 173, 3),
('FUI/FURC-SP-15-BCSE-006', 174, 0),
('FUI/FURC-SP-15-BCSE-004', 175, 4),
('FUI/FURC-SP-15-BCSE-004', 176, 15),
('FUI/FURC-SP-15-BCSE-005', 175, 2),
('FUI/FURC-SP-15-BCSE-005', 176, 10),
('FUI/FURC-SP-15-BCSE-006', 175, 4),
('FUI/FURC-SP-15-BCSE-006', 176, 9),
('FUI/FURC-SP-15-BCSE-004', 177, 9),
('FUI/FURC-SP-15-BCSE-004', 178, 10),
('FUI/FURC-SP-15-BCSE-005', 177, 10),
('FUI/FURC-SP-15-BCSE-005', 178, 35),
('FUI/FURC-SP-15-BCSE-006', 177, 8),
('FUI/FURC-SP-15-BCSE-006', 178, 25),
('FUI/FURC-SP-15-BCSE-004', 179, 1),
('FUI/FURC-SP-15-BCSE-004', 180, 2),
('FUI/FURC-SP-15-BCSE-005', 179, 1),
('FUI/FURC-SP-15-BCSE-005', 180, 2),
('FUI/FURC-SP-15-BCSE-006', 179, 2),
('FUI/FURC-SP-15-BCSE-006', 180, 3),
('FUI/FURC-SP-15-BCSE-004', 181, 0),
('FUI/FURC-SP-15-BCSE-004', 182, 1),
('FUI/FURC-SP-15-BCSE-005', 181, 1),
('FUI/FURC-SP-15-BCSE-005', 182, 0),
('FUI/FURC-SP-15-BCSE-006', 181, 0),
('FUI/FURC-SP-15-BCSE-006', 182, 0),
('FUI/FURC-SP-15-BCSE-004', 183, 0),
('FUI/FURC-SP-15-BCSE-004', 184, 2),
('FUI/FURC-SP-15-BCSE-005', 183, 1),
('FUI/FURC-SP-15-BCSE-005', 184, 2),
('FUI/FURC-SP-15-BCSE-006', 183, 2),
('FUI/FURC-SP-15-BCSE-006', 184, 0),
('FUI/FURC-SP-15-BCSE-004', 185, 9),
('FUI/FURC-SP-15-BCSE-004', 186, 12),
('FUI/FURC-SP-15-BCSE-005', 185, 3),
('FUI/FURC-SP-15-BCSE-005', 186, 7),
('FUI/FURC-SP-15-BCSE-006', 185, 5),
('FUI/FURC-SP-15-BCSE-006', 186, 14),
('FUI/FURC-SP-15-BCSE-004', 187, 35),
('FUI/FURC-SP-15-BCSE-004', 188, 9),
('FUI/FURC-SP-15-BCSE-005', 187, 10),
('FUI/FURC-SP-15-BCSE-005', 188, 9),
('FUI/FURC-SP-15-BCSE-006', 187, 25),
('FUI/FURC-SP-15-BCSE-006', 188, 4),
('FUI/FURC-F-15-BCSE-001', 189, 0),
('FUI/FURC-F-15-BCSE-001', 190, 1),
('FUI/FURC-F-15-BCSE-002', 189, 1),
('FUI/FURC-F-15-BCSE-002', 190, 0),
('FUI/FURC-F-15-BCSE-003', 189, 0),
('FUI/FURC-F-15-BCSE-003', 190, 0),
('FUI/FURC-F-15-BCSE-001', 191, 1),
('FUI/FURC-F-15-BCSE-001', 192, 0),
('FUI/FURC-F-15-BCSE-002', 191, 0),
('FUI/FURC-F-15-BCSE-002', 192, 0),
('FUI/FURC-F-15-BCSE-003', 191, 1),
('FUI/FURC-F-15-BCSE-003', 192, 1),
('FUI/FURC-F-15-BCSE-001', 193, 1),
('FUI/FURC-F-15-BCSE-001', 194, 1),
('FUI/FURC-F-15-BCSE-002', 193, 1),
('FUI/FURC-F-15-BCSE-002', 194, 1),
('FUI/FURC-F-15-BCSE-003', 193, 1),
('FUI/FURC-F-15-BCSE-003', 194, 1),
('FUI/FURC-F-15-BCSE-001', 195, 9),
('FUI/FURC-F-15-BCSE-001', 196, 14),
('FUI/FURC-F-15-BCSE-002', 195, 5),
('FUI/FURC-F-15-BCSE-002', 196, 10),
('FUI/FURC-F-15-BCSE-003', 195, 5),
('FUI/FURC-F-15-BCSE-003', 196, 12),
('FUI/FURC-F-15-BCSE-001', 197, 6),
('FUI/FURC-F-15-BCSE-001', 198, 35),
('FUI/FURC-F-15-BCSE-002', 197, 8),
('FUI/FURC-F-15-BCSE-002', 198, 34),
('FUI/FURC-F-15-BCSE-003', 197, 10),
('FUI/FURC-F-15-BCSE-003', 198, 37),
('FUI/FURC-F-15-BCSE-004', 199, 2),
('FUI/FURC-F-15-BCSE-004', 200, 1),
('FUI/FURC-F-15-BCSE-005', 199, 0),
('FUI/FURC-F-15-BCSE-005', 200, 1),
('FUI/FURC-F-15-BCSE-006', 199, 2),
('FUI/FURC-F-15-BCSE-006', 200, 0),
('FUI/FURC-F-15-BCSE-004', 201, 1),
('FUI/FURC-F-15-BCSE-004', 202, 2),
('FUI/FURC-F-15-BCSE-005', 201, 2),
('FUI/FURC-F-15-BCSE-005', 202, 1),
('FUI/FURC-F-15-BCSE-006', 201, 0),
('FUI/FURC-F-15-BCSE-006', 202, 2),
('FUI/FURC-F-15-BCSE-004', 203, 0),
('FUI/FURC-F-15-BCSE-004', 204, 1),
('FUI/FURC-F-15-BCSE-005', 203, 1),
('FUI/FURC-F-15-BCSE-005', 204, 1),
('FUI/FURC-F-15-BCSE-006', 203, 0),
('FUI/FURC-F-15-BCSE-006', 204, 1),
('FUI/FURC-F-15-BCSE-004', 205, 10),
('FUI/FURC-F-15-BCSE-004', 206, 5),
('FUI/FURC-F-15-BCSE-005', 205, 14),
('FUI/FURC-F-15-BCSE-005', 206, 9),
('FUI/FURC-F-15-BCSE-006', 205, 12),
('FUI/FURC-F-15-BCSE-006', 206, 4),
('FUI/FURC-F-15-BCSE-004', 207, 25),
('FUI/FURC-F-15-BCSE-004', 208, 19),
('FUI/FURC-F-15-BCSE-005', 207, 20),
('FUI/FURC-F-15-BCSE-005', 208, 10),
('FUI/FURC-F-15-BCSE-006', 207, 19),
('FUI/FURC-F-15-BCSE-006', 208, 15),
('FUI/FURC-F-15-BCSE-001', 209, 0),
('FUI/FURC-F-15-BCSE-001', 210, 1),
('FUI/FURC-F-15-BCSE-002', 209, 1),
('FUI/FURC-F-15-BCSE-002', 210, 1),
('FUI/FURC-F-15-BCSE-003', 209, 0),
('FUI/FURC-F-15-BCSE-003', 210, 0),
('FUI/FURC-F-15-BCSE-001', 211, 0),
('FUI/FURC-F-15-BCSE-001', 212, 2),
('FUI/FURC-F-15-BCSE-002', 211, 2),
('FUI/FURC-F-15-BCSE-002', 212, 0),
('FUI/FURC-F-15-BCSE-003', 211, 2),
('FUI/FURC-F-15-BCSE-003', 212, 2),
('FUI/FURC-F-15-BCSE-001', 213, 0),
('FUI/FURC-F-15-BCSE-001', 214, 1),
('FUI/FURC-F-15-BCSE-002', 213, 0),
('FUI/FURC-F-15-BCSE-002', 214, 0),
('FUI/FURC-F-15-BCSE-003', 213, 1),
('FUI/FURC-F-15-BCSE-003', 214, 0),
('FUI/FURC-F-15-BCSE-001', 215, 5),
('FUI/FURC-F-15-BCSE-001', 216, 10),
('FUI/FURC-F-15-BCSE-002', 215, 9),
('FUI/FURC-F-15-BCSE-002', 216, 8),
('FUI/FURC-F-15-BCSE-003', 215, 9),
('FUI/FURC-F-15-BCSE-003', 216, 14),
('FUI/FURC-F-15-BCSE-001', 217, 25),
('FUI/FURC-F-15-BCSE-001', 218, 15),
('FUI/FURC-F-15-BCSE-002', 217, 27),
('FUI/FURC-F-15-BCSE-002', 218, 14),
('FUI/FURC-F-15-BCSE-003', 217, 20),
('FUI/FURC-F-15-BCSE-003', 218, 19),
('FUI/FURC-F-15-BCSE-004', 219, 0),
('FUI/FURC-F-15-BCSE-004', 220, 1),
('FUI/FURC-F-15-BCSE-005', 219, 1),
('FUI/FURC-F-15-BCSE-005', 220, 1),
('FUI/FURC-F-15-BCSE-006', 219, 0),
('FUI/FURC-F-15-BCSE-006', 220, 0),
('FUI/FURC-F-15-BCSE-004', 221, 0),
('FUI/FURC-F-15-BCSE-004', 222, 2),
('FUI/FURC-F-15-BCSE-005', 221, 2),
('FUI/FURC-F-15-BCSE-005', 222, 0),
('FUI/FURC-F-15-BCSE-006', 221, 2),
('FUI/FURC-F-15-BCSE-006', 222, 2),
('FUI/FURC-F-15-BCSE-004', 223, 4),
('FUI/FURC-F-15-BCSE-004', 224, 3),
('FUI/FURC-F-15-BCSE-005', 223, 2),
('FUI/FURC-F-15-BCSE-005', 224, 1),
('FUI/FURC-F-15-BCSE-006', 223, 5),
('FUI/FURC-F-15-BCSE-006', 224, 4),
('FUI/FURC-F-15-BCSE-004', 225, 19),
('FUI/FURC-F-15-BCSE-004', 226, 4),
('FUI/FURC-F-15-BCSE-005', 225, 15),
('FUI/FURC-F-15-BCSE-005', 226, 2),
('FUI/FURC-F-15-BCSE-006', 225, 16),
('FUI/FURC-F-15-BCSE-006', 226, 3),
('FUI/FURC-F-15-BCSE-004', 227, 30),
('FUI/FURC-F-15-BCSE-004', 228, 4),
('FUI/FURC-F-15-BCSE-005', 227, 35),
('FUI/FURC-F-15-BCSE-005', 228, 7),
('FUI/FURC-F-15-BCSE-006', 227, 38),
('FUI/FURC-F-15-BCSE-006', 228, 4),
('FUI/FURC-SP-15-BCSE-001', 229, 5),
('FUI/FURC-SP-15-BCSE-001', 230, 5),
('FUI/FURC-SP-15-BCSE-002', 229, 5),
('FUI/FURC-SP-15-BCSE-002', 230, 5),
('FUI/FURC-SP-15-BCSE-003', 229, 5),
('FUI/FURC-SP-15-BCSE-003', 230, 5),
('FUI/FURC-SP-16-BCSE-001', 231, 5),
('FUI/FURC-SP-16-BCSE-001', 232, 5),
('FUI/FURC-SP-16-BCSE-002', 231, 5),
('FUI/FURC-SP-16-BCSE-002', 232, 5),
('FUI/FURC-SP-16-BCSE-003', 231, 5),
('FUI/FURC-SP-16-BCSE-003', 232, 5),
('FUI/FURC-SP-15-BCSE-001', 233, 1),
('FUI/FURC-SP-15-BCSE-001', 234, 0),
('FUI/FURC-SP-15-BCSE-002', 233, 1),
('FUI/FURC-SP-15-BCSE-002', 234, 1),
('FUI/FURC-SP-15-BCSE-003', 233, 0),
('FUI/FURC-SP-15-BCSE-003', 234, 1),
('FUI/FURC-SP-15-BCSE-001', 235, 3),
('FUI/FURC-SP-15-BCSE-001', 236, 2),
('FUI/FURC-SP-15-BCSE-002', 235, 4),
('FUI/FURC-SP-15-BCSE-002', 236, 3),
('FUI/FURC-SP-15-BCSE-003', 235, 1),
('FUI/FURC-SP-15-BCSE-003', 236, 4),
('FUI/FURC-SP-15-BCSE-001', 237, 2),
('FUI/FURC-SP-15-BCSE-001', 238, 3),
('FUI/FURC-SP-15-BCSE-002', 237, 2),
('FUI/FURC-SP-15-BCSE-002', 238, 1),
('FUI/FURC-SP-15-BCSE-003', 237, 2),
('FUI/FURC-SP-15-BCSE-003', 238, 2),
('FUI/FURC-SP-15-BCSE-001', 239, 9),
('FUI/FURC-SP-15-BCSE-001', 240, 15),
('FUI/FURC-SP-15-BCSE-002', 239, 5),
('FUI/FURC-SP-15-BCSE-002', 240, 7),
('FUI/FURC-SP-15-BCSE-003', 239, 8),
('FUI/FURC-SP-15-BCSE-003', 240, 10),
('FUI/FURC-SP-15-BCSE-001', 241, 10),
('FUI/FURC-SP-15-BCSE-001', 242, 12),
('FUI/FURC-SP-15-BCSE-002', 241, 20),
('FUI/FURC-SP-15-BCSE-002', 242, 15),
('FUI/FURC-SP-15-BCSE-003', 241, 24),
('FUI/FURC-SP-15-BCSE-003', 242, 16),
('FUI/FURC-SP-15-BCSE-004', 243, 14),
('FUI/FURC-SP-15-BCSE-004', 244, 9),
('FUI/FURC-SP-15-BCSE-005', 243, 10),
('FUI/FURC-SP-15-BCSE-005', 244, 5),
('FUI/FURC-SP-15-BCSE-006', 243, 12),
('FUI/FURC-SP-15-BCSE-006', 244, 7),
('FUI/FURC-SP-15-BCSE-004', 245, 35),
('FUI/FURC-SP-15-BCSE-004', 246, 7),
('FUI/FURC-SP-15-BCSE-005', 245, 30),
('FUI/FURC-SP-15-BCSE-005', 246, 10),
('FUI/FURC-SP-15-BCSE-006', 245, 39),
('FUI/FURC-SP-15-BCSE-006', 246, 8),
('FUI/FURC-SP-15-BCSE-004', 247, 4),
('FUI/FURC-SP-15-BCSE-004', 248, 3),
('FUI/FURC-SP-15-BCSE-005', 247, 5),
('FUI/FURC-SP-15-BCSE-005', 248, 1),
('FUI/FURC-SP-15-BCSE-006', 247, 4),
('FUI/FURC-SP-15-BCSE-006', 248, 3),
('FUI/FURC-SP-15-BCSE-004', 249, 4),
('FUI/FURC-SP-15-BCSE-004', 250, 0),
('FUI/FURC-SP-15-BCSE-005', 249, 5),
('FUI/FURC-SP-15-BCSE-005', 250, 3),
('FUI/FURC-SP-15-BCSE-006', 249, 4),
('FUI/FURC-SP-15-BCSE-006', 250, 2),
('FUI/FURC-SP-15-BCSE-004', 251, 5),
('FUI/FURC-SP-15-BCSE-004', 252, 0),
('FUI/FURC-SP-15-BCSE-005', 251, 4),
('FUI/FURC-SP-15-BCSE-005', 252, 3),
('FUI/FURC-SP-15-BCSE-006', 251, 5),
('FUI/FURC-SP-15-BCSE-006', 252, 2),
('FUI/FURC-SP-15-BCSE-001', 253, 10),
('FUI/FURC-SP-15-BCSE-001', 254, 8),
('FUI/FURC-SP-15-BCSE-002', 253, 8),
('FUI/FURC-SP-15-BCSE-002', 254, 10),
('FUI/FURC-SP-15-BCSE-003', 253, 13),
('FUI/FURC-SP-15-BCSE-003', 254, 4),
('FUI/FURC-SP-15-BCSE-001', 255, 20),
('FUI/FURC-SP-15-BCSE-001', 256, 11),
('FUI/FURC-SP-15-BCSE-002', 255, 25),
('FUI/FURC-SP-15-BCSE-002', 256, 12),
('FUI/FURC-SP-15-BCSE-003', 255, 22),
('FUI/FURC-SP-15-BCSE-003', 256, 15),
('FUI/FURC-SP-15-BCSE-001', 257, 2),
('FUI/FURC-SP-15-BCSE-001', 258, 4),
('FUI/FURC-SP-15-BCSE-002', 257, 5),
('FUI/FURC-SP-15-BCSE-002', 258, 3),
('FUI/FURC-SP-15-BCSE-003', 257, 1),
('FUI/FURC-SP-15-BCSE-003', 258, 5),
('FUI/FURC-SP-15-BCSE-001', 259, 4),
('FUI/FURC-SP-15-BCSE-001', 260, 3),
('FUI/FURC-SP-15-BCSE-002', 259, 0),
('FUI/FURC-SP-15-BCSE-002', 260, 1),
('FUI/FURC-SP-15-BCSE-003', 259, 5),
('FUI/FURC-SP-15-BCSE-003', 260, 3),
('FUI/FURC-SP-15-BCSE-004', 261, 15),
('FUI/FURC-SP-15-BCSE-004', 262, 4),
('FUI/FURC-SP-15-BCSE-005', 261, 10),
('FUI/FURC-SP-15-BCSE-005', 262, 0),
('FUI/FURC-SP-15-BCSE-006', 261, 18),
('FUI/FURC-SP-15-BCSE-006', 262, 3),
('FUI/FURC-SP-15-BCSE-004', 263, 30),
('FUI/FURC-SP-15-BCSE-004', 264, 10),
('FUI/FURC-SP-15-BCSE-005', 263, 25),
('FUI/FURC-SP-15-BCSE-005', 264, 14),
('FUI/FURC-SP-15-BCSE-006', 263, 20),
('FUI/FURC-SP-15-BCSE-006', 264, 5),
('FUI/FURC-SP-15-BCSE-004', 265, 4),
('FUI/FURC-SP-15-BCSE-004', 266, 3),
('FUI/FURC-SP-15-BCSE-005', 265, 0),
('FUI/FURC-SP-15-BCSE-005', 266, 5),
('FUI/FURC-SP-15-BCSE-006', 265, 4),
('FUI/FURC-SP-15-BCSE-006', 266, 2),
('FUI/FURC-SP-15-BCSE-004', 267, 0),
('FUI/FURC-SP-15-BCSE-004', 268, 2),
('FUI/FURC-SP-15-BCSE-005', 267, 5),
('FUI/FURC-SP-15-BCSE-005', 268, 4),
('FUI/FURC-SP-15-BCSE-006', 267, 3),
('FUI/FURC-SP-15-BCSE-006', 268, 5),
('FUI/FURC-SP-15-BCSE-004', 269, 5),
('FUI/FURC-SP-15-BCSE-004', 270, 4),
('FUI/FURC-SP-15-BCSE-005', 269, 5),
('FUI/FURC-SP-15-BCSE-005', 270, 4),
('FUI/FURC-SP-15-BCSE-006', 269, 5),
('FUI/FURC-SP-15-BCSE-006', 270, 5),
('FUI/FURC-F-15-BCSE-001', 271, 15),
('FUI/FURC-F-15-BCSE-001', 272, 4),
('FUI/FURC-F-15-BCSE-002', 271, 19),
('FUI/FURC-F-15-BCSE-002', 272, 1),
('FUI/FURC-F-15-BCSE-003', 271, 17),
('FUI/FURC-F-15-BCSE-003', 272, 4),
('FUI/FURC-F-15-BCSE-001', 273, 20),
('FUI/FURC-F-15-BCSE-001', 274, 9),
('FUI/FURC-F-15-BCSE-002', 273, 24),
('FUI/FURC-F-15-BCSE-002', 274, 15),
('FUI/FURC-F-15-BCSE-003', 273, 28),
('FUI/FURC-F-15-BCSE-003', 274, 17),
('FUI/FURC-F-15-BCSE-001', 275, 4),
('FUI/FURC-F-15-BCSE-001', 276, 0),
('FUI/FURC-F-15-BCSE-002', 275, 3),
('FUI/FURC-F-15-BCSE-002', 276, 5),
('FUI/FURC-F-15-BCSE-003', 275, 1),
('FUI/FURC-F-15-BCSE-003', 276, 5),
('FUI/FURC-F-15-BCSE-001', 277, 0),
('FUI/FURC-F-15-BCSE-001', 278, 5),
('FUI/FURC-F-15-BCSE-002', 277, 1),
('FUI/FURC-F-15-BCSE-002', 278, 3),
('FUI/FURC-F-15-BCSE-003', 277, 4),
('FUI/FURC-F-15-BCSE-003', 278, 5),
('FUI/FURC-F-15-BCSE-001', 279, 4),
('FUI/FURC-F-15-BCSE-001', 280, 0),
('FUI/FURC-F-15-BCSE-002', 279, 5),
('FUI/FURC-F-15-BCSE-002', 280, 0),
('FUI/FURC-F-15-BCSE-003', 279, 0),
('FUI/FURC-F-15-BCSE-003', 280, 0),
('FUI/FURC-F-15-BCSE-004', 281, 7),
('FUI/FURC-F-15-BCSE-004', 282, 12),
('FUI/FURC-F-15-BCSE-005', 281, 10),
('FUI/FURC-F-15-BCSE-005', 282, 10),
('FUI/FURC-F-15-BCSE-006', 281, 7),
('FUI/FURC-F-15-BCSE-006', 282, 11),
('FUI/FURC-F-15-BCSE-004', 283, 10),
('FUI/FURC-F-15-BCSE-004', 284, 25),
('FUI/FURC-F-15-BCSE-005', 283, 14),
('FUI/FURC-F-15-BCSE-005', 284, 22),
('FUI/FURC-F-15-BCSE-006', 283, 18),
('FUI/FURC-F-15-BCSE-006', 284, 18),
('FUI/FURC-F-15-BCSE-004', 285, 5),
('FUI/FURC-F-15-BCSE-004', 286, 4),
('FUI/FURC-F-15-BCSE-005', 285, 3),
('FUI/FURC-F-15-BCSE-005', 286, 0),
('FUI/FURC-F-15-BCSE-006', 285, 4),
('FUI/FURC-F-15-BCSE-006', 286, 0),
('FUI/FURC-F-15-BCSE-004', 287, 4),
('FUI/FURC-F-15-BCSE-004', 288, 0),
('FUI/FURC-F-15-BCSE-005', 287, 3),
('FUI/FURC-F-15-BCSE-005', 288, 1),
('FUI/FURC-F-15-BCSE-006', 287, 4),
('FUI/FURC-F-15-BCSE-006', 288, 2),
('FUI/FURC-F-15-BCSE-004', 289, 4),
('FUI/FURC-F-15-BCSE-004', 290, 0),
('FUI/FURC-F-15-BCSE-005', 289, 4),
('FUI/FURC-F-15-BCSE-005', 290, 3),
('FUI/FURC-F-15-BCSE-006', 289, 0),
('FUI/FURC-F-15-BCSE-006', 290, 4),
('FUI/FURC-F-15-BCSE-001', 291, 8),
('FUI/FURC-F-15-BCSE-001', 292, 10),
('FUI/FURC-F-15-BCSE-002', 291, 9),
('FUI/FURC-F-15-BCSE-002', 292, 12),
('FUI/FURC-F-15-BCSE-003', 291, 8),
('FUI/FURC-F-15-BCSE-003', 292, 10),
('FUI/FURC-F-15-BCSE-001', 293, 8),
('FUI/FURC-F-15-BCSE-001', 294, 35),
('FUI/FURC-F-15-BCSE-002', 293, 5),
('FUI/FURC-F-15-BCSE-002', 294, 30),
('FUI/FURC-F-15-BCSE-003', 293, 7),
('FUI/FURC-F-15-BCSE-003', 294, 37),
('FUI/FURC-F-15-BCSE-001', 295, 4),
('FUI/FURC-F-15-BCSE-001', 296, 0),
('FUI/FURC-F-15-BCSE-002', 295, 3),
('FUI/FURC-F-15-BCSE-002', 296, 1),
('FUI/FURC-F-15-BCSE-003', 295, 5),
('FUI/FURC-F-15-BCSE-003', 296, 0),
('FUI/FURC-F-15-BCSE-001', 297, 4),
('FUI/FURC-F-15-BCSE-001', 298, 0),
('FUI/FURC-F-15-BCSE-002', 297, 1),
('FUI/FURC-F-15-BCSE-002', 298, 3),
('FUI/FURC-F-15-BCSE-003', 297, 4),
('FUI/FURC-F-15-BCSE-003', 298, 2),
('FUI/FURC-F-15-BCSE-001', 299, 0),
('FUI/FURC-F-15-BCSE-001', 300, 4),
('FUI/FURC-F-15-BCSE-002', 299, 3),
('FUI/FURC-F-15-BCSE-002', 300, 1),
('FUI/FURC-F-15-BCSE-003', 299, 5),
('FUI/FURC-F-15-BCSE-003', 300, 0),
('FUI/FURC-F-15-BCSE-004', 301, 3),
('FUI/FURC-F-15-BCSE-004', 302, 4),
('FUI/FURC-F-15-BCSE-005', 301, 2),
('FUI/FURC-F-15-BCSE-005', 302, 5),
('FUI/FURC-F-15-BCSE-006', 301, 1),
('FUI/FURC-F-15-BCSE-006', 302, 3),
('FUI/FURC-F-15-BCSE-004', 303, 4),
('FUI/FURC-F-15-BCSE-004', 304, 3),
('FUI/FURC-F-15-BCSE-005', 303, 5),
('FUI/FURC-F-15-BCSE-005', 304, 1),
('FUI/FURC-F-15-BCSE-006', 303, 5),
('FUI/FURC-F-15-BCSE-006', 304, 4),
('FUI/FURC-F-15-BCSE-004', 305, 4),
('FUI/FURC-F-15-BCSE-004', 306, 3),
('FUI/FURC-F-15-BCSE-005', 305, 1),
('FUI/FURC-F-15-BCSE-005', 306, 5),
('FUI/FURC-F-15-BCSE-006', 305, 4),
('FUI/FURC-F-15-BCSE-006', 306, 3),
('FUI/FURC-F-15-BCSE-004', 307, 4),
('FUI/FURC-F-15-BCSE-004', 308, 11),
('FUI/FURC-F-15-BCSE-005', 307, 9),
('FUI/FURC-F-15-BCSE-005', 308, 14),
('FUI/FURC-F-15-BCSE-006', 307, 6),
('FUI/FURC-F-15-BCSE-006', 308, 12),
('FUI/FURC-F-15-BCSE-004', 309, 7),
('FUI/FURC-F-15-BCSE-004', 310, 35),
('FUI/FURC-F-15-BCSE-005', 309, 8),
('FUI/FURC-F-15-BCSE-005', 310, 30),
('FUI/FURC-F-15-BCSE-006', 309, 6),
('FUI/FURC-F-15-BCSE-006', 310, 38),
('FUI/FURC-SP-16-BCSE-001', 311, 14),
('FUI/FURC-SP-16-BCSE-001', 312, 7),
('FUI/FURC-SP-16-BCSE-002', 311, 10),
('FUI/FURC-SP-16-BCSE-002', 312, 5),
('FUI/FURC-SP-16-BCSE-003', 311, 11),
('FUI/FURC-SP-16-BCSE-003', 312, 7),
('FUI/FURC-SP-16-BCSE-001', 313, 15),
('FUI/FURC-SP-16-BCSE-001', 314, 20),
('FUI/FURC-SP-16-BCSE-002', 313, 14),
('FUI/FURC-SP-16-BCSE-002', 314, 22),
('FUI/FURC-SP-16-BCSE-003', 313, 17),
('FUI/FURC-SP-16-BCSE-003', 314, 28),
('FUI/FURC-SP-16-BCSE-001', 315, 4),
('FUI/FURC-SP-16-BCSE-001', 316, 3),
('FUI/FURC-SP-16-BCSE-002', 315, 1),
('FUI/FURC-SP-16-BCSE-002', 316, 5),
('FUI/FURC-SP-16-BCSE-003', 315, 4),
('FUI/FURC-SP-16-BCSE-003', 316, 2),
('FUI/FURC-SP-16-BCSE-001', 317, 4),
('FUI/FURC-SP-16-BCSE-001', 318, 3),
('FUI/FURC-SP-16-BCSE-002', 317, 5),
('FUI/FURC-SP-16-BCSE-002', 318, 1),
('FUI/FURC-SP-16-BCSE-003', 317, 4),
('FUI/FURC-SP-16-BCSE-003', 318, 3),
('FUI/FURC-SP-16-BCSE-001', 319, 5),
('FUI/FURC-SP-16-BCSE-001', 320, 0),
('FUI/FURC-SP-16-BCSE-002', 319, 4),
('FUI/FURC-SP-16-BCSE-002', 320, 3),
('FUI/FURC-SP-16-BCSE-003', 319, 5),
('FUI/FURC-SP-16-BCSE-003', 320, 5),
('FUI/FURC-SP-16-BCSE-004', 321, 1),
('FUI/FURC-SP-16-BCSE-004', 322, 2),
('FUI/FURC-SP-16-BCSE-005', 321, 4),
('FUI/FURC-SP-16-BCSE-005', 322, 3),
('FUI/FURC-SP-16-BCSE-006', 321, 5),
('FUI/FURC-SP-16-BCSE-006', 322, 1),
('FUI/FURC-SP-16-BCSE-004', 323, 4),
('FUI/FURC-SP-16-BCSE-004', 324, 3),
('FUI/FURC-SP-16-BCSE-005', 323, 1),
('FUI/FURC-SP-16-BCSE-005', 324, 5),
('FUI/FURC-SP-16-BCSE-006', 323, 2),
('FUI/FURC-SP-16-BCSE-006', 324, 4),
('FUI/FURC-SP-16-BCSE-004', 325, 4),
('FUI/FURC-SP-16-BCSE-004', 326, 3),
('FUI/FURC-SP-16-BCSE-005', 325, 2),
('FUI/FURC-SP-16-BCSE-005', 326, 5),
('FUI/FURC-SP-16-BCSE-006', 325, 1),
('FUI/FURC-SP-16-BCSE-006', 326, 5),
('FUI/FURC-SP-16-BCSE-004', 327, 4),
('FUI/FURC-SP-16-BCSE-004', 328, 10),
('FUI/FURC-SP-16-BCSE-005', 327, 9),
('FUI/FURC-SP-16-BCSE-005', 328, 12),
('FUI/FURC-SP-16-BCSE-006', 327, 6),
('FUI/FURC-SP-16-BCSE-006', 328, 14),
('FUI/FURC-SP-16-BCSE-004', 329, 24),
('FUI/FURC-SP-16-BCSE-004', 330, 10),
('FUI/FURC-SP-16-BCSE-005', 329, 23),
('FUI/FURC-SP-16-BCSE-005', 330, 21),
('FUI/FURC-SP-16-BCSE-006', 329, 20),
('FUI/FURC-SP-16-BCSE-006', 330, 15),
('FUI/FURC-SP-16-BCSE-001', 331, 20),
('FUI/FURC-SP-16-BCSE-001', 332, 25),
('FUI/FURC-SP-16-BCSE-002', 331, 15),
('FUI/FURC-SP-16-BCSE-002', 332, 10),
('FUI/FURC-SP-16-BCSE-003', 331, 17),
('FUI/FURC-SP-16-BCSE-003', 332, 20),
('FUI/FURC-SP-16-BCSE-001', 333, 10),
('FUI/FURC-SP-16-BCSE-001', 334, 4),
('FUI/FURC-SP-16-BCSE-002', 333, 10),
('FUI/FURC-SP-16-BCSE-002', 334, 2),
('FUI/FURC-SP-16-BCSE-003', 333, 14),
('FUI/FURC-SP-16-BCSE-003', 334, 9),
('FUI/FURC-SP-16-BCSE-001', 335, 4),
('FUI/FURC-SP-16-BCSE-001', 336, 3),
('FUI/FURC-SP-16-BCSE-002', 335, 0),
('FUI/FURC-SP-16-BCSE-002', 336, 0),
('FUI/FURC-SP-16-BCSE-003', 335, 4),
('FUI/FURC-SP-16-BCSE-003', 336, 5),
('FUI/FURC-SP-16-BCSE-001', 337, 1),
('FUI/FURC-SP-16-BCSE-001', 338, 0),
('FUI/FURC-SP-16-BCSE-002', 337, 3),
('FUI/FURC-SP-16-BCSE-002', 338, 5),
('FUI/FURC-SP-16-BCSE-003', 337, 1),
('FUI/FURC-SP-16-BCSE-003', 338, 4),
('FUI/FURC-SP-16-BCSE-004', 339, 4),
('FUI/FURC-SP-16-BCSE-004', 340, 30),
('FUI/FURC-SP-16-BCSE-005', 339, 8),
('FUI/FURC-SP-16-BCSE-005', 340, 35),
('FUI/FURC-SP-16-BCSE-006', 339, 5),
('FUI/FURC-SP-16-BCSE-006', 340, 32),
('FUI/FURC-SP-16-BCSE-004', 341, 14),
('FUI/FURC-SP-16-BCSE-004', 342, 4),
('FUI/FURC-SP-16-BCSE-005', 341, 16),
('FUI/FURC-SP-16-BCSE-005', 342, 2),
('FUI/FURC-SP-16-BCSE-006', 341, 17),
('FUI/FURC-SP-16-BCSE-006', 342, 1),
('FUI/FURC-SP-16-BCSE-004', 343, 4),
('FUI/FURC-SP-16-BCSE-004', 344, 3),
('FUI/FURC-SP-16-BCSE-005', 343, 0),
('FUI/FURC-SP-16-BCSE-005', 344, 5),
('FUI/FURC-SP-16-BCSE-006', 343, 1),
('FUI/FURC-SP-16-BCSE-006', 344, 0),
('FUI/FURC-SP-16-BCSE-004', 345, 4),
('FUI/FURC-SP-16-BCSE-004', 346, 5),
('FUI/FURC-SP-16-BCSE-005', 345, 3),
('FUI/FURC-SP-16-BCSE-005', 346, 0),
('FUI/FURC-SP-16-BCSE-006', 345, 4),
('FUI/FURC-SP-16-BCSE-006', 346, 5),
('FUI/FURC-SP-16-BCSE-004', 347, 0),
('FUI/FURC-SP-16-BCSE-004', 348, 0),
('FUI/FURC-SP-16-BCSE-005', 347, 4),
('FUI/FURC-SP-16-BCSE-005', 348, 3),
('FUI/FURC-SP-16-BCSE-006', 347, 5),
('FUI/FURC-SP-16-BCSE-006', 348, 5),
('FUI/FURC-SP-15-BCSE-004', 363, 4),
('FUI/FURC-SP-15-BCSE-004', 364, 11),
('FUI/FURC-SP-15-BCSE-005', 363, 5),
('FUI/FURC-SP-15-BCSE-005', 364, 9),
('FUI/FURC-SP-15-BCSE-006', 363, 9),
('FUI/FURC-SP-15-BCSE-006', 364, 12),
('FUI/FURC-SP-15-BCSE-001', 369, 5),
('FUI/FURC-SP-15-BCSE-001', 370, 30),
('FUI/FURC-SP-15-BCSE-002', 369, 8),
('FUI/FURC-SP-15-BCSE-002', 370, 22),
('FUI/FURC-SP-15-BCSE-003', 369, 8),
('FUI/FURC-SP-15-BCSE-003', 370, 29),
('FUI/FURC-SP-15-BCSE-001', 371, 10),
('FUI/FURC-SP-15-BCSE-001', 372, 5),
('FUI/FURC-SP-15-BCSE-002', 371, 11),
('FUI/FURC-SP-15-BCSE-002', 372, 4),
('FUI/FURC-SP-15-BCSE-003', 371, 13),
('FUI/FURC-SP-15-BCSE-003', 372, 7),
('FUI/FURC-SP-15-BCSE-001', 373, 0),
('FUI/FURC-SP-15-BCSE-001', 374, 4),
('FUI/FURC-SP-15-BCSE-002', 373, 3),
('FUI/FURC-SP-15-BCSE-002', 374, 5),
('FUI/FURC-SP-15-BCSE-003', 373, 2),
('FUI/FURC-SP-15-BCSE-003', 374, 5),
('FUI/FURC-SP-15-BCSE-001', 375, 4),
('FUI/FURC-SP-15-BCSE-001', 376, 0),
('FUI/FURC-SP-15-BCSE-002', 375, 3),
('FUI/FURC-SP-15-BCSE-002', 376, 5),
('FUI/FURC-SP-15-BCSE-003', 375, 1),
('FUI/FURC-SP-15-BCSE-003', 376, 4),
('FUI/FURC-SP-15-BCSE-004', 379, 20),
('FUI/FURC-SP-15-BCSE-004', 380, 11),
('FUI/FURC-SP-15-BCSE-005', 379, 25),
('FUI/FURC-SP-15-BCSE-005', 380, 14),
('FUI/FURC-SP-15-BCSE-006', 379, 19),
('FUI/FURC-SP-15-BCSE-006', 380, 11),
('FUI/FURC-SP-15-BCSE-004', 381, 7),
('FUI/FURC-SP-15-BCSE-004', 382, 13),
('FUI/FURC-SP-15-BCSE-005', 381, 5),
('FUI/FURC-SP-15-BCSE-005', 382, 14),
('FUI/FURC-SP-15-BCSE-006', 381, 7),
('FUI/FURC-SP-15-BCSE-006', 382, 11),
('FUI/FURC-SP-15-BCSE-004', 383, 4),
('FUI/FURC-SP-15-BCSE-004', 384, 3),
('FUI/FURC-SP-15-BCSE-005', 383, 0),
('FUI/FURC-SP-15-BCSE-005', 384, 5),
('FUI/FURC-SP-15-BCSE-006', 383, 4),
('FUI/FURC-SP-15-BCSE-006', 384, 2),
('FUI/FURC-SP-15-BCSE-004', 385, 2),
('FUI/FURC-SP-15-BCSE-004', 386, 4),
('FUI/FURC-SP-15-BCSE-005', 385, 3),
('FUI/FURC-SP-15-BCSE-005', 386, 0),
('FUI/FURC-SP-15-BCSE-006', 385, 1),
('FUI/FURC-SP-15-BCSE-006', 386, 5),
('FUI/FURC-SP-15-BCSE-004', 387, 1),
('FUI/FURC-SP-15-BCSE-004', 388, 4),
('FUI/FURC-SP-15-BCSE-005', 387, 5),
('FUI/FURC-SP-15-BCSE-005', 388, 5),
('FUI/FURC-SP-15-BCSE-006', 387, 3),
('FUI/FURC-SP-15-BCSE-006', 388, 4),
('FUI/FURC-F-15-BCSE-001', 389, 40),
('FUI/FURC-F-15-BCSE-001', 390, 10),
('FUI/FURC-F-15-BCSE-002', 389, 40),
('FUI/FURC-F-15-BCSE-002', 390, 10),
('FUI/FURC-F-15-BCSE-003', 389, 40),
('FUI/FURC-F-15-BCSE-003', 390, 10),
('FUI/FURC-F-15-BCSE-001', 391, 15),
('FUI/FURC-F-15-BCSE-001', 392, 10),
('FUI/FURC-F-15-BCSE-002', 391, 15),
('FUI/FURC-F-15-BCSE-002', 392, 10),
('FUI/FURC-F-15-BCSE-003', 391, 15),
('FUI/FURC-F-15-BCSE-003', 392, 10),
('FUI/FURC-F-15-BCSE-001', 393, 5),
('FUI/FURC-F-15-BCSE-001', 394, 5),
('FUI/FURC-F-15-BCSE-002', 393, 5),
('FUI/FURC-F-15-BCSE-002', 394, 1),
('FUI/FURC-F-15-BCSE-003', 393, 2),
('FUI/FURC-F-15-BCSE-003', 394, 5),
('FUI/FURC-F-15-BCSE-001', 395, 5),
('FUI/FURC-F-15-BCSE-001', 396, 5),
('FUI/FURC-F-15-BCSE-002', 395, 1),
('FUI/FURC-F-15-BCSE-002', 396, 5),
('FUI/FURC-F-15-BCSE-003', 395, 2),
('FUI/FURC-F-15-BCSE-003', 396, 4),
('FUI/FURC-F-15-BCSE-001', 397, 5),
('FUI/FURC-F-15-BCSE-001', 398, 5),
('FUI/FURC-F-15-BCSE-002', 397, 5),
('FUI/FURC-F-15-BCSE-002', 398, 1),
('FUI/FURC-F-15-BCSE-003', 397, 3),
('FUI/FURC-F-15-BCSE-003', 398, 4),
('FUI/FURC-F-15-BCSE-004', 399, 20),
('FUI/FURC-F-15-BCSE-004', 400, 10),
('FUI/FURC-F-15-BCSE-005', 399, 25),
('FUI/FURC-F-15-BCSE-005', 400, 14),
('FUI/FURC-F-15-BCSE-006', 399, 23),
('FUI/FURC-F-15-BCSE-006', 400, 15),
('FUI/FURC-F-15-BCSE-004', 401, 7),
('FUI/FURC-F-15-BCSE-004', 402, 11),
('FUI/FURC-F-15-BCSE-005', 401, 5),
('FUI/FURC-F-15-BCSE-005', 402, 12),
('FUI/FURC-F-15-BCSE-006', 401, 6),
('FUI/FURC-F-15-BCSE-006', 402, 10),
('FUI/FURC-F-15-BCSE-004', 403, 4),
('FUI/FURC-F-15-BCSE-004', 404, 1),
('FUI/FURC-F-15-BCSE-005', 403, 5),
('FUI/FURC-F-15-BCSE-005', 404, 0),
('FUI/FURC-F-15-BCSE-006', 403, 4),
('FUI/FURC-F-15-BCSE-006', 404, 5),
('FUI/FURC-F-15-BCSE-004', 405, 4),
('FUI/FURC-F-15-BCSE-004', 406, 0),
('FUI/FURC-F-15-BCSE-005', 405, 3),
('FUI/FURC-F-15-BCSE-005', 406, 5),
('FUI/FURC-F-15-BCSE-006', 405, 0),
('FUI/FURC-F-15-BCSE-006', 406, 4),
('FUI/FURC-F-15-BCSE-004', 407, 4),
('FUI/FURC-F-15-BCSE-004', 408, 0),
('FUI/FURC-F-15-BCSE-005', 407, 1),
('FUI/FURC-F-15-BCSE-005', 408, 5),
('FUI/FURC-F-15-BCSE-006', 407, 3),
('FUI/FURC-F-15-BCSE-006', 408, 4),
('FUI/FURC-F-15-BCSE-001', 409, 4),
('FUI/FURC-F-15-BCSE-001', 410, 3),
('FUI/FURC-F-15-BCSE-002', 409, 5),
('FUI/FURC-F-15-BCSE-002', 410, 1),
('FUI/FURC-F-15-BCSE-003', 409, 0),
('FUI/FURC-F-15-BCSE-003', 410, 4),
('FUI/FURC-F-15-BCSE-001', 411, 3),
('FUI/FURC-F-15-BCSE-001', 412, 2),
('FUI/FURC-F-15-BCSE-002', 411, 4),
('FUI/FURC-F-15-BCSE-002', 412, 0),
('FUI/FURC-F-15-BCSE-003', 411, 5),
('FUI/FURC-F-15-BCSE-003', 412, 1),
('FUI/FURC-F-15-BCSE-001', 413, 3),
('FUI/FURC-F-15-BCSE-001', 414, 1),
('FUI/FURC-F-15-BCSE-002', 413, 4),
('FUI/FURC-F-15-BCSE-002', 414, 2),
('FUI/FURC-F-15-BCSE-003', 413, 4),
('FUI/FURC-F-15-BCSE-003', 414, 3),
('FUI/FURC-F-15-BCSE-001', 415, 9),
('FUI/FURC-F-15-BCSE-001', 416, 12),
('FUI/FURC-F-15-BCSE-002', 415, 4),
('FUI/FURC-F-15-BCSE-002', 416, 13),
('FUI/FURC-F-15-BCSE-003', 415, 6),
('FUI/FURC-F-15-BCSE-003', 416, 10),
('FUI/FURC-F-15-BCSE-001', 417, 20),
('FUI/FURC-F-15-BCSE-001', 418, 15),
('FUI/FURC-F-15-BCSE-002', 417, 22),
('FUI/FURC-F-15-BCSE-002', 418, 14),
('FUI/FURC-F-15-BCSE-003', 417, 25),
('FUI/FURC-F-15-BCSE-003', 418, 17),
('FUI/FURC-F-15-BCSE-004', 419, 16),
('FUI/FURC-F-15-BCSE-004', 420, 20),
('FUI/FURC-F-15-BCSE-005', 419, 14),
('FUI/FURC-F-15-BCSE-005', 420, 22),
('FUI/FURC-F-15-BCSE-006', 419, 13),
('FUI/FURC-F-15-BCSE-006', 420, 23),
('FUI/FURC-F-15-BCSE-004', 421, 10),
('FUI/FURC-F-15-BCSE-004', 422, 8),
('FUI/FURC-F-15-BCSE-005', 421, 14),
('FUI/FURC-F-15-BCSE-005', 422, 5),
('FUI/FURC-F-15-BCSE-006', 421, 11),
('FUI/FURC-F-15-BCSE-006', 422, 4),
('FUI/FURC-F-15-BCSE-004', 423, 4),
('FUI/FURC-F-15-BCSE-004', 424, 3),
('FUI/FURC-F-15-BCSE-005', 423, 2),
('FUI/FURC-F-15-BCSE-005', 424, 5),
('FUI/FURC-F-15-BCSE-006', 423, 0),
('FUI/FURC-F-15-BCSE-006', 424, 4),
('FUI/FURC-F-15-BCSE-004', 425, 3),
('FUI/FURC-F-15-BCSE-004', 426, 1),
('FUI/FURC-F-15-BCSE-005', 425, 2),
('FUI/FURC-F-15-BCSE-005', 426, 4),
('FUI/FURC-F-15-BCSE-006', 425, 3),
('FUI/FURC-F-15-BCSE-006', 426, 5),
('FUI/FURC-F-15-BCSE-004', 427, 3),
('FUI/FURC-F-15-BCSE-004', 428, 4),
('FUI/FURC-F-15-BCSE-005', 427, 2),
('FUI/FURC-F-15-BCSE-005', 428, 1),
('FUI/FURC-F-15-BCSE-006', 427, 3),
('FUI/FURC-F-15-BCSE-006', 428, 5),
('FUI/FURC-SP-16-BCSE-001', 429, 10),
('FUI/FURC-SP-16-BCSE-001', 430, 24),
('FUI/FURC-SP-16-BCSE-002', 429, 15),
('FUI/FURC-SP-16-BCSE-002', 430, 20),
('FUI/FURC-SP-16-BCSE-003', 429, 17),
('FUI/FURC-SP-16-BCSE-003', 430, 18),
('FUI/FURC-SP-16-BCSE-001', 431, 7),
('FUI/FURC-SP-16-BCSE-001', 432, 11),
('FUI/FURC-SP-16-BCSE-002', 431, 5),
('FUI/FURC-SP-16-BCSE-002', 432, 14),
('FUI/FURC-SP-16-BCSE-003', 431, 4),
('FUI/FURC-SP-16-BCSE-003', 432, 15),
('FUI/FURC-SP-16-BCSE-001', 433, 4),
('FUI/FURC-SP-16-BCSE-001', 434, 0),
('FUI/FURC-SP-16-BCSE-002', 433, 3),
('FUI/FURC-SP-16-BCSE-002', 434, 4),
('FUI/FURC-SP-16-BCSE-003', 433, 2),
('FUI/FURC-SP-16-BCSE-003', 434, 5),
('FUI/FURC-SP-16-BCSE-001', 435, 1),
('FUI/FURC-SP-16-BCSE-001', 436, 5),
('FUI/FURC-SP-16-BCSE-002', 435, 3),
('FUI/FURC-SP-16-BCSE-002', 436, 0),
('FUI/FURC-SP-16-BCSE-003', 435, 4),
('FUI/FURC-SP-16-BCSE-003', 436, 5),
('FUI/FURC-SP-16-BCSE-001', 437, 5),
('FUI/FURC-SP-16-BCSE-001', 438, 5),
('FUI/FURC-SP-16-BCSE-002', 437, 4),
('FUI/FURC-SP-16-BCSE-002', 438, 3),
('FUI/FURC-SP-16-BCSE-003', 437, 0),
('FUI/FURC-SP-16-BCSE-003', 438, 2),
('FUI/FURC-SP-16-BCSE-004', 439, 35),
('FUI/FURC-SP-16-BCSE-004', 440, 7),
('FUI/FURC-SP-16-BCSE-005', 439, 30),
('FUI/FURC-SP-16-BCSE-005', 440, 5),
('FUI/FURC-SP-16-BCSE-006', 439, 38),
('FUI/FURC-SP-16-BCSE-006', 440, 7),
('FUI/FURC-SP-16-BCSE-004', 441, 15),
('FUI/FURC-SP-16-BCSE-004', 442, 4),
('FUI/FURC-SP-16-BCSE-005', 441, 11),
('FUI/FURC-SP-16-BCSE-005', 442, 2),
('FUI/FURC-SP-16-BCSE-006', 441, 13),
('FUI/FURC-SP-16-BCSE-006', 442, 1),
('FUI/FURC-SP-16-BCSE-004', 443, 4),
('FUI/FURC-SP-16-BCSE-004', 444, 0),
('FUI/FURC-SP-16-BCSE-005', 443, 3),
('FUI/FURC-SP-16-BCSE-005', 444, 5),
('FUI/FURC-SP-16-BCSE-006', 443, 0),
('FUI/FURC-SP-16-BCSE-006', 444, 4),
('FUI/FURC-SP-16-BCSE-004', 445, 0),
('FUI/FURC-SP-16-BCSE-004', 446, 4),
('FUI/FURC-SP-16-BCSE-005', 445, 3),
('FUI/FURC-SP-16-BCSE-005', 446, 1),
('FUI/FURC-SP-16-BCSE-006', 445, 5),
('FUI/FURC-SP-16-BCSE-006', 446, 5),
('FUI/FURC-SP-16-BCSE-004', 447, 4),
('FUI/FURC-SP-16-BCSE-004', 448, 3),
('FUI/FURC-SP-16-BCSE-005', 447, 2),
('FUI/FURC-SP-16-BCSE-005', 448, 4),
('FUI/FURC-SP-16-BCSE-006', 447, 3),
('FUI/FURC-SP-16-BCSE-006', 448, 4),
('FUI/FURC-SP-16-BCSE-001', 449, 14),
('FUI/FURC-SP-16-BCSE-001', 450, 25),
('FUI/FURC-SP-16-BCSE-002', 449, 15),
('FUI/FURC-SP-16-BCSE-002', 450, 20),
('FUI/FURC-SP-16-BCSE-003', 449, 13),
('FUI/FURC-SP-16-BCSE-003', 450, 27),
('FUI/FURC-SP-16-BCSE-001', 451, 14),
('FUI/FURC-SP-16-BCSE-001', 452, 2),
('FUI/FURC-SP-16-BCSE-002', 451, 11),
('FUI/FURC-SP-16-BCSE-002', 452, 3),
('FUI/FURC-SP-16-BCSE-003', 451, 14),
('FUI/FURC-SP-16-BCSE-003', 452, 5),
('FUI/FURC-SP-16-BCSE-001', 453, 4),
('FUI/FURC-SP-16-BCSE-001', 454, 3),
('FUI/FURC-SP-16-BCSE-002', 453, 5),
('FUI/FURC-SP-16-BCSE-002', 454, 1),
('FUI/FURC-SP-16-BCSE-003', 453, 0),
('FUI/FURC-SP-16-BCSE-003', 454, 5),
('FUI/FURC-SP-16-BCSE-001', 455, 0),
('FUI/FURC-SP-16-BCSE-001', 456, 3),
('FUI/FURC-SP-16-BCSE-002', 455, 4),
('FUI/FURC-SP-16-BCSE-002', 456, 2),
('FUI/FURC-SP-16-BCSE-003', 455, 5),
('FUI/FURC-SP-16-BCSE-003', 456, 3),
('FUI/FURC-SP-16-BCSE-001', 457, 0),
('FUI/FURC-SP-16-BCSE-001', 458, 4),
('FUI/FURC-SP-16-BCSE-002', 457, 3),
('FUI/FURC-SP-16-BCSE-002', 458, 5),
('FUI/FURC-SP-16-BCSE-003', 457, 2),
('FUI/FURC-SP-16-BCSE-003', 458, 4),
('FUI/FURC-SP-16-BCSE-004', 459, 22),
('FUI/FURC-SP-16-BCSE-004', 460, 14),
('FUI/FURC-SP-16-BCSE-005', 459, 28),
('FUI/FURC-SP-16-BCSE-005', 460, 12),
('FUI/FURC-SP-16-BCSE-006', 459, 23),
('FUI/FURC-SP-16-BCSE-006', 460, 16),
('FUI/FURC-SP-16-BCSE-004', 461, 11),
('FUI/FURC-SP-16-BCSE-004', 462, 4),
('FUI/FURC-SP-16-BCSE-005', 461, 12),
('FUI/FURC-SP-16-BCSE-005', 462, 3),
('FUI/FURC-SP-16-BCSE-006', 461, 17),
('FUI/FURC-SP-16-BCSE-006', 462, 2),
('FUI/FURC-SP-16-BCSE-004', 463, 0),
('FUI/FURC-SP-16-BCSE-004', 464, 4),
('FUI/FURC-SP-16-BCSE-005', 463, 3),
('FUI/FURC-SP-16-BCSE-005', 464, 5),
('FUI/FURC-SP-16-BCSE-006', 463, 2),
('FUI/FURC-SP-16-BCSE-006', 464, 4),
('FUI/FURC-SP-16-BCSE-004', 465, 0),
('FUI/FURC-SP-16-BCSE-004', 466, 3),
('FUI/FURC-SP-16-BCSE-005', 465, 5),
('FUI/FURC-SP-16-BCSE-005', 466, 2),
('FUI/FURC-SP-16-BCSE-006', 465, 4),
('FUI/FURC-SP-16-BCSE-006', 466, 2),
('FUI/FURC-SP-16-BCSE-004', 467, 4),
('FUI/FURC-SP-16-BCSE-004', 468, 3),
('FUI/FURC-SP-16-BCSE-005', 467, 2),
('FUI/FURC-SP-16-BCSE-005', 468, 5),
('FUI/FURC-SP-16-BCSE-006', 467, 1),
('FUI/FURC-SP-16-BCSE-006', 468, 5),
('FUI/FURC-F-16-BCSE-001', 469, 24),
('FUI/FURC-F-16-BCSE-001', 470, 10),
('FUI/FURC-F-16-BCSE-002', 469, 25),
('FUI/FURC-F-16-BCSE-002', 470, 11),
('FUI/FURC-F-16-BCSE-003', 469, 22),
('FUI/FURC-F-16-BCSE-003', 470, 18),
('FUI/FURC-F-16-BCSE-001', 471, 11),
('FUI/FURC-F-16-BCSE-001', 472, 7),
('FUI/FURC-F-16-BCSE-002', 471, 13),
('FUI/FURC-F-16-BCSE-002', 472, 5),
('FUI/FURC-F-16-BCSE-003', 471, 14),
('FUI/FURC-F-16-BCSE-003', 472, 7),
('FUI/FURC-F-16-BCSE-001', 473, 4),
('FUI/FURC-F-16-BCSE-001', 474, 3),
('FUI/FURC-F-16-BCSE-002', 473, 2),
('FUI/FURC-F-16-BCSE-002', 474, 5),
('FUI/FURC-F-16-BCSE-003', 473, 0),
('FUI/FURC-F-16-BCSE-003', 474, 4),
('FUI/FURC-F-16-BCSE-001', 475, 0),
('FUI/FURC-F-16-BCSE-001', 476, 4),
('FUI/FURC-F-16-BCSE-002', 475, 3),
('FUI/FURC-F-16-BCSE-002', 476, 2),
('FUI/FURC-F-16-BCSE-003', 475, 5),
('FUI/FURC-F-16-BCSE-003', 476, 4),
('FUI/FURC-F-16-BCSE-001', 477, 4),
('FUI/FURC-F-16-BCSE-001', 478, 2),
('FUI/FURC-F-16-BCSE-002', 477, 5),
('FUI/FURC-F-16-BCSE-002', 478, 1),
('FUI/FURC-F-16-BCSE-003', 477, 3),
('FUI/FURC-F-16-BCSE-003', 478, 4),
('FUI/FURC-F-16-BCSE-004', 479, 4),
('FUI/FURC-F-16-BCSE-004', 480, 3),
('FUI/FURC-F-16-BCSE-005', 479, 1),
('FUI/FURC-F-16-BCSE-005', 480, 5),
('FUI/FURC-F-16-BCSE-006', 479, 2),
('FUI/FURC-F-16-BCSE-006', 480, 4),
('FUI/FURC-F-16-BCSE-004', 481, 1),
('FUI/FURC-F-16-BCSE-004', 482, 5),
('FUI/FURC-F-16-BCSE-005', 481, 2),
('FUI/FURC-F-16-BCSE-005', 482, 3),
('FUI/FURC-F-16-BCSE-006', 481, 4),
('FUI/FURC-F-16-BCSE-006', 482, 2),
('FUI/FURC-F-16-BCSE-004', 483, 4),
('FUI/FURC-F-16-BCSE-004', 484, 3),
('FUI/FURC-F-16-BCSE-005', 483, 0),
('FUI/FURC-F-16-BCSE-005', 484, 5),
('FUI/FURC-F-16-BCSE-006', 483, 2),
('FUI/FURC-F-16-BCSE-006', 484, 4),
('FUI/FURC-F-16-BCSE-004', 485, 10),
('FUI/FURC-F-16-BCSE-004', 486, 4),
('FUI/FURC-F-16-BCSE-005', 485, 12),
('FUI/FURC-F-16-BCSE-005', 486, 7),
('FUI/FURC-F-16-BCSE-006', 485, 14),
('FUI/FURC-F-16-BCSE-006', 486, 8),
('FUI/FURC-F-16-BCSE-004', 487, 35),
('FUI/FURC-F-16-BCSE-004', 488, 7),
('FUI/FURC-F-16-BCSE-005', 487, 35),
('FUI/FURC-F-16-BCSE-005', 488, 5),
('FUI/FURC-F-16-BCSE-006', 487, 25),
('FUI/FURC-F-16-BCSE-006', 488, 5),
('FUI/FURC-F-16-BCSE-001', 489, 4),
('FUI/FURC-F-16-BCSE-001', 490, 0),
('FUI/FURC-F-16-BCSE-002', 489, 0),
('FUI/FURC-F-16-BCSE-002', 490, 1),
('FUI/FURC-F-16-BCSE-003', 489, 5),
('FUI/FURC-F-16-BCSE-003', 490, 4),
('FUI/FURC-F-16-BCSE-001', 491, 4),
('FUI/FURC-F-16-BCSE-001', 492, 3),
('FUI/FURC-F-16-BCSE-002', 491, 5),
('FUI/FURC-F-16-BCSE-002', 492, 5),
('FUI/FURC-F-16-BCSE-003', 491, 0),
('FUI/FURC-F-16-BCSE-003', 492, 4),
('FUI/FURC-F-16-BCSE-001', 493, 0),
('FUI/FURC-F-16-BCSE-001', 494, 1),
('FUI/FURC-F-16-BCSE-002', 493, 3),
('FUI/FURC-F-16-BCSE-002', 494, 4),
('FUI/FURC-F-16-BCSE-003', 493, 2),
('FUI/FURC-F-16-BCSE-003', 494, 5),
('FUI/FURC-F-16-BCSE-001', 495, 6),
('FUI/FURC-F-16-BCSE-001', 496, 14),
('FUI/FURC-F-16-BCSE-002', 495, 7),
('FUI/FURC-F-16-BCSE-002', 496, 11),
('FUI/FURC-F-16-BCSE-003', 495, 6),
('FUI/FURC-F-16-BCSE-003', 496, 14),
('FUI/FURC-F-16-BCSE-001', 497, 14),
('FUI/FURC-F-16-BCSE-001', 498, 25),
('FUI/FURC-F-16-BCSE-002', 497, 20),
('FUI/FURC-F-16-BCSE-002', 498, 18),
('FUI/FURC-F-16-BCSE-003', 497, 16),
('FUI/FURC-F-16-BCSE-003', 498, 22),
('FUI/FURC-F-16-BCSE-004', 499, 1),
('FUI/FURC-F-16-BCSE-004', 500, 3),
('FUI/FURC-F-16-BCSE-005', 499, 4),
('FUI/FURC-F-16-BCSE-005', 500, 2),
('FUI/FURC-F-16-BCSE-006', 499, 5),
('FUI/FURC-F-16-BCSE-006', 500, 1),
('FUI/FURC-F-16-BCSE-004', 501, 3),
('FUI/FURC-F-16-BCSE-004', 502, 1),
('FUI/FURC-F-16-BCSE-005', 501, 2),
('FUI/FURC-F-16-BCSE-005', 502, 0),
('FUI/FURC-F-16-BCSE-006', 501, 5),
('FUI/FURC-F-16-BCSE-006', 502, 2),
('FUI/FURC-F-16-BCSE-004', 503, 3),
('FUI/FURC-F-16-BCSE-004', 504, 2),
('FUI/FURC-F-16-BCSE-005', 503, 5),
('FUI/FURC-F-16-BCSE-005', 504, 5),
('FUI/FURC-F-16-BCSE-006', 503, 2),
('FUI/FURC-F-16-BCSE-006', 504, 4),
('FUI/FURC-F-16-BCSE-004', 505, 7),
('FUI/FURC-F-16-BCSE-004', 506, 11),
('FUI/FURC-F-16-BCSE-005', 505, 6),
('FUI/FURC-F-16-BCSE-005', 506, 14),
('FUI/FURC-F-16-BCSE-006', 505, 8),
('FUI/FURC-F-16-BCSE-006', 506, 13),
('FUI/FURC-F-16-BCSE-004', 507, 35),
('FUI/FURC-F-16-BCSE-004', 508, 7),
('FUI/FURC-F-16-BCSE-005', 507, 30),
('FUI/FURC-F-16-BCSE-005', 508, 5),
('FUI/FURC-F-16-BCSE-006', 507, 36),
('FUI/FURC-F-16-BCSE-006', 508, 8),
('FUI/FURC-SP-15-BCSE-001', 526, 0),
('FUI/FURC-SP-15-BCSE-002', 526, 5),
('FUI/FURC-SP-15-BCSE-003', 526, 9),
('FUI/FURC-SP-15-BCSE-001', 529, 0),
('FUI/FURC-SP-15-BCSE-002', 529, 10),
('FUI/FURC-SP-15-BCSE-003', 529, 10),
('FUI/FURC-SP-15-BCSE-001', 530, 0),
('FUI/FURC-SP-15-BCSE-002', 530, 20),
('FUI/FURC-SP-15-BCSE-003', 530, 19),
('FUI/FURC-SP-15-BCSE-001', 531, 0),
('FUI/FURC-SP-15-BCSE-002', 531, 16),
('FUI/FURC-SP-15-BCSE-003', 531, 15),
('FUI/FURC-SP-15-BCSE-001', 532, 0),
('FUI/FURC-SP-15-BCSE-002', 532, 10),
('FUI/FURC-SP-15-BCSE-003', 532, 10),
('FUI/FURC-SP-15-BCSE-001', 524, 10),
('FUI/FURC-SP-15-BCSE-001', 525, 5),
('FUI/FURC-SP-15-BCSE-002', 524, 0),
('FUI/FURC-SP-15-BCSE-002', 525, 0),
('FUI/FURC-SP-15-BCSE-003', 524, 0),
('FUI/FURC-SP-15-BCSE-003', 525, 0);

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
('FUI/FURC-SP-15-BCSE-001', 63, 10),
('FUI/FURC-SP-15-BCSE-002', 63, 10),
('FUI/FURC-SP-15-BCSE-003', 63, 10),
('FUI/FURC-SP-15-BCSE-001', 64, 2),
('FUI/FURC-SP-15-BCSE-002', 64, 2),
('FUI/FURC-SP-15-BCSE-003', 64, 2),
('FUI/FURC-SP-15-BCSE-004', 65, 10),
('FUI/FURC-SP-15-BCSE-005', 65, 15),
('FUI/FURC-SP-15-BCSE-006', 65, 10),
('FUI/FURC-SP-15-BCSE-004', 66, 15),
('FUI/FURC-SP-15-BCSE-005', 66, 17),
('FUI/FURC-SP-15-BCSE-006', 66, 12),
('FUI/FURC-SP-15-BCSE-004', 67, 10),
('FUI/FURC-SP-15-BCSE-005', 67, 6),
('FUI/FURC-SP-15-BCSE-006', 67, 5),
('FUI/FURC-SP-15-BCSE-001', 68, 7),
('FUI/FURC-SP-15-BCSE-002', 68, 6),
('FUI/FURC-SP-15-BCSE-003', 68, 6),
('FUI/FURC-SP-15-BCSE-001', 69, 4),
('FUI/FURC-SP-15-BCSE-002', 69, 7),
('FUI/FURC-SP-15-BCSE-003', 69, 4),
('FUI/FURC-SP-15-BCSE-001', 70, 23),
('FUI/FURC-SP-15-BCSE-002', 70, 9),
('FUI/FURC-SP-15-BCSE-003', 70, 13),
('FUI/FURC-SP-15-BCSE-001', 71, 35),
('FUI/FURC-SP-15-BCSE-002', 71, 18),
('FUI/FURC-SP-15-BCSE-003', 71, 14),
('FUI/FURC-SP-15-BCSE-001', 72, 10),
('FUI/FURC-SP-15-BCSE-002', 72, 5),
('FUI/FURC-SP-15-BCSE-003', 72, 0),
('FUI/FURC-SP-15-BCSE-001', 73, 10),
('FUI/FURC-SP-15-BCSE-002', 73, 10),
('FUI/FURC-SP-15-BCSE-003', 73, 10),
('FUI/FURC-SP-15-BCSE-001', 74, 10),
('FUI/FURC-SP-15-BCSE-002', 74, 21),
('FUI/FURC-SP-15-BCSE-003', 74, 8),
('FUI/FURC-SP-15-BCSE-001', 75, 35),
('FUI/FURC-SP-15-BCSE-002', 75, 28),
('FUI/FURC-SP-15-BCSE-003', 75, 23),
('FUI/FURC-SP-15-BCSE-004', 76, 2),
('FUI/FURC-SP-15-BCSE-005', 76, 4),
('FUI/FURC-SP-15-BCSE-006', 76, 2),
('FUI/FURC-SP-15-BCSE-004', 77, 7),
('FUI/FURC-SP-15-BCSE-005', 77, 3),
('FUI/FURC-SP-15-BCSE-006', 77, 6),
('FUI/FURC-SP-15-BCSE-004', 78, 30),
('FUI/FURC-SP-15-BCSE-005', 78, 39),
('FUI/FURC-SP-15-BCSE-006', 78, 21),
('FUI/FURC-SP-15-BCSE-004', 79, 7),
('FUI/FURC-SP-15-BCSE-005', 79, 1),
('FUI/FURC-SP-15-BCSE-006', 79, 9),
('FUI/FURC-SP-15-BCSE-004', 80, 9),
('FUI/FURC-SP-15-BCSE-005', 80, 2),
('FUI/FURC-SP-15-BCSE-006', 80, 7),
('FUI/FURC-SP-15-BCSE-004', 81, 19),
('FUI/FURC-SP-15-BCSE-005', 81, 18),
('FUI/FURC-SP-15-BCSE-006', 81, 18),
('FUI/FURC-SP-15-BCSE-004', 82, 35),
('FUI/FURC-SP-15-BCSE-005', 82, 29),
('FUI/FURC-SP-15-BCSE-006', 82, 44),
('FUI/FURC-SP-15-BCSE-001', 83, 10),
('FUI/FURC-SP-15-BCSE-002', 83, 10),
('FUI/FURC-SP-15-BCSE-003', 83, 10),
('FUI/FURC-SP-15-BCSE-001', 84, 4),
('FUI/FURC-SP-15-BCSE-002', 84, 2),
('FUI/FURC-SP-15-BCSE-003', 84, 6),
('FUI/FURC-SP-15-BCSE-001', 85, 8),
('FUI/FURC-SP-15-BCSE-002', 85, 2),
('FUI/FURC-SP-15-BCSE-003', 85, 9),
('FUI/FURC-SP-15-BCSE-001', 86, 24),
('FUI/FURC-SP-15-BCSE-002', 86, 8),
('FUI/FURC-SP-15-BCSE-003', 86, 14),
('FUI/FURC-SP-15-BCSE-001', 87, 40),
('FUI/FURC-SP-15-BCSE-002', 87, 20),
('FUI/FURC-SP-15-BCSE-003', 87, 30),
('FUI/FURC-SP-15-BCSE-001', 88, 8),
('FUI/FURC-SP-15-BCSE-002', 88, 6),
('FUI/FURC-SP-15-BCSE-003', 88, 3),
('FUI/FURC-SP-15-BCSE-001', 89, 5),
('FUI/FURC-SP-15-BCSE-002', 89, 8),
('FUI/FURC-SP-15-BCSE-003', 89, 2),
('FUI/FURC-SP-15-BCSE-001', 90, 4),
('FUI/FURC-SP-15-BCSE-002', 90, 5),
('FUI/FURC-SP-15-BCSE-003', 90, 5),
('FUI/FURC-SP-15-BCSE-001', 91, 17),
('FUI/FURC-SP-15-BCSE-002', 91, 15),
('FUI/FURC-SP-15-BCSE-003', 91, 9),
('FUI/FURC-SP-15-BCSE-001', 92, 20),
('FUI/FURC-SP-15-BCSE-002', 92, 39),
('FUI/FURC-SP-15-BCSE-003', 92, 40),
('FUI/FURC-SP-15-BCSE-004', 93, 2),
('FUI/FURC-SP-15-BCSE-005', 93, 1),
('FUI/FURC-SP-15-BCSE-006', 93, 0),
('FUI/FURC-SP-15-BCSE-004', 94, 2),
('FUI/FURC-SP-15-BCSE-005', 94, 2),
('FUI/FURC-SP-15-BCSE-006', 94, 4),
('FUI/FURC-SP-15-BCSE-004', 95, 4),
('FUI/FURC-SP-15-BCSE-005', 95, 3),
('FUI/FURC-SP-15-BCSE-006', 95, 3),
('FUI/FURC-SP-15-BCSE-004', 96, 19),
('FUI/FURC-SP-15-BCSE-005', 96, 12),
('FUI/FURC-SP-15-BCSE-006', 96, 13),
('FUI/FURC-SP-15-BCSE-004', 97, 19),
('FUI/FURC-SP-15-BCSE-005', 97, 45),
('FUI/FURC-SP-15-BCSE-006', 97, 33),
('FUI/FURC-SP-15-BCSE-004', 98, 3),
('FUI/FURC-SP-15-BCSE-005', 98, 3),
('FUI/FURC-SP-15-BCSE-006', 98, 5),
('FUI/FURC-SP-15-BCSE-004', 99, 1),
('FUI/FURC-SP-15-BCSE-005', 99, 1),
('FUI/FURC-SP-15-BCSE-006', 99, 0),
('FUI/FURC-SP-15-BCSE-004', 100, 2),
('FUI/FURC-SP-15-BCSE-005', 100, 3),
('FUI/FURC-SP-15-BCSE-006', 100, 2),
('FUI/FURC-SP-15-BCSE-004', 101, 21),
('FUI/FURC-SP-15-BCSE-005', 101, 10),
('FUI/FURC-SP-15-BCSE-006', 101, 19),
('FUI/FURC-SP-15-BCSE-004', 102, 44),
('FUI/FURC-SP-15-BCSE-005', 102, 19),
('FUI/FURC-SP-15-BCSE-006', 102, 29),
('FUI/FURC-F-15-BCSE-001', 103, 1),
('FUI/FURC-F-15-BCSE-002', 103, 1),
('FUI/FURC-F-15-BCSE-003', 103, 0),
('FUI/FURC-F-15-BCSE-001', 104, 1),
('FUI/FURC-F-15-BCSE-002', 104, 0),
('FUI/FURC-F-15-BCSE-003', 104, 2),
('FUI/FURC-F-15-BCSE-001', 105, 2),
('FUI/FURC-F-15-BCSE-002', 105, 2),
('FUI/FURC-F-15-BCSE-003', 105, 2),
('FUI/FURC-F-15-BCSE-001', 106, 23),
('FUI/FURC-F-15-BCSE-002', 106, 15),
('FUI/FURC-F-15-BCSE-003', 106, 17),
('FUI/FURC-F-15-BCSE-001', 107, 41),
('FUI/FURC-F-15-BCSE-002', 107, 42),
('FUI/FURC-F-15-BCSE-003', 107, 47),
('FUI/FURC-F-15-BCSE-004', 108, 3),
('FUI/FURC-F-15-BCSE-005', 108, 1),
('FUI/FURC-F-15-BCSE-006', 108, 2),
('FUI/FURC-F-15-BCSE-004', 109, 3),
('FUI/FURC-F-15-BCSE-005', 109, 3),
('FUI/FURC-F-15-BCSE-006', 109, 2),
('FUI/FURC-F-15-BCSE-004', 110, 1),
('FUI/FURC-F-15-BCSE-005', 110, 2),
('FUI/FURC-F-15-BCSE-006', 110, 1),
('FUI/FURC-F-15-BCSE-004', 111, 15),
('FUI/FURC-F-15-BCSE-005', 111, 23),
('FUI/FURC-F-15-BCSE-006', 111, 16),
('FUI/FURC-F-15-BCSE-004', 112, 44),
('FUI/FURC-F-15-BCSE-005', 112, 30),
('FUI/FURC-F-15-BCSE-006', 112, 34),
('FUI/FURC-F-15-BCSE-001', 113, 1),
('FUI/FURC-F-15-BCSE-002', 113, 2),
('FUI/FURC-F-15-BCSE-003', 113, 0),
('FUI/FURC-F-15-BCSE-001', 114, 2),
('FUI/FURC-F-15-BCSE-002', 114, 2),
('FUI/FURC-F-15-BCSE-003', 114, 4),
('FUI/FURC-F-15-BCSE-001', 115, 1),
('FUI/FURC-F-15-BCSE-002', 115, 0),
('FUI/FURC-F-15-BCSE-003', 115, 1),
('FUI/FURC-F-15-BCSE-001', 116, 15),
('FUI/FURC-F-15-BCSE-002', 116, 17),
('FUI/FURC-F-15-BCSE-003', 116, 23),
('FUI/FURC-F-15-BCSE-001', 117, 40),
('FUI/FURC-F-15-BCSE-002', 117, 41),
('FUI/FURC-F-15-BCSE-003', 117, 39),
('FUI/FURC-F-15-BCSE-004', 118, 1),
('FUI/FURC-F-15-BCSE-005', 118, 2),
('FUI/FURC-F-15-BCSE-006', 118, 0),
('FUI/FURC-F-15-BCSE-004', 119, 2),
('FUI/FURC-F-15-BCSE-005', 119, 2),
('FUI/FURC-F-15-BCSE-006', 119, 4),
('FUI/FURC-F-15-BCSE-004', 120, 7),
('FUI/FURC-F-15-BCSE-005', 120, 3),
('FUI/FURC-F-15-BCSE-006', 120, 9),
('FUI/FURC-F-15-BCSE-004', 121, 23),
('FUI/FURC-F-15-BCSE-005', 121, 17),
('FUI/FURC-F-15-BCSE-006', 121, 19),
('FUI/FURC-F-15-BCSE-004', 122, 34),
('FUI/FURC-F-15-BCSE-005', 122, 42),
('FUI/FURC-F-15-BCSE-006', 122, 42),
('FUI/FURC-SP-15-BCSE-001', 123, 10),
('FUI/FURC-SP-15-BCSE-002', 123, 10),
('FUI/FURC-SP-15-BCSE-003', 123, 10),
('FUI/FURC-SP-16-BCSE-001', 124, 10),
('FUI/FURC-SP-16-BCSE-002', 124, 10),
('FUI/FURC-SP-16-BCSE-003', 124, 10),
('FUI/FURC-SP-15-BCSE-001', 125, 1),
('FUI/FURC-SP-15-BCSE-002', 125, 2),
('FUI/FURC-SP-15-BCSE-003', 125, 1),
('FUI/FURC-SP-15-BCSE-001', 126, 5),
('FUI/FURC-SP-15-BCSE-002', 126, 7),
('FUI/FURC-SP-15-BCSE-003', 126, 5),
('FUI/FURC-SP-15-BCSE-001', 127, 5),
('FUI/FURC-SP-15-BCSE-002', 127, 3),
('FUI/FURC-SP-15-BCSE-003', 127, 4),
('FUI/FURC-SP-15-BCSE-001', 128, 24),
('FUI/FURC-SP-15-BCSE-002', 128, 12),
('FUI/FURC-SP-15-BCSE-003', 128, 18),
('FUI/FURC-SP-15-BCSE-001', 129, 22),
('FUI/FURC-SP-15-BCSE-002', 129, 35),
('FUI/FURC-SP-15-BCSE-003', 129, 40),
('FUI/FURC-SP-15-BCSE-004', 130, 23),
('FUI/FURC-SP-15-BCSE-005', 130, 15),
('FUI/FURC-SP-15-BCSE-006', 130, 19),
('FUI/FURC-SP-15-BCSE-004', 131, 42),
('FUI/FURC-SP-15-BCSE-005', 131, 40),
('FUI/FURC-SP-15-BCSE-006', 131, 47),
('FUI/FURC-SP-15-BCSE-004', 132, 7),
('FUI/FURC-SP-15-BCSE-005', 132, 6),
('FUI/FURC-SP-15-BCSE-006', 132, 7),
('FUI/FURC-SP-15-BCSE-004', 133, 4),
('FUI/FURC-SP-15-BCSE-005', 133, 8),
('FUI/FURC-SP-15-BCSE-006', 133, 6),
('FUI/FURC-SP-15-BCSE-004', 134, 5),
('FUI/FURC-SP-15-BCSE-005', 134, 7),
('FUI/FURC-SP-15-BCSE-006', 134, 7),
('FUI/FURC-SP-15-BCSE-001', 135, 18),
('FUI/FURC-SP-15-BCSE-002', 135, 18),
('FUI/FURC-SP-15-BCSE-003', 135, 17),
('FUI/FURC-SP-15-BCSE-001', 136, 31),
('FUI/FURC-SP-15-BCSE-002', 136, 37),
('FUI/FURC-SP-15-BCSE-003', 136, 37),
('FUI/FURC-SP-15-BCSE-001', 137, 6),
('FUI/FURC-SP-15-BCSE-002', 137, 8),
('FUI/FURC-SP-15-BCSE-003', 137, 6),
('FUI/FURC-SP-15-BCSE-001', 138, 7),
('FUI/FURC-SP-15-BCSE-002', 138, 1),
('FUI/FURC-SP-15-BCSE-003', 138, 8),
('FUI/FURC-SP-15-BCSE-004', 139, 19),
('FUI/FURC-SP-15-BCSE-005', 139, 10),
('FUI/FURC-SP-15-BCSE-006', 139, 21),
('FUI/FURC-SP-15-BCSE-004', 140, 40),
('FUI/FURC-SP-15-BCSE-005', 140, 39),
('FUI/FURC-SP-15-BCSE-006', 140, 25),
('FUI/FURC-SP-15-BCSE-004', 141, 7),
('FUI/FURC-SP-15-BCSE-005', 141, 5),
('FUI/FURC-SP-15-BCSE-006', 141, 6),
('FUI/FURC-SP-15-BCSE-004', 142, 2),
('FUI/FURC-SP-15-BCSE-005', 142, 9),
('FUI/FURC-SP-15-BCSE-006', 142, 8),
('FUI/FURC-SP-15-BCSE-004', 143, 9),
('FUI/FURC-SP-15-BCSE-005', 143, 9),
('FUI/FURC-SP-15-BCSE-006', 143, 10),
('FUI/FURC-F-15-BCSE-001', 144, 19),
('FUI/FURC-F-15-BCSE-002', 144, 20),
('FUI/FURC-F-15-BCSE-003', 144, 21),
('FUI/FURC-F-15-BCSE-001', 145, 29),
('FUI/FURC-F-15-BCSE-002', 145, 39),
('FUI/FURC-F-15-BCSE-003', 145, 45),
('FUI/FURC-F-15-BCSE-001', 146, 4),
('FUI/FURC-F-15-BCSE-002', 146, 8),
('FUI/FURC-F-15-BCSE-003', 146, 6),
('FUI/FURC-F-15-BCSE-001', 147, 5),
('FUI/FURC-F-15-BCSE-002', 147, 4),
('FUI/FURC-F-15-BCSE-003', 147, 9),
('FUI/FURC-F-15-BCSE-001', 148, 4),
('FUI/FURC-F-15-BCSE-002', 148, 5),
('FUI/FURC-F-15-BCSE-003', 148, 0),
('FUI/FURC-F-15-BCSE-004', 149, 19),
('FUI/FURC-F-15-BCSE-005', 149, 20),
('FUI/FURC-F-15-BCSE-006', 149, 18),
('FUI/FURC-F-15-BCSE-004', 150, 35),
('FUI/FURC-F-15-BCSE-005', 150, 36),
('FUI/FURC-F-15-BCSE-006', 150, 36),
('FUI/FURC-F-15-BCSE-004', 151, 9),
('FUI/FURC-F-15-BCSE-005', 151, 3),
('FUI/FURC-F-15-BCSE-006', 151, 4),
('FUI/FURC-F-15-BCSE-004', 152, 4),
('FUI/FURC-F-15-BCSE-005', 152, 4),
('FUI/FURC-F-15-BCSE-006', 152, 6),
('FUI/FURC-F-15-BCSE-004', 153, 4),
('FUI/FURC-F-15-BCSE-005', 153, 7),
('FUI/FURC-F-15-BCSE-006', 153, 4),
('FUI/FURC-F-15-BCSE-001', 154, 18),
('FUI/FURC-F-15-BCSE-002', 154, 21),
('FUI/FURC-F-15-BCSE-003', 154, 18),
('FUI/FURC-F-15-BCSE-001', 155, 43),
('FUI/FURC-F-15-BCSE-002', 155, 35),
('FUI/FURC-F-15-BCSE-003', 155, 44),
('FUI/FURC-F-15-BCSE-001', 156, 4),
('FUI/FURC-F-15-BCSE-002', 156, 4),
('FUI/FURC-F-15-BCSE-003', 156, 5),
('FUI/FURC-F-15-BCSE-001', 157, 4),
('FUI/FURC-F-15-BCSE-002', 157, 4),
('FUI/FURC-F-15-BCSE-003', 157, 6),
('FUI/FURC-F-15-BCSE-001', 158, 4),
('FUI/FURC-F-15-BCSE-002', 158, 4),
('FUI/FURC-F-15-BCSE-003', 158, 5),
('FUI/FURC-F-15-BCSE-004', 159, 7),
('FUI/FURC-F-15-BCSE-005', 159, 7),
('FUI/FURC-F-15-BCSE-006', 159, 4),
('FUI/FURC-F-15-BCSE-004', 160, 7),
('FUI/FURC-F-15-BCSE-005', 160, 6),
('FUI/FURC-F-15-BCSE-006', 160, 9),
('FUI/FURC-F-15-BCSE-004', 161, 7),
('FUI/FURC-F-15-BCSE-005', 161, 6),
('FUI/FURC-F-15-BCSE-006', 161, 7),
('FUI/FURC-F-15-BCSE-004', 162, 15),
('FUI/FURC-F-15-BCSE-005', 162, 23),
('FUI/FURC-F-15-BCSE-006', 162, 18),
('FUI/FURC-F-15-BCSE-004', 163, 42),
('FUI/FURC-F-15-BCSE-005', 163, 38),
('FUI/FURC-F-15-BCSE-006', 163, 44),
('FUI/FURC-SP-16-BCSE-001', 164, 21),
('FUI/FURC-SP-16-BCSE-002', 164, 15),
('FUI/FURC-SP-16-BCSE-003', 164, 18),
('FUI/FURC-SP-16-BCSE-001', 165, 35),
('FUI/FURC-SP-16-BCSE-002', 165, 36),
('FUI/FURC-SP-16-BCSE-003', 165, 45),
('FUI/FURC-SP-16-BCSE-001', 166, 7),
('FUI/FURC-SP-16-BCSE-002', 166, 6),
('FUI/FURC-SP-16-BCSE-003', 166, 6),
('FUI/FURC-SP-16-BCSE-001', 167, 7),
('FUI/FURC-SP-16-BCSE-002', 167, 6),
('FUI/FURC-SP-16-BCSE-003', 167, 7),
('FUI/FURC-SP-16-BCSE-001', 168, 5),
('FUI/FURC-SP-16-BCSE-002', 168, 7),
('FUI/FURC-SP-16-BCSE-003', 168, 10),
('FUI/FURC-SP-16-BCSE-004', 169, 3),
('FUI/FURC-SP-16-BCSE-005', 169, 7),
('FUI/FURC-SP-16-BCSE-006', 169, 6),
('FUI/FURC-SP-16-BCSE-004', 170, 7),
('FUI/FURC-SP-16-BCSE-005', 170, 6),
('FUI/FURC-SP-16-BCSE-006', 170, 6),
('FUI/FURC-SP-16-BCSE-004', 171, 7),
('FUI/FURC-SP-16-BCSE-005', 171, 7),
('FUI/FURC-SP-16-BCSE-006', 171, 6),
('FUI/FURC-SP-16-BCSE-004', 172, 14),
('FUI/FURC-SP-16-BCSE-005', 172, 21),
('FUI/FURC-SP-16-BCSE-006', 172, 20),
('FUI/FURC-SP-16-BCSE-004', 173, 34),
('FUI/FURC-SP-16-BCSE-005', 173, 44),
('FUI/FURC-SP-16-BCSE-006', 173, 35),
('FUI/FURC-SP-16-BCSE-001', 174, 45),
('FUI/FURC-SP-16-BCSE-002', 174, 25),
('FUI/FURC-SP-16-BCSE-003', 174, 37),
('FUI/FURC-SP-16-BCSE-001', 175, 14),
('FUI/FURC-SP-16-BCSE-002', 175, 12),
('FUI/FURC-SP-16-BCSE-003', 175, 23),
('FUI/FURC-SP-16-BCSE-001', 176, 7),
('FUI/FURC-SP-16-BCSE-002', 176, 0),
('FUI/FURC-SP-16-BCSE-003', 176, 9),
('FUI/FURC-SP-16-BCSE-001', 177, 1),
('FUI/FURC-SP-16-BCSE-002', 177, 8),
('FUI/FURC-SP-16-BCSE-003', 177, 5),
('FUI/FURC-SP-16-BCSE-004', 178, 34),
('FUI/FURC-SP-16-BCSE-005', 178, 43),
('FUI/FURC-SP-16-BCSE-006', 178, 37),
('FUI/FURC-SP-16-BCSE-004', 179, 18),
('FUI/FURC-SP-16-BCSE-005', 179, 18),
('FUI/FURC-SP-16-BCSE-006', 179, 18),
('FUI/FURC-SP-16-BCSE-004', 180, 7),
('FUI/FURC-SP-16-BCSE-005', 180, 5),
('FUI/FURC-SP-16-BCSE-006', 180, 1),
('FUI/FURC-SP-16-BCSE-004', 181, 9),
('FUI/FURC-SP-16-BCSE-005', 181, 3),
('FUI/FURC-SP-16-BCSE-006', 181, 9),
('FUI/FURC-SP-16-BCSE-004', 182, 0),
('FUI/FURC-SP-16-BCSE-005', 182, 7),
('FUI/FURC-SP-16-BCSE-006', 182, 10),
('FUI/FURC-SP-15-BCSE-004', 190, 15),
('FUI/FURC-SP-15-BCSE-005', 190, 14),
('FUI/FURC-SP-15-BCSE-006', 190, 21),
('FUI/FURC-SP-15-BCSE-001', 193, 35),
('FUI/FURC-SP-15-BCSE-002', 193, 30),
('FUI/FURC-SP-15-BCSE-003', 193, 37),
('FUI/FURC-SP-15-BCSE-001', 194, 15),
('FUI/FURC-SP-15-BCSE-002', 194, 15),
('FUI/FURC-SP-15-BCSE-003', 194, 20),
('FUI/FURC-SP-15-BCSE-001', 195, 4),
('FUI/FURC-SP-15-BCSE-002', 195, 8),
('FUI/FURC-SP-15-BCSE-003', 195, 7),
('FUI/FURC-SP-15-BCSE-001', 196, 4),
('FUI/FURC-SP-15-BCSE-002', 196, 8),
('FUI/FURC-SP-15-BCSE-003', 196, 5),
('FUI/FURC-SP-15-BCSE-004', 198, 31),
('FUI/FURC-SP-15-BCSE-005', 198, 39),
('FUI/FURC-SP-15-BCSE-006', 198, 30),
('FUI/FURC-SP-15-BCSE-004', 199, 20),
('FUI/FURC-SP-15-BCSE-005', 199, 19),
('FUI/FURC-SP-15-BCSE-006', 199, 18),
('FUI/FURC-SP-15-BCSE-004', 200, 7),
('FUI/FURC-SP-15-BCSE-005', 200, 5),
('FUI/FURC-SP-15-BCSE-006', 200, 6),
('FUI/FURC-SP-15-BCSE-004', 201, 6),
('FUI/FURC-SP-15-BCSE-005', 201, 3),
('FUI/FURC-SP-15-BCSE-006', 201, 6),
('FUI/FURC-SP-15-BCSE-004', 202, 5),
('FUI/FURC-SP-15-BCSE-005', 202, 10),
('FUI/FURC-SP-15-BCSE-006', 202, 7),
('FUI/FURC-F-15-BCSE-001', 203, 50),
('FUI/FURC-F-15-BCSE-002', 203, 50),
('FUI/FURC-F-15-BCSE-003', 203, 50),
('FUI/FURC-F-15-BCSE-001', 204, 25),
('FUI/FURC-F-15-BCSE-002', 204, 25),
('FUI/FURC-F-15-BCSE-003', 204, 25),
('FUI/FURC-F-15-BCSE-001', 205, 10),
('FUI/FURC-F-15-BCSE-002', 205, 6),
('FUI/FURC-F-15-BCSE-003', 205, 7),
('FUI/FURC-F-15-BCSE-001', 206, 10),
('FUI/FURC-F-15-BCSE-002', 206, 6),
('FUI/FURC-F-15-BCSE-003', 206, 6),
('FUI/FURC-F-15-BCSE-001', 207, 10),
('FUI/FURC-F-15-BCSE-002', 207, 6),
('FUI/FURC-F-15-BCSE-003', 207, 7),
('FUI/FURC-F-15-BCSE-004', 208, 30),
('FUI/FURC-F-15-BCSE-005', 208, 39),
('FUI/FURC-F-15-BCSE-006', 208, 38),
('FUI/FURC-F-15-BCSE-004', 209, 18),
('FUI/FURC-F-15-BCSE-005', 209, 17),
('FUI/FURC-F-15-BCSE-006', 209, 16),
('FUI/FURC-F-15-BCSE-004', 210, 5),
('FUI/FURC-F-15-BCSE-005', 210, 5),
('FUI/FURC-F-15-BCSE-006', 210, 9),
('FUI/FURC-F-15-BCSE-004', 211, 4),
('FUI/FURC-F-15-BCSE-005', 211, 8),
('FUI/FURC-F-15-BCSE-006', 211, 4),
('FUI/FURC-F-15-BCSE-004', 212, 4),
('FUI/FURC-F-15-BCSE-005', 212, 6),
('FUI/FURC-F-15-BCSE-006', 212, 7),
('FUI/FURC-F-15-BCSE-001', 213, 7),
('FUI/FURC-F-15-BCSE-002', 213, 6),
('FUI/FURC-F-15-BCSE-003', 213, 4),
('FUI/FURC-F-15-BCSE-001', 214, 5),
('FUI/FURC-F-15-BCSE-002', 214, 4),
('FUI/FURC-F-15-BCSE-003', 214, 6),
('FUI/FURC-F-15-BCSE-001', 215, 4),
('FUI/FURC-F-15-BCSE-002', 215, 6),
('FUI/FURC-F-15-BCSE-003', 215, 7),
('FUI/FURC-F-15-BCSE-001', 216, 21),
('FUI/FURC-F-15-BCSE-002', 216, 17),
('FUI/FURC-F-15-BCSE-003', 216, 16),
('FUI/FURC-F-15-BCSE-001', 217, 35),
('FUI/FURC-F-15-BCSE-002', 217, 36),
('FUI/FURC-F-15-BCSE-003', 217, 42),
('FUI/FURC-F-15-BCSE-004', 218, 36),
('FUI/FURC-F-15-BCSE-005', 218, 36),
('FUI/FURC-F-15-BCSE-006', 218, 36),
('FUI/FURC-F-15-BCSE-004', 219, 18),
('FUI/FURC-F-15-BCSE-005', 219, 19),
('FUI/FURC-F-15-BCSE-006', 219, 15),
('FUI/FURC-F-15-BCSE-004', 220, 7),
('FUI/FURC-F-15-BCSE-005', 220, 7),
('FUI/FURC-F-15-BCSE-006', 220, 4),
('FUI/FURC-F-15-BCSE-004', 221, 4),
('FUI/FURC-F-15-BCSE-005', 221, 6),
('FUI/FURC-F-15-BCSE-006', 221, 8),
('FUI/FURC-F-15-BCSE-004', 222, 7),
('FUI/FURC-F-15-BCSE-005', 222, 3),
('FUI/FURC-F-15-BCSE-006', 222, 8),
('FUI/FURC-SP-16-BCSE-001', 223, 34),
('FUI/FURC-SP-16-BCSE-002', 223, 35),
('FUI/FURC-SP-16-BCSE-003', 223, 35),
('FUI/FURC-SP-16-BCSE-001', 224, 18),
('FUI/FURC-SP-16-BCSE-002', 224, 19),
('FUI/FURC-SP-16-BCSE-003', 224, 19),
('FUI/FURC-SP-16-BCSE-001', 225, 4),
('FUI/FURC-SP-16-BCSE-002', 225, 7),
('FUI/FURC-SP-16-BCSE-003', 225, 7),
('FUI/FURC-SP-16-BCSE-001', 226, 6),
('FUI/FURC-SP-16-BCSE-002', 226, 3),
('FUI/FURC-SP-16-BCSE-003', 226, 9),
('FUI/FURC-SP-16-BCSE-001', 227, 10),
('FUI/FURC-SP-16-BCSE-002', 227, 7),
('FUI/FURC-SP-16-BCSE-003', 227, 2),
('FUI/FURC-SP-16-BCSE-004', 228, 42),
('FUI/FURC-SP-16-BCSE-005', 228, 35),
('FUI/FURC-SP-16-BCSE-006', 228, 45),
('FUI/FURC-SP-16-BCSE-004', 229, 19),
('FUI/FURC-SP-16-BCSE-005', 229, 13),
('FUI/FURC-SP-16-BCSE-006', 229, 14),
('FUI/FURC-SP-16-BCSE-004', 230, 4),
('FUI/FURC-SP-16-BCSE-005', 230, 8),
('FUI/FURC-SP-16-BCSE-006', 230, 4),
('FUI/FURC-SP-16-BCSE-004', 231, 4),
('FUI/FURC-SP-16-BCSE-005', 231, 4),
('FUI/FURC-SP-16-BCSE-006', 231, 10),
('FUI/FURC-SP-16-BCSE-004', 232, 7),
('FUI/FURC-SP-16-BCSE-005', 232, 6),
('FUI/FURC-SP-16-BCSE-006', 232, 7),
('FUI/FURC-SP-16-BCSE-001', 233, 39),
('FUI/FURC-SP-16-BCSE-002', 233, 35),
('FUI/FURC-SP-16-BCSE-003', 233, 40),
('FUI/FURC-SP-16-BCSE-001', 234, 16),
('FUI/FURC-SP-16-BCSE-002', 234, 14),
('FUI/FURC-SP-16-BCSE-003', 234, 19),
('FUI/FURC-SP-16-BCSE-001', 235, 7),
('FUI/FURC-SP-16-BCSE-002', 235, 6),
('FUI/FURC-SP-16-BCSE-003', 235, 5),
('FUI/FURC-SP-16-BCSE-001', 236, 3),
('FUI/FURC-SP-16-BCSE-002', 236, 6),
('FUI/FURC-SP-16-BCSE-003', 236, 8),
('FUI/FURC-SP-16-BCSE-001', 237, 4),
('FUI/FURC-SP-16-BCSE-002', 237, 8),
('FUI/FURC-SP-16-BCSE-003', 237, 6),
('FUI/FURC-SP-16-BCSE-004', 238, 36),
('FUI/FURC-SP-16-BCSE-005', 238, 40),
('FUI/FURC-SP-16-BCSE-006', 238, 39),
('FUI/FURC-SP-16-BCSE-004', 239, 15),
('FUI/FURC-SP-16-BCSE-005', 239, 15),
('FUI/FURC-SP-16-BCSE-006', 239, 19),
('FUI/FURC-SP-16-BCSE-004', 240, 4),
('FUI/FURC-SP-16-BCSE-005', 240, 8),
('FUI/FURC-SP-16-BCSE-006', 240, 6),
('FUI/FURC-SP-16-BCSE-004', 241, 3),
('FUI/FURC-SP-16-BCSE-005', 241, 7),
('FUI/FURC-SP-16-BCSE-006', 241, 6),
('FUI/FURC-SP-16-BCSE-004', 242, 7),
('FUI/FURC-SP-16-BCSE-005', 242, 7),
('FUI/FURC-SP-16-BCSE-006', 242, 6),
('FUI/FURC-F-16-BCSE-001', 243, 34),
('FUI/FURC-F-16-BCSE-002', 243, 36),
('FUI/FURC-F-16-BCSE-003', 243, 40),
('FUI/FURC-F-16-BCSE-001', 244, 18),
('FUI/FURC-F-16-BCSE-002', 244, 18),
('FUI/FURC-F-16-BCSE-003', 244, 21),
('FUI/FURC-F-16-BCSE-001', 245, 7),
('FUI/FURC-F-16-BCSE-002', 245, 7),
('FUI/FURC-F-16-BCSE-003', 245, 4),
('FUI/FURC-F-16-BCSE-001', 246, 4),
('FUI/FURC-F-16-BCSE-002', 246, 5),
('FUI/FURC-F-16-BCSE-003', 246, 9),
('FUI/FURC-F-16-BCSE-001', 247, 6),
('FUI/FURC-F-16-BCSE-002', 247, 6),
('FUI/FURC-F-16-BCSE-003', 247, 7),
('FUI/FURC-F-16-BCSE-004', 248, 7),
('FUI/FURC-F-16-BCSE-005', 248, 6),
('FUI/FURC-F-16-BCSE-006', 248, 6),
('FUI/FURC-F-16-BCSE-004', 249, 6),
('FUI/FURC-F-16-BCSE-005', 249, 5),
('FUI/FURC-F-16-BCSE-006', 249, 6),
('FUI/FURC-F-16-BCSE-004', 250, 7),
('FUI/FURC-F-16-BCSE-005', 250, 5),
('FUI/FURC-F-16-BCSE-006', 250, 6),
('FUI/FURC-F-16-BCSE-004', 251, 14),
('FUI/FURC-F-16-BCSE-005', 251, 19),
('FUI/FURC-F-16-BCSE-006', 251, 22),
('FUI/FURC-F-16-BCSE-004', 252, 42),
('FUI/FURC-F-16-BCSE-005', 252, 40),
('FUI/FURC-F-16-BCSE-006', 252, 30),
('FUI/FURC-F-16-BCSE-001', 253, 4),
('FUI/FURC-F-16-BCSE-002', 253, 1),
('FUI/FURC-F-16-BCSE-003', 253, 9),
('FUI/FURC-F-16-BCSE-001', 254, 7),
('FUI/FURC-F-16-BCSE-002', 254, 10),
('FUI/FURC-F-16-BCSE-003', 254, 4),
('FUI/FURC-F-16-BCSE-001', 255, 1),
('FUI/FURC-F-16-BCSE-002', 255, 7),
('FUI/FURC-F-16-BCSE-003', 255, 7),
('FUI/FURC-F-16-BCSE-001', 256, 20),
('FUI/FURC-F-16-BCSE-002', 256, 18),
('FUI/FURC-F-16-BCSE-003', 256, 20),
('FUI/FURC-F-16-BCSE-001', 257, 39),
('FUI/FURC-F-16-BCSE-002', 257, 38),
('FUI/FURC-F-16-BCSE-003', 257, 38),
('FUI/FURC-F-16-BCSE-004', 258, 4),
('FUI/FURC-F-16-BCSE-005', 258, 6),
('FUI/FURC-F-16-BCSE-006', 258, 6),
('FUI/FURC-F-16-BCSE-004', 259, 4),
('FUI/FURC-F-16-BCSE-005', 259, 2),
('FUI/FURC-F-16-BCSE-006', 259, 7),
('FUI/FURC-F-16-BCSE-004', 260, 5),
('FUI/FURC-F-16-BCSE-005', 260, 10),
('FUI/FURC-F-16-BCSE-006', 260, 6),
('FUI/FURC-F-16-BCSE-004', 261, 18),
('FUI/FURC-F-16-BCSE-005', 261, 20),
('FUI/FURC-F-16-BCSE-006', 261, 21),
('FUI/FURC-F-16-BCSE-004', 262, 42),
('FUI/FURC-F-16-BCSE-005', 262, 35),
('FUI/FURC-F-16-BCSE-006', 262, 44),
('FUI/FURC-SP-15-BCSE-001', 275, 0),
('FUI/FURC-SP-15-BCSE-002', 275, 5),
('FUI/FURC-SP-15-BCSE-003', 275, 9),
('FUI/FURC-SP-15-BCSE-001', 277, 0),
('FUI/FURC-SP-15-BCSE-002', 277, 10),
('FUI/FURC-SP-15-BCSE-003', 277, 10),
('FUI/FURC-SP-15-BCSE-001', 278, 0),
('FUI/FURC-SP-15-BCSE-002', 278, 20),
('FUI/FURC-SP-15-BCSE-003', 278, 19),
('FUI/FURC-SP-15-BCSE-001', 279, 0),
('FUI/FURC-SP-15-BCSE-002', 279, 16),
('FUI/FURC-SP-15-BCSE-003', 279, 15),
('FUI/FURC-SP-15-BCSE-001', 280, 0),
('FUI/FURC-SP-15-BCSE-002', 280, 10),
('FUI/FURC-SP-15-BCSE-003', 280, 10),
('FUI/FURC-SP-15-BCSE-001', 274, 15),
('FUI/FURC-SP-15-BCSE-002', 274, 0),
('FUI/FURC-SP-15-BCSE-003', 274, 0);

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
(1, 1, 1, 2015, 1, 'SP15', '2015-02-21'),
(2, 1, 1, 2015, 2, 'FA15', '2015-09-01'),
(3, 1, 1, 2016, 3, 'SP16', '2016-02-21'),
(4, 1, 1, 2016, 4, 'FA16', '2016-09-01'),
(5, 2, 2, 2015, 4, 'FA15', '2015-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `clo`
--

CREATE TABLE `clo` (
  `CLOCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL,
  `programCode` int(11) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `cloName` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `domain` varchar(30) NOT NULL,
  `btLevel` varchar(20) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo`
--

INSERT INTO `clo` (`CLOCode`, `curriculumCode`, `programCode`, `batchCode`, `cloName`, `description`, `domain`, `btLevel`, `courseCode`) VALUES
(1, 1, 1, 1, 'CLO-1', 'Handwriting', 'ABC', '4', 'SEN-28'),
(2, 1, 1, 1, 'CLO-2', 'Speaking', 'DEF', '2', 'SEN-28'),
(3, 1, 1, 1, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-29'),
(4, 1, 1, 1, 'CLO-2', 'Blah', 'DEF', '3', 'SEN-29'),
(5, 1, 1, 1, 'CLO-1', 'Listening', 'ABC', '2', 'SEN-30'),
(6, 1, 1, 1, 'CLO-2', 'Speaking', 'ABC', '2', 'SEN-30'),
(7, 1, 1, 1, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-31'),
(8, 1, 1, 1, 'CLO-2', 'Blah', 'ABC', '1', 'SEN-31'),
(9, 1, 1, 1, 'CLO-1', 'Handwriting', 'ABC', '4', 'SEN-32'),
(10, 1, 1, 1, 'CLO-2', 'Speaking', 'DEF', '2', 'SEN-32'),
(11, 1, 1, 1, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-33'),
(12, 1, 1, 1, 'CLO-2', 'Blah', 'DEF', '3', 'SEN-33'),
(13, 1, 1, 1, 'CLO-1', 'Listening', 'ABC', '2', 'SEN-34'),
(14, 1, 1, 1, 'CLO-2', 'Speaking', 'ABC', '2', 'SEN-34'),
(15, 1, 1, 2, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-29'),
(16, 1, 1, 2, 'CLO-2', 'Blah', 'DEF', '3', 'SEN-29'),
(17, 1, 1, 2, 'CLO-1', 'Handwriting', 'ABC', '4', 'SEN-28'),
(18, 1, 1, 2, 'CLO-2', 'Speaking', 'DEF', '2', 'SEN-28'),
(19, 1, 1, 3, 'CLO-1', 'Handwriting', 'ABC', '4', 'SEN-28'),
(20, 1, 1, 3, 'CLO-2', 'Speaking', 'DEF', '2', 'SEN-28'),
(21, 1, 1, 3, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-29'),
(22, 1, 1, 3, 'CLO-2', 'Blah', 'DEF', '3', 'SEN-29'),
(23, 1, 1, 2, 'CLO-1', 'Listening', 'ABC', '2', 'SEN-30'),
(24, 1, 1, 2, 'CLO-2', 'Speaking', 'ABC', '2', 'SEN-30'),
(25, 1, 1, 2, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-31'),
(26, 1, 1, 2, 'CLO-2', 'Blah', 'ABC', '1', 'SEN-31'),
(27, 1, 1, 1, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-35'),
(28, 1, 1, 1, 'CLO-2', 'Blah', 'ABC', '1', 'SEN-35'),
(29, 1, 1, 2, 'CLO-1', 'Handwriting', 'ABC', '4', 'SEN-32'),
(30, 1, 1, 2, 'CLO-2', 'Speaking', 'DEF', '2', 'SEN-32'),
(31, 1, 1, 2, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-33'),
(32, 1, 1, 2, 'CLO-2', 'Blah', 'DEF', '3', 'SEN-33'),
(33, 1, 1, 3, 'CLO-1', 'Listening', 'ABC', '2', 'SEN-30'),
(34, 1, 1, 3, 'CLO-2', 'Speaking', 'ABC', '2', 'SEN-30'),
(35, 1, 1, 3, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-31'),
(36, 1, 1, 3, 'CLO-2', 'Blah', 'ABC', '1', 'SEN-31'),
(37, 1, 1, 4, 'CLO-1', 'Listening', 'ABC', '2', 'SEN-29'),
(38, 1, 1, 4, 'CLO-2', 'Speaking', 'ABC', '2', 'SEN-29'),
(39, 1, 1, 4, 'CLO-1', 'Blah', 'ABC', '1', 'SEN-28'),
(40, 1, 1, 4, 'CLO-2', 'Blah', 'ABC', '1', 'SEN-28');

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
(1, 5),
(1, 15),
(1, 19),
(1, 21),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(2, 2),
(2, 6),
(2, 11),
(2, 20),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(3, 3),
(3, 16),
(3, 19),
(3, 20),
(3, 21),
(3, 37),
(3, 38),
(4, 4),
(4, 22),
(4, 23),
(4, 38),
(4, 39),
(4, 40),
(5, 1),
(5, 8),
(5, 11),
(5, 14),
(5, 17),
(6, 2),
(6, 12),
(7, 3),
(7, 13),
(7, 18),
(7, 24),
(8, 4),
(8, 14),
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(8, 30),
(9, 25),
(9, 31),
(9, 40),
(10, 7),
(10, 12),
(10, 24),
(10, 32),
(10, 33),
(10, 34),
(10, 39),
(11, 13),
(11, 22),
(11, 23),
(11, 35),
(11, 36),
(11, 37);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `programCode` int(11) NOT NULL,
  `courseTitle` varchar(40) NOT NULL,
  `creditHours` int(11) DEFAULT NULL,
  `curriculumCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `programCode`, `courseTitle`, `creditHours`, `curriculumCode`) VALUES
('SEN-28', 1, 'Kotlin', 3, 1),
('SEN-29', 1, 'Android', 3, 1),
('SEN-30', 1, 'Artificial Intelligence', 3, 1),
('SEN-31', 1, 'Programming Fundamentals', 3, 1),
('SEN-32', 1, 'Data Structures', 3, 1),
('SEN-33', 1, 'Discrete Mathematics', 3, 1),
('SEN-34', 1, 'Algorithm Analysis', 3, 1),
('SEN-35', 1, 'Digital Image Processing', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseadvisor`
--

CREATE TABLE `courseadvisor` (
  `facultyCode` varchar(30) NOT NULL,
  `sectionCode` int(11) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseadvisor`
--

INSERT INTO `courseadvisor` (`facultyCode`, `sectionCode`, `officialEmail`, `password`) VALUES
('FUI-FURC-061', 82, 'ca-fa15a@fui.edu.pk', '123456789');

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
(1, 1, 'SEN-28', 1, 1, '2015-02-09', 1),
(2, 1, 'SEN-29', 1, 1, '2015-02-09', 1),
(3, 1, 'SEN-30', 2, 2, '2015-10-14', 1),
(4, 1, 'SEN-31', 2, 2, '2015-10-14', 1),
(5, 2, 'SEN-28', 2, 3, '2015-10-14', 1),
(6, 2, 'SEN-29', 2, 3, '2015-10-14', 1),
(7, 1, 'SEN-32', 3, 4, '2016-02-28', 1),
(8, 1, 'SEN-33', 3, 4, '2016-02-28', 1),
(9, 2, 'SEN-30', 3, 5, '2016-02-28', 1),
(10, 2, 'SEN-31', 3, 5, '2016-02-28', 1),
(11, 3, 'SEN-28', 3, 6, '2016-02-28', 1),
(12, 3, 'SEN-29', 3, 6, '2016-02-28', 1),
(13, 1, 'SEN-34', 4, 7, '2016-08-28', 1),
(14, 1, 'SEN-35', 4, 7, '2016-08-28', 1),
(15, 2, 'SEN-32', 4, 8, '2016-08-28', 1),
(16, 2, 'SEN-33', 4, 8, '2016-08-28', 1),
(17, 3, 'SEN-30', 4, 9, '2016-08-28', 1),
(18, 3, 'SEN-31', 4, 9, '2016-08-28', 1),
(19, 4, 'SEN-28', 4, 10, '2016-08-28', 1),
(20, 4, 'SEN-29', 4, 10, '2016-08-28', 1);

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
(1, 'SEN-28'),
(1, 'SEN-29'),
(2, 'SEN-30'),
(2, 'SEN-31'),
(3, 'SEN-28'),
(3, 'SEN-29'),
(4, 'SEN-32'),
(4, 'SEN-33'),
(5, 'SEN-30'),
(5, 'SEN-31'),
(6, 'SEN-28'),
(6, 'SEN-29'),
(7, 'SEN-34'),
(7, 'SEN-35'),
(8, 'SEN-32'),
(8, 'SEN-33'),
(9, 'SEN-30'),
(9, 'SEN-31'),
(10, 'SEN-28'),
(10, 'SEN-29');

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
(1, 1, 1, 1, 1, '2015-02-28'),
(2, 2, 1, 1, 2, '2015-08-28'),
(3, 3, 1, 2, 2, '2015-08-28'),
(4, 4, 1, 1, 3, '2016-02-28'),
(5, 5, 1, 2, 3, '2016-02-28'),
(6, 6, 1, 3, 3, '2016-02-28'),
(7, 7, 1, 1, 4, '2016-08-28'),
(8, 8, 1, 2, 4, '2016-08-28'),
(9, 9, 1, 3, 4, '2016-08-28'),
(10, 10, 1, 4, 4, '2016-08-28');

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
  `preReq` varchar(40) DEFAULT NULL,
  `programName` varchar(50) NOT NULL,
  `programLevel` varchar(20) NOT NULL,
  `courseEffective` varchar(30) DEFAULT NULL,
  `teachingMethodology` varchar(100) NOT NULL,
  `courseModel` varchar(50) NOT NULL,
  `recommendedBooks` varchar(200) DEFAULT NULL,
  `referenceBooks` varchar(200) DEFAULT NULL,
  `courseDescription` varchar(500) NOT NULL,
  `otherReferences` varchar(200) DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `coordinatingUnit` varchar(30) NOT NULL,
  `weightagedAssessment` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofile`
--

INSERT INTO `courseprofile` (`courseProfileCode`, `courseCode`, `programCode`, `batchCode`, `courseTitle`, `creditHours`, `preReq`, `programName`, `programLevel`, `courseEffective`, `teachingMethodology`, `courseModel`, `recommendedBooks`, `referenceBooks`, `courseDescription`, `otherReferences`, `semester`, `coordinatingUnit`, `weightagedAssessment`) VALUES
(1, 'SEN-28', 1, 1, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(2, 'SEN-29', 1, 1, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(3, 'SEN-30', 1, 1, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(4, 'SEN-31', 1, 1, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(5, 'SEN-28', 1, 2, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(6, 'SEN-29', 1, 2, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(7, 'SEN-32', 1, 1, 'Data Structures', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC', 1),
(8, 'SEN-33', 1, 1, 'Discrete Mathematics', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC', 1),
(9, 'SEN-30', 1, 2, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(10, 'SEN-31', 1, 2, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(11, 'SEN-28', 1, 3, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(12, 'SEN-29', 1, 3, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(13, 'SEN-34', 1, 1, 'Algorithm Analysis', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 4, 'ABC', 0),
(14, 'SEN-35', 1, 1, 'Digital Image Processing', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 4, 'ABC', 1),
(15, 'SEN-32', 1, 2, 'Data Structures', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC', 1),
(16, 'SEN-33', 1, 2, 'Discrete Mathematics', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC', 1),
(17, 'SEN-30', 1, 3, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(18, 'SEN-31', 1, 3, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC', 1),
(19, 'SEN-28', 1, 4, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1),
(20, 'SEN-29', 1, 4, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC', 1);

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
(2, 5, 10, 10, 25, 50),
(3, 5, 10, 10, 25, 50),
(4, 5, 10, 10, 25, 50),
(5, 5, 10, 10, 25, 50),
(6, 5, 10, 10, 25, 50),
(7, 5, 10, 10, 25, 50),
(8, 5, 10, 10, 25, 50),
(9, 5, 10, 10, 25, 50),
(10, 5, 10, 10, 25, 50),
(11, 5, 10, 10, 25, 50),
(12, 5, 10, 10, 25, 50),
(13, 5, 10, 10, 25, 50),
(14, 5, 10, 10, 25, 50),
(15, 5, 10, 10, 25, 50),
(16, 5, 10, 10, 25, 50),
(17, 5, 10, 10, 25, 50),
(18, 5, 10, 10, 25, 50),
(19, 5, 10, 10, 25, 50),
(20, 5, 10, 10, 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `courseprofileinstructordetail`
--

CREATE TABLE `courseprofileinstructordetail` (
  `courseProfileCode` int(11) NOT NULL,
  `facultyCode` varchar(30) DEFAULT NULL,
  `instructorName` varchar(40) DEFAULT NULL,
  `qualification` varchar(150) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `personalEmail` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofileinstructordetail`
--

INSERT INTO `courseprofileinstructordetail` (`courseProfileCode`, `facultyCode`, `instructorName`, `qualification`, `specialization`, `contactNumber`, `personalEmail`, `designation`) VALUES
(1, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(2, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(3, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(4, 'FUI-FURC-057', 'Dr. Shariq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(5, 'FUI-FURC-058', 'Dr. Ishitaq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(6, 'FUI-FURC-059', 'Dr. M. Ahmed Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(7, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(8, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(9, 'FUI-FURC-057', 'Dr. Shariq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(10, 'FUI-FURC-058', 'Dr. Ishitaq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(11, 'FUI-FURC-058', 'Dr. Ishitaq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(12, 'FUI-FURC-059', 'Dr. M. Ahmed Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(13, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(14, 'FUI-FURC-056', 'M. Aqeel Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(15, 'FUI-FURC-057', 'Dr. Shariq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(16, 'FUI-FURC-058', 'Dr. Ishitaq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(17, 'FUI-FURC-058', 'Dr. Ishitaq', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(18, 'FUI-FURC-059', 'Dr. M. Ahmed Iqbal', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(19, 'FUI-FURC-060', 'Dr. M. Asif', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor'),
(20, 'FUI-FURC-060', 'Dr. M. Asif', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com', 'Professor');

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
(1, 'FUI/FURC-SP-15-BCSE-001', 1, 1, 6, 6, 'Good'),
(2, 'FUI/FURC-SP-15-BCSE-002', 1, 1, 6, 6, 'Good'),
(3, 'FUI/FURC-SP-15-BCSE-003', 1, 1, 6, 6, 'Good'),
(4, 'FUI/FURC-SP-15-BCSE-004', 1, 1, 6, 6, 'Good'),
(5, 'FUI/FURC-SP-15-BCSE-005', 1, 1, 6, 6, 'Good'),
(6, 'FUI/FURC-SP-15-BCSE-006', 1, 1, 6, 6, 'Good'),
(7, 'FUI/FURC-SP-15-BCSE-001', 2, 2, 6, 6, 'Good'),
(8, 'FUI/FURC-SP-15-BCSE-002', 2, 2, 6, 6, 'Good'),
(9, 'FUI/FURC-SP-15-BCSE-003', 2, 2, 6, 6, 'Good'),
(10, 'FUI/FURC-SP-15-BCSE-004', 2, 2, 6, 6, 'Good'),
(11, 'FUI/FURC-SP-15-BCSE-005', 2, 2, 6, 6, 'Good'),
(12, 'FUI/FURC-SP-15-BCSE-006', 2, 2, 6, 6, 'Good'),
(13, 'FUI/FURC-F-15-BCSE-001', 3, 3, 6, 6, 'Good'),
(14, 'FUI/FURC-F-15-BCSE-002', 3, 3, 6, 6, 'Good'),
(15, 'FUI/FURC-F-15-BCSE-003', 3, 3, 6, 6, 'Good'),
(16, 'FUI/FURC-F-15-BCSE-004', 3, 3, 6, 6, 'Good'),
(17, 'FUI/FURC-F-15-BCSE-005', 3, 3, 6, 6, 'Good'),
(18, 'FUI/FURC-F-15-BCSE-006', 3, 3, 6, 6, 'Good'),
(19, 'FUI/FURC-SP-15-BCSE-001', 4, 4, 6, 6, 'Good'),
(20, 'FUI/FURC-SP-15-BCSE-002', 4, 4, 6, 6, 'Good'),
(21, 'FUI/FURC-SP-15-BCSE-003', 4, 4, 6, 6, 'Good'),
(22, 'FUI/FURC-SP-15-BCSE-004', 4, 4, 6, 6, 'Good'),
(23, 'FUI/FURC-SP-15-BCSE-005', 4, 4, 6, 6, 'Good'),
(24, 'FUI/FURC-SP-15-BCSE-006', 4, 4, 6, 6, 'Good'),
(25, 'FUI/FURC-F-15-BCSE-001', 5, 5, 6, 6, 'Good'),
(26, 'FUI/FURC-F-15-BCSE-002', 5, 5, 6, 6, 'Good'),
(27, 'FUI/FURC-F-15-BCSE-003', 5, 5, 6, 6, 'Good'),
(28, 'FUI/FURC-F-15-BCSE-004', 5, 5, 6, 6, 'Good'),
(29, 'FUI/FURC-F-15-BCSE-005', 5, 5, 6, 6, 'Good'),
(30, 'FUI/FURC-F-15-BCSE-006', 5, 5, 6, 6, 'Good'),
(31, 'FUI/FURC-SP-16-BCSE-001', 6, 6, 6, 6, 'Good'),
(32, 'FUI/FURC-SP-16-BCSE-002', 6, 6, 6, 6, 'Good'),
(33, 'FUI/FURC-SP-16-BCSE-003', 6, 6, 6, 6, 'Good'),
(34, 'FUI/FURC-SP-16-BCSE-004', 6, 6, 6, 6, 'Good'),
(35, 'FUI/FURC-SP-16-BCSE-005', 6, 6, 6, 6, 'Good'),
(36, 'FUI/FURC-SP-16-BCSE-006', 6, 6, 6, 6, 'Good'),
(37, 'FUI/FURC-SP-15-BCSE-001', 7, 7, 6, 6, 'Good'),
(38, 'FUI/FURC-SP-15-BCSE-002', 7, 7, 6, 6, 'Good'),
(39, 'FUI/FURC-SP-15-BCSE-003', 7, 7, 6, 6, 'Good'),
(40, 'FUI/FURC-SP-15-BCSE-004', 7, 7, 6, 6, 'Good'),
(41, 'FUI/FURC-SP-15-BCSE-005', 7, 7, 6, 6, 'Good'),
(42, 'FUI/FURC-SP-15-BCSE-006', 7, 7, 6, 6, 'Good'),
(44, 'FUI/FURC-F-15-BCSE-001', 8, 8, 6, 6, 'Good'),
(45, 'FUI/FURC-F-15-BCSE-002', 8, 8, 6, 6, 'Good'),
(46, 'FUI/FURC-F-15-BCSE-003', 8, 8, 6, 6, 'Good'),
(47, 'FUI/FURC-F-15-BCSE-004', 8, 8, 6, 6, 'Good'),
(48, 'FUI/FURC-F-15-BCSE-005', 8, 8, 6, 6, 'Good'),
(49, 'FUI/FURC-F-15-BCSE-006', 8, 8, 6, 6, 'Good'),
(50, 'FUI/FURC-SP-16-BCSE-001', 9, 9, 6, 6, 'Good'),
(51, 'FUI/FURC-SP-16-BCSE-002', 9, 9, 6, 6, 'Good'),
(52, 'FUI/FURC-SP-16-BCSE-003', 9, 9, 6, 6, 'Good'),
(53, 'FUI/FURC-SP-16-BCSE-004', 9, 9, 6, 6, 'Good'),
(54, 'FUI/FURC-SP-16-BCSE-005', 9, 9, 6, 6, 'Good'),
(55, 'FUI/FURC-SP-16-BCSE-006', 9, 9, 6, 6, 'Good'),
(56, 'FUI/FURC-F-16-BCSE-001', 10, 10, 6, 6, 'Good'),
(57, 'FUI/FURC-F-16-BCSE-002', 10, 10, 6, 6, 'Good'),
(58, 'FUI/FURC-F-16-BCSE-003', 10, 10, 6, 6, 'Good'),
(59, 'FUI/FURC-F-16-BCSE-004', 10, 10, 6, 6, 'Good'),
(60, 'FUI/FURC-F-16-BCSE-005', 10, 10, 6, 6, 'Good'),
(61, 'FUI/FURC-F-16-BCSE-006', 10, 10, 6, 6, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculumCode` int(11) NOT NULL,
  `curriculumYear` year(4) NOT NULL,
  `dateCreated` date NOT NULL,
  `curriculumName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculumCode`, `curriculumYear`, `dateCreated`, `curriculumName`) VALUES
(1, 2018, '2018-03-01', 'Spring 18'),
(2, 2020, '2020-03-01', 'Spring 20');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentCode` int(11) NOT NULL,
  `departmentName` varchar(30) NOT NULL,
  `departmentShortName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentCode`, `departmentName`, `departmentShortName`) VALUES
(1, 'Software Engineering', 'SE'),
(2, 'Psychology', 'Phy');

-- --------------------------------------------------------

--
-- Table structure for table `examhead`
--

CREATE TABLE `examhead` (
  `facultyCode` varchar(30) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examhead`
--

INSERT INTO `examhead` (`facultyCode`, `officialEmail`, `password`) VALUES
('FUI-FURC-062', 'examhead@fui.edu.pk', '123456789');

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
  `picture` blob DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `departmentCode` int(11) DEFAULT NULL,
  `showEmail` tinyint(1) DEFAULT NULL,
  `pictureType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyCode`, `name`, `CNIC`, `officialEmail`, `personalEmail`, `address`, `contactNumber`, `picture`, `designation`, `password`, `departmentCode`, `showEmail`, `pictureType`) VALUES
('FUI-FURC-056', 'Dr. M. Aqeel Iqbal', '37401-5859968-5', 'maqeelIqbal@fui.edu.pk', 'maqeelIqbal@hotmail.com', 'Somewhere on earth', '0312-4589635', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714141316141414161616181a19191919181618191e191a19171a181b181b18191e2a22191b271c171a233324272b2d3130301822363b362f3a2a2f302f010b0b0b0f0e0f1c11111c312722252f2f2f2f2f2f2f312f2f2f342f2f2f2f2f312f2f2f2f3131382d2f2f2f2f2f312d2f2f2f31312f2f2f2f2f2f2f2f2f302f2fffc0001108010700c003012200021101031101ffc4001c0000020203010100000000000000000000000605070203040108ffc4004f100002010203040603090c080603010000010203001104122105133141062251617181073291142342526272a1b1c11733535473829293b2d1d2f0168394a2a3b3c2e1153443b4c3f124557444ffc4001a010002030101000000000000000000000000040102030506ffc4003011000202010302040503040300000000000001021103041221314105516181132271a1c13291b1142343d1334252ffda000c03010002110311003f00bc68a28a0028a28a0028a28a0028a28a00f28a295fa71b5da28d228db2492e6bb8e31c48019641df62a80f26914f2aa4e4a31727d11318b93a46cdb9b6f2b64831102ba9eba491c920274b2178dc6e4f790dc41b76c1f4b3a58ea91aae68cba06655619f311aa671eaaaf365d4922c458debec662f3683ab1afaa83801f6b1e24f335a1a426d724f2173f40ae74f53926aba7d3a8fc34b18bb7c9d18ac66f0de448dff00289bd3fa52e627db5ec18dc9a246b1f7c4d2427c9a265b547b4f94d9b4ec3c8feead8b203c083e758d7d7f7631b63e4870d8dd369e2201732a7e0e52b9add91ce00d78e92037f8e2ac7d8db661c4a1789b81cae8c2cf1b7c5753aa9e7d846a2e0dea8f486fc0af81603f6ac2bbb018f9b0f22b82d1b81656b5eeb7be565ffa91775f4e2a41adf16a9c1ed93b5f742d974c9f30ea5ed452f746ba4b1e24053649ad7299ae180d0bc6da6f12e46b6b8b80c01a61ae8c64a4ad08b4d3a67b451455880a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803caa93a79b433e227209b2eef0ebd9641be95878b48887f27dd565edbda2b8785e56d728eaa8e2ee74541decc40f3aa3f1d292d62c188cc59870691d8bc8e3b8bb35bb80a4b592f9547cdfd90d696172dde471621eca4f756876ca897ec018788d6b7c306fdc27c01d676e4157d63e16d3c48ad3b62504df85d89b760fe4d269f343cdf732622d66d54f06ecf1fdfedefd4d84b72cc3c6c47d86b4e1b1397bc7f3c2bac5ac4a1efb0e1ec3c3caacf82172609863f0598771aebc2e358031482ea6f6ee3f197b0fd62b189ae2f7bd7acb7aa4b9e1964bc8da98d68c5c6a14e6b5ca9536b6747521a3702fa8229bba3fe91e69248a00865790855ba8cdc75667420150352420b01ce9369abd0ded28d26970e51033a992390280c42919e32d6b91a8603e777531a6ebc3afc8b6a52db7565c145145748e7851451400514514005145140051451400515a7113a20bbb2a8ed6207d75cd84daf04a72c72c6e78d95d4923b40bea2803beb16eee3595140147f497a458a96678e78c46f112b6570c8971a9423892a7d63ad891d5b91506d183c7ebaede9ae066c262e6de82639a4792390faac1d8be5cdc996f6cbd8b7a847c79b7003c6b979612dece9e294762a251b1400dda008a78db52d6e6cdcc0ec161af0ae6d931efb17128e01839ee58c8627c0b655fce1511362ec0b335afccfd54c5d1b49233ef5361164900d6493786dc77688840d2f726e6e7b80354d9b62da2dbd3691dbd26e86bc6c6481732b758c57008bf13193a11f24dadcb90a55113836c922b70b14753ec22f5796c8695e3f7fdd335ff00e9860bfa2f72a7ccd741c0a6b65b7b74f2e159ac8d2aebea56d5f3c143472ba12082ac3d65604107bc1d45752e3c731ecab0715e8fa120dcc924878cad21de7f081afaa05bbaa0715e8ee55d5665cbf2d351e255ac7d82aff131bebc7b1316fb0b53636e2ca2dde6a57d1d86ff0089e172fc69337cddc497f2bdaa1f0fb3a59263044ad2c99dd02a8b5f21209d4d94697b936ab83d1e7420e0ef3ce55b10eb9405d56242412a0fc26240b9ee007696b0637bad7431cd916da7d47ba28a29e110a28a2800a28a2800a28a2800ae3da78d10c4d2104e51a28e2cc485551de5881e75d94b1e901dd70ca5335f7d10eadae0bbe443ae9a48c87ca8014f17b5a692e448e5a666549213982c519cb2388f5206a72e504f592e6f7ae5f756f5400619735a281736528a2fef813ad6242e606e3445b5686406e1002f215c3c7bb7313ac71dc312848f82b23024907a80f015b368b901d89902c604318923899559ad98f5458e5016dc4f51ab43327ba1dd2499f14d8791d9a3505632e05d8581525d4759b461727ad6bf3ab0aa80e8e63c0c5978fab95955000a0658d6c2e083cc1bebdb57d34ea38b28f315592a2d1766389c3248a52445753c5594303e20e86aa1da5d11c2e25d67842612021b76110c866506c27dd821618cf23adc15272f0ab664c546c0aef135047acbcfce92b047261618ae03428904b6d2cd0a84fd136cc3b981e749eaf23842d218c11dd2aba20360ecdc361618a4c9be9e445973b052cab200c0027ab1a8040d35241e36d24a4db6b20292c41d0e857324808ef470011eda8e5c1c7347be9849bad1208d5ca17417c84e5b1d75ca2f608013ceb8e6d858602ecb9189b8c923ad8f20b63d6f306f4e62e609d50ae475276ec9fd993ee244ddb16c34c728049261935b282dae43622cdaab0cbc080adf55fecb858a7b9c967613472666163917232e6161662d1e5b73bdec29fd6b91ab8c2395a8fbfd47f0b7282722271e311324670d3240ac331778b78d6362a15090a2e3524f0d34ada0cb1e1dcccc924888e4b22140d9549072126c6c35d6d586cf9444f2c048cb084746ec864ce114f7a98dd7e684275344f8e49a39634b92d148381e71f3bf0f587d3d86b3aedd8bf6dc2aec8d811c38ac3e223de437982481653267de23598975bf59d55597859ae0822adba49d8382699e0902b2c11da6ccc32ef6428551554ebbb50e5b31b5d825ae2f4ed5d1d2a9ac6b7f516cee2e6f6f43da28a298320a28a2800a28a2800a28a2800ae3da5868e489e393546521b5b69ccdf911c6fcabb2967a718e0207854932cc046112e5f239b3b055d744ce41e1714015bec8c16366368157111c48b937d96eab375d430622f20545b9cdcf80bd757f41314533e29e386307d48466725dc666bfaa96ccdaf58dbb2bb7058cc560f0e582450b4d3c6652c44d27becb1c015110eed0471e4b1676b9537517d3762f68d816bbc8fc7793be7636e4aa32c70836b108a2f7abf266e91c5838e3850450a2c69d9c4b1b71663ab1b790e405766c570f88995d5580862b0645207be3f222dceb99c03a83a7107b47107c2d6acba273abe27125583658a1536edde354954c9a7c2419829c3427bfdcf158789cbdc7f922a2fa5d868a3c24cc90c2872daeb0c6a46a3810b7153eef6b0009b9f67793509d385be0a7f9a3eb02826c588ba40cec99f33699752a2dd5274ca808e03d95bdb1675ca025f895e27c5cdd8fb697b043af1f8ffa1aa5239f39cb12b4adcc462e077173645f322ace518ab93a46694a4ea3c8c9d02d66c45f964b78e4ff007a9f9ce317aaa2271c9c92a6ddea148bfb3cab8ba1bb2a48f3bc8002fad81bf0000d6c2fc3ff0075dd274810381918a190479ee3d62e23042f35ce6d7f3b5b5ae065ac992528f4b3b38a325149ae52e7d0dbb2f65651234c44924b6121b58655be58c0d7aa3331d49d5cd4a410a83602d73af99d7ebac857b1100dce806a7b80d4d515f4224f8629743f6dda18d03eedd06ece6d63729d43717eab5c71045fbf85396176c29611c837721d14137573d88fc09f926cda1d2dad541d1d973c6cfc9e4771e0e737db4c386da4caa51c092222cc8fa8b79f0faaaf1d64b14dc5f2acde5a153c6a71e1d16a506927636de7552e03cb00b754dde78876db8cc9ced72fc7d63650e185c4a488ae8c1d1802aca6e083c0822bab8f2c722b8b3993c7283a9237d14515a140a28a2800ad534ca80b330551c4b1000f127852d74aba5430f992329bc55cd23bdf770291a17b105dcf111820902e4a8b1303b2fa3f89c6913621e48a33aae7b1998722148c986523905cc41d6c6a688b263a4bd290abbbc3ca81ca3485c8be58d4a863103d591fada7c11c4df452878eda4918478deec1c48f76ccf2bc6ee0ef1fe13345210b7b0b5ac0014dfd26c0ecfc344b1b42af29059033be7b0d1a49262d9d621cc93d8002c40af7a13d0fc388c4f26190bb9cd1ef12e5100b290ad7c84ead6e20103954aa4434d9198f3262e23143879a45702ce14201a86570f2d96e08074cda8e15a57a172a234f8fc4055417648016627e287716bb1b00a1789b0356a525f49f19bc9d5090b061ed23bb7aad883f7a4b5c67280e72bc2ef19bdc00625295700a31ee20f497644e6510ab2c70844254316286dac44deee56c3536b8b56ad90370b3260dfae23cd29390dd6337f85d85b82f6d77ed0861666638ee3c6f8595bc7d596a3618e28b364da01732ba1b6cd9cf55db311f7c3cc52f1c79a4d39caabb2fc9bcb2618a6a11b6fbbfc2241ce38fff00d5ec8d07d42a276cbe356390bcdbc846556bdb52d6b0cb7b9e5ad751c6a7ff00627cb65e23f8eb096685d591f1eecac4311ff0bc46a40b0e74d4b9549d0b43876d589b0c65d82dcf58db56622d6248e36e02de756b742b6924d9626b2c88355b01980e0c076768e47c452ce1b6760ae0fba24b8e0460710b5d988d8b132349859e47c4460c88b95a3660bc425fad985fbefc35b8ae7ea34b39a57cd0fe3d4e38da5c59698a813b1d1670e9113d7cf732b64526e598477b66b93dc09bf1a50d85d3cc46eaf2086622dcda2241170732ab83cf820f54d4d8e9b4845d708a4f7e26c3da2127e8ac568f3d5c570fc99596ab1c1b4dd31c40a50f48bd2258a17c2c4d79e55caf6ffa519e372383b0d00e3adf96abbb63a698c918c48d1e1d4d85e2b9624f15df3f0e3a5954f61a87c2e0421d6e5ae4926e4df89249d49ed26b371f86fe6eabb1be383ca93ec4c6c58ed0a5be10cdfa5a8fa2d596d393444f8eeabf9bc5be80479d63b0c1dc457d3a83d8751f45ab1da5f7c80fcb3f4a301487f95fb9d7ff001af62570f886460ca6c47f363da2983666d6dd13320f7a26f88887c0278e2231d9cdd798bb7ac0e75aadf83c5346e1d788e5da3983dd460cd2c53b467a9d3c72c7d4b56390100820822e08d41078106b652874631eb1bae1efef3282d8727e09173261ff00375651f1730e09ab7d7a3c7914e2a4bb9e7a51716d33da28a2ae54a7f634f1b4b1498a0cd6cf3ba019b3628c9660e4903de8ae50a78644b7ab539b47a6f2cac61c24643f3b059a51e0884c71df5b348f61f14f0a67c7f44f072bb4924085d8dd8f59731b5aec1480c6c00b9ec152780c0450a08e28d2341c1514281e42a6c8a13ba3bd0a6cfbfc61ccc486dd67326661eabcf29fbeb0e480045e40e967ba28a82489dbfb456145bb58c92450af69696454eaf7804b7e6d55bd25c61265616b40c1634372a0b65cce45eecc4b9b926e7ccde6ba47b437b32c87d5f7561a0807c98f1b099a5f1791028f931023d634afb79bab8bfcb81fde8e8c5352baece8a658b8a57df938711b72443669901e36dd1fdf5a8f489ff0e3f526a2b6abda4908e5183fb558ec980323cd348e234b0b29d598daca3bf51edeeadcc096fe913fe1ff00c1347f489ff0ff00e0ff00b543c8bd6e2a97e08f39cd6e57b680f95744f830d1b346654922d64467cd753f094f31fcf306a2cb34492f481ce9bf1ae9f7ab71f2aeec262e466762c33c0124460b6209cf706dc410b6f02473a4d865254dc93675e3e229a70475c57e493ff2d495366d5c446b8f391020902e700e99dc190301cb5b69dac4f3b53e41b3e2502c80f7917f3d6aabe91496c4330e2a90b0f158d5becab5765cb9a246f923e8d2a98e6ea51f27fc91ab856d9f9afe042dbf8666c562142df506ddaa638cdedcc5d88f2ae08b03237bd8dee43a152f204b761526d97bb87753274a3deb19149ca48f21ecba3123ccac84ff00575be46b026d7eeedeeae26b672c795a4baf28f43e1f1865c1193edc7ec08b60076002b876d5c2061c51837d9f6d7561d5871b73d7993dbf5fd0395653c4194a9e62d5cc8ba959d492b8d18e0f14b220753a1fa0f307bc56ea50c362da096ff018e571d8dc037d9eca6c8650c0329b835a65c5b5dae8ca62c9b953ea892d9c43830962998868dc718e5537471e6069cf870269eba3bb50cf15dc0595098e6406f924502f6ed5208653cd594d56c2a7707b54c6c3163e0811e2947c28813967039b464927e4b3f12169cd06a36bd8fa339fe21a7bfee47dcb128ad71b8201041075046a083cc1ad95da3901451450079509b676b32b0c3c2034ccb98dcd962426dbc7235e370aa35620f000b0efda58e4862799cd92352c6c2e6c05ec00d493c001c49a5dd991ba44d2ca3dfa53bd975be5622cb103f1635b20edb13ccd2fa8cbf0e17dcd31c374a85adb5b2d615c32995dd966c1a28b22a855c4c43450b9bb4eac4f7d2d6ddf5317ff00e81fb71d4f6dd98bcd05ff0019c2ff00dcc5fcf9541ede1d4c57ff00a07f98955f0e96f84a5eaff844ebe3b2518fa7e455db5ebcbf931feaadb826be154f28f108cff34a900f85d96b5ed81d797f263fd55c7b3369ee4dfaacacb95d18e8cbd9e3c6ba342174c91c0cab1bcab2c6ae5d6450590bead729220b8b9e02fadae7436b5766cb8f21666e11e1d95cf66620aafb17e8ae58b1f84b693e2221f12c1addc1ac7ebae6da5b6a364dcc3d48af998b1eb487bfbbf75b855517647e08751aff001d3fd34dd84e38afc8a7fe5a54c2eaac7b645fad69af083fe6bf249ff96ac508adba3ff90c3e4423fc15ab1ba1b266c2c47e48fd907edaaf36f8b625be6c3fe5ad585d0c4b6190770fd95ac30feb97b1a6b7fe287b9a7a73832f87cea2ed1b071dfda0788eaf9d476cdc489235606fa7d9c7cc58f9d3762e1ce8cbda0fb797d355ee0dfdcf2943a236a3bb5e1f9a4dbc08eca53c4f4ef263538f58ff00035e0da95093c72e8fa13d4514579e3d40b7b7a01bc208b871723c743f5573ec4da2616ddb9254f03da3b7e70e7dbc6b7ed7c407934d4016bf6ff37a8cc5a82be7a11c41ed1df5d2c71dd8d46473e6f6cdca23ba3022e0dc1e75bf098968dc3af2e23911cc1ee3493b376bb4760799b5b5b3778ecefeca6ac262448a1869dddf49e4c32c4fd06a19239557d872e8a6d3589970e4fbc3dfdcc4fc0205db0addeba94ed5d3e06ae9551a3ad8a382636b6600d8820dd5d186aaea4021870229e3a2fb68b9dc4cc1a555ce8e0584d15f2ef00e4e0d95d470241e0c2bafa3d57c48ed9755f738babd2bc52b5d18cb451453e262ef4a14bc9858cfa86632383f0b731bc88bfad11bff005751b8fda28d0bc82e15598127e45f31f683eca85e9cede64c49472eaf1157c320032c81a301a4d14bb925e5872adec35b5c835a5f07889203856c3cc8710f746cb7091ca6f299185c46c999cd9ad7ead8137010d5e194e4aba35f918c138c6df7445ecec7c2fb86905a679a29199c8023092acb952fc82a58dad7d49ae6e9127fcc28d4b3a48b617cca590dd6dc46878761a64c46c4861c488608cde350f2c8e733c8ee1951331e08aa198a8016ec847035a63d80d243bd894cb0176dd84d1d40001961278c6ce1babc080a468459ac3962b23c518d2491865c72705393b6d95fe2b0d99f383229b01f7a63c2fdabdf5a0e07e549fd9dbf869db1f8796256775c5a22ea58c08401e350988db689eb4f895bf0be1929bb15a641fb87e549fd9dbf86bd181f952ff676fe1a93fe9245f8ce23fb3c740e9243f8ce27f511feea90a238606f6b9988041b6e187037f8953183439712c559432228ccacb7233e803017e22bab078cde32a23e2999cd9408a1198d8b6975ec04f9549ed0c04d1a2b98672e5d522de98946f5cd9744d74f5af6eae5cdcaa1c92ea4a8b7d0edd89d16c3cd34d34ea652acb1aa66213a91ae66214dd8dcdac74d385ea6e5e8cc6bae19e4c33760669223dcd0c86c07cc287beb8f636cc870aaaac4cd30b9691b8063727229d100d786b61a9353b1ed243c6e3c7fdab839357fdc6e323aab4b704a51b215a4c427564c33337268983a37610490e9de1974bf13c697b17d1e9e7ce14e1b3235d819a556426f6ba9838117d7811c0d585ee843f097da2927a7f2059209d35b1dd496e0c8d76507b4861a766635bbd7ce51daab9fb98e2d04233ddcff00a23b0db131918ca66c101cb34d2311e00443eba313b0a57167c742a39848647fa9d6fe75be29030054dc1acab98f3b4ed4527f43b8b036a9cdd11f1f46221ebe2e46fc9c0a9fe63b56e8b606117d66c54bdcef120ff0d01fa6ba5980e26de35cf263e31c5d7c8dfeaa3e3e5974fb223fa6c6bab7fb9b06cec2afa98717ed925965fa19b2fd15b1540160001d80587b05703ed88870cc7c07efad0db707243e640aab5967d6cd23f0b1fe925eb77fc4772826bd8e1d84ca7e48eacf1f7e688b587c6553ca96e6dbcc05f2aa8ed27ff552bd11d87363e58e47cc30c8caecc45849948611c63e12920666e16b806e74634ba7c9f11497617d5e6c4f1b8b2eaa28a2bbc704f08af68a28021b69f46b0d3c9bc962ccc542b59dd43a8bd95d5582c8a331d1811a9a95550a2c00000d00d0003ea15b2a13a65315c24b6362e162bf66f9d62bf967bd1404074936e7ba70f245141232b8195cd802030606dc729b7b0d23edfc24cdbb6f7311958e97539b32916b01e7e46ace09001617b0d05afc05456d7920de44a735ad23f3e2b9147d121ad12a326ecabdf0d29e3857f2d3ecad9161267ba8c3106c4eb61d83b3bc558664c370cad7f1ff007ac526844b110afeb9075e20c6e2dc7e3653e5536576a20764a4b136189c3c9681909b15bb658d934f1245356d7da9bf682458a506090c8e852ed91e2961de22a125f2b38b81a80c4d48ef62f887dbfef5cf1caa31b862ab94b2cf19ef05524d7ce21edaa6482945a34849a640604e69e72d9ae2288c41948ba177debae61af595013cb2af6d7615b7d07da2f4e58fd9b14d6de2062b72a750cb71639586ab71a1b1d6aade9a633118691a181d5a35b2a978f33a0ca0e50c186602f61981361a93c6b9193c2e591a58df6ee3ebc46389379384d9d9b436a8460a356639554296676f8a88bab1fe785276d8e9089c0520a056b90d606eb716207aa41e373716b54660f6bcd0cdbeb9673a12d6bdbb148d157e4dade1c69836eed2c1626069d818f1416c0ae8646b688ebae6e5a9d40e645358bc2a38ff005be7cd7630c9e28e7ce3aaf27dc848f1f97d5723e6dfecac9f6d31f8721f223ebb545093f9ff006aecc36119f5e03bf9d3d1f0ac527cb6c4a7e379a0ba247ad8c2dae466f12a6de36248f3ac37f21e1181e24fee15ee2f00ca3369a5b504822e6da1e22b4a48e3e11f0600d8f8daff004d6593c36517f253fa9b61f1884e373b5f4e51b3df8f351e03f7935d3b2f664934f1459d8992455b036d09bb7aa07040cc7b949ae685e57608a533310a3a878b1b01ab1e67b2afce8e74470f84eb202f2916323905ac6d70a000a80902e140bd85ef6ac3fa59c1add48696b31ce2f65b3dd9fd0ac04443261632cbc19c1958783485883e74c20515ed322f7614514500145145001503d3788b60e520125324b61c4eea459481e486a7ab122f4015d8dac2f7b310780b8b78f0bd45edcdaa0346f90e81d388f8595aff00e1fd3533d32e8da41859a6864910c6a0a27bd941a8001cd196ca2fdbcaaadc53e3986532861dcb172d79a0ad5533095c7a8cdff1b4be6dd9bdad7b8e15bf07b643cb18c8746cc751c02b7db6a45dce2be31ff0bf756ec37bb10dd58836b5ed0f0f31dd53457716a8daaa2e421b9e3a8d6b6ec3c56fb1d000b6091cf2137bfe0e303cf787d86ab8c0e2b17bc89649572bcb146d654bda49550dac96bd9aaefd8db023c3966567766001672b7b024d8655006a7b390aace970690b6ec97aa6ba5d367999bb5e6f62ccc83e84ab92f546ed39736edbe346ae7c642d21fdbad74abe712f147586bd5103b4f0e08cdadfda2c3bab460706b22b83c542907cc823e91eca91c6b5a36f0b7b74ad3b0469377227d320fdc69e9ae7f6fe4e4e19bd8fd2ce6c141225fa8a7bc91a7b2a512f6d6d7eeaca8ad62a857264deeda31740410781d0d474f816bf02c7b45b5f9ca6daf783af6549d6fc29b667f882e3e792157d84e6fcd3559a5565b0ce49d20e80ec6326d0843708d9a461f921f6485055f02abbf44fb3befd391a690a782f59cf9b151e31d58a2b979e573fa707a6d1c5ac49befc9ed1451588d0514514005145140051451401c1b670227825849b6742b7b5ec48d0db9d8d8daa98c76230825911ddf0ee8ee8c13ad1e64628d97321017303a02be02ad7e99edff71e1cc800323308e253c0bb733f25402c7b96a821b425ceccce183bbbbde306c6472ee5402b7d589b13dd71578949d0c01309cb1c9e691dff006fbcf2a1a5c12ea71723f726ef5f258d8fd35af0f8508b973c6dab1bb60831eb316e3ee9efae4dacc52d22b465bd450b87dd2ea735dad337000fd553c94f9462e8b361e7c5c112452005c38924b924c3efc15431d2f935200aba6be7be87ed930e2a29a660e88d66d02e412029bc16e4b9b5bdf4bd7d09559752f0e847edec4eef0d3c9c3245237e8a13f65535b5932c993e22469fa31a8ab5ba72dffc29d7e3a88ff5aeb1ff00aeaabdbad7c44bf388f6694d6897cedfa1caf167f2457a90bb4dba96ed3fef5bba3d17bce21fe5429eccec7eb15c9b59f551e27dbffaa97d8f1e5c016fc26209f245c9f5a1a6a6fe64bd44312ac527e8cd34578c2fa57a056e2015b316f92153624b333d873c83228f369187e6d6ba9ed8db3f7bb460808eac015dfb0ee4093fcf9947e69ac33cf6c6c6f498be24ebd8b33a31b2fdcf868a1f84aa3391cddbace7cd89352d40a2b927aa4a951ed1451412145145001451450014515cd8d90ac6ec085215882dc01009b9ee14014cfa4cdbbbfc5baa9f7bc30312f7cad632b790013b883db511d03d883178c8e36178901965e3eaae8ab71c33391e41aa3f696ca9e18d6490ab03766d6cc19bacc4dfd6373ad5b9e89f60fb9f0bbd71693116737162b181ef6bda3425ac781908e5577c2334ae5657fe91f674787c518a0de2288e36b6f643ab996feb31e48b531d10e8dc78cd953d901c40775491892d99324a8b98939549214db9135efa62d99209d2754ceae8aba15b83197bdc311a7beaf0bf3a6bf44db3da2c0ddad792491ec0dedc23b1234bfbdf2a1be094be665278560742080c32b022d6be841078107eaabbbd176dc33e177521bcd873ba7bf16503dedfbeeba13daad55d7a4ce8f9c3e30b46bef7882644e40487efab7b586bd7fcf36e1537e8bb013c58cceee99658583007d62a54a0ef600b91dd9e87ca223c4a879e9e6b0469f1f11871fa12aca7e88eaacda66f34bf3dbf68d59dd39bdf07d8713aff0066c41fac0aac3687df64f9effb469bd1f56723c5dfe917b683ddcf769ecff7a6a54cbb3f0a3e30327e9ddffd74998b93d76f9c7eb34fbb7e3c916163f8b101ec551f61ada5ce48fb8b35b74f2f6212bc06bda29939a75eca8834ab9bd51d66f9a8331fa0538fa26c296f74e29c59a47118f05bc8e47f592b2ff56293a060904ee79858c7839bbff715aad3e8060b7580c3a916664de30ec79499581f02e479573f572e68eef85e3ffb0c7451452476428a28a0028a28a0028a28a002957a698eb2a4038c97793f268469f9ce556dcd43f6533bb800926c06a49e5550edcdb3759714c6dbed52fa658141dd72b8ea13258f03311caa52b6564e91dbd13c37ba71d988bc5875cc6fc0bb5d50761e0edf98bdb569d2c7a3ed9070f845ce2d2ca77b20e60b01950fcd40abe20d33d0ddb262a915d7a577eb40bf2253ec786a77d1bbdf029dd26207b3132d2f7a573efd87fc94ff00e641539e8bff00e447e5b11ff71254f6217527b6decd59e19216d33a900fc56b7558778363e5554ec2c54806502d3c2f75526def88c41426da2921a326deab9b55cd554f4ef05ee6c72cea3def1035fcaa001c7e725980ed8d8d11f2224bb8cfd27c5a4b86c36212f937d038b8b1025bc3a8e208ded88e5ad573b623cb3c83e513edd7eda73d8604b1cf812d944e8f342c2dd56246f72f7acac937f5fdd4b1b7c1711cc572b1bc72afc596325597da08f2a67492a9d799ccf14c6e50535d842c62f55c7737d46ac1e9638f786e4631f61fb691f1d1d9d876ebeda7391b7bb3f0d27128a11bc40c87fbc9f4d332e3247dc49fcf81fb3205f18a3e17b2b38242c2f6b03c3c3b6bcf738e7ecb01edb71adb4c2b1096dae0cb68c664c23a27af762477346515bc033107b335eaefd8d8d8e6862962fbdba295d2c40b7aa47223811c88aa5306e0965f8ca5013c331b100f75c007b89ab27d17e343e0847601a07689858824e8e1981f8443827966cdc380e7eae34ecedf85e4b8b88e5451452675c28a28a0028a28a0028a28a0055e9de2af1ae181d67b892c6c44096df778cd996204703303ca91f6760fddb8f8e322f14677b25b86546042e9c9e4b0b73556aebe926d7ced2cc0fdf2c916bc218ef66e36eb16792fcc3477f56993d19ec8dd61b7ce2d24e43ea3558c0f7a5ed1d52588e464356e88a7597d073a28a2aa5cad7d2c0f7ec37e4a7ff330f537e8bffe4bfaec47f9ee6a23d2ba75f0e7e44c3fbf054d7a3316c1ff005b31f6c84fdb56ec57b8d94bfd37d88715859235b6f56d2424f29135517e41b543dce69828aa96299e8fed0631a491826584895178160010f11171ab46648ec783643ca987a4783591898c868b1682689870df228bd8f2cf1e536f92e6a23a5182383c7975d229ef2adbe0bdc6f57f48ac9df9dbb29876645bd864c3ad8321dfe189e03ac4b25fe2ac8594db847328ad14a9a9230c98d4e0e0caa76ac5c1bc8ff3eda60e82ca25831185275fbe278371f63807f3eb1e91e1416240216519803c55af6653d8cae0dc72a5ed8b8e387c4472f00a6cff0031b46bf80d7c54574327cd1528fd4e1e1f95bc6fe84a32906c788d0d786a67a5382c93671eac9afe77c2fb0f9d4356f0929453473f241c24e2fb1aa14206bfcff3fbe9aba27b5f718d5726d162ac8ff265be84ff0058c4784ebd94b559aae60633f0b86b6b3701af2bdc8f3bf2acf363528d0c69b50f1e4b2fda297fa17b60e270cacc7df13a927ce51eb5b966166f3b72a9fae4b4d3a67a98c949292ee654514541628bfbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82aa48d8020b0ba82091c2e01d45c70b8d298cf47630ac5e4cbef83235d7ef526611390c4020e4626daf0b71ad36a2078fbbb4ff0089c5fae6fe0ae7c7fa6d9e48de31858d7382b984ad700e86dd5d0dafaf2e349184d8d133bc25db78163eb58650f24b0a82baddd32c8dc6d7d08e35960b6561ed0cced3b43248ab91506f2c0b6726c78590db2ea75e16a2901d78ce9b34aca5e042832de30e6cca082c9c340c3abe069c87a769ff00138bf5cdfc14bb3f44e078c328299d9591a2dec81a311621ded1cd95d5dbdcec154dc9602c6c6b960e89c4af8767799e3c44b0aa28880215f76cc2739bde89125865bded9bbaa5d3212a1b3eeed3fe2717eb9bf828fbbb4ff89c5fae6fe0aaf7a45b3e3c33bc00176ea32c9c16cc337bdebd78ec400c75241d0542546d44960f49bd29498bc99b0d1a64cdc24637cc54fc51f13e9aead81e97e5c342225c2c6c2ecd732b0f58df865aad28a9da88f52ddfbbb4ff0089c5fae6fe0a3eeed3fe2717eb9bf82aa2a2a36a26cb1ba4be95df17108df091a9560eae2562548d0e8579a965f3ae7d97e942684c64408c633a13230b82b9594f5781197cd14f2a41a2a6911ea3cedaf48ed3963ee644bb67d1d8d89166b757835813df73ce9766dba5893bb517e598feea88a2b48ce5154998bd363727271e58eb8af488f2429134084a05b3ef1ae4a8b5ed9798a8efe9737e097f48feea8ec16c39a58f79185617208cc01045c904b580d329e3ff00517cb6c7d18c4b5b2c6092c52c1d34616ba9d78f1fd13d944724a2a93292d1e193b9479f73affa5cff00825fd23fba8fe973fe097f48feeae46e8d4f955d02bab2e605587769adafab2ae9ccdab0c4f47e74281945df3dbacba6ecb070c6f61972dcf8f33a55be3cfccaff0041a7ff00cfdd8d5b07d28cb8691e45811b3a80ea64600b0e0feae8753fa46a77eeed37e2717eb9bf82ab9fe8d622c4eec68a5ad9d2f61606c335cd8903c48add1f469d812b2464a900a8cd9ac6530e6002f58670469d9de2f8ca9bb63518282a8f42c1fbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82abe5e8d39b5a4437240b0760489377a10bafc61f275e150d34795996e0e5245c1b83636b83cc1b6951b51630add1e324537592453972dc3b0361c16e0f0eee14515700f764960bbc92ca08519daca0dae00bd80d0683b0564f8c94b0732485810431918b02340435ee08b9f6d14540049b4262c58cd21625496323924a1ba926f7254ea3b39564bb46605984d282e417225705c8d41637bb11cafc28a2803449316b66666b0b0b926c2e4d85f80b927c49ac28a2a4028a28a0028a28a0028a28a0028a28a00c9652381238f02471163c3b46959fba5fe3bfe9b7777f70f60eca28a0037cf6b666b5ad6cc785ad6e3c2c48b77d1ee97e39defa6b9db970e7451401e0c4bf1cef71a0399b41d9c7b87b2bd599870661c38311c351c0f2b9f6d7945007a712f7073bdc7039dae38f037d389f69edad6ce49d4924f1beb7f3a28a00ffd9, 'Assistant Professor', '123456789', 1, 1, 'image/jpeg'),
('FUI-FURC-057', 'Dr. Shariq', '37401-5859968-6', 'shariq@fui.edu.pk', 'shariq@fui.edu.pk', 'Somewhere on earth', '0312-4653456', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714141316141414161616181a19191919181618191e191a19171a181b181b18191e2a22191b271c171a233324272b2d3130301822363b362f3a2a2f302f010b0b0b0f0e0f1c11111c312722252f2f2f2f2f2f2f312f2f2f342f2f2f2f2f312f2f2f2f3131382d2f2f2f2f2f312d2f2f2f31312f2f2f2f2f2f2f2f2f302f2fffc0001108010700c003012200021101031101ffc4001c0000020203010100000000000000000000000605070203040108ffc4004f100002010203040603090c080603010000010203001104122105133141062251617181073291142342526272a1b1c11733535473829293b2d1d2f0168394a2a3b3c2e1153443b4c3f124557444ffc4001a010002030101000000000000000000000000040102030506ffc4003011000202010302040503040300000000000001021103041221314105516181132271a1c13291b1142343d1334252ffda000c03010002110311003f00bc68a28a0028a28a0028a28a0028a28a00f28a295fa71b5da28d228db2492e6bb8e31c48019641df62a80f26914f2aa4e4a31727d11318b93a46cdb9b6f2b64831102ba9eba491c920274b2178dc6e4f790dc41b76c1f4b3a58ea91aae68cba06655619f311aa671eaaaf365d4922c458debec662f3683ab1afaa83801f6b1e24f335a1a426d724f2173f40ae74f53926aba7d3a8fc34b18bb7c9d18ac66f0de448dff00289bd3fa52e627db5ec18dc9a246b1f7c4d2427c9a265b547b4f94d9b4ec3c8feead8b203c083e758d7d7f7631b63e4870d8dd369e2201732a7e0e52b9add91ce00d78e92037f8e2ac7d8db661c4a1789b81cae8c2cf1b7c5753aa9e7d846a2e0dea8f486fc0af81603f6ac2bbb018f9b0f22b82d1b81656b5eeb7be565ffa91775f4e2a41adf16a9c1ed93b5f742d974c9f30ea5ed452f746ba4b1e24053649ad7299ae180d0bc6da6f12e46b6b8b80c01a61ae8c64a4ad08b4d3a67b451455880a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803caa93a79b433e227209b2eef0ebd9641be95878b48887f27dd565edbda2b8785e56d728eaa8e2ee74541decc40f3aa3f1d292d62c188cc59870691d8bc8e3b8bb35bb80a4b592f9547cdfd90d696172dde471621eca4f756876ca897ec018788d6b7c306fdc27c01d676e4157d63e16d3c48ad3b62504df85d89b760fe4d269f343cdf732622d66d54f06ecf1fdfedefd4d84b72cc3c6c47d86b4e1b1397bc7f3c2bac5ac4a1efb0e1ec3c3caacf82172609863f0598771aebc2e358031482ea6f6ee3f197b0fd62b189ae2f7bd7acb7aa4b9e1964bc8da98d68c5c6a14e6b5ca9536b6747521a3702fa8229bba3fe91e69248a00865790855ba8cdc75667420150352420b01ce9369abd0ded28d26970e51033a992390280c42919e32d6b91a8603e777531a6ebc3afc8b6a52db7565c145145748e7851451400514514005145140051451400515a7113a20bbb2a8ed6207d75cd84daf04a72c72c6e78d95d4923b40bea2803beb16eee3595140147f497a458a96678e78c46f112b6570c8971a9423892a7d63ad891d5b91506d183c7ebaede9ae066c262e6de82639a4792390faac1d8be5cdc996f6cbd8b7a847c79b7003c6b979612dece9e294762a251b1400dda008a78db52d6e6cdcc0ec161af0ae6d931efb17128e01839ee58c8627c0b655fce1511362ec0b335afccfd54c5d1b49233ef5361164900d6493786dc77688840d2f726e6e7b80354d9b62da2dbd3691dbd26e86bc6c6481732b758c57008bf13193a11f24dadcb90a55113836c922b70b14753ec22f5796c8695e3f7fdd335ff00e9860bfa2f72a7ccd741c0a6b65b7b74f2e159ac8d2aebea56d5f3c143472ba12082ac3d65604107bc1d45752e3c731ecab0715e8fa120dcc924878cad21de7f081afaa05bbaa0715e8ee55d5665cbf2d351e255ac7d82aff131bebc7b1316fb0b53636e2ca2dde6a57d1d86ff0089e172fc69337cddc497f2bdaa1f0fb3a59263044ad2c99dd02a8b5f21209d4d94697b936ab83d1e7420e0ef3ce55b10eb9405d56242412a0fc26240b9ee007696b0637bad7431cd916da7d47ba28a29e110a28a2800a28a2800a28a2800ae3da78d10c4d2104e51a28e2cc485551de5881e75d94b1e901dd70ca5335f7d10eadae0bbe443ae9a48c87ca8014f17b5a692e448e5a666549213982c519cb2388f5206a72e504f592e6f7ae5f756f5400619735a281736528a2fef813ad6242e606e3445b5686406e1002f215c3c7bb7313ac71dc312848f82b23024907a80f015b368b901d89902c604318923899559ad98f5458e5016dc4f51ab43327ba1dd2499f14d8791d9a3505632e05d8581525d4759b461727ad6bf3ab0aa80e8e63c0c5978fab95955000a0658d6c2e083cc1bebdb57d34ea38b28f315592a2d1766389c3248a52445753c5594303e20e86aa1da5d11c2e25d67842612021b76110c866506c27dd821618cf23adc15272f0ab664c546c0aef135047acbcfce92b047261618ae03428904b6d2cd0a84fd136cc3b981e749eaf23842d218c11dd2aba20360ecdc361618a4c9be9e445973b052cab200c0027ab1a8040d35241e36d24a4db6b20292c41d0e857324808ef470011eda8e5c1c7347be9849bad1208d5ca17417c84e5b1d75ca2f608013ceb8e6d858602ecb9189b8c923ad8f20b63d6f306f4e62e609d50ae475276ec9fd993ee244ddb16c34c728049261935b282dae43622cdaab0cbc080adf55fecb858a7b9c967613472666163917232e6161662d1e5b73bdec29fd6b91ab8c2395a8fbfd47f0b7282722271e311324670d3240ac331778b78d6362a15090a2e3524f0d34ada0cb1e1dcccc924888e4b22140d9549072126c6c35d6d586cf9444f2c048cb084746ec864ce114f7a98dd7e684275344f8e49a39634b92d148381e71f3bf0f587d3d86b3aedd8bf6dc2aec8d811c38ac3e223de437982481653267de23598975bf59d55597859ae0822adba49d8382699e0902b2c11da6ccc32ef6428551554ebbb50e5b31b5d825ae2f4ed5d1d2a9ac6b7f516cee2e6f6f43da28a298320a28a2800a28a2800a28a2800ae3da5868e489e393546521b5b69ccdf911c6fcabb2967a718e0207854932cc046112e5f239b3b055d744ce41e1714015bec8c16366368157111c48b937d96eab375d430622f20545b9cdcf80bd757f41314533e29e386307d48466725dc666bfaa96ccdaf58dbb2bb7058cc560f0e582450b4d3c6652c44d27becb1c015110eed0471e4b1676b9537517d3762f68d816bbc8fc7793be7636e4aa32c70836b108a2f7abf266e91c5838e3850450a2c69d9c4b1b71663ab1b790e405766c570f88995d5580862b0645207be3f222dceb99c03a83a7107b47107c2d6acba273abe27125583658a1536edde354954c9a7c2419829c3427bfdcf158789cbdc7f922a2fa5d868a3c24cc90c2872daeb0c6a46a3810b7153eef6b0009b9f67793509d385be0a7f9a3eb02826c588ba40cec99f33699752a2dd5274ca808e03d95bdb1675ca025f895e27c5cdd8fb697b043af1f8ffa1aa5239f39cb12b4adcc462e077173645f322ace518ab93a46694a4ea3c8c9d02d66c45f964b78e4ff007a9f9ce317aaa2271c9c92a6ddea148bfb3cab8ba1bb2a48f3bc8002fad81bf0000d6c2fc3ff0075dd274810381918a190479ee3d62e23042f35ce6d7f3b5b5ae065ac992528f4b3b38a325149ae52e7d0dbb2f65651234c44924b6121b58655be58c0d7aa3331d49d5cd4a410a83602d73af99d7ebac857b1100dce806a7b80d4d515f4224f8629743f6dda18d03eedd06ece6d63729d43717eab5c71045fbf85396176c29611c837721d14137573d88fc09f926cda1d2dad541d1d973c6cfc9e4771e0e737db4c386da4caa51c092222cc8fa8b79f0faaaf1d64b14dc5f2acde5a153c6a71e1d16a506927636de7552e03cb00b754dde78876db8cc9ced72fc7d63650e185c4a488ae8c1d1802aca6e083c0822bab8f2c722b8b3993c7283a9237d14515a140a28a2800ad534ca80b330551c4b1000f127852d74aba5430f992329bc55cd23bdf770291a17b105dcf111820902e4a8b1303b2fa3f89c6913621e48a33aae7b1998722148c986523905cc41d6c6a688b263a4bd290abbbc3ca81ca3485c8be58d4a863103d591fada7c11c4df452878eda4918478deec1c48f76ccf2bc6ee0ef1fe13345210b7b0b5ac0014dfd26c0ecfc344b1b42af29059033be7b0d1a49262d9d621cc93d8002c40af7a13d0fc388c4f26190bb9cd1ef12e5100b290ad7c84ead6e20103954aa4434d9198f3262e23143879a45702ce14201a86570f2d96e08074cda8e15a57a172a234f8fc4055417648016627e287716bb1b00a1789b0356a525f49f19bc9d5090b061ed23bb7aad883f7a4b5c67280e72bc2ef19bdc00625295700a31ee20f497644e6510ab2c70844254316286dac44deee56c3536b8b56ad90370b3260dfae23cd29390dd6337f85d85b82f6d77ed0861666638ee3c6f8595bc7d596a3618e28b364da01732ba1b6cd9cf55db311f7c3cc52f1c79a4d39caabb2fc9bcb2618a6a11b6fbbfc2241ce38fff00d5ec8d07d42a276cbe356390bcdbc846556bdb52d6b0cb7b9e5ad751c6a7ff00627cb65e23f8eb096685d591f1eecac4311ff0bc46a40b0e74d4b9549d0b43876d589b0c65d82dcf58db56622d6248e36e02de756b742b6924d9626b2c88355b01980e0c076768e47c452ce1b6760ae0fba24b8e0460710b5d988d8b132349859e47c4460c88b95a3660bc425fad985fbefc35b8ae7ea34b39a57cd0fe3d4e38da5c59698a813b1d1670e9113d7cf732b64526e598477b66b93dc09bf1a50d85d3cc46eaf2086622dcda2241170732ab83cf820f54d4d8e9b4845d708a4f7e26c3da2127e8ac568f3d5c570fc99596ab1c1b4dd31c40a50f48bd2258a17c2c4d79e55caf6ffa519e372383b0d00e3adf96abbb63a698c918c48d1e1d4d85e2b9624f15df3f0e3a5954f61a87c2e0421d6e5ae4926e4df89249d49ed26b371f86fe6eabb1be383ca93ec4c6c58ed0a5be10cdfa5a8fa2d596d393444f8eeabf9bc5be80479d63b0c1dc457d3a83d8751f45ab1da5f7c80fcb3f4a301487f95fb9d7ff001af62570f886460ca6c47f363da2983666d6dd13320f7a26f88887c0278e2231d9cdd798bb7ac0e75aadf83c5346e1d788e5da3983dd460cd2c53b467a9d3c72c7d4b56390100820822e08d41078106b652874631eb1bae1efef3282d8727e09173261ff00375651f1730e09ab7d7a3c7914e2a4bb9e7a51716d33da28a2ae54a7f634f1b4b1498a0cd6cf3ba019b3628c9660e4903de8ae50a78644b7ab539b47a6f2cac61c24643f3b059a51e0884c71df5b348f61f14f0a67c7f44f072bb4924085d8dd8f59731b5aec1480c6c00b9ec152780c0450a08e28d2341c1514281e42a6c8a13ba3bd0a6cfbfc61ccc486dd67326661eabcf29fbeb0e480045e40e967ba28a82489dbfb456145bb58c92450af69696454eaf7804b7e6d55bd25c61265616b40c1634372a0b65cce45eecc4b9b926e7ccde6ba47b437b32c87d5f7561a0807c98f1b099a5f1791028f931023d634afb79bab8bfcb81fde8e8c5352baece8a658b8a57df938711b72443669901e36dd1fdf5a8f489ff0e3f526a2b6abda4908e5183fb558ec980323cd348e234b0b29d598daca3bf51edeeadcc096fe913fe1ff00c1347f489ff0ff00e0ff00b543c8bd6e2a97e08f39cd6e57b680f95744f830d1b346654922d64467cd753f094f31fcf306a2cb34492f481ce9bf1ae9f7ab71f2aeec262e466762c33c0124460b6209cf706dc410b6f02473a4d865254dc93675e3e229a70475c57e493ff2d495366d5c446b8f391020902e700e99dc190301cb5b69dac4f3b53e41b3e2502c80f7917f3d6aabe91496c4330e2a90b0f158d5becab5765cb9a246f923e8d2a98e6ea51f27fc91ab856d9f9afe042dbf8666c562142df506ddaa638cdedcc5d88f2ae08b03237bd8dee43a152f204b761526d97bb87753274a3deb19149ca48f21ecba3123ccac84ff00575be46b026d7eeedeeae26b672c795a4baf28f43e1f1865c1193edc7ec08b60076002b876d5c2061c51837d9f6d7561d5871b73d7993dbf5fd0395653c4194a9e62d5cc8ba959d492b8d18e0f14b220753a1fa0f307bc56ea50c362da096ff018e571d8dc037d9eca6c8650c0329b835a65c5b5dae8ca62c9b953ea892d9c43830962998868dc718e5537471e6069cf870269eba3bb50cf15dc0595098e6406f924502f6ed5208653cd594d56c2a7707b54c6c3163e0811e2947c28813967039b464927e4b3f12169cd06a36bd8fa339fe21a7bfee47dcb128ad71b8201041075046a083cc1ad95da3901451450079509b676b32b0c3c2034ccb98dcd962426dbc7235e370aa35620f000b0efda58e4862799cd92352c6c2e6c05ec00d493c001c49a5dd991ba44d2ca3dfa53bd975be5622cb103f1635b20edb13ccd2fa8cbf0e17dcd31c374a85adb5b2d615c32995dd966c1a28b22a855c4c43450b9bb4eac4f7d2d6ddf5317ff00e81fb71d4f6dd98bcd05ff0019c2ff00dcc5fcf9541ede1d4c57ff00a07f98955f0e96f84a5eaff844ebe3b2518fa7e455db5ebcbf931feaadb826be154f28f108cff34a900f85d96b5ed81d797f263fd55c7b3369ee4dfaacacb95d18e8cbd9e3c6ba342174c91c0cab1bcab2c6ae5d6450590bead729220b8b9e02fadae7436b5766cb8f21666e11e1d95cf66620aafb17e8ae58b1f84b693e2221f12c1addc1ac7ebae6da5b6a364dcc3d48af998b1eb487bfbbf75b855517647e08751aff001d3fd34dd84e38afc8a7fe5a54c2eaac7b645fad69af083fe6bf249ff96ac508adba3ff90c3e4423fc15ab1ba1b266c2c47e48fd907edaaf36f8b625be6c3fe5ad585d0c4b6190770fd95ac30feb97b1a6b7fe287b9a7a73832f87cea2ed1b071dfda0788eaf9d476cdc489235606fa7d9c7cc58f9d3762e1ce8cbda0fb797d355ee0dfdcf2943a236a3bb5e1f9a4dbc08eca53c4f4ef263538f58ff00035e0da95093c72e8fa13d4514579e3d40b7b7a01bc208b871723c743f5573ec4da2616ddb9254f03da3b7e70e7dbc6b7ed7c407934d4016bf6ff37a8cc5a82be7a11c41ed1df5d2c71dd8d46473e6f6cdca23ba3022e0dc1e75bf098968dc3af2e23911cc1ee3493b376bb4760799b5b5b3778ecefeca6ac262448a1869dddf49e4c32c4fd06a19239557d872e8a6d3589970e4fbc3dfdcc4fc0205db0addeba94ed5d3e06ae9551a3ad8a382636b6600d8820dd5d186aaea4021870229e3a2fb68b9dc4cc1a555ce8e0584d15f2ef00e4e0d95d470241e0c2bafa3d57c48ed9755f738babd2bc52b5d18cb451453e262ef4a14bc9858cfa86632383f0b731bc88bfad11bff005751b8fda28d0bc82e15598127e45f31f683eca85e9cede64c49472eaf1157c320032c81a301a4d14bb925e5872adec35b5c835a5f07889203856c3cc8710f746cb7091ca6f299185c46c999cd9ad7ead8137010d5e194e4aba35f918c138c6df7445ecec7c2fb86905a679a29199c8023092acb952fc82a58dad7d49ae6e9127fcc28d4b3a48b617cca590dd6dc46878761a64c46c4861c488608cde350f2c8e733c8ee1951331e08aa198a8016ec847035a63d80d243bd894cb0176dd84d1d40001961278c6ce1babc080a468459ac3962b23c518d2491865c72705393b6d95fe2b0d99f383229b01f7a63c2fdabdf5a0e07e549fd9dbf869db1f8796256775c5a22ea58c08401e350988db689eb4f895bf0be1929bb15a641fb87e549fd9dbf86bd181f952ff676fe1a93fe9245f8ce23fb3c740e9243f8ce27f511feea90a238606f6b9988041b6e187037f8953183439712c559432228ccacb7233e803017e22bab078cde32a23e2999cd9408a1198d8b6975ec04f9549ed0c04d1a2b98672e5d522de98946f5cd9744d74f5af6eae5cdcaa1c92ea4a8b7d0edd89d16c3cd34d34ea652acb1aa66213a91ae66214dd8dcdac74d385ea6e5e8cc6bae19e4c33760669223dcd0c86c07cc287beb8f636cc870aaaac4cd30b9691b8063727229d100d786b61a9353b1ed243c6e3c7fdab839357fdc6e323aab4b704a51b215a4c427564c33337268983a37610490e9de1974bf13c697b17d1e9e7ce14e1b3235d819a556426f6ba9838117d7811c0d585ee843f097da2927a7f2059209d35b1dd496e0c8d76507b4861a766635bbd7ce51daab9fb98e2d04233ddcff00a23b0db131918ca66c101cb34d2311e00443eba313b0a57167c742a39848647fa9d6fe75be29030054dc1acab98f3b4ed4527f43b8b036a9cdd11f1f46221ebe2e46fc9c0a9fe63b56e8b606117d66c54bdcef120ff0d01fa6ba5980e26de35cf263e31c5d7c8dfeaa3e3e5974fb223fa6c6bab7fb9b06cec2afa98717ed925965fa19b2fd15b1540160001d80587b05703ed88870cc7c07efad0db707243e640aab5967d6cd23f0b1fe925eb77fc4772826bd8e1d84ca7e48eacf1f7e688b587c6553ca96e6dbcc05f2aa8ed27ff552bd11d87363e58e47cc30c8caecc45849948611c63e12920666e16b806e74634ba7c9f11497617d5e6c4f1b8b2eaa28a2bbc704f08af68a28021b69f46b0d3c9bc962ccc542b59dd43a8bd95d5582c8a331d1811a9a95550a2c00000d00d0003ea15b2a13a65315c24b6362e162bf66f9d62bf967bd1404074936e7ba70f245141232b8195cd802030606dc729b7b0d23edfc24cdbb6f7311958e97539b32916b01e7e46ace09001617b0d05afc05456d7920de44a735ad23f3e2b9147d121ad12a326ecabdf0d29e3857f2d3ecad9161267ba8c3106c4eb61d83b3bc558664c370cad7f1ff007ac526844b110afeb9075e20c6e2dc7e3653e5536576a20764a4b136189c3c9681909b15bb658d934f1245356d7da9bf682458a506090c8e852ed91e2961de22a125f2b38b81a80c4d48ef62f887dbfef5cf1caa31b862ab94b2cf19ef05524d7ce21edaa6482945a34849a640604e69e72d9ae2288c41948ba177debae61af595013cb2af6d7615b7d07da2f4e58fd9b14d6de2062b72a750cb71639586ab71a1b1d6aade9a633118691a181d5a35b2a978f33a0ca0e50c186602f61981361a93c6b9193c2e591a58df6ee3ebc46389379384d9d9b436a8460a356639554296676f8a88bab1fe785276d8e9089c0520a056b90d606eb716207aa41e373716b54660f6bcd0cdbeb9673a12d6bdbb148d157e4dade1c69836eed2c1626069d818f1416c0ae8646b688ebae6e5a9d40e645358bc2a38ff005be7cd7630c9e28e7ce3aaf27dc848f1f97d5723e6dfecac9f6d31f8721f223ebb545093f9ff006aecc36119f5e03bf9d3d1f0ac527cb6c4a7e379a0ba247ad8c2dae466f12a6de36248f3ac37f21e1181e24fee15ee2f00ca3369a5b504822e6da1e22b4a48e3e11f0600d8f8daff004d6593c36517f253fa9b61f1884e373b5f4e51b3df8f351e03f7935d3b2f664934f1459d8992455b036d09bb7aa07040cc7b949ae685e57608a533310a3a878b1b01ab1e67b2afce8e74470f84eb202f2916323905ac6d70a000a80902e140bd85ef6ac3fa59c1add48696b31ce2f65b3dd9fd0ac04443261632cbc19c1958783485883e74c20515ed322f7614514500145145001503d3788b60e520125324b61c4eea459481e486a7ab122f4015d8dac2f7b310780b8b78f0bd45edcdaa0346f90e81d388f8595aff00e1fd3533d32e8da41859a6864910c6a0a27bd941a8001cd196ca2fdbcaaadc53e3986532861dcb172d79a0ad5533095c7a8cdff1b4be6dd9bdad7b8e15bf07b643cb18c8746cc751c02b7db6a45dce2be31ff0bf756ec37bb10dd58836b5ed0f0f31dd53457716a8daaa2e421b9e3a8d6b6ec3c56fb1d000b6091cf2137bfe0e303cf787d86ab8c0e2b17bc89649572bcb146d654bda49550dac96bd9aaefd8db023c3966567766001672b7b024d8655006a7b390aace970690b6ec97aa6ba5d367999bb5e6f62ccc83e84ab92f546ed39736edbe346ae7c642d21fdbad74abe712f147586bd5103b4f0e08cdadfda2c3bab460706b22b83c542907cc823e91eca91c6b5a36f0b7b74ad3b0469377227d320fdc69e9ae7f6fe4e4e19bd8fd2ce6c141225fa8a7bc91a7b2a512f6d6d7eeaca8ad62a857264deeda31740410781d0d474f816bf02c7b45b5f9ca6daf783af6549d6fc29b667f882e3e792157d84e6fcd3559a5565b0ce49d20e80ec6326d0843708d9a461f921f6485055f02abbf44fb3befd391a690a782f59cf9b151e31d58a2b979e573fa707a6d1c5ac49befc9ed1451588d0514514005145140051451401c1b670227825849b6742b7b5ec48d0db9d8d8daa98c76230825911ddf0ee8ee8c13ad1e64628d97321017303a02be02ad7e99edff71e1cc800323308e253c0bb733f25402c7b96a821b425ceccce183bbbbde306c6472ee5402b7d589b13dd71578949d0c01309cb1c9e691dff006fbcf2a1a5c12ea71723f726ef5f258d8fd35af0f8508b973c6dab1bb60831eb316e3ee9efae4dacc52d22b465bd450b87dd2ea735dad337000fd553c94f9462e8b361e7c5c112452005c38924b924c3efc15431d2f935200aba6be7be87ed930e2a29a660e88d66d02e412029bc16e4b9b5bdf4bd7d09559752f0e847edec4eef0d3c9c3245237e8a13f65535b5932c993e22469fa31a8ab5ba72dffc29d7e3a88ff5aeb1ff00aeaabdbad7c44bf388f6694d6897cedfa1caf167f2457a90bb4dba96ed3fef5bba3d17bce21fe5429eccec7eb15c9b59f551e27dbffaa97d8f1e5c016fc26209f245c9f5a1a6a6fe64bd44312ac527e8cd34578c2fa57a056e2015b316f92153624b333d873c83228f369187e6d6ba9ed8db3f7bb460808eac015dfb0ee4093fcf9947e69ac33cf6c6c6f498be24ebd8b33a31b2fdcf868a1f84aa3391cddbace7cd89352d40a2b927aa4a951ed1451412145145001451450014515cd8d90ac6ec085215882dc01009b9ee14014cfa4cdbbbfc5baa9f7bc30312f7cad632b790013b883db511d03d883178c8e36178901965e3eaae8ab71c33391e41aa3f696ca9e18d6490ab03766d6cc19bacc4dfd6373ad5b9e89f60fb9f0bbd71693116737162b181ef6bda3425ac781908e5577c2334ae5657fe91f674787c518a0de2288e36b6f643ab996feb31e48b531d10e8dc78cd953d901c40775491892d99324a8b98939549214db9135efa62d99209d2754ceae8aba15b83197bdc311a7beaf0bf3a6bf44db3da2c0ddad792491ec0dedc23b1234bfbdf2a1be094be665278560742080c32b022d6be841078107eaabbbd176dc33e177521bcd873ba7bf16503dedfbeeba13daad55d7a4ce8f9c3e30b46bef7882644e40487efab7b586bd7fcf36e1537e8bb013c58cceee99658583007d62a54a0ef600b91dd9e87ca223c4a879e9e6b0469f1f11871fa12aca7e88eaacda66f34bf3dbf68d59dd39bdf07d8713aff0066c41fac0aac3687df64f9effb469bd1f56723c5dfe917b683ddcf769ecff7a6a54cbb3f0a3e30327e9ddffd74998b93d76f9c7eb34fbb7e3c916163f8b101ec551f61ada5ce48fb8b35b74f2f6212bc06bda29939a75eca8834ab9bd51d66f9a8331fa0538fa26c296f74e29c59a47118f05bc8e47f592b2ff56293a060904ee79858c7839bbff715aad3e8060b7580c3a916664de30ec79499581f02e479573f572e68eef85e3ffb0c7451452476428a28a0028a28a0028a28a002957a698eb2a4038c97793f268469f9ce556dcd43f6533bb800926c06a49e5550edcdb3759714c6dbed52fa658141dd72b8ea13258f03311caa52b6564e91dbd13c37ba71d988bc5875cc6fc0bb5d50761e0edf98bdb569d2c7a3ed9070f845ce2d2ca77b20e60b01950fcd40abe20d33d0ddb262a915d7a577eb40bf2253ec786a77d1bbdf029dd26207b3132d2f7a573efd87fc94ff00e641539e8bff00e447e5b11ff71254f6217527b6decd59e19216d33a900fc56b7558778363e5554ec2c54806502d3c2f75526def88c41426da2921a326deab9b55cd554f4ef05ee6c72cea3def1035fcaa001c7e725980ed8d8d11f2224bb8cfd27c5a4b86c36212f937d038b8b1025bc3a8e208ded88e5ad573b623cb3c83e513edd7eda73d8604b1cf812d944e8f342c2dd56246f72f7acac937f5fdd4b1b7c1711cc572b1bc72afc596325597da08f2a67492a9d799ccf14c6e50535d842c62f55c7737d46ac1e9638f786e4631f61fb691f1d1d9d876ebeda7391b7bb3f0d27128a11bc40c87fbc9f4d332e3247dc49fcf81fb3205f18a3e17b2b38242c2f6b03c3c3b6bcf738e7ecb01edb71adb4c2b1096dae0cb68c664c23a27af762477346515bc033107b335eaefd8d8d8e6862962fbdba295d2c40b7aa47223811c88aa5306e0965f8ca5013c331b100f75c007b89ab27d17e343e0847601a07689858824e8e1981f8443827966cdc380e7eae34ecedf85e4b8b88e5451452675c28a28a0028a28a0028a28a0055e9de2af1ae181d67b892c6c44096df778cd996204703303ca91f6760fddb8f8e322f14677b25b86546042e9c9e4b0b73556aebe926d7ced2cc0fdf2c916bc218ef66e36eb16792fcc3477f56993d19ec8dd61b7ce2d24e43ea3558c0f7a5ed1d52588e464356e88a7597d073a28a2aa5cad7d2c0f7ec37e4a7ff330f537e8bffe4bfaec47f9ee6a23d2ba75f0e7e44c3fbf054d7a3316c1ff005b31f6c84fdb56ec57b8d94bfd37d88715859235b6f56d2424f29135517e41b543dce69828aa96299e8fed0631a491826584895178160010f11171ab46648ec783643ca987a4783591898c868b1682689870df228bd8f2cf1e536f92e6a23a5182383c7975d229ef2adbe0bdc6f57f48ac9df9dbb29876645bd864c3ad8321dfe189e03ac4b25fe2ac8594db847328ad14a9a9230c98d4e0e0caa76ac5c1bc8ff3eda60e82ca25831185275fbe278371f63807f3eb1e91e1416240216519803c55af6653d8cae0dc72a5ed8b8e387c4472f00a6cff0031b46bf80d7c54574327cd1528fd4e1e1f95bc6fe84a32906c788d0d786a67a5382c93671eac9afe77c2fb0f9d4356f0929453473f241c24e2fb1aa14206bfcff3fbe9aba27b5f718d5726d162ac8ff265be84ff0058c4784ebd94b559aae60633f0b86b6b3701af2bdc8f3bf2acf363528d0c69b50f1e4b2fda297fa17b60e270cacc7df13a927ce51eb5b966166f3b72a9fae4b4d3a67a98c949292ee654514541628bfbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82aa48d8020b0ba82091c2e01d45c70b8d298cf47630ac5e4cbef83235d7ef526611390c4020e4626daf0b71ad36a2078fbbb4ff0089c5fae6fe0ae7c7fa6d9e48de31858d7382b984ad700e86dd5d0dafaf2e349184d8d133bc25db78163eb58650f24b0a82baddd32c8dc6d7d08e35960b6561ed0cced3b43248ab91506f2c0b6726c78590db2ea75e16a2901d78ce9b34aca5e042832de30e6cca082c9c340c3abe069c87a769ff00138bf5cdfc14bb3f44e078c328299d9591a2dec81a311621ded1cd95d5dbdcec154dc9602c6c6b960e89c4af8767799e3c44b0aa28880215f76cc2739bde89125865bded9bbaa5d3212a1b3eeed3fe2717eb9bf828fbbb4ff89c5fae6fe0aaf7a45b3e3c33bc00176ea32c9c16cc337bdebd78ec400c75241d0542546d44960f49bd29498bc99b0d1a64cdc24637cc54fc51f13e9aead81e97e5c342225c2c6c2ecd732b0f58df865aad28a9da88f52ddfbbb4ff0089c5fae6fe0a3eeed3fe2717eb9bf82aa2a2a36a26cb1ba4be95df17108df091a9560eae2562548d0e8579a965f3ae7d97e942684c64408c633a13230b82b9594f5781197cd14f2a41a2a6911ea3cedaf48ed3963ee644bb67d1d8d89166b757835813df73ce9766dba5893bb517e598feea88a2b48ce5154998bd363727271e58eb8af488f2429134084a05b3ef1ae4a8b5ed9798a8efe9737e097f48feea8ec16c39a58f79185617208cc01045c904b580d329e3ff00517cb6c7d18c4b5b2c6092c52c1d34616ba9d78f1fd13d944724a2a93292d1e193b9479f73affa5cff00825fd23fba8fe973fe097f48feeae46e8d4f955d02bab2e605587769adafab2ae9ccdab0c4f47e74281945df3dbacba6ecb070c6f61972dcf8f33a55be3cfccaff0041a7ff00cfdd8d5b07d28cb8691e45811b3a80ea64600b0e0feae8753fa46a77eeed37e2717eb9bf82ab9fe8d622c4eec68a5ad9d2f61606c335cd8903c48add1f469d812b2464a900a8cd9ac6530e6002f58670469d9de2f8ca9bb63518282a8f42c1fbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82abe5e8d39b5a4437240b0760489377a10bafc61f275e150d34795996e0e5245c1b83636b83cc1b6951b51630add1e324537592453972dc3b0361c16e0f0eee14515700f764960bbc92ca08519daca0dae00bd80d0683b0564f8c94b0732485810431918b02340435ee08b9f6d14540049b4262c58cd21625496323924a1ba926f7254ea3b39564bb46605984d282e417225705c8d41637bb11cafc28a2803449316b66666b0b0b926c2e4d85f80b927c49ac28a2a4028a28a0028a28a0028a28a0028a28a00c9652381238f02471163c3b46959fba5fe3bfe9b7777f70f60eca28a0037cf6b666b5ad6cc785ad6e3c2c48b77d1ee97e39defa6b9db970e7451401e0c4bf1cef71a0399b41d9c7b87b2bd599870661c38311c351c0f2b9f6d7945007a712f7073bdc7039dae38f037d389f69edad6ce49d4924f1beb7f3a28a00ffd9, 'Assistant Professor', '123456789', 1, 1, 'image/jpeg'),
('FUI-FURC-058', 'Dr. Ishitaq', '37401-5859968-7', 'drishtiaq@fui.edu.pk', 'drishtiaq@fui.edu.pk', 'Somewhere on earth', '0312-4589645', 0xefbbbf, 'Assistant Professor', '123456789', 1, 1, NULL),
('FUI-FURC-059', 'Dr. M. Ahmed Iqbal', '37401-5859968-8', 'ahmedIqbal@fui.edu.pk', 'ahmedIqbal@fui.edu.pk', 'Somewhere on earth', '0312-5453413', 0xefbbbf, 'Assistant Professor', '123456789', 1, 1, NULL);
INSERT INTO `faculty` (`facultyCode`, `name`, `CNIC`, `officialEmail`, `personalEmail`, `address`, `contactNumber`, `picture`, `designation`, `password`, `departmentCode`, `showEmail`, `pictureType`) VALUES
('FUI-FURC-060', 'Dr. M. Asif', '37401-5859968-9', 'asif@fui.edu.pk', 'asif@fui.edu.pk', 'Somewhere on earth', '0312-5453412', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714141316141414161616181a19191919181618191e191a19171a181b181b18191e2a22191b271c171a233324272b2d3130301822363b362f3a2a2f302f010b0b0b0f0e0f1c11111c312722252f2f2f2f2f2f2f312f2f2f342f2f2f2f2f312f2f2f2f3131382d2f2f2f2f2f312d2f2f2f31312f2f2f2f2f2f2f2f2f302f2fffc0001108010700c003012200021101031101ffc4001c0000020203010100000000000000000000000605070203040108ffc4004f100002010203040603090c080603010000010203001104122105133141062251617181073291142342526272a1b1c11733535473829293b2d1d2f0168394a2a3b3c2e1153443b4c3f124557444ffc4001a010002030101000000000000000000000000040102030506ffc4003011000202010302040503040300000000000001021103041221314105516181132271a1c13291b1142343d1334252ffda000c03010002110311003f00bc68a28a0028a28a0028a28a0028a28a00f28a295fa71b5da28d228db2492e6bb8e31c48019641df62a80f26914f2aa4e4a31727d11318b93a46cdb9b6f2b64831102ba9eba491c920274b2178dc6e4f790dc41b76c1f4b3a58ea91aae68cba06655619f311aa671eaaaf365d4922c458debec662f3683ab1afaa83801f6b1e24f335a1a426d724f2173f40ae74f53926aba7d3a8fc34b18bb7c9d18ac66f0de448dff00289bd3fa52e627db5ec18dc9a246b1f7c4d2427c9a265b547b4f94d9b4ec3c8feead8b203c083e758d7d7f7631b63e4870d8dd369e2201732a7e0e52b9add91ce00d78e92037f8e2ac7d8db661c4a1789b81cae8c2cf1b7c5753aa9e7d846a2e0dea8f486fc0af81603f6ac2bbb018f9b0f22b82d1b81656b5eeb7be565ffa91775f4e2a41adf16a9c1ed93b5f742d974c9f30ea5ed452f746ba4b1e24053649ad7299ae180d0bc6da6f12e46b6b8b80c01a61ae8c64a4ad08b4d3a67b451455880a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803caa93a79b433e227209b2eef0ebd9641be95878b48887f27dd565edbda2b8785e56d728eaa8e2ee74541decc40f3aa3f1d292d62c188cc59870691d8bc8e3b8bb35bb80a4b592f9547cdfd90d696172dde471621eca4f756876ca897ec018788d6b7c306fdc27c01d676e4157d63e16d3c48ad3b62504df85d89b760fe4d269f343cdf732622d66d54f06ecf1fdfedefd4d84b72cc3c6c47d86b4e1b1397bc7f3c2bac5ac4a1efb0e1ec3c3caacf82172609863f0598771aebc2e358031482ea6f6ee3f197b0fd62b189ae2f7bd7acb7aa4b9e1964bc8da98d68c5c6a14e6b5ca9536b6747521a3702fa8229bba3fe91e69248a00865790855ba8cdc75667420150352420b01ce9369abd0ded28d26970e51033a992390280c42919e32d6b91a8603e777531a6ebc3afc8b6a52db7565c145145748e7851451400514514005145140051451400515a7113a20bbb2a8ed6207d75cd84daf04a72c72c6e78d95d4923b40bea2803beb16eee3595140147f497a458a96678e78c46f112b6570c8971a9423892a7d63ad891d5b91506d183c7ebaede9ae066c262e6de82639a4792390faac1d8be5cdc996f6cbd8b7a847c79b7003c6b979612dece9e294762a251b1400dda008a78db52d6e6cdcc0ec161af0ae6d931efb17128e01839ee58c8627c0b655fce1511362ec0b335afccfd54c5d1b49233ef5361164900d6493786dc77688840d2f726e6e7b80354d9b62da2dbd3691dbd26e86bc6c6481732b758c57008bf13193a11f24dadcb90a55113836c922b70b14753ec22f5796c8695e3f7fdd335ff00e9860bfa2f72a7ccd741c0a6b65b7b74f2e159ac8d2aebea56d5f3c143472ba12082ac3d65604107bc1d45752e3c731ecab0715e8fa120dcc924878cad21de7f081afaa05bbaa0715e8ee55d5665cbf2d351e255ac7d82aff131bebc7b1316fb0b53636e2ca2dde6a57d1d86ff0089e172fc69337cddc497f2bdaa1f0fb3a59263044ad2c99dd02a8b5f21209d4d94697b936ab83d1e7420e0ef3ce55b10eb9405d56242412a0fc26240b9ee007696b0637bad7431cd916da7d47ba28a29e110a28a2800a28a2800a28a2800ae3da78d10c4d2104e51a28e2cc485551de5881e75d94b1e901dd70ca5335f7d10eadae0bbe443ae9a48c87ca8014f17b5a692e448e5a666549213982c519cb2388f5206a72e504f592e6f7ae5f756f5400619735a281736528a2fef813ad6242e606e3445b5686406e1002f215c3c7bb7313ac71dc312848f82b23024907a80f015b368b901d89902c604318923899559ad98f5458e5016dc4f51ab43327ba1dd2499f14d8791d9a3505632e05d8581525d4759b461727ad6bf3ab0aa80e8e63c0c5978fab95955000a0658d6c2e083cc1bebdb57d34ea38b28f315592a2d1766389c3248a52445753c5594303e20e86aa1da5d11c2e25d67842612021b76110c866506c27dd821618cf23adc15272f0ab664c546c0aef135047acbcfce92b047261618ae03428904b6d2cd0a84fd136cc3b981e749eaf23842d218c11dd2aba20360ecdc361618a4c9be9e445973b052cab200c0027ab1a8040d35241e36d24a4db6b20292c41d0e857324808ef470011eda8e5c1c7347be9849bad1208d5ca17417c84e5b1d75ca2f608013ceb8e6d858602ecb9189b8c923ad8f20b63d6f306f4e62e609d50ae475276ec9fd993ee244ddb16c34c728049261935b282dae43622cdaab0cbc080adf55fecb858a7b9c967613472666163917232e6161662d1e5b73bdec29fd6b91ab8c2395a8fbfd47f0b7282722271e311324670d3240ac331778b78d6362a15090a2e3524f0d34ada0cb1e1dcccc924888e4b22140d9549072126c6c35d6d586cf9444f2c048cb084746ec864ce114f7a98dd7e684275344f8e49a39634b92d148381e71f3bf0f587d3d86b3aedd8bf6dc2aec8d811c38ac3e223de437982481653267de23598975bf59d55597859ae0822adba49d8382699e0902b2c11da6ccc32ef6428551554ebbb50e5b31b5d825ae2f4ed5d1d2a9ac6b7f516cee2e6f6f43da28a298320a28a2800a28a2800a28a2800ae3da5868e489e393546521b5b69ccdf911c6fcabb2967a718e0207854932cc046112e5f239b3b055d744ce41e1714015bec8c16366368157111c48b937d96eab375d430622f20545b9cdcf80bd757f41314533e29e386307d48466725dc666bfaa96ccdaf58dbb2bb7058cc560f0e582450b4d3c6652c44d27becb1c015110eed0471e4b1676b9537517d3762f68d816bbc8fc7793be7636e4aa32c70836b108a2f7abf266e91c5838e3850450a2c69d9c4b1b71663ab1b790e405766c570f88995d5580862b0645207be3f222dceb99c03a83a7107b47107c2d6acba273abe27125583658a1536edde354954c9a7c2419829c3427bfdcf158789cbdc7f922a2fa5d868a3c24cc90c2872daeb0c6a46a3810b7153eef6b0009b9f67793509d385be0a7f9a3eb02826c588ba40cec99f33699752a2dd5274ca808e03d95bdb1675ca025f895e27c5cdd8fb697b043af1f8ffa1aa5239f39cb12b4adcc462e077173645f322ace518ab93a46694a4ea3c8c9d02d66c45f964b78e4ff007a9f9ce317aaa2271c9c92a6ddea148bfb3cab8ba1bb2a48f3bc8002fad81bf0000d6c2fc3ff0075dd274810381918a190479ee3d62e23042f35ce6d7f3b5b5ae065ac992528f4b3b38a325149ae52e7d0dbb2f65651234c44924b6121b58655be58c0d7aa3331d49d5cd4a410a83602d73af99d7ebac857b1100dce806a7b80d4d515f4224f8629743f6dda18d03eedd06ece6d63729d43717eab5c71045fbf85396176c29611c837721d14137573d88fc09f926cda1d2dad541d1d973c6cfc9e4771e0e737db4c386da4caa51c092222cc8fa8b79f0faaaf1d64b14dc5f2acde5a153c6a71e1d16a506927636de7552e03cb00b754dde78876db8cc9ced72fc7d63650e185c4a488ae8c1d1802aca6e083c0822bab8f2c722b8b3993c7283a9237d14515a140a28a2800ad534ca80b330551c4b1000f127852d74aba5430f992329bc55cd23bdf770291a17b105dcf111820902e4a8b1303b2fa3f89c6913621e48a33aae7b1998722148c986523905cc41d6c6a688b263a4bd290abbbc3ca81ca3485c8be58d4a863103d591fada7c11c4df452878eda4918478deec1c48f76ccf2bc6ee0ef1fe13345210b7b0b5ac0014dfd26c0ecfc344b1b42af29059033be7b0d1a49262d9d621cc93d8002c40af7a13d0fc388c4f26190bb9cd1ef12e5100b290ad7c84ead6e20103954aa4434d9198f3262e23143879a45702ce14201a86570f2d96e08074cda8e15a57a172a234f8fc4055417648016627e287716bb1b00a1789b0356a525f49f19bc9d5090b061ed23bb7aad883f7a4b5c67280e72bc2ef19bdc00625295700a31ee20f497644e6510ab2c70844254316286dac44deee56c3536b8b56ad90370b3260dfae23cd29390dd6337f85d85b82f6d77ed0861666638ee3c6f8595bc7d596a3618e28b364da01732ba1b6cd9cf55db311f7c3cc52f1c79a4d39caabb2fc9bcb2618a6a11b6fbbfc2241ce38fff00d5ec8d07d42a276cbe356390bcdbc846556bdb52d6b0cb7b9e5ad751c6a7ff00627cb65e23f8eb096685d591f1eecac4311ff0bc46a40b0e74d4b9549d0b43876d589b0c65d82dcf58db56622d6248e36e02de756b742b6924d9626b2c88355b01980e0c076768e47c452ce1b6760ae0fba24b8e0460710b5d988d8b132349859e47c4460c88b95a3660bc425fad985fbefc35b8ae7ea34b39a57cd0fe3d4e38da5c59698a813b1d1670e9113d7cf732b64526e598477b66b93dc09bf1a50d85d3cc46eaf2086622dcda2241170732ab83cf820f54d4d8e9b4845d708a4f7e26c3da2127e8ac568f3d5c570fc99596ab1c1b4dd31c40a50f48bd2258a17c2c4d79e55caf6ffa519e372383b0d00e3adf96abbb63a698c918c48d1e1d4d85e2b9624f15df3f0e3a5954f61a87c2e0421d6e5ae4926e4df89249d49ed26b371f86fe6eabb1be383ca93ec4c6c58ed0a5be10cdfa5a8fa2d596d393444f8eeabf9bc5be80479d63b0c1dc457d3a83d8751f45ab1da5f7c80fcb3f4a301487f95fb9d7ff001af62570f886460ca6c47f363da2983666d6dd13320f7a26f88887c0278e2231d9cdd798bb7ac0e75aadf83c5346e1d788e5da3983dd460cd2c53b467a9d3c72c7d4b56390100820822e08d41078106b652874631eb1bae1efef3282d8727e09173261ff00375651f1730e09ab7d7a3c7914e2a4bb9e7a51716d33da28a2ae54a7f634f1b4b1498a0cd6cf3ba019b3628c9660e4903de8ae50a78644b7ab539b47a6f2cac61c24643f3b059a51e0884c71df5b348f61f14f0a67c7f44f072bb4924085d8dd8f59731b5aec1480c6c00b9ec152780c0450a08e28d2341c1514281e42a6c8a13ba3bd0a6cfbfc61ccc486dd67326661eabcf29fbeb0e480045e40e967ba28a82489dbfb456145bb58c92450af69696454eaf7804b7e6d55bd25c61265616b40c1634372a0b65cce45eecc4b9b926e7ccde6ba47b437b32c87d5f7561a0807c98f1b099a5f1791028f931023d634afb79bab8bfcb81fde8e8c5352baece8a658b8a57df938711b72443669901e36dd1fdf5a8f489ff0e3f526a2b6abda4908e5183fb558ec980323cd348e234b0b29d598daca3bf51edeeadcc096fe913fe1ff00c1347f489ff0ff00e0ff00b543c8bd6e2a97e08f39cd6e57b680f95744f830d1b346654922d64467cd753f094f31fcf306a2cb34492f481ce9bf1ae9f7ab71f2aeec262e466762c33c0124460b6209cf706dc410b6f02473a4d865254dc93675e3e229a70475c57e493ff2d495366d5c446b8f391020902e700e99dc190301cb5b69dac4f3b53e41b3e2502c80f7917f3d6aabe91496c4330e2a90b0f158d5becab5765cb9a246f923e8d2a98e6ea51f27fc91ab856d9f9afe042dbf8666c562142df506ddaa638cdedcc5d88f2ae08b03237bd8dee43a152f204b761526d97bb87753274a3deb19149ca48f21ecba3123ccac84ff00575be46b026d7eeedeeae26b672c795a4baf28f43e1f1865c1193edc7ec08b60076002b876d5c2061c51837d9f6d7561d5871b73d7993dbf5fd0395653c4194a9e62d5cc8ba959d492b8d18e0f14b220753a1fa0f307bc56ea50c362da096ff018e571d8dc037d9eca6c8650c0329b835a65c5b5dae8ca62c9b953ea892d9c43830962998868dc718e5537471e6069cf870269eba3bb50cf15dc0595098e6406f924502f6ed5208653cd594d56c2a7707b54c6c3163e0811e2947c28813967039b464927e4b3f12169cd06a36bd8fa339fe21a7bfee47dcb128ad71b8201041075046a083cc1ad95da3901451450079509b676b32b0c3c2034ccb98dcd962426dbc7235e370aa35620f000b0efda58e4862799cd92352c6c2e6c05ec00d493c001c49a5dd991ba44d2ca3dfa53bd975be5622cb103f1635b20edb13ccd2fa8cbf0e17dcd31c374a85adb5b2d615c32995dd966c1a28b22a855c4c43450b9bb4eac4f7d2d6ddf5317ff00e81fb71d4f6dd98bcd05ff0019c2ff00dcc5fcf9541ede1d4c57ff00a07f98955f0e96f84a5eaff844ebe3b2518fa7e455db5ebcbf931feaadb826be154f28f108cff34a900f85d96b5ed81d797f263fd55c7b3369ee4dfaacacb95d18e8cbd9e3c6ba342174c91c0cab1bcab2c6ae5d6450590bead729220b8b9e02fadae7436b5766cb8f21666e11e1d95cf66620aafb17e8ae58b1f84b693e2221f12c1addc1ac7ebae6da5b6a364dcc3d48af998b1eb487bfbbf75b855517647e08751aff001d3fd34dd84e38afc8a7fe5a54c2eaac7b645fad69af083fe6bf249ff96ac508adba3ff90c3e4423fc15ab1ba1b266c2c47e48fd907edaaf36f8b625be6c3fe5ad585d0c4b6190770fd95ac30feb97b1a6b7fe287b9a7a73832f87cea2ed1b071dfda0788eaf9d476cdc489235606fa7d9c7cc58f9d3762e1ce8cbda0fb797d355ee0dfdcf2943a236a3bb5e1f9a4dbc08eca53c4f4ef263538f58ff00035e0da95093c72e8fa13d4514579e3d40b7b7a01bc208b871723c743f5573ec4da2616ddb9254f03da3b7e70e7dbc6b7ed7c407934d4016bf6ff37a8cc5a82be7a11c41ed1df5d2c71dd8d46473e6f6cdca23ba3022e0dc1e75bf098968dc3af2e23911cc1ee3493b376bb4760799b5b5b3778ecefeca6ac262448a1869dddf49e4c32c4fd06a19239557d872e8a6d3589970e4fbc3dfdcc4fc0205db0addeba94ed5d3e06ae9551a3ad8a382636b6600d8820dd5d186aaea4021870229e3a2fb68b9dc4cc1a555ce8e0584d15f2ef00e4e0d95d470241e0c2bafa3d57c48ed9755f738babd2bc52b5d18cb451453e262ef4a14bc9858cfa86632383f0b731bc88bfad11bff005751b8fda28d0bc82e15598127e45f31f683eca85e9cede64c49472eaf1157c320032c81a301a4d14bb925e5872adec35b5c835a5f07889203856c3cc8710f746cb7091ca6f299185c46c999cd9ad7ead8137010d5e194e4aba35f918c138c6df7445ecec7c2fb86905a679a29199c8023092acb952fc82a58dad7d49ae6e9127fcc28d4b3a48b617cca590dd6dc46878761a64c46c4861c488608cde350f2c8e733c8ee1951331e08aa198a8016ec847035a63d80d243bd894cb0176dd84d1d40001961278c6ce1babc080a468459ac3962b23c518d2491865c72705393b6d95fe2b0d99f383229b01f7a63c2fdabdf5a0e07e549fd9dbf869db1f8796256775c5a22ea58c08401e350988db689eb4f895bf0be1929bb15a641fb87e549fd9dbf86bd181f952ff676fe1a93fe9245f8ce23fb3c740e9243f8ce27f511feea90a238606f6b9988041b6e187037f8953183439712c559432228ccacb7233e803017e22bab078cde32a23e2999cd9408a1198d8b6975ec04f9549ed0c04d1a2b98672e5d522de98946f5cd9744d74f5af6eae5cdcaa1c92ea4a8b7d0edd89d16c3cd34d34ea652acb1aa66213a91ae66214dd8dcdac74d385ea6e5e8cc6bae19e4c33760669223dcd0c86c07cc287beb8f636cc870aaaac4cd30b9691b8063727229d100d786b61a9353b1ed243c6e3c7fdab839357fdc6e323aab4b704a51b215a4c427564c33337268983a37610490e9de1974bf13c697b17d1e9e7ce14e1b3235d819a556426f6ba9838117d7811c0d585ee843f097da2927a7f2059209d35b1dd496e0c8d76507b4861a766635bbd7ce51daab9fb98e2d04233ddcff00a23b0db131918ca66c101cb34d2311e00443eba313b0a57167c742a39848647fa9d6fe75be29030054dc1acab98f3b4ed4527f43b8b036a9cdd11f1f46221ebe2e46fc9c0a9fe63b56e8b606117d66c54bdcef120ff0d01fa6ba5980e26de35cf263e31c5d7c8dfeaa3e3e5974fb223fa6c6bab7fb9b06cec2afa98717ed925965fa19b2fd15b1540160001d80587b05703ed88870cc7c07efad0db707243e640aab5967d6cd23f0b1fe925eb77fc4772826bd8e1d84ca7e48eacf1f7e688b587c6553ca96e6dbcc05f2aa8ed27ff552bd11d87363e58e47cc30c8caecc45849948611c63e12920666e16b806e74634ba7c9f11497617d5e6c4f1b8b2eaa28a2bbc704f08af68a28021b69f46b0d3c9bc962ccc542b59dd43a8bd95d5582c8a331d1811a9a95550a2c00000d00d0003ea15b2a13a65315c24b6362e162bf66f9d62bf967bd1404074936e7ba70f245141232b8195cd802030606dc729b7b0d23edfc24cdbb6f7311958e97539b32916b01e7e46ace09001617b0d05afc05456d7920de44a735ad23f3e2b9147d121ad12a326ecabdf0d29e3857f2d3ecad9161267ba8c3106c4eb61d83b3bc558664c370cad7f1ff007ac526844b110afeb9075e20c6e2dc7e3653e5536576a20764a4b136189c3c9681909b15bb658d934f1245356d7da9bf682458a506090c8e852ed91e2961de22a125f2b38b81a80c4d48ef62f887dbfef5cf1caa31b862ab94b2cf19ef05524d7ce21edaa6482945a34849a640604e69e72d9ae2288c41948ba177debae61af595013cb2af6d7615b7d07da2f4e58fd9b14d6de2062b72a750cb71639586ab71a1b1d6aade9a633118691a181d5a35b2a978f33a0ca0e50c186602f61981361a93c6b9193c2e591a58df6ee3ebc46389379384d9d9b436a8460a356639554296676f8a88bab1fe785276d8e9089c0520a056b90d606eb716207aa41e373716b54660f6bcd0cdbeb9673a12d6bdbb148d157e4dade1c69836eed2c1626069d818f1416c0ae8646b688ebae6e5a9d40e645358bc2a38ff005be7cd7630c9e28e7ce3aaf27dc848f1f97d5723e6dfecac9f6d31f8721f223ebb545093f9ff006aecc36119f5e03bf9d3d1f0ac527cb6c4a7e379a0ba247ad8c2dae466f12a6de36248f3ac37f21e1181e24fee15ee2f00ca3369a5b504822e6da1e22b4a48e3e11f0600d8f8daff004d6593c36517f253fa9b61f1884e373b5f4e51b3df8f351e03f7935d3b2f664934f1459d8992455b036d09bb7aa07040cc7b949ae685e57608a533310a3a878b1b01ab1e67b2afce8e74470f84eb202f2916323905ac6d70a000a80902e140bd85ef6ac3fa59c1add48696b31ce2f65b3dd9fd0ac04443261632cbc19c1958783485883e74c20515ed322f7614514500145145001503d3788b60e520125324b61c4eea459481e486a7ab122f4015d8dac2f7b310780b8b78f0bd45edcdaa0346f90e81d388f8595aff00e1fd3533d32e8da41859a6864910c6a0a27bd941a8001cd196ca2fdbcaaadc53e3986532861dcb172d79a0ad5533095c7a8cdff1b4be6dd9bdad7b8e15bf07b643cb18c8746cc751c02b7db6a45dce2be31ff0bf756ec37bb10dd58836b5ed0f0f31dd53457716a8daaa2e421b9e3a8d6b6ec3c56fb1d000b6091cf2137bfe0e303cf787d86ab8c0e2b17bc89649572bcb146d654bda49550dac96bd9aaefd8db023c3966567766001672b7b024d8655006a7b390aace970690b6ec97aa6ba5d367999bb5e6f62ccc83e84ab92f546ed39736edbe346ae7c642d21fdbad74abe712f147586bd5103b4f0e08cdadfda2c3bab460706b22b83c542907cc823e91eca91c6b5a36f0b7b74ad3b0469377227d320fdc69e9ae7f6fe4e4e19bd8fd2ce6c141225fa8a7bc91a7b2a512f6d6d7eeaca8ad62a857264deeda31740410781d0d474f816bf02c7b45b5f9ca6daf783af6549d6fc29b667f882e3e792157d84e6fcd3559a5565b0ce49d20e80ec6326d0843708d9a461f921f6485055f02abbf44fb3befd391a690a782f59cf9b151e31d58a2b979e573fa707a6d1c5ac49befc9ed1451588d0514514005145140051451401c1b670227825849b6742b7b5ec48d0db9d8d8daa98c76230825911ddf0ee8ee8c13ad1e64628d97321017303a02be02ad7e99edff71e1cc800323308e253c0bb733f25402c7b96a821b425ceccce183bbbbde306c6472ee5402b7d589b13dd71578949d0c01309cb1c9e691dff006fbcf2a1a5c12ea71723f726ef5f258d8fd35af0f8508b973c6dab1bb60831eb316e3ee9efae4dacc52d22b465bd450b87dd2ea735dad337000fd553c94f9462e8b361e7c5c112452005c38924b924c3efc15431d2f935200aba6be7be87ed930e2a29a660e88d66d02e412029bc16e4b9b5bdf4bd7d09559752f0e847edec4eef0d3c9c3245237e8a13f65535b5932c993e22469fa31a8ab5ba72dffc29d7e3a88ff5aeb1ff00aeaabdbad7c44bf388f6694d6897cedfa1caf167f2457a90bb4dba96ed3fef5bba3d17bce21fe5429eccec7eb15c9b59f551e27dbffaa97d8f1e5c016fc26209f245c9f5a1a6a6fe64bd44312ac527e8cd34578c2fa57a056e2015b316f92153624b333d873c83228f369187e6d6ba9ed8db3f7bb460808eac015dfb0ee4093fcf9947e69ac33cf6c6c6f498be24ebd8b33a31b2fdcf868a1f84aa3391cddbace7cd89352d40a2b927aa4a951ed1451412145145001451450014515cd8d90ac6ec085215882dc01009b9ee14014cfa4cdbbbfc5baa9f7bc30312f7cad632b790013b883db511d03d883178c8e36178901965e3eaae8ab71c33391e41aa3f696ca9e18d6490ab03766d6cc19bacc4dfd6373ad5b9e89f60fb9f0bbd71693116737162b181ef6bda3425ac781908e5577c2334ae5657fe91f674787c518a0de2288e36b6f643ab996feb31e48b531d10e8dc78cd953d901c40775491892d99324a8b98939549214db9135efa62d99209d2754ceae8aba15b83197bdc311a7beaf0bf3a6bf44db3da2c0ddad792491ec0dedc23b1234bfbdf2a1be094be665278560742080c32b022d6be841078107eaabbbd176dc33e177521bcd873ba7bf16503dedfbeeba13daad55d7a4ce8f9c3e30b46bef7882644e40487efab7b586bd7fcf36e1537e8bb013c58cceee99658583007d62a54a0ef600b91dd9e87ca223c4a879e9e6b0469f1f11871fa12aca7e88eaacda66f34bf3dbf68d59dd39bdf07d8713aff0066c41fac0aac3687df64f9effb469bd1f56723c5dfe917b683ddcf769ecff7a6a54cbb3f0a3e30327e9ddffd74998b93d76f9c7eb34fbb7e3c916163f8b101ec551f61ada5ce48fb8b35b74f2f6212bc06bda29939a75eca8834ab9bd51d66f9a8331fa0538fa26c296f74e29c59a47118f05bc8e47f592b2ff56293a060904ee79858c7839bbff715aad3e8060b7580c3a916664de30ec79499581f02e479573f572e68eef85e3ffb0c7451452476428a28a0028a28a0028a28a002957a698eb2a4038c97793f268469f9ce556dcd43f6533bb800926c06a49e5550edcdb3759714c6dbed52fa658141dd72b8ea13258f03311caa52b6564e91dbd13c37ba71d988bc5875cc6fc0bb5d50761e0edf98bdb569d2c7a3ed9070f845ce2d2ca77b20e60b01950fcd40abe20d33d0ddb262a915d7a577eb40bf2253ec786a77d1bbdf029dd26207b3132d2f7a573efd87fc94ff00e641539e8bff00e447e5b11ff71254f6217527b6decd59e19216d33a900fc56b7558778363e5554ec2c54806502d3c2f75526def88c41426da2921a326deab9b55cd554f4ef05ee6c72cea3def1035fcaa001c7e725980ed8d8d11f2224bb8cfd27c5a4b86c36212f937d038b8b1025bc3a8e208ded88e5ad573b623cb3c83e513edd7eda73d8604b1cf812d944e8f342c2dd56246f72f7acac937f5fdd4b1b7c1711cc572b1bc72afc596325597da08f2a67492a9d799ccf14c6e50535d842c62f55c7737d46ac1e9638f786e4631f61fb691f1d1d9d876ebeda7391b7bb3f0d27128a11bc40c87fbc9f4d332e3247dc49fcf81fb3205f18a3e17b2b38242c2f6b03c3c3b6bcf738e7ecb01edb71adb4c2b1096dae0cb68c664c23a27af762477346515bc033107b335eaefd8d8d8e6862962fbdba295d2c40b7aa47223811c88aa5306e0965f8ca5013c331b100f75c007b89ab27d17e343e0847601a07689858824e8e1981f8443827966cdc380e7eae34ecedf85e4b8b88e5451452675c28a28a0028a28a0028a28a0055e9de2af1ae181d67b892c6c44096df778cd996204703303ca91f6760fddb8f8e322f14677b25b86546042e9c9e4b0b73556aebe926d7ced2cc0fdf2c916bc218ef66e36eb16792fcc3477f56993d19ec8dd61b7ce2d24e43ea3558c0f7a5ed1d52588e464356e88a7597d073a28a2aa5cad7d2c0f7ec37e4a7ff330f537e8bffe4bfaec47f9ee6a23d2ba75f0e7e44c3fbf054d7a3316c1ff005b31f6c84fdb56ec57b8d94bfd37d88715859235b6f56d2424f29135517e41b543dce69828aa96299e8fed0631a491826584895178160010f11171ab46648ec783643ca987a4783591898c868b1682689870df228bd8f2cf1e536f92e6a23a5182383c7975d229ef2adbe0bdc6f57f48ac9df9dbb29876645bd864c3ad8321dfe189e03ac4b25fe2ac8594db847328ad14a9a9230c98d4e0e0caa76ac5c1bc8ff3eda60e82ca25831185275fbe278371f63807f3eb1e91e1416240216519803c55af6653d8cae0dc72a5ed8b8e387c4472f00a6cff0031b46bf80d7c54574327cd1528fd4e1e1f95bc6fe84a32906c788d0d786a67a5382c93671eac9afe77c2fb0f9d4356f0929453473f241c24e2fb1aa14206bfcff3fbe9aba27b5f718d5726d162ac8ff265be84ff0058c4784ebd94b559aae60633f0b86b6b3701af2bdc8f3bf2acf363528d0c69b50f1e4b2fda297fa17b60e270cacc7df13a927ce51eb5b966166f3b72a9fae4b4d3a67a98c949292ee654514541628bfbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82aa48d8020b0ba82091c2e01d45c70b8d298cf47630ac5e4cbef83235d7ef526611390c4020e4626daf0b71ad36a2078fbbb4ff0089c5fae6fe0ae7c7fa6d9e48de31858d7382b984ad700e86dd5d0dafaf2e349184d8d133bc25db78163eb58650f24b0a82baddd32c8dc6d7d08e35960b6561ed0cced3b43248ab91506f2c0b6726c78590db2ea75e16a2901d78ce9b34aca5e042832de30e6cca082c9c340c3abe069c87a769ff00138bf5cdfc14bb3f44e078c328299d9591a2dec81a311621ded1cd95d5dbdcec154dc9602c6c6b960e89c4af8767799e3c44b0aa28880215f76cc2739bde89125865bded9bbaa5d3212a1b3eeed3fe2717eb9bf828fbbb4ff89c5fae6fe0aaf7a45b3e3c33bc00176ea32c9c16cc337bdebd78ec400c75241d0542546d44960f49bd29498bc99b0d1a64cdc24637cc54fc51f13e9aead81e97e5c342225c2c6c2ecd732b0f58df865aad28a9da88f52ddfbbb4ff0089c5fae6fe0a3eeed3fe2717eb9bf82aa2a2a36a26cb1ba4be95df17108df091a9560eae2562548d0e8579a965f3ae7d97e942684c64408c633a13230b82b9594f5781197cd14f2a41a2a6911ea3cedaf48ed3963ee644bb67d1d8d89166b757835813df73ce9766dba5893bb517e598feea88a2b48ce5154998bd363727271e58eb8af488f2429134084a05b3ef1ae4a8b5ed9798a8efe9737e097f48feea8ec16c39a58f79185617208cc01045c904b580d329e3ff00517cb6c7d18c4b5b2c6092c52c1d34616ba9d78f1fd13d944724a2a93292d1e193b9479f73affa5cff00825fd23fba8fe973fe097f48feeae46e8d4f955d02bab2e605587769adafab2ae9ccdab0c4f47e74281945df3dbacba6ecb070c6f61972dcf8f33a55be3cfccaff0041a7ff00cfdd8d5b07d28cb8691e45811b3a80ea64600b0e0feae8753fa46a77eeed37e2717eb9bf82ab9fe8d622c4eec68a5ad9d2f61606c335cd8903c48add1f469d812b2464a900a8cd9ac6530e6002f58670469d9de2f8ca9bb63518282a8f42c1fbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82abe5e8d39b5a4437240b0760489377a10bafc61f275e150d34795996e0e5245c1b83636b83cc1b6951b51630add1e324537592453972dc3b0361c16e0f0eee14515700f764960bbc92ca08519daca0dae00bd80d0683b0564f8c94b0732485810431918b02340435ee08b9f6d14540049b4262c58cd21625496323924a1ba926f7254ea3b39564bb46605984d282e417225705c8d41637bb11cafc28a2803449316b66666b0b0b926c2e4d85f80b927c49ac28a2a4028a28a0028a28a0028a28a0028a28a00c9652381238f02471163c3b46959fba5fe3bfe9b7777f70f60eca28a0037cf6b666b5ad6cc785ad6e3c2c48b77d1ee97e39defa6b9db970e7451401e0c4bf1cef71a0399b41d9c7b87b2bd599870661c38311c351c0f2b9f6d7945007a712f7073bdc7039dae38f037d389f69edad6ce49d4924f1beb7f3a28a00ffd9, 'Assistant Professor', '123456789', 1, 1, 'image/jpeg'),
('FUI-FURC-061', 'Dr. M. Arsalan', '37401-5859968-1', 'arsalan@fui.edu.pk', 'ahmedIqbaarsalanl@fui.edu.pk', 'Somewhere on earth', '0312-5464533', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714141316141414161616181a19191919181618191e191a19171a181b181b18191e2a22191b271c171a233324272b2d3130301822363b362f3a2a2f302f010b0b0b0f0e0f1c11111c312722252f2f2f2f2f2f2f312f2f2f342f2f2f2f2f312f2f2f2f3131382d2f2f2f2f2f312d2f2f2f31312f2f2f2f2f2f2f2f2f302f2fffc0001108010700c003012200021101031101ffc4001c0000020203010100000000000000000000000605070203040108ffc4004f100002010203040603090c080603010000010203001104122105133141062251617181073291142342526272a1b1c11733535473829293b2d1d2f0168394a2a3b3c2e1153443b4c3f124557444ffc4001a010002030101000000000000000000000000040102030506ffc4003011000202010302040503040300000000000001021103041221314105516181132271a1c13291b1142343d1334252ffda000c03010002110311003f00bc68a28a0028a28a0028a28a0028a28a00f28a295fa71b5da28d228db2492e6bb8e31c48019641df62a80f26914f2aa4e4a31727d11318b93a46cdb9b6f2b64831102ba9eba491c920274b2178dc6e4f790dc41b76c1f4b3a58ea91aae68cba06655619f311aa671eaaaf365d4922c458debec662f3683ab1afaa83801f6b1e24f335a1a426d724f2173f40ae74f53926aba7d3a8fc34b18bb7c9d18ac66f0de448dff00289bd3fa52e627db5ec18dc9a246b1f7c4d2427c9a265b547b4f94d9b4ec3c8feead8b203c083e758d7d7f7631b63e4870d8dd369e2201732a7e0e52b9add91ce00d78e92037f8e2ac7d8db661c4a1789b81cae8c2cf1b7c5753aa9e7d846a2e0dea8f486fc0af81603f6ac2bbb018f9b0f22b82d1b81656b5eeb7be565ffa91775f4e2a41adf16a9c1ed93b5f742d974c9f30ea5ed452f746ba4b1e24053649ad7299ae180d0bc6da6f12e46b6b8b80c01a61ae8c64a4ad08b4d3a67b451455880a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803caa93a79b433e227209b2eef0ebd9641be95878b48887f27dd565edbda2b8785e56d728eaa8e2ee74541decc40f3aa3f1d292d62c188cc59870691d8bc8e3b8bb35bb80a4b592f9547cdfd90d696172dde471621eca4f756876ca897ec018788d6b7c306fdc27c01d676e4157d63e16d3c48ad3b62504df85d89b760fe4d269f343cdf732622d66d54f06ecf1fdfedefd4d84b72cc3c6c47d86b4e1b1397bc7f3c2bac5ac4a1efb0e1ec3c3caacf82172609863f0598771aebc2e358031482ea6f6ee3f197b0fd62b189ae2f7bd7acb7aa4b9e1964bc8da98d68c5c6a14e6b5ca9536b6747521a3702fa8229bba3fe91e69248a00865790855ba8cdc75667420150352420b01ce9369abd0ded28d26970e51033a992390280c42919e32d6b91a8603e777531a6ebc3afc8b6a52db7565c145145748e7851451400514514005145140051451400515a7113a20bbb2a8ed6207d75cd84daf04a72c72c6e78d95d4923b40bea2803beb16eee3595140147f497a458a96678e78c46f112b6570c8971a9423892a7d63ad891d5b91506d183c7ebaede9ae066c262e6de82639a4792390faac1d8be5cdc996f6cbd8b7a847c79b7003c6b979612dece9e294762a251b1400dda008a78db52d6e6cdcc0ec161af0ae6d931efb17128e01839ee58c8627c0b655fce1511362ec0b335afccfd54c5d1b49233ef5361164900d6493786dc77688840d2f726e6e7b80354d9b62da2dbd3691dbd26e86bc6c6481732b758c57008bf13193a11f24dadcb90a55113836c922b70b14753ec22f5796c8695e3f7fdd335ff00e9860bfa2f72a7ccd741c0a6b65b7b74f2e159ac8d2aebea56d5f3c143472ba12082ac3d65604107bc1d45752e3c731ecab0715e8fa120dcc924878cad21de7f081afaa05bbaa0715e8ee55d5665cbf2d351e255ac7d82aff131bebc7b1316fb0b53636e2ca2dde6a57d1d86ff0089e172fc69337cddc497f2bdaa1f0fb3a59263044ad2c99dd02a8b5f21209d4d94697b936ab83d1e7420e0ef3ce55b10eb9405d56242412a0fc26240b9ee007696b0637bad7431cd916da7d47ba28a29e110a28a2800a28a2800a28a2800ae3da78d10c4d2104e51a28e2cc485551de5881e75d94b1e901dd70ca5335f7d10eadae0bbe443ae9a48c87ca8014f17b5a692e448e5a666549213982c519cb2388f5206a72e504f592e6f7ae5f756f5400619735a281736528a2fef813ad6242e606e3445b5686406e1002f215c3c7bb7313ac71dc312848f82b23024907a80f015b368b901d89902c604318923899559ad98f5458e5016dc4f51ab43327ba1dd2499f14d8791d9a3505632e05d8581525d4759b461727ad6bf3ab0aa80e8e63c0c5978fab95955000a0658d6c2e083cc1bebdb57d34ea38b28f315592a2d1766389c3248a52445753c5594303e20e86aa1da5d11c2e25d67842612021b76110c866506c27dd821618cf23adc15272f0ab664c546c0aef135047acbcfce92b047261618ae03428904b6d2cd0a84fd136cc3b981e749eaf23842d218c11dd2aba20360ecdc361618a4c9be9e445973b052cab200c0027ab1a8040d35241e36d24a4db6b20292c41d0e857324808ef470011eda8e5c1c7347be9849bad1208d5ca17417c84e5b1d75ca2f608013ceb8e6d858602ecb9189b8c923ad8f20b63d6f306f4e62e609d50ae475276ec9fd993ee244ddb16c34c728049261935b282dae43622cdaab0cbc080adf55fecb858a7b9c967613472666163917232e6161662d1e5b73bdec29fd6b91ab8c2395a8fbfd47f0b7282722271e311324670d3240ac331778b78d6362a15090a2e3524f0d34ada0cb1e1dcccc924888e4b22140d9549072126c6c35d6d586cf9444f2c048cb084746ec864ce114f7a98dd7e684275344f8e49a39634b92d148381e71f3bf0f587d3d86b3aedd8bf6dc2aec8d811c38ac3e223de437982481653267de23598975bf59d55597859ae0822adba49d8382699e0902b2c11da6ccc32ef6428551554ebbb50e5b31b5d825ae2f4ed5d1d2a9ac6b7f516cee2e6f6f43da28a298320a28a2800a28a2800a28a2800ae3da5868e489e393546521b5b69ccdf911c6fcabb2967a718e0207854932cc046112e5f239b3b055d744ce41e1714015bec8c16366368157111c48b937d96eab375d430622f20545b9cdcf80bd757f41314533e29e386307d48466725dc666bfaa96ccdaf58dbb2bb7058cc560f0e582450b4d3c6652c44d27becb1c015110eed0471e4b1676b9537517d3762f68d816bbc8fc7793be7636e4aa32c70836b108a2f7abf266e91c5838e3850450a2c69d9c4b1b71663ab1b790e405766c570f88995d5580862b0645207be3f222dceb99c03a83a7107b47107c2d6acba273abe27125583658a1536edde354954c9a7c2419829c3427bfdcf158789cbdc7f922a2fa5d868a3c24cc90c2872daeb0c6a46a3810b7153eef6b0009b9f67793509d385be0a7f9a3eb02826c588ba40cec99f33699752a2dd5274ca808e03d95bdb1675ca025f895e27c5cdd8fb697b043af1f8ffa1aa5239f39cb12b4adcc462e077173645f322ace518ab93a46694a4ea3c8c9d02d66c45f964b78e4ff007a9f9ce317aaa2271c9c92a6ddea148bfb3cab8ba1bb2a48f3bc8002fad81bf0000d6c2fc3ff0075dd274810381918a190479ee3d62e23042f35ce6d7f3b5b5ae065ac992528f4b3b38a325149ae52e7d0dbb2f65651234c44924b6121b58655be58c0d7aa3331d49d5cd4a410a83602d73af99d7ebac857b1100dce806a7b80d4d515f4224f8629743f6dda18d03eedd06ece6d63729d43717eab5c71045fbf85396176c29611c837721d14137573d88fc09f926cda1d2dad541d1d973c6cfc9e4771e0e737db4c386da4caa51c092222cc8fa8b79f0faaaf1d64b14dc5f2acde5a153c6a71e1d16a506927636de7552e03cb00b754dde78876db8cc9ced72fc7d63650e185c4a488ae8c1d1802aca6e083c0822bab8f2c722b8b3993c7283a9237d14515a140a28a2800ad534ca80b330551c4b1000f127852d74aba5430f992329bc55cd23bdf770291a17b105dcf111820902e4a8b1303b2fa3f89c6913621e48a33aae7b1998722148c986523905cc41d6c6a688b263a4bd290abbbc3ca81ca3485c8be58d4a863103d591fada7c11c4df452878eda4918478deec1c48f76ccf2bc6ee0ef1fe13345210b7b0b5ac0014dfd26c0ecfc344b1b42af29059033be7b0d1a49262d9d621cc93d8002c40af7a13d0fc388c4f26190bb9cd1ef12e5100b290ad7c84ead6e20103954aa4434d9198f3262e23143879a45702ce14201a86570f2d96e08074cda8e15a57a172a234f8fc4055417648016627e287716bb1b00a1789b0356a525f49f19bc9d5090b061ed23bb7aad883f7a4b5c67280e72bc2ef19bdc00625295700a31ee20f497644e6510ab2c70844254316286dac44deee56c3536b8b56ad90370b3260dfae23cd29390dd6337f85d85b82f6d77ed0861666638ee3c6f8595bc7d596a3618e28b364da01732ba1b6cd9cf55db311f7c3cc52f1c79a4d39caabb2fc9bcb2618a6a11b6fbbfc2241ce38fff00d5ec8d07d42a276cbe356390bcdbc846556bdb52d6b0cb7b9e5ad751c6a7ff00627cb65e23f8eb096685d591f1eecac4311ff0bc46a40b0e74d4b9549d0b43876d589b0c65d82dcf58db56622d6248e36e02de756b742b6924d9626b2c88355b01980e0c076768e47c452ce1b6760ae0fba24b8e0460710b5d988d8b132349859e47c4460c88b95a3660bc425fad985fbefc35b8ae7ea34b39a57cd0fe3d4e38da5c59698a813b1d1670e9113d7cf732b64526e598477b66b93dc09bf1a50d85d3cc46eaf2086622dcda2241170732ab83cf820f54d4d8e9b4845d708a4f7e26c3da2127e8ac568f3d5c570fc99596ab1c1b4dd31c40a50f48bd2258a17c2c4d79e55caf6ffa519e372383b0d00e3adf96abbb63a698c918c48d1e1d4d85e2b9624f15df3f0e3a5954f61a87c2e0421d6e5ae4926e4df89249d49ed26b371f86fe6eabb1be383ca93ec4c6c58ed0a5be10cdfa5a8fa2d596d393444f8eeabf9bc5be80479d63b0c1dc457d3a83d8751f45ab1da5f7c80fcb3f4a301487f95fb9d7ff001af62570f886460ca6c47f363da2983666d6dd13320f7a26f88887c0278e2231d9cdd798bb7ac0e75aadf83c5346e1d788e5da3983dd460cd2c53b467a9d3c72c7d4b56390100820822e08d41078106b652874631eb1bae1efef3282d8727e09173261ff00375651f1730e09ab7d7a3c7914e2a4bb9e7a51716d33da28a2ae54a7f634f1b4b1498a0cd6cf3ba019b3628c9660e4903de8ae50a78644b7ab539b47a6f2cac61c24643f3b059a51e0884c71df5b348f61f14f0a67c7f44f072bb4924085d8dd8f59731b5aec1480c6c00b9ec152780c0450a08e28d2341c1514281e42a6c8a13ba3bd0a6cfbfc61ccc486dd67326661eabcf29fbeb0e480045e40e967ba28a82489dbfb456145bb58c92450af69696454eaf7804b7e6d55bd25c61265616b40c1634372a0b65cce45eecc4b9b926e7ccde6ba47b437b32c87d5f7561a0807c98f1b099a5f1791028f931023d634afb79bab8bfcb81fde8e8c5352baece8a658b8a57df938711b72443669901e36dd1fdf5a8f489ff0e3f526a2b6abda4908e5183fb558ec980323cd348e234b0b29d598daca3bf51edeeadcc096fe913fe1ff00c1347f489ff0ff00e0ff00b543c8bd6e2a97e08f39cd6e57b680f95744f830d1b346654922d64467cd753f094f31fcf306a2cb34492f481ce9bf1ae9f7ab71f2aeec262e466762c33c0124460b6209cf706dc410b6f02473a4d865254dc93675e3e229a70475c57e493ff2d495366d5c446b8f391020902e700e99dc190301cb5b69dac4f3b53e41b3e2502c80f7917f3d6aabe91496c4330e2a90b0f158d5becab5765cb9a246f923e8d2a98e6ea51f27fc91ab856d9f9afe042dbf8666c562142df506ddaa638cdedcc5d88f2ae08b03237bd8dee43a152f204b761526d97bb87753274a3deb19149ca48f21ecba3123ccac84ff00575be46b026d7eeedeeae26b672c795a4baf28f43e1f1865c1193edc7ec08b60076002b876d5c2061c51837d9f6d7561d5871b73d7993dbf5fd0395653c4194a9e62d5cc8ba959d492b8d18e0f14b220753a1fa0f307bc56ea50c362da096ff018e571d8dc037d9eca6c8650c0329b835a65c5b5dae8ca62c9b953ea892d9c43830962998868dc718e5537471e6069cf870269eba3bb50cf15dc0595098e6406f924502f6ed5208653cd594d56c2a7707b54c6c3163e0811e2947c28813967039b464927e4b3f12169cd06a36bd8fa339fe21a7bfee47dcb128ad71b8201041075046a083cc1ad95da3901451450079509b676b32b0c3c2034ccb98dcd962426dbc7235e370aa35620f000b0efda58e4862799cd92352c6c2e6c05ec00d493c001c49a5dd991ba44d2ca3dfa53bd975be5622cb103f1635b20edb13ccd2fa8cbf0e17dcd31c374a85adb5b2d615c32995dd966c1a28b22a855c4c43450b9bb4eac4f7d2d6ddf5317ff00e81fb71d4f6dd98bcd05ff0019c2ff00dcc5fcf9541ede1d4c57ff00a07f98955f0e96f84a5eaff844ebe3b2518fa7e455db5ebcbf931feaadb826be154f28f108cff34a900f85d96b5ed81d797f263fd55c7b3369ee4dfaacacb95d18e8cbd9e3c6ba342174c91c0cab1bcab2c6ae5d6450590bead729220b8b9e02fadae7436b5766cb8f21666e11e1d95cf66620aafb17e8ae58b1f84b693e2221f12c1addc1ac7ebae6da5b6a364dcc3d48af998b1eb487bfbbf75b855517647e08751aff001d3fd34dd84e38afc8a7fe5a54c2eaac7b645fad69af083fe6bf249ff96ac508adba3ff90c3e4423fc15ab1ba1b266c2c47e48fd907edaaf36f8b625be6c3fe5ad585d0c4b6190770fd95ac30feb97b1a6b7fe287b9a7a73832f87cea2ed1b071dfda0788eaf9d476cdc489235606fa7d9c7cc58f9d3762e1ce8cbda0fb797d355ee0dfdcf2943a236a3bb5e1f9a4dbc08eca53c4f4ef263538f58ff00035e0da95093c72e8fa13d4514579e3d40b7b7a01bc208b871723c743f5573ec4da2616ddb9254f03da3b7e70e7dbc6b7ed7c407934d4016bf6ff37a8cc5a82be7a11c41ed1df5d2c71dd8d46473e6f6cdca23ba3022e0dc1e75bf098968dc3af2e23911cc1ee3493b376bb4760799b5b5b3778ecefeca6ac262448a1869dddf49e4c32c4fd06a19239557d872e8a6d3589970e4fbc3dfdcc4fc0205db0addeba94ed5d3e06ae9551a3ad8a382636b6600d8820dd5d186aaea4021870229e3a2fb68b9dc4cc1a555ce8e0584d15f2ef00e4e0d95d470241e0c2bafa3d57c48ed9755f738babd2bc52b5d18cb451453e262ef4a14bc9858cfa86632383f0b731bc88bfad11bff005751b8fda28d0bc82e15598127e45f31f683eca85e9cede64c49472eaf1157c320032c81a301a4d14bb925e5872adec35b5c835a5f07889203856c3cc8710f746cb7091ca6f299185c46c999cd9ad7ead8137010d5e194e4aba35f918c138c6df7445ecec7c2fb86905a679a29199c8023092acb952fc82a58dad7d49ae6e9127fcc28d4b3a48b617cca590dd6dc46878761a64c46c4861c488608cde350f2c8e733c8ee1951331e08aa198a8016ec847035a63d80d243bd894cb0176dd84d1d40001961278c6ce1babc080a468459ac3962b23c518d2491865c72705393b6d95fe2b0d99f383229b01f7a63c2fdabdf5a0e07e549fd9dbf869db1f8796256775c5a22ea58c08401e350988db689eb4f895bf0be1929bb15a641fb87e549fd9dbf86bd181f952ff676fe1a93fe9245f8ce23fb3c740e9243f8ce27f511feea90a238606f6b9988041b6e187037f8953183439712c559432228ccacb7233e803017e22bab078cde32a23e2999cd9408a1198d8b6975ec04f9549ed0c04d1a2b98672e5d522de98946f5cd9744d74f5af6eae5cdcaa1c92ea4a8b7d0edd89d16c3cd34d34ea652acb1aa66213a91ae66214dd8dcdac74d385ea6e5e8cc6bae19e4c33760669223dcd0c86c07cc287beb8f636cc870aaaac4cd30b9691b8063727229d100d786b61a9353b1ed243c6e3c7fdab839357fdc6e323aab4b704a51b215a4c427564c33337268983a37610490e9de1974bf13c697b17d1e9e7ce14e1b3235d819a556426f6ba9838117d7811c0d585ee843f097da2927a7f2059209d35b1dd496e0c8d76507b4861a766635bbd7ce51daab9fb98e2d04233ddcff00a23b0db131918ca66c101cb34d2311e00443eba313b0a57167c742a39848647fa9d6fe75be29030054dc1acab98f3b4ed4527f43b8b036a9cdd11f1f46221ebe2e46fc9c0a9fe63b56e8b606117d66c54bdcef120ff0d01fa6ba5980e26de35cf263e31c5d7c8dfeaa3e3e5974fb223fa6c6bab7fb9b06cec2afa98717ed925965fa19b2fd15b1540160001d80587b05703ed88870cc7c07efad0db707243e640aab5967d6cd23f0b1fe925eb77fc4772826bd8e1d84ca7e48eacf1f7e688b587c6553ca96e6dbcc05f2aa8ed27ff552bd11d87363e58e47cc30c8caecc45849948611c63e12920666e16b806e74634ba7c9f11497617d5e6c4f1b8b2eaa28a2bbc704f08af68a28021b69f46b0d3c9bc962ccc542b59dd43a8bd95d5582c8a331d1811a9a95550a2c00000d00d0003ea15b2a13a65315c24b6362e162bf66f9d62bf967bd1404074936e7ba70f245141232b8195cd802030606dc729b7b0d23edfc24cdbb6f7311958e97539b32916b01e7e46ace09001617b0d05afc05456d7920de44a735ad23f3e2b9147d121ad12a326ecabdf0d29e3857f2d3ecad9161267ba8c3106c4eb61d83b3bc558664c370cad7f1ff007ac526844b110afeb9075e20c6e2dc7e3653e5536576a20764a4b136189c3c9681909b15bb658d934f1245356d7da9bf682458a506090c8e852ed91e2961de22a125f2b38b81a80c4d48ef62f887dbfef5cf1caa31b862ab94b2cf19ef05524d7ce21edaa6482945a34849a640604e69e72d9ae2288c41948ba177debae61af595013cb2af6d7615b7d07da2f4e58fd9b14d6de2062b72a750cb71639586ab71a1b1d6aade9a633118691a181d5a35b2a978f33a0ca0e50c186602f61981361a93c6b9193c2e591a58df6ee3ebc46389379384d9d9b436a8460a356639554296676f8a88bab1fe785276d8e9089c0520a056b90d606eb716207aa41e373716b54660f6bcd0cdbeb9673a12d6bdbb148d157e4dade1c69836eed2c1626069d818f1416c0ae8646b688ebae6e5a9d40e645358bc2a38ff005be7cd7630c9e28e7ce3aaf27dc848f1f97d5723e6dfecac9f6d31f8721f223ebb545093f9ff006aecc36119f5e03bf9d3d1f0ac527cb6c4a7e379a0ba247ad8c2dae466f12a6de36248f3ac37f21e1181e24fee15ee2f00ca3369a5b504822e6da1e22b4a48e3e11f0600d8f8daff004d6593c36517f253fa9b61f1884e373b5f4e51b3df8f351e03f7935d3b2f664934f1459d8992455b036d09bb7aa07040cc7b949ae685e57608a533310a3a878b1b01ab1e67b2afce8e74470f84eb202f2916323905ac6d70a000a80902e140bd85ef6ac3fa59c1add48696b31ce2f65b3dd9fd0ac04443261632cbc19c1958783485883e74c20515ed322f7614514500145145001503d3788b60e520125324b61c4eea459481e486a7ab122f4015d8dac2f7b310780b8b78f0bd45edcdaa0346f90e81d388f8595aff00e1fd3533d32e8da41859a6864910c6a0a27bd941a8001cd196ca2fdbcaaadc53e3986532861dcb172d79a0ad5533095c7a8cdff1b4be6dd9bdad7b8e15bf07b643cb18c8746cc751c02b7db6a45dce2be31ff0bf756ec37bb10dd58836b5ed0f0f31dd53457716a8daaa2e421b9e3a8d6b6ec3c56fb1d000b6091cf2137bfe0e303cf787d86ab8c0e2b17bc89649572bcb146d654bda49550dac96bd9aaefd8db023c3966567766001672b7b024d8655006a7b390aace970690b6ec97aa6ba5d367999bb5e6f62ccc83e84ab92f546ed39736edbe346ae7c642d21fdbad74abe712f147586bd5103b4f0e08cdadfda2c3bab460706b22b83c542907cc823e91eca91c6b5a36f0b7b74ad3b0469377227d320fdc69e9ae7f6fe4e4e19bd8fd2ce6c141225fa8a7bc91a7b2a512f6d6d7eeaca8ad62a857264deeda31740410781d0d474f816bf02c7b45b5f9ca6daf783af6549d6fc29b667f882e3e792157d84e6fcd3559a5565b0ce49d20e80ec6326d0843708d9a461f921f6485055f02abbf44fb3befd391a690a782f59cf9b151e31d58a2b979e573fa707a6d1c5ac49befc9ed1451588d0514514005145140051451401c1b670227825849b6742b7b5ec48d0db9d8d8daa98c76230825911ddf0ee8ee8c13ad1e64628d97321017303a02be02ad7e99edff71e1cc800323308e253c0bb733f25402c7b96a821b425ceccce183bbbbde306c6472ee5402b7d589b13dd71578949d0c01309cb1c9e691dff006fbcf2a1a5c12ea71723f726ef5f258d8fd35af0f8508b973c6dab1bb60831eb316e3ee9efae4dacc52d22b465bd450b87dd2ea735dad337000fd553c94f9462e8b361e7c5c112452005c38924b924c3efc15431d2f935200aba6be7be87ed930e2a29a660e88d66d02e412029bc16e4b9b5bdf4bd7d09559752f0e847edec4eef0d3c9c3245237e8a13f65535b5932c993e22469fa31a8ab5ba72dffc29d7e3a88ff5aeb1ff00aeaabdbad7c44bf388f6694d6897cedfa1caf167f2457a90bb4dba96ed3fef5bba3d17bce21fe5429eccec7eb15c9b59f551e27dbffaa97d8f1e5c016fc26209f245c9f5a1a6a6fe64bd44312ac527e8cd34578c2fa57a056e2015b316f92153624b333d873c83228f369187e6d6ba9ed8db3f7bb460808eac015dfb0ee4093fcf9947e69ac33cf6c6c6f498be24ebd8b33a31b2fdcf868a1f84aa3391cddbace7cd89352d40a2b927aa4a951ed1451412145145001451450014515cd8d90ac6ec085215882dc01009b9ee14014cfa4cdbbbfc5baa9f7bc30312f7cad632b790013b883db511d03d883178c8e36178901965e3eaae8ab71c33391e41aa3f696ca9e18d6490ab03766d6cc19bacc4dfd6373ad5b9e89f60fb9f0bbd71693116737162b181ef6bda3425ac781908e5577c2334ae5657fe91f674787c518a0de2288e36b6f643ab996feb31e48b531d10e8dc78cd953d901c40775491892d99324a8b98939549214db9135efa62d99209d2754ceae8aba15b83197bdc311a7beaf0bf3a6bf44db3da2c0ddad792491ec0dedc23b1234bfbdf2a1be094be665278560742080c32b022d6be841078107eaabbbd176dc33e177521bcd873ba7bf16503dedfbeeba13daad55d7a4ce8f9c3e30b46bef7882644e40487efab7b586bd7fcf36e1537e8bb013c58cceee99658583007d62a54a0ef600b91dd9e87ca223c4a879e9e6b0469f1f11871fa12aca7e88eaacda66f34bf3dbf68d59dd39bdf07d8713aff0066c41fac0aac3687df64f9effb469bd1f56723c5dfe917b683ddcf769ecff7a6a54cbb3f0a3e30327e9ddffd74998b93d76f9c7eb34fbb7e3c916163f8b101ec551f61ada5ce48fb8b35b74f2f6212bc06bda29939a75eca8834ab9bd51d66f9a8331fa0538fa26c296f74e29c59a47118f05bc8e47f592b2ff56293a060904ee79858c7839bbff715aad3e8060b7580c3a916664de30ec79499581f02e479573f572e68eef85e3ffb0c7451452476428a28a0028a28a0028a28a002957a698eb2a4038c97793f268469f9ce556dcd43f6533bb800926c06a49e5550edcdb3759714c6dbed52fa658141dd72b8ea13258f03311caa52b6564e91dbd13c37ba71d988bc5875cc6fc0bb5d50761e0edf98bdb569d2c7a3ed9070f845ce2d2ca77b20e60b01950fcd40abe20d33d0ddb262a915d7a577eb40bf2253ec786a77d1bbdf029dd26207b3132d2f7a573efd87fc94ff00e641539e8bff00e447e5b11ff71254f6217527b6decd59e19216d33a900fc56b7558778363e5554ec2c54806502d3c2f75526def88c41426da2921a326deab9b55cd554f4ef05ee6c72cea3def1035fcaa001c7e725980ed8d8d11f2224bb8cfd27c5a4b86c36212f937d038b8b1025bc3a8e208ded88e5ad573b623cb3c83e513edd7eda73d8604b1cf812d944e8f342c2dd56246f72f7acac937f5fdd4b1b7c1711cc572b1bc72afc596325597da08f2a67492a9d799ccf14c6e50535d842c62f55c7737d46ac1e9638f786e4631f61fb691f1d1d9d876ebeda7391b7bb3f0d27128a11bc40c87fbc9f4d332e3247dc49fcf81fb3205f18a3e17b2b38242c2f6b03c3c3b6bcf738e7ecb01edb71adb4c2b1096dae0cb68c664c23a27af762477346515bc033107b335eaefd8d8d8e6862962fbdba295d2c40b7aa47223811c88aa5306e0965f8ca5013c331b100f75c007b89ab27d17e343e0847601a07689858824e8e1981f8443827966cdc380e7eae34ecedf85e4b8b88e5451452675c28a28a0028a28a0028a28a0055e9de2af1ae181d67b892c6c44096df778cd996204703303ca91f6760fddb8f8e322f14677b25b86546042e9c9e4b0b73556aebe926d7ced2cc0fdf2c916bc218ef66e36eb16792fcc3477f56993d19ec8dd61b7ce2d24e43ea3558c0f7a5ed1d52588e464356e88a7597d073a28a2aa5cad7d2c0f7ec37e4a7ff330f537e8bffe4bfaec47f9ee6a23d2ba75f0e7e44c3fbf054d7a3316c1ff005b31f6c84fdb56ec57b8d94bfd37d88715859235b6f56d2424f29135517e41b543dce69828aa96299e8fed0631a491826584895178160010f11171ab46648ec783643ca987a4783591898c868b1682689870df228bd8f2cf1e536f92e6a23a5182383c7975d229ef2adbe0bdc6f57f48ac9df9dbb29876645bd864c3ad8321dfe189e03ac4b25fe2ac8594db847328ad14a9a9230c98d4e0e0caa76ac5c1bc8ff3eda60e82ca25831185275fbe278371f63807f3eb1e91e1416240216519803c55af6653d8cae0dc72a5ed8b8e387c4472f00a6cff0031b46bf80d7c54574327cd1528fd4e1e1f95bc6fe84a32906c788d0d786a67a5382c93671eac9afe77c2fb0f9d4356f0929453473f241c24e2fb1aa14206bfcff3fbe9aba27b5f718d5726d162ac8ff265be84ff0058c4784ebd94b559aae60633f0b86b6b3701af2bdc8f3bf2acf363528d0c69b50f1e4b2fda297fa17b60e270cacc7df13a927ce51eb5b966166f3b72a9fae4b4d3a67a98c949292ee654514541628bfbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82aa48d8020b0ba82091c2e01d45c70b8d298cf47630ac5e4cbef83235d7ef526611390c4020e4626daf0b71ad36a2078fbbb4ff0089c5fae6fe0ae7c7fa6d9e48de31858d7382b984ad700e86dd5d0dafaf2e349184d8d133bc25db78163eb58650f24b0a82baddd32c8dc6d7d08e35960b6561ed0cced3b43248ab91506f2c0b6726c78590db2ea75e16a2901d78ce9b34aca5e042832de30e6cca082c9c340c3abe069c87a769ff00138bf5cdfc14bb3f44e078c328299d9591a2dec81a311621ded1cd95d5dbdcec154dc9602c6c6b960e89c4af8767799e3c44b0aa28880215f76cc2739bde89125865bded9bbaa5d3212a1b3eeed3fe2717eb9bf828fbbb4ff89c5fae6fe0aaf7a45b3e3c33bc00176ea32c9c16cc337bdebd78ec400c75241d0542546d44960f49bd29498bc99b0d1a64cdc24637cc54fc51f13e9aead81e97e5c342225c2c6c2ecd732b0f58df865aad28a9da88f52ddfbbb4ff0089c5fae6fe0a3eeed3fe2717eb9bf82aa2a2a36a26cb1ba4be95df17108df091a9560eae2562548d0e8579a965f3ae7d97e942684c64408c633a13230b82b9594f5781197cd14f2a41a2a6911ea3cedaf48ed3963ee644bb67d1d8d89166b757835813df73ce9766dba5893bb517e598feea88a2b48ce5154998bd363727271e58eb8af488f2429134084a05b3ef1ae4a8b5ed9798a8efe9737e097f48feea8ec16c39a58f79185617208cc01045c904b580d329e3ff00517cb6c7d18c4b5b2c6092c52c1d34616ba9d78f1fd13d944724a2a93292d1e193b9479f73affa5cff00825fd23fba8fe973fe097f48feeae46e8d4f955d02bab2e605587769adafab2ae9ccdab0c4f47e74281945df3dbacba6ecb070c6f61972dcf8f33a55be3cfccaff0041a7ff00cfdd8d5b07d28cb8691e45811b3a80ea64600b0e0feae8753fa46a77eeed37e2717eb9bf82ab9fe8d622c4eec68a5ad9d2f61606c335cd8903c48add1f469d812b2464a900a8cd9ac6530e6002f58670469d9de2f8ca9bb63518282a8f42c1fbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82abe5e8d39b5a4437240b0760489377a10bafc61f275e150d34795996e0e5245c1b83636b83cc1b6951b51630add1e324537592453972dc3b0361c16e0f0eee14515700f764960bbc92ca08519daca0dae00bd80d0683b0564f8c94b0732485810431918b02340435ee08b9f6d14540049b4262c58cd21625496323924a1ba926f7254ea3b39564bb46605984d282e417225705c8d41637bb11cafc28a2803449316b66666b0b0b926c2e4d85f80b927c49ac28a2a4028a28a0028a28a0028a28a0028a28a00c9652381238f02471163c3b46959fba5fe3bfe9b7777f70f60eca28a0037cf6b666b5ad6cc785ad6e3c2c48b77d1ee97e39defa6b9db970e7451401e0c4bf1cef71a0399b41d9c7b87b2bd599870661c38311c351c0f2b9f6d7945007a712f7073bdc7039dae38f037d389f69edad6ce49d4924f1beb7f3a28a00ffd9, 'Assistant Professor', '123456789', 1, 1, 'image/jpeg');
INSERT INTO `faculty` (`facultyCode`, `name`, `CNIC`, `officialEmail`, `personalEmail`, `address`, `contactNumber`, `picture`, `designation`, `password`, `departmentCode`, `showEmail`, `pictureType`) VALUES
('FUI-FURC-062', 'Tahir Baig', '12345-7894561-8', 'tahir@fui.edu.pk', 'tahirbaig@gmail.com', 'Somewhere on Earth', '0312-7895479', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714141316141414161616181a19191919181618191e191a19171a181b181b18191e2a22191b271c171a233324272b2d3130301822363b362f3a2a2f302f010b0b0b0f0e0f1c11111c312722252f2f2f2f2f2f2f312f2f2f342f2f2f2f2f312f2f2f2f3131382d2f2f2f2f2f312d2f2f2f31312f2f2f2f2f2f2f2f2f302f2fffc0001108010700c003012200021101031101ffc4001c0000020203010100000000000000000000000605070203040108ffc4004f100002010203040603090c080603010000010203001104122105133141062251617181073291142342526272a1b1c11733535473829293b2d1d2f0168394a2a3b3c2e1153443b4c3f124557444ffc4001a010002030101000000000000000000000000040102030506ffc4003011000202010302040503040300000000000001021103041221314105516181132271a1c13291b1142343d1334252ffda000c03010002110311003f00bc68a28a0028a28a0028a28a0028a28a00f28a295fa71b5da28d228db2492e6bb8e31c48019641df62a80f26914f2aa4e4a31727d11318b93a46cdb9b6f2b64831102ba9eba491c920274b2178dc6e4f790dc41b76c1f4b3a58ea91aae68cba06655619f311aa671eaaaf365d4922c458debec662f3683ab1afaa83801f6b1e24f335a1a426d724f2173f40ae74f53926aba7d3a8fc34b18bb7c9d18ac66f0de448dff00289bd3fa52e627db5ec18dc9a246b1f7c4d2427c9a265b547b4f94d9b4ec3c8feead8b203c083e758d7d7f7631b63e4870d8dd369e2201732a7e0e52b9add91ce00d78e92037f8e2ac7d8db661c4a1789b81cae8c2cf1b7c5753aa9e7d846a2e0dea8f486fc0af81603f6ac2bbb018f9b0f22b82d1b81656b5eeb7be565ffa91775f4e2a41adf16a9c1ed93b5f742d974c9f30ea5ed452f746ba4b1e24053649ad7299ae180d0bc6da6f12e46b6b8b80c01a61ae8c64a4ad08b4d3a67b451455880a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803caa93a79b433e227209b2eef0ebd9641be95878b48887f27dd565edbda2b8785e56d728eaa8e2ee74541decc40f3aa3f1d292d62c188cc59870691d8bc8e3b8bb35bb80a4b592f9547cdfd90d696172dde471621eca4f756876ca897ec018788d6b7c306fdc27c01d676e4157d63e16d3c48ad3b62504df85d89b760fe4d269f343cdf732622d66d54f06ecf1fdfedefd4d84b72cc3c6c47d86b4e1b1397bc7f3c2bac5ac4a1efb0e1ec3c3caacf82172609863f0598771aebc2e358031482ea6f6ee3f197b0fd62b189ae2f7bd7acb7aa4b9e1964bc8da98d68c5c6a14e6b5ca9536b6747521a3702fa8229bba3fe91e69248a00865790855ba8cdc75667420150352420b01ce9369abd0ded28d26970e51033a992390280c42919e32d6b91a8603e777531a6ebc3afc8b6a52db7565c145145748e7851451400514514005145140051451400515a7113a20bbb2a8ed6207d75cd84daf04a72c72c6e78d95d4923b40bea2803beb16eee3595140147f497a458a96678e78c46f112b6570c8971a9423892a7d63ad891d5b91506d183c7ebaede9ae066c262e6de82639a4792390faac1d8be5cdc996f6cbd8b7a847c79b7003c6b979612dece9e294762a251b1400dda008a78db52d6e6cdcc0ec161af0ae6d931efb17128e01839ee58c8627c0b655fce1511362ec0b335afccfd54c5d1b49233ef5361164900d6493786dc77688840d2f726e6e7b80354d9b62da2dbd3691dbd26e86bc6c6481732b758c57008bf13193a11f24dadcb90a55113836c922b70b14753ec22f5796c8695e3f7fdd335ff00e9860bfa2f72a7ccd741c0a6b65b7b74f2e159ac8d2aebea56d5f3c143472ba12082ac3d65604107bc1d45752e3c731ecab0715e8fa120dcc924878cad21de7f081afaa05bbaa0715e8ee55d5665cbf2d351e255ac7d82aff131bebc7b1316fb0b53636e2ca2dde6a57d1d86ff0089e172fc69337cddc497f2bdaa1f0fb3a59263044ad2c99dd02a8b5f21209d4d94697b936ab83d1e7420e0ef3ce55b10eb9405d56242412a0fc26240b9ee007696b0637bad7431cd916da7d47ba28a29e110a28a2800a28a2800a28a2800ae3da78d10c4d2104e51a28e2cc485551de5881e75d94b1e901dd70ca5335f7d10eadae0bbe443ae9a48c87ca8014f17b5a692e448e5a666549213982c519cb2388f5206a72e504f592e6f7ae5f756f5400619735a281736528a2fef813ad6242e606e3445b5686406e1002f215c3c7bb7313ac71dc312848f82b23024907a80f015b368b901d89902c604318923899559ad98f5458e5016dc4f51ab43327ba1dd2499f14d8791d9a3505632e05d8581525d4759b461727ad6bf3ab0aa80e8e63c0c5978fab95955000a0658d6c2e083cc1bebdb57d34ea38b28f315592a2d1766389c3248a52445753c5594303e20e86aa1da5d11c2e25d67842612021b76110c866506c27dd821618cf23adc15272f0ab664c546c0aef135047acbcfce92b047261618ae03428904b6d2cd0a84fd136cc3b981e749eaf23842d218c11dd2aba20360ecdc361618a4c9be9e445973b052cab200c0027ab1a8040d35241e36d24a4db6b20292c41d0e857324808ef470011eda8e5c1c7347be9849bad1208d5ca17417c84e5b1d75ca2f608013ceb8e6d858602ecb9189b8c923ad8f20b63d6f306f4e62e609d50ae475276ec9fd993ee244ddb16c34c728049261935b282dae43622cdaab0cbc080adf55fecb858a7b9c967613472666163917232e6161662d1e5b73bdec29fd6b91ab8c2395a8fbfd47f0b7282722271e311324670d3240ac331778b78d6362a15090a2e3524f0d34ada0cb1e1dcccc924888e4b22140d9549072126c6c35d6d586cf9444f2c048cb084746ec864ce114f7a98dd7e684275344f8e49a39634b92d148381e71f3bf0f587d3d86b3aedd8bf6dc2aec8d811c38ac3e223de437982481653267de23598975bf59d55597859ae0822adba49d8382699e0902b2c11da6ccc32ef6428551554ebbb50e5b31b5d825ae2f4ed5d1d2a9ac6b7f516cee2e6f6f43da28a298320a28a2800a28a2800a28a2800ae3da5868e489e393546521b5b69ccdf911c6fcabb2967a718e0207854932cc046112e5f239b3b055d744ce41e1714015bec8c16366368157111c48b937d96eab375d430622f20545b9cdcf80bd757f41314533e29e386307d48466725dc666bfaa96ccdaf58dbb2bb7058cc560f0e582450b4d3c6652c44d27becb1c015110eed0471e4b1676b9537517d3762f68d816bbc8fc7793be7636e4aa32c70836b108a2f7abf266e91c5838e3850450a2c69d9c4b1b71663ab1b790e405766c570f88995d5580862b0645207be3f222dceb99c03a83a7107b47107c2d6acba273abe27125583658a1536edde354954c9a7c2419829c3427bfdcf158789cbdc7f922a2fa5d868a3c24cc90c2872daeb0c6a46a3810b7153eef6b0009b9f67793509d385be0a7f9a3eb02826c588ba40cec99f33699752a2dd5274ca808e03d95bdb1675ca025f895e27c5cdd8fb697b043af1f8ffa1aa5239f39cb12b4adcc462e077173645f322ace518ab93a46694a4ea3c8c9d02d66c45f964b78e4ff007a9f9ce317aaa2271c9c92a6ddea148bfb3cab8ba1bb2a48f3bc8002fad81bf0000d6c2fc3ff0075dd274810381918a190479ee3d62e23042f35ce6d7f3b5b5ae065ac992528f4b3b38a325149ae52e7d0dbb2f65651234c44924b6121b58655be58c0d7aa3331d49d5cd4a410a83602d73af99d7ebac857b1100dce806a7b80d4d515f4224f8629743f6dda18d03eedd06ece6d63729d43717eab5c71045fbf85396176c29611c837721d14137573d88fc09f926cda1d2dad541d1d973c6cfc9e4771e0e737db4c386da4caa51c092222cc8fa8b79f0faaaf1d64b14dc5f2acde5a153c6a71e1d16a506927636de7552e03cb00b754dde78876db8cc9ced72fc7d63650e185c4a488ae8c1d1802aca6e083c0822bab8f2c722b8b3993c7283a9237d14515a140a28a2800ad534ca80b330551c4b1000f127852d74aba5430f992329bc55cd23bdf770291a17b105dcf111820902e4a8b1303b2fa3f89c6913621e48a33aae7b1998722148c986523905cc41d6c6a688b263a4bd290abbbc3ca81ca3485c8be58d4a863103d591fada7c11c4df452878eda4918478deec1c48f76ccf2bc6ee0ef1fe13345210b7b0b5ac0014dfd26c0ecfc344b1b42af29059033be7b0d1a49262d9d621cc93d8002c40af7a13d0fc388c4f26190bb9cd1ef12e5100b290ad7c84ead6e20103954aa4434d9198f3262e23143879a45702ce14201a86570f2d96e08074cda8e15a57a172a234f8fc4055417648016627e287716bb1b00a1789b0356a525f49f19bc9d5090b061ed23bb7aad883f7a4b5c67280e72bc2ef19bdc00625295700a31ee20f497644e6510ab2c70844254316286dac44deee56c3536b8b56ad90370b3260dfae23cd29390dd6337f85d85b82f6d77ed0861666638ee3c6f8595bc7d596a3618e28b364da01732ba1b6cd9cf55db311f7c3cc52f1c79a4d39caabb2fc9bcb2618a6a11b6fbbfc2241ce38fff00d5ec8d07d42a276cbe356390bcdbc846556bdb52d6b0cb7b9e5ad751c6a7ff00627cb65e23f8eb096685d591f1eecac4311ff0bc46a40b0e74d4b9549d0b43876d589b0c65d82dcf58db56622d6248e36e02de756b742b6924d9626b2c88355b01980e0c076768e47c452ce1b6760ae0fba24b8e0460710b5d988d8b132349859e47c4460c88b95a3660bc425fad985fbefc35b8ae7ea34b39a57cd0fe3d4e38da5c59698a813b1d1670e9113d7cf732b64526e598477b66b93dc09bf1a50d85d3cc46eaf2086622dcda2241170732ab83cf820f54d4d8e9b4845d708a4f7e26c3da2127e8ac568f3d5c570fc99596ab1c1b4dd31c40a50f48bd2258a17c2c4d79e55caf6ffa519e372383b0d00e3adf96abbb63a698c918c48d1e1d4d85e2b9624f15df3f0e3a5954f61a87c2e0421d6e5ae4926e4df89249d49ed26b371f86fe6eabb1be383ca93ec4c6c58ed0a5be10cdfa5a8fa2d596d393444f8eeabf9bc5be80479d63b0c1dc457d3a83d8751f45ab1da5f7c80fcb3f4a301487f95fb9d7ff001af62570f886460ca6c47f363da2983666d6dd13320f7a26f88887c0278e2231d9cdd798bb7ac0e75aadf83c5346e1d788e5da3983dd460cd2c53b467a9d3c72c7d4b56390100820822e08d41078106b652874631eb1bae1efef3282d8727e09173261ff00375651f1730e09ab7d7a3c7914e2a4bb9e7a51716d33da28a2ae54a7f634f1b4b1498a0cd6cf3ba019b3628c9660e4903de8ae50a78644b7ab539b47a6f2cac61c24643f3b059a51e0884c71df5b348f61f14f0a67c7f44f072bb4924085d8dd8f59731b5aec1480c6c00b9ec152780c0450a08e28d2341c1514281e42a6c8a13ba3bd0a6cfbfc61ccc486dd67326661eabcf29fbeb0e480045e40e967ba28a82489dbfb456145bb58c92450af69696454eaf7804b7e6d55bd25c61265616b40c1634372a0b65cce45eecc4b9b926e7ccde6ba47b437b32c87d5f7561a0807c98f1b099a5f1791028f931023d634afb79bab8bfcb81fde8e8c5352baece8a658b8a57df938711b72443669901e36dd1fdf5a8f489ff0e3f526a2b6abda4908e5183fb558ec980323cd348e234b0b29d598daca3bf51edeeadcc096fe913fe1ff00c1347f489ff0ff00e0ff00b543c8bd6e2a97e08f39cd6e57b680f95744f830d1b346654922d64467cd753f094f31fcf306a2cb34492f481ce9bf1ae9f7ab71f2aeec262e466762c33c0124460b6209cf706dc410b6f02473a4d865254dc93675e3e229a70475c57e493ff2d495366d5c446b8f391020902e700e99dc190301cb5b69dac4f3b53e41b3e2502c80f7917f3d6aabe91496c4330e2a90b0f158d5becab5765cb9a246f923e8d2a98e6ea51f27fc91ab856d9f9afe042dbf8666c562142df506ddaa638cdedcc5d88f2ae08b03237bd8dee43a152f204b761526d97bb87753274a3deb19149ca48f21ecba3123ccac84ff00575be46b026d7eeedeeae26b672c795a4baf28f43e1f1865c1193edc7ec08b60076002b876d5c2061c51837d9f6d7561d5871b73d7993dbf5fd0395653c4194a9e62d5cc8ba959d492b8d18e0f14b220753a1fa0f307bc56ea50c362da096ff018e571d8dc037d9eca6c8650c0329b835a65c5b5dae8ca62c9b953ea892d9c43830962998868dc718e5537471e6069cf870269eba3bb50cf15dc0595098e6406f924502f6ed5208653cd594d56c2a7707b54c6c3163e0811e2947c28813967039b464927e4b3f12169cd06a36bd8fa339fe21a7bfee47dcb128ad71b8201041075046a083cc1ad95da3901451450079509b676b32b0c3c2034ccb98dcd962426dbc7235e370aa35620f000b0efda58e4862799cd92352c6c2e6c05ec00d493c001c49a5dd991ba44d2ca3dfa53bd975be5622cb103f1635b20edb13ccd2fa8cbf0e17dcd31c374a85adb5b2d615c32995dd966c1a28b22a855c4c43450b9bb4eac4f7d2d6ddf5317ff00e81fb71d4f6dd98bcd05ff0019c2ff00dcc5fcf9541ede1d4c57ff00a07f98955f0e96f84a5eaff844ebe3b2518fa7e455db5ebcbf931feaadb826be154f28f108cff34a900f85d96b5ed81d797f263fd55c7b3369ee4dfaacacb95d18e8cbd9e3c6ba342174c91c0cab1bcab2c6ae5d6450590bead729220b8b9e02fadae7436b5766cb8f21666e11e1d95cf66620aafb17e8ae58b1f84b693e2221f12c1addc1ac7ebae6da5b6a364dcc3d48af998b1eb487bfbbf75b855517647e08751aff001d3fd34dd84e38afc8a7fe5a54c2eaac7b645fad69af083fe6bf249ff96ac508adba3ff90c3e4423fc15ab1ba1b266c2c47e48fd907edaaf36f8b625be6c3fe5ad585d0c4b6190770fd95ac30feb97b1a6b7fe287b9a7a73832f87cea2ed1b071dfda0788eaf9d476cdc489235606fa7d9c7cc58f9d3762e1ce8cbda0fb797d355ee0dfdcf2943a236a3bb5e1f9a4dbc08eca53c4f4ef263538f58ff00035e0da95093c72e8fa13d4514579e3d40b7b7a01bc208b871723c743f5573ec4da2616ddb9254f03da3b7e70e7dbc6b7ed7c407934d4016bf6ff37a8cc5a82be7a11c41ed1df5d2c71dd8d46473e6f6cdca23ba3022e0dc1e75bf098968dc3af2e23911cc1ee3493b376bb4760799b5b5b3778ecefeca6ac262448a1869dddf49e4c32c4fd06a19239557d872e8a6d3589970e4fbc3dfdcc4fc0205db0addeba94ed5d3e06ae9551a3ad8a382636b6600d8820dd5d186aaea4021870229e3a2fb68b9dc4cc1a555ce8e0584d15f2ef00e4e0d95d470241e0c2bafa3d57c48ed9755f738babd2bc52b5d18cb451453e262ef4a14bc9858cfa86632383f0b731bc88bfad11bff005751b8fda28d0bc82e15598127e45f31f683eca85e9cede64c49472eaf1157c320032c81a301a4d14bb925e5872adec35b5c835a5f07889203856c3cc8710f746cb7091ca6f299185c46c999cd9ad7ead8137010d5e194e4aba35f918c138c6df7445ecec7c2fb86905a679a29199c8023092acb952fc82a58dad7d49ae6e9127fcc28d4b3a48b617cca590dd6dc46878761a64c46c4861c488608cde350f2c8e733c8ee1951331e08aa198a8016ec847035a63d80d243bd894cb0176dd84d1d40001961278c6ce1babc080a468459ac3962b23c518d2491865c72705393b6d95fe2b0d99f383229b01f7a63c2fdabdf5a0e07e549fd9dbf869db1f8796256775c5a22ea58c08401e350988db689eb4f895bf0be1929bb15a641fb87e549fd9dbf86bd181f952ff676fe1a93fe9245f8ce23fb3c740e9243f8ce27f511feea90a238606f6b9988041b6e187037f8953183439712c559432228ccacb7233e803017e22bab078cde32a23e2999cd9408a1198d8b6975ec04f9549ed0c04d1a2b98672e5d522de98946f5cd9744d74f5af6eae5cdcaa1c92ea4a8b7d0edd89d16c3cd34d34ea652acb1aa66213a91ae66214dd8dcdac74d385ea6e5e8cc6bae19e4c33760669223dcd0c86c07cc287beb8f636cc870aaaac4cd30b9691b8063727229d100d786b61a9353b1ed243c6e3c7fdab839357fdc6e323aab4b704a51b215a4c427564c33337268983a37610490e9de1974bf13c697b17d1e9e7ce14e1b3235d819a556426f6ba9838117d7811c0d585ee843f097da2927a7f2059209d35b1dd496e0c8d76507b4861a766635bbd7ce51daab9fb98e2d04233ddcff00a23b0db131918ca66c101cb34d2311e00443eba313b0a57167c742a39848647fa9d6fe75be29030054dc1acab98f3b4ed4527f43b8b036a9cdd11f1f46221ebe2e46fc9c0a9fe63b56e8b606117d66c54bdcef120ff0d01fa6ba5980e26de35cf263e31c5d7c8dfeaa3e3e5974fb223fa6c6bab7fb9b06cec2afa98717ed925965fa19b2fd15b1540160001d80587b05703ed88870cc7c07efad0db707243e640aab5967d6cd23f0b1fe925eb77fc4772826bd8e1d84ca7e48eacf1f7e688b587c6553ca96e6dbcc05f2aa8ed27ff552bd11d87363e58e47cc30c8caecc45849948611c63e12920666e16b806e74634ba7c9f11497617d5e6c4f1b8b2eaa28a2bbc704f08af68a28021b69f46b0d3c9bc962ccc542b59dd43a8bd95d5582c8a331d1811a9a95550a2c00000d00d0003ea15b2a13a65315c24b6362e162bf66f9d62bf967bd1404074936e7ba70f245141232b8195cd802030606dc729b7b0d23edfc24cdbb6f7311958e97539b32916b01e7e46ace09001617b0d05afc05456d7920de44a735ad23f3e2b9147d121ad12a326ecabdf0d29e3857f2d3ecad9161267ba8c3106c4eb61d83b3bc558664c370cad7f1ff007ac526844b110afeb9075e20c6e2dc7e3653e5536576a20764a4b136189c3c9681909b15bb658d934f1245356d7da9bf682458a506090c8e852ed91e2961de22a125f2b38b81a80c4d48ef62f887dbfef5cf1caa31b862ab94b2cf19ef05524d7ce21edaa6482945a34849a640604e69e72d9ae2288c41948ba177debae61af595013cb2af6d7615b7d07da2f4e58fd9b14d6de2062b72a750cb71639586ab71a1b1d6aade9a633118691a181d5a35b2a978f33a0ca0e50c186602f61981361a93c6b9193c2e591a58df6ee3ebc46389379384d9d9b436a8460a356639554296676f8a88bab1fe785276d8e9089c0520a056b90d606eb716207aa41e373716b54660f6bcd0cdbeb9673a12d6bdbb148d157e4dade1c69836eed2c1626069d818f1416c0ae8646b688ebae6e5a9d40e645358bc2a38ff005be7cd7630c9e28e7ce3aaf27dc848f1f97d5723e6dfecac9f6d31f8721f223ebb545093f9ff006aecc36119f5e03bf9d3d1f0ac527cb6c4a7e379a0ba247ad8c2dae466f12a6de36248f3ac37f21e1181e24fee15ee2f00ca3369a5b504822e6da1e22b4a48e3e11f0600d8f8daff004d6593c36517f253fa9b61f1884e373b5f4e51b3df8f351e03f7935d3b2f664934f1459d8992455b036d09bb7aa07040cc7b949ae685e57608a533310a3a878b1b01ab1e67b2afce8e74470f84eb202f2916323905ac6d70a000a80902e140bd85ef6ac3fa59c1add48696b31ce2f65b3dd9fd0ac04443261632cbc19c1958783485883e74c20515ed322f7614514500145145001503d3788b60e520125324b61c4eea459481e486a7ab122f4015d8dac2f7b310780b8b78f0bd45edcdaa0346f90e81d388f8595aff00e1fd3533d32e8da41859a6864910c6a0a27bd941a8001cd196ca2fdbcaaadc53e3986532861dcb172d79a0ad5533095c7a8cdff1b4be6dd9bdad7b8e15bf07b643cb18c8746cc751c02b7db6a45dce2be31ff0bf756ec37bb10dd58836b5ed0f0f31dd53457716a8daaa2e421b9e3a8d6b6ec3c56fb1d000b6091cf2137bfe0e303cf787d86ab8c0e2b17bc89649572bcb146d654bda49550dac96bd9aaefd8db023c3966567766001672b7b024d8655006a7b390aace970690b6ec97aa6ba5d367999bb5e6f62ccc83e84ab92f546ed39736edbe346ae7c642d21fdbad74abe712f147586bd5103b4f0e08cdadfda2c3bab460706b22b83c542907cc823e91eca91c6b5a36f0b7b74ad3b0469377227d320fdc69e9ae7f6fe4e4e19bd8fd2ce6c141225fa8a7bc91a7b2a512f6d6d7eeaca8ad62a857264deeda31740410781d0d474f816bf02c7b45b5f9ca6daf783af6549d6fc29b667f882e3e792157d84e6fcd3559a5565b0ce49d20e80ec6326d0843708d9a461f921f6485055f02abbf44fb3befd391a690a782f59cf9b151e31d58a2b979e573fa707a6d1c5ac49befc9ed1451588d0514514005145140051451401c1b670227825849b6742b7b5ec48d0db9d8d8daa98c76230825911ddf0ee8ee8c13ad1e64628d97321017303a02be02ad7e99edff71e1cc800323308e253c0bb733f25402c7b96a821b425ceccce183bbbbde306c6472ee5402b7d589b13dd71578949d0c01309cb1c9e691dff006fbcf2a1a5c12ea71723f726ef5f258d8fd35af0f8508b973c6dab1bb60831eb316e3ee9efae4dacc52d22b465bd450b87dd2ea735dad337000fd553c94f9462e8b361e7c5c112452005c38924b924c3efc15431d2f935200aba6be7be87ed930e2a29a660e88d66d02e412029bc16e4b9b5bdf4bd7d09559752f0e847edec4eef0d3c9c3245237e8a13f65535b5932c993e22469fa31a8ab5ba72dffc29d7e3a88ff5aeb1ff00aeaabdbad7c44bf388f6694d6897cedfa1caf167f2457a90bb4dba96ed3fef5bba3d17bce21fe5429eccec7eb15c9b59f551e27dbffaa97d8f1e5c016fc26209f245c9f5a1a6a6fe64bd44312ac527e8cd34578c2fa57a056e2015b316f92153624b333d873c83228f369187e6d6ba9ed8db3f7bb460808eac015dfb0ee4093fcf9947e69ac33cf6c6c6f498be24ebd8b33a31b2fdcf868a1f84aa3391cddbace7cd89352d40a2b927aa4a951ed1451412145145001451450014515cd8d90ac6ec085215882dc01009b9ee14014cfa4cdbbbfc5baa9f7bc30312f7cad632b790013b883db511d03d883178c8e36178901965e3eaae8ab71c33391e41aa3f696ca9e18d6490ab03766d6cc19bacc4dfd6373ad5b9e89f60fb9f0bbd71693116737162b181ef6bda3425ac781908e5577c2334ae5657fe91f674787c518a0de2288e36b6f643ab996feb31e48b531d10e8dc78cd953d901c40775491892d99324a8b98939549214db9135efa62d99209d2754ceae8aba15b83197bdc311a7beaf0bf3a6bf44db3da2c0ddad792491ec0dedc23b1234bfbdf2a1be094be665278560742080c32b022d6be841078107eaabbbd176dc33e177521bcd873ba7bf16503dedfbeeba13daad55d7a4ce8f9c3e30b46bef7882644e40487efab7b586bd7fcf36e1537e8bb013c58cceee99658583007d62a54a0ef600b91dd9e87ca223c4a879e9e6b0469f1f11871fa12aca7e88eaacda66f34bf3dbf68d59dd39bdf07d8713aff0066c41fac0aac3687df64f9effb469bd1f56723c5dfe917b683ddcf769ecff7a6a54cbb3f0a3e30327e9ddffd74998b93d76f9c7eb34fbb7e3c916163f8b101ec551f61ada5ce48fb8b35b74f2f6212bc06bda29939a75eca8834ab9bd51d66f9a8331fa0538fa26c296f74e29c59a47118f05bc8e47f592b2ff56293a060904ee79858c7839bbff715aad3e8060b7580c3a916664de30ec79499581f02e479573f572e68eef85e3ffb0c7451452476428a28a0028a28a0028a28a002957a698eb2a4038c97793f268469f9ce556dcd43f6533bb800926c06a49e5550edcdb3759714c6dbed52fa658141dd72b8ea13258f03311caa52b6564e91dbd13c37ba71d988bc5875cc6fc0bb5d50761e0edf98bdb569d2c7a3ed9070f845ce2d2ca77b20e60b01950fcd40abe20d33d0ddb262a915d7a577eb40bf2253ec786a77d1bbdf029dd26207b3132d2f7a573efd87fc94ff00e641539e8bff00e447e5b11ff71254f6217527b6decd59e19216d33a900fc56b7558778363e5554ec2c54806502d3c2f75526def88c41426da2921a326deab9b55cd554f4ef05ee6c72cea3def1035fcaa001c7e725980ed8d8d11f2224bb8cfd27c5a4b86c36212f937d038b8b1025bc3a8e208ded88e5ad573b623cb3c83e513edd7eda73d8604b1cf812d944e8f342c2dd56246f72f7acac937f5fdd4b1b7c1711cc572b1bc72afc596325597da08f2a67492a9d799ccf14c6e50535d842c62f55c7737d46ac1e9638f786e4631f61fb691f1d1d9d876ebeda7391b7bb3f0d27128a11bc40c87fbc9f4d332e3247dc49fcf81fb3205f18a3e17b2b38242c2f6b03c3c3b6bcf738e7ecb01edb71adb4c2b1096dae0cb68c664c23a27af762477346515bc033107b335eaefd8d8d8e6862962fbdba295d2c40b7aa47223811c88aa5306e0965f8ca5013c331b100f75c007b89ab27d17e343e0847601a07689858824e8e1981f8443827966cdc380e7eae34ecedf85e4b8b88e5451452675c28a28a0028a28a0028a28a0055e9de2af1ae181d67b892c6c44096df778cd996204703303ca91f6760fddb8f8e322f14677b25b86546042e9c9e4b0b73556aebe926d7ced2cc0fdf2c916bc218ef66e36eb16792fcc3477f56993d19ec8dd61b7ce2d24e43ea3558c0f7a5ed1d52588e464356e88a7597d073a28a2aa5cad7d2c0f7ec37e4a7ff330f537e8bffe4bfaec47f9ee6a23d2ba75f0e7e44c3fbf054d7a3316c1ff005b31f6c84fdb56ec57b8d94bfd37d88715859235b6f56d2424f29135517e41b543dce69828aa96299e8fed0631a491826584895178160010f11171ab46648ec783643ca987a4783591898c868b1682689870df228bd8f2cf1e536f92e6a23a5182383c7975d229ef2adbe0bdc6f57f48ac9df9dbb29876645bd864c3ad8321dfe189e03ac4b25fe2ac8594db847328ad14a9a9230c98d4e0e0caa76ac5c1bc8ff3eda60e82ca25831185275fbe278371f63807f3eb1e91e1416240216519803c55af6653d8cae0dc72a5ed8b8e387c4472f00a6cff0031b46bf80d7c54574327cd1528fd4e1e1f95bc6fe84a32906c788d0d786a67a5382c93671eac9afe77c2fb0f9d4356f0929453473f241c24e2fb1aa14206bfcff3fbe9aba27b5f718d5726d162ac8ff265be84ff0058c4784ebd94b559aae60633f0b86b6b3701af2bdc8f3bf2acf363528d0c69b50f1e4b2fda297fa17b60e270cacc7df13a927ce51eb5b966166f3b72a9fae4b4d3a67a98c949292ee654514541628bfbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82aa48d8020b0ba82091c2e01d45c70b8d298cf47630ac5e4cbef83235d7ef526611390c4020e4626daf0b71ad36a2078fbbb4ff0089c5fae6fe0ae7c7fa6d9e48de31858d7382b984ad700e86dd5d0dafaf2e349184d8d133bc25db78163eb58650f24b0a82baddd32c8dc6d7d08e35960b6561ed0cced3b43248ab91506f2c0b6726c78590db2ea75e16a2901d78ce9b34aca5e042832de30e6cca082c9c340c3abe069c87a769ff00138bf5cdfc14bb3f44e078c328299d9591a2dec81a311621ded1cd95d5dbdcec154dc9602c6c6b960e89c4af8767799e3c44b0aa28880215f76cc2739bde89125865bded9bbaa5d3212a1b3eeed3fe2717eb9bf828fbbb4ff89c5fae6fe0aaf7a45b3e3c33bc00176ea32c9c16cc337bdebd78ec400c75241d0542546d44960f49bd29498bc99b0d1a64cdc24637cc54fc51f13e9aead81e97e5c342225c2c6c2ecd732b0f58df865aad28a9da88f52ddfbbb4ff0089c5fae6fe0a3eeed3fe2717eb9bf82aa2a2a36a26cb1ba4be95df17108df091a9560eae2562548d0e8579a965f3ae7d97e942684c64408c633a13230b82b9594f5781197cd14f2a41a2a6911ea3cedaf48ed3963ee644bb67d1d8d89166b757835813df73ce9766dba5893bb517e598feea88a2b48ce5154998bd363727271e58eb8af488f2429134084a05b3ef1ae4a8b5ed9798a8efe9737e097f48feea8ec16c39a58f79185617208cc01045c904b580d329e3ff00517cb6c7d18c4b5b2c6092c52c1d34616ba9d78f1fd13d944724a2a93292d1e193b9479f73affa5cff00825fd23fba8fe973fe097f48feeae46e8d4f955d02bab2e605587769adafab2ae9ccdab0c4f47e74281945df3dbacba6ecb070c6f61972dcf8f33a55be3cfccaff0041a7ff00cfdd8d5b07d28cb8691e45811b3a80ea64600b0e0feae8753fa46a77eeed37e2717eb9bf82ab9fe8d622c4eec68a5ad9d2f61606c335cd8903c48add1f469d812b2464a900a8cd9ac6530e6002f58670469d9de2f8ca9bb63518282a8f42c1fbbb4ff89c5fae6fe0a3eeed3fe2717eb9bf82abe5e8d39b5a4437240b0760489377a10bafc61f275e150d34795996e0e5245c1b83636b83cc1b6951b51630add1e324537592453972dc3b0361c16e0f0eee14515700f764960bbc92ca08519daca0dae00bd80d0683b0564f8c94b0732485810431918b02340435ee08b9f6d14540049b4262c58cd21625496323924a1ba926f7254ea3b39564bb46605984d282e417225705c8d41637bb11cafc28a2803449316b66666b0b0b926c2e4d85f80b927c49ac28a2a4028a28a0028a28a0028a28a0028a28a00c9652381238f02471163c3b46959fba5fe3bfe9b7777f70f60eca28a0037cf6b666b5ad6cc785ad6e3c2c48b77d1ee97e39defa6b9db970e7451401e0c4bf1cef71a0399b41d9c7b87b2bd599870661c38311c351c0f2b9f6d7945007a712f7073bdc7039dae38f037d389f69edad6ce49d4924f1beb7f3a28a00ffd9, 'Exam Head', '123456789', NULL, 0, 'image/jpeg');

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
  `facultyAllocationsCode` int(11) NOT NULL,
  `isCoordinator` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultyallocations`
--

INSERT INTO `facultyallocations` (`facultyCode`, `allocationCode`, `monthModified`, `seasonCode`, `sectionCode`, `facultyAllocationsCode`, `isCoordinator`) VALUES
('FUI-FURC-056', 1, '2015-02-16', 1, 88, 1, NULL),
('FUI-FURC-056', 2, '2015-02-16', 1, 88, 2, NULL),
('FUI-FURC-057', 1, '2015-02-16', 1, 89, 3, NULL),
('FUI-FURC-057', 2, '2015-02-16', 1, 89, 4, NULL),
('FUI-FURC-056', 3, '2015-10-06', 2, 86, 7, NULL),
('FUI-FURC-057', 4, '2015-10-06', 2, 86, 8, NULL),
('FUI-FURC-057', 4, '2015-10-06', 2, 87, 9, NULL),
('FUI-FURC-056', 3, '2015-10-06', 2, 87, 10, NULL),
('FUI-FURC-058', 5, '2015-10-06', 2, 72, 11, NULL),
('FUI-FURC-059', 6, '2015-10-06', 2, 72, 12, NULL),
('FUI-FURC-058', 5, '2015-10-06', 2, 73, 13, NULL),
('FUI-FURC-059', 6, '2015-10-06', 2, 73, 14, NULL),
('FUI-FURC-056', 7, '2016-02-28', 3, 84, 15, NULL),
('FUI-FURC-056', 7, '2016-02-28', 3, 85, 16, NULL),
('FUI-FURC-056', 8, '2016-02-28', 3, 84, 17, NULL),
('FUI-FURC-057', 8, '2016-02-28', 3, 85, 18, NULL),
('FUI-FURC-057', 9, '2016-02-28', 3, 70, 19, NULL),
('FUI-FURC-057', 9, '2016-02-28', 3, 71, 20, NULL),
('FUI-FURC-058', 10, '2016-02-28', 3, 70, 21, NULL),
('FUI-FURC-058', 10, '2016-02-28', 3, 71, 22, NULL),
('FUI-FURC-058', 11, '2016-02-28', 3, 56, 23, NULL),
('FUI-FURC-059', 11, '2016-02-28', 3, 57, 24, NULL),
('FUI-FURC-059', 12, '2016-02-28', 3, 56, 25, NULL),
('FUI-FURC-059', 12, '2016-02-28', 3, 57, 26, NULL),
('FUI-FURC-056', 13, '2016-08-28', 4, 82, 27, NULL),
('FUI-FURC-056', 13, '2016-08-28', 4, 83, 28, NULL),
('FUI-FURC-056', 14, '2016-08-28', 4, 82, 29, NULL),
('FUI-FURC-057', 14, '2016-08-28', 4, 83, 30, NULL),
('FUI-FURC-057', 15, '2016-08-28', 4, 68, 31, NULL),
('FUI-FURC-057', 15, '2016-08-28', 4, 69, 32, NULL),
('FUI-FURC-058', 16, '2016-08-28', 4, 68, 33, NULL),
('FUI-FURC-058', 16, '2016-08-28', 4, 69, 34, NULL),
('FUI-FURC-058', 17, '2016-08-28', 4, 54, 35, NULL),
('FUI-FURC-059', 17, '2016-08-28', 4, 55, 36, NULL),
('FUI-FURC-059', 18, '2016-08-28', 4, 54, 37, NULL),
('FUI-FURC-059', 18, '2016-08-28', 4, 55, 38, NULL),
('FUI-FURC-060', 19, '2016-08-28', 4, 42, 39, NULL),
('FUI-FURC-060', 19, '2016-08-28', 4, 43, 40, NULL),
('FUI-FURC-060', 20, '2016-08-28', 4, 42, 41, NULL),
('FUI-FURC-061', 20, '2016-08-28', 4, 43, 42, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gradingmodel`
--

CREATE TABLE `gradingmodel` (
  `percentage` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `gpc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradingmodel`
--

INSERT INTO `gradingmodel` (`percentage`, `grade`, `gpc`) VALUES
(1, 'F', 0),
(2, 'F', 0),
(3, 'F', 0),
(4, 'F', 0),
(5, 'F', 0),
(6, 'F', 0),
(7, 'F', 0),
(8, 'F', 0),
(9, 'F', 0),
(10, 'F', 0),
(11, 'F', 0),
(12, 'F', 0),
(13, 'F', 0),
(14, 'F', 0),
(15, 'F', 0),
(16, 'F', 0),
(17, 'F', 0),
(18, 'F', 0),
(19, 'F', 0),
(20, 'F', 0),
(21, 'F', 0),
(22, 'F', 0),
(23, 'F', 0),
(24, 'F', 0),
(25, 'F', 0),
(26, 'F', 0),
(27, 'F', 0),
(28, 'F', 0),
(29, 'F', 0),
(30, 'F', 0),
(31, 'F', 0),
(32, 'F', 0),
(33, 'F', 0),
(34, 'F', 0),
(35, 'F', 0),
(36, 'F', 0),
(37, 'F', 0),
(38, 'F', 0),
(39, 'F', 0),
(40, 'F', 0),
(41, 'F', 0),
(42, 'F', 0),
(43, 'F', 0),
(44, 'F', 0),
(45, 'F', 0),
(46, 'F', 0),
(47, 'F', 0),
(48, 'F', 0),
(49, 'F', 0),
(50, 'D', 1.5),
(51, 'D', 1.55),
(52, 'D', 1.6),
(53, 'D', 1.65),
(54, 'D', 1.7),
(55, 'D+', 1.75),
(56, 'D+', 1.8),
(57, 'D+', 1.85),
(58, 'D+', 1.9),
(59, 'D+', 1.95),
(60, 'C', 2),
(61, 'C', 2.08),
(62, 'C', 2.16),
(63, 'C', 2.24),
(64, 'C', 2.32),
(65, 'C+', 2.4),
(66, 'C+', 2.48),
(67, 'C+', 2.56),
(68, 'C+', 2.64),
(69, 'C+', 2.72),
(70, 'B', 2.8),
(71, 'B', 2.88),
(72, 'B', 2.96),
(73, 'B', 3.04),
(74, 'B', 3.12),
(75, 'B+', 3.2),
(76, 'B+', 3.28),
(77, 'B+', 3.36),
(78, 'B+', 3.44),
(79, 'B+', 3.52),
(80, 'A', 3.6),
(81, 'A', 3.68),
(82, 'A', 3.76),
(83, 'A', 3.84),
(84, 'A', 3.92),
(85, 'A+', 4),
(86, 'A+', 4),
(87, 'A+', 4),
(88, 'A+', 4),
(89, 'A+', 4),
(90, 'A+', 4),
(91, 'A+', 4),
(92, 'A+', 4),
(93, 'A+', 4),
(94, 'A+', 4),
(95, 'A+', 4),
(96, 'A+', 4),
(97, 'A+', 4),
(98, 'A+', 4),
(99, 'A+', 4),
(100, 'A+', 4);

-- --------------------------------------------------------

--
-- Table structure for table `headofdepartment`
--

CREATE TABLE `headofdepartment` (
  `facultyCode` varchar(30) NOT NULL,
  `departmentCode` int(11) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `resignationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headofdepartment`
--

INSERT INTO `headofdepartment` (`facultyCode`, `departmentCode`, `officialEmail`, `password`, `resignationDate`) VALUES
('FUI-FURC-057', 1, 'hod-se@fui.edu.pk', '123456789', NULL);

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
(18, 1, 2, 'PLO-6', 'ABCDEFGHIJKL'),
(19, 2, 2, 'PLO-1', 'ABC'),
(20, 2, 2, 'PLO-2', 'ABC'),
(21, 2, 2, 'PLO-3', 'ABC'),
(22, 2, 2, 'PLO-4', 'ABC'),
(23, 2, 2, 'PLO-5', 'ABC'),
(24, 2, 2, 'PLO-6', 'ABC');

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
('SEN-28', 'Object Oriented'),
('SEN-29', 'Object Oriented'),
('SEN-30', 'Object Oriented'),
('SEN-31', 'Object Oriented'),
('SEN-32', 'Object Oriented'),
('SEN-33', 'Object Oriented'),
('SEN-34', 'Object Oriented'),
('SEN-35', 'Object Oriented');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programCode` int(11) NOT NULL,
  `departmentCode` int(11) NOT NULL,
  `programName` varchar(50) NOT NULL,
  `programShortName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programCode`, `departmentCode`, `programName`, `programShortName`) VALUES
(1, 1, 'Bachelors of Computer in Software Engineering', 'BCSE'),
(2, 1, 'Bachelors of Computer in Computer Science', 'BSCS'),
(3, 2, 'Bachelors in Social Science', 'BSSS');

-- --------------------------------------------------------

--
-- Table structure for table `programcurriculum`
--

CREATE TABLE `programcurriculum` (
  `programCode` int(11) NOT NULL,
  `curriculumCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programcurriculum`
--

INSERT INTO `programcurriculum` (`programCode`, `curriculumCode`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programmanager`
--

CREATE TABLE `programmanager` (
  `facultyCode` varchar(30) NOT NULL,
  `programCode` int(11) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programmanager`
--

INSERT INTO `programmanager` (`facultyCode`, `programCode`, `officialEmail`, `password`) VALUES
('FUI-FURC-060', 1, 'pm-bcse@fui.edu.pk', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `programtranscript`
--

CREATE TABLE `programtranscript` (
  `programtranscriptCode` int(11) NOT NULL,
  `studentRegCode` varchar(30) NOT NULL,
  `approvalStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programtranscript`
--

INSERT INTO `programtranscript` (`programtranscriptCode`, `studentRegCode`, `approvalStatus`) VALUES
(1, 'FUI/FURC-SP-15-BCSE-001', 1),
(2, 'FUI/FURC-SP-15-BCSE-002', 1),
(3, 'FUI/FURC-SP-15-BCSE-003', 1),
(4, 'FUI/FURC-SP-15-BCSE-004', 0),
(5, 'FUI/FURC-SP-15-BCSE-005', 0),
(6, 'FUI/FURC-SP-15-BCSE-006', 0),
(7, 'FUI/FURC-F-15-BCSE-001', 0),
(8, 'FUI/FURC-F-15-BCSE-002', 0),
(9, 'FUI/FURC-F-15-BCSE-003', 0),
(10, 'FUI/FURC-F-15-BCSE-004', 0),
(11, 'FUI/FURC-F-15-BCSE-005', 0),
(12, 'FUI/FURC-F-15-BCSE-006', 0),
(13, 'FUI/FURC-SP-16-BCSE-001', 0),
(14, 'FUI/FURC-SP-16-BCSE-002', 0),
(15, 'FUI/FURC-SP-16-BCSE-003', 0),
(16, 'FUI/FURC-SP-16-BCSE-004', 0),
(17, 'FUI/FURC-SP-16-BCSE-005', 0),
(18, 'FUI/FURC-SP-16-BCSE-006', 0),
(19, 'FUI/FURC-F-16-BCSE-001', 1),
(20, 'FUI/FURC-F-16-BCSE-002', 1),
(21, 'FUI/FURC-F-16-BCSE-003', 1),
(22, 'FUI/FURC-F-16-BCSE-004', 1),
(616, 'FUI/FURC-F-16-BCSE-005', 0),
(617, 'FUI/FURC-F-16-BCSE-006', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programtranscriptplos`
--

CREATE TABLE `programtranscriptplos` (
  `programtranscriptCode` int(11) NOT NULL,
  `ploCode` int(11) NOT NULL,
  `passingStatus` varchar(10) NOT NULL,
  `percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programtranscriptplos`
--

INSERT INTO `programtranscriptplos` (`programtranscriptCode`, `ploCode`, `passingStatus`, `percentage`) VALUES
(1, 1, 'Pass', 64),
(1, 2, 'Pass', 77),
(1, 3, 'Pass', 64),
(1, 4, 'Pass', 76),
(1, 5, 'Pass', 74),
(1, 6, 'Pass', 68),
(1, 7, 'Pass', 82),
(1, 8, 'Pass', 69),
(1, 10, 'Pass', 61),
(1, 11, 'Pass', 100),
(2, 1, 'Pass', 55),
(2, 2, 'Fail', 49),
(2, 3, 'Pass', 59),
(2, 4, 'Pass', 80),
(2, 5, 'Pass', 68),
(2, 6, 'Pass', 54),
(2, 7, 'Pass', 52),
(2, 8, 'Pass', 72),
(2, 10, 'Pass', 74),
(2, 11, 'Fail', 45),
(3, 1, 'Pass', 62),
(3, 2, 'Pass', 65),
(3, 3, 'Pass', 57),
(3, 4, 'Fail', 27),
(3, 5, 'Pass', 59),
(3, 6, 'Pass', 57),
(3, 7, 'Pass', 63),
(3, 8, 'Pass', 58),
(3, 10, 'Pass', 61),
(3, 11, 'Pass', 69),
(4, 1, 'Pass', 79),
(4, 2, 'Pass', 60),
(4, 3, 'Pass', 84),
(4, 4, 'Pass', 70),
(4, 5, 'Pass', 69),
(4, 6, 'Fail', 49),
(4, 7, 'Pass', 70),
(4, 8, 'Pass', 68),
(4, 10, 'Pass', 75),
(4, 11, 'Pass', 56),
(5, 1, 'Pass', 71),
(5, 2, 'Fail', 48),
(5, 3, 'Pass', 58),
(5, 4, 'Fail', 50),
(5, 5, 'Pass', 69),
(5, 6, 'Pass', 69),
(5, 7, 'Pass', 64),
(5, 8, 'Pass', 67),
(5, 10, 'Pass', 68),
(5, 11, 'Pass', 70),
(6, 1, 'Pass', 57),
(6, 2, 'Pass', 65),
(6, 3, 'Pass', 64),
(6, 4, 'Pass', 90),
(6, 5, 'Pass', 69),
(6, 6, 'Fail', 50),
(6, 7, 'Pass', 64),
(6, 8, 'Pass', 72),
(6, 10, 'Pass', 58),
(6, 11, 'Pass', 64),
(7, 1, 'Pass', 83),
(7, 3, 'Pass', 63),
(7, 4, 'Pass', 66),
(7, 5, 'Pass', 79),
(7, 7, 'Pass', 66),
(7, 8, 'Pass', 82),
(7, 9, 'Pass', 59),
(7, 10, 'Pass', 55),
(7, 11, 'Pass', 66),
(8, 1, 'Pass', 74),
(8, 3, 'Pass', 74),
(8, 4, 'Pass', 80),
(8, 5, 'Pass', 71),
(8, 7, 'Pass', 68),
(8, 8, 'Pass', 75),
(8, 9, 'Pass', 60),
(8, 10, 'Pass', 65),
(8, 11, 'Pass', 80),
(9, 1, 'Pass', 80),
(9, 3, 'Pass', 89),
(9, 4, 'Pass', 77),
(9, 5, 'Pass', 86),
(9, 7, 'Pass', 80),
(9, 8, 'Pass', 81),
(9, 9, 'Pass', 61),
(9, 10, 'Pass', 78),
(9, 11, 'Pass', 77),
(10, 1, 'Pass', 69),
(10, 3, 'Pass', 52),
(10, 4, 'Pass', 68),
(10, 5, 'Pass', 82),
(10, 7, 'Pass', 71),
(10, 8, 'Pass', 65),
(10, 9, 'Pass', 64),
(10, 10, 'Pass', 68),
(10, 11, 'Pass', 68),
(11, 1, 'Pass', 73),
(11, 3, 'Pass', 57),
(11, 4, 'Pass', 62),
(11, 5, 'Pass', 65),
(11, 7, 'Pass', 73),
(11, 8, 'Pass', 72),
(11, 9, 'Pass', 66),
(11, 10, 'Pass', 67),
(11, 11, 'Pass', 62),
(12, 1, 'Pass', 75),
(12, 3, 'Pass', 57),
(12, 4, 'Pass', 66),
(12, 5, 'Pass', 78),
(12, 7, 'Pass', 59),
(12, 8, 'Pass', 72),
(12, 9, 'Pass', 62),
(12, 10, 'Pass', 67),
(12, 11, 'Pass', 66),
(13, 1, 'Pass', 77),
(13, 2, 'Pass', 67),
(13, 3, 'Pass', 74),
(13, 4, 'Pass', 67),
(13, 10, 'Pass', 68),
(13, 11, 'Pass', 66),
(14, 1, 'Pass', 66),
(14, 2, 'Pass', 67),
(14, 3, 'Pass', 66),
(14, 4, 'Fail', 40),
(14, 10, 'Pass', 67),
(14, 11, 'Pass', 57),
(15, 1, 'Pass', 82),
(15, 2, 'Pass', 73),
(15, 3, 'Pass', 82),
(15, 4, 'Pass', 78),
(15, 10, 'Pass', 68),
(15, 11, 'Pass', 76),
(16, 1, 'Pass', 65),
(16, 2, 'Pass', 65),
(16, 3, 'Pass', 61),
(16, 4, 'Pass', 70),
(16, 10, 'Pass', 72),
(16, 11, 'Pass', 66),
(17, 1, 'Pass', 76),
(17, 2, 'Pass', 69),
(17, 3, 'Pass', 76),
(17, 4, 'Pass', 77),
(17, 10, 'Pass', 62),
(17, 11, 'Pass', 74),
(18, 1, 'Pass', 72),
(18, 2, 'Pass', 72),
(18, 3, 'Pass', 70),
(18, 4, 'Pass', 72),
(18, 10, 'Pass', 74),
(18, 11, 'Pass', 72),
(19, 3, 'Pass', 67),
(19, 4, 'Pass', 66),
(19, 9, 'Fail', 49),
(19, 10, 'Pass', 78),
(19, 11, 'Pass', 62),
(20, 3, 'Pass', 71),
(20, 4, 'Pass', 66),
(20, 9, 'Pass', 56),
(20, 10, 'Pass', 78),
(20, 11, 'Pass', 78),
(21, 3, 'Pass', 73),
(21, 4, 'Pass', 79),
(21, 9, 'Pass', 84),
(21, 10, 'Pass', 72),
(21, 11, 'Pass', 64),
(22, 3, 'Pass', 68),
(22, 4, 'Pass', 67),
(22, 9, 'Pass', 63),
(22, 10, 'Pass', 77),
(22, 11, 'Pass', 75),
(616, 3, 'Pass', 69),
(616, 4, 'Pass', 69),
(616, 9, 'Pass', 71),
(616, 10, 'Pass', 71),
(616, 11, 'Pass', 72),
(617, 3, 'Pass', 78),
(617, 4, 'Pass', 68),
(617, 9, 'Pass', 66),
(617, 10, 'Pass', 67),
(617, 11, 'Pass', 86);

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
(1, 'SEN-28'),
(1, 'SEN-29'),
(2, 'SEN-28'),
(2, 'SEN-29'),
(3, 'SEN-28'),
(3, 'SEN-29'),
(4, 'SEN-28'),
(4, 'SEN-29'),
(5, 'SEN-28'),
(5, 'SEN-29'),
(6, 'SEN-28'),
(6, 'SEN-29'),
(7, 'SEN-30'),
(7, 'SEN-31'),
(8, 'SEN-30'),
(8, 'SEN-31'),
(9, 'SEN-30'),
(9, 'SEN-31'),
(10, 'SEN-30'),
(10, 'SEN-31'),
(11, 'SEN-30'),
(11, 'SEN-31'),
(12, 'SEN-30'),
(12, 'SEN-31'),
(13, 'SEN-28'),
(13, 'SEN-29'),
(14, 'SEN-28'),
(14, 'SEN-29'),
(15, 'SEN-28'),
(15, 'SEN-29'),
(16, 'SEN-28'),
(16, 'SEN-29'),
(17, 'SEN-28'),
(17, 'SEN-29'),
(18, 'SEN-28'),
(18, 'SEN-29'),
(19, 'SEN-32'),
(19, 'SEN-33'),
(20, 'SEN-32'),
(20, 'SEN-33'),
(21, 'SEN-32'),
(21, 'SEN-33'),
(22, 'SEN-32'),
(22, 'SEN-33'),
(23, 'SEN-32'),
(23, 'SEN-33'),
(24, 'SEN-32'),
(24, 'SEN-33'),
(25, 'SEN-30'),
(25, 'SEN-31'),
(26, 'SEN-30'),
(26, 'SEN-31'),
(27, 'SEN-30'),
(27, 'SEN-31'),
(28, 'SEN-30'),
(28, 'SEN-31'),
(29, 'SEN-30'),
(29, 'SEN-31'),
(30, 'SEN-30'),
(30, 'SEN-31'),
(31, 'SEN-28'),
(31, 'SEN-29'),
(32, 'SEN-28'),
(32, 'SEN-29'),
(33, 'SEN-28'),
(33, 'SEN-29'),
(34, 'SEN-28'),
(34, 'SEN-29'),
(35, 'SEN-28'),
(35, 'SEN-29'),
(36, 'SEN-28'),
(36, 'SEN-29'),
(37, 'SEN-34'),
(37, 'SEN-35'),
(38, 'SEN-34'),
(38, 'SEN-35'),
(39, 'SEN-34'),
(39, 'SEN-35'),
(40, 'SEN-34'),
(40, 'SEN-35'),
(41, 'SEN-34'),
(41, 'SEN-35'),
(42, 'SEN-34'),
(42, 'SEN-35'),
(44, 'SEN-32'),
(44, 'SEN-33'),
(45, 'SEN-32'),
(45, 'SEN-33'),
(46, 'SEN-32'),
(46, 'SEN-33'),
(47, 'SEN-32'),
(47, 'SEN-33'),
(48, 'SEN-32'),
(48, 'SEN-33'),
(49, 'SEN-32'),
(49, 'SEN-33'),
(50, 'SEN-30'),
(50, 'SEN-31'),
(51, 'SEN-30'),
(51, 'SEN-31'),
(52, 'SEN-30'),
(52, 'SEN-31'),
(53, 'SEN-30'),
(53, 'SEN-31'),
(54, 'SEN-30'),
(54, 'SEN-31'),
(55, 'SEN-30'),
(55, 'SEN-31'),
(56, 'SEN-28'),
(56, 'SEN-29'),
(57, 'SEN-28'),
(57, 'SEN-29'),
(58, 'SEN-28'),
(58, 'SEN-29'),
(59, 'SEN-28'),
(59, 'SEN-29'),
(60, 'SEN-28'),
(60, 'SEN-29'),
(61, 'SEN-28'),
(61, 'SEN-29');

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
(1, 'Spring 15'),
(3, 'Spring 16');

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
(42, 10, 'A'),
(43, 10, 'B'),
(54, 9, 'A'),
(55, 9, 'B'),
(56, 6, 'A'),
(57, 6, 'B'),
(68, 8, 'A'),
(69, 8, 'B'),
(70, 5, 'A'),
(71, 5, 'B'),
(72, 3, 'A'),
(73, 3, 'B'),
(82, 7, 'A'),
(83, 7, 'B'),
(84, 4, 'A'),
(85, 4, 'B'),
(86, 2, 'A'),
(87, 2, 'B'),
(88, 1, 'A'),
(89, 1, 'B'),
(917, 302, 'A'),
(918, 302, 'B');

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
(302, 5, '1'),
(303, 5, '2');

-- --------------------------------------------------------

--
-- Table structure for table `semestergpatranscriptcourses`
--

CREATE TABLE `semestergpatranscriptcourses` (
  `semtranscriptCode` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `percentage` float DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `gradePoints` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestergpatranscriptcourses`
--

INSERT INTO `semestergpatranscriptcourses` (`semtranscriptCode`, `courseCode`, `percentage`, `grade`, `gradePoints`) VALUES
(1, 'SEN-28', 76, 'B+', 3.28),
(1, 'SEN-29', 70, 'B', 2.8),
(2, 'SEN-28', 47, 'F', 0),
(2, 'SEN-29', 69, 'C+', 2.72),
(3, 'SEN-28', 44, 'F', 0),
(3, 'SEN-29', 46, 'F', 0),
(4, 'SEN-28', 59, 'D+', 1.95),
(4, 'SEN-29', 76, 'B+', 3.28),
(5, 'SEN-28', 71, 'B', 2.88),
(5, 'SEN-29', 55, 'D+', 1.75),
(6, 'SEN-28', 46, 'F', 0),
(6, 'SEN-29', 80, 'A', 3.6),
(7, 'SEN-30', 84, 'A', 3.92),
(7, 'SEN-31', 52, 'D', 1.6),
(8, 'SEN-30', 41, 'F', 0),
(8, 'SEN-31', 69, 'C+', 2.72),
(9, 'SEN-30', 66, 'C', 2.32),
(9, 'SEN-31', 58, 'D+', 1.9),
(10, 'SEN-30', 79, 'B+', 3.52),
(10, 'SEN-31', 58, 'D+', 1.9),
(11, 'SEN-30', 46, 'F', 0),
(11, 'SEN-31', 70, 'B', 2.8),
(12, 'SEN-30', 63, 'C', 2.24),
(12, 'SEN-31', 56, 'D+', 1.8),
(13, 'SEN-28', 82, 'A', 3.76),
(13, 'SEN-29', 68, 'C+', 2.64),
(14, 'SEN-28', 72, 'B', 2.96),
(14, 'SEN-29', 71, 'B', 2.88),
(15, 'SEN-28', 79, 'B+', 3.52),
(15, 'SEN-29', 72, 'B', 2.96),
(16, 'SEN-28', 78, 'B+', 3.44),
(16, 'SEN-29', 72, 'B', 2.96),
(17, 'SEN-28', 71, 'B', 2.88),
(17, 'SEN-29', 75, 'B+', 3.2),
(18, 'SEN-28', 65, 'C+', 2.4),
(18, 'SEN-29', 75, 'B+', 3.2),
(19, 'SEN-32', 65, 'C+', 2.4),
(19, 'SEN-33', 69, 'C+', 2.72),
(20, 'SEN-32', 68, 'C+', 2.64),
(20, 'SEN-33', 70, 'B', 2.8),
(21, 'SEN-32', 75, 'B+', 3.2),
(21, 'SEN-33', 75, 'B+', 3.2),
(22, 'SEN-32', 79, 'B+', 3.52),
(22, 'SEN-33', 76, 'B+', 3.28),
(23, 'SEN-32', 72, 'B', 2.96),
(23, 'SEN-33', 68, 'C+', 2.64),
(24, 'SEN-32', 83, 'A', 3.84),
(24, 'SEN-33', 66, 'C+', 2.48),
(25, 'SEN-30', 59, 'D+', 1.95),
(25, 'SEN-31', 71, 'B', 2.88),
(26, 'SEN-30', 74, 'B', 3.12),
(26, 'SEN-31', 66, 'C+', 2.48),
(27, 'SEN-30', 77, 'B+', 3.36),
(27, 'SEN-31', 75, 'B+', 3.2),
(28, 'SEN-30', 69, 'C+', 2.72),
(28, 'SEN-31', 75, 'B+', 3.2),
(29, 'SEN-30', 68, 'C+', 2.64),
(29, 'SEN-31', 77, 'B+', 3.36),
(30, 'SEN-30', 65, 'C+', 2.4),
(30, 'SEN-31', 78, 'B+', 3.44),
(31, 'SEN-28', 72, 'B', 2.96),
(31, 'SEN-29', 77, 'B+', 3.36),
(32, 'SEN-28', 67, 'C+', 2.56),
(32, 'SEN-29', 51, 'D', 1.55),
(33, 'SEN-28', 83, 'A', 3.84),
(33, 'SEN-29', 82, 'A', 3.76),
(34, 'SEN-28', 62, 'C', 2.16),
(34, 'SEN-29', 64, 'C', 2.32),
(35, 'SEN-28', 82, 'A', 3.76),
(35, 'SEN-29', 75, 'B+', 3.2),
(36, 'SEN-28', 70, 'B', 2.8),
(36, 'SEN-29', 71, 'B', 2.88),
(37, 'SEN-34', 100, 'A+', 4),
(37, 'SEN-35', 56, 'D+', 1.8),
(38, 'SEN-34', 65, 'C+', 2.4),
(38, 'SEN-35', 62, 'C', 2.16),
(39, 'SEN-34', 67, 'C+', 2.56),
(39, 'SEN-35', 73, 'B', 3.04),
(40, 'SEN-34', 65, 'C+', 2.4),
(40, 'SEN-35', 66, 'C+', 2.48),
(41, 'SEN-34', 72, 'B', 2.96),
(41, 'SEN-35', 75, 'B+', 3.2),
(42, 'SEN-34', 66, 'C+', 2.48),
(42, 'SEN-35', 64, 'C', 2.32),
(43, 'SEN-32', 74, 'B', 3.12),
(43, 'SEN-33', 70, 'B', 2.8),
(44, 'SEN-32', 64, 'C', 2.32),
(44, 'SEN-33', 67, 'C+', 2.56),
(45, 'SEN-32', 77, 'B+', 3.36),
(45, 'SEN-33', 72, 'B', 2.96),
(46, 'SEN-32', 59, 'D+', 1.95),
(46, 'SEN-33', 70, 'B', 2.8),
(47, 'SEN-32', 71, 'B', 2.88),
(47, 'SEN-33', 68, 'C+', 2.64),
(48, 'SEN-32', 72, 'B', 2.96),
(48, 'SEN-33', 67, 'C+', 2.56),
(49, 'SEN-30', 69, 'C+', 2.72),
(49, 'SEN-31', 68, 'C+', 2.64),
(50, 'SEN-30', 70, 'B', 2.8),
(50, 'SEN-31', 66, 'C+', 2.48),
(51, 'SEN-30', 68, 'C+', 2.64),
(51, 'SEN-31', 74, 'B', 3.12),
(52, 'SEN-30', 74, 'B', 3.12),
(52, 'SEN-31', 64, 'C', 2.32),
(53, 'SEN-30', 64, 'C', 2.32),
(53, 'SEN-31', 74, 'B', 3.12),
(54, 'SEN-30', 75, 'B+', 3.2),
(54, 'SEN-31', 73, 'B', 3.04),
(55, 'SEN-28', 67, 'C+', 2.56),
(55, 'SEN-29', 68, 'C+', 2.64),
(56, 'SEN-28', 70, 'B', 2.8),
(56, 'SEN-29', 69, 'C+', 2.72),
(57, 'SEN-28', 77, 'B+', 3.36),
(57, 'SEN-29', 76, 'B+', 3.28),
(58, 'SEN-28', 73, 'B', 3.04),
(58, 'SEN-29', 71, 'B', 2.88),
(323, 'SEN-28', 73, 'B', 3.04),
(323, 'SEN-29', 72, 'B', 2.96),
(331, 'SEN-28', 67, 'C+', 2.56),
(331, 'SEN-29', 81, 'A', 3.68);

-- --------------------------------------------------------

--
-- Table structure for table `semesterobetranscriptclos`
--

CREATE TABLE `semesterobetranscriptclos` (
  `semtranscriptCode` int(11) NOT NULL,
  `cloCode` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `cloStatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesterobetranscriptclos`
--

INSERT INTO `semesterobetranscriptclos` (`semtranscriptCode`, `cloCode`, `percentage`, `cloStatus`) VALUES
(1, 1, 79.24, 'Pass'),
(1, 2, 71.15, 'Pass'),
(1, 3, 64.28, 'Pass'),
(1, 4, 75.6, 'Pass'),
(2, 1, 60.37, 'Pass'),
(2, 2, 34.61, 'Fail'),
(2, 3, 58.92, 'Pass'),
(2, 4, 80.48, 'Pass'),
(3, 1, 37.73, 'Fail'),
(3, 2, 51.92, 'Pass'),
(3, 3, 57.14, 'Pass'),
(3, 4, 26.82, 'Fail'),
(4, 1, 94.33, 'Pass'),
(4, 2, 24.56, 'Fail'),
(4, 3, 84.44, 'Pass'),
(4, 4, 70, 'Pass'),
(5, 1, 79.24, 'Pass'),
(5, 2, 63.15, 'Pass'),
(5, 3, 57.77, 'Pass'),
(5, 4, 50, 'Pass'),
(6, 1, 56.6, 'Pass'),
(6, 2, 36.84, 'Fail'),
(6, 3, 64.44, 'Pass'),
(6, 4, 90, 'Pass'),
(7, 5, 75.51, 'Pass'),
(7, 6, 87.5, 'Pass'),
(7, 7, 56.66, 'Pass'),
(7, 8, 44.44, 'Fail'),
(8, 5, 34.69, 'Pass'),
(8, 6, 44.64, 'Fail'),
(8, 7, 75, 'Pass'),
(8, 8, 62.22, 'Pass'),
(9, 5, 71.42, 'Pass'),
(9, 6, 60.71, 'Pass'),
(9, 7, 60, 'Pass'),
(9, 8, 51.11, 'Pass'),
(10, 5, 88, 'Pass'),
(10, 6, 80.32, 'Pass'),
(10, 7, 77.14, 'Pass'),
(10, 8, 36.53, 'Fail'),
(11, 5, 60, 'Pass'),
(11, 6, 34.42, 'Fail'),
(11, 7, 62.85, 'Pass'),
(11, 8, 78.84, 'Pass'),
(12, 5, 44, 'Fail'),
(12, 6, 72.13, 'Pass'),
(12, 7, 54.28, 'Pass'),
(12, 8, 65.38, 'Pass'),
(13, 15, 77.08, 'Pass'),
(13, 16, 62.85, 'Pass'),
(13, 17, 78.57, 'Pass'),
(13, 18, 86.79, 'Pass'),
(14, 15, 75, 'Pass'),
(14, 16, 74.28, 'Pass'),
(14, 17, 71.42, 'Pass'),
(14, 18, 75.47, 'Pass'),
(15, 15, 75, 'Pass'),
(15, 16, 88.57, 'Pass'),
(15, 17, 85.71, 'Pass'),
(15, 18, 83.01, 'Pass'),
(16, 15, 80.88, 'Pass'),
(16, 16, 52.17, 'Pass'),
(16, 17, 82.5, 'Pass'),
(16, 18, 75, 'Pass'),
(17, 15, 77.94, 'Pass'),
(17, 16, 56.52, 'Pass'),
(17, 17, 65, 'Pass'),
(17, 18, 75, 'Pass'),
(18, 15, 89.7, 'Pass'),
(18, 16, 56.52, 'Pass'),
(18, 17, 77.5, 'Pass'),
(18, 18, 54.54, 'Pass'),
(19, 9, 59.52, 'Pass'),
(19, 10, 66.66, 'Pass'),
(19, 11, 71.66, 'Pass'),
(19, 12, 64.44, 'Pass'),
(20, 9, 76.19, 'Pass'),
(20, 10, 56.25, 'Pass'),
(20, 11, 68.33, 'Pass'),
(20, 12, 73.33, 'Pass'),
(21, 9, 83.33, 'Pass'),
(21, 10, 68.75, 'Pass'),
(21, 11, 83.33, 'Pass'),
(21, 12, 62.22, 'Pass'),
(22, 9, 75.71, 'Pass'),
(22, 10, 80, 'Pass'),
(22, 11, 75, 'Pass'),
(22, 12, 72.94, 'Pass'),
(23, 9, 72.85, 'Pass'),
(23, 10, 71.42, 'Pass'),
(23, 11, 45, 'Fail'),
(23, 12, 74.11, 'Pass'),
(24, 9, 84.28, 'Pass'),
(24, 10, 77.14, 'Pass'),
(24, 11, 85, 'Pass'),
(24, 12, 62.35, 'Pass'),
(25, 23, 66.15, 'Pass'),
(25, 24, 45, 'Fail'),
(25, 25, 45, 'Fail'),
(25, 26, 84.61, 'Pass'),
(26, 23, 80, 'Pass'),
(26, 24, 60, 'Pass'),
(26, 25, 60, 'Pass'),
(26, 26, 67.69, 'Pass'),
(27, 23, 76.92, 'Pass'),
(27, 24, 77.5, 'Pass'),
(27, 25, 60, 'Pass'),
(27, 26, 83.07, 'Pass'),
(28, 23, 68, 'Pass'),
(28, 24, 67.27, 'Pass'),
(28, 25, 60, 'Pass'),
(28, 26, 81.42, 'Pass'),
(29, 23, 62, 'Pass'),
(29, 24, 70.9, 'Pass'),
(29, 25, 60, 'Pass'),
(29, 26, 84.28, 'Pass'),
(30, 23, 66, 'Pass'),
(30, 24, 63.63, 'Pass'),
(30, 25, 60, 'Pass'),
(30, 26, 87.14, 'Pass'),
(31, 19, 74, 'Pass'),
(31, 20, 69.09, 'Pass'),
(31, 21, 80, 'Pass'),
(31, 22, 67.27, 'Pass'),
(32, 19, 66, 'Pass'),
(32, 20, 67.27, 'Pass'),
(32, 21, 66, 'Pass'),
(32, 22, 40, 'Fail'),
(33, 19, 82, 'Pass'),
(33, 20, 81.81, 'Pass'),
(33, 21, 82, 'Pass'),
(33, 22, 78.18, 'Pass'),
(34, 19, 72, 'Pass'),
(34, 20, 52.72, 'Pass'),
(34, 21, 57.77, 'Pass'),
(34, 22, 70, 'Pass'),
(35, 19, 86, 'Pass'),
(35, 20, 76.36, 'Pass'),
(35, 21, 66.66, 'Pass'),
(35, 22, 76.66, 'Pass'),
(36, 19, 72, 'Pass'),
(36, 20, 67.27, 'Pass'),
(36, 21, 71.11, 'Pass'),
(36, 22, 71.66, 'Pass'),
(37, 13, 100, 'Pass'),
(37, 14, 100, 'Pass'),
(37, 27, 42.22, 'Fail'),
(37, 28, 60, 'Pass'),
(38, 13, 45.45, 'Fail'),
(38, 14, 80, 'Pass'),
(38, 27, 62.5, 'Pass'),
(38, 28, 63.07, 'Pass'),
(39, 13, 69.09, 'Pass'),
(39, 14, 65, 'Pass'),
(39, 27, 62.5, 'Pass'),
(39, 28, 76.92, 'Pass'),
(40, 13, 56, 'Pass'),
(40, 14, 70.9, 'Pass'),
(40, 27, 61.81, 'Pass'),
(40, 28, 70, 'Pass'),
(41, 13, 70, 'Pass'),
(41, 14, 72.72, 'Pass'),
(41, 27, 69.09, 'Pass'),
(41, 28, 76, 'Pass'),
(42, 13, 64, 'Pass'),
(42, 14, 69.09, 'Pass'),
(42, 27, 61.81, 'Pass'),
(42, 28, 66, 'Pass'),
(43, 29, 100, 'Pass'),
(43, 30, 100, 'Pass'),
(43, 31, 73.33, 'Pass'),
(43, 32, 65, 'Pass'),
(44, 29, 80, 'Pass'),
(44, 30, 93.84, 'Pass'),
(44, 31, 60, 'Pass'),
(44, 32, 70, 'Pass'),
(45, 29, 87.5, 'Pass'),
(45, 30, 92.3, 'Pass'),
(45, 31, 62.22, 'Pass'),
(45, 32, 78.33, 'Pass'),
(46, 29, 66, 'Pass'),
(46, 30, 50.9, 'Pass'),
(46, 31, 68, 'Pass'),
(46, 32, 69.09, 'Pass'),
(47, 29, 70, 'Pass'),
(47, 30, 72.72, 'Pass'),
(47, 31, 72, 'Pass'),
(47, 32, 63.63, 'Pass'),
(48, 29, 64, 'Pass'),
(48, 30, 76.36, 'Pass'),
(48, 31, 64, 'Pass'),
(48, 32, 70.9, 'Pass'),
(49, 33, 60, 'Pass'),
(49, 34, 75, 'Pass'),
(49, 35, 58.18, 'Pass'),
(49, 36, 74, 'Pass'),
(50, 33, 66.66, 'Pass'),
(50, 34, 68.33, 'Pass'),
(50, 35, 69.09, 'Pass'),
(50, 36, 62, 'Pass'),
(51, 33, 60, 'Pass'),
(51, 34, 75, 'Pass'),
(51, 35, 61.81, 'Pass'),
(51, 36, 88, 'Pass'),
(52, 33, 66.66, 'Pass'),
(52, 34, 76.66, 'Pass'),
(52, 35, 56.92, 'Pass'),
(52, 36, 70, 'Pass'),
(53, 33, 53.33, 'Pass'),
(53, 34, 70, 'Pass'),
(53, 35, 76.92, 'Pass'),
(53, 36, 67.5, 'Pass'),
(54, 33, 62.22, 'Pass'),
(54, 34, 86.66, 'Pass'),
(54, 35, 72.3, 'Pass'),
(54, 36, 72.5, 'Pass'),
(55, 37, 62.22, 'Pass'),
(55, 38, 71.66, 'Pass'),
(55, 39, 78.33, 'Pass'),
(55, 40, 48.88, 'Fail'),
(56, 37, 77.77, 'Pass'),
(56, 38, 65, 'Pass'),
(56, 39, 78.33, 'Pass'),
(56, 40, 55.55, 'Pass'),
(57, 37, 64.44, 'Pass'),
(57, 38, 81.66, 'Pass'),
(57, 39, 71.66, 'Pass'),
(57, 40, 84.44, 'Pass'),
(58, 37, 75.38, 'Pass'),
(58, 38, 60, 'Pass'),
(58, 39, 77.14, 'Pass'),
(58, 40, 62.85, 'Pass'),
(323, 37, 72.3, 'Pass'),
(323, 38, 65, 'Pass'),
(323, 39, 71.42, 'Pass'),
(323, 40, 71.42, 'Pass'),
(331, 37, 86.15, 'Pass'),
(331, 38, 70, 'Pass'),
(331, 39, 67.14, 'Pass'),
(331, 40, 65.71, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `semesterobetranscriptplos`
--

CREATE TABLE `semesterobetranscriptplos` (
  `semtranscriptCode` int(11) NOT NULL,
  `ploCode` int(11) NOT NULL,
  `percentage` float DEFAULT NULL,
  `ploStatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesterobetranscriptplos`
--

INSERT INTO `semesterobetranscriptplos` (`semtranscriptCode`, `ploCode`, `percentage`, `ploStatus`) VALUES
(1, 1, 79, 'Pass'),
(1, 2, 71, 'Pass'),
(1, 3, 64, 'Pass'),
(1, 4, 76, 'Pass'),
(1, 5, 79, 'Pass'),
(1, 6, 71, 'Pass'),
(1, 7, 64, 'Pass'),
(1, 8, 76, 'Pass'),
(2, 1, 60, 'Pass'),
(2, 2, 35, 'Fail'),
(2, 3, 59, 'Pass'),
(2, 4, 80, 'Pass'),
(2, 5, 60, 'Pass'),
(2, 6, 35, 'Fail'),
(2, 7, 59, 'Pass'),
(2, 8, 80, 'Pass'),
(3, 1, 38, 'Fail'),
(3, 2, 52, 'Pass'),
(3, 3, 57, 'Pass'),
(3, 4, 27, 'Fail'),
(3, 5, 38, 'Fail'),
(3, 6, 52, 'Pass'),
(3, 7, 57, 'Pass'),
(3, 8, 27, 'Fail'),
(4, 1, 94, 'Pass'),
(4, 2, 25, 'Fail'),
(4, 3, 84, 'Pass'),
(4, 4, 70, 'Pass'),
(4, 5, 94, 'Pass'),
(4, 6, 25, 'Fail'),
(4, 7, 84, 'Pass'),
(4, 8, 70, 'Pass'),
(5, 1, 79, 'Pass'),
(5, 2, 63, 'Pass'),
(5, 3, 58, 'Pass'),
(5, 4, 50, 'Fail'),
(5, 5, 79, 'Pass'),
(5, 6, 63, 'Pass'),
(5, 7, 58, 'Pass'),
(5, 8, 50, 'Fail'),
(6, 1, 57, 'Pass'),
(6, 2, 37, 'Fail'),
(6, 3, 64, 'Pass'),
(6, 4, 90, 'Pass'),
(6, 5, 57, 'Pass'),
(6, 6, 37, 'Fail'),
(6, 7, 64, 'Pass'),
(6, 8, 90, 'Pass'),
(7, 1, 77, 'Pass'),
(7, 2, 79, 'Pass'),
(7, 3, 64, 'Pass'),
(7, 4, 76, 'Pass'),
(7, 5, 62, 'Pass'),
(7, 6, 71, 'Pass'),
(7, 7, 64, 'Pass'),
(7, 8, 76, 'Pass'),
(7, 10, 57, 'Pass'),
(8, 1, 48, 'Fail'),
(8, 2, 40, 'Fail'),
(8, 3, 59, 'Pass'),
(8, 4, 80, 'Pass'),
(8, 5, 61, 'Pass'),
(8, 6, 35, 'Fail'),
(8, 7, 59, 'Pass'),
(8, 8, 80, 'Pass'),
(8, 10, 75, 'Pass'),
(9, 1, 55, 'Pass'),
(9, 2, 56, 'Pass'),
(9, 3, 57, 'Pass'),
(9, 4, 27, 'Fail'),
(9, 5, 44, 'Fail'),
(9, 6, 52, 'Pass'),
(9, 7, 57, 'Pass'),
(9, 8, 27, 'Fail'),
(9, 10, 60, 'Pass'),
(10, 1, 91, 'Pass'),
(10, 2, 52, 'Pass'),
(10, 3, 84, 'Pass'),
(10, 4, 70, 'Pass'),
(10, 5, 65, 'Pass'),
(10, 6, 25, 'Fail'),
(10, 7, 84, 'Pass'),
(10, 8, 70, 'Pass'),
(10, 10, 77, 'Pass'),
(11, 1, 70, 'Pass'),
(11, 2, 49, 'Fail'),
(11, 3, 58, 'Pass'),
(11, 4, 50, 'Fail'),
(11, 5, 79, 'Pass'),
(11, 6, 63, 'Pass'),
(11, 7, 58, 'Pass'),
(11, 8, 50, 'Fail'),
(11, 10, 63, 'Pass'),
(12, 1, 50, 'Fail'),
(12, 2, 54, 'Pass'),
(12, 3, 64, 'Pass'),
(12, 4, 90, 'Pass'),
(12, 5, 61, 'Pass'),
(12, 6, 37, 'Fail'),
(12, 7, 64, 'Pass'),
(12, 8, 90, 'Pass'),
(12, 10, 54, 'Pass'),
(13, 1, 77, 'Pass'),
(13, 3, 63, 'Pass'),
(13, 5, 79, 'Pass'),
(13, 7, 87, 'Pass'),
(14, 1, 75, 'Pass'),
(14, 3, 74, 'Pass'),
(14, 5, 71, 'Pass'),
(14, 7, 75, 'Pass'),
(15, 1, 75, 'Pass'),
(15, 3, 89, 'Pass'),
(15, 5, 86, 'Pass'),
(15, 7, 83, 'Pass'),
(16, 1, 81, 'Pass'),
(16, 3, 52, 'Pass'),
(16, 5, 82, 'Pass'),
(16, 7, 75, 'Pass'),
(17, 1, 78, 'Pass'),
(17, 3, 57, 'Pass'),
(17, 5, 65, 'Pass'),
(17, 7, 75, 'Pass'),
(18, 1, 90, 'Pass'),
(18, 3, 57, 'Pass'),
(18, 5, 78, 'Pass'),
(18, 7, 55, 'Pass'),
(19, 1, 77, 'Pass'),
(19, 2, 77, 'Pass'),
(19, 3, 64, 'Pass'),
(19, 4, 76, 'Pass'),
(19, 5, 65, 'Pass'),
(19, 6, 68, 'Pass'),
(19, 7, 64, 'Pass'),
(19, 8, 76, 'Pass'),
(19, 10, 61, 'Pass'),
(20, 1, 48, 'Fail'),
(20, 2, 49, 'Fail'),
(20, 3, 59, 'Pass'),
(20, 4, 80, 'Pass'),
(20, 5, 64, 'Pass'),
(20, 6, 54, 'Pass'),
(20, 7, 59, 'Pass'),
(20, 8, 80, 'Pass'),
(20, 10, 74, 'Pass'),
(21, 1, 55, 'Pass'),
(21, 2, 65, 'Pass'),
(21, 3, 57, 'Pass'),
(21, 4, 27, 'Fail'),
(21, 5, 57, 'Pass'),
(21, 6, 57, 'Pass'),
(21, 7, 57, 'Pass'),
(21, 8, 27, 'Fail'),
(21, 10, 61, 'Pass'),
(22, 1, 91, 'Pass'),
(22, 2, 60, 'Pass'),
(22, 3, 84, 'Pass'),
(22, 4, 70, 'Pass'),
(22, 5, 69, 'Pass'),
(22, 6, 49, 'Fail'),
(22, 7, 84, 'Pass'),
(22, 8, 70, 'Pass'),
(22, 10, 75, 'Pass'),
(23, 1, 70, 'Pass'),
(23, 2, 48, 'Fail'),
(23, 3, 58, 'Pass'),
(23, 4, 50, 'Fail'),
(23, 5, 68, 'Pass'),
(23, 6, 69, 'Pass'),
(23, 7, 58, 'Pass'),
(23, 8, 50, 'Fail'),
(23, 10, 68, 'Pass'),
(24, 1, 50, 'Fail'),
(24, 2, 65, 'Pass'),
(24, 3, 64, 'Pass'),
(24, 4, 90, 'Pass'),
(24, 5, 69, 'Pass'),
(24, 6, 50, 'Fail'),
(24, 7, 64, 'Pass'),
(24, 8, 90, 'Pass'),
(24, 10, 58, 'Pass'),
(25, 1, 81, 'Pass'),
(25, 3, 63, 'Pass'),
(25, 4, 66, 'Pass'),
(25, 5, 79, 'Pass'),
(25, 7, 66, 'Pass'),
(25, 8, 65, 'Pass'),
(25, 9, 45, 'Fail'),
(25, 10, 45, 'Fail'),
(25, 11, 66, 'Pass'),
(26, 1, 71, 'Pass'),
(26, 3, 74, 'Pass'),
(26, 4, 80, 'Pass'),
(26, 5, 71, 'Pass'),
(26, 7, 68, 'Pass'),
(26, 8, 64, 'Pass'),
(26, 9, 60, 'Pass'),
(26, 10, 60, 'Pass'),
(26, 11, 80, 'Pass'),
(27, 1, 79, 'Pass'),
(27, 3, 89, 'Pass'),
(27, 4, 77, 'Pass'),
(27, 5, 86, 'Pass'),
(27, 7, 80, 'Pass'),
(27, 8, 72, 'Pass'),
(27, 9, 60, 'Pass'),
(27, 10, 78, 'Pass'),
(27, 11, 77, 'Pass'),
(28, 1, 81, 'Pass'),
(28, 3, 52, 'Pass'),
(28, 4, 68, 'Pass'),
(28, 5, 82, 'Pass'),
(28, 7, 71, 'Pass'),
(28, 8, 71, 'Pass'),
(28, 9, 60, 'Pass'),
(28, 10, 67, 'Pass'),
(28, 11, 68, 'Pass'),
(29, 1, 81, 'Pass'),
(29, 3, 57, 'Pass'),
(29, 4, 62, 'Pass'),
(29, 5, 65, 'Pass'),
(29, 7, 73, 'Pass'),
(29, 8, 72, 'Pass'),
(29, 9, 60, 'Pass'),
(29, 10, 71, 'Pass'),
(29, 11, 62, 'Pass'),
(30, 1, 88, 'Pass'),
(30, 3, 57, 'Pass'),
(30, 4, 66, 'Pass'),
(30, 5, 78, 'Pass'),
(30, 7, 59, 'Pass'),
(30, 8, 74, 'Pass'),
(30, 9, 60, 'Pass'),
(30, 10, 64, 'Pass'),
(30, 11, 66, 'Pass'),
(31, 1, 77, 'Pass'),
(31, 2, 69, 'Pass'),
(31, 3, 74, 'Pass'),
(31, 4, 67, 'Pass'),
(31, 11, 67, 'Pass'),
(32, 1, 66, 'Pass'),
(32, 2, 67, 'Pass'),
(32, 3, 66, 'Pass'),
(32, 4, 40, 'Fail'),
(32, 11, 40, 'Fail'),
(33, 1, 82, 'Pass'),
(33, 2, 82, 'Pass'),
(33, 3, 82, 'Pass'),
(33, 4, 78, 'Pass'),
(33, 11, 78, 'Pass'),
(34, 1, 65, 'Pass'),
(34, 2, 53, 'Pass'),
(34, 3, 61, 'Pass'),
(34, 4, 70, 'Pass'),
(34, 11, 70, 'Pass'),
(35, 1, 76, 'Pass'),
(35, 2, 76, 'Pass'),
(35, 3, 76, 'Pass'),
(35, 4, 77, 'Pass'),
(35, 11, 77, 'Pass'),
(36, 1, 72, 'Pass'),
(36, 2, 67, 'Pass'),
(36, 3, 70, 'Pass'),
(36, 4, 72, 'Pass'),
(36, 11, 72, 'Pass'),
(37, 1, 64, 'Pass'),
(37, 2, 77, 'Pass'),
(37, 3, 64, 'Pass'),
(37, 4, 76, 'Pass'),
(37, 5, 74, 'Pass'),
(37, 6, 68, 'Pass'),
(37, 7, 82, 'Pass'),
(37, 8, 69, 'Pass'),
(37, 10, 61, 'Pass'),
(37, 11, 100, 'Pass'),
(38, 1, 55, 'Pass'),
(38, 2, 49, 'Fail'),
(38, 3, 59, 'Pass'),
(38, 4, 80, 'Pass'),
(38, 5, 68, 'Pass'),
(38, 6, 54, 'Pass'),
(38, 7, 52, 'Pass'),
(38, 8, 72, 'Pass'),
(38, 10, 74, 'Pass'),
(38, 11, 45, 'Fail'),
(39, 1, 62, 'Pass'),
(39, 2, 65, 'Pass'),
(39, 3, 57, 'Pass'),
(39, 4, 27, 'Fail'),
(39, 5, 59, 'Pass'),
(39, 6, 57, 'Pass'),
(39, 7, 63, 'Pass'),
(39, 8, 58, 'Pass'),
(39, 10, 61, 'Pass'),
(39, 11, 69, 'Pass'),
(40, 1, 79, 'Pass'),
(40, 2, 60, 'Pass'),
(40, 3, 84, 'Pass'),
(40, 4, 70, 'Pass'),
(40, 5, 69, 'Pass'),
(40, 6, 49, 'Fail'),
(40, 7, 70, 'Pass'),
(40, 8, 68, 'Pass'),
(40, 10, 75, 'Pass'),
(40, 11, 56, 'Pass'),
(41, 1, 71, 'Pass'),
(41, 2, 48, 'Fail'),
(41, 3, 58, 'Pass'),
(41, 4, 50, 'Fail'),
(41, 5, 69, 'Pass'),
(41, 6, 69, 'Pass'),
(41, 7, 64, 'Pass'),
(41, 8, 67, 'Pass'),
(41, 10, 68, 'Pass'),
(41, 11, 70, 'Pass'),
(42, 1, 57, 'Pass'),
(42, 2, 65, 'Pass'),
(42, 3, 64, 'Pass'),
(42, 4, 90, 'Pass'),
(42, 5, 69, 'Pass'),
(42, 6, 50, 'Fail'),
(42, 7, 64, 'Pass'),
(42, 8, 72, 'Pass'),
(42, 10, 58, 'Pass'),
(42, 11, 64, 'Pass'),
(43, 1, 83, 'Pass'),
(43, 3, 63, 'Pass'),
(43, 4, 66, 'Pass'),
(43, 5, 79, 'Pass'),
(43, 7, 66, 'Pass'),
(43, 8, 82, 'Pass'),
(43, 9, 59, 'Pass'),
(43, 10, 55, 'Pass'),
(43, 11, 66, 'Pass'),
(44, 1, 74, 'Pass'),
(44, 3, 74, 'Pass'),
(44, 4, 80, 'Pass'),
(44, 5, 71, 'Pass'),
(44, 7, 68, 'Pass'),
(44, 8, 75, 'Pass'),
(44, 9, 60, 'Pass'),
(44, 10, 65, 'Pass'),
(44, 11, 80, 'Pass'),
(45, 1, 80, 'Pass'),
(45, 3, 89, 'Pass'),
(45, 4, 77, 'Pass'),
(45, 5, 86, 'Pass'),
(45, 7, 80, 'Pass'),
(45, 8, 81, 'Pass'),
(45, 9, 61, 'Pass'),
(45, 10, 78, 'Pass'),
(45, 11, 77, 'Pass'),
(46, 1, 69, 'Pass'),
(46, 3, 52, 'Pass'),
(46, 4, 68, 'Pass'),
(46, 5, 82, 'Pass'),
(46, 7, 71, 'Pass'),
(46, 8, 65, 'Pass'),
(46, 9, 64, 'Pass'),
(46, 10, 68, 'Pass'),
(46, 11, 68, 'Pass'),
(47, 1, 73, 'Pass'),
(47, 3, 57, 'Pass'),
(47, 4, 62, 'Pass'),
(47, 5, 65, 'Pass'),
(47, 7, 73, 'Pass'),
(47, 8, 72, 'Pass'),
(47, 9, 66, 'Pass'),
(47, 10, 67, 'Pass'),
(47, 11, 62, 'Pass'),
(48, 1, 75, 'Pass'),
(48, 3, 57, 'Pass'),
(48, 4, 66, 'Pass'),
(48, 5, 78, 'Pass'),
(48, 7, 59, 'Pass'),
(48, 8, 72, 'Pass'),
(48, 9, 62, 'Pass'),
(48, 10, 67, 'Pass'),
(48, 11, 66, 'Pass'),
(49, 1, 77, 'Pass'),
(49, 2, 67, 'Pass'),
(49, 3, 74, 'Pass'),
(49, 4, 67, 'Pass'),
(49, 10, 68, 'Pass'),
(49, 11, 66, 'Pass'),
(50, 1, 66, 'Pass'),
(50, 2, 67, 'Pass'),
(50, 3, 66, 'Pass'),
(50, 4, 40, 'Fail'),
(50, 10, 67, 'Pass'),
(50, 11, 57, 'Pass'),
(51, 1, 82, 'Pass'),
(51, 2, 73, 'Pass'),
(51, 3, 82, 'Pass'),
(51, 4, 78, 'Pass'),
(51, 10, 68, 'Pass'),
(51, 11, 76, 'Pass'),
(52, 1, 65, 'Pass'),
(52, 2, 65, 'Pass'),
(52, 3, 61, 'Pass'),
(52, 4, 70, 'Pass'),
(52, 10, 72, 'Pass'),
(52, 11, 66, 'Pass'),
(53, 1, 76, 'Pass'),
(53, 2, 69, 'Pass'),
(53, 3, 76, 'Pass'),
(53, 4, 77, 'Pass'),
(53, 10, 62, 'Pass'),
(53, 11, 74, 'Pass'),
(54, 1, 72, 'Pass'),
(54, 2, 72, 'Pass'),
(54, 3, 70, 'Pass'),
(54, 4, 72, 'Pass'),
(54, 10, 74, 'Pass'),
(54, 11, 72, 'Pass'),
(58, 3, 68, 'Pass'),
(58, 4, 67, 'Pass'),
(58, 9, 63, 'Pass'),
(58, 10, 77, 'Pass'),
(58, 11, 75, 'Pass'),
(55, 3, 67, 'Pass'),
(55, 4, 66, 'Pass'),
(55, 9, 49, 'Fail'),
(55, 10, 78, 'Pass'),
(55, 11, 62, 'Pass'),
(56, 3, 71, 'Pass'),
(56, 4, 66, 'Pass'),
(56, 9, 56, 'Pass'),
(56, 10, 78, 'Pass'),
(56, 11, 78, 'Pass'),
(57, 3, 73, 'Pass'),
(57, 4, 79, 'Pass'),
(57, 9, 84, 'Pass'),
(57, 10, 72, 'Pass'),
(57, 11, 64, 'Pass'),
(323, 3, 69, 'Pass'),
(323, 4, 69, 'Pass'),
(323, 9, 71, 'Pass'),
(323, 10, 71, 'Pass'),
(323, 11, 72, 'Pass'),
(331, 3, 78, 'Pass'),
(331, 4, 68, 'Pass'),
(331, 9, 66, 'Pass'),
(331, 10, 67, 'Pass'),
(331, 11, 86, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `semestertranscript`
--

CREATE TABLE `semestertranscript` (
  `semtranscriptCode` int(11) NOT NULL,
  `studentRegCode` varchar(30) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `approvalStatus` tinyint(1) NOT NULL,
  `sgpa` float DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `seasonCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestertranscript`
--

INSERT INTO `semestertranscript` (`semtranscriptCode`, `studentRegCode`, `semesterCode`, `approvalStatus`, `sgpa`, `cgpa`, `seasonCode`) VALUES
(1, 'FUI/FURC-SP-15-BCSE-001', 1, 1, 3.04, 3.04, 1),
(2, 'FUI/FURC-SP-15-BCSE-002', 1, 1, 1.36, 1.36, 1),
(3, 'FUI/FURC-SP-15-BCSE-003', 1, 1, 0, 0, 1),
(4, 'FUI/FURC-SP-15-BCSE-004', 1, 1, 2.62, 2.62, 1),
(5, 'FUI/FURC-SP-15-BCSE-005', 1, 1, 2.32, 2.32, 1),
(6, 'FUI/FURC-SP-15-BCSE-006', 1, 1, 1.8, 1.8, 1),
(7, 'FUI/FURC-SP-15-BCSE-001', 2, 1, 2.76, 2.9, 2),
(8, 'FUI/FURC-SP-15-BCSE-002', 2, 1, 1.36, 1.36, 2),
(9, 'FUI/FURC-SP-15-BCSE-003', 2, 1, 2.11, 2.11, 2),
(10, 'FUI/FURC-SP-15-BCSE-004', 2, 1, 2.71, 2.67, 2),
(11, 'FUI/FURC-SP-15-BCSE-005', 2, 1, 1.4, 1.86, 2),
(12, 'FUI/FURC-SP-15-BCSE-006', 2, 1, 2.02, 1.94, 2),
(13, 'FUI/FURC-F-15-BCSE-001', 3, 1, 3.2, 3.2, 2),
(14, 'FUI/FURC-F-15-BCSE-002', 3, 1, 2.92, 2.92, 2),
(15, 'FUI/FURC-F-15-BCSE-003', 3, 1, 3.24, 3.24, 2),
(16, 'FUI/FURC-F-15-BCSE-004', 3, 1, 3.2, 3.2, 2),
(17, 'FUI/FURC-F-15-BCSE-005', 3, 1, 3.04, 3.03, 2),
(18, 'FUI/FURC-F-15-BCSE-006', 3, 1, 2.8, 2.8, 2),
(19, 'FUI/FURC-SP-15-BCSE-001', 4, 1, 2.56, 2.89, 3),
(20, 'FUI/FURC-SP-15-BCSE-002', 4, 1, 2.72, 1.36, 3),
(21, 'FUI/FURC-SP-15-BCSE-003', 4, 1, 3.2, 1.05, 3),
(22, 'FUI/FURC-SP-15-BCSE-004', 4, 1, 3.4, 2.66, 3),
(23, 'FUI/FURC-SP-15-BCSE-005', 4, 1, 2.8, 1.85, 3),
(24, 'FUI/FURC-SP-15-BCSE-006', 4, 1, 3.16, 1.9, 3),
(25, 'FUI/FURC-F-15-BCSE-001', 5, 1, 2.42, 2.81, 3),
(26, 'FUI/FURC-F-15-BCSE-002', 5, 0, 2.8, 2.86, 3),
(27, 'FUI/FURC-F-15-BCSE-003', 5, 1, 3.28, 3.25, 3),
(28, 'FUI/FURC-F-15-BCSE-004', 5, 1, 2.96, 3.08, 3),
(29, 'FUI/FURC-F-15-BCSE-005', 5, 1, 3, 3.01, 3),
(30, 'FUI/FURC-F-15-BCSE-006', 5, 1, 2.92, 2.86, 3),
(31, 'FUI/FURC-SP-16-BCSE-001', 6, 1, 3.16, 3.16, 3),
(32, 'FUI/FURC-SP-16-BCSE-002', 6, 1, 2.05, 2.05, 3),
(33, 'FUI/FURC-SP-16-BCSE-003', 6, 1, 3.8, 3.8, 3),
(34, 'FUI/FURC-SP-16-BCSE-004', 6, 1, 2.24, 2.24, 3),
(35, 'FUI/FURC-SP-16-BCSE-005', 6, 1, 3.48, 3.48, 3),
(36, 'FUI/FURC-SP-16-BCSE-006', 6, 1, 2.84, 2.84, 3),
(37, 'FUI/FURC-SP-15-BCSE-001', 7, 1, 2.9, 2.81, 4),
(38, 'FUI/FURC-SP-15-BCSE-002', 7, 0, 2.28, 1.93, 4),
(39, 'FUI/FURC-SP-15-BCSE-003', 7, 1, 2.8, 2.02, 4),
(40, 'FUI/FURC-SP-15-BCSE-004', 7, 1, 2.44, 2.79, 4),
(41, 'FUI/FURC-SP-15-BCSE-005', 7, 1, 3.08, 2.39, 4),
(42, 'FUI/FURC-SP-15-BCSE-006', 7, 1, 2.4, 2.34, 4),
(43, 'FUI/FURC-F-15-BCSE-001', 8, 1, 2.96, 2.86, 4),
(44, 'FUI/FURC-F-15-BCSE-002', 8, 1, 2.44, 2.72, 4),
(45, 'FUI/FURC-F-15-BCSE-003', 8, 1, 3.16, 3.22, 4),
(46, 'FUI/FURC-F-15-BCSE-004', 8, 1, 2.38, 2.84, 4),
(47, 'FUI/FURC-F-15-BCSE-005', 8, 1, 2.76, 2.93, 4),
(48, 'FUI/FURC-F-15-BCSE-006', 8, 1, 2.76, 2.82, 4),
(49, 'FUI/FURC-SP-16-BCSE-001', 9, 1, 2.68, 2.92, 4),
(50, 'FUI/FURC-SP-16-BCSE-002', 9, 1, 2.64, 2.34, 4),
(51, 'FUI/FURC-SP-16-BCSE-003', 9, 1, 2.88, 3.34, 4),
(52, 'FUI/FURC-SP-16-BCSE-004', 9, 1, 2.72, 2.48, 4),
(53, 'FUI/FURC-SP-16-BCSE-005', 9, 1, 2.72, 3.1, 4),
(54, 'FUI/FURC-SP-16-BCSE-006', 9, 1, 3.12, 2.97, 4),
(55, 'FUI/FURC-F-16-BCSE-001', 10, 0, 2.6, 2.59, 4),
(56, 'FUI/FURC-F-16-BCSE-002', 10, 1, 2.76, 2.75, 4),
(57, 'FUI/FURC-F-16-BCSE-003', 10, 1, 3.32, 3.31, 4),
(58, 'FUI/FURC-F-16-BCSE-004', 10, 1, 2.96, 2.96, 4),
(323, 'FUI/FURC-F-16-BCSE-005', 10, 1, 3, 3, 4),
(331, 'FUI/FURC-F-16-BCSE-006', 10, 1, 3.12, 3.11, 4);

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
('FUI/FURC-F-15-BCSE-001', 68, 'Sania Mirza', 'Mirza', '0311-7284787', 'sania2@hotmail.com', 'sania2@hotmail.com', 'B+', 'Tench bhatta Rwp', '1998-03-10', '123456789', 'FA15-BCSE-001'),
('FUI/FURC-F-15-BCSE-002', 68, 'Nimra Maheen', 'Ali', '0333-1519345', 'nimramaheen@hotmail.com', 'nimramaheen@hotmail.com', 'A+', 'Lalkurti', '1997-05-22', '123456789', 'FA15-BCSE-002'),
('FUI/FURC-F-15-BCSE-003', 68, 'Safia', 'Umar Ali', '0361-4242097', 'safia@hotmail.com', 'safia@hotmail.com', 'B+', 'Tench bhatta Rwp', '1997-04-23', '123456789', 'FA15-BCSE-003'),
('FUI/FURC-F-15-BCSE-004', 69, 'Inzamam', 'Raza Ali', '0311-7119078', 'inzamam@hotmail.com', 'inzamam@hotmail.com', 'A+', 'Lalkurti', '1997-08-19', '123456789', 'FA15-BCSE-004'),
('FUI/FURC-F-15-BCSE-005', 69, 'Ehtasham', 'Liaqat ', '0321-1964787', 'ehtasham@hotmail.com', 'ehtasham@hotmail.com', 'B+', 'Tench bhatta Rwp', '1998-03-10', '123456789', 'FA15-BCSE-005'),
('FUI/FURC-F-15-BCSE-006', 69, 'Hasnain', 'Saqib', '0321-1104345', 'hasnain@hotmail.com', 'hasnain@hotmail.com', 'A+', 'Lalkurti', '1997-05-22', '123456789', 'FA15-BCSE-006'),
('FUI/FURC-F-16-BCSE-001', 42, 'Saadullah Khan', 'Bhatti', '0303-7145878', 'saad09@hotmail.com', 'saad09@hotmail.com', 'A+', 'Lalkurti', '1997-08-19', '123456789', 'FA16-BCSE-001'),
('FUI/FURC-F-16-BCSE-002', 42, 'Zaib un Nisa', 'Mustafvi', '0303-7135478', 'zaibunnisa@hotmail.com', 'zaibunnisa@hotmail.com', 'A+', 'Tench bhatta Rwp', '1997-08-19', '123456789', 'FA16-BCSE-002'),
('FUI/FURC-F-16-BCSE-003', 42, 'Shafiq Ahmed', 'Mehmoob Ali', '0303-3435878', 'shafiq9@hotmail.com', 'shafiq9@hotmail.com', 'A+', 'Tench bhatta Rwp', '1997-08-19', '123456789', 'FA16-BCSE-003'),
('FUI/FURC-F-16-BCSE-004', 43, 'Hassan Ali', 'Rashid', '0303-7197878', 'hassanali@hotmail.com', 'hassanali@hotmail.com', 'A+', 'Tench bhatta Rwp', '1997-08-19', '123456789', 'FA16-BCSE-004'),
('FUI/FURC-F-16-BCSE-005', 43, 'Maleeha ', 'Rashid Ali', '0303-7135018', 'maleeha@hotmail.com', 'maleeha@hotmail.com', 'A+', 'Lalkurti', '1997-08-19', '123456789', 'FA16-BCSE-005'),
('FUI/FURC-F-16-BCSE-006', 43, 'Hafsa', 'Muhammad Tahir', '0303-7101178', 'hafsa@hotmail.com', 'hafsa@hotmail.com', 'A+', 'Lalkurti', '1997-08-19', '123456789', 'FA16-BCSE-006'),
('FUI/FURC-SP-15-BCSE-001', 82, 'Yumna', 'Zulfiqar ', '0331-0217109', 'yumna@hotmail.com', 'yumna@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-001'),
('FUI/FURC-SP-15-BCSE-002', 82, 'Haleema', 'Khan', '0332-0217209', 'haleema@hotmail.com', 'haleema@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-002'),
('FUI/FURC-SP-15-BCSE-003', 82, 'Zainab', 'Ahmed Khan ', '0336-0217309', 'zainab@hotmail.com', 'zainab@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-003'),
('FUI/FURC-SP-15-BCSE-004', 83, 'Mehwish', 'Mirza', '0338-0217509', 'mehwish@hotmail.com', 'mehwish@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-004'),
('FUI/FURC-SP-15-BCSE-005', 83, 'Javed', 'Ali', '0339-0217609', 'javed@hotmail.com', 'javed@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-005'),
('FUI/FURC-SP-15-BCSE-006', 83, 'Kumail', 'Ali', '0334-0217709', 'kumail@hotmail.com', 'kumail@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP15-BCSE-006'),
('FUI/FURC-SP-16-BCSE-001', 54, 'Tania Khan', 'Riaz Khan', '0341-4591464', 'taniakhan@hotmail.com', 'taniakhan@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-001'),
('FUI/FURC-SP-16-BCSE-002', 54, 'Mohsin Khan', 'Jameel Khan', '0342-4051464', 'mohsinkhan@hotmail.com', 'mohsinkhan@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-002'),
('FUI/FURC-SP-16-BCSE-003', 54, 'Usmania Liaqat', 'Liaqat Bhatti', '0343-4501464', 'usmanialiaqat@hotmail.com', 'usmanialiaqat@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-003'),
('FUI/FURC-SP-16-BCSE-004', 55, 'Awais Ali', 'Naseer Ali', '0344-4559243', 'awaisali@hotmail.com', 'awaisali@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-004'),
('FUI/FURC-SP-16-BCSE-005', 55, 'Javad Khan', 'Liaqat Khan', '0345-1451464', 'javadkhan7@hotmail.com', 'javadkhan7@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-005'),
('FUI/FURC-SP-16-BCSE-006', 55, 'Faiza Alyan', 'Alyan Tariq', '0346-4278449', 'faizaalyan@hotmail.com', 'faizaalyan@hotmail.com', 'B+', 'Lalkurti', '1996-02-09', '123456789', 'SP16-BCSE-006');

-- --------------------------------------------------------

--
-- Table structure for table `studentaffairs`
--

CREATE TABLE `studentaffairs` (
  `facultyCode` varchar(30) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentaffairs`
--

INSERT INTO `studentaffairs` (`facultyCode`, `officialEmail`, `password`) VALUES
('FUI-FURC-059', 'studentaffairs@fui.edu.pk', '123456789');

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
('FUI/FURC-SP-15-BCSE-001', 88),
('FUI/FURC-SP-15-BCSE-002', 88),
('FUI/FURC-SP-15-BCSE-003', 88),
('FUI/FURC-SP-15-BCSE-004', 89),
('FUI/FURC-SP-15-BCSE-005', 89),
('FUI/FURC-SP-15-BCSE-006', 89),
('FUI/FURC-SP-15-BCSE-001', 86),
('FUI/FURC-SP-15-BCSE-002', 86),
('FUI/FURC-SP-15-BCSE-003', 86),
('FUI/FURC-SP-15-BCSE-004', 87),
('FUI/FURC-SP-15-BCSE-005', 87),
('FUI/FURC-SP-15-BCSE-006', 87),
('FUI/FURC-F-15-BCSE-001', 72),
('FUI/FURC-F-15-BCSE-002', 72),
('FUI/FURC-F-15-BCSE-003', 72),
('FUI/FURC-F-15-BCSE-004', 73),
('FUI/FURC-F-15-BCSE-005', 73),
('FUI/FURC-F-15-BCSE-006', 73),
('FUI/FURC-SP-15-BCSE-001', 84),
('FUI/FURC-SP-15-BCSE-002', 84),
('FUI/FURC-SP-15-BCSE-003', 84),
('FUI/FURC-SP-15-BCSE-004', 85),
('FUI/FURC-SP-15-BCSE-005', 85),
('FUI/FURC-SP-15-BCSE-006', 85),
('FUI/FURC-F-15-BCSE-001', 70),
('FUI/FURC-F-15-BCSE-002', 70),
('FUI/FURC-F-15-BCSE-003', 70),
('FUI/FURC-F-15-BCSE-004', 71),
('FUI/FURC-F-15-BCSE-005', 71),
('FUI/FURC-F-15-BCSE-006', 71),
('FUI/FURC-SP-16-BCSE-001', 56),
('FUI/FURC-SP-16-BCSE-002', 56),
('FUI/FURC-SP-16-BCSE-003', 56),
('FUI/FURC-SP-16-BCSE-004', 57),
('FUI/FURC-SP-16-BCSE-005', 57),
('FUI/FURC-SP-16-BCSE-006', 57);

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopicclo`
--

CREATE TABLE `weeklytopicclo` (
  `weeklyTopicCode` int(11) NOT NULL,
  `CLOCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopics`
--

CREATE TABLE `weeklytopics` (
  `weeklyTopicCode` int(11) NOT NULL,
  `courseProfileCode` int(11) NOT NULL,
  `topicDetail` varchar(500) NOT NULL,
  `assessmentCriteria` varchar(150) NOT NULL,
  `weeklyNo` varchar(30) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`PLOCode`,`CLOCode`),
  ADD KEY `CLOtoPLOMapping_clo_CLOCode_fk` (`CLOCode`),
  ADD KEY `CLOtoPLOMapping_plo_PLOCode_fk` (`PLOCode`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `Course_program_programCode_fk` (`programCode`),
  ADD KEY `course_curriculum_curriculumCode_fk` (`curriculumCode`);

--
-- Indexes for table `courseadvisor`
--
ALTER TABLE `courseadvisor`
  ADD PRIMARY KEY (`facultyCode`,`sectionCode`),
  ADD KEY `courseadvisor_section_sectionCode_fk` (`sectionCode`);

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
  ADD KEY `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` (`courseProfileCode`),
  ADD KEY `courseprofileinstructordetail_faculty_facultyCode_fk` (`facultyCode`);

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
-- Indexes for table `examhead`
--
ALTER TABLE `examhead`
  ADD UNIQUE KEY `examHead_officialEmail_uindex` (`officialEmail`),
  ADD KEY `examhead_faculty_facultyCode_fk` (`facultyCode`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyCode`),
  ADD UNIQUE KEY `Faculty_CNIC_uindex` (`CNIC`),
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
-- Indexes for table `gradingmodel`
--
ALTER TABLE `gradingmodel`
  ADD PRIMARY KEY (`percentage`);

--
-- Indexes for table `headofdepartment`
--
ALTER TABLE `headofdepartment`
  ADD PRIMARY KEY (`facultyCode`,`departmentCode`),
  ADD KEY `headofdepartment_department_departmentCode_fk` (`departmentCode`);

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
  ADD KEY `Program_department_departmentCode_fk` (`departmentCode`);

--
-- Indexes for table `programcurriculum`
--
ALTER TABLE `programcurriculum`
  ADD PRIMARY KEY (`programCode`,`curriculumCode`),
  ADD KEY `programCurriculum_curriculum_curriculumCode_fk` (`curriculumCode`);

--
-- Indexes for table `programmanager`
--
ALTER TABLE `programmanager`
  ADD UNIQUE KEY `programManager_pk` (`facultyCode`,`programCode`),
  ADD UNIQUE KEY `programManager_officialEmail_uindex` (`officialEmail`),
  ADD KEY `programManager_program_programCode_fk` (`programCode`);

--
-- Indexes for table `programtranscript`
--
ALTER TABLE `programtranscript`
  ADD PRIMARY KEY (`programtranscriptCode`),
  ADD KEY `programTranscript_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `programtranscriptplos`
--
ALTER TABLE `programtranscriptplos`
  ADD KEY `transcriptPLOs_plo_PLOCode_fk` (`ploCode`),
  ADD KEY `transcriptPLOs_programtranscript_transcriptCode_fk` (`programtranscriptCode`);

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
-- Indexes for table `semestergpatranscriptcourses`
--
ALTER TABLE `semestergpatranscriptcourses`
  ADD PRIMARY KEY (`semtranscriptCode`,`courseCode`),
  ADD KEY `semgpatranscriptcourses_semtranscript_semtranscriptCode_fk` (`semtranscriptCode`),
  ADD KEY `transcriptCourses_course_courseCode_fk` (`courseCode`);

--
-- Indexes for table `semesterobetranscriptclos`
--
ALTER TABLE `semesterobetranscriptclos`
  ADD PRIMARY KEY (`semtranscriptCode`,`cloCode`),
  ADD KEY `semesterobetranscriptclos_clo_CLOCode_fk` (`cloCode`),
  ADD KEY `semrobetranscriptclos_semtranscript_semtranscriptCode_fk` (`semtranscriptCode`);

--
-- Indexes for table `semesterobetranscriptplos`
--
ALTER TABLE `semesterobetranscriptplos`
  ADD KEY `semesterobetranscriptplos_plo_PLOCode_fk` (`ploCode`),
  ADD KEY `semobetranscriptplos_semtranscript_semtranscriptCode_fk` (`semtranscriptCode`);

--
-- Indexes for table `semestertranscript`
--
ALTER TABLE `semestertranscript`
  ADD PRIMARY KEY (`semtranscriptCode`),
  ADD KEY `semesterTranscript_semester_semesterCode_fk` (`semesterCode`),
  ADD KEY `semesterTranscript_student_studentRegCode_fk` (`studentRegCode`),
  ADD KEY `semestertranscript_season_seasonCode_fk` (`seasonCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentRegCode`),
  ADD UNIQUE KEY `Student_officialEmail_uindex` (`officialEmail`),
  ADD UNIQUE KEY `Student_personalEmail_uindex` (`personalEmail`),
  ADD KEY `student_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `studentaffairs`
--
ALTER TABLE `studentaffairs`
  ADD PRIMARY KEY (`facultyCode`);

--
-- Indexes for table `studentsectionhistory`
--
ALTER TABLE `studentsectionhistory`
  ADD KEY `studentSectionHistory_section_sectionCode_fk` (`sectionCode`),
  ADD KEY `studentSectionHistory_student_studentRegCode_fk` (`studentRegCode`);

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
  MODIFY `assessmentCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
  MODIFY `questionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `clo`
--
ALTER TABLE `clo`
  MODIFY `CLOCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `courseallocation`
--
ALTER TABLE `courseallocation`
  MODIFY `allocationCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1209;

--
-- AUTO_INCREMENT for table `courseoffering`
--
ALTER TABLE `courseoffering`
  MODIFY `offeringCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `courseprofile`
--
ALTER TABLE `courseprofile`
  MODIFY `courseProfileCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `courseRegistrationCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
  MODIFY `facultyAllocationsCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gradingmodel`
--
ALTER TABLE `gradingmodel`
  MODIFY `percentage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `PLOCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programtranscript`
--
ALTER TABLE `programtranscript`
  MODIFY `programtranscriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=618;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `seasonCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=919;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `semestertranscript`
--
ALTER TABLE `semestertranscript`
  MODIFY `semtranscriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

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
  ADD CONSTRAINT `AssessmentStudentMarks_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assessmentstudentmarks_assessment_assessmentCode_fk` FOREIGN KEY (`assessmentCode`) REFERENCES `assessment` (`assessmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `Course_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseadvisor`
--
ALTER TABLE `courseadvisor`
  ADD CONSTRAINT `courseadvisor_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseadvisor_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseprofileinstructordetail_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD CONSTRAINT `courseRegistration_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseRegistration_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseRegistration_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `examhead`
--
ALTER TABLE `examhead`
  ADD CONSTRAINT `examhead_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `headofdepartment`
--
ALTER TABLE `headofdepartment`
  ADD CONSTRAINT `headOfDepartment_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `headofdepartment_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `Program_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programcurriculum`
--
ALTER TABLE `programcurriculum`
  ADD CONSTRAINT `programCurriculum_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `programCurriculum_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programmanager`
--
ALTER TABLE `programmanager`
  ADD CONSTRAINT `programManager_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `programManager_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programtranscript`
--
ALTER TABLE `programtranscript`
  ADD CONSTRAINT `programTranscript_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programtranscriptplos`
--
ALTER TABLE `programtranscriptplos`
  ADD CONSTRAINT `programtranscriptplos_programtranscript_programtranscriptCode_fk` FOREIGN KEY (`programtranscriptCode`) REFERENCES `programtranscript` (`programtranscriptCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transcriptPLOs_plo_PLOCode_fk` FOREIGN KEY (`ploCode`) REFERENCES `plo` (`PLOCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `semester_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semestergpatranscriptcourses`
--
ALTER TABLE `semestergpatranscriptcourses`
  ADD CONSTRAINT `semgpatranscriptcourses_semtranscript_semtranscriptCode_fk` FOREIGN KEY (`semtranscriptCode`) REFERENCES `semestertranscript` (`semtranscriptCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transcriptCourses_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semesterobetranscriptclos`
--
ALTER TABLE `semesterobetranscriptclos`
  ADD CONSTRAINT `semesterobetranscriptclos_clo_CLOCode_fk` FOREIGN KEY (`cloCode`) REFERENCES `clo` (`CLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semrobetranscriptclos_semtranscript_semtranscriptCode_fk` FOREIGN KEY (`semtranscriptCode`) REFERENCES `semestertranscript` (`semtranscriptCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semesterobetranscriptplos`
--
ALTER TABLE `semesterobetranscriptplos`
  ADD CONSTRAINT `semesterobetranscriptplos_plo_PLOCode_fk` FOREIGN KEY (`ploCode`) REFERENCES `plo` (`PLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semobetranscriptplos_semtranscript_semtranscriptCode_fk` FOREIGN KEY (`semtranscriptCode`) REFERENCES `semestertranscript` (`semtranscriptCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semestertranscript`
--
ALTER TABLE `semestertranscript`
  ADD CONSTRAINT `semesterTranscript_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semesterTranscript_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semestertranscript_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentaffairs`
--
ALTER TABLE `studentaffairs`
  ADD CONSTRAINT `studentaffairs_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentsectionhistory`
--
ALTER TABLE `studentsectionhistory`
  ADD CONSTRAINT `studentSectionHistory_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentSectionHistory_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
