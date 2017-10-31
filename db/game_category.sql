-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 09:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogame`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_category`
--

CREATE TABLE `game_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `icon` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_category`
--

INSERT INTO `game_category` (`id`, `slug`, `title`, `body`, `icon`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'chien-thuat', 'Arcade', NULL,'icon.png', NULL, NULL, 1, 1502275590, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_game_category_section` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_category`
--
ALTER TABLE `game_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_category`
--
ALTER TABLE `game_category`
  ADD CONSTRAINT `fk_game_category_section` FOREIGN KEY (`parent_id`) REFERENCES `game_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
