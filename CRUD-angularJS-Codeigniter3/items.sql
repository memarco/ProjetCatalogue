-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(16,	'sds',	'sdsd',	NULL,	NULL),
(17,	'dsfnse',	'erters',	NULL,	NULL),
(18,	'retserter',	'rnyrtw',	NULL,	NULL),
(19,	'srtnsert',	'rtnerst',	NULL,	NULL),
(20,	'sertnsert',	'fyumtutr dfsg',	NULL,	NULL),
(21,	'65ejr6j',	'dsfgsd srhb',	NULL,	NULL),
(22,	'rthdrrt',	'rthdrth',	NULL,	NULL),
(23,	'serynesrt',	'rtynrt trynertr',	NULL,	NULL),
(24,	'ertert',	' ertbrer terstbreter',	NULL,	NULL),
(25,	'ertesnrtser',	'rtsern ertbet',	NULL,	NULL),
(26,	'ertnser',	'retuot yumtu',	NULL,	NULL),
(31,	'we',	'we',	NULL,	NULL);

-- 2016-09-28 03:53:01
