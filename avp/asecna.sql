-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 11 Décembre 2014 à 21:57
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `asecna`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `ANNONCE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ANNONCE_NUM` varchar(255) NOT NULL,
  `ANNONCE_TITRE` varchar(100) NOT NULL,
  `ANNONCE_DESCRIPTION` text NOT NULL,
  `ANNONCE_LIEN` varchar(255) NOT NULL,
  `ANNONCE_DATE_DEB` date NOT NULL,
  `ANNONCE_DATE_FIN` date NOT NULL,
  `ANNONCE_DATE_CREATION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ANNONCE_AGE` int(11) NOT NULL,
  `ANNONCE_DELAI_AGE` date NOT NULL,
  `SECTEUR` varchar(50) NOT NULL,
  `ETAT` varchar(50) NOT NULL DEFAULT 'EN COURS',
  PRIMARY KEY (`ANNONCE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `autre_formation`
--

CREATE TABLE IF NOT EXISTS `autre_formation` (
  `FORM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FORMATION_AN_DEB` varchar(11) DEFAULT NULL,
  `FORM_LIB` varchar(25) DEFAULT NULL,
  `FORM_NOM` varchar(25) DEFAULT NULL,
  `FORM_INTITULE` varchar(25) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `AUTRE_FORMATION_DIPLOME_FICHIER` varchar(255) NOT NULL,
  PRIMARY KEY (`FORM_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE IF NOT EXISTS `candidat` (
  `CANDIDAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CANDIDAT_TYPE` varchar(25) NOT NULL,
  `CANDIDAT_CIVILITE` varchar(25) DEFAULT NULL,
  `CANDIDAT_NOM` varchar(25) DEFAULT NULL,
  `CANDIDAT_PRENOM` varchar(25) DEFAULT NULL,
  `CANDIDAT_MATRICULE` varchar(6) DEFAULT NULL,
  `CANDIDAT_DATE_NAISSANCE` date DEFAULT NULL,
  `CANDIDAT_LIEU_NAISSANCE` varchar(25) DEFAULT NULL,
  `CANDIDAT_NATIONALITE` varchar(25) DEFAULT NULL,
  `CANDIDAT_SIT_MAT` varchar(255) DEFAULT NULL,
  `CANDIDAT_NBRE_ENF` int(11) DEFAULT NULL,
  `CANDIDAT_ADR_PERM` varchar(100) DEFAULT NULL,
  `CANDIDAT_ADR_ACT` varchar(100) DEFAULT NULL,
  `CANDIDAT_INDICATIF` varchar(8) DEFAULT NULL,
  `CANDIDAT_NUM_TEL` varchar(20) DEFAULT NULL,
  `CANDIDAT_NUM_GSM` varchar(12) DEFAULT NULL,
  `CANDIDAT_PERMIS` varchar(25) DEFAULT NULL,
  `CANDIDAT_DEMANDE_EMPLOI` varchar(255) NOT NULL,
  `CANDIDAT_CV` varchar(255) NOT NULL,
  `CANDIDAT_CERTIFICAT_TRAVAIL` varchar(255) NOT NULL,
  `CANDIDAT_PHOTO` varchar(25) DEFAULT NULL,
  `CANDIDAT_ACTE_NAISS` varchar(255) NOT NULL,
  `CANDIDAT_FICHE_FAMILLE` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_NAT` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_DOMICILE` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_MEDICAL` varchar(255) NOT NULL,
  `CANDIDAT_CASIER_JUDICIAIRE` varchar(255) NOT NULL,
  `CANDIDAT_IS_FAMILLE` tinyint(1) NOT NULL,
  `CANDIDAT_MOTIV_POSTE` longtext NOT NULL,
  `FK_UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`CANDIDAT_ID`),
  KEY `candidat_ibfk_1` (`FK_UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `COMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMP_LIB` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`COMP_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `connaissances_informatiques`
--

CREATE TABLE IF NOT EXISTS `connaissances_informatiques` (
  `INFORMATIQUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGICIELS` varchar(50) DEFAULT NULL,
  `INFORMATIQUE_NIV` varchar(50) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`INFORMATIQUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `connaissances_linguistiques`
--

CREATE TABLE IF NOT EXISTS `connaissances_linguistiques` (
  `LANGUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LANGUE_NOM` varchar(50) DEFAULT NULL,
  `LANGUE_ORALE` varchar(50) NOT NULL,
  `LANGUE_ECRITE` varchar(50) NOT NULL,
  `LANGUE_LECTURE` varchar(50) NOT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LANGUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `DOSSIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOSSIER_NOM` text NOT NULL,
  `DOSSIER_LIEN` text NOT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`DOSSIER_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `experience_professionnelle`
--

CREATE TABLE IF NOT EXISTS `experience_professionnelle` (
  `EXP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXP_ENT_NOM` varchar(100) DEFAULT NULL,
  `EXP_SEC_ACT` varchar(100) DEFAULT NULL,
  `EXP_POSTE` varchar(100) DEFAULT NULL,
  `EXP_DEBUT_TRAVAIL` text,
  `EXP_FIN_TRAVAIL` text,
  `EXP_SALAIRE` int(11) DEFAULT NULL,
  `EXP_NBRE_PERS_SORD` int(11) DEFAULT NULL,
  `EXP_TACHE` tinytext,
  `EXP_MOTIF_DEP` tinytext,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EXP_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `FAMILLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FAMILLE_NOM` varchar(50) NOT NULL,
  `FAMILLE_PRENOM` varchar(50) NOT NULL,
  `FAMILLE_STRUCTURE` varchar(20) NOT NULL,
  `FAMILLE_DEGRE` varchar(255) NOT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`FAMILLE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `FONCTION_ID` int(11) NOT NULL,
  `FONCTION_LIB` varchar(25) NOT NULL,
  `FONCTION_DESC` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `FORMATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FORMATION_AN_DEB` varchar(255) DEFAULT NULL,
  `FORMATION_AN_FIN` varchar(255) DEFAULT NULL,
  `ETABLISSEMENT_NOM` varchar(25) DEFAULT NULL,
  `FORMATION_LIEU` varchar(25) DEFAULT NULL,
  `FORMATION_DIPLOME` varchar(25) DEFAULT NULL,
  `FORMATION_DOM_PRINC_ETUD` varchar(25) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  `FORMATION_CYCLE` text NOT NULL,
  `FORMATION_DIPLOME_FICHIER` longtext NOT NULL,
  PRIMARY KEY (`FORMATION_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `lettre_motivation`
--

CREATE TABLE IF NOT EXISTS `lettre_motivation` (
  `LETTRE_MOTIVATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LETTRE_MOTIVATION` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `FK_ANNONCE_ID` int(11) NOT NULL,
  PRIMARY KEY (`LETTRE_MOTIVATION_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `nom_pays` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`,`nom_pays`),
  KEY `code_2` (`code`,`nom_pays`),
  KEY `code_3` (`code`,`nom_pays`),
  KEY `code_4` (`code`,`nom_pays`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE IF NOT EXISTS `postulation` (
  `postulation_id` int(11) NOT NULL AUTO_INCREMENT,
  `postulation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FK_UTIL_ID` int(11) NOT NULL,
  `postulation_age_candidat` int(11) NOT NULL,
  `FK_annonce_id` int(11) NOT NULL,
  PRIMARY KEY (`postulation_id`),
  KEY `FK_util_id` (`FK_UTIL_ID`),
  KEY `FK_lettre_motivation_id` (`postulation_age_candidat`),
  KEY `FK_annonce_id` (`FK_annonce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `PROFIL_ID` int(11) NOT NULL,
  `PROFIL_NOM` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qualites`
--

CREATE TABLE IF NOT EXISTS `qualites` (
  `QUAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `QUAL_LIB` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`QUAL_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE IF NOT EXISTS `realisation` (
  `REAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REAL_LIB` varchar(255) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`REAL_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `REF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REF_NOM_ENT` text,
  `REF_PERS_CONT` text,
  `REF_POST_OCC` text,
  `REF_TEL` text,
  `REF_EMAIL` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`REF_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTIL_LOGIN` varchar(35) DEFAULT NULL,
  `UTIL_MDP` varchar(255) DEFAULT NULL,
  `UTIL_EMAIL` varchar(50) DEFAULT NULL,
  `UTIL_ROLE` varchar(8) NOT NULL DEFAULT '0',
  `active` varchar(3) NOT NULL DEFAULT 'non',
  `token` text NOT NULL,
  PRIMARY KEY (`UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `autre_formation`
--
ALTER TABLE `autre_formation`
  ADD CONSTRAINT `autre_formation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`FK_UTIL_ID`) REFERENCES `utilisateurs` (`UTIL_ID`);

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `connaissances_informatiques`
--
ALTER TABLE `connaissances_informatiques`
  ADD CONSTRAINT `connaissances_informatiques_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `connaissances_linguistiques`
--
ALTER TABLE `connaissances_linguistiques`
  ADD CONSTRAINT `connaissances_linguistiques_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `experience_professionnelle`
--
ALTER TABLE `experience_professionnelle`
  ADD CONSTRAINT `experience_professionnelle_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `famille_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `lettre_motivation`
--
ALTER TABLE `lettre_motivation`
  ADD CONSTRAINT `lettre_motivation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `postulation_ibfk_1` FOREIGN KEY (`FK_UTIL_ID`) REFERENCES `utilisateurs` (`UTIL_ID`);

--
-- Contraintes pour la table `qualites`
--
ALTER TABLE `qualites`
  ADD CONSTRAINT `qualites_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
