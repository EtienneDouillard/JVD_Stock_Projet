CREATE TABLE IF NOT EXISTS `lot` (
  `id_lot` int AUTO_INCREMENT,
  `reference` varchar(50) NOT NULL,
  `numero` int(255) NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `qte` int(255) NOT NULL,
  constraint pk_lot primary key (id_lot));