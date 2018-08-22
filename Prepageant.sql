-- --------------------------------------------------------
-- Host:                         Localhost
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for misssilliman-prepageant
CREATE DATABASE IF NOT EXISTS `misssilliman-prepageant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `misssilliman-prepageant`;

-- Dumping structure for table misssilliman-prepageant.candidates
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` int(10) unsigned NOT NULL,
  `yearLevel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SY` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isTop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seqSpeech` int(11) DEFAULT NULL,
  `seqTalent` int(11) DEFAULT NULL,
  `aveTalent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.candidates: ~10 rows (approximately)
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `image`, `fName`, `mName`, `lName`, `college`, `yearLevel`, `SY`, `isTop`, `number`, `seqSpeech`, `seqTalent`, `aveTalent`, `created_at`, `updated_at`) VALUES
	(1, 'public/css/images/CBA.png', 'Mikhaella', '', 'Ponce de Leon', 1, '', '', '', '', 6, 1, NULL, NULL, NULL),
	(2, 'public/css/images/CED.png', 'Shannel', '', 'Vendiola', 2, '', '', '', '', 7, 2, NULL, NULL, NULL),
	(3, 'public/css/images/SUMS.png', 'Oghogho', '', 'Ovonlen', 3, '', '', '', '', 8, 3, NULL, NULL, NULL),
	(4, 'public/css/images/SUHS.png', 'Erica', '', 'Villagracia', 4, '', '', '', '', 9, 4, NULL, NULL, NULL),
	(5, 'public/css/images/CMC.png', 'Ivy', '', 'Salaum', 5, '', '', '', '', 10, 5, NULL, NULL, NULL),
	(6, 'public/css/images/COPVA.png', 'Chanel', '', 'Pepino', 6, '', '', '', '', 5, 10, NULL, NULL, NULL),
	(7, 'public/css/images/GRAD.png', 'Yihui', '', 'Yuan', 7, '', '', '', '', 4, 9, NULL, NULL, NULL),
	(8, 'public/css/images/CAS.png', 'Christine', '', 'Torcino', 8, '', '', '', '', 2, 7, NULL, NULL, NULL),
	(9, 'public/css/images/IRS.png', 'Amidala', '', 'Quisumbing', 9, '', '', '', '', 3, 8, NULL, NULL, NULL),
	(10, 'public/css/images/SUCN.png', 'Gabrielle', '', 'Arrojado', 10, '', '', '', '', 1, 6, NULL, NULL, NULL);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.colleges
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.colleges: ~10 rows (approximately)
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` (`id`, `collegeName`, `collegeCode`, `created_at`, `updated_at`) VALUES
	(1, 'College of Business Administration', 'CBA', NULL, NULL),
	(2, 'College of Engineering and Design', 'CED', NULL, NULL),
	(3, 'Medical School', 'MS', NULL, NULL),
	(4, 'High School', 'HS', NULL, NULL),
	(5, 'College of Mass Communication', 'MassCom', NULL, NULL),
	(6, 'College of Visual and Performing Arts', 'COPVA', NULL, NULL),
	(7, 'Graduate School', 'GS', NULL, NULL),
	(8, 'College of Arts and Sciences', 'CAS', NULL, NULL),
	(9, 'Institute of Rehabilitative Sciences', 'IRS', NULL, NULL),
	(10, 'College of Nursing', 'CN', NULL, NULL);
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.initial_scores
CREATE TABLE IF NOT EXISTS `initial_scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned DEFAULT NULL,
  `judge` int(10) unsigned DEFAULT NULL,
  `IS_Production_Confidence` double(8,2) DEFAULT NULL,
  `IS_Production_Mastery` double(8,2) DEFAULT NULL,
  `IS_Production_StagePresence` double(8,2) DEFAULT NULL,
  `IS_Production_OverallImpact` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Grace` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Projection` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Poise` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Relevance` double(8,2) DEFAULT NULL,
  `IS_EveGown_Grace` double(8,2) DEFAULT NULL,
  `IS_EveGown_Projection` double(8,2) DEFAULT NULL,
  `IS_EveGown_Poise` double(8,2) DEFAULT NULL,
  `IS_EveGown_Regal` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Content` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Content` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_Production_Prcnt` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Prcnt` double(8,2) DEFAULT NULL,
  `IS_EveGown_Prcnt` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Prcnt` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Prcnt` double(8,2) DEFAULT NULL,
  `IS_SubTotal` double(8,2) DEFAULT NULL,
  `SQ_Content` double(8,2) DEFAULT NULL,
  `SQ_Confidence` double(8,2) DEFAULT NULL,
  `SQ_Wit` double(8,2) DEFAULT NULL,
  `SQ_Content_Prcnt` double(8,2) DEFAULT NULL,
  `SQ_Confidence_Prcnt` double(8,2) DEFAULT NULL,
  `SQ_Wit_Prcnt` double(8,2) DEFAULT NULL,
  `SQ_SubTotal` double(8,2) DEFAULT NULL,
  `read` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.initial_scores: ~0 rows (approximately)
