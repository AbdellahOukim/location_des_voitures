-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 jan. 2023 à 17:52
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `Intitulé_Cat` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `Num_Passeport` varchar(255) DEFAULT NULL,
  `Num_Permi_de_conduite` varchar(255) DEFAULT NULL,
  `date_validite` date DEFAULT NULL,
  `id_ville` int(11) DEFAULT NULL,
  `Login` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_client`),
  KEY `id_ville` (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_client`, `nom`, `prenom`, `email`, `tel`, `Num_Passeport`, `Num_Permi_de_conduite`, `date_validite`, `id_ville`, `Login`, `Mot_de_passe`) VALUES
(1, 'oukim', 'abdellah', 'abdo.oukim@gmail.com', '0653063013', 'CF12002', 'JM20000', '2023-01-27', 10, 'abdo.oukim@gmail.com', '12345'),
(4, 'Ahmed', 'Mohammed', 'ahmed@gmail.com', '0655056788', '', 'JM30000', '2024-05-20', 14, 'ahmed@gmail.com', '123456'),
(5, 'oukim', 'younnes', 'younnes@gmail.com', '0644553322', 'CF1200', 'JM33400', '2025-06-30', 11, 'younnes@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `compagnie_assurance`
--

DROP TABLE IF EXISTS `compagnie_assurance`;
CREATE TABLE IF NOT EXISTS `compagnie_assurance` (
  `Id_compagnie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_comp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `Nom_contact` varchar(50) DEFAULT NULL,
  `Prenom_Contact` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ID_ville` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_compagnie`),
  KEY `ID_ville` (`ID_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `id_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `ID_client` int(11) DEFAULT NULL,
  `DateDébut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `Id_véhicule` int(11) DEFAULT NULL,
  `Klm_Départ` int(11) DEFAULT NULL,
  `KlmRetour` int(11) DEFAULT NULL,
  `Autre_Indemnités` text,
  `id_reservation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contrat`),
  KEY `ID_client` (`ID_client`),
  KEY `Id_véhicule` (`Id_véhicule`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat_assurance`
--

DROP TABLE IF EXISTS `contrat_assurance`;
CREATE TABLE IF NOT EXISTS `contrat_assurance` (
  `Id_Contart` int(11) NOT NULL AUTO_INCREMENT,
  `Id_compagnie` int(11) DEFAULT NULL,
  `Id_véhicule` int(11) DEFAULT NULL,
  `date_début_assurance` date DEFAULT NULL,
  `Date_fin_assurance` date DEFAULT NULL,
  `Monant_assurance` float DEFAULT NULL,
  PRIMARY KEY (`Id_Contart`),
  KEY `Id_compagnie` (`Id_compagnie`),
  KEY `Id_véhicule` (`Id_véhicule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_res`
--

DROP TABLE IF EXISTS `etat_res`;
CREATE TABLE IF NOT EXISTS `etat_res` (
  `Id_EtatRes` int(11) NOT NULL AUTO_INCREMENT,
  `Intitule_EtatRes` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id_EtatRes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat_res`
--

INSERT INTO `etat_res` (`Id_EtatRes`, `Intitule_EtatRes`) VALUES
(1, 'en cours'),
(2, 'success'),
(3, 'échoué');

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `ID_garage` int(11) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(40) DEFAULT NULL,
  `NomResponsable` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ID_ville` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_garage`),
  KEY `ID_ville` (`ID_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `Id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `Intitule_Marque` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`Id_marque`, `Intitule_Marque`) VALUES
(1, 'Dacia logan'),
(2, 'Renault'),
(3, 'Abarth'),
(4, 'Range rover'),
(5, 'Audi');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `IdModèle` int(11) NOT NULL AUTO_INCREMENT,
  `Intitulé_Mod` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`IdModèle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `ID_Pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Pays` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID_Pays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`ID_Pays`, `nom_Pays`) VALUES
(1, 'maroc');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `ID_client` int(11) DEFAULT NULL,
  `Id_vehicule` int(11) DEFAULT NULL,
  `date_Reservation` date DEFAULT NULL,
  `DateDebutR` date DEFAULT NULL,
  `DateFinR` date DEFAULT NULL,
  `PrixParJour` float DEFAULT NULL,
  `remarque` text,
  `Id_EtatRes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `ID_client` (`ID_client`),
  KEY `Id_EtatRes` (`Id_EtatRes`),
  KEY `Id_vehicule` (`Id_vehicule`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `ID_client`, `Id_vehicule`, `date_Reservation`, `DateDebutR`, `DateFinR`, `PrixParJour`, `remarque`, `Id_EtatRes`) VALUES
(20, 1, 2, '2023-01-30', '2023-02-02', '2023-02-16', 250, NULL, 2),
(21, 1, 5, '2023-01-30', '2023-02-10', '2023-02-12', 1300, NULL, 2),
(22, 4, 4, '2023-01-30', '2023-02-01', '2023-02-03', 700, NULL, 1),
(23, 1, 8, '2023-01-30', '2023-01-31', '2023-02-01', 350, NULL, 1),
(24, 5, 8, '2023-01-30', '2023-01-30', '2023-02-01', 350, NULL, 1),
(25, 5, 7, '2023-01-30', '2023-02-02', '2023-03-03', 300, NULL, 1),
(26, 1, 4, '2023-01-30', '2023-02-02', '2023-02-05', 700, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `réparation`
--

DROP TABLE IF EXISTS `réparation`;
CREATE TABLE IF NOT EXISTS `réparation` (
  `ID_rep` int(11) NOT NULL AUTO_INCREMENT,
  `Date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `Montant_Rep` float DEFAULT NULL,
  `Remarque` text,
  `Id_véhicule` int(11) DEFAULT NULL,
  `ID_garage` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_rep`),
  KEY `Id_véhicule` (`Id_véhicule`),
  KEY `ID_garage` (`ID_garage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typemoteur`
--

DROP TABLE IF EXISTS `typemoteur`;
CREATE TABLE IF NOT EXISTS `typemoteur` (
  `Id_TypeMoteur` int(11) NOT NULL AUTO_INCREMENT,
  `Intitule_TypeMoteur` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id_TypeMoteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typemoteur`
--

INSERT INTO `typemoteur` (`Id_TypeMoteur`, `Intitule_TypeMoteur`) VALUES
(1, 'Escence'),
(2, 'Gasiol'),
(3, 'Hybrid');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `Id_Type_user` int(11) NOT NULL AUTO_INCREMENT,
  `Intitulé_TypeUser` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id_Type_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`Id_Type_user`, `Intitulé_TypeUser`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_user` varchar(40) DEFAULT NULL,
  `Prenom_user` varchar(50) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(50) DEFAULT NULL,
  `Id_Type_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `Id_Type_user` (`Id_Type_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_user`, `Nom_user`, `Prenom_user`, `tel`, `email`, `login`, `Mot_de_passe`, `Id_Type_user`) VALUES
(1, 'oukim', 'abdellah', '0653063013', 'abdo.oukim@gmail.com', 'abdo.oukim@gmail.com', '12345', 2),
(4, 'Ahmed', 'Mohammed', '0655056788', 'ahmed@gmail.com', 'ahmed@gmail.com', '123456', 2),
(5, 'oukim', 'younnes', '0644553322', 'younnes@gmail.com', 'younnes@gmail.com', '12345', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `ID_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(40) DEFAULT NULL,
  `Id_pays` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ville`),
  KEY `Id_pays` (`Id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ID_ville`, `nom_ville`, `Id_pays`) VALUES
(3, 'agadir', 1),
(4, 'casablanca', 1),
(5, 'tanger', 1),
(6, 'rabat', 1),
(7, 'fes', 1),
(8, 'marrakech', 1),
(9, 'ouarzazate', 1),
(10, 'meknes', 1),
(11, 'essaouira', 1),
(12, 'beni mellal', 1),
(13, 'taounat', 1),
(14, 'el dakhla', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `Id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `Immatriculation` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Id_marque` int(11) DEFAULT NULL,
  `Id_cat` int(11) DEFAULT NULL,
  `IdModèle` int(11) DEFAULT NULL,
  `Id_TypeMoteur` int(11) DEFAULT NULL,
  `annee_achat` year(4) DEFAULT NULL,
  `Prix_achat` float DEFAULT NULL,
  `Nbr_places` int(11) DEFAULT NULL,
  `Nbr_Portes` int(11) DEFAULT NULL,
  `Puissance_fiscale` int(11) DEFAULT NULL,
  `prix_parJour` float DEFAULT NULL,
  `prix_Promotion` float DEFAULT NULL,
  `en_promotion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_vehicule`),
  KEY `Id_marque` (`Id_marque`),
  KEY `Id_cat` (`Id_cat`),
  KEY `IdModèle` (`IdModèle`),
  KEY `Id_TypeMoteur` (`Id_TypeMoteur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`Id_vehicule`, `Immatriculation`, `image`, `Id_marque`, `Id_cat`, `IdModèle`, `Id_TypeMoteur`, `annee_achat`, `Prix_achat`, `Nbr_places`, `Nbr_Portes`, `Puissance_fiscale`, `prix_parJour`, `prix_Promotion`, `en_promotion`) VALUES
(1, 'A1 1337', 'car-1.jpg', 1, NULL, NULL, 2, 2022, 120000, 6, 5, 1200, 300, 0, 0),
(2, 'A12 2004', 'car-2', 1, NULL, NULL, 1, 2018, 120000, 5, 5, 1200, 250, 0, 0),
(3, 'B6 13455', 'car-3.jpg', 2, NULL, NULL, 1, 2021, 100000, 5, 5, 1200, 200, 0, 0),
(4, 'B13 2009', 'car-4', 3, NULL, NULL, 3, 2023, 200000, 2, 2, 900, 700, 0, 0),
(5, 'A1 22000', 'car-5.jpg', 4, NULL, NULL, 2, 2023, 900000, 5, 5, 2000, 1300, 0, 0),
(6, 'A1 1390', 'car-6.jpg', 2, NULL, NULL, 1, 2021, 90000, 5, 5, 1200, 250, 200, 1),
(7, 'A38 20100', 'car-7.jpg', 2, NULL, NULL, 2, 2023, 200000, 5, 5, 1200, 350, 300, 1),
(8, 'A1 2004', 'car-7.jpg', 5, NULL, NULL, 1, 2021, 200000, 5, 5, 2000, 350, 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`ID_ville`);

--
-- Contraintes pour la table `compagnie_assurance`
--
ALTER TABLE `compagnie_assurance`
  ADD CONSTRAINT `compagnie_assurance_ibfk_1` FOREIGN KEY (`ID_ville`) REFERENCES `ville` (`ID_ville`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID_client`),
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`Id_véhicule`) REFERENCES `voiture` (`Id_vehicule`),
  ADD CONSTRAINT `contrat_ibfk_3` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `contrat_assurance`
--
ALTER TABLE `contrat_assurance`
  ADD CONSTRAINT `contrat_assurance_ibfk_1` FOREIGN KEY (`Id_compagnie`) REFERENCES `compagnie_assurance` (`Id_compagnie`),
  ADD CONSTRAINT `contrat_assurance_ibfk_2` FOREIGN KEY (`Id_véhicule`) REFERENCES `voiture` (`Id_vehicule`);

--
-- Contraintes pour la table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`ID_ville`) REFERENCES `ville` (`ID_ville`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID_client`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Id_vehicule`) REFERENCES `voiture` (`Id_vehicule`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`Id_EtatRes`) REFERENCES `etat_res` (`Id_EtatRes`);

--
-- Contraintes pour la table `réparation`
--
ALTER TABLE `réparation`
  ADD CONSTRAINT `r@0pparation_ibfk_1` FOREIGN KEY (`Id_véhicule`) REFERENCES `voiture` (`Id_vehicule`),
  ADD CONSTRAINT `r@0pparation_ibfk_2` FOREIGN KEY (`ID_garage`) REFERENCES `garage` (`ID_garage`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`Id_Type_user`) REFERENCES `type_utilisateur` (`Id_Type_user`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`Id_pays`) REFERENCES `pays` (`ID_Pays`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `v@0phicule_ibfk_1` FOREIGN KEY (`Id_marque`) REFERENCES `marque` (`Id_marque`),
  ADD CONSTRAINT `v@0phicule_ibfk_2` FOREIGN KEY (`Id_cat`) REFERENCES `categorie` (`Id_cat`),
  ADD CONSTRAINT `v@0phicule_ibfk_3` FOREIGN KEY (`IdModèle`) REFERENCES `modele` (`IdModèle`),
  ADD CONSTRAINT `v@0phicule_ibfk_4` FOREIGN KEY (`Id_TypeMoteur`) REFERENCES `typemoteur` (`Id_TypeMoteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
