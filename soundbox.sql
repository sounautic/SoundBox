-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 11:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soundbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
`id` int(11) NOT NULL COMMENT 'the id of the playlist',
  `creator` int(11) NOT NULL COMMENT 'references the creator (user) by their id',
  `name` varchar(35) NOT NULL DEFAULT 'New Playlist' COMMENT 'the name given to the playlist',
  `private` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'if set to true supposedly only the creator can access it',
  `playcount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `creator`, `name`, `private`, `playcount`) VALUES
(1, 1, 'My Playlist', 0, 0),
(2, 2, 'My Playlist', 1, 0),
(3, 1, 'My Playlist 2', 0, 0),
(4, 1, 'My Playlist 3', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `playlist_item`
--

CREATE TABLE IF NOT EXISTS `playlist_item` (
`id` int(11) NOT NULL COMMENT 'the id of the entry',
  `playlist_id` int(11) NOT NULL COMMENT 'the id of the playlist this video belongs to',
  `comment` longtext COMMENT 'any comment on the video',
  `link` varchar(20) NOT NULL COMMENT 'the v parameter for a video on youtube'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlist_item`
--

INSERT INTO `playlist_item` (`id`, `playlist_id`, `comment`, `link`) VALUES
(7, 1, NULL, 'qycqF1CWcXg'),
(8, 1, NULL, 'CcsUYu0PVxY'),
(9, 1, NULL, 'WVP3fUzQHcg'),
(10, 1, NULL, 'FOIjvHjK0Rw'),
(11, 1, NULL, 'E2LM3ZlcDnk'),
(12, 2, NULL, 'vCYk9CRx0g8'),
(13, 2, NULL, 'hDhTqF3_JWs'),
(14, 2, NULL, 'BuzrLx-fRco'),
(15, 1, NULL, 'vCYk9CRx0g8'),
(16, 1, NULL, 'hDhTqF3_JWs'),
(17, 3, NULL, 'vCYk9CRx0g8'),
(18, 3, NULL, 'hDhTqF3_JWs');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(36) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'The user_id this session is associated with',
  `last_action` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `pic` varchar(35) DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `location` text NOT NULL,
  `profile` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `username`, `first_name`, `last_name`, `pic`, `private`, `location`, `profile`) VALUES
(1, 'youtuber1', 'John', 'Smith', NULL, 0, 'Vancouver', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo eu ante viverra elementum. Mauris egestas nec turpis quis dignissim. Morbi viverra nec neque ac consequat. Nam lacinia tempor tortor, et scelerisque justo cursus eu. Nullam commodo libero maximus tellus maximus posuere. Vivamus et faucibus dolor. Nunc efficitur dolor sit amet arcu convallis, et tempor lacus tincidunt. Vivamus sed vulputate dolor, bibendum porttitor lacus. Praesent vel ipsum nec tellus gravida elementum. Vestibulum vitae velit nec justo ullamcorper commodo. Phasellus vel nisi at turpis mollis vestibulum sed vel felis. Donec et fringilla nisl, sed tempor mauris.'),
(2, 'youtuber2', 'Billy', 'Bob', NULL, 1, 'Surrey', 'Nam quis libero commodo, accumsan turpis nec, posuere libero. Ut dictum at urna rutrum aliquam. Curabitur sodales lacus ac ligula tristique, eu tincidunt mi tincidunt. Nam scelerisque rhoncus sem, in egestas nulla condimentum quis. Curabitur porttitor quam eu dignissim fermentum. Nulla facilisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla nibh nisi, congue at condimentum at, viverra ut nibh. Aliquam erat volutpat. Mauris ante erat, vehicula nec lectus ac, accumsan pulvinar purus. Suspendisse potenti. Mauris quis scelerisque tortor. Suspendisse in elit pulvinar, pretium ante a, tempus mi.'),
(3, 'youtuber3', 'Michael', 'Mahneke', NULL, 0, 'Surrey', 'Curabitur pellentesque aliquam facilisis. Duis dolor nibh, hendrerit ut bibendum eget, commodo a enim. Sed imperdiet tincidunt ante. Sed eu nisl orci. Donec et velit blandit, semper dolor et, condimentum magna. Donec aliquam quis lorem sit amet eleifend. Cras laoreet ut risus semper tempor. Proin et tempor arcu. Ut non libero gravida, aliquam turpis et, condimentum odio. In non fermentum turpis. Proin id porttitor enim. Quisque id consectetur magna. Morbi et orci vel risus pretium dapibus sed sit amet justo.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
 ADD PRIMARY KEY (`id`), ADD KEY `creator` (`creator`);

--
-- Indexes for table `playlist_item`
--
ALTER TABLE `playlist_item`
 ADD PRIMARY KEY (`id`), ADD KEY `playlist_id` (`playlist_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'the id of the playlist',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `playlist_item`
--
ALTER TABLE `playlist_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'the id of the entry',AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user_detail` (`id`);

--
-- Constraints for table `playlist_item`
--
ALTER TABLE `playlist_item`
ADD CONSTRAINT `playlist_item_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_detail` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
