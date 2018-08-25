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


-- Dumping database structure for misssilliman-dev2
CREATE DATABASE IF NOT EXISTS `misssilliman-dev2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `misssilliman-dev2`;

-- Dumping structure for table misssilliman-dev2.candidates
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

-- Dumping data for table misssilliman-dev2.candidates: ~10 rows (approximately)
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `image`, `fName`, `mName`, `lName`, `college`, `yearLevel`, `SY`, `isTop`, `number`, `seqSpeech`, `seqTalent`, `aveTalent`, `created_at`, `updated_at`) VALUES
	(1, 'public/css/images/CBA.png', 'Mikhaella', '', 'Ponce de Leon', 1, '', '', '5', '', 6, 1, NULL, '2018-08-22 13:41:19', '0000-00-00 00:00:00'),
	(2, 'public/css/images/CED.png', 'Shannel', '', 'Vendiola', 2, '', '', '3', '', 7, 2, NULL, '2018-08-22 13:41:19', NULL),
	(3, 'public/css/images/SUMS.png', 'Oghogho', '', 'Ovonlen', 3, '', '', '1', '', 8, 3, NULL, '2018-08-22 13:41:19', NULL),
	(4, 'public/css/images/SUHS.png', 'Erica', '', 'Villagracia', 4, '', '', '', '', 9, 4, NULL, '2018-08-22 13:41:19', NULL),
	(5, 'public/css/images/CMC.png', 'Ivy', '', 'Salaum', 5, '', '', '', '', 10, 5, NULL, '2018-08-22 13:41:19', NULL),
	(6, 'public/css/images/COPVA.png', 'Chanel', '', 'Pepino', 6, '', '', '4', '', 5, 10, NULL, '2018-08-22 13:41:19', NULL),
	(7, 'public/css/images/GRAD.png', 'Yihui', '', 'Yuan', 7, '', '', '', '', 4, 9, NULL, '2018-08-22 13:41:19', NULL),
	(8, 'public/css/images/CAS.png', 'Christine', '', 'Torcino', 8, '', '', '', '', 2, 7, NULL, '2018-08-22 13:41:19', NULL),
	(9, 'public/css/images/IRS.png', 'Amidala', '', 'Quisumbing', 9, '', '', '2', '', 3, 8, NULL, '2018-08-22 13:41:19', NULL),
	(10, 'public/css/images/SUCN.png', 'Gabrielle', '', 'Arrojado', 10, '', '', '', '', 1, 6, NULL, '2018-08-22 13:41:19', NULL);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;

-- Dumping structure for table misssilliman-dev2.colleges
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.colleges: ~10 rows (approximately)
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

-- Dumping structure for table misssilliman-dev2.initial_scores
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
  `readPROD` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readTHEME` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readEVE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readSEQ` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readINIT` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readSQ` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deductions` decimal(8,2) DEFAULT NULL,
  `readDEDUC` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.initial_scores: ~80 rows (approximately)
