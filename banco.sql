
SET NAMES utf8 ;


DROP TABLE IF EXISTS `carro`;

SET character_set_client
= utf8mb4 ;
CREATE TABLE `carro`
(
  `idcarro` int
(11) NOT NULL,
  `placa` varchar
(45) DEFAULT NULL,
  `modelo` varchar
(45) DEFAULT NULL,
  `diaria` double DEFAULT NULL,
  `cidade` varchar
(45) DEFAULT NULL,
  `alugado` int
(1) DEFAULT NULL,
  PRIMARY KEY
(`idcarro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `
carro`
VALUES
  (1, 'abc123', 'celta rebaixado', 125, 'Rio de Janeiro', 0),
  (2, 'cba321', 'corsa bolado', 126, 'Belford Roxo', 0),
  (3, 'abc321', 'chevette tunado', 300, 'Nova iguaçu', 0),
  (4, 'cba123', 'uno + escada', 300, 'São João de Meriti', 0),
  (5, 'def456', 'celta rebaixado', 125, 'Belford Roxo', 0),
  (6, 'fed456', 'corsa bolado', 126, 'Rio de Janeiro', 0),
  (7, 'def654', 'chevette tunado', 300, 'São João de Meriti', 0),
  (8, 'fed654', 'uno + escada', 300, 'Nova iguaçu', 0);


DROP TABLE IF EXISTS `loja`;

SET character_set_client
= utf8mb4 ;
CREATE TABLE `loja`
(
  `idloja` int
(11) NOT NULL,
  `nome` varchar
(45) DEFAULT NULL,
  `cidade` varchar
(45) DEFAULT NULL,
  PRIMARY KEY
(`idloja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `
loja`
VALUES
  (1, 'loja ABC', 'Belford Roxo'),
  (2, 'loja CBA', 'Belford Roxo'),
  (3, 'loja BAC', 'Rio de Janeiro'),
  (4, 'loja BCA', 'São João de Meriti'),
  (5, 'loja CAB', 'Nova iguaçu');

DROP TABLE IF EXISTS `alocacao`;

SET character_set_client
= utf8mb4 ;
CREATE TABLE `alocacao`
(
  `idalocacao` int
(11) NOT NULL AUTO_INCREMENT,
  `CPF_cliente` varchar
(45) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `lojaRetirada` int
(11) DEFAULT NULL,
  `carro` int
(11) NOT NULL,
  PRIMARY KEY
(`idalocacao`),
  KEY `carroalugado_idx`
(`carro`),
  KEY `lojaRetiradaCarro_idx`
(`lojaRetirada`),
  KEY `retiracarro_idx`
(`lojaRetirada`),
  CONSTRAINT `carroalugado` FOREIGN KEY
(`carro`) REFERENCES `carro`
(`idcarro`),
  CONSTRAINT `retiraCarros` FOREIGN KEY
(`lojaRetirada`) REFERENCES `loja`
(`idloja`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;