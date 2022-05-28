# ************************************************************
# Sequel Ace SQL dump
# Версия 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Хост: localhost (MySQL 8.0.28)
# База данных: astrologer
# Время формирования: 2022-05-28 12:04:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы astrologers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `astrologers`;

CREATE TABLE `astrologers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `astrologers` WRITE;
/*!40000 ALTER TABLE `astrologers` DISABLE KEYS */;

INSERT INTO `astrologers` (`id`, `name`, `avatar`, `email`, `biography`, `created_at`, `updated_at`)
VALUES
	(1,'Люсі','','lusi@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14'),
	(2,'Бен','','ben@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14'),
	(3,'Барбара','','barbara@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14'),
	(4,'Кевін','','kevin@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14'),
	(5,'Сюзі','','susie@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14'),
	(6,'Емма','','emma@astrologer.dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.','2022-05-28 11:54:14','2022-05-28 11:54:14');

/*!40000 ALTER TABLE `astrologers` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2022_05_28_110851_create_services_table',2),
	(6,'2022_05_28_111314_create_astrologers_table',2),
	(7,'2022_05_28_111852_create_services_of_astrologers_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Натальна карта','2022-05-28 12:00:58','2022-05-28 12:00:58'),
	(2,'Детальний гороскоп','2022-05-28 12:00:58','2022-05-28 12:00:58'),
	(3,'Звіт сумісності','2022-05-28 12:00:58','2022-05-28 12:00:58'),
	(4,'Гороскоп на рік','2022-05-28 12:00:58','2022-05-28 12:00:58');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы services_of_astrologers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services_of_astrologers`;

CREATE TABLE `services_of_astrologers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `astrologer_id` int NOT NULL,
  `service_id` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_of_astrologers_astrologer_id_index` (`astrologer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `services_of_astrologers` WRITE;
/*!40000 ALTER TABLE `services_of_astrologers` DISABLE KEYS */;

INSERT INTO `services_of_astrologers` (`id`, `astrologer_id`, `service_id`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,1,5,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(2,2,1,6,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(3,2,2,5,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(4,1,3,7,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(5,3,1,6,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(6,4,4,36,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(7,4,2,10,'2022-05-28 12:02:37','2022-05-28 12:02:37'),
	(8,3,4,30,'2022-05-28 12:02:37','2022-05-28 12:02:37');

/*!40000 ALTER TABLE `services_of_astrologers` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
