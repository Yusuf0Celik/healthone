-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Roeitrainer', 'img/roeitrainer.jpg'),
(2, 'Crosstrainer', 'img/crosstrainer.jpg'),
(3, 'Hometrainer', 'img/hometrainer.jpg'),
(4, 'Loopband', 'img/loopband.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `detail`, `category_id`) VALUES
(1, 'VirtuFit Row 450', 'img/row450.jpg', 'Een roeitrainer zorgt net als de crosstrainer voor een full body workout. Je spreekt vrijwel alle spieren aan in je lichaam door de roeiende beweging die je maakt. Met een roeimachine pak je primair de beenspieren, armspieren en rugspieren aan.', 1),
(2, 'VirtuFit Ultimate Pro 2', 'img/virtuFit-ultimate-pro-2.jpg', 'Wil je echt sporten dan kies je voor de roei je rot roeitrainer, zwaard, hard en je bent binnen no-time de expert.', 1),
(3, 'Focus Fitness Row 2', 'img/focus_fitness_row_2.jpg', 'Wil je niet zoveel zweten maar toch wel wat aan die dikke pens doen? gebruik dan de roei je matige roeitrainer.', 1),
(4, 'Infiniti R-100 IR', 'img/infiniti-r-100-ir.jpg', 'Wil je sportief overkomen, maar niet zweten of iets? Dan zie je er goed uit in deze automatische roeitrainer, niets doen en toch sportief lijken.', 1),
(5, 'Cardiostrong Crosstrainer EX60', 'img/cardiostrong-crosstrainer-ex60.jpg', 'Een roeitrainer zorgt net als de crosstrainer voor een full body workout. Je spreekt vrijwel alle spieren aan in je lichaam door de roeiende beweging die je maakt. Met een roeimachine pak je primair de beenspieren, armspieren en rugspieren aan.', 2),
(6, 'Kettler Crosstrainer Optima 400', 'img/kettler-crosstrainer-optima400.jpg', 'Wil je echt sporten dan kies je voor de roei je rot roeitrainer, zwaard, hard en je bent binnen no-time de expert.', 2),
(7, 'Crosstrainer DKN XC 190', 'img/crosstrainer-dkn-xc-190.jpg', 'Wil je niet zoveel zweten maar toch wel wat aan die dikke pens doen? gebruik dan de roei je matige roeitrainer.', 2),
(8, 'Life Fitness Crosstrainer 95Xi', 'img/life-fitness-crosstrainer-95xi.jpg', 'Wil je sportief overkomen, maar niet zweten of iets? Dan zie je er goed uit in deze automatische roeitrainer, niets doen en toch sportief lijken.', 2),
(9, 'Darwin Hometrainer HT40', 'img/darwin-hometrainer-ht40.jpg', 'Een roeitrainer zorgt net als de crosstrainer voor een full body workout. Je spreekt vrijwel alle spieren aan in je lichaam door de roeiende beweging die je maakt. Met een roeimachine pak je primair de beenspieren, armspieren en rugspieren aan.', 3),
(10, 'Flow Fitness Turner DHT2500I', 'img/flow-fitness-turner-dht2500i.jpg', 'Wil je echt sporten dan kies je voor de roei je rot roeitrainer, zwaard, hard en je bent binnen no-time de expert.', 3),
(11, 'Newton Fitness B850', 'img/newton-fitness-b850.jpg', 'Wil je niet zoveel zweten maar toch wel wat aan die dikke pens doen? gebruik dan de roei je matige roeitrainer.', 3),
(12, 'Flow Fitness Pro UB5I Upright Bike', 'img/flow-fitness-pro-ub5i-upright-bike.jpg', 'Wil je sportief overkomen, maar niet zweten of iets? Dan zie je er goed uit in deze automatische roeitrainer, niets doen en toch sportief lijken.', 3),
(13, 'Fitrun 70I', 'img/fitrun-70i.jpg', 'Een roeitrainer zorgt net als de crosstrainer voor een full body workout. Je spreekt vrijwel alle spieren aan in je lichaam door de roeiende beweging die je maakt. Met een roeimachine pak je primair de beenspieren, armspieren en rugspieren aan.', 4),
(14, 'Dukefitness Loopband T40', 'img/dukefitness-loopband-t40.jpg', 'Wil je echt sporten dan kies je voor de roei je rot roeitrainer, zwaard, hard en je bent binnen no-time de expert.', 4),
(15, 'Bowflex Loopband 56', 'img/bowflex-loopband-56.jpg', 'Wil je niet zoveel zweten maar toch wel wat aan die dikke pens doen? gebruik dan de roei je matige roeitrainer.', 4),
(16, 'Life Fitness F1 Smart Loopband', 'img/life-fitness-f1-smart-loopband.jpg', 'Wil je sportief overkomen, maar niet zweten of iets? Dan zie je er goed uit in deze automatische roeitrainer, niets doen en toch sportief lijken.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `rating`, `date`) VALUES
(1, 'lekker ding', 5, '2022-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
