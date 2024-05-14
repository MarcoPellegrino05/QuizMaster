-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 14, 2024 alle 18:52
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domandedb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `DomandaID` int(11) NOT NULL,
  `TestoDomanda` text NOT NULL,
  `VeroFalso` enum('Vero','Falso') NOT NULL,
  `MateriaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `domande`
--

INSERT INTO `domande` (`DomandaID`, `TestoDomanda`, `VeroFalso`, `MateriaID`) VALUES
(1, 'Dante Alighieri è l\'autore della Divina Commedia.', 'Vero', 1),
(2, 'Shakespeare è l\'autore di I promessi sposi.', 'Falso', 1),
(3, 'La poesia epica è un genere letterario.', 'Vero', 1),
(4, 'Harry Potter è un personaggio della letteratura fantastica.', 'Vero', 1),
(5, 'HTML è un linguaggio di markup.', 'Vero', 2),
(6, 'JavaScript è un linguaggio di programmazione.', 'Vero', 2),
(7, 'SQL è utilizzato per interrogare database.', 'Vero', 2),
(8, 'La rete Internet è gestita da un singolo server centrale.', 'Falso', 2),
(9, 'La Prima Guerra Mondiale è iniziata nel 1914.', 'Vero', 3),
(10, 'L\'impero romano è stato fondato da Giulio Cesare.', 'Falso', 3),
(11, 'La Rivoluzione Russa ha portato alla creazione dell\'Unione Sovietica.', 'Vero', 3),
(12, 'Gli antichi egizi utilizzavano i geroglifici per scrivere.', 'Vero', 3),
(13, 'London is the capital of England.', 'Vero', 4),
(14, 'The Great Wall of China was built in the 15th century.', 'Falso', 4),
(15, 'Shakespeare wrote \"Romeo and Juliet.\"', 'Vero', 4),
(16, 'English is spoken by more than 1 billion people worldwide.', 'Vero', 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`DomandaID`),
  ADD KEY `MateriaID` (`MateriaID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `domande`
--
ALTER TABLE `domande`
  MODIFY `DomandaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `domande`
--
ALTER TABLE `domande`
  ADD CONSTRAINT `domande_ibfk_1` FOREIGN KEY (`MateriaID`) REFERENCES `materie` (`MateriaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
