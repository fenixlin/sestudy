SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `sestudy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sestudy`;

CREATE TABLE IF NOT EXISTS `sre_stu` (
  `userid` varchar(20) NOT NULL,
  `class` int(11) NOT NULL,
  `team` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sre_stu` (`userid`, `class`, `team`) VALUES
('student', 1, NULL);

CREATE TABLE IF NOT EXISTS `sre_tch` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sre_tch` (`id`, `userid`, `class`) VALUES
(1, 'teacher', 1),
(2, 'ta', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`userid`, `password`, `role`, `email`, `name`, `major`, `tel`, `ques`, `answer`) VALUES
('student', 'student', 'S', NULL, NULL, NULL, NULL, NULL, NULL),
('ta', 'ta', 'A', NULL, NULL, NULL, NULL, NULL, NULL),
('teacher', 'teacher', 'T', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
