-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 10:55 AM
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
-- Database: `infinitegreendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_buyer` varchar(200) NOT NULL,
  `product_seller` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_buyer`, `product_seller`) VALUES
(2, 1, 'lily', 100, 'latest5.jpg', 'bjay', 'josh');

-- --------------------------------------------------------

--
-- Table structure for table `myads`
--

CREATE TABLE `myads` (
  `AdsId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `seller` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mybids`
--

CREATE TABLE `mybids` (
  `BidsId` int(11) NOT NULL,
  `Buyer` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `AdsId` int(11) NOT NULL,
  `bid_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `product_name` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `seller` varchar(200) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`product_name`, `product_price`, `product_image`, `seller`, `product_description`, `product_id`) VALUES
('lily', 100, 'latest5.jpg', 'josh', 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersLastname` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPhonenum` varchar(14) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `userspwd` varchar(128) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `profileimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersID`, `usersName`, `usersLastname`, `usersEmail`, `usersPhonenum`, `usersUid`, `userspwd`, `address`, `birthday`, `profileimage`) VALUES
(1, 'John', 'Doe', 'test123@gmail.com', '123123', 'test123', '$2y$10$nUfX9/KyjpuT4LXFuzwIVugAu7UrY8rQkwIHm2kCshw9cBFubbYfe', '', '0000-00-00', ''),
(2, 'joshua', 'bergado', 'jbergado@gmail.com', '09123456789', 'josh', '$2y$10$/9BuaogGe3r4ksG5U6aPA.uwBbG/8R1kDzuTJxbDJadtViXndSe1a', '', '0000-00-00', ''),
(3, 'bjay', 'medina', 'bjay@gmail.com', '1234567890', 'bjay', '$2y$10$3s3Ek3xAIejoRrZcQH..I.jOIjnUCs/LzSCs2Kjuku9wV39WhAV7W', '', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
