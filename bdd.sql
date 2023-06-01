-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 01 juin 2023 à 21:08
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
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id_Commande` int NOT NULL,
  `FK_User` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Commande`
--

INSERT INTO `Commande` (`id_Commande`, `FK_User`, `date`) VALUES
(1, 'hugo@hugo.fr', '2023-05-29 21:02:22'),
(2, 'neko@miaou.fr', '2023-05-29 21:02:22'),
(3, 'wallerand@gmail.fr', '2023-05-29 21:02:22'),
(4, 'hugo@hugo.fr', '2023-05-29 21:02:22'),
(5, 'neko@miaou.fr', '2023-05-29 21:02:22'),
(6, 'wallerand@gmail.fr', '2023-05-29 21:02:22'),
(7, 'hugo@hugo.fr', '2023-05-29 21:02:22'),
(8, 'neko@miaou.fr', '2023-05-29 21:02:22'),
(9, 'wallerand@gmail.fr', '2023-05-29 21:02:22'),
(10, 'hugo@hugo.fr', '2023-05-29 21:02:22'),
(11, 'neko@miaou.fr', '2023-05-29 21:02:22'),
(12, 'wallerand@gmail.fr', '2023-05-29 21:02:22'),
(13, 'hugo@hugo.fr', '2023-05-29 21:02:22'),
(14, 'neko@miaou.fr', '2023-05-29 21:02:22'),
(15, 'wallerand@gmail.fr', '2023-05-29 21:02:22');

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
  `id_Menu` int NOT NULL,
  `Label` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prix` float NOT NULL,
  `FK_Restaurant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `Menu_Commande`
--

CREATE TABLE `Menu_Commande` (
  `FK_Commande` int NOT NULL,
  `FK_Menu` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Menu_Commande`
--

INSERT INTO `Menu_Commande` (`FK_Commande`, `FK_Menu`, `quantite`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(3, 5, 1),
(4, 6, 1),
(5, 7, 1),
(5, 8, 1),
(6, 9, 1),
(7, 10, 1),
(8, 11, 1),
(9, 12, 1),
(10, 13, 1),
(10, 14, 1),
(11, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
  `id_Produit` int NOT NULL,
  `Label` varchar(20) NOT NULL,
  `Prix` float NOT NULL,
  `FK_Restaurant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Produit`
--

INSERT INTO `Produit` (`id_Produit`, `Label`, `Prix`, `FK_Restaurant`) VALUES
(1, 'Steak Frites', 8.99, 1),
(2, 'Pizza Margherita', 6.99, 2),
(3, 'Filet de Saumon', 9.99, 3),
(4, 'Cheeseburger', 7.99, 4),
(5, 'Scampis Grillés', 10.99, 5),
(6, 'Nuggets de Poulet', 5.99, 6),
(7, 'Croissant', 2.99, 7),
(8, 'Salade César', 6.99, 8),
(9, 'Ravioli aux Homards', 12.99, 9),
(10, 'Assiette de Sushi', 14.99, 10),
(11, 'Burger Végétarien', 7.99, 11),
(12, 'Pâtes Sans Gluten', 9.99, 12),
(13, 'Pizza Familiale', 16.99, 13),
(14, 'Wrap au Poulet', 8.99, 14),
(15, 'Cocktail Mojito', 6.99, 15);

-- --------------------------------------------------------

--
-- Structure de la table `Produit_Commande`
--

CREATE TABLE `Produit_Commande` (
  `FK_Commande` int NOT NULL,
  `FK_Produit` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Produit_Commande`
--

INSERT INTO `Produit_Commande` (`FK_Commande`, `FK_Produit`, `quantite`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 3, 1),
(2, 4, 1),
(3, 5, 1),
(3, 6, 1),
(4, 7, 1),
(4, 8, 1),
(5, 9, 1),
(5, 10, 1),
(6, 11, 1),
(6, 12, 1),
(7, 13, 1),
(7, 14, 1),
(8, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Produit_Menu`
--

CREATE TABLE `Produit_Menu` (
  `Menu_id_Menu` int NOT NULL,
  `Produit_id_Produit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Produit_Menu`
--

INSERT INTO `Produit_Menu` (`Menu_id_Menu`, `Produit_id_Produit`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `note` int NOT NULL,
  `image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `nom`, `adresse`, `note`, `image`) VALUES
(1, 'Le Petit Bistro', '12 Rue de la Paix, Paris', 4, 'images/Le Petit Bistro.jpg'),
(2, 'Le Bistrot Parisien', '5 Rue du Faubourg Saint-Honoré, Paris', 4, 'images/Le Bistrot Parisien.jpg'),
(3, 'La Grande Brasserie', '10 Boulevard Montmartre, Paris', 5, 'images/La Grande Brasserie.jpg'),
(4, 'Le Café de Paris', '17 Avenue des Champs-Élysées, Paris', 4, 'images/Le Café de Paris.jpg'),
(5, 'Le Restaurant Français', '28 Rue du Louvre, Paris', 3, 'images/Le Restaurant Français.jpg'),
(6, 'La Brasserie du Coin', '25 Rue du Vieux Lyon, Lyon', 3, 'images/La Brasserie du Coin.jpg'),
(7, 'Le Café des Artistes', '7 Rue des Archers, Lyon', 4, 'images/Le Café des Artistes.jpg'),
(8, 'Le Petit Bouchon', '3 Rue de la Platière, Lyon', 3, 'images/Le Petit Bouchon.jpg'),
(9, 'Le Bouchon Lyonnais', '12 Rue du Boeuf, Lyon', 4, 'images/Le Bouchon Lyonnais.jpg'),
(10, 'La Belle Époque', '19 Rue Mercière, Lyon', 5, 'images/La Belle époque.jpg'),
(11, 'Au Bon Croissant', '8 Rue Paradis, Marseille', 4, 'images/Au Bon Croissant.jpg'),
(12, 'La Table Provençale', '17 Rue Montgrand, Marseille', 3, 'images/La Table Provençale.jpg'),
(13, 'Le Bistrot Marseillais', '11 Quai de Rive Neuve, Marseille', 5, 'images/Le Bistrot Marseillais.jpg'),
(14, 'Le Poisson d\'Or', '32 Rue Sainte, Marseille', 4, 'images/Le Poisson d\'Or.jpg'),
(15, 'Le Jardin de Provence', '55 Rue du Panier, Marseille', 4, 'images/Le Jardin de Provence.jpg'),
(16, 'Chez Pierre', '16 Avenue des Vignes, Bordeaux', 5, 'images/Chez Pierre.jpg'),
(17, 'Le Périgord Gourmand', '23 Quai de la Douane, Bordeaux', 4, NULL),
(18, 'Le Bouchon Bordelais', '6 Rue du Parlement Sainte-Catherine, Bordeaux', 4, NULL),
(19, 'Le Vin en Tête', '12 Rue Saint-James, Bordeaux', 3, NULL),
(20, 'La Brasserie Bordelaise', '27 Rue des Bahutiers, Bordeaux', 4, NULL),
(21, 'Le Jardin de Provence', '42 Rue de la Liberté, Nice', 4, NULL),
(22, 'Le Côte d\'Azur', '55 Promenade des Anglais, Nice', 4, NULL),
(23, 'Le Petit Nantais', '14 Rue de la Fosse, Nice', 5, NULL),
(24, 'La Petite Brasserie', '9 Rue de la Préfecture, Nice', 3, NULL),
(25, 'Le Café des Anges', '21 Rue Masséna, Nice', 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`email`, `name`, `address`, `password`) VALUES
('alex@alex.fr', 'Alex', NULL, '$2y$10$C3jBW74TuyB7ykAf8HS3xuJaQ4OILzljEHNTvftxFxJ6Oh/IxCw32'),
('hugo@hugo.fr', 'hugo', '27 avenue Verdier', '$2y$10$evlklQPi13XWZzhn4Jy7UO6AifGBKbyUlcVuWXMgSbUCpNqak6fDy'),
('neko@miaou.fr', 'neko', NULL, '$2y$10$.P7tyPlV0iCWyuncEHQkQuG35UvmsxK3zewedp/Tkvms5eN9Dc7YK'),
('wallerand@gmail.fr', 'Wallerand', NULL, '$2y$10$A8rJG9iKrRYM.zt3nsBg3Oe7brDO4u6hYfuvL65nkvrMo26z/qT6K');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_Commande`),
  ADD KEY `FK_User` (`FK_User`);

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id_Menu`),
  ADD KEY `FK_Restaurant` (`FK_Restaurant`);

