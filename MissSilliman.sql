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


-- Dumping database structure for misssilliman
CREATE DATABASE IF NOT EXISTS `misssilliman` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `misssilliman`;

-- Dumping structure for table misssilliman.candidates
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

-- Dumping data for table misssilliman.candidates: ~10 rows (approximately)
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

-- Dumping structure for table misssilliman.colleges
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.colleges: ~10 rows (approximately)
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

-- Dumping structure for table misssilliman.initial_scores
CREATE TABLE IF NOT EXISTS `initial_scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned DEFAULT NULL,
  `judge` int(10) unsigned DEFAULT NULL,
  `IS_Production_Confidence` double(8,2) DEFAULT '0.00',
  `IS_Production_Mastery` double(8,2) DEFAULT NULL,
  `IS_Production_StagePresence` double(8,2) DEFAULT NULL,
  `IS_Production_OverallImpact` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Grace` double(8,2) DEFAULT '0.00',
  `IS_ThemeWr_Projection` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Poise` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Relevance` double(8,2) DEFAULT NULL,
  `IS_EveGown_Grace` double(8,2) DEFAULT '0.00',
  `IS_EveGown_Projection` double(8,2) DEFAULT NULL,
  `IS_EveGown_Poise` double(8,2) DEFAULT NULL,
  `IS_EveGown_Regal` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Content` double(8,2) DEFAULT '0.00',
  `IS_SeqIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Content` double(8,2) DEFAULT '0.00',
  `IS_InitIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_Production_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_ThemeWr_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_EveGown_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_SeqIntrvw_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_InitIntrvw_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_SubTotal` double(8,2) DEFAULT '0.00',
  `SQ_Content` double(8,2) DEFAULT '0.00',
  `SQ_Confidence` double(8,2) DEFAULT '0.00',
  `SQ_Wit` double(8,2) DEFAULT '0.00',
  `SQ_Content_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_Confidence_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_Wit_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_SubTotal` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.initial_scores: ~0 rows (approximately)
/*!40000 ALTER TABLE `initial_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `initial_scores` ENABLE KEYS */;

-- Dumping structure for procedure misssilliman.init_prepageant
DELIMITER //
CREATE DEFINER=`SU`@`%` PROCEDURE `init_prepageant`()
BEGIN
	DECLARE j int;
    DECLARE c int;
    
    SET j=1;
    TRUNCATE prepageants;
    
    #j1-3 = judges for talent
    #j4-6 = judges for speech
    #j7 = special project c/o organizer
    
    WHILE j <=12  DO
    	SET c=1;
    	IF j<=3 THEN
	    	WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,Talent_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
        END IF;
               
        IF j>3 AND j<=6 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,PSpch_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		IF j=7 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,SP_Prcnt) VALUES (c, j,.20);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		
		SET j = j + 1;       
    END WHILE;
    
    SELECT * FROM prepageants;
    
END//
DELIMITER ;

-- Dumping structure for table misssilliman.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.migrations: ~7 rows (approximately)
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

