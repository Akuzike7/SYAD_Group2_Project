-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maintenance-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `faults`
--

CREATE TABLE `faults` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Pending',
  `phone` int(15) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faults`
--

INSERT INTO `faults` (`id`, `description`, `category_id`, `user_id`, `location`, `status`, `phone`, `date_created`) VALUES
(1, 'broken urinal', 1, 1, 'hall 3 floor 2', 'Done', 882888136, '2022-01-06 09:25:48'),
(2, 'switch down', 2, 1, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-06 09:25:48'),
(3, 'broken fan', 2, 1, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-06 13:44:15'),
(4, 'broken door', 5, 1, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-06 14:25:51'),
(5, 'broken sink', 1, 1, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-06 16:04:41'),
(6, 'broken switch', 2, 1, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-06 16:20:20'),
(7, 'broken urinal', 2, 1, 'hall 3 floor 2', 'Done', 882888136, '2022-01-07 23:36:11'),
(12, 'broken sink', 3, 1, 'hall 7', 'Pending', 99932345, '2022-01-09 02:05:27'),
(13, 'switch down', 2, 1, 'hall 3 floor 2', 'Done', 654564546, '2022-01-09 23:45:08'),
(14, 'broken door', 3, 6, 'hall 3 floor 2', 'Pending', 907989696, '2022-01-09 23:45:08'),
(15, 'broken door', 4, 1, 'hall 3 floor 2', 'Done', 882888136, '2022-01-10 17:37:01'),
(16, 'broken door', 3, 6, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-10 17:37:01'),
(17, 'switch down', 2, 6, 'hall 3 floor 2', 'Done', 882888136, '2022-01-10 18:47:34'),
(18, 'broken door', 5, 6, 'hall 3 floor 2', 'Done', 882888136, '2022-01-10 18:47:34'),
(19, 'broken fan', 3, 6, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-10 19:39:50'),
(20, 'broken switch', 3, 6, 'hall 3 floor 2', 'Pending', 882888137, '2022-01-10 19:40:39'),
(21, 'switch down', 1, 6, 'hall 3 floor 2', 'Pending', 882888136, '2022-01-10 19:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `fault_category`
--

CREATE TABLE `fault_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fault_category`
--

INSERT INTO `fault_category` (`id`, `category`) VALUES
(1, 'Plumbing'),
(2, 'Electronic'),
(3, 'General'),
(4, 'Welding'),
(5, 'Carpentry');

-- --------------------------------------------------------

--
-- Table structure for table `fault_technician`
--

CREATE TABLE `fault_technician` (
  `id` int(11) NOT NULL,
  `fault_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fault_technician`
--

INSERT INTO `fault_technician` (`id`, `fault_id`, `technician_id`, `date_created`) VALUES
(39, 1, 3, '2022-01-07 22:18:02'),
(41, 2, 5, '2022-01-07 22:30:17'),
(42, 3, 5, '2022-01-07 22:30:17'),
(44, 4, 3, '2022-01-07 22:30:27'),
(45, 5, 3, '2022-01-07 22:30:27'),
(47, 6, 3, '2022-01-07 22:30:37'),
(49, 7, 5, '2022-01-08 00:40:42'),
(50, 8, 5, '2022-01-08 00:40:42'),
(51, 9, 5, '2022-01-08 00:40:42'),
(52, 0, 5, '2022-01-08 11:29:47'),
(53, 10, 5, '2022-01-08 11:29:47'),
(54, 11, 5, '2022-01-08 11:29:47'),
(56, 12, 3, '2022-01-09 22:31:50'),
(58, 13, 5, '2022-01-10 18:42:34'),
(59, 14, 5, '2022-01-10 18:42:34'),
(60, 16, 5, '2022-01-10 18:42:34'),
(61, 15, 5, '2022-01-10 18:42:34'),
(63, 17, 3, '2022-01-10 19:03:25'),
(64, 18, 3, '2022-01-10 19:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark` text NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `fault_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `user_id`, `remark`, `dateCreated`, `fault_id`) VALUES
(1, 1, 'Good done', '2022-01-08 17:16:17', 4),
(11, 1, 'wow', '2022-01-09 01:35:29', 7),
(13, 1, 'good job', '2022-01-10 22:56:54', 15);

-- --------------------------------------------------------

--
-- Table structure for table `remark_response`
--

CREATE TABLE `remark_response` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remark_response`
--

