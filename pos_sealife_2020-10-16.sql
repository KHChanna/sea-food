# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: pos_sealife
# Generation Time: 2020-10-16 07:47:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `name`, `code`, `description`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Crabs','A09876','crabs','2020-09-16 06:25:30','2020-10-13 10:58:58'),
	(2,NULL,'Fish','A0000987','fish','2020-09-16 08:59:22','2020-10-13 16:40:00'),
	(4,NULL,'Octopus','B00000132',NULL,'2020-09-17 10:46:26','2020-10-13 16:40:25'),
	(6,NULL,'Water Prawn Meduim','A000987411',NULL,'2020-10-14 11:44:08','2020-10-14 11:44:08');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table currencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dollar` double NOT NULL,
  `riel` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;

INSERT INTO `currencies` (`id`, `dollar`, `riel`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(2,1,4100,NULL,'2020-10-04 14:47:36','2020-10-04 14:47:36'),
	(3,1,4200,NULL,'2020-10-14 11:49:08','2020-10-14 11:49:08');

/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(69,'2014_10_12_000000_create_users_table',1),
	(70,'2014_10_12_100000_create_password_resets_table',1),
	(71,'2016_06_01_000001_create_oauth_auth_codes_table',1),
	(72,'2016_06_01_000002_create_oauth_access_tokens_table',1),
	(73,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
	(74,'2016_06_01_000004_create_oauth_clients_table',1),
	(75,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
	(76,'2019_08_19_000000_create_failed_jobs_table',1),
	(77,'2020_09_06_082331_create_categories_table',1),
	(78,'2020_09_06_085515_create_sell_table',1),
	(79,'2020_09_06_132640_create_products_table',1),
	(80,'2020_09_06_132716_create_units_table',1),
	(81,'2020_09_06_132730_create_product_units_table',1),
	(82,'2020_09_06_132747_create_product_images_table',1),
	(83,'2020_09_06_132819_create_suppliers_table',1),
	(84,'2020_09_06_132838_create_sales_table',1),
	(85,'2020_09_06_132851_create_sale_details_table',1),
	(86,'2020_09_06_132923_create_registers_table',1),
	(87,'2020_09_06_132930_create_register_details_table',1),
	(88,'2020_09_08_163039_rename_category_column',1),
	(89,'2020_09_30_112139_create_currencies_table',2),
	(90,'2020_10_05_025651_create_purchases_table',3),
	(91,'2020_10_05_025756_create_purchase_details_table',3),
	(92,'2020_10_05_030029_create_stocks_table',3),
	(93,'2020_10_05_030502_create_payment_types_table',3),
	(94,'2020_10_05_030614_create_payments_table',3),
	(95,'2020_10_05_030649_create_payment_details_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`)
