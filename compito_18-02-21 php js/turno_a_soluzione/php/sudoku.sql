-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 20, 2018 alle 16:57
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sudoku`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `riga`
--

CREATE TABLE `riga` (
  `id` int(255) NOT NULL,
  `numeri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `riga`
--

INSERT INTO `riga` (`id`, `numeri`) VALUES
(1, '1, 6, 0, 4, 2, 3,7, 5, 8'),
(2, '2, 4, 0, 5, 0, 0, 3, 1, 6'),
(3, '3, 7, 5, 0, 0, 6, 4, 9, 0'),
(4, '0, 0, 4, 3, 0, 0, 2, 0, 0'),
(5, '0, 0, 0, 7, 5, 0, 8, 0, 0'),
(6, '0, 0, 7, 0, 4, 0, 0, 3, 0'),
(7, '0, 0, 0, 0, 0, 5, 9, 0, 0'),
(8, '0, 0, 0, 2, 0, 4, 1, 0, 0'),
(9, '0, 0, 0, 1, 8, 0, 5, 0, 0');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `riga`
--
ALTER TABLE `riga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `riga`
--
ALTER TABLE `riga`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
