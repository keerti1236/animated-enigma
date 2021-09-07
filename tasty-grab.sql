-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 01:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty-grab`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback`) VALUES
('tastes good'),
('Nice work'),
('chicken pizza tastes good'),
('Nice work'),
('Chicken pizza Excellent'),
('Awesome Cheese pizza');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `pizza_name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email_id`, `pizza_name`, `area`, `qty`, `total`, `time`) VALUES
(5, 'keerthana5112k@gmail.com', 'Veg Pizza', 'Bhuvaneshwari', 1, 99, '2021-01-10 12:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizza_name` varchar(255) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizza_name`, `cost`) VALUES
('Cheese  Tomato', 165),
('Corn Pizza', 149),
('Margherita', 123),
('Mushroom Pizza', 100),
('Veg double cheese Pizza', 370),
('Veg Pizza', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `user_passwd` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `email_id`, `ph_no`, `user_passwd`, `area`) VALUES
('Dilli', 'dilli@gmail.com', '7353330985', '202cb962ac59075b964b07152d234b70', 'Maruthinagar'),
('KEERTHANA D', 'dvpk511@gmail.com', '6361521713', 'd702af1d701d104102bc3b3c4292a803', 'Maruthinagar'),
('THANA D', 'dvpk5@gmail.com', '9164734140', 'c44755c3379313db173e53c3e8fb6701', 'Kengeri'),
('KEERTHANA D', 'keerthana5112k@gmail.com', '9164734147', '202cb962ac59075b964b07152d234b70', 'Kengeri'),
('Keerthana D', 'keerthanadillikumar@gmail.com', '9743509730', 'a760880003e7ddedfef56acb3b09697f', 'Bhuvaneshwarinagar'),
('DilliKumar B', 'tastygrab@gmail.com', '7353330985', 'c7217b04fe11f374f9a6737901025606', 'T Nagar'),
('Veda', 'veda@gmail.com', '8147212602', '202cb962ac59075b964b07152d234b70', 'Yashwanthpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fkuser` (`email_id`),
  ADD KEY `fkpizza_name` (`pizza_name`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkpizza_name` FOREIGN KEY (`pizza_name`) REFERENCES `pizza` (`pizza_name`),
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`email_id`) REFERENCES `user` (`email_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
