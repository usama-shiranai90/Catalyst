-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 11:51 PM
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
(183, 82, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 10, 5, 2, 'Hello'),
(184, 82, 'SEN-34', 'Sessional', 'Quiz', 'Welcome', 10, 5, 2, 'Hello'),
(185, 83, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 10, 10, 2, 'Hello'),
(186, 82, 'SEN-34', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(187, 82, 'SEN-34', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(188, 82, 'SEN-34', 'Sessional', 'Project', 'Hello', 10, 10, 2, 'Firebase'),
(189, 83, 'SEN-34', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(190, 83, 'SEN-34', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(191, 83, 'SEN-34', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Pointers'),
(192, 83, 'SEN-34', 'Sessional', 'Project', 'Welcome', 10, 10, 2, 'Modelling'),
(193, 82, 'SEN-35', 'FinalExam', '', 'Hash Maps', 50, 50, 2, 'Final Exam'),
(194, 82, 'SEN-35', 'Midterm', '', 'Welcome', 25, 25, 2, 'Mid Term'),
(195, 82, 'SEN-35', 'Sessional', 'Project', 'semester project', 10, 10, 2, 'Firebase'),
(196, 82, 'SEN-35', 'Sessional', 'Quiz', 'Assignment 1', 10, 5, 2, 'Pointers'),
(197, 82, 'SEN-35', 'Sessional', 'Assignment', 'Exercise 1', 10, 10, 2, 'Modelling'),
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
(263, 82, 'SEN-34', 'Sessional', 'Assignment', 'Welcome', 10, 5, 2, 'Hello');

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
(349, 183, 13, 'Fill in the blanks ', 5),
(350, 183, 14, 'Fill in the blanks ', 5),
(351, 184, 13, 'Fill in the blanks', 5),
(352, 184, 14, 'Fill in the blanks', 5),
(353, 185, 13, 'Fill in the blanks', 5),
(354, 185, 14, 'Fill in the blanks', 5),
(355, 186, 13, 'Fill in the blanks', 20),
(356, 186, 14, 'Choose the correct answer', 30),
(357, 187, 14, 'Fill in the blanks ', 10),
(358, 187, 13, 'Choose the correct answer', 15),
(359, 188, 13, 'Write a java code for Audio Media Player?', 5),
(360, 188, 14, 'fill in the blanks', 5),
(361, 189, 14, 'Fill in the blanks', 25),
(362, 189, 13, 'Choose the correct answer', 25),
(363, 190, 13, 'Fill in the blanks ', 10),
(364, 190, 14, 'Answer these', 15),
(365, 191, 13, 'fill in the blanks', 5),
(366, 191, 14, 'fill in the blanks', 5),
(367, 192, 14, 'Write code for firebase authentication?', 5),
(368, 192, 13, 'fill in the blanks', 5),
(369, 193, 27, 'Fill in the blanks', 10),
(370, 193, 28, 'Choose the correct answer', 40),
(371, 194, 27, 'Fill in the blanks ', 15),
(372, 194, 28, 'Answer these', 10),
(373, 195, 27, 'Write a java code for Audio Media Player?', 5),
(374, 195, 28, 'fill in the blanks', 5),
(375, 196, 27, 'Write code for firebase authentication?', 5),
(376, 196, 28, 'fill in the blanks', 5),
(377, 197, 27, 'fill in the blanks', 5),
(378, 197, 28, 'fill in the blanks', 5),
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
(509, 263, 13, 'Fill in the blanks', 5),
(510, 263, 14, 'Fill in the blanks', 5);

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
('FUI/FURC-SP-15-BCSE-001', 351, 5),
('FUI/FURC-SP-15-BCSE-001', 352, 3),
('FUI/FURC-SP-15-BCSE-002', 351, 0),
('FUI/FURC-SP-15-BCSE-002', 352, 5),
('FUI/FURC-SP-15-BCSE-003', 351, 5),
('FUI/FURC-SP-15-BCSE-003', 352, 5),
('FUI/FURC-SP-15-BCSE-004', 353, 5),
('FUI/FURC-SP-15-BCSE-004', 354, 3),
('FUI/FURC-SP-15-BCSE-005', 353, 5),
('FUI/FURC-SP-15-BCSE-005', 354, 5),
('FUI/FURC-SP-15-BCSE-006', 353, 5),
('FUI/FURC-SP-15-BCSE-006', 354, 2),
('FUI/FURC-SP-15-BCSE-001', 355, 15),
('FUI/FURC-SP-15-BCSE-001', 356, 25),
('FUI/FURC-SP-15-BCSE-002', 355, 10),
('FUI/FURC-SP-15-BCSE-002', 356, 20),
('FUI/FURC-SP-15-BCSE-003', 355, 18),
('FUI/FURC-SP-15-BCSE-003', 356, 16),
('FUI/FURC-SP-15-BCSE-001', 357, 5),
('FUI/FURC-SP-15-BCSE-001', 358, 14),
('FUI/FURC-SP-15-BCSE-002', 357, 9),
('FUI/FURC-SP-15-BCSE-002', 358, 10),
('FUI/FURC-SP-15-BCSE-003', 357, 5),
('FUI/FURC-SP-15-BCSE-003', 358, 12),
('FUI/FURC-SP-15-BCSE-001', 359, 4),
('FUI/FURC-SP-15-BCSE-001', 360, 3),
('FUI/FURC-SP-15-BCSE-002', 359, 2),
('FUI/FURC-SP-15-BCSE-002', 360, 5),
('FUI/FURC-SP-15-BCSE-003', 359, 1),
('FUI/FURC-SP-15-BCSE-003', 360, 4),
('FUI/FURC-SP-15-BCSE-004', 361, 20),
('FUI/FURC-SP-15-BCSE-004', 362, 14),
('FUI/FURC-SP-15-BCSE-005', 361, 22),
('FUI/FURC-SP-15-BCSE-005', 362, 19),
('FUI/FURC-SP-15-BCSE-006', 361, 20),
('FUI/FURC-SP-15-BCSE-006', 362, 8),
('FUI/FURC-SP-15-BCSE-004', 363, 4),
('FUI/FURC-SP-15-BCSE-004', 364, 11),
('FUI/FURC-SP-15-BCSE-005', 363, 5),
('FUI/FURC-SP-15-BCSE-005', 364, 9),
('FUI/FURC-SP-15-BCSE-006', 363, 9),
('FUI/FURC-SP-15-BCSE-006', 364, 12),
('FUI/FURC-SP-15-BCSE-004', 365, 1),
('FUI/FURC-SP-15-BCSE-004', 366, 3),
('FUI/FURC-SP-15-BCSE-005', 365, 5),
('FUI/FURC-SP-15-BCSE-005', 366, 1),
('FUI/FURC-SP-15-BCSE-006', 365, 5),
('FUI/FURC-SP-15-BCSE-006', 366, 4),
('FUI/FURC-SP-15-BCSE-004', 367, 2),
('FUI/FURC-SP-15-BCSE-004', 368, 4),
('FUI/FURC-SP-15-BCSE-005', 367, 3),
('FUI/FURC-SP-15-BCSE-005', 368, 1),
('FUI/FURC-SP-15-BCSE-006', 367, 0),
('FUI/FURC-SP-15-BCSE-006', 368, 5),
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
('FUI/FURC-SP-15-BCSE-001', 377, 4),
('FUI/FURC-SP-15-BCSE-001', 378, 3),
('FUI/FURC-SP-15-BCSE-002', 377, 0),
('FUI/FURC-SP-15-BCSE-002', 378, 5),
('FUI/FURC-SP-15-BCSE-003', 377, 1),
('FUI/FURC-SP-15-BCSE-003', 378, 5),
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
('FUI/FURC-SP-15-BCSE-001', 509, 5),
('FUI/FURC-SP-15-BCSE-001', 510, 4),
('FUI/FURC-SP-15-BCSE-002', 509, 0),
('FUI/FURC-SP-15-BCSE-002', 510, 4),
('FUI/FURC-SP-15-BCSE-003', 509, 1),
('FUI/FURC-SP-15-BCSE-003', 510, 5),
('FUI/FURC-SP-15-BCSE-001', 349, 2),
('FUI/FURC-SP-15-BCSE-001', 350, 4),
('FUI/FURC-SP-15-BCSE-002', 349, 3),
('FUI/FURC-SP-15-BCSE-002', 350, 5),
('FUI/FURC-SP-15-BCSE-003', 349, 1),
('FUI/FURC-SP-15-BCSE-003', 350, 4);

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
('FUI/FURC-SP-15-BCSE-001', 184, 8),
('FUI/FURC-SP-15-BCSE-002', 184, 5),
('FUI/FURC-SP-15-BCSE-003', 184, 10),
('FUI/FURC-SP-15-BCSE-004', 185, 8),
('FUI/FURC-SP-15-BCSE-005', 185, 10),
('FUI/FURC-SP-15-BCSE-006', 185, 7),
('FUI/FURC-SP-15-BCSE-001', 186, 40),
('FUI/FURC-SP-15-BCSE-002', 186, 30),
('FUI/FURC-SP-15-BCSE-003', 186, 34),
('FUI/FURC-SP-15-BCSE-001', 187, 19),
('FUI/FURC-SP-15-BCSE-002', 187, 19),
('FUI/FURC-SP-15-BCSE-003', 187, 17),
('FUI/FURC-SP-15-BCSE-001', 188, 7),
('FUI/FURC-SP-15-BCSE-002', 188, 7),
('FUI/FURC-SP-15-BCSE-003', 188, 5),
('FUI/FURC-SP-15-BCSE-004', 189, 34),
('FUI/FURC-SP-15-BCSE-005', 189, 41),
('FUI/FURC-SP-15-BCSE-006', 189, 28),
('FUI/FURC-SP-15-BCSE-004', 190, 15),
('FUI/FURC-SP-15-BCSE-005', 190, 14),
('FUI/FURC-SP-15-BCSE-006', 190, 21),
('FUI/FURC-SP-15-BCSE-004', 191, 4),
('FUI/FURC-SP-15-BCSE-005', 191, 6),
('FUI/FURC-SP-15-BCSE-006', 191, 9),
('FUI/FURC-SP-15-BCSE-004', 192, 6),
('FUI/FURC-SP-15-BCSE-005', 192, 4),
('FUI/FURC-SP-15-BCSE-006', 192, 5),
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
('FUI/FURC-SP-15-BCSE-001', 197, 7),
('FUI/FURC-SP-15-BCSE-002', 197, 5),
('FUI/FURC-SP-15-BCSE-003', 197, 6),
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
('FUI/FURC-SP-15-BCSE-001', 263, 9),
('FUI/FURC-SP-15-BCSE-002', 263, 4),
('FUI/FURC-SP-15-BCSE-003', 263, 6),
('FUI/FURC-SP-15-BCSE-001', 183, 6),
('FUI/FURC-SP-15-BCSE-002', 183, 8),
('FUI/FURC-SP-15-BCSE-003', 183, 5);

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
(4, 1, 1, 2016, 4, 'FA16', '2016-09-01');

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
('SEN-34', 1, 'Algorithm Analysis', 3),
('SEN-35', 1, 'Digital Image Processing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `courseadvisor`
--

CREATE TABLE `courseadvisor` (
  `facultyCode` varchar(30) NOT NULL,
  `batchCode` int(11) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `coordinatingUnit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseprofile`
--

INSERT INTO `courseprofile` (`courseProfileCode`, `courseCode`, `programCode`, `batchCode`, `courseTitle`, `creditHours`, `preReq`, `programName`, `programLevel`, `courseEffective`, `teachingMethodology`, `courseModel`, `recommendedBooks`, `referenceBooks`, `courseDescription`, `otherReferences`, `semester`, `coordinatingUnit`) VALUES
(1, 'SEN-28', 1, 1, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(2, 'SEN-29', 1, 1, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(3, 'SEN-30', 1, 1, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(4, 'SEN-31', 1, 1, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(5, 'SEN-28', 1, 2, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(6, 'SEN-29', 1, 2, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(7, 'SEN-32', 1, 1, 'Data Structures', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC'),
(8, 'SEN-33', 1, 1, 'Discrete Mathematics', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC'),
(9, 'SEN-30', 1, 2, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(10, 'SEN-31', 1, 2, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(11, 'SEN-28', 1, 3, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(12, 'SEN-29', 1, 3, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(13, 'SEN-34', 1, 1, 'Algorithm Analysis', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 4, 'ABC'),
(14, 'SEN-35', 1, 1, 'Digital Image Processing', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 4, 'ABC'),
(15, 'SEN-32', 1, 2, 'Data Structures', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC'),
(16, 'SEN-33', 1, 2, 'Discrete Mathematics', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 3, 'ABC'),
(17, 'SEN-30', 1, 3, 'Artificial Intelligence', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(18, 'SEN-31', 1, 3, 'Programming Fundamentals', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 2, 'ABC'),
(19, 'SEN-28', 1, 4, 'Kotlin', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC'),
(20, 'SEN-29', 1, 4, 'Android', 3, 'Object Oriented Programming', 'BCSE', 'Undergraduate', 'Batch 2000', 'ABc', 'XYZ', 'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2', 1, 'ABC');

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
(1, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(2, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(3, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(4, 'Dr. Shariq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(5, 'Dr. Ishitaq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(6, 'Dr. M. Ahmed Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(7, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(8, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(9, 'Dr. Shariq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(10, 'Dr. Ishitaq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(11, 'Dr. Ishitaq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(12, 'Dr. M. Ahmed Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(13, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(14, 'M. Aqeel Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(15, 'Dr. Shariq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(16, 'Dr. Ishitaq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(17, 'Dr. Ishitaq', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(18, 'Dr. M. Ahmed Iqbal', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(19, 'Dr. M. Asif', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com'),
(20, 'Dr. M. Asif', 'Professor', 'PHD', 'Discrete Mathematics', '0321-4587469', 'maqeeliqbal12@gmail.com');

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
-- Table structure for table `examhead`
--

CREATE TABLE `examhead` (
  `examHeadCode` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `CNIC` varchar(20) DEFAULT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `picture` blob DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('FUI-FURC-057', 'Dr. Shariq', '37401-5859968-6', 'shariq@fui.edu.pk', 'shariq@fui.edu.pk', 'Somewhere on earth', '0312-4653456', 0xefbbbf, 'Assistant Professor', 'Head of Department', '123456789', 1, 1, '123456789', 'hodse@fui.edu.pk'),
('FUI-FURC-058', 'Dr. Ishitaq', '37401-5859968-7', 'drishtiaq@fui.edu.pk', 'drishtiaq@fui.edu.pk', 'Somewhere on earth', '0312-4589645', 0xefbbbf, 'Assistant Professor', 'Program Manager', '123456789', 1, 1, '123456789', 'pmse@fui.edu.pk'),
('FUI-FURC-059', 'Dr. M. Ahmed Iqbal', '37401-5859968-8', 'ahmedIqbal@fui.edu.pk', 'ahmedIqbal@fui.edu.pk', 'Somewhere on earth', '0312-5453413', 0xefbbbf, 'Assistant Professor', NULL, '123456789', 1, 0, NULL, NULL),
('FUI-FURC-060', 'Dr. M. Asif', '37401-5859968-9', 'asif@fui.edu.pk', 'asif@fui.edu.pk', 'Somewhere on earth', '0312-5453412', 0xefbbbf, 'Assistant Professor', NULL, '123456789', 1, 0, NULL, NULL),
('FUI-FURC-061', 'Dr. M. Arsalan', '37401-5859968-1', 'arsalan@fui.edu.pk', 'ahmedIqbaarsalanl@fui.edu.pk', 'Somewhere on earth', '0312-5464533', 0xefbbbf, 'Assistant Professor', NULL, '123456789', 1, 0, NULL, NULL);

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
('FUI-FURC-056', 1, '2015-02-16', 1, 88, 1),
('FUI-FURC-056', 2, '2015-02-16', 1, 88, 2),
('FUI-FURC-057', 1, '2015-02-16', 1, 89, 3),
('FUI-FURC-057', 2, '2015-02-16', 1, 89, 4),
('FUI-FURC-056', 3, '2015-10-06', 2, 86, 7),
('FUI-FURC-057', 4, '2015-10-06', 2, 86, 8),
('FUI-FURC-057', 4, '2015-10-06', 2, 87, 9),
('FUI-FURC-056', 3, '2015-10-06', 2, 87, 10),
('FUI-FURC-058', 5, '2015-10-06', 2, 72, 11),
('FUI-FURC-059', 6, '2015-10-06', 2, 72, 12),
('FUI-FURC-058', 5, '2015-10-06', 2, 73, 13),
('FUI-FURC-059', 6, '2015-10-06', 2, 73, 14),
('FUI-FURC-056', 7, '2016-02-28', 3, 84, 15),
('FUI-FURC-056', 7, '2016-02-28', 3, 85, 16),
('FUI-FURC-056', 8, '2016-02-28', 3, 84, 17),
('FUI-FURC-057', 8, '2016-02-28', 3, 85, 18),
('FUI-FURC-057', 9, '2016-02-28', 3, 70, 19),
('FUI-FURC-057', 9, '2016-02-28', 3, 71, 20),
('FUI-FURC-058', 10, '2016-02-28', 3, 70, 21),
('FUI-FURC-058', 10, '2016-02-28', 3, 71, 22),
('FUI-FURC-058', 11, '2016-02-28', 3, 56, 23),
('FUI-FURC-059', 11, '2016-02-28', 3, 57, 24),
('FUI-FURC-059', 12, '2016-02-28', 3, 56, 25),
('FUI-FURC-059', 12, '2016-02-28', 3, 57, 26),
('FUI-FURC-056', 13, '2016-08-28', 4, 82, 27),
('FUI-FURC-056', 13, '2016-08-28', 4, 83, 28),
('FUI-FURC-056', 14, '2016-08-28', 4, 82, 29),
('FUI-FURC-057', 14, '2016-08-28', 4, 83, 30),
('FUI-FURC-057', 15, '2016-08-28', 4, 68, 31),
('FUI-FURC-057', 15, '2016-08-28', 4, 69, 32),
('FUI-FURC-058', 16, '2016-08-28', 4, 68, 33),
('FUI-FURC-058', 16, '2016-08-28', 4, 69, 34),
('FUI-FURC-058', 17, '2016-08-28', 4, 54, 35),
('FUI-FURC-059', 17, '2016-08-28', 4, 55, 36),
('FUI-FURC-059', 18, '2016-08-28', 4, 54, 37),
('FUI-FURC-059', 18, '2016-08-28', 4, 55, 38),
('FUI-FURC-060', 19, '2016-08-28', 4, 42, 39),
('FUI-FURC-060', 19, '2016-08-28', 4, 43, 40),
('FUI-FURC-060', 20, '2016-08-28', 4, 42, 41),
('FUI-FURC-061', 20, '2016-08-28', 4, 43, 42);

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
-- Table structure for table `programmanager`
--

CREATE TABLE `programmanager` (
  `facultyCode` varchar(30) NOT NULL,
  `programCode` int(11) NOT NULL,
  `officialEmail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'FUI/FURC-SP-15-BCSE-001', 0),
(2, 'FUI/FURC-SP-15-BCSE-002', 0),
(3, 'FUI/FURC-SP-15-BCSE-003', 0),
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
(19, 'FUI/FURC-F-16-BCSE-001', 0),
(20, 'FUI/FURC-F-16-BCSE-002', 0),
(21, 'FUI/FURC-F-16-BCSE-003', 0),
(22, 'FUI/FURC-F-16-BCSE-004', 0),
(23, 'FUI/FURC-F-16-BCSE-005', 0),
(24, 'FUI/FURC-F-16-BCSE-006', 0);

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
(1, 1, 'Pass', 100),
(1, 2, 'Pass', 100),
(1, 3, 'Pass', 100),
(1, 4, 'Pass', 100),
(1, 5, 'Pass', 75),
(1, 6, 'Pass', 100),
(1, 7, 'Pass', 100),
(1, 8, 'Pass', 100),
(1, 10, 'Pass', 100),
(1, 11, 'Pass', 100),
(2, 1, 'Pass', 100),
(2, 2, 'Fail', 33),
(2, 3, 'Pass', 100),
(2, 4, 'Pass', 100),
(2, 5, 'Pass', 100),
(2, 6, 'Fail', 50),
(2, 7, 'Fail', 50),
(2, 8, 'Pass', 100),
(2, 10, 'Pass', 100),
(2, 11, 'Fail', 0),
(3, 1, 'Pass', 75),
(3, 2, 'Pass', 100),
(3, 3, 'Pass', 100),
(3, 4, 'Fail', 0),
(3, 5, 'Pass', 75),
(3, 6, 'Pass', 100),
(3, 7, 'Pass', 100),
(3, 8, 'Pass', 75),
(3, 10, 'Pass', 100),
(3, 11, 'Pass', 100),
(4, 1, 'Pass', 100),
(4, 2, 'Pass', 66),
(4, 3, 'Pass', 100),
(4, 4, 'Pass', 100),
(4, 5, 'Pass', 75),
(4, 6, 'Fail', 50),
(4, 7, 'Pass', 100),
(4, 8, 'Pass', 100),
(4, 10, 'Pass', 100),
(4, 11, 'Pass', 100),
(5, 1, 'Pass', 100),
(5, 2, 'Fail', 33),
(5, 3, 'Pass', 100),
(5, 4, 'Pass', 100),
(5, 5, 'Pass', 75),
(5, 6, 'Pass', 100),
(5, 7, 'Pass', 100),
(5, 8, 'Pass', 100),
(5, 10, 'Pass', 100),
(5, 11, 'Pass', 100),
(6, 1, 'Pass', 75),
(6, 2, 'Pass', 66),
(6, 3, 'Pass', 100),
(6, 4, 'Pass', 100),
(6, 5, 'Pass', 100),
(6, 6, 'Fail', 50),
(6, 7, 'Pass', 100),
(6, 8, 'Pass', 100),
(6, 10, 'Pass', 100),
(6, 11, 'Pass', 100),
(7, 1, 'Pass', 100),
(7, 3, 'Pass', 100),
(7, 4, 'Pass', 100),
(7, 5, 'Pass', 100),
(7, 7, 'Fail', 50),
(7, 8, 'Pass', 75),
(7, 9, 'Fail', 50),
(7, 10, 'Fail', 50),
(7, 11, 'Pass', 100),
(8, 1, 'Pass', 100),
(8, 3, 'Pass', 100),
(8, 4, 'Pass', 100),
(8, 5, 'Pass', 100),
(8, 7, 'Pass', 100),
(8, 8, 'Pass', 100),
(8, 9, 'Pass', 100),
(8, 10, 'Pass', 100),
(8, 11, 'Pass', 100),
(9, 1, 'Pass', 100),
(9, 3, 'Pass', 100),
(9, 4, 'Pass', 100),
(9, 5, 'Pass', 100),
(9, 7, 'Pass', 100),
(9, 8, 'Pass', 100),
(9, 9, 'Pass', 100),
(9, 10, 'Pass', 100),
(9, 11, 'Pass', 100),
(10, 1, 'Pass', 100),
(10, 3, 'Pass', 100),
(10, 4, 'Pass', 100),
(10, 5, 'Pass', 100),
(10, 7, 'Pass', 100),
(10, 8, 'Pass', 100),
(10, 9, 'Pass', 100),
(10, 10, 'Pass', 100),
(10, 11, 'Pass', 100),
(11, 1, 'Pass', 100),
(11, 3, 'Pass', 100),
(11, 4, 'Pass', 100),
(11, 5, 'Pass', 100),
(11, 7, 'Pass', 100),
(11, 8, 'Pass', 100),
(11, 9, 'Pass', 100),
(11, 10, 'Pass', 100),
(11, 11, 'Pass', 100),
(12, 1, 'Pass', 100),
(12, 3, 'Pass', 100),
(12, 4, 'Pass', 100),
(12, 5, 'Pass', 100),
(12, 7, 'Pass', 100),
(12, 8, 'Pass', 100),
(12, 9, 'Pass', 100),
(12, 10, 'Pass', 100),
(12, 11, 'Pass', 100),
(13, 1, 'Pass', 100),
(13, 2, 'Pass', 100),
(13, 3, 'Pass', 100),
(13, 4, 'Pass', 100),
(13, 10, 'Pass', 100),
(13, 11, 'Pass', 100),
(14, 1, 'Pass', 100),
(14, 2, 'Pass', 100),
(14, 3, 'Pass', 100),
(14, 4, 'Fail', 0),
(14, 10, 'Pass', 100),
(14, 11, 'Pass', 66),
(15, 1, 'Pass', 100),
(15, 2, 'Pass', 100),
(15, 3, 'Pass', 100),
(15, 4, 'Pass', 100),
(15, 10, 'Pass', 100),
(15, 11, 'Pass', 100),
(16, 1, 'Pass', 100),
(16, 2, 'Pass', 100),
(16, 3, 'Pass', 100),
(16, 4, 'Pass', 100),
(16, 10, 'Pass', 100),
(16, 11, 'Pass', 100),
(17, 1, 'Pass', 100),
(17, 2, 'Pass', 100),
(17, 3, 'Pass', 100),
(17, 4, 'Pass', 100),
(17, 10, 'Pass', 100),
(17, 11, 'Pass', 100),
(18, 1, 'Pass', 100),
(18, 2, 'Pass', 100),
(18, 3, 'Pass', 100),
(18, 4, 'Pass', 100),
(18, 10, 'Pass', 100),
(18, 11, 'Pass', 100),
(19, 3, 'Pass', 100),
(19, 4, 'Pass', 66),
(19, 9, 'Fail', 0),
(19, 10, 'Pass', 100),
(19, 11, 'Pass', 100),
(20, 3, 'Pass', 100),
(20, 4, 'Pass', 100),
(20, 9, 'Pass', 100),
(20, 10, 'Pass', 100),
(20, 11, 'Pass', 100),
(21, 3, 'Pass', 100),
(21, 4, 'Pass', 100),
(21, 9, 'Pass', 100),
(21, 10, 'Pass', 100),
(21, 11, 'Pass', 100),
(22, 3, 'Pass', 100),
(22, 4, 'Pass', 100),
(22, 9, 'Pass', 100),
(22, 10, 'Pass', 100),
(22, 11, 'Pass', 100),
(23, 3, 'Pass', 100),
(23, 4, 'Pass', 100),
(23, 9, 'Pass', 100),
(23, 10, 'Pass', 100),
(23, 11, 'Pass', 100),
(24, 3, 'Pass', 100),
(24, 4, 'Pass', 100),
(24, 9, 'Pass', 100),
(24, 10, 'Pass', 100),
(24, 11, 'Pass', 100);

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
(6, 'Fall 17'),
(8, 'Fall 18'),
(10, 'Fall 19'),
(12, 'Fall 20'),
(14, 'Fall 21'),
(1, 'Spring 15'),
(3, 'Spring 16'),
(5, 'Spring 17'),
(7, 'Spring 18'),
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
(89, 1, 'B');

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
(10, 4, '1');

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
(2, 'SEN-28', 47, 'F', 0),
(3, 'SEN-28', 44, 'F', 0),
(1, 'SEN-29', 70, 'B', 2.8),
(2, 'SEN-29', 69, 'C+', 2.72),
(3, 'SEN-29', 46, 'F', 0),
(4, 'SEN-28', 59, 'D+', 1.95),
(5, 'SEN-28', 71, 'B', 2.88),
(6, 'SEN-28', 46, 'F', 0),
(4, 'SEN-29', 76, 'B+', 3.28),
(5, 'SEN-29', 55, 'D+', 1.75),
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
(37, 'SEN-34', 78, 'B+', 3.44),
(37, 'SEN-35', 63, 'C', 2.24),
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
(59, 'SEN-28', 73, 'B', 3.04),
(59, 'SEN-29', 72, 'B', 2.96),
(60, 'SEN-28', 67, 'C+', 2.56),
(60, 'SEN-29', 81, 'A', 3.68);

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
(37, 13, 81.81, 'Pass'),
(37, 14, 73.33, 'Pass'),
(37, 27, 57.49, 'Pass'),
(37, 28, 64.61, 'Pass'),
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
(59, 37, 72.3, 'Pass'),
(59, 38, 65, 'Pass'),
(59, 39, 71.42, 'Pass'),
(59, 40, 71.42, 'Pass'),
(60, 37, 86.15, 'Pass'),
(60, 38, 70, 'Pass'),
(60, 39, 67.14, 'Pass'),
(60, 40, 65.71, 'Pass');

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
(1, 1, 100, 'Pass'),
(1, 2, 100, 'Pass'),
(1, 3, 100, 'Pass'),
(1, 4, 100, 'Pass'),
(1, 5, 100, 'Pass'),
(1, 6, 100, 'Pass'),
(1, 7, 100, 'Pass'),
(1, 8, 100, 'Pass'),
(2, 1, 100, 'Pass'),
(2, 2, 0, 'Fail'),
(2, 3, 100, 'Pass'),
(2, 4, 100, 'Pass'),
(2, 5, 100, 'Pass'),
(2, 6, 0, 'Fail'),
(2, 7, 100, 'Pass'),
(2, 8, 100, 'Pass'),
(3, 1, 0, 'Fail'),
(3, 2, 100, 'Pass'),
(3, 3, 100, 'Pass'),
(3, 4, 0, 'Fail'),
(3, 5, 0, 'Fail'),
(3, 6, 100, 'Pass'),
(3, 7, 100, 'Pass'),
(3, 8, 0, 'Fail'),
(4, 1, 100, 'Pass'),
(4, 2, 0, 'Fail'),
(4, 3, 100, 'Pass'),
(4, 4, 100, 'Pass'),
(4, 5, 100, 'Pass'),
(4, 6, 0, 'Fail'),
(4, 7, 100, 'Pass'),
(4, 8, 100, 'Pass'),
(5, 1, 100, 'Pass'),
(5, 2, 100, 'Pass'),
(5, 3, 100, 'Pass'),
(5, 4, 100, 'Pass'),
(5, 5, 100, 'Pass'),
(5, 6, 100, 'Pass'),
(5, 7, 100, 'Pass'),
(5, 8, 100, 'Pass'),
(6, 1, 100, 'Pass'),
(6, 2, 0, 'Fail'),
(6, 3, 100, 'Pass'),
(6, 4, 100, 'Pass'),
(6, 5, 100, 'Pass'),
(6, 6, 0, 'Fail'),
(6, 7, 100, 'Pass'),
(6, 8, 100, 'Pass'),
(7, 1, 100, 'Pass'),
(7, 2, 100, 'Pass'),
(7, 3, 100, 'Pass'),
(7, 4, 100, 'Pass'),
(7, 5, 50, 'Fail'),
(7, 6, 100, 'Pass'),
(7, 7, 100, 'Pass'),
(7, 8, 100, 'Pass'),
(7, 10, 100, 'Pass'),
(8, 1, 100, 'Pass'),
(8, 2, 0, 'Fail'),
(8, 3, 100, 'Pass'),
(8, 4, 100, 'Pass'),
(8, 5, 100, 'Pass'),
(8, 6, 0, 'Fail'),
(8, 7, 100, 'Pass'),
(8, 8, 100, 'Pass'),
(8, 10, 100, 'Pass'),
(9, 1, 50, 'Fail'),
(9, 2, 100, 'Pass'),
(9, 3, 100, 'Pass'),
(9, 4, 0, 'Fail'),
(9, 5, 50, 'Fail'),
(9, 6, 100, 'Pass'),
(9, 7, 100, 'Pass'),
(9, 8, 0, 'Fail'),
(9, 10, 100, 'Pass'),
(10, 1, 100, 'Pass'),
(10, 2, 50, 'Fail'),
(10, 3, 100, 'Pass'),
(10, 4, 100, 'Pass'),
(10, 5, 50, 'Fail'),
(10, 6, 0, 'Fail'),
(10, 7, 100, 'Pass'),
(10, 8, 100, 'Pass'),
(10, 10, 100, 'Pass'),
(11, 1, 100, 'Pass'),
(11, 2, 50, 'Fail'),
(11, 3, 100, 'Pass'),
(11, 4, 100, 'Pass'),
(11, 5, 100, 'Pass'),
(11, 6, 100, 'Pass'),
(11, 7, 100, 'Pass'),
(11, 8, 100, 'Pass'),
(11, 10, 100, 'Pass'),
(12, 1, 50, 'Fail'),
(12, 2, 50, 'Fail'),
(12, 3, 100, 'Pass'),
(12, 4, 100, 'Pass'),
(12, 5, 100, 'Pass'),
(12, 6, 0, 'Fail'),
(12, 7, 100, 'Pass'),
(12, 8, 100, 'Pass'),
(12, 10, 100, 'Pass'),
(13, 1, 100, 'Pass'),
(13, 3, 100, 'Pass'),
(13, 5, 100, 'Pass'),
(13, 7, 100, 'Pass'),
(14, 1, 100, 'Pass'),
(14, 3, 100, 'Pass'),
(14, 5, 100, 'Pass'),
(14, 7, 100, 'Pass'),
(15, 1, 100, 'Pass'),
(15, 3, 100, 'Pass'),
(15, 5, 100, 'Pass'),
(15, 7, 100, 'Pass'),
(16, 1, 100, 'Pass'),
(16, 3, 100, 'Pass'),
(16, 5, 100, 'Pass'),
(16, 7, 100, 'Pass'),
(17, 1, 100, 'Pass'),
(17, 3, 100, 'Pass'),
(17, 5, 100, 'Pass'),
(17, 7, 100, 'Pass'),
(18, 1, 100, 'Pass'),
(18, 3, 100, 'Pass'),
(18, 5, 100, 'Pass'),
(18, 7, 100, 'Pass'),
(19, 1, 100, 'Pass'),
(19, 2, 100, 'Pass'),
(19, 3, 100, 'Pass'),
(19, 4, 100, 'Pass'),
(19, 5, 66, 'Pass'),
(19, 6, 100, 'Pass'),
(19, 7, 100, 'Pass'),
(19, 8, 100, 'Pass'),
(19, 10, 100, 'Pass'),
(20, 1, 100, 'Pass'),
(20, 2, 33, 'Fail'),
(20, 3, 100, 'Pass'),
(20, 4, 100, 'Pass'),
(20, 5, 100, 'Pass'),
(20, 6, 50, 'Fail'),
(20, 7, 100, 'Pass'),
(20, 8, 100, 'Pass'),
(20, 10, 100, 'Pass'),
(21, 1, 50, 'Fail'),
(21, 2, 100, 'Pass'),
(21, 3, 100, 'Pass'),
(21, 4, 0, 'Fail'),
(21, 5, 66, 'Pass'),
(21, 6, 100, 'Pass'),
(21, 7, 100, 'Pass'),
(21, 8, 0, 'Fail'),
(21, 10, 100, 'Pass'),
(22, 1, 100, 'Pass'),
(22, 2, 66, 'Pass'),
(22, 3, 100, 'Pass'),
(22, 4, 100, 'Pass'),
(22, 5, 66, 'Pass'),
(22, 6, 50, 'Fail'),
(22, 7, 100, 'Pass'),
(22, 8, 100, 'Pass'),
(22, 10, 100, 'Pass'),
(23, 1, 100, 'Pass'),
(23, 2, 33, 'Fail'),
(23, 3, 100, 'Pass'),
(23, 4, 100, 'Pass'),
(23, 5, 66, 'Pass'),
(23, 6, 100, 'Pass'),
(23, 7, 100, 'Pass'),
(23, 8, 100, 'Pass'),
(23, 10, 100, 'Pass'),
(24, 1, 50, 'Fail'),
(24, 2, 66, 'Pass'),
(24, 3, 100, 'Pass'),
(24, 4, 100, 'Pass'),
(24, 5, 100, 'Pass'),
(24, 6, 50, 'Fail'),
(24, 7, 100, 'Pass'),
(24, 8, 100, 'Pass'),
(24, 10, 100, 'Pass'),
(25, 1, 100, 'Pass'),
(25, 3, 100, 'Pass'),
(25, 4, 100, 'Pass'),
(25, 5, 100, 'Pass'),
(25, 7, 50, 'Fail'),
(25, 8, 50, 'Fail'),
(25, 9, 0, 'Fail'),
(25, 10, 0, 'Fail'),
(25, 11, 100, 'Pass'),
(26, 1, 100, 'Pass'),
(26, 3, 100, 'Pass'),
(26, 4, 100, 'Pass'),
(26, 5, 100, 'Pass'),
(26, 7, 100, 'Pass'),
(26, 8, 100, 'Pass'),
(26, 9, 100, 'Pass'),
(26, 10, 100, 'Pass'),
(26, 11, 100, 'Pass'),
(27, 1, 100, 'Pass'),
(27, 3, 100, 'Pass'),
(27, 4, 100, 'Pass'),
(27, 5, 100, 'Pass'),
(27, 7, 100, 'Pass'),
(27, 8, 100, 'Pass'),
(27, 9, 100, 'Pass'),
(27, 10, 100, 'Pass'),
(27, 11, 100, 'Pass'),
(28, 1, 100, 'Pass'),
(28, 3, 100, 'Pass'),
(28, 4, 100, 'Pass'),
(28, 5, 100, 'Pass'),
(28, 7, 100, 'Pass'),
(28, 8, 100, 'Pass'),
(28, 9, 100, 'Pass'),
(28, 10, 100, 'Pass'),
(28, 11, 100, 'Pass'),
(29, 1, 100, 'Pass'),
(29, 3, 100, 'Pass'),
(29, 4, 100, 'Pass'),
(29, 5, 100, 'Pass'),
(29, 7, 100, 'Pass'),
(29, 8, 100, 'Pass'),
(29, 9, 100, 'Pass'),
(29, 10, 100, 'Pass'),
(29, 11, 100, 'Pass'),
(30, 1, 100, 'Pass'),
(30, 3, 100, 'Pass'),
(30, 4, 100, 'Pass'),
(30, 5, 100, 'Pass'),
(30, 7, 100, 'Pass'),
(30, 8, 100, 'Pass'),
(30, 9, 100, 'Pass'),
(30, 10, 100, 'Pass'),
(30, 11, 100, 'Pass'),
(31, 1, 100, 'Pass'),
(31, 2, 100, 'Pass'),
(31, 3, 100, 'Pass'),
(31, 4, 100, 'Pass'),
(31, 11, 100, 'Pass'),
(32, 1, 100, 'Pass'),
(32, 2, 100, 'Pass'),
(32, 3, 100, 'Pass'),
(32, 4, 0, 'Fail'),
(32, 11, 0, 'Fail'),
(33, 1, 100, 'Pass'),
(33, 2, 100, 'Pass'),
(33, 3, 100, 'Pass'),
(33, 4, 100, 'Pass'),
(33, 11, 100, 'Pass'),
(34, 1, 100, 'Pass'),
(34, 2, 100, 'Pass'),
(34, 3, 100, 'Pass'),
(34, 4, 100, 'Pass'),
(34, 11, 100, 'Pass'),
(35, 1, 100, 'Pass'),
(35, 2, 100, 'Pass'),
(35, 3, 100, 'Pass'),
(35, 4, 100, 'Pass'),
(35, 11, 100, 'Pass'),
(36, 1, 100, 'Pass'),
(36, 2, 100, 'Pass'),
(36, 3, 100, 'Pass'),
(36, 4, 100, 'Pass'),
(36, 11, 100, 'Pass'),
(37, 1, 100, 'Pass'),
(37, 2, 100, 'Pass'),
(37, 3, 100, 'Pass'),
(37, 4, 100, 'Pass'),
(37, 5, 75, 'Pass'),
(37, 6, 100, 'Pass'),
(37, 7, 100, 'Pass'),
(37, 8, 100, 'Pass'),
(37, 10, 100, 'Pass'),
(37, 11, 100, 'Pass'),
(38, 1, 100, 'Pass'),
(38, 2, 33, 'Fail'),
(38, 3, 100, 'Pass'),
(38, 4, 100, 'Pass'),
(38, 5, 100, 'Pass'),
(38, 6, 50, 'Fail'),
(38, 7, 50, 'Fail'),
(38, 8, 100, 'Pass'),
(38, 10, 100, 'Pass'),
(38, 11, 0, 'Fail'),
(39, 1, 75, 'Pass'),
(39, 2, 100, 'Pass'),
(39, 3, 100, 'Pass'),
(39, 4, 0, 'Fail'),
(39, 5, 75, 'Pass'),
(39, 6, 100, 'Pass'),
(39, 7, 100, 'Pass'),
(39, 8, 75, 'Pass'),
(39, 10, 100, 'Pass'),
(39, 11, 100, 'Pass'),
(40, 1, 100, 'Pass'),
(40, 2, 66, 'Pass'),
(40, 3, 100, 'Pass'),
(40, 4, 100, 'Pass'),
(40, 5, 75, 'Pass'),
(40, 6, 50, 'Fail'),
(40, 7, 100, 'Pass'),
(40, 8, 100, 'Pass'),
(40, 10, 100, 'Pass'),
(40, 11, 100, 'Pass'),
(41, 1, 100, 'Pass'),
(41, 2, 33, 'Fail'),
(41, 3, 100, 'Pass'),
(41, 4, 100, 'Pass'),
(41, 5, 75, 'Pass'),
(41, 6, 100, 'Pass'),
(41, 7, 100, 'Pass'),
(41, 8, 100, 'Pass'),
(41, 10, 100, 'Pass'),
(41, 11, 100, 'Pass'),
(42, 1, 75, 'Pass'),
(42, 2, 66, 'Pass'),
(42, 3, 100, 'Pass'),
(42, 4, 100, 'Pass'),
(42, 5, 100, 'Pass'),
(42, 6, 50, 'Fail'),
(42, 7, 100, 'Pass'),
(42, 8, 100, 'Pass'),
(42, 10, 100, 'Pass'),
(42, 11, 100, 'Pass'),
(43, 1, 100, 'Pass'),
(43, 3, 100, 'Pass'),
(43, 4, 100, 'Pass'),
(43, 5, 100, 'Pass'),
(43, 7, 50, 'Fail'),
(43, 8, 75, 'Pass'),
(43, 9, 50, 'Fail'),
(43, 10, 50, 'Fail'),
(43, 11, 100, 'Pass'),
(44, 1, 100, 'Pass'),
(44, 3, 100, 'Pass'),
(44, 4, 100, 'Pass'),
(44, 5, 100, 'Pass'),
(44, 7, 100, 'Pass'),
(44, 8, 100, 'Pass'),
(44, 9, 100, 'Pass'),
(44, 10, 100, 'Pass'),
(44, 11, 100, 'Pass'),
(45, 1, 100, 'Pass'),
(45, 3, 100, 'Pass'),
(45, 4, 100, 'Pass'),
(45, 5, 100, 'Pass'),
(45, 7, 100, 'Pass'),
(45, 8, 100, 'Pass'),
(45, 9, 100, 'Pass'),
(45, 10, 100, 'Pass'),
(45, 11, 100, 'Pass'),
(46, 1, 100, 'Pass'),
(46, 3, 100, 'Pass'),
(46, 4, 100, 'Pass'),
(46, 5, 100, 'Pass'),
(46, 7, 100, 'Pass'),
(46, 8, 100, 'Pass'),
(46, 9, 100, 'Pass'),
(46, 10, 100, 'Pass'),
(46, 11, 100, 'Pass'),
(47, 1, 100, 'Pass'),
(47, 3, 100, 'Pass'),
(47, 4, 100, 'Pass'),
(47, 5, 100, 'Pass'),
(47, 7, 100, 'Pass'),
(47, 8, 100, 'Pass'),
(47, 9, 100, 'Pass'),
(47, 10, 100, 'Pass'),
(47, 11, 100, 'Pass'),
(48, 1, 100, 'Pass'),
(48, 3, 100, 'Pass'),
(48, 4, 100, 'Pass'),
(48, 5, 100, 'Pass'),
(48, 7, 100, 'Pass'),
(48, 8, 100, 'Pass'),
(48, 9, 100, 'Pass'),
(48, 10, 100, 'Pass'),
(48, 11, 100, 'Pass'),
(49, 1, 100, 'Pass'),
(49, 2, 100, 'Pass'),
(49, 3, 100, 'Pass'),
(49, 4, 100, 'Pass'),
(49, 10, 100, 'Pass'),
(49, 11, 100, 'Pass'),
(50, 1, 100, 'Pass'),
(50, 2, 100, 'Pass'),
(50, 3, 100, 'Pass'),
(50, 4, 0, 'Fail'),
(50, 10, 100, 'Pass'),
(50, 11, 66, 'Pass'),
(51, 1, 100, 'Pass'),
(51, 2, 100, 'Pass'),
(51, 3, 100, 'Pass'),
(51, 4, 100, 'Pass'),
(51, 10, 100, 'Pass'),
(51, 11, 100, 'Pass'),
(52, 1, 100, 'Pass'),
(52, 2, 100, 'Pass'),
(52, 3, 100, 'Pass'),
(52, 4, 100, 'Pass'),
(52, 10, 100, 'Pass'),
(52, 11, 100, 'Pass'),
(53, 1, 100, 'Pass'),
(53, 2, 100, 'Pass'),
(53, 3, 100, 'Pass'),
(53, 4, 100, 'Pass'),
(53, 10, 100, 'Pass'),
(53, 11, 100, 'Pass'),
(54, 1, 100, 'Pass'),
(54, 2, 100, 'Pass'),
(54, 3, 100, 'Pass'),
(54, 4, 100, 'Pass'),
(54, 10, 100, 'Pass'),
(54, 11, 100, 'Pass'),
(55, 3, 100, 'Pass'),
(55, 4, 66, 'Pass'),
(55, 9, 0, 'Fail'),
(55, 10, 100, 'Pass'),
(55, 11, 100, 'Pass'),
(56, 3, 100, 'Pass'),
(56, 4, 100, 'Pass'),
(56, 9, 100, 'Pass'),
(56, 10, 100, 'Pass'),
(56, 11, 100, 'Pass'),
(57, 3, 100, 'Pass'),
(57, 4, 100, 'Pass'),
(57, 9, 100, 'Pass'),
(57, 10, 100, 'Pass'),
(57, 11, 100, 'Pass'),
(58, 3, 100, 'Pass'),
(58, 4, 100, 'Pass'),
(58, 9, 100, 'Pass'),
(58, 10, 100, 'Pass'),
(58, 11, 100, 'Pass'),
(59, 3, 100, 'Pass'),
(59, 4, 100, 'Pass'),
(59, 9, 100, 'Pass'),
(59, 10, 100, 'Pass'),
(59, 11, 100, 'Pass'),
(60, 3, 100, 'Pass'),
(60, 4, 100, 'Pass'),
(60, 9, 100, 'Pass'),
(60, 10, 100, 'Pass'),
(60, 11, 100, 'Pass');

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
  `cgpa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestertranscript`
--

INSERT INTO `semestertranscript` (`semtranscriptCode`, `studentRegCode`, `semesterCode`, `approvalStatus`, `sgpa`, `cgpa`) VALUES
(1, 'FUI/FURC-SP-15-BCSE-001', 1, 1, 3.04, 3.04),
(2, 'FUI/FURC-SP-15-BCSE-002', 1, 1, 1.36, 1.36),
(3, 'FUI/FURC-SP-15-BCSE-003', 1, 1, 0, 0),
(4, 'FUI/FURC-SP-15-BCSE-004', 1, 1, 2.62, 2.62),
(5, 'FUI/FURC-SP-15-BCSE-005', 1, 1, 2.32, 2.32),
(6, 'FUI/FURC-SP-15-BCSE-006', 1, 1, 1.8, 1.8),
(7, 'FUI/FURC-SP-15-BCSE-001', 2, 1, 2.76, 2.9),
(8, 'FUI/FURC-SP-15-BCSE-002', 2, 1, 1.36, 1.36),
(9, 'FUI/FURC-SP-15-BCSE-003', 2, 1, 2.11, 2.11),
(10, 'FUI/FURC-SP-15-BCSE-004', 2, 1, 2.71, 2.67),
(11, 'FUI/FURC-SP-15-BCSE-005', 2, 1, 1.4, 1.86),
(12, 'FUI/FURC-SP-15-BCSE-006', 2, 1, 2.02, 1.94),
(13, 'FUI/FURC-F-15-BCSE-001', 3, 1, 3.2, 3.2),
(14, 'FUI/FURC-F-15-BCSE-002', 3, 1, 2.92, 2.92),
(15, 'FUI/FURC-F-15-BCSE-003', 3, 1, 3.24, 3.24),
(16, 'FUI/FURC-F-15-BCSE-004', 3, 1, 3.2, 3.2),
(17, 'FUI/FURC-F-15-BCSE-005', 3, 1, 3.04, 3.03),
(18, 'FUI/FURC-F-15-BCSE-006', 3, 1, 2.8, 2.8),
(19, 'FUI/FURC-SP-15-BCSE-001', 4, 1, 2.56, 2.89),
(20, 'FUI/FURC-SP-15-BCSE-002', 4, 1, 2.72, 1.36),
(21, 'FUI/FURC-SP-15-BCSE-003', 4, 1, 3.2, 1.05),
(22, 'FUI/FURC-SP-15-BCSE-004', 4, 1, 3.4, 2.66),
(23, 'FUI/FURC-SP-15-BCSE-005', 4, 1, 2.8, 1.85),
(24, 'FUI/FURC-SP-15-BCSE-006', 4, 1, 3.16, 1.9),
(25, 'FUI/FURC-F-15-BCSE-001', 5, 1, 2.42, 2.81),
(26, 'FUI/FURC-F-15-BCSE-002', 5, 1, 2.8, 2.86),
(27, 'FUI/FURC-F-15-BCSE-003', 5, 1, 3.28, 3.25),
(28, 'FUI/FURC-F-15-BCSE-004', 5, 1, 2.96, 3.08),
(29, 'FUI/FURC-F-15-BCSE-005', 5, 1, 3, 3.01),
(30, 'FUI/FURC-F-15-BCSE-006', 5, 1, 2.92, 2.86),
(31, 'FUI/FURC-SP-16-BCSE-001', 6, 1, 3.16, 3.16),
(32, 'FUI/FURC-SP-16-BCSE-002', 6, 1, 2.05, 2.05),
(33, 'FUI/FURC-SP-16-BCSE-003', 6, 1, 3.8, 3.8),
(34, 'FUI/FURC-SP-16-BCSE-004', 6, 1, 2.24, 2.24),
(35, 'FUI/FURC-SP-16-BCSE-005', 6, 1, 3.48, 3.48),
(36, 'FUI/FURC-SP-16-BCSE-006', 6, 1, 2.84, 2.84),
(37, 'FUI/FURC-SP-15-BCSE-001', 7, 1, 2.84, 2.79),
(38, 'FUI/FURC-SP-15-BCSE-002', 7, 1, 2.28, 1.93),
(39, 'FUI/FURC-SP-15-BCSE-003', 7, 1, 2.8, 2.02),
(40, 'FUI/FURC-SP-15-BCSE-004', 7, 1, 2.44, 2.79),
(41, 'FUI/FURC-SP-15-BCSE-005', 7, 1, 3.08, 2.39),
(42, 'FUI/FURC-SP-15-BCSE-006', 7, 1, 2.4, 2.34),
(43, 'FUI/FURC-F-15-BCSE-001', 8, 1, 2.96, 2.86),
(44, 'FUI/FURC-F-15-BCSE-002', 8, 1, 2.44, 2.72),
(45, 'FUI/FURC-F-15-BCSE-003', 8, 1, 3.16, 3.22),
(46, 'FUI/FURC-F-15-BCSE-004', 8, 1, 2.38, 2.84),
(47, 'FUI/FURC-F-15-BCSE-005', 8, 1, 2.76, 2.93),
(48, 'FUI/FURC-F-15-BCSE-006', 8, 1, 2.76, 2.82),
(49, 'FUI/FURC-SP-16-BCSE-001', 9, 1, 2.68, 2.92),
(50, 'FUI/FURC-SP-16-BCSE-002', 9, 1, 2.64, 2.34),
(51, 'FUI/FURC-SP-16-BCSE-003', 9, 1, 2.88, 3.34),
(52, 'FUI/FURC-SP-16-BCSE-004', 9, 1, 2.72, 2.48),
(53, 'FUI/FURC-SP-16-BCSE-005', 9, 1, 2.72, 3.1),
(54, 'FUI/FURC-SP-16-BCSE-006', 9, 1, 3.12, 2.97),
(55, 'FUI/FURC-F-16-BCSE-001', 10, 1, 2.6, 2.59),
(56, 'FUI/FURC-F-16-BCSE-002', 10, 1, 2.76, 2.75),
(57, 'FUI/FURC-F-16-BCSE-003', 10, 1, 3.32, 3.31),
(58, 'FUI/FURC-F-16-BCSE-004', 10, 1, 2.96, 2.96),
(59, 'FUI/FURC-F-16-BCSE-005', 10, 1, 3, 3),
(60, 'FUI/FURC-F-16-BCSE-006', 10, 1, 3.12, 3.11);

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
  `assessmentCriteria` varchar(150) NOT NULL
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
  ADD KEY `Course_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseadvisor`
--
ALTER TABLE `courseadvisor`
  ADD PRIMARY KEY (`facultyCode`,`batchCode`),
  ADD UNIQUE KEY `courseAdvisor_officialEmail_uindex` (`officialEmail`),
  ADD KEY `courseAdvisor_batch_batchCode_fk` (`batchCode`);

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
-- Indexes for table `examhead`
--
ALTER TABLE `examhead`
  ADD PRIMARY KEY (`examHeadCode`),
  ADD UNIQUE KEY `examHead_contact_uindex` (`contactNumber`),
  ADD UNIQUE KEY `examHead_officialEmail_uindex` (`officialEmail`),
  ADD UNIQUE KEY `examHead_CNIC_uindex` (`CNIC`);

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
-- Indexes for table `gradingmodel`
--
ALTER TABLE `gradingmodel`
  ADD PRIMARY KEY (`percentage`);

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
  ADD KEY `semesterTranscript_student_studentRegCode_fk` (`studentRegCode`);

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
  MODIFY `assessmentCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
  MODIFY `questionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

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
-- AUTO_INCREMENT for table `examhead`
--
ALTER TABLE `examhead`
  MODIFY `examHeadCode` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `programtranscriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `seasonCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `semestertranscript`
--
ALTER TABLE `semestertranscript`
  MODIFY `semtranscriptCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

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
  ADD CONSTRAINT `Course_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `courseadvisor`
--
ALTER TABLE `courseadvisor`
  ADD CONSTRAINT `courseAdvisor_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseAdvisor_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `semesterTranscript_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
