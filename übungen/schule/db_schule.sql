-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 11:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schule`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klasse`
--

CREATE TABLE `tbl_klasse` (
  `ID_Klasse` int(11) UNSIGNED NOT NULL,
  `FID_Raum` int(11) UNSIGNED DEFAULT NULL,
  `FID_Lehrer` int(11) UNSIGNED DEFAULT NULL,
  `Klassen_Name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_klasse`
--

INSERT INTO `tbl_klasse` (`ID_Klasse`, `FID_Raum`, `FID_Lehrer`, `Klassen_Name`) VALUES
(9, 2, 2, 'Erste_Klasse'),
(10, 5, 3, 'Fünfte_Klasse'),
(11, 3, 14, 'Zweite_Klasse'),
(12, 4, 11, 'Vierte_Klasse');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lehrer`
--

CREATE TABLE `tbl_lehrer` (
  `ID_Lehrer` int(11) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lehrer`
--

INSERT INTO `tbl_lehrer` (`ID_Lehrer`, `Vorname`, `Nachname`) VALUES
(1, 'Uwe', 'Mutz'),
(2, 'Benedek', 'Kovacs'),
(3, 'John', 'Doe'),
(4, 'Lisa', 'Lang'),
(5, 'Sarah', 'Kurz'),
(11, 'Karl', 'Lindorfer'),
(12, 'Sarah ', 'Müller'),
(13, 'Max ', 'Füchs'),
(14, 'Julia ', 'Wagner'),
(15, 'Nina', 'Schulz'),
(16, 'Markus', 'Müller'),
(17, 'Sabine', 'Schmidt'),
(18, 'Andreas', 'Fischer'),
(19, 'Petra', 'Weber'),
(20, 'Thomas', 'Wagner'),
(21, 'Monika', 'Becker'),
(22, 'Stefan', 'Hoffmann'),
(23, 'Marina', 'Bauer'),
(24, 'Michael', 'Richter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raum`
--

CREATE TABLE `tbl_raum` (
  `ID_Raum` int(11) UNSIGNED NOT NULL,
  `Raum_Name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_raum`
--

INSERT INTO `tbl_raum` (`ID_Raum`, `Raum_Name`) VALUES
(2, 'A1'),
(5, 'B7'),
(3, 'C5'),
(4, 'D2'),
(1, 'F10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schuler`
--

CREATE TABLE `tbl_schuler` (
  `ID_Schüler` int(11) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL,
  `Geburtsdatum` date NOT NULL,
  `FID_Klasse` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schuler`
--

INSERT INTO `tbl_schuler` (`ID_Schüler`, `Vorname`, `Nachname`, `Geburtsdatum`, `FID_Klasse`) VALUES
(1, 'Leon ', 'Schmidt', '2023-03-26', 9),
(2, 'Laura ', 'Berger', '2023-03-10', 10),
(3, 'Felix ', 'Meier', '2023-06-14', 10),
(4, 'Lisa ', 'Fischer', '2022-10-10', 12),
(5, 'Max ', 'Mayer', '2022-09-24', 11),
(6, 'Sophie ', 'Bauer', '2022-09-21', 11),
(7, 'Tim ', 'Richter', '2023-03-15', 10),
(8, 'Lena ', 'Schmitt', '2023-01-11', 9),
(9, 'Luca ', 'Keller', '2022-12-07', 12),
(10, 'Hannah ', 'Weber', '2023-01-10', 12),
(11, 'Ben ', 'Fischer', '2023-03-16', 12),
(12, 'Emma ', 'Huber', '2022-05-11', 10),
(13, 'Janina ', 'Becker', '2023-03-31', 10),
(14, 'Marie ', 'Mayer', '2022-12-01', 9),
(15, 'Niklas ', 'Wagner', '2021-10-07', 9),
(16, 'Bruce', 'John', '2022-09-26', 11),
(17, 'Bruce', 'wayne', '2022-09-23', 12),
(18, 'Bruce', 'wayne', '2023-03-01', NULL),
(19, 'Brock', 'Hook', '1988-05-21', NULL),
(20, 'David', 'Lash', '1992-05-21', NULL),
(22, 'Max', 'Müller', '2023-06-20', NULL),
(23, 'Lena', 'Schmidt', '0000-00-00', NULL),
(24, 'Elias', 'Fischer', '0000-00-00', NULL),
(25, 'Hannah', 'Weber', '0000-00-00', NULL),
(26, 'David', 'Wagner', '0000-00-00', NULL),
(27, 'Sophie', 'Becker', '0000-00-00', NULL),
(28, 'Alexander', 'Schulz', '0000-00-00', NULL),
(29, 'Emilia', 'Hoffmann', '0000-00-00', NULL),
(30, 'Paul', 'Schäfer', '0000-00-00', NULL),
(31, 'Laura', 'Koch', '0000-00-00', NULL),
(32, 'Ben', 'Bauer', '0000-00-00', NULL),
(33, 'Emma', 'Richter', '0000-00-00', NULL),
(34, 'Leon', 'Klein', '0000-00-00', NULL),
(35, 'Mia', 'Wolf', '0000-00-00', NULL),
(36, 'Finn', 'Schröder', '0000-00-00', NULL),
(37, 'Lina', 'Neumann', '0000-00-00', NULL),
(38, 'Julian', 'Schwarz', '0000-00-00', NULL),
(39, 'Maja', 'Zimmermann', '0000-00-00', NULL),
(40, 'Tim', 'Braun', '0000-00-00', NULL),
(41, 'Clara', 'Krüger', '0000-00-00', NULL),
(42, 'Tom', 'Hermann', '0000-00-00', NULL),
(43, 'Anna', 'Lange', '0000-00-00', NULL),
(44, 'Jan', 'Schmitt', '0000-00-00', NULL),
(45, 'Sarah', 'Werner', '0000-00-00', NULL),
(46, 'Oskar', 'Peters', '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_klasse`
--
ALTER TABLE `tbl_klasse`
  ADD PRIMARY KEY (`ID_Klasse`),
  ADD KEY `FID_Raum` (`FID_Raum`),
  ADD KEY `FID_Lehrer` (`FID_Lehrer`),
  ADD KEY `Klassen_Name` (`Klassen_Name`);

--
-- Indexes for table `tbl_lehrer`
--
ALTER TABLE `tbl_lehrer`
  ADD PRIMARY KEY (`ID_Lehrer`);

--
-- Indexes for table `tbl_raum`
--
ALTER TABLE `tbl_raum`
  ADD PRIMARY KEY (`ID_Raum`),
  ADD KEY `Klassen_Name` (`Raum_Name`) USING BTREE;

--
-- Indexes for table `tbl_schuler`
--
ALTER TABLE `tbl_schuler`
  ADD PRIMARY KEY (`ID_Schüler`),
  ADD KEY `FID_Klasse` (`FID_Klasse`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_klasse`
--
ALTER TABLE `tbl_klasse`
  MODIFY `ID_Klasse` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_lehrer`
--
ALTER TABLE `tbl_lehrer`
  MODIFY `ID_Lehrer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_raum`
--
ALTER TABLE `tbl_raum`
  MODIFY `ID_Raum` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schuler`
--
ALTER TABLE `tbl_schuler`
  MODIFY `ID_Schüler` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_klasse`
--
ALTER TABLE `tbl_klasse`
  ADD CONSTRAINT `tbl_klasse_ibfk_1` FOREIGN KEY (`FID_Raum`) REFERENCES `tbl_raum` (`ID_Raum`) ON UPDATE SET NULL,
  ADD CONSTRAINT `tbl_klasse_ibfk_2` FOREIGN KEY (`FID_Lehrer`) REFERENCES `tbl_lehrer` (`ID_Lehrer`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_schuler`
--
ALTER TABLE `tbl_schuler`
  ADD CONSTRAINT `tbl_schuler_ibfk_1` FOREIGN KEY (`FID_Klasse`) REFERENCES `tbl_klasse` (`ID_Klasse`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
