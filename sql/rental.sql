-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 2 月 12 日 05:35
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'system');

-- --------------------------------------------------------

--
-- テーブルの構造 `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(4) NOT NULL COMMENT 'item id',
  `item_name` varchar(100) NOT NULL COMMENT 'item name',
  `stock` int(3) NOT NULL COMMENT 'rental stock'
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `stock`) VALUES
(1, 'pentab', 100),
(2, 'camera', 100),
(3, 'item1', 100),
(4, 'item2', 100),
(5, 'item3', 100),
(6, 'item4', 100),
(7, 'item5', 100),
(8, 'item6', 100),
(9, 'item7', 100),
(10, 'item8', 100),
(11, 'item9', 100),
(12, 'item10', 100),
(13, 'item11', 100),
(14, 'item12', 100),
(15, 'item13', 100),
(16, 'item14', 100),
(17, 'item15', 100),
(18, 'item16', 100),
(19, 'item17', 100),
(20, 'item18', 100),
(21, 'item19', 100),
(22, 'item20', 100),
(23, 'item21', 100),
(24, 'item22', 100),
(25, 'item23', 100),
(26, 'item24', 100),
(27, 'item25', 100),
(28, 'item26', 100),
(29, 'item27', 100),
(30, 'item28', 100),
(31, 'item29', 100),
(32, 'item30', 100),
(33, 'item31', 100),
(34, 'item32', 100),
(35, 'item33', 100),
(36, 'item34', 100),
(37, 'item35', 100),
(38, 'item36', 100),
(39, 'item37', 100),
(40, 'item38', 100),
(41, 'item39', 100),
(42, 'item40', 100),
(43, 'item41', 100),
(44, 'item42', 100),
(45, 'item43', 100),
(46, 'item44', 100),
(47, 'item45', 100),
(48, 'item46', 100),
(49, 'item47', 100),
(50, 'item48', 100),
(51, 'item49', 100),
(52, 'item50', 100),
(53, 'item51', 100),
(54, 'item52', 100),
(55, 'item53', 100),
(56, 'item54', 100),
(57, 'item55', 100),
(58, 'item56', 100),
(59, 'item57', 100),
(60, 'item58', 100),
(61, 'item59', 100),
(62, 'item60', 100),
(63, 'item61', 100),
(64, 'item62', 100),
(65, 'item63', 100),
(66, 'item64', 100),
(67, 'item65', 100),
(68, 'item66', 100),
(69, 'item67', 100),
(70, 'item68', 100),
(71, 'item69', 100),
(72, 'item70', 100),
(73, 'item71', 100),
(74, 'item72', 100),
(75, 'item73', 100),
(76, 'item74', 100),
(77, 'item75', 100),
(78, 'item76', 100),
(79, 'item77', 100),
(80, 'item78', 100),
(81, 'item79', 100),
(82, 'item80', 100),
(83, 'item81', 100),
(84, 'item82', 100),
(85, 'item83', 100),
(86, 'item84', 100),
(87, 'item85', 100),
(88, 'item86', 100),
(89, 'item87', 100),
(90, 'item88', 100),
(91, 'item89', 100),
(92, 'item90', 100),
(93, 'item91', 100),
(94, 'item92', 100),
(95, 'item93', 100),
(96, 'item94', 100),
(97, 'item95', 100),
(98, 'item96', 100),
(99, 'item97', 100),
(100, 'item98', 100),
(101, 'item99', 100);

-- --------------------------------------------------------

--
-- テーブルの構造 `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `rental_id` int(8) NOT NULL COMMENT 'rental id (pk)',
  `student_id` int(4) NOT NULL COMMENT 'student id (fk)',
  `item_id` int(4) NOT NULL COMMENT 'item id (fk)',
  `quantity` int(4) NOT NULL COMMENT 'rental quantity',
  `rental_date` date NOT NULL COMMENT 'rental date',
  `plan_date` date NOT NULL COMMENT 'return plan date',
  `return_date` date NOT NULL COMMENT 'return date',
  `completed` tinyint(1) NOT NULL COMMENT 'completed (ok or no)'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `rental`
