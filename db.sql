--  Création de la base de données
CREATE DATABASE `gestion_taches` ;
USE `gestion_taches`;

--  Création de la table des tâches
CREATE TABLE `taches` (
  `id_tache` INT NOT NULL AUTO_INCREMENT ,
  `libelle` VARCHAR(255) NOT NULL,
  `date_debut` DATE NOT NULL,
  `date_fin` DATE NOT NULL,
  `description` TEXT NOT NULL,
  `statut` ENUM('En cours','Terminee') NOT NULL DEFAULT 'En cours',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_tache)
)

--  Insertion de données de test
INSERT INTO `taches` (`libelle`, `date_debut`, `date_fin`, `description`, `statut`) VALUES
('Faire des courses', '2026-03-13', '2026-03-20', 'Acheter du lait, du pain', 'En cours'),
('Rédiger le rapport MVC', '2026-03-15', '2026-03-18', 'Finir la documentation du projet PHP', 'Terminer');

