-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 04 日 15:10
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
CREATE DATABASE IF NOT EXISTS `sestudy` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sestudy`;

-- --------------------------------------------------------

--
-- 表的结构 `intro`
--

CREATE TABLE IF NOT EXISTS `intro` (
  `id` int(8) NOT NULL,
  `course` int(8) NOT NULL,
  `c_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `course_code` int(8) NOT NULL,
  `academy` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `credit_hour` decimal(5,1) NOT NULL,
  `week_hour` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `belong` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `requirement` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `textbook` text COLLATE utf8_unicode_ci NOT NULL,
  `c_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `e_intro` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `intro`
--

INSERT INTO `intro` (`id`, `course`, `c_name`, `e_name`, `course_code`, `academy`, `credit_hour`, `week_hour`, `season`, `belong`, `requirement`, `textbook`, `c_intro`, `e_intro`) VALUES
(1, 1, '软件需求分析与设计', 'Software Demand Analysis & Design', 22190880, '软件学院', '3.5', '3.0-1.0', '秋冬', '软件工程专业必修课', '软件工程', '《软件需求》第2版，[美] Karl E. Wiegers 著，刘伟琴、刘洪涛 译，2004年11月第1版，清华大学出版社', '《软件需求分析与设计》是软件开发及软件工程人员的一门基础技能课程，该课程主要介绍软件需求工程的基本理论，包括：需求工程的基本概念，需求工程过程主要包括需求开发和需求管理两个部分：需求开发包括需求获取、需求分析、规格定义和需求验证四个方面；需求管理包括需求评审、需求变更控制和需求跟踪等内容。\r\n同时，该课程介绍了实际的需求工程应用技术，主要包括需求获取的方法、各种需求分析技术，需求规格的要求,了解主要的需求管理工具使用方法等。\r\n该课程还介绍了软件需求分析与设计中的通用技术，主要是UML技术与方法，包括：面向对象的分析与设计技术概述、UML发展历史概述、UML技术中主要的13类图表的制作方法、设计模式概念的介绍、UML开发工具的介绍以及如何编写初步的软件概要设计说明。\r\n', 'Introduce the basic conceptions of Software Requirement Engineering\r\n	Two processes : requirement development process and requirement management process\r\n	Development : acquisition, analyst, specification & verification\r\n	Management : review, change control, management & tracing \r\nHow to used SRE in practice\r\n	Methods and techniques for acquisition, analyst & specification\r\nGeneral technique for Software Requirement Analysis & Design (SRA&D)\r\n	OOA & D\r\n	Unified Modeling Language – UML\r\n	UML history/background\r\n	13 diagrams used in UML\r\n	Design pattern conception\r\n	UML tools\r\n	Write Software Brief Design Specification\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `outline`
--

CREATE TABLE IF NOT EXISTS `outline` (
  `id` int(8) NOT NULL,
  `course` int(8) NOT NULL,
  `target` text COLLATE utf8_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8_unicode_ci NOT NULL,
  `arrangement` text COLLATE utf8_unicode_ci NOT NULL,
  `recommendation` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `outline`
--

INSERT INTO `outline` (`id`, `course`, `target`, `requirement`, `arrangement`, `recommendation`) VALUES
(1, 1, '（一）学习目标\r\n使学生系统地掌握需求开发和管理的技术和方法，掌握需求分析和建模的技术和方法，掌握需求规格的验证和评审等要点和方法，掌握应用UML进行软件分析与设计的技术和方法。\r\n（二）可测量结果\r\n结合具体的实际项目开发，解决软件项目开发中的有关需求的各种问题，能够适应目前各种应用项目的系统的需求开发和管理工作。\r\n', '（一）授课方式与要求\r\n课堂授课16次,每次3个学时,具体内容如下:\r\n知识模块		内容	学时（课堂讲授）\r\n软件需求分析与软件设计概述	需求工程发展过程\r\n软件需求分析基本概念\r\n需求工程的主要过程和方法\r\n软件设计基本概念\r\n软件设计的主要过程和方法\r\n相关知识体系介绍	6\r\n软件需求获取与分析	需求获取的指导方针\r\n需求获取的主要方法与技术\r\n需求分析的目的\r\n需求分析的主要方法	12\r\n软件需求规范与管理	需求规格说明的目的\r\n需求规格说明的主要方法\r\n需求验证与审核的主要方法\r\n需求管理的目的\r\n需求管理的主要方法与步骤	12\r\n软件设计基础	UML分析设计方法介绍\r\nUML各种建模工具（图）的作用及使用\r\n软件图形化建模工具介绍	12\r\n软件需求分析与设计实践	根据课程作业要求编写《需求分析与设计项目计划》 实践需求工程的各个过程：需求识别、需求分析与设计\r\nOOA方法，UML描述\r\n需求定义：软件需求说明文档、需求管理：变更的控制与跟踪记录报告\r\n采用UML方法，完成基本的软件概要设计说明书\r\n提出改进措施：技术方法的改进，软件需求分析及设计过程的改进建议	6\r\n\r\n（二）	考试评分与建议\r\n以大型课程作业的方式，采用项目管理的方法，对具体课程作业内容项目：对“软件工程教学辅助系统”项目的需求进行分析与设计。\r\n课程作业要求：\r\n1.	每5-8人组成一个项目小组，在项目经理（组长）的领导下，团结协作共同完成课程作业。\r\n2.	提供的《需求分析与设计项目计划》\r\n3.	实践需求工程的各个过程，主要包括：\r\na.	需求识别：教师、学生、技术专家等需求\r\nb.	重点完成需求分析与设计：OOA方法，UML描述\r\nc.	需求定义：软件需求说明文档\r\nd.	需求的确认：需求评审会议及报告，需求基准SRS\r\ne.	需求管理：变更的控制与跟踪记录报告\r\n4.	采用UML方法，完成基本的软件概要设计说明书\r\n5.	提出改进措施：\r\n	技术方法的改进，软件需求分析及设计过程的改进建议\r\n\r\n考核方式:\r\n按照课程作业的三个里程碑分别进行讲评，最后每组准备10分钟PPT进行讲解，由全部小组的组长对其进行评审、打分，去掉最高和最低分，取平均分数占总分的80%，教师综合平时情况给出的分数占20%。\r\n', '1.	秋学期第3周至冬学期第3周大致为需求开发阶段；冬学期第4至7周大致为需求维护管理阶段。\r\n2.	上表体现了课程教学小组对本课程的安排。每个小组应按照自身对项目的理解，自行独立制定项目计划。上表中的“项目任务（及里程碑）”及“截止日期”两列，仅作为各小组制定工作计划的时间框架参考，不代表最佳安排或者合理安排。\r\n	红色表示的文档（及其截止日期）应该在各项目小组的计划中，且具体安排完成时间不得迟于上表给出的指导性时间。若推迟提交，则每推迟一周扣该文档满分的10% —— “可提早，不可推迟”。\r\n	不带星号（*）的文档必须完成并提交，带星号（*）的表示选做。\r\n3.	各小组每周（至少）一次例会，有正式的例会纪要，简述刚过去的一周的进展和下一两周的计划。\r\n', '《软件需求》第2版，[美] Karl E. Wiegers 著，刘伟琴、刘洪涛 译，2004年11月第1版，清华大学出版社。\r\n《软件需求》，[美] Karl E. Wiegers 著，陆丽娜、王忠民、王志敏 译，2002年7月第1版，机械工业出版社。\r\n《统一软件开发过程》，[美] Ivar Jacobson, Grady Booch, James Rambaugh 著，周伯生、冯学民、樊东平 译，2002年1月第1版，机械工业出版社。\r\n《软件需求管理-统一方法》，[美] Dean Leffingwell Don Widrig 著，蒋慧、林东 译，2003年第1版，机械工业出版社。\r\n《面向对象技术UML教程》，王少锋 编著，清华大学出版社。\r\n《面向对象设计UML实践》，Mark Priestley著，龚晓庆、卞雷等译，王少锋审，清华大学出版社。\r\n《Practical Object-oriented Design with UML》 2th Edition，Mark priestley，清华大学出版社。\r\n《UML用户指南》第2版，Grady Booch 等著，邵维忠、麻志毅、马浩海、刘辉 译，人民邮电出版社。\r\n《UML与Rational Rose2002从入门到精通》，Wendy Boggs等著，邱促潘等译，电子工业出版社。\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `userid` varchar(20) NOT NULL,
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

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `course` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
-- 表的结构 `tinfo`
--

CREATE TABLE IF NOT EXISTS `tinfo` (
  `id` int(8) NOT NULL,
  `course` int(8) NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tinfo`
