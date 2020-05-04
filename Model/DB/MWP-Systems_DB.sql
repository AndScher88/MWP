-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Feb 2020 um 10:56
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

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
-- Tabellenstruktur für Tabelle `account`
--

CREATE TABLE `account` (
  `id` bigint(20) NOT NULL,
  `loginname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwdhash` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$13$Vs7u2UQ1ltPIWwcXfmpikOxcWLRBlS32A6VeHF./w7OwNDAwpM8uy',
  `firstlogin` tinyint(1) NOT NULL DEFAULT 1,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `idmitarbeiter` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `account`
--

INSERT INTO `account` (`id`, `loginname`, `pwdhash`, `firstlogin`, `blocked`, `idmitarbeiter`) VALUES
(1, 'tboockmeyer', '$2y$13$l/AG4KyGLObXUP7ngbM3IORygaHYhpawn.urfpQxLdFXGtW1WvbNK', 1, 0, 1),
(2, 'ascherer', '$2y$13$6xTEV7lluRNWsslfdwAkdejnjoHbF8.ybpqkpLlzGH/UDW0WybROa', 1, 0, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikelstammdaten`
--

CREATE TABLE `artikelstammdaten` (
  `id` int(11) NOT NULL,
  `artikelnummer` int(11) NOT NULL,
  `match_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bezeichnung` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `spezifikation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `erw.spezifikation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_lieferant1` int(11) NOT NULL,
  `bestellnummer1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_lieferant2` int(11) DEFAULT NULL,
  `bestellnummer2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_lieferant3` int(11) DEFAULT NULL,
  `bestellnummer3` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lagerort` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bestand` float DEFAULT NULL,
  `id_warengruppe` int(11) DEFAULT NULL,
  `prodartikel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `artikelstammdaten`
--

INSERT INTO `artikelstammdaten` (`id`, `artikelnummer`, `match_code`, `bezeichnung`, `spezifikation`, `erw.spezifikation`, `id_lieferant1`, `bestellnummer1`, `id_lieferant2`, `bestellnummer2`, `id_lieferant3`, `bestellnummer3`, `lagerort`, `bestand`, `id_warengruppe`, `prodartikel`) VALUES
(1, 100000, 'FLT-SEC-P-T1-N/PE-35', 'Kombiableiter Typ 1/2', '', '', 1, '2905472', 0, '', 0, '', '', 0, 0, 0),
(2, 100001, 'VAL-MS 120 ST', 'Überspannungsschutz-Stecker Ty', '', '', 1, '2807586', 0, '', 0, '', '', 0, 0, 0),
(3, 100002, 'VAL-MS BE', 'Überspannungsschutzbasiselemen', '', '', 1, '2817741', 0, '', 0, '', '', 0, 0, 0),
(4, 100003, 'F-MS 12', 'Überspannungsableiter Typ2', '', '', 1, '2817987', 0, '', 0, '', '', 0, 0, 0),
(5, 100004, 'HDFK 10', 'Durchführungsklemme', '', '', 1, '707073', 0, '', 0, '', '', 0, 0, 0),
(6, 100005, 'HDFK 10 GNYE', 'Durchführungsklemme', '', '', 1, '707879', 0, '', 0, '', '', 0, 0, 0),
(7, 100006, 'HDFK 4', 'Durchführungsklemme', '', '', 1, '707086', 0, '', 0, '', '', 0, 0, 0),
(8, 100007, 'ClipFix 35', 'Endhalter', '', '', 1, '3022218', 0, '', 0, '', '', 0, 0, 0),
(9, 100008, 'UK 6 N', 'Durchgangsklemme', '', '', 1, '3004524', 0, '', 0, '', '', 0, 0, 0),
(10, 100009, 'UK 10 N', 'Durchgangsklemme', '', '', 1, '3005073', 0, '', 0, '', '', 0, 0, 0),
(11, 100010, 'ME MAX 22,5 GU-U1 KM', 'Elektronikgehäuse', '', '', 1, '2713489', 0, '', 0, '', '', 0, 0, 0),
(12, 100011, 'EMG 90-LG/O', 'Elektronikgehäuse', '', '', 1, '2941581', 0, '', 0, '', '', 0, 0, 0),
(13, 100012, 'EMG 90-H 15mm Klar', 'Abdeckhaube', '', '', 1, '2945406', 0, '', 0, '', '', 0, 0, 0),
(14, 100013, 'UM122-Profil', 'Elektronikgehäuse', '', '', 1, '2914576', 0, '', 0, '', '', 0, 0, 0),
(15, 100014, 'UM122-SEFE/R', 'Seitenelement', '', '', 1, '2908786', 0, '', 0, '', '', 0, 0, 0),
(16, 100015, 'UM122-SEFE/L', 'Seitenelement', '', '', 1, '2908773', 0, '', 0, '', '', 0, 0, 0),
(17, 100016, 'MVSTBR 2,5/2-ST-5,08', 'Leiterplattensteckverbinder', '', '', 1, '1792249', 0, '', 0, '', '', 0, 0, 0),
(18, 100017, 'MVSTBR 2,5/4-ST-5,08', 'Leiterplattensteckverbinder', '', '', 1, '1792265', 0, '', 0, '', '', 0, 0, 0),
(19, 100018, 'STS 6', 'Durchgangsklemme', '', '', 1, '3038121', 0, '', 0, '', '', 0, 0, 0),
(20, 100019, 'USLKG 10 N', 'Schutzleiterklemme', '', '', 1, '3003923', 0, '', 0, '', '', 0, 0, 0),
(21, 100020, 'URTK-Ben', 'Trennklemme', '', '', 1, '309112', 0, '', 0, '', '', 0, 0, 0),
(22, 100021, 'D-UK 4/10', 'Abschlussdeckel', '', '', 1, '3003020', 0, '', 0, '', '', 0, 0, 0),
(23, 100022, 'D-STS 6', 'Abschlussdeckel', '', '', 1, '3038189', 0, '', 0, '', '', 0, 0, 0),
(24, 100023, 'D-URTK-Ben', 'Abschlussdeckel', '', '', 1, '301589', 0, '', 0, '', '', 0, 0, 0),
(25, 100024, 'HV M8/1', 'Hochstromverbinder', '', '', 1, '3049301', 0, '', 0, '', '', 0, 0, 0),
(26, 100025, 'UCT-TM 10 RD', 'Marker f?r Klemmen', '', '', 1, '829169', 0, '', 0, '', '', 0, 0, 0),
(27, 100026, 'EB 4-10', 'Einlegebrücke', '', '', 1, '203331', 0, '', 0, '', '', 0, 0, 0),
(28, 100027, 'EB 2-10', 'Einlegebrücke', '', '', 1, '203153', 0, '', 0, '', '', 0, 0, 0),
(29, 100028, 'EB 10-10', 'Einlegebrücke', '', '', 1, '203137', 0, '', 0, '', '', 0, 0, 0),
(30, 100029, 'PSB 4/7/6', 'Prüfsteckerbuchse', '', '', 1, '303299', 0, '', 0, '', '', 0, 0, 0),
(31, 100030, 'WMS 12,7 (EX20)R', 'Schrumpfschlauch', '', '', 1, '800294', 0, '', 0, '', '', 0, 0, 0),
(32, 100031, 'EML (20x8)R', 'Etikett', '', '', 1, '816786', 0, '', 0, '', '', 0, 0, 0),
(33, 100032, 'EML (70x32)R', 'Etikett', '', '', 1, '817060', 0, '', 0, '', '', 0, 0, 0),
(34, 100033, 'FBS 2-8', 'Steckbr?cke', '', '', 1, '3030284', 0, '', 0, '', '', 0, 0, 0),
(35, 100034, 'UK 6 N YE', 'Durchgangsklemme', '', '', 0, '719249', 0, '', 0, '', '', 0, 0, 0),
(36, 100035, 'UK 6 N GN', 'Durchgangsklemme', '', '', 0, '1003222', 0, '', 0, '', '', 0, 0, 0),
(37, 100036, 'UK 6 N RD', 'Durchgangsklemme', '', '', 0, '719223', 0, '', 0, '', '', 0, 0, 0),
(38, 100037, 'PAI-4-FIX GY', 'Pr?fadapter', '', '', 0, '3032790', 0, '', 0, '', '', 0, 0, 0),
(39, 100038, 'MPB 18/1-2', 'Verdrahtungsbr?cke', '', '', 0, '2809209', 0, '', 0, '', '', 0, 0, 0),
(40, 100039, 'MPB 18/1-3', 'Verdrahtungsbr?cke', '', '', 0, '2809212', 0, '', 0, '', '', 0, 0, 0),
(41, 100040, 'D-ST 2,5', 'Abschlussdeckel', '', '', 0, '3030417', 0, '', 0, '', '', 0, 0, 0),
(42, 100041, 'UK 16 N', 'Durchgangsklemme', '', '', 0, '3006043', 0, '', 0, '', '', 0, 0, 0),
(43, 100042, 'D-UK 16', 'Abschlussdeckel', '', '', 0, '3006027', 0, '', 0, '', '', 0, 0, 0),
(44, 100043, 'F-MS 12-ST', '?berspannungsschutz-Stecker Ty', '', '', 0, '2817990', 0, '', 0, '', '', 0, 0, 0),
(45, 100044, 'UCT-TM 10', 'Marker f?r Klemmen', '', '', 0, '829142', 0, '', 0, '', '', 0, 0, 0),
(46, 100045, 'UCT-TM 8', 'Marker f?r Klemmen', '', '', 0, '828740', 0, '', 0, '', '', 0, 0, 0),
(47, 100046, 'MKDSP 10N/ 2-10,16', 'Leiterplattenklemme', '', '', 0, '1773976', 0, '', 0, '', '', 0, 0, 0),
(48, 100047, 'MSTBVA 2,5/ 4-G-5,08', 'Leiterplattensteckverbinder', '', '', 0, '1755752', 0, '', 0, '', '', 0, 0, 0),
(49, 100048, 'MSTBVA 2,5/ 2-G-5,08', 'Leiterplattensteckverbinder', '', '', 0, '1755736', 0, '', 0, '', '', 0, 0, 0),
(50, 100049, 'UEGM 22,5', 'Elekronikgehäuse', '', '', 1, '2792002', 0, '', 0, '', '', 0, 0, 0),
(51, 100050, 'DG S 150', '?berspannungsableiter', 'Typ 2', '', 0, '952072', 0, '', 0, '', '', 0, 0, 0),
(52, 100051, 'DB M 1 150', 'Blitzstromableiter', 'Typ 1', '', 0, '961110', 0, '', 0, '', '', 0, 0, 0),
(53, 100052, 'DG SE H LI 275 FM', '?berspannungsableiter', 'Typ 2', '', 0, '952930', 0, '', 0, '', '', 0, 0, 0),
(54, 100053, 'DGP C S', '?berspannungsableiter', 'N-PE', '', 0, '952030', 0, '', 0, '', '', 0, 0, 0),
(55, 100054, 'DG 1000', '?berspannungsableiter', 'Typ 2', '', 0, '950102', 0, '', 0, '', '', 0, 0, 0),
(56, 100055, 'DG S 275', '?berspannungsableiter', 'Typ 2', '', 0, '952070', 0, '', 0, '', '', 0, 0, 0),
(57, 100056, 'DGP M 255 FM', 'Blitzstromableiter', 'Typ 1', '', 0, '961105', 0, '', 0, '', '', 0, 0, 0),
(58, 100057, 'BVT KKS APD 36', 'Kombiableiter', 'KKS-Anlagen', '', 0, '918421', 0, '', 0, '', '', 0, 0, 0),
(59, 100058, 'BVT KKS ALD 75', 'Kombiableiter', 'Gleichrichter-Anlagen', '', 0, '918420', 0, '', 0, '', '', 0, 0, 0),
(60, 100059, 'EPO887-P3', 'Kondensatorklammer', 'D=76mm', 'Nylon', 0, '203-5755', 0, '', 0, '', '', 0, 0, 0),
(61, 100060, 'MDD172-12N1', 'Dioden-Modul', '1200V / 190A', 'IXYS', 0, '168-4601', 0, '', 0, '', '', 0, 0, 0),
(62, 100061, 'TZ500N12KOF', 'Thyristor', '1200V / 500A', 'Infineon', 0, '145-8674', 0, '', 0, '', '', 0, 0, 0),
(63, 100062, 'MCD162-12io1', 'Thyristor-Modul', '1200V / 190A', 'IXYS', 0, '168-4599', 0, '', 0, '', '', 0, 0, 0),
(64, 100063, 'Stecker-C16-3', 'Rundsteckergeh?use ', '8+1 Polig', 'Amphenol', 0, '3299196', 0, '', 0, '', '', 0, 0, 0),
(65, 100064, 'Stift-C16-3', 'Kontaktstift', 'f?r Stecker C16-3', 'Amphenol', 0, '240-8591', 0, '', 0, '', '', 0, 0, 0),
(66, 100065, '1393683-2', 'Druchtaster Plantinenaufbau', 'Tasterknopf 10mm', 'TE Connectivity', 0, '718-2203', 0, '', 0, '', '', 0, 0, 0),
(67, 100066, 'DB3TG', 'Diac ', '2V 2A DO-35 Vbo=34V', 'STMicroElectronics', 0, '1748975', 0, '', 0, '', '', 0, 0, 0),
(68, 100067, '1N5338B', 'Zener-Diode', '5,1V', 'ON', 0, '26S8802', 0, '', 0, '', '', 0, 0, 0),
(69, 100068, 'TIC126D', 'Thyristor', '400V, 12/100A, TO220', 'COMSET', 0, '25S1800', 0, '', 0, '', '', 0, 0, 0),
(70, 100069, 'PO593-02T100R', 'Widerstand', '100R/2,0W/2%', 'Vitrohm', 0, '32E708', 0, '', 0, '', '', 0, 0, 0),
(71, 100070, 'PO593-02T330R', 'Widerstand', '330R/2,0W/2%', 'Vitrohm', 0, '32E720', 0, '', 0, '', '', 0, 0, 0),
(72, 100071, 'PO593-02T150R', 'Widerstand', '150R/2,0W/2%', 'Vitrohm', 0, '32E712', 0, '', 0, '', '', 0, 0, 0),
(73, 100072, '2069 2M GTPL', 'Hutschiene gelocht', '2000x35x7,5 ST', 'OBO', 0, '145245', 0, '', 0, '', '', 0, 0, 0),
(74, 100073, 'BA64002507030B', 'Verdrahtungskanal', 'PVC BA6 40x25 steingrau', 'Hager', 0, '125052', 0, '', 0, '', '', 0, 0, 0),
(75, 100074, '2CDS251001R1165', 'Sicherungsautomat', 'S201-B16A 1P', 'ABB', 0, '357700', 0, '', 0, '', '', 0, 0, 0),
(76, 100075, 'WEW 35/2', 'Endklemme WEW', 'WEW 35/2', 'Weidm?ller 1061200000', 0, '25341', 0, '', 0, '', '', 0, 0, 0),
(77, 100076, 'WSI 6', 'Sicherungsklemme', 'WSI 6', 'Weidm?ller 1011000000', 0, '24617', 0, '', 0, '', '', 0, 0, 0),
(78, 100077, 'WDU 2,5', 'Durchgangsklemme', 'WDU 2,5', 'Weidm?ller 1020000000', 0, '24500', 0, '', 0, '', '', 0, 0, 0),
(79, 100078, 'WDU 10', 'Durchgangsklemme ', 'WDU 10', 'Weidm?ller 1020300000', 0, '24503', 0, '', 0, '', '', 0, 0, 0),
(80, 100079, 'WDU 35N', 'Durchgangsklemme', 'WDU 35N', 'Weidm?ller 1020500000', 0, '24505', 0, '', 0, '', '', 0, 0, 0),
(81, 100080, 'WAP 2-10', 'Trennplatte', 'WAP 2-10', 'Weidm?ller 1050000000', 0, '24532', 0, '', 0, '', '', 0, 0, 0),
(82, 100081, 'WPE 16', 'Erdungsklemme', 'WPE 16', 'Weidm?ller 1010400000', 0, '24524', 0, '', 0, '', '', 0, 0, 0),
(83, 100082, 'WPE 4', 'Erdungsklemme', 'WPE 4', 'Weidm?ller 1010100000', 0, '24521', 0, '', 0, '', '', 0, 0, 0),
(84, 100083, '91085', 'Hauptschalter ', 'P3-100/IVS', 'EATON', 0, '47604', 0, '', 0, '', '', 0, 0, 0),
(85, 100084, '73540501', 'Spels Automatenkasten', 'AK05', 'Spelsberg', 0, '241541', 0, '', 0, '', '', 0, 0, 0),
(86, 100085, '73540901', 'Spels Automatenkasten Doppel', 'AK09', 'Spelsberg', 0, '146460', 0, '', 0, '', '', 0, 0, 0),
(87, 100086, '62031', 'Hilfsschalter', 'HI11-P1/P3Z', 'EATON', 0, '47918', 0, '', 0, '', '', 0, 0, 0),
(88, 100087, '2CDS251001R0065', 'Sicherungsautomat', 'S201-B6A 1P', 'ABB', 0, '240000', 0, '', 0, '', '', 0, 0, 0),
(89, 100088, '10050305', 'EM SET Ger?stseitenteil', '1xL, 1xR A950-Gr.0-3', 'Elster Mosdorfer', 0, '4993058', 0, '', 0, '', '', 0, 0, 0),
(90, 100089, 'Klau 750', 'Flachsteckh?lse', '4,0-6,0 gelb', 'Klauke', 0, '121353', 0, '', 0, '', '', 0, 0, 0),
(91, 100090, 'ZS 236-02Z', 'Positionsschalter', 'ZS 236-02Z', 'Schmersal', 0, '', 0, '', 0, '', '', 0, 0, 0),
(92, 100091, '3431000', 'Sicherungslasttrennschalter', 'NH Gr.000 160A', 'Rittal', 0, '53584', 0, '', 0, '', '', 0, 0, 0),
(93, 100092, 'W216058K', 'Trennmesser', 'NH00 160A', 'Mersen', 0, '148291', 0, '', 0, '', '', 0, 0, 0),
(94, 100093, 'H07V-K 1,5 sw', 'Einzelader', 'H07V-K 1,5 sw', 'Eupen', 0, '5140537', 0, '', 0, '', '', 0, 0, 0),
(95, 100094, 'M22-DL-W', 'Leuchtdrucktaste', 'M22-DL-W', 'EATON', 0, '33723', 0, '', 0, '', '', 0, 0, 0),
(96, 100095, 'M22-A', 'Befestigungsadapter', 'M22-A', 'EATON', 0, '33393', 0, '', 0, '', '', 0, 0, 0),
(97, 100096, 'M22-L-W', 'Leuchtmelder', 'M22-L-W', 'EATON', 0, '33697', 0, '', 0, '', '', 0, 0, 0),
(98, 100097, 'M22-K10P', 'Kontaktelement', 'M22-K10P', 'EATON', 0, '2988553', 0, '', 0, '', '', 0, 0, 0),
(99, 100098, 'M22-K01', 'Kontaktelement', 'M22-K01', 'EATON', 0, '33369', 0, '', 0, '', '', 0, 0, 0),
(100, 100099, 'M22-LED230-W', 'Leuchtelement', 'M22-LED230-W', 'EATON', 0, '33588', 0, '', 0, '', '', 0, 0, 0),
(101, 100100, 'M22S-ST-X', 'Schildtr?ger', 'M22S-ST-X', 'EATON', 0, '34767', 0, '', 0, '', '', 0, 0, 0),
(102, 100101, 'M22-LED-W', 'Leuchtelement', 'M22-LED-W', 'EATON', 0, '33580', 0, '', 0, '', '', 0, 0, 0),
(103, 100102, 'ESKV 12', 'Kabelverschraubung', 'M12 Lichtgrau', 'Wiska', 0, '1878105', 0, '', 0, '', '', 0, 0, 0),
(104, 100103, 'KRM 20/12', 'Reduzierung', 'M12i/M20a Lichtgrau', 'Wiska', 0, '1878654', 0, '', 0, '', '', 0, 0, 0),
(105, 100104, 'H07V-K 10 sw', 'Einzelader', 'H07V-K 10 sw', 'Eupen', 0, '5140780', 0, '', 0, '', '', 0, 0, 0),
(106, 100105, 'EMUG 20', 'Gegenmutter', 'M12 Lichtgrau', 'Wiska', 0, '1877969', 0, '', 0, '', '', 0, 0, 0),
(107, 100106, '10050303', 'Verteilerschrank ', 'A950-2', 'Elster Mosdorfer', 0, '4993056', 0, '', 0, '', '', 0, 0, 0),
(108, 100107, 'SX612.1', 'Sockel', 'X2 950/320', 'Elster Mosdorfer', 0, '4993037', 0, '', 0, '', '', 0, 0, 0),
(109, 100108, '10050302', 'Verteilerschrank ', 'A950-1', 'Elster Mosdorfer', 0, '4993055', 0, '', 0, '', '', 0, 0, 0),
(110, 100109, 'SX512.1', 'Sockel', 'X1 950/320', 'Elster Mosdorfer', 0, '4993036', 0, '', 0, '', '', 0, 0, 0),
(111, 100110, '10050301', 'Verteilerschrank ', 'A950-0', 'Elster Mosdorfer', 0, '4993054', 0, '', 0, '', '', 0, 0, 0),
(112, 100111, 'SX412.1', 'Sockel', 'X0 950/320', 'Elster Mosdorfer', 0, '4993035', 0, '', 0, '', '', 0, 0, 0),
(113, 100112, '166-11401', 'Kunststoffschlauch', 'HG-FR13-PA6-BK-50M', 'Hellermann Tyton', 0, '3110958', 0, '', 0, '', '', 0, 0, 0),
(114, 100113, 'EVSG 12', 'Verschlussschraube', 'M12 Lichtgrau', 'Wiska', 0, '1878302', 0, '', 0, '', '', 0, 0, 0),
(115, 100114, '10030939', 'T?rfeststeller SET', 'rechts', 'Elster Mosdorfer', 0, '', 0, '', 0, '', '', 0, 0, 0),
(116, 100115, '10030938', 'T?rfeststeller SET', 'links', 'Elster Mosdorfer', 0, '', 0, '', 0, '', '', 0, 0, 0),
(117, 100116, '1107080403', 'Schaltplantasche', 'selbstklebend', 'Elster Mosdorfer', 0, '', 0, '', 0, '', '', 0, 0, 0),
(118, 100117, '502111', 'Kabelbinder', '100x2,5mm', '', 0, '502111', 0, '', 0, '', '', 0, 0, 0),
(119, 100118, '968200515', 'Kunststoff-Abstandsbolzen', 'M4x15 i/a', '', 0, '968200515', 0, '', 0, '', '', 0, 0, 0),
(120, 100119, '968000215', 'Messing-Abstandsbolzen', 'M4x15 i/a', '', 0, '968000215', 0, '', 0, '', '', 0, 0, 0),
(121, 100120, '48825', 'Senkkopfschraube', 'M8x25', '', 0, '48825', 0, '', 0, '', '', 0, 0, 0),
(122, 100121, '84410', 'Zylinderschraube', 'M4x10', '', 0, '84410', 0, '', 0, '', '', 0, 0, 0),
(123, 100122, '46620', 'Linsenschraube', 'Kreuzschlitz M6x20', '', 0, '46620', 0, '', 0, '', '', 0, 0, 0),
(124, 100123, '57616', 'Sechskantschraube', 'M6x16', '', 0, '57616', 0, '', 0, '', '', 0, 0, 0),
(125, 100124, '590010', 'Abdeckkappe', 'M10', '', 0, '590010', 0, '', 0, '', '', 0, 0, 0),
(126, 100125, '59006', 'Abdeckkappe', 'M6', '', 0, '59006', 0, '', 0, '', '', 0, 0, 0),
(127, 100126, '57612', 'Sechskantschraube', 'M6x12', '', 0, '57612', 0, '', 0, '', '', 0, 0, 0),
(128, 100127, '4076', 'Flache Scheibe', 'D6,4', '', 0, '4076', 0, '', 0, '', '', 0, 0, 0),
(129, 100128, '4416', 'Federring', 'D6,1', '', 0, '4416', 0, '', 0, '', '', 0, 0, 0),
(130, 100129, '3178', 'Sechskantmutter', 'M8', '', 0, '3178', 0, '', 0, '', '', 0, 0, 0),
(131, 100130, '4418', 'Federring', 'D8,1', '', 0, '4418', 0, '', 0, '', '', 0, 0, 0),
(132, 100131, '46430', 'Linsenschraube', 'M4x30', '', 0, '46430', 0, '', 0, '', '', 0, 0, 0),
(133, 100132, '91504810', 'Blindniete', '4,8x10', '', 0, '91504810', 0, '', 0, '', '', 0, 0, 0),
(134, 100133, '91504817', 'Blindniete', '4,8x17', '', 0, '91504817', 0, '', 0, '', '', 0, 0, 0),
(135, 100134, '968000550', 'Abstandsbolzen', 'I/A-SW10-M5x50', '', 0, '968000550', 0, '', 0, '', '', 0, 0, 0),
(136, 100135, '968000520', 'Abstandsbolzen', 'I/A-SW10-M5x20', '', 0, '968000520', 0, '', 0, '', '', 0, 0, 0),
(137, 100136, '968200220', 'Abstandsbolzen', 'I/I-SW10-M5x20', '', 0, '968200220', 0, '', 0, '', '', 0, 0, 0),
(138, 100137, '968200410', 'Abstandsbolzen', 'I/A-SW6-M3x10', '', 0, '968200410', 0, '', 0, '', '', 0, 0, 0),
(139, 100138, '968200610', 'Abstandsbolzen', 'I/I-SW6-M3x10', '', 0, '968200610', 0, '', 0, '', '', 0, 0, 0),
(140, 100139, '71467112', 'Schraubzwinge', 'SHRBZWINGE', 'TG-120x60mm', 0, '71467112', 0, '', 0, '', '', 0, 0, 0),
(141, 100140, '71467116', 'Schraubzwinge', 'SHRBZWINGE', 'TG-160x80mm', 0, '71467116', 0, '', 0, '', '', 0, 0, 0),
(142, 100141, '57825', 'Sechskantschraube', 'M8x25', 'SW13 A2K', 0, '57825', 0, '', 0, '', '', 0, 0, 0),
(143, 100142, '9676106', 'Quetschkabelschuh', 'M6/10?', '', 0, '9676106', 0, '', 0, '', '', 0, 0, 0),
(144, 100143, '9672106', 'Rohrkabelschuh', 'M6x10mm?', '', 0, '9672106', 0, '', 0, '', '', 0, 0, 0),
(145, 100144, '46540', 'Linsenschraube', 'Kreuzschlitz M5x40', 'SHR-LIKPF-DIN7985-4.8-H2-(A2K)', 0, '46540', 0, '', 0, '', '', 0, 0, 0),
(146, 100145, 'H07V-K 6 sw', 'Einzelader', 'H07V-K 6 sw', 'Eupen', 0, '5140723', 0, '', 0, '', '', 0, 0, 0),
(147, 100146, 'Klau 47210', 'Aderendh?lse', '1,5-10mm PVC schwarz', 'Klauke', 0, '121762', 0, '', 0, '', '', 0, 0, 0),
(148, 100147, 'Klau 47512', 'Aderendh?lse', '6,0-12mm gelb', 'Klauke', 0, '121771', 0, '', 0, '', '', 0, 0, 0),
(149, 100148, 'Klau 47612', 'Aderendh?lse', '10,0-12mm rot', 'Klauke', 0, '121773', 0, '', 0, '', '', 0, 0, 0),
(150, 100149, 'MFD 16/02/040', 'Mehrfachdichtung', 'M16 2x2,0-4,0mm', 'Wiska', 0, '2313185', 0, '', 0, '', '', 0, 0, 0),
(151, 100150, '2CDS251001R0105', 'Sicherungsautomat', 'S201-B10 1P', 'ABB', 0, '240001', 0, '', 0, '', '', 0, 0, 0),
(152, 100151, '2CDS200912R0001', 'Hilfsschalter', 'S2C-H6R', 'ABB', 0, '353355', 0, '', 0, '', '', 0, 0, 0),
(153, 100152, 'PKZM0-4', 'Motorschutzschalter', 'PKZM0-4', 'EATON', 0, '46790', 0, '', 0, '', '', 0, 0, 0),
(154, 100153, '100153', 'Geh?use Proline', 'inkl. Winkel und Klemmenabdeckung', '', 0, '111.9018.Geh?us', 0, '', 0, '', '', 0, 0, 0),
(155, 100154, 'PKZM0-6,3', 'Motorschutzschalter', 'PKZM0-6,3', 'EATON', 0, '46791', 0, '', 0, '', '', 0, 0, 0),
(156, 100155, '2CDS251001R0205', 'Sicherungsautomat', 'S201-B20 1P', 'ABB', 0, '240004', 0, '', 0, '', '', 0, 0, 0),
(157, 100156, 'WDU 4', 'Durchgangsklemme', 'WDU 4', 'Weidm?ller', 0, '24501', 0, '', 0, '', '', 0, 0, 0),
(158, 100157, 'WDU 6', 'Durchgangsklemme', 'WDU 6', 'Weidm?ller', 0, '24502', 0, '', 0, '', '', 0, 0, 0),
(159, 100158, '100158', 'Frontplatte Proline UI', 'Frontplatte f?r Proline Spannung Strom', '', 0, '2795.01.003.02', 0, '', 0, '', '', 0, 0, 0),
(160, 100159, '05-0901', 'Einphasen-Stelltrafo', '6,3A', '', 0, '05-0901', 0, '', 0, '', '', 0, 0, 0),
(161, 100160, '05-0900L', 'Einphasen-Transformator', '44V/22A', '', 0, '05-0900L', 0, '', 0, '', '', 0, 0, 0),
(162, 100161, 'WQV6/3', 'Querverbinder', 'WQV6/3', 'Weidm?ller', 0, '24561', 0, '', 0, '', '', 0, 0, 0),
(163, 100162, 'PSBJ-URTK6', 'Pr?fsteckerbuchse', 'PSBJ-URTK6 Farblos', '', 0, '3026450', 0, '', 0, '', '', 0, 0, 0),
(164, 100163, 'PT2,5/1P', 'Durchgangsklemme', 'PT2,5/1P f?r Steckklemme SP2,5/X', '', 0, '3210033', 0, '', 0, '', '', 0, 0, 0),
(165, 100164, 'SP2,5/6', 'Stecker', 'SP2,5/6 f?r Durchgangsklemme PT2,5/1P', '', 0, '3040300', 0, '', 0, '', '', 0, 0, 0),
(166, 100165, 'FB5006', 'Br?ckengleichrichter', 'FB5006-B250/220-50', 'Fagor', 0, '123-1506', 0, '', 0, '', '', 0, 0, 0),
(167, 100166, 'SQ 72 DS 40V', 'Messinstrument 40V analog', 'Analoge Spannungsanzeige 40V', 'SQ 72 DS', 0, '21000-57000-000', 0, '', 0, '', '', 0, 0, 0),
(168, 100167, 'SQ 72 DS 20A', 'Messinstrument 20A analog', 'Analoge Stromanzeige 20A', 'SQ 72 DS', 0, '21000-55410-000', 0, '', 0, '', '', 0, 0, 0),
(169, 100168, '', 'Nebenwiderstand 20A', '20A / 60mV', '', 0, '00000-90020-000', 0, '', 0, '', '', 0, 0, 0),
(170, 100169, '801', 'Wandsteckdose 400V', '400V / 16A / 5-Polig', 'Mennekes', 0, '271688', 0, '', 0, '', '', 0, 0, 0),
(171, 100170, '20 EW-53', 'Aufputzsteckdose 230V', 'BJ APWG OCEAN AP SCHUKO 20EW-53', 'Busch-J?ger', 0, '152189', 0, '', 0, '', '', 0, 0, 0),
(172, 100171, 'H07V-K 6 gr?n-gelb', 'Einzelader', 'H07V-K 6 gr?n-gelb', 'Eupen', 0, '5140759', 0, '', 0, '', '', 0, 0, 0),
(173, 100172, 'H05V-K 0,5 weiss', 'Einzelader', 'H05V-K 0,5 weiss', 'Eupen', 0, '5140327', 0, '', 0, '', '', 0, 0, 0),
(174, 100173, 'LKT 9.4-440-EP', 'Leistungs-Kondensator', 'inkl. Montiertem Anschlussteil AKD', 'd x h = 70 x 153 mm', 0, '31-10384', 0, '', 0, '', '', 0, 0, 0),
(175, 100174, '1N5404', 'Diode', '400V 3A', '', 0, '26S8868', 0, '', 0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferanten`
--

CREATE TABLE `lieferanten` (
  `id` int(11) NOT NULL,
  `match_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firmen_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `strasse` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hausnummer` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postleitzahl` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stadt` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ansprechpartner_vorname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ansprechpartner_nachname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `lieferanten`
--

INSERT INTO `lieferanten` (`id`, `match_code`, `firmen_name`, `strasse`, `hausnummer`, `postleitzahl`, `stadt`, `ansprechpartner_vorname`, `ansprechpartner_nachname`) VALUES
(1, 'Phoenix', 'Phoenix Contact', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Zajadacz', 'Albert Zajadacz', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiterdaten`
--

CREATE TABLE `mitarbeiterdaten` (
  `id` bigint(20) NOT NULL,
  `vorname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strasse` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hausnummer` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stadt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postleitzahl` int(11) DEFAULT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `telefonnummer` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `mitarbeiterdaten`
--

INSERT INTO `mitarbeiterdaten` (`id`, `vorname`, `nachname`, `strasse`, `hausnummer`, `stadt`, `postleitzahl`, `geburtsdatum`, `telefonnummer`, `email`, `abteilung`) VALUES
(2, 'Andrej', 'Scherer', 'Am Riesenkamp', '15', 'Wedel', 22880, '1988-10-30', '015150673007', 'andy.scherer1887@gmail.com', 'Engineering'),
(3, 'Nina', 'Diekert', 'Am Riesenkamp', '15', 'Wedel', 22880, '1991-03-30', '01725393929', 'n.diekert@live.de', 'Human Resources'),
(5, 'Arne', 'Westphal', 'Hammerbrook', '???', 'Hammerbrook', 20537, '1989-02-23', '015161603549', 'a.westphal@me.com', 'IT'),
(9, 'Viktor', 'Scherer', 'Seafordkehre', '6', 'Bönningstedt', 25474, '1981-03-23', '017682212696', '', 'Sales'),
(10, 'Ralf', 'Diekert', 'Pestalozzistraße', '28', 'Wedel', 22880, '1957-12-01', '0410384503', 'ralf.diekert@eu.de', 'IT'),
(16, 'Anna', 'Scherer', 'Lindenstraße', '62a', 'Wedel', 22880, '1956-10-08', '017672158230', 'anna.scherer1956@gmail.com', 'Human Resources'),
(17, 'Alexander', 'Scherer', 'Lindenstraße', '62a', 'Wedel', 22880, '1955-08-24', '041039030561', '', 'Lager'),
(18, 'Thomas', 'Bockmeyer', 'Rübenkamp', '132', 'Hamburg', 22307, '1989-04-13', '017663301035', 't.boockmeyer@googlemail.com', 'IT'),
(21, 'Alexander', 'Scherer', 'Klevendeicher Chaussee', '???', 'Moorrege', 25436, '1984-09-01', '017662744130', '', 'Lager'),
(23, 'Julia', 'Kitze', 'Eilbektal', '2B', 'Hamburg', 22089, '1991-07-04', '015151887750', '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmitarbeiter` (`idmitarbeiter`),
  ADD UNIQUE KEY `account_loginname_uindex` (`loginname`);

--
-- Indizes für die Tabelle `artikelstammdaten`
--
ALTER TABLE `artikelstammdaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lieferant1` (`id_lieferant1`);

--
-- Indizes für die Tabelle `lieferanten`
--
ALTER TABLE `lieferanten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `artikelstammdaten`
--
ALTER TABLE `artikelstammdaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT für Tabelle `lieferanten`
--
ALTER TABLE `lieferanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `mitarbeiterdaten`
--
ALTER TABLE `mitarbeiterdaten`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
