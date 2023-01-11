-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 03, 2022 at 11:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwt_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_store`
--

CREATE TABLE `game_store` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `category` int(11) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_store`
--

INSERT INTO `game_store` (`game_id`, `game_name`, `price`, `category`, `pay_type`, `description`, `image`) VALUES
(17, 'Fun Maths', 0, 2, 'free', 'Finger Counting: Another fun game that will help your child learn the basics of math is finger counting.', 'img3.jpg'),
(32, 'Color Book', 0, 3, 'free', 'Kids love fun coloring games, and KIDSHERO is dedicated to best free and original coloring book and painting online games for children!', 'img4.png'),
(33, 'My Puzzle', 0, 1, 'free', 'Designed by learning experts, your child can practice math, reading, phonics, and more. 10,000+ learning activities, games, books, songs, art, and much more!', 'img8.jpg'),
(35, 'Learn English', 0, 2, 'free', 'Do you like playing games in English? We have fun games for you to play. Read the instructions and have fun playing and practising English.', 'img10.png'),
(36, 'Fun English', 699.99, 2, 'paid', 'Do you like playing games in English? We have fun games for you to play. Read the instructions and have fun playing and practising English.', 'img12.jpg'),
(37, 'ABC Book', 459.99, 1, 'paid', 'Do you like playing games in English? We have fun games for you to play. Read the instructions and have fun playing and practising English.', 'img13.jpg'),
(38, 'My Colour Book', 560, 2, 'paid', 'Designed by learning experts, your child can practice math, reading, phonics, and more. 10,000+ learning activities, games, books, songs, art, and much more!', 'img14.jpg'),
(39, 'Drawing Book', 350, 2, 'paid', 'Do you like playing games in English? We have fun games for you to play. Read the instructions and have fun playing and practising English.', 'img15.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_store`
--
ALTER TABLE `game_store`
  ADD PRIMARY KEY (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_store`
--
ALTER TABLE `game_store`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