VALUES
	('0f38517c1225021242cf5134931dc2b3bc4675ee27579474125e4d3d8b779e5bbbb73095c62c0037',2,1,'Personal Access Token','[]',0,'2020-10-15 11:26:38','2020-10-15 11:26:38','2021-10-15 11:26:38'),
	('1abbc89a5b0b04a633e270afc244ccf7a7782bba6a101c13030517aff45bb08fa476e37ac96e9af6',1,1,'Personal Access Token','[]',0,'2020-09-15 11:13:29','2020-09-15 11:13:29','2021-09-15 11:13:29'),
	('1c50c0ae842da97fed11cae0faac219042568b5c0f426da835d3190d28ea07bd03ac33929eba472d',1,1,'Personal Access Token','[]',1,'2020-09-23 07:38:13','2020-09-23 07:38:13','2021-09-23 07:38:13'),
	('1dd0f1c1c485ec30124b79d201e96054b221a9a338d073747d4bb4246b24d290f9cbada8dee9041e',1,1,'Personal Access Token','[]',0,'2020-09-16 08:44:44','2020-09-16 08:44:44','2021-09-16 08:44:44'),
	('25e845a2ab00a6640956d15cb3da067f6bbc935aa7bb03fe61e00ab9c9a3dac1530be0bf971bd744',1,1,'Personal Access Token','[]',0,'2020-09-16 08:49:34','2020-09-16 08:49:34','2021-09-16 08:49:34'),
	('358e9383cae80c53b64663b81393ddcfa57879ba3bdb4f474a31746c521a62e886bebdbd4f7e0db7',1,1,'Personal Access Token','[]',0,'2020-09-15 11:13:23','2020-09-15 11:13:23','2021-09-15 11:13:23'),
	('45eb3cba28858ca1aa1c7d4e750ab02e433c0576853a24d1508d131495cd5092f5c04d4399c6275d',1,1,'Personal Access Token','[]',0,'2020-09-16 06:23:17','2020-09-16 06:23:17','2021-09-16 06:23:17'),
	('579de54765eaaefe4bca8a0e25fa9305605c47c155f6a537435a73e28b89597f81e288c7ce45d75b',1,1,'Personal Access Token','[]',0,'2020-09-15 11:12:07','2020-09-15 11:12:07','2021-09-15 11:12:07'),
	('5fab71992ae3d52752c2e3c554a36f95e90d2c3ff37e1ccb67d2a2eb69ab21854b92d668711a48db',1,1,'Personal Access Token','[]',0,'2020-09-16 06:21:44','2020-09-16 06:21:44','2021-09-16 06:21:44'),
	('709565008618bd12d5dd6b938d196a3072219b3759b6f0c7913912b0e99112c1e4a818310bf9fe8e',1,1,'Personal Access Token','[]',0,'2020-09-15 11:27:10','2020-09-15 11:27:10','2021-09-15 11:27:10'),
	('7e7712810834a489081b1078284986146c4e9eb5457e6057846d4b43fea1899ba24a536195d7b6d4',1,1,'Personal Access Token','[]',0,'2020-09-23 07:20:13','2020-09-23 07:20:13','2021-09-23 07:20:13'),
	('95ac00ebaadf583fbd49f8ea84866f038d56b9856f06096478078f264773384fb26b3e628707332a',1,1,'Personal Access Token','[]',0,'2020-09-25 09:25:06','2020-09-25 09:25:06','2021-09-25 09:25:06'),
	('b3f37ade9b496444a6cf2c7850087f606417bc98716e6de8fc51de1c7def7838188f914e070d1ce5',2,1,'Personal Access Token','[]',0,'2020-10-14 14:39:29','2020-10-14 14:39:29','2021-10-14 14:39:29'),
	('bc01271dce48ab1639fcd2ba45b037e2b6626d3ed2772487f271f9010958229611d73f82c0c868ba',1,1,'Personal Access Token','[]',0,'2020-09-17 09:48:02','2020-09-17 09:48:02','2021-09-17 09:48:02'),
	('c1936c6f9e7acd05869f8f79fe2eb1ffc0e80a521cd85c87d046799877efbc375f409bc596aaaa59',1,1,'Personal Access Token','[]',0,'2020-09-15 11:26:13','2020-09-15 11:26:13','2021-09-15 11:26:13'),
	('ed266e5588b8612a83a04460d0014afa3546a6c9c063ca5f9782268913f12516fa9e68147c61b8dc',1,1,'Personal Access Token','[]',0,'2020-09-16 06:18:56','2020-09-16 06:18:56','2021-09-16 06:18:56');

/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_auth_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'POSSYS Personal Access Client','LkvkCNXrd0sHJvPyC1y9gre87pNS3XWrQ8LVTgF3',NULL,'http://localhost',1,0,0,'2020-09-15 10:27:50','2020-09-15 10:27:50'),
	(2,NULL,'POSSYS Password Grant Client','0bxUIkmUn6GnqKbJXZgmAJo5nRmkhQEWCt91xei8','users','http://localhost',0,1,0,'2020-09-15 10:27:50','2020-09-15 10:27:50');

/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_personal_access_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'2020-09-15 10:27:50','2020-09-15 10:27:50');

/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_refresh_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table payment_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_details`;

CREATE TABLE `payment_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table payment_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_types`;

CREATE TABLE `payment_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `payment_types` WRITE;
/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;

INSERT INTO `payment_types` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'ABA',NULL,'2020-10-05 15:40:27','2020-10-05 15:46:53'),
	(2,'Cash On Hand','cash on hand','2020-10-05 15:42:49','2020-10-05 15:42:49'),
	(3,'ACELEDA','aceleda ton jit','2020-10-05 15:43:05','2020-10-05 15:43:05');

