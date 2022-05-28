-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 27, 2022 alle 09:12
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_viaggia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `mete`
--

CREATE TABLE `mete` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `content` text DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mete`
--

INSERT INTO `mete` (`id`, `destination`, `img`, `price`, `days`, `content`) VALUES
(1, 'Venezia', 'images/Venezia.jpg', 750, 5, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Marco Polo - Venezia\nAlloggio in pensione completa 3 stelle\nVisita Palazzo Ducale\nVisita Basilica di San Marco (solo ingresso)\nVisita Scala Contarini del Bovolo\nVenezia Pass (10 chiese a vostra scelta)\nGiro in gondola tipica 30 minuti'),
(2, 'Roma', 'images/Roma.jpg', 640, 4, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Fiumicino - Roma\nAlloggio in pensione completa 4 stelle\nVisita Colosseo\nVisita Altare della Patria (con ascensore panoramico)\nVisita Cupolone Basilica di San Pietro\nPranzo tipico Trastevere'),
(3, 'Firenze', 'images/Firenze.jpg', 500, 3, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Pisa - Firenze\nAlloggio in mezza pensione 4 stelle\nVisita Basilica di Santa Maria Novella\nVisita Museo Uffizi\nVisita Cupola del Brunelleschi\nCena tipica con fiorentina 1,5Kg'),
(4, 'Milano', 'images/Milano.jpg', 600, 4, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Malpensa - Milano\nAlloggio in pensione completa 3 stelle\nVisita Duomo e Madonnina\nVisita Pinacoteca di Brera (Ultima Cena)\nVisita Teatro la Scala\nCena tipica con risotto allo zafferano e osso buco');

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `utente` varchar(255) DEFAULT NULL,
  `meta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id`, `utente`, `meta`) VALUES
(106, 'FraMar', 'CATANIA'),
(105, 'FraMar', 'LONDON'),
(82, 'Saretto', 'ABU DHABI'),
(83, 'Saretto', 'DUBAI'),
(81, 'Saretto', 'LONDON');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Nome`, `Cognome`, `Username`, `Password`) VALUES
('Andrea', 'Maugeri', 'Andrea', 'Secret12345'),
('Francesco', 'Marotta', 'FraMar', 'CiccioMar00'),
('Saro', 'Musumeci', 'Saretto', '12345SSS'),
('Simone', 'Maravigna', 'Simone02', 'Saretto57!');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mete`
--
ALTER TABLE `mete`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utente` (`utente`,`meta`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mete`
--
ALTER TABLE `mete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=107;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  ADD CONSTRAINT `preferiti_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utenti` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
