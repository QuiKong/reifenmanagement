-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Nov 2021 um 18:42
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `management`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reifen`
--

CREATE TABLE `reifen` (
  `ReifenID` int(11) NOT NULL,
  `Reifensatz` int(11) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `Spezifkation` text DEFAULT NULL,
  `Session` text DEFAULT NULL,
  `Kaltdruck` float DEFAULT NULL,
  `TempAbholung` int(11) DEFAULT NULL,
  `Zieltemp` int(11) DEFAULT NULL,
  `Start` time DEFAULT NULL,
  `Dauer` float DEFAULT NULL,
  `Fertig` time DEFAULT NULL,
  `BleedBlanket` float DEFAULT NULL,
  `TP_HOT1` float DEFAULT NULL,
  `TP_HOT2` float DEFAULT NULL,
  `TP_HOT3` float DEFAULT NULL,
  `TP_HOT4` float DEFAULT NULL,
  `Target` float DEFAULT NULL,
  `Bleed_HOT1` float DEFAULT NULL,
  `Bleed_HOT2` float DEFAULT NULL,
  `Bleed_HOT3` float DEFAULT NULL,
  `Bleed_HOT4` float DEFAULT NULL,
  `Abgegeben_für` text DEFAULT NULL,
  `Kommentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sprit`
--

CREATE TABLE `sprit` (
  `VorgangsID` int(11) NOT NULL,
  `Session` text DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `Fahrer` text DEFAULT NULL,
  `Menge` float DEFAULT NULL,
  `Info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Passwort` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wetter`
--

CREATE TABLE `wetter` (
  `Datum` date DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `LuftTemp` int(11) DEFAULT NULL,
  `StreckenTemp` int(11) DEFAULT NULL,
  `Streckenverhaeltnisse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `reifen`
--
ALTER TABLE `reifen`
  ADD PRIMARY KEY (`ReifenID`);

--
-- Indizes für die Tabelle `sprit`
--
ALTER TABLE `sprit`
  ADD PRIMARY KEY (`VorgangsID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
