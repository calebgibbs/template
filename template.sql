-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 02:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `privilege` enum('admin','photo-manager') NOT NULL,
  `status` enum('active','not_active') NOT NULL DEFAULT 'not_active',
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `privilege`, `status`, `name`, `email`, `password`) VALUES
(1, 'admin', 'active', 'Caleb', 'calebgibbs@me.com', '$2y$10$S3WLbJNGjIdeJvQsZzq.ougoEhnP0VnAbwKwRQ07U88JC/XCp20q2'),
(31, 'photo-manager', 'active', 'Kyle', 'kylegibbs@me.com', '$2y$10$eCHMnWe6/NUjjrvxr0.gZO09.OnVoGIEB9NUTzTFn0VnFMXQ/F5sa'),
(33, 'photo-manager', 'not_active', 'Hello', 'hello@me.com', '$2y$10$N0xpF1naRKEgLAouKehyk.f5jxd7/5Y3ApsY4u1Sd3OkvnT8K.KeS'),
(34, 'photo-manager', 'not_active', 'New', 'new@new.com', '$2y$10$y2Yjn6Q9sTdt1txwtErnvOn4FoguZCgVEDw98bTZzpU5eUJP0KQ3e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
