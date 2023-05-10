-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for b00128390
DROP DATABASE IF EXISTS `b00128390`;
CREATE DATABASE IF NOT EXISTS `b00128390` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `b00128390`;

-- Dumping structure for table b00128390.booking
DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookedprodquantity` int DEFAULT NULL,
  `bookeddate` date DEFAULT NULL,
  `bookedtime` time DEFAULT NULL,
  `productid` int DEFAULT NULL,
  `venueid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`),
  KEY `venueid` (`venueid`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`venueid`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` char(15) DEFAULT NULL,
  `surname` char(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `addressline1` varchar(40) DEFAULT NULL,
  `addressline2` varchar(40) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `eircode` varchar(7) DEFAULT NULL,
  `cardno` bigint DEFAULT NULL,
  `cardexpiry` varchar(7) DEFAULT NULL,
  `cvv` int DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_customer_user_unique` (`userid`),
  CONSTRAINT `FK_customer_user` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.custommenu
DROP TABLE IF EXISTS `custommenu`;
CREATE TABLE IF NOT EXISTS `custommenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `custommenuname` varchar(20) DEFAULT NULL,
  `description` text,
  `customerid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customerid` (`customerid`),
  CONSTRAINT `custommenu_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.custommenulog
DROP TABLE IF EXISTS `custommenulog`;
CREATE TABLE IF NOT EXISTS `custommenulog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menuitemid` int DEFAULT NULL,
  `custommenuid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menuitemid` (`menuitemid`),
  KEY `custommenuid` (`custommenuid`),
  CONSTRAINT `custommenulog_ibfk_1` FOREIGN KEY (`menuitemid`) REFERENCES `menuitem` (`id`),
  CONSTRAINT `custommenulog_ibfk_2` FOREIGN KEY (`custommenuid`) REFERENCES `custommenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventdate` date DEFAULT NULL,
  `eventtime` time DEFAULT NULL,
  `orderplacedon` datetime DEFAULT NULL,
  `eventordertotal` decimal(8,2) DEFAULT NULL,
  `eventdiscount` int DEFAULT NULL,
  `numOfGuests` int DEFAULT NULL,
  `venueid` int DEFAULT NULL,
  `customerid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `standardmenuid` int DEFAULT NULL,
  `custommenuid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `eventstatus` varchar(7) DEFAULT NULL,
  `eventname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `venueid` (`venueid`),
  KEY `customerid` (`customerid`),
  KEY `userid` (`userid`),
  KEY `standardmenuid` (`standardmenuid`),
  KEY `custommenuid` (`custommenuid`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`venueid`) REFERENCES `venue` (`id`),
  CONSTRAINT `event_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`),
  CONSTRAINT `event_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  CONSTRAINT `event_ibfk_4` FOREIGN KEY (`standardmenuid`) REFERENCES `standardmenu` (`id`),
  CONSTRAINT `event_ibfk_5` FOREIGN KEY (`custommenuid`) REFERENCES `custommenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.eventproductlog
