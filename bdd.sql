-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 30 avr. 2023 à 11:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simplon_charleville`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(255) NOT NULL,
  `activity_ref` varchar(255) NOT NULL,
  `activity_link` varchar(255) NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

DROP TABLE IF EXISTS `certification`;
CREATE TABLE IF NOT EXISTS `certification` (
  `certification_id` int NOT NULL AUTO_INCREMENT,
  `certification_name` varchar(255) NOT NULL,
  `certification_ref` varchar(255) NOT NULL,
  `certification_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `fee_id` int NOT NULL AUTO_INCREMENT,
  `fee_name` varchar(255) NOT NULL,
  PRIMARY KEY (`fee_id`),
  UNIQUE KEY `fee_AK` (`fee_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `formation_id` int NOT NULL AUTO_INCREMENT,
  `formation_name` varchar(255) NOT NULL,
  `formation_description` varchar(1000) NOT NULL,
  `formation_duration` varchar(255) NOT NULL,
  `formation_level` varchar(255) NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`formation_id`),
  KEY `formation_status_FK` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_activity`
--

DROP TABLE IF EXISTS `formation_activity`;
CREATE TABLE IF NOT EXISTS `formation_activity` (
  `formation_id` int NOT NULL,
  `activity_id` int NOT NULL,
  PRIMARY KEY (`formation_id`,`activity_id`),
  KEY `formation_activity_activity0_FK` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_certification`
--

DROP TABLE IF EXISTS `formation_certification`;
CREATE TABLE IF NOT EXISTS `formation_certification` (
  `certification_id` int NOT NULL,
  `formation_id` int NOT NULL,
  PRIMARY KEY (`certification_id`,`formation_id`),
  KEY `formation_certification_formation0_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_fee`
--

DROP TABLE IF EXISTS `formation_fee`;
CREATE TABLE IF NOT EXISTS `formation_fee` (
  `formation_id` int NOT NULL,
  `fee_id` int NOT NULL,
  PRIMARY KEY (`formation_id`,`fee_id`),
  KEY `formation_fee_fee0_FK` (`fee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) NOT NULL,
  `formation_id` int DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `job_formation_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `programme_id` int NOT NULL AUTO_INCREMENT,
  `programme_name` varchar(255) NOT NULL,
  `programme_layout_id` int DEFAULT NULL,
  `formation_id` int DEFAULT NULL,
  PRIMARY KEY (`programme_id`),
  KEY `programme_programme_layout_FK` (`programme_layout_id`),
  KEY `programme_formation0_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `programme_layout`
--

DROP TABLE IF EXISTS `programme_layout`;
CREATE TABLE IF NOT EXISTS `programme_layout` (
  `programme_layout_id` int NOT NULL AUTO_INCREMENT,
  `programme_layout_name` varchar(255) NOT NULL,
  PRIMARY KEY (`programme_layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `progress`
--

DROP TABLE IF EXISTS `progress`;
CREATE TABLE IF NOT EXISTS `progress` (
  `progress_id` date NOT NULL,
  `progress_name` varchar(255) NOT NULL,
  `progress_number` int NOT NULL,
  `project_id` int NOT NULL,
  PRIMARY KEY (`progress_id`),
  KEY `progress_project_FK` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_file` varchar(255) NOT NULL,
  `project_notes` varchar(255) DEFAULT NULL,
  `project_github` varchar(255) DEFAULT NULL,
  `project_company_image` varchar(255) DEFAULT NULL,
  `project_model_image` varchar(255) DEFAULT NULL,
  `project_model_link` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `user_id_project_formator` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `promo_id` int DEFAULT NULL,
  `type_id` int NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `project_user_FK` (`user_id`),
  KEY `project_user0_FK` (`user_id_project_formator`),
  KEY `project_status1_FK` (`status_id`),
  KEY `project_promo2_FK` (`promo_id`),
  KEY `project_type3_FK` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project_tag`
--

DROP TABLE IF EXISTS `project_tag`;
CREATE TABLE IF NOT EXISTS `project_tag` (
  `project_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`project_id`,`tag_id`),
  KEY `project_tag_tag0_FK` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project_team`
--

DROP TABLE IF EXISTS `project_team`;
CREATE TABLE IF NOT EXISTS `project_team` (
  `project_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `project_team_user0_FK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `promo_id` int NOT NULL AUTO_INCREMENT,
  `promo_start` date NOT NULL,
  `promo_end` date NOT NULL,
  `status_id` int NOT NULL,
  `formation_id` int NOT NULL,
  PRIMARY KEY (`promo_id`),
  KEY `promo_status_FK` (`status_id`),
  KEY `promo_formation_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promo_candidate`
--

DROP TABLE IF EXISTS `promo_candidate`;
CREATE TABLE IF NOT EXISTS `promo_candidate` (
  `user_id` int NOT NULL,
  `promo_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`promo_id`),
  KEY `promo_candidate_promo0_FK` (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promo_refused`
--

DROP TABLE IF EXISTS `promo_refused`;
CREATE TABLE IF NOT EXISTS `promo_refused` (
  `user_id` int NOT NULL,
  `promo_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`promo_id`),
  KEY `promo_refused_promo0_FK` (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promo_user`
--

DROP TABLE IF EXISTS `promo_user`;
CREATE TABLE IF NOT EXISTS `promo_user` (
  `promo_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`promo_id`,`user_id`),
  KEY `promo_user_user0_FK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `requirement`
--

DROP TABLE IF EXISTS `requirement`;
CREATE TABLE IF NOT EXISTS `requirement` (
  `requirement_id` int NOT NULL AUTO_INCREMENT,
  `requirement_name` varchar(255) NOT NULL,
  `formation_id` int DEFAULT NULL,
  PRIMARY KEY (`requirement_id`),
  KEY `requirement_formation_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` int NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  `activity_id` int DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `skill_activity_FK` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

DROP TABLE IF EXISTS `stat`;
CREATE TABLE IF NOT EXISTS `stat` (
  `stat_id` int NOT NULL AUTO_INCREMENT,
  `stat_name` varchar(255) NOT NULL,
  `stat_number` int NOT NULL,
  `formation_id` int DEFAULT NULL,
  PRIMARY KEY (`stat_id`),
  KEY `stat_formation_FK` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_surname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_description` varchar(255) DEFAULT NULL,
  `user_linkedin` varchar(255) DEFAULT NULL,
  `user_github` varchar(255) DEFAULT NULL,
  `user_token` varchar(255) NOT NULL,
  `user_numero_pe` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_place` varchar(255) NOT NULL,
  `user_birth_date` date DEFAULT NULL,
  `user_birth_place` varchar(255) DEFAULT NULL,
  `user_nationality` varchar(255) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_status_FK` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_tag`
--

DROP TABLE IF EXISTS `user_tag`;
CREATE TABLE IF NOT EXISTS `user_tag` (
  `user_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`tag_id`),
  KEY `user_tag_tag0_FK` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_status_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Contraintes pour la table `formation_activity`
