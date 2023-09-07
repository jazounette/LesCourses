CREATE DATABASE IF NOT EXISTS `lescourses`;
USE `lescourses`;

CREATE TABLE `courses_prods` (
   `id_prod`   INT NOT NULL AUTO_INCREMENT,
   `zone`		INT,
   `describ`	VARCHAR(33),
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
   `id_zone`      INT,
   `nom_zone`     VARCHAR(33)
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
   ( 100, "ÉpicerieA"),
   ( 150, "ÉpicerieB"),
   ( 200, "ÉpicerieC"),
   ( 300, "Boissons"),
   ( 400, "Boucherie"),
   ( 500, "Fruits & Légumes"),
   ( 550, "Boulangerie"),
   ( 600, "Crémerie"),
   ( 650, "Produits Frais Lib Serv"),
   ( 700, "Hygiène"),
   ( 800, "Entretien"),
   ( 900, "Surgelés"),
   ( 999, "Divers");

--100    épicerieA   farine, nes, prince, confiture
--150    épicerieB   choco, madeilene
--200    épicerieC   cassoulet
--650    PFLS        jambon, pain mie
--800    entretien   produits ménagés, pq, graines tournesol, paic citron

INSERT INTO `courses_liste` VALUES ( NULL, 4);
