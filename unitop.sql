-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 01:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cost` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `card_num` varchar(16) DEFAULT NULL,
  `security_num` varchar(3) DEFAULT NULL,
  `expiration` varchar(5) DEFAULT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `stock` smallint(6) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discount_percent` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `login` (
  `Email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `signup` (
  `Email` varchar(30) NOT NULL,
  `university` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL, 
  `phoneNumber` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Email`);
COMMIT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `signup` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `signup` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

INSERT INTO `products` (`product_id`, `product_name`, `description`, `stock`, `price`, `discount_percent`) VALUES
(1, 'Legion Pro 7 (Gen8)', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16″ Lenovo PureSight Gaming Display with WQXGA resolution', 460, 2999.00, NULL),
(2, 'ACER 314 14\" Chromebook Silver', 'The Chromebook 314 is here to keep you productive and entertained wherever you are. Its 14\" Full HD screen is great for work and catching up on Netflix. The octa-core Intel® Core™ i3 has plenty of power for your apps, games, and browser tabs. And at just 1.5 Kg, it won\'t weigh you down.', 515, 329.99, NULL),
(3, 'HP 14 Laptop Intel, 4GB, 128GB', 'Includes 4GB RAM, 128GB SSD. Also pre-installed with Windows 11 and a year-long subscription with OFFICE 365.', 600, 279.00, NULL),
(4, 'Dell G3 15-3500/i5', '8GB Ram/512GB SSD/GTX 1650/15” Display/Windows 11', 150, 699.99, NULL),
(5, 'Asus TUF F15 15.6in i5', 'RAM: 16 GB / Storage: 1 TB SSD, Tuf Back Pack and Tuff gaming mouse, Intel core i5 processor, 15.6 inch screen size, Bluetooth, Built-in Webcam, Wi-Fi, Backlit Keyboard, HDMI, USB 3.0, USB 2.0, USB 3.2', 230, 1419.99, NULL);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
