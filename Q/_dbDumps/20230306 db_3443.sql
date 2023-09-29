-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2023 um 12:08
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
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `Emailadresse` varchar(64) NOT NULL,
  `Passwort` varchar(256) NOT NULL,
  `Vorname` varchar(32) DEFAULT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `GebDatum` date DEFAULT NULL,
  `RegZeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `Emailadresse`, `Passwort`, `Vorname`, `Nachname`, `GebDatum`, `RegZeitpunkt`) VALUES
(1, 'uwe.mutz@syne.at', 'test123', 'Uwe', 'Mutz', '1972-10-17', '2023-02-28 11:30:53'),
(2, 'test1@test.at', 'test456', NULL, 'Maier', NULL, '2023-02-28 11:30:53'),
(3, 'test2@test.at', 'test789', 'Uwe', 'Maier', NULL, '2023-02-28 11:31:32'),
(4, 'test3@test.at', 'test012', '', 'Maier', '1999-09-08', '2023-02-28 11:31:32'),
(5, 'test4@test.at', 'test', 'Hermann', NULL, '1978-09-16', '2023-03-06 08:01:37'),
(6, 'test5@test.at', 'H238!', NULL, 'Maierhofer', NULL, '2023-03-06 08:01:37'),
(7, 'hermann.mueller@test.at', 'o34jöA', 'Hermann', 'Müller', '1999-12-24', '2023-03-06 08:01:37'),
(8, 'harald.obermueller@test.at', 'jhsdö§$1a', 'Harald', 'Obermüller', NULL, '2023-03-06 08:01:37'),
(9, 'sabine.m@test.at', 'jdajfAD', 'Sabine', 'Mayerhofer', NULL, '2023-03-06 08:01:37'),
(10, 's.obermaier@test.at', 'lkad3\"§4', 'Susanne', 'Obermaier', '2001-12-22', '2023-03-06 08:01:37');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `Emailadresse` (`Emailadresse`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
