-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 09:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Test category one', 'This is the first test category', '2016-06-30 16:41:08', 28),
(2, 'Random forum', 'this is a random forum category', '2016-06-30 13:24:51', 28),
(3, 'Community', '	\nGeneral Discussion', '2016-06-30 20:41:03', 28),
(4, 'MMD Modpack', 'Report problems, Suggestions and so on.', NULL, NULL),
(5, 'FTB Inventions', 'Report problems, Suggestions or just say hey :)', NULL, NULL),
(6, 'Sky Factory 2.5', 'Report problems, Suggestions or just say hey :)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(11, 3, 9, 28, 'Rules apply to all NFINIT Gaming Servers\r\n<br>\r\n[1] No Griefing\r\n<br>\r\n[2] No Spamming\r\n<br>\r\n[3] No Advertising\r\n<br>\r\n[4] No Cursing/No Constant Cursing\r\n<br>\r\n[5] No Trolling/Flaming\r\n<br>\r\n[6] No Banned Items(Tekkit Rule)\r\n<br>\r\n[7] No Asking for OP, Ranks, or Items\r\n<br>\r\n[8] Respect all Players\r\n<br>\r\n[9] Obey Staff They are the Law\r\n<br>\r\n[10] No Racist or Sexist Remarks.\r\n<br>\r\n[11] No Mods/Hacks\r\n<br>\r\n[12] No Full Caps Messages\r\n<br>\r\n[13] No Builds Near Spawn\r\n<br>\r\n[14] No 1x1 Towers\r\n<br>\r\nMod/Admin Rules:\r\n<br>\r\n[15] Be Responsible with the privileges you are given as a Builder/Mod\r\n<br>\r\n[16] Do not spawn blocks or items for other players\r\n<br>\r\n[17] When Trading, only buy and sell legit items\r\n<br>\r\n[18] Only help build for other players using legit items and blocks\r\n<br>\r\n[19] No Power Abuse\r\n', '2016-06-30 16:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_last_user` int(11) DEFAULT '0',
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(9, 3, 'Server rules', 1, 1, '2016-06-30 16:51:53', '2016-06-30 20:41:03', 36);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Active` varchar(32) NOT NULL,
  `Email_code` varchar(2000) NOT NULL,
  `pwreset_code` varchar(2000) NOT NULL,
  `Last_login` varchar(200) NOT NULL,
  `fourm_notification` enum('0','1') NOT NULL DEFAULT '1',
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Account created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UName`, `Email`, `Password`, `Active`, `Email_code`, `pwreset_code`, `Last_login`, `fourm_notification`, `UserID`, `Account created`) VALUES
('Kasparsu', 'kasparsunekaer@gmail.com', '$2y$12$PscAoVSm23sXDqzoL8Ks7ewwd88dLdNh87hhrxJRaOU4CVZrttGMu', '1', '168ae2d2a35d179810fdf9f645ec7387', 'e0e39ec6eaf276830ef29ec449180d50', '16-06-30 17:31:57\n', '1', 1, '2016-06-28 15:04:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