--
-- Index pour la table `Menu_Commande`
--
ALTER TABLE `Menu_Commande`
  ADD PRIMARY KEY (`FK_Commande`,`FK_Menu`),
  ADD KEY `FK_Menu` (`FK_Menu`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`id_Produit`),
  ADD KEY `FK_Restaurant` (`FK_Restaurant`);

--
-- Index pour la table `Produit_Commande`
--
ALTER TABLE `Produit_Commande`
  ADD PRIMARY KEY (`FK_Commande`,`FK_Produit`),
  ADD KEY `FK_Produit` (`FK_Produit`);

--
-- Index pour la table `Produit_Menu`
--
ALTER TABLE `Produit_Menu`
  ADD PRIMARY KEY (`Menu_id_Menu`,`Produit_id_Produit`),
  ADD KEY `Produit_id_Produit` (`Produit_id_Produit`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id_Commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id_Menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `id_Produit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`FK_User`) REFERENCES `users` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD CONSTRAINT `Menu_ibfk_1` FOREIGN KEY (`FK_Restaurant`) REFERENCES `restaurant` (`id_restaurant`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Menu_Commande`
--
ALTER TABLE `Menu_Commande`
  ADD CONSTRAINT `Menu_Commande_ibfk_1` FOREIGN KEY (`FK_Commande`) REFERENCES `Commande` (`id_Commande`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Menu_Commande_ibfk_2` FOREIGN KEY (`FK_Menu`) REFERENCES `Menu` (`id_Menu`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `Produit_ibfk_1` FOREIGN KEY (`FK_Restaurant`) REFERENCES `restaurant` (`id_restaurant`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Produit_Commande`
--
ALTER TABLE `Produit_Commande`
  ADD CONSTRAINT `Produit_Commande_ibfk_1` FOREIGN KEY (`FK_Commande`) REFERENCES `Commande` (`id_Commande`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Produit_Commande_ibfk_2` FOREIGN KEY (`FK_Produit`) REFERENCES `Produit` (`id_Produit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Produit_Menu`
--
ALTER TABLE `Produit_Menu`
  ADD CONSTRAINT `Produit_Menu_ibfk_1` FOREIGN KEY (`Menu_id_Menu`) REFERENCES `Menu` (`id_Menu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Produit_Menu_ibfk_2` FOREIGN KEY (`Produit_id_Produit`) REFERENCES `Produit` (`id_Produit`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
