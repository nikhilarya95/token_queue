-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 06:53 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokenqueue`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_detail`
--

CREATE TABLE `client_detail` (
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `com_shop_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_detail`
--

INSERT INTO `client_detail` (`first_name`, `last_name`, `mobile`, `email`, `password`, `com_shop_name`) VALUES
('Nikhil', 'Kumar', '9113110942', 'nikhilarya95@gmail.com', 'Nikhil@95', 'KONGU ENGINEERING COLLEGE');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`first_name`, `last_name`, `mobile`, `email`) VALUES
('Nikhil', 'Kumar', '9113110942', 'nikhilarya95@gmail.com'),
('Nikhil', 'Kumar', '9113110942', 'nikhilrya95@gmail.com'),
('Nikhil', 'Kumar', '9113110942', 'nikilarya95@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `otp_detail`
--

CREATE TABLE `otp_detail` (
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` int(10) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token_detail`
--

CREATE TABLE `token_detail` (
  `serial_no` int(15) NOT NULL,
  `token_no` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `form_name` varchar(150) NOT NULL,
  `date_of_token` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_detail`
--

INSERT INTO `token_detail` (`serial_no`, `token_no`, `email`, `form_name`, `date_of_token`) VALUES
(2, 1, 'nikhilarya95@gmail.com', 'nn', '05/07/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_detail`
--
ALTER TABLE `client_detail`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `otp_detail`
--
ALTER TABLE `otp_detail`
  ADD KEY `email` (`email`);

--
-- Indexes for table `token_detail`
--
ALTER TABLE `token_detail`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `token_detail`
--
ALTER TABLE `token_detail`
  MODIFY `serial_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otp_detail`
--
ALTER TABLE `otp_detail`
  ADD CONSTRAINT `otp_detail_ibfk_1` FOREIGN KEY (`email`) REFERENCES `client_detail` (`email`);

--
-- Constraints for table `token_detail`
--
ALTER TABLE `token_detail`
  ADD CONSTRAINT `token_detail_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer_detail` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
