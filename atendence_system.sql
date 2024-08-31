-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 01:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atendence_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `student_name`, `roll_no`) VALUES
(1, 'samruddhi', '24'),
(2, 'gayatri', '36'),
(3, 'shivani', '14'),
(4, 'anuja', '77'),
(5, 'minakshi', '17'),
(6, 'Gaurav wakchaure', '77');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record`
--

CREATE TABLE `attendence_record` (
  `id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `attendence_status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence_record`
--

INSERT INTO `attendence_record` (`id`, `student_name`, `roll_no`, `attendence_status`, `date`) VALUES
(1, 'samruddhi', '24', 'Present', '2024-02-28'),
(2, 'gayatri', '36', 'Absent', '2024-02-28'),
(3, 'shivani', '14', 'Absent', '2024-02-28'),
(4, 'anuja', '77', 'Present', '2024-02-28'),
(5, 'samruddhi', '24', 'Present', '2024-02-29'),
(6, 'gayatri', '36', 'Absent', '2024-02-29'),
(7, 'shivani', '14', 'Absent', '2024-02-29'),
(8, 'anuja', '77', 'Present', '2024-02-29'),
(9, 'minakshi', '17', 'Present', '2024-02-29'),
(10, 'Gaurav wakchaure', '77', 'Absent', '2024-02-29'),
(11, 'samruddhi', '24', 'Present', '2024-03-01'),
(12, 'gayatri', '36', 'Present', '2024-03-01'),
(13, 'shivani', '14', 'Present', '2024-03-01'),
(14, 'anuja', '77', 'Present', '2024-03-01'),
(15, 'minakshi', '17', 'Present', '2024-03-01'),
(16, 'Gaurav wakchaure', '77', 'Present', '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record2`
--

CREATE TABLE `attendence_record2` (
  `id` int(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `attendence_status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendence_staff`
--

CREATE TABLE `attendence_staff` (
  `id` int(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence_staff`
--

INSERT INTO `attendence_staff` (`id`, `staff_name`, `subject`) VALUES
(2, 'minakshi', 'OS'),
(3, 'pathan sir ', 'java'),
(5, 'samuradhi', 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_record`
--
ALTER TABLE `attendence_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_record2`
--
ALTER TABLE `attendence_record2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_staff`
--
ALTER TABLE `attendence_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendence_record`
--
ALTER TABLE `attendence_record`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attendence_record2`
--
ALTER TABLE `attendence_record2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence_staff`
--
ALTER TABLE `attendence_staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
