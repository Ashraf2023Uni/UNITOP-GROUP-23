-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 03:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `phoneNumber`) VALUES
(0, '1@1.com', '$2y$10$ApGOwcbfZS6l7CRUmbYH.eQq5R61auqAWVbCHMFez1.ngDzOZBh.i', '1'),
(1, '4@4.com', '$2y$10$TBTTX5ax4gLv2B4N1ifvGeS21hput5pejjUCHPxLJY1RaQ.ntLTgO', '4'),
(2, '5@5.com', '$2y$10$KXpcpfvGdwmcEarNB3eXUeXPMbKWkuk/KjU8egkNm6CN9pDlCttbq', '5'),
(3, 'fiona@f.com', '$2y$10$rZrChyo.a8jXJrg.WX5sJeW1DsIdQc1372lFXFSBSxor9oAwXxlxC', '12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'All Laptops'),
(2, 'Computer Science'),
(3, 'Biology'),
(4, 'Graphics Design'),
(5, 'Law'),
(6, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Email`, `university`, `password`, `phoneNumber`) VALUES
(0, 'n.powell@aston.ac.uk', 'Aston University', '$2y$10$dUINP467bNvBROdaeAmM4.jYIEVYavvUDXXSp0CgdRkE7mGURZXjG', '01214564567'),
(1, 'testing123@gmail.com', 'Arts University Plymouth', '$2y$10$Dzx64yUKzVKC6DQuikMcLesXOMS8A8wwTMgo/jgKQsWY7RHY9MLjy', '1234567890'),
(2, 'testing123@gmail.com', 'Arts University Plymouth', '$2y$10$/Lh/f8O5cNC2UaSu7/dCNeERWIfiTiKA3IIfVXnXrnNF/Kqi1cVYO', '1234567890'),
(3, 'Test1233@test.com', 'Birmingham City University', '$2y$10$LHQTET58mIIaFxMaZHmDve9.ljk6OjfYsyHLhCQrAmKSbvHPDLC3y', '123456789010'),
(4, 'test1@hotmail.com', 'Aston University', '$2y$10$4kgRssV2QuJ7aOSGSuN1CecHSHjXgB3i7KkQ19yrdpDvTGnHeIaQe', '0121000000'),
(5, 'sabil@hotmail.com', 'Aston University', '$2y$10$GDQCSWNaaS4jj4MoCETYR.JU09mcYBXVD31cLIigmDUhP2UkTpV9y', '07724584106'),
(6, 'ashraf@gmail.com', 'University of Warwick', '$2y$10$VlOJicibWTP2sEpQ2S35NeTmc4pFTALOKroN3pxH.Z8go8fo3Rm7i', '041034201301'),
(7, 'test@aston.ac.uk', 'Aston University', '$2y$10$FWdZCln8BXDstmqUqJYMhup8OuDsUGXdWRBrvSyau/z1O22jCGigO', '07523232211'),
(8, 'h.h@aston.ac.uk', 'Aston University', '$2y$10$cKBsDjL779m8PQuimtVJCO.xrNXQazVi15Xtpv7BsflZwIZRc3SK.', '07444444444'),
(9, 'm.pickle@aston.ac.uk', 'Arts University Plymouth', '$2y$10$OXOltFdUcPf3Zn4wru2wYuzxpOerZ4SY4CFP2l33LHVLltiXuWzXC', '07123123123');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_options`
--

CREATE TABLE `delivery_options` (
  `delivery_id` int(11) NOT NULL,
  `courier` varchar(50) NOT NULL,
  `expected_timeframe` varchar(200) NOT NULL,
  `tracking` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

CREATE TABLE `orderlines` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` mediumint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderlines`
--

INSERT INTO `orderlines` (`order_id`, `product_id`, `quantity`) VALUES
(1, 2, 16),
(1, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cost` decimal(9,2) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `cost`, `admin_id`) VALUES
(1, 8, '2024-03-22 03:14:49', 61164.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `card_name` varchar(30) DEFAULT NULL,
  `card_num` varchar(16) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL,
  `expiration` varchar(5) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `addressline` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `town` varchar(40) DEFAULT NULL,
  `postcode` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `price` decimal(8,2) DEFAULT NULL,
  `discount_percent` decimal(3,1) DEFAULT NULL,
  `low_stock_indicator` tinyint(1) DEFAULT 0,
  `out_of_stock_indicator` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `stock`, `price`, `discount_percent`, `low_stock_indicator`, `out_of_stock_indicator`) VALUES
(1, 'Legion Pro 7 (Gen8)', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution.', 460, 2999.00, NULL, 0, 0),
(2, 'Surface Pro 8', 'The Surface Pro 8 is ultra-light, fast and versatile with the perfect balance of portability and power.', 444, 1699.00, NULL, 0, 0),
(3, '14-inch Macbook Pro', 'The 14-inch MacBook Pro blasts forward with M3, an incredibly advanced chip that brings serious speed and capability. With best-in-class battery life — up to 22 hours1 — and a beautiful Liquid Retina XDR display, it’s a pro laptop without equal.', 440, 1699.00, NULL, 0, 0),
(4, 'HP 15-fd0023na Laptop', 'HP 15-fd0023na LAPTOP Intel N200 3.70GHz 4/128GB SSD WEBCAM WINDOWS 11 S.', 460, 215.99, NULL, 0, 0),
(5, 'Dell XPS 15', '13th Generation Intel® Core™ i7-13620H Processor (24MB Cache, up to 4.9GHz).', 460, 1546.79, NULL, 0, 0),
(6, 'MacBook Air', 'MacBook Air (M1, 2020) 13 inch with 8-Core CPU and 7-Core GPU 256Gb SSD.', 460, 949.99, NULL, 0, 0),
(7, 'Lenovo ThinkPad X1', 'ThinkPad X1 Carbon Gen 11, 13th Generation Intel® Core™ i7-1355U Processor (E-cores up to 3.70 GHz P-cores up to 5.00 GHz).', 460, 1899.99, NULL, 0, 0),
(8, 'Gigabyte G5', 'Gigabyte G5 KF5-53PT354SD 14.4´ i5-13500H/16GB/512GB SSD/RTX 4060 Gaming Laptop.', 460, 1144.50, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 3),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `addressline` varchar(50) NOT NULL,
  `flat_num` tinyint(3) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `county` varchar(50) NOT NULL,
  `phone_num` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_options`
--
ALTER TABLE `delivery_options`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `orderlines`
--
ALTER TABLE `orderlines`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery_options`
--
ALTER TABLE `delivery_options`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderlines`
--
ALTER TABLE `orderlines`
  ADD CONSTRAINT `orderlines_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderlines_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
