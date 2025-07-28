-- Suppression des tables existantes
DROP TABLE IF EXISTS utilisateurs_badges;
DROP TABLE IF EXISTS cartes_logs;
DROP TABLE IF EXISTS utilisateurs_cartes_wishlist;
DROP TABLE IF EXISTS utilisateurs_cartes_favori;
DROP TABLE IF EXISTS utilisateurs_cartes_films;
DROP TABLE IF EXISTS utilisateurs_cartes_animes;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS cartes_films;
DROP TABLE IF EXISTS cartes_animes;
DROP TABLE IF EXISTS films;
DROP TABLE IF EXISTS animes;
DROP TABLE IF EXISTS raretes;
DROP TABLE IF EXISTS badges;

-- Table animes
CREATE TABLE animes (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (nom)
);

-- Table films
CREATE TABLE films (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (nom)
);

-- Table cartes_animes
CREATE TABLE cartes_animes (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  id_rarete INT NOT NULL,
  image_path VARCHAR(255),
  description TEXT,
  id_anime INT,
  PRIMARY KEY (id),
  KEY (id_rarete),
  KEY (id_anime)
);

-- Table cartes_films (avec clé étrangère intégrée)
CREATE TABLE cartes_films (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  id_rarete INT NOT NULL,
  image_path VARCHAR(255),
  description TEXT,
  id_film INT,
  PRIMARY KEY (id),
  KEY (id_film),
  CONSTRAINT fk_film FOREIGN KEY (id_film) REFERENCES films(id)
);

-- Table raretes
CREATE TABLE raretes (
  id_rarete INT NOT NULL AUTO_INCREMENT,
  libelle VARCHAR(50) NOT NULL,
  quantite INT NOT NULL DEFAULT 0,
  PRIMARY KEY (id_rarete)
);

-- Table utilisateurs
CREATE TABLE utilisateurs (
  id INT NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  image_collection VARCHAR(255),
  titre_collection VARCHAR(100),
  date_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  password VARCHAR(255) NOT NULL,
  is_admin TINYINT DEFAULT 0,
  PRIMARY KEY (id)
);

-- Table utilisateurs_cartes_animes
CREATE TABLE utilisateurs_cartes_animes (
  user_id INT NOT NULL,
  carte_id INT NOT NULL,
  quantite INT NOT NULL DEFAULT 1,
  PRIMARY KEY (user_id, carte_id),
  KEY (carte_id)
);

-- Table utilisateurs_cartes_films
CREATE TABLE utilisateurs_cartes_films (
  user_id INT NOT NULL,
  carte_id INT NOT NULL,
  quantite INT NOT NULL DEFAULT 0,
  PRIMARY KEY (user_id, carte_id)
);

-- Table favoris
CREATE TABLE utilisateurs_cartes_favori (
  user_id INT NOT NULL,
  carte_id INT NOT NULL,
  type ENUM('anime', 'film') NOT NULL,
  PRIMARY KEY (user_id, carte_id, type)
);

-- Table wishlist
CREATE TABLE utilisateurs_cartes_wishlist (
  user_id INT NOT NULL,
  carte_id INT NOT NULL,
  type ENUM('anime', 'film') NOT NULL,
  PRIMARY KEY (user_id, carte_id, type)
);

-- Table badges
CREATE TABLE badges (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  description TEXT,
  image_path VARCHAR(255),
  PRIMARY KEY (id)
);

-- Table utilisateurs_badges
CREATE TABLE utilisateurs_badges (
  user_id INT NOT NULL,
  badge_id INT NOT NULL,
  date_obtention DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id, badge_id),
  FOREIGN KEY (user_id) REFERENCES utilisateurs(id),
  FOREIGN KEY (badge_id) REFERENCES badges(id)
);

-- Table cartes_logs
CREATE TABLE cartes_logs (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  carte_id INT NOT NULL,
  type ENUM('anime', 'film') NOT NULL,
  action ENUM('ajout', 'suppression', 'modification') NOT NULL,
  date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES utilisateurs(id)
);
