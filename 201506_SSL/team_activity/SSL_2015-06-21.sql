# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: SSL
# Generation Time: 2015-06-21 13:04:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `empId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empFName` varchar(50) DEFAULT NULL,
  `empLName` varchar(50) DEFAULT NULL,
  `empPhone` varchar(50) DEFAULT NULL,
  `empEmail` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`empId`, `empFName`, `empLName`, `empPhone`, `empEmail`, `username`, `password`)
VALUES
	(13,'Daffy','Duck','555-1234','daffy@wb.com','daffy','96b70bd61bba64d060891c9b71298aa2'),
	(14,'Elmer','Fudd','555-1235','elmer@wb.com','bugs','96b70bd61bba64d060891c9b71298aa2'),
	(15,'Porky','Pig','555-1236','porky@wb.com','porky','96b70bd61bba64d060891c9b71298aa2'),
	(16,'Bugs','Bunny','555-1237','bugs@wb.com','bugs','96b70bd61bba64d060891c9b71298aa2'),
	(17,'Tweety','Bird','555-1238','tweety@wb.com','tweety','96b70bd61bba64d060891c9b71298aa2'),
	(18,'Pepe','LePew','555-1239','pepe@wb.com','pepe','96b70bd61bba64d060891c9b71298aa2'),
	(19,'Yosemite','Sam','555-1240','yosemite@wb.com','yosemite','96b70bd61bba64d060891c9b71298aa2'),
	(20,'Foghorn','Leghorn','555-1241','foghorn@wb.com','foghorn','96b70bd61bba64d060891c9b71298aa2'),
	(21,'Marvin','Martian','555-1242','marvin@wb.com','marvin','96b70bd61bba64d060891c9b71298aa2'),
	(22,'Road','Runner','555-1243','beepbeep@wb.com','beepbeep','96b70bd61bba64d060891c9b71298aa2'),
	(23,'Wiley','Coyote','555-1244','wiley@wb.com','wiley','96b70bd61bba64d060891c9b71298aa2');

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
