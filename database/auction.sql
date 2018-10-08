-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 11:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_banks`
--

CREATE TABLE `ac_banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_banks`
--

INSERT INTO `ac_banks` (`bank_id`, `bank_name`, `status`, `entry_date`, `created_date`) VALUES
(1, 'annndraaaa', 1, '2018-09-24', '2018-09-27 07:45:29'),
(2, 'bank2', 0, '2018-09-24', '2018-09-24 05:16:43'),
(3, 'bank', 0, '2018-09-27', '2018-09-27 07:10:18'),
(4, 'bank testt', 0, '2018-09-27', '2018-09-27 07:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `ac_categories`
--

CREATE TABLE `ac_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_categories`
--

INSERT INTO `ac_categories` (`category_id`, `name`, `icon`, `status`, `entry_date`, `created_date`) VALUES
(1, 'Properties', 'home.png', 1, '2018-09-26', '2018-09-28 06:53:32'),
(2, 'Vehicles', 'car.png', 0, '2018-09-26', '2018-09-26 07:25:28'),
(3, 'Travel Equipments', 'suitcase.png', 0, '2018-09-26', '2018-09-26 07:24:55'),
(4, 'Distinguished Plates', 'vehicle-plate.png', 0, '2018-09-26', '2018-09-26 07:24:24'),
(5, 'Mobile', 'mobile.png', 0, '2018-09-26', '2018-09-26 07:23:56'),
(6, 'Laptop', 'laptop.png', 0, '2018-09-26', '2018-09-26 07:23:12'),
(7, 'Luxury', 'luxury.png', 0, '2018-09-26', '2018-09-26 07:22:14'),
(8, 'Electronics', 'electronics.png', 0, '2018-09-26', '2018-09-26 07:21:19'),
(9, 'Othersss', 'more.png', 0, '2018-09-26', '2018-09-26 08:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `ac_favourites`
--

CREATE TABLE `ac_favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_favourites`
--

INSERT INTO `ac_favourites` (`id`, `user_id`, `product_id`, `added_date`, `created_date`) VALUES
(1, 1, 1, '2018-10-01', '2018-10-01 05:41:25'),
(2, 1, 2, '2018-10-01', '2018-10-01 05:41:41'),
(3, 1, 5, '2018-10-01', '2018-10-01 05:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `ac_products`
--

CREATE TABLE `ac_products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `selling_price` varchar(250) NOT NULL,
  `current_bid_amount` float(11,2) NOT NULL,
  `bid_start_date_time` datetime NOT NULL,
  `bid_end_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_products`
--

