-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2020 at 11:45 AM
-- Server version: 8.0.15
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `interviewcode` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `victories` int(255) NOT NULL,
  `defeats` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`interviewcode`, `title`, `victories`, `defeats`) VALUES
(142, 'Цифры', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questioncode` int(11) NOT NULL,
  `essence` varchar(256) NOT NULL,
  `var1` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `var2` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `var3` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `var4` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vartrue` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questioncode`, `essence`, `var1`, `var2`, `var3`, `var4`, `vartrue`) VALUES
(574, '10?', '10', '20', '30', '40', 1),
(575, '20?', '10', '20', '30', '40', 1),
(576, '30?', '10', '20', '30', '40', 1),
(577, '40?', '10', '20', '30', '40', 1),
(578, '50?', '10', '20', '30', '40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionsinterview`
--

CREATE TABLE `questionsinterview` (
  `questions-interview code` int(11) NOT NULL,
  `interviewcode` int(11) NOT NULL,
  `questioncode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionsinterview`
--

INSERT INTO `questionsinterview` (`questions-interview code`, `interviewcode`, `questioncode`) VALUES
(403, 142, 574),
(404, 142, 575),
(405, 142, 576),
(406, 142, 577),
(407, 142, 578);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`interviewcode`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questioncode`);

--
-- Indexes for table `questionsinterview`
--
ALTER TABLE `questionsinterview`
  ADD PRIMARY KEY (`questions-interview code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `interviewcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questioncode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=579;

--
-- AUTO_INCREMENT for table `questionsinterview`
--
ALTER TABLE `questionsinterview`
  MODIFY `questions-interview code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
