-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakecat`
--

CREATE TABLE `cakecat` (
  `catid` int(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakecat`
--

INSERT INTO `cakecat` (`catid`, `name`, `url`, `price`) VALUES
(1, 'Chai Tea Latte Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_4831-375x400.jpeg', 400),
(2, 'Chocolate Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/Chocolate-Birthday-Cake.jpg', 500),
(3, 'Vanilla Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/622-Vanilla-Bday-Pastel-scaled.jpg', 600),
(4, 'Pink Velvet Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_1435-375x400.jpeg', 600),
(5, 'White Velvet Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/White-Velvet-822-scaled-375x400.jpg', 500),
(6, 'Decadent Chocolate Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/2017/12/Decadent-Chocolate-Rosette-375x400.jpg', 500),
(7, 'Funfetti Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_3289-375x400.jpg', 400),
(8, 'Red Velvet Cake', 'https://assets.epicurious.com/photos/60b7d0d16cd3418368fee29f/6:4/w_1600,c_limit/blueberry-lemon-icebox-cake-BA-070616.jpg', 600),
(9, 'Bourbon Maple Banana Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_3006.jpeg', 500),
(10, 'Dreamsicle Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_1761.jpeg', 400),
(11, 'Lemon Blossom Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/IMG_0625-scaled-375x400.jpg', 600),
(12, 'Mocha Madness Cake', 'https://sweetfreedombakeshop.com/wp-content/uploads/Mocha-Madness-Cake-822-375x400.jpg', 600);

-- --------------------------------------------------------

--
-- Table structure for table `cakereg`
--

CREATE TABLE `cakereg` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(280) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakereg`
--

INSERT INTO `cakereg` (`name`, `email`, `pwd`, `phone`, `usertype`) VALUES
('Rakesh', 'rakesh@gmail.com', '$2y$10$y.7b0eSMwsBcN34SG144nOFhxZLUHzgJmpwhU0cWkRx3oB4SSfZBa', 8951771548, 'admin'),
('Ram Prasad S K', 'ramprasadkrishna50@gmail.com', '$2y$10$yXLMyr3aSfsVzDRFJRZ7F.CmNOsB6EVNZbdoOENo65NnJ38CO5Pfe', 8951551548, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `caketypes`
--

CREATE TABLE `caketypes` (
  `tid` int(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caketypes`
--

INSERT INTO `caketypes` (`tid`, `name`, `url`, `price`) VALUES
(1, 'BUTTER CAKE', 'https://assets.epicurious.com/photos/575991f3973781fc02c2a827/6:4/w_1600,c_limit/EP_06062016_Vanilla-Buttermilk-Wedding-Cake-with-Raspberries-and-Orange-Cream-Cheese-Frosting.jpg', 500),
(2, 'POUND CAKE', 'https://assets.epicurious.com/photos/57c6f789082060f11022b586/6:4/w_1600,c_limit/no-recipe-required-pound-cake-lemon-poppy-seed-30082016.jpg', 400),
(3, 'CHIFFON CAKE', 'https://assets.epicurious.com/photos/5af4550baf6ece1dfcaf1a83/6:4/w_1600,c_limit/persian-love-cake-051018.jpg', 600),
(4, 'SPONGE CAKE', 'https://assets.epicurious.com/photos/56f301595380ea2215f3b49c/6:4/w_1600,c_limit/1015-FS-CAKE01.jpg', 500),
(5, 'GENOISE CAKE', 'https://assets.epicurious.com/photos/5af339265e455d485852fba6/6:4/w_1600,c_limit/EP_06012016_strawberry_shortcake_hero-slices.jpg', 500),
(6, 'BISCUIT CAKE', 'https://assets.epicurious.com/photos/5af31a94fddd026b70f8c8e7/6:4/w_1600,c_limit/french-biscuit-cake-050918.jpg', 600),
(7, 'BAKED FLOURLESS CAKE', 'https://assets.epicurious.com/photos/56afe35a4154d00209141c97/6:4/w_1600,c_limit/EP_01272016_-3ingredientflourlesschocolatecake.jpg', 500),
(8, 'UNBAKED FLOURLESS CAKE', 'https://assets.epicurious.com/photos/60b7d0d16cd3418368fee29f/6:4/w_1600,c_limit/blueberry-lemon-icebox-cake-BA-070616.jpg', 500),
(9, 'CARROT CAKE', 'https://assets.epicurious.com/photos/58c978741406b443e2a1375c/6:4/w_1600,c_limit/Classic-Coconut-Carrot-Cake-hero-09032017.jpg', 600),
(10, 'RED VELVET CAKE', 'https://assets.epicurious.com/photos/56bcc39c2388d8216df80735/6:4/w_1600,c_limit/shutterstock_365627156.jpg', 500);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `oid` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `name` varchar(300) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `d` datetime(6) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `delivery` datetime(6) NOT NULL,
  `phno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`name`, `price`, `email`, `d`, `payment`, `address`, `delivery`, `phno`) VALUES
('BUTTER CAKE X 3, CHIFFON CAKE X 3, Vanilla Cake X 3', 5100, 'ramprasadkrishna50@gmail.com', '2023-06-06 20:28:13.000000', 'Cash', 'nagarabhavi', '2023-06-07 20:28:13.000000', 8951551548),
('CAKE X 3', 1500, 'ramprasadkrishna50@gmail.com', '2023-06-06 22:42:45.000000', 'Cash', 'nagarabhavi', '2023-06-07 22:42:45.000000', 8951551548);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cakecat`
--
ALTER TABLE `cakecat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `cakereg`
--
ALTER TABLE `cakereg`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `caketypes`
--
ALTER TABLE `caketypes`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cakecat`
--
ALTER TABLE `cakecat`
  MODIFY `catid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
