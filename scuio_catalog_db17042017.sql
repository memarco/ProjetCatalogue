-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Avril 2017 à 12:30
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `scuio_catalog_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6c9e3b48bd778240b77742523d90865e', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 1488818147, 'a:9:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:4:"name";s:12:"Marc Mefoung";s:5:"email";s:5:"admin";s:6:"avatar";s:15:"assassin_avatar";s:7:"tagline";s:42:"They see me mowin...<br/>...my front lawn.";s:7:"isAdmin";s:1:"1";s:6:"teamId";s:1:"1";s:10:"isLoggedIn";b:1;}'),
('c6a9f255c40d6b659c36d07d941020f2', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 1488878319, ''),
('e50b0dbf6b4021fa17ab3fc3979469f1', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0', 1492077123, '');

-- --------------------------------------------------------

--
-- Structure de la table `composante`
--

CREATE TABLE `composante` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `mail1` varchar(150) NOT NULL,
  `mail2` varchar(150) NOT NULL,
  `sigle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `composante`
--

INSERT INTO `composante` (`id`, `nom`, `mail1`, `mail2`, `sigle`) VALUES
(1, 'École supérieure d\'informatique appliquée à la gestion', 'baip-esiagu-pecfr', 'baip-esiag@u-pec.fr', 'ESIAG'),
(2, 'École supérieure du professorat et de l\'éducation', '', '', 'ESPE'),
(3, 'École Montsouris', '', '', 'ESM'),
(4, 'Faculté d\'Administration et échanges internationaux', 'baip-aeiu-pecfr', '', 'AEI'),
(5, 'Faculté de Droit', 'baip-droitu-pecfr', '', ''),
(6, 'Faculté des lettres, langues et sciences humaines', 'baip-lshu-pecfr', '', 'LLSH'),
(7, 'Faculté de médecine', '', '', 'paces@u-pec.fr'),
(8, 'Faculté des sciences de l\'éducation, sciences sociales et STAPS', 'baip-sess-stapsu-pecfr', '', 'SESS/STAPS');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `diplome`
--

INSERT INTO `diplome` (`id`, `nom`, `id_niveau`) VALUES
(3, 'MIAGE', 7),
(4, 'MASTER', 7),
(5, 'DUT', 4),
(6, 'LICENCE', 5),
(7, 'Doctorat', 9),
(8, 'INGENIEUR', 7);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom`) VALUES
(3, 'Droit, économie, gestion'),
(4, 'Sciences humaines et sociales'),
(5, 'Sciences, technologies, santé'),
(6, 'Arts, lettres, langues');

-- --------------------------------------------------------

--
-- Structure de la table `fa`
--

CREATE TABLE `fa` (
  `id` int(11) NOT NULL,
  `id_rythme` int(11) NOT NULL,
  `nbre_entreprise` int(11) NOT NULL DEFAULT '0',
  `nbre_ecole` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fa`
--

