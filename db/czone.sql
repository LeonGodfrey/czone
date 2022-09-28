-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2022 at 06:48 PM
-- Server version: 10.6.7-MariaDB-2ubuntu1.1
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `czone`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `pId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pOrder`
--

CREATE TABLE `pOrder` (
  `orderId` int(11) NOT NULL,
  `orderNo` varchar(100) DEFAULT NULL,
  `pName` varchar(200) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `pId` int(11) DEFAULT NULL,
  `order_date` varchar(100) DEFAULT NULL,
  `order_time` varchar(100) DEFAULT NULL,
  `userIdF` int(11) DEFAULT NULL,
  `userIdC` int(11) DEFAULT NULL,
  `userIdD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pOrder`
--

INSERT INTO `pOrder` (`orderId`, `orderNo`, `pName`, `price`, `quantity`, `amount`, `status`, `pId`, `order_date`, `order_time`, `userIdF`, `userIdC`, `userIdD`) VALUES
(1, 'cz4582', '1.5 kg Chicken Wings', '15000', 1, '15000', 'delivered', NULL, '2022-09-04', '03:37:30 PM', 1, 2, 3),
(2, 'cz6948', 'Half Tray of Eggs', '6000', 1, '6000', 'delivered', NULL, '2022-09-04', '03:37:30 PM', 1, 2, 3),
(3, 'cz2058', '10 Egg Carton', '8000', 1, '8000', 'cancelled', NULL, '2022-09-05', '12:10:50 PM', 1, 2, NULL),
(4, 'cz6510', 'Chicken Thighs', '14500', 1, '14500', 'delivered', NULL, '2022-09-05', '01:58:45 PM', 1, 2, 3),
(5, 'cz3228', 'Half Tray of Eggs', '6000', 1, '6000', 'delivered', NULL, '2022-09-05', '01:58:45 PM', 1, 2, 3),
(6, 'cz6990', 'Chicken Breast (Half Kilo)', '8500', 1, '8500', 'cancelled', NULL, '2022-09-05', '01:58:45 PM', 1, 2, 3),
(7, 'cz8612', 'Gizzards', '15500', 1, '15500', 'placed', NULL, '2022-09-05', '01:58:45 PM', 1, 2, 5),
(8, 'cz8249', '1.5 kg Chicken Wings', '15000', 1, '15000', 'placed', NULL, '2022-09-05', '01:58:45 PM', 1, 2, 5),
(9, 'cz8364', 'Off Layer', '16000', 1, '16000', 'delivered', NULL, '2022-09-13', '09:37:57 AM', 1, 4, 3),
(10, 'cz2326', 'Chicken Breast (Half Kilo)', '8500', 10, '85000', 'delivered', NULL, '2022-09-17', '12:11:53 PM', 1, 2, 3),
(11, 'cz7583', 'Chicken Breast (Half Kilo)', '8500', 3, '25500', 'delivered', NULL, '2022-09-17', '01:00:24 PM', 1, 6, 3),
(12, 'cz4584', 'Half Tray of Eggs', '6000', 3, '18000', 'placed', NULL, '2022-09-17', '01:00:24 PM', 1, 6, 5),
(13, 'cz7793', '1kg Chicken Hearts', '12000', 4, '48000', 'placed', NULL, '2022-09-17', '01:00:24 PM', 1, 6, 5),
(14, 'cz2364', '1kg Chicken Hearts', '12000', 2, '24000', 'placed', NULL, '2022-09-18', '08:58:40 AM', 1, 6, NULL),
(15, 'cz2843', 'Gizzards', '15500', 2, '31000', 'placed', NULL, '2022-09-18', '08:58:40 AM', 1, 6, NULL),
(16, 'cz2277', 'Off Layer', '16000', 2, '32000', 'placed', NULL, '2022-09-18', '08:58:40 AM', 1, 6, NULL),
(17, 'cz5629', '10 Egg Carton', '8000', 7, '56000', 'placed', NULL, '2022-09-28', '05:53:37 PM', 1, 2, NULL),
(18, 'cz2218', '1.5 kg Chicken Wings', '15000', 5, '75000', 'placed', NULL, '2022-09-28', '05:53:37 PM', 1, 2, NULL),
(19, 'cz8528', 'Tray of Eggs', '12500', 1, '12500', 'placed', NULL, '2022-09-28', '05:53:37 PM', 1, 2, NULL),
(20, 'cz3155', 'Bovans Brown Cock', '25000', 1, '25000', 'placed', NULL, '2022-09-28', '05:57:49 PM', 7, 2, NULL),
(21, 'cz3251', '1kg Chicken Hearts', '12000', 1, '12000', 'placed', NULL, '2022-09-28', '06:03:30 PM', 1, 2, NULL),
(22, 'cz6546', '1kg Chicken Hearts', '12000', 5, '60000', 'placed', NULL, '2022-09-28', '06:24:13 PM', 1, 2, NULL),
(23, 'cz6768', 'Chicken Breast (1/2)', '8500', 3, '25500', 'placed', NULL, '2022-09-28', '06:24:13 PM', 1, 2, NULL),
(24, 'cz6850', 'Tray of Eggs', '12500', 2, '25000', 'placed', NULL, '2022-09-28', '06:24:13 PM', 1, 2, NULL),
(25, 'cz6144', 'Half Tray of Eggs', '6000', 2, '12000', 'placed', NULL, '2022-09-28', '06:36:16 PM', 1, 2, NULL),
(26, 'cz6105', 'Whole Chicken', '23500', 2, '47000', 'placed', NULL, '2022-09-28', '06:36:16 PM', 1, 2, NULL),
(27, 'cz8639', 'Fresh Necks', '16500', 3, '49500', 'placed', NULL, '2022-09-28', '06:36:16 PM', 1, 2, NULL),
(28, 'cz2797', 'Gizzards', '15500', 2, '31000', 'placed', NULL, '2022-09-28', '06:37:04 PM', 1, 2, NULL),
(29, 'cz4332', '10 Egg Carton', '8000', 3, '24000', 'placed', NULL, '2022-09-28', '06:39:35 PM', 1, 2, NULL),
(30, 'cz2512', 'Whole Chicken', '23500', 4, '94000', 'placed', NULL, '2022-09-28', '06:46:51 PM', 1, 2, NULL),
(31, 'cz6769', 'Gizzards', '15500', 3, '46500', 'placed', NULL, '2022-09-28', '06:47:29 PM', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pId` int(11) NOT NULL,
  `pName` varchar(100) DEFAULT NULL,
  `pDesc` text DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `photo` varchar(250) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pId`, `pName`, `pDesc`, `price`, `quantity`, `photo`, `userId`) VALUES
(10, '1kg Chicken Hearts', 'This is 1kg of  Chicken Hearts. They are well cleaned and ready to roast for barbecue or pan frying.', '12000', 0, '1kg_chicken_heartsdisarray.jpeg', 1),
(11, 'Gizzards', 'Clean \"Stone-Free\" gizzards weighing between 1.4 to 1.7 kgs available for our customers.', '15500', 5, 'gizzardsdisarray.jpeg', 1),
(12, '10 Egg Carton', 'These are packed in a box carton for easier carriage and handling. Simply keep in a cool dry place.', '8000', 17, '10_egg_cartondis1_.jpeg', 1),
(13, '1.5 kg Chicken Wings', 'This is 1.5kg of cleanly cut fresh Chicken wings packed in a plastic platter ready for preparation at your convience.', '15000', 20, '1.5_kg_chicken_wingsdis1_.jpeg', 1),
(14, 'Half Tray of Eggs', 'No need to worry about bulk purchase. Grab 15 box packed eggs from ChickenZone and enjoy purchasing in your comfort.', '6000', 48, 'half_tray_of_eggsdis1_.jpeg', 1),
(15, 'Chicken Breast (1/2)', 'Clean and Fresh Chicken Poultry Breasts only packed in recyclable plastic weighing between 1.4 to 1.7 kgs for you to enjoy.', '8500', 0, 'chicken_breast_(half_kilo)dis1_.jpeg', 1),
(16, 'Tray of Eggs', 'These are 30 eggs packed in traditional box trays. Simply store surplus in a cool dry place for up to 2 months', '12500', 0, 'tray_of_eggsdis1_.jpeg', 1),
(17, 'Whole Chicken', 'This a freshly cut chicken + 1 gizzard + 1 heart weighing between 2 - 2.5 kilos ready ready to cook, roast, oven fry or pan fry packed in a silver plate.', '23500', 44, 'whole_chickendisarray.jpeg', 1),
(18, 'Fresh Necks', 'These are packed fresh Chicken Necks ready for preparation and consumption. These weigh between 1.2-1.6 kgs.', '16500', 47, 'fresh_necksdis1_.jpeg', 1),
(19, 'Chicken Thighs', '1.2 -1.5 kgs of Fresh Chicken Thighs that are ready for home consumption and restaurant or chicken use.', '14500', 50, 'chicken_thighsdis1_.jpeg', 1),
(21, 'Off Layer', 'This is an Off-layer bird ready for meat consumption or stew preparation. It is a Bovans Brown breed bird.', '16000', 20, 'off_layerdis1_.png', 1),
(22, 'Bovans Brown Cock', 'These are cocks ready for preparation of', '25000', 30, 'bovans_brown_cockdis7_.png', 7),
(23, '3kg Full Chicken', 'This is a full chicken packed with all it internal parts ready for preparation.', '30000', 12, '3kg_full_chickendisarray.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `nin` varchar(15) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tpMeans` varchar(100) DEFAULT NULL,
  `permitNo` varchar(15) DEFAULT NULL,
  `vCard` varchar(250) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `phone`, `location`, `nin`, `password`, `type`, `description`, `tpMeans`, `permitNo`, `vCard`, `photo`) VALUES
(1, 'KAYONDO ARNOLD', 'kayondo@gmail.com', '0705 410 508', 'Kireka Bira', NULL, '$2y$10$A43T3Eu40DaYpn.a7SjEx.3t7KLh1CSdOZqwXYJqnUpAXgavsut8u', 'farmer', 'We offer fresh Poultry products to you at affordable prices such that you can enjoy comfort in obtaining what you need.', NULL, NULL, NULL, 'vlcsnap-2020-08-26-11h01m54s845.png'),
(2, 'Ssegawa', 'ssegodfrey171@gmail.com', '0753446252', 'Kireka Bira', NULL, '$2y$10$ldAIRJXcM4aAjIlTolgdo.AHVuM6X3MhpcRhokdBY83NRhc/5uoem', 'customer', NULL, NULL, NULL, NULL, 'g1.png'),
(3, 'Leonardo', 'leon@gmail.com', '078907543', 'kakiri', 'sdfi65nm', '$2y$10$mSRFsqb4.v.ZE6mIjhkATubZ/6v76.2k9r.wpUiHnYF77gdTCUQtS', 'agent', 'QWErty', 'bicycle', NULL, NULL, 'photo_2020-05-16_17-11-02.jpg'),
(4, 'Kayondo Arnold', 'tmntwinx@gmail.com', '0705410674', 'Kireka Bira', NULL, '$2y$10$0I4Q83KXbIK4dtoaKOimRexhbpRf6Anb.ewGGDI6euyrHyGgsjIfC', 'customer', 'We run a simple family setting farm selling chicken and eggs.', NULL, NULL, NULL, NULL),
(5, 'Patricio Bioko', 'tripacio@gmail.com', '0700763051', 'Olympia hostel', 'CM0022510CQYG', '$2y$10$XGr94L3yHj/dfwY3n6nS6ueRJqGsyoUGZEwj8giXezLmWYobq2Pym', 'agent', 'I use a bicycle.', 'Bicycle', NULL, NULL, NULL),
(6, 'Munduru Sandra', 'sandra@gmail.com', '0702000222', 'Olympia hostel', NULL, '$2y$10$kC9/WFUN.CW9GFzVtWF7K.yydpbPmK3v37RMonu1CPSOOg4NCQ.ea', 'customer', NULL, NULL, NULL, NULL, 'e6.png'),
(7, 'Jadon Sancho', 'jadon@gmail.com', '0752000111', 'Manchester', NULL, '$2y$10$MFdCOO9PKZVCZpM47YoLqeD4UzVBep29xpoZWbDhxNbT/4BvqoYny', 'farmer', 'I live in the city of Manchester. I love eating chicken.', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `cart_ibfk_1` (`userId`),
  ADD KEY `pId` (`pId`);

--
-- Indexes for table `pOrder`
--
ALTER TABLE `pOrder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pOrder`
--
ALTER TABLE `pOrder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pId`) REFERENCES `product` (`pId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
