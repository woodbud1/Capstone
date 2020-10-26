-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 11:54 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` bigint(20) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `StreetAddress` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Type` int(1) DEFAULT 0,
  `Notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Name`, `Email`, `Image`, `PhoneNumber`, `StreetAddress`, `City`, `State`, `Type`, `Notes`) VALUES
(1, 'TestOwner', '123456', 'Test', 'to@anywhere.com', '', '1234567890', '123 Main Street', 'LIncoln', 'NE', 0, 'The back door will be unlocked.'),
(2, 'testwalker', '123456', 'Test', 'TW@anywhere.com', '', '987654321', '321 Main Street', 'Lincoln', 'NE', 0, 'Hi, My name is Test and I love to walk dogs of all sizes.'),
(3, 'username', '$2y$10$hLSgiavaw1/L0ufhkzkjfOmBImQlNgBLI.XNc0uuy9ZFHoD0Lz2X6', 'name', 'a@b.com', 'image.jpg', '0000000000', 'asdf', 'asdf', 'asdf', 0, 'notes'),
(5, 'benjamin', '$2y$10$G.0Q0EXmBJNjLUj0qBQA7.oqSyFRlBV/9d6LxGUQvx/h7QA0AOWGu', 'davie crocket', 'a@b.com', 'image.jpg', '0000000000', '1717 South 28th Street', 'Lincoln', 'NE', 0, 'notes'),
(6, 'Benjamin85', '$2y$10$6V6/eOdo4c2EwzgP5tgDzeu4kvCnnr7hVnOHG.3R5kBRGZANuj8vy', 'Drew', 'a@b.com', '', '0000000000', '1717 South 28th Street', 'Lincoln', 'NE', 0, 'notes');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
