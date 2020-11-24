-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 01:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'TVs'),
(2, 'Laptops'),
(3, 'Cell Phones'),
(4, 'Audio'),
(5, 'Wearable Technology'),
(6, 'Car Electronics & GPS'),
(7, 'Cameras & Camcorders');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` bigint(20) NOT NULL,
  `SupplierName` varchar(2000) NOT NULL,
  `SupplierID` bigint(20) NOT NULL,
  `ProductID` bigint(20) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `WholesalePrice` decimal(15,0) NOT NULL,
  `RetailPrice` decimal(15,0) NOT NULL,
  `Count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `SupplierName`, `SupplierID`, `ProductID`, `CategoryID`, `WholesalePrice`, `RetailPrice`, `Count`) VALUES
(1, 'Bob Dole', 123, 6, 2, '11', '12', 22);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sku` bigint(20) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `price`, `sku`, `imageURL`, `description`, `count`) VALUES
(1, 1, 'LG - 65\" Class CX Series OLED 4K UHD Smart webOS TV', '1900', 6401850, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6401/6401850_sd.jpg;maxHeight=200;maxWidth=300', 'The a9 Gen 3 AI processor 4K delivers crisp, detailed visuals for an immersive entertainment experience, while NVIDIA G-SYNC and AMD FreeSync compatibility minimize stuttering and tearing while gaming.', 30),
(2, 1, 'Sony - 65\" Class A9G MASTER Series OLED 4K UHD Smart Android TV', '2500', 6331597, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6331/6331597_sd.jpg;maxHeight=200;maxWidth=300', 'OLED technology features millions of self-illuminated pixels for a more vibrant picture, while the X1 Ultimate processor boosts clarity for an enhanced viewing experience from every angle.', 25),
(5, 2, 'HP - Pavilion x360 2-in-1 14\" Touch-Screen Laptop - Intel Core i5 - 8GB Memory - 256GB SSD - Luminous Gold', '550', 6404882, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6404/6404882_sd.jpg;maxHeight=200;maxWidth=300', 'HP Pavilion x360 Convertible 2-in-1 Laptop: Complete urgent work projects with this 14-inch HP Pavilion x360 convertible laptop. The Intel UHD integrated graphics produce vivid visuals on the Full HD screen.', 12),
(6, 2, 'Apple - MacBook Pro - 13\" Display with Touch Bar - Intel Core i5 - 8GB Memory - 256GB SSD (Latest Model) - Space Gray', '1300', 6287705, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6287/6287705_sd.jpg;maxHeight=200;maxWidth=300', 'MacBook Pro features a quad-core Intel processor for up to 90 percent faster performance.¹ A brilliant and colorful Retina display with True Tone technology for a more comfortable viewing experience. ', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` bigint(20) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Type` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Name`, `Email`, `Image`, `Type`) VALUES
(1, 'Benjamin85', '$2y$10$dPzR/dWNYaWh2ZO7Pgr4hewLohh2C2Ng9PbfBuwJdYokCrjtrj7pe', 'Drew', 'a@bb.com', '', 1),
(9, 'Dylan', '$2y$10$NAgFLiKh9ibqLawFYPEZB.6QzvCpuAyut/De1wTkc.4kv27G1L0gi', 'Dylan', 'd@123b.com', '', 0),
(10, 'DylanA', '$2y$10$HSq5ttvExbjLQdnnVpTq8OVT.uz7J6RoSmSR0a/e41G.Y3JyOMKNS', 'DylanA', 'a@bbb.com', '', 1),
(11, 'John', '$2y$10$0BF1N1AwfJchHRhH39GSYuvRuycqO4AIlqcuGo/.NH5OwhknJcJoS', 'John', 'j@u.com', '', 0),
(12, 'JohnA', '$2y$10$BH8LFstneBwtIZOY.Ph6EO5jU3YT5rmMpwHv53.lh4ZEShX9TvKk2', 'JohnA', 'j@a123123123.com', '', 1),
(13, 'Sean', '$2y$10$gGYIgEWwYvu8KsOxZ3yQdeFvj8hNJEWM9lS2RzkXLLmghhkw6TwJe', 'Sean', 's@u.com', '', 0),
(14, 'SeanA', '$2y$10$Naz5NIjsd3e4gr8KuoEBrOcaFyob0ZmU55BnQ5kIBAhGqwX0TBm4y', 'SeanA', 's@a.com', '', 1),
(16, 'username', '$2y$10$3cI24DTaU9aLzkRaGw5efOM/xMeeRadW9T3iaXs3tg1F9qy8yLfA6', 'Bob Hope', 'a@bc.com', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Products` (`ProductID`),
  ADD KEY `Categories` (`CategoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `catFK` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Categories` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `Products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catFK` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
