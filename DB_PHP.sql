-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : sitemetal_mysql:3306
-- Généré le : sam. 08 juil. 2023 à 01:05
-- Version du serveur : 8.0.20
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `DB_PHP`
--

-- --------------------------------------------------------

--
-- Structure de la table `Album`
--

CREATE TABLE `Album` (
  `id_Album` int NOT NULL,
  `nom_Album` varchar(255) DEFAULT NULL,
  `description_Album` varchar(255) DEFAULT NULL,
  `date_Album` date DEFAULT NULL,
  `ref_Groupe` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Album_Genre`
--

CREATE TABLE `Album_Genre` (
  `ref_Genre` int NOT NULL,
  `ref_Album` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `id_Article` int NOT NULL,
  `titre_Article` varchar(255) DEFAULT NULL,
  `libelle_Article` varchar(255) DEFAULT NULL,
  `ref_Auteur` int DEFAULT NULL,
  `ref_Audio` int DEFAULT NULL,
  `ref_type_Article` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Article`
--

INSERT INTO `Article` (`id_Article`, `titre_Article`, `libelle_Article`, `ref_Auteur`, `ref_Audio`, `ref_type_Article`) VALUES
(1, 'Test Critique 1', 'Test libelle Critique 1', 1, NULL, 1),
(2, 'Test Critique 2', 'Test libelle Critique 2', 1, NULL, 1),
(3, 'Test Interview 1', 'Test libelle Interview 1', 2, NULL, 2),
(4, 'Test Interview 2', 'Test libelle Interview 2', 2, NULL, 2),
(5, 'Test Essai 1', 'Test libelle Essai 1', 2, NULL, 3),
(6, 'Test Essai 2', 'Test libelle Essai 2', 1, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Article_Groupe`
--

CREATE TABLE `Article_Groupe` (
  `ref_Groupe` int DEFAULT NULL,
  `ref_Article` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Artiste`
--

CREATE TABLE `Artiste` (
  `id_Artiste` int NOT NULL,
  `prenom_Artist` varchar(255) DEFAULT NULL,
  `nom_Artiste` varchar(255) DEFAULT NULL,
  `description_Artiste` varchar(255) DEFAULT NULL,
  `image_Artiste` varchar(255) DEFAULT NULL,
  `ref_Statut` int DEFAULT NULL,
  `ref_Audio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Artiste`
--

INSERT INTO `Artiste` (`id_Artiste`, `prenom_Artist`, `nom_Artiste`, `description_Artiste`, `image_Artiste`, `ref_Statut`, `ref_Audio`) VALUES
(1, 'Euronymous', NULL, 'Description Euronymous', NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Artiste_Groupe`
--

CREATE TABLE `Artiste_Groupe` (
  `ref_Groupe` int NOT NULL,
  `ref_Artiste` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Artiste_Groupe`
--

INSERT INTO `Artiste_Groupe` (`ref_Groupe`, `ref_Artiste`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Artiste_Instrument`
--

CREATE TABLE `Artiste_Instrument` (
  `ref_Instrument` int NOT NULL,
  `ref_Artiste` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Audio`
--

CREATE TABLE `Audio` (
  `id_Audio` int NOT NULL,
  `libelle_Audio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `id_Commentaire` int NOT NULL,
  `libelle_Commentaire` varchar(255) DEFAULT NULL,
  `ref_Article` int DEFAULT NULL,
  `ref_Auteur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id_Genre` int NOT NULL,
  `libelle_Genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Genre`
--

INSERT INTO `Genre` (`id_Genre`, `libelle_Genre`) VALUES
(1, 'Black Metal'),
(2, 'Metal Progressif'),
(3, 'Death Metal'),
(4, 'Thrash Metal'),
(5, 'Nu Metal');

-- --------------------------------------------------------

--
-- Structure de la table `Groupe`
--

CREATE TABLE `Groupe` (
  `id_Groupe` int NOT NULL,
  `nom_groupe` varchar(255) DEFAULT NULL,
  `description_Groupe` varchar(255) DEFAULT NULL,
  `image_Groupe` varchar(255) DEFAULT NULL,
  `ref_Statut` int DEFAULT NULL,
  `ref_Audio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Groupe`
--

INSERT INTO `Groupe` (`id_Groupe`, `nom_groupe`, `description_Groupe`, `image_Groupe`, `ref_Statut`, `ref_Audio`) VALUES
(1, 'Blut Aus Nord', 'Description Blut Aus Nord', NULL, 1, NULL),
(2, 'Morbid Angel', 'Description Morbid Angel', NULL, 2, NULL),
(3, 'Mayhem', 'Description Mayhem', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Groupe_Genre`
--

CREATE TABLE `Groupe_Genre` (
  `ref_Groupe` int NOT NULL,
  `ref_Genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Groupe_Genre`
--

INSERT INTO `Groupe_Genre` (`ref_Groupe`, `ref_Genre`) VALUES
(1, 1),
(3, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Instrument`
--

CREATE TABLE `Instrument` (
  `id_Instrument` int NOT NULL,
  `libelle_Instrument` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Instrument`
--

INSERT INTO `Instrument` (`id_Instrument`, `libelle_Instrument`) VALUES
(1, 'Guitariste'),
(2, 'Batteur'),
(3, 'Chanteur'),
(4, 'Bassiste'),
(5, 'Claviériste');

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `id_Role` int NOT NULL,
  `libelle_Role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`id_Role`, `libelle_Role`) VALUES
(1, 'Lecteur'),
(2, 'Auteur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `Statut`
--

CREATE TABLE `Statut` (
  `id_Statut` int NOT NULL,
  `libelle_Statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Statut`
--

INSERT INTO `Statut` (`id_Statut`, `libelle_Statut`) VALUES
(1, 'Actif'),
(2, 'Inactif'),
(3, 'Décédé');

-- --------------------------------------------------------

--
-- Structure de la table `Type_Article`
--

CREATE TABLE `Type_Article` (
  `id_type_Article` int NOT NULL,
  `libelle_type_Article` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Type_Article`
--

INSERT INTO `Type_Article` (`id_type_Article`, `libelle_type_Article`) VALUES
(1, 'Critique'),
(2, 'Interview'),
(3, 'Essai');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_User` int NOT NULL,
  `date_naissance_User` date DEFAULT NULL,
  `prenom_User` varchar(255) DEFAULT NULL,
  `nom_User` varchar(255) DEFAULT NULL,
  `pseudo_User` varchar(255) DEFAULT NULL,
  `mail_User` varchar(255) DEFAULT NULL,
  `pass_User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id_User`, `date_naissance_User`, `prenom_User`, `nom_User`, `pseudo_User`, `mail_User`, `pass_User`) VALUES
(1, '2002-12-04', 'Matthias', 'BEAUCHAUD', 'TORSE NU', 'beauchaudmatthias0@gmail.com', 'TORSE NU'),
(2, '1993-06-01', 'Random', 'RANDOM', 'Randomax', 'random.random@gmail.com', 'random1'),
(3, NULL, 'Aylan', 'Bakha', 'Nihilomnis', 'exemple@gmail.com', 'AYLAN42');

-- --------------------------------------------------------

--
-- Structure de la table `User_Role`
--

CREATE TABLE `User_Role` (
  `ref_User` int NOT NULL,
  `ref_Role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `User_Role`
--

INSERT INTO `User_Role` (`ref_User`, `ref_Role`) VALUES
(2, 1),
(3, 2),
(1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`id_Album`),
  ADD KEY `ref_Groupe` (`ref_Groupe`);

--
-- Index pour la table `Album_Genre`
--
ALTER TABLE `Album_Genre`
  ADD PRIMARY KEY (`ref_Genre`,`ref_Album`),
  ADD KEY `ref_Album` (`ref_Album`);

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id_Article`),
  ADD KEY `ref_Auteur` (`ref_Auteur`),
  ADD KEY `ref_Audio` (`ref_Audio`),
  ADD KEY `ref_type_Article` (`ref_type_Article`);

--
-- Index pour la table `Article_Groupe`
--
ALTER TABLE `Article_Groupe`
  ADD PRIMARY KEY (`ref_Article`),
  ADD KEY `ref_Groupe` (`ref_Groupe`);

--
-- Index pour la table `Artiste`
--
ALTER TABLE `Artiste`
  ADD PRIMARY KEY (`id_Artiste`),
  ADD KEY `ref_Statut` (`ref_Statut`),
  ADD KEY `ref_Audio` (`ref_Audio`);

--
-- Index pour la table `Artiste_Groupe`
--
ALTER TABLE `Artiste_Groupe`
  ADD PRIMARY KEY (`ref_Groupe`,`ref_Artiste`),
  ADD KEY `ref_Artiste` (`ref_Artiste`);

--
-- Index pour la table `Artiste_Instrument`
--
ALTER TABLE `Artiste_Instrument`
  ADD PRIMARY KEY (`ref_Instrument`,`ref_Artiste`),
  ADD KEY `ref_Artiste` (`ref_Artiste`);

--
-- Index pour la table `Audio`
--
ALTER TABLE `Audio`
  ADD PRIMARY KEY (`id_Audio`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`id_Commentaire`),
  ADD KEY `ref_Article` (`ref_Article`),
  ADD KEY `ref_Auteur` (`ref_Auteur`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id_Genre`);

--
-- Index pour la table `Groupe`
--
ALTER TABLE `Groupe`
  ADD PRIMARY KEY (`id_Groupe`),
  ADD KEY `ref_Statut` (`ref_Statut`),
  ADD KEY `ref_Audio` (`ref_Audio`);

--
-- Index pour la table `Groupe_Genre`
--
ALTER TABLE `Groupe_Genre`
  ADD PRIMARY KEY (`ref_Groupe`,`ref_Genre`),
  ADD KEY `ref_Genre` (`ref_Genre`);

--
-- Index pour la table `Instrument`
--
ALTER TABLE `Instrument`
  ADD PRIMARY KEY (`id_Instrument`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id_Role`);

--
-- Index pour la table `Statut`
--
ALTER TABLE `Statut`
  ADD PRIMARY KEY (`id_Statut`);

--
-- Index pour la table `Type_Article`
--
ALTER TABLE `Type_Article`
  ADD PRIMARY KEY (`id_type_Article`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_User`);

--
-- Index pour la table `User_Role`
--
ALTER TABLE `User_Role`
  ADD PRIMARY KEY (`ref_User`,`ref_Role`),
  ADD KEY `ref_Role` (`ref_Role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Album`
--
ALTER TABLE `Album`
  MODIFY `id_Album` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
  MODIFY `id_Article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Artiste`
--
ALTER TABLE `Artiste`
  MODIFY `id_Artiste` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Audio`
--
ALTER TABLE `Audio`
  MODIFY `id_Audio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `id_Commentaire` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id_Genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `id_Groupe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Instrument`
--
ALTER TABLE `Instrument`
  MODIFY `id_Instrument` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `id_Role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Statut`
--
ALTER TABLE `Statut`
  MODIFY `id_Statut` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Type_Article`
--
ALTER TABLE `Type_Article`
  MODIFY `id_type_Article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Album`
--
ALTER TABLE `Album`
  ADD CONSTRAINT `Album_ibfk_1` FOREIGN KEY (`ref_Groupe`) REFERENCES `Groupe` (`id_Groupe`);

--
-- Contraintes pour la table `Album_Genre`
--
ALTER TABLE `Album_Genre`
  ADD CONSTRAINT `Album_Genre_ibfk_1` FOREIGN KEY (`ref_Genre`) REFERENCES `Genre` (`id_Genre`),
  ADD CONSTRAINT `Album_Genre_ibfk_2` FOREIGN KEY (`ref_Album`) REFERENCES `Album` (`id_Album`);

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `Article_ibfk_1` FOREIGN KEY (`ref_Auteur`) REFERENCES `User` (`id_User`),
  ADD CONSTRAINT `Article_ibfk_2` FOREIGN KEY (`ref_Audio`) REFERENCES `Audio` (`id_Audio`),
  ADD CONSTRAINT `Article_ibfk_3` FOREIGN KEY (`ref_type_Article`) REFERENCES `Type_Article` (`id_type_Article`);

--
-- Contraintes pour la table `Article_Groupe`
--
ALTER TABLE `Article_Groupe`
  ADD CONSTRAINT `Article_Groupe_ibfk_1` FOREIGN KEY (`ref_Groupe`) REFERENCES `Groupe` (`id_Groupe`),
  ADD CONSTRAINT `Article_Groupe_ibfk_2` FOREIGN KEY (`ref_Article`) REFERENCES `Article` (`id_Article`);

--
-- Contraintes pour la table `Artiste`
--
ALTER TABLE `Artiste`
  ADD CONSTRAINT `Artiste_ibfk_1` FOREIGN KEY (`ref_Statut`) REFERENCES `Statut` (`id_Statut`),
  ADD CONSTRAINT `Artiste_ibfk_2` FOREIGN KEY (`ref_Audio`) REFERENCES `Audio` (`id_Audio`);

--
-- Contraintes pour la table `Artiste_Groupe`
--
ALTER TABLE `Artiste_Groupe`
  ADD CONSTRAINT `Artiste_Groupe_ibfk_1` FOREIGN KEY (`ref_Groupe`) REFERENCES `Groupe` (`id_Groupe`),
  ADD CONSTRAINT `Artiste_Groupe_ibfk_2` FOREIGN KEY (`ref_Artiste`) REFERENCES `Artiste` (`id_Artiste`);

--
-- Contraintes pour la table `Artiste_Instrument`
--
ALTER TABLE `Artiste_Instrument`
  ADD CONSTRAINT `Artiste_Instrument_ibfk_1` FOREIGN KEY (`ref_Instrument`) REFERENCES `Instrument` (`id_Instrument`),
  ADD CONSTRAINT `Artiste_Instrument_ibfk_2` FOREIGN KEY (`ref_Artiste`) REFERENCES `Artiste` (`id_Artiste`);

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `Commentaire_ibfk_1` FOREIGN KEY (`ref_Article`) REFERENCES `Article` (`id_Article`),
  ADD CONSTRAINT `Commentaire_ibfk_2` FOREIGN KEY (`ref_Auteur`) REFERENCES `User` (`id_User`);

--
-- Contraintes pour la table `Groupe`
--
ALTER TABLE `Groupe`
  ADD CONSTRAINT `Groupe_ibfk_1` FOREIGN KEY (`ref_Statut`) REFERENCES `Statut` (`id_Statut`),
  ADD CONSTRAINT `Groupe_ibfk_2` FOREIGN KEY (`ref_Audio`) REFERENCES `Audio` (`id_Audio`);

--
-- Contraintes pour la table `Groupe_Genre`
--
ALTER TABLE `Groupe_Genre`
  ADD CONSTRAINT `Groupe_Genre_ibfk_1` FOREIGN KEY (`ref_Groupe`) REFERENCES `Groupe` (`id_Groupe`),
  ADD CONSTRAINT `Groupe_Genre_ibfk_2` FOREIGN KEY (`ref_Genre`) REFERENCES `Genre` (`id_Genre`);

--
-- Contraintes pour la table `User_Role`
--
ALTER TABLE `User_Role`
  ADD CONSTRAINT `User_Role_ibfk_1` FOREIGN KEY (`ref_User`) REFERENCES `User` (`id_User`),
  ADD CONSTRAINT `User_Role_ibfk_2` FOREIGN KEY (`ref_Role`) REFERENCES `Role` (`id_Role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
