-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Des 2019 pada 07.42
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Struktur dari tabel `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL,
  `follow_current_user` int(11) NOT NULL,
  `follow_profile_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_topic`
--

CREATE TABLE `forum_topic` (
  `forum_topic_id` int(11) NOT NULL,
  `forum_topic_name` text NOT NULL,
  `forum_topic_created_by` varchar(255) NOT NULL,
  `forum_topic_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forum_topic_body` text NOT NULL,
  `forum_topic_views` int(11) NOT NULL,
  `forum_topic_replies` int(11) NOT NULL,
  `forum_topic_kategori` varchar(255) NOT NULL,
  `forum_topic_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum_topic`
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
-- Struktur dari tabel `forum_topic_reply`
--

CREATE TABLE `forum_topic_reply` (
  `forum_topic_reply_id` int(11) NOT NULL,
  `forum_topic_reply_topic_id` int(11) NOT NULL,
  `forum_topic_reply_created_by` varchar(255) NOT NULL,
  `forum_topic_reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forum_topic_reply_body` text NOT NULL,
  `forum_topic_reply_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum_topic_reply`
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
(9, 5, 'rajarshi', '2015-04-15 06:15:48', 'this!', ''),
(10, 6, 'ziki', '2019-12-04 15:12:27', 'test', ''),
(11, 6, 'ziki', '2019-12-12 10:34:51', 'hay', '295409-.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_name`) VALUES
(1, 'Tari Tradisional'),
(2, 'Tari Modern'),
(3, 'Tari Kreasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notice_topic`
--

CREATE TABLE `notice_topic` (
  `notice_topic_id` int(11) NOT NULL,
  `notice_topic_name` text NOT NULL,
  `notice_topic_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notice_topic_body` text NOT NULL,
  `notice_topic_created_by` varchar(255) NOT NULL,
  `notice_topic_kategori` varchar(255) NOT NULL,
  `notice_topic_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notice_topic`
--

INSERT INTO `notice_topic` (`notice_topic_id`, `notice_topic_name`, `notice_topic_time`, `notice_topic_body`, `notice_topic_created_by`, `notice_topic_kategori`, `notice_topic_image`) VALUES
(3, 'Tari reog', '2015-02-19 09:04:15', 'Akan dilaksanakan di festival', 'ijak', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_shortbio` text,
  `user_username` varchar(255) NOT NULL,
  `user_longbio` text,
  `user_website` varchar(255) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_profession` text,
  `user_gender` varchar(255) DEFAULT NULL,
  `user_address` text,
  `user_backgroundpicture` varchar(255) NOT NULL,
  `user_joindate` date NOT NULL,
  `user_country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_avatar`, `user_shortbio`, `user_username`, `user_longbio`, `user_website`, `user_dob`, `user_profession`, `user_gender`, `user_address`, `user_backgroundpicture`, `user_joindate`, `user_country`) VALUES
(18, 'nirmalya.email@gmail.com', 'nirmalya', 'Nirmalya', 'Ghosh', 'default.jpg', '', 'nirmalya', NULL, NULL, '2015-02-19', NULL, NULL, NULL, 'default.jpg', '2015-02-19', NULL),
(19, 'raziki@mail.com', 'raziki', 'Raziki', 'Gforce', 'default.jpg', 'polije', 'ziki', '1millions studio\r\n\r\nJln.mastrip jember', '', '2000-06-20', 'mahasiswa', 'Male', 'bondowoso', 'default.jpg', '2015-02-19', 'indonesia'),
(21, 'rajarshi@tarafdar.com', 'rajarshi', 'Rajarshi', 'Tarafdar', '481ewwfvjs-850738315.jpg', '', 'rajarshi', NULL, NULL, '2015-04-02', NULL, NULL, NULL, 'default.jpg', '2015-04-14', NULL),
(22, 'ihza@gmail.com', 'ijak', 'ihza', 'Okta', 'default.jpg', '', 'ijak', '', '', '1999-10-14', '', 'Male', '', 'default.jpg', '2019-11-27', ''),
(23, 'primasdika@gmail.com', 'dika', 'primas', 'dika', 'default.jpg', NULL, 'dika', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', '2019-12-11', NULL),
(24, 'pras@mail.com', 'pras', 'pras', 'setyo', 'default.jpg', '', 'pras', 'aku', '', '1998-06-12', '', 'Male', '', 'default.jpg', '2019-12-11', ''),
(25, 'surya@mail.com', 'surya', 'sur', 'ya', 'default.jpg', '', 'surya', NULL, NULL, '2019-12-27', NULL, NULL, NULL, 'default.jpg', '2019-12-11', NULL),
(26, 'jekiyudi15@gmail.com', 'test', 'admin', 'forum', 'default.jpg', 'admin forum', 'admin', NULL, NULL, '2000-06-20', NULL, NULL, NULL, 'default.jpg', '2019-12-18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `view`
--

CREATE TABLE `view` (
  `view_id` int(11) NOT NULL,
  `view_current_user` int(11) NOT NULL,
  `view_profile_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_id`);

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

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
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `forum_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_topic_reply`
--
ALTER TABLE `forum_topic_reply`
  MODIFY `forum_topic_reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notice_topic`
--
ALTER TABLE `notice_topic`
  MODIFY `notice_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
