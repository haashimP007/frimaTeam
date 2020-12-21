-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2020 at 12:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frima`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `No_Client` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`No_Client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`No_Client`, `Nom`) VALUES
(1, 'Winners Port Louis'),
(2, 'Jumbo Riche-Terre');

-- --------------------------------------------------------

--
-- Table structure for table `interventions`
--

DROP TABLE IF EXISTS `interventions`;
CREATE TABLE IF NOT EXISTS `interventions` (
  `No_BI` int(11) NOT NULL AUTO_INCREMENT,
  `TechnicienAjoutes` varchar(20) NOT NULL,
  `HeureDebut` date NOT NULL,
  `HeureFin` date NOT NULL,
  `TravauxExe` text NOT NULL,
  `CodeMeubles` varchar(30) NOT NULL,
  `Commentaires` text NOT NULL,
  `Pieces` varchar(50) NOT NULL,
  `No_Tech` int(11) NOT NULL,
  `No_Client` int(11) NOT NULL,
  PRIMARY KEY (`No_BI`),
  KEY `Interventions_Techniciens_FK` (`No_Tech`),
  KEY `Interventions_Clients0_FK` (`No_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `observationsclients`
--

DROP TABLE IF EXISTS `observationsclients`;
CREATE TABLE IF NOT EXISTS `observationsclients` (
  `No_ObClients` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_signataire` varchar(80) NOT NULL,
  `Signature` varchar(80) NOT NULL,
  `No_Client` int(11) NOT NULL,
  PRIMARY KEY (`No_ObClients`),
  KEY `ObservationsClients_Clients_FK` (`No_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `techniciens`
--

DROP TABLE IF EXISTS `techniciens`;
CREATE TABLE IF NOT EXISTS `techniciens` (
  `No_Tech` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`No_Tech`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techniciens`
--

INSERT INTO `techniciens` (`No_Tech`, `Nom`, `Libelle`, `UserName`, `mdp`) VALUES
(1, 'Paul', 'Responsable Technicien', 'Paul', '1234'),
(2, 'James', 'Manoeuvre', 'James', '321'),
(3, 'Pierre', 'Manoeuvre', 'James', '3210');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interventions`
--
ALTER TABLE `interventions`
  ADD CONSTRAINT `Interventions_Clients0_FK` FOREIGN KEY (`No_Client`) REFERENCES `clients` (`No_Client`),
  ADD CONSTRAINT `Interventions_Techniciens_FK` FOREIGN KEY (`No_Tech`) REFERENCES `techniciens` (`No_Tech`);

--
-- Constraints for table `observationsclients`
--
ALTER TABLE `observationsclients`
  ADD CONSTRAINT `ObservationsClients_Clients_FK` FOREIGN KEY (`No_Client`) REFERENCES `clients` (`No_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
