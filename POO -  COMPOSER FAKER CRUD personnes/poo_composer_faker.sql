--
-- Base de données: `poo_comoser_faker`
--
CREATE DATABASE IF NOT EXISTS poo_composer_faker;
USE poo_composer_faker;

--
-- Structure de la table `personnes`
--
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `societe` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;