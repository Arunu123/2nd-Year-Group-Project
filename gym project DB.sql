-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 07:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `coaching_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`id`, `username`, `password`, `phone`, `nic`, `email`, `coaching_type`) VALUES
(9, 'kebuni', 'kebu', 704134339, '111111111112', 'kebu@gmail.com', ''),
(11, 'Arunu', 'arunu', 704134339, '123456789123', 'arunu@gmail.com', ''),
(12, 'Chanuli Gunawardane', 'senu', 704134339, '200276700453', 'chanugunawardane@gmail.com', ''),
(15, 'ashan', '2001', 763096426, '199921345321', 'ashan@gmail.com', 'martial_art'),
(16, 'dew', '1234', 704134339, '222222298765', 'dew@gmail.com', 'zumba'),
(17, 'Shashika', 'shashika', 704134339, '222222222222', 'shashikalaknath0987654321@gmail.com', 'zumba'),
(19, 'lochana', '1234', 763096425, '200116200480', 'lochana@gmail.com', 'martial_art'),
(20, 'a', '1234', 713265478, '123456789', 'abc@com', 'martial_art');

-- --------------------------------------------------------

--
-- Table structure for table `coachschedule`
--

CREATE TABLE `coachschedule` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `classDate` varchar(255) NOT NULL,
  `classType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coachschedule`
--

INSERT INTO `coachschedule` (`ID`, `Name`, `Date`, `Time`, `classDate`, `classType`) VALUES
(1, 'Arunu', '2023-11-29', '17:00:00', '2023-11-30', 'martialArt'),
(2, 'kebuni', '2023-11-29', '20:20:00', '2023-11-30', 'zumba'),
(3, 'dew', '2023-11-29', '08:00:00', '2023-12-01', 'zumba'),
(4, 'kebuni', '2023-11-29', '09:00:00', '2023-11-30', 'martialArt'),
(5, 'kebuni', '2023-11-29', '09:20:00', '2023-11-30', 'yoga'),
(6, 'ashan', '2023-11-30', '17:00:00', '2023-11-30', 'zumba');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE `contactdetails` (
  `GuestName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`GuestName`, `email`, `Message`, `id`, `Timestamp`) VALUES
('chathumi', 'chathumirajapaksha15@gmail.com', 'hii', 20, '2023-10-10 10:13:05'),
('Thumashi', 'thumashids@kdu.ac.lk', 'abc', 21, '2023-10-10 10:13:05'),
('niranga', 'niranga512@gmail.com', 'Hi', 23, '2023-10-10 12:32:24'),
('arunu', 'arunukithmina123@gmail.com', 'hii', 25, '2023-10-17 10:39:02'),
('arunu', 'arunukithmina123@gmail.com', 'Hiiiii', 30, '2023-11-30 02:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `UserName` varchar(50) NOT NULL,
  `CardNo` varchar(30) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`UserName`, `CardNo`, `Amount`, `id`, `Timestamp`) VALUES
('Arunu', '1234543267851234', '5000', 1, '2023-11-30 02:34:19'),
('chathumi', '2134654323412345', '15000', 2, '2023-11-30 02:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'admin2', '4321', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `suportdetails`
--

CREATE TABLE `suportdetails` (
  `UserName` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `ReqeustType` varchar(255) NOT NULL,
  `UserMessage` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suportdetails`
--

INSERT INTO `suportdetails` (`UserName`, `UserEmail`, `ReqeustType`, `UserMessage`, `CreatedAt`, `id`) VALUES
('Arunu', 'arunukithmina123@gmail.com', 'About-Dashboard', 'hello', '2023-11-30 02:34:48', 1),
('chathumi', 'chathumi@gmail.com', 'About-Trainer', 'abcd', '2023-11-30 03:46:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `phone` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `age` int(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `packages` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `id` int(12) NOT NULL,
  `nic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`phone`, `name`, `gender`, `age`, `height`, `weight`, `dob`, `address`, `packages`, `email`, `password`, `profile_photo`, `id`, `nic`) VALUES
(763096425, 'Arunu', 'Male', 22, '175', '65', '2001-10-06', 'kurunegala', 'Basic plan for 3 months', 'arunukithmina123@gmail.com', '1234', '656812eb75104_321.jpg', 6, '200116200480'),
(704134339, 'Senu', 'Male', 21, '180', '80', '2002-09-23', 'Gampaha', '6 months with Nutrition plan', 'chanulizone@gmail.com', 'senu', '6568168388c9e_abc.jpg', 17, '200276700453'),
(704134338, 'lochana', 'Male', 22, '150', '55', '2002-10-09', 'Tangalle', 'Diamond Fitness', 'lochana@gmail.com', '1234', '656738012d126_IMG-20231122-WA0022.jpg', 20, '299114322222'),
(763096424, 'sanjula', 'Male', 22, '170', '55', '0000-00-00', 'padukka', 'Diamond Fitness', 'sanjula@gmail.com', '1234', '', 21, '200116200485'),
(763096427, 'miyuru', 'Male', 23, '150', '65', '2000-10-06', 'kurunegala', 'Royal Fitness', 'miyuru@gmail.com', '1234', '', 22, '200085002981'),
(763096425, 'lakna', 'Male', 22, '170', '55', '2001-09-24', 'kuliyapitiya', 'Diamond Fitness', 'lakna123@gmail.com', '1234', '6567f630bd7ec_abc.jpg', 23, '200116200481'),
(714679842, 'chathumi', 'Male', 22, '150', '55', '2000-10-06', 'badulla', 'Platinum Fitness', 'chathumi@gmail.com', '1234', '', 24, '123456784561');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coachschedule`
--
ALTER TABLE `coachschedule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suportdetails`
--
ALTER TABLE `suportdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coachschedule`
--
ALTER TABLE `coachschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suportdetails`
--
ALTER TABLE `suportdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
