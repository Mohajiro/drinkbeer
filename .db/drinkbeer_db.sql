-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-drinkbeer.alwaysdata.net
-- Generation Time: Mar 05, 2025 at 10:49 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drinkbeer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `alcohol` float NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `average_price` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beers`
--

INSERT INTO `beers` (`id`, `name`, `origin`, `alcohol`, `description`, `image_url`, `average_price`, `created_at`) VALUES
(1, 'Bud Light', 'United States', 4.2, 'Легкий и освежающий американский светлый лагер.', 'assets/images/Bud-Light.jpeg', 26.99, '2025-03-03 12:34:42'),
(2, 'Coors Light Lager Beer', 'United States', 4.2, 'Хрустящий и освежающий светлый лагер с легким вкусом.', 'assets/images/Coors-Light-Lager-Beer.jpeg', 21.99, '2025-03-03 12:34:42'),
(3, 'Miller Lite Lager Beer', 'United States', 4.2, 'Классический американский лагер с легким хмелевым вкусом.', 'assets/images/Miller-Lite-Lager-Beer.jpeg', 22.99, '2025-03-03 12:34:42'),
(4, 'Corona Extra', 'Mexico', 4.6, 'Знаменитый мексиканский лагер с цитрусовыми нотами.', 'assets/images/Corona-Extra.jpeg', 29.99, '2025-03-03 12:34:42'),
(5, 'Michelob ULTRA', 'United States', 4.2, 'Легкий, низкокалорийный лагер с освежающим вкусом.', 'assets/images/Michelob-ULTRA.jpeg', 27.99, '2025-03-03 12:34:42'),
(6, 'Bud Light', 'United States', 4.2, 'Легкий и освежающий американский светлый лагер.', 'assets/images/Bud-Light.jpeg', 26.99, '2025-03-03 12:35:23'),
(7, 'Coors Light Lager Beer', 'United States', 4.2, 'Хрустящий и освежающий светлый лагер с легким вкусом.', 'assets/images/Coors-Light-Lager-Beer.jpeg', 21.99, '2025-03-03 12:35:23'),
(8, 'Miller Lite Lager Beer', 'United States', 4.2, 'Классический американский лагер с легким хмелевым вкусом.', 'assets/images/Miller-Lite-Lager-Beer.jpeg', 22.99, '2025-03-03 12:35:23'),
(9, 'Corona Extra', 'Mexico', 4.6, 'Знаменитый мексиканский лагер с цитрусовыми нотами.', 'assets/images/Corona-Extra.jpeg', 29.99, '2025-03-03 12:35:23'),
(10, 'Michelob ULTRA', 'United States', 4.2, 'Легкий, низкокалорийный лагер с освежающим вкусом.', 'assets/images/Michelob-ULTRA.jpeg', 27.99, '2025-03-03 12:35:23'),
(11, 'Stella Artois', 'Belgium', 5, 'Классический бельгийский лагер с мягким солодовым вкусом.', 'assets/images/Stella-Artois.jpeg', 31.99, '2025-03-03 12:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `beer_categories`
--

CREATE TABLE `beer_categories` (
  `beer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(4) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `user_id` int(11) DEFAULT NULL,
  `beer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','admin') DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Mohajiro', 'defrind@gmail.com', 'Qwerty2024', 'admin', '2025-03-03 12:12:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beer_categories`
--
ALTER TABLE `beer_categories`
  ADD PRIMARY KEY (`beer_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `beer_id` (`beer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beer_categories`
--
ALTER TABLE `beer_categories`
  ADD CONSTRAINT `beer_categories_ibfk_1` FOREIGN KEY (`beer_id`) REFERENCES `beers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beer_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`beer_id`) REFERENCES `beers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
