-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 01:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ph19078_examphp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'giá rẻ'),
(2, 'giá không rẻ'),
(5, 'giá đắt');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL DEFAULT 'noimg.jpg',
  `intro` text NOT NULL,
  `description` text NOT NULL,
  `number_date` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `image`, `intro`, `description`, `number_date`, `price`, `category_id`) VALUES
(1, 'đà lạt tour', 'noimg.jpg', 'đi đà lạt ăn chơi ', 'đi đà lạt ăn chơi ', 1, 50000000, 1),
(2, 'hà nội tour', '756627.jpg', 'hà nội mưa gió', 'ngắm hoa', 8, 99999999, 5),
(7, 'bắc ninh tour', '756627.jpg', 'bắc ninh này nọ', 'tour bắc ninh ngắm chùa chiền', 12, 987654321, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
