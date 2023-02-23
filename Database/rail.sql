-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2023 at 03:45 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rail`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `from_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `to_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ticket_number` int NOT NULL,
  `train_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number` int NOT NULL,
  `compartment` text NOT NULL,
  `seat_number` int NOT NULL,
  `order_no` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `time`, `username`, `name`, `from_location`, `to_location`, `ticket_number`, `train_number`, `phone_number`, `compartment`, `seat_number`, `order_no`) VALUES
(1, '2023-02-20 12:13:43', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Vilupuram', 55, '55', 2147483647, '1', 55, 2),
(2, '2023-02-20 12:18:21', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Vilupuram', 55, '55', 2147483647, '1', 55, 2),
(3, '2023-02-20 12:19:12', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Vilupuram', 55, '55', 2147483647, '1', 55, 2),
(4, '2023-02-20 12:21:12', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Vilupuram', 55, '55', 2147483647, '1', 55, 2),
(5, '2023-02-20 12:21:45', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Vilupuram', 55, '55', 2147483647, '1', 55, 2),
(6, '2023-02-20 14:19:52', 'TREVOR PHILIPS', 'Muthuganesh', 'Chennai', 'Vilupuram', 55, '555', 2147483647, '1', 66, 8),
(7, '2023-02-20 15:00:29', 'TREVOR PHILIPS', 'Muthuganesh', 'Madurai', 'Coimbatore', 6, '77', 2147483647, '2', 444, 9),
(8, '2023-02-20 15:25:30', 'TREVOR PHILIPS', 'Muthuganesh', 'Chennai', 'Coimbatore', 4, '5', 2147483647, '1', 56, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_no` int NOT NULL,
  `username` text NOT NULL,
  `total_quantity` text NOT NULL,
  `total_price` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `username`, `total_quantity`, `total_price`, `time`) VALUES
(1, 1, 'TREVOR PHILIPS', '2', '60', '2023-02-20 08:41:36'),
(2, 2, 'TREVOR PHILIPS', '1', '30', '2023-02-20 08:53:38'),
(3, 3, 'TREVOR PHILIPS', '2', '70', '2023-02-20 11:07:08'),
(4, 4, 'TREVOR PHILIPS', '1', '60', '2023-02-20 11:14:01'),
(5, 5, 'TREVOR PHILIPS', '1', '60', '2023-02-20 11:39:27'),
(6, 6, 'TREVOR PHILIPS', '1', '60', '2023-02-20 12:08:01'),
(7, 7, 'TREVOR PHILIPS', '1', '60', '2023-02-20 12:09:11'),
(8, 8, 'TREVOR PHILIPS', '1', '30', '2023-02-20 14:19:21'),
(9, 9, 'TREVOR PHILIPS', '1', '30', '2023-02-20 14:59:52'),
(10, 10, 'TREVOR PHILIPS', '2', '60', '2023-02-20 15:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int NOT NULL,
  `total_price` int NOT NULL,
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `expmonth` text NOT NULL,
  `cvv` int NOT NULL,
  `total_quantity` int NOT NULL,
  `order_no` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `username`, `fullname`, `email`, `address`, `city`, `state`, `zip`, `total_price`, `cardname`, `cardnumber`, `expmonth`, `cvv`, `total_quantity`, `order_no`, `time`) VALUES
(1, 'TREVOR PHILIPS', 'muthuganesh', 'muthuganesh2205@gmail.com', '11', 'chennai', 'Tamilnadu', 627101, 30, 'yyy', '8888888888888888', 'September', 555, 1, 2, '2023-02-20 14:18:50'),
(2, 'TREVOR PHILIPS', 'muthuganesh', 'muthuganesh2205@gmail.com', '11', 'chennai', 'Tamilnadu', 627101, 30, 'TTTT', '7777777777777777', 'TTTT', 222, 1, 2, '2023-02-20 14:18:55'),
(3, 'TREVOR PHILIPS', 'muthuganesh', 'muthuganesh2205@gmail.com', '11', 'chennai', 'Tamilnadu', 627101, 60, 'wew', '4444444444444444', '2023-03', 232, 2, 10, '2023-02-20 15:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `time`, `username`, `password`) VALUES
(1, '2023-02-20 08:27:33', 'TREVOR PHILIPS', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '2023-02-20 08:27:45', 'Muthu', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
