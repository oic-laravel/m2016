-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 2 月 14 日 12:39
-- サーバのバージョン： 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(4) NOT NULL COMMENT 'department id',
  `department_name` varchar(100) NOT NULL COMMENT 'department name'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'system'),
(2, 'design');

-- --------------------------------------------------------

--
-- テーブルの構造 `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(4) NOT NULL COMMENT 'item id',
  `item_number` varchar(100) NOT NULL COMMENT 'item number (P-01)',
  `item_name` varchar(100) NOT NULL COMMENT 'item name',
  `loaned` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'loaned',
  `remarks` varchar(200) NOT NULL COMMENT 'remarks'
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `rental_id` int(8) NOT NULL COMMENT 'rental id (pk)',
  `student_id` int(4) NOT NULL COMMENT 'student id (fk)',
  `item_id` int(4) NOT NULL COMMENT 'item id (fk)',
  `rental_date` date NOT NULL COMMENT 'rental date',
  `plan_date` date NOT NULL COMMENT 'return plan date',
  `return_date` date NOT NULL COMMENT 'return date',
  `completed` tinyint(1) NOT NULL COMMENT 'completed (ok or no)'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(4) NOT NULL COMMENT 'student id',
  `student_number` varchar(8) NOT NULL COMMENT 'student number',
  `department_id` int(4) NOT NULL COMMENT 'department',
  `teacher_id` int(4) NOT NULL COMMENT 'teacher id',
  `student_name` varchar(100) NOT NULL COMMENT 'student name',
  `student_email` varchar(100) NOT NULL COMMENT 'student_email'
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `student`
--

INSERT INTO `student` (`student_id`, `student_number`, `department_id`, `teacher_id`, `student_name`, `student_email`) VALUES
(107, 'b4142', 1, 1, 'hide', 'b4142@oic.jp'),
(108, 'b4049', 1, 1, 'hisashi', 'b4049@oic.jp'),
(109, 'b4236', 1, 1, 'hiroto', 'b4236@oic.jp'),
(110, 'b4247', 1, 1, 'shouta', 'b4247@oic.jp');

-- --------------------------------------------------------

--
-- テーブルの構造 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(4) NOT NULL COMMENT 'teacher id',
  `teacher_name` varchar(100) NOT NULL COMMENT 'teacher name',
  `teacher_email` varchar(100) NOT NULL COMMENT 'teacher_email'
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`) VALUES
(1, 'test', 'oicbooks2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_number` (`item_number`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_name` (`teacher_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'department id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'item id',AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'rental id (pk)',AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'student id',AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'teacher id',AUTO_INCREMENT=104;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- テーブルの制約 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
