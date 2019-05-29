-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 mai 2019 à 16:14
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_petweight`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_pet`
--

CREATE TABLE `t_pet` (
  `idPet` int(11) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `petBirthDay` varchar(10) NOT NULL,
  `petDeath` date DEFAULT NULL,
  `petMicroChip` int(11) DEFAULT NULL,
  `petDesc` text,
  `petPicture` varchar(100) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idPetType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `t_pet`
--

INSERT INTO `t_pet` (`idPet`, `petName`, `petBirthDay`, `petDeath`, `petMicroChip`, `petDesc`, `petPicture`, `idUser`, `idPetType`) VALUES
(1, 'Rex', '2018-04-01', NULL, 1234567, '', 'Garfield.jpg', 1, 1),
(2, 'Garfield', '2018-03-05', NULL, NULL, '', 'Garfield.jpg', 1, 2),
(3, 'Rox', '2017-05-05', NULL, NULL, '', 'rox.jpg', 1, 1),
(4, 'Grumpy', '2012-04-04', '2019-05-14', NULL, 'Super Grumpy Cat', 'grumpy_cat.jpg', 3, 2),
(16, 'Daisy', '2014-06-10', '2014-06-11', 71415, '', 'daisy.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_typepet`
--

CREATE TABLE `t_typepet` (
  `idPetType` int(11) NOT NULL,
  `typName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_typepet`
--

INSERT INTO `t_typepet` (`idPetType`, `typName`) VALUES
(1, 'Chien'),
(2, 'Chat');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useFirstName` varchar(50) NOT NULL,
  `useLastName` varchar(50) NOT NULL,
  `useEmail` varchar(255) NOT NULL,
  `usePassword` varchar(255) NOT NULL,
  `useHideDeath` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useFirstName`, `useLastName`, `useEmail`, `usePassword`, `useHideDeath`) VALUES
(1, 'Samuel', 'Dadié', 'samuel.dadie@gmail.com', '$2y$10$AMNBaYhtco73AQWrA4z9WeW61fRrRKwGBeTtyOx2ZRzwRReCBk8.i', 0),
(3, 'premier', 'testeur', 'premier.testeur@gmail.com', '$2y$10$IOOfdBEDcjSaMXHAk5Np4O.JdmwMtj4Rq6KiqxI71qowWedQ./0U.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_weightpet`
--

CREATE TABLE `t_weightpet` (
  `idPetWeight` int(11) NOT NULL,
  `weiWeight` float NOT NULL,
  `weiDate` date NOT NULL,
  `idPet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_weightpet`
--

INSERT INTO `t_weightpet` (`idPetWeight`, `weiWeight`, `weiDate`, `idPet`) VALUES
(1, 8, '2018-06-21', 1),
(2, 9, '2018-07-21', 1),
(3, 7, '2018-08-21', 1),
(4, 9, '2018-04-28', 2),
(5, 2.5, '2019-05-06', 3),
(6, 12, '2019-05-14', 2),
(7, 16.5, '2019-06-14', 2),
(8, 20, '2019-07-12', 2),
(9, 26, '2019-08-14', 2),
(10, 10, '2019-09-14', 2),
(11, 6.3, '2019-05-18', 2),
(12, 7.9, '2019-05-29', 3),
(13, 0, '2019-05-30', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_pet`
--
ALTER TABLE `t_pet`
  ADD PRIMARY KEY (`idPet`),
  ADD KEY `t_pet_t_user_FK` (`idUser`),
  ADD KEY `t_pet_t_typePet0_FK` (`idPetType`);

--
-- Index pour la table `t_typepet`
--
ALTER TABLE `t_typepet`
  ADD PRIMARY KEY (`idPetType`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `t_weightpet`
--
ALTER TABLE `t_weightpet`
  ADD PRIMARY KEY (`idPetWeight`),
  ADD KEY `t_WeightPet_t_pet_FK` (`idPet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_pet`
--
ALTER TABLE `t_pet`
  MODIFY `idPet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `t_typepet`
--
ALTER TABLE `t_typepet`
  MODIFY `idPetType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_weightpet`
--
ALTER TABLE `t_weightpet`
  MODIFY `idPetWeight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_pet`
--
ALTER TABLE `t_pet`
  ADD CONSTRAINT `t_pet_t_typePet0_FK` FOREIGN KEY (`idPetType`) REFERENCES `t_typepet` (`idPetType`),
  ADD CONSTRAINT `t_pet_t_user_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_weightpet`
--
ALTER TABLE `t_weightpet`
  ADD CONSTRAINT `t_WeightPet_t_pet_FK` FOREIGN KEY (`idPet`) REFERENCES `t_pet` (`idPet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
