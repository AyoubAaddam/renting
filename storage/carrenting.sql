-- Adminer 4.8.1 MySQL 10.11.4-MariaDB-1~deb12u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_dni_unique` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `isbn`, `created_at`, `updated_at`) VALUES
(3,	'Ayoub',	'aaddam',	'44940542Z',	'112312312321312313213',	'2024-03-15 14:00:17',	'2024-03-15 14:00:17');

DROP TABLE IF EXISTS `coches`;
CREATE TABLE `coches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `etiqueta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coches` (`id`, `matricula`, `tipo`, `marca`, `etiqueta`, `created_at`, `updated_at`) VALUES
(1,	'ABC123',	'Sedán',	'Toyota',	'C',	'2024-03-07 14:23:52',	'2024-03-07 14:23:52'),
(2,	'DEF456',	'SUV',	'Ford',	'C',	'2024-03-07 14:23:52',	'2024-03-07 14:23:52'),
(3,	'GHI789',	'Hatchback',	'Honda',	'C',	'2024-03-07 14:23:52',	'2024-03-07 14:23:52'),
(4,	'JKL012',	'Camioneta',	'Chevrolet',	'C',	'2024-03-07 14:23:52',	'2024-03-07 14:23:52'),
(5,	'MNO345',	'Deportivo',	'BMW',	'C',	'2024-03-07 14:23:52',	'2024-03-07 14:23:52');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_03_05_174334_create_clientes_table',	2);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `suscripcions`;
CREATE TABLE `suscripcions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscripcion` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `coche_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suscripcions_user_id_foreign` (`user_id`),
  KEY `coche_id` (`coche_id`),
  CONSTRAINT `suscripcions_ibfk_1` FOREIGN KEY (`coche_id`) REFERENCES `coches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `suscripcions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `suscripcions` (`id`, `subscripcion`, `user_id`, `coche_id`, `created_at`, `updated_at`) VALUES
(8,	'Largo plazo',	3,	5,	'2024-03-15 14:00:17',	'2024-03-15 14:00:17');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3,	'ayoub',	'ayoub.castelldefels22@gmail.com',	NULL,	'$2y$12$UDnzX9Cc3Ih04AgBwcnTDuojoqf1ElEtDSN.AvIRIJPDkjyIl.aeW',	NULL,	'2024-03-15 13:59:27',	'2024-03-15 13:59:27');

-- 2024-03-15 15:38:32
