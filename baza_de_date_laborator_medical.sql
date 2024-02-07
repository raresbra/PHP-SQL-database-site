-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 01:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_de_date_laborator_medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `analize`
--

CREATE TABLE `analize` (
  `idanalize` int(10) NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `valoarenormala` varchar(50) NOT NULL,
  `pret` varchar(50) NOT NULL,
  `idcategorie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analize`
--

INSERT INTO `analize` (`idanalize`, `denumire`, `valoarenormala`, `pret`, `idcategorie`) VALUES
(7, 'Trombocite', '297', '63', 1),
(8, 'Limfocite', '30,8', '90', 1),
(9, 'Bilirubină', 'Negativ', '80', 3),
(10, 'PH', '5', '54', 3),
(11, 'TGO', '27', '35', 2),
(12, 'TGP', '42,3', '40', 2),
(13, 'Glucoză', 'Negativ', '67', 3),
(14, 'Nitriți', 'Negativ', '80', 3),
(15, 'Hematii', 'Negativ', '20', 3),
(16, 'Proteina C reactivă', '4', '150', 4),
(17, 'PSA', '0,250', '70', 4),
(18, 'TSH', '36', '56', 5),
(19, 'FT3', '35,2', '200', 5),
(20, 'Anti-tiroglobulină', '12,6', '125', 5);

-- --------------------------------------------------------

--
-- Table structure for table `analize_buletin`
--

CREATE TABLE `analize_buletin` (
  `ID Analize` int(10) NOT NULL,
  `ID Buletin` int(10) NOT NULL,
  `Rezultat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analize_buletin`
--

INSERT INTO `analize_buletin` (`ID Analize`, `ID Buletin`, `Rezultat`) VALUES
(7, 8, 'Rezultatul de 16,2 se încadrează în limite normale.'),
(10, 7, 'PH ul din urină este în limite normale, aciditatea fiind sub control.'),
(11, 2, 'Rezultatul de 4,5 este peste limita normală'),
(15, 3, 'Rezultatul de 21,2 este unul normal.');

-- --------------------------------------------------------

--
-- Table structure for table `buletin`
--

CREATE TABLE `buletin` (
  `IDB` int(10) NOT NULL,
  `idpacient` int(10) NOT NULL,
  `unitate` varchar(50) NOT NULL,
  `laborant` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buletin`
--

INSERT INTO `buletin` (`IDB`, `idpacient`, `unitate`, `laborant`) VALUES
(2, 2, 'Brasov', 3),
(3, 3, 'București', 8),
(4, 5, 'Cluj Napoca', 6),
(5, 4, 'Constanța', 10),
(6, 10, 'Brașov', 8),
(7, 6, 'Piatra Neamț', 5),
(8, 9, 'Timișoara', 4),
(9, 9, 'Argeș', 7),
(13, 12, 'Alexandria', 10),
(14, 12, 'Alexandria', 5),
(15, 12, 'Alexandria', 5),
(16, 12, 'Alexandria', 5),
(17, 12, 'Alexandria', 5),
(18, 12, 'Alexandria', 10);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_analize`
--

CREATE TABLE `categorie_analize` (
  `ID Categorie` int(10) NOT NULL,
  `Denumire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie_analize`
--

INSERT INTO `categorie_analize` (`ID Categorie`, `Denumire`) VALUES
(1, 'Hematologie'),
(2, 'Biochimie'),
(3, 'Urină'),
(4, 'Imunologie'),
(5, 'Glandă tiroidă');

-- --------------------------------------------------------

--
-- Table structure for table `laborant`
--

CREATE TABLE `laborant` (
  `idlaborant` int(10) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laborant`
--

INSERT INTO `laborant` (`idlaborant`, `nume`, `prenume`) VALUES
(3, 'Popescu', 'Andreea'),
(4, 'Visanescu', 'Emilian'),
(5, 'Ionescu', 'Vlad'),
(6, 'Pavelescu', 'Maria'),
(7, 'Rădoi', 'Amalia'),
(8, 'Mircea', 'Radu'),
(9, 'Sandu', 'Vlad'),
(10, 'Dragomir', 'Alexandru'),
(11, 'Sandu', 'Ciorba');

-- --------------------------------------------------------

--
-- Table structure for table `pacient`
--

CREATE TABLE `pacient` (
  `idp` int(10) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `cnp` char(13) NOT NULL,
  `sex` char(1) NOT NULL DEFAULT 'F',
  `nrtelefon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacient`
--

INSERT INTO `pacient` (`idp`, `nume`, `prenume`, `cnp`, `sex`, `nrtelefon`) VALUES
(1, 'Paun', 'Andra', '6021121340472', 'F', '0763899694'),
(2, 'Braga ', 'Rareș', '5020812347586', 'M', '0763466273'),
(3, 'Glință', 'Despina', '6020614876354', 'F', '0787366452'),
(4, 'Mihai', 'Bianca', '6045683578234', 'F', '0763466253'),
(5, 'Popa', 'Valentin', '5084563246387', 'M', '0764899372'),
(6, 'Mircea', 'Ileana', '0674865782349', 'F', '0756400932'),
(7, 'Paun', 'Erika', '0611032457382', 'F', '0764988374'),
(8, 'Gabriel', 'Matei', '0548345812343', 'M', '0753622784'),
(9, 'Gaciu', 'Kevin', '0578364478376', 'M', '0764733463'),
(10, 'vasile', 'vas', '5456325463256', 'F', '0764534534532'),
(11, 'Vasilica', 'Maria', '4569784364214', 'F', '0798543648'),
(12, 'Vasilica ', 'Andrei', '1234567891012', 'M', '');

-- --------------------------------------------------------

--
-- Table structure for table `pacient_laborant`
--

CREATE TABLE `pacient_laborant` (
  `ID Pacient` int(10) NOT NULL,
  `ID Laborant` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacient_laborant`
--

INSERT INTO `pacient_laborant` (`ID Pacient`, `ID Laborant`) VALUES
(1, 3),
(2, 4),
(3, 8),
(4, 1),
(5, 6),
(6, 10),
(7, 6),
(8, 7),
(9, 9),
(10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analize`
--
ALTER TABLE `analize`
  ADD PRIMARY KEY (`idanalize`),
  ADD KEY `ID Categorie` (`idcategorie`);

--
-- Indexes for table `analize_buletin`
--
ALTER TABLE `analize_buletin`
  ADD PRIMARY KEY (`ID Analize`,`ID Buletin`),
  ADD KEY `analize_buletin_ibfk_2` (`ID Buletin`);

--
-- Indexes for table `buletin`
--
ALTER TABLE `buletin`
  ADD PRIMARY KEY (`IDB`),
  ADD KEY `ID Pacient` (`idpacient`),
  ADD KEY `ID Laborant` (`laborant`);

--
-- Indexes for table `categorie_analize`
--
ALTER TABLE `categorie_analize`
  ADD PRIMARY KEY (`ID Categorie`);

--
-- Indexes for table `laborant`
--
ALTER TABLE `laborant`
  ADD PRIMARY KEY (`idlaborant`);

--
-- Indexes for table `pacient`
--
ALTER TABLE `pacient`
  ADD PRIMARY KEY (`idp`),
  ADD UNIQUE KEY `CNP` (`cnp`);

--
-- Indexes for table `pacient_laborant`
--
ALTER TABLE `pacient_laborant`
  ADD PRIMARY KEY (`ID Pacient`,`ID Laborant`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analize`
--
ALTER TABLE `analize`
  MODIFY `idanalize` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `buletin`
--
ALTER TABLE `buletin`
  MODIFY `IDB` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorie_analize`
--
ALTER TABLE `categorie_analize`
  MODIFY `ID Categorie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laborant`
--
ALTER TABLE `laborant`
  MODIFY `idlaborant` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pacient`
--
ALTER TABLE `pacient`
  MODIFY `idp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analize`
--
ALTER TABLE `analize`
  ADD CONSTRAINT `analize_ibfk_1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie_analize` (`ID Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `analize_buletin`
--
ALTER TABLE `analize_buletin`
  ADD CONSTRAINT `analize_buletin_ibfk_1` FOREIGN KEY (`ID Analize`) REFERENCES `analize` (`Idanalize`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analize_buletin_ibfk_2` FOREIGN KEY (`ID Buletin`) REFERENCES `buletin` (`IDB`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buletin`
--
ALTER TABLE `buletin`
  ADD CONSTRAINT `buletin_ibfk_1` FOREIGN KEY (`idpacient`) REFERENCES `pacient` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buletin_ibfk_2` FOREIGN KEY (`laborant`) REFERENCES `laborant` (`idlaborant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
