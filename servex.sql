-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2020 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cateogries`
--

CREATE TABLE `cateogries` (
  `cat_ID` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `ranks` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cateogries`
--

INSERT INTO `cateogries` (`cat_ID`, `cat_name`, `ranks`, `visible`) VALUES
(1, 'Design', 1, 1),
(2, 'Desin videoes', 3, 1),
(3, 'E.Marketing', 2, 1),
(4, 'Business', 4, 1),
(5, 'Programming ', 5, 1),
(7, 'Writing and translating ', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatBox`
--

CREATE TABLE `chatBox` (
  `message_id` int(11) NOT NULL,
  `chat_body` text NOT NULL,
  `send_to` int(11) NOT NULL,
  `from_who` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `serve_id_c` int(11) NOT NULL,
  `user_id_c` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `delivery` varchar(255) NOT NULL,
  `user-id` int(11) NOT NULL,
  `cat-id` int(11) NOT NULL,
  `subb_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `name`, `description`, `price`, `status`, `rating`, `delivery`, `user-id`, `cat-id`, `subb_id`, `date`) VALUES
(1, 'design logo', 'desing nice logo', 50, 'felxable', 5, 'month', 1, 1, 1, '2020-07-03 18:04:41'),
(2, 'php script', 'fix any php code', 56, 'PAY', 0, 'DAY', 5, 1, 15, '2020-07-03 18:10:14'),
(3, 'test', 'hello test', 78, 'EXCHANGE', 0, 'MONTH', 1, 4, 25, '2020-07-03 18:13:13'),
(4, 'test', 'hello test', 78, 'EXCHANGE', 0, 'MONTH', 1, 4, 25, '2020-07-03 18:13:56'),
(5, 'white board design', 'lap lap la', 56, 'felxable', 0, 'month', 7, 2, 9, '2020-07-07 16:02:30'),
(6, 'white board video design', 'white board video design', 100, 'felxable', 0, 'month', 4, 2, 9, '2020-07-07 17:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cateogry`
--

CREATE TABLE `sub_cateogry` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cateogry`
--

INSERT INTO `sub_cateogry` (`sub_id`, `sub_name`, `cate_id`) VALUES
(1, 'Designing A Logo', 1),
(2, 'Business Cards Design', 1),
(3, 'Book Covers Design', 1),
(4, 'Advertising Banners Design', 1),
(5, 'Design Presentations', 1),
(6, 'Animations Design', 2),
(7, 'Motions Graphic Design', 2),
(8, 'Video Montage', 2),
(9, 'White Board', 2),
(10, ' Content Management System', 5),
(11, 'JAVA Programming', 5),
(12, 'Programming Online Store', 5),
(13, 'Desktop Applications', 5),
(14, 'Moblie Applications', 5),
(15, 'PHP Programming', 5),
(16, 'WordPress Services', 5),
(17, 'CEO Services', 3),
(18, 'Site ADS', 3),
(19, 'Marketing ON Social Media', 3),
(20, 'Promotional Articles And publishing', 3),
(21, 'Data Entry', 4),
(22, 'Business Consulting', 4),
(23, 'Electronic Trade', 4),
(24, 'Financial Services', 4),
(25, 'Legal Services', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `aboutMe` text NOT NULL,
  `Pimg` varchar(255) NOT NULL,
  `group-id` tinyint(1) NOT NULL DEFAULT 0,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Fname`, `Lname`, `email`, `pass`, `aboutMe`, `Pimg`, `group-id`, `createdTime`) VALUES
(1, 'obai', 'basheer', 'obai@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '2020-04-30 17:20:28'),
(2, 'awab', 'basheer', 'awab@gmail.com', '123456', 'my name is awab and i web design', '', 1, '2020-05-05 08:04:29'),
(3, 'yousif', 'basheer', 'yousif@gmail.com', '123456', '', '', 0, '2020-05-05 08:05:26'),
(4, 'Ehsan', 'Mohamed', 'Ehsan@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', '', '', 0, '2020-05-13 08:16:31'),
(5, 'mohmmed', 'ahmed', 'mohmmed@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', 0, '2020-05-17 13:39:04'),
(7, 'admin', '', 'admin@admin.com', '601f1889667efaebb33b8c12572835da3f027f78', 'iam the boos', '', 1, '2020-06-16 19:08:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cateogries`
--
ALTER TABLE `cateogries`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `chatBox`
--
ALTER TABLE `chatBox`
  ADD KEY `chat1` (`send_to`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_c` (`user_id_c`),
  ADD KEY `serv_1` (`serve_id_c`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`),
  ADD KEY `username` (`user-id`),
  ADD KEY `cateogryname` (`cat-id`),
  ADD KEY `subbname` (`subb_id`);

--
-- Indexes for table `sub_cateogry`
--
ALTER TABLE `sub_cateogry`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cate_1` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cateogries`
--
ALTER TABLE `cateogries`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_cateogry`
--
ALTER TABLE `sub_cateogry`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `cateogryname` FOREIGN KEY (`cat-id`) REFERENCES `cateogries` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subbname` FOREIGN KEY (`subb_id`) REFERENCES `sub_cateogry` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`user-id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_cateogry`
--
ALTER TABLE `sub_cateogry`
  ADD CONSTRAINT `cate_1` FOREIGN KEY (`cate_id`) REFERENCES `cateogries` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
