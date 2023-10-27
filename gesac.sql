-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 sep. 2023 à 15:23
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gesac`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `code` text NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `T1` tinyint(1) DEFAULT NULL,
  `T2` tinyint(1) DEFAULT NULL,
  `T3` tinyint(1) DEFAULT NULL,
  `T4` tinyint(1) DEFAULT NULL,
  `cout` decimal(10,0) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id`, `produit`, `code`, `libelle`, `description`, `T1`, `T2`, `T3`, `T4`, `cout`, `created_at`, `updated_at`) VALUES
(5, 1, 'Activité 1', 'Libelle 1', 'descrp 1', NULL, NULL, NULL, NULL, 0, '2023-09-13', '2023-09-13'),
(6, 1, 'Activité 2', 'Libelle 2', 'descrp 2', NULL, NULL, NULL, NULL, 0, '2023-09-13', '2023-09-13'),
(7, 3, '2', 'prod', 'cc', NULL, NULL, NULL, NULL, 0, '2023-09-13', '2023-09-13');

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE `annees` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, '2022', 'Programme 2022', '2023-09-11', '2023-09-11');

-- --------------------------------------------------------

--
-- Structure de la table `effets`
--

CREATE TABLE `effets` (
  `id` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `code` text NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `effets`
--

INSERT INTO `effets` (`id`, `annee`, `code`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Premier effet', 'effet 1', 'Ceci est l\'effet 1  et le premier', '2023-09-11', '2023-09-11'),
(3, 1, 'Deuxieme effet', 'effet 2', 'Ceci est l\'effet 2', '2023-09-11', '2023-09-12');

-- --------------------------------------------------------

--
-- Structure de la table `pediode_activites`
--

CREATE TABLE `pediode_activites` (
  `id` int(11) NOT NULL,
  `activite` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `effet` int(11) NOT NULL,
  `code` text NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `effet`, `code`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'produit 1', 'libelle produit 1', 'description produit 1', '2023-09-12', '2023-09-12'),
(2, 1, 'produit 2', 'libelle produit 2', 'description produit 2', '2023-09-12', '2023-09-12'),
(3, 3, 'code Produit 1 effet 2', 'Libelle Produit 1 effet 2', 'Description Produit 1 effet 2', '2023-09-12', '2023-09-12'),
(4, 1, 'E2', 'This is his libelle', 'A description', '2023-09-12', '2023-09-12');

-- --------------------------------------------------------

--
-- Structure de la table `responsables`
--

CREATE TABLE `responsables` (
  `id` int(11) NOT NULL,
  `direction` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `responsables`
--

INSERT INTO `responsables` (`id`, `direction`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DRH', 'Direction des Ressources Humaines', '2023-09-11', '2023-09-11'),
(2, 'DAFs', 'Direction des Affaires financieres S', '2023-09-11', '2023-09-11');

-- --------------------------------------------------------

--
-- Structure de la table `source_financements`
--

CREATE TABLE `source_financements` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `source_financements`
--

INSERT INTO `source_financements` (`id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Source 1', 'Sources de financement', '2023-09-11', '2023-09-11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `effets`
--
ALTER TABLE `effets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `source_financements`
--
ALTER TABLE `source_financements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `effets`
--
ALTER TABLE `effets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `source_financements`
--
ALTER TABLE `source_financements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
