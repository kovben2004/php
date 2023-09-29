-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Mai 2023 um 12:01
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_3443`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_rollen`
--

CREATE TABLE `tbl_rollen` (
  `IDRolle` int(10) UNSIGNED NOT NULL,
  `Rolle` varchar(32) NOT NULL,
  `Stufe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_rollen`
--

INSERT INTO `tbl_rollen` (`IDRolle`, `Rolle`, `Stufe`) VALUES
(1, 'User', 100),
(2, 'Redakteur', 50),
(3, 'Administrator', 20),
(4, 'Superadministrator', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `FIDRolle` int(10) UNSIGNED DEFAULT NULL,
  `Emailadresse` varchar(64) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Vorname` varchar(32) DEFAULT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `GebDatum` date DEFAULT NULL,
  `RegZeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `FIDRolle`, `Emailadresse`, `Passwort`, `Vorname`, `Nachname`, `GebDatum`, `RegZeitpunkt`) VALUES
(1, 1, 'test0@test.at', '$2y$10$PLmBOYhz3weyI2.1415UQOXm6YE5JhVDY.iF.2IkzbhEX4odZI33G', NULL, NULL, NULL, '2023-05-15 07:48:51'),
(2, 1, 'test1@test.at', '$2y$10$V2DEg5cYe.aqRg9Kltq4De/68W3vU9tMa.AX247/w6q.skzpdzX1S', 'Thomas', NULL, NULL, '2023-05-15 07:48:51'),
(4, 3, 'test3_admin@test.at', '$2y$10$KeZmbi/K.aQdOnX3HcMC4Osup.oaNaE.5ulBSAEVsMn935uAk5sDi', 'Dieter', 'Bohlen', NULL, '2023-05-15 07:48:51'),
(5, 1, 'test4_red@test.at', '$2y$10$thKu18j1igCREHJ0Xyg5D.IylzE8Ye3yDij4nVmdqotAEWhz8UPEC', 'Dieter', 'Bohlen', '0000-00-00', '2023-05-15 09:00:29');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_rollen`
--
ALTER TABLE `tbl_rollen`
  ADD PRIMARY KEY (`IDRolle`),
  ADD UNIQUE KEY `Rolle` (`Rolle`),
  ADD UNIQUE KEY `Stufe` (`Stufe`);

--
-- Indizes für die Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `Emailadresse` (`Emailadresse`),
  ADD KEY `FIDRolle` (`FIDRolle`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_rollen`
--
ALTER TABLE `tbl_rollen`
  MODIFY `IDRolle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`FIDRolle`) REFERENCES `tbl_rollen` (`IDRolle`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
