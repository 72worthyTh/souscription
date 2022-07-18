-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2022 at 05:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `souscription`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` int(11) NOT NULL,
  `nom_cl` varchar(30) NOT NULL,
  `prenom_cl` varchar(30) NOT NULL,
  `telephone_cl` varchar(16) NOT NULL,
  `CNI` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id_client`, `nom_cl`, `prenom_cl`, `telephone_cl`, `CNI`, `adresse`, `sexe`, `email`, `date_naissance`) VALUES
(3, 'NDAYIRAGIJE', 'Thierry', '71950254', '415263', 'BUJUMBURA , BWIZA  6 AV NO 74', 'masc', 'thierryndaje@gmail.com', '2022-06-08'),
(4, 'NIBIGIRA', 'Arthemon', '719520254', '3222', 'BUJUMBURA , BWIZA  6 AV NO 74', 'F', 'tninarte@gmail.com', '1989-06-08'),
(5, 'AMUR', 'Kabi', '71950258', '415263', 'BUJUMBURA , BWIZA  6 AV NO 74', 'F', 'amur@gmail.com', '1995-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe`
--

CREATE TABLE `tbl_employe` (
  `id_employe` int(11) NOT NULL,
  `nom_emp` varchar(40) NOT NULL,
  `prenom_emp` varchar(40) NOT NULL,
  `telephone_emp` varchar(40) NOT NULL,
  `adresse_emp` varchar(40) NOT NULL,
  `cni` varchar(40) NOT NULL,
  `email_emp` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employe`
--

INSERT INTO `tbl_employe` (`id_employe`, `nom_emp`, `prenom_emp`, `telephone_emp`, `adresse_emp`, `cni`, `email_emp`, `date_naissance`, `sexe`) VALUES
(1, 'NDAYIRAGIJEhhhh', 'Thierry', '71950254', 'BUJUMBURA , BWIZA  6 AV NO 74', '4521021254', 'thierryndaje@gmail.com', '1993-07-14', 'Masculin'),
(2, 'Nimbona', 'Alex', '54856254', 'BUJa ROHERO', '142578/652', 'Nimbona@gm.col', '2022-07-18', 'Masculin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_souscription`
--

CREATE TABLE `tbl_souscription` (
  `id_souscription` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `periode` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_souscription`
--

INSERT INTO `tbl_souscription` (`id_souscription`, `id_vehicule`, `id_client`, `date`, `montant`, `periode`, `etat`) VALUES
(1, 7, 5, '2022-06-08', 120000, 15, 1),
(2, 2, 3, '2022-07-14', 70000, 12, 1),
(3, 3, 5, '2022-07-22', 1200000, 20, 1),
(4, 4, 3, '2022-07-14', 120000, 12, 1),
(5, 2, 4, '2022-07-18', 120000, 14, 1),
(6, 7, 4, '2022-07-13', 120000, 12, 1),
(7, 4, 4, '2022-07-14', 120000, 14, 0),
(8, 5, 4, '2022-07-15', 120000, 14, 0),
(10, 3, 5, '2022-07-18', 200000, 6, 1),
(11, 1, 3, '2022-07-18', 120000, 12, 1),
(12, 3, 5, '2022-07-18', 200000, 5, 0),
(13, 8, 5, '2022-07-18', 200000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utilisateur`
--

CREATE TABLE `tbl_utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `id_employe` int(11) NOT NULL,
  `connected` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_utilisateur`
--

INSERT INTO `tbl_utilisateur` (`id_utilisateur`, `login`, `password`, `role`, `id_employe`, `connected`) VALUES
(1, 'thierryndaje@gmail.com', '3f088ebeda03513be71d34d214291986', '1', 1, 0),
(2, 'nimbo', '827ccb0eea8a706c4c34a16891f84e7b', '0', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicule`
--

CREATE TABLE `tbl_vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `plaque_veh` varchar(60) NOT NULL,
  `marque_veh` varchar(30) NOT NULL,
  `chassis` varchar(30) NOT NULL,
  `modele_veh` varchar(30) NOT NULL,
  `nomero_moteur` varchar(30) NOT NULL,
  `date_fabrication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vehicule`
--

INSERT INTO `tbl_vehicule` (`id_vehicule`, `plaque_veh`, `marque_veh`, `chassis`, `modele_veh`, `nomero_moteur`, `date_fabrication`) VALUES
(1, '1254A', 'komp', '1425', 'boom', '14522222222222', '2022-06-07'),
(2, '45456465', 'jhgcgjsch', 'kjhcgvg', '122', '125', '2022-06-07'),
(3, 'HGR', 'cvjjg', 'jhchvg', '1452', '1452', '2022-06-07'),
(4, 'A4587B', 'MERCEDES', '12545', 'KIA', '254', '2020-06-08'),
(5, 'YX1254L', 'TOTat', '14522', 'grabys', 'boom', '2022-06-08'),
(7, 'D215G', 'MERC', '4787979', 'SANTOFE', 'MT-12548', '2019-06-08'),
(8, 'A1254J', 'Toyata', '125478455', 'kia', 'A1245555', '2022-07-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  ADD PRIMARY KEY (`id_employe`);

--
-- Indexes for table `tbl_souscription`
--
ALTER TABLE `tbl_souscription`
  ADD PRIMARY KEY (`id_souscription`);

--
-- Indexes for table `tbl_utilisateur`
--
ALTER TABLE `tbl_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Indexes for table `tbl_vehicule`
--
ALTER TABLE `tbl_vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD UNIQUE KEY `plaque_veh` (`plaque_veh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_souscription`
--
ALTER TABLE `tbl_souscription`
  MODIFY `id_souscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_utilisateur`
--
ALTER TABLE `tbl_utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vehicule`
--
ALTER TABLE `tbl_vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
