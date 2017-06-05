-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 10:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `username`, `password`, `emailid`, `mobileno`, `created`) VALUES
(200, 'nadee', '68e2db743735b254dcd9d11631bca705', 'n@gmail.com', 754636571, '2017-01-12 17:14:27'),
(203, 'madu', '5f6cdeee3b4e41e6dd4713ceac914217', 'm@gmail.com', 754636572, '2017-01-12 17:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_topic` int(8) NOT NULL,
  `parent_post` int(8) NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_content`, `post_date`, `post_topic`, `parent_post`, `name`) VALUES
(81, 'Some people says he is king Parakramabahu I', '2017-04-26 20:01:26', 128, -1, NULL),
(82, 'can be', '2017-04-26 20:05:44', 128, -1, NULL),
(83, 'Chronicles says it is Dambhakolapatuna', '2017-04-27 02:37:39', 129, -1, NULL),
(84, 'fuisngu\r\n', '2017-04-27 03:07:23', 130, -1, NULL),
(85, 'reyethe', '2017-04-28 17:58:27', 129, 83, NULL),
(86, 'dgdthufyjg', '2017-05-15 06:09:56', 122, -1, NULL),
(87, 'cgjkjbkb l', '2017-05-15 06:10:05', 122, 86, NULL),
(88, 'sadasdsad', '2017-05-26 10:35:12', 122, -1, NULL),
(89, 'asdsadsadsad', '2017-05-26 10:35:17', 122, 88, NULL),
(90, 'adsadsasad', '2017-05-26 10:35:22', 122, 86, NULL),
(91, 'asdsadsadasdsa', '2017-05-26 10:35:26', 122, 87, NULL),
(92, 'asdsaasas', '2017-05-26 10:35:30', 122, 91, NULL),
(93, 'asassa', '2017-05-26 10:35:43', 122, 92, NULL),
(94, 'delushaan', '2017-05-27 05:04:09', 132, -1, NULL),
(95, 'delu\r\n', '2017-05-27 05:04:17', 132, 94, NULL),
(96, 'zxccx', '2017-05-27 05:09:12', 122, -1, NULL),
(97, 'sdfdsfd', '2017-05-27 05:09:46', 132, -1, NULL),
(98, 'dfsfds', '2017-05-27 05:09:51', 132, 97, NULL),
(99, 'asdsad', '2017-06-05 05:44:41', 122, -1, NULL),
(100, 'aaaaaaaaaaaaaa', '2017-06-05 05:44:47', 122, -1, NULL),
(101, 'asdsd', '2017-06-05 05:45:21', 125, -1, NULL),
(102, 'asdsd', '2017-06-05 05:52:05', 123, -1, NULL),
(103, 'adsd', '2017-06-05 06:01:58', 123, -1, NULL),
(104, 'adasd', '2017-06-05 06:05:08', 123, 102, NULL),
(105, 'asdasdsad', '2017-06-05 06:27:46', 134, -1, NULL),
(106, 'dfsd', '2017-06-05 07:19:36', 122, -1, NULL),
(107, 'dfsd', '2017-06-05 07:19:36', 122, -1, NULL),
(108, 'asdasdsasad', '2017-06-05 07:42:30', 122, -1, NULL),
(109, 'asdasd', '2017-06-05 07:44:19', 122, -1, ''),
(110, 'delushaan', '2017-06-05 07:44:47', 122, -1, 'aaa@gmail.com'),
(111, 'test1', '2017-06-05 07:47:45', 122, -1, 'aaa@gmail.com'),
(112, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2017-06-05 07:48:20', 122, -1, 'aaa@gmail.com'),
(113, 'asdasd', '2017-06-05 07:56:35', 122, 112, 'aaa@gmail.com'),
(114, 'asdasd', '2017-06-05 07:56:35', 122, 112, 'aaa@gmail.com'),
(115, 'asdsa', '2017-06-05 08:02:40', 136, -1, ''),
(116, 'asdds', '2017-06-05 08:03:10', 136, -1, ''),
(117, 'asdds', '2017-06-05 08:03:10', 136, -1, ''),
(118, 'asdsad', '2017-06-05 08:03:56', 136, -1, 'aaa@gmail.com'),
(119, 'asdsad', '2017-06-05 08:06:49', 136, -1, 'aaa@gmail.com'),
(120, 'sadsd', '2017-06-05 08:07:17', 136, -1, 'aaa@gmail.com'),
(121, 'asdsad', '2017-06-05 08:08:52', 136, 120, 'aaa@gmail.com'),
(122, 'sadsad', '2017-06-05 08:10:11', 136, 117, 'aaa@gmail.com'),
(123, 'sads', '2017-06-05 08:21:06', 136, 121, 'aaa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `title` text NOT NULL,
  `fname` text NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` text NOT NULL,
  `gender` varchar(5) NOT NULL,
  `nic` int(10) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `add2` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `country` text NOT NULL,
  `major` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `researcher_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`title`, `fname`, `mname`, `lname`, `gender`, `nic`, `add1`, `add2`, `city`, `country`, `major`, `email`, `password`, `researcher_id`) VALUES
('miss', 'testttttttttttbbbbbbbbbb', 'jdsjsdj', 'ddsjsdj', 'f', 928300113, 'eewewieiw', 'ejhewwjhew', 'wkjewewj', 'Sri Lanka', 'hdjdhdh', 'n@gmail.com', NULL, 28),
('miss', 'naaaaa', 'sjsajjaj', 'dkjdjdsk', 'f', 92800134, 'jjjjsj', 'snsnmdm', 'zxzxnzn', 'djhdsjsdj', 'djhdshjhs', 'nadeesenavirathna@gmail.com', NULL, 29);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `admin_by` int(8) DEFAULT NULL,
  `topic_subject` varchar(50) NOT NULL,
  `topic_content` text NOT NULL,
  `topic_date` date NOT NULL,
  `topic_by` int(8) DEFAULT NULL,
  `user` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `admin_by`, `topic_subject`, `topic_content`, `topic_date`, `topic_by`, `user`) VALUES
(122, NULL, 'Who is the real father of Pandukabhaya?', 'Deegagaamini or Chiththaraga', '2017-04-26', NULL, NULL),
(123, NULL, 'how does the origination of Veddas happened', '', '2017-04-26', NULL, NULL),
(125, NULL, 'Where does queen Viharamahadevi landed actually?', '', '2017-04-26', NULL, NULL),
(128, NULL, 'Who is in the statue near Parakrama samudra?', '', '2017-04-26', NULL, NULL),
(129, NULL, 'where does king Vijaya landed>', '', '2017-04-27', NULL, NULL),
(130, NULL, 'fdsmgif', 'idjfisj', '2017-04-27', NULL, NULL),
(131, NULL, 'this is new topic', 'mcsdmvdsp', '2017-04-30', NULL, NULL),
(132, NULL, 'What is your Name?', '', '2017-05-27', NULL, NULL),
(133, NULL, 'sdfdsfds', 'dsfdsfdsf', '2017-05-27', NULL, NULL),
(134, NULL, 'sadasd', 'asdasd', '2017-06-05', NULL, 'zzz@c'),
(135, NULL, 'aaa', 'sdfsd;fjdslkfsdf', '2017-06-05', NULL, 'zzz@c'),
(136, NULL, 'asd', 'asdasd', '2017-06-05', NULL, 'aaa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `role`) VALUES
(1, 'poorna', 'perera', 'poorna@gmail.com', 'poorna@123', NULL),
(4, 'thusha', 'buruwa', 'zzz@c', 'zxc', NULL),
(5, 'sandum', 'avhdvsdhf', 'sa@d', 'zx', NULL),
(6, 'aaaa', 'aaa', 'aaa@gmail.com', 'aaa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallpapers`
--

CREATE TABLE `wallpapers` (
  `img_id` int(3) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallpapers`
--

INSERT INTO `wallpapers` (`img_id`, `img_name`, `path`) VALUES
(1, 'dalada1', 'images/wallpapers/dalada1.jpg'),
(2, 'dalada2', 'images/wallpapers/dalada2.jpg'),
(3, 'dalada3', 'images/wallpapers/dalada3.jpg'),
(4, 'kuttam1', 'images/wallpapers/kuttam1.jpg'),
(5, 'kuttam2', 'images/wallpapers/kuttam2.jpg'),
(6, 'kuttam3', 'images/wallpapers/kuttam3.jpg'),
(7, 'nissanka1', 'images/wallpapers/nissanka1.jpg'),
(8, 'nissanka2', 'images/wallpapers/nissanka2.jpg'),
(9, 'nissanka3', 'images/wallpapers/nissanka3.jpg'),
(10, 'thuparama1', 'images/wallpapers/thuparama1.jpg'),
(11, 'thuparama2', 'images/wallpapers/thuparama2.jpg'),
(12, 'thuparama3', 'images/wallpapers/thuparama3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_ibfk_2` (`post_topic`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`researcher_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_subject` (`topic_subject`),
  ADD KEY `topic_by` (`topic_by`),
  ADD KEY `admin_by` (`admin_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallpapers`
--
ALTER TABLE `wallpapers`
  ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `researcher_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wallpapers`
--
ALTER TABLE `wallpapers`
  MODIFY `img_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`admin_by`) REFERENCES `admin_details` (`id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `researchers` (`researcher_id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
