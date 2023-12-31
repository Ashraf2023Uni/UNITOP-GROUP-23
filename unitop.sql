-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 11:37 PM
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

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `stock`, `price`, `discount_percent`) VALUES
(1, 'Legion Pro 7 (Gen8)', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution', 460, 2999.00, NULL),
(2, 'Surface Pro 8', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution', 460, 999.00, NULL),
(3, '14-inch Macbook Pro', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution', 460, 1699.00, NULL),
(4, 'HP 15-fd0023na Laptop', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution', 460, 999.00, NULL),
(5, 'Dell XPS 15', 'Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle-Stunning 16\" Lenovo PureSight Gaming Display with WQXGA resolution', 460, 999.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `Email`, `university`, `password`, `phoneNumber`) VALUES
(1, 'testing123@gmail.com', 'Arts University Plymouth', '$2y$10$Dzx64yUKzVKC6DQuikMcLesXOMS8A8wwTMgo/jgKQsWY7RHY9MLjy', '1234567890'),
(2, 'testing123@gmail.com', 'Arts University Plymouth', '$2y$10$/Lh/f8O5cNC2UaSu7/dCNeERWIfiTiKA3IIfVXnXrnNF/Kqi1cVYO', '1234567890'),
(3, 'Test1233@test.com', 'Birmingham City University', '$2y$10$LHQTET58mIIaFxMaZHmDve9.ljk6OjfYsyHLhCQrAmKSbvHPDLC3y', '123456789010'),
(4, 'test1@hotmail.com', 'Aston University', '$2y$10$4kgRssV2QuJ7aOSGSuN1CecHSHjXgB3i7KkQ19yrdpDvTGnHeIaQe', '0121000000'),
(5, 'sabil@hotmail.com', 'Aston University', '$2y$10$GDQCSWNaaS4jj4MoCETYR.JU09mcYBXVD31cLIigmDUhP2UkTpV9y', '07724584106'),
(6, 'ashraf@gmail.com', 'University of Warwick', '$2y$10$VlOJicibWTP2sEpQ2S35NeTmc4pFTALOKroN3pxH.Z8go8fo3Rm7i', '041034201301'),
(0, 'n.powell@aston.ac.uk', 'Aston University', '$2y$10$dUINP467bNvBROdaeAmM4.jYIEVYavvUDXXSp0CgdRkE7mGURZXjG', '01214564567');
COMMIT;

ALTER TABLE signup MODIFY id int PRIMARY KEY AUTO_INCREMENT NOT NULL;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
