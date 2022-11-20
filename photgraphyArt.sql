-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 11:48 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int NOT NULL,
  `name` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `experience` int NOT NULL,
  `type` varchar(64) NOT NULL,
  `gender` varchar(24) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `email`, `password`, `experience`, `type`, `gender`, `description`) VALUES
(1, 'safayay Mahmud', 'safayay@gmail.com', 'ca3df0e21725598fdcbdd71dec1fb13d816eb091', 12, 'nature', 'Male', 'Hello This is description'),
(2, 'safayay', 'safu@gmail.com', '8b0dde2bb41871053c8ef0bc8f8d5ce546c9c223', 12, 'nature', '', ''),
(3, 'sdfs', 'sfs@gmail.com', 'ca3df0e21725598fdcbdd71dec1fb13d816eb091', 11, 'dog', '', ''),
(4, 'Rohsin Al Razi', 'razi@gmail.com', '68ea0bd3ac99784c1f1855a359aa135f50bce022', 12, 'dog', 'Male', 'something fuck up'),
(5, 'Fahim', 'Fahim.69@gmail.com', '882f285c799705090ca85529b929bbb8eeaf9f87', 12, 'erotic', 'Male', 'Hanlo this is something trust me'),
(6, 'Something', 'something@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 4, 'dog', 'Male', 'hello how are you all'),
(7, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'test', 'Male', 'test test test'),
(8, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'test', 'Male', 'test test test test'),
(9, 'safayat', 'safa@gmail.com', 'ca3df0e21725598fdcbdd71dec1fb13d816eb091', 2, 'natural', 'Male', 'hello this is 12 character');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `artist_id` int NOT NULL,
  `visitor_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `artist_id`, `visitor_id`, `status`) VALUES
(12, 3, 8, 1),
(13, 39, 8, 1),
(14, 7, 8, 1),
(15, 2, 8, 1),
(16, 1, 8, 1),
(17, 5, 8, 1),
(18, 6, 8, 1),
(19, 4, 9, 1),
(20, 1, 9, 1),
(21, 6, 9, 1),
(22, 8, 9, 1),
(23, 3, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int NOT NULL,
  `name` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `email`, `password`) VALUES
(8, 'safayay', 'safa@gmail.com', 'ca3df0e21725598fdcbdd71dec1fb13d816eb091'),
(9, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
