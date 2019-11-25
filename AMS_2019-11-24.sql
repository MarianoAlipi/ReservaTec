# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.17)
# Base de datos: AMS
# Tiempo de Generación: 2019-11-25 00:05:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE AMS;

# Volcado de tabla Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`id`, `name`, `password`)
VALUES
	(1,'root','080197'),
	(2,'test','0000'),
	(3,'test1','1111'),
	(4,'test2','2222');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

# Volcado de tabla rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `edificio` varchar(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;

INSERT INTO `rooms` (`id`, `edificio`, `numero`, `capacidad`)
VALUES
	(1,'3',101,40),
	(2,'5',101,30),
	(3,'3',102,40),
	(4,'3',103,30),
	(5,'3',104,30),
	(6,'3',105,30),
	(7,'3',106,25),
	(8,'3',107,35),
	(9,'3',108,30),
	(10,'1',101,30),
	(11,'1',102,30),
	(12,'1',201,30);

/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

# Volcado de tabla rentas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rentas`;

CREATE TABLE `rentas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSalon` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `rentas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Users` (`id`),
  CONSTRAINT `rentas_ibfk_2` FOREIGN KEY (`id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `rentas` WRITE;
/*!40000 ALTER TABLE `rentas` DISABLE KEYS */;

INSERT INTO `rentas` (`id`, `idSalon`, `fechaInicio`, `fechaFinal`, `userID`)
VALUES
	(1,1,'2019-11-24','2019-11-24',1),
	(2,2,'2019-11-24','2019-11-24',2),
	(3,3,'2019-11-24','2019-11-24',1),
	(4,4,'2019-11-26','2019-11-26',1);

/*!40000 ALTER TABLE `rentas` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
