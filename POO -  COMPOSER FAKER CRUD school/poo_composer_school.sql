--
-- Base de données: `poo_comoser_faker`
--
CREATE DATABASE IF NOT EXISTS poo_composer_school;
USE poo_composer_school;

--
-- Structure de la table `personnes`
--
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `niveau` int(11) NOT NULL,
  `date_inscription` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Structure de la table `etudiants`
--
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `anciennete` int(11) NOT NULL,
  `date_entree` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Structure de la table `cours`
--
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cours` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Structure de la table `cours_suivis`
--
CREATE TABLE IF NOT EXISTS `cours_suivis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Structure de la table `cours_suivis`
--
CREATE TABLE IF NOT EXISTS `cours_donnees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enseignant` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Ajout des cours dans la table cours
--
INSERT INTO `cours` (
`id` ,
`cours`  
)
VALUES (
NULL , 'javascript'
), (
NULL , 'php'
), (
NULL , 'html'
), (
NULL , 'css'
), (
NULL , 'framework'
);