-- Dumping structure for table misssilliman.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table misssilliman.prepageants
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
  `posted` int(11) DEFAULT NULL,
  `read` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.prepageants: ~70 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `posted`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 100.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(2, 2, 1, 99.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(3, 3, 1, 98.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(4, 4, 1, 97.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(5, 5, 1, 96.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(6, 6, 1, 95.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(7, 7, 1, 94.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(8, 8, 1, 93.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(9, 9, 1, 92.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(10, 10, 1, 91.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:11:47', '2018-08-18 03:34:04'),
	(11, 1, 2, NULL, 20.00, 23.00, 25.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:58:30'),
	(12, 2, 2, NULL, 22.00, 13.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:58'),
	(13, 3, 2, NULL, 24.00, 20.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:50'),
	(14, 4, 2, NULL, 23.00, 18.00, 23.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(15, 5, 2, NULL, 23.00, 18.00, 19.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(16, 6, 2, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(17, 7, 2, NULL, 18.00, 22.00, 20.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(18, 8, 2, NULL, 18.00, 22.00, 19.00, 18.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(19, 9, 2, NULL, 23.00, 21.00, 22.00, 19.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(20, 10, 2, NULL, 22.00, 23.00, 19.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:34', '2018-08-18 05:13:29'),
	(21, 1, 3, NULL, 25.00, 24.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(22, 2, 3, NULL, 25.00, 24.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(23, 3, 3, NULL, 19.00, 20.00, 21.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(24, 4, 3, NULL, 22.00, 20.00, 21.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(25, 5, 3, NULL, 25.00, 24.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(26, 6, 3, NULL, 22.00, 22.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(27, 7, 3, NULL, 20.00, 23.00, 24.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(28, 8, 3, NULL, 21.00, 23.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(29, 9, 3, NULL, 22.00, 23.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(30, 10, 3, NULL, 22.00, 23.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:19:43', '2018-08-17 16:21:07'),
	(31, 1, 4, NULL, 22.00, 23.00, 18.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(32, 2, 4, NULL, 20.00, 20.00, 22.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(33, 3, 4, NULL, 23.00, 19.00, 20.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(34, 4, 4, NULL, 23.00, 20.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(35, 5, 4, NULL, 21.00, 22.00, 18.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(36, 6, 4, NULL, 23.00, 20.00, 21.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(37, 7, 4, NULL, 23.00, 19.00, 21.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(38, 8, 4, NULL, 23.00, 21.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(39, 9, 4, NULL, 23.00, 19.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(40, 10, 4, NULL, 22.00, 21.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:12', '2018-08-17 16:59:20'),
	(41, 1, 5, NULL, NULL, NULL, NULL, NULL, 23.00, 22.00, 18.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(42, 2, 5, NULL, NULL, NULL, NULL, NULL, 22.00, 17.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(43, 3, 5, NULL, NULL, NULL, NULL, NULL, 24.00, 23.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(44, 4, 5, NULL, NULL, NULL, NULL, NULL, 17.00, 18.00, 22.00, 18.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(45, 5, 5, NULL, NULL, NULL, NULL, NULL, 19.00, 18.00, 21.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(46, 6, 5, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 23.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(47, 7, 5, NULL, NULL, NULL, NULL, NULL, 24.00, 18.00, 18.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(48, 8, 5, NULL, NULL, NULL, NULL, NULL, 21.00, 19.00, 19.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(49, 9, 5, NULL, NULL, NULL, NULL, NULL, 18.00, 17.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(50, 10, 5, NULL, NULL, NULL, NULL, NULL, 18.00, 19.00, 24.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:26', '2018-08-17 17:03:15'),
	(51, 1, 6, NULL, NULL, NULL, NULL, NULL, 22.00, 23.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(52, 2, 6, NULL, NULL, NULL, NULL, NULL, 23.00, 24.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(53, 3, 6, NULL, NULL, NULL, NULL, NULL, 24.00, 22.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(54, 4, 6, NULL, NULL, NULL, NULL, NULL, 22.00, 23.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(55, 5, 6, NULL, NULL, NULL, NULL, NULL, 20.00, 19.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(56, 6, 6, NULL, NULL, NULL, NULL, NULL, 22.00, 21.00, 23.00, 20.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(57, 7, 6, NULL, NULL, NULL, NULL, NULL, 23.00, 18.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(58, 8, 6, NULL, NULL, NULL, NULL, NULL, 22.00, 22.00, 19.00, 18.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(59, 9, 6, NULL, NULL, NULL, NULL, NULL, 23.00, 18.00, 22.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(60, 10, 6, NULL, NULL, NULL, NULL, NULL, 21.00, 18.00, 19.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:44', '2018-08-17 17:19:16'),
	(61, 1, 7, NULL, NULL, NULL, NULL, NULL, 20.00, 22.00, 19.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(62, 2, 7, NULL, NULL, NULL, NULL, NULL, 21.00, 21.00, 20.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(63, 3, 7, NULL, NULL, NULL, NULL, NULL, 22.00, 20.00, 21.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(64, 4, 7, NULL, NULL, NULL, NULL, NULL, 23.00, 19.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(65, 5, 7, NULL, NULL, NULL, NULL, NULL, 20.00, 18.00, 23.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(66, 6, 7, NULL, NULL, NULL, NULL, NULL, 19.00, 23.00, 18.00, 20.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(67, 7, 7, NULL, NULL, NULL, NULL, NULL, 18.00, 22.00, 23.00, 19.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(68, 8, 7, NULL, NULL, NULL, NULL, NULL, 23.00, 22.00, 25.00, 24.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(69, 9, 7, NULL, NULL, NULL, NULL, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31'),
	(70, 10, 7, NULL, NULL, NULL, NULL, NULL, 20.00, 19.00, 20.00, 21.00, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-17 15:20:57', '2018-08-18 05:36:31');
/*!40000 ALTER TABLE `prepageants` ENABLE KEYS */;

-- Dumping structure for table misssilliman.press_launches
CREATE TABLE IF NOT EXISTS `press_launches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `organizer` int(10) unsigned NOT NULL,
  `PL_RS` int(11) DEFAULT NULL,
  `posted` int(11) DEFAULT NULL,
  `read` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.press_launches: ~10 rows (approximately)
/*!40000 ALTER TABLE `press_launches` DISABLE KEYS */;
INSERT INTO `press_launches` (`id`, `candidate`, `organizer`, `PL_RS`, `posted`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 92, NULL, NULL, '2018-08-17 15:07:58', '2018-08-18 08:45:03'),
	(2, 2, 1, 90, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 08:45:04'),
	(3, 3, 1, 89, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 08:45:05'),
	(4, 4, 1, 91, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 08:45:06'),
	(5, 5, 1, 90, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(6, 6, 1, 93, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(7, 7, 1, 92, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(8, 8, 1, 91, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(9, 9, 1, 92, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50'),
	(10, 10, 1, 92, NULL, NULL, '2018-08-17 15:11:47', '2018-08-18 06:08:50');
/*!40000 ALTER TABLE `press_launches` ENABLE KEYS */;

-- Dumping structure for table misssilliman.users
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

-- Dumping data for table misssilliman.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'admin', NULL, 'admin', 'organizer', 'Chair', NULL, 'admin,judge', 'admin', '$2y$10$hahFnqrK4H5NgJ7wvAOAsucR2Y8Vp8V6oZ98cEtwG3u.q1loeRRhe', '2018-08-17 15:11:47', '2018-08-17 15:11:47', 'gXk6TDnl7FIYMM2vsagiDpf2n6FM1IsPfB7Ygdsih4ZZqcUBTTxtrhU7q3Cc'),
	(2, 'Judge1', NULL, 'Judge1', 'judge', NULL, 'Talent', NULL, 'judge1', '$2y$10$2E3P.ZhU5NuNX3/.D0Rwcup6J9AN9/o74oiYeUM6NPqbcW3orb8Bu', '2018-08-17 15:19:34', '2018-08-17 15:19:34', 'dNU8HrDJtEPFg5Au7ONH5n84EGoCgsRsl1pDX40lzSd1CRkNuJdTNsQHoiMf'),
	(3, 'Judge2', NULL, 'Judge2', 'judge', NULL, 'Talent', NULL, 'judge2', '$2y$10$L7w6MKp4YrbaSIGKc3bMzu9Px/P1qnzEmO1/C1eW7efm9pJy6b25a', '2018-08-17 15:19:43', '2018-08-17 15:19:43', 'Nh4JboOHjjBuaOheKhWmKNnNe0FMjwGt5R8fJnMpTIdbtGfcnrwkxgJ6vprL'),
	(4, 'Judge3', NULL, 'Judge3', 'judge', NULL, 'Talent', NULL, 'judge3', '$2y$10$oNwq6s2dsr/tWuLIiLU4a.2T/PMultDTuQ8JOghcUVCoKGzAOJ5CO', '2018-08-17 15:20:12', '2018-08-17 15:20:12', 'CioLIctMhAiwzqBE9ZXjfd9haZDZXXdkNqsyNOFzw0B67XosZzQhjfhIM4g5'),
	(5, 'Judge4', NULL, 'Judge4', 'judge', NULL, 'Speech', NULL, 'judge4', '$2y$10$L5qV9VjU..Y1fHo6I9FosO78e8FebP37sMmBvlFN5Of4e/f7d/7ui', '2018-08-17 15:20:26', '2018-08-17 15:20:26', 'IcQs4JFewXqZsYwY6YblvCNgnsgx2cvJVkSFjKHVdEQAglqyfQ9yF7sbF0kp'),
	(6, 'Judge5', NULL, 'Judge5', 'judge', NULL, 'Speech', NULL, 'judge5', '$2y$10$44ljGNqH6BjB0LDi.fcBJeBIMpI1DSP5uQrkzJ7BvcBS0cSHeE86G', '2018-08-17 15:20:44', '2018-08-17 15:20:44', 'ixlPoLc7vUrRYd2BOnLrj1dprNprjTDOgXY3Cd6na02AgLabNse4eXZ7XgAh'),
	(7, 'Judge6', NULL, 'Judge6', 'judge', NULL, 'Speech', NULL, 'judge6', '$2y$10$itIos9nZzzaq0sBh15/2H.CR0LlvmFVIRXCa4NfZganh7ZkfAPPKK', '2018-08-17 15:20:57', '2018-08-17 15:20:57', 'YXTFeCYLufivQetNp2skMbvcLjk1vvu2Fwx8zqluZdqZdXjrxUg5Xzc5wHOP');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
