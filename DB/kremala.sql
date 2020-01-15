-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 10:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kremala`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamestate`
--

CREATE TABLE `gamestate` (
  `word` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `attempts` int(10) NOT NULL,
  `turn` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gamestate`
--

INSERT INTO `gamestate` (`word`, `attempts`, `turn`) VALUES
('loops', 5, 'haris');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(31, 'haris', '$2y$10$2zRvX8YqD0Dzio8dcl2zN.dxhI.hwDy0vBPS3AcCBMiZGmkMdeG1e'),
(32, 'xristina', '$2y$10$da.6AhuQnnl1jjmZCIIKh.QNVmwXJIENMqngcxQuIPXQTs//gEnXG');

-- --------------------------------------------------------

--
-- Table structure for table `usersstate`
--

CREATE TABLE `usersstate` (
  `user1` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `user2` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `session_id` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `con_num` varchar(4) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `wid` int(2) NOT NULL,
  `wname` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`wid`, `wname`) VALUES
(1, 'words'),
(2, 'names'),
(3, 'loops'),
(4, 'cake'),
(5, 'family'),
(6, 'asidirop'),
(7, 'cowboy'),
(8, 'town'),
(9, 'doorbell'),
(10, 'fish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersstate`
--
ALTER TABLE `usersstate`
  ADD PRIMARY KEY (`user1`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
