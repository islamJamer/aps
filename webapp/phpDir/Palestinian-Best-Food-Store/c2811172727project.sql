-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 12:36 PM
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
-- Database: `c2811172727project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartAddress` varchar(100) NOT NULL,
  `orderId` int(100) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `grandTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartAddress`, `orderId`, `custName`, `grandTotal`) VALUES
('salfeet', 1, 'shoroqAssi', 6395),
('salfeet', 2, 'shoroqAssi', 6395),
('salfeet', 3, 'shoroqAssi', 6395),
('salfeet', 4, 'shoroqAssi', 6395),
('salfeet', 5, 'shoroqAssi', 6395),
('salfeet', 6, 'shoroqAssi', 12155);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `productId` int(100) NOT NULL,
  `custUserName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `productId`, `custUserName`, `quantity`) VALUES
(1, 6, 'shoroqAssi', 5),
(2, 6, 'shoroqAssi', 1),
(3, 5, 'shoroqAssi', 2),
(4, 4, 'shoroqAssi', 1),
(5, 4, 'shoroqAssi', 6),
(6, 5, 'shoroqAssi', 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productName` varchar(100) DEFAULT NULL,
  `productId` int(100) NOT NULL,
  `productType` varchar(100) DEFAULT NULL,
  `productPrice` int(100) NOT NULL,
  `productSize` varchar(100) DEFAULT NULL,
  `productDescription` varchar(500) NOT NULL,
  `productImage1` blob NOT NULL,
  `productImage2` blob NOT NULL,
  `productImage3` blob NOT NULL,
  `userName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productName`, `productId`, `productType`, `productPrice`, `productSize`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `userName`) VALUES
('shawerma', 4, 'authenticated', 24, 'pices', '                                    this is the shawerma', 0x73312e6a7067, 0x73322e6a7067, 0x73332e6a7067, 'ansamAmer'),
('zerep', 5, 'authenticated', 55, 'pices', '                            this is the zerep        ', 0x7a312e6a7067, 0x7a322e706e67, 0x7a332e6a7067, 'ansamAmer'),
('mansaf', 6, 'packaged', 50, 'kg', 'qwqweqwe', 0x6d312e6a7067, 0x6d322e6a7067, 0x6d332e6a7067, 'ansamAmer'),
('msakhan', 7, 'authenticated', 12, 'pices', 'this is msakhan', 0x6d73616b68616e312e6a7067, 0x6d73616b68616e322e6a7067, 0x6d73616b68616e332e6a7067, 'ansamAmer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` int(5) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ownName` varchar(100) NOT NULL,
  `userAddress` varchar(100) NOT NULL,
  `userBdate` varchar(100) NOT NULL,
  `userPhone` varchar(100) NOT NULL,
  `userCridet` varchar(100) NOT NULL,
  `userFax` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `userPass`, `userStatus`, `Email`, `ownName`, `userAddress`, `userBdate`, `userPhone`, `userCridet`, `userFax`) VALUES
('ansamAmer', '123', 1, 'ansamAmer@gmail.com', '', '', '', '', '', ''),
('islamAmer', '12345', 0, 'islam.awadallah84@outlook.com', '', '', '', '', '', ''),
('shoroqAssi', '121', 0, 'shoroq@gmail.com', 'shoroqIslam', 'Nablus', '22-1-1996', '0598611138', '34234234', '41423123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`orderId`,`custName`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `custName` (`custUserName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`custUserName`) REFERENCES `user` (`userName`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
