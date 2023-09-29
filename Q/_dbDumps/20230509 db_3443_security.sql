-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mai 2023 um 11:58
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
-- Datenbank: `db_3443_security`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_gaestebuch`
--

CREATE TABLE `tbl_gaestebuch` (
  `IDGB` int(10) UNSIGNED NOT NULL,
  `Gast` varchar(32) NOT NULL,
  `Nachricht` text NOT NULL,
  `Zeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_gaestebuch`
--

INSERT INTO `tbl_gaestebuch` (`IDGB`, `Gast`, `Nachricht`, `Zeitpunkt`) VALUES
(1, 'Uwe', 'Das ist eine Testnachricht', '2023-05-09 06:57:23'),
(5, 'Uwe', 'Was für ein wunderschöner Tag! Sollte der Unterricht heute nicht draußen stattfinden?<script></script>', '2023-05-09 07:08:47'),
(7, 'Uwe', '&lt;script&gt;alert(&quot;so böse bin ich gar nicht&quot;);&lt;/script&gt;', '2023-05-09 07:25:10'),
(8, 'Uwe', '&lt;script&gt;alert(&quot;so böse bin ich gar nicht&quot;);&lt;/script&gt;', '2023-05-09 07:25:49');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `Emailadresse` varchar(64) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `RegZeitpunkt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `Emailadresse`, `Passwort`, `RegZeitpunkt`) VALUES
(1, 'test@test.at', 'test123', '2023-05-09 07:29:16'),
(5, 'test2@test.at', '$2y$10$VIXPM7gm6nl8MQlcbxAeWO2aet0PhWvTrE4.AHdiiDRjhXZqrP3QK', '2023-05-09 09:11:24');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_gaestebuch`
--
ALTER TABLE `tbl_gaestebuch`
  ADD PRIMARY KEY (`IDGB`);

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
-- AUTO_INCREMENT für Tabelle `tbl_gaestebuch`
--
ALTER TABLE `tbl_gaestebuch`
  MODIFY `IDGB` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
