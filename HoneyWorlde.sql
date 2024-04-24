DROP DATABASE IF EXISTS honeyworlde;

CREATE DATABASE honeyworlde;

USE honeyworlde;

SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `HoneyWorlde`
--
-- --------------------------------------------------------
--
-- Struttura della tabella `prodotto`
--
CREATE TABLE `prodotto` (
  `Prodotto_ID` int(11) NOT NULL,
  `nomeProdotto` varchar(50) NOT NULL,
  `Prezzo` decimal(10, 0) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--
INSERT INTO
  `prodotto` (`Prodotto_ID`, `nomeProdotto`, `Prezzo`)
VALUES
  (12, 'Millefiori 500g', 6),
  (13, 'Millefiori 1000g', 12),
  (14, 'Acacia 500g', 6),
  (15, 'Acacia 1000g', 12),
  (16, 'Castagno 500g', 5),
  (17, 'Castagno 1000g', 10);

-- --------------------------------------------------------
--
-- Struttura della tabella `utente`
--
CREATE TABLE `utente` (
  `Utente_ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--
INSERT INTO
  `utente` (
    `Utente_ID`,
    `Nome`,
    `Cognome`,
    `Email`,
    `Password`,
    `Admin`
  )
VALUES
  (
    1,
    'Jacopo',
    'Ciuff',
    'admin@admin.it',
    '21232f297a57a5a743894a0e4a801fc3',
    1
  ),
  (
    2,
    'giovanni',
    'giorgio',
    'utente@giorgio.it',
    '098f6bcd4621d373cade4e832627b4f6',
    0
  ),
  (
    3,
    'utente',
    'test',
    'utente@admin.it',
    'b88d6b04a9dc38860301f6bdd81e5ccd',
    0
  );

-- -----------------------------------------------------------------------------------
--
-- struttura per la tabella 'ordine'
--
CREATE TABLE `ordine` (
  `Ordine_ID` int(20) NOT NULL,
  `Totale` float(20) NOT NULL,
  `Pagato` tinyint(1) NOT NULL,
  `Data` varchar(50) NOT NULL,
  `Indirizzo` varchar(200) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL
  
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ordine`
--
INSERT INTO
  `ordine` (
    `Ordine_ID`,
    `Totale`,
    `Pagato`,
    `Data`,
    `Indirizzo`,
    `Nome`,
    `Cognome`
  )
VALUES
  (1, 68, 1, '2024-03-22', 'via mare 12', 'utente', 'test'),
  (2, 12, 1, '2024-01-22', 'via mare 12', 'utente', 'test'),
  (3, 66, 1, '2024-02-22', 'via monti 12', 'giovanni', 'giorgio');

--
-- STRUTTURA TABELLA 'ITEM'
--
CREATE TABLE `item` (
  `Item_ID` int(20) NOT NULL,
  `Prodotto` varchar(50) NOT NULL,
  `Quantita` int(6) NOT NULL,
  `Ordine_ID` int(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--
--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE
  `prodotto`
ADD
  PRIMARY KEY (`Prodotto_ID`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE
  `utente`
ADD
  PRIMARY KEY (`Utente_ID`);

--
-- Indici per le tabelle `Ordine`
--
ALTER TABLE
  `ordine`
ADD
  PRIMARY KEY (`Ordine_ID`);

--
-- Indici per le tabelle `Item`
--
ALTER TABLE
  `item`
ADD
  PRIMARY KEY (`Item_ID`),
ADD
  KEY `Ordine_ID` (`Ordine_ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--
--
-- AUTO_INCREMENT per la tabella `item`
--
ALTER TABLE
  `item`
MODIFY
  `Item_ID` int(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT per la tabella `Ordine`
--
ALTER TABLE
  `ordine`
MODIFY
  `Ordine_ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT per la tabella `Prodotto`
--
ALTER TABLE
  `prodotto`
MODIFY
  `Prodotto_ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 18;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE
  `utente`
MODIFY
  `Utente_ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- Limiti per le tabelle scaricate
--
--
-- Limiti per la tabella `Item`
--
ALTER TABLE
  `item`
ADD
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Ordine_ID`) REFERENCES `ordine` (`Ordine_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

COMMIT;