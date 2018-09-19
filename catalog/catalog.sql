-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 sep 2018 om 13:42
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `color`
--

CREATE TABLE `color` (
  `shoeName` varchar(255) NOT NULL,
  `shoeColor` varchar(15) NOT NULL,
  `pix` char(15) NOT NULL DEFAULT 'na.gif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `color`
--

INSERT INTO `color` (`shoeName`, `shoeColor`, `pix`) VALUES
('Adidas', 'Blue', 'no.gif'),
('Birkenstock', 'White', 'no.gif'),
('Double strapped', 'Green', 'no.gif'),
('Dr martens', 'Black', 'no.gif'),
('Filling pieces', 'Broken white', 'no.gif'),
('Nike', 'Red', 'no.gif'),
('Timberland', 'Brown', 'no.gif');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shoe`
--

CREATE TABLE `shoe` (
  `shoeID` int(5) NOT NULL,
  `shoeName` varchar(256) NOT NULL,
  `shoeType` varchar(256) NOT NULL DEFAULT 'Misc',
  `shoeDescription` varchar(256) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `pix` varchar(256) NOT NULL DEFAULT 'no.gif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `shoe`
--

INSERT INTO `shoe` (`shoeID`, `shoeName`, `shoeType`, `shoeDescription`, `price`, `pix`) VALUES
(5, 'Nike', 'Sneaker', 'Season 2018', '180.00', 'no.gif'),
(6, 'Adidas', 'Misc', 'Season 2018', '130.00', 'no.gif'),
(7, 'Timberland', 'Boots', 'Tough and durable boot', '220.00', 'no.gif'),
(8, 'Dr martens', 'Boots', 'Stylish boot with comfortable fit', '100.00', 'no.gif'),
(9, 'Birkenstock', 'Sandals', 'Trendy summer sandal', '70.00', 'no.gif'),
(10, '', 'Misc', NULL, NULL, 'no.gif'),
(11, 'Double strapped', 'Loafers', 'Easy step-in shoe with double buckle straps', '145.00', 'no.gif'),
(12, 'Filling pieces', 'Sneaker', 'Handcrafted shoe of fine material', '230.00', 'no.gif');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shoetype`
--

CREATE TABLE `shoetype` (
  `shoeType` varchar(255) NOT NULL,
  `typeDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `shoetype`
--

INSERT INTO `shoetype` (`shoeType`, `typeDescription`) VALUES
('Boots', 'Durable all seoson boots'),
('Loafers', 'Casuale footwear for daily and speciale occasions'),
('Sandals', 'Nice for the summer'),
('Sneaker', 'New and special sneakers');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexen voor tabel `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`shoeName`,`shoeColor`);

--
-- Indexen voor tabel `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`shoeID`);

--
-- Indexen voor tabel `shoetype`
--
ALTER TABLE `shoetype`
  ADD PRIMARY KEY (`shoeType`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `shoe`
--
ALTER TABLE `shoe`
  MODIFY `shoeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
