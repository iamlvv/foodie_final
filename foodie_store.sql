-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie_store`
--
CREATE DATABASE IF NOT EXISTS `foodie_store` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `foodie_store`;
-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `product_id`, `user_id`, `content`, `created_date`) VALUES
(2, 1, 2, 'ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris', '2022-11-21'),
(3, 3, 2, 'lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` int(200) NOT NULL,
  `desc_note` text NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `total_products`, `total_price`, `desc_note`, `payment_method`, `created_date`) VALUES
(2, 2, 'John', 'Smith', '0123456789', 'john@gmail.com', '123 LA, NY, USA', '6', 369000, 'Severe stage glaucoma', 'zalo pay', '2022-11-04'),
(3, 1, 'John', 'Smith', '0123456789', 'john@gmail.com', '123 LA, NY, USA', '7', 98000, 'Spon ab w metab dis-unsp', 'momo', '2022-11-15'),
(4, 2, 'John', 'Smith', '0123456789', 'john@gmail.com', '123 LA, NY, USA', '8', 411000, 'Neurofibromatosis NEC', 'visa/master card', '2022-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `quantity`, `product_image`) VALUES
(1, 'Veal - Insides, Grains', 'nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum', 25000, 10, 'http://dummyimage.com/134x100.png/ff4444/ffffff'),
(2, 'Beef - Texas Style Burger', 'ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam', 18000, 2, 'http://dummyimage.com/187x100.png/dddddd/000000'),
(3, 'Plaintain', 'cras in purus eu magna vulputate luctus cum sociis natoque', 87000, 3, 'http://dummyimage.com/220x100.png/cc0000/ffffff'),
(4, 'Wine - Chablis 2003 Champs', 'in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod', 57000, 4, 'http://dummyimage.com/182x100.png/5fa2dd/ffffff'),
(5, 'Egg Patty Fried', 'sit amet cursus id turpis integer aliquet massa id lobortis convallis', 34000, 5, 'http://dummyimage.com/182x100.png/ff4444/ffffff'),
(6, 'Pork - Ground', 'lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat', 25000, 6, 'http://dummyimage.com/201x100.png/5fa2dd/ffffff'),
(7, 'Flour - So Mix Cake White', 'ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna', 96000, 7, 'http://dummyimage.com/220x100.png/5fa2dd/ffffff'),
(8, 'Tea - Black Currant', 'nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu', 59000, 8, 'http://dummyimage.com/228x100.png/ff4444/ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `password`, `address`, `phone`, `email`, `user_image`, `user_type`, `created_date`) VALUES
(1, 'admin', 'Augustin Davis', 'admin', '512 Morrow Drive', '336-259-56', 'admin@gmail.com', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', 'admin', '2022-10-15'),
(2, 'bcarville1', 'Berkley Carville', '2H5spr', '911 Walton Street', '946-114-28', 'bcarville1@dedecms.com', 'http://dummyimage.com/107x100.png/ff4444/ffffff', 'user', '2022-11-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_productCart` (`product_id`),
  ADD KEY `fk_userCart` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_userFeedback` (`user_id`),
  ADD KEY `fk_prodctFeedback` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_userOrder` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_productCart` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userCart` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_prodctFeedback` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userFeedback` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_userOrder` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
