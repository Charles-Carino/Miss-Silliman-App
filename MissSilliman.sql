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

-- Dumping data for table misssilliman-prepageant.prepageants: ~65 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 4.80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(2, 2, 1, 5.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(3, 3, 1, 6.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(4, 4, 1, 7.20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(5, 5, 1, 7.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(6, 6, 1, 7.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(7, 7, 1, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(8, 8, 1, 8.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(9, 9, 1, 7.80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(10, 10, 1, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-20 07:56:21'),
	(11, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(12, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(13, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(14, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(15, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(16, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(17, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(18, 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(19, 9, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(20, 10, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:35:52', '2018-08-20 07:14:01'),
	(21, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(22, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(23, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(24, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(25, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(26, 6, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(27, 7, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(28, 8, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(29, 9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(30, 10, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:36:47', '2018-08-20 07:14:18'),
	(31, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(32, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(33, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(34, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(35, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(36, 6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(37, 7, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(38, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(39, 9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(40, 10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:37:44', '2018-08-20 07:07:37'),
	(41, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(42, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(43, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(44, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(45, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(46, 6, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(47, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(48, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(49, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(50, 10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:07', '2018-08-20 07:13:26'),
	(51, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(52, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(53, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(54, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(55, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(56, 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(57, 7, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(58, 8, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(59, 9, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(60, 10, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:39:40', '2018-08-20 07:14:36'),
	(61, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(62, 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(63, 3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(64, 4, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(65, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(66, 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(67, 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(68, 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(69, 9, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52'),
	(70, 10, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:40:45', '2018-08-20 07:13:52');
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
	(1, 1, 1, NULL, NULL, '2018-08-17 15:07:58', '2018-08-20 23:21:26'),
	(2, 2, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 23:08:37'),
	(3, 3, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-20 23:08:38'),
	(4, 4, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 08:45:06'),
	(5, 5, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(6, 6, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(7, 7, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(8, 8, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(9, 9, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(10, 10, 1, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50');
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

-- Dumping data for table misssilliman-prepageant.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'admin', NULL, 'admin', 'organizer', 'Chair', NULL, 'admin,judge', 'admin', '$2y$10$hahFnqrK4H5NgJ7wvAOAsucR2Y8Vp8V6oZ98cEtwG3u.q1loeRRhe', '2018-08-17 15:11:47', '2018-08-17 15:11:47', 'EvhWaS9MPjhiUta68fI7ZBYuPGW1lBE1gLjUydp7qBa6ahk5b6Cq38tr0NoI'),
	(2, 'Miguel', NULL, 'Braganza', 'judge', NULL, 'Talent', NULL, 'mbraganza', '$2y$10$a9j9iIUvK3v3rPX85UHBMuyXFbW13l2Nw2BZ3a/3B8YJx16m1jeRy', '2018-08-20 06:35:52', '2018-08-20 23:17:44', '9nPewnM2sT5saUwu745Jj3VRBD6ypdPYk24AHkPyhS33A5t9rjF7hNCTru7F'),
	(3, 'Carlou', NULL, 'Bernaldez', 'judge', NULL, 'Talent', NULL, 'cbernaldez', '$2y$10$wLnICqT.aL/oV1/uvivMd.YQ1KnGNwEeiL3bs8sdzrBgGaTZIVmrq', '2018-08-20 06:36:47', '2018-08-20 06:36:47', NULL),
	(4, 'Junsly', NULL, 'Kitay', 'judge', NULL, 'Talent', NULL, 'jkitay', '$2y$10$CFEF.ylSI3kNvGnPWTwB1OlXBhnC5hZQM9.G2g3uuN9IdHFexebvK', '2018-08-20 06:37:44', '2018-08-20 06:37:44', NULL),
	(5, 'Dr.', NULL, 'McCann', 'judge', NULL, 'Speech', NULL, 'dmccann', '$2y$10$pmlhOu6pjcUsfQmP6hKNpuFkqcresJuUtMETQ4Tlu2n9dfqQa8t0C', '2018-08-20 06:39:07', '2018-08-20 06:39:07', 'udoSWeLJQrD3HdVFAPzC94CJKOij2Xza0wRxfVW6zQsqazR024huMlxhTUOQ'),
	(6, 'Lea', NULL, 'Reyes', 'judge', NULL, 'Speech', NULL, 'lreyes', '$2y$10$SPJdGnp9olg1YW02EVVfOeaKO4MNt5mhtTJDK8cbGd9Mn0oSbnvUi', '2018-08-20 06:39:40', '2018-08-20 06:39:40', NULL),
	(7, 'Mariana', NULL, 'Botero', 'judge', NULL, 'Speech', NULL, 'mbotero', '$2y$10$spzH6silE4XM49ealFBqD.BhEmrbQWYBEw8R3LB3qbOoX1G9rdT.G', '2018-08-20 06:40:45', '2018-08-20 23:19:36', 'X41C4AOXTS1zsoXGfgSrklnbrN7F25AqCqlzyfbOPFITn7sf53oVK71jaFmJ');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
