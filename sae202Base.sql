-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 24 juin 2025 à 08:18
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202Base`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `com_id` int(11) NOT NULL,
  `com_utilisateur` int(11) NOT NULL,
  `com_contenu` text NOT NULL,
  `com_date` datetime DEFAULT current_timestamp(),
  `com_verif` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messageadmin`
--

CREATE TABLE `messageadmin` (
  `mesad_id` int(11) NOT NULL,
  `mesad_titre` varchar(255) NOT NULL,
  `mesad_contenu` text NOT NULL,
  `mesad_utilisateur` int(11) NOT NULL,
  `mesad_lu` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `mes_id` int(11) NOT NULL,
  `mes_contenu` text NOT NULL,
  `mes_destinataire` text NOT NULL,
  `mes_expediteur` text NOT NULL,
  `mes_titre` text NOT NULL,
  `mes_lu_dest` tinyint(1) NOT NULL DEFAULT 0,
  `mes_lu_expe` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

CREATE TABLE `reservation` (
  `reserv_id` int(11) NOT NULL,
  `reserv_utilisateur` int(11) DEFAULT NULL,
  `reserv_tarif` int(11) DEFAULT NULL,
  `reserv_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

CREATE TABLE `tarifs` (
  `tarif_id` int(11) NOT NULL,
  `tarif_titre` text DEFAULT NULL,
  `tarif_argent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`tarif_id`, `tarif_titre`, `tarif_argent`) VALUES
(1, 'Etudiant', 28),
(2, 'Early Bird', 32),
(3, 'Groupe', 35),
(4, 'Individuel', 39),
(5, 'Prestige', 49);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `user_id` int(11) NOT NULL,
  `user_prenom` text NOT NULL,
  `user_nom` text NOT NULL,
  `user_email` text NOT NULL,
  `user_tel` text NOT NULL,
  `user_mdp` text NOT NULL,
  `user_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `messageadmin`
--
ALTER TABLE `messageadmin`
  ADD PRIMARY KEY (`mesad_id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`mes_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserv_id`);

--
-- Index pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`tarif_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messageadmin`
--
ALTER TABLE `messageadmin`
  MODIFY `mesad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
