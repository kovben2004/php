-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Mrz 2023 um 12:10
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
-- Datenbank: `db_3443_2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geschlechter`
--

CREATE TABLE `tbl_geschlechter` (
  `IDGeschlecht` int(10) UNSIGNED NOT NULL,
  `Geschlecht` varchar(16) NOT NULL,
  `Kurzzeichen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_geschlechter`
--

INSERT INTO `tbl_geschlechter` (`IDGeschlecht`, `Geschlecht`, `Kurzzeichen`) VALUES
(1, 'weiblich', 'w'),
(3, 'divers', 'd'),
(5, 'männlich', 'm');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_staaten`
--

CREATE TABLE `tbl_staaten` (
  `IDStaat` int(10) UNSIGNED NOT NULL,
  `Staat` varchar(64) NOT NULL,
  `Kurzzeichen` varchar(2) NOT NULL,
  `Vorwahl` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_staaten`
--

INSERT INTO `tbl_staaten` (`IDStaat`, `Staat`, `Kurzzeichen`, `Vorwahl`) VALUES
(1, 'Österreich', 'AT', 43),
(2, 'Deutschland', 'DE', 49),
(3, 'Spanien', 'ES', 34),
(4, 'Italien', 'IT', 39),
(5, 'Großbritannien', 'GB', 44);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `Emailadresse` varchar(64) NOT NULL,
  `Passwort` varchar(256) NOT NULL,
  `Vorname` varchar(32) DEFAULT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `GebDatum` date DEFAULT NULL,
  `FIDGebLand` int(10) UNSIGNED DEFAULT NULL,
  `FIDGeschlecht` int(10) UNSIGNED DEFAULT NULL,
  `RegZeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `Emailadresse`, `Passwort`, `Vorname`, `Nachname`, `GebDatum`, `FIDGebLand`, `FIDGeschlecht`, `RegZeitpunkt`) VALUES
(1, 'uwe.mutz@syne.at', 'test123', 'Uwe', 'Mutz', '1972-10-17', 1, 5, '2023-02-28 11:30:53'),
(2, 'test1@test.at', 'test456', NULL, 'Maier', NULL, 1, 3, '2023-02-28 11:30:53'),
(3, 'test2@test.at', 'test789', 'Uwe', 'Maier', NULL, 2, NULL, '2023-02-28 11:31:32'),
(4, 'test3@test.at', 'test012', '', 'Maier', '1999-09-08', NULL, NULL, '2023-02-28 11:31:32'),
(5, 'test4@test.at', 'test', 'Hermann', NULL, '1978-09-16', NULL, NULL, '2023-03-06 08:01:37'),
(6, 'test5@test.at', 'H238!', NULL, 'Maierhofer', NULL, 1, 1, '2023-03-06 08:01:37'),
(7, 'hermann.mueller@test.at', 'o34jöA', 'Hermann', 'Müller', '1999-12-24', 2, 5, '2023-03-06 08:01:37'),
(8, 'harald.obermueller@test.at', 'jhsdö§$1a', 'Harald', 'Obermüller', NULL, 2, 5, '2023-03-06 08:01:37'),
(9, 'sabine.m@test.at', 'jdajfAD', 'Sabine', 'Mayerhofer', NULL, 1, 1, '2023-03-06 08:01:37'),
(10, 's.obermaier@test.at', 'lkad3\"§4', 'Susanne', 'Obermaier', '2001-12-22', NULL, 1, '2023-03-06 08:01:37'),
(11, 'test6@test.at', 'test123', 'Edwin', 'Maierhuberhofer', '1988-09-14', 3, 5, '2023-03-07 08:49:55'),
(13, 'test7@test.at', 'test123', 'Edwin', 'Maierhuberhofer', '1988-09-14', 2, 5, '2023-03-07 08:51:24'),
(14, 'test8@test.at', 'sdfh', 'Harald', 'Maier', '2000-12-29', NULL, 5, '2023-03-07 08:59:24'),
(16, 'test9@test.at', 'sadhfasdlhf', '', '', '0000-00-00', 4, NULL, '2023-03-07 09:00:08'),
(17, 'test10@test.at', 'test123', 'Edwin', 'Maierhuberhofer', '1988-09-14', 3, 1, '2023-03-07 09:02:45'),
(18, 'test11@test.at', 'test123', 'Edwin', 'Maierhuberhofer', '1988-09-14', 4, 5, '2023-03-07 09:02:45');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_geschlechter`
--
ALTER TABLE `tbl_geschlechter`
  ADD PRIMARY KEY (`IDGeschlecht`);

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
  ADD UNIQUE KEY `Emailadresse` (`Emailadresse`),
  ADD KEY `FIDGeschlecht` (`FIDGeschlecht`),
  ADD KEY `FIDGebLand` (`FIDGebLand`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_geschlechter`
--
ALTER TABLE `tbl_geschlechter`
  MODIFY `IDGeschlecht` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_staaten`
--
ALTER TABLE `tbl_staaten`
  MODIFY `IDStaat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`FIDGeschlecht`) REFERENCES `tbl_geschlechter` (`IDGeschlecht`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`FIDGebLand`) REFERENCES `tbl_staaten` (`IDStaat`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
