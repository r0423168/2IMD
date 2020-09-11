-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mei 2020 om 12:55
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecovybe`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'fruit'),
(2, 'herb'),
(3, 'vegetable');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `garden`
--

CREATE TABLE `garden` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `items_id` int(11) NOT NULL,
  `sensor_id` int(11) DEFAULT NULL,
  `created at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `garden`
--

INSERT INTO `garden` (`id`, `name`, `items_id`, `sensor_id`, `created at`, `user_id`) VALUES
(1, 'Tommy', 3, 1, NULL, 1),
(2, 'Basil', 2, 2, '0000-00-00 00:00:00', 1),
(3, 'Ari', 1, 3, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `humidity_temp`
--

CREATE TABLE `humidity_temp` (
  `id` int(11) NOT NULL,
  `sensor_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(600) NOT NULL,
  `sow_date` date NOT NULL,
  `cultivation_date` date NOT NULL,
  `pic_url` varchar(600) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `name`, `sow_date`, `cultivation_date`, `pic_url`, `category_id`) VALUES
(1, 'aardbei', '2020-06-01', '2020-06-01', 'public/images/aardbei.jpg', 1),
(2, 'basilicum', '2020-04-01', '2020-07-01', 'public/images/basilicum.jpg', 2),
(3, 'tomaat', '2020-02-01', '2020-08-01', 'public/images/tomaat.jpg', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `moisture`
--

CREATE TABLE `moisture` (
  `id` int(11) NOT NULL,
  `sensor_data` varchar(255) DEFAULT NULL,
  `soil_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `humidity_temp_id` int(11) DEFAULT NULL,
  `sunlight_id` int(11) DEFAULT NULL,
  `waterflow_id` int(11) DEFAULT NULL,
  `moisture_id` int(11) DEFAULT NULL,
  `unit_sensor_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sensor`
--

INSERT INTO `sensor` (`id`, `humidity_temp_id`, `sunlight_id`, `waterflow_id`, `moisture_id`, `unit_sensor_data`) VALUES
(1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sunlight`
--

CREATE TABLE `sunlight` (
  `id` int(11) NOT NULL,
  `sensor_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`) VALUES
(1, 'r0696794@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$TuU1xsuzC7Ns2TlGNvuTWuFJ5WQNg0Wwwk8hdVOiJk5u829T3QVfe');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `waterflow`
--

CREATE TABLE `waterflow` (
  `id` int(11) NOT NULL,
  `sensor_data` varchar(255) DEFAULT NULL,
  `date_refill` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `garden`
--
ALTER TABLE `garden`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `humidity_temp`
--
ALTER TABLE `humidity_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `moisture`
--
ALTER TABLE `moisture`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sunlight`
--
ALTER TABLE `sunlight`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `waterflow`
--
ALTER TABLE `waterflow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `garden`
--
ALTER TABLE `garden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `humidity_temp`
--
ALTER TABLE `humidity_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `moisture`
--
ALTER TABLE `moisture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `sunlight`
--
ALTER TABLE `sunlight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `waterflow`
--
ALTER TABLE `waterflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
