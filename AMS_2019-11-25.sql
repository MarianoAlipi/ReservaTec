# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.17)
# Base de datos: AMS
# Tiempo de Generación: 2019-11-25 22:59:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# Volcado de tabla Users
# ------------------------------------------------------------

USE AMS;

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
	(4,'test2','2222'),
	(5,'A01382469','111111'),
	(6,'A01234566','121212'),
	(7,'A00822247','123');

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
	(12,'1',201,30),
	(13,'CIAP',102,30),
	(14,'CIAP',103,30),
	(15,'CIAP',105,35),
	(16,'CIAP',106,35),
	(17,'1',301,30),
	(18,'1',302,30),
	(19,'1',303,25),
	(20,'1',304,25),
	(21,'1',305,30),
	(22,'1',401,30),
	(23,'1',402,30),
	(24,'1',403,30),
	(25,'1',404,25),
	(26,'1',405,30),
	(27,'2',101,30),
	(28,'2',102,30),
	(29,'2',103,30),
	(30,'2',301,25);

/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

# Volcado de tabla rentas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rentas`;

CREATE TABLE `rentas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSalon` int(11) unsigned DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaFinal` datetime DEFAULT NULL,
  `userID` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userID`) REFERENCES `Users`(`id`),
  FOREIGN KEY (`idSalon`) REFERENCES `rooms`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `rentas` WRITE;
/*!40000 ALTER TABLE `rentas` DISABLE KEYS */;

INSERT INTO `rentas` (`id`, `idSalon`, `fechaInicio`, `fechaFinal`, `userID`)
VALUES
	(1,1,'2019-11-24T12:00:00','2019-11-24T12:30:00',1),
	(2,2,'2019-11-24T14:30:00','2019-11-24T16:00:00',2),
	(3,3,'2019-11-24T08:00:00','2019-11-24T11:00:00',1),
	(4,4,'2019-11-26T10:30:00','2019-11-26T11:30:00',1),
	(5,8,'2019-11-28T18:00:00','2019-11-28T19:30:00',2),
	(6,11,'2019-11-28T13:00:00','2019-11-28T14:30:00',7);

/*!40000 ALTER TABLE `rentas` ENABLE KEYS */;
UNLOCK TABLES;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
