-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Nov 2019 um 20:30
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mwp-systems`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiterdaten`
--

CREATE TABLE `mitarbeiterdaten` (
  `id` bigint(20) NOT NULL,
  `vorname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `straße` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hausnummer` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stadt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postleitzahl` int(11) DEFAULT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `telefonnummer` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `mitarbeiterdaten`
--

INSERT INTO `mitarbeiterdaten` (`id`, `vorname`, `nachname`, `straße`, `hausnummer`, `stadt`, `postleitzahl`, `geburtsdatum`, `telefonnummer`, `email`) VALUES
(1, 'Thomas', 'Boockmeyer', 'Rübenkamp', '132', 'Hamburg', 22307, '1989-04-13', '0151123456', 'thomas.boocekmeyer@affe.de'),
(2, 'Andrej', 'Scherer', 'Am Riesenkamp', '15', 'Wedel', 22880, '1988-10-30', '015150673007', 'andy.scherer1887@gmail.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;