-- Adminer 4.8.1 MySQL 11.1.3-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `position`, `created_at`, `updated_at`) VALUES
(1,	'Galvin',	'Serrano',	'web_designer',	'2023-12-26 03:25:37',	'2023-12-26 03:25:37'),
(2,	'Ariel',	'Bruce',	'web_developer',	'2023-12-26 03:26:00',	'2023-12-26 03:26:00'),
(15,	'Raya',	'Stephens',	'manager',	'2023-12-26 05:13:11',	'2023-12-26 05:13:11'),
(16,	'Carissa',	'Underwood',	'web_developer',	'2023-12-26 05:13:13',	'2023-12-26 05:13:13'),
(17,	'Stuart',	'Quinn',	'web_developer',	'2023-12-26 05:13:14',	'2023-12-26 05:13:14'),
(18,	'Cassidy',	'Robertson',	'web_developer',	'2023-12-26 05:13:16',	'2023-12-26 05:13:16'),
(19,	'Noble',	'Horn',	'web_developer',	'2023-12-26 05:13:18',	'2023-12-26 05:13:18'),
(20,	'Olivia',	'Macias',	'web_designer',	'2023-12-26 05:13:19',	'2023-12-26 05:13:19'),
(21,	'Shelly',	'Knowles',	'web_designer',	'2023-12-26 05:13:21',	'2023-12-26 05:13:21'),
(22,	'Avye',	'Simmons',	'web_developer',	'2023-12-26 05:13:23',	'2023-12-26 05:13:56'),
(23,	'Elmo',	'Wall',	'web_developer',	'2023-12-26 05:13:26',	'2023-12-26 05:13:26'),
(24,	'Julie',	'Guzman',	'web_designer',	'2023-12-26 05:13:28',	'2023-12-26 05:13:28'),
(25,	'Leroy',	'Sexton',	'web_developer',	'2023-12-26 05:13:30',	'2023-12-26 05:13:51'),
(26,	'Larissa',	'Mack',	'manager',	'2023-12-26 05:13:47',	'2023-12-26 05:13:47');

-- 2023-12-26 13:14:38
