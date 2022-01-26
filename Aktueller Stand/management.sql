-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jan 2022 um 19:18
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
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `BestellNr` int(11) NOT NULL,
  `Reifensatz` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Zeit` time NOT NULL,
  `Status` int(11) NOT NULL,
  `Mitarbeiter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellung`
--

INSERT INTO `bestellung` (`BestellNr`, `Reifensatz`, `Datum`, `Zeit`, `Status`, `Mitarbeiter`) VALUES
(9, 1, '2022-01-26', '16:59:05', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reifen`
--

CREATE TABLE `reifen` (
  `ReifenID` int(11) NOT NULL,
  `Reifensatz` int(11) NOT NULL,
  `Reifenart` text DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `Spezifikation` text DEFAULT NULL,
  `Session` text DEFAULT NULL,
  `Kaltdruck_vl` float DEFAULT NULL,
  `Kaltdruck_hl` float DEFAULT NULL,
  `Kaltdruck_vr` float DEFAULT NULL,
  `Kaltdruck_hr` float DEFAULT NULL,
  `TempAbholung` int(11) DEFAULT NULL,
  `Zieldruck_vl` float DEFAULT NULL,
  `Zieldruck_hl` float DEFAULT NULL,
  `Zieldruck_vr` float DEFAULT NULL,
  `Zieldruck_hr` float DEFAULT NULL,
  `Zieltemp` int(11) DEFAULT NULL,
  `Start` time DEFAULT NULL,
  `Dauer` int(11) DEFAULT NULL,
  `Fertig` time DEFAULT NULL,
  `bleed_vl` float DEFAULT NULL,
  `bleed_hl` float DEFAULT NULL,
  `bleed_vr` float DEFAULT NULL,
  `bleed_hr` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reifen`
--

INSERT INTO `reifen` (`ReifenID`, `Reifensatz`, `Reifenart`, `Datum`, `Zeit`, `Spezifikation`, `Session`, `Kaltdruck_vl`, `Kaltdruck_hl`, `Kaltdruck_vr`, `Kaltdruck_hr`, `TempAbholung`, `Zieldruck_vl`, `Zieldruck_hl`, `Zieldruck_vr`, `Zieldruck_hr`, `Zieltemp`, `Start`, `Dauer`, `Fertig`, `bleed_vl`, `bleed_hl`, `bleed_vr`, `bleed_hr`) VALUES
(22, 0, 'Cold', '2021-12-09', '18:09:00', 'keine', 'TopQ', 1.3, 1.2, 1.1, 0.9, 20, 0, 1.75, 1.8, 1.7, 90, '18:10:00', 50, '19:00:00', NULL, NULL, NULL, NULL),
(23, 0, 'Cold', '2021-12-09', '18:09:00', 'keine', 'TopQ', 1.3, 1.2, 1.1, 0.9, 20, 1.7, 1.75, 1.8, 1.7, 90, '18:10:00', 50, '19:00:00', NULL, NULL, NULL, NULL),
(25, 0, 'Cold', '2012-12-09', '18:30:00', 'G/W', 'Q1', 1.2, 1.4, 1.2, 1.2, 20, 1.9, 1.9, 1.8, 1.95, 90, '18:31:00', 60, '19:31:00', -0.2, -0.1, 0, -0.2),
(26, 0, 'Cold', '2021-12-09', '21:49:00', 'G/D', 'Q1', 1.2, 1.2, 1.2, 1.2, 20, 1.9, 1.9, 1.9, 1.9, 90, '21:50:00', 10, '22:00:00', -0.2, -0.1, -0.1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reifen2`
--

CREATE TABLE `reifen2` (
  `ID` int(11) NOT NULL,
  `Reifensatz` int(11) NOT NULL,
  `Art` text NOT NULL,
  `Spezifikation` text NOT NULL,
  `Position` text NOT NULL,
  `Kaltdruck` float NOT NULL,
  `TempAbholung` float NOT NULL,
  `Zieldruck` float NOT NULL,
  `Zieltemperatur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reifensatz`
--

CREATE TABLE `reifensatz` (
  `Reifensatz` int(11) NOT NULL,
  `Mischung_vl` text NOT NULL,
  `Mischung_hl` text NOT NULL,
  `Mischung_vr` text NOT NULL,
  `Mischung_hr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reifensatz`
--

INSERT INTO `reifensatz` (`Reifensatz`, `Mischung_vl`, `Mischung_hl`, `Mischung_vr`, `Mischung_hr`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rennwochenende`
--

CREATE TABLE `rennwochenende` (
  `WeID` int(11) NOT NULL,
  `Von_Datum` date NOT NULL,
  `Bis_Datum` date NOT NULL,
  `Strecke` text NOT NULL,
  `Format` text NOT NULL,
  `Gesamtkontingent` int(11) NOT NULL,
  `Bemerkung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rennwochenende`
--

INSERT INTO `rennwochenende` (`WeID`, `Von_Datum`, `Bis_Datum`, `Strecke`, `Format`, `Gesamtkontingent`, `Bemerkung`) VALUES
(1, '2022-01-06', '2022-01-09', 'Belgien-Spa', 'VLN', 30, 'Starker Regen vorhergesagt'),
(2, '2022-01-28', '2022-01-30', 'Jeddah - Saudi Arabien', 'Sprint', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session`
--

CREATE TABLE `session` (
  `SessionID` int(11) NOT NULL,
  `Session` text NOT NULL,
  `Datum` date NOT NULL,
  `Beginn` time NOT NULL,
  `Ende` time NOT NULL,
  `WeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `session`
--

INSERT INTO `session` (`SessionID`, `Session`, `Datum`, `Beginn`, `Ende`, `WeID`) VALUES
(1, 'FP1', '2022-01-06', '18:00:00', '19:00:00', 1),
(2, 'FP2', '2022-01-07', '11:00:00', '12:00:00', 1),
(3, 'Q1', '2022-01-07', '12:30:00', '13:00:00', 1),
(4, 'Q2', '2022-02-03', '16:45:00', '17:00:00', 1),
(5, 'Q3', '2022-01-27', '18:54:00', '20:51:00', 2),
(6, 'Race', '2022-01-27', '21:00:00', '00:00:00', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sprit`
--

CREATE TABLE `sprit` (
  `VorgangsID` int(11) NOT NULL,
  `Session` text DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `Fahrer` text DEFAULT NULL,
  `Menge` int(11) DEFAULT NULL,
  `Info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `sprit`
--

INSERT INTO `sprit` (`VorgangsID`, `Session`, `Zeit`, `Fahrer`, `Menge`, `Info`) VALUES
(1, 'Race', '12:24:00', 'RAS', 21, 'keine Probleme'),
(2, 'Q2', '15:56:00', 'KVL', 1, 'Hotlap'),
(3, 'Q2', '15:58:00', 'MIE', 2, 'Charge Lap'),
(4, 'Q3', '18:33:00', 'KVL', 22, 'Hot Lap'),
(5, 'WUP', '12:14:00', 'RAS', 23, ''),
(6, 'WUP', '12:14:00', 'RAS', 23, ''),
(7, 'Q1', '12:12:00', 'MIE', 54, ''),
(8, 'Q2', '23:34:00', 'MIE', 3, ''),
(9, 'Q1', '00:00:00', '0', 0, ''),
(10, 'TopQ', '16:05:00', 'MIE', 23, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`StatusID`, `Status`) VALUES
(1, 'offen'),
(2, 'bestellt'),
(3, 'abgeholt'),
(4, 'beschriftet'),
(5, 'heizen'),
(6, 'Einsatz'),
(7, 'gebraucht');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Passwort` text DEFAULT NULL,
  `Rolle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `Name`, `Passwort`, `Rolle`) VALUES
(1, 'User1', 'test1', 'Manager'),
(2, 'User2', 'test2', 'Mitarbeiter'),
(3, 'User3', 'test3', 'Ingenieur'),
(4, 'User4', 'test4', 'Manager');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wetter`
--

CREATE TABLE `wetter` (
  `MessID` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Zeit` time DEFAULT NULL,
  `LuftTemp` int(11) DEFAULT NULL,
  `StreckenTemp` int(11) DEFAULT NULL,
  `Streckenverhaeltnisse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `wetter`
--

INSERT INTO `wetter` (`MessID`, `Datum`, `Zeit`, `LuftTemp`, `StreckenTemp`, `Streckenverhaeltnisse`) VALUES
(1, '0123-03-12', '23:23:00', 23, 32, 'gut'),
(4, '2022-01-05', '13:00:00', 4, 15, 'regen'),
(5, '2022-01-23', '14:00:00', 21, 23, 'gut'),
(10, '0000-00-00', '00:00:00', 0, 0, ''),
(11, '2022-01-26', '16:00:00', 3, 12, 'nass'),
(12, '2022-01-26', '17:01:00', 3, 15, 'trocken'),
(13, '2022-01-27', '16:03:00', 4, 32, ' ideal'),
(14, '2022-01-26', '17:16:00', 2, 12, 'nass'),
(15, '2022-01-26', '18:13:00', 4, 12, 'schlecht');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`BestellNr`),
  ADD KEY `Reifensatz` (`Reifensatz`),
  ADD KEY `Mitarbeiter` (`Mitarbeiter`);

--
-- Indizes für die Tabelle `reifen`
--
ALTER TABLE `reifen`
  ADD PRIMARY KEY (`ReifenID`);

--
-- Indizes für die Tabelle `reifen2`
--
ALTER TABLE `reifen2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Reifensatz` (`Reifensatz`);

--
-- Indizes für die Tabelle `reifensatz`
--
ALTER TABLE `reifensatz`
  ADD PRIMARY KEY (`Reifensatz`);

--
-- Indizes für die Tabelle `rennwochenende`
--
ALTER TABLE `rennwochenende`
  ADD PRIMARY KEY (`WeID`);

--
-- Indizes für die Tabelle `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SessionID`),
  ADD KEY `WeID` (`WeID`);

--
-- Indizes für die Tabelle `sprit`
--
ALTER TABLE `sprit`
  ADD PRIMARY KEY (`VorgangsID`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `wetter`
--
ALTER TABLE `wetter`
  ADD PRIMARY KEY (`MessID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `BestellNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `reifen`
--
ALTER TABLE `reifen`
  MODIFY `ReifenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `reifen2`
--
ALTER TABLE `reifen2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `reifensatz`
--
ALTER TABLE `reifensatz`
  MODIFY `Reifensatz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `rennwochenende`
--
ALTER TABLE `rennwochenende`
  MODIFY `WeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `session`
--
ALTER TABLE `session`
  MODIFY `SessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `sprit`
--
ALTER TABLE `sprit`
  MODIFY `VorgangsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `wetter`
--
ALTER TABLE `wetter`
  MODIFY `MessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD CONSTRAINT `bestellung_ibfk_2` FOREIGN KEY (`Reifensatz`) REFERENCES `reifensatz` (`Reifensatz`),
  ADD CONSTRAINT `bestellung_ibfk_3` FOREIGN KEY (`Mitarbeiter`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `reifen2`
--
ALTER TABLE `reifen2`
  ADD CONSTRAINT `reifen2_ibfk_1` FOREIGN KEY (`Reifensatz`) REFERENCES `reifensatz` (`Reifensatz`);

--
-- Constraints der Tabelle `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`WeID`) REFERENCES `rennwochenende` (`WeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
