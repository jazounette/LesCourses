CREATE DATABASE IF NOT EXISTS `lescourses`;
USE `lescourses`;

CREATE TABLE `courses_prods` (
   `id_prod`   INT NOT NULL AUTO_INCREMENT,
   `zone`		INT,
   `describ`	VARCHAR(33) COLLATE UTF8_GENERAL_CI,
   `prix`		FLOAT,
   PRIMARY KEY (`id_prod`)
);

CREATE TABLE `courses_liste` (
   `id_list`	INT NOT NULL AUTO_INCREMENT,
   `id_prod`   INT,
   PRIMARY KEY (`id_list`),
   FOREIGN KEY (`id_prod`) REFERENCES `courses_prods` (`id_prod`)
);

CREATE TABLE `courses_zones` (
   `id_zone`      INT NOT NULL,
   `nom_zone`     VARCHAR(33) COLLATE UTF8_GENERAL_CI,
   `coulbck`      CHAR(6),
   `coultxt`      CHAR(6),
   PRIMARY KEY (`id_zone`)
);

INSERT INTO `courses_prods` VALUES 
   ( NULL, 100, "farine", 1.25 ),
   ( NULL, 150, "chocolat", 3.75 ),
   ( NULL, 200, "cassoulet", 11.11 ),
   ( NULL, 300, "Chimay", 1.94 ),
   ( NULL, 400, "viande haché", 5.95 ),
   ( NULL, 500, "carotte", 0.91 ),
   ( NULL, 550, "pain", 0.89 ),
   ( NULL, 600, "caprice", 3.64 ),
   ( NULL, 600, "lait", 6.09 ),
   ( NULL, 600, "oeufs", 1.77 ),
   ( NULL, 650, "pain mie", 1.82 ),
   ( NULL, 650, "jambon", 5.15 ),
   ( NULL, 700, "tahiti", 5.55 ),
   ( NULL, 800, "graine de tournesol", 4.95 ),
   ( NULL, 800, "Papier cul (PQ)", 3.33 ),
   ( NULL, 900, "picolini", 4.44 ),
   ( NULL, 900, "buns", 3.69 ),
   ( NULL, 900, "frittes", 6.66 );

INSERT INTO `courses_zones` VALUES
   ( 100, "ÉpicerieA", "000088", "ffff00"),
   ( 150, "ÉpicerieB", "000088", "ffff00"),
   ( 200, "ÉpicerieC", "000088", "ffff00"),
   ( 300, "Boissons", "00ff00", "000000"),
   ( 400, "Boucherie", "ff0000", "ffffff"),
   ( 500, "Fruits & Légumes", "008800", "000000"),
   ( 550, "Boulangerie", "888888", "000000"),
   ( 600, "Crémerie", "880088", "ffffff"),
   ( 650, "Produits Frais Lib Serv", "0000ff", "ffffff"),
   ( 700, "Hygiène", "880000", "ffffff"),
   ( 800, "Entretien", "ffff00", "000000"),
   ( 900, "Surgelés", "ffffff", "000000"),
   ( 999, "Divers", "ff88ff", "000000");

--100    épicerieA   farine, nes, prince, confiture
--150    épicerieB   choco, madeilene
--200    épicerieC   cassoulet
--650    PFLS        jambon, pain mie
--800    entretien   produits ménagés, pq, graines tournesol, paic citron

INSERT INTO `courses_liste` VALUES ( NULL, 4);
