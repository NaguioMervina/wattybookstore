-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 07:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` int(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `status`) VALUES
(1, '1718583946', 'test tester', 'mervynaguio@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_01(1)', '180', 'Delivered'),
(2, '1718583946', 'john doe', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_02(1)', '130', 'Out for Delivery'),
(3, '1718583946', 'test tester', 'mervynaguio@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_01(1)', '180', 'Out for Delivery'),
(4, '1718583946', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'test_01(1)', '180', 'Preparing'),
(5, '1718583946', 'john doe', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_02(2)', '180', 'Preparing'),
(6, '1464132597', 'test tester', 'mervynaguio@gmail.com', '09354927758', 'zamboanga', 'COD', 'peculiars tale(1),  Raiden (1)', '303', 'Delivered'),
(7, '1464132597', 'john doe', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'Will you cry when i die(3)', '230', 'Pending'),
(8, '1464132597', 'myk', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_01(1)', '180', 'Pending'),
(9, '2064381637', 'john doe', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'peculiars tale(1)', '180', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL DEFAULT '1',
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `product_desc`) VALUES
(1, 'test_01', '100', '1', '6447a90ecce0f4.06658910.jpg', 'CT8XIUFB', 'test'),
(3, 'peculiars tale', '100', '98', '6448e09c1472c4.92613468.PNG', '9Q6U648D', 'test'),
(4, ' Raiden ', '123', '95', '64491d82c81b89.36599994.PNG', '665G8SPX', 'test'),
(5, 'Will you cry when i die', '50', '49', '644a6ac8decdf5.34153730.jpg', 'DK6SU9OJ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `fname`, `lname`, `username`, `email`, `password`, `usertype`) VALUES
(1, '', '', '', 'admin', '', '12345', 'admin'),
(1821304527, '1718583946', 'Mervin', 'Naguio', 'tester', 'mervynaguio@gmail.com', '12345', 'user'),
(1821304528, '1464132597', 'Mervin', 'Naguio', 'user', 'mervynaguio@gmail.com', '12345', 'user'),
(1821304529, '', '', '', 'admins', '', '12345', 'admin'),
(1821304530, '2064381637', 'John', 'Doe', 'test', 'test@gmail.com', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1821304531;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
