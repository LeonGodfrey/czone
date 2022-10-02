-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2022 at 03:21 PM
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
-- Table structure for table `checker`
--

CREATE TABLE `checker` (
  `id` int(11) NOT NULL,
  `checker` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checker`
--

INSERT INTO `checker` (`id`, `checker`) VALUES
(1, 'success'),
(2, 'success'),
(3, 'success'),
(4, 'success'),
(5, 'success'),
(6, 'success'),
(7, 'success'),
(8, 'success'),
(9, 'success'),
(10, 'success'),
(11, 'success'),
(12, 'success'),
(13, 'success'),
(14, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `agent_id` varchar(155) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `order_id` varchar(200) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `order_details` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `agent_id`, `agent_name`, `order_id`, `message`, `order_details`, `phone_number`) VALUES
(1, '3', 'Leonardo', '4', 'Hello Leonardo, you have been assigned an order. Order number: cz8637, Order name: 1kg Chicken Hearts, Order quantity: 1, Order price: 12000, Order total: 12000. Thank you.', '1kg Chicken Hearts', '078907543'),
(2, '3', 'Leonardo', '5', 'Hello Leonardo, you have been assigned an order. Order number: cz3618, Order name: 1.5 kg Chicken Wings, Order quantity: 1, Order price: 15000, Order total: 15000. Thank you.', '1.5 kg Chicken Wings', '0753446252'),
(3, '3', 'Leonardo', '6', 'Hello Leonardo, you have been assigned an order. Order number: cz4951, Order name: 1kg Chicken Hearts, Order quantity: 1, Order price: 12000, Order total: 12000. Thank you.', '1kg Chicken Hearts', '0753446252');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `transaction_ref` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_name`, `amount`, `reason`, `status`, `phone_number`, `transaction_ref`, `customer_id`) VALUES
(1, 'Katende Nicholas', '23000', 'payment for order', 'pending', '256759983853', 'cz20220930021608', 8),
(2, 'Katende Nicholas', '27500', 'payment for order', 'pending', '256759983853', 'cz20220930021951', 8),
(3, 'Katende Nicholas', '0', 'payment for order', 'pending', '256759983853', 'cz20220930022121', 8),
(4, 'Katende Nicholas', '27500', 'payment for order', 'pending', '256759983853', 'cz20220930022420', 8),
(5, 'Ssegawa', '27000', 'payment for an order', 'pending', '0753446252', 'cz20220930110042', 2),
(6, 'Ssegawa', '12000', 'payment for an order', 'pending', '0753446252', 'cz20220930110736', 2),
(7, 'Ssegawa', '8000', 'payment for an order', 'pending', '0753446252', 'cz20220930112613', 2);

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
(1, 'cz7416', '1kg Chicken Hearts', '12000', 1, '12000', 'assigned', NULL, '2022-09-30', '02:24:20 PM', 1, 8, 3),
(2, 'cz5275', 'Gizzards', '15500', 1, '15500', 'placed', NULL, '2022-09-30', '02:24:20 PM', 1, 8, 3),
(3, 'cz2244', '10 Egg Carton', '8000', 1, '8000', 'placed', NULL, '2022-09-30', '10:45:48 PM', 1, 2, 3),
(4, 'cz8637', '1kg Chicken Hearts', '12000', 1, '12000', 'placed', NULL, '2022-09-30', '11:00:42 PM', 1, 2, 3),
(5, 'cz3618', '1.5 kg Chicken Wings', '15000', 1, '15000', 'placed', NULL, '2022-09-30', '11:00:42 PM', 1, 2, 3),
(6, 'cz4951', '1kg Chicken Hearts', '12000', 1, '12000', 'placed', NULL, '2022-09-30', '11:07:36 PM', 1, 2, 3),
(7, 'cz8441', '10 Egg Carton', '8000', 1, '8000', 'placed', NULL, '2022-09-30', '11:26:13 PM', 1, 2, NULL);

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
(10, '1kg Chicken Hearts', 'This is 1kg of  Chicken Hearts. They are well cleaned and ready to roast for barbecue or pan frying.', '12000', 17, '1kg_chicken_heartsdisarray.jpeg', 1),
(11, 'Gizzards', 'Clean \"Stone-Free\" gizzards weighing between 1.4 to 1.7 kgs available for our customers.', '15500', 14, 'gizzardsdisarray.jpeg', 1),
(12, '10 Egg Carton', 'These are packed in a box carton for easier carriage and handling. Simply keep in a cool dry place.', '8000', 18, '10_egg_cartondis1_.jpeg', 1),
(13, '1.5 kg Chicken Wings', 'This is 1.5kg of cleanly cut fresh Chicken wings packed in a plastic platter ready for preparation at your convience.', '15000', 19, '1.5_kg_chicken_wingsdis1_.jpeg', 1),
(14, 'Half Tray of Eggs', 'No need to worry about bulk purchase. Grab 15 box packed eggs from ChickenZone and enjoy purchasing in your comfort.', '6000', 50, 'half_tray_of_eggsdis1_.jpeg', 1),
(15, 'Chicken Breast (1/2)', 'Clean and Fresh Chicken Poultry Breasts only packed in recyclable plastic weighing between 1.4 to 1.7 kgs for you to enjoy.', '8500', 50, 'chicken_breast_(half_kilo)dis1_.jpeg', 1),
(16, 'Tray of Eggs', 'These are 30 eggs packed in traditional box trays. Simply store surplus in a cool dry place for up to 2 months', '12500', 100, 'tray_of_eggsdis1_.jpeg', 1),
(17, 'Whole Chicken', 'This a freshly cut chicken + 1 gizzard + 1 heart weighing between 2 - 2.5 kilos ready ready to cook, roast, oven fry or pan fry packed in a silver plate.', '23500', 50, 'whole_chickendisarray.jpeg', 1),
(18, 'Fresh Necks', 'These are packed fresh Chicken Necks ready for preparation and consumption. These weigh between 1.2-1.6 kgs.', '16500', 50, 'fresh_necksdis1_.jpeg', 1),
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
(7, 'Jadon Sancho', 'jadon@gmail.com', '0752000111', 'Manchester', NULL, '$2y$10$MFdCOO9PKZVCZpM47YoLqeD4UzVBep29xpoZWbDhxNbT/4BvqoYny', 'farmer', 'I live in the city of Manchester. I love eating chicken.', NULL, NULL, NULL, NULL),
(8, 'Katende Nicholas', 'katznicho@gmail.com', '0759983853', 'Kampala, kawempe', NULL, '$2y$10$MxOC3l25uAj4CxjDsITwMO9u0lBb.0aKYzrE5LY5Rsgad9.UpbEb2', 'customer', 'Am a good person', NULL, NULL, NULL, NULL),
(10, 'czone admin', 'czoneadmin@gmail.com', '0753446252', 'nansanaguhbin', NULL, '$2y$10$P5Km1WyC8.VosLvN0Ttu1.nektOv3bbKFZOSm0At7.nVVCsbpnJDW', 'admin', 'hello', NULL, NULL, NULL, 'IMG_20201024_141811_646.jpg');

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
-- Indexes for table `checker`
--
ALTER TABLE `checker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `checker`
--
ALTER TABLE `checker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pOrder`
--
ALTER TABLE `pOrder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
