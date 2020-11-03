-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 12:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `catFK` (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catFK` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
