-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 09:01 AM
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
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `date_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `name`, `birth_date`, `gender`, `email`, `phone`, `address`, `date_time`) VALUES
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 2147483647, 'at post navadi tal patan', '2024-03-10 22:52:34.000000'),
(45, 'Abhi Suryawanshi', '2003-05-11', 'Male', 'abhijeet@gmail.com', 2147483647, 'AP Divashi', '2024-03-11 11:53:23.000000'),
(45, 'Abhi Suryawanshi', '2003-05-11', 'Male', 'abhijeet@gmail.com', 2147483647, 'AP Divashi', '2024-03-11 11:53:58.000000'),
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 2147483647, 'at post navadi tal patan', '2024-03-11 11:58:05.000000'),
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 2147483647, 'at post navadi tal patan', '2024-03-11 11:58:50.000000'),
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 2147483647, 'at post navadi tal patan', '2024-03-11 12:04:59.000000'),
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 2147483647, 'at post navadi tal patan', '2024-03-11 13:54:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `planform`
--

CREATE TABLE `planform` (
  `id` int(20) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `bdate` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `pincode` int(10) NOT NULL,
  `pnumber` int(10) NOT NULL,
  `age` int(10) NOT NULL,
  `aadhar` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `applicationdate` date NOT NULL,
  `amount` varchar(20) NOT NULL,
  `application_no` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planform`
--

INSERT INTO `planform` (`id`, `cname`, `bdate`, `address`, `pincode`, `pnumber`, `age`, `aadhar`, `email`, `plan`, `applicationdate`, `amount`, `application_no`) VALUES
(44, 'Nikhil Uttam Patil', '2003-06-02', 'at post navadi tal patan', 415209, 2147483647, 20, 2147483647, 'np474483@gmail.com', 'Annual Plan', '2024-01-10', '2000/-', 4747),
(45, 'Abhijit Suryawanshi', '2003-05-11', 'AP Divashi', 415209, 2147483647, 20, 2147483647, 'Abhi5208@gmail.com', 'Short-Term Plan', '2024-03-11', '2000/-', 3031);

-- --------------------------------------------------------

--
-- Table structure for table `registration_form`
--

CREATE TABLE `registration_form` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(40) NOT NULL,
  `pnumber` int(10) NOT NULL,
  `crpass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_form`
--

INSERT INTO `registration_form` (`id`, `fname`, `bdate`, `gender`, `email`, `address`, `pnumber`, `crpass`) VALUES
(44, 'Nikhil Patil', '2003-06-02', 'Male', 'np474483@gmail.com', 'at post navadi tal patan', 2147483647, 12345),
(45, 'Abhi Suryawanshi', '2003-05-11', 'Male', 'abhijeet@gmail.com', 'AP Divashi', 2147483647, 12345),
(46, 'Harshad Surve', '2003-12-01', 'Male', 'harshadsurve@gmail.c', 'AP Patan', 2147483647, 12345),
(47, 'Harshad Surve', '2003-12-02', 'Male', 'harshadsurve@gmail.com', 'AP Patan', 2147483647, 12345),
(48, 'Nikhil Patil', '2003-12-01', 'Male', 'np@gmail.com', 'AP Patan', 2147483647, 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration_form`
--
ALTER TABLE `registration_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_form`
--
ALTER TABLE `registration_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
