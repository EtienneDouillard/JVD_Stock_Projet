CREATE TABLE IF NOT EXISTS `produit` (
  reference varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `qteTotale` int(11) NOT NULL,
  constraint pk_produit primary key (reference));

CREATE TABLE IF NOT EXISTS `lot` (
  `reference` varchar(50) NOT NULL,
  `numero` int(255) NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(100) NOT NULL,
  `qte` int(255) NOT NULL,
  constraint pk_lot primary key (numero,reference),
  constraint fk_lot_produit foreign key (reference) references produit(reference));