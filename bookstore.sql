-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 01:39 AM
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
  `name` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `status`) VALUES
(44, '505951390', 'mervin', 'mervynaguio@gmail.com', '09354927758', 'zamboanga', 'COD', 'wmsu(2)', '100', 'Delivered'),
(45, '505951390', 'john doe', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'test_01(1)', '180', 'Delivered'),
(46, '505951390', 'Lorem Ipsum', 'lorem@yahoo.com', '09354927758', 'cabatangan', 'COD', 'wmsu(1), wmsu(3)', '459', 'Delivered'),
(47, '505951390', 'Lorem Ipsum', 'lorem@yahoo.com', '09354927758', 'cabatangan', 'COD', 'Almighty Ogosho(1)', '90', 'Delivered'),
(49, '505951390', 'Esebereke', 'test@gmail.com', '09354927758', 'zamboanga', 'COD', 'product_test(5)', '580', 'Delivered'),
(50, '505951390', 'Lorem Ipsum dolor', 'lorem@yahoo.com', '09354927758', 'cabatangan', 'COD', 'product_test(1), Almighty Ogosho(1)', '190', 'Delivered'),
(51, '', 'Mervin Naguio', 'bg201802024@wmsu.edu.ph', '09354927758', 'cabatangan', 'COD', 'product_test(1)', '180', 'Delivered'),
(52, '', 'Laicca Taquiang', 'laicca.taquiang@yahoo.com', '09354927758', 'cabatangan', 'COD', 'test_01(1)', '180', 'Delivered'),
(53, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'product_test(1), product_test(1)', '280', 'Delivered'),
(54, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'test_01(1)', '180', 'Delivered'),
(56, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'product_test(1)', '180', 'Preparing'),
(57, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'PAYPAL', 'wmsu(2)', '326', 'Preparing'),
(59, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'test_01(1)', '180', 'Preparing'),
(60, '', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'test_01(1), test_01(1)', '280', 'Pending'),
(61, '2', 'Mervin Naguio', 'mervynaguio@gmail.com', '09354927758', 'cabatangan', 'COD', 'Almighty Ogosho(1)', '90', 'Preparing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` text NOT NULL,
  `product_qty` varchar(255) NOT NULL DEFAULT '1',
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `product_desc`) VALUES
(32, 'test_01', '100', '96', '../images/ 32 .jpg', 'zxczxv', 'zxczxv'),
(33, 'product_test', '100', '89', '6421a7db708114.49486550.jpg', 'nm', 'Lorem Ipsum dolor sit amet'),
(36, 'wmsu', '123', '0', '../images/ 36 .jpg', 'awasdasd', 'Lorem Ipsum dolor sit amet'),
(37, 'Almighty Ogosho', '10', '6', '../images/ 37 .png', 'esebereke', 'esebereke'),
(38, 'product_test', '100', '97', '../images/ 38 .jpg', 'aaa', 'Lorem Ipsum dolor sit amet'),
(39, 'Raiden', '10', '100', '../images/ 39 .jpg', '', 'llll'),
(41, ' wmsu ', '100', '100', '6435f95aefde04.67478980.png', 'LE1UCP08', 'test'),
(44, 'test_01', '100', '0', '6443e08828a1f1.34529524.jpg', 'JC2LT1NY', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `product1`
--

CREATE TABLE `product1` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(55) NOT NULL,
  `product_qty` int(50) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product1`
--

INSERT INTO `product1` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `product_desc`) VALUES
(20000, 'Terracotta Clay Pots', 149, 1, 'pot1.jpeg', 'p20000', 'Terra-cotta (unglazed clay) pots are made of a particular soil and fired in kilns during the manufacturing process.'),
(20001, 'Terracotta Plastic Pot', 99, 1, 'pot2.jpg', 'p20001', 'Plastic pots are lightweight, strong and flexible.'),
(20002, 'Resin Hangging Basket', 225, 1, 'pot3.jpg', 'p20002', 'DSstyles Mini Flower Pot,Chain Hanger Flower Pot Resin Plant Hanger for Wall Decoration Countyard Garden White Large'),
(20003, 'Concrete Pots', 399, 1, 'pot4.jpg', 'p20003', 'Cement planters and concrete planters are among the many vessels in which you can grow your beloved plants.');

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(55) NOT NULL,
  `product_qty` int(50) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `product_desc`) VALUES
(45000, 'All Case Garden Tools Set', 549, 1, 'gtool1.jpg', 'p45000', 'All in one with a tool box, easy to use and store.'),
(45001, '9PCS Garden Tool Set w/ Hand Tool Gift Kit', 1699, 1, 'gtool2.jpg', 'p45001', 'High Quality Made- The stainless steel garden tools set are high quality, durable, rust-proof and non-deformable.'),
(45002, 'Hand Tools Trowel Rake Cultivator Transplant Fork.', 129, 1, 'gtool3.jpg', 'p45002', '4 pcs Garden tool for people who are trying to transfer plants to a certain place or in a pot. Buy now or regret later.'),
(45003, 'Three-Piece Multi-Purpose Gardening Tool', 75, 1, 'gtool4.jpg', 'p45003', 'Have the right tools on hand whether you re digging, planting, or weeding you can count on the ergonomic design.');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `user_id`, `fname`, `lname`, `username`, `email`, `phone`, `address`, `password`, `usertype`) VALUES
(1, '1', '', '', 'admin', '', '', '', 'admin', 'admin'),
(2, '2', 'Mervin', 'Mervs', 'user', 'test@gmail.com', '12345', 'test', '12345', 'user'),
(1903515521, '', 'John', 'Doe', 'qwerty', 'test@gmail.com', '09354927758', 'zamboanga', '12345', 'user');

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
-- Indexes for table `product1`
--
ALTER TABLE `product1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product1`
--
ALTER TABLE `product1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20006;

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45006;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1903515522;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
