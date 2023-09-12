# ************************************************************
# Sequel Ace SQL dump
# Version 20050
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.0.3-MariaDB-1:11.0.3+maria~ubu2204)
# Database: Collection
# Generation Time: 2023-09-12 12:21:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Positions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Positions`;

CREATE TABLE `Positions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Positions` WRITE;
/*!40000 ALTER TABLE `Positions` DISABLE KEYS */;

INSERT INTO `Positions` (`id`, `PositionName`)
VALUES
	(1,'Goalkeeper'),
	(2,'Defender'),
	(3,'Midfielder'),
	(4,'Forward');

/*!40000 ALTER TABLE `Positions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table PremierLeagueCards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PremierLeagueCards`;

CREATE TABLE `PremierLeagueCards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PlayerName` varchar(255) DEFAULT NULL,
  `Club` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `Defence` int(11) DEFAULT NULL CHECK (`Defence` >= 0 and `Defence` <= 100),
  `Control` int(11) DEFAULT NULL CHECK (`Control` >= 0 and `Control` <= 100),
  `Attack` int(11) DEFAULT NULL CHECK (`Attack` >= 0 and `Attack` <= 100),
  `Total` int(11) GENERATED ALWAYS AS (`Defence` + `Control` + `Attack`) STORED,
  `Deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `PremierLeagueCards` WRITE;
/*!40000 ALTER TABLE `PremierLeagueCards` DISABLE KEYS */;

INSERT INTO `PremierLeagueCards` (`id`, `PlayerName`, `Club`, `Position`, `Defence`, `Control`, `Attack`, `Deleted`)
VALUES
	(1,'Lisandro Martínez','Man Utd',2,86,85,67,0),
	(2,'Rafael Varane','Man Utd',2,88,79,60,0),
	(3,'Bruno Fernandes','Man Utd',3,67,92,84,0),
	(4,'Marcus Rashford','Man Utd',4,64,88,89,0),
	(5,'William Saliba','Arsenal',2,85,70,50,0),
	(6,'Raheem Sterling','Chelsea',4,65,85,92,0),
	(7,'Mo Salah','Liverpool',4,58,90,95,0),
	(8,'Erling Haaland','Man City',4,60,75,96,0),
	(9,'Dean Henderson','Crystal Palace',1,92,80,50,0),
	(10,'James Maddison','Tottenham',3,70,88,82,0),
	(11,'Jordan Pickford','Everton',1,88,75,50,0),
	(12,'Joe Worral','Nottingham Forest',2,80,65,45,0),
	(13,'Sean Logstaff','Newcastle',3,70,80,75,0),
	(14,'Fabio Silva','Wolves',4,55,68,78,0),
	(15,'Andreas Pereira','Fulham',3,68,84,77,0),
	(16,'Antony','Man Utd',4,66,78,81,0),
	(17,'John Stones','Man City',2,83,80,69,0),
	(18,'John Stones','Man City',2,83,80,71,1),
	(19,'Kyle Walker','Man City',2,83,74,79,0),
	(20,'Aaron Ramsdale','Arsenal',1,84,74,60,1),
	(21,'Aaron Ramsdale','Arsenal',1,84,74,60,1),
	(22,'Aaron Ramsdale','Arsenal',1,84,74,60,0),
	(23,'Aaron Ramsdale','Arsenal',1,84,74,60,1),
	(24,'Aaron Ramsdale','Arsenal',1,84,74,60,1),
	(25,'Aaron Ramsdale','Arsenal',1,86,74,77,1),
	(26,'Bukayo Saka','Arsenal',4,74,80,83,0);

/*!40000 ALTER TABLE `PremierLeagueCards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
