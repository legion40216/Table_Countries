-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 08:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `countries`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries_content`
--

CREATE TABLE `countries_content` (
  `id` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `contact` int(11) NOT NULL,
  `countries` varchar(256) NOT NULL,
  `images` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries_content`
--

INSERT INTO `countries_content` (`id`, `company`, `contact`, `countries`, `images`) VALUES
(9, 'Laughing Bacchus Winecellars', 40216, 'Mexico', 'mex.svg.png'),
(21, 'Monsterinc', 2147483647, 'Italy', 'italian-flag.svg'),
(28, 'Nestle', 402166565, 'Mexico', 'mex.svg.png'),
(30, 'Laughing Bacchus Winecellars', 42016, 'England', 'uk.svg.png'),
(31, 'Wheel Fly', 4456463, 'Mexico', 'mex.svg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries_content`
--
ALTER TABLE `countries_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries_content`
--
ALTER TABLE `countries_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
