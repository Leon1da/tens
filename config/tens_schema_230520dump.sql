-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 23, 2020 alle 17:56
-- Versione del server: 5.7.29-0ubuntu0.18.04.1
-- Versione PHP: 7.4.3

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
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descrizione` text,
  `moltiplicatore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
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
(10, 'Reggae', NULL, 500);

-- --------------------------------------------------------

--
-- Struttura della tabella `games`
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

--
-- Dump dei dati per la tabella `games`
--

INSERT INTO `games` (`id`, `user`, `categoria`, `score`, `numero_domande`, `esatte`, `errate`, `mancate`, `vittoria`, `start`, `stop`) VALUES
(1, 1, 1, 33753, 10, 8, 2, 0, 1, '2020-05-14 19:38:39', '2020-05-14 19:39:53'),
(2, 1, 1, 14811, 10, 6, 4, 0, 1, '2020-05-15 08:07:45', '2020-05-15 08:09:11'),
(3, 1, 1, 32660, 10, 9, 1, 0, 1, '2020-05-15 08:10:30', '2020-05-15 08:11:43'),
(4, 1, 5, 4973, 10, 3, 7, 0, 0, '2020-05-15 08:15:47', '2020-05-15 08:16:43'),
(5, 2, 1, 49631, 10, 9, 1, 0, 1, '2020-05-15 12:11:45', '2020-05-15 12:13:10'),
(6, 2, 1, 9836, 10, 5, 5, 0, 0, '2020-05-15 12:13:14', '2020-05-15 12:14:43'),
(7, 2, 8, 0, 10, 0, 10, 0, 0, '2020-05-15 12:15:16', '2020-05-15 12:16:38'),
(8, 2, 3, 7033, 10, 5, 5, 0, 0, '2020-05-15 12:16:46', '2020-05-15 12:18:03'),
(9, 2, 1, 25301, 10, 8, 2, 0, 1, '2020-05-15 12:23:04', '2020-05-15 12:25:27'),
(10, 2, 1, 9597, 10, 5, 2, 3, 0, '2020-05-17 12:35:53', '2020-05-17 12:37:42'),
(11, 2, 5, 7148, 10, 6, 4, 0, 1, '2020-05-20 15:11:03', '2020-05-20 15:12:23'),
(12, 6, 4, 4706, 10, 3, 7, 0, 0, '2020-05-20 15:41:30', '2020-05-20 15:42:54'),
(13, 6, 1, 26273, 10, 7, 3, 0, 1, '2020-05-20 15:42:57', '2020-05-20 15:44:09'),
(14, 7, 1, 26270, 10, 8, 2, 0, 1, '2020-05-20 15:49:26', '2020-05-20 15:50:31'),
(15, 7, 10, 7139, 10, 4, 6, 0, 0, '2020-05-20 15:50:40', '2020-05-20 15:51:48'),
(16, 8, 1, 18158, 10, 7, 3, 0, 1, '2020-05-20 15:54:33', '2020-05-20 15:55:41'),
(17, 9, 1, 15294, 10, 6, 4, 0, 1, '2020-05-20 15:59:51', '2020-05-20 16:04:01'),
(18, 9, 8, 3848, 10, 3, 7, 0, 0, '2020-05-20 16:04:15', '2020-05-20 16:05:33'),
(19, 9, 1, 23051, 10, 7, 3, 0, 1, '2020-05-20 16:05:38', '2020-05-20 16:06:41'),
(20, 1, 1, 42844, 10, 9, 1, 0, 1, '2020-05-20 16:19:03', '2020-05-20 16:20:32'),
(21, 2, 1, 36954, 10, 9, 1, 0, 1, '2020-05-22 15:05:09', '2020-05-22 15:07:45'),
(22, 2, 1, 3417, 10, 2, 4, 4, 0, '2020-05-23 15:36:02', '2020-05-23 15:50:11');

-- --------------------------------------------------------