/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_refund` double NOT NULL,
  `payment_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'pending',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`)
VALUES
	(5,1,'5f85da41235a71602607681.jpg','2020-10-13 16:48:01','2020-10-13 16:48:01'),
	(7,2,'5f85dab448f8f1602607796.jpg','2020-10-13 16:49:56','2020-10-13 16:49:56'),
	(8,3,'5f85db468b92b1602607942.jpg','2020-10-13 16:52:22','2020-10-13 16:52:22'),
	(9,4,'5f85db7bdfd931602607995.jpg','2020-10-13 16:53:15','2020-10-13 16:53:15'),
	(10,5,'5f86e508e68551602675976.jpg','2020-10-14 11:46:16','2020-10-14 11:46:16'),
	(11,6,'5f86e6a19e73b1602676385.jpg','2020-10-14 11:53:05','2020-10-14 11:53:05'),
	(12,7,'5f86e6d0780421602676432.jpg','2020-10-14 11:53:52','2020-10-14 11:53:52'),
	(13,9,'5f871255239021602687573.jpg','2020-10-14 14:59:33','2020-10-14 14:59:33'),
	(14,10,'5f871473354e41602688115.jpg','2020-10-14 15:08:35','2020-10-14 15:08:35'),
	(15,11,'5f8714a4ee94f1602688164.jpg','2020-10-14 15:09:24','2020-10-14 15:09:24'),
	(16,12,'5f8714bbcf57e1602688187.jpg','2020-10-14 15:09:47','2020-10-14 15:09:47'),
	(17,13,'5f8714ed3fa951602688237.jpg','2020-10-14 15:10:37','2020-10-14 15:10:37'),
	(18,14,'5f87163ec6d681602688574.jpg','2020-10-14 15:16:14','2020-10-14 15:16:14'),
	(19,15,'5f871656a72481602688598.jpg','2020-10-14 15:16:38','2020-10-14 15:16:38'),
	(20,16,'5f87166b9997a1602688619.jpg','2020-10-14 15:16:59','2020-10-14 15:16:59'),
	(21,17,'5f8716b18db731602688689.jpg','2020-10-14 15:18:09','2020-10-14 15:18:09'),
	(22,18,'5f8716d3829f01602688723.jpg','2020-10-14 15:18:43','2020-10-14 15:18:43');

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_units`;

CREATE TABLE `product_units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `qty_per_unit` int(11) NOT NULL,
  `unit_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_units` WRITE;
/*!40000 ALTER TABLE `product_units` DISABLE KEYS */;

INSERT INTO `product_units` (`id`, `product_id`, `unit_id`, `qty_per_unit`, `unit_type`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,'parent',10.00,'2020-09-23 07:40:18','2020-10-13 16:48:01'),
	(2,2,1,1,'parent',13.00,'2020-09-26 14:29:25','2020-10-13 16:49:56'),
	(3,5,1,1,'parent',20.00,'2020-10-04 14:59:43','2020-10-04 14:59:43'),
	(4,1,1,1,'parent',10.00,'2020-10-13 16:47:44','2020-10-13 16:48:01'),
	(5,2,1,1,'parent',13.00,'2020-10-13 16:48:52','2020-10-13 16:49:56'),
	(6,3,1,1,'parent',8.00,'2020-10-13 16:52:22','2020-10-13 16:52:22'),
	(7,4,1,1,'parent',12.00,'2020-10-13 16:53:15','2020-10-13 16:53:15'),
	(8,5,2,1,'child',15.00,'2020-10-14 11:46:16','2020-10-14 11:46:16'),
	(9,6,2,1,'child',12.00,'2020-10-14 11:53:05','2020-10-15 15:48:37'),
	(10,7,2,1,'child',10.00,'2020-10-14 11:53:52','2020-10-14 11:53:52'),
	(11,8,1,1,'parent',12.00,'2020-10-14 14:52:52','2020-10-14 14:52:52'),
	(12,9,1,1,'parent',20.00,'2020-10-14 14:59:33','2020-10-14 14:59:33'),
	(13,10,1,1,'parent',20.00,'2020-10-14 15:08:35','2020-10-14 15:08:35'),
	(14,11,1,1,'parent',20.00,'2020-10-14 15:09:24','2020-10-14 15:09:24'),
	(15,12,1,1,'parent',20.00,'2020-10-14 15:09:47','2020-10-14 15:09:47'),
	(16,13,1,1,'parent',20.00,'2020-10-14 15:10:37','2020-10-14 15:10:37'),
	(17,14,1,1,'parent',20.00,'2020-10-14 15:16:14','2020-10-14 15:16:14'),
	(18,15,1,1,'parent',20.00,'2020-10-14 15:16:38','2020-10-14 15:16:38'),
	(19,16,1,1,'parent',20.00,'2020-10-14 15:16:59','2020-10-14 15:16:59'),
	(20,17,1,1,'parent',20.00,'2020-10-14 15:18:09','2020-10-14 15:18:09'),
	(21,18,1,1,'parent',20.00,'2020-10-14 15:18:43','2020-10-14 15:18:43');

/*!40000 ALTER TABLE `product_units` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `created_at`, `updated_at`)
VALUES
	(6,1,'hellowolrd','P0011602694802','test','2020-10-14 11:53:05','2020-10-14 17:00:02'),
	(7,4,'Octopus','P00CA1602676410',NULL,'2020-10-14 11:53:52','2020-10-14 11:53:52'),
	(8,1,'test','P0011602687172','test','2020-10-14 14:52:52','2020-10-14 14:52:52'),
	(9,1,'test1','P0011602687573','','2020-10-14 14:59:33','2020-10-14 14:59:33'),
	(10,1,'test2','P0011602688115','','2020-10-14 15:08:35','2020-10-14 15:08:35'),
	(11,1,'test3','P0011602688164','','2020-10-14 15:09:24','2020-10-14 15:09:24'),
	(12,1,'test4','P0011602688187','','2020-10-14 15:09:47','2020-10-14 15:09:47'),
	(13,1,'test5','P0011602688237','','2020-10-14 15:10:37','2020-10-14 15:10:37'),
	(14,1,'test7','P0011602688574','','2020-10-14 15:16:14','2020-10-14 15:16:14'),
	(15,1,'test9','P0011602688598','','2020-10-14 15:16:38','2020-10-14 15:16:38'),
	(16,1,'test91','P0011602688619','','2020-10-14 15:16:59','2020-10-14 15:16:59'),
	(17,1,'test11','P0011602688689','','2020-10-14 15:18:09','2020-10-14 15:18:09'),
	(18,1,'test12','P0011602688723','','2020-10-14 15:18:43','2020-10-14 15:18:43');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table purchase_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_details`;

