
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `driver_truck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver_truck` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driverid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recived` date NOT NULL,
  `date_detach` date DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_truck_driverid_index` (`driverid`),
  KEY `driver_truck_plate_index` (`plate`),
  CONSTRAINT `driver_truck_driverid_foreign` FOREIGN KEY (`driverid`) REFERENCES `drivers` (`driverid`),
  CONSTRAINT `driver_truck_plate_foreign` FOREIGN KEY (`plate`) REFERENCES `trucks` (`plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `driver_truck` WRITE;
/*!40000 ALTER TABLE `driver_truck` DISABLE KEYS */;
/*!40000 ALTER TABLE `driver_truck` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drivers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `driverid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT 0,
  `birthdate` date NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `woreda` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebele` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `housenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hireddate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers_driverid_index` (`driverid`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'101','Ermias Teshome',1,'2019-10-09','AA','Nifas Silk','150','1','0977777777','2019-10-09',1,'0000-00-00 00:00:00','2019-10-09 14:05:33'),(2,'102','Fetene Alemayehu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'103','Fekadu Ejigu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'104','GebreGiorgis Woldu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'105','Hagos Zewdu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'106','Mesfin Ambesse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'107','Mokonnene Jembere',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'108','Mokonnen G/Mikale',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'109','Tesfaye G/Kerstos',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'110','Sisay Widineh',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'111','Endazene Geleta',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'112','Tium Abdu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'113','Worku Ayalew',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'114','Fantahun Adissu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'115','Endale Zewda',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'116','Abebe Mulugeta',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'117','Abebe Alebachew',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'118','Abera Bedada',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'119','Abreha Abebe',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'120','Eframe Kebede',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'121','Ambaye Tefera',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'122','Asfaw Befikadu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'123','Asmer Wodajenew',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'124','Berhana  Berhe',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'125','Danial  Germaw',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'126','Desalgn Adane',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'127','Eskinder Tefera',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'128','Fitsum Hadgo',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'129','G/Egziabher Aberha',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'130','G/Hiwot Hagos',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'131','G/Medhin H/Mari',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'132','Gashaw Abegaz',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'133','Girma Bezabih',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'134','Girma Tadesse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'135','Hagos Araya',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'136','Hagos Zewdu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'137','Kesisa Rahmato',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'138','Mengistu Mola',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'139','Lemecha  Oma',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'140','Mamo Kebede',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'141','Mengistu Mola',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'142','Mesele Abade',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'143','Mesfin Desta',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'144','Mesfin Fikru',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'145','Meteku Gelaw',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'146','Mezgebe Assfeha',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'147','Mitiku Yimer',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'148','Mulate Debela',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'149','Mulualem Tadesse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'150','Mulugeta G/Georgis',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'151','Shimels  Tadesse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'152','Shimels Demisse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'153','Sisay K/Mariam',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'154','Sisinyos Teshome',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'155','Solomon Tsegaye',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,'156','Suid Umer',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'157','Tekie Kidanu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'158','Tesfaye Getahun',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'159','Tesfaye Shibeshi',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'160','Yohannes H/Gebreal',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,'161','Yosef Ayalew',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'162','Zerihun Teklu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,'163','Zewudu Aleka',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,'164','Adem Negewa',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,'165','Belachew Chane',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,'166','Elias Negash',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'167','Gezahegen Tefera',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'168','Hadish Gaiem',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'169','Haile Tesfaye',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'170','Kinfemariam Enatu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'171','Kiros G/Michael',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'172','Legesse Hailu',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,'173','Mehari Araya',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'174','T/Haimanot G/Sillasse',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'175','Tadissu Negash',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'176','Tesfaye Kebede',1,'0000-00-00','AA','Nifas Silk ','150','1','977777777','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (61,'2014_10_12_000000_create_users_table',1),(62,'2014_10_12_100000_create_password_resets_table',1),(63,'2019_04_26_144309_create_trucks_table',1),(64,'2019_05_01_153410_create_vehecletypes_table',1),(65,'2019_05_04_094633_create_drivers_table',1),(66,'2019_05_04_131508_create_operations_table',1),(67,'2019_05_04_151405_create_customers_table',1),(68,'2019_05_04_152106_create_regions_table',1),(69,'2019_05_05_080818_create_statuses_table',1),(70,'2019_05_05_083302_create_statustypes_table',1),(71,'2019_05_07_183529_create_performances_table',1),(72,'2019_05_08_145526_create_driver_truck_table',1),(73,'2019_05_09_084348_create_places_table',1),(74,'2019_06_04_071612_create_performance_by_model_report_views',1),(75,'2019_10_08_072533_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (1,'App\\User',1),(2,'App\\User',1),(3,'App\\User',1);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `operationid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `volume` double(12,4) NOT NULL,
  `cargotype` tinyint(1) NOT NULL DEFAULT 1,
  `km` double(12,4) DEFAULT NULL,
  `tariff` double(12,4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `closed` tinyint(1) NOT NULL DEFAULT 1,
  `enddate` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `operations` WRITE;
/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `performance_by_model_report_views`;
/*!50001 DROP VIEW IF EXISTS `performance_by_model_report_views`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `performance_by_model_report_views` (
  `vehecletype_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `no` tinyint NOT NULL,
  `Trip` tinyint NOT NULL,
  `dwc` tinyint NOT NULL,
  `dwoc` tinyint NOT NULL,
  `Tone` tinyint NOT NULL,
  `KM` tinyint NOT NULL,
  `Tonek` tinyint NOT NULL,
  `fl` tinyint NOT NULL,
  `fib` tinyint NOT NULL,
  `Perdium` tinyint NOT NULL,
  `other` tinyint NOT NULL,
  `totla` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `performances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `LoadType` tinyint(1) NOT NULL,
  `FOnumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_id` int(11) NOT NULL,
  `driver_truck_id` int(11) NOT NULL,
  `DateDispach` date NOT NULL,
  `orgion_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `DistanceWCargo` double(12,4) NOT NULL,
  `tonkm` double(20,4) NOT NULL DEFAULT 0.0000,
  `DistanceWOCargo` double(12,4) DEFAULT NULL,
  `CargoVolumMT` double(12,4) DEFAULT NULL,
  `fuelInLitter` double(12,4) DEFAULT NULL,
  `fuelInBirr` double(12,4) DEFAULT NULL,
  `perdiem` double(12,4) DEFAULT NULL,
  `workOnGoing` double(12,4) DEFAULT NULL,
  `other` double(12,4) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satus` tinyint(1) NOT NULL DEFAULT 1,
  `is_returned` tinyint(1) NOT NULL DEFAULT 0,
  `returned_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performances_operation_id_index` (`operation_id`),
  KEY `performances_driver_truck_id_index` (`driver_truck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `performances` WRITE;
/*!40000 ALTER TABLE `performances` DISABLE KEYS */;
/*!40000 ALTER TABLE `performances` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'update truck','web','2019-10-08 15:32:13','2019-10-08 15:32:13'),(2,'create truck','web','2019-10-08 15:32:31','2019-10-08 15:32:31'),(3,'delete truck','web',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `places_region_id_index` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,2),(2,2),(3,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super','web','2019-10-08 15:31:37','2019-10-08 15:31:37'),(2,'admin','web','2019-10-08 15:32:13','2019-10-08 15:32:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `autoid` int(11) NOT NULL DEFAULT 1,
  `statustype_id` int(11) DEFAULT NULL,
  `plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerddate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `statustypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statustypes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusgroup` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `statustypes` WRITE;
/*!40000 ALTER TABLE `statustypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `statustypes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `trucks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trucks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehecletype_id` int(10) unsigned NOT NULL,
  `chasisNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engineNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tyreSyze` int(11) DEFAULT NULL,
  `serviceIntervalKM` double(12,4) DEFAULT NULL,
  `purchasePrice` double(12,4) DEFAULT NULL,
  `productionDate` date DEFAULT NULL,
  `serviceStartDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trucks_plate_index` (`plate`),
  KEY `trucks_vehecletype_id_index` (`vehecletype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `trucks` WRITE;
/*!40000 ALTER TABLE `trucks` DISABLE KEYS */;
INSERT INTO `trucks` VALUES (1,'10503',1,'12345','1258',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'10507',1,'12346','1259',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'10527',1,'12347','1260',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'10531',1,'12348','1261',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'10539',1,'12349','1262',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'10541',1,'12350','1263',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'9952',2,'12351','1264',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'9956',2,'12352','1265',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'9962',2,'12353','1266',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'9968',2,'12354','1267',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'9974',2,'12355','1268',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'9976',2,'12356','1269',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'9978',2,'12357','1270',18,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'9980',2,'12358','1271',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'9986',2,'12359','1272',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'9994',2,'12360','1273',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'9998',2,'12361','1274',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'10000',2,'12362','1275',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'10126',2,'12363','1276',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'10134',2,'12364','1277',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'10140',2,'12365','1278',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'10142',2,'12366','1279',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'10143',2,'12367','1280',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'10147',2,'12368','1281',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'10148',2,'12369','1282',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'10157',2,'12370','1283',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'10159',2,'12371','1284',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'10163',2,'12372','1285',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'10165',2,'12373','1286',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'10167',2,'12374','1287',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'10173',2,'12375','1288',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'10177',2,'12376','1289',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'10187',2,'12377','1290',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'10189',2,'12378','1291',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'10389',2,'12379','1292',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'10577',2,'12380','1293',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'10581',2,'12381','1294',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'11399',2,'12382','1295',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'43686',3,'12383','1296',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'43694',3,'12384','1297',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'44794',3,'12385','1298',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'45523',3,'12386','1299',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'47585',3,'12387','1300',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'47589',3,'12388','1301',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'47590',3,'12389','1302',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'47593',3,'12390','1303',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'47594',3,'12391','1304',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'53884',3,'12392','1305',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'53886',3,'12393','1306',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'53887',3,'12394','1307',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'53888',3,'12395','1308',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'53889',3,'12396','1309',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'94450',3,'12397','1310',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'94448',3,'12398','1311',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'94704',3,'12399','1312',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,'94739',3,'12400','1313',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'94744',3,'12401','1314',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'94745',3,'12402','1315',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'94783',3,'12403','1316',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'94796',3,'12404','1317',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,'94797',3,'12405','1318',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'95413',3,'12406','1319',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,'74922',4,'12407','1320',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,'74923',4,'12408','1321',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,'75101',4,'12409','1322',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,'75102',4,'12410','1323',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'75103',4,'12411','1324',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'75104',4,'12412','1325',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'75105',4,'12413','1326',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'75240',4,'12414','1327',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'75309',4,'12415','1328',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'76240',4,'12416','1329',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,'77217',4,'12417','1330',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'77218',4,'12418','1331',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'77289',4,'12419','1332',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'77290',4,'12420','1333',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,'77461',4,'12421','1334',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,'77462',4,'12422','1335',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,'77468',4,'12423','1336',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'77469',4,'12424','1337',16,10000.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'77484',4,'12425','1338',16,10001.0000,1000000.0000,'0000-00-00','0000-00-00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `trucks` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yetimesht Tadesse','yetimnew@gmail.com',NULL,'$2y$10$UFzSzUuWkipp9SnDdKQlmu6wioY8dtIqajWJBcaugFktRVlQZX8Va',NULL,0,'profile.png','h2kMK9EC0nmFwbNrIfZgjxJpcbfDAIuzq3DMfQvVxda7EzqxXlYU17FSGw5D','2019-10-08 15:30:40','2019-10-08 15:30:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `vehecletypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehecletypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productiondate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `vehecletypes` WRITE;
/*!40000 ALTER TABLE `vehecletypes` DISABLE KEYS */;
INSERT INTO `vehecletypes` VALUES (1,'Mecedoce Benz','IVECO','1986-01-01','ssssssssssssssss',1,'2019-10-08 16:10:19','2019-10-08 16:10:19');
/*!40000 ALTER TABLE `vehecletypes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50001 DROP TABLE IF EXISTS `performance_by_model_report_views`*/;
/*!50001 DROP VIEW IF EXISTS `performance_by_model_report_views`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `performance_by_model_report_views` AS (select `trucks`.`vehecletype_id` AS `vehecletype_id`,`vehecletypes`.`name` AS `name`,count(distinct `trucks`.`plate`) AS `no`,count(`performances`.`FOnumber`) AS `Trip`,sum(`performances`.`DistanceWCargo`) AS `dwc`,sum(`performances`.`DistanceWOCargo`) AS `dwoc`,sum(`performances`.`CargoVolumMT`) AS `Tone`,sum(`performances`.`DistanceWCargo`) + sum(`performances`.`DistanceWOCargo`) AS `KM`,sum(`performances`.`CargoVolumMT` * `performances`.`DistanceWCargo`) AS `Tonek`,sum(`performances`.`fuelInLitter`) AS `fl`,sum(`performances`.`fuelInBirr`) AS `fib`,sum(`performances`.`perdiem`) AS `Perdium`,sum(`performances`.`other`) AS `other`,sum(`performances`.`fuelInBirr`) + sum(`performances`.`perdiem`) + sum(`performances`.`other`) AS `totla` from ((`trucks` join `vehecletypes` on(`vehecletypes`.`id` = `trucks`.`vehecletype_id`)) left join `performances` on(`trucks`.`id` = `performances`.`driver_truck_id`)) group by `vehecletypes`.`id` order by `performances`.`FOnumber` desc) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

