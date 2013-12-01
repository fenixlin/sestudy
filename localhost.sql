-- phpMyAdmin SQL Dump

-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 27 日 02:44
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


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
-- 表的结构 `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `userid` varchar(20) CHARACTER SET utf8 NOT NULL,
  `course` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `team` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`,`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`userid`, `course`, `class`, `team`) VALUES
('student', 1, 1, NULL),
('student', 2, 1, 4);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `course` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `userid`, `course`, `class`) VALUES
(1, 'teacher', 1, 1),
(2, 'teacher', 1, 2),
(3, 'teacher', 2, 1),
(4, 'ta', 1, 1),
(5, 'ta', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `Topic`
--

CREATE TABLE IF NOT EXISTS `Topic` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `class_id` int(8) DEFAULT NULL,
  `group_id` int(8) DEFAULT NULL,
  `number_of_comment` int(4) DEFAULT NULL,
  `time` int(16) DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `Topic`
--

INSERT INTO `Topic` (`topic_id`, `author_id`, `class_id`, `group_id`, `number_of_comment`, `time`, `content`) VALUES
(1, 'abc', 1, 1, 4, 100, 'cdadsofjadosjf'),
(2, 'student', 1, 1, 2, 1385691212, 'sad'),
(3, 'student', 1, 1, 2, 1385691761, 'asdfads'),
(4, 'student', 1, 1, 2, 1385691861, 'asdfads'),
(5, 'student', 1, 1, 1, 1385691934, 'asdfads'),
(6, 'student', 1, 1, 0, 1385691942, 'aaaaaaaaaaa'),
(7, 'student', 1, 1, 0, 1385693394, 'asdfasdfasdsad\n');

-- --------------------------------------------------------

--
-- 表的结构 `TopicComment`
--

CREATE TABLE IF NOT EXISTS `TopicComment` (
  `comment_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_id` int(8) DEFAULT NULL,
  `author_id` varchar(20) DEFAULT NULL,
  `time` int(16) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `TopicComment`
--

INSERT INTO `TopicComment` (`comment_id`, `topic_id`, `author_id`, `time`, `content`) VALUES
(1, 1, '12345', 100, 'adcacdsc'),
(2, 1, '123456', 150, 'adsfasfd'),
(3, 1, 'student', 1385692810, 'asfasfafs'),
(4, 1, 'student', 1385692830, 'asfasfafs'),
(5, 2, 'student', 1385692835, 'asdfasffafas'),
(6, 2, 'student', 1385692839, 'asfasfasffas'),
(7, 3, 'student', 1385693271, 'asdfasdasfd'),
(8, 3, 'student', 1385693277, 'asdfasfass'),
(9, 4, 'student', 1385693369, 'afasfd'),
(10, 4, 'student', 1385693380, 'safdfas'),
(11, 5, 'student', 1385693400, 'asdfasdfsadfsadfs');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `role` char(1) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `major` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `ques` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `answer` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userid`, `password`, `role`, `email`, `name`, `major`, `tel`, `ques`, `answer`) VALUES
('student', 'student', 'S', 'student@zju.edu.cn', '某某', '计算机科学与技术', '18868813800', '三点一四一五九二六', '5358979'),
('ta', 'ta', 'A', NULL, NULL, NULL, NULL, NULL, NULL),
('teacher', 'teacher', 'T', NULL, NULL, NULL, NULL, NULL, NULL);