--

INSERT INTO `rental` (`rental_id`, `student_id`, `item_id`, `quantity`, `rental_date`, `plan_date`, `return_date`, `completed`) VALUES
(1, 1, 1, 10, '2016-02-09', '0000-00-00', '2016-02-16', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `student`
--

INSERT INTO `student` (`student_id`, `student_number`, `department_id`, `teacher_id`, `student_name`, `student_email`) VALUES
(1, 'b4142', 1, 1, 'hidehide', 'hidehide@oic.jp'),
(2, 'b0', 1, 1, 'テスト0', 'b0@oic.jp'),
(3, 'b1', 1, 1, 'テスト1', 'b1@oic.jp'),
(4, 'b2', 1, 1, 'テスト2', 'b2@oic.jp'),
(5, 'b3', 1, 1, 'テスト3', 'b3@oic.jp'),
(6, 'b4', 1, 1, 'テスト4', 'b4@oic.jp'),
(7, 'b5', 1, 1, 'テスト5', 'b5@oic.jp'),
(8, 'b6', 1, 1, 'テスト6', 'b6@oic.jp'),
(9, 'b7', 1, 1, 'テスト7', 'b7@oic.jp'),
(10, 'b8', 1, 1, 'テスト8', 'b8@oic.jp'),
(11, 'b9', 1, 1, 'テスト9', 'b9@oic.jp'),
(12, 'b10', 1, 1, 'テスト10', 'b10@oic.jp'),
(13, 'b11', 1, 1, 'テスト11', 'b11@oic.jp'),
(14, 'b12', 1, 1, 'テスト12', 'b12@oic.jp'),
(15, 'b13', 1, 1, 'テスト13', 'b13@oic.jp'),
(16, 'b14', 1, 1, 'テスト14', 'b14@oic.jp'),
(17, 'b15', 1, 1, 'テスト15', 'b15@oic.jp'),
(18, 'b16', 1, 1, 'テスト16', 'b16@oic.jp'),
(19, 'b17', 1, 1, 'テスト17', 'b17@oic.jp'),
(20, 'b18', 1, 1, 'テスト18', 'b18@oic.jp'),
(21, 'b19', 1, 1, 'テスト19', 'b19@oic.jp'),
(22, 'b20', 1, 1, 'テスト20', 'b20@oic.jp'),
(23, 'b21', 1, 1, 'テスト21', 'b21@oic.jp'),
(24, 'b22', 1, 1, 'テスト22', 'b22@oic.jp'),
(25, 'b23', 1, 1, 'テスト23', 'b23@oic.jp'),
(26, 'b24', 1, 1, 'テスト24', 'b24@oic.jp'),
(27, 'b25', 1, 1, 'テスト25', 'b25@oic.jp'),
(28, 'b26', 1, 1, 'テスト26', 'b26@oic.jp'),
(29, 'b27', 1, 1, 'テスト27', 'b27@oic.jp'),
(30, 'b28', 1, 1, 'テスト28', 'b28@oic.jp'),
(31, 'b29', 1, 1, 'テスト29', 'b29@oic.jp'),
(32, 'b30', 1, 1, 'テスト30', 'b30@oic.jp'),
(33, 'b31', 1, 1, 'テスト31', 'b31@oic.jp'),
(34, 'b32', 1, 1, 'テスト32', 'b32@oic.jp'),
(35, 'b33', 1, 1, 'テスト33', 'b33@oic.jp'),
(36, 'b34', 1, 1, 'テスト34', 'b34@oic.jp'),
(37, 'b35', 1, 1, 'テスト35', 'b35@oic.jp'),
(38, 'b36', 1, 1, 'テスト36', 'b36@oic.jp'),
(39, 'b37', 1, 1, 'テスト37', 'b37@oic.jp'),
(40, 'b38', 1, 1, 'テスト38', 'b38@oic.jp'),
(41, 'b39', 1, 1, 'テスト39', 'b39@oic.jp'),
(42, 'b40', 1, 1, 'テスト40', 'b40@oic.jp'),
(43, 'b41', 1, 1, 'テスト41', 'b41@oic.jp'),
(44, 'b42', 1, 1, 'テスト42', 'b42@oic.jp'),
(45, 'b43', 1, 1, 'テスト43', 'b43@oic.jp'),
(46, 'b44', 1, 1, 'テスト44', 'b44@oic.jp'),
(47, 'b45', 1, 1, 'テスト45', 'b45@oic.jp'),
(48, 'b46', 1, 1, 'テスト46', 'b46@oic.jp'),
(49, 'b47', 1, 1, 'テスト47', 'b47@oic.jp'),
(50, 'b48', 1, 1, 'テスト48', 'b48@oic.jp'),
(51, 'b49', 1, 1, 'テスト49', 'b49@oic.jp'),
(52, 'b50', 1, 1, 'テスト50', 'b50@oic.jp'),
(53, 'b51', 1, 1, 'テスト51', 'b51@oic.jp'),
(54, 'b52', 1, 1, 'テスト52', 'b52@oic.jp'),
(55, 'b53', 1, 1, 'テスト53', 'b53@oic.jp'),
(56, 'b54', 1, 1, 'テスト54', 'b54@oic.jp'),
(57, 'b55', 1, 1, 'テスト55', 'b55@oic.jp'),
(58, 'b56', 1, 1, 'テスト56', 'b56@oic.jp'),
(59, 'b57', 1, 1, 'テスト57', 'b57@oic.jp'),
(60, 'b58', 1, 1, 'テスト58', 'b58@oic.jp'),
(61, 'b59', 1, 1, 'テスト59', 'b59@oic.jp'),
(62, 'b60', 1, 1, 'テスト60', 'b60@oic.jp'),
(63, 'b61', 1, 1, 'テスト61', 'b61@oic.jp'),
(64, 'b62', 1, 1, 'テスト62', 'b62@oic.jp'),
(65, 'b63', 1, 1, 'テスト63', 'b63@oic.jp'),
(66, 'b64', 1, 1, 'テスト64', 'b64@oic.jp'),
(67, 'b65', 1, 1, 'テスト65', 'b65@oic.jp'),
(68, 'b66', 1, 1, 'テスト66', 'b66@oic.jp'),
(69, 'b67', 1, 1, 'テスト67', 'b67@oic.jp'),
(70, 'b68', 1, 1, 'テスト68', 'b68@oic.jp'),
(71, 'b69', 1, 1, 'テスト69', 'b69@oic.jp'),
(72, 'b70', 1, 1, 'テスト70', 'b70@oic.jp'),
(73, 'b71', 1, 1, 'テスト71', 'b71@oic.jp'),
(74, 'b72', 1, 1, 'テスト72', 'b72@oic.jp'),
(75, 'b73', 1, 1, 'テスト73', 'b73@oic.jp'),
(76, 'b74', 1, 1, 'テスト74', 'b74@oic.jp'),
(77, 'b75', 1, 1, 'テスト75', 'b75@oic.jp'),
(78, 'b76', 1, 1, 'テスト76', 'b76@oic.jp'),
(79, 'b77', 1, 1, 'テスト77', 'b77@oic.jp'),
(80, 'b78', 1, 1, 'テスト78', 'b78@oic.jp'),
(81, 'b79', 1, 1, 'テスト79', 'b79@oic.jp'),
(82, 'b80', 1, 1, 'テスト80', 'b80@oic.jp'),
(83, 'b81', 1, 1, 'テスト81', 'b81@oic.jp'),
(84, 'b82', 1, 1, 'テスト82', 'b82@oic.jp'),
(85, 'b83', 1, 1, 'テスト83', 'b83@oic.jp'),
(86, 'b84', 1, 1, 'テスト84', 'b84@oic.jp'),
(87, 'b85', 1, 1, 'テスト85', 'b85@oic.jp'),
(88, 'b86', 1, 1, 'テスト86', 'b86@oic.jp'),
(89, 'b87', 1, 1, 'テスト87', 'b87@oic.jp'),
(90, 'b88', 1, 1, 'テスト88', 'b88@oic.jp'),
(91, 'b89', 1, 1, 'テスト89', 'b89@oic.jp'),
(92, 'b90', 1, 1, 'テスト90', 'b90@oic.jp'),
(93, 'b91', 1, 1, 'テスト91', 'b91@oic.jp'),
(94, 'b92', 1, 1, 'テスト92', 'b92@oic.jp'),
(95, 'b93', 1, 1, 'テスト93', 'b93@oic.jp'),
(96, 'b94', 1, 1, 'テスト94', 'b94@oic.jp'),
(97, 'b95', 1, 1, 'テスト95', 'b95@oic.jp'),
(98, 'b96', 1, 1, 'テスト96', 'b96@oic.jp'),
(99, 'b97', 1, 1, 'テスト97', 'b97@oic.jp'),
(100, 'b98', 1, 1, 'テスト98', 'b98@oic.jp'),
(101, 'b99', 1, 1, 'テスト99', 'b99@oic.jp');

-- --------------------------------------------------------

--
-- テーブルの構造 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(4) NOT NULL COMMENT 'teacher id',
  `teacher_name` varchar(100) NOT NULL COMMENT 'teacher name',
  `teacher_email` varchar(100) NOT NULL COMMENT 'teacher_email'
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`) VALUES
(1, 'test', 'test@oic.jp'),
(2, 'teacher1', 'teacher1@oic.jp'),
(3, 'teacher2', 'teacher2@oic.jp'),
(4, 'teacher3', 'teacher3@oic.jp'),
(5, 'teacher4', 'teacher4@oic.jp'),
(6, 'teacher5', 'teacher5@oic.jp'),
(7, 'teacher6', 'teacher6@oic.jp'),
(8, 'teacher7', 'teacher7@oic.jp'),
(9, 'teacher8', 'teacher8@oic.jp'),
(10, 'teacher9', 'teacher9@oic.jp'),
(11, 'teacher10', 'teacher10@oic.jp'),
(12, 'teacher11', 'teacher11@oic.jp'),
(13, 'teacher12', 'teacher12@oic.jp'),
(14, 'teacher13', 'teacher13@oic.jp'),
(15, 'teacher14', 'teacher14@oic.jp'),
(16, 'teacher15', 'teacher15@oic.jp'),
(17, 'teacher16', 'teacher16@oic.jp'),
(18, 'teacher17', 'teacher17@oic.jp'),
(19, 'teacher18', 'teacher18@oic.jp'),
(20, 'teacher19', 'teacher19@oic.jp'),
(21, 'teacher20', 'teacher20@oic.jp'),
(22, 'teacher21', 'teacher21@oic.jp'),
(23, 'teacher22', 'teacher22@oic.jp'),
(24, 'teacher23', 'teacher23@oic.jp'),
(25, 'teacher24', 'teacher24@oic.jp'),
(26, 'teacher25', 'teacher25@oic.jp'),
(27, 'teacher26', 'teacher26@oic.jp'),
(28, 'teacher27', 'teacher27@oic.jp'),
(29, 'teacher28', 'teacher28@oic.jp'),
(30, 'teacher29', 'teacher29@oic.jp'),
(31, 'teacher30', 'teacher30@oic.jp'),
(32, 'teacher31', 'teacher31@oic.jp'),
(33, 'teacher32', 'teacher32@oic.jp'),
(34, 'teacher33', 'teacher33@oic.jp'),
(35, 'teacher34', 'teacher34@oic.jp'),
(36, 'teacher35', 'teacher35@oic.jp'),
(37, 'teacher36', 'teacher36@oic.jp'),
(38, 'teacher37', 'teacher37@oic.jp'),
(39, 'teacher38', 'teacher38@oic.jp'),
(40, 'teacher39', 'teacher39@oic.jp'),
(41, 'teacher40', 'teacher40@oic.jp'),
(42, 'teacher41', 'teacher41@oic.jp'),
(43, 'teacher42', 'teacher42@oic.jp'),
(44, 'teacher43', 'teacher43@oic.jp'),
(45, 'teacher44', 'teacher44@oic.jp'),
(46, 'teacher45', 'teacher45@oic.jp'),
(47, 'teacher46', 'teacher46@oic.jp'),
(48, 'teacher47', 'teacher47@oic.jp'),
(49, 'teacher48', 'teacher48@oic.jp'),
(50, 'teacher49', 'teacher49@oic.jp'),
(51, 'teacher50', 'teacher50@oic.jp'),
(52, 'teacher51', 'teacher51@oic.jp'),
(53, 'teacher52', 'teacher52@oic.jp'),
(54, 'teacher53', 'teacher53@oic.jp'),
(55, 'teacher54', 'teacher54@oic.jp'),
(56, 'teacher55', 'teacher55@oic.jp'),
(57, 'teacher56', 'teacher56@oic.jp'),
(58, 'teacher57', 'teacher57@oic.jp'),
(59, 'teacher58', 'teacher58@oic.jp'),
(60, 'teacher59', 'teacher59@oic.jp'),
(61, 'teacher60', 'teacher60@oic.jp'),
(62, 'teacher61', 'teacher61@oic.jp'),
(63, 'teacher62', 'teacher62@oic.jp'),
(64, 'teacher63', 'teacher63@oic.jp'),
(65, 'teacher64', 'teacher64@oic.jp'),
(66, 'teacher65', 'teacher65@oic.jp'),
(67, 'teacher66', 'teacher66@oic.jp'),
(68, 'teacher67', 'teacher67@oic.jp'),
(69, 'teacher68', 'teacher68@oic.jp'),
(70, 'teacher69', 'teacher69@oic.jp'),
(71, 'teacher70', 'teacher70@oic.jp'),
(72, 'teacher71', 'teacher71@oic.jp'),
(73, 'teacher72', 'teacher72@oic.jp'),
(74, 'teacher73', 'teacher73@oic.jp'),
(75, 'teacher74', 'teacher74@oic.jp'),
(76, 'teacher75', 'teacher75@oic.jp'),
(77, 'teacher76', 'teacher76@oic.jp'),
(78, 'teacher77', 'teacher77@oic.jp'),
(79, 'teacher78', 'teacher78@oic.jp'),
(80, 'teacher79', 'teacher79@oic.jp'),
(81, 'teacher80', 'teacher80@oic.jp'),
(82, 'teacher81', 'teacher81@oic.jp'),
(83, 'teacher82', 'teacher82@oic.jp'),
(84, 'teacher83', 'teacher83@oic.jp'),
(85, 'teacher84', 'teacher84@oic.jp'),
(86, 'teacher85', 'teacher85@oic.jp'),
(87, 'teacher86', 'teacher86@oic.jp'),
(88, 'teacher87', 'teacher87@oic.jp'),
(89, 'teacher88', 'teacher88@oic.jp'),
(90, 'teacher89', 'teacher89@oic.jp'),
(91, 'teacher90', 'teacher90@oic.jp'),
(92, 'teacher91', 'teacher91@oic.jp'),
(93, 'teacher92', 'teacher92@oic.jp'),
(94, 'teacher93', 'teacher93@oic.jp'),
(95, 'teacher94', 'teacher94@oic.jp'),
(96, 'teacher95', 'teacher95@oic.jp'),
(97, 'teacher96', 'teacher96@oic.jp'),
(98, 'teacher97', 'teacher97@oic.jp'),
(99, 'teacher98', 'teacher98@oic.jp'),
(100, 'teacher99', 'teacher99@oic.jp');

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
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'department id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'item id',AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'rental id (pk)',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'student id',AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'teacher id',AUTO_INCREMENT=101;
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
