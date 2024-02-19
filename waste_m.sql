-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2023 at 01:07 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waste_m`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_assign` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `name`, `email`, `subject`, `message`, `status`, `d_assign`) VALUES
(2, 'user', 'malinduomantha3@gmail.com', 'efgfytrtrgrg', 'htythytuyujgnmiu\r\ntrhytryuyuyt\r\ntryhtruyt', 'Approved', 14),
(3, 'Thushara Dissanayake', 'dmthushara@gmail.com', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Rejected', 11),
(4, 'Dissanayake', 'dm@gmail.com', 'test2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Rejected', 14),
(5, 'Thushara Dissanayake', 'dmthushara@gmail.com', 'fgfdg', 'fdgfd', 'Approved', 17),
(6, 'Anjitha', 'anji123@gmail.com', 'complain about garage', 'yerthtrhytfrhyfgerytgtr\r\nyythtuhtuuth', 'Approved', 17),
(7, 'Anjitha', 'anji123@gmail.com', 'complain about garage', 'tyhtghrx gfjhgh\r\nhgfhgfhgfg\r\nthythtghb', 'Approved', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(13, 'Srimal', 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'admin'),
(16, 'ushara', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(11, 'malindu', 'malinduomantha2@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'driver'),
(14, 'Janith', 'mali@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'driver'),
(15, 'Anjitha', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(17, 'driver', 'driver@gmail.com', 'e2d45d57c7e2941b65c6ccd64af4223e', 'driver');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
