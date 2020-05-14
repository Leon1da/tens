-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2020 at 01:10 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tens_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descrizione` text,
  `moltiplicatore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nome`, `descrizione`, `moltiplicatore`) VALUES
(1, 'Normale', 'Categoria di gioco normale', 1000),
(2, 'Rock', NULL, 500),
(3, 'Rap Trap', NULL, 500),
(4, 'Indie', NULL, 500),
(5, 'Pop', NULL, 500),
(6, 'Hip-Hop', NULL, 500),
(7, 'Reggaeton', NULL, 500),
(8, 'Dance', NULL, 500),
(9, 'R&B', NULL, 500),
(10, 'Reggae', NULL, 500),
(11, 'Sanremo', NULL, 500);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `user` int(11) UNSIGNED NOT NULL,
  `categoria` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `numero_domande` int(2) NOT NULL,
  `esatte` int(2) NOT NULL,
  `errate` int(2) NOT NULL,
  `mancate` int(2) NOT NULL,
  `vittoria` tinyint(1) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stop` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `codice` varchar(40) NOT NULL,
  `Descrizione` varchar(50) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `codice`, `Descrizione`, `categoria_id`) VALUES
(1, '37i9dQZEVXbIQnj7RRhdSX', 'Top 50 - Italia', 1),
(2, '37i9dQZF1DX3TWNqYSIKyu', 'Top Tracks 2019 italia', 1),
(3, '37i9dQZF1DX4ajYJ56sH0n', 'Top Artists Italia 2019', 1),
(5, '37i9dQZF1DWVz7BuFrhYRc', 'Anni 10', 1),
(7, '37i9dQZF1DX4o1oenSJRJd', 'All Out 00s', 1),
(8, '37i9dQZF1DX14EWeH2Pwf3', 'Rap Italia: Battle Royale', 3),
(9, '37i9dQZF1DWXRqgorJj26U', 'Rock Classics', 2),
(10, '37i9dQZF1DX6PSDDh80gxI', 'Indie Italia', 4),
(11, '37i9dQZF1DWYCIYGXn56uz', 'Pop virale', 5),
(12, '37i9dQZF1DX7gGbVYiYw1L', 'Karaoke Italiano', 5),
(13, '37i9dQZF1DXbYM3nMM0oPk', 'Mega Hit Mix', 5),
(14, '37i9dQZEVXbKbvcwe5owJ1', 'Viral 50', 1),
(15, '37i9dQZF1DWXU2naFUn37x', 'Zona Trap', 3),
(16, '37i9dQZF1DX7Mq3mO5SSDc', 'Hip-Hop Anthems: Def Jam', 6),
(17, '37i9dQZF1DWXRPjCBAuFj3', 'Hip Hop Mix', 6),
(18, '37i9dQZF1DWZMRmURm95Lk', 'Radici Hip Hop', 6),
(19, '37i9dQZF1DX10zKzsJ2jva', 'Viva Latino!', 7),
(20, '37i9dQZF1DWY7IeIP1cdjF', 'Baila Reggaeton', 7),
(21, '37i9dQZF1DWVcbzTgVpNRm', 'Latin Party Anthems', 7),
(22, '37i9dQZF1DWUv0cTKdT8jJ', 'Volume', 2),
(23, '37i9dQZF1DWZNFWEuVbQpD', 'The Rock Show', 2),
(26, '37i9dQZF1DWWGFQLoP9qlv', 'Legendary', 2),
(27, '37i9dQZF1DX5Ejj0EkURtP', 'All Out 10s', 1),
(28, '37i9dQZF1DX2ENAPP1Tyed', 'Dance Room', 8),
(29, '37i9dQZF1DXaXB8fQg7xif', 'Dance Party', 8),
(30, '37i9dQZF1DXcZDD7cfEKhW', 'Pop Remix', 8),
(31, '37i9dQZF1DX8a1tdzq5tbM', 'Dance Classics', 8),
(32, '37i9dQZF1DWX21Ue9Rttn8', 'Indie Triste', 4),
(37, '37i9dQZF1DWYmmr74INQlb', 'I Love My \'00s R&B', 9),
(38, '37i9dQZF1DX4SBhb3fqCJd', 'Are & Be', 9),
(39, '37i9dQZF1DXbSbnqxMTGx9', 'Reggae Classics', 10),
(40, '37i9dQZF1DXbwoaqxaoAVr', 'Sunshine Reggae', 10),
(41, '37i9dQZF1DWYZT753dwv7V', 'Sanremo: La Storia', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `sesso` enum('M','F','A','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `Category_id` FOREIGN KEY (`categoria`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_id` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
