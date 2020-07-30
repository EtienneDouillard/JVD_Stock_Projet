CREATE TABLE IF NOT EXISTS `lot` (
  `id_lot` int AUTO_INCREMENT,
  `reference` varchar(50),
  `numero` int(255),
  `emplacement` varchar(100),
  `qte` int(255),
  constraint pk_lot primary key (id_lot));