-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 30 mai 2023 à 07:58
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
  `id_Menu` int NOT NULL,
  `Label` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Prix` float NOT NULL,
  `FK_Restaurant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `Menu`
--

INSERT INTO `Menu` (`id_Menu`, `Label`, `Prix`, `FK_Restaurant`) VALUES
(1, 'Menu Classique', 15.99, 1),
(2, 'Menu Deluxe', 12.99, 2),
(3, 'Menu Gourmet', 18.99, 3),
(4, 'Menu Végétarien', 14.99, 4),
(5, 'Menu Fruits de Mer', 17.99, 5),
(6, 'Menu Enfant', 8.99, 6),
(7, 'Menu Brunch', 11.99, 7),
(8, 'Menu Déjeuner', 9.99, 8),
(9, 'Menu Dîner', 19.99, 9),
(10, 'Menu Spécial', 21.99, 10),
(11, 'Menu Végétalien', 13.99, 11),
(12, 'Menu Sans Gluten', 16.99, 12),
(13, 'Menu Familial', 25.99, 13),
(14, 'Menu Déjeuner d\'Affaires', 17.99, 14),
(15, 'Menu Happy Hour', 7.99, 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id_Menu`),
  ADD KEY `FK_Restaurant` (`FK_Restaurant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id_Menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD CONSTRAINT `Menu_ibfk_1` FOREIGN KEY (`FK_Restaurant`) REFERENCES `restaurant` (`id_restaurant`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
