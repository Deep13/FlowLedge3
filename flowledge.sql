-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2015 at 05:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reply` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `downvote` int(11) NOT NULL,
  `upvotes` int(11) NOT NULL,
`aid` int(11) NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `uid`, `reply`, `downvote`, `upvotes`, `aid`, `date`) VALUES
(35, 0, 'martial arts specialist, died due to poisoning ', 0, 0, 1, '17 October 2015'),
(34, 0, 'it is a huge fest with tech savvies in it', 0, 0, 1, '17 October 2015'),
(33, 0, 'baaam\r\n', 0, 0, 3, '17 October 2015'),
(33, 0, 'boom', 0, 0, 2, '17 October 2015'),
(32, 0, 'sdfgsdfghjkhsadfg', 1, 6, 2, '17 October 2015'),
(33, 0, 'bloop\r\n', 0, 0, 1, '17 October 2015'),
(32, 0, 'sdf', 4, 10, 1, '17 October 2015');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `downvotes` int(11) NOT NULL,
  `replies` int(11) NOT NULL,
  `dontknow` int(11) NOT NULL,
`ID` int(11) NOT NULL COMMENT 'pk',
  `postedby` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `posteddate` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `currentclass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `downvotes`, `replies`, `dontknow`, `ID`, `postedby`, `posteddate`, `active`, `currentclass`) VALUES
('where is belgaum?', 0, 0, 0, 36, 'asda', '2015-10-17 02:28:55', 1, 'stream'),
('who is bruce lee?', 0, 1, 4, 35, 'Siwa', '2015-10-17 02:27:15', 1, 'stream'),
('what is a hackathon?', 0, 1, 11, 34, 'pinku', '2015-10-17 01:55:02', 1, 'secondary'),
('what is life? ', 0, 2, 0, 32, 'raj', '2015-10-17 00:44:46', 1, 'secondary'),
('What is chlorophyl?', 0, 3, 10, 33, 'pinku', '2015-10-17 01:11:55', 1, 'secondary'),
('what is life?', 0, 0, 0, 31, 'raj', '2015-10-17 00:37:18', 1, 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`id` int(11) NOT NULL,
  `report` varchar(200) NOT NULL,
  `ansid` varchar(100) NOT NULL DEFAULT '0',
  `quesid` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `report`, `ansid`, `quesid`) VALUES
(1, 'sdfghj', '1', ''),
(2, 'bad comment', '1', ''),
(5, 'asdfghjhj', '', '36'),
(6, 'ASDFGHJYHKIL', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `primary` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secondary` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nquestions` int(11) NOT NULL,
  `nanswers` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `current` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `primary`, `secondary`, `pu`, `degree`, `job`, `nquestions`, `nanswers`, `name`, `email`, `current`) VALUES
('asda', 'q', '8', '10', 'science', '0', '0', 1, 1, 'ankitK', 'as@as.im', 'stream'),
('Siwa', 'q', '8', '10', 'commerce', '0', '0', 1, 0, 'xsiwalik', 'dada.mama@gmail.com', 'stream'),
('pinku', '1234', '8', '9', '0', '0', '0', 2, 3, 'Priyanka', 'pinku@gmail.com', 'secondary'),
('asd', 'q', '8', '10', '0', '0', '0', 0, 0, 'ankit', 'as@as.im', 'secondary'),
('raj', '1234', '8', '10', '0', '0', '0', 2, 3, 'Raj', 'raj@gmail.com', 'secondary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`qid`,`uid`,`aid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk',AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