--
-- Struttura della tabella `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `codice` varchar(40) NOT NULL,
  `Descrizione` varchar(50) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `playlists`
--

INSERT INTO `playlists` (`id`, `codice`, `Descrizione`, `categoria_id`) VALUES
(1, '37i9dQZEVXbIQnj7RRhdSX', 'Top 50 - Italia', 1),
(2, '37i9dQZF1DX3TWNqYSIKyu', 'Top Tracks 2019 italia', 1),
(3, '37i9dQZF1DX4ajYJ56sH0n', 'Top Artists Italia 2019', 1),
(5, '37i9dQZF1DWVz7BuFrhYRc', 'Anni 10', 1),
(8, '37i9dQZF1DX14EWeH2Pwf3', 'Rap Italia: Battle Royale', 3),
(9, '37i9dQZF1DWXRqgorJj26U', 'Rock Classics', 2),
(10, '37i9dQZF1DX6PSDDh80gxI', 'Indie Italia', 4),
(11, '37i9dQZF1DWYCIYGXn56uz', 'Pop virale', 5),
(12, '37i9dQZF1DX7gGbVYiYw1L', 'Karaoke Italiano', 5),
(13, '37i9dQZF1DXbYM3nMM0oPk', 'Mega Hit Mix', 5),
(14, '37i9dQZEVXbKbvcwe5owJ1', 'Viral 50', 1),
(15, '37i9dQZF1DWXU2naFUn37x', 'Zona Trap', 3),
(16, '37i9dQZF1DX7Mq3mO5SSDc', 'Hip-Hop Anthems: Def Jam', 6),
(18, '37i9dQZF1DWZMRmURm95Lk', 'Radici Hip Hop', 6),
(19, '37i9dQZF1DX10zKzsJ2jva', 'Viva Latino!', 7),
(20, '37i9dQZF1DWY7IeIP1cdjF', 'Baila Reggaeton', 7),
(21, '37i9dQZF1DWVcbzTgVpNRm', 'Latin Party Anthems', 7),
(22, '37i9dQZF1DWUv0cTKdT8jJ', 'Volume', 2),
(23, '37i9dQZF1DWZNFWEuVbQpD', 'The Rock Show', 2),
(26, '37i9dQZF1DWWGFQLoP9qlv', 'Legendary', 2),
(28, '37i9dQZF1DX2ENAPP1Tyed', 'Dance Room', 8),
(29, '37i9dQZF1DXaXB8fQg7xif', 'Dance Party', 8),
(30, '37i9dQZF1DXcZDD7cfEKhW', 'Pop Remix', 8),
(31, '37i9dQZF1DX8a1tdzq5tbM', 'Dance Classics', 8),
(32, '37i9dQZF1DWX21Ue9Rttn8', 'Indie Triste', 4),
(37, '37i9dQZF1DWYmmr74INQlb', 'I Love My \'00s R&B', 9),
(38, '37i9dQZF1DX4SBhb3fqCJd', 'Are & Be', 9),
(39, '37i9dQZF1DXbSbnqxMTGx9', 'Reggae Classics', 10),
(40, '37i9dQZF1DXbwoaqxaoAVr', 'Sunshine Reggae', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
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
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nome`, `cognome`, `sesso`) VALUES
(1, 'leonardo', '$2y$10$LHr39ZQNsrJP44VT3AoxretjnOrpIeb26.d9T6k/A4atpEttT4daG', 'leonardo@gmail.com', 'Leonardo', 'Ospizio', 'M'),
(2, 'francesco', '$2y$10$PXHokMBz9C98eEPfk4TCeeU8P4utkx9BMK0qpk31iOGKY8F4OKqnK', 'francescot@email.com', 'Francesco', 'Tassone', 'N'),
(3, 'Giacomo', '$2y$10$hVzwIOT5JO3tZ2cJ6l1l2em/Q9m4Ya5Z7QPXCUFgQCXiHT5NQej1q', 'hsshsjsj@gmail.com', 'Giacomo', 'Kebab', 'A'),
(5, 'Ugo', '$2y$10$SzZM02BJEhfU5hfw7fNMFO5t2gTgIgTN8tP5OX7gNBJi72E6XBP5m', 'ugo@gmail.com', 'Ugo', 'Ugo', 'A'),
(6, 'xae12musk', '$2y$10$95D6126Wy8mLbsX.K8JtgeTc/Ve5ZED0BFWDh6Sg9NoS8R5RoxHrC', 'ash@musk.com', 'X AE A-12', 'Musk', 'A'),
(7, 'alessandro', '$2y$10$qJHs/YTj1DyTMTJq3grZiebxfxDceSBk2ieuRL3mxP5pr6uX2ofnG', 'ale@email.com', 'Alessandro', 'Ale', 'M'),
(8, 'mariorossi', '$2y$10$uQoUJ0p98IEzkRjmG4rCtOTEl9jTD955wDsDA9LfVcGWTsja.K9h6', 'mario@rossi.com', 'Mario', 'Rossi', 'M'),
(9, 'ajejebrazorf', '$2y$10$oOmEPgqllaL1RhWJPczvDeJta9vS7AYIzX6WPFjj8mClHlKgU9rjG', 'aldo@aa.it', 'Ajeje', 'Brazorf', 'M'),
(10, 'antonio11', '$2y$10$GfUNe1u/1zLykk/2CXETlOCnElGMobHQiIAdOKyhW9h8x7IxR1s3O', 'maranello@gmail.comc', 'Antonio', 'Maranello', 'M'),
(11, 'dajeforte', '$2y$10$lhYjneuEs3zrPwZWitLn8evpTIhWClZ9BgzhEH/tpVOtrQRr5aovC', 'ja@sd.it', 'daje ', 'daje', 'M');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `categoria` (`categoria`);

--
-- Indici per le tabelle `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `Category_id` FOREIGN KEY (`categoria`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_id` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
