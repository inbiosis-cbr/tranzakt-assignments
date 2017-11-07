# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Database: tranzakt_code
# Generation Time: 2017-11-07 08:55:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table grades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;

INSERT INTO `grades` (`id`, `name`, `code`, `score`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Grade A','A',0,'2017-11-05 09:54:28','2017-11-05 10:03:02',NULL),
	(2,'Grade B','B',0,'2017-11-05 09:59:50','2017-11-05 11:46:21',NULL),
	(3,'Grade C','C',0,'2017-11-05 10:00:01','2017-11-05 11:46:25',NULL),
	(4,'Grade D','D',0,'2017-11-05 10:00:07','2017-11-05 11:46:32',NULL),
	(5,'Grade E','E',0,'2017-11-05 10:00:14','2017-11-05 11:46:37',NULL),
	(6,'Failed','F',0,'2017-11-05 11:46:45','2017-11-05 11:46:45',NULL);

/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_11_04_071213_create_teachers_table',1),
	(4,'2017_11_04_071214_create_teacher_password_resets_table',1),
	(5,'2017_11_04_071220_create_students_table',1),
	(6,'2017_11_04_071221_create_student_password_resets_table',1),
	(7,'2017_11_05_010259_create_subject_table',2),
	(8,'2017_11_05_010652_add_deleted_at_to_subject_table',3),
	(9,'2017_11_05_011618_create_grades_table',4),
	(10,'2017_11_05_012019_create_student_grades_table',4),
	(11,'2017_11_05_012149_create_subject_grades_table',4),
	(12,'2017_11_05_012411_drop_is_passing_grades_table',4),
	(13,'2017_11_05_120743_create_student_subjects_table',5),
	(14,'2017_11_05_120959_modify_student_grades_table',6),
	(15,'2017_11_05_121437_modify_student_grades_table',7),
	(16,'2017_11_05_121809_modify_student_grades_table',8);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table student_grades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_grades`;

CREATE TABLE `student_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `graded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `student_grades` WRITE;
/*!40000 ALTER TABLE `student_grades` DISABLE KEYS */;

INSERT INTO `student_grades` (`id`, `student_subject_id`, `grade_id`, `graded_by`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2,7,2,'2017-11-05 23:16:14','2017-11-07 13:31:30',NULL),
	(3,1,4,2,'2017-11-07 13:16:26','2017-11-07 13:41:06',NULL),
	(4,3,7,2,'2017-11-07 13:46:47','2017-11-07 13:46:47',NULL),
	(5,4,4,2,'2017-11-07 13:46:57','2017-11-07 13:46:57',NULL);

/*!40000 ALTER TABLE `student_grades` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_password_resets`;

CREATE TABLE `student_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `student_password_resets_email_index` (`email`),
  KEY `student_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table student_subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_subjects`;

CREATE TABLE `student_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `student_subjects` WRITE;
/*!40000 ALTER TABLE `student_subjects` DISABLE KEYS */;

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,3,'2017-11-05 12:45:00','2017-11-05 12:45:00',NULL),
	(2,1,2,'2017-11-05 12:47:55','2017-11-05 12:47:55',NULL),
	(3,2,2,'2017-11-07 11:40:36','2017-11-07 11:40:36',NULL),
	(4,2,1,'2017-11-07 11:45:07','2017-11-07 11:45:07',NULL);

/*!40000 ALTER TABLE `student_subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Student KK','kkloke86@k2inno.com','$2y$10$9.5yqlpcqea1VbhX2UExD.AtmEyN6Zglqql.mY0A7qgAnaASL47HG','vtHezIzY62IlLEJRutOCyV6ChExgbF90dFZZNxgpOAbPxCE03bs7FHjusKCV','2017-11-04 11:37:09','2017-11-04 11:37:09'),
	(2,'Student Demo','support@k2inno.com','$2y$10$XxRHv2jB57/OyLMJeOXFQ.2HGnFxqsto27CxqTiwCxkDSQdDjtomK',NULL,'2017-11-07 00:00:00',NULL);

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subject_grades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subject_grades`;

CREATE TABLE `subject_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '999',
  `is_passing` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `subject_grades` WRITE;
/*!40000 ALTER TABLE `subject_grades` DISABLE KEYS */;

INSERT INTO `subject_grades` (`id`, `subject_id`, `grade_id`, `ordering`, `is_passing`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,1,999,1,'2017-11-05 11:24:19','2017-11-05 11:24:19',NULL),
	(2,1,2,999,1,'2017-11-05 11:45:03','2017-11-05 11:45:03',NULL),
	(3,1,3,999,1,'2017-11-05 11:45:07','2017-11-05 11:45:07',NULL),
	(4,1,4,999,0,'2017-11-05 11:45:13','2017-11-05 11:45:13',NULL),
	(5,1,5,999,0,'2017-11-05 11:45:19','2017-11-05 11:45:19',NULL),
	(6,2,1,999,1,'2017-11-05 11:46:12','2017-11-05 11:46:12',NULL),
	(7,2,2,999,1,'2017-11-05 11:47:12','2017-11-05 11:47:12',NULL),
	(8,2,3,999,1,'2017-11-05 11:47:17','2017-11-05 11:47:17',NULL),
	(9,2,4,999,0,'2017-11-05 11:47:22','2017-11-05 11:47:22',NULL),
	(10,2,5,999,0,'2017-11-05 11:47:27','2017-11-05 11:47:27',NULL),
	(11,2,6,999,0,'2017-11-05 11:47:34','2017-11-05 11:47:34',NULL);

/*!40000 ALTER TABLE `subject_grades` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Math','Math2017','Learning math is fun!','2017-11-05 06:54:25','2017-11-05 10:14:54',NULL),
	(2,'English','ENG-123','English lessons.','2017-11-05 06:56:12','2017-11-05 06:56:12',NULL),
	(3,'Basic Sciences','SCI-BASE-201711','Science foundation.','2017-11-05 11:44:30','2017-11-05 11:44:45',NULL);

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teacher_password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teacher_password_resets`;

CREATE TABLE `teacher_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `teacher_password_resets_email_index` (`email`),
  KEY `teacher_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Teacher KK','kkloke86@k2inno.com','$2y$10$LKa5PL3DPgtqe8Ne4aA0POZiqAbL5i1HBdK3SvLWjT2Ho4Yy6Bur.',NULL,'2017-11-04 11:37:39','2017-11-04 11:37:39'),
	(2,'Teacher Demo','support@k2inno.com','$2y$10$XxRHv2jB57/OyLMJeOXFQ.2HGnFxqsto27CxqTiwCxkDSQdDjtomK',NULL,'2017-11-07 00:00:00',NULL);

/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
