-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 07:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunaiku`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_loan`
--

CREATE TABLE `user_loan` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `id_card` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `loan_period` varchar(100) NOT NULL,
  `loan_purpose` enum('vacation','renovation','electronics','wedding','rent','car','investment') NOT NULL,
  `birth` date NOT NULL,
  `sex` enum('M','L') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_loan`
--

INSERT INTO `user_loan` (`id`, `first_name`, `last_name`, `id_card`, `loan_amount`, `loan_period`, `loan_purpose`, `birth`, `sex`) VALUES
(1, 'Agus', 'Tino', '123124124', '4555', '67000', 'vacation', '2020-03-10', 'M'),
(2, 'Agus', 'Tino', '123124124', '3444', '2334', 'vacation', '2020-03-10', 'M'),
(3, 'Agus', 'Tino', '123124124', '2333', '67000', 'vacation', '2020-03-17', 'M'),
(4, 'Agus', 'Tino', '123124124', '3446', '2334', 'vacation', '2020-03-10', 'M'),
(5, 'Agus', 'Tino', '123124124', '5666', '67000', 'vacation', '2020-03-10', 'M'),
(6, 'Agus', 'Tino', '123124124', '3444', '2334', 'vacation', '2020-03-10', 'M'),
(7, 'Agus', 'Tino', '123124124', '3444', '2334', 'vacation', '2020-03-10', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_loan`
--
ALTER TABLE `user_loan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_loan`
--
ALTER TABLE `user_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
