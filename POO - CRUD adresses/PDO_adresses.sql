--
-- Base de données: `poo_php`
--
CREATE DATABASE IF NOT EXISTS poo_adresses;
USE poo_adresses;

--
-- Structure de la table `vehicules`
--
CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `codePostal` varchar(30) NOT NULL,
  `localite` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

