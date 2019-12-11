-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 12:52 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `forum_topic_id` int(11) NOT NULL,
  `forum_topic_name` text NOT NULL,
  `forum_topic_created_by` varchar(255) NOT NULL,
  `forum_topic_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `forum_topic_body` text NOT NULL,
  `forum_topic_views` int(11) NOT NULL,
  `forum_topic_replies` int(11) NOT NULL,
  `forum_topic_kategori` varchar(255) NOT NULL,
  `forum_topic_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`forum_topic_id`, `forum_topic_name`, `forum_topic_created_by`, `forum_topic_time`, `forum_topic_body`, `forum_topic_views`, `forum_topic_replies`, `forum_topic_kategori`, `forum_topic_image`) VALUES
(1, 'Dibyo', 'nirmalya', '2015-02-19 08:48:43', 'Dibyojyoti', 0, 0, '1', ''),
(2, 'Blog', 'rajarshi', '2015-04-14 17:58:27', 'Hello', 0, 0, '1,2,3', ''),
(3, 'Hello!', 'rajarshi', '2015-04-15 05:25:41', 'This is a test post!', 0, 0, '2,3', ''),
(4, 'abc', 'rajarshi', '2015-04-15 05:26:25', 'duh', 0, 0, '6,7', ''),
(5, 'alpha', 'rajarshi', '2015-04-15 05:36:03', 'beta', 0, 0, '1,2,3', 'secondarytile-200269909.png'),
(6, 'hello', 'ziki', '2019-11-28 01:38:50', 'test post', 0, 0, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic_reply`
--

CREATE TABLE `forum_topic_reply` (
  `forum_topic_reply_id` int(11) NOT NULL,
  `forum_topic_reply_topic_id` int(11) NOT NULL,
  `forum_topic_reply_created_by` varchar(255) NOT NULL,
  `forum_topic_reply_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `forum_topic_reply_body` text NOT NULL,
  `forum_topic_reply_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic_reply`
--

INSERT INTO `forum_topic_reply` (`forum_topic_reply_id`, `forum_topic_reply_topic_id`, `forum_topic_reply_created_by`, `forum_topic_reply_time`, `forum_topic_reply_body`, `forum_topic_reply_image`) VALUES
(1, 1, 'nirmalya', '2015-02-19 08:52:25', 'Piyush!', ''),
(2, 1, 'dibyo', '2015-02-19 09:08:38', 'hi!', ''),
(3, 2, 'rajarshi', '2015-04-14 17:58:57', 'Hello!', ''),
(4, 5, 'rajarshi', '2015-04-15 05:50:19', 'This is a test comment.', '6req95cnq8-1207729972.jpg'),
(5, 1, 'rajarshi', '2015-04-15 05:57:54', 'Test.', '1lde62496n-559284060.jpg'),
(6, 5, 'rajarshi', '2015-04-15 06:12:22', 'Okay!', 'default-background.jpg'),
(7, 5, 'rajarshi', '2015-04-15 06:14:36', 'hi!', 'default-background.jpg'),
(8, 5, 'rajarshi', '2015-04-15 06:15:06', 'ok!', 'NULL'),
(9, 5, 'rajarshi', '2015-04-15 06:15:48', 'this!', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice_topic`
--

CREATE TABLE `notice_topic` (
  `notice_topic_id` int(11) NOT NULL,
  `notice_topic_name` text NOT NULL,
  `notice_topic_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `notice_topic_body` text NOT NULL,
  `notice_topic_created_by` varchar(255) NOT NULL,
  `notice_topic_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_topic`
--

INSERT INTO `notice_topic` (`notice_topic_id`, `notice_topic_name`, `notice_topic_time`, `notice_topic_body`, `notice_topic_created_by`, `notice_topic_kategori`) VALUES
(3, 'Tari reog', '2015-02-19 09:04:15', 'Akan dilaksanakan di festival', 'ijak', '1'),
(4, 'uhuy', '2019-12-11 10:25:35', 'hhhhhhaewww', 'admin', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_shortbio` text DEFAULT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_longbio` text DEFAULT NULL,
  `user_website` varchar(255) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_profession` text DEFAULT NULL,
  `user_gender` varchar(255) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `user_backgroundpicture` varchar(255) NOT NULL,
  `user_joindate` date NOT NULL,
  `user_country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_avatar`, `user_shortbio`, `user_username`, `user_longbio`, `user_website`, `user_dob`, `user_profession`, `user_gender`, `user_address`, `user_backgroundpicture`, `user_joindate`, `user_country`) VALUES
(18, 'nirmalya.email@gmail.com', 'nirmalya', 'Nirmalya', 'Ghosh', 'default.jpg', '', 'nirmalya', NULL, NULL, '2015-02-19', NULL, NULL, NULL, 'default.jpg', '2015-02-19', NULL),
(19, 'raziki@mail.com', 'ziki', 'Raziki', 'Gforce', 'default.jpg', '', 'ziki', '', '', '2000-06-20', '', 'Male', '', 'default.jpg', '2015-02-19', ''),
(21, 'rajarshi@tarafdar.com', 'rajarshi', 'Rajarshi', 'Tarafdar', '481ewwfvjs-850738315.jpg', '', 'rajarshi', NULL, NULL, '2015-04-02', NULL, NULL, NULL, 'default.jpg', '2015-04-14', NULL),
(22, 'ihza@gmail.com', 'ijak', 'ihza', 'Okta', 'default.jpg', '', 'ijak', '', '', '1999-10-14', '', 'Male', '', 'default.jpg', '2019-11-27', ''),
(23, 'ferrysnainin@gmail.com', '1', 'Yais', 'uhuy', 'edited-198167985.png', '', 'admin', '', '', '2000-05-22', '', 'Male', '', 'default.jpg', '2019-12-11', ''),
(25, 'gaga@gmail.com', 'adg', 'dsggsdg', 'dafa', 'default.jpg', NULL, 'gag', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', '2019-12-11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`forum_topic_id`);

--
-- Indexes for table `forum_topic_reply`
--
ALTER TABLE `forum_topic_reply`
  ADD PRIMARY KEY (`forum_topic_reply_id`);

--
-- Indexes for table `notice_topic`
--
ALTER TABLE `notice_topic`
  ADD PRIMARY KEY (`notice_topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `forum_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum_topic_reply`
--
ALTER TABLE `forum_topic_reply`
  MODIFY `forum_topic_reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice_topic`
--
ALTER TABLE `notice_topic`
  MODIFY `notice_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
