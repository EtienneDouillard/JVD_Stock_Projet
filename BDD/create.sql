CREATE TABLE `reference` (
  `id_ref` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ref`)
);
CREATE TABLE `lot` (
  `id_lot` int(50) NOT NULL AUTO_INCREMENT,
  `id_ref` int(255) NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `qte` int(255) NOT NULL,
  PRIMARY KEY (`id_lot`),
  CONSTRAINT `fk_lot_reference` FOREIGN KEY (`id_ref`) REFERENCES `reference`(`id_ref`)
);
-- CREATE TABLE `emplacement` (
--   `id_ref` int(11) NOT NULL AUTO_INCREMENT,
--   `emplacement` varchar(50) NOT NULL,
--   PRIMARY KEY (`id_ref`, `emplacement`)
-- );