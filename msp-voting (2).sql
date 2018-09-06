-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2018 at 05:16 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msp-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

DROP TABLE IF EXISTS `admin_list`;
CREATE TABLE IF NOT EXISTS `admin_list` (
  `username` varchar(100) NOT NULL,
  `user_id` int(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`username`, `user_id`, `password`) VALUES
('admin1', 1, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_elements`
--

DROP TABLE IF EXISTS `frontend_elements`;
CREATE TABLE IF NOT EXISTS `frontend_elements` (
  `element_name` varchar(1000) NOT NULL,
  `element` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frontend_elements`
--

INSERT INTO `frontend_elements` (`element_name`, `element`) VALUES
('year', '2018'),
('slideImage1', '2.jpg'),
('slideImage2', '4.jpg'),
('mainQuoteInImage1', 'Inter University Games 2018'),
('mainQuoteInImage2', 'Inter University Games'),
('smallQuoteInImage1', 'Vote  For Your Player'),
('smallQuoteInImage2', 'Vote For Your Player'),
('parellexImage', 'city.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE IF NOT EXISTS `user_list` (
  `uid` varchar(150) NOT NULL,
  `voted_player` varchar(150) NOT NULL,
  `voted_time` varchar(150) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`uid`, `voted_player`, `voted_time`) VALUES
('user 1', '18', '2018/08/28 19:15:47'),
('user 2', '19', '2018/07/26 08:32:33'),
('user 3', '18', '2018/07/27 18:00:49'),
('user 4', '19', '2018/07/27 18:27:29'),
('us', '', ''),
('Mahbub Tito', 'tito', '8cb2237d0679ca88db6464eac60da96345513964'),
('user 90', '', ''),
('m8gCMxNsaVN6tOV9e68XaVBJ1Lu2', '15', '2018/09/06 22:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

DROP TABLE IF EXISTS `user_reg`;
CREATE TABLE IF NOT EXISTS `user_reg` (
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`username`, `password`) VALUES
('user 1', '1111'),
('user 2', '1234'),
('user 3', '1111'),
('user 4', '1111'),
('user 5', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `vote_table`
--

DROP TABLE IF EXISTS `vote_table`;
CREATE TABLE IF NOT EXISTS `vote_table` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(150) NOT NULL,
  `university` varchar(150) NOT NULL,
  `sport` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `number_of_votes` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_table`
--

INSERT INTO `vote_table` (`id`, `player_name`, `university`, `sport`, `image`, `number_of_votes`) VALUES
(15, 'Player 4', 'University 4', 'Sport 4', 'images.jpg', 30),
(16, 'Player 5', 'uni 5', 'sp 5', 'download (2).jpg', 3),
(17, 'pl 6', 'uni 6', 'sp 6', 'download (6).jpg', 3),
(12, 'Player 2', 'University 2', 'Sport 2', 'download (3).jpg', 79),
(11, 'Player 1', 'University 1', 'Sport 1', 'download (4).jpg', 0),
(18, 'pl 7', 'uni 7', 'sp 7', 'download (6).jpg', 1014),
(19, 'pl 8', 'uni 8', 'sp 8', 'download (5).jpg', 1085),
(20, 'pl 9', 'uni 9', 'sp 9', 'download (3).jpg', 2),
(21, 'plo', 'arsg', 'ef', 'download (6).jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