CREATE TABLE `purchase_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `purchase_details` WRITE;
/*!40000 ALTER TABLE `purchase_details` DISABLE KEYS */;

INSERT INTO `purchase_details` (`id`, `product_id`, `purchase_id`, `unit_id`, `qty`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,1,10.00,'2020-10-13 16:54:19','2020-10-13 16:54:19'),
	(2,2,1,1,1,13.00,'2020-10-13 16:54:19','2020-10-13 16:54:19'),
	(3,6,2,2,50,12.00,'2020-10-14 13:20:31','2020-10-14 13:20:31'),
	(4,7,2,2,1,10.00,'2020-10-14 13:20:31','2020-10-14 13:20:31');

/*!40000 ALTER TABLE `purchase_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table purchases
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL,
  `order_amount` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;

INSERT INTO `purchases` (`id`, `supplier_id`, `code`, `invoice_number`, `date`, `paid_amount`, `order_amount`, `total`, `payment_status`, `status`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'01234567','P01A01602608003','2020-10-13',23.00,0.00,23.00,1,1,NULL,'2020-10-13 16:54:19','2020-10-13 16:54:19'),
	(2,1,'0876543','P01A01602681509','2020-10-14',600.00,0.00,549.00,1,1,NULL,'2020-10-14 13:20:31','2020-10-14 13:20:31');

/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table register_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `register_details`;

CREATE TABLE `register_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sell_id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `register_details` WRITE;
/*!40000 ALTER TABLE `register_details` DISABLE KEYS */;

INSERT INTO `register_details` (`id`, `sell_id`, `register_id`, `total_amount`, `created_at`, `updated_at`)
VALUES
	(5,25,6,100.00,'2020-10-04 16:15:37','2020-10-04 16:15:37'),
	(6,26,6,100.00,'2020-10-04 16:17:09','2020-10-04 16:17:09'),
	(7,27,6,100.00,'2020-10-04 16:17:09','2020-10-04 16:17:09'),
	(8,28,6,100.00,'2020-10-04 16:19:22','2020-10-04 16:19:22'),
	(9,29,6,100.00,'2020-10-04 16:20:47','2020-10-04 16:20:47'),
	(10,30,7,200.00,'2020-10-05 15:52:25','2020-10-05 15:52:25'),
	(11,1,8,100.00,'2020-10-13 17:12:39','2020-10-13 17:12:39'),
	(12,2,10,1000.00,'2020-10-14 13:22:23','2020-10-14 13:22:23');

/*!40000 ALTER TABLE `register_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table registers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `registers`;

CREATE TABLE `registers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `open_balance` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `registers` WRITE;
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;

INSERT INTO `registers` (`id`, `date`, `open_balance`, `created_at`, `updated_at`)
VALUES
	(6,'2020-10-04',100.00,'2020-10-04 15:14:14','2020-10-04 15:14:14'),
	(7,'2020-10-05',200.00,'2020-10-05 15:23:25','2020-10-05 15:23:25'),
	(8,'2020-10-13',100.00,'2020-10-13 17:01:50','2020-10-13 17:01:50'),
	(9,'2020-10-14',1000.00,'2020-10-13 11:51:25','2020-10-14 11:51:25'),
	(10,'2020-10-14',1000.00,'2020-10-14 13:21:36','2020-10-14 13:21:36');

/*!40000 ALTER TABLE `registers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sell
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sell`;

CREATE TABLE `sell` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sell_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sell_details`;

