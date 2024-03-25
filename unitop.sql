-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 05:14 PM
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
(3, 'fiona@f.com', '$2y$10$rZrChyo.a8jXJrg.WX5sJeW1DsIdQc1372lFXFSBSxor9oAwXxlxC', '12'),
(7, 'h.h@aston.ac.uk', '$2y$10$q5HT.5EUR7Ob8AsPBbwir.b1yhA.0ETXv9Idayv5RCsW89n2Lk0Ka', '07444444444');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'melissa', 'meliss@123', 'qs', 'wwd'),
(2, 'melissa', 'meliss@123', 'qs', 'wwd'),
(3, 'melissa', 'melissa@yahoo.com', 'yoloy', '1234'),
(4, 'melissa', 'melissa.567@yahoo', 'laptops', 'uashdUSD'),
(5, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa'),
(6, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa'),
(7, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa'),
(8, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa'),
(9, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa'),
(10, 'Melissa ', 'Melissa@M.com', 'AAAA', 'aaaa');

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
(8, 'h.h@aston.ac.uk', 'Aston University', '$2y$10$2BkmXG8zmSs4p86OxBS/X.3TJR7eip/KHwmqUdpBkO/cEIZrLvu3W', '07444444444'),
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
(1, 3, 20),
(2, 6, 5),
(4, 3, 17),
(5, 5, 17),
(5, 1, 17),
(5, 6, 5),
(6, 3, 10),
(6, 2, 5);

-- --------------------------------------------------------


--
-- Table structure for table `returned_orders`
--

CREATE TABLE `returned_orders` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `return_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cost` decimal(9,2) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `cost`, `status`, `admin_id`) VALUES
(1, 8, '2024-03-22 03:14:49', 61164.00, 'completed', NULL),
(2, 8, '2024-03-23 16:11:59', 4749.95, 'processing', NULL),
(4, 9, '2024-03-23 17:11:38', 28883.00, 'completed', NULL),
(5, 8, '2024-03-23 19:14:47', 82028.38, 'processing', NULL),
(6, 8, '2024-03-24 20:14:47', 9028.24, 'completed', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `card_num` varchar(256) NOT NULL,
  `cvv` varchar(256) NOT NULL,
  `expiration` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addressline` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `town` varchar(40) NOT NULL,
  `postcode` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `card_name`, `card_num`, `cvv`, `expiration`, `email`, `addressline`, `city`, `town`, `postcode`) VALUES
(2, 'H Hussain', '$2y$10$kw2zBbWHosDPz0AoyAx54OvYQ9JuN1ID9zhM1AWDgsfFn/uwL2UbO', '$2y$10$jpSPrzwFuQjuUouU1Yjxk.ldmG.aeyII84UQonVMB1KsSXnzHC9Jq', '$2y$10$FF1EoREMKnwo8V4y3cl/Qu29QcBZGTAueiilQimX0TLrMMLMlIBma', 'h.h@aston.ac.uk', 'Aston University', 'Birmingham', 'Aston', 'B66BB'),
(3, 'H Hussain', '$2y$10$B0tWuYoqFvD.G9SKP4RHaeZgFm2yq3tZ0rPRpu1Bjm/Dr5yGUDqmi', '$2y$10$YdPA1N72YKweMNoeb57nPeF7daIXp7Uc82cdfHR3jYW6TiyUwolvC', '$2y$10$sOuJQ9hdEPL59MjTTbqZFe1vpy0S8UCqkygPSPdpnjbA5IrY4IQAS', 'h.h@aston.ac.uk', 'Aston University', 'Birmingham', 'Aston', 'B66BB'),
(4, 'M Pickle', '$2y$10$PZVls1PqewmWP10l/mtceuCJH6Cc7RnJnkFcnCwu9CTVlSUWmNFVm', '$2y$10$ZasB.EUbtanPkvNvGOgV9.MSDItSezYTxZud8PcsFBP729lRnkxzq', '$2y$10$XsobeZUMlbb0AH92LHEcn.Xscm1rCSuYW9rnZhhJmYxfN8GW4Icae', 'm.pickle@aston.ac.uk', 'Aston University', 'Birmingham', 'Aston', 'B66BB'),
(5, 'H Hussain', '$2y$10$kq3Xud/dPO0tRRsbPTP51.YY0pr4vConvHB/FArXUb3L/Sq0umxdW', '$2y$10$Ir2Ww5hbk3GMoGhFRkx0Z.EjbbDQ656FYiTT4TqDgbiMvZ4xCFk62', '$2y$10$Y57oi33urhGjfYEhXf3A/ebSkQ3gpKRG/Bn4Xx6HhtgdlbdImXOau', 'h.h@aston.ac.uk', 'Aston University', 'Birmingham', 'Aston', 'B66BB');

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
(1, 'Legion Pro 7 (Gen8)', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution.', 440, 2999.00, NULL, 0, 0),
(2, 'Surface Pro 8', 'The Surface Pro 8 is ultra-light, fast and versatile with the perfect balance of portability and power.', 0, 1699.00, NULL, 0, 0),
(3, '14-inch Macbook Pro', 'The 14-inch MacBook Pro blasts forward with M3, an incredibly advanced chip that brings serious speed and capability. With best-in-class battery life — up to 22 hours1 — and a beautiful Liquid Retina XDR display, it’s a pro laptop without equal.', 420, 1699.00, NULL, 0, 0),
(4, 'HP 15-fd0023na Laptop', 'HP 15-fd0023na LAPTOP Intel N200 3.70GHz 4/128GB SSD WEBCAM WINDOWS 11 S.', 437, 215.99, NULL, 0, 0),
(5, 'Dell XPS 15', '13th Generation Intel® Core™ i7-13620H Processor (24MB Cache, up to 4.9GHz).', 443, 1546.79, NULL, 0, 0),
(6, 'MacBook Air', 'MacBook Air (M1, 2020) 13 inch with 8-Core CPU and 7-Core GPU 256Gb SSD.', 450, 949.99, NULL, 0, 0),
(7, 'Lenovo ThinkPad X1', 'ThinkPad X1 Carbon Gen 11, 13th Generation Intel® Core™ i7-1355U Processor (E-cores up to 3.70 GHz P-cores up to 5.00 GHz).', 9, 1899.99, NULL, 0, 0),
(8, 'Gigabyte G5', 'Gigabyte G5 KF5-53PT354SD 14.4´ i5-13500H/16GB/512GB SSD/RTX 4060 Gaming Laptop.', 2, 1144.50, NULL, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);


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
-- Indexes for table `returned_orders`
--
ALTER TABLE `returned_orders`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `order_id` (`order_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `returned_orders`
--
ALTER TABLE `returned_orders`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



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
-- Constraints for table `returned_orders`
--
ALTER TABLE `returned_orders`
  ADD CONSTRAINT `returned_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
