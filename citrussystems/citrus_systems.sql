-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 06:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus_systems`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `comment` varchar(100) NOT NULL DEFAULT '',
  `approved` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`) VALUES
(1, 'John', 'john@yahoo.com', 'Great Colombian oranges', 1),
(2, 'Annie', 'annie@yahoo.com', 'What is the price of grapefruit?', 1),
(3, 'Keith', 'KeithGun@gmail.com', 'Always fresh fruit available, great company!', 1),
(4, 'John', 'john@yahoo.com', 'Great Colombian oranges', 1),
(5, 'Annie', 'annie@yahoo.com', 'What is the price of grapefruit?', 0),
(6, 'John', 'john@yahoo.com', 'Always fresh fruit available, great company!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`) VALUES
(1, 'Navel Oranges', 'Navel oranges are the most common variety of orange that is eaten. Navels are sweet, seedless, and perfect for eating out-of-hand.', 'navel-orange.jpg'),
(2, 'Valencia Oranges', 'Valencia oranges have thin skins, some seeds, and are very juicy, which makes them the perfect (and most common) type of orange used to make orange juice.', 'valencia-oranges.jpg'),
(3, 'Blood Oranges', 'Blood oranges are famous for their deep red flesh which can vary in the depth of color. From the outside, the fruit may or may not have a bit of red blush on their otherwise orange skins.', 'blood-orange.jpg'),
(6, 'Avalon Lemons', 'Native to Florida, this lemon variety is also known as Avon lemon and is close to the Lisbon lemon.', 'avalon-lemon.jpg'),
(7, 'Bearss Lemons', 'Bearss lemons are from Italy but now grown in Florida since the 1950s. These high-quality juicy lemons contain an ample amount of lemon oil in their peel as well', 'bearss-lemon.jpg'),
(8, 'Buddha\'s Hand Lemons', 'Also known as Finger Citron in many Asian countries, this variety is native to Himalayan lower regions. This fragrant lemon variety resembles fingers, the rind and pith both are useful as it does not contain any seeds or juice.', 'buddha-hand.jpg'),
(9, 'White Grapefruits', 'This was probably everyone’s gateway grapefruit and tends to be the tartest of the bunch. The skin is pale yellow, and the flesh is white with a hint of yellow and some serious bitter with the sweet. ', 'white-grapefruit.jpg'),
(10, 'Red Grapefruits', 'These rosy-fleshed beauties are ideal for eating out of hand or juicing. The skin is deep yellow blushed with pink, and the fruit can range from pale pink to deep rose.', 'red-grapefruit.jpg'),
(11, 'Melogold Grapefruits', 'These are the sweetest grapefruits, so my favorite for snacking or desserts. They can be hard to find, but if you spot them, don’t pass them by. They are larger than standard grapefruits, with a skin that ranges from pale green to deep lime green and the flesh is a range of yellow from pale to deep.', 'melogold-grapefruit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'citrussystems', '997de33296c2463315af5896826440df55d40fd3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
