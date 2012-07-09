-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-07-09 17:06:38
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for tuks
CREATE DATABASE IF NOT EXISTS `tuks` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tuks`;


-- Dumping structure for table tuks.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`,`member_id`),
  KEY `FK_attendance_member` (`member_id`),
  CONSTRAINT `FK_attendance_event_categories` FOREIGN KEY (`category_id`) REFERENCES `event_category` (`id`),
  CONSTRAINT `FK_attendance_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tuks.attendance: ~0 rows (approximately)
DELETE FROM `attendance`;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;


-- Dumping structure for table tuks.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tuks.event: ~0 rows (approximately)
DELETE FROM `event`;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table tuks.event_category
CREATE TABLE IF NOT EXISTS `event_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `weapon` enum('Epee','Foil','Saber') NOT NULL,
  `age` enum('U13','U15','U18','U20') NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_categories_event` (`event_id`),
  CONSTRAINT `FK_event_categories_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tuks.event_category: ~0 rows (approximately)
DELETE FROM `event_category`;
/*!40000 ALTER TABLE `event_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_category` ENABLE KEYS */;


-- Dumping structure for table tuks.member
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` char(36) NOT NULL,
  `salt` char(36) NOT NULL,
  `birth_date` date NOT NULL,
  `weapons` set('Epee','Foil','Saber') NOT NULL,
  `get_invites` enum('Y','N') NOT NULL DEFAULT 'Y',
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tuks.member: ~0 rows (approximately)
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
/*!40000 ALTER TABLE `member` ENABLE KEYS */;


-- Dumping structure for table tuks.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table tuks.news: ~0 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `author`, `date`, `content`, `title`) VALUES
	(1, 0, '2012-07-09 16:56:43', 'This is the first news on the site', 'The First');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