--
ALTER TABLE `formation_activity`
  ADD CONSTRAINT `formation_activity_activity0_FK` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`),
  ADD CONSTRAINT `formation_activity_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `formation_certification`
--
ALTER TABLE `formation_certification`
  ADD CONSTRAINT `formation_certification_certification_FK` FOREIGN KEY (`certification_id`) REFERENCES `certification` (`certification_id`),
  ADD CONSTRAINT `formation_certification_formation0_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `formation_fee`
--
ALTER TABLE `formation_fee`
  ADD CONSTRAINT `formation_fee_fee0_FK` FOREIGN KEY (`fee_id`) REFERENCES `fee` (`fee_id`),
  ADD CONSTRAINT `formation_fee_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_formation0_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`),
  ADD CONSTRAINT `programme_programme_layout_FK` FOREIGN KEY (`programme_layout_id`) REFERENCES `programme_layout` (`programme_layout_id`);

--
-- Contraintes pour la table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_project_FK` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_promo2_FK` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`promo_id`),
  ADD CONSTRAINT `project_status1_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `project_type3_FK` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `project_user0_FK` FOREIGN KEY (`user_id_project_formator`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `project_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `project_tag`
--
ALTER TABLE `project_tag`
  ADD CONSTRAINT `project_tag_project_FK` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_tag_tag0_FK` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `project_team`
--
ALTER TABLE `project_team`
  ADD CONSTRAINT `project_team_project_FK` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_team_user0_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`),
  ADD CONSTRAINT `promo_status_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Contraintes pour la table `promo_candidate`
--
ALTER TABLE `promo_candidate`
  ADD CONSTRAINT `promo_candidate_promo0_FK` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`promo_id`),
  ADD CONSTRAINT `promo_candidate_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `promo_refused`
--
ALTER TABLE `promo_refused`
  ADD CONSTRAINT `promo_refused_promo0_FK` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`promo_id`),
  ADD CONSTRAINT `promo_refused_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `promo_user`
--
ALTER TABLE `promo_user`
  ADD CONSTRAINT `promo_user_promo_FK` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`promo_id`),
  ADD CONSTRAINT `promo_user_user0_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_activity_FK` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- Contraintes pour la table `stat`
--
ALTER TABLE `stat`
  ADD CONSTRAINT `stat_formation_FK` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`formation_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_status_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Contraintes pour la table `user_tag`
--
ALTER TABLE `user_tag`
  ADD CONSTRAINT `user_tag_tag0_FK` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  ADD CONSTRAINT `user_tag_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
