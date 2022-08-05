-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 juil. 2022 à 18:13
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
-- Base de données : `bibliothèque`
--
CREATE DATABASE IF NOT EXISTS `bibliothèque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bibliothèque`;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`) VALUES
(1712, 'Jean-Jacques', 'Rousseau'),
(1802, 'Hugo', 'Victor'),
(1965, 'Rowling', 'J.K.'),
(2020, 'Baibou', 'Sonia');

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE IF NOT EXISTS `bibliotheque` (
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`nom`) VALUES
('B41'),
('H21'),
('R11'),
('R31');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`id`, `titre`) VALUES
(111, 'Du contrat social'),
(211, 'Les misérables'),
(311, 'Harry Potter à l\'école des sorciers'),
(411, 'Oh my code !\r\nJe crée mon premier site web');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `nom`) VALUES
(11, 'Flammarion'),
(21, 'Ldp Jeunesse'),
(31, 'Gallimard jeunesse'),
(41, 'Eyrolles');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `bibliotheque` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbn` (`isbn`,`bibliotheque`),
  KEY `bibliotheque` (`bibliotheque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id`, `isbn`, `bibliotheque`) VALUES
(22222, '2010008995', 'H21'),
(33333, '2070584623', 'R31'),
(11111, '2081275236', 'R11'),
(44444, '221267662X', 'B41');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`nom`) VALUES
('Biographie'),
('Essai'),
('Fantastique'),
('Roman'),
('Scientifique');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`nom`) VALUES
('Anglais'),
('Arabe'),
('Espagnol'),
('Français'),
('Mandarin'),
('Russe');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `isbn` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `editeur_id` int(11) NOT NULL,
  `date_publication` date NOT NULL,
  `description_id` int(11) NOT NULL,
  `langue` varchar(50) NOT NULL,
  PRIMARY KEY (`isbn`),
  UNIQUE KEY `description_id_3` (`description_id`),
  UNIQUE KEY `description_id_4` (`description_id`),
  KEY `description_id` (`description_id`),
  KEY `description_id_2` (`description_id`),
  KEY `description_id_5` (`description_id`),
  KEY `editeur_id` (`editeur_id`),
  KEY `langue` (`langue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `editeur_id`, `date_publication`, `description_id`, `langue`) VALUES
('2010008995', 'Les misérables\r\nRoman poche', 21, '2014-08-15', 211, 'Français'),
('2070584623', 'Harry Potter à l\'école des sorciers\r\nTome 1', 31, '2017-10-12', 311, 'Français'),
('2081275236', 'Du contrat social\r\nNouvelle édition', 11, '2011-12-31', 111, 'Français'),
('221267662X', 'Oh my code !\r\nJe crée mon premier site web\r\nManuel (broché)', 41, '2020-09-03', 411, 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `livre_auteur`
--

DROP TABLE IF EXISTS `livre_auteur`;
CREATE TABLE IF NOT EXISTS `livre_auteur` (
  `isbn` varchar(20) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  KEY `isbn` (`isbn`),
  KEY `auteur_id` (`auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre_auteur`
--

INSERT INTO `livre_auteur` (`isbn`, `auteur_id`) VALUES
('2081275236', 1712),
('2010008995', 1802),
('2070584623', 1965),
('221267662X', 2020);

-- --------------------------------------------------------

--
-- Structure de la table `livre_genre`
--

DROP TABLE IF EXISTS `livre_genre`;
CREATE TABLE IF NOT EXISTS `livre_genre` (
  `isbn` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  KEY `isbn` (`isbn`),
  KEY `nom` (`nom`),
  KEY `isbn_2` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre_genre`
--

INSERT INTO `livre_genre` (`isbn`, `nom`) VALUES
('221267662X', 'Scientifique'),
('2081275236', 'Essai'),
('2070584623', 'Fantastique'),
('2010008995', 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `paragraphe`
--

DROP TABLE IF EXISTS `paragraphe`;
CREATE TABLE IF NOT EXISTS `paragraphe` (
  `description_id` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `texte` varchar(500) NOT NULL,
  KEY `description_id` (`description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paragraphe`
--

INSERT INTO `paragraphe` (`description_id`, `ordre`, `texte`) VALUES
(111, 1, 'Paru en 1762, le Contrat social, en affirmant le principe de souveraineté du peuple, a constitué un tournant décisif pour la modernité et s\'est imposé comme un des textes majeurs de la philosophie politique.'),
(211, 2, 'Le destin de Jean Valjean, forçat échappé du bagne, est bouleversé par sa rencontre avec Fantine. Mourante et sans le sou, celle-ci lui demande de prendre soin de Cosette, sa fille confiée aux Thénardier. Ce couple d’aubergistes, malhonnête et sans scrupules, exploitent la fillette jusqu’à ce que Jean Valjean tienne sa promesse et l’adopte.'),
(311, 3, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.'),
(411, 4, 'Plongez dans le code mais sans vous noyer ! Je veux apprendre à coder, mais par où commencer ? Par ce livre qui va vous initier au développement web, au travers d\'un projet de création de site Internet avec HTML, CSS et JavaScript. Textes, images, liens, design responsive, tout y est pour faire de ce projet fil rouge, éprouvé et approuvé en ateliers de coding, un véritable condensé de connaissances.');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` varchar(20) NOT NULL,
  `renouvele` tinyint(1) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `exemplaire_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`,`exemplaire_id`),
  KEY `exemplaire_id` (`exemplaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`id`, `date_debut`, `date_fin`, `renouvele`, `utilisateur_id`, `exemplaire_id`) VALUES
(624, '2022-07-06', '2022-08-01', 2, 123456, 44444),
(629, '2022-07-28', '2022-09-01', 1, 109876, 11111);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `sel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `nom`, `prenom`, `mdp`, `sel`) VALUES
(109876, 'e.noor@studi.com', 'Noor', 'Emir', 'Soleil&Lune', 'Lumière'),
(123456, 's.dupond@studi.com', 'Dupond', 'Stéphanie', 'Rose&Fraise', 'Bonbon'),
(654321, 'g.bourgogne@studi.com', 'Bourgogne', 'Géraldine', 'Dream6', 'DolceVita'),
(678910, 'v.henry@studi.com', 'Henry', 'Victoire', 'Cesar1', 'Informatique');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`bibliotheque`) REFERENCES `bibliotheque` (`nom`),
  ADD CONSTRAINT `exemplaire_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`description_id`) REFERENCES `description` (`id`),
  ADD CONSTRAINT `livre_ibfk_2` FOREIGN KEY (`langue`) REFERENCES `langue` (`nom`),
  ADD CONSTRAINT `livre_ibfk_3` FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`id`);

--
-- Contraintes pour la table `livre_auteur`
--
ALTER TABLE `livre_auteur`
  ADD CONSTRAINT `livre_auteur_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `livre_auteur_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `livre_genre`
--
ALTER TABLE `livre_genre`
  ADD CONSTRAINT `livre_genre_ibfk_1` FOREIGN KEY (`nom`) REFERENCES `genre` (`nom`),
  ADD CONSTRAINT `livre_genre_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD CONSTRAINT `paragraphe_ibfk_1` FOREIGN KEY (`description_id`) REFERENCES `description` (`id`);

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `pret_ibfk_2` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
