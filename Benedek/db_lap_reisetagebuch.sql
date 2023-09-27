-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Sep 2023 um 18:26
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_lap_reisetagebuch`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_abschnitte`
--

CREATE TABLE `tbl_abschnitte` (
  `IDAbschnitt` int(10) UNSIGNED NOT NULL,
  `FIDReise` int(10) UNSIGNED DEFAULT NULL,
  `FIDAbschnitt` int(10) UNSIGNED DEFAULT NULL,
  `Titel` varchar(64) NOT NULL,
  `Beschreibung` text DEFAULT NULL,
  `von` datetime NOT NULL,
  `bis` datetime NOT NULL,
  `FIDStaat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_abschnitte`
--

INSERT INTO `tbl_abschnitte` (`IDAbschnitt`, `FIDReise`, `FIDAbschnitt`, `Titel`, `Beschreibung`, `von`, `bis`, `FIDStaat`) VALUES
(1, 1, NULL, 'Woche 1: Santa Maria', 'Wir umrunden die Insel Santa Maria zu Fuss. 80km in fünf Tagen.', '2023-08-04 11:00:00', '2023-08-08 16:00:00', 4),
(2, 1, NULL, 'Woche 2: Sao Miguel', 'Entspannung pur in einer restaurierten Windmühle.', '2023-08-09 10:00:00', '2023-08-16 06:00:00', 4),
(3, 1, 1, 'Tag 1: entspannte Wanderung', NULL, '2023-08-04 11:00:00', '2023-08-05 10:00:00', 4),
(4, 1, 1, 'Tag 2: etwas weniger entspannt', NULL, '2023-08-05 10:00:00', '2023-08-06 10:00:00', 4),
(5, 1, 1, 'Tag 3: super Wanderung', 'aber echt', '2023-08-06 10:00:00', '2023-08-07 10:30:00', 4),
(6, 1, 1, 'Tag 4: traurig', 'Frankie, wir vermissen Dich! :-(', '2023-08-07 11:00:00', '2023-08-08 12:00:00', 4),
(7, 4, NULL, 'Bretagne', NULL, '2023-07-01 10:00:00', '2023-07-05 18:00:00', 6),
(8, 4, NULL, 'Champagne', NULL, '2023-07-05 18:00:00', '2023-08-09 19:00:00', 6),
(9, 4, 7, 'Tag 1', NULL, '2023-07-01 09:00:00', '2023-07-02 11:00:00', 6),
(10, 4, 7, 'Tag 2', NULL, '2023-07-02 12:00:00', '2023-07-03 19:00:00', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_fotos`
--

CREATE TABLE `tbl_fotos` (
  `IDFoto` int(10) UNSIGNED NOT NULL,
  `FIDAbschnitt` int(10) UNSIGNED DEFAULT NULL,
  `Pfad` varchar(128) NOT NULL,
  `Titel` varchar(64) DEFAULT NULL,
  `Beschreibung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_reisen`
--

CREATE TABLE `tbl_reisen` (
  `IDReise` int(10) UNSIGNED NOT NULL,
  `FIDUser` int(10) UNSIGNED NOT NULL,
  `Titel` varchar(64) NOT NULL,
  `Beschreibung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_reisen`
--

INSERT INTO `tbl_reisen` (`IDReise`, `FIDUser`, `Titel`, `Beschreibung`) VALUES
(1, 1, 'Azoren', 'Zwei Wochen auf den Azoren'),
(2, 1, 'Schottland', 'Highlander & Co.'),
(3, 1, 'Opatija', 'Lässig wars!'),
(4, 2, 'Frankreich', 'Quer durch Frankreich mit dem Motorrad');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_skala`
--

CREATE TABLE `tbl_skala` (
  `IDSkala` int(10) UNSIGNED NOT NULL,
  `Bewertung` varchar(16) NOT NULL,
  `Wert` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_skala`
--

INSERT INTO `tbl_skala` (`IDSkala`, `Bewertung`, `Wert`) VALUES
(1, 'schlecht', 5),
(2, 'ausreichend', 4),
(3, 'befriedigend', 3),
(4, 'gut', 2),
(5, 'sehr gut', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_staaten`
--

CREATE TABLE `tbl_staaten` (
  `IDStaat` int(10) UNSIGNED NOT NULL,
  `Staat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_staaten`
--

INSERT INTO `tbl_staaten` (`IDStaat`, `Staat`) VALUES
(6, 'Frankreich'),
(5, 'Großbritannien'),
(3, 'Italien'),
(1, 'Österreich'),
(4, 'Portugal'),
(2, 'Spanien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `Emailadresse` varchar(64) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `Profilbild` varchar(128) DEFAULT NULL,
  `Beschreibung` text DEFAULT NULL,
  `RegZeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `Emailadresse`, `Passwort`, `Vorname`, `Nachname`, `Profilbild`, `Beschreibung`, `RegZeitpunkt`) VALUES
(1, 'uwe.mutz@syne.at', '$2y$10$tR6TZeJE67hXR.xoe5TKPOoLZ2ETy1mu9cd4IcpdoYHGUrER1v15a', 'Uwe', 'Mutz', NULL, 'eine kurze Beschreibung', '2023-09-02 13:35:54'),
(2, 'test0@test.at', '$2y$10$HFuHlkQ9d1i8liPFYODc8O0Z6Koqw4K1w350z.1Vy59lVIfwIVhmO', 'Harald', 'Maier', NULL, NULL, '2023-09-02 15:09:46'),
(3, 'test1@test.at', '$2y$10$sXDPhQjeYgI.ykWKpxEvb.RL9XNP2V7Pzbq5XGfs/KLIMIKk.VFwW', 'Sabine', 'Müller', NULL, 'Die Müllerin', '2023-09-02 16:10:33'),
(4, 'test2@test.at', '$2y$10$2.n9pUJ8OFVpSMF2iCrLVuw7cWMQu4dn4zMyrBddoR16qBdMs7/uS', 'Tamara', NULL, NULL, NULL, '2023-09-02 16:11:24'),
(5, 'test3@test.at', '$2y$10$MnlEY.uRIq5IOLtkrz9xH.YF3237.g.L442MZce/PmqWbt/7ZHAQG', 'Sonja', NULL, NULL, NULL, '2023-09-02 16:21:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_votings`
--

CREATE TABLE `tbl_votings` (
  `IDVoting` int(10) UNSIGNED NOT NULL,
  `FIDUser` int(10) UNSIGNED DEFAULT NULL,
  `FIDReise` int(10) UNSIGNED NOT NULL,
  `FIDBewertung` int(10) UNSIGNED NOT NULL,
  `Zeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_votings`
--

INSERT INTO `tbl_votings` (`IDVoting`, `FIDUser`, `FIDReise`, `FIDBewertung`, `Zeitpunkt`) VALUES
(1, 1, 4, 4, '2023-09-02 16:07:51'),
(2, 2, 1, 3, '2023-09-02 16:09:38'),
(3, 2, 3, 5, '2023-09-02 16:09:41'),
(4, 2, 2, 5, '2023-09-02 16:09:44'),
(5, 3, 1, 5, '2023-09-02 16:10:41'),
(6, 3, 4, 5, '2023-09-02 16:10:44'),
(7, 3, 3, 4, '2023-09-02 16:10:55'),
(8, 3, 2, 3, '2023-09-02 16:11:00'),
(9, 4, 1, 5, '2023-09-02 16:11:29'),
(10, 4, 4, 3, '2023-09-02 16:11:33'),
(11, 4, 3, 4, '2023-09-02 16:11:42'),
(12, 4, 2, 3, '2023-09-02 16:11:47');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_abschnitte`
--
ALTER TABLE `tbl_abschnitte`
  ADD PRIMARY KEY (`IDAbschnitt`),
  ADD KEY `FIDReise` (`FIDReise`),
  ADD KEY `FIDAbschnitt` (`FIDAbschnitt`),
  ADD KEY `FIDStaat` (`FIDStaat`);

--
-- Indizes für die Tabelle `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  ADD PRIMARY KEY (`IDFoto`),
  ADD UNIQUE KEY `Pfad` (`Pfad`),
  ADD KEY `FIDAbschnitt` (`FIDAbschnitt`);

--
-- Indizes für die Tabelle `tbl_reisen`
--
ALTER TABLE `tbl_reisen`
  ADD PRIMARY KEY (`IDReise`),
  ADD KEY `FIDUser` (`FIDUser`);

--
-- Indizes für die Tabelle `tbl_skala`
--
ALTER TABLE `tbl_skala`
  ADD PRIMARY KEY (`IDSkala`),
  ADD UNIQUE KEY `Bewertung` (`Bewertung`),
  ADD UNIQUE KEY `Wert` (`Wert`);

--
-- Indizes für die Tabelle `tbl_staaten`
--
ALTER TABLE `tbl_staaten`
  ADD PRIMARY KEY (`IDStaat`),
  ADD UNIQUE KEY `Staat` (`Staat`);

--
-- Indizes für die Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `Emailadresse` (`Emailadresse`);

--
-- Indizes für die Tabelle `tbl_votings`
--
ALTER TABLE `tbl_votings`
  ADD PRIMARY KEY (`IDVoting`),
  ADD UNIQUE KEY `FIDUser` (`FIDUser`,`FIDReise`),
  ADD KEY `FIDBewertung` (`FIDBewertung`),
  ADD KEY `FIDReise` (`FIDReise`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_abschnitte`
--
ALTER TABLE `tbl_abschnitte`
  MODIFY `IDAbschnitt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  MODIFY `IDFoto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_reisen`
--
ALTER TABLE `tbl_reisen`
  MODIFY `IDReise` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tbl_skala`
--
ALTER TABLE `tbl_skala`
  MODIFY `IDSkala` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_staaten`
--
ALTER TABLE `tbl_staaten`
  MODIFY `IDStaat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_votings`
--
ALTER TABLE `tbl_votings`
  MODIFY `IDVoting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_abschnitte`
--
ALTER TABLE `tbl_abschnitte`
  ADD CONSTRAINT `tbl_abschnitte_ibfk_1` FOREIGN KEY (`FIDReise`) REFERENCES `tbl_reisen` (`IDReise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_abschnitte_ibfk_2` FOREIGN KEY (`FIDAbschnitt`) REFERENCES `tbl_abschnitte` (`IDAbschnitt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_abschnitte_ibfk_3` FOREIGN KEY (`FIDStaat`) REFERENCES `tbl_staaten` (`IDStaat`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  ADD CONSTRAINT `tbl_fotos_ibfk_1` FOREIGN KEY (`FIDAbschnitt`) REFERENCES `tbl_abschnitte` (`IDAbschnitt`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tbl_reisen`
--
ALTER TABLE `tbl_reisen`
  ADD CONSTRAINT `tbl_reisen_ibfk_1` FOREIGN KEY (`FIDUser`) REFERENCES `tbl_user` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tbl_votings`
--
ALTER TABLE `tbl_votings`
  ADD CONSTRAINT `tbl_votings_ibfk_1` FOREIGN KEY (`FIDUser`) REFERENCES `tbl_user` (`IDUser`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_votings_ibfk_2` FOREIGN KEY (`FIDReise`) REFERENCES `tbl_reisen` (`IDReise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_votings_ibfk_3` FOREIGN KEY (`FIDBewertung`) REFERENCES `tbl_skala` (`IDSkala`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