INSERT INTO `remark_response` (`id`, `user_id`, `remark_id`, `response`, `date_created`) VALUES
(1, 1, 1, 'we are getting there', '2022-01-09 12:22:57'),
(2, 3, 1, 'went well', '2022-01-09 13:09:12'),
(3, 1, 1, 'very good', '2022-01-09 19:41:13'),
(4, 1, 1, 'whats next', '2022-01-09 19:42:02'),
(5, 1, 11, 'this is fun', '2022-01-09 19:42:15'),
(6, 1, 11, 'i think this works', '2022-01-09 19:43:08'),
(7, 3, 1, 'we need to attend other faults', '2022-01-09 19:49:00'),
(8, 1, 1, 'hey', '2022-01-09 19:50:08'),
(9, 1, 11, 'testing testing', '2022-01-09 19:53:54'),
(10, 1, 1, 'hisi', '2022-01-10 17:12:58'),
(11, 3, 1, 'hey', '2022-01-10 17:32:16'),
(12, 1, 11, 'hey', '2022-01-10 17:32:57'),
(13, 3, 11, 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '2022-01-10 17:33:46'),
(14, 1, 1, 'sgfsgsdfdaf', '2022-01-10 22:28:23'),
(15, 1, 13, 'hey', '2022-01-10 22:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Student'),
(3, 'Lecturer'),
(4, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `phone`, `role_id`, `email`) VALUES
(1, 'admin', 'root', '$2y$10$qo0HGA7nrTKy03rlXCsYGOK./DjBeoPBbQWCmMNBqe9lhsSwOt9yG', '0882888136', 1, 'admin@gmail.com'),
(3, 'john', 'smith', '$2y$10$BHzJyHCu1Bdf6EXtbMVQQOSwMBjyHzgWNb91n8uO8aNPa3XX4UM1u', '0882888137', 4, 'johnsmith@gmail.com'),
(5, 'Jane', 'Doe', '$2y$10$xDONP/7tsBTF8rVxJTqrX.f0PA/n5CBXvsdO7Q8CQG9jpmY.a1OpC', '0882888138', 4, 'janedoe@gmail.com'),
(6, 'Hendreson', 'White', '$2y$10$IoX0GLQ8gvDTfZTb1vne/.aoqmzDzVnOsEpKvac2Uyk5B6NlueE26', '0882888123', 2, 'White@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faults`
--
ALTER TABLE `faults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1` (`user_id`),
  ADD KEY `fault` (`category_id`);

--
-- Indexes for table `fault_category`
--
ALTER TABLE `fault_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fault_technician`
--
ALTER TABLE `fault_technician`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fault_id` (`fault_id`),
  ADD KEY `fault_technician_ibfk_2` (`technician_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fault_id` (`fault_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `remark_response`
--
ALTER TABLE `remark_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user2` (`user_id`),
  ADD KEY `remark` (`remark_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faults`
--
ALTER TABLE `faults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fault_category`
--
ALTER TABLE `fault_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fault_technician`
--
ALTER TABLE `fault_technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `remark_response`
--
ALTER TABLE `remark_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faults`
--
ALTER TABLE `faults`
  ADD CONSTRAINT `fault` FOREIGN KEY (`category_id`) REFERENCES `fault_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_ibfk_1` FOREIGN KEY (`fault_id`) REFERENCES `faults` (`id`),
  ADD CONSTRAINT `remarks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `remark_response`
--
ALTER TABLE `remark_response`
  ADD CONSTRAINT `remark` FOREIGN KEY (`remark_id`) REFERENCES `remarks` (`id`),
  ADD CONSTRAINT `user2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
