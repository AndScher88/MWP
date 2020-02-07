-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Nov 2019 um 20:46
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
DROP DATABASE IF EXISTS `mwp-systems`;
CREATE DATABASE IF NOT EXISTS `mwp-systems` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mwp-systems`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` bigint(20) NOT NULL,
  `loginname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwdhash` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$13$Vs7u2UQ1ltPIWwcXfmpikOxcWLRBlS32A6VeHF./w7OwNDAwpM8uy',
  `firstlogin` tinyint(1) NOT NULL DEFAULT 1,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `idmitarbeiter` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Table `account`
--

REPLACE INTO `account` (`id`, `loginname`, `pwdhash`, `firstlogin`, `blocked`, `idmitarbeiter`) VALUES
(1, 'tboockmeyer', '$2y$13$l/AG4KyGLObXUP7ngbM3IORygaHYhpawn.urfpQxLdFXGtW1WvbNK', 1, 0, 1),
(2, 'ascherer', '$2y$13$6xTEV7lluRNWsslfdwAkdejnjoHbF8.ybpqkpLlzGH/UDW0WybROa', 1, 0, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Table `mitarbeiterdaten`
--

DROP TABLE IF EXISTS `mitarbeiterdaten`;
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
-- Daten für Table `mitarbeiterdaten`
--

REPLACE INTO `mitarbeiterdaten` (`id`, `vorname`, `nachname`, `straße`, `hausnummer`, `stadt`, `postleitzahl`, `geburtsdatum`, `telefonnummer`, `email`) VALUES
(1, 'Thomas', 'Boockmeyer', 'Rübenkamp', '132', 'Hamburg', 22307, '1989-04-13', '01709300292', 't.boockmeyer@googlemail.com'),
(2, 'Andrej', 'Scherer', 'Am Riesenkamp', '15', 'Wedel', 22880, '1988-10-30', '015150673007', 'andy.scherer1887@gmail.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmitarbeiter` (`idmitarbeiter`),
  ADD UNIQUE KEY `account_loginname_uindex` (`loginname`);

--
-- Indizes für die Table `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Table `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Table `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