CREATE TABLE `sell_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sell_details` WRITE;
/*!40000 ALTER TABLE `sell_details` DISABLE KEYS */;

INSERT INTO `sell_details` (`id`, `product_id`, `sell_id`, `unit_id`, `qty`, `price`, `total`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,1,10.00,10,'2020-10-13 17:12:39','2020-10-13 17:12:39'),
	(2,7,2,2,1,10.00,10,'2020-10-14 13:22:23','2020-10-14 13:22:23'),
	(3,6,2,2,2,12.00,24,'2020-10-14 13:22:23','2020-10-14 13:22:23');

/*!40000 ALTER TABLE `sell_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sells
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sells`;

CREATE TABLE `sells` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_date` date NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL,
  `order_amount` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sells` WRITE;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;

INSERT INTO `sells` (`id`, `code`, `invoice_number`, `sale_date`, `paid_amount`, `order_amount`, `total`, `payment_status`, `payment_type`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'0','S00F1602609135','2020-10-14',0.00,0.00,10.00,0,1,1,'2020-10-09 00:21:36','2020-10-13 17:12:39'),
	(2,'0','S00F1602681696','2020-10-14',34.00,0.00,34.00,1,2,1,'2020-10-15 13:22:23','2020-10-06 13:22:23'),
	(3,'0','S00F1602609135','2020-10-05',0.00,0.00,10.00,0,1,1,'2020-10-06 17:12:39','2020-10-13 17:12:39'),
	(4,'0','S00F1602609135','2020-10-14',0.00,0.00,20.00,0,1,1,'2020-10-07 17:12:39','2020-10-13 17:12:39'),
	(5,'0','S00F1602609135','2020-10-14',0.00,0.00,30.00,0,1,1,'2020-10-05 00:21:36','2020-10-13 17:12:39'),
	(6,'0','S00F1602609135','2020-10-14',0.00,0.00,100.00,0,1,1,'2020-10-07 00:21:36','2020-10-13 17:12:39'),
	(7,'0','S00F1602609135','2020-10-14',0.00,0.00,400.00,0,1,1,'2020-10-10 00:21:36','2020-10-13 17:12:39'),
	(8,'0','S00F1602609135','2020-10-14',0.00,0.00,400.00,0,1,1,'2020-10-11 00:21:36','2020-10-13 17:12:39'),
	(9,'0','S00F1602609135','2020-10-14',0.00,0.00,400.00,0,1,1,'2020-10-16 00:21:36','2020-10-13 17:12:39'),
	(10,'0','S00F1602609135','2020-10-14',0.00,0.00,400.00,0,1,1,'2020-10-17 00:21:36','2020-10-13 17:12:39'),
	(11,'0','S00F1602609135','2020-10-14',0.00,0.00,400.00,0,1,1,'2020-10-12 00:21:36','2020-10-13 17:12:39');

/*!40000 ALTER TABLE `sells` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table suppliers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`)
VALUES
	(1,'Mekong Seafood','01732992','mekong@email.com',NULL,'2020-10-13 16:43:35','2020-10-13 16:43:35'),
	(2,'Supplier PP','077652312','supplier@email.com',NULL,'2020-10-14 11:47:30','2020-10-14 11:47:30');

/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;

INSERT INTO `units` (`id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
	(2,NULL,'Kilogram',NULL,'2020-10-14 11:43:11','2020-10-14 11:43:11'),
	(3,NULL,'kgram',NULL,'2020-10-14 13:16:58','2020-10-14 13:16:58');

/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(2,'admin','2','1221323','admintest@email.com',NULL,'$2y$10$rGaiMrNltbE4uXKi4IgwOuUVt3wQJ6vhe/PQoUMa8q1pCSyrPHCzO',NULL,'2020-10-04 14:15:25','2020-10-15 16:35:39'),
	(3,'channa','0','098392021','channachamroeun@gmail.com',NULL,'$2y$10$LfvQSoDmSDmSytuGL6G0C.bxGVf950UtY/ukgceWxO0PwKfb3NKyC',NULL,'2020-10-14 13:15:45','2020-10-14 13:15:45'),
	(5,'asdasd','1','1221323','admin1@email.com',NULL,'123123',NULL,'2020-10-15 16:04:24','2020-10-15 16:04:24');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