INSERT INTO `ac_products` (`product_id`, `user_id`, `product_name`, `category_id`, `description`, `selling_price`, `current_bid_amount`, `bid_start_date_time`, `bid_end_date_time`, `status`, `entry_date`, `created_date`) VALUES
(1, 1, 'testttt', 9, 'tetstt ttevhv bjbdsn sbjabjbas sajbdjbsajdb', '5000', 8500.00, '2018-09-27 12:00:00', '2018-09-30 12:00:00', 0, '2018-09-27', '2018-10-05 05:46:05'),
(2, 1, 'testttt', 9, 'tetstt ttevhv bjbdsn sbjabjbas sajbdjbsajdb', '5000', 8500.00, '2018-10-10 12:00:00', '2018-12-20 12:00:00', 0, '2018-09-27', '2018-10-05 05:46:15'),
(3, 2, 'testttt', 9, 'tetstt ttevhv bjbdsn sbjabjbas sajbdjbsajdb', '10000', 10000.00, '2018-09-27 12:00:00', '2018-10-30 10:28:28', 1, '2018-09-27', '2018-10-04 05:28:11'),
(4, 2, 'testttt', 9, 'tetstt ttevhv bjbdsn sbjabjbas sajbdjbsajdb', '10000', 10000.00, '2018-09-27 12:00:00', '2018-12-20 12:00:00', 0, '2018-09-27', '2018-10-04 05:28:19'),
(5, 1, 'testttt', 9, 'tetstt ttevhv bjbdsn sbjabjbas sajbdjbsajdb', '10000', 10000.00, '2018-09-27 12:00:00', '2018-12-20 12:00:00', 0, '2018-09-27', '2018-10-04 05:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `ac_product_bids`
--

CREATE TABLE `ac_product_bids` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_amount` float(11,2) NOT NULL,
  `bid_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_product_bids`
--

INSERT INTO `ac_product_bids` (`id`, `user_id`, `product_id`, `bid_amount`, `bid_date`, `created_date`) VALUES
(1, 1, 1, 6000.00, '2018-10-05', '2018-10-05 05:44:40'),
(2, 1, 1, 6500.00, '2018-10-05', '2018-10-05 05:44:55'),
(3, 2, 1, 7000.00, '2018-10-05', '2018-10-05 05:45:57'),
(4, 2, 1, 8500.00, '2018-10-05', '2018-10-05 05:46:05'),
(5, 2, 2, 8500.00, '2018-10-05', '2018-10-05 05:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `ac_product_documents`
--

CREATE TABLE `ac_product_documents` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `document` varchar(500) NOT NULL,
  `upload_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_product_documents`
--

INSERT INTO `ac_product_documents` (`id`, `product_id`, `document`, `upload_date`, `created_date`) VALUES
(2, 1, 'download.jpg', '2018-09-27', '2018-09-28 07:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `ac_product_images`
--

CREATE TABLE `ac_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `upload_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_product_images`
--

INSERT INTO `ac_product_images` (`id`, `product_id`, `image`, `upload_date`, `created_date`) VALUES
(2, 1, 'download_(2).jpg', '2018-09-27', '2018-09-27 06:50:56'),
(3, 1, 'download_(3).jpg', '2018-09-27', '2018-09-27 06:50:56'),
(4, 1, 'download_(4).jpg', '2018-09-27', '2018-09-27 06:50:56'),
(5, 1, 'download_(5).jpg', '2018-09-27', '2018-09-27 06:50:56'),
(6, 1, 'download_(6).jpg', '2018-09-27', '2018-09-27 06:50:56'),
(7, 1, 'download.jpg', '2018-09-27', '2018-09-27 06:50:56'),
(8, 2, 'download_(5)1.jpg', '2018-09-27', '2018-09-28 07:35:44'),
(9, 1, 'download1.jpg', '2018-09-27', '2018-09-27 06:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `ac_roles`
--

CREATE TABLE `ac_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ac_users`
--

CREATE TABLE `ac_users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `std` varchar(250) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `country` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `identification_no` varchar(250) NOT NULL,
  `identification_type` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
  `ac_holder_name` varchar(250) NOT NULL,
  `account_no_iban` varchar(250) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `swift_code` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_doc` varchar(250) NOT NULL,
  `user_profile_pic` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `crated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_users`
--

INSERT INTO `ac_users` (`user_id`, `full_name`, `email`, `std`, `mobile_no`, `country`, `province`, `city`, `identification_no`, `identification_type`, `district`, `street`, `ac_holder_name`, `account_no_iban`, `bank_id`, `swift_code`, `password`, `user_doc`, `user_profile_pic`, `status`, `registration_date`, `crated_date`) VALUES
(1, 'brajesh', 'brajesh.vaishnav35@gmail.com', '+91', '9098343935', 'India', 'mp', 'indore', '12345', 'GovernmentID', 'indore', 'indore', 'brajesh', '123455', 1, '2121', '25d55ad283aa400af464c76d713c07ad', 'download_(1).jpg', 'download_(4).jpg', 1, '2018-09-24', '2018-09-28 06:33:10'),
(2, 'brajesh vaishnav', 'brajesh.vaishnav@gmail.com', '+91', '9098343934', 'india', '11111', 'indore', '1212121', 'GovernmentID', 'indore', 'testt', 'brajesh', '121212', 1, '12345', 'e10adc3949ba59abbe56e057f20f883e', 'download_(1).jpg', 'download_(1).jpg', 1, '2018-09-25', '2018-09-28 05:50:20'),
(3, 'brajesh vaishnav', 'brajesh.vaishnav411@gmail.com', '+91', '9098343933', 'india', '11111', 'indore', '1212121', 'GovernmentID', 'indore', 'testt', 'brajesh', '121212', 1, '12345', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, '2018-09-25', '2018-09-26 06:24:21'),
(4, 'brajesh vaishnav', 'brajesh.vaishnav@gmailxxxx.com', '+91', '9098343985', 'india', '11111', 'indore', '1212121', 'GovernmentID', 'indore', 'testt', 'brajesh', '121212', 1, '12345', 'e10adc3949ba59abbe56e057f20f883e', '', 'download_(5).jpg', 0, '2018-09-25', '2018-09-28 06:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `ac_wallet`
--

CREATE TABLE `ac_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `current_amount` decimal(50,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_wallet`
--

INSERT INTO `ac_wallet` (`id`, `user_id`, `current_amount`, `created_date`) VALUES
(1, 1, '6500.55', '2018-10-01 07:38:24'),
(2, 3, '2500.00', '2018-10-01 07:42:03'),
(3, 2, '2000.00', '2018-10-01 07:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `ac_wallet_details`
--

CREATE TABLE `ac_wallet_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(50,2) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `deposit_transaction_number` varchar(500) NOT NULL,
  `deposit_date` date NOT NULL,
  `payment_receipt` varchar(500) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `security_code` varchar(250) NOT NULL,
  `expiration_date` varchar(250) NOT NULL,
  `entry_date` date NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_wallet_details`
--

INSERT INTO `ac_wallet_details` (`id`, `user_id`, `amount`, `payment_type`, `payment_method`, `deposit_transaction_number`, `deposit_date`, `payment_receipt`, `card_number`, `security_code`, `expiration_date`, `entry_date`, `payment_status`, `created_date`) VALUES
(1, 1, '5000.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:18:18'),
(2, 1, '5000.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:37:51'),
(3, 1, '1500.55', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:38:24'),
(4, 3, '2500.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:42:03'),
(5, 2, '1000.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:42:12'),
(6, 2, '1000.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:42:14'),
(7, 3, '2500.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', 'download_(1).jpg', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:45:04'),
(8, 3, '2500.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:42:53'),
(9, 3, '2500.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:42:54'),
(10, 3, '25400.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:42:59'),
(11, 2, '28900.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 07:43:11'),
(12, 4, '10500.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:43:43'),
(13, 4, '1500.00', 'Deposit', 'Pay_online', '', '0000-00-00', '', '12365852', '546', '06-2025', '2018-10-01', 'Approved', '2018-10-01 07:43:51'),
(14, 3, '2500.00', 'Deposit', 'Bank_tranfer_deposit', '12365852', '2018-09-25', '', '', '', '', '2018-10-01', 'Pending', '2018-10-01 08:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `ac_watch_list`
--

CREATE TABLE `ac_watch_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `watch_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_watch_list`
--

INSERT INTO `ac_watch_list` (`id`, `user_id`, `product_id`, `watch_date`, `created_date`) VALUES
(1, 2, 1, '2018-10-08', '2018-10-08 07:35:58'),
(2, 2, 2, '2018-10-08', '2018-10-08 07:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_banks`
--
ALTER TABLE `ac_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `ac_categories`
--
ALTER TABLE `ac_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ac_favourites`
--
ALTER TABLE `ac_favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_products`
--
ALTER TABLE `ac_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ac_product_bids`
--
ALTER TABLE `ac_product_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_product_documents`
--
ALTER TABLE `ac_product_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_product_images`
--
ALTER TABLE `ac_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_roles`
--
ALTER TABLE `ac_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_users`
--
ALTER TABLE `ac_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ac_wallet`
--
ALTER TABLE `ac_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_wallet_details`
--
ALTER TABLE `ac_wallet_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_watch_list`
--
ALTER TABLE `ac_watch_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_banks`
--
ALTER TABLE `ac_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_categories`
--
ALTER TABLE `ac_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ac_favourites`
--
ALTER TABLE `ac_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ac_products`
--
ALTER TABLE `ac_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ac_product_bids`
--
ALTER TABLE `ac_product_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ac_product_documents`
--
ALTER TABLE `ac_product_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_product_images`
--
ALTER TABLE `ac_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ac_roles`
--
ALTER TABLE `ac_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_users`
--
ALTER TABLE `ac_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_wallet`
--
ALTER TABLE `ac_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ac_wallet_details`
--
ALTER TABLE `ac_wallet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ac_watch_list`
--
ALTER TABLE `ac_watch_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
