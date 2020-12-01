-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 02:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `Type` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Name`, `Email`, `Image`, `Type`) VALUES
(1, 'Benjamin85', '$2y$10$6V6/eOdo4c2EwzgP5tgDzeu4kvCnnr7hVnOHG.3R5kBRGZANuj8vy', 'Drew', 'a@b.com', '', 1),
(9, 'Dylan', '$2y$10$b1GdftYU6sID1vwD8Xdzz.Cst7eLxK3yRdKluOKSfJvhjufOnWqve', 'Dylan', 'd@b.com', '', 0),
(10, 'DylanA', '$2y$10$AEbyHbl66GD.SpQ8TObSFOv5XvYi3rZyTghmv9QuhFEpzOYZFDpHS', 'DylanA', 'd@a.com', '', 1),
(11, 'John', '$2y$10$0BF1N1AwfJchHRhH39GSYuvRuycqO4AIlqcuGo/.NH5OwhknJcJoS', 'John', 'j@u.com', '', 0),
(12, 'JohnA', '$2y$10$QnG27XfBzLHXyDTILE0ypOK5NcwM3DRua9joc9.r61KnMY1EPAFRi', 'JohnA', 'j@a.com', '', 1),
(13, 'Sean', '$2y$10$gGYIgEWwYvu8KsOxZ3yQdeFvj8hNJEWM9lS2RzkXLLmghhkw6TwJe', 'Sean', 's@u.com', '', 0),
(14, 'SeanA', '$2y$10$Naz5NIjsd3e4gr8KuoEBrOcaFyob0ZmU55BnQ5kIBAhGqwX0TBm4y', 'SeanA', 's@a.com', '', 1);

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
  MODIFY `UserId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
