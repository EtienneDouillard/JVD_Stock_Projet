CREATE TABLE IF NOT EXISTS `produit` (
  `ref` text NOT NULL,
  `libelle` text NOT NULL,
  `qteTotale` int(11) NOT NULL,
  PRIMARY KEY (`ref`(30)));

CREATE TABLE IF NOT EXISTS `lot` (
  `reference` varchar(50) NOT NULL,
  `numero` int(255) NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(100) NOT NULL,
  `qte` int(255) NOT NULL,
  PRIMARY KEY (`numero`,`reference`),
  FOREIGN KEY (reference) REFERENCES produit(ref));