--

INSERT INTO `tinfo` (`id`, `course`, `info`) VALUES
(1, 1, '姓名：邢卫（Xing Wei）\r\n职称：PhD, Associate Prof.\r\n电话：13958030163 \r\nEmail：wxing@zju.edu.cn\r\n个人简历：\r\n1985年9月至1989年7月，浙江大学计算机系，本科生\r\n1989年9月至1992年3月，浙江大学计算机系，硬士研究生\r\n1992年4月至2002年6月，浙江大学信．息学院控制系，讲师，副教授\r\n2002年6月至现在，浙江大学计算机学院，副教授\r\n2004年9月至现在，浙江大学计算机学院，博士研究生\r\n研究领域与方向：\r\n计算机网络技术及应用、电子政务模型及应用\r\n\r\n\r\n\r\n姓名：胡天磊（Hu Tian-lei）\r\n职称：PhD, Associate Prof.\r\n电话：13958091761\r\nEmail：htl@zju.edu.cn\r\n个人简历：\r\n\r\n研究领域与方向： \r\n\r\n\r\n\r\n姓名：刘玉生（Liu Yu-sheng）\r\n职称：PhD, Associate Prof.\r\n电话：13093781234\r\nEmail：ysliu@cad.zju.edu.cn\r\n个人简历：\r\nBorn in Liling, Hunan, China,  1970.\r\nB.S. Chinese University of Mining and Tech,1992.\r\nM.S. Zhejiang University, 1995.\r\nPh.D. Zhejiang University, 2000.\r\n研究领域与方向： \r\nModel-driven Engineering Design; Model-based Systems Engineering (MBSE)\r\nMulti-disciplinary Mechatronic System Modeling, Design and Simulation\r\nCAD/CAE/CAM Integration & Virtual Prototyping\r\n3D Model Retrieval & Knowledge Reuse\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(20) DEFAULT NULL,
  `class_id` int(8) DEFAULT NULL,
  `group_id` int(8) DEFAULT NULL,
  `number_of_comment` int(4) DEFAULT NULL,
  `time` int(16) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`topic_id`, `author_id`, `class_id`, `group_id`, `number_of_comment`, `time`, `content`) VALUES
(1, 'abc', 1, 1, 4, 100, 'cdadsofjadosjf'),
(2, 'student', 1, 1, 2, 1385691212, 'sad'),
(3, 'student', 1, 1, 2, 1385691761, 'asdfads'),
(4, 'student', 1, 1, 2, 1385691861, 'asdfads'),
(5, 'student', 1, 1, 1, 1385691934, 'asdfads'),
(6, 'student', 1, 1, 0, 1385691942, 'aaaaaaaaaaa'),
(7, 'student', 1, 1, 0, 1385693394, 'asdfasdfasdsad\n');

-- --------------------------------------------------------

--
-- 表的结构 `topiccomment`
--

CREATE TABLE IF NOT EXISTS `topiccomment` (
  `comment_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_id` int(8) DEFAULT NULL,
  `author_id` varchar(20) DEFAULT NULL,
  `time` int(16) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `topiccomment`
--

INSERT INTO `topiccomment` (`comment_id`, `topic_id`, `author_id`, `time`, `content`) VALUES
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