/*!40000 ALTER TABLE `initial_scores` DISABLE KEYS */;
INSERT INTO `initial_scores` (`id`, `candidate`, `judge`, `IS_Production_Confidence`, `IS_Production_Mastery`, `IS_Production_StagePresence`, `IS_Production_OverallImpact`, `IS_ThemeWr_Grace`, `IS_ThemeWr_Projection`, `IS_ThemeWr_Poise`, `IS_ThemeWr_Relevance`, `IS_EveGown_Grace`, `IS_EveGown_Projection`, `IS_EveGown_Poise`, `IS_EveGown_Regal`, `IS_SeqIntrvw_Content`, `IS_SeqIntrvw_Wit`, `IS_SeqIntrvw_Delivery`, `IS_SeqIntrvw_Confidence`, `IS_InitIntrvw_Content`, `IS_InitIntrvw_Wit`, `IS_InitIntrvw_Delivery`, `IS_InitIntrvw_Confidence`, `IS_Production_Prcnt`, `IS_ThemeWr_Prcnt`, `IS_EveGown_Prcnt`, `IS_SeqIntrvw_Prcnt`, `IS_InitIntrvw_Prcnt`, `IS_SubTotal`, `SQ_Content`, `SQ_Confidence`, `SQ_Wit`, `SQ_Content_Prcnt`, `SQ_Confidence_Prcnt`, `SQ_Wit_Prcnt`, `SQ_SubTotal`, `readPROD`, `readTHEME`, `readEVE`, `readSEQ`, `readINIT`, `readSQ`, `deductions`, `readDEDUC`, `created_at`, `updated_at`) VALUES
	(1, 1, 8, 25.00, 23.00, 21.00, 22.00, 23.00, 25.00, 23.00, 18.00, 23.00, 24.00, 23.00, 21.00, 23.00, 23.00, 23.00, 23.00, 17.00, 20.00, 16.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 76.00, 92.00, 92.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(2, 2, 8, 23.00, 23.00, 19.00, 19.00, 19.00, 23.00, 22.00, 18.00, 19.00, 22.00, 20.00, 19.00, 21.00, 22.00, 20.00, 22.00, 22.00, 19.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, 72.00, 90.00, 82.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(3, 3, 8, 22.00, 23.00, 23.00, 22.00, 25.00, 23.00, 25.00, 22.00, 25.00, 24.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 91.00, 93.00, 92.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(4, 4, 8, 18.00, 22.00, 18.00, 17.00, 17.00, 22.00, 22.00, 17.00, 19.00, 24.00, 21.00, 19.00, 17.00, 16.00, 15.00, 17.00, 11.00, 15.00, 12.00, 19.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(5, 5, 8, 19.00, 22.00, 20.00, 21.00, 22.00, 19.00, 21.00, 21.00, 18.00, 17.00, 20.00, 20.00, 18.00, 19.00, 19.00, 19.00, 13.00, 16.00, 14.00, 17.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(6, 6, 8, 23.00, 23.00, 22.00, 22.00, 20.00, 24.00, 19.00, 20.00, 19.00, 21.00, 22.00, 21.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 92.00, 93.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(7, 7, 8, 17.00, 21.00, 16.00, 18.00, 21.00, 19.00, 19.00, 24.00, 25.00, 22.00, 22.00, 22.00, 25.00, 23.00, 19.00, 22.00, 23.00, 20.00, 19.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(8, 8, 8, 20.00, 21.00, 21.00, 20.00, 21.00, 19.00, 21.00, 19.00, 18.00, 20.00, 20.00, 22.00, 21.00, 25.00, 19.00, 20.00, 13.00, 16.00, 17.00, 17.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(9, 9, 8, 25.00, 22.00, 20.00, 19.00, 21.00, 23.00, 23.00, 20.00, 19.00, 25.00, 20.00, 19.00, 25.00, 25.00, 25.00, 25.00, 24.00, 25.00, 23.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 93.00, 93.00, 94.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(10, 10, 8, 19.00, 22.00, 19.00, 19.00, 19.00, 19.00, 20.00, 20.00, 20.00, 23.00, 20.00, 18.00, 22.00, 18.00, 18.00, 19.00, 16.00, 16.00, 16.00, 17.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(11, 1, 9, 20.00, 23.00, 23.00, 19.00, 21.00, 23.00, 21.00, 22.00, 21.00, 21.00, 21.00, 21.00, 23.00, 23.00, 23.00, 23.00, 19.00, 20.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 58.00, 50.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(12, 2, 9, 20.00, 20.00, 20.00, 19.00, 23.00, 24.00, 23.00, 23.00, 21.00, 21.00, 22.00, 22.00, 20.00, 21.00, 21.00, 23.00, 24.00, 23.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, 83.00, 83.00, 75.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(13, 3, 9, 23.00, 23.00, 24.00, 24.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 23.00, 22.00, 23.00, 23.00, 22.00, 20.00, 20.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, 100.00, 95.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(14, 4, 9, 23.00, 23.00, 23.00, 23.00, 20.00, 19.00, 19.00, 19.00, 22.00, 23.00, 23.00, 22.00, 20.00, 20.00, 21.00, 23.00, 20.00, 20.00, 19.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(15, 5, 9, 20.00, 22.00, 22.00, 20.00, 19.00, 21.00, 20.00, 23.00, 19.00, 20.00, 19.00, 19.00, 20.00, 20.00, 20.00, 20.00, 23.00, 23.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(16, 6, 9, 22.00, 22.00, 22.00, 20.00, 19.00, 19.00, 19.00, 21.00, 22.00, 22.00, 21.00, 20.00, 23.00, 23.00, 23.00, 23.00, 25.00, 24.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 80.00, 80.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(17, 7, 9, 24.00, 22.00, 22.00, 20.00, 20.00, 21.00, 20.00, 24.00, 22.00, 21.00, 22.00, 22.00, 23.00, 20.00, 21.00, 23.00, 23.00, 20.00, 20.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(18, 8, 9, 21.00, 20.00, 20.00, 20.00, 21.00, 21.00, 21.00, 23.00, 20.00, 20.00, 22.00, 21.00, 21.00, 21.00, 21.00, 23.00, 19.00, 19.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(19, 9, 9, 24.00, 24.00, 23.00, 24.00, 23.00, 24.00, 23.00, 25.00, 21.00, 24.00, 23.00, 22.00, 23.00, 22.00, 22.00, 23.00, 24.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 90.00, 90.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(20, 10, 9, 20.00, 20.00, 20.00, 23.00, 21.00, 20.00, 21.00, 20.00, 20.00, 21.00, 22.00, 19.00, 23.00, 21.00, 23.00, 23.00, 19.00, 19.00, 19.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(21, 1, 10, 15.00, 25.00, 25.00, 25.00, 15.00, 20.00, 15.00, 25.00, 15.00, 15.00, 15.00, 15.00, 20.00, 25.00, 25.00, 25.00, 5.00, 5.00, 10.00, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 100.00, 80.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(22, 2, 10, 25.00, 20.00, 20.00, 25.00, 20.00, 15.00, 20.00, 25.00, 15.00, 15.00, 20.00, 20.00, 15.00, 20.00, 15.00, 15.00, 25.00, 25.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 40.00, 40.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(23, 3, 10, 20.00, 20.00, 25.00, 25.00, 20.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 20.00, 20.00, 20.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, 100.00, 100.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(24, 4, 10, 25.00, 20.00, 25.00, 25.00, 15.00, 15.00, 20.00, 20.00, 15.00, 20.00, 25.00, 20.00, 10.00, 10.00, 10.00, 10.00, 5.00, 5.00, 10.00, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(25, 5, 10, 20.00, 20.00, 15.00, 15.00, 15.00, 15.00, 15.00, 25.00, 10.00, 10.00, 15.00, 5.00, 20.00, 15.00, 20.00, 15.00, 20.00, 15.00, 15.00, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(26, 6, 10, 15.00, 15.00, 15.00, 15.00, 10.00, 15.00, 15.00, 25.00, 10.00, 10.00, 10.00, 5.00, 20.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 80.00, 100.00, 100.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(27, 7, 10, 20.00, 20.00, 15.00, 15.00, 15.00, 15.00, 15.00, 25.00, 15.00, 10.00, 15.00, 15.00, 20.00, 25.00, 25.00, 25.00, 20.00, 20.00, 15.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(28, 8, 10, 20.00, 20.00, 20.00, 25.00, 20.00, 20.00, 20.00, 25.00, 15.00, 15.00, 15.00, 15.00, 20.00, 15.00, 20.00, 15.00, 5.00, 5.00, 15.00, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(29, 9, 10, 25.00, 20.00, 20.00, 20.00, 25.00, 25.00, 20.00, 25.00, 20.00, 25.00, 15.00, 25.00, 25.00, 20.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, 100.00, 100.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(30, 10, 10, 25.00, 25.00, 20.00, 25.00, 20.00, 20.00, 25.00, 25.00, 15.00, 15.00, 20.00, 15.00, 20.00, 15.00, 20.00, 15.00, 15.00, 15.00, 20.00, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(31, 1, 11, 23.00, 23.00, 22.00, 23.00, 21.00, 22.00, 21.00, 21.00, 24.00, 23.00, 22.00, 21.00, 21.00, 21.00, 22.00, 24.00, 21.00, 21.00, 20.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, 50.00, 70.00, 50.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(32, 2, 11, 23.00, 22.00, 23.00, 23.00, 23.00, 22.00, 23.00, 23.00, 22.00, 23.00, 21.00, 21.00, 23.00, 22.00, 23.00, 23.00, 21.00, 22.00, 23.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, 50.00, 60.00, 40.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(33, 3, 11, 25.00, 24.00, 24.00, 24.00, 24.00, 24.00, 24.00, 23.00, 23.00, 23.00, 24.00, 23.00, 25.00, 24.00, 24.00, 25.00, 25.00, 24.00, 24.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 95.00, 94.00, 92.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(34, 4, 11, 25.00, 24.00, 23.00, 24.00, 24.00, 23.00, 24.00, 23.00, 23.00, 24.00, 23.00, 24.00, 21.00, 22.00, 22.00, 25.00, 21.00, 21.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(35, 5, 11, 23.00, 23.00, 23.00, 23.00, 23.00, 22.00, 23.00, 23.00, 21.00, 21.00, 22.00, 22.00, 21.00, 22.00, 24.00, 24.00, 22.00, 21.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(36, 6, 11, 23.00, 22.00, 23.00, 22.00, 20.00, 21.00, 22.00, 22.00, 21.00, 22.00, 21.00, 20.00, 24.00, 24.00, 24.00, 25.00, 22.00, 23.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 75.00, 85.00, 89.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(37, 7, 11, 22.00, 22.00, 23.00, 23.00, 22.00, 23.00, 23.00, 22.00, 22.00, 23.00, 22.00, 21.00, 25.00, 24.00, 22.00, 25.00, 25.00, 24.00, 24.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(38, 8, 11, 23.00, 22.00, 22.00, 23.00, 23.00, 23.00, 21.00, 22.00, 23.00, 21.00, 23.00, 24.00, 25.00, 24.00, 24.00, 24.00, 23.00, 22.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(39, 9, 11, 24.00, 23.00, 23.00, 23.00, 25.00, 24.00, 25.00, 24.00, 24.00, 24.00, 25.00, 24.00, 22.00, 23.00, 23.00, 23.00, 25.00, 24.00, 25.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, 85.00, 90.00, 95.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(40, 10, 11, 24.00, 25.00, 24.00, 23.00, 22.00, 21.00, 22.00, 23.00, 21.00, 22.00, 23.00, 23.00, 23.00, 22.00, 22.00, 24.00, 22.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(41, 1, 12, 20.00, 25.00, 20.00, 20.00, 20.00, 25.00, 20.00, 25.00, 15.00, 20.00, 15.00, 20.00, 20.00, 25.00, 25.00, 25.00, 15.00, 15.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 80.00, 50.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(42, 2, 12, 20.00, 20.00, 20.00, 20.00, 25.00, 20.00, 25.00, 20.00, 15.00, 20.00, 15.00, 20.00, 25.00, 25.00, 25.00, 25.00, 20.00, 15.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 80.00, 50.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(43, 3, 12, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 15.00, 25.00, 25.00, 25.00, 20.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 100.00, 80.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(44, 4, 12, 25.00, 20.00, 20.00, 20.00, 20.00, 25.00, 20.00, 15.00, 15.00, 20.00, 15.00, 15.00, 20.00, 20.00, 20.00, 25.00, 20.00, 20.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(45, 5, 12, 20.00, 20.00, 20.00, 20.00, 20.00, 20.00, 20.00, 25.00, 15.00, 20.00, 15.00, 15.00, 20.00, 20.00, 25.00, 25.00, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(46, 6, 12, 25.00, 20.00, 25.00, 20.00, 20.00, 15.00, 15.00, 15.00, 15.00, 20.00, 15.00, 15.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, 70.00, 90.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(47, 7, 12, 20.00, 20.00, 15.00, 20.00, 15.00, 15.00, 15.00, 20.00, 20.00, 15.00, 20.00, 20.00, 20.00, 20.00, 25.00, 25.00, 20.00, 15.00, 15.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(48, 8, 12, 20.00, 20.00, 15.00, 20.00, 15.00, 15.00, 15.00, 20.00, 15.00, 15.00, 20.00, 20.00, 20.00, 20.00, 20.00, 20.00, 15.00, 20.00, 15.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(49, 9, 12, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 25.00, 20.00, 20.00, 25.00, 25.00, 25.00, 20.00, 20.00, 25.00, 25.00, 20.00, 20.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 100.00, 80.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(50, 10, 12, 25.00, 25.00, 25.00, 25.00, 15.00, 20.00, 20.00, 25.00, 20.00, 25.00, 20.00, 20.00, 20.00, 20.00, 25.00, 25.00, 15.00, 15.00, 20.00, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(51, 1, 13, 22.00, 24.00, 23.00, 23.00, 24.00, 24.00, 21.00, 23.00, 24.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 24.00, 25.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 93.00, 94.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(52, 2, 13, 21.00, 22.00, 22.00, 22.00, 24.00, 23.00, 22.00, 23.00, 23.00, 23.00, 24.00, 24.00, NULL, NULL, NULL, NULL, 24.00, 24.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 80.00, 92.00, 93.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(53, 3, 13, 24.00, 24.00, 24.00, 24.00, 24.00, 23.00, 23.00, 24.00, 24.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 24.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, 100.00, 100.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(54, 4, 13, 24.00, 23.00, 23.00, 24.00, 25.00, 25.00, 24.00, 25.00, 24.00, 25.00, 24.00, 24.00, NULL, NULL, NULL, NULL, 22.00, 22.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(55, 5, 13, 23.00, 21.00, 20.00, 21.00, 23.00, 22.00, 23.00, 23.00, 23.00, 23.00, 23.00, 24.00, NULL, NULL, NULL, NULL, 21.00, 23.00, 20.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(56, 6, 13, 19.00, 21.00, 22.00, 22.00, 21.00, 22.00, 22.00, 22.00, 21.00, 22.00, 21.00, 23.00, NULL, NULL, NULL, NULL, 23.00, 23.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 90.00, 90.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(57, 7, 13, 19.00, 20.00, 20.00, 21.00, 23.00, 22.00, 23.00, 23.00, 21.00, 21.00, 22.00, 22.00, NULL, NULL, NULL, NULL, 24.00, 24.00, 23.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(58, 8, 13, 22.00, 22.00, 23.00, 23.00, 23.00, 23.00, 22.00, 22.00, 24.00, 24.00, 24.00, 24.00, NULL, NULL, NULL, NULL, 23.00, 22.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(59, 9, 13, 24.00, 23.00, 23.00, 22.00, 25.00, 25.00, 25.00, 25.00, 23.00, 23.00, 23.00, 25.00, NULL, NULL, NULL, NULL, 24.00, 24.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, 93.00, 95.00, 95.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(60, 10, 13, 22.00, 22.00, 22.00, 23.00, 24.00, 24.00, 23.00, 24.00, 23.00, 24.00, 23.00, 24.00, NULL, NULL, NULL, NULL, 22.00, 22.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', NULL, 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(61, 1, 14, 23.00, 22.00, 21.00, 21.00, 20.00, 21.00, 21.00, 20.00, 20.00, 21.00, 21.00, 20.00, 20.00, 19.00, 20.00, 21.00, 20.00, 20.00, 21.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 85.00, 90.00, 85.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(62, 2, 14, 20.00, 22.00, 21.00, 21.00, 21.00, 22.00, 21.00, 20.00, 21.00, 21.00, 21.00, 20.00, 19.00, 19.00, 20.00, 20.00, 22.00, 22.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 85.00, 90.00, 87.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(63, 3, 14, 24.00, 24.00, 24.00, 24.00, 24.00, 24.00, 24.00, 23.00, 24.00, 24.00, 24.00, 22.00, 22.00, 21.00, 23.00, 23.00, 24.00, 24.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, 90.00, 90.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(64, 4, 14, 22.00, 21.00, 21.00, 20.00, 21.00, 21.00, 21.00, 20.00, 22.00, 22.00, 22.00, 21.00, 18.00, 18.00, 18.00, 18.00, 19.00, 19.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(65, 5, 14, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 22.00, 20.00, 20.00, 20.00, 20.00, 18.00, 18.00, 18.00, 18.00, 22.00, 22.00, 21.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(66, 6, 14, 21.00, 21.00, 22.00, 21.00, 20.00, 21.00, 21.00, 20.00, 21.00, 20.00, 20.00, 21.00, 21.00, 21.00, 21.00, 20.00, 24.00, 24.00, 24.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, 87.00, 90.00, 87.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(67, 7, 14, 21.00, 22.00, 22.00, 22.00, 22.00, 21.00, 21.00, 22.00, 20.00, 20.00, 20.00, 21.00, 22.00, 20.00, 20.00, 21.00, 23.00, 22.00, 21.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(68, 8, 14, 22.00, 22.00, 22.00, 22.00, 22.00, 22.00, 22.00, 22.00, 21.00, 21.00, 22.00, 22.00, 20.00, 20.00, 21.00, 19.00, 22.00, 22.00, 21.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(69, 9, 14, 21.00, 21.00, 21.00, 21.00, 22.00, 22.00, 22.00, 21.00, 23.00, 24.00, 23.00, 22.00, 21.00, 22.00, 22.00, 22.00, 22.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, 89.00, 90.00, 90.00, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(70, 10, 14, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 21.00, 20.00, 21.00, 21.00, 19.00, 19.00, 20.00, 20.00, 21.00, 21.00, 21.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', 'readonly', NULL, NULL, NULL, NULL),
	(71, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.06, 'readonly', NULL, NULL),
	(72, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.06, 'readonly', NULL, NULL),
	(73, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.08, 'readonly', NULL, NULL),
	(74, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.08, 'readonly', NULL, NULL),
	(75, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.01, 'readonly', NULL, NULL),
	(76, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.01, 'readonly', NULL, NULL),
	(77, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.53, 'readonly', NULL, NULL),
	(78, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.09, 'readonly', NULL, NULL),
	(79, 9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.07, 'readonly', NULL, NULL),
	(80, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.05, 'readonly', NULL, NULL);
/*!40000 ALTER TABLE `initial_scores` ENABLE KEYS */;

-- Dumping structure for table misssilliman-dev2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.migrations: ~8 rows (approximately)
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

-- Dumping structure for table misssilliman-dev2.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table misssilliman-dev2.prepageants
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
  `deductions` decimal(8,2) DEFAULT NULL,
  `readDeduc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.prepageants: ~70 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `read`, `deductions`, `readDeduc`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 95.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.00, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(2, 2, 1, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.01, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(3, 3, 1, 87.50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.01, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(4, 4, 1, 80.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 1.01, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(5, 5, 1, 77.50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.52, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(6, 6, 1, 81.25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 1.00, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(7, 7, 1, 93.75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.50, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(8, 8, 1, 71.25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.50, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(9, 9, 1, 76.25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.01, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(10, 10, 1, 50.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', 0.51, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:48:02'),
	(11, 1, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(12, 2, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(13, 3, 2, NULL, 24.00, 23.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(14, 4, 2, NULL, 23.00, 23.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(15, 5, 2, NULL, 23.00, 22.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(16, 6, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(17, 7, 2, NULL, 23.00, 24.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(18, 8, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(19, 9, 2, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(20, 10, 2, NULL, 23.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:35:52', '2018-08-21 14:13:47'),
	(21, 1, 3, NULL, 23.89, 23.78, 23.25, 23.62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(22, 2, 3, NULL, 23.24, 24.35, 23.41, 23.02, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(23, 3, 3, NULL, 24.78, 24.60, 24.60, 24.90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(24, 4, 3, NULL, 23.13, 22.67, 23.24, 23.12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(25, 5, 3, NULL, 22.12, 22.34, 22.64, 22.01, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(26, 6, 3, NULL, 20.42, 21.40, 21.89, 22.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(27, 7, 3, NULL, 23.89, 24.67, 24.92, 24.53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(28, 8, 3, NULL, 23.64, 23.20, 22.20, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(29, 9, 3, NULL, 24.78, 24.89, 24.75, 24.45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(30, 10, 3, NULL, 23.67, 24.64, 23.45, 23.24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:36:47', '2018-08-21 14:16:05'),
	(31, 1, 4, NULL, 17.00, 10.00, 12.00, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(32, 2, 4, NULL, 23.00, 22.00, 23.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(33, 3, 4, NULL, 25.00, 23.00, 25.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(34, 4, 4, NULL, 22.00, 20.00, 20.00, 18.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(35, 5, 4, NULL, 15.00, 10.00, 11.00, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(36, 6, 4, NULL, 24.00, 11.00, 11.00, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(37, 7, 4, NULL, 24.00, 22.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(38, 8, 4, NULL, 16.00, 17.00, 15.00, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(39, 9, 4, NULL, 24.00, 19.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(40, 10, 4, NULL, 20.00, 19.00, 17.00, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:37:44', '2018-08-21 14:16:27'),
	(41, 1, 5, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 18.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(42, 2, 5, NULL, NULL, NULL, NULL, NULL, 24.00, 20.00, 18.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(43, 3, 5, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(44, 4, 5, NULL, NULL, NULL, NULL, NULL, 23.00, 22.00, 20.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(45, 5, 5, NULL, NULL, NULL, NULL, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(46, 6, 5, NULL, NULL, NULL, NULL, NULL, 22.00, 25.00, 22.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(47, 7, 5, NULL, NULL, NULL, NULL, NULL, 18.00, 18.00, 20.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(48, 8, 5, NULL, NULL, NULL, NULL, NULL, 22.00, 20.00, 20.00, 22.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(49, 9, 5, NULL, NULL, NULL, NULL, NULL, 25.00, 23.00, 22.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(50, 10, 5, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:07', '2018-08-21 14:26:19'),
	(51, 1, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 20.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(52, 2, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 18.00, 17.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(53, 3, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(54, 4, 6, NULL, NULL, NULL, NULL, NULL, 21.00, 19.00, 17.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(55, 5, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 19.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(56, 6, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 22.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(57, 7, 6, NULL, NULL, NULL, NULL, NULL, 21.00, 21.00, 22.00, 21.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(58, 8, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 19.00, 19.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(59, 9, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 23.00, 22.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(60, 10, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 18.00, 19.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:39:40', '2018-08-21 14:21:48'),
	(61, 1, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 25.00, 10.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(62, 2, 7, NULL, NULL, NULL, NULL, NULL, 25.00, 15.00, 10.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(63, 3, 7, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(64, 4, 7, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(65, 5, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 15.00, 5.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(66, 6, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 10.00, 20.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(67, 7, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 10.00, 5.00, 10.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(68, 8, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 10.00, 10.00, 5.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(69, 9, 7, NULL, NULL, NULL, NULL, NULL, 15.00, 20.00, 25.00, 20.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12'),
	(70, 10, 7, NULL, NULL, NULL, NULL, NULL, 10.00, 15.00, 15.00, 15.00, NULL, NULL, NULL, NULL, 'readonly', NULL, NULL, '2018-08-20 06:40:45', '2018-08-21 14:26:12');
/*!40000 ALTER TABLE `prepageants` ENABLE KEYS */;

-- Dumping structure for table misssilliman-dev2.press_launches
CREATE TABLE IF NOT EXISTS `press_launches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `organizer` int(10) unsigned NOT NULL,
  `PL_RS` decimal(8,2) DEFAULT NULL,
  `readPL` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.press_launches: ~10 rows (approximately)
/*!40000 ALTER TABLE `press_launches` DISABLE KEYS */;
INSERT INTO `press_launches` (`id`, `candidate`, `organizer`, `PL_RS`, `readPL`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 83.39, 'readonly', '2018-08-17 15:07:58', '2018-08-24 09:42:31'),
	(2, 2, 1, 82.27, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(3, 3, 1, 94.10, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(4, 4, 1, 78.10, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(5, 5, 1, 81.05, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(6, 6, 1, 89.22, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(7, 7, 1, 84.34, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(8, 8, 1, 79.27, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(9, 9, 1, 92.37, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31'),
	(10, 10, 1, 75.76, 'readonly', '2018-08-17 15:11:47', '2018-08-24 09:42:31');
/*!40000 ALTER TABLE `press_launches` ENABLE KEYS */;

-- Dumping structure for table misssilliman-dev2.users
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman-dev2.users: ~14 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'Samantha', NULL, 'Gubaton', 'organizer', 'Chair', NULL, 'admin,judge', 'admin', '$2y$10$hahFnqrK4H5NgJ7wvAOAsucR2Y8Vp8V6oZ98cEtwG3u.q1loeRRhe', '2018-08-17 15:11:47', '2018-08-17 15:11:47', 'ISiAm9w9QgOfuz7vwOhCtzRG54kUyxyWU5cvnZVRl3h3OWzLVMLPwq1WfpeN'),
	(2, 'Miguel', NULL, 'Braganza', 'judge', NULL, 'Talent', NULL, 'mbraganza', '$2y$10$Z7rstIgMmsiV.co1QCR4zO3awwAI6e4/0P0od4nRkE5RpxIsvoLH2', '2018-08-20 06:35:52', '2018-08-20 06:35:52', NULL),
	(3, 'Carlou', NULL, 'Bernaldez', 'judge', NULL, 'Talent', NULL, 'cbernaldez', '$2y$10$wLnICqT.aL/oV1/uvivMd.YQ1KnGNwEeiL3bs8sdzrBgGaTZIVmrq', '2018-08-20 06:36:47', '2018-08-20 06:36:47', '64tS6HVoAaQ07dTgs2i2HxbFnfo2vuppjhRepwO2gJtV46f8MJwBBEvNrSwA'),
	(4, 'Junsly', NULL, 'Kitay', 'judge', NULL, 'Talent', NULL, 'jkitay', '$2y$10$CFEF.ylSI3kNvGnPWTwB1OlXBhnC5hZQM9.G2g3uuN9IdHFexebvK', '2018-08-20 06:37:44', '2018-08-20 06:37:44', NULL),
	(5, 'Dr.', NULL, 'McCann', 'judge', NULL, 'Speech', NULL, 'dmccann', '$2y$10$pmlhOu6pjcUsfQmP6hKNpuFkqcresJuUtMETQ4Tlu2n9dfqQa8t0C', '2018-08-20 06:39:07', '2018-08-20 06:39:07', 'udoSWeLJQrD3HdVFAPzC94CJKOij2Xza0wRxfVW6zQsqazR024huMlxhTUOQ'),
	(6, 'Lea', NULL, 'Reyes', 'judge', NULL, 'Speech', NULL, 'lreyes', '$2y$10$SPJdGnp9olg1YW02EVVfOeaKO4MNt5mhtTJDK8cbGd9Mn0oSbnvUi', '2018-08-20 06:39:40', '2018-08-20 06:39:40', NULL),
	(7, 'Mariana', NULL, 'Botero', 'judge', NULL, 'Speech', NULL, 'mbotero', '$2y$10$qAGOYcqyz0DO1uYvz80os./EWQ3I103tbNpIYXQfvbKMmabqGyJmG', '2018-08-20 06:40:45', '2018-08-20 06:40:45', 'dYEeiLHuuKo5CtHElvQGcEmL1HTl92GJZmsm7ehy63ivlKP6wQvjwfPkjiXK'),
	(8, 'Lissa Patricia', NULL, 'Duch', 'judge', NULL, 'Final', NULL, 'judge7', '$2y$10$.wzFKYwr9td6gVNY7KgDbu/uiH6TXzIOJ4RfxuniZd54TKT.NTMIm', '2018-08-22 01:55:37', '2018-08-23 11:25:03', 'YMcXoHsIY49qrI02rlSJM4Q3sp1mreMMehp4vuBuNU0p9N0eFWdd2LbVc9di'),
	(9, 'Albert', NULL, 'Salamanca', 'judge', NULL, 'Final', NULL, 'judge8', '$2y$10$SWgGqwPnBYtJN7qpYsU3quXmwbzAdQCf9/dsC/rw0JJ2H3Ie553ya', '2018-08-22 13:39:21', '2018-08-23 11:26:16', 'yZNYYyFLBuhQccCRjt2lebSFTG1gv8ViOtWdR3yHI8nkNGhPRYLnm07q0D8e'),
	(10, 'Mariana', NULL, 'Botero', 'judge', NULL, 'Final', NULL, 'judge9', '$2y$10$TJuMXjMU6SFlnZT6pcyr/eyiFEJogDfZbuiDVUbLNLq3cYNOeVHNy', '2018-08-22 13:40:17', '2018-08-23 11:26:48', 'VghIJjYQwem4VtXpv0AMpEgS1kD9cTATCBmYIoOMzpF1OSkKXG30nwVY5sTn'),
	(11, 'Patty Laurel', NULL, 'Filart', 'judge', NULL, 'Final', NULL, 'judge10', '$2y$10$uoJdtqmnnQDO58vl23Xiy.sOj1QyoSeTvvRNjgdKwn5PMUG/4QPqm', '2018-08-22 13:40:32', '2018-08-23 11:27:52', 'YJRVKB2LeQsVwjFdpSWPzL157i49BK2b5knNmdd4EbthrffkAb2TjIpFhVwZ'),
	(12, 'Cherokee Dawn Esguerra', NULL, 'Dela Cruz', 'judge', NULL, 'Final', NULL, 'judge11', '$2y$10$isd0fFaJ5.3FRVi6V9uAbOZ8ZA5Ii/9ltZCKfxE8Jg4DF6ZwWjd7m', '2018-08-23 07:32:38', '2018-08-23 11:28:35', 'd7qELY1xaNhDXPuIxXtzzatzMw5SLQpz52B7qGf6kK3gLTDkeIf0ubeoCd4v'),
	(13, 'Celan', NULL, 'Alo', 'judge', NULL, 'Final', NULL, 'judge12', '$2y$10$puMCfknHm3ZBSUfdODgpGeEtCpV3HxzcHrDQ8oYk8k1Le/aBQjtCK', '2018-08-22 13:41:02', '2018-08-23 11:29:00', '2CKf1BNhjX17ABwspdGC9s4VXRlsRoNQHkFtDVtEMZfk8wbbzrwKBV46tPAF'),
	(14, 'Leorey', NULL, 'Saligan', 'judge', NULL, 'Final', NULL, 'judge13', '$2y$10$fkYk6jYIoGZzYm8RIYygwu89fL4LargGFvwEYvtkB8r0aLVBo.2Kq', '2018-08-22 13:41:19', '2018-08-23 11:29:22', 'q79OMMWwh3zUIriLWCUkr5RJx1FZZiQRIJt4x3H9qWsNcyp01BrDDqKJCrQs');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
