-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2025 at 06:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durchzugskraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int NOT NULL,
  `char_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `characteristics`
--

INSERT INTO `characteristics` (`id`, `char_name`) VALUES
(1, 'Price'),
(2, 'Description'),
(3, 'Category'),
(4, 'Value'),
(5, 'Stock value'),
(6, 'Rusty metr'),
(7, 'Manufacturer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `order_date` date NOT NULL,
  `order_user_id` int NOT NULL,
  `order_sum` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_user_id`, `order_sum`) VALUES
(89, '2025-05-14', 5, 5750998),
(90, '2025-05-14', 5, 31999),
(91, '2025-05-14', 5, 65996),
(92, '2025-05-14', 5, 999),
(93, '2025-05-14', 5, NULL),
(94, '2025-05-14', 5, 95997),
(95, '2025-05-14', 5, 31999),
(96, '2025-05-14', 5, 21161993),
(97, '2025-05-14', 6, 5749999);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int NOT NULL,
  `order_product_id` int NOT NULL,
  `product_count` int NOT NULL,
  `product_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `order_product_id`, `product_count`, `product_price`) VALUES
(89, 15, 1, 999),
(89, 16, 1, 5749999),
(90, 14, 1, 31999),
(91, 14, 2, 31999),
(91, 15, 2, 999),
(92, 15, 1, 999),
(94, 14, 3, 31999),
(95, 14, 1, 31999),
(96, 13, 3, 7000000),
(96, 14, 5, 31999),
(96, 15, 2, 999),
(97, 16, 1, 5749999);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`) VALUES
(13, 'Durchzugskraft\r\n', 'bmw-m5.png'),
(14, 'Тормозные колодки в сборе', 'breaks.png'),
(15, 'Подстаканник ', 'cup-holder.jpg'),
(16, 'Двигатель S62B50', 'engine.png'),
(17, 'Коробка переключения передач', 'gearbox.jpg'),
(18, 'Фары передние BOSCH', 'headlight.jpg'),
(19, 'Фары передние HELLA BLACK', 'hella_headlights.jpg'),
(20, 'Передние решётки BLACK', 'm-grill.jpg'),
(21, 'Моторное масло BMW', 'oil.jpg'),
(22, 'Передние противотуманные фары', 'ptf.jpg'),
(23, 'Задние фонари BOSCH', 'tail-lights.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_chars`
--

CREATE TABLE `product_chars` (
  `id` int NOT NULL,
  `pc_product_id` int NOT NULL,
  `pc_char_id` int NOT NULL,
  `pc_char_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_chars`
--

INSERT INTO `product_chars` (`id`, `pc_product_id`, `pc_char_id`, `pc_char_content`) VALUES
(24, 13, 4, 'Бесценно'),
(25, 13, 6, '0/10'),
(26, 13, 5, '0'),
(27, 19, 1, '25999'),
(41, 17, 1, '144999'),
(42, 17, 3, '1'),
(43, 16, 1, '5749999'),
(44, 16, 3, '1'),
(45, 15, 1, '999'),
(46, 15, 3, '4'),
(47, 14, 1, '31999'),
(48, 14, 3, '7'),
(49, 18, 7, 'BOSCH'),
(50, 18, 1, '18999'),
(51, 18, 3, '3'),
(52, 19, 3, '3'),
(53, 21, 2, 'Моторное масло BMW SAE 5W-30'),
(54, 21, 7, 'BMW'),
(55, 21, 1, '3499'),
(56, 23, 1, '24999'),
(57, 22, 1, '12999'),
(58, 20, 1, '4999'),
(59, 19, 7, 'HELLA'),
(60, 21, 3, '6'),
(61, 13, 1, '7000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_login`, `user_password`) VALUES
(1, 'example@chsu.ru', 'example', 'example'),
(2, '1134@chsu.ru', 'newuser', 'example'),
(3, 'hahahah@ahah.haha', 'hochy_piva', '1klass'),
(4, 'qq@qq.qq', 'qq', ''),
(5, 'bmw@bmw.bmw', '1111', '1111'),
(6, 'qqq@qq.qq.qq', 'qqq', 'qqq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_product_id` (`order_product_id`) USING BTREE,
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_chars`
--
ALTER TABLE `product_chars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pc_char_id` (`pc_char_id`),
  ADD KEY `pc_product_id` (`pc_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_chars`
--
ALTER TABLE `product_chars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_chars`
--
ALTER TABLE `product_chars`
  ADD CONSTRAINT `product_chars_ibfk_1` FOREIGN KEY (`pc_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_chars_ibfk_2` FOREIGN KEY (`pc_char_id`) REFERENCES `characteristics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
