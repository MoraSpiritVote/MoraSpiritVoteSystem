-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 07:18 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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

CREATE TABLE `admin_list` (
  `username` varchar(100) NOT NULL,
  `user_id` int(15) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`username`, `user_id`, `password`) VALUES
('admin1', 1, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `uid` varchar(150) NOT NULL,
  `voted_player` varchar(150) NOT NULL,
  `voted_time` varchar(150) NOT NULL
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
('m8gCMxNsaVN6tOV9e68XaVBJ1Lu2', '15', '2018/09/06 22:30:15'),
('SGUBqiSCLMcRWFBaB8js6lNEL3V2', '12', '2018/09/13 01:12:55'),
('eNX8I67xIGR8DmCshozj77iRF3k1', '17', '2018/10/12 01:49:00'),
('EAADr6wxoHqIBAL8m9xyMCFz4KZBWtKDlfu3Ol6ABsKQrXVWooLDE4pDWLlrvYFDCXij89KCN5QM8G0ai5Imvb9furKif56ejKwwnZAdz7bQ78KuhnUOr8DHI8ZB55lzk67zmuq8EC24Or8MATmDve', '', ''),
('KrnLARWa4ROB5C2qgsNvBHPZol53', '', ''),
('U9P80Opl9LR1kFcRXKB2nbRXprf1', '', ''),
('KKyJAjHimZXa1z7C9Tzhq7yNrDh2', '11', '2018/10/12 17:46:30'),
('o1XOl54wIfcmLaCygoDwAlvuA6p1', '', ''),
('E62KGz3Vh0f9mTvTba8jd2jD9O52', '28', '2018/11/05 11:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `vote_table`
--

CREATE TABLE `vote_table` (
  `id` int(150) NOT NULL,
  `player_name` varchar(150) NOT NULL,
  `university` varchar(150) NOT NULL,
  `sport` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `number_of_votes` int(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_table`
--

INSERT INTO `vote_table` (`id`, `player_name`, `university`, `sport`, `image`, `number_of_votes`) VALUES
(31, 'Nadun Pulasthi', 'IJG', 'Open', 'ab13f379931110452881bfeb8bf88bd3user-05.jpg', 0),
(32, 'O P Q Malshan', 'SJP', 'Karate', 'cf8f7abc709204727fb20e5b49bbb4d6user-02.jpg', 0),
(33, 'J R B K Ahmed', 'ASD', 'Badminton', '56210a7272438fcc9e41a40c1ad1a032user-04.jpg', 0),
(30, 'A B C Gunawardena', 'UOR', 'Volleyball', '650d76e84462ecfeb973722900740f05user-04.jpg', 0),
(28, 'L M S Fernando', 'UOC', 'Cricket', '1d921f4adf3d11faaa9ade2423f3e637user-02.jpg', 1),
(29, 'Q W E Hemachandra', 'UOK', 'Football', 'c0463d12eabec238859d3db2c16e1ac3user-03.jpg', 0),
(27, 'I J S Perera', 'UOM', 'Swimming', 'c86cb9093728ee72cce5b2aa19bdb8a7user-01.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vote_table`
--
ALTER TABLE `vote_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vote_table`
--
ALTER TABLE `vote_table`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
