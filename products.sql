-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2024 at 02:36 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_price` int NOT NULL,
  `product_description` varchar(150) NOT NULL,
  `product_order` int NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_description`, `product_order`, `product_image`, `product_category_id`) VALUES
(1, 'Фары HELLA', 50000, 'Передние галогенные фары HELLA', 1, 'hella_headlights.jpg', 2),
(2, 'Ноздри Чёрные', 12000, 'Чёрные \'ноздри\' M-Tech', 2, 'm-grill.jpg', 2),
(3, 'Тормозные колодки', 25000, 'Тормозные колодки оригинальные', 3, 'breaks.png', 1),
(4, 'Двигатель', 500000, 'Двигатель S62, новый', 4, 'engine.png', 1),
(5, 'Коробка передач', 470000, 'Новая коробка передач, механика', 5, 'gearbox.jpg', 1),
(6, 'Фара передняя', 30000, 'Оригинальная передняя фара, рестайлинг', 6, 'headlight.jpg', 2),
(7, 'Масло для двигателя', 5000, 'Масло, хорошее масло', 7, 'oil.jpg', 3),
(8, 'Фары задние', 50000, 'Задние фары, оригинал, рестайлинг, комплект', 8, 'tail-lights.jpg', 2),
(9, 'Противотуманные фары', 6000, 'Прикольно светят, блин', 9, 'ptf.jpg', 2),
(10, 'Подстаканник салонный', 500, 'Часто ломаются))', 10, 'cup-holder.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_order` (`product_order`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
