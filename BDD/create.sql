CREATE TABLE `lot` (
  `reference` varchar(50) NOT NULL,
  `numero` int(255) NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `qte` int(255) NOT NULL,
  PRIMARY KEY (`reference`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ref` (
  `id_ref` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `emplacement` (
  `id_ref` int(11) NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ref`, `emplacement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ref`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`ref`) REFERENCES `lot` (`reference`);

ALTER TABLE `emplacement`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`id_ref`) REFERENCES `ref` (`id_ref`);