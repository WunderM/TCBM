-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Sep 2020 um 10:15
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tcbm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `courttyp`
--

CREATE TABLE `courttyp` (
  `courttyp_id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `courttyp`
--

INSERT INTO `courttyp` (`courttyp_id`, `designation`) VALUES
(1, 'Sandplatz'),
(2, 'Rasen'),
(3, 'Turnhallenbelag'),
(4, 'Teppichboden');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timespan_id` int(11) NOT NULL,
  `tenniscourt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tenniscourt`
--

CREATE TABLE `tenniscourt` (
  `tenniscourt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courttyp_id` int(11) DEFAULT NULL,
  `tournament_court` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tenniscourt`
--

INSERT INTO `tenniscourt` (`tenniscourt_id`, `name`, `courttyp_id`, `tournament_court`) VALUES
(1, 'Platz 1', 1, 1),
(2, 'Platz 2 ', 1, 1),
(3, 'Sporthalle', 3, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `timespan`
--

CREATE TABLE `timespan` (
  `timespan_id` int(11) NOT NULL,
  `timefrom` time DEFAULT NULL,
  `timeuntil` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `timespan`
--

INSERT INTO `timespan` (`timespan_id`, `timefrom`, `timeuntil`) VALUES
(1, '08:00:00', '09:00:00'),
(2, '09:00:00', '10:00:00'),
(3, '10:00:00', '11:00:00'),
(4, '11:00:00', '12:00:00'),
(5, '13:00:00', '14:00:00'),
(6, '15:00:00', '16:00:00'),
(7, '17:00:00', '18:00:00'),
(8, '19:00:00', '20:00:00'),
(9, '20:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `courttyp`
--
ALTER TABLE `courttyp`
  ADD PRIMARY KEY (`courttyp_id`);

--
-- Indizes für die Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `timespan_reservation` (`timespan_id`),
  ADD KEY `tenniscourt_reservation` (`tenniscourt_id`),
  ADD KEY `user_reservation` (`user_id`);

--
-- Indizes für die Tabelle `tenniscourt`
--
ALTER TABLE `tenniscourt`
  ADD PRIMARY KEY (`tenniscourt_id`),
  ADD KEY `courttyp_tenniscourt` (`courttyp_id`);

--
-- Indizes für die Tabelle `timespan`
--
ALTER TABLE `timespan`
  ADD PRIMARY KEY (`timespan_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `courttyp`
--
ALTER TABLE `courttyp`
  MODIFY `courttyp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tenniscourt`
--
ALTER TABLE `tenniscourt`
  MODIFY `tenniscourt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `timespan`
--
ALTER TABLE `timespan`
  MODIFY `timespan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `tenniscourt_reservation` FOREIGN KEY (`tenniscourt_id`) REFERENCES `tenniscourt` (`tenniscourt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timespan_reservation` FOREIGN KEY (`timespan_id`) REFERENCES `timespan` (`timespan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_reservation` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tenniscourt`
--
ALTER TABLE `tenniscourt`
  ADD CONSTRAINT `courttyp_tenniscourt` FOREIGN KEY (`courttyp_id`) REFERENCES `courttyp` (`courttyp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
