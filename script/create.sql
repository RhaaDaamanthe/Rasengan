DROP TABLE IF EXISTS `animes`;
CREATE TABLE IF NOT EXISTS `animes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `cartes_animes`;
CREATE TABLE IF NOT EXISTS `cartes_animes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `id_rarete` int NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `id_anime` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rarete` (`id_rarete`),
  KEY `fk_anime` (`id_anime`)
) ENGINE=MyISAM AUTO_INCREMENT=700 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `cartes_films`;
CREATE TABLE IF NOT EXISTS `cartes_films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `id_rarete` int NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `id_film` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_film` (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `raretes`;
CREATE TABLE IF NOT EXISTS `raretes` (
  `id_rarete` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `quantite` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rarete`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `utilisateurs_cartes_animes`;
CREATE TABLE IF NOT EXISTS `utilisateurs_cartes_animes` (
  `user_id` int NOT NULL,
  `carte_id` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`,`carte_id`),
  KEY `carte_id` (`carte_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `utilisateurs_cartes_films`;
CREATE TABLE IF NOT EXISTS `utilisateurs_cartes_films` (
  `user_id` int NOT NULL,
  `carte_id` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`carte_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `cartes_films`
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`);
