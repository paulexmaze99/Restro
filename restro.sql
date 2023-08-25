-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 03:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(32, 'pazzymaze', 'pazzymaze', 'c731e28ef9bb44e5ae2296b2eec9dc0f'),
(34, 'tt', 'hh', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(35, 'Zenaida Huff', 'xycajyn', 'f3ed11bbdb94fd9ebdefbaf646ab94d3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(54, 'Burger', 'food_category_577.png', 'Yes', 'Yes'),
(56, 'pizza', 'food_category_91.png', 'Yes', 'Yes'),
(58, 'snacks', 'food_category_555.png', 'Yes', 'Yes'),
(59, 'Food', 'food_category_380.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(67, 'Rice Soup', 'Green / Chicken', '16.00', 'Food-Name_2480.jpg', 57, 'Yes', 'Yes'),
(68, 'American Breakfast', 'Tomato / Eggs / Sausage', '25.00', 'Food-Name_504.jpg', 57, 'Yes', 'Yes'),
(69, 'Deli Burger', 'Cheese / Beef / Fried Potatoes', '28.00', 'Food-Name_5348.jpg', 54, 'Yes', 'Yes'),
(70, 'Pancake', 'Flat, soda-leavened semi-sweet cake made with egg and flour', '15.00', 'Food-Name_3803.jpg', 58, 'Yes', 'Yes'),
(72, 'Pizza Margherita', '  cheese, fresh basil, salt, and extra-virgin olive oil.', '20.00', 'Food-Name_4595.jpg', 56, 'Yes', 'Yes'),
(73, 'Neapolitan pizza', 'made with tomatoes and mozzarella cheese', '26.00', 'Food-Name_6094.jpg', 56, 'Yes', 'Yes'),
(74, 'Kebab pizza', 'pizza topped with kebab meat and other ingredients,', '30.00', 'Food-Name_6167.jpg', 56, 'Yes', 'Yes'),
(75, 'sopaipilla', 'A deep-fried dessert made with leavened wheat dough and shortenin', '34.00', 'Food-Name_500.jpg', 54, 'Yes', 'Yes'),
(76, 'Exercitation laborio', 'Tempore voluptas do', '507.00', 'Food-Name_6410.jpg', 57, 'NO', 'Yes'),
(79, 'Smoky Burger', 'Cheese / Beef / Ham / lettuce', '27.00', 'Food-Name_3176.png', 54, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Rice Soup', '16.00', 737, '11792.00', '2023-07-25 09:58:56', 'Delivered', 'Marcia Turner', '+1 (141) 623-2917', 'fubuge@mailinator.com', 'At inventore consect'),
(2, 'Rice Soup', '16.00', 2, '32.00', '2023-07-25 10:11:14', 'on Delivery', 'Gemma Chang', '+1 (404) 212-3086', 'raphwrld33@gmail.com', 'Qui laboriosam dist'),
(3, 'Rice Soup', '16.00', 2, '32.00', '2023-08-16 11:47:18', 'Ordered', 'Hunter Justice', '+1 (889) 984-2445', 'jeryqyv@mailinator.com', 'Deserunt quo iste pr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