DROP TABLE IF EXISTS `eventproductlog`;
CREATE TABLE IF NOT EXISTS `eventproductlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventdate` date DEFAULT NULL,
  `eventproductquantity` int DEFAULT NULL,
  `eventid` int DEFAULT NULL,
  `productid` int DEFAULT NULL,
  `totalcost` decimal(8,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventid` (`eventid`),
  KEY `productid` (`productid`),
  CONSTRAINT `eventproductlog_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `event` (`id`),
  CONSTRAINT `eventproductlog_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.menuitem
DROP TABLE IF EXISTS `menuitem`;
CREATE TABLE IF NOT EXISTS `menuitem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menuitemname` varchar(20) DEFAULT NULL,
  `menuitemdesc` tinytext,
  `menuitemnutrition` tinytext,
  `menuitemallergens` tinytext,
  `menuitemcost` decimal(8,2) DEFAULT NULL,
  `menuitemimglink` longblob,
  `userid` int DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `menuitem_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productname` char(15) DEFAULT NULL,
  `producttype` char(15) DEFAULT NULL,
  `productdesc` tinytext,
  `productcost` decimal(18,2) DEFAULT NULL,
  `productlocation` varchar(30) DEFAULT NULL,
  `productquantity` int DEFAULT NULL,
  `productimg` longblob,
  `userid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.project
DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.roster
DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rostershiftdate` date DEFAULT NULL,
  `shiftid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shiftid` (`shiftid`),
  KEY `userid` (`userid`),
  CONSTRAINT `roster_ibfk_1` FOREIGN KEY (`shiftid`) REFERENCES `shift` (`id`),
  CONSTRAINT `roster_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.shift
DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `id` int NOT NULL AUTO_INCREMENT,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.standardmenu
DROP TABLE IF EXISTS `standardmenu`;
CREATE TABLE IF NOT EXISTS `standardmenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `standardmenuname` varchar(20) DEFAULT NULL,
  `style` varchar(20) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `description` text,
  `userid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `standardmenu_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.standardmenuimages
DROP TABLE IF EXISTS `standardmenuimages`;
CREATE TABLE IF NOT EXISTS `standardmenuimages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `standardmenuid` int DEFAULT NULL,
  `imagefile` longblob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `standardmenuid` (`standardmenuid`),
  CONSTRAINT `standardmenuimages_ibfk_1` FOREIGN KEY (`standardmenuid`) REFERENCES `standardmenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.standardmenulog
DROP TABLE IF EXISTS `standardmenulog`;
CREATE TABLE IF NOT EXISTS `standardmenulog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menuitemid` int DEFAULT NULL,
  `standardmenuid` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menuitemid` (`menuitemid`),
  KEY `standardmenuid` (`standardmenuid`),
  CONSTRAINT `standardmenulog_ibfk_1` FOREIGN KEY (`menuitemid`) REFERENCES `menuitem` (`id`),
  CONSTRAINT `standardmenulog_ibfk_2` FOREIGN KEY (`standardmenuid`) REFERENCES `standardmenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.standardmenurating
DROP TABLE IF EXISTS `standardmenurating`;
CREATE TABLE IF NOT EXISTS `standardmenurating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `standardmenuid` int DEFAULT NULL,
  `customerid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `standardmenuid` (`standardmenuid`),
  KEY `customerid` (`customerid`),
  CONSTRAINT `standardmenurating_ibfk_1` FOREIGN KEY (`standardmenuid`) REFERENCES `standardmenu` (`id`),
  CONSTRAINT `standardmenurating_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(20) DEFAULT NULL,
  `firstname` char(15) DEFAULT NULL,
  `surname` char(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `addressline1` varchar(40) DEFAULT NULL,
  `addressline2` varchar(40) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `eircode` varchar(7) DEFAULT NULL,
  `iban` varchar(30) DEFAULT NULL,
  `bic` varchar(20) DEFAULT NULL,
  `lisenceno` int DEFAULT NULL,
  `insurance` int DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.venue
DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `venuename` varchar(40) DEFAULT NULL,
  `addressline1` varchar(40) DEFAULT NULL,
  `addressline2` varchar(40) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `eircode` varchar(7) DEFAULT NULL,
  `indoor` tinyint(1) DEFAULT NULL,
  `humancapacity` int DEFAULT NULL,
  `costtorent` decimal(8,2) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for view b00128390.venueevents
DROP VIEW IF EXISTS `venueevents`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `venueevents` (
	`title` VARCHAR(40) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`date` VARCHAR(19) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`venueid` INT(10) NULL,
	`id` INT(10) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table b00128390.venueimages
DROP TABLE IF EXISTS `venueimages`;
CREATE TABLE IF NOT EXISTS `venueimages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `venueid` int DEFAULT NULL,
  `imagefile` longblob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `venueid` (`venueid`),
  CONSTRAINT `venueimages_ibfk_1` FOREIGN KEY (`venueid`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table b00128390.venuerating
DROP TABLE IF EXISTS `venuerating`;
CREATE TABLE IF NOT EXISTS `venuerating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `venueid` int DEFAULT NULL,
  `customerid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `venueid` (`venueid`),
  KEY `customerid` (`customerid`),
  CONSTRAINT `venuerating_ibfk_1` FOREIGN KEY (`venueid`) REFERENCES `venue` (`id`),
  CONSTRAINT `venuerating_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for trigger b00128390.createCustomer
DROP TRIGGER IF EXISTS `createCustomer`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `createCustomer` AFTER INSERT ON `users` FOR EACH ROW BEGIN
   INSERT INTO customer (username, email, userid, created_at)
   VALUES (NEW.name, NEW.email, NEW.id, NOW());
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view b00128390.venueevents
DROP VIEW IF EXISTS `venueevents`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `venueevents`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `venueevents` AS select `venue`.`venuename` AS `title`,date_format(concat(`event`.`eventdate`,' ',`event`.`eventtime`),'%Y-%m-%dT%T') AS `date`,`event`.`venueid` AS `venueid`,`event`.`id` AS `id` from (`venue` join `event`) where (`venue`.`id` = `event`.`venueid`);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