/*!40000 ALTER TABLE `initial_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `initial_scores` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2018_08_06_000000_create_candidates_table', 1),
	(3, '2018_08_06_000000_create_colleges_table', 1),
	(4, '2018_08_06_000000_create_organizers_table', 1),
	(5, '2018_08_06_000000_create_users_table', 1),
	(7, '2018_08_08_041010_create_initial_scores_table', 1),
	(8, '2018_08_07_150250_create_prepageants_table', 1),
	(10, '2018_08_15_062236_create_press_launches_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.prepageants
CREATE TABLE IF NOT EXISTS `prepageants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `judge` int(10) unsigned NOT NULL,
  `SP_RS` decimal(8,2) DEFAULT NULL,
  `Talent_Confidence` decimal(8,2) DEFAULT NULL,
  `Talent_Mastery` decimal(8,2) DEFAULT NULL,
  `Talent_StagePresence` decimal(8,2) DEFAULT NULL,
  `Talent_OverallImpact` decimal(8,2) DEFAULT NULL,
  `PSpch_Content` decimal(8,2) DEFAULT NULL,
  `PSpch_Delivery` decimal(8,2) DEFAULT NULL,
  `PSpch_Spontainety` decimal(8,2) DEFAULT NULL,
  `PSpch_Defense` decimal(8,2) DEFAULT NULL,
  `SP_Prcnt` decimal(8,2) DEFAULT NULL,
  `Talent_Prcnt` decimal(8,2) DEFAULT NULL,
  `PSpch_Prcnt` decimal(8,2) DEFAULT NULL,
  `sub_total` decimal(8,2) DEFAULT NULL,
  `read` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.prepageants: ~70 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(4, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(5, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(6, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(7, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(8, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(9, 9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(10, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(11, 1, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(12, 2, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(13, 3, 2, NULL, 24.00, 23.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(14, 4, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(15, 5, 2, NULL, 23.00, 22.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(16, 6, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(17, 7, 2, NULL, 23.00, 24.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(18, 8, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(19, 9, 2, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(20, 10, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(21, 1, 3, NULL, 23.89, 23.78, 23.25, 23.62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(22, 2, 3, NULL, 23.24, 24.35, 23.41, 23.02, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(23, 3, 3, NULL, 24.78, 24.60, 24.60, 24.90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(24, 4, 3, NULL, 23.13, 22.67, 23.24, 23.12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(25, 5, 3, NULL, 22.12, 22.34, 22.64, 22.01, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(26, 6, 3, NULL, 20.42, 21.40, 21.89, 22.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(27, 7, 3, NULL, 23.89, 24.67, 24.92, 24.53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(28, 8, 3, NULL, 23.64, 23.20, 22.20, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(29, 9, 3, NULL, 24.78, 24.89, 24.75, 24.45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(30, 10, 3, NULL, 23.67, 24.64, 23.45, 23.24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(31, 1, 4, NULL, 17.00, 10.00, 12.00, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(32, 2, 4, NULL, 23.00, 22.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(33, 3, 4, NULL, 25.00, 23.00, 25.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(34, 4, 4, NULL, 22.00, 20.00, 20.00, 18.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(35, 5, 4, NULL, 15.00, 10.00, 11.00, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(36, 6, 4, NULL, 24.00, 11.00, 11.00, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(37, 7, 4, NULL, 24.00, 22.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(38, 8, 4, NULL, 16.00, 17.00, 15.00, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(39, 9, 4, NULL, 24.00, 19.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(40, 10, 4, NULL, 20.00, 19.00, 17.00, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(41, 1, 5, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 18.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(42, 2, 5, NULL, NULL, NULL, NULL, NULL, 24.00, 20.00, 18.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(43, 3, 5, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(44, 4, 5, NULL, NULL, NULL, NULL, NULL, 23.00, 22.00, 20.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(45, 5, 5, NULL, NULL, NULL, NULL, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(46, 6, 5, NULL, NULL, NULL, NULL, NULL, 22.00, 25.00, 22.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(47, 7, 5, NULL, NULL, NULL, NULL, NULL, 18.00, 18.00, 20.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(48, 8, 5, NULL, NULL, NULL, NULL, NULL, 22.00, 20.00, 20.00, 22.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(49, 9, 5, NULL, NULL, NULL, NULL, NULL, 25.00, 23.00, 22.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(50, 10, 5, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(51, 1, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 20.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(52, 2, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 18.00, 17.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(53, 3, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(54, 4, 6, NULL, NULL, NULL, NULL, NULL, 21.00, 19.00, 17.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(55, 5, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 19.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(56, 6, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 22.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(57, 7, 6, NULL, NULL, NULL, NULL, NULL, 21.00, 21.00, 22.00, 21.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(58, 8, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 19.00, 19.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(59, 9, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 22.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(60, 10, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 18.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(61, 1, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 25.00, 10.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(62, 2, 7, NULL, NULL, NULL, NULL, NULL, 25.00, 15.00, 10.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(63, 3, 7, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(64, 4, 7, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(65, 5, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 15.00, 5.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(66, 6, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 10.00, 20.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(67, 7, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 10.00, 5.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(68, 8, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 10.00, 10.00, 5.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(69, 9, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 20.00, 25.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(70, 10, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 15.00, 15.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', '2018-08-20 06:40:45', '2018-08-21 14:26:12');
/*!40000 ALTER TABLE `prepageants` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.press_launches
CREATE TABLE IF NOT EXISTS `press_launches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `organizer` int(10) unsigned NOT NULL,
  `PL_RS` int(11) DEFAULT NULL,
  `readPL` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.press_launches: ~10 rows (approximately)
/*!40000 ALTER TABLE `press_launches` DISABLE KEYS */;
INSERT INTO `press_launches` (`id`, `candidate`, `organizer`, `PL_RS`, `readPL`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL, '2018-08-17 15:07:58', '2018-08-21 01:29:38'),
	(2, 2, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(3, 3, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(4, 4, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(5, 5, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(6, 6, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(7, 7, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(8, 8, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(9, 9, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59'),
	(10, 10, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-21 00:54:59');
/*!40000 ALTER TABLE `press_launches` ENABLE KEYS */;

-- Dumping structure for table misssilliman-prepageant.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-prepageant.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'Sam', NULL, 'Lubaton', 'organizer', 'Chair', NULL, 'judge', 'admin', '$2y$10$hahFnqrK4H5NgJ7wvAOAsucR2Y8Vp8V6oZ98cEtwG3u.q1loeRRhe', '2018-08-17 15:11:47', '2018-08-17 15:11:47', 'vqXlTFmRFoa8OqCe7yXh6pMMzfzr7sGSIIEF25w7r7rZf7RK9M2P0fj2Dpob'),
	(2, 'Miguel', NULL, 'Braganza', 'judge', NULL, 'Talent', NULL, 'mbraganza', '$2y$10$YP1tkQhAY3H/LIVuNyCyfuew4YMjJi.fjTGBBAoQfftCmVYaFhE..', '2018-08-21 01:19:03', '2018-08-21 01:19:03', '7wtgbTB7E0LMxwlSTkqbTCX2nyemmCYDudsYlEouT9j7lnUuNXVC0OcnSxLL'),
	(3, 'Carlou', NULL, 'Bernaldez', 'judge', NULL, 'Talent', NULL, 'cbernaldez', '$2y$10$wLnICqT.aL/oV1/uvivMd.YQ1KnGNwEeiL3bs8sdzrBgGaTZIVmrq', '2018-08-20 06:36:47', '2018-08-20 06:36:47', '8BfWqKKqooRVWtkdnLti000EtFuC87HU9B2gw6odBkRROs7TwjEkML81f6sj'),
	(4, 'Junsly', NULL, 'Kitay', 'judge', NULL, 'Talent', NULL, 'jkitay', '$2y$10$CFEF.ylSI3kNvGnPWTwB1OlXBhnC5hZQM9.G2g3uuN9IdHFexebvK', '2018-08-20 06:37:44', '2018-08-20 06:37:44', 't0AMVH4H535TEZ0CaLsLUzfmP9f68Mqme1yrXnBP8cSm8iVRQHtNhQHwlsTT'),
	(5, 'Dr. Dennis', NULL, 'McCann', 'judge', NULL, 'Speech', NULL, 'dmccann', '$2y$10$pmlhOu6pjcUsfQmP6hKNpuFkqcresJuUtMETQ4Tlu2n9dfqQa8t0C', '2018-08-20 06:39:07', '2018-08-20 06:39:07', '4WMFCLR7Ul0NGGf7NRZdIWwBBk8juOXCS0oW3ckfErYgX5V6zo2sJLPIB4Qq'),
	(6, 'Lea', NULL, 'Reyes', 'judge', NULL, 'Speech', NULL, 'lreyes', '$2y$10$SPJdGnp9olg1YW02EVVfOeaKO4MNt5mhtTJDK8cbGd9Mn0oSbnvUi', '2018-08-20 06:39:40', '2018-08-20 06:39:40', '5k0XSio97wmh146bztHqH7GjWA4qsrYah9DKeHSGleBDtVw6WLJx4DrzzmfX'),
	(7, 'Mariana', NULL, 'Botero', 'judge', NULL, 'Speech', NULL, 'mbotero', '$2y$10$4MpJoZl0BCJ0AVhFFp2WIew4n/X7ezoSbmjveBanmwQNDPCtWUgV6', '2018-08-21 01:26:54', '2018-08-21 01:26:54', 'pxJKUEuWkq5DQLou5HcLEEB0lfSuooq813GZESCH0Y6tStAg9goAd4VoDKMO');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
