-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 05:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslog`
--

CREATE TABLE `accesslog` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `timelogin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesslog`
--

INSERT INTO `accesslog` (`user_id`, `username`, `timelogin`) VALUES
(36, 'edehf30scmp8ijr417v7bqsn9j', 0),
(37, '894eu6dfosvblmsmkkuclubm7l', 0),
(38, '894eu6dfosvblmsmkkuclubm7l', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_table`
--

CREATE TABLE `invoice_table` (
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `invoice_value` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_table`
--

INSERT INTO `invoice_table` (`invoice_id`, `order_id`, `customer`, `invoice_value`, `created_at`, `status`) VALUES
(202111001, 10001, 'AN', 1000, '0000-00-00 00:00:00', 'shipped'),
(202111002, 10002, 'BB', 1000, '0000-00-00 00:00:00', 'shipped'),
(202111003, 10003, 'CC', 1500, '0000-00-00 00:00:00', 'invoiced'),
(202111004, 10005, 'DD', 1500, '0000-00-00 00:00:00', 'invoiced'),
(202111006, 10006, 'FF', 1000, '0000-00-00 00:00:00', 'shipped'),
(202111008, 10008, 'HH', 1000, '0000-00-00 00:00:00', 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE `orders_table` (
  `orderid` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `order_value` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_table`
--

INSERT INTO `orders_table` (`orderid`, `customer`, `order_value`, `created_at`, `status`) VALUES
(10001, 'CC', 1000, '0000-00-00 00:00:00', 'shipped'),
(10004, 'DD', 1500, '0000-00-00 00:00:00', 'invoiced'),
(10005, 'EE', 1500, '0000-00-00 00:00:00', 'pending'),
(10007, 'KK', 2000, '0000-00-00 00:00:00', 'pending'),
(10014, 'DD', 1500, '0000-00-00 00:00:00', 'invoiced');

-- --------------------------------------------------------

--
-- Table structure for table `roles_master`
--

CREATE TABLE `roles_master` (
  `role_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_master`
--

INSERT INTO `roles_master` (`role_id`, `name`) VALUES
(1, 'admin_user'),
(2, 'order_user'),
(3, 'invoice_user'),
(4, 'ship_user');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_table`
--

CREATE TABLE `shipment_table` (
  `ship_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment_table`
--

INSERT INTO `shipment_table` (`ship_id`, `invoice_id`, `order_id`, `customer`, `value`, `created_at`, `status`) VALUES
(202100001, 202111001, 10001, 'AA', 1000, '0000-00-00 00:00:00', 'shipped'),
(202100002, 202111002, 10008, 'BB', 1000, '0000-00-00 00:00:00', 'shipped'),
(202100003, 202111003, 10003, 'CC', 1000, '0000-00-00 00:00:00', 'shipped'),
(202100004, 202111004, 10004, 'DD', 1000, '0000-00-00 00:00:00', 'shipped'),
(202100005, 202111005, 10001, '\r\nEE', 1000, '0000-00-00 00:00:00', 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `track_log_user`
--

CREATE TABLE `track_log_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `logout_date` date NOT NULL,
  `logout_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `mobile`, `email_id`, `role_id`, `created_at`, `status`) VALUES
(1, 'sampleuserone', '64cdac4a6af4ae553a55ebc25c7367e7', '2147483647', 'test@gmail.com', 1, '2021-01-01 00:10:10', 1),
(2, 'sampleusertwo', '9dbe10a4108d5262221dcc28e8084e98', '2147483647', 'test2@gmail.com', 2, '2021-01-01 00:10:10', 1),
(3, 'sampleuserthree', 'ee48ff957a342d597fd3fd5b80abdc23', '2147483647', 'test3@gmail.com', 3, '2021-01-01 00:10:10', 1),
(4, 'sampleuserfour', '799b60e4aa43ae60fc4a87b71aac5913', '2147483647', 'test4@gmail.com', 4, '2021-01-01 00:10:10', 1),
(5, 'rishitha', 'bb401e17be8c10d6bb8e0a7a2a22695a', '6303705018', 'rishitha@123', 1, '2022-02-22 07:29:44', 1),
(6, 'rishitha1', '254877852cc100aaafeb23a21acda391', '6303705019', 'rishitha@123', 2, '2022-02-22 07:37:46', 1),
(12, 'rajesh', 'bf44e33d9745e04551770c7a5a6cdb3b', '6303817605', 'rajesh@1223', 1, '2022-02-22 07:54:39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslog`
--
ALTER TABLE `accesslog`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `roles_master`
--
ALTER TABLE `roles_master`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shipment_table`
--
ALTER TABLE `shipment_table`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslog`
--
ALTER TABLE `accesslog`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