INSERT INTO `fa` (`id`, `id_rythme`, `nbre_entreprise`, `nbre_ecole`) VALUES
(16, 3, 0, 0),
(25, 5, 2, 3),
(27, 5, 6, 2),
(32, 5, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `fi`
--

CREATE TABLE `fi` (
  `id` int(11) NOT NULL,
  `nbre_semaine` int(11) NOT NULL,
  `debut_stage` varchar(150) NOT NULL,
  `fin_stage` varchar(150) NOT NULL,
  `id_type_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fi`
--

INSERT INTO `fi` (`id`, `nbre_semaine`, `debut_stage`, `fin_stage`, `id_type_stage`) VALUES
(18, 8, 'Avril', 'Juillet', 4),
(19, 24, 'Janvier', 'Juin', 5),
(20, 8, 'Janvier', 'Juin', 3),
(26, 5, 'Mars', 'Septembre', 4),
(35, 12, 'Mars', 'Août', 5);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`id`, `nom`) VALUES
(3, 'Mécanique'),
(4, 'Générale'),
(5, 'Maintenance des systèmes industriels');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `mention` varchar(150) NOT NULL,
  `id_composante` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_type_formation` int(11) NOT NULL,
  `id_diplome` int(11) NOT NULL,
  `niveau` varchar(150) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `mention`, `id_composante`, `id_filiere`, `id_type_formation`, `id_diplome`, `niveau`, `id_domaine`, `id_site`) VALUES
(16, 'TEST FA', 1, 4, 4, 6, 'Annee 1', 3, 1),
(18, 'TEST FI4', 1, 4, 5, 4, 'Annee 1', 3, 1),
(19, 'TEST FI5', 1, 4, 5, 6, 'Annee 2', 3, 2),
(20, 'TEST FI56', 1, 4, 5, 5, 'Annee 1', 3, 1),
(25, 'TEST FA2', 1, 4, 4, 7, 'Annee 1', 3, 1),
(26, 'TEST FIdf', 1, 4, 5, 6, 'Annee 1', 3, 1),
(27, 'TEST FA5', 1, 4, 4, 6, 'Annee 2', 3, 1),
(32, 'Droit des affaires', 5, 4, 5, 4, 'Annee 1', 3, 2),
(35, 'Lettre Moderne Française', 6, 4, 3, 4, 'Annee 2', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `nom_niveau` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id`, `nom_niveau`) VALUES
(3, 'Bac+1'),
(4, 'Bac+2'),
(5, 'Bac+3'),
(6, 'Bac+4'),
(7, 'Bac+5'),
(8, 'Bac+6'),
(9, 'Bacc+7'),
(10, 'Bacc+8');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `userId` varchar(45) DEFAULT NULL,
  `body` varchar(320) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rd_formation`
--

CREATE TABLE `rd_formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `id_composante` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_type_formation` int(11) NOT NULL,
  `id_diplome` int(11) NOT NULL,
  `niveau` varchar(150) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `id_rythme` int(11) NOT NULL,
  `nbre_entreprise` int(11) NOT NULL DEFAULT '0',
  `nbre_ecole` int(11) NOT NULL DEFAULT '0',
  `nbre_semaine` int(11) NOT NULL DEFAULT '0',
  `debut_stage` varchar(150) DEFAULT NULL,
  `fin_stage` varchar(150) DEFAULT NULL,
  `id_type_stage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rd_formation`
--

INSERT INTO `rd_formation` (`id`, `libelle`, `id_composante`, `id_filiere`, `id_type_formation`, `id_diplome`, `niveau`, `id_domaine`, `id_site`, `id_rythme`, `nbre_entreprise`, `nbre_ecole`, `nbre_semaine`, `debut_stage`, `fin_stage`, `id_type_stage`) VALUES
(25, 'Droit des assurances \r\n', 1, 4, 4, 7, 'Annee 1', 3, 1, 5, 2, 3, 0, '0', '0', 0),
(26, 'Droit de la propriéte intellectuelle appliquée \r\n', 1, 4, 5, 6, 'Annee 1', 3, 1, 0, 0, 0, 5, 'Mars', 'Septembre', 4),
(27, 'Droit de la régulation et des contrats publics\r\n', 1, 4, 4, 6, 'Annee 2', 3, 1, 5, 6, 2, 0, '0', '0', 0),
(32, 'Droit des affaires', 5, 4, 5, 4, 'Annee 1', 3, 2, 5, 2, 3, 0, '0', '0', 0),
(35, 'Lettre Moderne Française', 6, 4, 3, 4, 'Annee 2', 6, 1, 0, 0, 0, 12, 'Mars', 'Août', 5);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `cp_site` varchar(128) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id`, `nom`, `cp_site`, `adresse`, `ville`) VALUES
(1, 'Campus Centre', '94000', '61 avenue du Général De Gaulle', 'Créteil'),
(2, 'Centre Duvauchelle', '94000', '27 avenue Magellan', 'Créteil'),
(3, 'Centre La Pyramide', '94000', '80  avenue du Général De Gaulle', 'Créteil');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_formation`
--

INSERT INTO `type_formation` (`id`, `nom`) VALUES
(3, 'formation continue'),
(4, 'formation en alternance'),
(5, 'formation initiale');

-- --------------------------------------------------------

--
-- Structure de la table `type_periode`
--

CREATE TABLE `type_periode` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_periode`
--

INSERT INTO `type_periode` (`id`, `nom`) VALUES
(0, 'AUCUN'),
(3, 'Semaine'),
(4, 'Mois'),
(5, 'Jour');

-- --------------------------------------------------------

--
-- Structure de la table `type_stage`
--

CREATE TABLE `type_stage` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_stage`
--

INSERT INTO `type_stage` (`id`, `nom`) VALUES
(0, 'AUCUN'),
(3, 'Filé'),
(4, 'A l\'étranger'),
(5, 'MEEF');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `teamId` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `avatar`, `tagline`, `teamId`, `isAdmin`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Marc', 'Mefoung', 'assassin_avatar', 'They see me mowin...<br/>...my front lawn.', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Index pour la table `composante`
--
ALTER TABLE `composante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fa`
--
ALTER TABLE `fa`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rd_formation`
--
ALTER TABLE `rd_formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`cp_site`);

--
-- Index pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_periode`
--
ALTER TABLE `type_periode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_stage`
--
ALTER TABLE `type_stage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `composante`
--
ALTER TABLE `composante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_periode`
--
ALTER TABLE `type_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_stage`
--
ALTER TABLE `type_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
