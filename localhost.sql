-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 27 日 02:44
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sestudy`
--
DROP DATABASE IF EXISTS `sestudy`;
CREATE DATABASE IF NOT EXISTS `sestudy` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sestudy`;

-- --------------------------------------------------------

--
-- 表的结构 `sre_stu`
--

DROP TABLE IF EXISTS `sre_stu`;
CREATE TABLE IF NOT EXISTS `sre_stu` (
  `userid` varchar(20) NOT NULL,
  `class` int(11) NOT NULL,
  `team` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sre_stu`
--

INSERT INTO `sre_stu` (`userid`, `class`, `team`) VALUES
('student', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sre_tch`
--

DROP TABLE IF EXISTS `sre_tch`;
CREATE TABLE IF NOT EXISTS `sre_tch` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sre_tch`
--

INSERT INTO `sre_tch` (`id`, `userid`, `class`) VALUES
(1, 'teacher', 1),
(2, 'ta', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` char(1) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `major` varchar(60) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `ques` varchar(200) DEFAULT NULL,
  `answer` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userid`, `password`, `role`, `email`, `name`, `major`, `tel`, `ques`, `answer`) VALUES
('student', 'student', 'S', 'student@zju.edu.cn', '某某', '计算机科学与技术', '18868813800', '三点一四一五九二六', '5358979'),
('ta', 'ta', 'A', NULL, NULL, NULL, NULL, NULL, NULL),
('teacher', 'teacher', 'T', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
